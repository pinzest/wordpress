<?php
/** 
 * @package LBSP
 *
Plugin Name: LBSP
Plugin URI: #
Description: Easily create Book and search form.
Version: 1.1
Author: Shivlal
Author URI: #
License: GPLv2 or later
Text Domain: lbsp
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'IS_ADMIN' ) ) {
	/**
	 * Checks if an admin page is being viewed.
	 *
	 * @since   Unknown
	 *
	 * @used-by 
	 *
	 * @var boolean IS_ADMIN True if admin page. False otherwise.
	 */
	define( 'IS_ADMIN', is_admin() );
}

/**
 * Defines the minimum version of WordPress required for lbsp.
 *
 * @since   Unknown
 *
 * @used-by 
 *
 * @var string LBSP_MIN_WP_VERSION Minimum version number.
 */
define( 'LBSP_MIN_WP_VERSION', '3.7' );

/**
 * Checks if the current WordPress version is supported.
 *
 * @since   Unknown
 *
 * @used-by 
 * @uses    LBSP_MIN_WP_VERSION
 *
 * @var boolean LBSP_SUPPORTED_WP_VERSION True if supported.  False otherwise.
 */
define( 'LBSP_SUPPORTED_WP_VERSION', version_compare( get_bloginfo( 'version' ), LBSP_MIN_WP_VERSION, '>=' ) );

/**
 * Defines the minimum version of WordPress that will be officially supported.
 *
 * @var string LBSP_MIN_WP_VERSION_SUPPORT_TERMS The version number
 */
define( 'LBSP_MIN_WP_VERSION_SUPPORT_TERMS', '4.7' );


if ( ! class_exists( 'LBSP' ) ) :

/**
 * Main LBSP Class.
 *
 * @class LBSP
 * @version	1.1
 */
final class LBSP 
{

	/**
	 * Cloning is forbidden.
	 * @since 2.1
	 */
	protected static $_instance = null;

	public function __clone() {
		
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 * @since 2.1
	 */
	public function __wakeup() {
		
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * LBSP Constructor.
	 */
	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->init_hooks();	
	}

	/**
	 * Hook into actions and filters.
	 * @since  2.3
	 */
	private  function init_hooks()
	{ 
		register_activation_hook( __FILE__, array( 'LBSP_Install', 'install' ) );
		add_action( 'after_setup_theme', array( $this, 'include_template_functions' ), 11 );
		add_action( 'init', array( 'LBSP_Shortcodes', 'init' ) );

	}

	/**
	 * Include required core files used in admin and on the frontend.
	 */
	private  function includes()
	{
		include_once( LBSP_ABSPATH . 'includes/class-lbsp-install.php' );
		include_once( LBSP_ABSPATH . 'includes/class-lbsp-post-types.php' );
		include_once( LBSP_ABSPATH . 'includes/class-lbsp-meta-boxes.php' );
		include_once( LBSP_ABSPATH . 'includes/class-lbsp-shortcodes.php' ); 
		include_once( LBSP_ABSPATH . 'includes/class-lbsp-frontend-scripts.php' ); 
		include_once( LBSP_ABSPATH . 'includes/class-lbsp-footer-scripts.php' );
		include_once( LBSP_ABSPATH . 'includes/class-lbsp-ajax.php' );
		include_once( LBSP_ABSPATH . 'includes/class-lbsp-template-loader.php' );

		include_once( LBSP_ABSPATH . 'includes/lbsp-template-hook.php' );
	}


	/**
	 * Define LBSP Constants.
	 */
	private function define_constants() {
		$upload_dir = wp_upload_dir();
		$this->define( 'LBSP_ABSPATH', dirname( __FILE__ ) . '/' );
		
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param  string $name
	 * @param  string|bool $value
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Function used to Init LBSP Template Functions - This makes them pluggable by plugins and themes.
	 */
	public function include_template_functions() {
		include_once( LBSP_ABSPATH . 'includes/lbsp-template-functions.php' );
	}


}

endif;

LBSP::instance();
