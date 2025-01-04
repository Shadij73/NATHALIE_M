<?php get_header(); ?>
<main>

<!-- Hero Image Section (below the header) -->
<div class="hero">
    <?php
    // Directory paths
    $hero_images_dir = get_template_directory() . '/images/hero-images/';
    $hero_images_url = get_template_directory_uri() . '/images/hero-images/';

    // Check if directory exists and fetch all image files
    if (is_dir($hero_images_dir)) {
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
            <?php
        } else {
            // Fallback image if no hero images are found
            ?>
            <img 
                src="<?php echo esc_url(get_template_directory_uri() . '/images/default-hero.jpeg'); ?>" 
                alt="<?php echo esc_attr(__('Default Hero Image', 'text-domain')); ?>"
            >
            <?php
        }
    } else {
        // Directory does not exist - fallback image
        ?>
        <img 
            src="<?php echo esc_url(get_template_directory_uri() . '/images/default-hero.jpeg'); ?>" 
            alt="<?php echo esc_attr(__('Default Hero Image', 'text-domain')); ?>"
        >
        <?php
    }
    ?>
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
            // Example: the_post_thumbnail(); or custom logic
        endif;
    endwhile;
endif;
?>

<!-- Trigger Button -->
<button id="open-modal">Contact</button>

<!-- Modal Structure -->
<div class="modal">
  <div class="modal-content">
    <div class="modal-header">CONTACTCONTACTCONTACT</div>
    <form>
      <label for="name">Nom</label>
      <input type="text" id="name" class="modal-input" placeholder="Nom" required>

      <label for="email">E-mail</label>
      <input type="email" id="email" class="modal-input" placeholder="E-mail" required>

      <label for="photo-ref">Réf. Photo</label>
      <input type="text" id="photo-ref" class="modal-input" placeholder="Réf. Photo">

      <label for="message">Message</label>
      <textarea id="message" class="modal-textarea" placeholder="Message"></textarea>

      <button type="submit" class="modal-submit">Envoyer</button>
    </form>
    <span class="modal-close">&times;</span>
  </div>
</div>


</main>
<hr class="footer-line">
<?php get_footer(); ?>
