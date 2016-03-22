<?php

/* =GENERAL
-------------------------------------------------------------- */

$of_options[] = array( 
					"name" => __('General', 'pxs'),
					"type" => "heading", 
				);
				
$of_options[] = array( 	
					"name" => "Hello there!",
					"desc" => "",
					"id"   => "introduction",
					"std"  => '<h5>'.__('General Options', 'pxs').'</h5>'.'<p>'.__('Click <b>\'Edit\'</b> on any options to show more settings. If have you encountered any issues or bugs, please do not hesitate to contact our <a href="mailto:support@pixlstore.com">Support Team</a>.</b>', 'pxs').'</p>',
					"icon" => true,
					"type" => "info"
				);
				
$of_options[] = array( 	
					"name" => '<br/>'.__('Logo', 'pxs'),
					"desc" => __('Edit logo settings', 'pxs'),
					"id" 		=> "switch_logo",
					"on" 		=> "Edit",
					"off" 		=> "Hide Options",
					"std" 		=> 0,
					"folds"		=> 1,
					"type" 		=> "switch"
				);
					
$of_options[] = array(   
					"name" => '<h4>'.__('Use text as logo', 'pxs').'</h4>',
					"desc" => __('Use text as logo instead of an image', 'pxs'),
					"id"   => "pxs_logo_text",
					"std"  => 1,
					"on"   => "Yes",
					"off"  => "No",
					"fold" => "switch_logo",
					"type" => "switch"
        		);

$of_options[] = array( 
					"name" => '<h4>'.__('Upload Logo', 'pxs').'</h4>',
					"desc" => __('Upload a standard logo.', 'pxs'),
					"id"   => "pxs_logo",
					"fold" => "switch_logo",
					"type" => "upload" 
				);

$of_options[] = array( 
					"name" => '<h4>'.__('Upload Retina Logo', 'pxs').'</h4>',
					"desc" => __('Upload a retina logo. The logo size should be 2x bigger than main logo.', 'pxs'),
					"id"   => "pxs_logo_retina",
					"fold" => "switch_logo",
					"type" => "upload" 
				);
				
$of_options[] = array( 	
					"name" => '<br/>'.__('Favicons', 'pxs'),
					"desc" => __('Edit Favicons and Apple iPhone / iPad icons for your website', 'pxs'),
					"id" 		=> "switch_favicons",
					"on" 		=> "Edit",
					"off" 		=> "Hide Options",
					"std" 		=> 0,
					"folds"		=> 1,
					"type" 		=> "switch"
				);
				
$of_options[] = array( 
					"name" => '<h4>'.__('Favicon', 'pxs').'</h4>',
					"desc" => __('Upload a 16px x 16px PNG or GIF image for website\'s favicon.', 'pxs'),
					"id"   => "pxs_favicon",
					"std"  => "",
					"fold" => "switch_favicons",
					"type" => "upload"
				);

$of_options[] = array( 
					"name" => '<h4>'.__('Apple iPhone', 'pxs').'</h4>',
					"desc" => __('Upload an icon for Apple iPhone (57px x 57px)', 'pxs'),
					"id"   => "pxs_iphone_icon",
					"std"  => "",
					"fold" => "switch_favicons",
					"type" => "upload"
				);

$of_options[] = array( 
					"name" => '<h4>'.__('Apple iPhone Retina', 'pxs').'</h4>',
					"desc" => __('Upload an icon for Apple iPhone Retina Version (114px x 114px)', 'pxs'),
					"id"   => "pxs_iphone_icon_retina",
					"std"  => "",
					"fold" => "switch_favicons",
					"type" => "upload"
				);

$of_options[] = array( 
					"name" => '<h4>'.__('Apple iPad', 'pxs').'</h4>',
					"desc" => __('Upload an icon for Apple iPhone (72px x 72px)', 'pxs'),
					"id"   => "pxs_ipad_icon",
					"std"  => "",
					"fold" => "switch_favicons",
					"type" => "upload"
				);

$of_options[] = array( 
					"name" => '<h4>'.__('Apple iPad Retina', 'pxs').'</h4>',
					"desc" => __('Upload an icon for Apple iPad Retina Version (144px x 144px)', 'pxs'),
					"id"   => "pxs_ipad_icon_retina",
					"std"  => "",
					"fold" => "switch_favicons",
					"type" => "upload"
				);
				
$of_options[] = array( 	
					"name" => '<br/>'.__('Google Font', 'pxs'),
					"desc" 		=> "Select a custom font for this theme",
					"id" 		=> "g_select",
					"std" 		=> "Open Sans",
					"type" 		=> "select_google_font",
					"preview" 	=> array(
									"text" => "This is my preview text!", //this is the text from preview box
									"size" => "30px" //this is the text size from preview box
					),
					"options" 	=> $gfont
				);
				
// Background Images				
$of_options[] = array( 	
					"name" => '<br/>'.__('Background Images', 'pxs'),
					"desc" => __('Show / Hide options' , 'pxs'),
					"id"   => "switch_bg",
					"on"   => "Edit",
					"off"  => "Hide Options",
					"std"  => 0,
					"folds" => 1,
					"type" => "switch"
				);
				
$of_options[] = array(
					"name" => '<h4>'.__('Page Header', 'pxs').'</h4>',
					"desc" => __('Upload a background image' , 'pxs'),
					"id"   => "pxs_gen_bg_pageheader",
					"fold" => "switch_bg",
					"type" => "upload"
				);
				
// Google Analytics
$of_options[] = array( 	
					"name" => '<br/>'.__('Google Analytics', 'pxs'),
					"desc" => __('Edit Google Analytics settings', 'pxs'),
					"id" 		=> "switch_ganalytics",
					"on" 		=> "Edit",
					"off" 		=> "Hide Options",
					"std" 		=> 0,
					"folds"		=> 1,
					"type" 		=> "switch"
				);
				
$of_options[] = array( 
					"name" => '<h4>'.__('Tracking Code', 'pxs').'</h4>',
					"desc" => __('Paste your Google Analytics or any other tracking code here. The tracking code is added to the theme\'s footer. The format should be as following: <br><br>&lt;script type=&quot;text/javascript&quot;&gt;<br> ... <br>&lt;/script&gt;', 'pxs'),
					"id"   => "pxs_tracking_code",
					"std"  => "",
					"fold" => "switch_ganalytics",
					"type" => "textarea" 
				);
				
// Custom Javascript				
$of_options[] = array( 	
					"name" => '<br/>'.__('Custom Javascript', 'pxs'),
					"desc" => __('Show / Hide options' , 'pxs'),
					"id" 		=> "swtich_js",
					"on" 		=> "Edit",
					"off" 		=> "Hide Options",
					"std" 		=> 0,
					"folds"		=> 1,
					"type" 		=> "switch"
				);
				
$of_options[] = array( 
					"name" => '<h4>'.__('Code', 'pxs').'</h4>',
					"desc" => __('Enter your custom Javascript code here. The code will be added to theme\'s footer. The format should be as following: <br><br>&lt;script type=&quot;text/javascript&quot;&gt;<br> ... <br>&lt;/script&gt;', 'pxs'),
					"id"   => "pxs_gen_js",
					"std"  => "",
					"fold" => "swtich_js",
					"type" => "textarea" 
				);