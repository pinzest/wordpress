<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LBSP LBSP_AJAX.
 *
 * AJAX Event Handler.
 *
 * @class    LBSP_AJAX
 * @package  LBSP/Classes
 * @category Class
 * @author   Shivlal
 */
class LBSP_AJAX {

	/**
	 * Hook in ajax handlers.
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'add_ajax_events' ), 0 );
	}

	/**
	 * Hook in methods - uses WordPress ajax handlers (admin-ajax).
	 */
	public static function add_ajax_events() {
		// LBSP_EVENT => nopriv
		$ajax_events = array(
			'book_result' => true,
		);

		foreach ( $ajax_events as $ajax_event => $nopriv ) {
			add_action( 'wp_ajax_LBSP_' . $ajax_event, array( __CLASS__, $ajax_event ) );

			if ( $nopriv ) {
				add_action( 'wp_ajax_nopriv_LBSP_' . $ajax_event, array( __CLASS__, $ajax_event ) );
			}
		}

	}

	public static function book_result() { 
		include( 'views/html-ajax-search-reslut.php' );
		exit;
	}
}

LBSP_AJAX::init();