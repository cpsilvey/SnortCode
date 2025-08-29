<?php
function view_preference() {
    $view = $_POST['view'];
    $current_user = wp_get_current_user();
    update_field('my_codes_view', $view, 'user_'.$current_user->ID);
    wp_die();
}
add_action( 'wp_ajax_view_preference', 'view_preference' );