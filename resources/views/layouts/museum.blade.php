<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Музей дальней авиации</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
        <script src="{{ asset('/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/dropdown.js') }}"></script>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <div class="row" id="top-bar">
                    <img class="logo" src="{{asset('/img/logo.png')}}" alt="">
                    <div class="col-md-4 lang">
                        <ul>
                            <li><a href="{{route('lang', ['parametr'=>'en'])}}">EN</a></li>
                            <li><a href="{{route('lang', ['parametr'=>'ru'])}}">RU</a></li>
                            <li><a href="{{route('lang', ['parametr'=>'ua'])}}">UA</a></li>
                        </ul>
                    </div>
                    <div class="col-md-8 contacts">
                        <div class="col-md-6">
                            Музей открыт с 9:00 до 17:00 кроме Пн. и Вт.
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-phone" aria-hidden="true"></i> +38(066)85-34-902
                        </div>
                    </div>
                </div>

                <div class="row menu">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-5 col-md-offset-4 nav">
                        <nav class="header-nav">
                            <ul>
                                <li><a href="{{ route('main') }}">{{ trans('navigation.main') }}</a></li>
                                <li id="drop"><a href="#">{{ trans('navigation.exhibits') }} <span class="caret"></span></a>
                                    <ul class="submenu">
                                        @foreach ($nav_exhibits as $exhibit)
                                            @if (isset($exhibit['name']))
                                                <li><a href="/exhibit/{{$exhibit['id']}}">{{$exhibit['name']}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">{{ trans('navigation.history') }}</a></li>
                                <li><a href="#">{{ trans('navigation.contacts') }}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
            @section('main')
                <div class="row banner">
                    <img src="{{ asset('/img/banner.jpg')}}" alt="">
                    <div class="title-banner">
                        <h1 class="animated fadeIn">Музей дальней авиации</h1>
                        <p class="animated fadeIn">Здесь вы сможете увидеть самолеты Ту-95 и Ту-160, которых нет ни в одном музее мира</p>
                    </div>
                </div>
            @show
            <footer>
                <img class="logo" src="{{asset('/img/logo_inverse.png')}}" alt="">
                <div class="row footer-nav">
                    <div class="col-md-4">
                        <nav>
                            <ul>
                                <li><a href="{{ route('main') }}">{{ trans('navigation.main') }}</a></li>
                                <li><a href="#">{{ trans('navigation.history') }}</a></li>
                                <li><a href="#">{{ trans('navigation.contacts') }}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row contacts">
                    <div class="col-md-4 adress">
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> Авиагородок, ул. Засядько, Полтава, Украина</p>
                    </div>
                    <div class="col-md-2">
                        <p><i class="fa fa-phone" aria-hidden="true"></i> +38(066)85-34-902</p>
                    </div>
                    <div class="col-md-3">
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> poltava_mda@ukr.net</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
