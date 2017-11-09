<?php
/**
 * Installation related functions and actions.
 *
 * @author   Shivlal
 * @category Admin
 * @package  LBSP/Classes
 * @version  3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LBSP_Install Class.
 */
class LBSP_Install {
	/**
	 * Install LBSP.
	 */
	public static function install() {
		// Register post types
		LBSP_Post_types::register_post_types();	
		// Register taxonomies
		LBSP_Post_types::register_taxonomies();	
	}

	/**
	 * Uninstall LBSP.
	 */
	public static function Uninstall() {
		
	}

	/**
	 * Remove LBSP.
	 */
	public static function Remove() {
		
	}
	
}