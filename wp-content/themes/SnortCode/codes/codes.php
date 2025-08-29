<?php
$action = $_GET['action'];
if ($action && $action == 'edit') {
    get_template_part('codes/edit-code');
} else {
    $id = get_the_id();
    $type = get_field('type', $id);
    $redirect = get_field('redirect', $id);
    $scan_data = get_field('scan_data', $id);

    // Update the scan data //
    // $time = time();
    // add_row('scan_data', array('time' => $time), $id);


    // Send the user somewhere //
    if ($type == 'dynamic') {
        // header("Location:".$redirect);
        // exit;
    } else if ($type == 'vcard') {
        echo 'vcard';
    }
}
