<?php

/* Paralax: Quotes Block */

class PXS_Paralax_Quotes_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Paralax: Quotes',
			'size' => 'span12',
		);
		
		//create the widget
		parent::__construct('PXS_Paralax_Quotes_Block', $block_options);
		
		//add ajax functions
		add_action('wp_ajax_aq_block_quotelist_add_new', array($this, 'add_quote'));
		
	}
	
	function form($instance) {
	
		$defaults = array(
			'tint_opacity' => '',
			'background' => '',
			'columns' => '',
			'quotes' => array(
				1 => array(
					'cite' => 'Cite: ex. John Doe, United States',
					'content' => 'Quote:',
					'image' => '',
				)
			)
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		
		<div class="block-settings-title">
			<h4><?php  _e('Add testimonials into a list', 'pxs'); ?></h4>
		</div>
		
		<div class="description cf">
			<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
				<?php
				$quotes = is_array($quotes) ? $quotes : $defaults['quotes'];
				$count = 1;
				foreach($quotes as $quote) {	
					$this->tab($quote, $count);
					$count++;
				}
				?>
			</ul>
			<p></p>
			<a href="#" rel="quotelist" class="aq-sortable-add-new button">Add New</a>
			<p></p>
		</div>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Settings', 'pxs'); ?></h2>
			<h4><?php  _e('Upload a background image, set tint color and opacity', 'pxs'); ?></h4>
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
	
	function tab($quote = array(), $count = 0) {
			
		?>
		<li id="<?php echo $this->get_field_id('quotes') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
			
			<div class="sortable-head cf">
				<div class="sortable-title">
					<strong><?php echo $quote['cite'] ?></strong>
				</div>
				<div class="sortable-handle">
					<a href="#">Open / Close</a>
				</div>
			</div>
			
			<div class="sortable-body">
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('quotes') ?>-<?php echo $count ?>-content">
						<textarea id="<?php echo $this->get_field_id('quotes') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('quotes') ?>[<?php echo $count ?>][content]" rows="4" placeholder="<?php  _e('Quote:', 'pxs'); ?>"><?php echo $quote['content'] ?></textarea>
					</label>
				</p>
				<div class="space"></div>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('quotes') ?>-<?php echo $count ?>-cite">
						<input type="text" id="<?php echo $this->get_field_id('quotes') ?>-<?php echo $count ?>-cite" class="input-full" name="<?php echo $this->get_field_name('quotes') ?>[<?php echo $count ?>][cite]" value="<?php echo $quote['cite'] ?>" />
					</label>
				</p>
				<div class="space"></div>
				<div class="tab-desc description">
					<label for="<?php echo $this->get_field_id('quotes') ?>-<?php echo $count ?>-image">
						<h4 class="label"><?php  _e('Upload an image:', 'pxs'); ?></h4>
						<input type="text" id="<?php echo $this->get_field_id('quotes') ?>-<?php echo $count ?>-image" class="input-full input-upload" value="<?php echo $quote['image'] ?>" name="<?php echo $this->get_field_name('quotes') ?>[<?php echo $count ?>][image]">
						<a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
					</label>
				</div>
				<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
			</div>
			
		</li>
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		$ccss = 'ccss-' . rand(1, 99999);
		
		$out = '';
		
		$out .= '<div class="paralax-quotes '.$ccss.'">';
		
			$out .= '<div class="container">';
				
				$out .= '<div class="content">';
					
					$i = 1;
					foreach($quotes as $quote) {
					
						$out .= '<blockquote>';
						
							$out .= '<div class="aq_span4 aq-first">';
								$out .= '<img src="'.do_shortcode(htmlspecialchars_decode($quote['image'])).'" alt="'.do_shortcode(htmlspecialchars_decode($quote['content'])).'"/>';
							$out .= '</div>';
							
							$out .= '<div class="quote aq_span8">';
									$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($quote['content'])).'</h1>';
									$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($quote['cite'])).'</h3>';
							$out .= '</div>';
							
						$out .= '</blockquote>';
						
					}
					
				$out .= '</div>';
				
				$out .= '<div class="tint '.$ccss.'"></div>';
			
			$out .= '</div>';
			
		$out .= '</div>';
		
		echo $out;
		
		$custom_css = " .paralax-quotes .tint.$ccss {
							opacity: $tint_opacity!important;
						 }
						 
						.paralax-quotes.$ccss {
							background: url($background) no-repeat fixed;
							-webkit-background-size: cover;
							-moz-background-size: cover;
							-o-background-size: cover;
							background-size: cover;
						 }";
						 
		wp_enqueue_style('paralx-custom-css');
        wp_add_inline_style( 'paralx-custom-css', $custom_css );
		
		?>
		
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$('blockquote').quovolver();
			});
		</script>
		
		<?php
		
	}
	
	/* AJAX add tab */
	function add_quote() {
		$nonce = $_POST['security'];
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$quote = array(
			'cite' => 'Cite: ex. John Doe, United States',
			'content' => 'Quote:',
			'image' => '',
		);
		
		if($count) {
			$this->tab($quote, $count);
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
