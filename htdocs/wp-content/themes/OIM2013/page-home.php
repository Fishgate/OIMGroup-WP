<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>



<!-- Header Slideshow  -->
<div style="height: 420px; overflow: hidden;">
    <ul class="rslides" id="slider1">
      <li>
          <div class="calltoaction">
              <span class="quote">In an ever-changing world,<br />constant improvement is an integral part<br />of continued success</span>
              <div class="button">Read More &nbsp;<span class="icon">&#xe0eb;</span></div>
          </div>
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/1.jpg" alt="">
      </li>
      <li>
          <div class="calltoaction">
              <span class="quote">Adventure Time!<br />with Jake the dog<br />and Fin the human</span>
              <div class="button">Read More &nbsp;<span class="icon">&#xe0eb;</span></div>
          </div>
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/2.jpg" alt="">
      </li>
      <li>
          <div class="calltoaction">
              <span class="quote">Yoghurt Factory,<br />possibly the worst place<br />you could imagine</span>
              <div class="button">Read More &nbsp;<span class="icon">&#xe0eb;</span></div>
          </div>
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/3.jpg" alt="">
      </li>
    </ul>
</div>
<!-- END Header Slideshow  -->

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="twelvecol first clearfix" role="main">
                                                    
                                                    <!--==============================================
                                                          TYRONE INSERTS NAV HERE FROM HEADER
                                                    ================================================-->
                                                    <nav role="navigation">
                                                        <?php bones_main_nav(); ?>
                                                    </nav>
                                                    <!-- nav end -->
                                                    
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content clearfix" itemprop="articleBody">
                                                                    <center>
                                                                        <h1>Business Performance Specialist in core areas of</h1>
                                                                     
                                                                            <a class="service-link" href="#">People Management</a>

                                                                            <a class="service-link" href="#">Organisation Performance</a>

                                                                            <a class="service-link" href="#">Operational Optimisation</a>
                                                                    </center>
                                                                    <?php the_content(); ?>
                                                                    <!-- TYRONE ADDS 3 DIVS FOR DYNAMIC SERVICES-->
                                                                        <div class="threecol dynamic-service clearfix">
                                                                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/methodology_mini.jpg" alt="Our Methodology" />
                                                                            <div class="service-copy">
                                                                                <h2>Our Methodology</h2>
                                                                                <p>Various methodologies are used to ensure the successful implementation of projects, including SDLC and Agile. We also have extensive experience in business process management technologies such as workflow and electronic content management(ECM).</p>
                                                                                <a href="#">Methodology &amp; Services</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="threecol dynamic-service clearfix">
                                                                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/about_mini.jpg" alt="About OIM" />
                                                                            <div class="service-copy">
                                                                                <h2>About OIM</h2>
                                                                                <p>With over 25 years' experience in business improvement, Operational Improvement Management (OIM) advises several South African Blue-Chip companies and manages performance improvement assignments in Europe, Australia and USA and other African countries.</p>
                                                                                <a href="#">Read more about OIM</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="threecol dynamic-service clearfix">
                                                                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/testimonials_mini.jpg" alt="Testimonials" />
                                                                            <div class="service-copy">
                                                                                <h2>Client Testimonials</h2>
                                                                                <p>"The OIM team has shown the ability to understand our requirements in this regard and delivered an effective framework for our ongoing future use. They are a valued 'member' of our strategy review team - their role is highly respected and much appreciated."</p>
                                                                                <a href="#">View OIM's Clients</a>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    <!-- TYRONE ADDS CLIENTS ROTATING SLIDER-->
                                                                    <h2>Clients</h2>
                                                                    <ul id="scroller">
                                                                        <li><img src="<?php echo get_template_directory_uri(); ?>/library/images/1.jpg" width="290" height="50"></li>
                                                                        <li><img src="<?php echo get_template_directory_uri(); ?>/library/images/2.jpg" width="290" height="50"></li>
                                                                        <li><img src="<?php echo get_template_directory_uri(); ?>/library/images/3.jpg" width="290" height="50"></li>
                                                                    </ul>
                                                                    
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


				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
