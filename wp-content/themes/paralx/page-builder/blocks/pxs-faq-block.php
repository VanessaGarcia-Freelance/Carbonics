<?php

/* FAQ Block */

class PXS_Faq_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'FAQ',
			'size' => 'span12',
		);
		
		//create the widget
		parent::__construct('PXS_Faq_Block', $block_options);
		
		//add ajax functions
		add_action('wp_ajax_aq_block_faqtabs_add_new', array($this, 'add_faq'));
		
	}
	
	function form($instance) {
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'faqs' => array(
				1 => array(
					'title' => 'Title:',
					'content' => 'Content:',
				)
			)
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Heading', 'pxs'); ?></h2>
			<h4><?php  _e('Enter a slogan and caption for this block', 'pxs'); ?><span>Optional</span></h4>
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
			<h2><?php  _e('Items', 'pxs'); ?></h2>
			<h4><?php  _e('Add a new tab / accordion / toggle item', 'pxs'); ?></h4>
		</div>
		
		<div class="description cf">
			<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
				<?php
				
				$faqs = is_array($faqs) ? $faqs : $defaults['faqs'];
				$count = 1;
				foreach($faqs as $faq) {	
					$this->tab($faq, $count);
					$count++;
				}
				?>
			</ul>
			<p></p>
			<a href="#" rel="faqtabs" class="aq-sortable-add-new button">Add New</a>
			<p></p>
		</div>
				
		<?php
	}
	
	function tab($faq = array(), $count = 0) {
			
		?>
		<li id="<?php echo $this->get_field_id('faqs') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
			
			<div class="sortable-head cf">
				<div class="sortable-title">
					<strong><?php echo $faq['title'] ?></strong>
				</div>
				<div class="sortable-handle">
					<a href="#">Open / Close</a>
				</div>
			</div>
			
			<div class="sortable-body">
				<div class="space"></div>
				<h3><?php  _e('Title', 'pxs'); ?></h3>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('faqs') ?>-<?php echo $count ?>-title">
						<input type="text" id="<?php echo $this->get_field_id('faqs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('faqs') ?>[<?php echo $count ?>][title]" value="<?php echo $faq['title'] ?>" />
					</label>
				</p>
				<div class="space"></div>
				<h3><?php  _e('Content', 'pxs'); ?></h3>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('faqs') ?>-<?php echo $count ?>-content">
						<textarea id="<?php echo $this->get_field_id('faqs') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('faqs') ?>[<?php echo $count ?>][content]" rows="10"><?php echo $faq['content'] ?></textarea>
					</label>
				</p>
				<div class="space"></div>
				<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
			</div>
			
		</li>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		wp_enqueue_script('jquery-ui-tabs');
		
		$out = '';
		
			$out .= '<div class="faq">';
			
				$out .= '<div class="container">';
				
					$out .= '<div class="content aq_span12 aq-first center">';
					
						if($slogan) {
							$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
							$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';	
						}
						
						$out .= '<div class="items aq_span12 aq-first left">';
			
							$count = count($faqs);
							$i = 1;
							
							$out .= '<div id="aq_block_accordion_wrapper_'.rand(1,100).'" class="aq_block_accordion_wrapper">';
							
							foreach( $faqs as $faq ){
								
								$open = $i == 1 ? 'open' : 'close';
								
								$child = '';
								if($i == 1) $child = 'first-child';
								if($i == $count) $child = 'last-child';
								$i++;
								
								$out  .= '<div class="aq_block_accordion '.$child.'">';
									$out .= '<h2 class="tab-head">'. $faq['title'] .'</h2>';
									$out .= '<div class="arrow"></div>';
									$out .= '<div class="tab-body '.$open.' cf">';
										$out .= wpautop(do_shortcode(htmlspecialchars_decode($faq['content'])));
									$out .= '</div>';
								$out .= '</div>';
							}
							
							$out .= '</div>';
						
						$out .= '</div>';
						
					$out .= '</div>';
					
				$out .= '</div>';
			
			$out .= '</div>';

		echo $out;
			
	}
	
	/* AJAX add tab */
	function add_faq() {
		$nonce = $_POST['security'];
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$faq = array(
			'title' => 'Title:',
			'content' => 'Content:',
		);
		
		if($count) {
			$this->tab($faq, $count);
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
