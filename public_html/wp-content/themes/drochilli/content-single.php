<?php
global $post;
$category = get_the_category(get_the_ID());
$category_name = $category[0]->name;
$post_type = get_post_type(get_the_ID());
if(!empty($_GET['trashed']) && $_GET['trashed'] == 1){echo 'twertwerterwt';die;
    wp_redirect(home_url());
}
$attach_file = get_attached_media( '',$post->ID);
if(!empty($attach_file)){
    $url_attach_file = wp_get_attachment_url(end($attach_file)->ID);
}else{
    $url_attach_file = '';
}


?>
<div class="jp_class">
    <div id="news_detail_area">
        <p id="news_detail_tilte"> <?php the_title() ?></p>

        <div class="news_detail_top alignright clearfix">
            <p><?php the_author(); ?></p>

            <p><?php the_time(get_option('date_format')); ?></p>
        </div>
        <div class="news_detail_sec alignleft clearfix">
            <p class="alignleft"><span class="bo_locaion">Location</span><?php echo strtoupper($post_type) ?></p>

            <p class="target alignleft"><span class="bo_staff">Staff</span><?php echo $category_name; ?></p>
        </div>
        <div class="news_detail_content alignleft clearfix">
            <?php echo the_content(); ?>
            <?php if (is_user_logged_in() && get_current_user_id() == $post->post_author): ?>
                <p class="button-bottom-list"><a class="post-edit-link" href="<?php  print get_permalink(66);?>&action=edit&post_id=<?php echo get_the_ID(); ?>">Edit</a>
                    <a class="post-delete-link" href="<?php echo get_delete_post_link(get_the_ID()); ?>" onclick="return check()" >Delete</a></p>
            <?php endif; ?>
        </div>
        <div class="news_detail_bot clearfix">

            <?php if($url_attach_file != ''): ?>
             <a class="attach alignleft" href="<?php echo $url_attach_file; ?>"
               download="" title="Attach"><span>Attach</span></a>
            <?php  endif; ?>
            <a class="back alignright" href="<?php echo wp_get_referer() ?>" title="Back"><span>Back</span></a>
        </div>
    </div>
</div>
<script type='text/javascript'>
    function check()
    {
        if(!confirm('Are you sure you want to move this item to trash?')) return false;
    }
</script>
