<?php get_header(); ?>

                        <!-- header image -->
                        <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/news-banner.jpg" />

			<div id="content-generic">
                            
				<div id="inner-content" class="wrap clearfix">
                                    
                                        <nav role="navigation">
                                            <?php get_secondary_nav(); ?>
                                        </nav>
                                    
                                        <!-- breadcrum -->
                                        <?php if(get_breadcrum()) get_breadcrum(); ?>

						<div id="main" class="eightcol first clearfix" role="main">

							<h1><?php single_cat_title(); ?></h1>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article class="bordered-bottom clearfix" id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                                                                
                                                                <div class="left single-news-left">
                                                                    <!-- Date block -->
                                                                    <div class="single-news-date-holder">
                                                                        <div class="day"><p><?php echo get_the_time('d'); ?></p></div>
                                                                        <div class="month"><p><?php echo get_the_time('M'); ?></p></div>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="right single-news-article-holder">
                                                                    <header class="article-header">

                                                                            <h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

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
											<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the taxonomy-custom_cat.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
