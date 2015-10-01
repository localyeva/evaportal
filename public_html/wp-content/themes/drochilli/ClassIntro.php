<?php
/*
  Template Name: Class Introduction Template
 */
get_header();
?>
<div class="row">
    <div class="col-lg-12">
        <span><a href="<?php home_url() ?>./?page_id=35&lang=vi" style="text-decoration: none;">
                <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-vn.png">
            </a></span>
        <span><a href="<?php home_url() ?>./?page_id=35&lang=ja" style="text-decoration: none;">
                <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-japan.gif">
            </a></span>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href='./?page_id=35'><?php echo __('クラス紹介', 'drochilli') ?></a></li>
            <li role="presentation"><a href='./?page_id=40'><?php echo __('時間割', 'drochilli') ?></a></li>
            <li role="presentation"><a href='./?page_id=221'><?php echo __('連絡板', 'drochilli') ?></a></li>
            <li role="presentation"><a href='#'><?php echo __('動画･写真ギャラリー', 'drochilli') ?></a></li>
            <li role="presentation"><a href='#'><?php echo __('表彰者', 'drochilli') ?></a></li>
            <li role="presentation"><a href='./?page_id=185'><?php echo __('教師紹介', 'drochilli') ?></a></li>            
        </ul>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <img style="width: 758px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/class_japan_demo.jpg" alt="class introduction">
    </div>
</div>
<div class="row">
    <div class="col-lg-12 intro_menu">
        <p class="menu_tab"><?php echo __('クラス紹介', 'drochilli'); ?></p>
        <div class="text-right" style="font-size: 20px;font-weight: bold;">
            <a style="color:red;font-weight:bold;" href="./?page_id=194&class=1"><?php echo __('申込', 'drochilli'); ?></a>
        </div>
    </div>
</div>
<div class="row intro_wrap" style="font-size:20px;">
    <div class="grid sec0 col4 col-lg-3">
        <p class="title">
            <?php echo __('初級クラス', 'drochilli'); ?>
        </p>
        <p class="text">
            <?php echo __('日本語の基礎、日常会話ができるための学習を行います。', 'drochilli'); ?>
        </p>
        <div class="link_detail">
            <a href="./?page_id=38&class=1"><?php echo __('詳細を見る', 'drochilli'); ?></a>
        </div>
    </div>
    <div class="grid sec1 col4 col-lg-3">
        <p class="title">
            <?php echo __('日本語能力試験対策', 'drochilli'); ?> <br/> <?php echo __('クラス', 'drochilli'); ?>
        </p>
        <p class="text">
            <?php echo __('日本語能力試験N1、及びN2の取得する為の3ヶ月前の集中講座。', 'drochilli'); ?>
        </p>
        <div class="link_detail">
            <a href="./?page_id=38&class=2"><?php echo __('詳細を見る', 'drochilli'); ?></a>
        </div>
    </div>
    <div class="grid sec0 col4 col-lg-3">
        <p class="title">
            <?php echo __('日本語ITクラス', 'drochilli'); ?>
        </p>
        <p class="text">
            <?php echo __('システム開発の現場で使える実践的な会話を学習します', 'drochilli'); ?>。

        </p>
        <div class="link_detail">
            <a href="./?page_id=38&class=3"><?php echo __('詳細を見る', 'drochilli'); ?></a>
        </div>
    </div>
    <div class="grid sec1 col4 col-lg-3">
        <p class="title">
            <?php echo __('ビジネス会話･マナー', 'drochilli'); ?><br/> <?php echo __('クラス', 'drochilli'); ?>
        </p>
        <p class="text">
            <?php echo __('一般的なビジネスの場面で使う実践的な会話はもちろん、マナー研修を行います', 'drochilli'); ?>
        </p>
        <div class="link_detail">
            <a href="./?page_id=38&class=4"><?php echo __('詳細を見る', 'drochilli'); ?></a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
