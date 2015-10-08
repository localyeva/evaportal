<?php
/**
 * @package WordPress
 * @subpackage Drochilli_Theme
 */



/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! isset( $content_width ) )
	$content_width = 584;

function drochilli_setup() {
	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();	

}

remove_filter( 'the_content', 'wpautop' );
add_action( 'after_setup_theme', 'drochilli_setup' );

function drochilli_widgets_init() {
	register_sidebar( array(
		'name' => 'Main Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '<span><!-- --></span></h3>',
	) );

}	

add_action( 'widgets_init', 'drochilli_widgets_init' );

add_theme_support( "post-thumbnails" );

/**
 * Enqueues scripts and styles for front-end.
 */
function drochilli_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Include theme stylesheet
	wp_register_style('style', get_stylesheet_directory_uri() .'/style.css');
	wp_enqueue_style('style');	

}

//add_action( 'wp_enqueue_scripts', 'drochilli_scripts_styles' );

function drochilli_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'drochilli' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'drochilli_wp_title', 10, 2 );

function drochilli_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<div class="comment-meta">
				<div class="comment-author">
				<a href="#comment-<?php comment_ID() ?>"></a><cite class="fn"><?php comment_author_link() ?></cite> <span class="says">says</span> <span class="commentmetadata">(<?php comment_date('j.m.Y') ?> at <?php comment_time() ?>):</span></div>
				<div class="comment-avatar"><?php echo get_avatar( $comment, 42 ); ?></div>
			</div>
			<div class="comment-text">
				<?php if ($comment->comment_approved == '0') : ?><em><?php _e('Your comment is awaiting moderation.', 'drochilli'); ?></em><?php endif; ?>
				<?php comment_text(); ?>
				<?php echo comment_reply_link(array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']));  ?>	
			</div>
		</div>
<?php }


function replace_howdy( $wp_admin_bar ) {
$my_account=$wp_admin_bar->get_node('my-account');
$newtitle = str_replace( 'Howdy,', 'Welcome, ', $my_account->title );
$wp_admin_bar->add_node( array(
'id' => 'my-account',
'title' => $newtitle,
) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

function custom_login_css() { echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/login/login-styles.css" /> <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> '; } add_action('login_head', 'custom_login_css');

function my_login_logo_url() {
	return get_bloginfo('url');
}
add_filter('login_headerurl', 'my_login_logo_url');
function my_login_logo_url_title() {
	return 'https://portal-blaclgost.c9.io';
}
add_filter('login_headertitle', 'my_login_logo_url_title');
function my_login_head() { remove_action('login_head', 'wp_shake_js', 12); } add_action('login_head', 'my_login_head');

function enable_more_buttons($buttons) {

$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
$buttons[] = 'styleselect';
$buttons[] = 'backcolor';
$buttons[] = 'newdocument';
$buttons[] = 'cut';
$buttons[] = 'copy';
$buttons[] = 'charmap';
$buttons[] = 'hr';
$buttons[] = 'visualaid';

return $buttons;
}
add_filter('mce_buttons_3', 'enable_more_buttons');

add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );
function myformatTinyMCE( $in ) {

$in['wordpress_adv_hidden'] = FALSE;

return $in;
}
// First, create a function that includes the path to your favicon
function add_favicon() {
    $favicon_url = get_template_directory_uri() . "/images/icons/evaicon.ico";
    echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

// Now, just make sure that function runs when you're on the login page and admin pages
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

///upload file
function insert_attachment($file_handle,$post_id)
{
    if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
    $uploadedfile = $_FILES[$file_handle];
    $upload_overrides = array( 'test_form' => false );
    $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
    if ( $movefile ) {
        $wp_filetype = $movefile['type'];
        $filename = $movefile['file'];
        $wp_upload_dir = wp_upload_dir();
        $attachment = array(
            'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
            'post_mime_type' => $wp_filetype,
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attach_id = wp_insert_attachment( $attachment, $filename,$post_id);
    }
    if($attach_id)
        return $attach_id;
    else
        return false;
}


//////////////////////
function xxxx_update_post($post_id, $post) {

    // Get the post type. Since this function will run for ALL post saves (no matter what post type), we need to know this.
    // It's also important to note that the save_post action can runs multiple times on every post save, so you need to check and make sure the
    // post type in the passed object isn't "revision"
    $post_type = $post->post_type;
    if($_REQUEST['page_id'] == 'document-post'){
        add_post_meta($post_id, 'meta-post-type', 'document', true);
    }else if($_REQUEST['page_id'] == 'infomation-post'){
        add_post_meta($post_id, 'meta-post-type', 'information', true);
    }
    
        // Logic to handle specific post types
        switch($post_type) {

            // If this is a post. You can change this case to reflect your custom post slug
            case 'hanoi':
            case 'hcm':
            case 'all':
                // HANDLE THE FILE UPLOAD

                // If the upload field has a file in it
                if(isset($_FILES['xxxx_image']) && ($_FILES['xxxx_image']['size'] > 0)) {

                    // Get the type of the uploaded file. This is returned as "type/extension"
                    $arr_file_type = wp_check_filetype(basename($_FILES['xxxx_image']['name']));
                    $uploaded_file_type = $arr_file_type['type'];

                    // Set an array containing a list of acceptable formats
                    $allowed_file_types = array('image/jpg','image/jpeg','image/gif','image/png',
                                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                                'application/vnd.ms-excel',
                                                'application/msword',
                                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                                'application/pdf');

                    // If the uploaded file is the right format
                    if(in_array($uploaded_file_type, $allowed_file_types)) {

                        // Options array for the wp_handle_upload function. 'test_upload' => false
                        $upload_overrides = array( 'test_form' => false );

                        // Handle the upload using WP's wp_handle_upload function. Takes the posted file and an options array
                        $uploaded_file = wp_handle_upload($_FILES['xxxx_image'], $upload_overrides);

                        // If the wp_handle_upload call returned a local path for the image
                        if(isset($uploaded_file['file'])) {

                            // The wp_insert_attachment function needs the literal system path, which was passed back from wp_handle_upload
                            $file_name_and_location = $uploaded_file['file'];

                            // Generate a title for the image that'll be used in the media library
                            $file_title_for_media_library = 'your title here';

                            // Set up options array to add this file as an attachment
                            $attachment = array(
                                'post_mime_type' => $uploaded_file_type,
                                'post_title' => 'Uploaded image ' . addslashes($file_title_for_media_library),
                                'post_content' => '',
                                'post_status' => 'inherit',
                                'post_parent'       => $post_id
                            );
                            // Run the wp_insert_attachment function. This adds the file to the media library and generates the thumbnails. If you wanted to attch this image to a post, you could pass the post id as a third param and it'd magically happen.
                            $attach_id = wp_insert_attachment( $attachment, $file_name_and_location );
                            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                            $attach_data = wp_generate_attachment_metadata( $attach_id, $file_name_and_location );
                            wp_update_attachment_metadata($attach_id,  $attach_data);

                            // Before we update the post meta, trash any previously uploaded image for this post.
                            // You might not want this behavior, depending on how you're using the uploaded images.
                            $existing_uploaded_image = (int) get_post_meta($post_id,'attach_file_for_post', true);
                            if(is_numeric($existing_uploaded_image)) {
                                wp_delete_attachment($post_id);
                            }

                            // Now, update the post meta to associate the new image with the post
                            update_post_meta($post_id,'attach_file_for_post',$attach_id);

                            // Set the feedback flag to false, since the upload was successful
                            $upload_feedback = false;


                        } else { // wp_handle_upload returned some kind of error. the return does contain error details, so you can use it here if you want.

                            $upload_feedback = 'There was a problem with your upload.';
                            update_post_meta($post_id,'attach_file_for_post',$attach_id);

                        }

                    } else { // wrong file type

                        $upload_feedback = 'Please upload only image files (jpg, gif or png).';
                        update_post_meta($post_id,'attach_file_for_post',$attach_id);

                    }

                } else { // No file was passed

                    $upload_feedback = false;

                }

                // Update the post meta with any feedback
                update_post_meta($post_id,'_xxxx_attached_image_upload_feedback',$upload_feedback);

                break;

            default:

        } // End switch

        return;

}
add_action('save_post','xxxx_update_post',1,2);
//delete attach file
function delete_associated_media($post_id) {
    $attachments = get_posts( array(
        'post_type'      => 'attachment',
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'post_parent'    => $post_id
    ) );

    foreach ( $attachments as $attachment ) {
        if ( false === wp_delete_attachment( $attachment->ID,true ) ) {
            unlink(get_attached_file($attachment->ID));
        }
    }

}
add_action('before_delete_post', 'delete_associated_media');

add_action('wp_head', 'set_active_menu', 10);

$active_menus = array();

function set_active_menu() {
    global $active_menus;
    $active_menus = array('information'=>'','document' => '', 'japanese' => '', 'contact' => '', 'schedule' => '');
    /*
    echo '<pre style="text-align:right">';
    print_r(get_the_ID());
    echo '</pre>';
     * 
     */
    switch (get_the_ID()) {
        case 24: //information
            $active_menus['information'] = 'active';
            break;
        case 19: //document
            $active_menus['document'] = 'active';
            break;
        case 31: //Japanese
            $active_menus['japanese'] = 'active';
            break;
        case 58: //Contact
            $active_menus['contact'] = 'active';
            break;
        case 83: //Schedule
            $active_menus['schedule'] = 'active';
            break;
        default:
            break;
    }
}