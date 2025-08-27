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
        $('#static-url-container').css('display','block');
        $('#dynamic-url-container').css('display','none');
    } else if (value == 'dynamic') {
        $('#static-url-container').css('display','none');
        $('#dynamic-url-container').css('display','block');
    } else if (value == 'vcard') {
        $('#static-url-container').css('display','none');
        $('#dynamic-url-container').css('display','none');
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