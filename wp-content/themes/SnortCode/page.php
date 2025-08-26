<?php 
$page = get_the_title();

if (is_user_logged_in()) {
	if ($page == 'Dashboard') {
		get_template_part('dashboard/dashboard');
	} else {

    }
} else {
    get_template_part('login/login');
	
}
