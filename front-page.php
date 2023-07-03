<?php get_header(); ?>
<?php if (get_header_video_url()) : ?>
    <div class="p-home-hero">
        <div class="p-home-hero__container">
            <video class="p-home-hero__video" src="<?php echo esc_url(get_header_video_url()) ?>" autoplay loop muted playsinline></video>
        </div>
    </div>
<?php endif; ?>
<section class="l-section p-home-photo">
    <div class="l-section__container l-section__container--max">
        <h2 class="l-section__title l-section__title--black">PHOTO</h2>
        <div class="swiper c-photo">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper c-photo__wrapper">
                <!-- Slides -->
                <?php $images_id = explode(',', get_theme_mod('custom_text_setting'));
                foreach ($images_id as  $image_id) {
                    $image_url = wp_get_attachment_url($image_id);
                    echo '<div class="swiper-slide">';
                    echo "<img src={$image_url} />";
                    echo '</div>';
                };
                ?>
            </div>
        </div>
    </div>
</section>
<section class="l-section p-home-model">
    <div class="l-section__container l-section__container--w1200">
        <h2 class="l-section__title">MODEL</h2>
        <?php
        $model_query = new WP_Query([
            'post_type' => 'model',
            'posts_per_page' => 9
        ]);
        if ($model_query->have_posts()) : ?>
            <div class="p-home-model__content">
                <?php while ($model_query->have_posts()) : $model_query->the_post(); ?>
                    <?php get_template_part('template-parts/content', 'card'); ?>
                <?php endwhile; ?>
            </div>
            <div class="p-home-model__button">
                <a href="<?php echo esc_url(home_url('/model')); ?>" class="c-button">MORE</a>
            </div>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>
</section>
<?php get_footer(); ?>