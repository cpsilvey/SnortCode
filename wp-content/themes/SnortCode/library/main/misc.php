<?php
// Remove Admin bar
function remove_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar

function get_user_initials() {
    $current_user = wp_get_current_user();

    // Get initials (uppercase)
    $initials = strtoupper(substr($current_user->first_name, 0, 1) . substr($current_user->last_name, 0, 1));

    return $initials;
}
