<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies.
 *
 * @class     LBSP_Meta_boxes
 * @version   2.5.0
 * @package   LBSP/Classes/Meta Boxes
 * @category  Class
 * @author    Shivlal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LBSP_Post_types Class.
 */
class LBSP_Meta_boxes {

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 30 );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ), 2, 2 );
	}

	/**
	 * Add LBSP Meta boxes.
	 */
	public function add_meta_boxes()
	{
		add_meta_box(
						'lbsp-book-data',
						__( 'Book data', 'lbsp' ),
						'LBSP_Meta_boxes::output',
						'book',
						'normal',
						'high'
					);
		
	}

	/**
	 * Output the metabox.
	 *
	 * @param WP_Post $post
	 */
	public static function output( $post ) {

		$book_object = $post;
		include( 'views/html-book-data-panel.php' );
	}

	/**
	 * Check if we're saving, the trigger an action based on the post type.
	 *
	 * @param  int $post_id
	 * @param  object $post
	 */
	public function save_meta_boxes( $post_id, $post ) {

		// $post_id and $post are required
		if ( empty( $post_id ) || empty( $post )) {
			return;
		}

		// Dont' save meta boxes for revisions or autosaves
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the nonce
		if ( empty( $_POST['lbsp_meta_nonce'] ) || ! wp_verify_nonce( $_POST['lbsp_meta_nonce'], 'lbsp_save_data' ) ) {
			//return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check user has permission to edit
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// Check post type
		if ($post->post_type != 'book'){
			return;
		}

		// save post meta
		$book_price = $_POST['book-price'];
		$book_rating = $_POST['book-rating'];
		update_post_meta($post_id,'price',$book_price);
		update_post_meta($post_id,'rating',$book_rating);

	}
	
}
new LBSP_Meta_boxes();