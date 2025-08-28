<?php
function snortcode_logout() {
    wp_logout();
    $arr = array(
        'redirect' => get_home_url() . '/login/?logout=success',
    );
    echo json_encode($arr);

    wp_die();
}
add_action('wp_ajax_snortcode_logout', 'snortcode_logout');
add_action('wp_ajax_nopriv_snortcode_logout', 'snortcode_logout');