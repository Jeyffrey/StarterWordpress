        </main>

        <footer id="footer">
            <?php
                wp_nav_menu( array(
                    'menu' => 'Pied de page',
                    'container' => false,
                    'items_wrap' => '<ul class="menu">%3$s</ul>'
                ));
            ?>
        </footer>
    </body>
    <?php wp_footer(); ?>
</html>
