<?php 
$page = get_the_title();

if (is_user_logged_in()) {
    get_header();
	if ($page == 'Dashboard') {
		get_template_part('dashboard/dashboard');
	} else if (is_single() && 'codes' == get_post_type()) {
		get_template_part('codes/codes');
    } else if ($page == 'My Codes') {
        get_template_part('my-codes/my-codes');
	} else if ($page == 'My Profile') {
        get_template_part('my-profile/my-profile');
    }
    get_footer();
} else {
    get_template_part('login/login');
	
}