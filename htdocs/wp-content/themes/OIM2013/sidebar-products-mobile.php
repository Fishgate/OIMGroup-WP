				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">
                                    <!-- ===============A-Z PRODUCT LISTING=================== -->                                
                                        <?php
                                        
                                        //prepare menu
                                        $menus = wp_get_nav_menus(); // get all active menus
                                        $locations = get_nav_menu_locations(); // get all menu location info
                                        $location_id = 'a-z-product-listing'; // the menu location slug we are looking for
                                        
                                        if (isset($locations[$location_id])) { 
                                            ?>
                                            <div class="widget">
                                                <h4 class="widgettitle" id="side-widget-about">A-Z Product Listing</h4>
                                                
                                                <div class="sidebar-select">Select a Product</div>
                                                
                                                <ul class="sidebar-select-list hidden">
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
                                            </div> 
                                            <?php
                                        }
                                        
                                        ?>
                                       
                                        
                                        <!-- ===============CONTACT US=================== -->
                                        <div class="widget">
                                            <h4 class="widgettitle" id="side-widget-contact"><?php if (!is_page('contact')) { echo 'Contact Us'; } else { echo 'Enquiries'; } ?></h4>
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
                                            <?php if (!is_page('contact')) { ?>
                                                <a class="sidebar-large-link" href="<?php echo site_url('/contact/'); ?>"><p><span class="icon red" style="position: relative; top: 3px;">&#xe0eb;</span>Visit the Contact Us page</p></a>
                                            <?php } ?>
                                        </div>
				</div>