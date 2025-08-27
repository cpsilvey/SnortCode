<?php
function is_snortcode_user() {
    $current_user = wp_get_current_user();
    $roles = (array) $current_user->roles;
    $role = $roles[0];
    if ($role == 'SnortCode User') {
        return true;
    } else {
        return false;
    }
}
function is_snortcode_admin() {
    $current_user = wp_get_current_user();
    $roles = (array) $current_user->roles;
    $role = $roles[0];
    if ($role == 'SnortCode Admin' || $role == 'administrator') {
        return true;
    } else {
        return false;
    }
}