<?php
/*
---- Define Media Gallery Folder -- */
// update_option( 'upload_url_path', 'http://s3.website.com/wp-content/uploads' );

/*
---- Images : No link -- */
update_option('image_default_link_type', 'none');

/*
---- Images : New sizes -- */
add_action( 'after_setup_theme', 'custom_image_size' );
function custom_image_size(){
    add_image_size('fullsize', 1600, 9999);
}

/*
---- Ajout fonctionnalité Media : catégorie -- */
// function add_categories_for_attachments() {
//     register_taxonomy_for_object_type( 'category', 'attachment' );
// }
// add_action( 'init' , 'add_categories_for_attachments' );
//
// function add_tags_for_attachments() {
//     register_taxonomy_for_object_type( 'post_tag', 'attachment' );
// }
// add_action( 'init' , 'add_tags_for_attachments' );
