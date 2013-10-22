				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">
                                    <!-- ===============A-Z PRODUCT LISTING=================== -->
                                    <?php
                                        $prod_serv = new WP_Query( array('post_type' => 'products_services', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => '-1') );

                                        if($prod_serv->have_posts()) :
                                            ?>
                                    
                                            <div class="widget">
                                                <h4 class="widgettitle" id="side-widget-about">A-Z Product Listing</h4>
                                                
                                                <div class="sidebar-select">Select a Product</div>
                                                
                                                <ul class="sidebar-select-list hidden">
                                                    <?php
                                                    while($prod_serv->have_posts()) : $prod_serv->the_post();
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
                                        
                                        <!-- ===============PDF DOWNLOAD=================== -->
                                        <?php if (get_field('pdf_download')) { ?>
                                            <div class="widget">
                                                <h1 class="download-icon">Download PDF</h1>
                                                <?php
                                                $download = get_field('pdf_download');
                                                $img = wp_get_attachment_image_src(get_field('pdf_thumbnail'), 'pdf-thumb');
                                                ?>
                                                
                                                <div class="sidebar-content-holder">
                                                    <a target="_blank" href="<?php echo $download; ?>" class=""><img src="<?php echo $img[0]; ?>"></a>
                                                </div>

                                                <a target="_blank" href="<?php echo $download; ?>" class="sidebar-large-link">
                                                    <p><span class="icon red" style="position: relative; top: 3px;">&#xe0eb;</span>Download Now</p>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        
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