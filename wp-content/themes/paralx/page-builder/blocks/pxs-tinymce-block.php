<?php

/* TinyMCE Block */

class PXS_Tinymce_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'TinyMCE Editor',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('PXS_Tinymce_Block', $block_options);
	}
	
	function form($instance) {
	
		global $op_text_align;
		
		$defaults = array(
			'content' => '',
			'talign' => '',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Content', 'pxs'); ?></h2>
			<h4><?php  _e('Add HTML content, attach media file or insert shortcodes', 'pxs'); ?></h4>
		</div>
		
		<div class="space"></div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('content') ?>">				
				<?php
				$args = array (
					'tinymce' => true,
					'quicktags' => true, 
				);
					wp_editor(htmlspecialchars_decode($content), 'aq_blocks['.$block_id.'][content]', $args );
				?>
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
		
		if($talign == 'left') {
			$out = '<div class="tinymce ta_left">';
		} else if ($talign == 'center') {
			$out = '<div class="tinymce ta_center">';
		} else {
			$out = '<div class="tinymce ta_right">';
		}
			
			$out .= '<div class="container">';
			
				$out .= '<div class="content">';
		
					$out .=  wpautop(do_shortcode(htmlspecialchars_decode($content)));
					
				$out .= '</div>';
			
			$out .= '</div>';
		
		$out .= '</div>';
		
		echo $out;
	}
	
}

?>