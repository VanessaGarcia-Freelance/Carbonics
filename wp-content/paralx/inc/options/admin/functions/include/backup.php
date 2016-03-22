<?php

/* =BACKUP
-------------------------------------------------------------- */

$of_options[] = array( 
					"name" => __('Backup' , 'pxs'),
					"type" => "heading",
				);
                    
					
$of_options[] = array( 
					"name" => __('Backup and Restore Options' , 'pxs'),
					"id"   => "of_backup",
					"type" => "backup",
					"std"  => "",
					"desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.' , 'pxs'),
				);
					
$of_options[] = array( 
					"name" => __('Transfer Theme Options Data' , 'pxs'),
					"id"   => "of_transfer",
					"type" => "transfer",
					"std"  => "",
					"desc" => __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options"' , 'pxs'),
				);  