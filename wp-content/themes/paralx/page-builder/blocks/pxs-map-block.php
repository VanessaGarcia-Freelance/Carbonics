<?php

/* =GOOGLE MAPS BLOCK
-------------------------------------------------------------- */

class PXS_Map_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Google Map',
			'size' => 'span12'
		);
		
		//create the block
		parent::__construct('pxs_map_block', $block_options);
	}
	
	function form($instance) {
		global $heading_size;
		
		$defaults = array(
			'lat' => '40.714353',
			'lng' => '-74.005973',
			'info' => 'We are located opposite of Green Way street',
			'zoom' => '21',
			'height' => '350px'
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Location', 'pxs'); ?></h2>
			<h4><?php  _e('Enter latitude and logitude coordinates', 'pxs'); ?></h4>
		</div>
		
		<div class="duo">
			<div class="description">
				<label for="<?php echo $this->get_field_id('lat') ?>">
					<?php _e('Latitude: ex. -34.397', 'pxs') ?>
					<?php echo aq_field_input('lat', $block_id, $lat) ?>
				</label>
			</div>
			<div class="description">
				<label for="<?php echo $this->get_field_id('lng') ?>">
					<?php _e('Longitude: ex. 150.644', 'pxs') ?>
					<?php echo aq_field_input('lng', $block_id, $lng) ?>
				</label>
			</div>
		</div>
		
		
		<div class="space">
		<div class="title">
			<h2><?php  _e('Description', 'pxs'); ?></h2>
			<h4><?php  _e('Enter a caption and description for map maker infowindow', 'pxs'); ?></h4>
		</div>
		
		<div class="description">
				<label for="<?php echo $this->get_field_id('info') ?>">
					<?php _e('Infowindow:', 'pxs') ?>
					<?php echo aq_field_textarea('info', $block_id, $info) ?>
				</label>
			</div>
		
		<div class="space">
		<div class="title">
			<h2><?php  _e('Map Settings', 'pxs'); ?></h2>
			<h4><?php  _e('Enter a default map zoom level and canves height', 'pxs'); ?></h4>
		</div>
		
		<div class="duo">
			<div class="description">
				<label for="<?php echo $this->get_field_id('zoom') ?>">
					<?php _e('Zoom Level: ex. 5', 'pxs') ?>
					<?php echo aq_field_input('zoom', $block_id, $zoom) ?>
				</label>
			</div>
			<div class="description">
				<label for="<?php echo $this->get_field_id('height') ?>">
					<?php _e('Canvas Height: ex. 350', 'pxs') ?>
					<?php echo aq_field_input('height', $block_id, $height) ?>
				</label>
			</div>
		</div>

		<?php
		
	}
	
	function block($instance) {
		extract($instance);
		
		global $smof_data;
		
		if(isset($smof_data["pxs_clr_accent"])) { $color = $smof_data["pxs_clr_accent"]; } else { $color = '#3CD3AD';}
		
		$mid = rand(5, 15);
		$mapid = 'map-canvas-' . $mid;
		$ccss = 'ccss-' . rand(1, 99999);
		
		wp_enqueue_script('paralx-google-maps');
		$data = array('lat' => $lat, 'lng' => $lng, 'info' => $info, 'zoom' => $zoom, 'mapid' => $mid, 'color' => $color );
		if(!empty($data)) {wp_localize_script('paralx-google-maps', 'php_data', $data);}
		
		$out = '';
		
			$out .= '<div class="map">';
			
				$out .= '<div id="map-canvas-'.$mid.'" class="map-canvas"></div>';
			
			$out .= '</div>';

		echo $out;
		
		$custom_css = " #map-canvas-$mid {
							height: $height;
						}";
		wp_enqueue_style('paralx-custom-css');
        wp_add_inline_style( 'paralx-custom-css', $custom_css );
		
	}
	
}
