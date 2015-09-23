<?php /*
Template Name: Class Introduction Detail Template
*/
get_header(); 
?>
<?php
$class_regis = isset($_GET['class']) ? $_GET['class']:0;
?>

<div id="content">
	<div class="jp_class">
	<div id="language_switch">
		    <span><a href="<?php home_url()?>./?page_id=38&lang=vi" style="text-decoration: none;">
				    <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-vn.png">
			    </a></span>
		    <span><a href="<?php home_url()?>./?page_id=38&lang=ja" style="text-decoration: none;">
				    <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-japan.gif">
			    </a></span>
	</div>
		<div id='top-page-menu'>
			<ul>
				<li class='active'><a href='./?page_id=35'><?php echo __('クラス紹介', 'drochilli') ?></a></li>
				<li><a href='./?page_id=40'><?php echo __('時間割', 'drochilli') ?></a></li>
				<li><a href='./?page_id=221'><?php echo __('連絡板', 'drochilli') ?></a></li>
				<li><a href='#'><?php echo __('動画･写真ギャラリー', 'drochilli') ?></a></li>
				<li><a href='#'><?php echo __('表彰者', 'drochilli') ?></a></li>
				<li><a href='./?page_id=185'><?php echo __('教師紹介', 'drochilli') ?></a></li>
			</ul>
		</div>
		<div id='main-visual' style="display:none;">
			<img style="width: 758px; height: auto;"
			     src="<?php echo get_template_directory_uri(); ?>/images/classjapan/class_japan_demo.jpg"
			     alt="class introduction">
		</div>
		<?php
		if ($class_regis == 1 || $class_regis == 0) {
			?>
			<div class="intro_menu">
				<p class="menu_tab"><?php echo __('初級クラス', 'drochilli') ?></p>
			</div>
			<div>
				<dl class="class_intro_list_top">
					<dt><?php echo __('2015年度', 'drochilli') ?><br/><?php echo __('実施要項', 'drochilli') ?></dt>
					<dd>
						<?php echo __('年2回実施', 'drochilli') ?><br/>
						<?php echo __('2月･7月　(週3回)', 'drochilli') ?> </dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('クラス', 'drochilli') ?></dt>
					<dd><?php echo __('初級クラス', 'drochilli') ?>        SFC 6:55～7:55/ 17:30～18:30 GT
						6:55～7:55/17:30～18:30
						<br/>
						<?php echo __('初級継続クラス', 'drochilli') ?>        SFC 6:55～7:55/ 17:30～18:30 GT
						6:55～7:55/17:30～18:30
						<br/>
						<?php echo __('※受講人数が5名を達しない場合は開講されません。', 'drochilli') ?><br/>
						<?php echo __('※教室が確保されない場合は上記の時間のクラスを開講できない場合もあります。', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('目標', 'drochilli') ?></dt>
					<dd><?php echo __('日常会話ができ、日本語能力試験N4合格', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('授業内容', 'drochilli') ?></dt>
					<dd>
						<?php echo __('場面シラバスにのっとった会話中心で行われる。', 'drochilli') ?><br/>
						<?php echo __('文法の基礎、漢字、読解、聴解', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('対象', 'drochilli') ?></dt>
					<dd><?php echo __('日本語初心者～初級者', 'drochilli') ?>
					</dd>
				</dl>
			</div>
			<div id="class_intro_button">
				<a class="btn" href="./?page_id=194&class=1"><?php echo __('申込', 'drochilli') ?></a>
			</div>
		<?php } elseif ($class_regis == 2) { ?>
			<div class="intro_menu">
				<p class="menu_tab"><?php echo __('日本語能力試験対策クラス', 'drochilli') ?></p>
			</div>
			<div>
				<dl class="class_intro_list_top">
					<dt><?php echo __('2015年度', 'drochilli') ?><br/><?php echo __('実施要項', 'drochilli') ?></dt>
					<dd><?php echo __('年2回実施', 'drochilli') ?><br/>
						<?php echo __('4月･9月', 'drochilli') ?><br/>
						<?php echo __('① 4月～6月', 'drochilli') ?><br/>
						<?php echo __('② 9月～11月', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('クラス', 'drochilli') ?></dt>
					<dd><?php echo __('N1対策クラス', 'drochilli') ?>        SFC 6:55～7:55/ 17:30～18:30 GT
						6:55～7:55/17:30～18:30
						<br/>
						<?php echo __('N2対策クラス', 'drochilli') ?>        SFC 6:55～7:55/ 17:30～18:30 GT
						6:55～7:55/17:30～18:30
						<br/>
						<?php echo __('※受講人数が5名を達しない場合は開講されません。', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('目標', 'drochilli') ?></dt>
					<dd><?php echo __('日本語能力試験N1,N2合格', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('授業内容', 'drochilli') ?></dt>
					<dd>
						<?php echo __('新･日本語能力試験に対応', 'drochilli') ?><br/>
						<?php echo __('文字語彙、文法、読解、聴解の演習、解説。', 'drochilli') ?> <br/>
						<?php echo __('1～3回程、模擬試験を実施いたします。', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('対象', 'drochilli') ?></dt>
					<dd><?php echo __('N3、旧3級取得者もしくはそれ相応レベルの日本語能力を有する者。', 'drochilli') ?></dd>
				</dl>
			</div>
			<div id="class_intro_button">
				<a class="btn" href="./?page_id=194&class=2"><?php echo __('申込', 'drochilli') ?></a>
			</div>
		<?php } elseif ($class_regis == 3) { ?>
			<div class="intro_menu">
				<p class="menu_tab"><?php echo __('日本語ITクラス', 'drochilli') ?></p>
			</div>
			<div>
				<dl class="class_intro_list_top">
					<dt><?php echo __('2015年度', 'drochilli') ?><br/><?php echo __('実施要項', 'drochilli') ?></dt>
					<dd><?php echo __('2月･6月･9月　(週2回)', 'drochilli') ?><br/>
						<?php echo __('① 2月～5月', 'drochilli') ?><br/>
						<?php echo __('② 6月～8月', 'drochilli') ?>    <br/>
						<?php echo __('③ 9月～11月', 'drochilli') ?>

					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('クラス', 'drochilli') ?></dt>
					<dd><?php echo __('日本語ITクラス', 'drochilli') ?>        SFC 6:55～7:55/ 17:30～18:30 GT
						6:55～7:55/17:30～18:30
						<br/>
						<?php echo __('※受講人数が5名を達しない場合は開講されません。', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('目標', 'drochilli') ?></dt>
					<dd><?php echo __('ITのシステム開発の現場で使える業務会話を取得', 'drochilli') ?>。
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('授業内容', 'drochilli') ?></dt>
					<dd>
						<?php echo __('ITの基礎知識', 'drochilli') ?> <br/>
						<?php echo __('現場で使われる会話練習', 'drochilli') ?>

					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('対象', 'drochilli') ?></dt>
					<dd><?php echo __('N3、旧3級取得者もしくはそれ相応レベルの日本語能力を有する者。', 'drochilli') ?><br/>
						<?php echo __('Com,BPOスタッフ。', 'drochilli') ?>
					</dd>
				</dl>
			</div>
			<div id="class_intro_button">
				<a class="btn" href="./?page_id=194&class=3"><?php echo __('申込', 'drochilli') ?></a>
			</div>
		<?php } else { ?>
			<div class="intro_menu">
				<p class="menu_tab"><?php echo __('ビジネス会話･マナークラス', 'drochilli') ?></p>
			</div>
			<div>
				<dl class="class_intro_list_top">
					<dt><?php echo __('2015年度', 'drochilli') ?><br/><?php echo __('実施要項', 'drochilli') ?></dt>
					<dd><?php echo __('年2回実施', 'drochilli') ?><br/>
						<?php echo __('7月･12月　(週3回)', 'drochilli') ?><br/>
						<?php echo __('① 7月～8月', 'drochilli') ?> <br/>
						<?php echo __('② 12月～翌年3月', 'drochilli') ?>

					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('クラス', 'drochilli') ?></dt>
					<dd><?php echo __('ビジネスクラス', 'drochilli') ?>        SFC 6:55～7:55/ 17:30～18:30 GT
						6:55～7:55/17:30～18:30
						<br/>
						<?php echo __('※受講人数が5名を達しない場合は開講されません。', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('目標', 'drochilli') ?></dt>
					<dd><?php echo __('ビジネスで使える敬語、マナーを取得', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('授業内容', 'drochilli') ?></dt>
					<dd>
						<?php echo __('敬語の復習', 'drochilli') ?><br/>
						<?php echo __('場面に合わせたロールプレイ', 'drochilli') ?><br/>
						<?php echo __('ビジネスマネー研修', 'drochilli') ?>
					</dd>
				</dl>
				<dl class="class_intro_list">
					<dt><?php echo __('対象', 'drochilli') ?></dt>
					<dd><?php echo __('N3、旧3級取得者もしくはそれ相応レベルの日本語能力を有する者。', 'drochilli') ?></dd>
				</dl>
			</div>
			<div id="class_intro_button">
				<a class="btn" href="./?page_id=194&class=4"><?php echo __('申込', 'drochilli') ?></a>
			</div>
		<?php } ?>


	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
