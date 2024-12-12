<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title> <!-- Dynamic Title -->
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container">
            <!-- Logo Section -->
            <div class="site-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/Logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
            </div>

            <!-- Menu Section -->
            <nav class="site-nav">
                <?php 
                    if (has_nav_menu('main-menu')) {
                        wp_nav_menu([
                            'theme_location' => 'main-menu',
                            'container'      => false,
                            'menu_class'     => 'main-menu',
                        ]);
                    } else {
                        echo '<p>Please assign a menu to the "Main Menu" location.</p>';
                    }
                ?>
            </nav>
        </div>
    </header>

   <!-- Hero Image Section (below the header) -->
<div class="hero">
    <img 
        src="<?php echo esc_url(get_template_directory_uri() . '/images/nathalie-11.jpeg'); ?>" 
        alt="<?php echo esc_attr(sprintf(__('Hero Image for %s', 'text-domain'), get_bloginfo('name'))); ?>"
    >
    <div class="hero-title">
        <img 
            src="<?php echo esc_url(get_template_directory_uri() . '/images/Titre header.png'); ?>" 
            alt="<?php echo esc_attr(sprintf(__('Hero title for %s', 'text-domain'), get_bloginfo('name'))); ?>"
        >
    </div>
</div>

    

    <?php wp_footer(); ?>
</body>
</html>
