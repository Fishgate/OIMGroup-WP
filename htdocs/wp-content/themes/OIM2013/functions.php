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
//require_once('library/custom-post-type.php'); // you can disable this if you like
require_once('library/products-services.php');
require_once('library/team-members.php');
require_once('library/clients.php');
require_once('library/news.php');

/*  
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
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
add_image_size( 'team-large', 631, 0, true );
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

function remove_menu_pages() {
    remove_menu_page('edit.php');  
}
add_action( 'admin_menu', 'remove_menu_pages' );

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
 * A few notes on how to handle the PDF attachment of product pages
 * 
$download = get_field('pdf_download');
$img = wp_get_attachment_image_src(get_field('pdf_thumbnail'), 'pdf-thumb');


<a href="<?php echo $download; ?>"><img src="<?php echo $img[0]; ?>" /></a>
*
*/

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

?>
