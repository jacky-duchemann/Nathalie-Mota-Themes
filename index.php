<?php
get_header(); // Inclut l'en-tête du site
?>
<?php
// Inclure la fonction pour obtenir une image aléatoire
include get_template_directory() . '/templates_parts/random-image.php'; 

// Obtenir une image aléatoire
$hero_image = get_random_hero_image();
?>
<header class="hero-header fade-in" style="background-image: url('<?php echo esc_url($hero_image); ?>');">
    <div class="hero-header__content">
        <h1><i>PHOTOGRAPHE EVENT</i></h1>
    </div>
</header>

<form id="photo-filters" class="filters fade-in">
    <div class="gap-filter">
    <select id="categorie-filter" class="filters__formats filters__all" name="categorie">
        <option value="">CATÉGORIES</options>
        <?php
        $categories = get_terms(array('taxonomy' => 'categorie'));
        foreach ($categories as $category) {
            echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
        }
        ?>
    </select>

    <select id="format-filter" class="filters__categories filters__all">
        <option value=""name="format">FORMATS</option>
        <?php
        $formats = get_terms(array('taxonomy' => 'format'));
        foreach($formats as $format) {
            echo '<option value="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</option>';
        }
        ?>
    </select>
    </div>

    <select id="sort-order" class="filters__orderby filters__all" name="order">
        <option value="ASC" disabled selected hidden>TRIER PAR</option> 
        <option value="DESC"> Photos les plus récentes</option>
        <option value="ASC"> Photos les plus anciennes </option>
        
    </select>
</form>

<div class="grid-photo fade-in">
<?php // wp_query initiale
$related_args = array(
    'post_type'      => 'photo',
    'posts_per_page' => 8,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$related_query = new WP_Query($related_args);
if ($related_query->have_posts()) :
    include 'templates_parts/photo-block.php';
endif;
?>
</div>
<div class="btn-load">
<button class="" id="load-more">Charger plus</button>
</div>
<?php
get_footer(); // inclut le footer du site
?>
