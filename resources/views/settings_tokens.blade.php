@extends('_common_')

@section('body')

    <a href="{{url('/settings/tokens/new')}}">Generate new token</a>

    <ul>
        @forelse ($tokens as $token)
            <li>
                <label class="label">{{ $token->name }}</label>
                <span>{{ $token->token }}</span>
            </li>
        @empty
            <p>No tokens</p>
        @endforelse
    </ul>

@endsection
