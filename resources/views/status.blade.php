@extends('_common_')

@section('body')
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
                    let tag_class = d.data[i].is_alive ? 'is-success' : 'is-danger';
                    html += '<div class="control">\n' +
                        '            <a href="/status/' + d.data[i].id + '"><div class="tags has-addons">\n' +
                        '                <span class="tag">' + d.data[i].key + '</span>\n' +
                        '                <span class="tag ' + tag_class + '">' + d.data[i].ago_text + '</span>\n' +
                        '            </div></a>\n' +
                        '        </div>';
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
