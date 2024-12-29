<?php get_header(); ?>
<main>

 <!-- Hero Image Section (below the header) -->
 <div class="hero">
    <?php
    // Directory paths
    $hero_images_dir = get_template_directory() . '/images/hero-images/';
    $hero_images_url = get_template_directory_uri() . '/images/hero-images/';

    // Fetch all image files from the directory
    $hero_images = glob($hero_images_dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

    // Select a random image
    if (!empty($hero_images)) {
        $random_hero_image_path = $hero_images[array_rand($hero_images)];
        $random_hero_image_url = str_replace($hero_images_dir, $hero_images_url, $random_hero_image_path);
    ?>
        <img 
            src="<?php echo esc_url($random_hero_image_url); ?>" 
            alt="<?php echo esc_attr(sprintf(__('Hero Image for %s', 'text-domain'), get_bloginfo('name'))); ?>"
        >
    <?php } else { ?>
        <!-- Fallback image if no hero images are found -->
        <img 
            src="<?php echo esc_url(get_template_directory_uri() . '/images/default-hero.jpeg'); ?>" 
            alt="<?php echo esc_attr(__('Default Hero Image', 'text-domain')); ?>"
        >
    <?php } ?>
    <div class="hero-title">
        <img 
            src="<?php echo esc_url(get_template_directory_uri() . '/images/Titre header.png'); ?>" 
            alt="<?php echo esc_attr(sprintf(__('Hero title for %s', 'text-domain'), get_bloginfo('name'))); ?>"
        >
    </div>
</div>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        if ('photo' === get_post_type()) :
            // Display your photo summary or thumbnail
        endif;
    endwhile;
endif;
?>

<!-- Modale de contact -->
<div class="modal" id="contact-modal" style="display:none;">
    <div class="modal-content">
        <span class="modal-close" style="float:right; cursor:pointer;">&times;</span>
        <h2>Contactez-nous</h2>
        <?php echo do_shortcode('[contact-form-7 id="your_form_id" title="Formulaire de contact"]'); ?>
    </div>
</div>


<!-- Bouton pour ouvrir la modale -->
<button id="open-modal">Charger plus</button>

</main>
<hr class="footer-line">
<?php get_footer(); ?>
