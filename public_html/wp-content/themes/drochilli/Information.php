<?php /*
Template Name: Infomation Template
*/
get_header();
?>

    <div id="content">

        <div class="news mt-68 jp_class">
            <div id="news_area">
                <p class="tit">
                <span class="left">
                    Information
                </span>
                    <?php if (in_array($current_user->user_status, array(5, 6))): ?>
                        <a class="btn alignright" href="./?page_id=66">
                            New Post
                        </a>
                    <?php endif; ?>
                </p>

                <div id="news_title">
                    <table>
                        <tr>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Staff</th>
                            <th class="s_left">Title</th>
                        </tr>

                        <?php
                        switch ($current_user->user_status) {
                            case 1:
                                $arr_post_type = array('all', 'hcm');
                                $arr_category = array('all', 'employee');
                                break;
                            case 2:
                                $arr_post_type = array('all', 'hanoi');
                                $arr_category = array('all', 'employee');
                                break;
                            case 3:
                            case 4:
                                $arr_post_type = array('all', 'hcm', 'hanoi');
                                $arr_category = array('all', 'customer');
                                break;

                            case 5:
                            case 6:
                                $arr_post_type = array('all', 'hanoi', 'hcm');
                                $arr_category = array('all', 'manager', 'customer', 'employee');
                                break;
                        }
                        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                        $args = array(
                            'post_type' => $arr_post_type,
                            'tax_query' => array(
                                'relation' => 'OR',
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' => $arr_category,
                                ),
                            ),
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
                                    <td class="news_locate">
                                        <?php if (date('Y-m-d', strtotime($item->post_date)) == date('Y-m-d')): ?>
                                            <span class="new_l">New!</span>
                                        <?php endif; ?>
                                        <?php echo $item->post_type == 'hcm' ? 'HCM' : ($item->post_type == 'hanoi' ? 'HAN' : 'ALL') ?>
                                    </td>
                                    <td class="date">
                                        <?php echo date('Y-m-d', strtotime($item->post_date)) ?></td>
                                    <td class="news_cate type_cate1">
                                        <?php echo current(get_the_category($item->ID))->name; ?></td>
                                    <td class="news_text">
                                        <a href="<?php echo get_permalink($item->ID); ?>"><?php echo strlen($item->post_title) > mb_strlen($item->post_title) ? mb_substr($item->post_title, 0, 26) . $read_more2b : substr($item->post_title, 0, 70) . $read_more1b; ?></a>
                                        <?php if ($url_attach_file != ''): ?>
                                            <a href="<?php echo get_permalink($item->ID); ?>" class="attach_btn"><img
                                                    src="<?php echo get_template_directory_uri() ?>/images/icons/icon_attach2.gif"
                                                    alt="Attach"></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>

                </div>
            </div>
        </div>

        <?php
        if (function_exists(custom_pagination)) {
            custom_pagination($loop->max_num_pages, 5, $paged);
        }
        ?>
        <!--div class="info">
            Private infomation
        </div>-->
    </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>