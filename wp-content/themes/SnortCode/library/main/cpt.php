<?php
// Portfolio CPT 
function portfolio_cpt() {

	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'blankie' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'blankie' ),
		'menu_name'             => __( 'Portfolio', 'blankie' ),
		'name_admin_bar'        => __( 'Portfolio', 'blankie' ),
		'archives'              => __( 'Portfolio Archives', 'blankie' ),
		'attributes'            => __( 'Portfolio Attributes', 'blankie' ),
		'parent_item_colon'     => __( 'Parent Item:', 'blankie' ),
		'all_items'             => __( 'All Items', 'blankie' ),
		'add_new_item'          => __( 'Add New Item', 'blankie' ),
		'add_new'               => __( 'Add New', 'blankie' ),
		'new_item'              => __( 'New Item', 'blankie' ),
		'edit_item'             => __( 'Edit Item', 'blankie' ),
		'update_item'           => __( 'Update Item', 'blankie' ),
		'view_item'             => __( 'View Item', 'blankie' ),
		'view_items'            => __( 'View Items', 'blankie' ),
		'search_items'          => __( 'Search Item', 'blankie' ),
		'not_found'             => __( 'Not found', 'blankie' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'blankie' ),
		'featured_image'        => __( 'Featured Image', 'blankie' ),
		'set_featured_image'    => __( 'Set featured image', 'blankie' ),
		'remove_featured_image' => __( 'Remove featured image', 'blankie' ),
		'use_featured_image'    => __( 'Use as featured image', 'blankie' ),
		'insert_into_item'      => __( 'Insert into item', 'blankie' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'blankie' ),
		'items_list'            => __( 'Items list', 'blankie' ),
		'items_list_navigation' => __( 'Items list navigation', 'blankie' ),
		'filter_items_list'     => __( 'Filter items list', 'blankie' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'blankie' ),
		'description'           => __( 'Portfolio', 'blankie' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio_cpt', 0 );

// Skills CPT 
function skills_cpt() {

	$labels = array(
		'name'                  => _x( 'Skills', 'Post Type General Name', 'blankie' ),
		'singular_name'         => _x( 'Skills', 'Post Type Singular Name', 'blankie' ),
		'menu_name'             => __( 'Skills', 'blankie' ),
		'name_admin_bar'        => __( 'Skills', 'blankie' ),
		'archives'              => __( 'Skills Archives', 'blankie' ),
		'attributes'            => __( 'Skills Attributes', 'blankie' ),
		'parent_item_colon'     => __( 'Parent Item:', 'blankie' ),
		'all_items'             => __( 'All Items', 'blankie' ),
		'add_new_item'          => __( 'Add New Item', 'blankie' ),
		'add_new'               => __( 'Add New', 'blankie' ),
		'new_item'              => __( 'New Item', 'blankie' ),
		'edit_item'             => __( 'Edit Item', 'blankie' ),
		'update_item'           => __( 'Update Item', 'blankie' ),
		'view_item'             => __( 'View Item', 'blankie' ),
		'view_items'            => __( 'View Items', 'blankie' ),
		'search_items'          => __( 'Search Item', 'blankie' ),
		'not_found'             => __( 'Not found', 'blankie' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'blankie' ),
		'featured_image'        => __( 'Featured Image', 'blankie' ),
		'set_featured_image'    => __( 'Set featured image', 'blankie' ),
		'remove_featured_image' => __( 'Remove featured image', 'blankie' ),
		'use_featured_image'    => __( 'Use as featured image', 'blankie' ),
		'insert_into_item'      => __( 'Insert into item', 'blankie' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'blankie' ),
		'items_list'            => __( 'Items list', 'blankie' ),
		'items_list_navigation' => __( 'Items list navigation', 'blankie' ),
		'filter_items_list'     => __( 'Filter items list', 'blankie' ),
	);
	$args = array(
		'label'                 => __( 'Skills', 'blankie' ),
		'description'           => __( 'Skills', 'blankie' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'skills', $args );

}
add_action( 'init', 'skills_cpt', 0 );