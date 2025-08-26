$('body').on('click', '.create-code', function() {
    var data = {
      'action': 'create_code',
    };
    jQuery.ajax({
    type: "POST",
    dataType: "html",
    url: ajaxurl,
    data: data,
      success: function(response){
       console.log('complete');
      },
    });
  });