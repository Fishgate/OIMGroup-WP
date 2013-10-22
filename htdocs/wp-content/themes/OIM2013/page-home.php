<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

                        <!-- Header Slideshow  -->
                        <?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
                        <!-- END Header Slideshow  -->

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
                                    
                                    <!--==============================================
                                          TYRONE INSERTS NAV HERE FROM HEADER
                                    ================================================-->
                                    <nav role="navigation">
                                        <?php get_secondary_nav(); ?>
                                    </nav>
                                    <!-- nav end -->
                                    
						<div id="main" class="twelvecol first clearfix" role="main">
                                                    
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content clearfix" itemprop="articleBody">
                                                                    <center>
                                                                        <h1 class="h1-nostyle">Business Performance Specialist in core areas of</h1>
                                                                     
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
                                                                                <a href="<?php echo site_url('/our-methodology/'); ?>">Methodology &amp; Services</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="left dynamic-service dynamic-service-mid clearfix">
                                                                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/about_mini.jpg" alt="About OIM" />
                                                                            <div class="service-copy">
                                                                                <h2>About OIM</h2>
                                                                                <p>With over 25 years' experience, Operational Improvement Management (OIM) advises several South African blue-chip companies and manages performance improvement assignments in Europe, Australia, America as well as other African countries.</p>
                                                                                <a href="<?php echo site_url('/about-oim/'); ?>">Read more about OIM</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="left dynamic-service clearfix">
                                                                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/testimonials_mini.jpg" alt="Testimonials" />
                                                                            <div class="service-copy">
                                                                                <h2>Client Testimonials</h2>
                                                                                <p>We have built long-term partnerships with many of our clients who trust us without reservation to help create sustainable solutions. "The OIM team has shown the ability to understand our requirements and delivered an effective framework for our on-going success. They are a valued 'member' of our strategy review team and their role is highly respected."</p>
                                                                                <a href="<?php echo site_url('/clients/'); ?>">View OIM's Clients</a>
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
