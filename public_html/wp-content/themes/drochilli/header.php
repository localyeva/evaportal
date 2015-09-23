<?php
/**
 * @package WordPress
 * @subpackage Drochilli_Theme
 */
$lang = '';
if (isset($_GET['lang']) && $_GET['lang'] != '') {
	$lang = $_GET['lang'];
	$_SESSION['language_site'] = $lang;
} else {
	$lang = $_SESSION['language_site'];
}
define('WPLANG', $lang);
load_theme_textdomain('drochilli', get_template_directory() . '/languages/' . $lang);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>"/>

    <title><?php wp_title('', true, 'right'); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icons/evaicon.ico"/>

    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-61691809-4', 'auto');
        ga('send', 'pageview');

    </script>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<div id="wrapper">

    <div id="header">

        <div class="headerwrap">

            <div id="logo">
                <a href="/?page_id=24"><img src="<?php echo get_template_directory_uri(); ?>/images/header/logo.png"
                                            alt="evolable logo"></a>
            </div>
            <div id="user">

                <div class="wel">
                    <?php
                    global $current_user;
                    get_currentuserinfo();
                    // my_wp_set_auth_cookie($current_user->ID);
                    echo 'Welcome, ' . $current_user->user_login;
                    ?>
                </div>
                <!-- /Well -->
                <div class="b-arrow"><a href="#"><img id="profile-popup"
                                                      src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-down.png"
                                                      alt="more"></a></div>
                <div id="user-profile">
                    <ul>
                        <li class="btn-c"><a href="/?page_id=94">Change your password</a></li>
                        <?php if (in_array('administrator', $current_user->roles)): ?>
                            <li class="btn-c"><a href="<?php echo home_url(); ?>/wp-admin">Admin</a></li>
                        <?php endif; ?>
                        <li class="btn-logout"><a href="<?php echo wp_logout_url(); ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
            <!-- / User Info -->
        </div>

    </div>

    <div id="page">

        <div class="columns">
