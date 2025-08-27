<?php
function blankie_scripts()
  {
      // Deregister the jquery version bundled with WordPress.
    	wp_deregister_script( 'jquery' );
      // Enqueue Jquery
      wp_enqueue_script( 'jquery',     get_template_directory_uri() . '/js/jquery-3.5.0.js', array(), '3.5.0', false );
      // Enqueue Theme Scripts
      wp_enqueue_script( 'scripts',    get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0', true );
      // Enqueue slick slider Scripts
      wp_enqueue_script( 'slick',      get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), '1.0', true );
      // Enqueue slick header Scripts
      wp_enqueue_script( 'header',      get_template_directory_uri() . '/js/header.js', array( 'jquery' ), '1.0', true );
      // Enqueue Login Scripts
      wp_enqueue_script( 'login',      get_template_directory_uri() . '/js/login.js', array( 'jquery' ), '1.0', true );
      // Enqueue Form Scripts
      wp_enqueue_script( 'forms',      get_template_directory_uri() . '/js/forms.js', array( 'jquery' ), '1.0', true );
      // Enqueue Create Code Scripts
      wp_enqueue_script( 'create',      get_template_directory_uri() . '/js/create-code.js', array( 'jquery' ), '1.0', true );
      // Enqueue Edit Code Scripts
      wp_enqueue_script( 'edit',      get_template_directory_uri() . '/js/edit-code.js', array( 'jquery' ), '1.0', true );
      // Enqueue Generate Code Scripts
      wp_enqueue_script( 'generate',      get_template_directory_uri() . '/js/generate-code.js', array( 'jquery' ), '1.0', true );
  }

add_action('init', 'blankie_scripts'); // Add Scripts
