 <div id="content">
    <div class="container">
      <div class="row">
        <article class="span8" id="post-<?php the_ID(); ?>" >
          <div class="inner-1">
            <ul class="list-blog">
              <li>
              <h3 class="title-post entry-title"><?php the_title(); ?></h3>
                <time datetime="2045-11-09" class="date-1"><?php the_time('F jS, Y'); ?></time>
                 <div class="name-author">by 
                    <?php the_author_posts_link(); ?>
                </div>
                 <?php comments_popup_link( 'No Comments', '1 Comment', '% Comments' ,'comments',''); ?>
                <div class="clear"></div>
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
          <div>
            <div style='float: right;'><?php  previous_post_link(); ?> </div>
            <div style='float: left;'><?php   next_post_link();     ?> </div>
         
            </div>
        </article>
       
            <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
<?php
