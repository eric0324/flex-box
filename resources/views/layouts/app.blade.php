<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    @yield('css_file')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Flex Box
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">登入</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">註冊</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('flex.create') }}">建立 Flex</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        登出
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer Start -->
        <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 footer-about">
                            <p>
                                Flex box 是一個由網友們一起整理的 Flex 訊息收集網站，特別感謝貢獻的每位設計者，祝各位開發愉快，發大財！
                            </p>
                            <!-- Buy Me a Coffee Start -->
                            <link rel="stylesheet"><a class="bmc-button" target="_blank" href="https://www.buymeacoffee.com/dHfJgFS"><img src="https://cdn.buymeacoffee.com/buttons/bmc-new-btn-logo.svg" alt="捐獻一杯咖啡"><span>捐獻一杯咖啡</span></a>
                            <!-- Buy Me a Coffee End -->
                        </div>
                        <div class="col-md-4 footer-about">
                            <p>
                                本站僅作為 Flex message 學習交流使用，和 LINE 無任何直接關係， LINE 是 Naver 集團旗下 LINE Corporation 商標所有。
                            </p>
                        </div>
                        <div class="col-md-4 footer-about">
                            <p><a href="mailto:smart032410@gmail.com" target="_blank">聯絡我</a></p>
                            <p><a href="https://ericwu.asia/" target="_blank">我的網誌</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            &copy; 2019 by <a href="">Eric</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->
    </div>
    @yield('javascript_file')
</body>
</html>
