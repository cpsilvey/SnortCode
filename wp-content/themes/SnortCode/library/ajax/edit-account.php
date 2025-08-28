<?php
function edit_account() {
    $current_user = wp_get_current_user();
    // Sanitize incoming data
    $first = sanitize_text_field( $_POST['first'] ?? '' );
    $last  = sanitize_text_field( $_POST['last'] ?? '' );
    $email = sanitize_email( $_POST['email'] ?? '' );
    $newpass  = $_POST['newpass'] ?? ''; // don’t sanitize password, keep raw

    $userdata = array(
        'ID'         => $current_user->ID,
        'first_name' => $first,
        'last_name'  => $last,
        'user_email' => $email,
    );

    // Validate email
    $error_email = '';

    // Check if email changed
    if ( $email && $email !== $current_user->user_email ) {
        if ( email_exists( $email ) ) {
            $error_email = 'That email is already registered with another account.';
        }
    }

    // Password check (only if changed)
    if ( ! empty( $newpass ) ) {
        if ( wp_check_password( $newpass, $current_user->user_pass, $current_user->ID ) ) {
            // They entered the same password as before → skip
        } else {
            $userdata['user_pass'] = $newpass;
        }
    }

    if ( ! empty( $error_email ) ) {
        echo json_encode( array(
            'error_email' => $error_email,
        ) );
        wp_die();
    }

    // Update user
    $updated = wp_update_user( $userdata );

    $redirect= get_home_url() . '/account/?update=success';

    // Success redirect
    echo json_encode( array(
        'redirect' => $redirect,
    ) );

    wp_die();
}
add_action( 'wp_ajax_edit_account', 'edit_account' );
