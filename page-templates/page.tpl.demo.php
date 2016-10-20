<?php /* Template Name: Demo */ ?>
<?php get_template_part('template-parts/header'); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('template-parts/footer'); ?>
