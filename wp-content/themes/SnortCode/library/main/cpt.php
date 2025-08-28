<?php
// Portfolio CPT 
function snortcode_register_qr_cpt() {
    register_post_type( 'codes', array(
        'labels' => array(
            'name'          => __( 'QR Codes' ),
            'singular_name' => __( 'QR Code' ),
        ),
        // Not publicly queryable (no archives/singles)
        'public'              => false,
        'publicly_queryable'  => false,
        
        // Allow manual inspection in admin during dev
        'show_ui'             => true,   // flip to false for prod
        'show_in_menu'        => true,   // flip to false for prod

        // Don’t generate permalinks or rewrite rules
        'rewrite'             => false,
        'has_archive'         => false,

        // Minimal fields you need
        'supports'            => array( 'title', 'custom-fields', 'author' ),
    ));
}
add_action( 'init', 'snortcode_register_qr_cpt' );