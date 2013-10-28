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
                                        <div class="left slogan-alt txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                        <img class="slide-large" src="<?php echo get_template_directory_uri(); ?>/library/images/concept_photos/home2.jpg" alt="Products and Services" />
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
                                    <!-- END BREADCRUMBS -->
                                    
						<div id="main" class="eightcol first clearfix" role="main">

						<h1 class="archive-title"><?php post_type_archive_title(); ?></h1>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							
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
												<p><?php _e("This is the error message in the custom posty type archive template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar('products-mobile'); ?>

								</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
