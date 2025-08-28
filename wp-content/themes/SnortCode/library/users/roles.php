<?php
function snortcode_add_roles() {
  $capabilities = array (
    'activate_plugins' => false,
    'delete_others_pages' => false,
    'delete_others_posts' => false,
    'delete_pages' => false,
    'delete_posts' => false,
    'delete_private_pages' => false,
    'delete_private_posts' => false,
    'delete_published_pages' => false,
    'delete_published_posts' => false,
    'edit_dashboard' => false,
    'edit_others_pages' => false,
    'edit_others_posts' => false,
    'edit_pages' => false,
    'edit_posts' => false,
    'edit_private_pages' => false,
    'edit_private_posts' => false,
    'edit_published_pages' => false,
    'edit_published_posts' => false,
    'edit_theme_options' => false,
    'export' => false,
    'import' => false,
    'list_users' => false,
    'manage_categories' => false,
    'manage_links' => false,
    'manage_options' => false,
    'moderate_comments' => false,
    'promote_users' => false,
    'publish_pages' => false,
    'publish_posts' => false,
    'read_private_pages' => false,
    'read_private_posts' => false,
    'read' => true,
    'remove_users' => false,
    'switch_themes' => false,
    'upload_files' => false,
    'customize' => false,
    'delete_site' => false,
    'update_core' => false,
    'update_plugins' => false,
    'update_themes' => false,
    'install_plugins' => false,
    'install_themes' => false,
    'upload_plugins' => false,
    'upload_themes' => false,
    'upload_files' => false,
    'delete_themes' => false,
    'delete_plugins' => false,
    'edit_plugins' => false,
    'edit_themes' => false,
    'edit_files' => false,
    'edit_users' => false,
    'create_users' => false,
    'delete_users' => false,
    'unfiltered_html' => false,
  );

  // Only add if they don't exist
  if ( ! get_role( 'snortcode_user' ) ) {
      add_role( 'snortcode_user', __( 'SnortCode User' ), $capabilities );
  }

  if ( ! get_role( 'snortcode_admin' ) ) {
      add_role( 'snortcode_admin', __( 'SnortCode Admin' ), $capabilities );
  }

  remove_role( 'subscriber' );
  remove_role( 'editor' );
  remove_role( 'author' );
  remove_role( 'contributor' );
}
add_action( 'after_switch_theme', 'snortcode_add_roles' );

// Redirect users when they try to access wp-admin
add_action( 'admin_init', function() {
  $user = wp_get_current_user();
  $redirect = get_home_url();

  if ( in_array( 'snortcode_user', (array) $user->roles ) && ! defined( 'DOING_AJAX' ) ) {
      wp_redirect($redirect); // or your front-end dashboard URL
      exit;
  }
});