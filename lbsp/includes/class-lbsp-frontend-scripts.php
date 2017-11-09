<?php
/** 
 * Handle frontend scripts
 *
 * @class       LBSP_Frontend_Scripts
 * @version     2.3.0
 * @package     LBSP/Classes/
 * @category    Class
 * @author      Shivlal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LBSP_Frontend_Scripts Class.
 */
class LBSP_Frontend_Scripts {

	/**
	 * Contains an array of script handles registered by LBSP.
	 * @var array
	 */
	private static $scripts = array();

	/**
	 * Contains an array of script handles registered by LBSP.
	 * @var array
	 */
	private static $styles = array();

	/**
	 * Contains an array of script handles localized by LBSP.
	 * @var array
	 */
	private static $wp_localize_scripts = array();

	/**
	 * Hook in methods.
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'load_scripts' ) );
	}

	

	/**
	 * Register/queue frontend scripts.
	 */
	public static function load_scripts() {
		self::register_scripts();
		self::register_styles();
	}
 
	public static function register_scripts() {
		
		$register_scripts = array(
			'bootstrap' => array(
				'src'     => plugin_dir_url('/') . 'Lbsp/assets/js/bootstrap.min.js',
				'deps'    => array( 'jquery' ),
				'version' => '2.6.1',
			),
			'ui-jQuery' => array(
				'src'     => 'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
				'deps'    => array( 'jquery' ),
				'version' => '2.6.1',
			),
			'main' => array(
				'src'     => plugin_dir_url('/') . 'Lbsp/assets/js/main.js',
				'deps'    => array( 'jquery' ),
				'version' => '2.6.1',
			),
			
		); 

		foreach ( $register_scripts as $name => $props ) {
			self::register_script( $name, $props['src'], $props['deps'], $props['version'], 'all', $props['has_rtl'] );
		}

	}

	public static function register_styles() {

		$register_styles = array(
			/*'bootstrap' => array(
				'src'     => plugin_dir_url('/') . 'Lbsp/assets/css/bootstrap.min.css',
				'deps'    => array(),
				'version' => "3.3.7",
				'has_rtl' => false,
			),*/
			'style' => array(
				'src'     => plugin_dir_url('/') . 'Lbsp/assets/css/style.css',
				'deps'    => array(),
				'version' => "1.1",
				'has_rtl' => false,
			),
			'jQuery-ui-theme' => array(
				'src'     => 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
				'deps'    => array(),
				'version' => "1.1",
				'has_rtl' => false,
			),
			
		);

		foreach ( $register_styles as $name => $props ) {
			self::register_style( $name, $props['src'], $props['deps'], $props['version'], 'all', $props['has_rtl'] );
		}	
	}

	/**
	 * Register a style for use.
	 *
	 * @uses   wp_register_style()
	 * @access private
	 * @param  string   $handle
	 * @param  string   $path
	 * @param  string[] $deps
	 * @param  string   $version
	 * @param  string   $media
	 * @param  boolean  $has_rtl
	 */
	private static function register_style( $handle, $path, $deps = array(), $version = '2', $media = 'all', $has_rtl = false ) {
		self::$styles[] = $handle;
		wp_register_style( $handle, $path, $deps, $version, $media );
		wp_enqueue_style( $handle );

	}

	/**
	 * Register a script for use.
	 *
	 * @uses   wp_register_script()
	 * @access private
	 * @param  string   $handle
	 * @param  string   $path
	 * @param  string[] $deps
	 * @param  string   $version
	 * @param  boolean  $in_footer
	 */
	private static function register_script( $handle, $path, $deps = array( 'jquery' ), $version = '2', $in_footer = true ) {
		self::$scripts[] = $handle;
		wp_register_script( $handle, $path, $deps, $version, $in_footer );
		wp_enqueue_script( $handle );
	}

}

LBSP_Frontend_Scripts::init(); 