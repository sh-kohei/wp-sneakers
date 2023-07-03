<a href="<?php the_permalink(); ?>">
    <article class="c-card">
        <div class="c-card__image">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="c-card__text">
            <p class="c-card__category">
                <?php
                $terms = get_the_terms($post->ID, 'model-category');
                if (!empty($terms)) : ?>
                    <span class="c-card__category-item">
                        <?php
                        foreach ($terms as $term) {
                            echo esc_html($term->name);
                        }
                        ?>
                    </span>
                <?php endif; ?>
            </p>
            <h3 class="c-card__title"><?php the_title(); ?></h3>
            <p class="c-card__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
            <p class="c-card__time"><time datetime="<?php echo esc_attr(get_the_date('Y-m-d')) ?>"><?php echo esc_html(get_the_date('Y.m.d')) ?></time></p>
        </div>
    </article>
</a>