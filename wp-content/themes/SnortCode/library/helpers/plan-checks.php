<?php
function plan_is_free() {
    $current_user = wp_get_current_user();
    $plan = get_field('snortcode_plan', 'user_'.$current_user->ID);
    return (isset($plan['value']) && $plan['value'] === 'free');
}

function plan_is_plus() {
    $current_user = wp_get_current_user();
    $plan = get_field('snortcode_plan', 'user_'.$current_user->ID);
    return (isset($plan['value']) && $plan['value'] === 'plus');
}
function plan_is_premium() {
    $current_user = wp_get_current_user();
    $plan = get_field('snortcode_plan', 'user_'.$current_user->ID);
    return (isset($plan['value']) && $plan['value'] === 'premium');
}