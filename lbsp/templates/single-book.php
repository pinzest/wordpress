<?php
/**
 * The Template for displaying all single books
 *
 * @author 		Shivlal
 * @package 	LBSP/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php 
				//get_template_part( 'content', 'single-book' );
				//echo __DIR__;
				load_template( __DIR__.'/content-single-book.php', true );
			 ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
	//	do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
