<?php
/*
---- Images : No link -- */
update_option('image_default_link_type', 'none');

/*
---- Images : New sizes -- */
add_action( 'after_setup_theme', 'custom_image_size' );
function custom_image_size(){
    add_image_size('fullsize', 1600, 9999);
}
