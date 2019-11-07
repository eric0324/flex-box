<?php

namespace App\Http\Controllers;

use App\Flex;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\MessageBuilder\RawMessageBuilder;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class LineController extends Controller
{
    private $client;
    private $bot;
    private $channel_access_token;
    private $channel_secret;

    public function __construct()
    {
        $this->channel_access_token = env('CHANNEL_ACCESS_TOKEN');
        $this->channel_secret       = env('CHANNEL_SECRET');

        $httpClient   = new CurlHTTPClient($this->channel_access_token);
        $this->bot    = new LINEBot($httpClient, ['channelSecret' => $this->channel_secret]);
        $this->client = $httpClient;
    }

    /**
     * LINE Webhook
     *
     * @return Response
     */
    public function webhook(Request $request)
    {
        $bot       = $this->bot;
        $signature = $request->header(\LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE);
        $body      = $request->getContent();

        try {
            $events = $bot->parseEventRequest($body, $signature);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        foreach ($events as $event) {
            $replyToken = $event->getReplyToken();
            if ($event instanceof MessageEvent) {
                $message_type = $event->getMessageType();
                $text = $event->getText();
                switch ($message_type) {
                    case 'text':
                        if (preg_match('/^demo/',$text)){
                            $text = str_replace("demo ", "", $text);
                            $flex = Flex::where('demo_code', $text)->whereNotNull('verification')->first();
                            if (empty($flex)) {
                                $bot->replyText($replyToken, '我不懂你要我做什麼！');
                            } else {
                                $bot->replyMessage($replyToken, new RawMessageBuilder(
                                    [
                                        'type' => 'flex',
                                        'altText' => '這是' . $flex->name . '的 demo 結果',
                                        'contents' => json_decode($flex->shell)
                                    ]
                                ));
                            }

                        }
                        $bot->replyText($replyToken, '我不懂你要我做什麼！');
                        break;

                }
            }
        }
    }

}

