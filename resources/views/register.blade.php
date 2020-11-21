@extends('_common_')

@section('body')
    <form action="{{ url('/register') }}" method="post">
        <div class="mdui-textfield">
            <input class="mdui-textfield-input" type="text"
                   id="username"
                   name="username"
                   placeholder="Username">
        </div>
        <div class="mdui-textfield">
            <input class="mdui-textfield-input" type="text"
                   id="email"
                   name="email"
                   placeholder="Email">
        </div>
        <div class="mdui-textfield">
            <input class="mdui-textfield-input"
                   type="password"
                   id="password"
                   name="password"
                   placeholder="Password">
        </div>
        <div class="mdui-textfield">
            <input
                class="mdui-textfield-input"
                type="password"
                id="password-confirm"
                name="password-confirm"
                placeholder="Password Confirm">
        </div>
        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">Register</button>
    </form>
@endsection
