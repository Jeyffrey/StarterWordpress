<?php
/*
---- If single not needed -- */
function remove_menus($disable_posts){
        remove_menu_page( 'edit.php' );
        remove_menu_page( 'edit-comments.php' );
}
// add_action( 'admin_menu', 'remove_menus' );


/*
---- Custom post types -- */
add_action( 'init', 'custom_post_types' );
add_filter( 'nav_menu_css_class', 'active_menu_custom_posttype', 10, 2 );

function custom_post_types() {
    register_post_type( 'projets',
        array(
            'labels' => array(
                'name' => __( 'Projets' ),
                'singular_name' => __( 'projets' ),
                'add_new' => "Ajouter un projet",
                'add_new_item' => "Ajouter un nouveau projet"
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'projets'),
            'menu_icon' => 'dashicons-welcome-view-site'
        )
    );
}

/*
---- Active menu in custom type post -- */
function active_menu_custom_posttype( $classes , $item ){
	if ( get_post_type() == 'projets' ) {
		$classes = str_replace( 'current_page_parent', '', $classes );
		if ( $item->url == '/projets' && in_array('current_page_parent', $classes) === false ) {
			$classes = str_replace( 'menu-item-object-custom', 'menu-item-object-custom current_page_item', $classes );
		}
	}
	return $classes;
}
