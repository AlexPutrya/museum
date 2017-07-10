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
                        '<li id="'+value.id+'" class="list-group-item">'+value.name+
                            '<span class="pull-right">\
                                <a href="">Редакт.</a>\
                                <a href="">Удал.</a>\
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

    //Получаем данные в форму в зависимосьти от языка
    // задаем атрибут с абревиатурой языка
    function change_form(lang){
        $("#name").val(locale[lang].name);
        $("#title").val(locale[lang].title);
        $("#text").val(locale[lang].text);
        $("#name, #title, #text").attr('lang', lang);
    }

    //Данные из полей записываются в переменную
    $('body').on('change', ".exhibit-info", function(){
        var lang = $(this).attr('lang');
        var type = $(this).attr('id');
        locale[lang][type] = $(this).val();
    })

    // Создаем экспонат, сохраняем данные
    $('body').on('click', '#save', function(e){
        e.preventDefault();
        $.ajax({
            url: "api/exhibit",
            type: "POST",
            data: {locale: locale},
            success: function(data){
                show_list();
            },
            error: function(){

            }

        });
    });
});
