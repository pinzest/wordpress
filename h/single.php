<?php
/**
 * The home template file.
 *
 * @package homevilla
 */

get_header();
?>
<!--single-->
<?php
while ( have_posts() ) : the_post(); 
	get_template_part( 'content', 'single' ); 

	
			

endwhile; // end of the loop.

?>

<?php get_footer(); ?>
