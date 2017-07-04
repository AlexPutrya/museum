<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Музей дальней авиации</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/layout.css')}}">
        <script src="{{ asset('/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/dropdown.js')}}"></script>
    </head>
    <body>
        <div class="container-fluid">
            <header>
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
                    <div class="col-md-1">
                        <p>+38(066)85-34-902</p>
                    </div>
                </div>
                <div class="row menu">
                    <div class="col-md-4 col-md-offset-7">
                        <nav class="header-nav">
                            <ul>
                                <li><a href="#">{{ trans('navigation.main') }}</a></li>
                                <li id="drop"><a href="#">{{ trans('navigation.exhibits') }} <span class="caret"></span></a>
                                    <ul class="submenu">
                                        @foreach ($exhibits as $exhibit)
                                            <li><a href="/exhibit/{{$exhibit->exhibit_id}}">{{$exhibit->name}}</a></li>
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
                <div class="row">
                    <img class="main-banner" src="{{ asset('/img/main_banner.jpg')}}" alt="">
                </div>
            @show
            <footer>
                <div class="row footer-nav">
                    <div class="col-md-4">
                        <nav>
                            <ul>
                                <li><a href="#">{{ trans('navigation.main') }}</a></li>
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
                        <p>Авиагородок, ул. Засядько, Полтава, Украина</p>
                    </div>
                    <div class="col-md-2">
                        <p>+38(066)85-34-902</p>
                    </div>
                    <div class="col-md-3">
                        <p>poltava_mda@ukr.net</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
