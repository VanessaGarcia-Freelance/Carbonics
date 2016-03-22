<?php
/**
 * The template for displaying Archive pages.
 *
 * @package paralx
 */

get_header(); ?>

	<div class="page-header">
	
		<div class="container">
		
			<div class="title">
				<h1 class="entry-title">
					<?php 
						if (is_search()) {
							printf( __( 'Search Results for: %s', 'pxs' ), '<span>' . get_search_query() . '</span>' );
						} else if (is_archive()) {
							if ( is_category() ) :
								single_cat_title();
			
							elseif ( is_tag() ) :
								single_tag_title();
			
							elseif ( is_author() ) :
								the_post();
								printf( __( 'Author: %s', 'pxs' ), '<span class="vcard">' . get_the_author() . '</span>' );
								rewind_posts();
			
							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'pxs' ), '<span>' . get_the_date() . '</span>' );
			
							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'pxs' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
			
							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'pxs' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
			
							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'pxs' );
			
							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'pxs');
			
							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'pxs' );
			
							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'pxs' );
			
							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'pxs' );
			
							else :
								_e( 'Archives', 'pxs' );
			
							endif;
						} else if (is_404()) {
							_e( 'Page Not Found', 'pxs' );
						} else {
							the_title();
						}
					?>
				</h1>
			</div>
			
			<div class="breadcrumbs">
				<?php dimox_breadcrumbs(); ?>
			</div>
		
		</div>
		
		<div class="tint"></div>
		
	</div>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					 get_template_part( 'template/post-format/content', get_post_format());
				?>

			<?php endwhile; ?>

			<?php paralx_numeric_posts_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'template/post-format/content', 'none'); ?>

		<?php endif; ?>

		</main><!-- #main -->
		
		<?php get_sidebar(); ?>
		
	</section><!-- #primary -->

<?php get_footer(); ?>
