<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container">
        <!-- Logo Section -->
        <div class="site-logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Logo.png" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>

        <!-- Menu Section -->
        <nav class="site-nav">
            <?php 
                wp_nav_menu(array(
                    'theme_location' => 'main-menu', // Menu location registered in functions.php
                    'container' => false,
                    'menu_class' => 'main-menu',
                )); 
            ?>
        </nav>
    </div>
</header>
<?php wp_footer(); ?>
</body>
</html>
