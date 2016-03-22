<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package paralx
 */

if ( ! function_exists( 'paralx_numeric_posts_nav' ) ) :

function paralx_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";
	
	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="nav-next">%s</li>' . "\n", get_next_posts_link(__('<span class="meta-nav"><i class="fa fa-angle-double-left"></i></span> Older posts', 'pxs' )));

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>?</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>...</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	
	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="nav-previous">%s</li>' . "\n", get_previous_posts_link(__( 'Newer posts <span class="meta-nav"><i class="fa fa-angle-double-right"></i></span>', 'pxs' )));
	

	echo '</ul></div>' . "\n";

}

endif;

if ( ! function_exists( 'paralx_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function paralx_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'pxs' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav"><i class="fa fa-angle-double-left"></i></span> Prev Post', 'Previous post link', 'pxs' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( 'Next Post <span class="meta-nav"><i class="fa fa-angle-double-right"></i></span>', 'Next post link',     'pxs' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'paralx_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function paralx_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on"><i class="fa fa-clock-o"></i> %1$s</span>', 'pxs' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		)
	);
}
endif;

if ( ! function_exists( 'paralx_about_author' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function paralx_about_author() {
	
	?>
	
	<div class="author-info">

	    <div class="author-image">
	
	    	<a href="<?php the_author_meta('user_url'); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '80', '' ); ?></a>
	
	    </div>   
	
	    <div class="author-bio">
	
	        <h4>Written by <?php the_author_link(); ?></h4>
	
	        <p><?php the_author_meta('description'); ?></p>
	
	    </div>
	
	</div><!--Author Info-->
	
	<?php
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function paralx_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so paralx_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so paralx_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in paralx_categorized_blog.
 */
function paralx_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'paralx_category_transient_flusher' );
add_action( 'save_post',     'paralx_category_transient_flusher' );

function paralx_read_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'paralx_read_more' );
