<?php
/*
  Template Name: Contact Template
 */
get_header();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive" id="contact">
            <?php if ($current_user->user_status > 2): ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile;
                endif; ?>
            <?php else: ?>
                <span style="color: #722d19;font-size: large">you do not have permission</span>
<?php endif; ?>
        </div>
    </div>
</div>

<div id="content" style="display: none">
    <div class="jp_class">
        <div id="contact">
            <?php if ($current_user->user_status > 2): ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile;
                endif; ?>
            <?php else: ?>
                <span style="color: #722d19;font-size: large">you do not have permission</span>
<?php endif; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>