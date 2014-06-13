                <footer class="footer <?php if(is_404()) echo 'footer404'; ?>" role="contentinfo">
                                
                        <div id="inner-footer" class="wrap clearfix">
                                <div class="clearfix">
                                    <h2>Products &amp; Services</h2>

                                    <div class="secondary-holder left clearfix">
                                        <?php get_footer_feed('footer_col1'); ?>
                                    </div>
                                    <div class="secondary-holder secondary-holder-mid left clearfix">
                                        <?php get_footer_feed('footer_col2'); ?>
                                    </div>
                                    <div class="secondary-holder left clearfix" style="margin-bottom: 0px;">
                                        <?php get_footer_feed('footer_col3'); ?>
                                    </div>
                                </div>
                        </div> <!-- end #inner-footer -->

                        <div style="background: #fff; padding: 0!important; margin: 0!important;">
                            <div id="footer-nav-holder" class="clearfix">
                                <nav id="footer-nav" role="navigation" class="right clearfix">
                                    <?php if(function_exists('get_footer_menu') && get_footer_menu()) get_footer_menu(); ?>
                                </nav>
                                <p class="source-org copyright">
                                    &copy; Copyright <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
                                </p>
                            </div>
                        </div>
                        

                </footer> <!-- end footer -->

        </div> <!-- end #container -->

        <!-- all js scripts are loaded in library/bones.php -->
        <?php wp_footer(); ?>
	<?php global $post; if($post->ID==593){ ?>

	<!-- Google Code for Form Submit Conversion Page -->

	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 974847209;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "QqkyCNen8xoQ6fnr0AM";
	var google_conversion_value = 0;
	var google_remarketing_only = false;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/974847209/?value=0&amp;label=QqkyCNen8xoQ6fnr0AM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>

	<?php } ?>
        
</body>

</html> <!-- end page. what a ride! -->