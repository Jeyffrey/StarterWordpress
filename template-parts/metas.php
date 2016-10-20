<?php
// Advanced Custom Field : get_field('title') && get_field('description')

global $post;
setup_postdata($post);

$s = substr( str_replace(' [&hellip;]', '', get_the_excerpt($post->ID)), 0, 250);
$excerpt = substr($s, 0, strrpos($s, '.'));

function init_metas($title, $description, $image) {
    // Natural
    echo "<title>{$title}</title>\n";
    echo "<meta name='description' content='{$description}' />\n";

    // Open Graph
    echo "<meta property='og:title' content='{$title}' />\n";
    echo "<meta property='og:description' content='{$description}' />\n";
}


/*
---- DEFINE -- */
// Home
if ( is_front_page() ) {
    $title = (function_exists('get_field') && get_field('title')) ? get_field('title') : get_bloginfo('name');
    $description = (function_exists('get_field') && get_field('description')) ? get_field('description') : get_bloginfo('description');
    $image = '';
}
// Page
else if ( is_page() || is_single() ) {
    $title = (function_exists('get_field') && get_field('title')) ? get_field('title') : (get_the_title() . ' - ' . get_bloginfo('name'));
    $description = (function_exists('get_field') && get_field('description')) ? get_field('description') : $excerpt;
    $image = '';
}
// Category
else if ( is_archive() && !is_home() ) {
    $title = (function_exists('get_field') && get_field('title')) ? get_field('title') : (single_cat_title('', false) . ' - ' . get_bloginfo('name'));
    $description = (function_exists('get_field') && get_field('description')) ? get_field('description') : '';
    $image = '';
}
// 404
else if ( is_404() ) {
    $title = (function_exists('get_field') && get_field('title')) ? get_field('title') : '404 Page - Error';
    $description = (function_exists('get_field') && get_field('description')) ? get_field('description') : '';
    $image = '';
}


/*
---- INIT -- */
init_metas($title, $description, $image);
