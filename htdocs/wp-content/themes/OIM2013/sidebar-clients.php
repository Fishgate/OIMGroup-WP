				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">    
                                        <?php

                                        $ccs = new WP_Query( array('post_type' => 'client_case_studies') );

                                        if($ccs->have_posts()) :
                                            ?>
                                    
                                            <div class="widget">
                                                <h4 class="widgettitle" id="side-widget-client">Client case studies</h4>
                                                <ul class="bordered-top">
                                                    <?php
                                                    while($ccs->have_posts()) : $ccs->the_post();
                                                        ?>
                                                            <li><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo get_the_title(); ?></a></li>
                                                        <?php
                                                    endwhile;
                                                    ?>
                                                </ul>
                                            </div>        
                                            <?php
                                            wp_reset_postdata();
                                        endif;

                                        ?>
				</div>