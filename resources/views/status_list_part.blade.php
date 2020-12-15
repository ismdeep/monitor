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
    <a style="padding: 8px;" class="{{$status['tag_class']}}" href="/status/{{$status['id']}}">
        <div class="mdui-chip">
            <span class="mdui-chip-title">{{$status['ago_text']}}</span>
        </div>
    </a>
@endforeach
