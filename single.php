<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article class="l-article">
            <div class="l-article__container l-article__container--w1200">
                <h1 class="l-article__title"><?php the_title(); ?></h1>
                <?php $terms = get_the_terms($post->ID, 'model-category'); ?>

                <?php if (!empty($terms)) : ?>
                    <?php foreach ($terms as $term) : ?>
                        <p class="l-article__category">カテゴリー：<a class="l-article__category-link" href="<?php echo get_term_link($term->slug, 'model-category') ?>"><?php echo $term->name; ?></a></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="l-article__image">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="l-article__content">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>