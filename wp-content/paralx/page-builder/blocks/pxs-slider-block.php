<?php

/* Revolution Slider Block */

class PXS_Slider_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Revolution Slider',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('PXS_Slider_Block', $block_options);
	}
	
	function form($instance) {
	
		$defaults = array(
			'sname' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Display Slider', 'pxs'); ?></h2>
			<h4><?php  _e('Enter the slider name that you wish to display ex. paralx', 'pxs'); ?></h4>
		</div>
		
		<div class="space"></div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('sname') ?>">
				<input id="<?php echo $this->get_field_id('sname') ?>" class="input-full" type="text" value="<?php echo $sname ?>" name="<?php echo $this->get_field_name('sname') ?>" placeholder="<?php  _e('Name:', 'pxs'); ?>">
			</label>
		</p>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		echo putRevSlider($sname);
		
	}
	
}

?>