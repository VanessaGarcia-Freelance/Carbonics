<?php
if (class_exists('AQ_Page_Builder')) {

// Page Builder Blocks
require_once(get_template_directory() . '/page-builder/blocks/pxs-slider-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-splash-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-splash-newsletter-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-splash-countdown-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-paralax-callout-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-paralax-pricing-table-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-paralax-quotes-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-paralax-team-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-slogan-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-tinymce-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-landing-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-landing-list-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-flexslider-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-grid-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-video-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-logos-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-faq-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-pricing-table-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-panel-callout-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-map-block.php');
require_once(get_template_directory() . '/page-builder/blocks/pxs-contacts-block.php');


// Register Blocks Class
aq_register_block('PXS_Slider_Block');
aq_register_block('PXS_Splash_Block');
aq_register_block('PXS_Splash_Newsletter_Block');
aq_register_block('PXS_Splash_Countdown_Block');
aq_register_block('PXS_Paralax_Callout_Block');
aq_register_block('PXS_Paralax_Pricing_Table_Block');
aq_register_block('PXS_Paralax_Quotes_Block');
aq_register_block('PXS_Paralax_Team_Block');
aq_register_block('PXS_Slogan_Block');
aq_register_block('PXS_Tinymce_Block');
aq_register_block('PXS_Landing_Block');
aq_register_block('PXS_Landing_List_Block');
aq_register_block('PXS_Flexslider_Block');
aq_register_block('PXS_Grid_Block');
aq_register_block('PXS_Panel_Callout_Block');
aq_register_block('PXS_Video_Block');
aq_register_block('PXS_Logos_Block');
aq_register_block('PXS_FAQ_Block');
aq_register_block('PXS_Pricing_Table_Block');
aq_register_block('PXS_Map_Block');
aq_register_block('PXS_Contacts_Block');


aq_unregister_block('AQ_Column_Block');
aq_unregister_block('AQ_Text_Block');
aq_unregister_block('AQ_Widgets_Block');
aq_unregister_block('AQ_Tabs_Block');
aq_unregister_block('AQ_Alert_Block');

// Options
$op_text_align = array(
	'left' => 'Left',
	'center' => 'Center',
	'right' => 'Right',
);

$op_layout_content = array(
	'clir' => 'Content [Left] + Image [Right]',
	'cril' => 'Content [Right] + Image [Left]',
);

$op_column_landing_grid = array(
	'2col' => '2 Columns',
	'3col' => '3 Columns',
);

$op_column_grid = array(
	'2col' => '2 Columns',
	'3col' => '3 Columns',
	'4col' => '4 Columns',
);

$op_column_table = array(
	'col2' => '2 Columns',
	'col3' => '3 Columns',
	'col4' => '4 Columns',
	'col5' => '5 Columns',
);

}