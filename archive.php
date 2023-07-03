<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <section class="l-archive">
        <div class="l-archive__container l-archive__container--w1200">
            <h1 class="l-archive__title"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></h1>
            <div class="l-archive__content">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'card'); ?>
                <?php endwhile; ?>
            </div>
            <?php get_template_part('template-parts/content', 'pagination'); ?>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>