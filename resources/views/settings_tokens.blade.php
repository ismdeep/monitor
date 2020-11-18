@extends('_common_')

@section('body')
    <div class="mdui-typo">

        <div class="mdui-row">
            <div class="mdui-float-left">
                Personal access tokens
            </div>
            <div class="mdui-float-right">
                <a class="mdui-btn mdui-btn-dense" href="{{url('/settings/tokens/new')}}">Generate new token</a>
            </div>
        </div>

        <div class="mdui-panel" mdui-panel>
            @forelse ($tokens as $token)
                <div class="mdui-panel-item">
                    <div class="mdui-panel-item-header">
                        <div class="mdui-panel-item-title">{{ $token->name }}</div>
                        <div class="mdui-panel-item-summary">{{ $token->created_at }}</div>
                        <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="mdui-panel-item-body">
                        <p>{{ $token->token }}</p>
                    </div>
                </div>
            @empty
                <div class="mdui-panel-item">
                    <div class="mdui-panel-item-header">No tokens</div>
                </div>
            @endforelse
        </div>

    </div>

@endsection
