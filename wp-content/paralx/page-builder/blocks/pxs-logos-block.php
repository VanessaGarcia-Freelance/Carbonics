<?php

/* Logos Block */

class PXS_Logos_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Logos',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('PXS_Logos_Block', $block_options);
	}
	
	function form($instance) {
		
		global $options;
		
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'tooltip_1' => '',
			'tooltip_2' => '',
			'tooltip_3' => '',
			'tooltip_4' => '',
			'tooltip_5' => '',
			'tooltip_6' => '',
			'link_1' => '',
			'link_2' => '',
			'link_3' => '',
			'link_4' => '',
			'link_5' => '',
			'link_6' => '',
			'image_1' => '',
			'image_2' => '',
			'image_3' => '',
			'image_4' => '',
			'image_5' => '',
			'image_6' => '',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Heading', 'pxs'); ?></h2>
			<h4><?php  _e('Enter a slogan and caption for this block <span>Optional</span>', 'pxs'); ?></h4>
		</div>
		
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
			<h2><?php  _e('Client #1', 'pxs'); ?></h2>
			<h4><?php  _e('Enter tooltip, link and upload a logo', 'pxs'); ?></h4>
		</div>
		
		<p class="description full">
			<label for="<?php echo $this->get_field_id('image_1') ?>">
				<?php echo aq_field_upload('image_1', $block_id, $image_1) ?>
			</label>
		</p>
		
		<div class="duo">
			<p class="description">
				<label for="<?php echo $this->get_field_id('tooltip_1') ?>">
					<input id="<?php echo $this->get_field_id('tooltip_1') ?>" class="input-full" type="text" value="<?php echo $tooltip_1 ?>" name="<?php echo $this->get_field_name('tooltip_1') ?>" placeholder="<?php  _e('Tooltip:', 'pxs'); ?>">
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('link_1') ?>">
					<input id="<?php echo $this->get_field_id('link_1') ?>" class="input-full" type="text" value="<?php echo $link_1 ?>" name="<?php echo $this->get_field_name('link_1') ?>" placeholder="<?php  _e('Link:', 'pxs'); ?>">
				</label>
			</p>
		</div>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Client #2', 'pxs'); ?></h2>
			<h4><?php  _e('Enter tooltip, link and upload a logo', 'pxs'); ?></h4>
		</div>
		
		<p class="description full">
			<label for="<?php echo $this->get_field_id('image_2') ?>">
				<?php echo aq_field_upload('image_2', $block_id, $image_2) ?>
			</label>
		</p>
		
		<div class="duo">
			<p class="description">
				<label for="<?php echo $this->get_field_id('tooltip_2') ?>">
					<input id="<?php echo $this->get_field_id('tooltip_2') ?>" class="input-full" type="text" value="<?php echo $tooltip_2 ?>" name="<?php echo $this->get_field_name('tooltip_2') ?>" placeholder="<?php  _e('Tooltip:', 'pxs'); ?>">
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('link_2') ?>">
					<input id="<?php echo $this->get_field_id('link_2') ?>" class="input-full" type="text" value="<?php echo $link_2 ?>" name="<?php echo $this->get_field_name('link_2') ?>" placeholder="<?php  _e('Link:', 'pxs'); ?>">
				</label>
			</p>
		</div>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Client #3', 'pxs'); ?></h2>
			<h4><?php  _e('Enter tooltip, link and upload a logo', 'pxs'); ?></h4>
		</div>
		
		<p class="description full">
			<label for="<?php echo $this->get_field_id('image_3') ?>">
				<?php echo aq_field_upload('image_3', $block_id, $image_3) ?>
			</label>
		</p>
		
		<div class="duo">
			<p class="description">
				<label for="<?php echo $this->get_field_id('tooltip_3') ?>">
					<input id="<?php echo $this->get_field_id('tooltip_3') ?>" class="input-full" type="text" value="<?php echo $tooltip_3 ?>" name="<?php echo $this->get_field_name('tooltip_3') ?>" placeholder="<?php  _e('Tooltip:', 'pxs'); ?>">
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('link_3') ?>">
					<input id="<?php echo $this->get_field_id('link_3') ?>" class="input-full" type="text" value="<?php echo $link_3 ?>" name="<?php echo $this->get_field_name('link_3') ?>" placeholder="<?php  _e('Link:', 'pxs'); ?>">
				</label>
			</p>
		</div>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Client #4', 'pxs'); ?></h2>
			<h4><?php  _e('Enter tooltip, link and upload a logo', 'pxs'); ?></h4>
		</div>
		
		<p class="description full">
			<label for="<?php echo $this->get_field_id('image_4') ?>">
				<?php echo aq_field_upload('image_4', $block_id, $image_4) ?>
			</label>
		</p>
		
		<div class="duo">
			<p class="description">
				<label for="<?php echo $this->get_field_id('tooltip_4') ?>">
					<input id="<?php echo $this->get_field_id('tooltip_4') ?>" class="input-full" type="text" value="<?php echo $tooltip_4 ?>" name="<?php echo $this->get_field_name('tooltip_4') ?>" placeholder="<?php  _e('Tooltip:', 'pxs'); ?>">
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('link_4') ?>">
					<input id="<?php echo $this->get_field_id('link_4') ?>" class="input-full" type="text" value="<?php echo $link_4 ?>" name="<?php echo $this->get_field_name('link_4') ?>" placeholder="<?php  _e('Link:', 'pxs'); ?>">
				</label>
			</p>
		</div>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Client #5', 'pxs'); ?></h2>
			<h4><?php  _e('Enter tooltip, link and upload a logo', 'pxs'); ?></h4>
		</div>
		
		<p class="description full">
			<label for="<?php echo $this->get_field_id('image_5') ?>">
				<?php echo aq_field_upload('image_5', $block_id, $image_5) ?>
			</label>
		</p>
		
		<div class="duo">
			<p class="description">
				<label for="<?php echo $this->get_field_id('tooltip_5') ?>">
					<input id="<?php echo $this->get_field_id('tooltip_5') ?>" class="input-full" type="text" value="<?php echo $tooltip_5 ?>" name="<?php echo $this->get_field_name('tooltip_5') ?>" placeholder="<?php  _e('Tooltip:', 'pxs'); ?>">
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('link_5') ?>">
					<input id="<?php echo $this->get_field_id('link_5') ?>" class="input-full" type="text" value="<?php echo $link_5 ?>" name="<?php echo $this->get_field_name('link_5') ?>" placeholder="<?php  _e('Link:', 'pxs'); ?>">
				</label>
			</p>
		</div>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Client #6', 'pxs'); ?></h2>
			<h4><?php  _e('Enter tooltip, link and upload a logo', 'pxs'); ?></h4>
		</div>
		
		<p class="description full">
			<label for="<?php echo $this->get_field_id('image_6') ?>">
				<?php echo aq_field_upload('image_6', $block_id, $image_6) ?>
			</label>
		</p>
		
		<div class="duo">
			<p class="description">
				<label for="<?php echo $this->get_field_id('tooltip_6') ?>">
					<input id="<?php echo $this->get_field_id('tooltip_6') ?>" class="input-full" type="text" value="<?php echo $tooltip_6 ?>" name="<?php echo $this->get_field_name('tooltip_6') ?>" placeholder="<?php  _e('Tooltip:', 'pxs'); ?>">
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('link_6') ?>">
					<input id="<?php echo $this->get_field_id('link_6') ?>" class="input-full" type="text" value="<?php echo $link_6 ?>" name="<?php echo $this->get_field_name('link_6') ?>" placeholder="<?php  _e('Link:', 'pxs'); ?>">
				</label>
			</p>
		</div>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		$out = '';
		
		$out = '<div class="logos">';
			
			$out .= '<div class="container center">';
			
				$out .= '<div class="content aq_span12 aq-first">';
					
					if ($slogan) {
						$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
						$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';	
					}
					
					$out .= '<div class="items">';
					
						$out .= '<div class="item aq_span2 aq-first">';
							$out .= '<span class="tooltip">'.do_shortcode(htmlspecialchars_decode($tooltip_1)).'</span><a href="'.do_shortcode(htmlspecialchars_decode($link_1)).'"><img src="'.do_shortcode(htmlspecialchars_decode($image_1)).'" alt="'.do_shortcode(htmlspecialchars_decode($tooltip_1)).'" /></a>';	
						$out .= '</div>';
						
						$out .= '<div class="item aq_span2">';
							$out .= '<span class="tooltip">'.do_shortcode(htmlspecialchars_decode($tooltip_2)).'</span><a href="'.do_shortcode(htmlspecialchars_decode($link_2)).'"><img src="'.do_shortcode(htmlspecialchars_decode($image_2)).'" alt="'.do_shortcode(htmlspecialchars_decode($tooltip_2)).'" /></a>';	
						$out .= '</div>';
						
						$out .= '<div class="item aq_span2">';
							$out .= '<span class="tooltip">'.do_shortcode(htmlspecialchars_decode($tooltip_3)).'</span><a href="'.do_shortcode(htmlspecialchars_decode($link_3)).'"><img src="'.do_shortcode(htmlspecialchars_decode($image_3)).'" alt="'.do_shortcode(htmlspecialchars_decode($tooltip_3)).'" /></a>';	
						$out .= '</div>';
						
						$out .= '<div class="item aq_span2">';
							$out .= '<span class="tooltip">'.do_shortcode(htmlspecialchars_decode($tooltip_4)).'</span><a href="'.do_shortcode(htmlspecialchars_decode($link_4)).'"><img src="'.do_shortcode(htmlspecialchars_decode($image_4)).'" alt="'.do_shortcode(htmlspecialchars_decode($tooltip_4)).'" /></a>';	
						$out .= '</div>';
						
						$out .= '<div class="item aq_span2">';
							$out .= '<span class="tooltip">'.do_shortcode(htmlspecialchars_decode($tooltip_5)).'</span><a href="'.do_shortcode(htmlspecialchars_decode($link_5)).'"><img src="'.do_shortcode(htmlspecialchars_decode($image_5)).'" alt="'.do_shortcode(htmlspecialchars_decode($tooltip_5)).'" /></a>';	
						$out .= '</div>';
						
						$out .= '<div class="item aq_span2">';
							$out .= '<span class="tooltip">'.do_shortcode(htmlspecialchars_decode($tooltip_6)).'</span><a href="'.do_shortcode(htmlspecialchars_decode($link_6)).'"><img src="'.do_shortcode(htmlspecialchars_decode($image_6)).'" alt="'.do_shortcode(htmlspecialchars_decode($tooltip_6)).'" /></a>';	
						$out .= '</div>';	
						
					$out .= '</div>';
					
				$out .= '</div>';		
				
			$out .= '</div>';
			
		$out .= '</div>';
		
		echo $out;
	}
	
}

?>