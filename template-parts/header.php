<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/assets/img/favicon.png" />

        <?php get_template_part('template-parts/metas'); ?>

        <?php wp_head(); ?>
        
        <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/main.css" charset="utf-8">
    </head>

    <body <?php body_class(); ?>>
        <header id="header">
            <?php if( is_front_page() ) : ?>
                <h1 id="logo">
                    <a href="<?= home_url(); ?>" title="Retour à l'accueil">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/logo.png" alt="" />
                    </a>
                </h1>
            <?php else : ?>
                <p id="logo">
                    <a href="<?= home_url(); ?>" title="Retour à l'accueil">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/logo.png" alt="" />
                    </a>
                </p>
            <?php endif; ?>

            <nav id="menu" role="navigation">
                <?php
                    wp_nav_menu( array(
                        'menu' => 'Menu principal',
                        'container' => false,
                        'items_wrap' => '<ul class="lvl1">%3$s</ul>'
                    ));
                ?>
            </nav>
        </header>

        <div id="hamburger">
            <span></span>
        </div>

        <main id="main">
