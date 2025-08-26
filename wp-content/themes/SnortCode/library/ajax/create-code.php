<?php
function create_code() {

    
    
    wp_die();
}
add_action('wp_ajax_create_code', 'create_code');
add_action('wp_ajax_nopriv_create_code', 'create_code');