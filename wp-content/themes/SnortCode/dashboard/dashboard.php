<?php if (is_snortcode_user()) {
    echo 'User';
} else if (is_snortcode_admin()) {
    get_template_part('dashboard/dashboard-admin');
}