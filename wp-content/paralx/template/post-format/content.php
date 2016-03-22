<?php
/**
 * The template used for displaying standard post
 *
 * @package paralx
 */
?>

<article id="post-<?php the_ID(); ?>" <?php is_sticky() ? post_class('sticky') : post_class(); ?>>
	
	<header class="entry-header">
		<div class="thumbnail">
			<?php  if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
		</div>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header>
	
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pxs' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div>
	
	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<span class="date"><?php paralx_posted_on(); ?></span>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'pxs' ) );
				if ( $categories_list && paralx_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( '<i class="fa fa-list-ul"></i> %1$s', 'pxs' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'pxs' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( '<i class="fa fa-tag"></i> %1$s', 'pxs' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><i class="fa fa-comments"></i><?php comments_popup_link( __( 'Leave a comment', 'pxs' ), __( '1 Comment', 'pxs' ), __( '% Comments', 'pxs' ) ); ?></span>
		<?php endif; ?>
	</footer>

</article><!-- #post-## -->
