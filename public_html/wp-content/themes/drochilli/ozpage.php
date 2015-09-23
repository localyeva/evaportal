<?php /*
Template Name: OZ Template
*/
get_header();
global $current_user;
get_currentuserinfo();
$email = $current_user->user_email;

$url = 'http://oz.evolable.asia/api/evolable/api1?email=' . $email;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/x-www-form-urlencoded',
    'Content-Length: 0'
));
curl_setopt($curl, CURLOPT_POST, 1);
//curl_setopt($curl, CURLOPT_POSTFIELDS, array('email' => $email));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($curl);
$result = json_decode($result);
curl_close($curl);
if($result->status == 1){
    $location = $result->data->login_url;
}else{
    $location = 'http://oz.evolable.asia';
}
?>
<div id="content">
<a href="<?php echo $location; ?>" id="oz-link" target="_blank"></a>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
<?php if(!empty($result)): ?>
<script language="javascript">
    $(document).ready(function(){
        $("#oz-link")[0].click();
        window.location.href = window.location.protocol + "//" + window.location.host + "/";
    });
</script>
<?php endif; ?>
