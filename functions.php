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