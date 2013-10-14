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
                                                        <h4 class="widgettitle" id="side-widget-client">Prosperity Partnership</h4>
                                                        <img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/sidebars/oim_methodology.gif" alt="Prosperity Partnership Graphic" />
                                                    </div>
                                                </div>
                                                <!-- WIDGET END -->
                                                
				</div> <!-- end #inner-content -->
                                <div class="methodology-chart wrap clearfix">
                                    <!--/// ROW \\\-->
                                    <div class="left meth-title"><h2>Elements</h2></div>
                                    <div class="left meth-title"><h2>Outcomes of Elements</h2></div>
                                    <div class="left meth-title"><h2>Services and Products</h2></div>
                                    <!--/// ROW \\\-->
                                    <div class="left chart-block bg-blue-dark">
                                        <h2>Elements</h2>
                                        <p>Clarity of purpose and direction</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-blue-dark">
                                        <h2>Outcome of Elements</h2>
                                        <p>Everyone knows where we are heading as a company</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-blue-dark">
                                        <h2>Services and Products</h2>
                                        <ul>
                                            <li><a href="#">Strategic planning</a></li>
                                            <li><a href="#">Communication strategy</a></li>
                                            <li><a href="#">Value chain strategy</a></li>
                                        </ul>
                                    </div>
                                    <!--/// ROW \\\-->
                                    <div class="left chart-block bg-blue-light">
                                        <h2>Elements</h2>
                                        <p>Structure, alignment and focus</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-blue-light">
                                        <h2>Outcome of Elements</h2>
                                        <p>Everyone knows exactly what to focus their energy on daily</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-blue-light">
                                        <h2>Services and Products</h2>
                                        <ul>
                                            <li><a href="#">Business architecture</a></li>
                                            <li><a href="#">Competency profiling</a></li>
                                            <li><a href="#">Reward strategy</a></li>
                                            <li><a href="#">Change &amp; operational communication strategies</a></li>
                                        </ul>
                                    </div>
                                    <!--/// ROW \\\-->
                                    <div class="left chart-block bg-red">
                                        <h2>Elements</h2>
                                        <p>Effective leadership culture</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-red">
                                        <h2>Outcome of Elements</h2>
                                        <p>Leaders lead their teams with credibility</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-red">
                                        <h2>Services and Products</h2>
                                        <ul>
                                            <li><a href="#">Leadership standards definition</a></li>
                                            <li><a href="#">Assessments: leadership &amp; critical talent</a></li>
                                            <li><a href="#">Leadership development interventions</a></li>
                                            <li><a href="#">Coaching</a></li>
                                            <li><a href="#">Supervisory skills</a></li>
                                            <li><a href="#">Team dynamics</a></li>
                                            <li><a href="#">Talent management</a></li>
                                        </ul>
                                    </div>
                                    <!--/// ROW \\\-->
                                    <div class="left chart-block bg-green">
                                        <h2>Elements</h2>
                                        <p>Stakeholder engagement</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-green">
                                        <h2>Outcome of Elements</h2>
                                        <p>Everyone is involved, daily, in goal setting, problem solving and planning</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-green">
                                        <h2>Services and Products</h2>
                                        <ul>
                                            <li><a href="#">Employee engagement (INVOCOMS)</a></li>
                                            <li><a href="#">Other stakeholder engagement</a></li>
                                            <li><a href="#">Employee relations</a></li>
                                            <li><a href="#">Diversity awareness</a></li>
                                        </ul>
                                    </div>
                                    <!--/// ROW \\\-->
                                    <div class="left chart-block bg-blue-medium">
                                        <h2>Elements</h2>
                                        <p>Optimisation of business processes, systems, resources and competencies</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-blue-medium">
                                        <h2>Outcome of Elements</h2>
                                        <p>Everyone contributes to quality, cost and service improvements</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-blue-medium">
                                        <h2>Services and Products</h2>
                                        <ul>
                                            <li><a href="#">Operations management interventions</a></li>
                                            <li><a href="#">Continuous improvement</a></li>
                                            <li><a href="#">On-the-job operational mentoring &amp; coaching</a></li>
                                        </ul>
                                    </div>
                                    <!--/// ROW \\\-->
                                    <div class="left chart-block bg-purple">
                                        <h2>Elements</h2>
                                        <p>Measurement, feedback, improvement, recognition and reward</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-purple">
                                        <h2>Outcome of Elements</h2>
                                        <p>Teams regularly review their performance, focus on accountability, recognition and reward</p>
                                        <span class="chart-arrow icon">&#xe0eb;</span>
                                    </div>
                                    <div class="left chart-divider"></div>
                                    <div class="left chart-block bg-purple">
                                        <h2>Services and Products</h2>
                                        <ul>
                                            <li><a href="#">Stakeholder perception surveys</a></li>
                                            <li><a href="#">Business/Operations review</a></li>
                                            <li><a href="#">Individual performance management</a></li>
                                        </ul>
                                    </div>
                                </div><!-- METHODOLOGY CHART -->
			</div> <!-- end #content -->
                        
<?php get_footer(); ?>
