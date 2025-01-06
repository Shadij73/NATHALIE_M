<?php
/**
 * NathalieMph Theme Functions
 *
 * @package NathalieMph
 */

/**
 * Enqueue styles and scripts.
 */
function nathaliemph_enqueue_assets() {
    // Theme stylesheet
    wp_enqueue_style(
        'nathaliemph-style', 
        get_stylesheet_uri(), 
        array(), 
        wp_get_theme()->get('Version') // Automatically uses theme version for cache busting
    );

    // Theme CSS

    wp_enqueue_style(
        'nathaliemph-theme-style',
        get_template_directory_uri() . '/css/style.css' // Theme CSS file
    );
    wp_enqueue_style(
        'nathaliemph-modal-style',
        get_template_directory_uri() . '/css/modal.css' // Modal CSS file
    );

    // Theme JavaScript
    wp_enqueue_script(
        'nathaliemph-script', 
        get_template_directory_uri() . '/js/script.js', 
        array('jquery'), 
        '1.0.0', 
        true // Load script in the footer
    );

    // jQuery UI (for potential modal enhancements)
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-dialog');

    // Custom JavaScript for modal handling
    wp_enqueue_script(
        'nathaliemph-modal',
        get_template_directory_uri() . '/js/modal.js', // Custom modal script
        array('jquery'),
        '1.0.0',
        true // Load in the footer
    );


}
add_action('wp_enqueue_scripts', 'nathaliemph_enqueue_assets');

/**
 * Register navigation menus.
 */
function nathaliemph_register_navigation_menus() {
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'NathalieMph'),
    ));
}
add_action('after_setup_theme', 'nathaliemph_register_navigation_menus');

/**
 * Load theme textdomain for translations.
 */
function nathaliemph_load_translations() {
    load_theme_textdomain('NathalieMph', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'nathaliemph_load_translations');

/**
 * REST API Endpoint for filtering photos.
 */
function nathaliemph_filter_photos_endpoint($data) {
    $category = sanitize_text_field($data['category'] ?? '');

    $query = new WP_Query(array(
        'post_type'      => 'photo',
        'category_name'  => $category,
        'posts_per_page' => -1,
        'fields'         => 'ids', // Optimized query to retrieve only post IDs
    ));

    if (empty($query->posts)) {
        return new WP_Error('no_photos', __('No photos found.', 'NathalieMph'), array('status' => 404));
    }

    $photos = array_map(function ($post_id) {
        return array(
            'id'    => $post_id,
            'title' => get_the_title($post_id),
        );
    }, $query->posts);

    return rest_ensure_response($photos);
}

// Register the REST API route
add_action('rest_api_init', function () {
    register_rest_route('nathalie-mota/v1', '/filter-photos', array(
        'methods'  => 'GET',
        'callback' => 'nathaliemph_filter_photos_endpoint',
        'args'     => array(
            'category' => array(
                'validate_callback' => 'is_string',
            ),
        ),
    ));
});

/**
 * Register custom post type: Photographies.
 */
function nathaliemph_register_photographie_cpt() {
    $labels = array(
        'name'          => __('Photographies', 'NathalieMph'),
        'singular_name' => __('Photographie', 'NathalieMph'),
    );

    $args = array(
        'label'         => __('Photographies', 'NathalieMph'),
        'public'        => true,
        'has_archive'   => true,
        'supports'      => array('title', 'editor', 'thumbnail'),
        'labels'        => $labels,
    );

    register_post_type('photographie', $args);
}
add_action('init', 'nathaliemph_register_photographie_cpt');

/**
 * Load more photos with AJAX.
 */
add_action('wp_ajax_load_more', 'load_more_photos'); 
add_action('wp_ajax_nopriv_load_more', 'load_more_photos');

function load_more_photos() {
    $paged = intval($_POST['page']);
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 10,
        'paged'          => $paged,
    );

    $photos = new WP_Query($args);
    if ($photos->have_posts()) :
        while ($photos->have_posts()): $photos->the_post();
            ?>
            <div class="photo-item">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                    <h2><?php the_title(); ?></h2>
                </a>
            </div>
            <?php
        endwhile;
    endif;
    wp_die(); // Ensure proper termination of the AJAX request
}

/**
 * Add a custom ID to the "Contact" menu item for triggering the modal.
 */
function add_menu_item_id($atts, $item, $args) {
    if ($item->title === 'Contact') { // Match menu item title
        $atts['id'] = 'open-modal'; // Add custom ID for modal trigger
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_item_id', 10, 3);
