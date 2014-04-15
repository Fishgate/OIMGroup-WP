<?php
/*
Template Name: Methodology
*/
?>

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
                                        <p class="txt-right">Progress comes as a result<br/>of proven methodologies</p>
                                        <span class="right cycle-caption-btn">
                                            <a href="/contact/">Contact Us<span class="icon">&#xe0eb;</span></a>
                                        </span>
                                        <div class="left slogan-alt txt-right">Analyse. Improve. Sustain</div>
                                    </div>
                                        <?php if(get_field('feature_url')) ?><a href="<?php echo get_field('feature_url'); ?>">
                                            <img class="slide-large" src="<?php echo get_feature_src($post->ID, 'large-feature'); ?>" alt="<?php echo get_the_title(); ?>" />
                                        <?php if(get_field('feature_url')) ?></a>
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
                                                        <a class="fancybox" href="<?php echo get_template_directory_uri(); ?>/library/images/sidebars/oim_methodology.gif"><img class="response-img" src="<?php echo get_template_directory_uri(); ?>/library/images/sidebars/oim_methodology.gif" alt="Prosperity Partnership Graphic" /></a>
                                                        <center>
                                                            <a class="fancybox" href="<?php echo get_template_directory_uri(); ?>/library/images/sidebars/oim_methodology.gif"><p>Click to enlarge<p></a>
                                                        </center>
                                                    </div>
                                                </div>
                                                <!-- WIDGET END -->
                                                
				</div> <!-- end #inner-content -->
                                <div class="methodology-chart wrap clearfix"><hr />
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
                                            <li><a href="../../products-services/organisational-development/business-development-strategy/strategic-planning/">Strategic planning</a></li>
                                            <li><a href="../../products-services/organisational-development/business-development-strategy/strategic-and-change-communication/">Communication strategy</a></li>
                                            <li><a href="../../products-services/organisational-development/business-development-strategy/value-chain-strategy/">Value chain strategy</a></li>
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
                                            <li><a href="../../products-services/organisational-development/business-architecture/">Business architecture</a></li>
                                            <li><a href="../../products-services/people-management/competency-profiling/">Competency profiling</a></li>
                                            <li><a href="../../products-services/people-management/talent-management/reward-consultation/">Reward strategy</a></li>
                                            <li><a href="../../products-services/organisational-development/business-development-strategy/strategic-and-change-communication/">Change &amp; operational communication strategies</a></li>
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
                                            <li><a href="../../products-services/people-management/leadership-standards/">Leadership standards definition</a></li>
                                            <li><a href="../../products-services/people-management/leadership-interventions/assessments-leadership-and-critical-talent/">Assessments: leadership &amp; critical talent</a></li>
                                            <li><a href="../../products-services/people-management/leadership-interventions/leadership-development-interventions/">Leadership development interventions</a></li>
                                            <li><a href="../../products-services/people-management/leadership-interventions/coaching/">Coaching</a></li>
                                            <li><a href="../../products-services/people-management/supervisory-skills/">Supervisory skills</a></li>
                                            <li><a href="../../products-services/people-management/leadership-interventions/team-dynamics/">Team dynamics</a></li>
                                            <li><a href="../../products-services/people-management/talent-management/talent-management/">Talent management</a></li>
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
                                            <li><a href="../../products-services/people-management/employee-engagement-invocoms/">Employee engagement (INVOCOMS)</a></li>
                                            <li><a href="../../products-services/organisational-development/business-development-strategy/value-chain-strategy/">Other stakeholder engagement</a></li>
                                            <li><a href="../../products-services/organisational-development/employee-relations/">Employee relations</a></li>
                                            <li><a href="../../products-services/people-management/leadership-interventions/diversity-awareness/">Diversity awareness</a></li>
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
                                            <li><a href="../../products-services/operations-management/operations-management-interventions/">Operations management interventions</a></li>
                                            <li><a href="../../products-services/operations-management/continuous-improvement/">Continuous improvement</a></li>
                                            <li><a href="../../products-services/people-management/supervisory-skills/">On-the-job operational mentoring &amp; coaching</a></li>
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
                                            <li><a href="../../products-services/organisational-development/stakeholder-perception-surveys/">Stakeholder perception surveys</a></li>
                                            <li><a href="../../products-services/operations-management/operations-review/">Business/Operations review</a></li>
                                            <li><a href="../../products-services/people-management/talent-management/individual-performance-management/">Individual performance management</a></li>
                                        </ul>
                                    </div>
                                </div><!-- METHODOLOGY CHART -->
			</div> <!-- end #content -->
                        
<?php get_footer(); ?>