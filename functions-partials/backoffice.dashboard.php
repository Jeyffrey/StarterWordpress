<?php
// Remove All Dashboard Widgets
function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
    remove_action('welcome_panel', 'wp_welcome_panel');
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

/*
---- Widget : Pages list -- */
function dashboard_pages( $post, $callback_args ) {
    $pages = get_pages();

    // Pages principales
    echo '<h3><span class="dashicons dashicons-editor-ul"></span> Pages principales</h3><ul>';
    foreach ($pages as $page)
        if( $page->menu_order < 100 )
            echo '<li><span class="dashicons"></span> <a href="' . admin_url( 'post.php?post='. $page->ID .'&action=edit', 'http' ) .'"><strong>'. $page->post_title .'</strong></a></li>';

    // Pages secondaires
    echo '</ul><br/><h3><span class="dashicons dashicons-editor-ul"></span> Pages secondaires</h3><ul>';
    foreach ($pages as $item)
        if( $item->menu_order > 99 )
            echo '<li><span class="dashicons"></span> <a href="' . admin_url( 'post.php?post='. $item->ID .'&action=edit', 'http' ) .'"><strong>'. $item->post_title .'</strong></a></li>';
    echo '</ul>';
}

/*
---- Widget : Custom posts list -- */
// function dashboard_projets( $post, $callback_args ) {
//     $custom_type = 'projets';
//     $add_new     = 'Ajouter un nouveau projet';
//     $title_list  = 'Liste des projets';

//     echo '<p><a href="' . admin_url( 'post-new.php?post_type='.$custom_type, 'http' ) .'"><span class="dashicons dashicons-plus"></span> <strong>'. $add_new .'</strong></a></p><br/>';

//     $projets = get_posts( array(
//         'post_type'      => $custom_type,
//         'orderby'        => 'title',
//         'order'          => 'ASC',
//         'posts_per_page' => '-1'
//     ));

//     // Liste des projets
//     echo '<h3><span class="dashicons dashicons-editor-ul"></span> '. $title_list .'</h3><ul>';
//     foreach ($projets as $item)
//         if( $item->menu_order >= 0 )
//             echo '<li><span class="dashicons"></span> <a href="' . admin_url( 'post.php?post='. $item->ID .'&action=edit', 'http' ) .'"><strong>'. $item->post_title .'</strong></a></li>';
// }



function dashboard() {
	wp_add_dashboard_widget('dashboard_widget_pages', 'Pages éditables', 'dashboard_pages');
	// wp_add_dashboard_widget('dashboard_widget_projets', 'Projets', 'dashboard_projets');
}

add_action('wp_dashboard_setup', 'dashboard' );
