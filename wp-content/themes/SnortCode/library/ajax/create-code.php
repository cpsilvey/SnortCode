<?php
function create_code() {
    // First see if their code max is reached //
    if (code_max_reached()) {
        echo json_encode( array(
            'error_max' => 'You have reached your maximum limit of allowed codes.'
        ));
        wp_die();
    }
    $current_user = wp_get_current_user();
    // Sanitize raw input data //
    $name = sanitize_text_field( $_POST['name'] ?? '' );
    $type = sanitize_text_field( $_POST['type'] ?? '' );
    // Validate and sanitize the url //
    $url = validate_url($_POST['url']);
    if ( $url === false ) {
        echo json_encode( array(
            'error_url' => 'Invalid URL. Please enter a valid URL (http/https).'
        ));
        wp_die();
    }
    // Check incoming data for integrity or client side manipulation //
    if ( ! code_type_integrity( $type ) ) {
        echo json_encode( array(
            'error_type' => 'You do not have the ability to create this code type.'
        ));
        wp_die();
    }

    // Create a unique post title //
    if ( ! function_exists( 'post_exists' ) ) {
        require_once ABSPATH . 'wp-admin/includes/post.php';
    }
    function generate_unique_post_title() {
        do {
            // Generate random 12-digit number
            $number = random_int(100000000000, 999999999999);
            $title  = $number;
    
            // Check if post with this title already exists
            $exists = post_exists( $title );
    
        } while ( $exists ); // keep looping until title is unique
    
        return $title;
    }
    $unique_title = generate_unique_post_title();

    
    // add code //
    $new_post = array(
    'post_title'    => $unique_title,
    'post_status'   => 'publish',   // 'draft', 'pending', 'publish', 'future'
    'post_author'   => $current_user->ID,           // User ID
    'post_type'     => 'codes',      // 'post', 'page', or your custom post type
    );
      
    $post_id = wp_insert_post($new_post);

    update_field('name', $name, $post_id);
    update_field('type', $type, $post_id);
    update_field('url', $url, $post_id);
    update_field('owner_id', $current_user->ID, $post_id);
    update_field('owner_account', $current_user->user_login, $post_id);
    update_field('type', $type, $post_id);

    $redirect = get_home_url().'/my-codes/';
    $arr = array(
      'redirect' => $redirect,
    );
    echo json_encode($arr);
    wp_die();
}
add_action('wp_ajax_create_code', 'create_code');
add_action('wp_ajax_nopriv_create_code', 'create_code');