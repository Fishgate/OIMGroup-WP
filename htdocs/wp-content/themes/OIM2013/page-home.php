<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

                        
                        <!-- Header Slideshow  -->
                            <div class="cycle-slideshow" 
                            data-cycle-fx="fade" 
                            data-cycle-timeout="8000"
                            data-cycle-slides="> div"
                            data-cycle-loader="wait"
                            >
                                
                                <div class="cycle-slide">
                                    <div class="cycle-caption clearfix">
                                        <p class="txt-right">In an ever-changing world,<br />constant improvement is an<br />integral part of continued success</p>
                                        <span class="right cycle-caption-btn">
                                            <a href="/about-oim/">Read More<span class="icon">&#xe0eb;</span></a>
                                        </span>
                                        <div class="left slogan txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                    <img class="slide-large" src="<?php echo get_template_directory_uri(); ?>/library/images/concept_photos/home1.jpg"/>
                                </div>
                                
                                <div class="cycle-slide">
                                    <div class="cycle-caption clearfix">
                                        <p class="txt-right">Progress comes as a result<br />of proven methodologies</p>
                                        <span class="right cycle-caption-btn">
                                            <a href="/about-oim/our-methodology/">Read More<span class="icon">&#xe0eb;</span></a>
                                        </span>
                                        <div class="left slogan txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                    <img class="slide-large" src="<?php echo get_template_directory_uri(); ?>/library/images/concept_photos/home2.jpg"/>
                                </div>
                                
                                <div class="cycle-slide">
                                    <div class="cycle-caption clearfix">
                                        <p class="txt-left">Without an experienced team to<br />facilitate improvement,<br />market leaders become followers</p>
                                        <span class="left cycle-caption-btn">
                                            <a href="/team/">Read More<span class="icon">&#xe0eb;</span></a>
                                        </span>
                                        <div class="left slogan txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                    <img class="slide-large" src="<?php echo get_template_directory_uri(); ?>/library/images/concept_photos/team.jpg"/>
                                </div>
                            </div>
                        <!-- END Header Slideshow  -->

			<div id="content">
				<div id="inner-content" class="wrap clearfix">
                                    
                                    <!--==============================================
                                          TYRONE INSERTS NAV HERE FROM HEADER
                                    ================================================-->
                                    <nav role="navigation" class="clearfix">
                                        <?php get_secondary_nav(); ?>
                                    </nav>
                                    <!-- nav end -->
                                    
						<div id="main" class="twelvecol first clearfix" role="main">
                                                    
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content clearfix" itemprop="articleBody">
                                                                    <center>
                                                                        <h1 class="h1-nostyle">Business performance specialists in core areas of</h1>
                                                                     
                                                                        <a class="service-link">People Management</a>

                                                                        <a class="service-link">Organisational Performance</a>

                                                                        <a class="service-link">Operational Optimisation</a>
                                                                    </center>
                                                                    <div style="padding: 20px 0; margin: 30px 0;" class="bordered-top-bottom">
                                                                    <?php the_content(); ?>
                                                                    </div>
                                                                    <!-- TYRONE ADDS 3 DIVS FOR DYNAMIC SERVICES-->
                                                                        <div class="left dynamic-service clearfix">
                                                                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/methodology_mini.jpg" alt="Our Methodology" />
                                                                            <div class="service-copy">
                                                                                <h2>Our Methodology</h2>
                                                                                <p>In the same way Apple understands technology, OIM understands how to translate strategy into action and sustainable results in key business areas. This is our field of expertise and why we call ourselves performance specialists.</p>
                                                                                <a href="<?php echo site_url('about-oim/our-methodology/'); ?>">Methodology &amp; Services</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="left dynamic-service dynamic-service-mid clearfix">
                                                                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/about_mini.jpg" alt="About OIM" />
                                                                            <div class="service-copy">
                                                                                <h2>About OIM</h2>
                                                                                <p>With over 25 years' experience, Operational Improvement Management (OIM) advises several South African blue-chip companies and has managed performance improvement assignments in Europe, Australia, America as well as other African countries.</p>
                                                                                <a href="<?php echo site_url('/about-oim/'); ?>">Read more about OIM</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="left dynamic-service clearfix">
                                                                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/testimonials_mini.jpg" alt="Testimonials" />
                                                                            <div class="service-copy">
                                                                                <h2>Client Testimonials</h2>
                                                                                <p>We have built long-term partnerships with many of our clients who trust us without reservation to help create sustainable solutions. "The OIM team has shown the ability to understand our requirements and delivered an effective framework for our on-going success. They are a valued 'member' of our strategy review team and their role is highly respected."</p>
                                                                                <a href="<?php echo site_url('/clients/'); ?>">View OIM's clients</a>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        <h2>Clients</h2>
                                                                        <?php if ( function_exists('get_client_scroller') && get_client_scroller() ) get_client_scroller(); ?>
                                                                    
								</section> <!-- end article section -->

								<footer class="article-footer">
									<p class="clearfix"><?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?></p>

								</footer> <!-- end article footer -->
                                                                
							</article> <!-- end article -->

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
                                                                                        </header>
											<section class="entry-content">
												<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
                                                                                        </section>
                                                                                        <footer class="article-footer">
												<p><?php _e("This is the error message in the page-custom.php template.", "bonestheme"); ?></p>
                                                                                        </footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>