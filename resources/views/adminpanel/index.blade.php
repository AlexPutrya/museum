<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-toggle.min.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/adminpanel.css')}}">
        <script src="{{ asset('/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/js/bootstrap-toggle.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/js/create.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/js/list.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/js/form.js')}}" type="text/javascript"></script>
    </head>
    <body>
        <div class="sidebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Экспонаты</h2>
                    <button  id="create" class="btn btn-block btn-info btn-m"> Новый экспонат</button>
                    <ul  id="exhibits_list" class="list-group">
                        {{-- выводим список экспонатов jquery  --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div id="form" class="col-md-6 col-md-offset-5">
                    <form>
                        <ul class="languages">
                            <li><a class="lang" id="en" href="">en</a></li>
                            <li><a class="lang" id="ru" href="">ru</a></li>
                            <li><a class="lang" id="ua" href="">ua</a></li>
                        </ul>
                        <div class="form-group">
                            <label> Название </label>
                            <input  id="name" lang="" type="text" class="form-control exhibit-info" placeholder="Название экспоната (будет отображено в навигации)"/>
                        </div>
                        <div class="form-group">
                            <label> Заголовок </label>
                            <input id="title" lang="" type="text" class="form-control exhibit-info" placeholder="Заголовок для страиницы с экспонатом"/>
                        </div>
                        <div class="photo">
                            <img src="{{asset('/img/no_photo.png')}}" alt="" class="img-thumbnail"/>
                        </div>
                        <div class="form-group">
                            <label>Загрузить фото</label>
                            <input type="file" class="form-control-file"/>
                        </div>
                        <div class="form-group">
                            <label>Текст статьи</label>
                            <textarea id="text"  lang=""  class="form-control exhibit-info" rows="5"></textarea>
                        </div>
                        <button id="save" type="button" name="button">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
