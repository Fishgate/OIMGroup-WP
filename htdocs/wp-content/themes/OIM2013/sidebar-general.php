				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">
                                    <div class="widget">
                                        <h4 class="widgettitle" id="side-widget-about">More about OIM</h4>
                                        
                                        <?php
                                        
                                        //prepare menu
                                        $menus = wp_get_nav_menus(); // get all active menus
                                        $locations = get_nav_menu_locations(); // get all menu location info
                                        $location_id = 'more-about-oim'; // the menu location slug we are looking for
                                        
                                        if (isset($locations[$location_id])) { 
                                            ?>
                                            <ul class="bordered-top">
                                            <?php
                                            foreach ($menus as $menu) {
                                                if ($menu->term_id == $locations[$location_id]) {

                                                    $menu_items = wp_get_nav_menu_items($menu);

                                                    foreach($menu_items as $item) {
                                                        ?>
                                                        <li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
                                                        <?php
                                                    }

                                                    break;
                                                }
                                            }
                                            ?>
                                            </ul>
                                            <?php
                                        }
                                        
                                        ?>
                                    </div>
				</div>