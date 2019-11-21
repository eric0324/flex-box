@extends('layouts.app')
@section('title')
<title>{{ $flex->name }} - FlexBox</title>
@endsection
@section('metadata')
<meta name="description" content="{{ $flex->name }} 可以用來 {{ $flex->description }}">
<meta property="og:title" content="{{ $flex->name }} - FlexBox">
<meta property="og:description" content="{{ $flex->name }} 可以用來 {{ $flex->description }}">
@endsection
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">首頁</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $flex->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="pt-1"></div>
            <div class="card">
                <h2 class="p-3 card-title">{{ $flex->name }}</h2>
                <div class="pb-3 pl-3 pr-3">
                    <p>{{ $flex->description }}</p>
                    @if (empty($flex->verify_at))
                        <p>尚未認證的 Flex message ，所以還無法直接 demo 給你看</p>
                    @else
                        <div id="no-line">
                            如果你需要 demo，可以 <a href="https://line.me/R/ti/p/%40872ahwhe">加入好友</a>，並且輸入：
                            <code>demo {{ $flex->demo_code }}</code>
                        </div>
                        <div id="line">
                            <button id="sendMessageButton">Send Message</button>
                        </div>
                    @endif
                </div>
                <div class="p-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">JSON</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">PHP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Java</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Ruby</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">GO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Python</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">NodeJS</a>
                        </li>
                    </ul>
                    <div class="p-3">
                        <code class="prettyprint lang-json">
                            {{ $flex->shell }}
                        </code>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="pt-1"></div>
            <div class="card">
                <div class="p-1">
                    <img src="{{ url($flex->demo_image) }}" class="card-img-top" alt="...">
                </div>
                <div class="p-3">
                    @if (empty($flex->bot_id))
                    @else
                        這個 Flex message 由 <a target="_blank" href="https://line.me/R/ti/p/%40{{ $flex->bot_id }}"> ＠{{$flex->bot_id}} </a> 提供
                    @endif
                </div>
            </div>
        </div>
</div>
@endsection
@section('javascript_file')
<script src="https://cdn.bootcss.com/vConsole/3.3.4/vconsole.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
<script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
<script>
    window.onload = function() {
        document.getElementById('line').style.visibility = 'hidden';
        document.getElementById('no-line').style.visibility = 'visible';
        let myLiffId = "1653458381-72g3dOyb";
        let messageContent = "demo {{ $flex->demo_code }}"
        initializeLiff(myLiffId, messageContent);
    };
</script>
<script src="{{ secure_asset('js/liff/starter_2.js') }}"></script>
@endsection
