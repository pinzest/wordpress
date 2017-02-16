<?php

add_action('init',function(){
// custom post type Movies,

 

// labels of costom post type..

	$labels = [
			'menu_name'     		=> _x( 'Movies', 'Admin Menu text', 'textdomain' ),
	        'name'                  => _x( 'Movies', 'Post type general name', 'textdomain' ),
	        'singular_name'         => _x( 'Movie', 'Post type singular name', 'textdomain' ),
	        'name_admin_bar'        => _x( 'Movie', 'Add New on Toolbar', 'textdomain' ),
	        'add_new'               => __( 'Add Movie', 'textdomain' ),
	        'add_new_item'          => __( 'Add New Movie', 'textdomain' ),
	        'new_item'              => __( 'New Movie', 'textdomain' ),
	        'edit_item'             => __( 'Edit Movie', 'textdomain' ),
	        'view_item'             => __( 'View Movie', 'textdomain' ),
	        'all_items'             => __( 'All Movies', 'textdomain' ),
	        'search_items'          => __( 'Search Movie', 'textdomain' ),
	        'parent_item_colon'     => __( 'Parent Movie:', 'textdomain' ),
	        'not_found'             => __( 'No Movies found.', 'textdomain' ),
	        'not_found_in_trash'    => __( 'No Movies found in Trash.', 'textdomain' ),
	        'featured_image'        => _x( 'Movie Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'set_featured_image'    => _x( 'Set Movie cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'remove_featured_image' => _x( 'Remove Movie cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'archives'              => _x( 'Movie archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
	        'insert_into_item'      => _x( 'Insert into Movie', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
	        'uploaded_to_this_item' => _x( 'Uploaded to this Movie', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
	        'filter_items_list'     => _x( 'Filter Movie list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
	        'items_list_navigation' => _x( 'Movies list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
	        'items_list'            => _x( 'Movies list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),

			];

			$args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Movie' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
         );


				register_post_type( 'movies', $args );






});




?>