@extends('_common_')

@section('body')
    <div class="field is-grouped is-grouped-multiline" id="status-list">
    </div>

    <script type="text/javascript">
        $(function () {
            $("#status-list").load("/status/status_list_part");
            setInterval(function () {
                $("#status-list").load("/status/status_list_part");
            }, 1000);
        });
    </script>

@endsection
