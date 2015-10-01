<?php
/*
  Template Name: Register Class Japanese
 */
get_header();
?>
<?php
$class_regis = isset($_GET['class']) ? $_GET['class'] : 0;
$classRegister = '';
$firstname = '';
$lastname = '';
$firstfuri = '';
$lastfuri = '';
$email = '';
$lab = '';
$anotherInf = '';
if (isset($_POST['back']) && $_POST['back'] == 'back') {
    $classRegister = $_POST['class_inf'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $firstfuri = $_POST['first_furigana'];
    $lastfuri = $_POST['last_furigana'];
    $email = $_POST['email'];
    $lab = $_POST['lab'];
    $anotherInf = $_POST['another_inf'];
    if ($classRegister == '初級クラス') {
        $class_regis = 1;
    } elseif ($classRegister == '日本語能力試験対策クラス') {
        $class_regis = 2;
    } elseif ($classRegister == '日本語ITクラス') {
        $class_regis = 3;
    } else {
        $class_regis = 4;
    }
}
?>
<script type="text/javascript">
    $(document).ready(function () {
        var flag = location.search.split('flagsave=')[1];

        if (flag == 1)
        {
            alert('You have registed sucessfull');
        }
        if (flag == 2)
        {
            alert('You have registed fail');
        }
    });
    function submitform()
    {
        var check = true;
        var class_regis = $("#class_inf").val();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email = $("#email").val();
        var email_conf = $("#email_conf").val();

        //alert(class_regis + "=="+ first_name + "==" + last_name + "==" + email+ "===" + email_conf);
        if (class_regis.trim() == "" || class_regis == null) {
            $("#require_class").css("display", "inline-block");
            check = false;
        }
        if (class_regis.trim() != "" && class_regis != null) {
            $("#require_class").css("display", "none");
        }
        if (first_name.trim() == "" || first_name == null || last_name.trim() == "" || last_name == null) {
            $("#full_name_requi").css("display", "inline-block");
            check = false;
        }
        if (first_name.trim() != "" && first_name != null && last_name.trim() != "" && last_name != null) {
            $("#full_name_requi").css("display", "none");
        }
        if (email.trim() == "" || email == null) {
            $("#email_and_confirm_requi").css("display", "inline-block");
            check = false;

        }
        if (email.trim() != "" && email != null) {
            $("#email_and_confirm_requi").css("display", "none");

        }
        if (email != email_conf) {
            $('#valid_email_confirm').css('display', 'block');
            check = false;
        }
        if (check) {
            document.forms["class_register"].submit();
        }
    }
    function checkEmail() {

        var email_v = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value)) {
            $('#valid_email').css('display', 'block');
            email_v.focus;
            return false;
        }
    }

</script>
<div class="row">
    <div class="col-lg-6">
        <span><a href="<?php home_url() ?>./?page_id=194&lang=vi" style="text-decoration: none;">
                <img style="width: 15px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/images/classjapan/flag-vn.png">
            </a></span>
        <span><a href="<?php home_url() ?>./?page_id=194&lang=ja" style="text-decoration: none;">
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
    <form class="form-horizontal" name="class_register" id="class_register" action="<?php echo esc_url(home_url('/?page_id=197')); ?>" method="post">
        <div class="table-responsive">
            <table id="japan_class_tab" class="table table-bordered" style="margin-top:25px;">
                <tr>
                    <td class="pink_td">
                        <span class="required_class" id="require_class">Require</span>
                        <span class="title_register_class">Class Register</span>
                    </td>
                    <td>
                        <div class="col-lg-3">
                            <select name="class_inf" id="class_inf" class="form-control">
                            <option value="初級クラス" <?php if ($class_regis == 1) echo 'selected=selected' ?>><?php echo __('初級クラス', 'drochilli') ?></option>
                            <option value="日本語能力試験対策クラス" <?php if ($class_regis == 2) echo 'selected=selected' ?>><?php echo __('日本語能力試験対策クラス', 'drochilli') ?></option>
                            <option value="日本語ITクラス" <?php if ($class_regis == 3) echo 'selected=selected' ?>><?php echo __('日本語ITクラス', 'drochilli') ?></option>
                            <option value="ビジネス会話･マナークラス" <?php if ($class_regis == 4) echo 'selected=selected' ?>><?php echo __('ビジネス会話･マナークラス', 'drochilli') ?></option>
                        </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="pink_td">
                        <span class="required_class" id="full_name_requi">Require</span>
                        <span class="title_register_class">Full Name</span>
                    </td>
                    <td>
                        <div class="col-lg-3">
                        <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo $firstname; ?>"/>
                        </div>
                        <div class="col-lg-3">
                        <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo $lastname; ?>"/>
                        </div>
                    </td>
                </tr>
                <tr style="display:none;">
                    <td class="pink_td">
                        <span class="title_register_class">Furigana</span>
                    </td>
                    <td>
                        <div class="col-lg-3">
                        <input type="text" name="first_furigana" id="first_furigana" value="<?php echo $firstfuri; ?>" class="form-control"/>
                        </div>
                        <div class="col-lg-3">
                        <input type="text" name="last_furigana" id="last_furigana" value="<?php echo $lastfuri; ?>" class="form-control"/>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="pink_td">
                        <span class="required_class" id="email_and_confirm_requi">Require</span>
                        <span class="title_register_class">Email</span>
                    </td>
                    <td>
                        <span id="valid_email" class="col-lg-12" style="font-size: 15;font-weight: bold;display: none;color: red;">Please provide a valid email address</span>
                        <div id="email_in" class="col-lg-3">
                            <input type="text" class="form-control" name="email" id="email" size="44" maxlength="250" onblur="checkEmail();" value="<?php echo $email; ?>"/></div><br/>
                        <br/>
                        <p style="font-size: 20px;font-weight: bold;padding-top: 10px"  class="col-lg-12">Input Email Confirm</p>
                        <br/>
                        <div id="email_confirm" class="col-lg-3">
                            <input type="text" name="email_conf" id="email_conf"  size="44" maxlength="250" class="form-control"/></div>
                        <span id="valid_email_confirm" class="col-lg-12" style="font-size: 15;font-weight: bold;display: none;color: red;">Mail and mail confirm not match, please input again!</span>
                    </td>
                </tr>

                <tr>
                    <td class="pink_td">
                        <span class="title_register_class">Lab</span>
                    </td>
                    <td>
                        <div class="col-lg-3">
                        <input type="text" name="lab" class="form-control" id="lab"  size="30" maxlength="250" value="<?php echo $lab; ?>"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="pink_td">
                        <span class="title_register_class">Another Information</span>
                    </td>
                    <td>
                        <div class="col-lg-6">
                        <input type="text" name="another_inf" class="form-control" id="another_inf"  size="44" maxlength="250" value="<?php echo $anotherInf; ?>"/>
                        </div>
                    </td>
                </tr>
            </table>
        </div>  
        <div class="col-lg-12">
            <div class="sub_register btn btn-warning col-lg-2 col-lg-offset-4" onclick="submitform();" style="cursor: pointer;">
                <span style="font-size: 20px;font-weight: bold;">Register</span>
            </div>
        </div>
    </form>
</div>

<?php get_footer(); ?>