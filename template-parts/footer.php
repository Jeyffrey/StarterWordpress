            </main>

            <footer id="footer">
                <?php
                    wp_nav_menu( array(
                        'menu' => 'Pied de page',
                        'container' => false,
                        'items_wrap' => '<ul class="footer--menu">%3$s</ul>'
                    ));
                ?>
            </footer>
        </div>
    </body>
    <?php wp_footer(); ?>
</html>
