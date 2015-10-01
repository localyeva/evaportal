<?php
/*
  Template Name: Time Table Template
 */
get_header();
$lang = isset($_GET['lang']) ? $_GET['lang'] : $_SESSION['language_site'];
$_SESSION['language_site'] = $lang;
?>
<div class="row">
    <div class="col-lg-6">
        <span><a href="<?php home_url() ?>./?page_id=40&lang=vi" style="text-decoration: none;">
                <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-vn.png">
            </a></span>
        <span><a href="<?php home_url() ?>./?page_id=40&lang=ja" style="text-decoration: none;">
                <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-japan.gif">
            </a></span>
    </div>    
</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-pills">
            <li role="presentation"><a href='./?page_id=35'><?php echo __('クラス紹介', 'drochilli') ?></a></li>
            <li role="presentation" class="active"><a href='./?page_id=40'><?php echo __('時間割', 'drochilli') ?></a></li>
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
    <div id="time_table_block" class="table-responsive">
        <table class="time_table table table-bordered table-striped">
            <tr class="time_table_header">
                <th style="background:#ffffff"></th>
                <th><?php echo __("初級クラス", "drochilli") ?></th>
                <th><?php echo __("日本語能力試験対策クラス", "drochilli") ?></th>
                <th><?php echo __("日本語ITクラス", "drochilli") ?></th>
                <th><?php echo __("ビジネス会話･マナークラス", "drochilli") ?></th>
            </tr>
            <tr class="time_table_row0">
                <td>01-05</td>
                <td>
                    SFC:<br>
                    6:55～7:55<br>
                    17:30～18:30
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row1">
                <td>02-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row0">
                <td>03-05</td>
                <td>
                </td>
                <td>
                    GT<br>
                    6:55～7:55<br>
                    17:30～18:30
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row1">
                <td>04-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row0">
                <td>05-05</td>
                <td>
                </td>
                <td></td>
                <td>
                    GT<br>
                    6:55～7:55<br>
                    17:30～18:30
                </td>
                <td></td>
            </tr>
            <tr class="time_table_row1">
                <td>06-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td>
                    GT<br>
                    6:55～7:55<br>
                    17:30～18:30
                </td>
            </tr>
            <tr class="time_table_row0">
                <td>07-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row1">
                <td>08-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row0">
                <td>09-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row1">
                <td>10-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row0">
                <td>11-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row1">
                <td>12-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row0">
                <td>13-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="time_table_row1">
                <td>14-05</td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>
    </div>
        </div>
</div>

<?php get_footer(); ?>
