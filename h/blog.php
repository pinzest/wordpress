 <div class="blog-top">

 	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('homevilla-large-thumb'); ?></a>
		</div>
	<?php endif; ?>

	<?php the_title( sprintf( '<h4 class="title-post entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

	<h5>Posted By : <?php the_author_posts_link(); ?> | Date : <?php the_time('F jS, Y'); ?></h5>

	<p><?php the_content();?></p>

	<div class="links">
		<ul class="blog-links">
		<li>
		<?php comments_popup_link( 'No Comments', '<i class="blog_circle">1</i><span>Comment</span>', '<i class="blog_circle">%</i><span>Comments</span>' ,'comments','');
		?>
		</li>
		  	<li><a href="#"><i class="glyphicon glyphicon-heart"> </i><span>Like</span></a></li>
		 </ul>
	</div>
</div>  