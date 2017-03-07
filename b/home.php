<?php
/**
 * The home template file.
 *
 * @package Banjaar
 */

get_header();
?>

 <div id="content">
    <div class="container">
      <div class="row">
      <article class="span8" >
<?php
	
	
	if( have_posts() ) :
		while(have_posts()):

			the_post();
				//the_content();
				get_template_part( 'content', get_post_format() );
			
		endwhile;
			wp_reset_query();
		echo "<div>";
		next_posts_link( 'Older posts' );
		echo " | ";
		previous_posts_link( 'Newer posts' );
		echo "</div>";
		
	else: 
			 _e( 'Sorry, no posts matched your criteria.' );

	endif;
?>
</article> 

         <?php get_sidebar(); ?>
        
 </div> 		<!--   row   -->
    </div> <!--   container   -->
    
  </div> <!--   content   -->

<?php get_footer(); ?>