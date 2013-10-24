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
                                        <img class="slide-large" src="<?php echo get_template_directory_uri(); ?>/library/images/news-banner.jpg" />
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
                                                        
                                                        <?php if (is_category()) { ?>
								<h1><?php single_cat_title(); ?></h1>

							<?php } elseif (is_tag()) { ?>
								<h1><?php single_tag_title(); ?></h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1><?php the_author_meta('display_name', $author_id); ?></h1>
                                                                
							<?php } elseif (is_day()) { ?>
								<h1><?php the_time('l, F j, Y'); ?></h1>

							<?php } elseif (is_month()) { ?>
                                                                <h1><?php the_time('F Y'); ?></h1>

							<?php } elseif (is_year()) { ?>
                                                                <h1><?php the_time('Y'); ?></h1>
							<?php } ?>

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
                                                                
                                                            
                                                                    <footer class="right article-footer">

                                                                        <p class="byline vcard" style="margin: 0;"><?php printf(__('Posted in %1$s', 'bonestheme'), get_the_category_list(', ')); ?></p>

                                                                    </footer> <!-- end article footer -->
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
												<p><?php _e("This is the error message in the archive.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar('news'); ?>

								</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
