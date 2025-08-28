$('body').on('click', '#create-account-submit', function(e) {
    e.preventDefault();

    // Grab values
    const first = $('#create-account-first').val().trim();
    const last = $('#create-account-last').val().trim();
    const email = $('#create-account-email').val().trim();
    const pass = $('#create-account-pass').val();
    const confirmPass = $('#create-account-pass2').val();
    const honeypot = $("#website").val().trim();

    let error = false;

    // Clear old errors
    $('#create-account-messages').empty();
    $('#create-account input').removeClass('error');

    // Helper to add error
    function addError(selector, message) {
        $(selector).addClass('error');
        $('#create-account-messages').append(`<li>${message}</li>`);
        error = true;
    }
    if (honeypot) {
        addError('#website', 'Spam detected');
        return;
    }
    if (!first) addError('#create-account-first', 'First Name is required');
    if (!last) addError('#create-account-last', 'Last Name is required');

    if (!email) {
        addError('#create-account-email', 'Email is required');
    } else if (!isValidEmail(email)) {
        addError('#create-account-email', 'Email seems invalid');
    }

    if (!pass) {
        addError('#create-account-pass', 'Password is required');
    } else if (!isStrongPassword(pass)) {
        addError('#create-account-pass', 'Password must be at least 12 characters');
    }

    if (!confirmPass) {
        addError('#create-account-pass2', 'Please confirm your password');
    } else if (!passwordsMatch(pass, confirmPass)) {
        addError('#create-account-pass2', 'Passwords do not match');
        $('#create-account-pass').addClass('error');
    }

    if (error) return;

    $('#overlay').addClass('active');

    // Process form through AJAX
    var data = {
        'first': first,
        'last': last,
        'email': email,
        'pass': pass,
        'action': 'create_account',
    };

    $.ajax({
        type: "POST",
        url: ajaxurl,
        data: data,
        dataType: 'json',
        success: function(data) {
            if (data.error_email) {
                $('#create-account-messages').append('<li>' + data.error_email +'</li>');
                $('#overlay').removeClass('active');
            } else {
                var redirect = data.redirect;
                window.location.replace(redirect);
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