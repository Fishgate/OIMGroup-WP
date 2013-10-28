<?php
/*
Template Name: Clients
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
                                        <p class="txt-right">The ones who keep on improving<br />are the ones who stay relevant</p>
                                        <span class="right cycle-caption-btn">
                                            <a href="/contact/">Contact Us<span class="icon">&#xe0eb;</span></a>
                                        </span>
                                        <div class="left slogan txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                    <?php if(get_field('feature_url')) { ?><a href="<?php echo get_field('feature_url'); ?>"><?php } ?>
                                        <img class="slide-large" src="<?php echo get_feature_src($post->ID, 'large-feature'); ?>" alt="<?php echo get_the_title(); ?>" />
                                    <?php if(get_field('feature_url')) { ?></a><?php } ?>
                                </div>
                            </div>
                        <!-- END Header Slideshow  -->

			<div id="content-generic">

				<div id="inner-content" class="wrap clearfix">
                                                  
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
									<h1 class="white custom-post-type-title"><?php the_title(); ?></h1>
								</header> <!-- end article header -->
                                                            
								<section class="entry-content clearfix" itemprop="articleBody">
                                                                    
                                                                    <?php the_content(); ?>
                                                                    
								</section> <!-- end article section -->
                                                                
                                                                
                                                                
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
                                                
                                                <?php get_sidebar('clients'); ?>
     
                                                
				</div> <!-- end #inner-content -->
                                
                                <div class="wrap">
                                    <h2>Our Client list includes:</h2>
                                    <?php if ( function_exists('get_client_scroller') && get_client_scroller() ) get_client_scroller(); ?>
                                </div>

			</div> <!-- end #content -->

                        
                        
<?php get_footer(); ?>
