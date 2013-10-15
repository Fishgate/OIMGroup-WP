<?php
// let's create the function for the custom type
function custom_post_products_services() { 
	// creating (registering) the custom type 
	register_post_type( 'products_services', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Products & Services', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Products & Services', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Products & Services', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Product & Service', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Products & Services', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Product & Service', 'bonestheme'), /* New Display Title */
			'view_item' => __('View', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Products & Services', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Products and services offered by OIM Group.', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon-products-services.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'products-services', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'products-services', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_products_services');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
        register_taxonomy( 'products_services_cat', 
            array('products_services'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
            array('hierarchical' => true,     /* if this is true, it acts like categories */             
                    'labels' => array(
                            'name' => __( 'Products & Services Categories', 'bonestheme' ), /* name of the custom taxonomy */
                            'singular_name' => __( 'Products & Services Category', 'bonestheme' ), /* single taxonomy name */
                            'search_items' =>  __( 'Search Products & Services Categories', 'bonestheme' ), /* search title for taxomony */
                            'all_items' => __( 'All Products & Services Categories', 'bonestheme' ), /* all title for taxonomies */
                            'parent_item' => __( 'Parent Products & Services Category', 'bonestheme' ), /* parent title for taxonomy */
                            'parent_item_colon' => __( 'Parent Products & Services Category:', 'bonestheme' ), /* parent taxonomy title */
                            'edit_item' => __( 'Edit Products & Services Category', 'bonestheme' ), /* edit custom taxonomy title */
                            'update_item' => __( 'Update Products & Services Category', 'bonestheme' ), /* update title for taxonomy */
                            'add_new_item' => __( 'Add New Products & Services Category', 'bonestheme' ), /* add new title for taxonomy */
                            'new_item_name' => __( 'New Products & Services Category Name', 'bonestheme' ) /* name title for taxonomy */
                    ),
                    'show_admin_column' => true, 
                    'show_ui' => true,
                    'query_var' => true,
                    'rewrite' => array( 'slug' => 'categories' ),
            )
        );   

            // now let's add custom tags (these act like categories)
        register_taxonomy( 'products_services_tag', 
            array('products_services'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
            array('hierarchical' => false,    /* if this is false, it acts like tags */                
                    'labels' => array(
                            'name' => __( 'Products & Services Tags', 'bonestheme' ), /* name of the custom taxonomy */
                            'singular_name' => __( 'Products & Services Tag', 'bonestheme' ), /* single taxonomy name */
                            'search_items' =>  __( 'Search Products & Services Tags', 'bonestheme' ), /* search title for taxomony */
                            'all_items' => __( 'All Products & Services Tags', 'bonestheme' ), /* all title for taxonomies */
                            'parent_item' => __( 'Parent Products & Services Tag', 'bonestheme' ), /* parent title for taxonomy */
                            'parent_item_colon' => __( 'Parent Products & Services Tag:', 'bonestheme' ), /* parent taxonomy title */
                            'edit_item' => __( 'Edit Products & Services Tag', 'bonestheme' ), /* edit custom taxonomy title */
                            'update_item' => __( 'Update Products & Services Tag', 'bonestheme' ), /* update title for taxonomy */
                            'add_new_item' => __( 'Add New Products & Services Tag', 'bonestheme' ), /* add new title for taxonomy */
                            'new_item_name' => __( 'New Products & Services Tag Name', 'bonestheme' ) /* name title for taxonomy */
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
