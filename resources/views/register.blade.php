@extends('_common_')

@section('body')
    <form action="/register" method="post">
        @csrf
        <p>
            <label for="username">Username</label> <input type="text" id="username" name="username">
        </p>
        <p>
            <label for="email">Email</label> <input type="text" id="email" name="email">
        </p>
        <p>
            <label for="password">Password</label> <input type="password" id="password" name="password">
        </p>
        <p>
            <label for="password-confirm">Password Confirm</label> <input type="password" id="password-confirm" name="password-confirm">
        </p>
        <p>
            <button>Register</button>
        </p>
    </form>
@endsection
