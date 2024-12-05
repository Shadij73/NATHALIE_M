<?php
// Enqueue styles and scripts
function nathalie_mota_child_assets() {
    wp_enqueue_style('child-style', get_stylesheet_uri());
    wp_enqueue_script('child-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'nathalie_mota_child_assets');

// Add custom REST endpoint for filtering photos
function filter_photos_api() {
    // Custom logic to filter photos based on categories or formats
}
add_action('rest_api_init', function () {
    register_rest_route('nathalie-mota/v1', '/filter-photos', array(
        'methods' => 'GET',
        'callback' => 'filter_photos_api',
    ));
});
?>
