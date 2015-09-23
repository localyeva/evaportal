<?php
/**
 * @package WordPress
 * @subpackage Drochilli_Theme
 */
?>
<div id="aside">

	<ul>

		<?php
		if ( is_active_sidebar('sidebar-1') ) {
		?>

		<?php dynamic_sidebar( 'sidebar-1' ); ?>

		<?php } ?>

	</ul>

</div>
<?php $portal_oz_url = !empty($_COOKIE['portal_oz_url']) ? $_COOKIE['portal_oz_url'] : 'http://oz.evolable.asia'; ?>
<script language="JavaScript">
    $(document).ready(function(){
       $("a[title='oz-link']").attr('href','<?php echo $portal_oz_url; ?>').attr('target','_blank');
    });
</script>