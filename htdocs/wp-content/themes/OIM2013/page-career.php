<?php
/*
Template Name: Careers
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
                                        <p class="txt-right">The ones who keep improving<br />are the ones who stay relevant</p>
                                        <span class="right cycle-caption-btn">
                                            <a href="/contact/">Contact Us<span class="icon">&#xe0eb;</span></a>
                                        </span>
                                        <div class="left slogan txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                    <?php if(get_field('feature_url')) ?><a href="<?php echo get_field('feature_url'); ?>">
                                        <img class="slide-large" src="<?php echo get_feature_src($post->ID, 'large-feature'); ?>" alt="<?php echo get_the_title(); ?>" />
                                    <?php if(get_field('feature_url')) ?></a>
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
                                                    
                                                    <div id="main" class="eightcol first clearfix" role="main">
                                                    
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                                                                
                                                                <header class="article-header">
									<h1 class="single-title custom-post-type-title white"><?php the_title(); ?></h1>
								</header> <!-- end article header -->
                                                            
								<section class="entry-content clearfix" itemprop="articleBody">
                                                                    
                                                                    <?php the_content(); ?>
                                                                    
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
                                                <?php get_sidebar('contact'); ?>
                                                
                                                
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
