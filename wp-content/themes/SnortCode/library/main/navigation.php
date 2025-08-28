<?php
function blankie_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => '',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="main-menu clearfix">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function blankie_user_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'user-menu',
		'menu'            => '',
		'container'       => '',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="user-menu clearfix">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function register_blankie_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'blankie'), // Main Navigation
		'user-menu' => __('User Menu', 'blankie'), // Footer Navigation
		));
}

add_action('init', 'register_blankie_menu');