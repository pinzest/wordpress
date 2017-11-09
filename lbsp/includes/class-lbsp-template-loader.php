<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Template Loader
 *
 * @class 		LBSP_Template
 * @version		2.2.0
 * @package		LBSP/Classes
 * @category	Class
 * @author 		shivlal
 */
class LBSP_Template_Loader {

	/**
	 * Hook in methods.
	 */
	public static function init() {
		add_filter( 'template_include', array( __CLASS__, 'template_loader' ) );
	}

	/**
	 * Load a template.
	 *
	 * @param mixed $template
	 * @return string
	 */
	public static function template_loader( $template ) {
		if ( is_embed() ) {
			return $template;
		}
 
		if ( is_singular( 'book' ) )
		{ 
			$template = plugin_dir_path( __DIR__ ).'/templates/single-book.php';
		}

		return $template;
	}
}

LBSP_Template_Loader::init();
