<?php
function create_code() {
    $current_user = wp_get_current_user();
    $name = $_POST['name'];
    $type = $_POST['type'];
    $url = $_POST['url'];
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
    // sanitize the inputs //

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

    $redirect = get_home_url().'/my-codes/?action=edit&id='.$post_id;
    $arr = array(
      'redirect' => $redirect,
    );
    echo json_encode($arr);
    wp_die();
}
add_action('wp_ajax_create_code', 'create_code');
add_action('wp_ajax_nopriv_create_code', 'create_code');