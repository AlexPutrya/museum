@extends ('layouts.museum')

@section('main')
    <div class="row">
        {{-- Заголовок стрианицы экспоната --}}
        <h2>{{ $info->title }}</h2>
        {{-- Блок с изображение єкспоната --}}
        <div id="exhibit-photo" class="col-md-8 col-md-offset-2">
            <img class="img-responsive img-thumbnail" src="{{$img_path}}" alt="">
        </div>
    </div>
    <div class="row">
        {{-- Основной текст статьи  используется функция вывода со спецсимволами--}}
        <div id="text" class="col-md-8 col-md-offset-2">
            {!! nl2br($info->text) !!}
        </div>
    </div>
        {{-- Блок 3D модели экспоната --}}
    @if ($link_3dmodel)
        <div class="row">
            <div id="model-3d" >
                <h3>3D модель</h3>
                <iframe class="model-3d" src="{{ $link_3dmodel}}" seamless="" allowfullscreen="" webkitallowfullscreen="" width="100%" height="480px" frameborder="0"></iframe>
            </div>
        </div>
    @endif
@endsection
