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
    wp_enqueue_script('custom-scripts-lightbox', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
?>

<?php 
function enqueue_custom_ajax_scripts() {
    
    wp_enqueue_script( 'custom-ajax-script', get_template_directory_uri() . '/js/ajax.js', array( 'jquery' ), null, true );

    
    wp_localize_script( 'custom-ajax-script', 'customAjax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'custom_ajax_nonce' )
    ));
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_ajax_scripts' ); ?>



<?php 
function load_more_photos_ajax() {
    check_ajax_referer('custom_ajax_nonce', 'nonce');

    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['categorie']) ? sanitize_text_field($_POST['categorie']) : '';
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'DESC';

    /*var_dump($category);*/
    
    
    $tax_query = array('relation' => 'AND');

    if (!empty($category)) {
        $tax_query[] = array(
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $category,
            'operator' => 'IN', // Utilisez 'IN' seulement si une catégorie est sélectionnée
        );
    }
    
    if (!empty($format)) {
        $tax_query[] = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format,
            'operator' => 'IN', // Utilisez 'IN' seulement si un format est sélectionné
        );
    }
    
    $related_args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => $order,
        'tax_query' => count($tax_query) > 1 ? $tax_query : '', 
    );
    
    $related_query = new WP_Query($related_args);?>

    <div id="photo-container" class="related-photos">
    <?php
    if ($related_query->have_posts()) { 
        $index = 0;?>
        
        <?php
        while ($related_query->have_posts()) {
            $related_query->the_post();
            ?>
        
            <div class="related-photos__thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="related-photos__thumbnail__link"
                       data-index="<?php echo $index; ?>"
                       data-image="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                       data-title="<?php the_title(); ?>"
                       data-reference="<?php the_field('reference'); ?>"
                       data-categorie="<?php
                           $terms = get_the_terms(get_the_ID(), 'categorie');
                           if ($terms && !is_wp_error($terms)) {
                               foreach ($terms as $term) {
                                   echo esc_html($term->name) . ' ';
                               }
                           } else {
                               echo 'Aucune catégorie trouvée';
                           } ?>">
                        <?php the_post_thumbnail('full'); ?>
                        <div class="related-photos__thumbnail__link__overlay">
                            <span class="icon-eye icon-eye-related">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-eye.png" alt="Icone Oeil" />
                            </span>
                            <div class="info-box">
                                <p><?php the_field('reference'); ?></p>
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'categorie');
                                if ($terms && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<p>' . esc_html($term->name) . '</p>';
                                    }
                                } else {
                                    echo '<p>Aucune categorie trouvée</p>';
                                }
                                ?>
                            </div>
                            <span class="icon-fullscreen" data-index="<?php echo $index; ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-fullscreen.png" alt="Icone Plein écran" />
                            </span>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        
            <?php
            $index++;
        }?>
    </div>
      <?php  wp_reset_postdata();
    } else {
        echo 'Aucune autre photo trouvée.';
        /*var_dump($related_query->request);*/
    }

    wp_die();
}

add_action('wp_ajax_load_more_photos', 'load_more_photos_ajax');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos_ajax');?>

