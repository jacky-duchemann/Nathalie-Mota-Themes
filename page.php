<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/scss/style.css">
<?php
get_header(); // Inclut l'en-tête du site

if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <?php
                    echo '<span class="posted-on">Publié en mode le ' . get_the_date() . '</span>';
                    echo '<span class="author"> par ' . get_the_author() . '</span>';
                    ?>
                </div>
            </header><!-- .entry-header -->

        </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile;
else :
    echo '<p>Aucune page trouvée.</p>';
endif;

get_sidebar(); // Inclut la barre latérale du site
get_footer(); // Inclut le pied de page du site
?>