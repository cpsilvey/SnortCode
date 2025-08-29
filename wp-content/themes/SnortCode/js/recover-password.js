$('#recover-password-submit').click(function(e) {
    e.preventDefault();
    const username = $('#recover-password-username').val();
    
    // Client-Side Validation //
    // Clear old errors
    $('#recover-password-messages').empty();
    $('#recover-password input').removeClass('error');
    let error = false;

    function addError(selector, message) {
        $(selector).addClass('error');
        $('#recover-password-messages').append(`<li>${message}</li>`);
        error = true;
    }
    if (!username) addError('#recover-password-username', 'Please provide your email or account number');

    if (error) return;

    var data = {
        'username': username,
        'action': 'recover_password',
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
          if (error) {
              $('#recover-password-messages').append('<li>' + error + '</li>');
              $('#overlay').removeClass('active');
          } else {
            $('#recover-password-messages').append('<li class="green">' + data.success + '</li>');
            $('#overlay').removeClass('active');
          }
         
        },
      });
});

$('#reset-password-submit').click(function(e) {
    e.preventDefault();
    const userid = $('#reset-password-submit').attr('data-id');
    const newpass = $('#reset-password-newpass').val().trim();
    const newpass2 = $('#reset-password-newpass2').val().trim();

    // Client-Side Validation //
    // Clear old errors
    $('#reset-password-messages').empty();
    $('#reset-password input').removeClass('error');
    let error = false;

    // Helper to add errors
    function addError(selector, message) {
        $(selector).addClass('error');
        $('#reset-password-messages').append(`<li>${message}</li>`);
        error = true;
    }

    if (!newpass)  {
        addError('#reset-password-newpass', 'Password is required');
    } else if (!isStrongPassword(newpass)) {
        addError('#reset-password-newpass', 'Password must be at least 12 characters');
    }
    if (!newpass2) {
        addError('#reset-password-newpass2', 'Please confirm your password');
    } else if (!passwordsMatch(newpass, newpass2)) {
        addError('#reset-password-newpass2', 'Passwords do not match');
        $('#reset-password-pass').addClass('error');
    }

    if (error) return;

    var data = {
        'userid': userid,
        'newpass': newpass,
        'action': 'reset_pass'
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
            window.location.replace(data.redirect);
        },
    });
});

function isStrongPassword(password, minLength = 12) {
    return password && password.length >= minLength;
}
function passwordsMatch(password, confirmPassword) {
    return password === confirmPassword;
}