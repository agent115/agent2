/*
$(document).ready(function(){
    $('.service-wrapper img').hover(
        function(){
            $(this).animate({'width':'100px'});
            //$(this).next().css({'display':'none'});
        },
        function(){
            $(this).animate({'width':'50px'});
            //$(this).next().css({'display':'block'});

        }
    );

});*/

$('.service-wrapper img').hover(
    function(){
       $(this).animate({'width':'100px'},100);
       
       //$(this).next().css({'display':'none'});
    },
    function(){
       $(this).animate({'width':'50px'},1000);
       
       //$(this).next().css({'display':'block'});

    }
);

$('ul a').each(function () {
    if (this.href == location.href) $(this).parent().addClass('active');

});

