$(document).ready(function(){
    // Загружаем страницу с очищенными полями и по умолчанию заданным русским языком для статьи
    show_list();
    $('.exhibit-info').val('');
    $("#name, #title, #text").attr('lang', 'ru');
    $("a#ru").css({color: 'black'});

    var locale = {
        en: {name : '', title: '', text : ''},
        ru: {name : '', title: '', text : ''},
        ua: {name : '', title: '', text : ''}
    };

    //Очищает и выводит новый список экспонатов
    function show_list(){
        $.ajax({
            url: 'api/exhibits',
            type: 'GET',
            success: function(data){
                $("#exhibits_list .list-group-item").remove();
                $.each(data, function(key, value){
                    $("#exhibits_list").append(
                        '<li class="list-group-item"><span id="'+value.id+'" class="name">'+value.name+
                            '<span><span class="pull-right">\
                                <a id="'+value.id+'"  class="edit" href="">Редакт.</a>\
                                <a id="'+value.id+'" class="delete" href="">Удал.</a>\
                                <input toggle-id="'+value.id+'" class="switcher toggle-'+value.id+'" data-toggle="toggle" data-size="mini" data-onstyle="success" type="checkbox">\
                                </span>\
                        </li>'
                    );
                    if(value.visibility == 1){
                        $('.toggle-'+value.id).bootstrapToggle('on');
                    }else{
                        $('.toggle-'+value.id).bootstrapToggle('off');
                    }
                });
                // вешаем обработчик событий для изменения видимости экспоната
                $('.switcher').change(function(){
                    var toggle_id = $(this).attr('toggle-id');
                    change_visibility(toggle_id);
                });
            },
            error: function(){

            }
        });
    }

    //Видимость экспоната
    function change_visibility(id){
        $.ajax({
            url: 'api/exhibit/'+id+'/visibility',
            type: "PATCH",
            success: function(){
                return true;
            },
            error: function(){

            }
        });
    }

    // Переключатель языка, получаем абревиатуру и передаем в функцию изменения формы
    $(".lang").click(function(e){
        e.preventDefault();
        $(".lang").css({color: "#3097d1"});
        $(this).css({color: 'black'});
        change_form($(this).attr('id'));
    });

    // Показываем форму которая будет иметь id экспоната
    function show_form(id=''){
        $('form').css('display','block');
        $("form").attr('id', id);
        change_form('ru');
    }
    function hide_form(){
        $('form').css('display','none');
    }

    //Получаем данные в форму и в зависимосьти от языка
    // задаем атрибут с абревиатурой языка
    function change_form(lang){
        $("#name").val(locale[lang].name);
        $("#title").val(locale[lang].title);
        $("#text").val(locale[lang].text);
        $("#name, #title, #text").attr('lang', lang);
    }
    // очищаем перменныые и формы
    function clear_form(){
        $.each(locale, function(key, value){
            value.name = '';
            value.title = '';
            value.text = '';
            change_form(key);
        });
        $('.exhibit-info').val('');
    }

    //Данные из полей записываются в переменную
    $('body').on('change', ".exhibit-info", function(){
        var lang = $(this).attr('lang');
        var type = $(this).attr('id');
        locale[lang][type] = $(this).val();
    })

    //Создаем экспонат
    $('body').on('click', '#create', function(e){
        e.preventDefault();
        $.ajax({
            url: "api/exhibit",
            type: "POST",
            success: function(data){
                clear_form();
                show_list();
                show_form(data.id);
                show_no_image();
                clear_file_input();
            },
            error: function(){

            }

        });
    });

    // Cохраняем данные
    $('body').on('click', '#save', function(e){
        e.preventDefault();
        var id = $('form').attr('id');
        $.ajax({
            url: "api/exhibit/"+id,
            type: "PATCH",
            data: {'locale': locale},
            success: function(data){
                show_list();
                hide_form();
            },
            error: function(){

            }

        });
    });

    // загружаем данные для редактирования
    $('body').on('click', '.edit', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            url: "api/exhibit/"+id,
            type: "GET",
            success: function(data){
                $.each(data.text, function(key, value){
                    locale[value.lang]['title'] = value.title;
                    locale[value.lang]['name'] = value.name;
                    locale[value.lang]['text'] = value.text;
                    change_form(value.lang);
                });
                show_form(data['text'][0].exhibit_id);
                show_image(data.img_path);
                clear_file_input();
            },
            error: function(){

            }
        });
    });

    // Удаляем экспонат
    $('body').on('click', '.delete', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var element = $(this);
        $.ajax({
            url: "api/exhibit/"+id,
            type: "DELETE",
            success: function(data){
                element.parents(".list-group-item").hide('slow', function(){
                    $(this).remove();
                    hide_form();
                });
            },
            error: function(){

            }
        });
    });

    $("#delete-photo").on('click', function(e){
        e.preventDefault();
        delete_image();
    });

    // Загрузчик изображения для предпросмотра
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#photo').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Обработка загрузки изображения
    $("#imgInpt").change(function(){
        readURL(this);
        add_file();
    });

    // отправляем изображение на сервер
    function add_file(){
        // получаем обьект формы и вытягиваем фал картинки
        var form = $('form').get(0);
        var file = new FormData(form);
        id = $('form').attr('id');
        $.ajax({
            url: '/api/exhibit/'+id+'/image',
            type: "POST",
            processData: false,
            contentType: false,
            data: file,
            success: function(data){
                return true;
            }
        });
    }

    // Отправка запроса на удаление изображения с сервера
    function delete_image(){
        var id = $('form').attr('id');
        $.ajax({
            url: "/api/exhibit/"+id+'/image',
            type: 'DELETE',
            success: function(){
                clear_file_input();
                show_image();
            }
        });
    }

    // показать изображение
    function show_image(path=null){
        if(path){
            $("#photo").attr('src', path);
        }else{
            show_no_image();
        }
    }

    // Заглушка для фотографии
    function show_no_image(){
        $("#photo").attr('src', '/img/no_photo.png');
    }

    // очитка инпута для файла
    function clear_file_input(){
        $("#imgInpt").val(null);
    }

});
