<?php
/*
  Template Name: Change Password Template
 */
//require( APP_PATH_WP . '/wp-load.php');
//echo dirname(__FILE__);
get_header();
global $current_user;
get_currentuserinfo();
$data = json_decode(base64_decode($_GET['data']));
if (!empty($data->email) && $data->email == $current_user->user_email) {
    wp_clear_auth_cookie();
    wp_redirect(home_url());
}
?>
<div class="row page-header">
    <div class="col-lg-12">
        <h3>Change your password</h3>
    </div>
</div>
<div class="row">
    <form id="changepassform" action="http://worktimeportal.evolable.asia/ewt_users/changepasswordportal" autocomplete="off"
          method="post" name="changepassform">
        <div class="form-group col-lg-12">
            <label class="col-lg-12" for="oldpass">Old password</label>
            <div class="col-lg-6">
                <input required id="oldpass" class="input form-control" autocomplete="off"
                                         name="data[oldpassword_login]" size="20"
                                         type="password" value=""/>
            </div>
        </div>
        <div class="form-group col-lg-12">
            <label class="col-lg-12" for="pass1">New password</label>
            <div class="col-lg-6">
                <input required id="pass1" class="input form-control" autocomplete="off"
                                         name="data[newpassword_login]" size="20"
                                         type="password" value=""/>
            </div>
        </div>
        <div class="form-group col-lg-12">
            <label class="col-lg-12" for="pass2">Confirm new password</label>
            <div class="col-lg-6">
                <input required id="pass2" class="input form-control" autocomplete="off"
                                         name="pass2" size="20"
                                         type="password" value=""/>
            </div>
        </div>

        <div class="form-group col-lg-6 text-right">
            <p class="submit">
                <input id="change-pass-btn" class="btn btn-info"
                                 name="wp-submit"
                                 type="button" value="Save Password"/>
            </p>
        </div>
        <input type="hidden" name="data[email_login]" value="<?php echo $current_user->user_email; ?>"/>
        <input type="hidden" name="data[successurl]" value="<?php echo get_site_url() . '/?page_id=94&'; ?>"/>
        <input type="hidden" name="data[authkey]" id='authkey' value="65608f0d33b6e1093ad49790375d3bb3"/>
        <input type="hidden" name="data[errorurl]" value="<?php echo get_site_url() . '/?page_id=94&'; ?>"/>

    </form>
</div>


<div id="content" style="display: none">
    <div class="login">
        <p class="tit">Change your password</p>

        <form id="changepassform" action="http://worktimeportal.evolable.asia/ewt_users/changepasswordportal" autocomplete="off"
              method="post" name="changepassform">
            <label
                for="oldpass">Old password<input required id="oldpass" class="input" autocomplete="off"
                                             name="data[oldpassword_login]" size="20"
                                             type="password" value=""/></label>
            <label
                for="pass1">New password<input required id="pass1" class="input" autocomplete="off"
                                           name="data[newpassword_login]" size="20"
                                           type="password" value=""/></label>
            <label for="pass2">Confirm new password<input required id="pass2" class="input" autocomplete="off"
                                                          name="pass2"
                                                          size="20" type="password" value=""/></label>


            <p class="submit"><input id="change-pass-btn" class="button button-primary button-large"
                                     name="wp-submit"
                                     type="button" value="Save Password"/></p>
            <input type="hidden" name="data[email_login]" value="<?php echo $current_user->user_email; ?>"/>
            <input type="hidden" name="data[successurl]" value="<?php echo get_site_url() . '/?page_id=94&'; ?>"/>
            <input type="hidden" name="data[authkey]" id='authkey' value="65608f0d33b6e1093ad49790375d3bb3"/>
            <input type="hidden" name="data[errorurl]" value="<?php echo get_site_url() . '/?page_id=94&'; ?>"/>

        </form>
    </div>
</div>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $(document).on("click", "#change-pass-btn", function (event) {
        $('#change-pass-btn').removeAttr('disabled');
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;
        if (pass1.length == 0) {
            document.getElementById("pass1").style.borderColor = "#E34234";
        }
        if (pass1 != pass2) {
            //alert("Passwords Do not match");
            document.getElementById("pass1").style.borderColor = "#E34234";
            document.getElementById("pass2").style.borderColor = "#E34234";
            //$('$wp-submi').attr('disabled', 'disabled')
        }
        else {
            if ($('#oldpass').val().length == 0) {
                document.getElementById("oldpass").style.borderColor = "#E34234";
            } else {
                $('#changepassform').submit();
            }

        }
    });
    $(function(){
        var status = <?php echo !empty($_GET['?status'])?$_GET['?status']:0 ?>;
        if(status > 0){
            if(status == 1){
                alert('Your password has been changed successfully!');
            }else{
                alert('Can not change your password!');
            }
        }
    })    

</script>

<?php get_footer(); ?>
