<?php

/* Block */

class PXS_Contacts_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Contacts',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('PXS_Contacts_Block', $block_options);
	}
	
	function form($instance) {
	
		$defaults = array(
			'slogan' => '',
			'caption' => '',
			'address' => '',
			'tel' => '',
			'email' => '',
			'shortcode' => '',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		
		extract($instance);
		
		?>
		
		<div class="title">
			<h2><?php  _e('Heading', 'pxs'); ?></h2>
			<h4><?php  _e('Enter a slogan and caption for this block', 'pxs'); ?><span>Optional</span></h4>
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
			<h2><?php  _e('Details', 'pxs'); ?></h2>
			<h4><?php  _e('Enter your contact details below', 'pxs'); ?></h4>
		</div>
		
		<div class="space"></div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('address') ?>">
				<input id="<?php echo $this->get_field_id('address') ?>" class="input-full" type="text" value="<?php echo $address ?>" name="<?php echo $this->get_field_name('address') ?>" placeholder="<?php  _e('Address:', 'pxs'); ?>">
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('tel') ?>">
				<input id="<?php echo $this->get_field_id('tel') ?>" class="input-full" type="text" value="<?php echo $tel ?>" name="<?php echo $this->get_field_name('tel') ?>" placeholder="<?php  _e('Tel:', 'pxs'); ?>">
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('email') ?>">
				<input id="<?php echo $this->get_field_id('email') ?>" class="input-full" type="text" value="<?php echo $email ?>" name="<?php echo $this->get_field_name('email') ?>" placeholder="<?php  _e('Email:', 'pxs'); ?>">
			</label>
		</p>
		
		<div class="title">
			<h2><?php  _e('Shortcode', 'pxs'); ?></h2>
			<h4><?php  _e('Enter shortcode for contact form', 'pxs'); ?></h4>
			<h4><?php  _e('Ex. [contact-form-7 id="27" title="Contact form 1"]', 'pxs'); ?></h4>
		</div>
		
		<div class="space"></div>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('shortcode') ?>">
				<input id="<?php echo $this->get_field_id('shortcode') ?>" class="input-full" type="text" value="<?php echo $shortcode ?>" name="<?php echo $this->get_field_name('shortcode') ?>" placeholder="<?php  _e('Shortcode:', 'pxs'); ?>">
			</label>
		</p>
		
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		$out = '';
		
			$out .= '<div class="contacts">';
			
				$out .= '<div class="container">';
				
					$out .= '<div class="content aq_span4 aq-first">';
						$out .= '<h1>'.do_shortcode(htmlspecialchars_decode($slogan)).'</h1>';
						$out .= '<h3>'.do_shortcode(htmlspecialchars_decode($caption)).'</h3>';
						
						$out .= '<ul>';
							$out .= '<li><span>Address</span>'.do_shortcode(htmlspecialchars_decode($address)).'</li>';
							$out .= '<li><span>Tel</span>'.do_shortcode(htmlspecialchars_decode($tel)).'</li>';
							$out .= '<li><span>Email</span>'.do_shortcode(htmlspecialchars_decode($email)).'</li>';
						$out .= '</ul>';
						
					$out .= '</div>';
					
					$out .= '<div class="form aq_span8">';
						$out .=  wpautop(do_shortcode(htmlspecialchars_decode($shortcode)));
					$out .= '</div>';
					
				$out .= '</div>';
			
			$out .= '</div>';

		echo $out;

	}
	
}

?>