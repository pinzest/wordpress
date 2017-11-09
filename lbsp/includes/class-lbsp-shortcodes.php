<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * LBSP_Shortcodes class
 *
 * @class       LBSP_Shortcodes
 * @version     2.1.0
 * @package     LBSP/Classes
 * @category    Class
 * @author      Shivlal
 */
class LBSP_Shortcodes {

	/**
	 * Init shortcodes.
	 */
	public static function init() {

		$shortcodes = array(
			'searchbooks'                    => __CLASS__ . '::searchBookForm',
		);

		foreach ( $shortcodes as $shortcode => $function ) {
			add_shortcode( $shortcode, $function );
		}
	}

	public static function searchBookForm($atts) {

		return self::outputBookForm($atts);
	}

	public static function outputBookForm($atts) {

		$title 	= isset($atts['title'])  ? $atts['title'] : "Search Book";
		$submit = isset($atts['submit'])  ? $atts['submit'] : "Search";
		$ajax 	= isset($atts['ajax'])  ? $atts['ajax'] : false;

		ob_start();
		include 'views/html-search-book-form.php';
		return ob_get_clean();
	}


}
	