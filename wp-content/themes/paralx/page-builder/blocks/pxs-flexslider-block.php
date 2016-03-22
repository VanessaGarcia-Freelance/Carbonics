<?php
/* Flexslider Block */

class PXS_Flexslider_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Flexslider',
			'size' => 'span12',
		);
		
		//create the widget
		parent::__construct('PXS_Flexslider_Block', $block_options);
		
		//add ajax functions
		add_action('wp_ajax_aq_block_flexslider_add_new', array($this, 'add_slide'));
		
	}
	
	function form($instance) {
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'items' => array(
				1 => array(
					'title' => 'Title:',
					'caption' => 'Caption:',
					'image' => ''
				)
			)
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<div class="title">
			<h2><?php  _e('Content', 'pxs'); ?></h2>
			<h4><?php  _e('Enter slogan, caption and description for this block', 'pxs'); ?></h4>
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
			<h2><?php  _e( 'Screenshots', 'pxs'); ?></h2>
			<h4><?php  _e('Add a new screenshot item to slider.', 'pxs'); ?></h4>
		</div>
		
		<div class="description cf">
			<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
				<?php
				$items = is_array($items) ? $items : $defaults['items'];
				$count = 1;
				foreach($items as $item) {	
					$this->tab($item, $count);
					$count++;
				}
				?>
			</ul>
			<p></p>
			<a href="#" rel="flexslider" class="aq-sortable-add-new button">Add New</a>
			<p></p>
		</div>
		<?php
	}
	
	function tab($item = array(), $count = 0) {
			
		?>
		<li id="<?php echo $this->get_field_id('items') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
			
			<div class="sortable-head cf">
				<div class="sortable-title">
					<strong><?php echo $item['title'] ?></strong>
				</div>
				<div class="sortable-handle">
					<a href="#">Open / Close</a>
				</div>
			</div>
			
			<div class="sortable-body">
			
				<h3><?php  _e('Details', 'pxs'); ?></h3>
				
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title">
						<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][title]" value="<?php echo $item['title'] ?>" />
					</label>
				</p>
				
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-caption">
						<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-caption" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][caption]" value="<?php echo $item['caption'] ?>" />
					</label>
				</p>
				
				<div class="space"></div>
				<h3><?php  _e('Upload Image', 'pxs'); ?></h3>
				<div class="tab-desc description">
					<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-image">
						<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-image" class="input-full input-upload" value="<?php echo $item['image'] ?>" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][image]">
						<a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
					</label>
				</div>
				
				<div class="space"></div>
				<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
			</div>
			
		</li>
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		$out = '';
		
			$out .= '<div class="fxslider">';
			
				$out .= '<div class="container center">';
				
					$out .= '<div class="content">';
					
						$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
						$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
						
						$out .= '<div class="flexslider">';
						
							$out .= '<ul class="slides">';
							
								$i = 1;
								foreach($items as $item) {
									
									$out .= '<li>';
										$out .= '<img src="'. do_shortcode(htmlspecialchars_decode($item['image'])) .'" alt="'. do_shortcode(htmlspecialchars_decode($item['title'])) .'">';
										$out .= '<h2>'. do_shortcode(htmlspecialchars_decode($item['title'])) .'</h2>';
										$out .= '<p>'. do_shortcode(htmlspecialchars_decode($item['caption'])) .'</p>';
									$out .= '</li>';
								
									$i++;
								}
							
							$out .= '</ul>';
						
						$out .= '</div>';
				
					$out .= '</div>';
				
				$out .= '</div>';
					
			$out .= '</div>';
		
		echo $out;
		
		?>
		
		<script>
		(function ($) {
		    "use strict";
		    $(window).load(function(){
		      $('.flexslider').flexslider({
		        animation: "slide",
		        start: function(slider){
		          $('body').removeClass('loading');
		        }
		      });
		    });
		   
		})(jQuery)
		</script>
		
		<?php
		
	}
	
	/* AJAX add tab */
	function add_slide() {
		$nonce = $_POST['security'];
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$item = array(
			'title' => 'Title:',
			'caption' => 'Caption:',
			'image' => '',
		);
				if($count) {
			$this->tab($item, $count);
		} else {
			die(-1);
		}
		
		die();
	}
	
	function update($new_instance, $old_instance) {
		$new_instance = aq_recursive_sanitize($new_instance);
		return $new_instance;
	}
}
