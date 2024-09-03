<?php
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );
?>

<?php
function mytheme_enqueue_styles() {
    wp_enqueue_style('mytheme-main-style', get_template_directory_uri() . '/scss/style.css', array(), filemtime(get_template_directory() . '/scss/style.css'));
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');


?>
<?php

function enqueue_custom_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
?>