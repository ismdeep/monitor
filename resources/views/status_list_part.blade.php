@foreach ($status_list as $status)
    @if($status['is_alive'])
        @php
            $status['tag_class'] = 'mdui-text-color-green';
        @endphp
    @else
        @php
            $status['tag_class'] = 'mdui-text-color-red';
        @endphp
    @endif

    <div class="mdui-chip">
        <a style="padding: 8px;" class="{{$status['tag_class']}}" href="/status/{{$status['id']}}">
            <span class="mdui-chip-title">{{$status['key']}} [{{$status['ago_text']}}]</span>
        </a>
    </div>
@endforeach
