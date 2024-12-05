<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue CSS and JavaScript files
function NathalieMph_enqueue_scripts() {
    // Enqueue the main stylesheet
    wp_enqueue_style('NathalieMph-style', get_stylesheet_uri());
    
    // Enqueue a custom JavaScript file (if applicable)
    wp_enqueue_script('NathalieMph-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'NathalieMph_enqueue_scripts');

// Add theme support for WordPress features
function NathalieMph_setup() {
    // Enable support for the title tag
    add_theme_support('title-tag');

    // Enable support for featured images
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'NathalieMph'),
    ));
}
add_action('after_setup_theme', 'NathalieMph_setup');
