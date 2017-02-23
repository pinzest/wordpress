<?php

 /******************************************************************
  **              Custom columns for custom post types
  ******************************************************************/



#   Add Columns  :-
/*----------------------*/


add_filter('manage_movies_posts_columns' , 'add_movie_columns');

function add_movie_columns($columns) {

	// create new columns in array of name ⇒ label.

   $new_columns = array(

	   					'duration' => __('Duration'),
	                    'type' =>__( 'Movie Type')

   					);

    return array_merge($columns,$new_columns);
}


#   Replace  Columns  :-
/*----------------------*/

add_filter('manage_movies_posts_columns' , 'movie_cpt_columns');

function movie_cpt_columns($columns) {

	unset(
		$columns['author'],
		$columns['comments']
	);

	$new_columns = array(
		'publisher' => __('Publisher', 'ThemeName'),
		'movie_author' => __('movie Author', 'ThemeName'),
	);

    return array_merge($columns, $new_columns);

   
}



#   Rename  Columns  :-
/*----------------------*/

add_filter('manage_movies_posts_columns' , 'movies_cpt_columns');

function movies_cpt_columns($columns) {

	
		$columns['title'] = 'Movies',

    	return $columns;   
}


#   Hide  Columns  :-
/*----------------------*/

add_filter('manage_movies_posts_columns' , 'movie_cpt_columns');

function movie_cpt_columns($columns) {

		unset(
			$columns['author'],
			$columns['comments']
		);

    	return $columns;   
}



#   Adding content to custom columns  :-
/*----------------------*/


add_action( 'manage_movies_posts_custom_column', 'my_manage_movie_columns', 10, 2 );

function my_manage_movie_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		/* If displaying the 'duration' column. */
		case 'duration' :

			/* Get the post meta. */
			$duration = get_post_meta( $post_id, 'duration', true );

			/* If no duration is found, output a default message. */
			if ( empty( $duration ) )
				echo __( 'Unknown' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				printf( __( '%s minutes' ), $duration );

			break;

		/* If displaying the 'type' column. */
		case 'type' :

			/* Get the type for the post. */
			$terms = get_the_terms( $post_id, 'type' );

			/* If terms were found. */
			if ( !empty( $terms ) ) {

				$out = array();

				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'genre' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'genre', 'display' ) )
					);
				}

				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}

			/* If no terms were found, output a default message. */
			else {
				_e( 'No Genres' );
			}

			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}



#   Making custom columns sortable  :-
/*----------------------*/

add_filter( 'manage_edit-movies_sortable_columns', 'my_movie_sortable_columns' );

function my_movie_sortable_columns( $columns ) 
{

	$columns['duration'] = 'duration';

	return $columns;
}

?>
