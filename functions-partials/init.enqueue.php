<?php
function enqueue_scripts() {
    // Deregister
    wp_deregister_script( 'jQuery' );
    wp_deregister_script( 'wp-embed' );

    wp_register_script( 'Main', get_template_directory_uri().'/assets/main.js', false, null, true );
    wp_enqueue_script( 'Main' );

    // Ajax
    // wp_localize_script( 'Main', 'adminAjax', admin_url( 'admin-ajax.php' ) );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
