<?php//add_action('init','of_options');
if (!function_exists('of_options')){
	function of_options(){
	  
		global $of_options;
		$of_options = array();

		$image = get_template_directory_uri() . '/inc/options/admin/assets/images/';
		
		$fontsSeraliazed = file_get_contents('http://phat-reaction.com/googlefonts.php?format=php');
		$fontArray = unserialize($fontsSeraliazed);
		
		$gfont = array();
		
		foreach ($fontArray as $font) {
			foreach ($font as $key => $value) {
				if ($key == "font-name") {
					$gfont[$value] = $value;	
					//echo $gfont[$value] . '<br/>';
				}
			}
		}
		
		$color_scheme 	= array("Default","Red","Blue","Orange","Cyan");

		require_once( PXS_ADMIN_OPTIONS . 'general.php' );
		require_once( PXS_ADMIN_OPTIONS . 'colors.php' );
		require_once( PXS_ADMIN_OPTIONS . 'footer.php' );
		require_once( PXS_ADMIN_OPTIONS . 'social.php' );
		require_once( PXS_ADMIN_OPTIONS . 'backup.php' );
		
	}
}