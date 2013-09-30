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
                                                        Our Methodology <span class="icons">&#xe0ab;</span>
                                                        <ul class="secondary-ul">
                                                            <li>
                                                                <div class="clearfix">
                                                                    <div class="secondary-holder left clearfix">
                                                                          <h2 class="head-secondary icon-people">People</h2>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                                    <div class="secondary-holder left clearfix">
                                                                          <h2 class="head-secondary icon-organisation">Organisation</h2>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                                    <div class="secondary-holder left clearfix">
                                                                          <h2 class="head-secondary icon-operation">Operations</h2>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        Product &amp; Services <span class="icons">&#xe0ab;</span>
                                                        <ul class="secondary-ul">
                                                            <li>
                                                                <div class="clearfix">
                                                                    <div class="secondary-holder left clearfix">
                                                                          <h2 class="head-secondary icon-people">People</h2>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                                    <div class="secondary-holder left clearfix">
                                                                          <h2 class="head-secondary icon-organisation">Organisation</h2>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                                    <div class="secondary-holder left clearfix">
                                                                          <h2 class="head-secondary icon-operation">Operations</h2>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                          <div class="secondary-link">
                                                                              One
                                                                              <div class="flyout">
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                                  TWO<br />
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li id="border-right">
                                                        Contact<span class="icons">&#xe0ab;</span>
                                                        <ul class="secondary-ul">
                                                            <li>
                                                                <div>
                                                                    <h1>Hey Homie</h1>
                                                                    CONTACT DETAILS GO HERE I GUESS
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <div class="right search-holder">
                                                    <div class="right clearfix"><!-- CONTACT DETAILS -->
                                                        
                                                        <div class="right details border-left"><a href="http://za.linkedin.com/company/oim-international-pty-ltd?trk=ppro_cprof" target="_blank"><span class="home-icon">&#xe021;</span></a></div>
                                                        <div class="right details"><span class="home-icon" style="padding-right: 20px; color: #5482AB;">@</span>+27 21 913 8814/5</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                         <!-- end mega menu -->
                                        
					<!--==== Tyrone removes <nav role="navigation"><'?'php bones_main_nav(); '?'> </nav> from here and placed it on index for now ====-->

				</div> <!-- end #inner-header -->

			</header> <!-- end header -->
