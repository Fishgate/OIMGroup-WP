				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">
                                    <div class="widget">
                                        <h4 class="widgettitle" id="side-widget-client">Categories</h4>
                                        <ul class="bordered-top">
                                            <?php wp_list_categories( array ('title_li' => __( '' ) ) ); ?>
                                        </ul>
                                    </div>
                                    
                                    <div class="widget">
                                        <h4 class="widgettitle" id="side-widget-client">Archives</h4>
                                        <ul class="bordered-top">
                                            <?php wp_get_archives( array( 'type' => 'yearly', 'limit' => 10 ) ); ?>
                                        </ul>
                                    </div>
				</div>