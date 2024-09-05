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

function enqueue_filter_scripts() {
    wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/js/ajax-filter.js', array('jquery'), null, true);
    wp_localize_script('ajax-filter', 'ajaxurl', admin_url('admin-ajax.php'));
}

add_action('wp_enqueue_scripts', 'enqueue_filter_scripts');
?>
<?php

function enqueue_custom_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
?>

<?php  // ajout bibliothèque Select2 pour modifications des options des filtres
/*function enqueue_select2() {
    
    wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
    
    
    wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), null, true);
    
    // Charger un script personnalisé pour initialiser Select2
    wp_enqueue_script('custom-select2', get_template_directory_uri() . '/js/select2.js', array('jquery', 'select2-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_select2');*/
?>
<?php // recuperer toutes les taxonomies
function taxonomy_terms($taxonomy) {
    $terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ));
    
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
        }
    }
}

function taxonomy_filters() {
    ?>
    <div>
    <select id="format-filter" class="filters__formats filters__all" name="format">
        <option value="" disabled selected hidden>FORMATS</option>
        <?php taxonomy_terms('format'); ?>
    </select>

    <select id="categorie-filter" class="filters__categories filters__all" name="categorie">
        <option value="" disabled selected hidden>CATÉGORIES</option>
        <?php taxonomy_terms('categorie'); ?>
    </select>
    </div>
    <?php
} // remplissage dynamique des filtres Categories et format
?>

<?php 
function ajax_filter_photos() {
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $categorie = isset($_POST['categorie']) ? sanitize_text_field($_POST['categorie']) : '';
    $order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'ASC';

    $related_args = array(
        'post_type' => 'photo', // Assurez-vous que 'photo' est votre type de post personnalisé
        'orderby' => 'date',
        'order' => $order,
        'posts_per_page' => -1,
    );

    // Filtrer par taxonomie "format"
    if ($format) {
        $related_args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format,
        );
    }

    // Filtrer par taxonomie "categorie"
    if ($categorie) {
        $related_args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $categorie,
        );
    }

    // Si on a plusieurs filtres, ajouter la relation dans la tax_query
    if (!empty($args['tax_query']) && count($args['tax_query']) > 1) {
        $args['tax_query']['relation'] = 'AND';
    }
    wp_die(); // Fin de l'exécution pour Ajax
}

add_action('wp_ajax_filter_photos', 'ajax_filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'ajax_filter_photos');
?>