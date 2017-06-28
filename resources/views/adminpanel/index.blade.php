<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
        <link rel="stylesheet" href="{{ mix('/css/app.css')}}">
    </head>
    <body>
        <div id="example"></div>
        <script src="{{ mix('/js/app.js')}}" type="text/javascript"></script>
    </body>
</html>
