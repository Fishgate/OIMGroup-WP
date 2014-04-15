				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">
                                    <div class="widget clearfix">
                                        <h4 class="widgettitle" id="side-widget-team">Other Team Members</h4>
                                        
                                        <?php
                                        
                                        $this_person_ID = $post->ID; // get the current id from the global post before doing anything in the sidebar
                                        
                                        $team_members = new WP_Query( 'post_type=team_members' );

                                        if ( $team_members->have_posts() ) : $i=0; ?>
                                            <?php while ( $team_members->have_posts() ) : $team_members->the_post();  ?>
                                                <?php if ( get_the_ID() != $this_person_ID ) { ?>
                                                    <div class="left widget-team-holder <?php if($i % 2 != 0) echo 'no-margin-right'; ?>">
                                                        <a href="<?php echo get_permalink(get_the_ID()); ?>">
                                                            <img class="response-img" src="<?php echo get_feature_src(get_the_ID(), 'team-small') ?>" alt="<?php echo get_the_title(); ?>" />
                                                        </a>
                                                        <center>
                                                        <p>
                                                            <a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo get_the_title(); ?></a>
                                                            <br />
                                                            <?php get_job_descrip(); ?>
                                                        </p>
                                                        </center>
                                                    </div>
                                                <?php $i++; } ?>
                                            <?php endwhile;

                                            wp_reset_postdata(); ?>
                                            
                                        <?php else :
                                            return false;
                                        endif;
                                        
                                        ?>
                                        
                                    </div>
				</div>