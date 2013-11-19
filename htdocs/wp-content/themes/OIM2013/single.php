<?php get_header(); ?>

                        <!-- header image -->
                        <!--<img class="response-img" src="<?php// echo get_template_directory_uri(); ?>/library/images/news-banner.jpg" />-->
                        
                        <!-- Header Slideshow  --> <!--<?php// if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>-->
                        
                            <div class="cycle-slideshow" 
                            data-cycle-fx="fade" 
                            data-cycle-timeout="8000"
                            data-cycle-slides="> div"
                            data-cycle-loader="wait"
                            >
                                
                                <div class="cycle-slide">
                                    <div class="cycle-caption clearfix">
                                        <p class="txt-right">Staying on top means<br />staying on top of what's happening.</p>
                                        <span class="right cycle-caption-btn">
                                            <a href="/contact/">Contact Us<span class="icon">&#xe0eb;</span></a>
                                        </span>
                                        <div class="left slogan txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                    <img class="slide-large" src="<?php echo get_template_directory_uri(); ?>/library/images/news-banner.jpg"/>
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

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                                        
                                                        <!-- The category heading -->
                                                        <h1><?php printf(__('%1$s', 'bonestheme'), get_the_category_list(', ')); ?></h1>
                                                        
                                                        <div class="left single-news-left">
                                                            <!-- Date block -->
                                                            <div class="single-news-date-holder">
                                                                <div class="day"><?php echo get_the_time('d'); ?></div>
                                                                <div class="month"><?php echo get_the_time('M'); ?></div>
                                                            </div>

                                                            <!-- The mail button -->
                                                            <div class="article-icon-holder">
                                                            <a href="mailto:?body=<?php echo get_permalink($post->ID); ?>"><span class="icon">E</span></a>
                                                            </div>
                                                            <!-- The print buton -->
                                                            <div class="article-icon-holder">
                                                            <a onclick="window.print(); return null;" href=""><span class="icon">I</span></a>
                                                            </div>
                                                        </div>
                                                        
                                                
                                                        <div class="right single-news-article-holder">
                                                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                                                                    <header class="article-header">
                                                                            <!-- The post heading, these are styled differently to every other H1, maybe this one should be an H2 -->
                                                                            <h2 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h2>

                                                                    </header> <!-- end article header -->

                                                                    <section class="entry-content clearfix" itemprop="articleBody">
                                                                            <?php get_news_meta($post->ID); ?>
                                                                            <?php the_content(); ?>
                                                                    </section> <!-- end article section -->

                                                                    <footer class="right article-footer" style="top: 0;">
                                                                            <p class="byline vcard"><?php printf(__('Posted in %1$s', 'bonestheme'), get_the_category_list(', ')); ?></p>
                                                                    </footer> <!-- end article footer -->

                                                            </article> <!-- end article -->
                                                        </div>
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

					<?php get_sidebar('news'); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
