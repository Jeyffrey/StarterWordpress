<?php get_template_part('template-parts/header'); ?>

<h1><?= post_type_archive_title(); ?></h1>

<section id="liste-articles">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="article">
            <h2>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
        </article>

    <?php endwhile; endif; ?>
</section>

<?php get_template_part('template-parts/footer'); ?>
