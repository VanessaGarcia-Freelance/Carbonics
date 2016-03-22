<?php

/* =FOOTER
-------------------------------------------------------------- */

$of_options[] = array( 
					"name" => __('Footer', 'pxs'),
					"type" => "heading",
				);
								
$of_options[] = array( 
					"name" => '<br/>'.__('About', 'pxs'),
					"desc" => __('Enter a short description about your company' , 'pxs'),
					"id"   => "pxs_footer_about",
					"std"  => "Enter a short description about your company",
					"type" => "textarea"
				);
				
$of_options[] = array( 
					"name" => '<br/>'.__('Copyright', 'pxs'),
					"desc" => __('Enter copyright text' , 'pxs'),
					"id"   => "pxs_footer_copyright",
					"std"  => "Copyright of Paralx &copy; 2014. All rights reserved.",
					"type" => "textarea"
				);
				
$of_options[] = array( 	
					"name" => '<h4>'.__('Disclaimer', 'pxs').'</h4>',
					"desc" => __('Enter a disclaimer' , 'pxs'),
					"id"   => "pxs_footer_disclaimer",
					"std"  => "Need help? Call us at 800 343 4393",
					"type" => "textarea"
				);