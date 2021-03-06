<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                
                <title><?php wp_title(); ?></title>
                
		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons -->
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
                <script>
                    var _gaq=[['_setAccount','UA-18345001-4'],['_trackPageview']];
                    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                    g.src='//www.google-analytics.com/ga.js';
                    s.parentNode.insertBefore(g,s)}(document,'script'));
                </script>

                <script>
                    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                    ga('create', 'UA-45894770-1', 'oimgroup.com');
                    ga('send', 'pageview');
                </script>
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">

					<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
					<p id="logo"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="OIM Logo" /></a></p>

					<!-- if you'd like to use the site description you can un-comment it below -->
                                        <h2 id="tagline">
                                            <?php  bloginfo('description'); ?>
                                        </h2>
                                        
                                        <div id="menu-mobile" class="right">
                                            <a><span id="mob-search-icon" class="icon">&#xe01a;</span></a>
                                            <a href="tel:+27219138814"><span class="icon" style="display: inline-block; margin-right: 25px;">@</span></a>
                                            <a id="mob-menu" href="#"><span style="display: inline-block;" class="icon">&#xe00f;</span></a>
                                            <div id="mob-search"><?php echo get_search_form(); ?></div>
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
