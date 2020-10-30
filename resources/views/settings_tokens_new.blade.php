@extends('_common_')

@section('body')

    <form action="{{url('/settings/tokens/new')}}" method="post">
        @csrf
        <label class="label" for="name">Name</label> <input class="input" type="text" name="name" id="name">

        <button class="button" type="submit">Generate</button>
    </form>

@endsection
