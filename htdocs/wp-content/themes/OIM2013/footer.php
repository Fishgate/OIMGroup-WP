			<footer class="footer" role="contentinfo">
                                
				<div id="inner-footer" class="wrap clearfix">
                                        <div class="clearfix">
                                            <h2>Products &amp; Services</h2>
                                            
                                            <div class="secondary-holder left clearfix">
                                                <?php get_footer_feed('footer_col1'); ?>
                                            </div>
                                            <div class="secondary-holder secondary-holder-mid left clearfix">
                                                <?php get_footer_feed('footer_col2'); ?>
                                            </div>
                                            <div class="secondary-holder left clearfix">
                                                <?php get_footer_feed('footer_col3'); ?>
                                            </div>
                                        </div>
				</div> <!-- end #inner-footer -->
                                
                                <div style="background: #fff; padding: 0!important; margin: 0!important;">
                                    <div id="footer-nav-holder">
                                        <nav id="footer-nav" role="navigation" class="clearfix">
                                            <?php if(function_exists('get_footer_menu') && get_footer_menu()) get_footer_menu(); ?>
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
