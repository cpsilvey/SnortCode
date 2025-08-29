<?php
function code_max_reached() {
    $current_user = wp_get_current_user();
    $current_user_id = $current_user->ID;
    
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
    );
    $codes = get_posts($args);
    $code_count = count($codes);
    if (plan_is_free()) {
        if ($code_count >= 10) {
            return true;
        } else {
            return;
        }
    } else if (plan_is_plus()) {
        if ($code_count >= 50) {
            return true;
        } else {
            return;
        }
    } else if (plan_is_premium()) {
        if ($code_count >= 250) {
            return true;
        } else {
            return;
        }
    } 
}