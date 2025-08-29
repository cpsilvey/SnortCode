$('body').on('click', '.view-button', function() {
    $(this).siblings().removeClass('active');
    if ($(this).hasClass('active')) {
    } else {
        $(this).addClass('active'); 
    }
    const view = $(this).attr('data-value');

    // switch view //
    if (view == 'list') {
        $('#code-list li').removeClass('grid');
        $('#code-list li').addClass('list');
        $('#code-list').removeClass('grid');
        $('#code-list').addClass('list');
    } else if (view == 'grid') {
        $('#code-list li').removeClass('list');
        $('#code-list li').addClass('grid');
        $('#code-list').removeClass('list');
        $('#code-list').addClass('grid');
    }
    

    // Send choice to ajax to save to user meta //
    var data = {
        'view': view,
        'action': 'view_preference',
      };
      jQuery.ajax({
      type: "POST",
      dataType: "html",
      url: ajaxurl,
      data: data,
        dataType: 'html',
          success: function(response){
        },
      });
});