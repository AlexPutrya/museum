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
                    $("#exhibits_list").append('<div><li id="'+value.id+'" class="list-group-item">'+value.name+' <input toggle-id="'+value.id+'" class="switcher toggle-'+value.id+'" data-toggle="toggle" data-size="mini" data-onstyle="success" type="checkbox"></li>');
                    if(value.visibility == 1){
                        $('.toggle-'+value.id).bootstrapToggle('on');
                    }else{
                        $('.toggle-'+value.id).bootstrapToggle('off');
                    }
                });
                // снимаем все обработчики
                $(".switcher").unbind('change');
                // и заново вешаем новые обработчики так как функция будет часто вызыватся
                // и чтоб обработчики не наслаивались
                $("body").on('change','.switcher', function(){
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
            url: 'api/exhibit/'+id+'/visibilitu',
            type: "PATCH",
            success: function(){
                return true;
            },
            error: function(){

            }
        });
    }
});
