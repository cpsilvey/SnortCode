$('#login-submit').click(function(e) {
    e.preventDefault();
    var username = $('#login-username').val();
    var password = $('#login-pass').val();
    var data = {
      'username': username,
      'password': password,
      'action': 'login',
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
        var error = data.error;
        var redirect = data.redirect;
        if (error) {
            $('#login-form-message').html(error);
        } else {
            window.location.replace(redirect);
        }
       
      },
    });
  })

  $('#logout-submit').click(function(e) {
    e.preventDefault();
    var data = {
      'action': 'logout',
    };
    jQuery.ajax({
    type: "POST",
    dataType: "html",
    url: ajaxurl,
    data: data,
      beforeSend: function() {
      },
      dataType: 'json',
      success: function(data){
        var redirect = data.redirect;
        window.location.replace(redirect);
      },
    });
  })