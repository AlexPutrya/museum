@extends ('layouts.app')

@section('main')
    <h2>{{ $info->title }}</h2>
    <div class="exhibit-photo">
        <img src="" alt="">
    </div>
    <div class="row">
        <div id="text" class="col-md-8 col-md-offset-2">
            {!! nl2br($info->text) !!}
        </div>
    </div>
@endsection
