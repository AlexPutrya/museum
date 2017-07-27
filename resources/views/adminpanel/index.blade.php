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
        <script src="{{ asset('/js/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/js/form.js')}}" type="text/javascript"></script>
    </head>
    <body>
        <div class="sidebar">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('main') }}" target="_blank"><span class="glyphicon glyphicon-home"></span></a>
                    <a href="{{ route('logout') }}">Выйти</a>
                    <h2>Экспонаты</h2>
                    <button  id="create" class="btn btn-block btn-info btn-m"> <span class="glyphicon glyphicon-plus"></span> Новый экспонат</button>
                    <ul  id="exhibits_list" class="list-group">
                        {{-- выводим список экспонатов jquery  --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div id="form" class="col-md-6 col-md-offset-5">
                    <form lang=''>
                        <ul class="languages">
                            <li><a class="switch-lang" lang='en' href="">en</a></li>
                            <li><a class="switch-lang" lang='ru' href="">ru</a></li>
                            <li><a class="switch-lang" lang='ua' href="">ua</a></li>
                        </ul>
                        <div class="form-group">
                            <label> Название </label>
                            <input  id="name" lang="" type="text" class="form-control exhibit-info" placeholder="Название экспоната (будет отображено в навигации)"/>
                        </div>
                        <div class="form-group">
                            <label> Заголовок </label>
                            <input id="title" lang="" type="text" class="form-control exhibit-info" placeholder="Заголовок для страиницы с экспонатом"/>
                        </div>
                        <div id="photo-block" class="form-group">
                            <div class="photo">
                                <img id="photo" src="" alt="" class="img-thumbnail"/>
                                <a id="delete-photo" title="Удалить" href=""><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                            <label>Загрузить фото</label>
                            <input  id="imgInpt" type="file" name="image" class="form-control-file"/>
                        </div>
                        <div class="form-group">
                            <label>Сылка на 3d-модель</label>
                            <input id="link-3dmodel" type="text" class="form-control exhibit-info"/>
                        </div>
                        <div class="form-group">
                            <label>Текст статьи</label>
                            {{-- <textarea id="text"  lang=""  class="form-control exhibit-info" rows="15"></textarea> --}}
                            <textarea name="name" lang="" id="editor"></textarea>
                        </div>
                        <button id="save" type="button" name="button">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
