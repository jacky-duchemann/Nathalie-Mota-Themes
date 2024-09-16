<head>
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>
<header class="site-header">

<div class="site-header__logo">
    
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo du site Nathalie Mota" />
    </a>
</div>
<!-- Icône du menu burger (affichée uniquement sur mobile) -->
<div class="burger-icon" id="burger-icon">&#9776;</div>
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
<!-- Le menu mobile (caché, affiché via le burger) -->
<nav id="mobile-menu" class="site-header__mobile-menu">
        <?php
        wp_nav_menu([
            'theme_location' => 'main-menu',
            'container'      => false // Utilise le même menu pour le mobile
        ]);
        ?>
</nav>
<?php wp_head() ?> <!-- Pour permettre le enqueue du style -->
</header>