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
                for (i = 0; i < d.data.length; i++) {
                    let tag_class = d.data[i].is_alive ? 'mdui-color-green' : 'mdui-color-red';
                    if (i > 0) {
                        html += '&nbsp;&nbsp;';
                    }
                    html += '<div class="mdui-chip"><a href="/status/' + d.data[i].id + '">\n' +
                        '            <span class="mdui-chip-title">'+d.data[i].key+'</span>\n' +
                        '            <span class="mdui-chip-icon '+tag_class+'"><i class="mdui-icon material-icons">face</i></span>\n' +
                        '        </a></div>';
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
