<?php
/*
---- Filter : Remove Admin bar on front -- */
add_filter('show_admin_bar', '__return_false');

/*
---- Init : modules -- */
// add_theme_support('title-tag');
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

/*
---- Init : Remove shit -- */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11, 0 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');


/*
---- Post excerpt length -- */
// function wpdocs_custom_excerpt_length( $length ) {
//     return 30;
// }
// add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/*
---- No commentaries -- */
// function my_remove_admin_menus() {
//   remove_menu_page( 'edit-comments.php' );
// }
// function remove_comment_support() {
//   remove_post_type_support( 'post', 'comments' );
//   remove_post_type_support( 'page', 'comments' );
// }
// function mytheme_admin_bar_render() {
//   global $wp_admin_bar;
//   $wp_admin_bar->remove_menu( 'comments' );
// }
// add_action( 'admin_menu', 'my_remove_admin_menus' );
// add_action( 'init', 'remove_comment_support', 100 );
// add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

/*
---- If default single not needed -- */
// function noDefaultSingles($disable_posts){
//     remove_menu_page( 'edit.php' );
// }
// add_action( 'admin_menu', 'noDefaultSingles' );


/*
---- ACF option page -- */
// if( function_exists('acf_add_options_page') ) {
	
// 	acf_add_options_page(array(
// 		'page_title' 	=> 'Thème',
// 		'menu_title'	=> 'Thème',
// 		'menu_slug' 	=> 'theme-general-settings',
// 		'capability'	=> 'edit_posts',
// 		'redirect'		=> false
// 	));
	
// 	acf_add_options_sub_page(array(
// 		'page_title' 	=> 'Pied de page',
// 		'menu_title'	=> 'Pied de page',
// 		'parent_slug'	=> 'theme-general-settings',
// 	));
// }


/*
---- Don't load Contact Form 7 CSS -- */
// add_filter( 'wpcf7_load_css', '__return_false' );


/*
---- Plugin Yoast SEO : goes to the bottom of the page -- */
// function yoasttobottom() {
// 	return 'low';
// }
// add_filter( 'wpseo_metabox_prio', 'yoasttobottom');