@extends('_common_')

@section('body')
    <form action="{{ url('/login') }}" method="post">
        <div class="mdui-textfield">
            <input class="mdui-textfield-input" type="text"
                                                 id="username"
                                                 name="username"
                                                 placeholder="Username">
        </div>
        <div class="mdui-textfield">
            <input class="mdui-textfield-input"
                   type="password"
                   id="password"
                   name="password"
                   placeholder="Password">
        </div>
        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">Login</button>
    </form>
@endsection
