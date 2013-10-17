<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">

					<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
					<p id="logo"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="OIM Logo" /></a></p>

					<!-- if you'd like to use the site description you can un-comment it below -->
                                        <div id="tagline">
					<?php  bloginfo('description'); ?>
                                        </div>
                                        
                                        <div id="menu-mobile" class="right">
                                            <a href="tel:+27219138814"><span class="icon" style="display: inline-block; margin-right: 25px;">@</span></a> <a href="#"><span style="display: inline-block;" class="icon">&#xe00f;</span></a>
                                        </div>
                                        
                                        <?php if( function_exists('get_mobile_menu') && get_mobile_menu() ) get_mobile_menu(); ?>

                                        <!-- =============================
                                               MEGA MENU by Tyrone
                                        =============================== -->
                                        <nav id="mega-holder">
                                            <div class="clearfix">
                                                <div class="left home-holder">
                                                    <a href='<?php echo home_url(); ?>'><span class="left home-icon">F</span></a>                                                    
                                                </div>
                                                
                                                <?php if (get_main_nav()) get_main_nav(); ?>
                                                
                                                <div class="right search-holder">
                                                    <div class="right clearfix">
                                                        <div class="right details border-left searchicon"><a><span class="icon">&#xe01a;</span></a></div>
                                                        <?php if( trim(get_option('linkedin_url')) != '' ) { ?>
                                                            <div class="right details border-left">
                                                                <a href="<?php echo get_option('linkedin_url'); ?>" target="_blank"><span class="icon">&#xe021;</span></a>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if( trim(get_option('tel_number')) != '' ) { ?>
                                                            <div class="right details"><span class="icon" style="padding-right: 20px; color: #5482AB;">@</span><?php echo get_option('tel_number'); ?></div>
                                                        <?php } ?>
                                                    </div>
                                                    <div id="the-search">
                                                        <?php echo get_search_form(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </nav><!-- end mega menu -->
                                        
				</div> <!-- end #inner-header -->

			</header> <!-- end header -->
