$(document).ready(function(){

    show_list();

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
});
