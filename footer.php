</main>
<footer class="l-footer">
    <div class="l-footer__container">
        <?php wp_nav_menu([
            'theme_location' => 'footer-navigation',
            'container' => 'nav',
            'container_class' => 'l-footer__nav',
            'menu_class' => 'l-footer__nav-list',
        ]); ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>