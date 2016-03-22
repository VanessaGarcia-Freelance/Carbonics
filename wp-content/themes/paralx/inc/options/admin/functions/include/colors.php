<?php

/* =GENERAL
-------------------------------------------------------------- */

$of_options[] = array( 
					"name" => __('Colors', 'pxs'),
					"type" => "heading", 
				);
				
$of_options[] = array( 	
					"name" => "Hello there!",
					"desc" => "",
					"id"   => "introduction",
					"std"  => '<h5>'.__('Color Options', 'pxs').'</h5>'.'<p>'.__('Customise the theme colors according to your own preference.', 'pxs').'</p>',
					"type" => "info"
				);
				
$of_options[] = array(
					"name" => '<h4>'.__('Theme Color', 'pxs').'</h4>',
					"desc" => __('Choose a custom theme color' , 'pxs'),
					"id"   => "pxs_clr_accent",
					"std"  => "#3CD3AD",
					"type" => "color"
				);
				
$of_options[] = array(
					"name" => '<h4>'.__('Header', 'pxs').'</h4>',
					"desc" => __('Choose a background color' , 'pxs'),
					"id"   => "pxs_clr_header",
					"std"  => "#252422",
					"type" => "color"
				);
				
$of_options[] = array(
					"name" => '<h4>'.__('Footer', 'pxs').'</h4>',
					"desc" => __('Choose a background color' , 'pxs'),
					"id"   => "pxs_clr_footer",
					"std"  => "#252422",
					"type" => "color"
				);
				
$of_options[] = array(
					"name" => '<h4>'.__('Menu', 'pxs').'</h4>',
					"desc" => __('Choose a background color' , 'pxs'),
					"id"   => "pxs_clr_menu",
					"std"  => "#252422",
					"type" => "color"
				);