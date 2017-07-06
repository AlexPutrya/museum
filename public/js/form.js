$(document).ready(function(){

    var en = "Hello";
    var ru = "Привет";
    var ua = "Привіт";

    $(".lang").click(function(e){
        en = "Hello my friend";
        e.preventDefault();
        switch ($(this).attr('id')) {
            case 'en':
                change_form(en);
                break;
            case 'ru':
                change_form(ru);
                break;
            case 'ua':
                change_form(ua);
                break;
            default:

        }
    });

    $('body').on('change', "#name", function(){
        ua = $(this).val();
    })

    function change_form(text){
        $("#name").val(text);
    }
});
