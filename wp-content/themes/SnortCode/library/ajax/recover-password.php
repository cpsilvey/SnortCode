<?php
function recover_password() {
    $username = sanitize_email($_POST['username'] ?? '');

     // Check if input is an email
     if ( is_email($username) ) {
        $user = get_user_by('email', $username);
    } else {
        $user = get_user_by('login', $username);
    }

    if ( ! $user ) {
        echo json_encode(['error' => "Sorry we couldn't find an account matching your input."]);
        wp_die();
    } else {
        $token = wp_generate_password(32, false, false); // 32-char random string
        $expiration = time() + 3600;
        // Place Token //
        update_field('password_recover_token', $token, 'user_'.$user->ID);
        update_field('password_recover_expiration', $expiration, 'user_'.$user->ID);
    }

    // Send mail with instruction on how to reset //

    echo json_encode(['success' => "An email has bent sent with instruction on how to reset your password"]);
    wp_die();
    
}
add_action( 'wp_ajax_recover_password', 'recover_password' );
add_action( 'wp_ajax_nopriv_recover_password', 'recover_password' );

function reset_pass() {
    $user_id = isset($_POST['userid']) ? absint($_POST['userid']) : 0;
    $newpass = isset($_POST['newpass']) ? trim($_POST['newpass']) : '';
    
    wp_set_password( $newpass, $user_id );

    // delete the token and expiration //
    update_field('password_recover_token', '', 'user_'.$user_id);
    update_field('password_recover_expiration', '', 'user_'.$user_id);

    $redirect = get_home_url().'/login/?password=reset';

    echo json_encode( array(
        'redirect' => $redirect,
    ) );
    wp_die();

}
add_action( 'wp_ajax_reset_pass', 'reset_pass' );
add_action( 'wp_ajax_nopriv_reset_pass', 'reset_pass' );