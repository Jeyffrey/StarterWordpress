<?php
/* Some links : http://www.hongkiat.com/blog/useful-wordpress-functions/
                https://github.com/taniarascia/wp-functions
*/

/*
---- Fonctions : get a slug from a string -- */
function slugify($sting) {
    $sting = preg_replace('~[^\\pL\d]+~u', '-', $sting);
    $sting = trim($sting, '-');
    $sting = iconv('utf-8', 'us-ascii//TRANSLIT', $sting);
    $sting = strtolower($sting);
    $sting = preg_replace('~[^-\w]+~', '', $sting);

    if (empty($sting))
        return 'n-a';

    return $sting;
}
