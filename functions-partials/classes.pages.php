<?php
// Ajout catégorie dans les classes d'un post
function mesClasses() {
    global $classes;
    global $post;

    unset($classes);

    $post_id = $post->ID;
    $pageTemplateName = str_replace('.php', '', basename(get_page_template()) );
    $pageTemplateString = str_replace('page.tpl.', '', $pageTemplateName );
    $postType = get_post_type( $post_id );

    if( ! empty( $pageTemplateName ) ) {
        $classes[] = 'page page-' . $post->post_name . ' tpl-' . $pageTemplateString;
    } else if ( $postType != 'page' && $postType != 'post' ) {
        $classes[] = 'custom-post cat-' . $postType;
    } else if ( is_home() || is_archive() ) {
        $classes[] = 'categorie cat-' . get_the_category()[0]->slug;
    } else if ( is_single() ) {
        $classes[] = 'single cat-' . get_the_category()[0]->slug;
    } else {
        $classes[] = 'page template-default';
    }

    return $classes;
}
add_filter( 'body_class', 'mesClasses' );
