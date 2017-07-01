$(document).ready(function(){

    function showList(){
        $.ajax({
            url: 'api/exhibits',
            type: 'GET',
            success: function(data){
                $.each(data.exhibits, function(key, value){

                });
            }
        });
    }
});
