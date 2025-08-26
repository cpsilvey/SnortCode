<?php
function login() {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $credentials = array();
    $credentials['user_login'] = $username;
    $credentials['user_password'] = $password;
  
    if (!username_exists($username)) {
      $error = 'Sorry, that username does not exist.';
    } else {
      $user = get_user_by( 'login', $username );
      if ( $user && wp_check_password( $password, $user->data->user_pass, $user->ID ) ) {
          // After confirming $user exists and password is correct:
        $login = wp_signon( $credentials, false );
        if(isset($login_refer_folder) && $login_refer_folder != ''){
            $redirect = $login_refer_folder;
        } else {
            $redirect = get_home_url();
        }      
      } else {
        $error = 'Incorrect password';
      }
    }
  
    $arr = array(
      'error' => $error,
      'redirect' => $redirect,
    );
    echo json_encode($arr);
    wp_die();
  }
  add_action('wp_ajax_login', 'login');
  add_action('wp_ajax_nopriv_login', 'login');

  function logout() {
    wp_logout();
    $redirect = get_home_url().'/login?status=loggedout';
    $arr = array(
      'redirect' => $redirect,
    );
    echo json_encode($arr);
    wp_die();
  }
  add_action('wp_ajax_logout', 'logout');
  add_action('wp_ajax_nopriv_logout', 'logout');