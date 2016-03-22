<?php

/* Block */

class PXS_Splash_Countdown_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Splash: Countdown',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('PXS_Splash_Countdown_Block', $block_options);
	}
	
	function form($instance) {
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'image' => '',
			'tint_opacity' => '',
			'background' => '',
			'day' => '',
			'month' => '',
			'year' => '',
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
			<h2><?php  _e('Set Date', 'pxs'); ?></h2>
			<h4><?php  _e('Enter the values for Day, Month and Year', 'pxs'); ?></h4>
		</div>
		
		<div class="duo">
			<p class="description">
				<label for="<?php echo $this->get_field_id('day') ?>">
	
					<input id="<?php echo $this->get_field_id('day') ?>" class="input-full" type="text" value="<?php echo $day ?>" name="<?php echo $this->get_field_name('day') ?>" placeholder="<?php  _e('Day: ex. 2', 'pxs'); ?>">
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('month') ?>">
	
					<input id="<?php echo $this->get_field_id('month') ?>" class="input-full" type="text" value="<?php echo $month ?>" name="<?php echo $this->get_field_name('month') ?>" placeholder="<?php  _e('Month: ex. 3', 'pxs'); ?>">
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('year') ?>">
	
					<input id="<?php echo $this->get_field_id('year') ?>" class="input-full" type="text" value="<?php echo $year ?>" name="<?php echo $this->get_field_name('year') ?>" placeholder="<?php  _e('Year: ex. 2014', 'pxs'); ?>">
				</label>
			</p>
		</div>
		
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
		
		global $smof_data;
		
		if (isset($_COOKIE["px_ratio"])) {
            $px_ratio = $_COOKIE["px_ratio"];
            $logo = $px_ratio >= 2 ? $smof_data['pxs_logo_retina'] : $smof_data['pxs_logo'];
        } else {
        	if (!empty($smof_data['pxs_logo'])) {$logo = $smof_data['pxs_logo'];}
        }
		
		wp_enqueue_script('paralx-countdown');
		$data = array('day' => $day, 'month' => $month, 'year' => $year);
		if(!empty($data)) {wp_localize_script('paralx-countdown', 'date_data', $data);}		
		
		$ccss = 'ccss-' . rand(1, 99999);
		
		$out = '';
		
			$out .= '<div class="splash countdown '.$ccss.'">';
			
				$out .= '<div class="container">';
				
					$out .= '<div class="content">';
				
						if($image) { 
							$out .= '<div class="info aq_span7 aq-first center">';
						} else {
							$out .= '<div class="info aq_span12 aq-first center">';
						}
							if ($smof_data['pxs_logo_text'] != 1) {
								$out .= '<a href="'.esc_url( home_url( '/' ) ).'"><img src="'.$logo.'" alt="'.do_shortcode(htmlspecialchars_decode($slogan)).'" /></a>';	
							}
							$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
							$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
							$out .= '<div class="countdown">';
								$out .= '<div class="clock"></div>';
							$out .= '</div>';
						$out .= '</div>';
						
						if ($image) {
							$out .= '<div class="featured aq_span5">';
								$out .= '<img class="fullscreen" src="'.do_shortcode(htmlspecialchars_decode($image)).'" alt="'.do_shortcode(htmlspecialchars_decode($slogan)).'" />';
							$out .= '</div>';
						}
					
					$out .= '</div>';
					
				$out .= '</div>';
				
				$out .= '<div class="tint '.$ccss.'"></div>';
			
			$out .= '</div>';

		echo $out;
		
		$custom_css = " .splash.countdown .tint.$ccss {
							opacity: $tint_opacity!important;
						 }
						 
						.splash.countdown.$ccss {
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