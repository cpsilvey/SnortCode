<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'create') {
        get_template_part('my-codes/create-code');
    } else if ($action == 'edit') {
        get_template_part('my-codes/edit-code');
    }
} else {
    get_template_part('my-codes/list-codes');
}   
?>