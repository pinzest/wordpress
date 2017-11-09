<?php
/**
 * LBSP Template
 *
 * Functions for the templating system.
 *
 * @author   Shivlal
 * @category Core
 * @package  LBSP/Functions
 * @version  2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/** Single Book ********************************************************/

if ( ! function_exists( 'lbsp_show_book_images' ) ) {

	/**
	 * Output the book image before the single book summary.
	 *
	 * @subpackage	Book
	 */
	function lbsp_show_book_images() {
		
		load_template( dirname(__DIR__).'/templates/single-book/book-image.php' );
	}
}

if ( ! function_exists( 'lbsp_template_single_title' ) ) {

	/**
	 * Output the book title before the single book summary.
	 *
	 * @subpackage	Book
	 */
	function lbsp_template_single_title() {
		
		load_template( dirname(__DIR__).'/templates/single-book/title.php' );
	}
}