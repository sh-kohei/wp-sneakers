<?php

add_action('wp_enqueue_scripts', function () {
    $theme_info = wp_get_theme();
    $version = $theme_info->Version;
    wp_enqueue_style('my-style-common', get_template_directory_uri() . '/public/css/common.css', [], $version, 'all');
    wp_enqueue_script('my-script-common', get_template_directory_uri() . '/public/js/common.bundle.js', [], $version, true);
    wp_enqueue_style('vendors-style', get_template_directory_uri() . '/public/css/vendors.css', [], $version, 'all');
    wp_enqueue_script('vendors-script', get_template_directory_uri() . '/public/js/vendors.bundle.js', [],  $version, true);
    if (is_home()) {
        wp_enqueue_style('my-style-home', get_template_directory_uri() . '/public/css/home.css', [], $version, 'all');
        wp_enqueue_script('my-script-home', get_template_directory_uri() . '/public/js/home.bundle.js', [], $version, true);
    }
    if (is_404()) {
        wp_enqueue_style('my-style-404', get_template_directory_uri() . '/public/css/p_404.css', [], $version, 'all');
        wp_enqueue_script('my-script-404', get_template_directory_uri() . '/public/js/p_404.bundle.js', [], $version, true);
    }
});

add_action('after_setup_theme', function () {
    register_nav_menu('header-navigation', 'ヘッダーメニュー');
    register_nav_menu('footer-navigation', 'フッターメニュー');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header', [
        'video' => true,
    ]);
    add_theme_support('title-tag');
});

add_action('init', function () {
    register_post_type('model', [
        'label' => 'MODEL',
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'taxonomies' => ['model-category'],
        'show_in_rest' => true,
        'rewrite' => ['with_front' => false],
        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',

        ],
    ]);
    register_taxonomy('model-category', 'model', [
        'label' => 'カテゴリー',
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'rewrite' => ['with_front' => false],
    ]);
});

// カスタマイザーの追加
add_action('customize_register', function ($wp_customize) {

    // スライダー画像
    $wp_customize->add_section('custom_section', [
        'title'    => 'スライダー画像',
        'priority' => 30,
    ]);
    $wp_customize->add_setting('custom_text_setting', [
        'default'           => '',
    ]);
    $wp_customize->add_control('custom_text_setting', [
        'label'    => '画像ID',
        'section'  => 'custom_section',
        'type'     => 'text',
        'priority' => 10,
    ]);

    // ビデオ
    $wp_customize->add_section('video_section', [
        'title'    => 'ビデオ設定',
        'priority' => 160,
    ]);
    $wp_customize->add_setting('video_setting', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'video_control', [
        'label'    => __('ビデオ', 'theme_domain'),
        'section'  => 'video_section',
        'mime_type' => 'video/mp4',
    ]));
});

// デスクリプションの追加
add_action('wp_head', function () {
    $description = '';

    if (is_home()) {
        $description = get_bloginfo('description');
    } elseif (is_singular()) {
        $description = get_the_excerpt();
    }
    echo '<meta name="description" content="' . esc_attr($description) . '">';
});


// OGPタグの追加
add_action('wp_head', function () {
    if (is_singular()) {
        global $post;

        $ogp_title = get_the_title($post->ID);
        $ogp_url = get_permalink($post->ID);
        $ogp_image = get_the_post_thumbnail_url($post->ID);
        $ogp_description = get_the_excerpt($post->ID);

        echo '<meta property="og:title" content="' . esc_attr($ogp_title) . '">';
        echo '<meta property="og:url" content="' . esc_attr($ogp_url) . '">';
        echo '<meta property="og:image" content="' . esc_attr($ogp_image) . '">';
        echo '<meta property="og:description" content="' . esc_attr($ogp_description) . '">';
    }
});

// ツイッターカードの追加
add_action('wp_head', function () {
    if (is_singular() && has_post_thumbnail()) {
        $post = get_queried_object();
        $title = get_the_title($post);
        $description = get_the_excerpt($post);
        $image_url = get_the_post_thumbnail_url($post, 'full');

        echo '<meta name="twitter:card" content="summary_large_image" />';
        echo '<meta name="twitter:title" content="' . esc_attr($title) . '" />';
        echo '<meta name="twitter:description" content="' . esc_attr($description) . '" />';
        echo '<meta name="twitter:image" content="' . esc_url($image_url) . '" />';
    }
});
