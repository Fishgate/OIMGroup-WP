<?php get_header(); ?>
                        
                        <!-- feature image -->
                        <!--<img class="response-img" src="<?php// echo get_template_directory_uri() ?>/library/images/team-banner.jpg" alt="Team" />-->
                        <!-- Header Slideshow  --> <!--<?php// if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>-->
                        
                            <div class="cycle-slideshow" 
                            data-cycle-fx="fade" 
                            data-cycle-timeout="8000"
                            data-cycle-slides="> div"
                            data-cycle-loader="wait"
                            >
                                
                                <div class="cycle-slide">
                                    <div class="cycle-caption clearfix">
                                        <p class="txt-left">Without an experienced team to<br />facilitate improvement,<br />markey leaders become followers</p>
                                        <span class="left cycle-caption-btn">
                                            <a href="#">Contact Us<span class="icon">&#xe0eb;</span></a>
                                        </span>
                                        <div class="left slogan txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                    <img class="slide-large" src="<?php echo get_template_directory_uri(); ?>/library/images/team-banner.jpg" alt="team"/>
                                </div>
                            </div>
                        <!-- END Header Slideshow  -->

			<div id="content-generic">

				<div id="inner-content" class="wrap clearfix">
                                                <!--==============================================
                                                      TYRONE INSERTS NAV HERE FROM HEADER
                                                ================================================-->
                                                <nav role="navigation">
                                                    <?php get_secondary_nav(); ?>
                                                </nav>
                                                <!-- nav end -->
                                    
                                                <!-- breadcrum -->
                                                <?php if(get_breadcrum()) get_breadcrum(); ?>

						<div id="main" class="team-archive twelvecol first clearfix" role="main">
                                                    
                                                    <h1>Our Leadership Team</h1>
                                                    <div id="stretch-container" class="clearfix">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                                    <div class="box1">
							
                                                            <a href="<?php echo get_permalink($post->ID); ?>">
                                                                <img class="response-img" src="<?php echo get_feature_src($post->ID, 'team-small'); ?>" alt="<?php echo get_the_title(); ?>" />
                                                                <center>
                                                                    <P style="margin-top: 0;"><span style="font-weight: bold!important; font-size: 13px;"><?php echo get_the_title(); ?></span><br />
                                                                    <?php get_job_descrip(); ?></p>
                                                                </center>
                                                            </a>
                                                        
                                                    </div>
                                                    
							<?php endwhile; ?>

									<?php if (function_exists('bones_page_navi')) { ?>
											<?php bones_page_navi(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
														<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the custom posty type archive template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>
                                                        <span class="stretch"></span>
                                                    </div><!-- END STRETCH CONTAINER -->
                                                    
                                                    <center>
                                                        <div class="bordered-top-bottom team-linkdin">
                                                            <a href="#"><p>Meet the rest of the team</p></a>
                                                        </div>
                                                    </center>
                                                    
						</div> <!-- end #main -->

								</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
