<?php
function edit_code() {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $url = $_POST['url'];
    $dot_style = $_POST['dot_style'];
    $dot_color_mode = $_POST['dot_color_mode'];


    // Sanitize Fields //



    // Update Fields //
    update_field('name', $name, $id);
    update_field('url', $url, $id);
    update_field('dot_style', $dot_style, $id);
    update_field('dot_color_mode', $dot_color_mode, $id);

    $arr = array(
        'name' => $name,
        'url' => $url,
        'dot_style' => $dot_style,
        'dot_color_mode' => $dot_color_mode,
    );
    echo json_encode($arr);

    wp_die();
}
add_action('wp_ajax_edit_code', 'edit_code');
add_action('wp_ajax_nopriv_edit_code', 'edit_code');