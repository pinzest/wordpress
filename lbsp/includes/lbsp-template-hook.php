<?php
/**
 * LBSP Template Hooks
 *
 * Action/filter hooks used for Lbsp functions/templates.
 *
 * @author 		Shivlal
 * @category 	Core
 * @package 	Lbsp/Templates
 * @version     2.1.0
 */

/**
 * Before Single Products Summary Div.
 *
 * @see lbsp_show_product_images()
 */
add_action( 'lbsp_before_single_book_summary', 'lbsp_show_book_images', 20 );

/**
 * Book Summary Box.
 */
add_action( 'lbsp_single_book_summary', 'lbsp_template_single_title', 5 );
