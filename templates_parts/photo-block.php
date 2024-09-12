<div class="related-photos">
    <?php $index = 0;?>
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <div class="related-photos__thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="related-photos__thumbnail__link" data-index="<?php echo $index; ?>" data-image="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" data-title="<?php the_title(); ?>" data-reference="<?php the_field('reference'); ?>" 
                                data-categorie="<?php $terms = get_the_terms(get_the_ID(), 'categorie');
                                    if ($terms && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            echo esc_html($term->name) . ' ';
                                    }
                                    } else {
                                        echo 'Aucune catégorie trouvée';
                                    }?>">
                                    <?php the_post_thumbnail('full'); ?> 
                                    <div class="related-photos__thumbnail__link__overlay">
                                        <span class="icon-eye icon-eye-related"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-eye.png" alt="Icone Oeil" /></span> <!-- Icône œil --> 
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
                                        </div>  <!-- Ajout du data-index a l'icone -->
                                        <span class="icon-fullscreen" data-index="<?php echo $index; ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-fullscreen.png" alt="Icone Plein écran" /></span>  <!-- Icône plein écran -->
                                    </div>
                                    </a>
                                
                            <?php endif; ?>
                        </div>
                    <?php $index++; ?>
                    <?php endwhile; ?>
</div>
