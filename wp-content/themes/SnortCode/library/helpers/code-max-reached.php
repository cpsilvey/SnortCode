<?php
function code_max_reached() {
    $current_user = wp_get_current_user();
    $current_user_id = $current_user->ID;
    
    // Get values from settings page //
    $free_code_max = get_field('free_max_codes', 'option');
    $plus_code_max = get_field('plus_max_codes', 'option');
    $premium_code_max = get_field('premium_max_codes', 'option');


    $args = array(
        'post_type'   => 'codes',
        'meta_query'     => array(
            array(
                'key'   => 'owner_id',             // name of your custom field
                'value' => $current_user->ID,      // match current user's ID
                'compare' => '='
            )
        ),
        'posts_per_page' => -1,
        'post_status' => 'publish', // only count published posts (to accommodate deactivated code function)
    );
    $codes = get_posts($args);
    $code_count = count($codes);
    if (plan_is_free()) {
        if ($code_count >= $free_code_max) {
            return true;
        } else {
            return;
        }
    } else if (plan_is_plus()) {
        if ($code_count >= $plus_code_max) {
            return true;
        } else {
            return;
        }
    } else if (plan_is_premium()) {
        if ($code_count >= $premium_code_max) {
            return true;
        } else {
            return;
        }
    } 
}