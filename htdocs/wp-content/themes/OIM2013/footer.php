			<footer class="footer" role="contentinfo">
                            
				<div id="inner-footer" class="wrap clearfix">
                                    <div>
                                        <div class="clearfix">
                                            
                                            <div class="secondary-holder left clearfix">
                                                <?php 
                                                
                                                if (trim(get_option('footer_col1')) != '') {    
                                                    $menus = wp_get_nav_menus(); // get all active menus
                                                    $locations = get_nav_menu_locations(); // get all menu location info
                                                    $location_id = 'main-nav'; // the menu location slug we are looking for
                                                    
                                                    if (isset($locations[$location_id])) {
                                                        foreach ($menus as $menu) {
                                                            if ($menu->term_id == $locations[$location_id]) {
                                                                $menu_items = wp_get_nav_menu_items($menu);
                                                                
                                                                //we get the menu item ID of the parent element
                                                                foreach ($menu_items as $parent) {
                                                                    if ($parent->title == trim(get_option('footer_col1'))) {
                                                                        $parentID = $parent->ID; 
                                                                        ?>
                                                                        
                                                                        <h2 class="<?php echo implode(' ', $parent->classes); ?>"><?php echo $parent->title; ?></h2>
                                                
                                                                        <?php
                                                                        break;
                                                                    }
                                                                }
                                                                
                                                                //use the parent ID we just got to output our menu
                                                                foreach ($menu_items as $sub) {
                                                                    if ($sub->menu_item_parent == $parentID) {
                                                                        $subID = $sub->ID; 
                                                                        ?>
                                                                        <div class="secondary-link">
                                                                            <ha class="<?php echo implode(' ', $sub->classes); ?>"><?php echo trim($sub->title); ?></a>
                                                                        </div>
                                                                        
                                                                        <div class="flyout">
                                                                        <?php
                                                                        foreach ($menu_items as $sub2) {
                                                                            if ($sub2->menu_item_parent == $subID) {
                                                                                ?>
                                                                                <a href="#"><?php echo $sub2->title; ?></a><br />
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                        </div>
                                                                        <?php
                                                                     }
                                                                }
                                                                
                                                                
                                                                break;
                                                            }
                                                            
                                                        }
                                                        
                                                    }
                                                } 
                                                
                                                ?>
                                                  <!--<h2 class="head-secondary icon-people">People</h2>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>-->
                                            </div>
                                            <div class="secondary-holder secondary-holder-mid left clearfix">
                                                  <h2 class="head-secondary icon-organisation">Organisation</h2>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                            </div>
                                            <div class="secondary-holder left clearfix">
                                                  <h2 class="head-secondary icon-operation">Operations</h2>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                                  <div class="secondary-link">
                                                      One
                                                      <div class="flyout">
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                          TWO<br />
                                                      </div>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    
				</div> <!-- end #inner-footer -->
                                <div style="background: #fff; padding: 0!important; margin: 0!important;">
                                    <div id="footer-nav-holder">
                                    <nav id="footer-nav" role="navigation" class="clearfix">
                                        <?php bones_footer_links(); ?>
                                        <a class="right" href="#">Contact</a>
                                        <a class="right" href="#">About</a>
                                        <a class="right" href="#">Home</a>
                                    </nav>
                                    <p class="source-org copyright">
                                        &copy; Copyright<?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
                                    </p>
                                    </div>
                                </div>
			</footer> <!-- end footer -->

		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->
