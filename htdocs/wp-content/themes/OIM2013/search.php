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
                                        <div class="left slogan txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                    <img class="slide-large" src="<?php echo get_template_directory_uri(); ?>/library/images/news-banner.jpg" alt="team"/>
                                </div>
                            </div>
                        <!-- END Header Slideshow  -->
                        
			<div id="content-generic">

				<div id="inner-content" class="wrap clearfix">
                                    
                                    <nav role="navigation">
                                        <?php get_secondary_nav(); ?>
                                    </nav>

                                    <!-- breadcrum -->
                                    <?php if(get_breadcrum()) get_breadcrum(); ?>
                                    
					<div id="main" class="eightcol first clearfix" role="main">
						<h1 class="archive-title"><span><?php _e('Search Results for:', 'bonestheme'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article class="bordered-bottom clearfix" id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                                                                
                                                                <div class="left single-news-left">
                                                                    <!-- Date block -->
                                                                    <div class="single-news-date-holder">
                                                                        <div class="day"><?php echo get_the_time('d'); ?></div>
                                                                        <div class="month"><?php echo get_the_time('M'); ?></div>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="right single-news-article-holder">
                                                                    <header class="article-header">

                                                                            <h2 class="single-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                                                                    </header> <!-- end article header -->

                                                                    <section class="entry-content clearfix">

                                                                            <?php the_post_thumbnail( 'bones-thumb-300' ); ?>

                                                                            <?php the_excerpt(); ?>
                                                                    </section> <!-- end article section -->
                                                                </div>
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
											<h2><?php _e("Sorry, No Results.", "bonestheme"); ?></h2>
										</header>
										<section class="entry-content">
											<p><?php _e("Try your search again.", "bonestheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the search.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

							<?php get_sidebar('news'); ?>

					</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
