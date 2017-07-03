$(document).ready(function(){
    $("#drop").hover(function(){
        $(".submenu").css({display : "block"});
        setTimeout(function(){
            $(".submenu").css({display : "none"});
        }, 2000);
    });
});
