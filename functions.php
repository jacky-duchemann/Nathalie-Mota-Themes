<?php

// Intégration du fichier css 

function mon_theme_enqueue_styles() {
    wp_enqueue_style('mon-theme-style', get_stylesheet_directory_uri() . '/scss/styles.css');
}
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');


?>
