<?php
function add_portfolio_taxonomy() {
    register_taxonomy('portfolio_type', 'portfolio', array(
      'hierarchical' => true,
      'labels' => array(
        'name' => _x( 'Portfolio Types', 'taxonomy general name' ),
        'singular_name' => _x( 'Portfolio Types', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Types' ),
        'all_items' => __( 'All Types' ),
        'parent_item' => __( 'Parent Type' ),
        'parent_item_colon' => __( 'Parent Type:' ),
        'edit_item' => __( 'Edit Type' ),
        'update_item' => __( 'Update Type' ),
        'add_new_item' => __( 'Add New Type' ),
        'new_item_name' => __( 'New Type Name' ),
        'menu_name' => __( 'Portfolio Types' ),
      ),
      // Control the slugs used for this taxonomy
      'rewrite' => array(
        'slug' => 'types',
        'with_front' => false,
        'hierarchical' => true
      ),
    ));
  }
  add_action( 'init', 'add_portfolio_taxonomy', 0 );

  function add_skills_taxonomy() {
    register_taxonomy('skill_type', 'skills', array(
      'hierarchical' => true,
      'labels' => array(
        'name' => _x( 'Skill Types', 'taxonomy general name' ),
        'singular_name' => _x( 'Skill Types', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Types' ),
        'all_items' => __( 'All Types' ),
        'parent_item' => __( 'Parent Type' ),
        'parent_item_colon' => __( 'Parent Type:' ),
        'edit_item' => __( 'Edit Type' ),
        'update_item' => __( 'Update Type' ),
        'add_new_item' => __( 'Add New Type' ),
        'new_item_name' => __( 'New Type Name' ),
        'menu_name' => __( 'Skill Types' ),
      ),
      // Control the slugs used for this taxonomy
      'rewrite' => array(
        'slug' => 'types',
        'with_front' => false,
        'hierarchical' => true
      ),
    ));
  }
  add_action( 'init', 'add_skills_taxonomy', 0 );