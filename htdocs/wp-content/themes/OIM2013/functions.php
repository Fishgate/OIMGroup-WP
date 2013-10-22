<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once('library/products-services.php');
require_once('library/team-members.php');
require_once('library/clients-list.php');
//require_once('library/news.php');
require_once('library/client-case-studies.php');

/*  
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

add_image_size( 'large-feature', 1920, 370, true );
add_image_size( 'small-feature', 1920, 250, true );
add_image_size( 'client-logo', 200, 120, true );
add_image_size( 'team-small', 135, 120, true );
add_image_size( 'team-large', 631, 226, true );
add_image_size( 'pdf-thumb', 137, 194, true);

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'bonestheme'),
		'description' => __('The first (primary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'bonestheme'),
		'description' => __('The second (secondary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
        
	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'bonestheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','bonestheme').'" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__('') .'" />
	</form>';
	return $form;
} // don't remove this bracket!

/************* KYLES FUNCTIONS *****************/

/**
 * Kill the default posts page, custom posts for life
 */

/*
function remove_menu_pages() {
    remove_menu_page('edit.php');  
}
add_action( 'admin_menu', 'remove_menu_pages' );
*/

/**
 * Custom settings page for the theme
 */

function setup_theme_admin_menus() {  
    add_menu_page('OIM Settings', 'OIM Settings', 'manage_options', 'oim-settings', 'theme_settings_page', null, 82 );
}

function theme_settings_page() {  
    include('theme-settings.php');    
}

add_action("admin_menu", "setup_theme_admin_menus");  

/**
 * Get the src of a featured image, needs to be used within the loop
 * so $post->ID variable is set. Returns false if no feature image is set.
 * 
 * @param string $size
 * @param int $post_id
 * @return boolean
 */
function get_feature_src ($post_id, $size) {
    if (has_post_thumbnail( $post_id ) ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
        return $image[0];
    }else{
        return false;
    }
}

/**
 * Returns the breadcrum on success and false if not.
 * 
 * @return boolean
 */
function get_breadcrum () {
    if(function_exists('bcn_display')) { ?>
                                                                
    <div class="breadcrumbs">
        <span class="icon">&#xe060;</span><font>YOU ARE HERE:</font> <?php bcn_display(); ?>
    </div>
        
    <?php }else{
        return false;
    }
}

/**
 * Returns the short description custom field for product
 * pages on success. Returns false if does not exist.
 * 
 * @return boolean
 */
function get_tagline () {
    if(get_field('description')) { ?>
        <section>
            <span class="caption">
                <span><?php echo get_field('description'); ?></span>
            </span>
        </section>
    <?php }else{
        return false;
    }
}

/**
 * Returns the job title custom field for team page
 * on success. Returns false if does not exist.
 * 
 * @return boolean
 */
function get_job_descrip () {
    if(get_field('job_title')) { ?>
            <span class="team-job-title">
                <span><?php echo get_field('job_title'); ?></span>
            </span>
    <?php }else{
        return false;
    }
}

/**
 * Returns comma seperated list of custom taxonomies for custom
 * post type.
 * 
 * @param int $post_id
 * @param string $taxonomy
 * @return boolean
 */
function get_csv_cats ( $post_id, $taxonomy ) {
    $category = get_the_terms( $post_id, $taxonomy ); 
    
    if($category && !is_wp_error($category)) {
        foreach($category as $cat) {
            $cats[] = '<a href="'.get_term_link($cat->slug, $taxonomy).'">'.$cat->name.'</a>';
        }
        
        return implode(', ', $cats);
    }else{
        return false;
    }
}

/**
 * Outputs a client scroller populated by the Clients custom post type
 * Returns false if there are no clients entries added in the backend
 * 
 * @return boolean
 */
function get_client_scroller () {
    $client_logos = new WP_Query( 'post_type=clients_list' );

    if ( $client_logos->have_posts() ) : ?>
        
        <ul id="scroller">
            <?php while ( $client_logos->have_posts() ) :
                $client_logos->the_post(); ?>
                <li><img src="<?php echo get_feature_src(get_the_ID(), 'client-logo') ?>" alt="<?php echo get_the_title(); ?>" /></li>
            <?php endwhile;
            
            wp_reset_postdata(); ?>
        </ul>
    <?php else :
        return false;
    endif;
}

/**
 * A small function to determine if a menu item object has any children elements
 * within the entire menu by matching its menu ID with the "menu_item_parent" 
 * property of each menu item. If they match then the object does indeed have children.
 * 
 * @param Array $nav_items_array
 * @param Int $nav_item_id
 * @return boolean
 */
function has_children ($nav_items_array, $nav_item_id) {
    $depth = 0;

    foreach($nav_items_array as $item){
        if($item->menu_item_parent == $nav_item_id){
            $depth++;
        }
    }

    if($depth > 0){
        return true;
    }else{
        return false;
    }
}

/**
 * Gets the 'main-nav' custom menu and outputs it into the page. 
 * If the menu location 'main-nav' is not set return false.
 * 
 * @return boolean
 */
function get_main_nav () {
    $menus = wp_get_nav_menus(); // get all active menus
    $locations = get_nav_menu_locations(); // get all menu location info
    $location_id = 'main-nav'; // the menu location slug we are looking for

    // first check if the menu location we want exists
    if (isset($locations[$location_id])) {

        // we loop through all active menus to find a mached ID for the one we are looking for
        foreach ($menus as $menu) {

            // if menu ID match is found
            if ($menu->term_id == $locations[$location_id]) { ?>
                <ul class="left sf-menu">

                    <?php // get all the nav items for this menu
                    $menu_items = wp_get_nav_menu_items($menu);

                    // LEVEL 1 =====================================================================
                    $level1_parent_id = 0;

                    foreach ($menu_items as $level1) {
                        if ($level1->menu_item_parent == $level1_parent_id) { ?>
                            <li class="mega-parent">
                                <?php if ($level1->url != '') { ?><a class="parent-a <?php echo implode(' ', $level1->classes); ?>" href="<?php echo $level1->url; ?>" target="<?php echo $level1->target; ?>"><?php } ?>
                                    <?php echo $level1->title; if (has_children($menu_items, $level1->ID)) { ?> <span class="icons">&#xe0ab;</span> <?php } ?>
                                <?php if ($level1->url != '') { ?></a><?php } ?>

                                <?php 
                                // LEVEL 2 =====================================================================
                                $level2_parent_id = $level1->ID;

                                if (has_children($menu_items, $level2_parent_id)) { ?>
                                        <ul class="secondary-ul">
                                            <li>
                                                <div class="clearfix">
                                                    <?php
                                                    foreach ($menu_items as $level2){
                                                        if ($level2->menu_item_parent == $level2_parent_id) { ?>
                                                            <div class="secondary-holder left clearfix">
                                                                <?php if ($level2->url != '') { ?><a class="" href="<?php echo $level2->url; ?>" target="<?php echo $level2->target; ?>"><?php } ?>
                                                                    <h2 class="head-secondary <?php echo implode(' ', $level2->classes); ?>"><?php echo $level2->title; ?></h2>
                                                                <?php if ($level2->url != '') { ?></a><?php } ?>

                                                                <?php 
                                                                // LEVEL 3 =====================================================================
                                                                $level3_parent_id = $level2->ID;

                                                                if (has_children($menu_items, $level3_parent_id)) {
                                                                    foreach ($menu_items as $level3) {
                                                                        if($level3->menu_item_parent == $level3_parent_id) { ?>
                                                                            <div class="secondary-link">
                                                                                <?php if ($level3->url != '') { ?><a href="<?php echo $level3->url; ?>" target="<?php echo $level3->target; ?>"><?php } ?><?php echo $level3->title; ?><?php if ($level3->url != '') { ?></a><?php } ?>

                                                                                <?php
                                                                                // LEVEL 4 =====================================================================
                                                                                $level4_parent_id = $level3->ID;

                                                                                if (has_children($menu_items, $level4_parent_id)) { ?>
                                                                                <div style="position: relative;">
                                                                                <div class="flyout-down-arrow icon red">1</div>
                                                                                    <div class="flyout">
                                                                                        <ul>
                                                                                            <?php
                                                                                            foreach ($menu_items as $level4) {
                                                                                                if($level4->menu_item_parent == $level4_parent_id) { ?>
                                                                                                    <li><?php if ($level4->url != '') { ?><a href="<?php echo $level4->url; ?>" target="<?php echo $level4->target; ?>"><?php } ?><?php echo $level4->title; ?><?php if ($level3->url != '') { ?></a><?php } ?></li>
                                                                                                <?php }
                                                                                            }
                                                                                            ?>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <?php }

                                                                                ?>
                                                                            </div>
                                                                        <?php }
                                                                    }
                                                                }

                                                                ?>
                                                            </div>
                                                        <?php }
                                                    }
                                                    ?>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } 
                                ?>
                            </li>
                        <?php }
                    } ?>

                </ul>

                <?php // kill the loop once we have used the correct nav
                break;
            }
        }
    }else{
        return false;
    }
}

/**
 * Outputs the secondary navigation, this is only 1 level deep.
 * Returns false if menu location does not exist.
 * 
 * @return boolean
 */
function get_secondary_nav () {
    $menus = wp_get_nav_menus(); // get all active menus
    $locations = get_nav_menu_locations(); // get all menu location info
    $location_id = 'secondary-nav'; // the menu location slug we are looking for
    
    // first check if the menu location we want exists
    if (isset($locations[$location_id])) {
        
        // we loop through all active menus to find a mached ID for the one we are looking for
        foreach ($menus as $menu) {
            
            // if menu ID match is found
            if ($menu->term_id == $locations[$location_id]) { ?>
                <nav role="navigation">
                    <ul class="nav top-nav clearfix" id="menu-main">

                        <?php // get all the nav items for this menu
                        $menu_items = wp_get_nav_menu_items($menu);
                        
                        // LEVEL 1 =====================================================================
                        $level1_parent_id = 0;

                        foreach ($menu_items as $level1) {
                            if ($level1->menu_item_parent == $level1_parent_id) { ?>
                                <li class="menu-item menu-item-type-post_type <?php echo implode(' ', $level1->classes); ?>">
                                    <?php if ($level1->url != '') { ?><a href="<?php echo $level1->url; ?>" target="<?php echo $level3->target; ?>"><?php } ?><?php echo $level1->title; ?><?php if ($level1->url != '') { ?></a><?php } ?>
                                </li>
                            <?php }
                        } ?>
                        
                    </ul>
                </nav>

                <?php // kill the loop once we have used the correct nav
                break;
            }
        }
    }else{
        return false;
    }
}

/**
 * Outputs the footer feeds as selected in the theme option menu
 * 
 * @param String $option
 */
function get_footer_feed($option) {
    if (trim(get_option($option)) != '') {
        $menus = wp_get_nav_menus(); // get all active menus
        $locations = get_nav_menu_locations(); // get all menu location info
        $location_id = 'main-nav'; // the menu location slug we are looking for

        if (isset($locations[$location_id])) {
            foreach ($menus as $menu) {
                if ($menu->term_id == $locations[$location_id]) {
                    $menu_items = wp_get_nav_menu_items($menu);

                    //we get the menu item ID of the parent element
                    foreach ($menu_items as $parent) {
                        if (trim($parent->title) == trim(get_option($option))) {
                            $parentID = $parent->ID; 
                            ?>
                            <h2 class="<?php echo implode(' ', $parent->classes); ?> head-secondary"><?php echo $parent->title; ?></h2>
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
                                <?php if ($sub->url != '') { ?><a class="<?php echo implode(' ', $sub->classes); ?>" target="<?php echo $sub->target; ?>"><?php } ?><?php echo trim($sub->title); ?><?php if ($sub->url != '') { ?></a><?php } ?>
                                <?php if (has_children($menu_items, $subID)) { ?>
                                <div style="position: relative;">
                                    <div class="flyout-down-arrow icon red">1</div>
                                    <div class="flyout">
                                        <ul>
                                        <?php
                                        foreach ($menu_items as $sub2) {
                                            if ($sub2->menu_item_parent == $subID) {
                                                ?>
                                                 <?php if ($sub2->url != '') { ?><a href="<?php echo $sub2->url; ?>" target="<?php echo $sub2->target; ?>"><?php } ?><li><?php echo $sub2->title; ?></li> <?php if ($sub2->url != '') { ?></a><?php } ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <?php
                         }
                    }

                    break;
                }   
            }

        } 
    } 
}

/**
 * Outputs the mobile navigation, this is only 1 level deep.
 * Returns false if menu location does not exist.
 * 
 * @return boolean
 */
function get_mobile_menu () {
    $menus = wp_get_nav_menus(); // get all active menus
    $locations = get_nav_menu_locations(); // get all menu location info
    $location_id = 'mobile-nav'; // the menu location slug we are looking for
    
    // first check if the menu location we want exists
    if (isset($locations[$location_id])) {
        
        // we loop through all active menus to find a mached ID for the one we are looking for
        foreach ($menus as $menu) {
            
            // if menu ID match is found
            if ($menu->term_id == $locations[$location_id]) { ?>
                <div id="mobile-menu-holder">
                    <nav>

                        <?php // get all the nav items for this menu
                        $menu_items = wp_get_nav_menu_items($menu);
                        
                        // LEVEL 1 =====================================================================
                        $level1_parent_id = 0;

                        foreach ($menu_items as $level1) {
                            if ($level1->menu_item_parent == $level1_parent_id) { ?>
                                    <div class="mobile-item <?php echo implode(' ', $level1->classes); ?>">
                                        <?php if ($level1->url != '') { ?><a href="<?php echo $level1->url; ?>" target="<?php echo $level3->target; ?>"><?php } ?><?php echo $level1->title; ?><?php if ($level1->url != '') { ?></a><?php } ?>
                                    </div>
                                
                            <?php }
                        } ?>
                        
                    </nav>
                </div>

                <?php // kill the loop once we have used the correct nav
                break;
            }
        }
    }else{
        return false;
    }
}


/**
 * Outputs the mobile navigation, this is only 1 level deep.
 * Returns false if menu location does not exist.
 * 
 * @return boolean
 */
function get_footer_menu () {
    $menus = wp_get_nav_menus(); // get all active menus
    $locations = get_nav_menu_locations(); // get all menu location info
    $location_id = 'footer-links'; // the menu location slug we are looking for
    
    // first check if the menu location we want exists
    if (isset($locations[$location_id])) {
        
        // we loop through all active menus to find a mached ID for the one we are looking for
        foreach ($menus as $menu) {
            
            // if menu ID match is found
            if ($menu->term_id == $locations[$location_id]) { ?>
                            
                <?php // get all the nav items for this menu
                $menu_items = wp_get_nav_menu_items($menu);

                $total_menu_items = count($menu_items);
                $i = 1;

                // LEVEL 1 =====================================================================
                $level1_parent_id = 0;

                foreach ($menu_items as $level1) {

                    if ($level1->menu_item_parent == $level1_parent_id) { ?>
                        <?php if ($level1->url != '') { ?><a class="left <?php echo implode(' ', $level1->classes); ?>" href="<?php echo $level1->url; ?>" target="<?php echo $level3->target; ?>"><?php } ?>
                            <?php echo $level1->title; if($i!=$total_menu_items) echo ' |'; ?><?php if ($level1->url != '') { ?></a>
                        <?php $i++; } ?>
                    <?php }
                } ?>
                        
                
                <?php // kill the loop once we have used the correct nav
                break;
            }
        }
    }else{
        return false;
    }
}

?>
