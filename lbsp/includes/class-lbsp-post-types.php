<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies.
 *
 * @class     LBSP_Post_types
 * @version   2.5.0
 * @package   LBSP/Classes/BOOK
 * @category  Class
 * @author    Shivlal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LBSP_Post_types Class.
 */
class LBSP_Post_types {

	public static function init()
	{
		add_action( 'init', array( __CLASS__, 'register_post_types' ), 5 );
		add_action( 'init', array( __CLASS__, 'register_taxonomies' ), 5 );
	}

	public static function register_post_types()
	{
		$labels = array(
			'name'               => _x( 'Books', 'post type general name', 'lbsp' ),
			'singular_name'      => _x( 'Book', 'post type singular name', 'lbsp' ),
			'menu_name'          => _x( 'Books', 'admin menu', 'lbsp' ),
			'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'lbsp' ),
			'add_new'            => _x( 'Add New', 'book', 'lbsp' ),
			'add_new_item'       => __( 'Add New Book', 'lbsp' ),
			'new_item'           => __( 'New Book', 'lbsp' ),
			'edit_item'          => __( 'Edit Book', 'lbsp' ),
			'view_item'          => __( 'View Book', 'lbsp' ),
			'all_items'          => __( 'All Books', 'lbsp' ),
			'search_items'       => __( 'Search Books', 'lbsp' ),
			'parent_item_colon'  => __( 'Parent Books:', 'lbsp' ),
			'not_found'          => __( 'No books found.', 'lbsp' ),
			'not_found_in_trash' => __( 'No books found in Trash.', 'lbsp' )
		);	

		$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Description.', 'lbsp' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'book' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_icon'           => 'dashicons-book',
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 
											'thumbnail', 'excerpt', 
											'comments' 
										  )
		);

		register_post_type( 'book', $args );

	}
	
	/**
	 * Register core taxonomies.
	 */
	public static function register_taxonomies() {
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Author', 'taxonomy general name', 'lbsp' ),
			'singular_name'     => _x( 'Author', 'taxonomy singular name', 'lbsp' ),
			'search_items'      => __( 'Search Author', 'lbsp' ),
			'all_items'         => __( 'All Author', 'lbsp' ),
			'parent_item'       => __( 'Parent Author', 'lbsp' ),
			'parent_item_colon' => __( 'Parent Author:', 'lbsp' ),
			'edit_item'         => __( 'Edit Author', 'lbsp' ),
			'update_item'       => __( 'Update Author', 'lbsp' ),
			'add_new_item'      => __( 'Add New Author', 'lbsp' ),
			'new_item_name'     => __( 'New Author Name', 'lbsp' ),
			'menu_name'         => __( 'Author', 'lbsp' ),
		);

		$args = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'author' ),
		);

		register_taxonomy( 'author', array( 'book' ), $args );

		// Add new taxonomy, NOT hierarchical (like tags)
		$labels = array(
			'name'                       => _x( 'Publisher', 'taxonomy general name', 'lbsp' ),
			'singular_name'              => _x( 'Publisher', 'taxonomy singular name', 'lbsp' ),
			'search_items'               => __( 'Search Publisher', 'lbsp' ),
			'popular_items'              => __( 'Popular Publisher', 'lbsp' ),
			'all_items'                  => __( 'All Publisher', 'lbsp' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Publisher', 'lbsp' ),
			'update_item'                => __( 'Update Publisher', 'lbsp' ),
			'add_new_item'               => __( 'Add New Publisher', 'lbsp' ),
			'new_item_name'              => __( 'New Publisher Name', 'lbsp' ),
			'separate_items_with_commas' => __( 'Separate Publisher with commas', 'lbsp' ),
			'add_or_remove_items'        => __( 'Add or remove Publisher', 'lbsp' ),
			'choose_from_most_used'      => __( 'Choose from the most used Publisher', 'lbsp' ),
			'not_found'                  => __( 'No Publisher found.', 'lbsp' ),
			'menu_name'                  => __( 'Publisher', 'lbsp' ),
		);

		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'publisher' ),
		);

		register_taxonomy( 'publisher', 'book', $args );
	}

}
LBSP_Post_types::init();