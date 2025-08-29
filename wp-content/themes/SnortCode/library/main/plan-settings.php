<?php
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Plan Settings',   // Title in browser tab
        'menu_title'    => 'Plan Settings',   // Title in WP Admin menu
        'menu_slug'     => 'plan-settings',   // URL slug
        'capability'    => 'edit_posts',      // Required capability
        'redirect'      => false              // Prevents creating subpages
    ));

}