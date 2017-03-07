<?php
get_header();
echo "<h1>archive.php</h1>";
 if ( have_posts() ) :
 	 while ( have_posts() ) : 
 			the_post();
 			echo the_title().'<br>';
 	endwhile;
 endif;
get_footer();