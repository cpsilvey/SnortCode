<?php
function create_account() {
    
    // Validate //
    
    
    /****** Create Corresponding CPT for storing QR Data ******/

    wp_die();
}
add_action('wp_ajax_create_account', 'create_account');
add_action('wp_ajax_nopriv_create_account', 'create_account');