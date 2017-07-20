<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Музей дальней авиации</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
        <script src="{{ asset('/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/dropdown.js') }}"></script>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <img class="logo" src="{{asset('/img/logo.png')}}" alt="">
                <div class="row">
                    <div class="col-md-2">
                        <ul class="languages">
                            <li><a href="{{route('lang', ['parametr'=>'en'])}}">EN</a></li>
                            <li><a href="{{route('lang', ['parametr'=>'ru'])}}">RU</a></li>
                            <li><a href="{{route('lang', ['parametr'=>'ua'])}}">UA</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-3">
                        <p>Музей открыт с 9:00 до 17:00 кроме Пн. и Вт.</p>
                    </div>
                    <div class="col-md-2">
                        <p><i class="fa fa-phone" aria-hidden="true"></i> +38(066)85-34-902</p>
                    </div>
                </div>
                <div class="row menu">
                    <div class="col-md-4 col-md-offset-7">
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
                    <img class="main-banner" src="{{ asset('/img/banner.jpg')}}" alt="">
                    <div class="title-banner">
                        <h1>Музей дальней авиации</h1>
                    </div>
                </div>
            @show
            <footer>
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
                    <div class="col-md-3 col-md-offset-5">
                        <ul class="social">
                            <li>facebook</li>
                            <li>twitter</li>
                        </ul>
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
