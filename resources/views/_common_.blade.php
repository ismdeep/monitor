<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monitor</title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
        integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
        crossorigin="anonymous"/>

    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar  mdui-theme-primary-indigo mdui-theme-accent-pink">

<header class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar">
        <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
              mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>


        <a class="mdui-typo-headline" href="/">Monitor</a>
        {{--            <a class="mdui-typo" href="{{ url('/') }}">Home</a>--}}

        <div class="mdui-toolbar-spacer"></div>


        @auth
            <div class="">
                <a class="mdui-btn mdui-btn-dense" mdui-menu="{target: '#menu-profile'}">{{ Auth::user()->name }}</a>
                <ul class="mdui-menu" id="menu-profile">
                    <li class="mdui-menu-item">
                        <a href="{{ route('tokens') }}" class="mdui-ripple">Tokens</a>
                    </li>
                    <li class="mdui-divider"></li>
                    <li class="mdui-menu-item">
                        <a class="mdui-ripple" href="{{ route('logout') }}">Sign out</a>
                    </li>
                </ul>
            </div>
        @else
            <a class="mdui-btn mdui-btn-dense" href="{{ route('login') }}">Log in</a>
            <a class="mdui-btn mdui-btn-dense" href="{{ route('register') }}">Sign up</a>
        @endif
    </div>
</header>



<div class="mdui-container">
    <div class="mdui-card-content">
        @section('body')
        @show

        @yield('content')
    </div>
</div>

<div class="mdui-drawer" id="main-drawer">
    <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
        <a href="/">
            <span class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
                <div class="mdui-list-item-content">Home</div>
            </span>
        </a>


        @auth
            <a href="{{ url('/status') }}">
                <span class="mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">format_list_bulleted</i>
                    <div class="mdui-list-item-content">Status</div>
                </span>
            </a>

            <div class="mdui-collapse-item ">
                <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">settings</i>
                    <div class="mdui-list-item-content">Settings</div>
                    <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                </div>
                <div class="mdui-collapse-item-body mdui-list">
                    <a href="{{ route('tokens') }}" class="mdui-list-item mdui-ripple ">Tokens</a>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- MDUI JavaScript -->
<script
    src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
    integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
    crossorigin="anonymous"></script>

</body>
</html>
