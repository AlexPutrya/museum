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
                    $("#exhibits_list").append('<div><li id="'+value.id+'" class="list-group-item">'+value.name+' <input class="toggle-'+value.id+'" data-toggle="toggle" data-size="mini" data-onstyle="success" type="checkbox"></li>');
                    if(value.visibility == 1){
                        $('.toggle-'+value.id).bootstrapToggle('on');
                    }else{
                        $('.toggle-'+value.id).bootstrapToggle('off');
                    }
                });
            }
        });
    }
});
