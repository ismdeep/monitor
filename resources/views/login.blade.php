@extends('_common_')

@section('body')

    <form action="/login" method="post">
        @csrf
        <p>
            <label for="username">Username</label> <input type="text" id="username" name="username" />
        </p>
        <p>
            <label for="password">Password</label> <input type="password" id="password" name="password" />
        </p>
        <p>
            <button>Login</button>
        </p>
    </form>

@endsection
