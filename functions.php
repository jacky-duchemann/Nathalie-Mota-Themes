<?php

// Intégration du fichier css 

/*function mon_theme_enqueue_styles() {
    wp_enqueue_style('mon-theme-style', get_stylesheet_directory_uri() . './style.css');
}
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');*/
function mon_theme_styles() {
    wp_enqueue_style('style-personnalise', get_template_directory_uri() . 'scss/style.css');
}
add_action('wp_enqueue_scripts', 'mon_theme_styles');
?>

<?php
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );
?>
