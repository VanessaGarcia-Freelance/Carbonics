<?php
/**
 * Template used to display content in templates/landing.php
 *
 * @package paralx
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php the_content(); ?>
		
</article><!-- #post-## -->
