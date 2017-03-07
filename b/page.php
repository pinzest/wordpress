<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Banjaar
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-9">
		<main id="main" class="post-wrap" role="main">

		<div id="content">
		    <div class="container">
		      <div class="row">
		      <article class="span8">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>
			</article>

			<?php get_sidebar(); ?>
			</div></div></div>
		</main>
		</div>

<?php get_footer(); ?>
