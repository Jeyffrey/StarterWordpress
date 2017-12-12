<?php
/*
---- Images : Default import config -- */
update_option('image_default_link_type', 'none');
update_option('image_default_size', 'large');


/*
---- Images : New sizes -- */
add_action( 'after_setup_theme', 'custom_image_size' );
function custom_image_size(){
    add_image_size('fullsize', 1600, 9999);
}


/*
---- Define Media Gallery Folder -- */
// update_option( 'upload_url_path', 'http://s3.website.com/wp-content/uploads' );
