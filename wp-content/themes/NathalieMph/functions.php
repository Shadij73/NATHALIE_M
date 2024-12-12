<?php
/**
 * Enqueue styles and scripts
 */
function wpdocs_theme_name_scripts() {
    // Enqueue theme styles
    wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    
    // Enqueue theme scripts
    wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

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
 * Custom REST endpoint for filtering photos
 */
function filter_photos_api( $data ) {
    $category = isset( $data['category'] ) ? sanitize_text_field( $data['category'] ) : '';

    $photos = get_posts( array(
        'post_type'      => 'photo',
        'category_name'  => $category,
        'posts_per_page' => -1,
    ));

    if ( empty( $photos ) ) {
        return new WP_Error( 'no_photos', 'No photos found', array( 'status' => 404 ) );
    }

    return rest_ensure_response( $photos );
}
add_action('rest_api_init', function () {
    register_rest_route('nathalie-mota/v1', '/filter-photos', array(
        'methods'  => 'GET',
        'callback' => 'filter_photos_api',
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
