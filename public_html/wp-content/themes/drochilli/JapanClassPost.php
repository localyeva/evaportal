<?php /*
Template Name: Japan Class Post
*/
get_header(); 
?>

<div class="row page-header">
    <div class="col-lg-12">
        <h3>New Post Page</h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo do_shortcode('[djd-site-post]'); ?>
    </div>
</div>

<?php get_footer(); ?>