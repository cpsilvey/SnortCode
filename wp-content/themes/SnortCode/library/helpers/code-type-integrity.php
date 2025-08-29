<?php
function code_type_integrity($type) {
    // Get the current user & plan level //
    $current_user = wp_get_current_user();
    $plan = get_field('snortcode_plan', 'user_'.$current_user->ID);

    // Check if the type is in the approved list //
    if ( ! in_array( $type, ['static', 'dynamic', 'vcard'], true ) ) {
        return false;
    }

    // See if they have the ability to create the code type //
    if ( $plan['value'] === 'free' && $type !== 'static' ) {
        return false; // free users only allowed 'static'
    }
    return true; // all others allowed
}