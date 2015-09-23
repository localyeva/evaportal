<?php /*
Template Name: Japan Class Post
*/
get_header(); 
?>

<div id="content">

    <div class="jp_class">
        <div id="news_post_area">
            <p id="news_post_tilte"> New Post Page</p>
            <div class="news_post_main clearfix">

                <?php echo do_shortcode ('[djd-site-post]');  ?>

            </div>
        </div>
    </div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>