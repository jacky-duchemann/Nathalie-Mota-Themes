<div class="related-photos">
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <div class="related-photos__thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="related-photo-link">
                                    <?php the_post_thumbnail('full'); ?>
                                    <div class="overlay">
                                        <span class="icon-eye">&#128065;</span> <!-- Icône œil -->
                                        <span class="icon-fullscreen">&#x26F6;</span> <!-- Icône plein écran -->
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
</div>
