$(window).on('scroll',function(){
    if($(window).scrollTop()){
        $('header').addClass('sticky');
    }
    else{
        $('header').removeClass('sticky');
    }
})

$('#user-menu-toggle').click(function(e) {
    e.stopPropagation();
    e.preventDefault();
    $('#user-account-menu').toggleClass('active');
});

$(document).on('click', function(e) {
    var $el = $('#user-account-menu');
    if (!$el.is(e.target) && $el.has(e.target).length === 0) {
      $el.removeClass('active');
    }
});