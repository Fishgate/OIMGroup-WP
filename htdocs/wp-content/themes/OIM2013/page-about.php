<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>



<!-- Header Slideshow  -->
<div style="height: 420px; overflow: hidden;">
    <ul class="rslides" id="slider1">
      <li>
<!--        <div class="calltoaction">
            <span class="quote">In an ever-changing world,<br />constant improvement is an integral part<br />of continued success</span>
            <div class="button">Read More &nbsp;<span class="icon">&#xe0eb;</span></div>
        </div>-->
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/concept_photos/about.jpg" alt="">
      </li>
    </ul>
</div>
<!-- END Header Slideshow  -->

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

                                                    <!--==============================================
                                                          TYRONE INSERTS NAV HERE FROM HEADER
                                                    ================================================-->
                                                    <nav role="navigation">
                                                        <?php bones_main_nav(); ?>
                                                    </nav>
                                                    <!-- nav end -->
                                                    
                                                    <!-- BREDCRUMBS -->
                                                    <div id="breadcrumb-holder">
                                                        <span class="icon red">&#xe060;</span><strong>YOU ARE HERE:</strong> <span class="red">About OIM</span> <!--<span class="slash">/</span> Talent Management <span class="slash">/</span> Individual Performance Management-->
                                                    </div>
                                                    <!-- END BREADCRUMBS -->
                                                    <div id="main" class="eightcol first clearfix" role="main">
                                                    
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

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
                                                <?php get_sidebar(); ?>
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
