<nav id="menu" role="navigation">
    <?php
        wp_nav_menu( array(
            'menu' => 'Menu principal',
            'container' => false,
            'items_wrap' => '<ul class="menu--premier-niveau">%3$s</ul>'
        ));
    ?>
</nav>
