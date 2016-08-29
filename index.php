<?php

$type = get_post_format() ? (get_post_type() != 'post') : get_post_type();

/*
---- Home Page -- */
if( is_home() || is_front_page() ) {
    if ( is_home() ) {
        get_template_part('page-templates/cat.default');
    } else if ( is_front_page() ) {
        get_template_part('page-templates/page.tpl.accueil');
    }
}

/*
---- Simple Page -- */
else if ( is_page() && !is_front_page() ) {
    get_template_part('page-templates/page.default');
}

/*
---- Single Post -- */
else if ( is_single() ) {
    if( $type === 'post' ) {
        get_template_part('page-templates/single.default');
    } else {
        get_template_part('page-templates/single.' . $type);
    }
}

/*
---- Blog page -- */
else if ( is_archive() && !is_home() ) {
    if( $type === 'post' ) {
        get_template_part('page-templates/cat.default');
    } else {
        get_template_part('page-templates/cat.' . $type);
    }
}

/*
---- 404 -- */
else if ( is_404() ) {
    get_template_part('page-templates/404' );
}
