$('body').on('click', '#create-account-submit', function(e) {
    e.preventDefault();

    var first = $('#create-account-first').val();
    var last = $('#create-account-last').val();
    var email = $('#create-account-email').val();
    var pass = $('#create-account-pass').val();
    var pass2 = $('#create-account-pass2').val();
    var error = '';
    // Validate //
    $('#create-account-messages').empty();
    if (!first) {
        $('#create-account-first').addClass('error');
        $('#create-account-messages').append("<li>First Name is required</li>");
        error = 'true';
    }
    if (!last) {
        $('#create-account-last').addClass('error');
        $('#create-account-messages').append("<li>Last Name is required</li>");
        error = 'true';
    }
    if (!email) {
        $('#create-account-email').addClass('error');
        $('#create-account-messages').append("<li>Email is required</li>");
        error = 'true';
    }
    if (!pass) {
        $('#create-account-pass').addClass('error');
        $('#create-account-messages').append("<li>Password is required</li>");
        error = 'true';
    }
    if (!pass2) {
        $('#create-account-pass2').addClass('error');
        $('#create-account-messages').append("<li>Please confirm your password</li>");
        error = 'true';
    }

    if (error == 'true') {
        return;
    }
    var data = {
        'action': 'create_account',
      };
    
      jQuery.ajax({
      type: "POST",
      dataType: "html",
      url: ajaxurl,
      data: data,
        dataType: 'html',
          success: function(response){
            console.log('success');
        },
      });
});