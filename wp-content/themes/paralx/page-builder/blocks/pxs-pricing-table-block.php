<?php

/* Pricing Table Block */

class PXS_Pricing_Table_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Pricing Table',
			'size' => 'span12',
		);
		
		//create the widget
		parent::__construct('PXS_Pricing_Table_Block', $block_options);
		
		//add ajax functions
		add_action('wp_ajax_aq_block_tbinlinelist_add_new', array($this, 'add_table_inline'));
		
	}
	
	function form($instance) {
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'cols' => '',
			'currency' => '',
			'ptables' => array(
				1 => array(
					'title' => 'Title: ex. VPS550',
					'content' => 'Description:',
					'price' => 'Price:',
					'duration' => 'Duration: ex. month',
					'bullet_1' => 'Bullet #1:',
					'bullet_2' => 'Bullet #2:',
					'bullet_3' => 'Bullet #3:',
					'bullet_4' => 'Bullet #4:',
					'bullet_5' => 'Bullet #5:',
					'bullet_6' => 'Bullet #6:',
					'bullet_7' => 'Bullet #7:',
					'bullet_8' => 'Bullet #8:',
					'button_text' => 'Button Text:',
					'button_link' => 'Button Link: ex. http://example.com',
				)
			)
		);
		
		global $op_column_table;
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Heading', 'pxs'); ?></h2>
			<h4><?php  _e('Enter a slogan and caption for this block <span>Optional</span>', 'pxs'); ?></h4>
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
			<h2><?php  _e('Table', 'pxs'); ?></h2>
			<h4><?php  _e('Add a new table column into a grid', 'pxs'); ?></h4>
		</div>
		
		<div class="space"></div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('pricingtable') ?>">
			</label>
		</p>
		
		<div class="description cf">
			<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
				<?php
				$ptables = is_array($ptables) ? $ptables : $defaults['ptables'];
				$count = 1;
				foreach($ptables as $ptable) {	
					$this->tab($ptable, $count);
					$count++;
				}
				?>
			</ul>
			<p></p>
			<a href="#" rel="tbinlinelist" class="aq-sortable-add-new button">Add New</a>
			<p></p>
		</div>
		
		<div class="space"></div>
		
		<div class="title">
			<h2><?php  _e('Table Settings', 'pxs'); ?></h2>
			<h4><?php  _e('Select grid column size and enter a pricing currency symbol', 'pxs'); ?></h4>
		</div>
		
		<div class="space"></div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('cols') ?>">
				<?php echo aq_field_select('cols', $block_id, $op_column_table, $cols) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('currency') ?>">
				<input id="<?php echo $this->get_field_id('currency') ?>" class="input-full" type="text" value="<?php echo $currency ?>" name="<?php echo $this->get_field_name('currency') ?>" placeholder="<?php  _e('Currency Symbol: ex. $', 'pxs'); ?>">
			</label>
		</p>
		
		<?php
	}
	
	function tab($ptable = array(), $count = 0) {
			
		?>
		<li id="<?php echo $this->get_field_id('ptables') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
			
			<div class="sortable-head cf">
				<div class="sortable-title">
					<strong><?php echo $ptable['title'] ?></strong>
				</div>
				<div class="sortable-handle">
					<a href="#">Open / Close</a>
				</div>
			</div>
			
			<div class="sortable-body">
				<h3><?php  _e('Package Information', 'pxs'); ?></h3>
				
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-title">
						<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][title]" value="<?php echo $ptable['title'] ?>" />
					</label>
				</p>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-content">
						<textarea id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][content]" rows="3"><?php echo $ptable['content'] ?></textarea>
					</label>
				</p>
				
				<div class="space"></div>
				<h3><?php  _e('Pricing', 'pxs'); ?></h3>
				
				<div class="duo">
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-price">
							<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-price" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][price]" value="<?php echo $ptable['price'] ?>" />
						</label>
					</p>
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-duration">
							<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-duration" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][duration]" value="<?php echo $ptable['duration'] ?>" />
						</label>
					</p>
				</div>
				
				<div class="space"></div>
				<h3><?php  _e('Order', 'pxs'); ?></h3>
				
				<div class="duo">
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-button_text">
							<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-button_text" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][button_text]" value="<?php echo $ptable['button_text'] ?>" />
						</label>
					</p>
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-button_link">
							<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-button_link" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][button_link]" value="<?php echo $ptable['button_link'] ?>" />
						</label>
					</p>
				</div>
				
				<div class="space"></div>
				
				<div class="accordion">
					<h3>Data Rows <span>Open / Close</span></h3>
					<div>
						<p class="tab-desc description">
							<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_1">
								<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_1" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][bullet_1]" value="<?php echo $ptable['bullet_1'] ?>" />
							</label>
						</p>
						<p class="tab-desc description">
							<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_2">
								<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_2" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][bullet_2]" value="<?php echo $ptable['bullet_2'] ?>" />
							</label>
						</p>
						<p class="tab-desc description">
							<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_3">
								<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_3" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][bullet_3]" value="<?php echo $ptable['bullet_3'] ?>" />
							</label>
						</p>
						<p class="tab-desc description">
							<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_4">
								<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_4" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][bullet_4]" value="<?php echo $ptable['bullet_4'] ?>" />
							</label>
						</p>
						<p class="tab-desc description">
							<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_5">
								<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_5" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][bullet_5]" value="<?php echo $ptable['bullet_5'] ?>" />
							</label>
						</p>
						<p class="tab-desc description">
							<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_6">
								<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_6" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][bullet_6]" value="<?php echo $ptable['bullet_6'] ?>" />
							</label>
						</p>
						<p class="tab-desc description">
							<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_7">
								<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_7" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][bullet_7]" value="<?php echo $ptable['bullet_7'] ?>" />
							</label>
						</p>
						<p class="tab-desc description">
							<label for="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_8">
								<input type="text" id="<?php echo $this->get_field_id('ptables') ?>-<?php echo $count ?>-bullet_8" class="input-full" name="<?php echo $this->get_field_name('ptables') ?>[<?php echo $count ?>][bullet_8]" value="<?php echo $ptable['bullet_8'] ?>" />
							</label>
						</p>
					</div>
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
		
			$out .= '<div class="ptable">';
				
				$out .= '<div class="container center">';
				
					$out .= '<div class="content">';
					
						if ($slogan) {
							$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
							$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
						}
						
						$out .= '<div class="items">';
					
							$i = 1;
							foreach($ptables as $ptable) {
							
										$out .= '<div class="item tb-'.$i.' '.$cols.'">';
											$out .= '<h2>'. do_shortcode(htmlspecialchars_decode($ptable['title'])) .'</h2>';
											$out .= '<h4>'. do_shortcode(htmlspecialchars_decode($currency)) .''. do_shortcode(htmlspecialchars_decode($ptable['price'])) .' <span>/ '. do_shortcode(htmlspecialchars_decode($ptable['duration'])) .'</span></h4>';
											$out .= '<span><i class="fa fa-angle-double-down"></i></span>';
											$out .= '<p>'.do_shortcode(htmlspecialchars_decode($ptable['content'])).'</p>';
											$out .= '<ul class="bullets">';	
												if($ptable['bullet_1']) { $out .= '<li>'.do_shortcode(htmlspecialchars_decode($ptable['bullet_1'])).'</li>'; }
												if($ptable['bullet_2']) { $out .= '<li>'.do_shortcode(htmlspecialchars_decode($ptable['bullet_2'])).'</li>'; }
												if($ptable['bullet_3']) { $out .= '<li>'.do_shortcode(htmlspecialchars_decode($ptable['bullet_3'])).'</li>'; }
												if($ptable['bullet_4']) { $out .= '<li>'.do_shortcode(htmlspecialchars_decode($ptable['bullet_4'])).'</li>'; }
												if($ptable['bullet_5']) { $out .= '<li>'.do_shortcode(htmlspecialchars_decode($ptable['bullet_5'])).'</li>'; }
												if($ptable['bullet_6']) { $out .= '<li>'.do_shortcode(htmlspecialchars_decode($ptable['bullet_6'])).'</li>'; }
												if($ptable['bullet_7']) { $out .= '<li>'.do_shortcode(htmlspecialchars_decode($ptable['bullet_7'])).'</li>'; }
												if($ptable['bullet_8']) { $out .= '<li>'.do_shortcode(htmlspecialchars_decode($ptable['bullet_8'])).'</li>'; }
											$out .= '</ul>';
											$out .= '<a class="button" href="'.do_shortcode(htmlspecialchars_decode($ptable['button_link'])).'"><i class="fa fa-search"></i></a>';
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
	function add_table_inline() {
		$nonce = $_POST['security'];
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$ptable = array(
			'title' => 'Title: ex. VPS550',
			'content' => 'Description:',
			'price' => 'Price:',
			'duration' => 'Duration: ex. month',
			'bullet_1' => 'Bullet #1:',
			'bullet_2' => 'Bullet #2:',
			'bullet_3' => 'Bullet #3:',
			'bullet_4' => 'Bullet #4:',
			'bullet_5' => 'Bullet #5:',
			'bullet_6' => 'Bullet #6:',
			'bullet_7' => 'Bullet #7:',
			'bullet_8' => 'Bullet #8:',
			'button_text' => 'Button Text:',
			'button_link' => 'Button Link: ex. http://example.com',
		);
		
		if($count) {
			$this->tab($ptable, $count);
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

