<?php
/*
Template Name: list page
Template Post Type: post, page
*/

			 $args = array(

			'post_type' => array( 'page'),
			'post_name__in' => array('account','list'),
				);

			$new_query = new WP_Query($args);

			if ( $new_query->have_posts() ) {
	
	while ($new_query->have_posts() ) {
		
		$new_query->the_post();
		the_title('<h1>','</h1>');
		
	}
	
	/* Restore original Post Data */
	wp_reset_postdata();

	}

	
	


?>
