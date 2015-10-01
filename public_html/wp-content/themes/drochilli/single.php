<?php

/**
 * @package WordPress
 * @subpackage Drochilli_Theme
 */
get_header();
?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('content', 'single'); ?>

    <?php endwhile; ?>

<?php else : ?>

    <?php get_template_part('error'); ?>

<?php endif; ?>



<?php get_footer(); ?>