@extends('_common_')

@section('body')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                <form class="box" action="{{ url('/login') }}" method="post">
                    @csrf
                    <div class="field">
                        <label class="label" for="username">Username</label> <input class="input" type="text"
                                                                                    id="username"
                                                                                    name="username"
                                                                                    placeholder="Username">
                    </div>
                    <div class="field">
                        <label class="label" for="password">Password</label> <input class="input"
                                                                                    type="password"
                                                                                    id="password"
                                                                                    name="password"
                                                                                    placeholder="Password">
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-link">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
