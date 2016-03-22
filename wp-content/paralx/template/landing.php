<?php
/**
 * Template Name: Landing Page
 *
 * @package paralx
 */

get_header(); ?>

	<div id="primary" class="content-area landing">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'landing' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
