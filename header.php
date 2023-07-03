<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="l-header">
        <div class="l-header__container">
            <?php if (is_front_page()) : ?>
                <h1><a class="l-header__title" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
                <a class="l-header__title" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
            <?php wp_nav_menu([
                'theme_location' => 'header-navigation',
                'container' => 'nav',
                'container_class' => 'l-header__nav',
                'menu_class' => 'l-header__nav-list',
            ]); ?>
            <a href="#" class="l-header__button">
                <span class="l-header__button-border l-header__button-border--top"></span>
                <span class="l-header__button-border l-header__button-border--center"></span>
                <span class="l-header__button-border l-header__button-border--bottom"></span>
            </a>
        </div>
    </header>
    <main>