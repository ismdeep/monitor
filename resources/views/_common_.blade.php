<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monitor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div id="navbarBasicExample" class="navbar-menu is-active">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ url('/') }}">Home</a>
            @auth
                <a class="navbar-item" href="{{ url('/status') }}">Status</a>
            @endif
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    @auth
                        <a class="button is-primary" href="{{ route('settings') }}">
                            <span class="icon">
                                <i class="fas fa-cog fa-fw"></i>
                            </span>
                            <span>Setting</span>
                        </a>

                        <a class="button is-left" href="{{ route('logout') }}">
                            Sign out
                        </a>
                    @else
                        <a class="button is-light" href="{{ route('login') }}">
                            Log in
                        </a>
                        <a class="button is-primary" href="{{ route('register') }}">
                            <strong>Sign up</strong>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>


<section class="section">
    <div class="container">
        @section('body')
        @show

        @yield('content')
    </div>
</section>
</body>
</html>
