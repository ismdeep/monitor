@extends('_common_')

@section('body')
    <div class="field is-grouped is-grouped-multiline" id="status-list">
    </div>

    <script type="text/javascript">
        function get_status() {
            $.get('/status/json', function (d) {
                console.log(d);
                let status_list_sel = $('#status-list');
                if (d.data.length <= 0) {
                    status_list_sel.html('Empty');
                    return;
                }
                let html = '';
                for (let i = 0; i < d.data.length; i++) {
                    let tag_class = d.data[i].is_alive ? 'mdui-text-color-green' : 'mdui-text-color-red';
                    html += '<a style="padding: 10px;text-decoration: none" class="' + tag_class + '" href="/status/' + d.data[i].id + '">' + d.data[i].key + '[' + d.data[i].ago_text + ']' + '</a>';
                }
                status_list_sel.html(html);
            }, 'json');
        }

        $(function () {
            get_status();
            setInterval(function () {
                get_status();
            }, 1000);
        });
    </script>

@endsection
