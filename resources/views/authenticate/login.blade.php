<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Аутентификация</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/login.css')}}">
    </head>
    <body>
        <div class="login-content">
            <form class="login" action="{{ route('authenticate') }}" method="POST">
                {{ csrf_field() }}
                <img  class="logo" src="{{asset('/img/logo.jpg')}}" alt="">
                <h4>Аутентификация</h4>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" value="" placeholder="логин(email)">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" value="" placeholder="пароль">
                </div>
                <input type="submit" name="" value="Войти">
            </form>
        </div>
    </body>
</html>
