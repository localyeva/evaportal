<?php
/**
 * @package WordPress
 * @subpackage Drochilli_Theme
 */
get_header();
?>
<div class="row page-header">
    <div class="col-lg-12">
        <h1>
            Schedule            
        </h1>        
    </div>
</div>
<div class="row" id="content">    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-lg-12" id="post-<?php the_ID(); ?>">
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
                <?php //edit_post_link( __('Edit This', 'drochilli') , '<p>', '</p>');  ?>
            </div>
            <?php //if ( comments_open() ) {  ?>
            <!--<div class="comments">
            <?php //comments_template();  ?>
            </div>-->
            <?php //}  ?>

        <?php endwhile; ?>

    <?php else : ?>

        <?php get_template_part('error'); ?>

    <?php endif; ?>
</div>


<?php get_footer(); ?>