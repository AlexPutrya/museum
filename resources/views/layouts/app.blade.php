<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Музей дальней авиации - @yield('title')</title>
    </head>
    <body>
        <ul>
            <li><a href="/en">EN</a></li>
            <li><a href="/ru">RU</a></li>
            <li><a href="/ua">UA</a></li>
        </ul>
        <nav>
            <ul>
                <li><a href="#">{{ trans('navigation.main') }}</a></li>
                <li><a href="#">{{ trans('navigation.exhibits') }}</a></li>
                <li><a href="#">{{ trans('navigation.history') }}</a></li>
                <li><a href="#">{{ trans('navigation.contacts') }}</a></li>
            </ul>
        </nav>
        @section('main')
            <h1>Музей дальней авиации</h1>
        @show
    </body>
</html>
