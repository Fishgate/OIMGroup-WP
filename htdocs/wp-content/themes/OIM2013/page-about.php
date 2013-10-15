<?php
/*
Template Name: About
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
                                                        <?php get_secondary_nav(); ?>
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
                                                    <!--/// CLIENTS \\\-->
                                                    <div class="widget">
                                                        <h4 class="widgettitle" id="side-widget-client">Client case studies</h4>
                                                        <ul>
                                                            <li><a href="#">Glacier by Sanlam</a></li>
                                                            <li><a href="#">Khumani</a></li>
                                                            <li><a href="#">Iliad</a></li>
                                                            <li><a href="#">Premier Foods</a></li>
                                                            <li><a href="#">Tiger Brands</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--/// TEAM \\\-->
                                                    <div class="widget clearfix">
                                                        <h4 class="widgettitle" id="side-widget-team">Client case studies</h4>
                                                        <!-- TEAM MEMBER -->
                                                        <div class="left widget-team-holder">
                                                            <a href="#">
                                                                <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/team/tjaart.jpg" />
                                                            </a>
                                                            <center>
                                                            <p>
                                                                <a href="#">Tjaart Minaar</a>
                                                                <br />
                                                                CEO
                                                            </p>
                                                            </center>
                                                        </div>
                                                        <!-- TEAM MEMBER -->
                                                        <div class="left widget-team-holder no-margin-right"><!-- the class "no-margin-right" helps to display the members correctly  -->
                                                            <a href="#">
                                                                <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/team/arjen.jpg" />
                                                            </a>
                                                            <center>
                                                            <p>
                                                                <a href="#">Arjen de Bruin</a>
                                                                <br />
                                                                MD: Operations Solutions
                                                            </p>
                                                            </center>
                                                        </div>
                                                        <!-- TEAM MEMBER -->
                                                        <div class="left widget-team-holder">
                                                            <a href="#">
                                                                <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/team/frank.jpg" />
                                                            </a>
                                                            <center>
                                                            <p>
                                                                <a href="#">Frank Hickman</a>
                                                                <br />
                                                                MD: Performance Improvement
                                                            </p>
                                                            </center>
                                                        </div>
                                                        <!-- TEAM MEMBER -->
                                                        <div class="left widget-team-holder no-margin-right"><!-- the class "no-margin-right" helps to display the members correctly  -->
                                                            <a href="#">
                                                                <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/team/leezelle.jpg" />
                                                            </a>
                                                            <center>
                                                            <p>
                                                                <a href="#">Leez&eacute;lle  Kotz&eacute;</a>
                                                                <br />
                                                                MD: Leadership Talent
                                                            </p>
                                                            </center>
                                                        </div>
                                                        <!-- TEAM MEMBER -->
                                                        <div class="left widget-team-holder">
                                                            <a href="#">
                                                                <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/team/marie.jpg" />
                                                            </a>
                                                            <center>
                                                            <p>
                                                                <a href="#">Mari&eacute; Burger</a>
                                                                <br />
                                                                Financial Director
                                                            </p>
                                                            </center>
                                                        </div>
                                                        <!-- TEAM MEMBER -->
                                                        <div class="left widget-team-holder no-margin-right"><!-- the class "no-margin-right" helps to display the members correctly  -->
                                                            <a href="#">
                                                                <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/team/ben.jpg" />
                                                            </a>
                                                            <center>
                                                            <p>
                                                                <a href="#">Ben Nel</a>
                                                                <br />
                                                                Director
                                                            </p>
                                                            </center>
                                                        </div>
                                                    </div>
                                                    <!--/// CONTACT \\\-->
                                                    <div class="widget">
                                                        <h4 class="widgettitle" id="side-widget-contact">Contact Us</h4>
                                                        <div class="sidebar-form-holder">
                                                            <p>Contact OIM for more information</p>
                                                            <form id='contact-form'>
                                                                <input id="name" type="text" data-placeholder="Name*" value="Name*" name="name" />
                                                                <input class="base-hide" id="company" type="text" data-placeholder="Company" value="Company" name="company" />
                                                                <input id="topic" type="text" data-placeholder="Topic of enquiry*" value="Topic of enquiry*" name="topic" />
                                                                <input class="base-hide" id="number" type="text" data-placeholder="Contact Number" value="Contact Number" name="number" />
                                                                <input id="email" type="text" data-placeholder="Email Address*" value="Email Address*" name="email" />
                                                                <textarea id="message" data-placeholder="Message" name="message">Message</textarea>
                                                                <input type="submit" value="Submit" id="contact-submit" />
                                                                <br/><br/>
                                                                    <p><em class="red">* Required fields</em></p>
                                                            </form>
                                                        </div>

                                                        <a class="sidebar-large-link" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/images/sidebars/icon-large-link.jpg" alt=">" />Visit the Contact Us page</a>
                                                    </div>
                                                </div>
                                                <!-- WIDGET END -->
                                                
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
