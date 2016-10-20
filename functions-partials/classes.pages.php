<?php
function mesClasses() {
    global $classes;
    global $post;

    unset($classes);

    $postType           = get_post_type($post->ID);
    $postSlug           = is_front_page() ? 'front' : $post->post_name;
    $category           = get_the_category() ? get_the_category()[0]->slug : get_post_type($post->ID);
    $pageTemplateName   = str_replace('.php', '', basename(get_page_template()) );
    $pageTemplateString = get_page_template() ? str_replace('page.tpl.', '', $pageTemplateName) : 'default';

    if( is_page() ) :
        $classes[] = "{$postType} page-{$postSlug} template-{$pageTemplateString}";
    elseif ( is_home() || is_archive() ) :
        $classes[] = "archive {$category} cat-{$category}";
    elseif ( is_singular() && $postType != 'page' && $postType != 'post' ) :
        $classes[] = "{$postType} type-{$postType} post-{$postSlug}";
    elseif ( is_single() ) :
        $classes[] = "{$postType} cat-{$category} post-{$postSlug}";
    endif;

    return $classes;
}
add_filter( 'body_class', 'mesClasses' );
