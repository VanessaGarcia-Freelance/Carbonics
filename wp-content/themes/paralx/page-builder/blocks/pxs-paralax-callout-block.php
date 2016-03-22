<?php

/* Paralax: Callout Block */

class PXS_Paralax_Callout_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Paralax: Callout',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('PXS_Paralax_Callout_Block', $block_options);
	}
	
	function form($instance) {
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'image' => '',
			'tint_opacity' => '',
			'background' => '',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Heading', 'pxs'); ?></h2>
			<h4><?php  _e('Enter a slogan and caption for this block', 'pxs'); ?></h4>
		</div>
		
		<div class="space"></div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('slogan') ?>">

				<input id="<?php echo $this->get_field_id('slogan') ?>" class="input-full" type="text" value="<?php echo $slogan ?>" name="<?php echo $this->get_field_name('slogan') ?>" placeholder="<?php  _e('Slogan:', 'pxs'); ?>">
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('caption') ?>">

				<input id="<?php echo $this->get_field_id('caption') ?>" class="input-full" type="text" value="<?php echo $caption ?>" name="<?php echo $this->get_field_name('caption') ?>" placeholder="<?php  _e('Caption:', 'pxs'); ?>">
			</label>
		</p>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Fetured Image', 'pxs'); ?></h2>
			<h4><?php  _e('Browse and upload an image', 'pxs'); ?></h4>
		</div>
		
		<p class="description full">
			<label for="<?php echo $this->get_field_id('image') ?>">
				<?php echo aq_field_upload('image', $block_id, $image) ?>
			</label>
		</p>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Settings', 'pxs'); ?></h2>
			<h4><?php  _e('Upload a background image and set tint opacity', 'pxs'); ?></h4>
		</div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('tint_opacity') ?>">
				<input id="<?php echo $this->get_field_id('tint_opacity') ?>" class="input-full" type="text" value="<?php echo $tint_opacity ?>" name="<?php echo $this->get_field_name('tint_opacity') ?>" placeholder="<?php  _e('Tint Opacity: ex. 0.5', 'pxs'); ?>">
			</label>
		</p>
		
		<p class="description full">
			<label for="<?php echo $this->get_field_id('background') ?>">
				<?php echo aq_field_upload('background', $block_id, $background) ?>
			</label>
		</p>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		$id = rand(1, 99999);
		$ccss = 'ccss-' . rand(1, 99999);
		
		$out = '';
		
			$out .= '<div class="paralax-callout '.$ccss.'">';
			
				$out .= '<div class="container">';
				
					$out .= '<div class="content aq_span12 aq-first">';
						
						if ($image) {
							$out .= '<img src="'.do_shortcode(htmlspecialchars_decode($image)).'" alt="'.do_shortcode(htmlspecialchars_decode($slogan)).'" />';
						}
						
						$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
						$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
						
						$out .= '<div class="link">';
							$out .= '<a href=""><i class="fa fa-angle-double-right"></i></a>';
						$out .= '</div>';
						
					$out .= '</div>';
					
					$out .= '<div class="tint '.$ccss.'"></div>';
					
				$out .= '</div>';
			
			$out .= '</div>';

		echo $out;
		
		
		$custom_css = " .paralax-callout .tint.$ccss {
							opacity: $tint_opacity!important;
						 }
						 
						.paralax-callout.$ccss {
							background: url($background) no-repeat fixed;
							-webkit-background-size: cover;
							-moz-background-size: cover;
							-o-background-size: cover;
							background-size: cover;
						 }";
						 
		wp_enqueue_style('paralx-custom-css');
        wp_add_inline_style( 'paralx-custom-css', $custom_css );

	}
	
}

?>