<?php get_template_part('template-parts/header'); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <h1>Project single</h1>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('template-parts/footer'); ?>
