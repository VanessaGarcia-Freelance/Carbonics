<?php

/* Slogan Block */

class PXS_Slogan_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Slogan',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('PXS_Slogan_Block', $block_options);
	}
	
	function form($instance) {
		
		global $op_text_align;
		
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'talign' => 'ta-left',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Heading', 'pxs'); ?></h2>
			<h4><?php  _e('Enter a slogan and caption', 'pxs'); ?></h4>
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
			<h4><?php  _e('Complete the following block settings', 'pxs'); ?></h4>
		</div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('talign') ?>">
				<?php echo aq_field_select('talign', $block_id, $op_text_align, $talign) ?>
			</label>
		</p>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		$out = '';
		
			$out .= '<div class="slogan">';
			
				if($talign == 'left') {
					$out .= '<div class="container left">';
				} else if ($talign == 'center') {
					$out .= '<div class="container center">';
				} else {
					$out .= '<div class="container right">';
				}
					
					$out .= '<div class="content">';
							
						$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
						$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';	
						
					$out .= '</div>';
				
					
				$out .= '</div>';
				
			
			$out .= '</div>';

		echo $out;
	}
	
}

?>