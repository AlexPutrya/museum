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
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <button  id="create" class="btn btn-default btn-lg"> Новый экспонат</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul  id="exhibits_list" class="list-group">
                        {{-- выводим список экспонатов jquery  --}}
                    </ul>
                </div>
            </div>
            <div class="row">
                <div id="form" class="col-md-6 col-md-offset-3">
                    <form>
                        <div class="photo">
                            <img src="{{asset('/img/no_photo.png')}}" alt="" class="img-thumbnail"/>
                        </div>
                        <div className="form-group">
                            <label>Загрузить фото</label>
                            <input type="file" class="form-control-file"/>
                        </div>
                        <div class="form-group">
                            <label> Название </label>
                            <input type="text" class="form-control" placeholder="Название экспоната (не будет отображатся нигде)"/>
                        </div>
                        <div class="form-group">
                            <label> Заголовок </label>
                            <input type="text" class="form-control" placeholder="Заголовок для страиницы с экспонатом"/>
                        </div>
                        <div class="form-group">
                            <label>Текст статьи</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
