<!-- blog -->
<div class="blog">
	<div class="container">
   		<div class="col-md-9 blog-head">
	     	<div class="blog-top" id="post-<?php the_ID(); ?>">

	    <?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-thumb">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('banjaar-large-thumb'); ?>
				</a>
			</div>
		<?php endif; ?>

			<h4><?php the_title(); ?></h4>

	        <h5>Posted By : 
	        	<?php the_author_posts_link(); ?> 
	        	| Date : <?php the_time('F jS, Y'); ?>
	        </h5>

	        <p><?php the_content(); ?></p>

	        <div class="links">
				<ul class="blog-links">
					<li>
						<?php comments_popup_link( 'No Comments', '<i class="blog_circle">1</i><span>Comment</span>', '<i class="blog_circle">%</i><span>Comments</span>' ,'comments','');
						?>
					</li>
			  		<li>
			  			<a href="#"><i class="glyphicon glyphicon-heart"> </i><span>Like</span></a>
			  		</li>
		 		</ul>
			</div>
		 </div> 
		 <!---->
		 <div class="single-grid">
		 <?php
// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || get_comments_number() ) :
				comments_template();
		endif;

		?>
		</div>
	</div>
			
		<!-- sidebar -->
<div class="col-md-3 blog-sidebar">
	<!-- blog-list -->
	<div class="blog-list">
		<h4>Categories</h4>
			<ul >
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>Lorem Ipsum is simply</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>Contrary to popular belief</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>It is a long established</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>There are many variations</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>Sed ut perspiciatis unde</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>But I must explain to you</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>At vero eos et accusamus</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>On the other hand</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>Lorem Ipsum is simply</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>Contrary to popular belief</a></li>
			</ul>
		<div class="clearfix"> </div>
	</div>
	<!-- blog-list -->

	<!-- blog-list -->
	<div class="blog-list">
	    <h4>Archive</h4>
		<ul >
			<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>July (15)</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>Oct (20)</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>November (8)</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>December (25)</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>August (9)</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>July (15)</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>Oct (20)</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>November (8)</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>December (25)</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>August (9)</a></li>
		</ul>
	</div>
	<!-- blog-list -->

	<!-- blog-list1 -->
	<div class="blog-list1">
		<h4>Popular Posts</h4>
		<div class="blog-list-top">
			<div class="blog-img">
			<a href="blog_single.html"><img class="img-responsive" src="images/bo.jpg" alt="" /></a>
			</div>
			<div class="blog-text">
				<p>
					<a href="#">Lorem ipsum dolor sit amet, consectetuer</a>
				</p>
				<span class="link">Feb 14, 2015
					<a href="#"><i class="glyphicon glyphicon-heart"> </i></a>16
				</span>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="blog-list-top">
			<div class="blog-img">
			<a href="blog_single.html"><img class="img-responsive" src="images/bo.jpg" alt="" /></a>
			</div>
			<div class="blog-text">
				<p>
					<a href="#">Lorem ipsum dolor sit amet, consectetuer</a>
				</p>
				<span class="link">Feb 14, 2015
					<a href="#"><i class="glyphicon glyphicon-heart"> </i></a>16
				</span>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="blog-list-top">
			<div class="blog-img">
			<a href="blog_single.html"><img class="img-responsive" src="images/bo.jpg" alt="" /></a>
			</div>
			<div class="blog-text">
				<p>
					<a href="#">Lorem ipsum dolor sit amet, consectetuer</a>
				</p>
				<span class="link">Feb 14, 2015
					<a href="#"><i class="glyphicon glyphicon-heart"> </i></a>16
				</span>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- blog-list1 -->

	<!-- blog-list2 -->
	<div class="blog-list2">
		<h4>Tags</h4>
		<ul>
			<li><a href="#">Web Design</a></li>
			<li><a href="#">Html5</a></li>
			<li><a href="#">Wordpress</a></li>
			<li><a href="#">Logo</a></li>
			<li><a href="#">Web Design</a></li>
			<li><a href="#">Web Design</a></li>
			<li><a href="#">Wordpress</a></li>
			<li><a href="#">Web Design</a></li>
			<li><a href="#">Html5</a></li>
			<li><a href="#">Wordpress</a></li>
			<li><a href="#">Logo</a></li>
		</ul>
	</div>  
	<!-- /blog-list2 -->

</div> 
<!-- /sidebar -->
<div class="clearfix"> </div>
	 
  </div>
</div>
<!-- /blog -->
