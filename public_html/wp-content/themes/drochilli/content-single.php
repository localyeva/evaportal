<?php
global $post;

$meta_key = get_post_meta($post->ID, 'meta-post-type');
switch ($meta_key[0]) {
    case 'information':
        $page = get_posts(array('name' => 'infomation-post', 'post_type' => 'page'));
        $back = '';
        break;
    case 'document':
        $page = get_posts(array('name' => 'document-post', 'post_type' => 'page'));
        $back = 'page2-2';
        break;
}

$category = get_the_category(get_the_ID());
$category_name = $category[0]->name;
$post_type = get_post_type(get_the_ID());
if (!empty($_GET['trashed']) && $_GET['trashed'] == 1) {
    echo 'twertwerterwt';
    die;
    wp_redirect(home_url());
}
$attach_file = get_attached_media('', $post->ID);
if (!empty($attach_file)) {
    $url_attach_file = wp_get_attachment_url(end($attach_file)->ID);
} else {
    $url_attach_file = '';
}
?>
<div class="row page-header">
    <div class="col-lg-12 text-center">
        <h3><?php the_title() ?></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-user"></i>  <?php the_author(); ?>
            </li>
            <li>
                <i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="table-responsive">
            <table class="table">
                <thead><tr><th>Location</th><th>Target</th></tr></thead>
                <tbody><tr><td><?php echo strtoupper($post_type) ?></td><td><?php echo $category_name; ?></td></tr></tbody>
            </table>
        </div>        
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php the_content(); ?>        
        <?php if (is_user_logged_in() && get_current_user_id() == $post->post_author): ?>
            <br/>
            <p class="text-center">
                <a class="btn btn-info" href="<?php print get_permalink($page[0]->ID); ?>?&action=edit&post_id=<?php echo get_the_ID(); ?>">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </a>
                <a class="btn btn-danger" href="<?php echo get_delete_post_link(get_the_ID()).'&back='.$back; ?>" onclick="return check()" style="margin-left:20px">
                    <span class="glyphicon glyphicon-remove"></span> Delete
                </a>
            </p>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 text-left">
        <?php if ($url_attach_file != ''): ?>
            <a class="btn btn-warning" href="<?php echo $url_attach_file; ?>"
               download="" title="Attach"><span class="glyphicon glyphicon-download"></span> Attach</a>
           <?php endif; ?>
    </div>
    <div class="col-lg-6 text-right">        
        <a class="btn btn-warning btn-back" href="<?php echo wp_get_referer() ?>" title="Back">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </div>
</div>


<script type='text/javascript'>
    function check()
    {
        if (!confirm('Are you sure you want to move this item to trash?'))
            return false;
    }
</script>
