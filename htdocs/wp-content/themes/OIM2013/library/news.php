<?php
// let's create the function for the custom type
function custom_post_news() { 
	// creating (registering) the custom type 
	register_post_type( 'news', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('News', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('News Article', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All News Articles', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add News Article', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit News Article', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New News Article', 'bonestheme'), /* New Display Title */
			'view_item' => __('View', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search News Articles', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'News articles for OIM Group.', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon-news.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'news', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'news', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_news');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
        register_taxonomy( 'news_cat', 
            array('news'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
            array('hierarchical' => true,     /* if this is true, it acts like categories */             
                    'labels' => array(
                            'name' => __( 'News Categories', 'bonestheme' ), /* name of the custom taxonomy */
                            'singular_name' => __( 'News Category', 'bonestheme' ), /* single taxonomy name */
                            'search_items' =>  __( 'Search News Categories', 'bonestheme' ), /* search title for taxomony */
                            'all_items' => __( 'All News Categories', 'bonestheme' ), /* all title for taxonomies */
                            'parent_item' => __( 'Parent News Category', 'bonestheme' ), /* parent title for taxonomy */
                            'parent_item_colon' => __( 'Parent News Category:', 'bonestheme' ), /* parent taxonomy title */
                            'edit_item' => __( 'Edit News Category', 'bonestheme' ), /* edit custom taxonomy title */
                            'update_item' => __( 'Update News Category', 'bonestheme' ), /* update title for taxonomy */
                            'add_new_item' => __( 'Add News Category', 'bonestheme' ), /* add new title for taxonomy */
                            'new_item_name' => __( 'News Category Name', 'bonestheme' ) /* name title for taxonomy */
                    ),
                    'show_admin_column' => true, 
                    'show_ui' => true,
                    'query_var' => true,
                    'rewrite' => array( 'slug' => 'categories' ),
            )
        );   

        // now let's add custom tags (these act like categories)
        register_taxonomy( 'news_tag', 
            array('news'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
            array('hierarchical' => false,    /* if this is false, it acts like tags */                
                    'labels' => array(
                            'name' => __( 'News Tags', 'bonestheme' ), /* name of the custom taxonomy */
                            'singular_name' => __( 'News Tag', 'bonestheme' ), /* single taxonomy name */
                            'search_items' =>  __( 'Search News Tags', 'bonestheme' ), /* search title for taxomony */
                            'all_items' => __( 'All News Tags', 'bonestheme' ), /* all title for taxonomies */
                            'parent_item' => __( 'Parent News Tag', 'bonestheme' ), /* parent title for taxonomy */
                            'parent_item_colon' => __( 'Parent News Tag:', 'bonestheme' ), /* parent taxonomy title */
                            'edit_item' => __( 'Edit News Tag', 'bonestheme' ), /* edit custom taxonomy title */
                            'update_item' => __( 'Update News Tag', 'bonestheme' ), /* update title for taxonomy */
                            'add_new_item' => __( 'Add News Tag', 'bonestheme' ), /* add new title for taxonomy */
                            'new_item_name' => __( 'News Tag Name', 'bonestheme' ) /* name title for taxonomy */
                    ),
                    'show_admin_column' => true,
                    'show_ui' => true,
                    'query_var' => true,
            )
        ); 

        /*
            looking for custom meta boxes?
            check out this fantastic tool:
            https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
        */
	

?>
