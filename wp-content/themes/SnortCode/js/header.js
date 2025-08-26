$(window).on('scroll',function(){
    if($(window).scrollTop()){
        $('header').addClass('sticky');
    }
    else{
        $('header').removeClass('sticky');
    }
})