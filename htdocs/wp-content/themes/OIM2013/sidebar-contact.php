				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">
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
                                                    <p>* Required fields</p>
                                            </form>
                                        </div>
                                        <?php if (!is_page('contact')) { ?>
                                            <a class="sidebar-large-link" href="<?php echo site_url('/contact/'); ?>"><p style="margin-top: 10px; margin-bottom: 10px;"><span class="icon red" style="position: relative; top: 0px;">&#xe0eb;</span><span style="position: relative; top: -4px;">Visit the Contact Us page</span></p></a>
                                        <?php } ?>
                                    </div>
				</div>