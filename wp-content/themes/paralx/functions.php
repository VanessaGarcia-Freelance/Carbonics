<?php
/**
 * Paralx functions and definitions
 *
 * @package paralx
 */
 
/**
 * PXS Blocks
 */
require get_template_directory() . '/page-builder/pxs-blocks.php';

/**
 * Page Builder Custom Scripts
 */
function aq_pagebuilder_admin() {
        // Styles
        wp_register_style( 'aq-page-builder', get_template_directory_uri() . '/page-builder/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'aq-page-builder' );
        wp_enqueue_style( 'font-awsome', get_template_directory_uri() . '/css/font-awesome.css');
        
        // Javascripts
        wp_enqueue_script( 'jquery-ui-accordion');
        wp_register_script('aq-page-builder-ui', get_template_directory_uri() . '/page-builder/ui.js');
        wp_enqueue_script('aq-page-builder-ui');
}
add_action( 'admin_enqueue_scripts', 'aq_pagebuilder_admin' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1140; /* pixels */
}

if ( ! function_exists( 'paralx_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */
function paralx_setup() {

	load_theme_textdomain( 'paralx', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'default' => __( 'Default Menu', 'pxs' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'paralx_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	
}
endif; // paralx_setup
add_action( 'after_setup_theme', 'paralx_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function paralx_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'pxs' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'paralx_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function paralx_scripts() {
	wp_enqueue_style('paralx-style', get_stylesheet_uri() );
	wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/css/jquery-ui.css');
	wp_enqueue_style('paralx-font-awsome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style('paralx-flipclock', get_template_directory_uri() . '/css/flipclock.css');
	wp_enqueue_style('paralx-flexslider', get_template_directory_uri() . '/css/flexslider.css');
	wp_register_style('paralx-custom-css', get_template_directory_uri() . '/css/custom_script.css');
	wp_register_style('paralx-custom-style', get_template_directory_uri() . '/css/custom_style.css');

	wp_register_script('paralx-google-maps', get_template_directory_uri() . '/js/jquery.gmaps.js', array('jquery'), '20140310', true);
	wp_enqueue_script('paralx-google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
	wp_enqueue_script('paralx-jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', array('jquery'), '20140310', true);
	wp_enqueue_script('paralx-flipclock', get_template_directory_uri() . '/js/flipclock.js', array(), '20140310', true );
	wp_enqueue_script('paralx', get_template_directory_uri() . '/js/pxs-paralx.js', array('jquery'), '20140310', true);
	wp_enqueue_script('paralx-header', get_template_directory_uri() . '/js/pxs-header.js', array('jquery'), '20140310', true);
	wp_enqueue_script('paralx-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '20140310', true );
	wp_enqueue_script('paralx-push-menu', get_template_directory_uri() . '/js/pxs-menu-push.js', array('jquery'), '20140310', true);
	wp_enqueue_script('paralx-quotes', get_template_directory_uri() . '/js/jquery.quovolver.js', array(), '20140310', true );
	wp_enqueue_script('paralx-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20140310', true );
	wp_register_script('paralx-countdown', get_template_directory_uri() . '/js/pxs-countdown.js', array('jquery'), '20140310', true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'paralx_scripts' );

// Theme options Ppanel
define('PXS_ADMIN_OPTIONS', get_template_directory() . '/inc/options/admin/functions/include/');
require_once(get_template_directory() . '/inc/options/admin/index.php');

/**
 * Push Menu
 */
require get_template_directory() . '/inc/class-walker-menu.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Breadcrumbs
 */
require_once(get_template_directory() . '/inc/breadcrumbs.php');

/**
 *  Custom Theme Colors
 */
function pxs_theme_colors() {

	global $smof_data;
	
	$typo = $smof_data['g_select'];
	$family = str_replace(" ","+", $typo);
	
	if(isset($smof_data["pxs_clr_accent"])) { $pxs_clr_accent = $smof_data["pxs_clr_accent"]; } else { $pxs_clr_accent = '#3CD3AD';}
	if(isset($smof_data["pxs_clr_header"])) { $pxs_clr_header = $smof_data["pxs_clr_header"]; } else { $pxs_clr_header = '#252422';}
	if(isset($smof_data["pxs_clr_footer"])) { $pxs_clr_footer = $smof_data["pxs_clr_footer"]; } else { $pxs_clr_footer = '#252422';}
	if(isset($smof_data["pxs_clr_menu"])) { $pxs_clr_menu = $smof_data["pxs_clr_menu"]; } else { $pxs_clr_menu = '#252422';}
	
	wp_enqueue_style('paralx-custom-style');
	
	// Theme Colors
	$custom_css = '
		
		@import url(http://fonts.googleapis.com/css?family='.$family.');
		h1,h2,h3,h4,h5,h6 {font-family:\''.$typo.'\', sans-serif;}
		
		.container .content h1, .site-footer .container .col_right .site-copyright ul li a:hover i, .fxslider .flexslider .flex-direction-nav a, .grid .items .item:hover i, .callout .container .content .link:hover i, .site-content.blog .content-area .site-main article .entry-header .entry-title a, .site-content.blog .content-area .site-main article .entry-meta span:hover i, .site-content.blog .content-area .site-main article .entry-summary a.read-more, .site-content.blog .content-area .widget-area aside ul li:hover a, .site-content.blog .content-area .widget-area .widget_search .search-field, .site-main [class*="navigation"] a:hover, .site-main [class*="navigation"] a i, .site-content.blog .content-area .site-main .author-info .author-bio h4 a, .comments-area .comments-title, .comments-area .comment-respond .comment-form .logged-in-as a, .comments-area .comment-respond .comment-form .form-allowed-tags code, dt, a, abbr, acronym, code, kbd, tt, var, strike, del, mark, ins, .site-content.blog .content-area .widget-area .widget_archive ul li, .site-content.blog .content-area .widget-area .widget_categories ul li, .site-content.blog .content-area .widget-area .widget_calendar thead tr th, .site-content.blog .content-area .widget-area .widget_calendar tbody tr td a, .site-content.blog .content-area .widget-area .widget_calendar tfoot tr td a, .site-content.blog .content-area .widget-area .widget_rss .rsswidget, .site-content.blog .content-area .widget-area .widget_text .textwidget p strong, .site-content.blog .content-area .widget-area .widget_tag_cloud .tagcloud a:hover, .contacts ul li span, .paralax-table .container .content .items .item h2, .paralax-table .container .content .items .item:hover a i {color:'.$pxs_clr_accent.';}
		.splash .tint, .splash.newsletter .tint, .splash.countdown .tint, .paralax-callout .tint, .paralax-table .tint, .paralax-team .tint, .paralax-quotes .tint, .landing .featured img:hover, .grid .items .item:hover img, .fxslider .flexslider .flex-control-paging li a.flex-active, .site-footer .container .go-top i:hover, .dl-menuwrapper ul li a:hover, .dl-menuwrapper ul li li.dl-back > a:hover i, .header.active:hover, .page-header .tint, .ptable .items .item, .ptable .items .item:hover, .callout .container .content, .site-content.blog .content-area .site-main .sticky, .site-content.blog .content-area .site-main .author-info .author-image img, .comments-area .comment-list .comment .comment-meta, pre, .paralax-callout .container .content img:hover {background:'.$pxs_clr_accent.';}
		.site-footer .container .go-top i, .dl-menuwrapper ul li li.dl-back > a i {border:2px solid '.$pxs_clr_accent.';}
		.site-content.blog .content-area .site-main .format-quote .entry-summary p:hover {border-left:4px double '.$pxs_clr_accent.';}
		.site-content.blog .content-area .site-main .format-quote .entry-summary p:hover {border-bottom:4px double '.$pxs_clr_accent.';}
		.site-content.blog .content-area .widget-area .widget_pages ul .children:hover, .site-content.blog .content-area .widget-area .widget_categories ul .children:hover, .site-content.blog .content-area .widget-area .widget_nav_menu .menu .sub-menu:hover {border-left:1px solid '.$pxs_clr_accent.';}
		blockquote p {color:'.$pxs_clr_accent.'!important;}
		input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, textarea:focus {border:1px solid '.$pxs_clr_accent.';}
		.page-header {background:url('.$smof_data["pxs_gen_bg_pageheader"].')no-repeat fixed;}
		.site-footer {background:'.$pxs_clr_footer.';}
		.header.active {background:'.$pxs_clr_header.';}
		.menu-logo, .dl-menuwrapper ul, .dl-menuwrapper {background:'.$pxs_clr_menu.';}
	';
    
    wp_add_inline_style( 'paralx-custom-style', $custom_css );
    
}
add_action( 'wp_enqueue_scripts', 'pxs_theme_colors' );

/**
 *  TGM Plugin Activation
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';
function pxs_plugins() {

	$pxs_plugins = array(
		
		// Aqua Page Builder
		array(
			'name'     				=> 'Aqua Page Builder',
			'slug'     				=> 'aqua-page-builder',
			'source'   				=> get_stylesheet_directory() . '/plugins/aqua-page-builder.zip',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		
		// Contact Form 7
		array(
			'name'     				=> 'Contact Form 7',
			'slug'     				=> 'contact-form-7',
			'source'   				=> get_stylesheet_directory() . '/plugins/contact-form-7.zip',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		
		// MailChimp
		array(
			'name'     				=> 'MailChimp for WordPress',
			'slug'     				=> 'mailchimp-for-wp',
			'source'   				=> get_stylesheet_directory() . '/plugins/mailchimp-for-wp.zip',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		
	);

	// Change this to your theme text domain, used for internationalising strings
	$pxs_theme_text_domain = 'tgmpa';

	$pxs_config = array(
		'domain'       		=> $pxs_theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $pxs_theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $pxs_theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $pxs_theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $pxs_theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $pxs_theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $pxs_theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $pxs_theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $pxs_plugins, $pxs_config );

}
add_action( 'tgmpa_register', 'pxs_plugins' );