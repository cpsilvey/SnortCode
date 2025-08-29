<?php
function login() {
  $username_or_email = sanitize_text_field( $_POST['username'] ?? '' );
  $password          = $_POST['password'] ?? '';

  $error    = '';
  $redirect = '';

  // Try to find user by username first
  $user = get_user_by( 'login', $username_or_email );

  // If not found and input contains '@', try email
  if ( ! $user && strpos( $username_or_email, '@' ) !== false ) {
      $user = get_user_by( 'email', $username_or_email );
  }

  if ( ! $user ) {
      $error = 'Sorry, that account number or email does not exist';
  } elseif ( ! wp_check_password( $password, $user->data->user_pass, $user->ID ) ) {
      $error = 'Incorrect password';
  } else {
      // Build credentials with actual username
      $credentials = array(
          'user_login'    => $user->user_login,
          'user_password' => $password,
          'remember'      => true,
      );

      $login = wp_signon( $credentials, false );

      if ( ! is_wp_error( $login ) ) {
          $redirect = get_home_url() . '/my-codes/?login=true';
      } else {
          $error = 'Login failed. Please try again.';
      }
  }

  echo json_encode( array(
      'error'    => $error,
      'redirect' => $redirect,
  ) );

  wp_die();
}
add_action('wp_ajax_login', 'login');
add_action('wp_ajax_nopriv_login', 'login');