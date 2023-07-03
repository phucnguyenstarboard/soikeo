<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

        <link href="<?php bloginfo('template_directory');?>/assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="<?php bloginfo('template_directory');?>/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php bloginfo('template_directory');?>/assets/css/font-awesome.min.css"  rel="stylesheet"/>
        <link href="<?php bloginfo('template_directory');?>/assets/images/favicon.ico" type="image/x-icon"  rel="shortcut icon"/>
        <link href="<?php bloginfo('template_directory');?>/assets/css/menu.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/jquery.min.js"  class="library"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/bootstrap.min.js" class="library"></script>
        <!-- start menu -->
        <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/megamenu.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/jquery.leanModal.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/easyResponsiveTabs.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/move-top.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/easing.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/bootstrap.validation.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/syshelper.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/bootbox.min.js" class="library"></script>
        <style>
            a {
            color: #FF910C;
            }
        </style>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/perfect-scrollbar.css" >
        <script type="application/x-javascript"> 
            addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
        </script>		

	</head>

	<body>

        <!-- header-section-starts -->
        <div class="header-top-strip">
            <div class="container">
                <div class="header-top-left">
                    <p><a href="/"><img src="<?php bloginfo('template_directory');?>//assets/images/logo.png"></a></p>
                </div>
                <div class="header-top-right">
                    <p> 
                        <span id="lbExit"></span>
                        <span id="lbLogin">
                        <a data-toggle="modal" href="#">Đăng nhập</a>
                        &nbsp;&nbsp;|&nbsp;&nbsp;<a data-toggle="modal" href="#">Đăng ký</a>
                        &nbsp;&nbsp;|&nbsp;&nbsp;<a data-toggle="modal" href="#">Đăng ký VIP</a>
                        </span>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <a data-toggle="modal" href="#">Yêu thích</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <a data-toggle="modal" href="#">Đặt làm trang chủ</a>			    
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
