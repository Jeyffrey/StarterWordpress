<?php
/*
---- VARIABLES -- */
global $post;
setup_postdata($post);

// Default og-image
$defaultImage = get_template_directory_uri().'/assets/img/default-og-image.png';

// Specific Excerpt for description
$excerpt = substr( str_replace(' [&hellip;]', '', get_the_excerpt($post->ID)), 0, 250);
$excerpt = substr($excerpt, 0, strrpos($excerpt, '.'));

// Suffix title
$suffix = ' | ' . get_bloginfo('name');

// ACF used ?
function get_acf_metas($meta) {
    return (function_exists('get_field') && get_field($meta));
}

/*
---- DEFINE -- */
// Home
if ( is_front_page() ) {
    $title       = get_acf_metas('title') ? get_field('title') : get_bloginfo('name');
    $description = get_acf_metas('description') ? get_field('description') : get_bloginfo('description');
    $image       = get_acf_metas('image') ? get_field('image')['sizes']['large'] : $defaultImage;
}

// Page or Single post
else if ( is_page() || is_single() ) {
    $title       = get_acf_metas('title') ? (get_field('title') . $suffix) : (get_the_title() . $suffix);
    $description = get_acf_metas('description') ? get_field('description') : $excerpt;

    if (get_acf_metas('image')) {
        $image = get_field('image')['sizes']['large'];
    }
    elseif (get_the_post_thumbnail_url($post->ID)) {
        $image = get_the_post_thumbnail_url($post->ID, 'large');
    }
    else {
        $image = $defaultImage;
    }
}

// Category
else if ( is_archive() && !is_home() ) {
    if (get_post_type() != 'post') {
        $title = post_type_archive_title('', false) . $suffix;
    } else {
        $title = single_cat_title('', false) . $suffix;
    }

    $description = get_acf_metas('description') ? get_field('description') : '';
    $image       = get_acf_metas('image') ? get_field('image')['sizes']['large'] : $defaultImage;
}

// 404
else if ( is_404() ) {
    $title       = '404 Page - Error' . $suffix;
    $description = '';
    $image       = $defaultImage;
}


/*
---- LAUNCH -- */
function init_metas($title, $description, $image) {
    // Natural
    echo "<title>{$title}</title>\n";
    echo "<meta name='description' content='{$description}' />\n";

    // Open Graph
    echo "<meta property='og:title' content='{$title}' />\n";
    echo "<meta property='og:description' content='{$description}' />\n";
    echo "<meta property='og:image' content='{$image}' />";
}

init_metas($title, $description, $image);
