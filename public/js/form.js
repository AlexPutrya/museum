$(document).ready(function(){
    // Загружаем страницу с очищенными полями и по умолчанию заданным русским языком для статьи
    $('.exhibit-info').val('');
    $("#name, #title, #text").attr('lang', 'ru');
    $("a#ru").css({color: 'black'});

    var locale = {
        en: {name : '', title: '', text : ''},
        ru: {name : '', title: '', text : ''},
        ua: {name : '', title: '', text : ''}
    };

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

    $('body').on('change', ".exhibit-info", function(){
        var lang = $(this).attr('lang');
        var type = $(this).attr('id');
        locale[lang][type] = $(this).val();
    })
});
