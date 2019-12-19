var $pegaObjeto = $('.anime'), animacaoDaclasse = 'anime-start',offset = $(window).height() *3/4;

function animacao(){
    var documentTop = $(document).scrollTop();
    $pegaObjeto.each(function(){
        console.log(documentTop);
        var itemTop = $(this).offset().top;
        if(documentTop > itemTop - offset){
            $(this).addClass(animacaoDaclasse);
        }else{
             $(this).removeClass(animacaoDaclasse);
        }
    });
    
}

$(document).scroll(function(){
    animacao();
});