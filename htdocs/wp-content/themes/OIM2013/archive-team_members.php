<?php get_header(); ?>
                        
                        <!-- feature image -->
                        <img class="response-img" src="<?php echo get_template_directory_uri() ?>/library/images/team-banner.jpg" />

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
                                                    <!--==============================================
                                                          TYRONE INSERTS NAV HERE FROM HEADER
                                                    ================================================-->
                                                    <nav role="navigation">
                                                        <?php bones_main_nav(); ?>
                                                    </nav>
                                                    <!-- nav end -->
                                    

						<div id="main" class="twelvecol first clearfix" role="main">

                                                    <h1>Our Leadership Team</h1>
                                                    
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<section class="entry-content clearfix">

                                                                    <!-- all info for a team member, you can wrap change this however you need to -->
                                                                    <a href="<?php echo get_permalink($post->ID); ?>">
                                                                        <img src="<?php echo get_feature_src($post->ID, 'team-small'); ?>" alt="<?php echo get_the_title(); ?>" />
                                                                        <?php echo get_the_title(); ?>
                                                                        <?php get_job_descrip(); ?>
                                                                    </a>

								</section> <!-- end article section -->

							</article> <!-- end article -->

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

						</div> <!-- end #main -->

								</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
