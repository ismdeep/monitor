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
                    let tag_class = d.data[i].is_alive ? 'mdui-color-green' : 'mdui-color-red';
                    html += '<div class="mdui-chip mdui-m-x-1">' +
                        '<a class="mdui-text-color-grey" href="/status/' + d.data[i].id + '">' +
                        '<span class="mdui-chip-title">' + d.data[i].key + '</span>' +
                        '<span class="mdui-chip-icon ' + tag_class + '">' +
                        '<i class="mdui-icon material-icons">face</i>' +
                        '</span>' +
                        '</a>' +
                        '</div>';
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
