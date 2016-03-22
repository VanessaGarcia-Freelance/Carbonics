<?php

/* Block */

class PXS_Landing_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Landing',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('PXS_Landing_Block', $block_options);
	}
	
	function form($instance) {
	
		global $op_layout_content, $op_text_align;
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'content' => '',
			'image' => '',
			'link' => '',
			'placeholder' => '',
			'layout' => 'ly1',
			'align' => 'ta-left',
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
			<h2><?php  _e('Content', 'pxs'); ?></h2>
			<h4><?php  _e('Enter description and upload a feature image', 'pxs'); ?></h4>
		</div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('content') ?>">
				<textarea id="<?php echo $this->get_field_id('content') ?>" class="textarea-full" name="<?php echo $this->get_field_name('content') ?>" rows="6" placeholder="<?php  _e('Description:', 'pxs'); ?>"><?php echo $content ?></textarea>
			</label>
		</p>
		
		<p class="description full">
			<label for="<?php echo $this->get_field_id('image') ?>">
				<?php echo aq_field_upload('image', $block_id, $image) ?>
			</label>
		</p>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Settings', 'pxs'); ?></h2>
			<h4><?php  _e('Set content layout and text alignment', 'pxs'); ?></h4>
		</div>
				
		<div class="space"></div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('layout') ?>">
				<?php echo aq_field_select('layout', $block_id, $op_layout_content, $layout) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('align') ?>">
				<?php echo aq_field_select('align', $block_id, $op_text_align, $align) ?>
			</label>
		</p>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		$out = '';
		
			$out .= '<div class="landing">';
			
				$out .= '<div class="container">';
					
					if ($layout == 'clir') {
					
						$out .= '<div class="featured aq_span5 only-small">';
							$out .= '<img class="fullscreen" src="'.do_shortcode(htmlspecialchars_decode($image)).'" alt="'.do_shortcode(htmlspecialchars_decode($slogan)).'" />';
						$out .= '</div>';
					
						$out .= '<div class="content aq_span7 aq-first">';
							$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
							$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
							$out .= '<p>'.wpautop(do_shortcode(htmlspecialchars_decode($content))).'</p>';
						$out .= '</div>';
						
						$out .= '<div class="featured aq_span5 only-large">';
							$out .= '<img class="fullscreen" src="'.do_shortcode(htmlspecialchars_decode($image)).'" alt="'.do_shortcode(htmlspecialchars_decode($slogan)).'" />';
						$out .= '</div>';
					
					} else {
						
						$out .= '<div class="featured aq_span5 aq-first aleft">';
							$out .= '<img class="fullscreen" src="'.do_shortcode(htmlspecialchars_decode($image)).'" alt="'.do_shortcode(htmlspecialchars_decode($slogan)).'" />';
						$out .= '</div>';
						
						$out .= '<div class="content aq_span7">';
							$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
							$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
							$out .= '<p>'.wpautop(do_shortcode(htmlspecialchars_decode($content))).'</p>';
						$out .= '</div>';
						
					}
					
				$out .= '</div>';
			
			$out .= '</div>';

		echo $out;

	}
	
}

?>