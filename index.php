<?php
get_header(); // Inclut l'en-tête du site
?>
<?php
// Inclure la fonction pour obtenir une image aléatoire
include get_template_directory() . '/templates_parts/random-image.php'; 

// Obtenir une image aléatoire
$hero_image = get_random_hero_image();
?>
<header class="hero-header" style="background-image: url('<?php echo esc_url($hero_image); ?>');">
    <div class="hero-header__content">
        <h1><i>PHOTOGRAPHE EVENT</i></h1>
    </div>
</header>

<form id="photo-filters" class="filters">
    <?php taxonomy_filters(); ?>
    <!-- <div>
    <select id="format-filter" class="filters__formats filters__all" name="format">
        <option value="">FORMATS</option>
        
    </select>

    <select id="categorie-filter" class="filters__categories filters__all" name="categorie">
        <option value="">CATÉGORIES</option>
        
    </select> -->
    </div>
    <select id="sort-order" class="filters__orderby filters__all" name="order">
        <option value="ASC" disabled selected hidden>TRIER PAR</option> 
        <option value=""> + RÉCENTES </option>
        <option value=""> - RÉCENTES </option>
        
    </select>
</form>
<?php
// Query pour récupérer les photos dans les mêmes catégories
            $related_args = array(
                'post_type'      => 'photo', 
                'posts_per_page' => 8,   
            );
?>

<?php 
$related_query = new WP_Query($related_args);

if ($related_query->have_posts()) : ?>
    <div class="grid-photo">
    <?php include 'templates_parts/photo-block.php'; ?>
    </div>
    <?php endif;
    wp_reset_postdata();
    ?>

<?php
get_footer(); // inclut le footer du site
?>
