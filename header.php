<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/scss/style.css"> 
<header class="site-header">

<div class="site-header__logo">
    
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo du site Nathalie Mota" />
    </a>
</div>

<nav class="site-header__navigation" role="navigation" aria-label="<?php _e('Menu principal', 'text-domain'); ?>">
<?php
/**
 * Affiche le menu "Menu principal" enregistré au préalable.
 */

wp_nav_menu([
    'theme_location' => 'main-menu',
    'container'      => false //On retire le conteneur généré par WP
]);
?>
</nav>
</header>