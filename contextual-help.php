<?php
// custom contextual help

function movie_contextual_help($contextual_help, $screen_id, $screen) 
	{	
 
		ob_start();
		$tabs = array(
			    [
			
				'title'    => 'About Movie',
				'id'       => 'movie-about',
				'content'  => '<p>Things to remember when adding or editing a Movie</p>'

				],
				[
			
				'title'    => 'Movie Type',
				'id'       => 'movie-Type',
				'content'  => '<p>Things to remember Type a Movie</p>'

				],

			);
		 if( $screen->post_type == 'movies'):
		 	foreach ($tabs as $tab):
		 		# code...
	               $screen->add_help_tab($tab);
		 	  endforeach;
		 	$screen->set_help_sidebar('<a href="#">More info!</a>');
		 endif;
?>

		<h3>Help Section Title</h3>
		<p>This is text that provides helpful information</p>
 
 <?php

		return ob_get_clean();
  	} // movie_contextual_help

add_action('contextual_help', 'movie_contextual_help', 10, 3);
