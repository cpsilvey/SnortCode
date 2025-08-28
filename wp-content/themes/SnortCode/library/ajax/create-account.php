<?php
function create_account() {
    // Sanitize incoming data
    $first = sanitize_text_field( $_POST['first'] ?? '' );
    $last  = sanitize_text_field( $_POST['last'] ?? '' );
    $email = sanitize_email( $_POST['email'] ?? '' );
    $pass  = $_POST['pass'] ?? ''; // don’t sanitize password, keep raw

    // Create Unique Username
    $username = generate_unique_account_number(8); // e.g., "00458219"

    // Validate email
    $error_email = '';
    if ( ! is_email( $email ) ) {
        $error_email = 'Invalid email format';
    } elseif ( email_exists( $email ) ) {
        $error_email = 'Email is already registered';
    }

    if ( ! empty( $error_email ) ) {
        echo json_encode( array(
            'error_email' => $error_email,
        ) );
        wp_die();
    }

    /****** Create User ******/
    $userdata = array(
        'user_login' => $username,
        'user_pass'  => $pass,
        'first_name' => $first,
        'last_name'  => $last,
        'user_email' => $email,
        'role'       => 'snortcode_user',
    );

    $user_id = wp_insert_user( $userdata );

    if ( is_wp_error( $user_id ) ) {
        echo json_encode( array(
            'error' => $user_id->get_error_message(),
        ) );
        wp_die();
    }

    // Retrieve the full user object
    $user = get_user_by( 'id', $user_id );

    // Auto login
    wp_set_current_user( $user_id, $user->user_login );
    wp_set_auth_cookie( $user_id, true ); // true = remember me
    do_action( 'wp_login', $user->user_login, $user );

    // Success redirect
    echo json_encode( array(
        'redirect' => get_home_url() . '/my-codes',
    ) );

    wp_die();
}
add_action( 'wp_ajax_create_account', 'create_account' );
add_action( 'wp_ajax_nopriv_create_account', 'create_account' );


function generate_unique_account_number( $length = 8 ) {
    do {
        // Generate random number with leading zeros
        $account_number = str_pad( strval( mt_rand( 0, pow( 10, $length ) - 1 ) ), $length, '0', STR_PAD_LEFT );

        // Check if username already exists
        $user = get_user_by( 'login', $account_number );
    } while ( $user !== false );

    return $account_number;
}