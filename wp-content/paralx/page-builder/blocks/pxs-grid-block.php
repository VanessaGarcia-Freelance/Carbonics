<?php

/* Grid */


class PXS_Grid_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Grid',
			'size' => 'span12',
		);
		
		//create the widget
		parent::__construct('PXS_Grid_Block', $block_options);
		
		//add ajax functions
		add_action('wp_ajax_aq_block_ldtab_add_new', array($this, 'add_gridlandscape'));
		
	}
	
	function form($instance) {
	
		global $op_column_grid, $op_text_align;
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'columns' => '2col',
			'align' => 'ta-center',
			'ldtabs' => array(
				1 => array(
					'title' => 'Title',
					'icon' => 'fa-caret-right',
					'content' => 'Item',
					'image' => '',
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
			<h4><?php  _e('Upload a background image, set tint color and opacity', 'pxs'); ?></h4>
		</div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('columns') ?>">
				<?php echo aq_field_select('columns', $block_id, $op_column_grid, $columns) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('align') ?>">
				<?php echo aq_field_select('align', $block_id, $op_text_align, $align) ?>
			</label>
		</p>
		
		<?php
	}
	
	function tab($ldtab = array(), $count = 0) {
			
		?>
		<li id="<?php echo $this->get_field_id('ldtabs') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
			
			<div class="sortable-head cf">
				<div class="sortable-title">
					<strong><?php echo $ldtab['title'] ?></strong>
				</div>
				<div class="sortable-handle">
					<a href="#">Open / Close</a>
				</div>
			</div>
			
			<div class="sortable-body">
				<div class="space"></div>
				<h3><?php  _e('Title', 'pxs'); ?></h3>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('ldtabs') ?>-<?php echo $count ?>-title">
						<input type="text" id="<?php echo $this->get_field_id('ldtabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('ldtabs') ?>[<?php echo $count ?>][title]" value="<?php echo $ldtab['title'] ?>" placeholder="<?php  _e('Title: ', 'pxs'); ?>" />
					</label>
				</p>
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
				<h3><?php  _e('Upload Image', 'pxs'); ?></h3>
				<div class="tab-desc description">
					<label for="<?php echo $this->get_field_id('ldtabs') ?>-<?php echo $count ?>-image">
						<input type="text" id="<?php echo $this->get_field_id('ldtabs') ?>-<?php echo $count ?>-image" class="input-full input-upload" value="<?php echo $ldtab['image'] ?>" name="<?php echo $this->get_field_name('ldtabs') ?>[<?php echo $count ?>][image]">
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
		
			$out .= '<div class="grid">';
			
				$out .= '<div class="container '.$align.'">';
					
					$out .= '<div class="content aq_span12 aq-first">';
						
						if ($slogan) {
							$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
							$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';	
						}
						
						$out .= '<div class="items">';
						
							$i = 1;
							
							foreach($ldtabs as $ldtab) {
							
								if ($columns == '2col') {
									if ($i % 2 != 0) {
										$out .= '<div class="aq_span6 aq-first">';
									} else {
										$out .= '<div class="aq_span6">';
									}
								} else if ($columns == '3col') {
									if ($i % 3 == 1) {
										$out .= '<div class="aq_span4 aq-first">';
									} else {
										$out .= '<div class="aq_span4">';
									}
								} else if ($columns == '4col') {
									if ($i % 4 == 1) {
										$out .= '<div class="aq_span3 aq-first">';
									} else {
										$out .= '<div class="aq_span3">';
									}
								}
						
									$out .= '<div class="item">';
									
										if ($ldtab['image']) {
											$out .= '<img src="'.do_shortcode(htmlspecialchars_decode($ldtab['image'])).'" alt="'.do_shortcode(htmlspecialchars_decode($ldtab['content'])).'" />';
										} else {
											$out .= '<i class="fa '.do_shortcode(htmlspecialchars_decode($ldtab['icon'])).'"></i>';	
										}
										
										$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($ldtab['title'])).'</h1>';
										$out .= '<p>'.do_shortcode(htmlspecialchars_decode($ldtab['content'])).'</p>';
										
									$out .= '</div>';
								$out .= '</div>';
								
								$i++;
							}
	
						$out .= '</div>';
						
					$out .= '</div>';
										
				$out .= '</div>';
			
			$out .= '</div>';

		echo $out;
		
	}
	
	/* AJAX add tab */
	function add_gridlandscape() {
		$nonce = $_POST['security'];
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$ldtab = array(
			'title' => 'Title',
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
