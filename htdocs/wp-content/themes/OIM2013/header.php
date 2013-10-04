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
                                            MENU <span class="icon">&#xe00f;</span>
                                        </div>
                                        
                                        <div id="mobile-menu-holder">
                                            <nav>
                                                <div class="mobile-item"><a href="">Home</a></div>
                                                <div class="mobile-item"><a href="">Our Methodology</a></div>
                                                <div class="mobile-item"><a href="">Products &amp; Services</a></div>
                                                <div class="mobile-item"><a href="">About OIM</a></div>
                                                <div class="mobile-item"><a href="">Clients</a></div>
                                                <div class="mobile-item"><a href="">Team</a></div>
                                                <div class="mobile-item"><a href="">News</a></div>
                                                <div class="mobile-item"><a href="">Careers</a></div>
                                                <div class="mobile-item"><a href="">Partnerships</a></div>
                                                <div class="mobile-item"><a href="">Contact</a></div>
                                            </nav>
                                        </div>

                                   <!-- =============================
                                               MEGA MENU by Tyrone
                                        =============================== -->
                                        <nav id="mega-holder">
                                            
                                            <div class="clearfix">
                                                <div class="left home-holder">
                                                    <a href='<?php echo home_url(); ?>'><span class="left home-icon">F</span></a>
                                                    <!--<span class="left generic-type-mega">in</span>-->
                                                </div>
                                                <ul class="left sf-menu">
                                                    <li id="border-left">
                                                        <a href="#">Our Methodology</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Products &amp; Services <span class="icons">&#xe0ab;</span></a>
                                                        <ul class="secondary-ul">
                                                            <li>
                                                                <div class="clearfix">
                                                                    <div class="secondary-holder left clearfix">
                                                                          <h2 class="head-secondary icon-people">People</h2>
                                                                          <div class="secondary-link">
                                                                              <a href="#">Employee engagement (INVOCOMS)</a>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              <a href="#">Leadership &amp; team interventions</a>
                                                                              <div class="flyout">
                                                                                  <ul>
                                                                                      <li><a href="#">Competency profiling</a></li>
                                                                                      <li><a href="#">Leadership assessments</a></li>
                                                                                      <li><a href="#">Leadership development</a></li>
                                                                                      <li><a href="#">Coaching</a></li>
                                                                                      <li><a href="#">Team dynamics</a></li>
                                                                                      <li><a href="#">Diversity awareness</a></li>
                                                                                  </ul>
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              <a href="#">Supervisory skills</a>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              <a href="#">Performance &amp; talent management</a>
                                                                              <div class="flyout">
                                                                                  <ul>
                                                                                      <li><a href="#">Talent management model</a></li>
                                                                                      <li><a href="#">Individual performance management</a></li>
                                                                                      <li><a href="#">Reward consultation</a></li>
                                                                                  </ul>
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                                    <div class="secondary-holder secondary-holder-mid left clearfix">
                                                                          <h2 class="head-secondary icon-organisation">Organisation</h2>
                                                                          <div class="secondary-link">
                                                                               <a href="#">Business strategy</a>
                                                                              <div class="flyout">
                                                                                  <ul>
                                                                                      <li><a href="#">trategic planning</a></li>
                                                                                      <li><a href="#">Strategic &amp; change communication</a></li>
                                                                                      <li><a href="#">Value chain strategy</a></li>
                                                                                  </ul>
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              <a href="#">Business architecture</a>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              <a href="#">Employee relations</a>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              <a href="#">Stakeholder perception surveys</a>
                                                                          </div>
                                                                    </div>
                                                                    <div class="secondary-holder left clearfix">
                                                                          <h2 class="head-secondary icon-operation">Operations</h2>
                                                                          <div class="secondary-link">
                                                                              <a href="#">Business/operations review</a>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              <a href="#">Operations management interventions</a>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              <a href="#">Continuous improvement</a>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              <a href="#">IT systems management &amp; project resourcing</a>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li id="border-right">
                                                        <a href="#">Contact</a>
                                                    </li>
                                                </ul>
                                                <div class="right search-holder">
                                                    <div class="right clearfix"><!-- CONTACT DETAILS -->
                                                        <div class="right details border-left searchicon"><a><span class="icon">&#xe01a;</span></a></div>
                                                        <div class="right details border-left"><a href="http://za.linkedin.com/company/oim-international-pty-ltd?trk=ppro_cprof" target="_blank"><span class="icon">&#xe021;</span></a></div>
                                                        <div class="right details"><span class="icon" style="padding-right: 20px; color: #5482AB;">@</span>+27 21 913 8814/5</div>
                                                    </div>
                                                    <div id="the-search">
                                                        <?php echo get_search_form(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                         <!-- end mega menu -->
                                        
					<!--==== Tyrone removes <nav role="navigation"><'?'php bones_main_nav(); '?'> </nav> from here and placed it on index for now ====-->

				</div> <!-- end #inner-header -->

			</header> <!-- end header -->
