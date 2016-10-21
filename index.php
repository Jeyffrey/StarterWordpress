<?php

$type = get_post_format() ? (get_post_type() != 'post') : get_post_type();

/*
---- Page -- */
if ( is_page() ) {
    get_template_part('page-templates/page.default');
}

/*
---- Single -- */
else if ( is_single() ) {
    if( $type === 'post' )
        get_template_part('page-templates/single.default');
    else
        get_template_part('page-templates/single.' . $type);
}

/*
---- Category -- */
else if ( is_archive() || is_home() ) {
    if( $type === 'post' )
        get_template_part('page-templates/cat.default');
    else
        get_template_part('page-templates/cat.' . $type);
}

/*
---- 404 -- */
else if ( is_404() ) {
    get_template_part('page-templates/404' );
}
