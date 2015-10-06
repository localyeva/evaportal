<?php
/*
  Template Name: Document Template
 */
get_header();
?>
<!-- Page Heading -->
<div class="row page-header">
    <div class="col-lg-9">
        <h1>
            Document            
        </h1>
        <!--ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Information</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> Information
            </li>
        </ol-->
    </div>
    <div class="col-lg-3 text-right" style="padding-top: 10px;">
        <?php if (in_array($current_user->user_status, array(5, 6))): ?>
            <a class="btn btn-warning btn-lg" href="./document-post">
                New Document
            </a>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <tr>
                    <th>Title</th>
                    <th>Download Link</th>
                </tr>

                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => array('document'),
                    'posts_per_page' => 15,
                    'paged' => $paged
                );
                $loop = new WP_Query($args);
                ?>
                <?php if ($loop->have_posts()): ?>
                    <?php foreach ($loop->posts as $item): ?>
                        <?php
                        $read_more1b = strlen($item->post_title) < 70 ? '' : '...';
                        $read_more2b = mb_strlen($item->post_title) < 26 ? '' : '...';
                        $attach_file = get_attached_media('', $item->ID);
                        if (!empty($attach_file)) {
                            $url_attach_file = wp_get_attachment_url(end($attach_file)->ID);
                        } else {
                            $url_attach_file = '';
                        }
                        ?>
                        <tr>
                            <td>
                                <?php echo strlen($item->post_title) > mb_strlen($item->post_title) ? mb_substr($item->post_title, 0, 26) . $read_more2b : substr($item->post_title, 0, 70) . $read_more1b; ?>
                            </td>                            
                            <td>
                                <?php if ($url_attach_file != ''): ?>
                                    <a href="<?php echo $url_attach_file ?>" download><i class="fa fa-download"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>        
    </div>
    <div class="col-lg-12 pull-right text-right">
        <?php
        if (function_exists(custom_pagination)) {
            custom_pagination($loop->max_num_pages, 5, $paged);
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>