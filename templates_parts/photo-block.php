<div class="related-photos">
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <div class="related-photos__thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="related-photos__thumbnail__link">
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
                                                echo '<p>Aucune catégorie trouvée</p>';
                                            }
                                            ?> 
                                        </div> 
                                        <span class="icon-fullscreen"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-fullscreen.png" alt="Icone Plein écran" /></span>  <!-- Icône plein écran -->
                                    </div>
                                    </a>
                                
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
</div>
