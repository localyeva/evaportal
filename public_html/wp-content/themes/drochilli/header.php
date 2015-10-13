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

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css"></link>
        <!-- Custom CSS -->
        <link href="<?php echo get_template_directory_uri(); ?>/css/sb-admin.css" rel="stylesheet">
            <!-- Custom Fonts -->
            <link href="<?php echo get_template_directory_uri(); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"></link>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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

            <?php 
                wp_head();            
                global $active_menus;
            ?>

    </head>

    <body>


        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/?page_id=24"><img height="30px" src="<?php echo get_template_directory_uri(); ?>/images/header/logo.png"
                                                                     alt="evolable logo"></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">                    
                    <li class="dropdown">                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i> 
                            <?php
                            global $current_user;
                            get_currentuserinfo();
                            // my_wp_set_auth_cookie($current_user->ID);
                            echo 'Welcome, ' . $current_user->user_login;
                            ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="btn-c"><a href="/?page_id=94"><i class="fa fa-key"></i> Change your password</a></li>
                            <?php if (in_array('administrator', $current_user->roles)): ?>
                                <li class="btn-c"><a href="<?php echo home_url(); ?>/wp-admin"><i class="fa fa-user"></i> Admin</a></li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo wp_logout_url(); ?>"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                            </li>                            
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="<?php echo $active_menus['information']?>"><a href="<?php echo home_url(); ?>"><i class="fa fa-fw fa-inbox"></i> Information</a></li>
                        <li class="<?php echo $active_menus['document']?>"><a href="<?php echo home_url(); ?>/?page_id=19"><i class="fa fa-fw fa-file"></i> Document</a></li>
                        <li class="<?php echo $active_menus['schedule']?>"><a href="<?php echo home_url(); ?>/?page_id=83"><i class="fa fa-calendar"></i> Schedule</a></li>
                        <!--li><a href="#"><i class="fa fa-university"></i> Knowledge (comming soon)</a></li>
                        <li class="<?php echo $active_menus['japanese']?>"><a href="<?php echo home_url(); ?>/?page_id=31"><i class="fa fa-graduation-cap"></i> Japanese class</a></li-->
                        <li class="<?php echo $active_menus['contact']?>"><a href="<?php echo home_url(); ?>/?page_id=58"><i class="fa fa-envelope-o"></i> Contact</a></li>
                        <li class="sepa-nav"></li>
                        <li><a target="_blank" href="<?php echo WORKTIME_URL?>">Worktime <i class="fa fa-external-link"></i></a></li>
                        <li><a target="_blank" href="http://meeting.evolable.asia">Booking system <i class="fa fa-external-link"></i></a></li>
                        <li><a title="oz-link" href="http://oz.evolable.asia/" target="_blank">Oz <i class="fa fa-external-link"></i></a></li>                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>           

            <div id="page-wrapper">

                <div class="container-fluid">          
