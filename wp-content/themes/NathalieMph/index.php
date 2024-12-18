<?php get_header(); ?>
<main>

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
<button id="open-modal">Ouvrir le contact</button>

</main>
<?php get_footer(); ?>
