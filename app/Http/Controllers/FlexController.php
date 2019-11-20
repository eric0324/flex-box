<?php

namespace App\Http\Controllers;

use Auth;
use Imgur;
use Session;

use Illuminate\Http\Request;
use App\Flex;

use Webpatser\Uuid\Uuid;

class FlexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $flexes = Flex::orderBy('created_at', 'desc')->paginate(16);
        return view('flex.index', ['flexes' => $flexes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('flex.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $image = $request->file('demo_image');
        $image = Imgur::upload($image);

        $shell = json_decode($request->shell);
        if (empty($shell)){
            Session::flash('error_message', '失敗: 錯誤的 JSON 格式');
            return redirect('/');
        }

        $demo_code = Uuid::generate()->string;

        $flex = new Flex ([
            'user_id'     => Auth::user()->id,
            'name'        => $request->name,
            'demo_code'   => $demo_code,
            'description' => $request->description,
            'bot_id'      => $request->bot_id,
            'shell'       => $request->shell,
            'demo_image'  => $image->link(),
        ]);
        $flex->save();
        Session::flash('success_message', '新增成功，感謝您的貢獻！');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($demo_code)
    {
        $flex = Flex::where('demo_code', $demo_code)->firstOrFail();
        return view('flex.show', ['flex' => $flex]);
    }

}
