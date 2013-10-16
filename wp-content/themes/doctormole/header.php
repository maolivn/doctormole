<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Doctor_Mole
 * @since Doctor Mole 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title('-', TRUE, 'right'); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 8]><script src="<?php echo get_template_directory_uri(); ?>/js/IE8.js" type="text/javascript"></script><![endif]-->
    <?php //wp_head(); ?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/import.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cycle.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.lightbox.js"></script>
    <script type="text/javascript">$(function() { $('.device').cycle(); $('#screenshots a').lightBox({fixedNavigation:true}); });</script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/input-text.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/contactform.js"></script>
    <meta property="og:title" content="Doctor Mole" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="http://www.doctormole.com" />
    <meta property="og:image" content="http://www.doctormole.com/images/smallLogo.png" />
    <meta property="og:site_name" content="Doctor Mole" />
    <meta property="fb:admins" content="558465548" />
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div id="wrapper">
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
    <table id="share">
        <tr>
            <td>
                <a href="https://twitter.com/share" class="twitter-share-button" data-text="Checkout Doctor Mole skin cancer app" data-via="Doctor_Mole_App" data-width="30" data-related="DoctorMole">Tweet</a>
            </td>
            <td>
                <div class="fb-like" data-href="http://www.facebook.com/DoctorMole" data-send="true" data-layout="button_count" data-width="50" data-show-faces="false"></div>
            </td>
            <td class="google">
                <g:plusone size="small" width="260" annotation="inline"></g:plusone>
            </td>
        </tr>
    </table>
<div id="header">
    <input type="hidden" id="theme_link" value="<?php echo get_template_directory_uri(); ?>">
    <!-- Place this tag where you want the +1 button to render -->
    <!-- Place this render call where appropriate -->
    <script type="text/javascript">
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
    </script>
    <!-- Screenshot Slideshow -->
    <div class="device iphone">
        <img src="<?php echo get_template_directory_uri(); ?>/images/screenshots/iphone-1.jpg" alt="Screenshot #1" title="Screenshot #1"/>
        <img src="<?php echo get_template_directory_uri(); ?>/images/screenshots/iphone-2.jpg" alt="Screenshot #2" title="Screenshot #2"/>
        <img src="<?php echo get_template_directory_uri(); ?>/images/screenshots/iphone-3.jpg" alt="Screenshot #3" title="Screenshot #3"/>
        <img src="<?php echo get_template_directory_uri(); ?>/images/screenshots/iphone-4.jpg" alt="Screenshot #4" title="Screenshot #4"/>
    </div>
    <div class="right-header">
        <?php dynamic_sidebar( 'sidebar-3' ); ?>

        <div class="buttons">
            <a onclick="recordOutboundLink(this, 'Outbound Links', 'http://itunes.apple.com');return false;" href="http://itunes.apple.com/us/app/doctormole/id562711395?ls=1&mt=8" alt="Get the Doctormole App for iPhone">
                <img src="<?php echo get_template_directory_uri(); ?>/images/app_store_link.png"/>
            </a>
            <a href="https://itunes.apple.com/au/app/id617647685?mt=8" onClick="recordOutboundLink(this, 'Outbound Links', ' https://itunes.apple.com/ipad');return false;">
            <img src="<?php echo get_template_directory_uri(); ?>/images/ipad_link.png"/>
            </a>
        </div>
    </div>
</div>
<div id="content">
