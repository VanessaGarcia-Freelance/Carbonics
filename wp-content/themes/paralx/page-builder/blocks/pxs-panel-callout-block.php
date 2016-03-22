<?php

/* Panel: Callout */

class PXS_Panel_Callout_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Panel: Callout',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('PXS_Panel_Callout_Block', $block_options);
	}
	
	function form($instance) {
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'margin_top' => '',
			'margin_bottom' => '',
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
			<h2><?php  _e('Settings', 'pxs'); ?></h2>
			<h4><?php  _e('Upload a background image, set tint color and opacity', 'pxs'); ?></h4>
		</div>
		
		<div class="duo">
			<p class="description">
				<label for="<?php echo $this->get_field_id('margin_top') ?>">
					<input id="<?php echo $this->get_field_id('margin_top') ?>" class="input-full" type="text" value="<?php echo $margin_top ?>" name="<?php echo $this->get_field_name('margin_top') ?>" placeholder="<?php  _e('Margin Top: 75px', 'pxs'); ?>">
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('margin_bottom') ?>">
					<input id="<?php echo $this->get_field_id('margin_bottom') ?>" class="input-full" type="text" value="<?php echo $margin_bottom ?>" name="<?php echo $this->get_field_name('margin_bottom') ?>" placeholder="<?php  _e('Margin Bottom: 75px', 'pxs'); ?>">
				</label>
			</p>
		</div>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		$ccss = 'ccss-' . rand(1, 99999);
		
		$out = '';
		
			$out .= '<div class="callout '.$ccss.'">';
			
				$out .= '<div class="container">';
				
					$out .= '<div class="content aq_span12 aq-first">';
					
						$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
						$out .= '<p>'.do_shortcode(htmlspecialchars_decode($caption)).'</p>';
						
						$out .= '<div class="link">';
							$out .= '<a href=""><i class="fa fa-angle-double-right"></i></a>';
						$out .= '</div>';
						
					$out .= '</div>';
					
				$out .= '</div>';
			
			$out .= '</div>';

		echo $out;
		
		$custom_css = " .callout.$ccss .content {
							margin: $margin_top 0 $margin_bottom 0;
						 }";
						 		 
		wp_enqueue_style('paralx-custom-css');
        wp_add_inline_style( 'paralx-custom-css', $custom_css );

	}
	
}

?>