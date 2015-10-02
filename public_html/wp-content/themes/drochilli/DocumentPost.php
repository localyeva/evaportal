<?php
/*
  Template Name: Document Post Template
 */
get_header();
?>
<div class="row page-header">
    <div class="col-lg-12">
        <h3>New Document Page</h3>
    </div>
</div>

<?php echo do_shortcode('[djd-site-post]'); ?>

<?php get_footer(); ?>