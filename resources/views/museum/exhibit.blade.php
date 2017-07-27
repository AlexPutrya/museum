@extends ('layouts.museum')

@section('main')
    <div class="banner">
        <img  id="ex-ban" class="img-responsive" src="{{asset('img/exhibits_banner.jpg')}}" alt="">
        <div class="title-banner">
            <p class="animated fadeIn another-banner-text">
                В музейную экспозицию входят 9 самолетов различного назначения
                и авиационные средства поражения, а также экспонаты
                аварийно-спасательного снаряжения.
            </p>
        </div>
    </div>
    <div class="line">
        <h4>Музей->Экспонаты->{{$info->title}}</h4>
    </div>
    <div class="row">
        {{-- Заголовок стрианицы экспоната --}}
        <h2>{{ $info->title }}</h2>
        {{-- Блок с изображение єкспоната --}}
        <div id="exhibit-photo" class="col-md-10 col-md-offset-1">
            <img class="img-responsive img-thumbnail" src="{{$img_path}}" alt="">
        </div>
    </div>
    <div class="row">
        {{-- Основной текст статьи  используется функция вывода со спецсимволами--}}
        <div id="text" class="col-md-10 col-md-offset-1">
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
