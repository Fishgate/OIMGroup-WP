<?php get_header(); ?>
                        
                        <!-- feature image -->
                        <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/news-banner.jpg" />

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
                                    
                                        <nav role="navigation">
                                            <?php bones_main_nav(); ?>
                                        </nav>
                                    
                                        <!-- breadcrum -->
                                        <?php if(get_breadcrum()) get_breadcrum(); ?>

						<div id="main" class="eightcol first clearfix" role="main">
                                                        
                                                        <h1>News</h1>

							<?php if (is_category()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Posts Categorized:", "bonestheme"); ?></span> <?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Posts Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                                                                Article start------------------
                                                                
                                                                <!-- Date block -->
                                                                <div>
                                                                    <?php echo get_the_time('d'); ?><br />
                                                                    <?php echo get_the_time('M'); ?>
                                                                </div>
                                                            
								<header class="article-header">

									<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									
								</header> <!-- end article header -->

								<section class="entry-content clearfix">

									<?php the_post_thumbnail( 'bones-thumb-300' ); ?>

									<?php the_excerpt(); ?>

								</section> <!-- end article section -->

								<footer class="article-footer">
                                                                    
                                                                    <p class="byline vcard"><?php printf(__('Posted in %1$s', 'bonestheme'), get_csv_cats($post->ID, 'news_cat')); ?></p>
                                                                    
								</footer> <!-- end article footer -->

							------------------Article end
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

						<?php get_sidebar(); ?>

								</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
