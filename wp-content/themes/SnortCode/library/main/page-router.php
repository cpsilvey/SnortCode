<?php
function page_router() {
    $page = get_the_title();

    // Define your page → template mapping
    $routes = [
        'Home'       => 'home/home',
        'Features'   => 'features/features',
        'Plans'      => 'plans/plans',
        'Contact'    => 'contact/contact',
        'About'      => 'about/about',
        'Create Account' => 'create-account/create-account',
        'My Codes'   => 'my-codes/my-codes',
        'Account' => 'account/account',
        'Login'      => 'login/login',
        'Recover Password' => 'recover-password/recover-password',
    ];

    if (array_key_exists($page, $routes)) {
        // For protected pages
        if (in_array($page, ['My Codes', 'Account'])) {
            if (is_user_logged_in()) {
                get_template_part($routes[$page]);
            } else {
                get_template_part('login/login');
            }
        } else {
            // Public pages
            get_template_part($routes[$page]);
        }
    } else {
        // Fallback template (404, default page, etc.)
        get_template_part('404');
    }
}