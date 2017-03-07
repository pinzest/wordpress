<?php
get_header();
while ( have_posts() ) : the_post(); 

			 get_template_part( 'content', 'single' ); 

			  

			
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			

endwhile; // end of the loop.

$arg = array(
		'before'           => '<p>' . __( 'Pages:' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page' ),
		'previouspagelink' => __( 'Previous page' ),
		'pagelink'         => '%',
		'echo'             => 1

	);

		
get_footer();
