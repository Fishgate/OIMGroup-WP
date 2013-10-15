<?php get_header(); ?>
                        
                        <!-- feature image -->
                        <img class="response-img" src="<?php echo get_template_directory_uri() ?>/library/images/client-case-studies-banner.jpg" alt="Team" />

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
                                    
						<div id="main" class="eightcol first clearfix" role="main">
                                                    
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                                   
								<header class="article-header">
                                                                    <!-- static heading, this is here on every client case study page -->
                                                                    <h1>Client Case Studies</h1>
                                                                        
                                                                    <!-- feature image of team member-->
                                                                    <img class="" src="<?php echo get_feature_src($post->ID, 'client-logo'); ?>" alt="<?php echo get_the_title(); ?>" />
                                                                    
								</header> <!-- end article header -->
                                                                
                                                                <!-- job description/title custom field -->
                                                                <?php get_job_descrip(); ?>
                                                                
								<section class="entry-content clearfix">

									<?php the_content(); ?>

								</section> <!-- end article section -->

							</article> <!-- end article -->

							<?php endwhile; ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the single-custom_type.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar('team'); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
