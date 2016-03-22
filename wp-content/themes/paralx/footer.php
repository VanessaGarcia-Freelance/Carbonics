<?php
/**
 * The template for displaying the footer.
 *
 * @package paralx
 */
global $smof_data;
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	
		<div class="container aq-template-wrapper aq_row">
			
			<div class="col_left aq_span6 aq-first">
				
				<div class="site-info">
					<?php 
				        if (isset($_COOKIE["px_ratio"])) {
				            $px_ratio = $_COOKIE["px_ratio"];
				            $logo = $px_ratio >= 2 ? $smof_data['pxs_logo_retina'] : $smof_data['pxs_logo'];
				        } else {
				        	if (!empty($smof_data['pxs_logo'])) {$logo = $smof_data['pxs_logo'];}
				        }
			        ?>
					<?php  if (isset($smof_data['pxs_logo_text'])) { ?> 
						<?php  if ($smof_data['pxs_logo_text'] != 1) { ?> 
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
						<?php } else { ?>
							<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php } ?>
					<?php } ?>
					<h5><?php bloginfo( 'description' ); ?></h5>
				</div>
				
				<div class="site-about">
					<?php 
						if(function_exists('icl_register_string')) { 
							echo '<p>'.icl_t('theme pxs', 'about', $smof_data['pxs_footer_about']).'</p>';
						} else {
							if(isset($smof_data['pxs_footer_about'])) { 
								echo '<p>'.$smof_data['pxs_footer_about'].'</p>';
							}
						}
					?>			
				</div>
				
			</div>
			
			<div class="col_right aq_span6">
				
				<div class="site-copyright">
				
					<ul>
					</ul>
					
					<p>
						<?php 
							if(function_exists('icl_register_string')) { 
								echo '<p>'.icl_t('theme pxs', 'copyright', $smof_data['pxs_footer_copyright']).'</p>';
							} else {
								if(isset($smof_data['pxs_footer_copyright'])) { 
									echo '<p>'.$smof_data['pxs_footer_copyright'].'</p>';
								}
							}
						?>
						<?php 
							if(function_exists('icl_register_string')) { 
								echo '<p>'.icl_t('theme pxs', 'disclaimer', $smof_data['pxs_footer_disclaimer']).'</p>';
							} else {
								if(isset($smof_data['pxs_footer_disclaimer'])) { 
									echo '<p>'.$smof_data['pxs_footer_disclaimer'].'</p>';
								}
							}
						?>
					</p>
				</div>
				
			</div>
			
			<div class="go-top">
				<i class="fa fa-angle-double-up"></i>
			</div>
			
		</div>
		
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<!-- Google Analytics -->
<?php if(isset($smof_data['pxs_tracking_code'])) { echo $smof_data['pxs_tracking_code'];} ?>

<!-- Custom Javascript -->
<?php if(isset($smof_data['pxs_gen_js'])) { echo $smof_data['pxs_gen_js'];} ?>

<?php wp_footer(); ?>
</body>
</html>