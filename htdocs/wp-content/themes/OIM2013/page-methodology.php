<?php
/*
Template Name: Methodology
*/
?>

<?php get_header(); ?>



<!-- Header Slideshow  -->

          <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/concept_photos/about.jpg" alt="">

<!-- END Header Slideshow  -->

			<div id="content-generic">

				<div id="inner-content" class="wrap clearfix">

                                                    <!--==============================================
                                                          TYRONE INSERTS NAV HERE FROM HEADER
                                                    ================================================-->
                                                    <nav role="navigation">
                                                        <?php bones_main_nav(); ?>
                                                    </nav>
                                                    <!-- nav end -->
                                                    
                                                    <!-- breadcrum -->
                                                    <?php if(get_breadcrum()) get_breadcrum(); ?>
                                                    
                                                    <div id="main" class="eightcol first clearfix" role="main">
                                                    
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                                                                
                                                                <header class="article-header">
									<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
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
                                                <!--<?php// get_sidebar(); ?>--><!-- ////////////// RE-INSTATE THIS SIDEBAR WIDGET STUFF -Kyle
                                                <!-- WIDGET START -->
                                                <div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">
                                                    <!--/// ABOUT \\\-->
                                                    <div class="widget">
                                                        <h4 class="widgettitle" id="side-widget-about">More about OIM</h4>
                                                        <ul>
                                                            <li><a href="#">Overview</a></li>
                                                            <li><a href="#">BEE</a></li>
                                                            <li><a href="#">Business Ethos</a></li>
                                                            <li><a href="#">CSI</a></li>
                                                            <li><a href="#">Methodology</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- WIDGET END -->
                                                
				</div> <!-- end #inner-content -->
                                <div class="methodology-chart wrap clearfix">
                                    <!--/// ROW \\\-->
                                    <div class="left chart-block bg-blue-dark">BLOCK<span class="chart-arrow icon">&#xe0eb;</span></div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-blue-dark">BLOCK<span class="chart-arrow icon">&#xe0eb;</span></div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-blue-dark">BLOCK</div>
                                    <!--/// ROW \\\-->
                                    <div class="left chart-block bg-blue-light">BLOCK<span class="chart-arrow icon">&#xe0eb;</span></div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-blue-light">BLOCK<span class="chart-arrow icon">&#xe0eb;</span></div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-blue-light">BLOCK</div>
                                </div><!-- METHODOLOGY CHART -->
			</div> <!-- end #content -->
                        
<?php get_footer(); ?>
