$('body').on('click', '#edit-account-submit', function(e) {
    e.preventDefault();
    // Grab values
    const first = $('#edit-account-first').val().trim();
    const last = $('#edit-account-last').val().trim();
    const email = $('#edit-account-email').val().trim();
    const changepass = $('#change-pass').attr('data-value');
    const newpass = $('#edit-account-newpass').val().trim();
    const newpass2 = $('#edit-account-newpass2').val().trim();

    let error = false;

    // Clear old errors
    $('#edit-account-messages').empty();
    $('#edit-account input').removeClass('error');

    // Helper to add errors
    function addError(selector, message) {
        $(selector).addClass('error');
        $('#edit-account-messages').append(`<li>${message}</li>`);
        error = true;
    }

    if (!first) addError('#edit-account-first', 'First Name is required');
    if (!last) addError('#edit-account-last', 'Last Name is required');
    if (!email) {
        addError('#edit-account-email', 'Email is required');
    } else if (!isValidEmail(email)) {
        addError('#edit-account-email', 'Email seems invalid');
    }

    var data = {
        'first': first,
        'last': last,
        'email': email,
        'action': 'edit_account'
    };

    if (changepass == 'true') {
        if (!newpass)  {
            addError('#edit-account-newpass', 'Password is required');
        } else if (!isStrongPassword(newpass)) {
            addError('#edit-account-newpass', 'Password must be at least 12 characters');
        }
        if (!newpass2) {
            addError('#edit-account-newpass2', 'Please confirm your password');
        } else if (!passwordsMatch(newpass, newpass2)) {
            addError('#edit-account-newpass2', 'Passwords do not match');
            $('#edit-account-pass').addClass('error');
        }
    }

    data.newpass = newpass;

    if (error) return;

    $('#overlay').addClass('active');

    jQuery.ajax({
    type: "POST",
    dataType: "html",
    url: ajaxurl,
    data: data,
    beforeSend: function() {
    },
    dataType: 'json',
    success: function(data){
        if (data.error_email) {
            $('#edit-account-messages').append('<li>' + data.error_email +'</li>');
            $('#overlay').removeClass('active');
        } else {
            window.location.replace(data.redirect);
        }
    },
    });


});

function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
function isStrongPassword(password, minLength = 12) {
    return password && password.length >= minLength;
}
function passwordsMatch(password, confirmPassword) {
    return password === confirmPassword;
}


$('body').on('click', '#change-pass', function() {
    $('#pass-container').toggleClass('active');
 });