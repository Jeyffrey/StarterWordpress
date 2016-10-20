<?php
/*
---- Filter : Remove Admin bar on front -- */
add_filter('show_admin_bar', '__return_false');

/*
---- Init : modules -- */
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
add_theme_support('post-formats', array('video'));

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
