<?php

/* Block */

class PXS_Video_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Video',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('PXS_Video_Block', $block_options);
	}
	
	function form($instance) {
	
		global $op_text_align;
		
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'youtube' => '',
			'vimeo' => '',
			'align' => '',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Heading', 'pxs'); ?></h2>
			<h4><?php  _e('Enter a slogan and caption for this block', 'pxs'); ?><span>Optional</span></h4>
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
			<h2><?php  _e('Video', 'pxs'); ?></h2>
			<h4><?php  _e('Embed a Youtube or Vimeo video', 'pxs'); ?></h4>
		</div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('youtube') ?>">
				<input id="<?php echo $this->get_field_id('youtube') ?>" class="input-full" type="text" value="<?php echo $youtube ?>" name="<?php echo $this->get_field_name('youtube') ?>" placeholder="<?php  _e('Youtube: ex: http://example.com', 'pxs'); ?>">
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('vimeo') ?>">
				<input id="<?php echo $this->get_field_id('vimeo') ?>" class="input-full" type="text" value="<?php echo $vimeo ?>" name="<?php echo $this->get_field_name('vimeo') ?>" placeholder="<?php  _e('Vimeo: ex: http://example.com', 'pxs'); ?>">
			</label>
		</p>
		
		<div class="title">
			<h2><?php  _e('Settings', 'pxs'); ?></h2>
			<h4><?php  _e('Set top margin, bottom margin and text alignment', 'pxs'); ?></h4>
		</div>
		
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
		
			$out .= '<div class="video">';
			
				$out .= '<div class="container">';
				
					$out .= '<div class="content '.$align.'">';
				
						$out .= '<div class="aq_span12 aq-first">';
							$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
							$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
						$out .= '</div>';
					
						$out .= '<div class="featured aq_span12 aq-first">';
							if($youtube) { $out .= '<iframe width="100%" height="641" src="//www.youtube.com/embed/'.$youtube.'" frameborder="0" allowfullscreen></iframe>';}
							if($vimeo) { $out .= '<iframe width="100%" height="641" src="//player.vimeo.com/video/'.$vimeo.'" frameborder="0" allowfullscreen></iframe>';}
						$out .= '</div>';
					
					$out .= '</div>';
					
				$out .= '</div>';
			
			$out .= '</div>';

		echo $out;

	}
	
}

?>