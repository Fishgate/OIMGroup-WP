<?php get_header(); ?>

                        <!-- feature image -->
                        <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/news-banner.jpg" />

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
                                    
                                    <nav role="navigation">
                                        <?php bones_main_nav(); ?>
                                    </nav>
                                        
					<div id="main" class="eightcol first clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                                        <!-- breadcrum -->
                                                        <?php if(get_breadcrum()) get_breadcrum(); ?>

                                                        <!-- The category heading -->
                                                        <h1><?php printf(__('%1$s', 'bonestheme'), get_csv_cats($post->ID, 'news_cat')); ?></h1>

                                                        <!-- Date block -->
                                                        <div>
                                                            <?php echo get_the_time('d'); ?><br />
                                                            <?php echo get_the_time('M'); ?>
                                                        </div>

                                                        <!-- The mail button -->
                                                        <a href="mailto:?body=<?php echo get_permalink($post->ID); ?>"><span class="icon">E</span></a>

                                                        <!-- The print buton -->
                                                        <a onclick="window.print(); return null;" href=""><span class="icon">I</span></a>
                                                

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">
                                                                        <!-- The post heading, these are styled differently to every other H1, maybe this one should be an H2 -->
									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
									
								</header> <!-- end article header -->

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <!-- end article section -->

								<footer class="article-footer">
                                                                        <p class="byline vcard"><?php printf(__('Posted in %1$s', 'bonestheme'), get_csv_cats($post->ID, 'news_cat')); ?></p>
								</footer> <!-- end article footer -->

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
											<p><?php _e("This is the error message in the single.php template.", "bonestheme"); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div> <!-- end #main -->

					<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
