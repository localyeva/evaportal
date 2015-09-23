<?php
	if(isset($_POST['confirm_save']) && $_POST['confirm_save'] == 'confirm')
	{
		$classRegister = $_POST['class_inf'];
		$firstname = $_POST['first_name'];
		$lastname = $_POST['last_name'];
		$firstfuri = $_POST['first_furigana'];
		$lastfuri = $_POST['last_furigana'];
		$email = $_POST['email'];
		$lab = $_POST['lab'];
		$anotherInf = $_POST['another_inf'];
		$date_create = date('Y-m-d H:i:s'); 
		$result = $wpdb->insert($wpdb->register_class_japanese, array('class_register' => $classRegister, 'first_name' => $firstname, 'last_name' => $lastname, 'first_furigana' => $firstfuri, 'last_furigana' => $lastfuri, 'email' => $email, 'lab' => $lab, 'another_inf' => $anotherInf, 'date_register' => $date_create));
		if ($result) {
			try {
				$email_regis = $email;
				$email_teacher = 'portal@evolableasia.vn';
				$email_admin = get_option('admin_email');
				$headers = "MIME-Version: 1.0\r\n" . "From:" . "<" . $email_admin . ">\n" . "Content-Type: text/HTML; charset=\"" . get_option('blog_charset') . "\"\r\n";
				$content = 'Class register:' . $classRegister . "\n" . "Name:" . $firstname . " " . $lastname . "\n" . "Another information:" . $anotherInf;
				wp_mail($email_regis, 'Mail register class Japanese', $content, $headers, '');
				wp_mail($email_teacher, 'Mail register class Japanese', $content, $headers, '');
			} catch (Exception $ex) {

			}
			header("Location:" . home_url('/?page_id=31'));
		} else {
			header("Location:" . home_url('/?page_id=31'));
		}
	}
?>
<?php /*
Template Name: Register Class Japanese Confirm
*/
get_header();
?>
<?php
$classRegister = isset($_REQUEST['class_inf']) ? $_REQUEST['class_inf'] : $_SESSION['class_inf'];
$first_name = isset($_REQUEST['first_name']) ? $_REQUEST['first_name'] : $_SESSION['first_name'];
$last_name = isset($_REQUEST['last_name']) ? $_REQUEST['last_name'] : $_SESSION['last_name'];
$fullname = $first_name.' '.$last_name;
$furigana = $_REQUEST['first_furigana'].' '.$_REQUEST['last_furigana'];
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : $_SESSION['email'];
$lab = isset($_REQUEST['lab']) ? $_REQUEST['lab'] : $_SESSION['lab'];
$anotherInf = isset($_REQUEST['another_inf']) ? $_REQUEST['another_inf'] : $_SESSION['another_inf'];
if(empty($classRegister) || empty($fullname) || empty($email))
{
	header("Location:".esc_url( home_url( '/?page_id=194')));
}
//session give data temp
$_SESSION['class_inf'] = $classRegister;
$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['lab'] = $lab;
$_SESSION['another_inf'] = $anotherInf;
//end
?>
<!--get data confirm anh save to database- submit on this page-->
<!--end get data and save-->
	<script type="text/javascript">
		function submitformconf()
		{
			document.forms["class_register_conf"].submit();
		}

	</script>
	<div id="content">
		<div class="jp_class">
			<div id="language_switch">
		    <span><a href="<?php home_url()?>./?page_id=197&lang=vi" style="text-decoration: none;">
				    <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-vn.png">
			    </a></span>
		    <span><a href="<?php home_url()?>./?page_id=197&lang=ja" style="text-decoration: none;">
				    <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-japan.gif">
			    </a></span>
	</div>
			<div id='top-page-menu'>
				<ul>
					<li  class='active'><a href='./?page_id=35'><?php echo __('クラス紹介','drochilli')?></a></li>
					<li><a href='./?page_id=40'><?php echo __('時間割','drochilli')?></a></li>
					<li><a href='./?page_id=221'><?php echo __('連絡板','drochilli')?></a></li>
					<li><a href='#'><?php echo __('動画･写真ギャラリー','drochilli')?></a></li>
					<li><a href='#'><?php echo __('表彰者','drochilli')?></a></li>
					<li><a href='./?page_id=185' style="width:195px;text-align:center;"><?php echo __('教師紹介','drochilli')?></a></li>
				</ul>
			</div>
			<div id='main-visual' style="display:none;">
				<img src="<?php echo get_template_directory_uri(); ?>/images/header/class_intro_logo.png"
				     alt="class introduction">
			</div>
			<form name="class_register_conf" id="class_register" action="<?php echo esc_url( home_url( '/?page_id=197' ) ); ?>" method="post">
				<input type="hidden" name="confirm_save" id="confirm_save" value="confirm"/>
				<input type="hidden" name="class_inf" id="class_inf" value="<?php echo $classRegister ?>"/>
				<input type="hidden" name="first_name" id="first_name" value="<?php echo  $first_name ?>"/>
				<input type="hidden" name="last_name" id="last_name" value="<?php echo $last_name; ?>"/>
				<input type="hidden" name="first_furigana" id="first_furigana" value="<?php echo $_REQUEST['first_furigana'] ?>"/>
				<input type="hidden" name="last_furigana" id="last_furigana" value="<?php echo $_REQUEST['last_furigana'] ?>"/>
				<input type="hidden" name="email" id="email" value="<?php echo $email ?>"/>
				<input type="hidden" name="lab" id="lab" value="<?php echo $lab ?>"/>
				<input type="hidden" name="another_inf" id="another_inf" value="<?php echo $anotherInf ?>"/>
			<table id="japan_class_tab" style="margin-top:25px;">
				<tr>
					<td class="pink_td">
						<span class="title_register_class">Class Register</span>
					</td>
					<td>
						<?php echo $classRegister ?>
					</td>
				</tr>

				<tr>
					<td class="pink_td">
						<span class="title_register_class">Full Name</span>
					</td>
					<td>
						<?php echo $fullname ?>
					</td>
				</tr>
				<tr style="display:none;">
					<td class="pink_td">
						<span class="title_register_class">Furigana</span>
					</td>
					<td>
						<?php echo $furigana ?>
					</td>
				</tr>

				<tr>
					<td class="pink_td">
						<span class="title_register_class">Email</span>
					</td>
					<td>
						<?php echo $email ?>
					</td>
				</tr>

				<tr>
					<td class="pink_td">
						<span class="title_register_class">Lab</span>
					</td>
					<td>
						<?php echo $lab ?>
					</td>
				</tr>
				<tr>
					<td class="pink_td">
						<span class="title_register_class">Another Information</span>
					</td>
					<td>
						<?php echo $anotherInf ?>
					</td>
				</tr>
			</table>
			<table style="height: 50px;width: 750px;vertical-align: middle;">
					<tr>
						<td style="text-align: left;">
					<div class='sub_register' onclick="back_regis();" style="cursor: pointer;margin-left: 50px;">
						<span style="font-size: 20px;font-weight: bold;">Back</span>
					</div>
						</td>
						<td>
					<div class='sub_register' onclick="submitformconf();" style="cursor: pointer;margin-left: 50px;">
						<span style="font-size: 20px;font-weight: bold;">Finish</span>
					</div>
						</td>
					</tr>
				</table>
			</form>
			<form name="back_form" id="back_form" action="<?php echo esc_url( home_url( '/?page_id=194' ) ); ?>" method="post">
				<input type="hidden" name="back" id="back" value="back"/>
				<input type="hidden" name="class_inf" id="class_inf" value="<?php echo $classRegister ?>"/>
					<input type="hidden" name="first_name" id="first_name" value="<?php echo  $first_name ?>"/>
				<input type="hidden" name="last_name" id="last_name" value="<?php echo $last_name; ?>"/>
				<input type="hidden" name="first_furigana" id="first_furigana" value="<?php echo $_REQUEST['first_furigana'] ?>"/>
				<input type="hidden" name="last_furigana" id="last_furigana" value="<?php echo $_REQUEST['last_furigana'] ?>"/>
				<input type="hidden" name="email" id="email" value="<?php echo $email ?>"/>
				<input type="hidden" name="lab" id="lab" value="<?php echo $lab ?>"/>
				<input type="hidden" name="another_inf" id="another_inf" value="<?php echo $anotherInf ?>"/>
			</form>

		</div>
	</div>
<script type="text/javascript">
	function back_regis()
	{
		document.forms["back_form"].submit();
	}
</script>

<?php get_sidebar(); ?>

<?php get_footer(); ?>