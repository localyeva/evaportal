<?php
/**
 * This file is used to markup the public facing aspect of the plugin.
 */

// If called from Frontpage Edit link we get a post_id
$page_id = !empty($_GET['page_id']) ? $_GET['page_id'] : '';
$delete_attach_flag = !empty($_GET['delete_attach']) ? $_GET['delete_attach'] : '';
if (isset($_GET["post_id"])) {
    $my_post = get_post(htmlspecialchars($_GET["post_id"]));
    $attach_file = get_attached_media('', $_GET["post_id"]);
    if (!empty($attach_file)) {
        if($delete_attach_flag == ''){
            $path_attach_file = get_attached_file(end($attach_file)->ID);
            $filename = end(explode('/', $path_attach_file));
        }else{
            delete_associated_media($_GET["post_id"]);
            $filename = '';
        }
    } else {
        $filename = '';
    }
    //echo $filename;
} else {
    $my_post = '';
}

// Set editor (content field) style
switch ($djd_options['djd-editor-style']) {
    case 'simple':
        $teeny = true;
        $show_quicktags = false;
        add_filter('teeny_mce_buttons', create_function('', "return array('');"), 50);
        break;
    case 'rich':
        $teeny = false;
        $show_quicktags = true;
        break;
    case 'visual':
        $teeny = false;
        $show_quicktags = false;
        break;
    case 'html':
        $teeny = true;
        $show_quicktags = true;
        add_filter('user_can_richedit', create_function('', 'return false;'), 50);
        break;
}

if ($called_from_widget == '1') {
    $teeny = true;
    $show_quicktags = false;
    add_filter('teeny_mce_buttons', create_function('', "return array('');"), 50);
//	add_filter ( 'user_can_richedit' , create_function ( '' , 'return false;' ) , 50 );
}

function myplugin_tinymce_buttons_2($buttons)
{
    //Remove the format dropdown select and text color selector
    $remove = array('formatselect', 'forecolor', 'indent', 'outdent', 'charmap');

    return array_diff($buttons, $remove);
}

//add_filter('mce_buttons_2','myplugin_tinymce_buttons_2');

function myplugin_tinymce_buttons($buttons)
{
    //Remove the format dropdown select and text color selector
    $remove = array('link', 'unlink', 'blockquote', 'strikethrough', 'fullscreen', 'wp_more', 'wp_adv');

    return array_diff($buttons, $remove);
}

//add_filter('mce_buttons','myplugin_tinymce_buttons');

?>
<?php if (in_array($current_user->user_status, array(5, 6))): ?>

    <?php if (!isset($_POST["djd_site_post_title"])) {

//init variables
        $cf = array();
        $sr = false;

        if ($_COOKIE["form_ok"] == 1) {
            $cf['form_ok'] = true;
            $sr = true;
        }
        $categories = get_the_category($my_post->ID);
        $term_employment=$categories[0]->term_id;
       
        ?>
<div class="row">      
        <form id="site_post_form" method="post"
              action="<?php echo admin_url('admin-ajax.php'); ?>" enctype="multipart/form-data">
            <p hidden="hidden" class="form_error_message"></p>
            <input type="hidden"
                   name="djd-our-id" <?php echo($my_post ? "value='" . $my_post->ID . "'" : "value='" . $djd_post_id . "'"); ?> />
            <input type="hidden"
                   name="djd-our-author" <?php if ($my_post) echo "value='" . $my_post->post_author . "'"; ?> />
            <div class="form-group col-lg-12">
                <label class="col-lg-12" for="djd_site_post_titel">
                    <?php echo($djd_options['djd-title'] ? $djd_options['djd-title'] : __('Subject', 'djd-site-post')); ?>
                </label>
                <div class="col-lg-6"> 
                    <input class="form-control" type="text" <?php if ($djd_options['djd-title-required'] == "1") echo "required='required'"; ?>
                        name="djd_site_post_title" maxlength="255"
                       <?php if ($my_post) echo "value='" . $my_post->post_title . "'"; ?>autofocus="autofocus"/>
                </div>
            </div>
            <?php if ($djd_options['djd-show-excerpt']) { ?>
            <div class="form-group col-lg-12">
                <label class="col-lg-12"  for="djd_site_post_excerpt"><?php echo($djd_options['djd-excerpt'] ? $djd_options['djd-excerpt'] : __('Excerpt', 'djd-site-post')); ?></label>
                <div class="col-lg-6"> 
                    <textarea class="form-control" id="djd_site_post_excerpt" name="djd_site_post_excerpt"><?php if ($my_post) echo $my_post->post_excerpt; ?></textarea>
                </div>
            </div>
            <?php } ?>
            <?php
                $settings = array(
//                    'media_buttons' => (boolean)$djd_options['djd-allow-media-upload'],
//                    'teeny' => $teeny,
//                    'wpautop' => false,
//                    'quicktags' => $show_quicktags,
//                    'editor_css' => '<style>body{line-height:1.4em;}</style>'
                );
                $editor_content = '';
                if ($my_post) $editor_content = $my_post->post_content;


                if (is_user_logged_in() || $djd_options['djd-guest-cat-select']){

                $orderby = $djd_options['djd-category-order']; //The sort order for categories.
                $active_cat = 0;
                if ($my_post) {
                    $cats = get_the_category($my_post->ID);
                    if ($cats[0]) $active_cat = $cats[0]->cat_ID;
                }
                switch ($djd_options['djd-categories']){
                case 'none':
                    break;
                case 'list':
                $args = array(
                    'orderby' => $orderby,
                    'order' => 'ASC',
                    'show_count' => 0,
                    'hide_empty' => 0,
                    'child_of' => 0,
                    'echo' => 0,
                    'selected' => $active_cat,
                    'hierarchical' => 1,
                    'name' => 'djd_site_post_select_category',
                    'class' => 'class=djd_site_post_form',
                    'depth' => 0,
                    'include' => array('customer', 'manager'),
                    'tab_index' => 0,
                    'hide_if_empty' => false
                ); ?>
                <div class="form-group col-lg-12">
                    <?php if (is_page('infomation-post') || is_page('document-post')): ?>
                    <label class="col-lg-12"
                        for="select_post_category">Target</label>                    
                    <div class="col-lg-3"> 
                        <select class="form-control" name="djd_site_post_select_category" id="djd_site_post_select_category" class="djd_site_post_form">
                            <option class="level-0" value="3" <?php echo $term_employment=='3'?'selected':'';?>>All</option>
                            <option class="level-0" value="4" <?php echo $term_employment=='4'?'selected':'';?> >Employee</option>
                            <option class="level-0" value="5" <?php echo $term_employment=='5'?'selected':'';?>>Customer</option>
                            <option class="level-0" value="6" <?php echo $term_employment=='6'?'selected':'';?>>Manager</option>
                        </select>
                    </div>
                    <?php endif; ?>
                    <?php if (is_page('japanclasspost')): ?>
                     <label class="col-lg-12"
                        for="select_post_category"><?php echo($djd_options['djd-categories-label'] ? $djd_options['djd-categories-label'] : __('Select a Category', 'djd-site-post')); ?></label>
                    <div class="col-lg-3"> 
                        <select class="form-control" name="djd_site_post_select_category" id="djd_site_post_select_category" class="djd_site_post_form">
                            <option class="level-0" value="8">初級クラス</option>
                            <option class="level-0" value="9">日本語能力</option>
                            <option class="level-0" value="10">日本語IT</option>
                            <option class="level-0" value="11">ビジネス・マナー</option>
                            <option class="level-0" value="12">その他</option>
                        </select>
                    </div>
                    <?php endif; ?>
                </div>
                    <?php //echo str_replace("&nbsp;", "&#160;", wp_dropdown_categories($args));
                    break;
                    case 'check':
                        $args = array(
                            'type' => 'post',
                            'orderby' => $orderby,
                            'order' => 'ASC',
                            'hide_empty' => 0,
                            'hierarchical' => 0,
                            'taxonomy' => 'category',
                            'pad_counts' => false
                        ); ?>
                        <div class="form-group col-lg-12">
                        <label class="col-lg-12"
                            for="djd_site_post_cat_checklist"><?php echo($djd_options['djd-categories-label'] ? $djd_options['djd-categories-label'] : __('Category', 'djd-site-post')); ?></label>
                            <div class="col-lg-12"> 
                        <ul id="djd_site_post_cat_checklist">
                            <?php $cats = get_categories($args);
                            foreach ($cats as $cat) { ?>
                                <li><input type="checkbox" name="djd_site_post_checklist_category[]"
                                           value="<?php echo($cat->cat_ID); ?>" <?php if (in_category($cat->cat_ID, $my_post->ID)) echo "checked='checked'"; ?> />&nbsp;<?php echo($cat->cat_name); ?>
                                </li>
                            <?php } ?>
                        </ul>
                            </div>
                        </div>
                        <?php break;
                    }
                    }
                    if ($djd_options['djd-allow-new-category'] && $verified_user['djd_can_manage_categories']) { ?>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-12"
                            for="djd_site_post_new_category"><?php echo($djd_options['djd-create-category'] ? $djd_options['djd-create-category'] : __('New category', 'djd-site-post')); ?></label>
                        <div class="col-lg-6"> 
                        <input class="form-control" type="text" id="djd_site_post_new_category" name="djd_site_post_new_category"
                               maxlength="255"/>
                        </div>
                    </div>
                    <?php }
                    if ($djd_options['djd-show-tags']) { ?>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-12"
                            for="djd_site_post_tags"><?php echo($djd_options['djd-tags'] ? $djd_options['djd-tags'] : __('Tags (comma-separated)', 'djd-site-post')); ?></label>
                        <div class="col-lg-6"> 
                        <input class="form-control" type="text" id="djd_site_post_tags" name="djd_site_post_tags"
                               maxlength="255" <?php if ($my_post) echo "value='" . implode(', ', $my_post->tags_input) . "'"; ?>/>
                        </div>
                    </div>
                    <?php }

                    if (current_theme_supports('post-formats') && $djd_options['djd-post-format']) {
                        $post_formats = get_theme_support('post-formats');

                        if (is_array($post_formats[0])) :
                            $post_format = get_post_format($my_post->ID);
                            if (!$post_format)
                                $post_format = '0';
                            // Add in the current one if it isn't there yet, in case the current theme doesn't support it
                            if ($post_format && !in_array($post_format, $post_formats[0]))
                                $post_formats[0][] = $post_format;
                            ?>
                        <div class="form-group col-lg-12">
                            <label class="col-lg-12" for='djd-post-format'><?php _e('Post Format', 'djd-site-post'); ?></label>
                            <div class="col-lg-6"> 
                            <select class="form-control" id='djd-post-format' name='djd-post-format'>
                                <option
                                    value="0" <?php selected($post_format, '0'); ?> ><?php echo get_post_format_string('standard'); ?></option>
                                <?php foreach ($post_formats[0] as $format) : ?>
                                    <option
                                        value="<?php echo esc_attr($format); ?>" <?php selected($post_format, $format); ?> ><?php echo esc_html(get_post_format_string($format)); ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                        </div>
                        <?php endif;
                    }

                    if (($djd_options['djd-guest-info']) && (!is_user_logged_in())) { ?>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-12" for="djd_site_post_guest_name"><?php _e('Your Name', 'djd-site-post'); ?></label>
                        <div class="col-lg-6"> 
                        <input class="form-control" type="text" required="required" id="djd_site_post_guest_name"
                               name="djd_site_post_guest_name"
                               maxlength="40"/>
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-12" for="djd_site_post_guest_email"><?php _e('Your Email', 'djd-site-post'); ?></label>
                        <div class="col-lg-6"> 
                        <input class="form-control" type="email" required="required" id="djd_site_post_guest_email"
                               name="djd_site_post_guest_email" maxlength="40"/>
                        </div>
                        <br><br>
                    </div>
                    <?php } ?>                
                <div class="form-group col-lg-12">
					<?php $posttp=$my_post->post_type;?>
                    <!--<span id="loading"></span>-->
                    <label class="col-lg-12" for="djd_site_post_guest_email">Select Location</label>
                    <div class="col-lg-6"> 
                    <select class="form-control" id="djd-post-type" name="djd-post-type">
                        <option value="all" <?php echo $posttp=='all'?'selected':'';?>>All</option>
                        <option value="hcm" <?php echo $posttp=='hcm'?'selected':'';?>>Ho Chi Minh</option>
                        <option value="danang" <?php echo $posttp=='danang'?'selected':'';?>>Da Nang</option>
                        <option value="hanoi" <?php echo $posttp=='hanoi'?'selected':'';?>>Hanoi</option>
                    </select>
                    </div>                    
                </div>
                <?php if (!is_page('document-post')): ?>                
                <div class="form-group col-lg-12">
                <label class="col-lg-12"
                    for="djdsitepostcontent"><?php echo($djd_options['djd-content'] ? $djd_options['djd-content'] : __('Content', 'djd-site-post')); ?></label>    
                <div class="col-lg-12"> 
                <?php
                wp_editor($editor_content, 'djdsitepostcontent', $settings);
                if (($djd_options['djd-quiz']) && (!is_user_logged_in())) { ?>
                    <?php $no1 = mt_rand(1, 12);
                    $no2 = mt_rand(1, 12); ?>
                    <label class="error" for="djd_quiz" id="quiz_error"
                           style="margin: 0 0 5px 10px; display: none; color: red;"><?php _e('Wrong Quiz Answer!', 'djd-site-post'); ?></label>
                    <label for="djd_quiz" id="djd_quiz_label"><?php echo $no1; ?> plus <?php echo $no2; ?> =</label>
                    <input class="form-control" type="text" required="required" id="djd_quiz" name="djd_quiz" maxlength="2" size="2"/>
                    <input type="hidden" id="djd_quiz_hidden" name="djd_quiz_hidden"
                           value="<?php echo $no1 + $no2; ?>"/>
                <?php } ?>
		</div>
                </div>
                <?php endif;?>
                <div class="form-group col-lg-12" style="padding-top: 40px">
                    <div class="col-lg-12"> 
		<?php if ($filename != ''): ?>
                    <div id="show-attach-file">
                        Attach file: <span><?php echo $filename; ?></span> <button type="button" id="update-attach-file">Update attach file</button>
                    </div>
                <?php else: ?>
                    <input type="file" name="xxxx_image">
                <?php endif; ?>
                    </div>
                <input type="hidden" name="action" value="process_site_post_form"/>                
                <?php
                    global $post;
                ?>                    
	  	<input type="hidden" name="page_id" value="<?php echo $post->post_name; ?>">
                </div>
            
                <div id="post-back-btn" class="col-lg-12 text-center">
                    <button type="submit" class="send-button btn btn-warning"
                            id="submit"><?php echo($djd_options['djd-send-button'] ? $djd_options['djd-send-button'] : __('Publish', 'djd-site-post')); ?></button>
                    <?php if (isset($_GET["post_id"])): ?>
                        <a class="btn btn-warning" href="<?php echo wp_get_referer() ?>" title="Back"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
                    <?php endif; ?>
                </div>
               
        </form>
        <!--<div id="feedback"></div>-->
</div>
    <?php } ?>
<?php endif; ?>
<script>
    var myForm = document.getElementById("site_post_form");
    document.getElementById("mceu_34-body");
    myForm.style.display = "block";

</script>
<noscript>
    <div class="noscriptmsg">
        <p><?php _e("Seems like you don't have Javascript enabled. To use this function you need to enable JavaScript.", "djd-site-post"); ?></p>
    </div>
</noscript>
<script type="text/javascript">
   //jQuery('#site_post_form').on('submit', ProcessFormAjax);
   $(document).on('click','#update-attach-file',function(){
       if(!confirm('Are you sure delete this file?')) 
           return false;
        //location.href = location.href + '&delete_attach=1';
        <?php //delete_associated_media($_GET["post_id"]); ?>
        $.ajax( location.href + '&delete_attach=1' )
        .done(function() {
            $('#show-attach-file').after('<input type="file" name="xxxx_image">');
            $('#show-attach-file').empty();
        })
        .fail(function() {
            alert( "Cannot delete file" );
        })        
    })
</script>
<script>
    function RefreshPage() {
        var newlocation = location.href;
        location.replace(newlocation.replace(location.search, ''));
    }
</script>
