$('.snortcode-logout').click(function(e) {
    e.preventDefault();
    var data = {
        'action': 'snortcode_logout',
      };
    jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: ajaxurl,
        data: data,
          beforeSend: function() {
            //$('.loader').css('display', 'block');
          },
          dataType: 'json',
            success: function(data){
            var redirect = data.redirect;
            window.location.replace(redirect);           
          },
        });
});