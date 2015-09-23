<?php
/**
 * @package WordPress
 * @subpackage Drochilli_Theme
 */
get_header(); ?>
<?php

    wp_redirect(home_url());

?>

<div id="content">

	<?php get_template_part('error'); ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>