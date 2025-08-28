$('body').on('click', '.custom-select-value', function(e) {
    $(this).removeClass('error');
    $('.custom-select-menu').removeClass('active');
    $(this).next().toggleClass('active');
    e.stopPropagation();
});
$('body').on('click', '.custom-select-menu li', function(e) {
    var label = $(this).html();
    var value = $(this).attr('data-value');
    $(this).parent().parent().find('.custom-select-value').html(label).attr('data-value', value);
    $(this).parent().removeClass('active');
    if (value == 'static') {
        
    } else if (value == 'dynamic') {
        
    } else if (value == 'vcard') {
        
    }
    e.stopPropagation();
});
  
$(document).click(function() {
    $('.custom-select-menu').removeClass('active');
});

$('body').on('click', '.custom-toggle', function() {
   var value = $(this).attr('data-value');
   if (value == 'false') {
        $(this).addClass('active');
        $(this).attr('data-value', 'true');
   } else if (value == 'true') {
        $(this).removeClass('active');
        $(this).attr('data-value', 'false');
   }
});

$('body').on('click', '.custom-radio-option', function() {
    $(this).siblings().removeClass('active');
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $(this).addClass('active');
        var value = $(this).attr('data-value');
        $(this).parent().attr('data-value', value);
    }
});

$('body').on('click', '.image-radio-option', function() {
    $(this).siblings().removeClass('active');
    if ($(this).hasClass('active')) {
    } else {
        $(this).addClass('active');
        var value = $(this).attr('data-value');
        $(this).parent().attr('data-value', value);
    }
});

$('body').on('click', '.toggle-pill-option', function() {
    $(this).siblings().removeClass('active');
    if ($(this).hasClass('active')) {
    } else {
        $(this).addClass('active');
        var value = $(this).attr('data-value');
        $(this).parent().attr('data-value', value);
    }
});