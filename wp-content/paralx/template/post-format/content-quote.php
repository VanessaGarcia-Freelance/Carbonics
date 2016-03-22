<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 * @package paralx
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="thumbnail">
			<?php  if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
		</div>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header>
	
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
	
</article><!-- #post -->
