<?php
/**
 * NathalieMph Theme Functions
 *
 * @package NathalieMph
 */

/**
 * Enqueue styles and scripts
 */
function nathaliemph_enqueue_scripts() {
    // Enqueue theme styles
    wp_enqueue_style( 'nathaliemph-style', get_stylesheet_uri() );

    // Enqueue theme scripts
    wp_enqueue_script( 
        'nathaliemph-script', 
        get_template_directory_uri() . '/js/script.js', 
        array('jquery'), // Add jQuery as a dependency
        '1.0.0', 
        true 
    );
}
add_action( 'wp_enqueue_scripts', 'nathaliemph_enqueue_scripts' );

/**
 * Register navigation menus
 */
function nathaliemph_register_menus() {
    register_nav_menus( array(
        'main-menu' => __( 'Main Menu', 'NathalieMph' ),
    ));
}
add_action( 'after_setup_theme', 'nathaliemph_register_menus' );

/**
 * Load theme textdomain for translations
 */
function nathaliemph_load_textdomain() {
    load_theme_textdomain( 'NathalieMph', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'nathaliemph_load_textdomain' );

/**
 * Custom REST endpoint for filtering photos
 */
function nathaliemph_filter_photos_api( $data ) {
    $category = isset( $data['category'] ) ? sanitize_text_field( $data['category'] ) : '';

    // Query for posts with limited fields
    $query = new WP_Query( array(
        'post_type'      => 'photo',
        'category_name'  => $category,
        'posts_per_page' => -1,
        'fields'         => 'ids', // Return only post IDs
    ));

    if ( empty( $query->posts ) ) {
        return new WP_Error( 'no_photos', 'No photos found', array( 'status' => 404 ) );
    }

    // Prepare custom response
    $photos = array();
    foreach ( $query->posts as $post_id ) {
        $photos[] = array(
            'id'    => $post_id,
            'title' => get_the_title( $post_id ),
        );
    }

    return rest_ensure_response( $photos );
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'nathalie-mota/v1', '/filter-photos', array(
        'methods'  => 'GET',
        'callback' => 'nathaliemph_filter_photos_api',
        'args'     => array(
            'category' => array(
                'validate_callback' => function( $param, $request, $key ) {
                    return is_string( $param );
                }
            ),
        ),
    ));
});
?>
