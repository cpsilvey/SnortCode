$('#login-submit').click(function(e) {
    e.preventDefault();
    var username = $('#login-username').val();
    var password = $('#login-pass').val();
    
    // Client-Side Validation //
    // Clear old errors
    $('#login-form-messages').empty();
    $('#login input').removeClass('error');
    let error = false;

    function addError(selector, message) {
      $(selector).addClass('error');
      $('#login-form-messages').append(`<li>${message}</li>`);
      error = true;
    }
    if (!username) addError('#login-username', 'Username is required');
    if (!password) addError('#login-pass', 'Password is required');
    
    if (error) return;
    
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
        $('#overlay').addClass('active');
      },
      dataType: 'json',
        success: function(data){
        var error = data.error;
        var redirect = data.redirect;
        if (error) {
            $('#login-form-messages').append('<li>' + error + '</li>');
            $('#overlay').removeClass('active');
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