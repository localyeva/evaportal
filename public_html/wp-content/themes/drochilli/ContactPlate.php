<?php
/*
  Template Name: Contact Plate
 */
get_header();
$lang = isset($_GET['lang']) ? $_GET['lang'] : $_SESSION['language_site'];
$_SESSION['language_site'] = $lang;
?>
<div class="row">
    <div class="col-lg-12">
        <span><a href="<?php home_url() ?>./?page_id=221&lang=vi" style="text-decoration: none;">
                <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-vn.png">
            </a></span>
        <span><a href="<?php home_url() ?>./?page_id=221&lang=ja" style="text-decoration: none;">
                <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-japan.gif">
            </a></span>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-pills">
            <li role="presentation"><a href='./?page_id=35'><?php echo __('クラス紹介', 'drochilli') ?></a></li>
            <li role="presentation"><a href='./?page_id=40'><?php echo __('時間割', 'drochilli') ?></a></li>
            <li role="presentation" class='active'><a href='./?page_id=221'><?php echo __('連絡板', 'drochilli') ?></a></li>
            <li role="presentation"><a href='#'><?php echo __('動画･写真ギャラリー', 'drochilli') ?></a></li>
            <li role="presentation"><a href='#'><?php echo __('表彰者', 'drochilli') ?></a></li>
            <li role="presentation"><a href='./?page_id=185'><?php echo __('教師紹介', 'drochilli') ?></a></li>            
        </ul>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive" id="news_title">
            <table class="table table-hover table-striped">
                <tr>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Class</th>
                    <th class="s_left" style="text-align:center;">Title</th>
                </tr>

                <?php
                switch ($current_user->user_status) {
                    case 1:
                    case 3:
                        $arr_post_type = array('all', 'hcm');
                        $arr_category = array('初級クラス', '日本語能力', '日本語IT', 'ビジネス・マナー', 'その他');
                        break;
                    case 2:
                    case 4:
                        $arr_post_type = array('all', 'hanoi');
                        $arr_category = array('初級クラス', '日本語能力', '日本語IT', 'ビジネス・マナー', 'その他');
                        break;
                    case 5:
                    case 6:
                        $arr_post_type = array('all', 'hanoi', 'hcm');
                        $arr_category = array('初級クラス', '日本語能力', '日本語IT', 'ビジネス・マナー', 'その他');
                        break;
                }
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
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
                            <td class="news_cate type_cate1" style="width:20% !important;font-weight:bold;">
                                <?php echo current(get_the_category($item->ID))->name; ?></td>
                            <td class="news_text">
                                <a href="<?php echo get_permalink($item->ID); ?>"><?php echo strlen($item->post_title) > mb_strlen($item->post_title) ? mb_substr($item->post_title, 0, 26) . $read_more2b : substr($item->post_title, 0, 70) . $read_more1b; ?></a>
                                <?php if (get_post_meta($item->ID, 'attach_file_for_post')): ?>
                                    <a href="<?php echo get_permalink($item->ID); ?>" class="attach_btn"><img
                                            src="http://portaltest.evolable.asia/wp-content/uploads/2015/06/icon_attach2.jpg"
                                            alt="Attach"></a>
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


<div id="content" style="display: none">
    <div class="jp_class">
        <div id="language_switch">
            <span><a href="<?php home_url() ?>./?page_id=221&lang=vi" style="text-decoration: none;">
                    <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-vn.png">
                </a></span>
            <span><a href="<?php home_url() ?>./?page_id=221&lang=ja" style="text-decoration: none;">
                    <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-japan.gif">
                </a></span>
        </div>
        <?php if (in_array($current_user->user_status, array(5, 6))): ?>
            <div style="margin: -30px 1px 10px 580px" class="btn">
                <a style="text-decoration: none;" href="./?page_id=229">
                    <?php echo __("新しい投稿を。", 'drochilli'); ?>
                </a>
            </div>
        <?php endif; ?>
        <div id='top-page-menu'>
            <ul>
                <li><a href='./?page_id=35'><?php echo __('クラス紹介', 'drochilli') ?></a></li>
                <li><a href='./?page_id=40'><?php echo __('時間割', 'drochilli') ?></a></li>
                <li class='active'><a href='./?page_id=221'><?php echo __('連絡板', 'drochilli') ?></a></li>
                <li><a href='#'><?php echo __('動画･写真ギャラリー', 'drochilli') ?></a></li>
                <li><a href='#'><?php echo __('表彰者', 'drochilli') ?></a></li>
                <li><a href='./?page_id=185' style="width:195px;text-align:center;"><?php echo __('教師紹介', 'drochilli') ?></a></li>
            </ul>
        </div>
        <div id="news_jp_class_area">
            <!--            <div id="news_jp_class">-->
            <div id="news_title">
                <table>
                    <tr>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Class</th>
                        <th class="s_left" style="text-align:center;">Title</th>
                    </tr>

                    <?php
                    switch ($current_user->user_status) {
                        case 1:
                        case 3:
                            $arr_post_type = array('all', 'hcm');
                            $arr_category = array('初級クラス', '日本語能力', '日本語IT', 'ビジネス・マナー', 'その他');
                            break;
                        case 2:
                        case 4:
                            $arr_post_type = array('all', 'hanoi');
                            $arr_category = array('初級クラス', '日本語能力', '日本語IT', 'ビジネス・マナー', 'その他');
                            break;
                        case 5:
                        case 6:
                            $arr_post_type = array('all', 'hanoi', 'hcm');
                            $arr_category = array('初級クラス', '日本語能力', '日本語IT', 'ビジネス・マナー', 'その他');
                            break;
                    }
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
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
                                <td class="news_cate type_cate1" style="width:20% !important;font-weight:bold;">
                                    <?php echo current(get_the_category($item->ID))->name; ?></td>
                                <td class="news_text">
                                    <a href="<?php echo get_permalink($item->ID); ?>"><?php echo strlen($item->post_title) > mb_strlen($item->post_title) ? mb_substr($item->post_title, 0, 26) . $read_more2b : substr($item->post_title, 0, 70) . $read_more1b; ?></a>
                                    <?php if (get_post_meta($item->ID, 'attach_file_for_post')): ?>
                                        <a href="<?php echo get_permalink($item->ID); ?>" class="attach_btn"><img
                                                src="http://portaltest.evolable.asia/wp-content/uploads/2015/06/icon_attach2.jpg"
                                                alt="Attach"></a>
                                        <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </div>
            <div style="margin-top:35px;margin-left:200px;">
                <?php
                if (function_exists(custom_pagination)) {
                    custom_pagination($loop->max_num_pages, 5, $paged);
                }
                ?>
            </div>
        </div>
    </div>
    <!--    </div>-->
</div>

<?php get_footer(); ?>
