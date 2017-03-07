<?php
/**
 * @package Banjaar
 */
?>
        <article  id="post-<?php the_ID(); ?>" >
          <div class="inner-1">
            <ul class="list-blog">
              <li>
              <?php the_title( sprintf( '<h3 class="title-post entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                <time datetime="2045-11-09" class="date-1">
                		<?php the_time('F jS, Y'); ?>	


                </time>
                <div class="name-author">by 
                		<?php the_author_posts_link(); ?>
                </div>
                <?php comments_popup_link( 'No Comments', '1 Comment', '% Comments' ,'comments',''); ?>
                
                <div class="clear"></div>
                <p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
               	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('banjaar-large-thumb'); ?></a>
		</div>
				<?php endif; ?>
                <p><?php the_content(); 

                ?></p>

                 </li>
              
            </ul>
          </div>
        </article>
       
     
<?php

/*wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'banjaar' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
	) );*/