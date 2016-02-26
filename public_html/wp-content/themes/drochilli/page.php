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
    <div class="col-lg-12" id="schedule-id">
    <?php echo get_google_calendar_iframe()?>
    </div>
</div>


<?php get_footer(); ?>