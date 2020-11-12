@extends('_common_')

@section('body')
    <div>
        <p><span>{{ $status->key_name }}</span></p>
        <p><span>{{ $status->getAgoInfo() }}</span></p>
        <p></p>
        <p><a href="javascript:" class="btn" onclick="delete_status({{$status->id}});">Delete</a></p>
    </div>

    <script type="text/javascript">
        function delete_status(id) {
            if (confirm('是否删除？')) {
                $.get('/status/' + id + '/delete/json', function (d) {
                    if (d.code === 0) {
                        location.href = '/status';
                    } else {
                        alert(d.msg);
                    }
                }, 'json');
            }
        }
    </script>

@endsection
