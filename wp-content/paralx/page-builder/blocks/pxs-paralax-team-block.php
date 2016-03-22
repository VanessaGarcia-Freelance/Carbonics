<?php

/* Paralax: Team */


class PXS_Paralax_Team_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Paralax: Team',
			'size' => 'span12',
		);
		
		//create the widget
		parent::__construct('PXS_Paralax_Team_Block', $block_options);
		
		//add ajax functions
		add_action('wp_ajax_aq_block_team_add_new', array($this, 'add_team'));
		
	}
	
	function form($instance) {
	
		global $op_column_grid;
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'tint_opacity' => '',
			'background' => '',
			'columns' => '',
			'teams' => array(
				1 => array(
					'name' => 'Name: ex. John Doe',
					'content' => 'Enter a short description',
					'twitter' => 'Link: ex. http://example.com',
					'facebook' => 'Link: ex. http://example.com',
					'gplus' => 'Link: ex. http://example.com',
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
			<h2><?php  _e('Team', 'pxs'); ?></h2>
			<h4><?php  _e('Add a new team member', 'pxs'); ?></h4>
		</div>
		
		<div class="description cf">
			<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
				<?php
				$teams = is_array($teams) ? $teams : $defaults['teams'];
				$count = 1;
				foreach($teams as $team) {	
					$this->tab($team, $count);
					$count++;
				}
				?>
			</ul>
			<p></p>
			<a href="#" rel="team" class="aq-sortable-add-new button x">Add New</a>
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
		
		<div class="space"></div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('columns') ?>">
				<?php echo aq_field_select('columns', $block_id, $op_column_grid, $columns) ?>
			</label>
		</p>
		
		<?php
	}
	
	function tab($team = array(), $count = 0) {
			
		?>
		<li id="<?php echo $this->get_field_id('teams') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
			
			<div class="sortable-head cf">
				<div class="sortable-title">
					<strong><?php echo $team['name'] ?></strong>
				</div>
				<div class="sortable-handle">
					<a href="#">Open / Close</a>
				</div>
			</div>
			
			<div class="sortable-body">
				<div class="space"></div>
				<h3><?php  _e('Full Name', 'pxs'); ?></h3>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-name">
						<input type="text" id="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-name" class="input-full" name="<?php echo $this->get_field_name('teams') ?>[<?php echo $count ?>][name]" value="<?php echo $team['name'] ?>" placeholder="<?php  _e('Name: ex. John Doe', 'pxs'); ?>" />
					</label>
				</p>
				<div class="space"></div>
				<h3><?php  _e('Description', 'pxs'); ?></h3>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-content">
						<textarea id="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-content" class="textarea-full" placeholder="<?php  _e('Description:', 'pxs');?>" name="<?php echo $this->get_field_name('teams') ?>[<?php echo $count ?>][content]" rows="4"><?php echo $team['content'] ?></textarea>
					</label>
				</p>
				<div class="space"></div>
				<h3><?php  _e('Upload Photo', 'pxs'); ?></h3>
				<div class="tab-desc description">
					<label for="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-image">
						<input type="text" id="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-image" class="input-full input-upload" value="<?php echo $team['image'] ?>" name="<?php echo $this->get_field_name('teams') ?>[<?php echo $count ?>][image]">
						<a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
					</label>
				</div>
				<div class="space"></div>
				<div class="duo">
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-twitter">
							<input type="text" id="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-twitter" class="input-full" name="<?php echo $this->get_field_name('teams') ?>[<?php echo $count ?>][twitter]" value="<?php echo $team['twitter'] ?>" />
						</label>
					</p>
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-facebook">
							<input type="text" id="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-facebook" class="input-full" name="<?php echo $this->get_field_name('teams') ?>[<?php echo $count ?>][facebook]" value="<?php echo $team['facebook'] ?>" />
						</label>
					</p>
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-gplus">
							<input type="text" id="<?php echo $this->get_field_id('teams') ?>-<?php echo $count ?>-gplus" class="input-full" name="<?php echo $this->get_field_name('teams') ?>[<?php echo $count ?>][gplus]" value="<?php echo $team['gplus'] ?>" />
						</label>
					</p>
				</div>
				<div class="space"></div>
				<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
			</div>
			
		</li>
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		$ccss = 'ccss-' . rand(1, 99999);
		
		$out = '';
		
			$out .= '<div class="paralax-team '.$ccss.'">';
			
				$out .= '<div class="container">';
					
					$out .= '<div class="content">';
						
						$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
						$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
						
						$out .= '<div class="items">';
						
							$i = 1;
							
							foreach($teams as $team) {
							
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
									
										$out .= '<img src="'.do_shortcode(htmlspecialchars_decode($team['image'])).'" alt="'.do_shortcode(htmlspecialchars_decode($team['content'])).'"/>';
										
										$out .= '<div class="info">';
											$out .= '<h2>'.do_shortcode(htmlspecialchars_decode($team['name'])).'</h2>';
											$out .= '<p>'.do_shortcode(htmlspecialchars_decode($team['content'])).'</p>';
											
											$out .= '<div class="social">';
												if ($team['twitter']) { $out .= '<a href="'.do_shortcode(htmlspecialchars_decode($team['twitter'])).'"><i class="fa fa-twitter"></i></a>'; }
												if ($team['facebook']) { $out .= '<a href="'.do_shortcode(htmlspecialchars_decode($team['facebook'])).'"><i class="fa fa-facebook"></i></a>'; }
												if ($team['gplus']) { $out .= '<a href="'.do_shortcode(htmlspecialchars_decode($team['gplus'])).'"><i class="fa fa-google-plus"></i></a>'; }
											$out .= '</div>';
										$out .= '</div>';
										
									$out .= '</div>';
								$out .= '</div>';
								
								$i++;
							}
						$out .= '</div>';
						
					$out .= '</div>';
					
					$out .= '<div class="tint '.$ccss.'"></div>';
					
				$out .= '</div>';
			
			$out .= '</div>';

		echo $out;
		
		$custom_css = " .paralax-team .tint.$ccss {
							opacity: $tint_opacity!important;
						 }
						 
						.paralax-team.$ccss {
							background: url($background) no-repeat fixed;
							-webkit-background-size: cover;
							-moz-background-size: cover;
							-o-background-size: cover;
							background-size: cover;
						 }";
						 
		wp_enqueue_style('paralx-custom-css');
        wp_add_inline_style( 'paralx-custom-css', $custom_css );
		
	}
	
	/* AJAX add tab */
	function add_team() {
		$nonce = $_POST['security'];
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$team = array(
			'name' => 'Name: ex. John Doe',
			'content' => 'Enter a short description',
			'twitter' => 'Link: ex. http://example.com',
			'facebook' => 'Link: ex. http://example.com',
			'gplus' => 'Link: ex. http://example.com',
			'image' => '',
		);
		
		if($count) {
			$this->tab($team, $count);
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
