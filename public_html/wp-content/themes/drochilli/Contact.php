<?php
/*
  Template Name: Contact Template
 */
get_header();
?>
<!-- Page Heading -->
<div class="row page-header">
    <div class="col-lg-12">
        <h1>
            Contact            
        </h1>        
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive" id="contact">
            <?php if (in_array('administrator', $current_user->roles) || in_array('customer', $current_user->roles) || $current_user->user_status==7): ?>
            <?php //if ($current_user->user_status > 2): ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile;
                endif; ?>
            <?php else: ?>            
                <span style="color: #722d19;font-size: large">You do not have permission</span>
<?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>