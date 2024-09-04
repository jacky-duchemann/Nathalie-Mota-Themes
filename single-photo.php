<?php
/* Template Name: Single Photo */
?>
<?php
get_header(); 

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
  
      <div class="photo-content">
        <div class="photo-content__info">
            <h1><i><?php the_title(); ?></i></h1>
            <?php
                $type_photo = get_post_meta(get_the_ID(), 'type', true);
                $reference_photo = get_post_meta(get_the_ID(), 'reference', true);
            ?>
            <?php
                $categorie_photo = get_the_terms(get_the_ID(), 'categorie'); 
                $format_photo = get_the_terms(get_the_ID(), 'format');
                $annee_photo = get_the_terms(get_the_ID(), 'annee');

            ?>
             <?php if ($categorie_photo || $format_photo || $annee_photo) : ?>
            <p><strong>RÉFÉRENCE :</strong> <?php echo esc_html($reference_photo); ?></p>
            <?php if ($categorie_photo && !is_wp_error($categorie_photo)) : ?>
                <?php foreach ($categorie_photo as $category) : ?>
            <p><strong>CATÉGORIE :</strong> <?php echo esc_html($category->name); ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if ($format_photo && !is_wp_error($format_photo)) : ?>
                <?php foreach ($format_photo as $format) : ?>
            <p><strong>FORMAT :</strong> <?php echo esc_html($format->name); ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <p><strong>TYPE :</strong> <?php echo esc_html($type_photo); ?></p>
            <?php if ($format_photo && !is_wp_error($format_photo)) : ?>
                <?php foreach ($annee_photo as $annee) : ?>
            <p><strong>ANNÉE :</strong> <?php echo esc_html($annee->name); ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    
        <div class="photo-content__image"><?php the_post_thumbnail('full'); ?></div>
        </div> 
      </div>
      <div class="contact">
            <div class="contact__button">
                <p> Cette photo vous intéresse? </p>
                <button id="contact-button">Contact</button>
                <div class="photo-navigation">
                    <?php previous_post_link('%link', '&larr;'); ?>
                    <?php next_post_link('%link', '&rArr;'); ?>
                </div>       
            </div>
      </div> 

        <h2>VOUS AIMEREZ AUSSI</h2>
        <?php
            // Récupérer les catégories de la photo actuelle
            $categories = wp_get_post_terms(get_the_ID(), 'categorie', array('fields' => 'ids'));

            // Query pour récupérer les photos dans les mêmes catégories
            $related_args = array(
                'post_type'      => 'photo', 
                'posts_per_page' => 2, 
                'post__not_in'   => array(get_the_ID()), // Exclure la photo actuelle
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field'    => 'term_id',
                        'terms'    => $categories,
                        'operator' => 'IN',
                    ),
                ),
            );

            $related_query = new WP_Query($related_args);
            if ($related_query->have_posts()) : ?>
            <?php include 'templates_parts/photo-block.php'; ?>
            <?php endif;
            wp_reset_postdata();
            ?>
        
<?php endwhile;
  endif;
 get_footer(); 
?>
