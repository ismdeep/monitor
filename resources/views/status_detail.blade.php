@extends('_common_')

@section('body')
    <div>
        <span>{{ $status->key_name }}</span>
        <span>{{ $status->getAgoInfo() }}</span>
    </div>
@endsection
