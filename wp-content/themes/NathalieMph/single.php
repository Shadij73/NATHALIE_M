<?php get_header(); ?>

<div class="photo-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="entete-single">
            <div class="photo-details" >

        <h1><?php the_title(); ?></h1>
        
        <div class="photo-description">

    <?php $field=get_field("type");
    if ($field) {echo "<p> type : ".$field."</p>";}
    ?>
    </div>
       </div>
       <div class="photo-image">
      
            <?php the_post_thumbnail('large'); ?>
     
       </div>
    </div>
    
    <?php endwhile; endif; ?>
</div>

<div class="navigation">
    <?php 
    // Navigation entre les photos
    previous_post_link('<div class="prev">%link</div>', 'Previous: %title'); 
    next_post_link('<div class="next">%link</div>', 'Next: %title'); 
    ?>
</div>

<div class="related-photos">
    <h2>Photos Apparentées</h2>
    <?php
    // Afficher les photos apparentées
    $related = new WP_Query([
        'post_type' => 'photo', 
        'posts_per_page' => 6, 
        'post__not_in' => array(get_the_ID())
    ]);
    if($related->have_posts()):
        while($related->have_posts()): $related->the_post(); ?>
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