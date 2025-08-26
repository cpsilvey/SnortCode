<?php
function blankie_styles()
{
    //wp_register_style('blankie', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_register_style('blankie', get_template_directory_uri() . '/style.css', array(), filemtime(get_theme_file_path('/style.css')), 'all');
    wp_enqueue_style('blankie'); // Enqueue it!
}

add_action('wp_enqueue_scripts', 'blankie_styles'); // Add Theme Stylesheet
