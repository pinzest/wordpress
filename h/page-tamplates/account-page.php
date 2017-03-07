<?php
/*
Template Name: account
Template Post Type: post, page
*/
?>
<?php get_header(); ?>
<?php
$current_user = wp_get_current_user();
$the_query = new WP_Query( array( 'author' =>  $current_user->ID,'post_type' => 'property',) );
		if ( $the_query->have_posts() ) {
			echo '<ul>';
			while ( $the_query->have_posts() ) 
			{
						$the_query->the_post();
						echo '<li>' . get_the_title() . '</li>';
			}
			echo '</ul>';
						/* Restore original Post Data */
			wp_reset_postdata();
			} 
			else 
			{
				echo 'no posts found';
			}

?>
<?php get_footer(); ?>