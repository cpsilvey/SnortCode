<?php
$action = $_GET['action'];

if ($action == 'create') {
    get_template_part('my-codes/create-code');
} else {
    get_template_part('my-codes/list-codes');
}
?>