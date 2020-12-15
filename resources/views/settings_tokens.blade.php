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
                        <a href="javascript:" class="mdui-btn mdui-btn-dense" onclick="revoke_token({{$token->id}});">Revoke</a>
                    </div>
                </div>
            @empty
                <div class="mdui-panel-item">
                    <div class="mdui-panel-item-header">No tokens</div>
                </div>
            @endforelse
        </div>

    </div>

    <script type="text/javascript">
        function revoke_token(id) {
            if (confirm('Revoke this token?')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/settings/tokens/' + id,
                    success: function(d) {
                        if (d.code !== 0) {
                            alert(d.msg);
                        } else {
                            location.reload();
                        }
                    },
                    error: function(err){
                        console.log(err);
                        alert(err.responseJSON.message);
                    }
                });
            }
        }
    </script>

@endsection
