<?php

/* Landing: List */


class PXS_Landing_List_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Landing: List',
			'size' => 'span12',
		);
		
		//create the widget
		parent::__construct('PXS_Landing_List_Block', $block_options);
		
		//add ajax functions
		add_action('wp_ajax_aq_block_ldtab_add_new', array($this, 'add_ldlist'));
		
	}
	
	function form($instance) {
	
		global $op_layout_content;
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'image' => '',
			'layout' => '',
			'ldtabs' => array(
				1 => array(
					'icon' => 'fa-caret-right',
					'content' => 'Item'
				)
			)
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Heading', 'pxs'); ?></h2>
			<h4><?php  _e('Enter a slogan and caption for this block', 'pxs'); ?></h4>
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
			<h2><?php  _e('Feature Image', 'pxs'); ?></h2>
			<h4><?php  _e('Browse and upload a feature image', 'pxs'); ?></h4>
		</div>
		
		<p class="description full">
			<label for="<?php echo $this->get_field_id('image') ?>">
				<?php echo aq_field_upload('image', $block_id, $image) ?>
			</label>
		</p>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('List', 'pxs'); ?></h2>
			<h4><?php  _e('Add a new bullet item', 'pxs'); ?></h4>
		</div>
		
		<div class="description cf">
			<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
				<?php
				$ldtabs = is_array($ldtabs) ? $ldtabs : $defaults['ldtabs'];
				$count = 1;
				foreach($ldtabs as $ldtab) {	
					$this->tab($ldtab, $count);
					$count++;
				}
				?>
			</ul>
			<p></p>
			<a href="#" rel="ldtab" class="aq-sortable-add-new button x">Add New</a>
			<p></p>
		</div>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Settings', 'pxs'); ?></h2>
			<h4><?php  _e('Select a content layout', 'pxs'); ?></h4>
		</div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('layout') ?>">
				<?php echo aq_field_select('layout', $block_id, $op_layout_content, $layout) ?>
			</label>
		</p>
		
		<?php
	}
	
	function tab($ldtab = array(), $count = 0) {
			
		?>
		<li id="<?php echo $this->get_field_id('ldtabs') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
			
			<div class="sortable-head cf">
				<div class="sortable-title">
					<strong><?php echo $ldtab['content'] ?></strong>
				</div>
				<div class="sortable-handle">
					<a href="#">Open / Close</a>
				</div>
			</div>
			
			<div class="sortable-body">
				<div class="space"></div>
				<h3><?php  _e('Content', 'pxs'); ?></h3>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('ldtabs') ?>-<?php echo $count ?>-content">
						<textarea id="<?php echo $this->get_field_id('ldtabs') ?>-<?php echo $count ?>-content" class="textarea-full" placeholder="<?php  _e('Description:', 'pxs');?>" name="<?php echo $this->get_field_name('ldtabs') ?>[<?php echo $count ?>][content]" rows="4"><?php echo $ldtab['content'] ?></textarea>
					</label>
				</p>
				<div class="space"></div>
				<h3><?php  _e('Icon', 'pxs'); ?></h3>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('ldtabs') ?>-<?php echo $count ?>-icon">
						<input type="text" id="<?php echo $this->get_field_id('ldtabs') ?>-<?php echo $count ?>-icon" class="input-full" name="<?php echo $this->get_field_name('ldtabs') ?>[<?php echo $count ?>][icon]" value="<?php echo $ldtab['icon'] ?>" placeholder="<?php  _e('Icon: ex. fa-caret-right', 'pxs'); ?>" />
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
		
		$out = '';
		
			$out .= '<div class="landing list">';
			
				$out .= '<div class="container">';
					
					if ($layout == 'clir') {
					
						$out .= '<div class="content aq_span7 aq-first">';
							$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
							$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
							
							$out .= '<ul>';
								
								foreach($ldtabs as $ldtab) {
							
									$out .= '<li><i class="fa '.do_shortcode(htmlspecialchars_decode($ldtab['icon'])).'"></i> '.do_shortcode(htmlspecialchars_decode($ldtab['content'])).'</li>';
									
								}
							
							$out .= '</ul>';
							
						$out .= '</div>';
						
						$out .= '<div class="featured aq_span5">';
							$out .= '<img class="fullscreen" src="'.do_shortcode(htmlspecialchars_decode($image)).'" alt="'.do_shortcode(htmlspecialchars_decode($slogan)).'" />';
						$out .= '</div>';
					
					} else {
						
						$out .= '<div class="featured aq_span5 aq-first aleft">';
							$out .= '<img class="fullscreen" src="'.do_shortcode(htmlspecialchars_decode($image)).'" alt="'.do_shortcode(htmlspecialchars_decode($slogan)).'" />';
						$out .= '</div>';
						
						$out .= '<div class="content aq_span7">';
							$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
							$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
							
							$out .= '<ul>';
								
								foreach($ldtabs as $ldtab) {
							
									$out .= '<li><i class="fa '.do_shortcode(htmlspecialchars_decode($ldtab['icon'])).'"></i> '.do_shortcode(htmlspecialchars_decode($ldtab['content'])).'</li>';
									
								}
							
							$out .= '</ul>';
							
						$out .= '</div>';
						
					}
					
				$out .= '</div>';
			
			$out .= '</div>';

		echo $out;
		
	}
	
	/* AJAX add tab */
	function add_ldlist() {
		$nonce = $_POST['security'];
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$ldtab = array(
			'content' => 'Item',
			'icon' => 'fa-caret-right',
		);
		
		if($count) {
			$this->tab($ldtab, $count);
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
