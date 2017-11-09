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
 * Product Summary Box.
 *
 * @see woocommerce_template_single_title()
 * @see woocommerce_template_single_rating()
 * @see woocommerce_template_single_price()
 * @see woocommerce_template_single_excerpt()
 * @see woocommerce_template_single_meta()
 * @see woocommerce_template_single_sharing()
 */
add_action( 'lbsp_single_book_summary', 'lbsp_template_single_title', 5 );
/*add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );*/