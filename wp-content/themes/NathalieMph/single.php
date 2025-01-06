<?php get_header(); ?>

<div class="photo-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="entete-single" style="display: flex; justify-content: space-between; align-items: center;">
            <div class="photo-details" style="flex-basis: 45%; margin-right: 5%;">
                <h1><?php the_title(); ?></h1>
                <div class="photo-description">
                    <?php if ($field = get_field("reference")) { echo "<p>Référence : $field</p>"; }
                    if ($field = get_field("categorie")) { echo "<p>Catégorie : $field</p>"; }
                    if ($field = get_field("format")) { echo "<p>Format : $field</p>"; }
                    if ($field = get_field("type")) { echo "<p>Type : $field</p>"; }
                    if ($field = get_the_date("Y")) { echo "<p>Année : $field</p>"; } ?>
                </div>
            </div>
            <div class="photo-image" style="flex-basis: 50%;">
                <?php the_post_thumbnail('large'); ?>
            </div>
        </div>
    <?php endwhile; endif; ?>
</div>

<div class="navigation">
    <?php 
    // Using correct syntax for 'next_post_link' div
    previous_post_link('<div class="prev">%link</div>', 'Previous: %title'); 
    next_post_link('<div class="next">%link</div>', 'Next: %title'); 
    ?>
</div>

<div class="related-photos">
    <h2>Photos Apparentées</h2>
    <?php
    $related = new WP_Query([
        'post_type' => 'photo', 
        'posts_per_page' => 6, 
        'post__not_in' => array(get_the_ID())
    ]);
    if ($related->have_posts()):
        while ($related->have_posts()): $related->the_post(); ?>
            <div class="related-photo">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?>
                </a>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    endif;
    ?>
</div>

<?php get_footer(); ?>
