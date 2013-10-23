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
                                        <div class="right slogan-product txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                    <img class="response-img" src="<?php echo get_feature_src($post->ID, 'feature-small'); ?>" />
                                </div>
                            </div>
                        <!-- END Header Slideshow  -->
                        
			<div id="content-products">

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
									<h1 class="white single-title custom-post-type-title"><?php the_title(); ?></h1>
								</header> <!-- end article header -->
                                                                
                                                                <!-- tag line custom field start -->
                                                                <?php if(get_tagline()) get_tagline(); ?>
                                                                
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

						<?php get_sidebar('products-services'); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
