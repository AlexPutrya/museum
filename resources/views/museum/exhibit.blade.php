@extends ('layouts.app')

@section('main')
    <div class="row">
        <h2>{{ $info->title }}</h2>
        <div id="exhibit-photo" class="col-md-6">
            <img class="img-responsive img-thumbnail" src="{{$img_path}}" alt="">
        </div>
    </div>
    <div class="row">
        <div id="text" class="col-md-8 col-md-offset-2">
            {!! nl2br($info->text) !!}
        </div>
    </div>
@endsection
