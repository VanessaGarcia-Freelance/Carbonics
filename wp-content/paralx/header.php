<?php
/**
 * The Header for our theme.
 *
 * @package paralx
 */
global $smof_data;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Default Favicon -->
<?php if (!empty($smof_data['pxs_favicon'])) : ?>
<link rel="shortcut icon" href="<?php echo $smof_data['pxs_favicon']; ?>" />
<?php endif; ?>

<!-- Favicon For iPhone -->
<?php if(!empty($smof_data['pxs_iphone_icon'])): ?>
<link rel="apple-touch-icon-precomposed" href="<?php echo $smof_data['pxs_iphone_icon']; ?>">
<?php endif; ?>

<!-- Favicon For iPhone 4 Retina display -->
<?php if(!empty($smof_data['pxs_iphone_icon_retina'])): ?>
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $smof_data['pxs_iphone_icon_retina']; ?>">
<?php endif; ?>

<!-- Favicon For iPad -->
<?php if(!empty($smof_data['pxs_ipad_icon'])): ?>
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $smof_data['pxs_ipad_icon']; ?>">
<?php endif; ?>

<!-- Favicon For iPad Retina display -->
<?php if(!empty($smof_data['pxs_ipad_icon_retina'])): ?>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $smof_data['ipad_icon_retina']; ?>">
<?php endif; ?>

<!-- Favicon For iPad Retina display -->
<?php if(!empty($smof_data['pxs_ipad_icon_retina'])): ?>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $smof_data['pxs_ipad_icon_retina']; ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="header" role="banner">
		<div class="branding">
			
			<?php 
		        if (isset($_COOKIE["px_ratio"])) {
		            $px_ratio = $_COOKIE["px_ratio"];
		            $logo = $px_ratio >= 2 ? $smof_data['pxs_logo_retina'] : $smof_data['pxs_logo'];
		        } else {
		        	if (!empty($smof_data['pxs_logo'])) {$logo = $smof_data['pxs_logo'];}
		        }
	        ?>
			
			<?php  if (isset($smof_data['pxs_logo_text'])) { ?> 
				<?php  if ($smof_data['pxs_logo_text'] != 1) { ?> 
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
				<?php } else { ?>
					<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } ?>
			<?php } ?>			
		</div>

		<nav id="menu" class="menu" role="navigation">

			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'pxs' ); ?></a>
			<div class="dl-trigger"><i class="fa fa-bars"></i></div>
			<div class="language">
				<?php do_action('icl_language_selector'); ?>
			</div>


				<div class="social-header">
				
					<ul>
						<?php
							if(!empty($smof_data['pxs_social_twitter'])) { echo '<li><a href="'.$smof_data['pxs_social_twitter'].'" target="_blank"><i class="fa fa-twitter"></i></a></li>';}
							if(!empty($smof_data['pxs_social_facebook'])) { echo '<li><a href="'.$smof_data['pxs_social_facebook'].'"><i class="fa fa-facebook"></i></a></li>';}
							if(!empty($smof_data['pxs_social_google'])) { echo '<li><a href="'.$smof_data['pxs_social_google'].'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';}
							if(!empty($smof_data['pxs_social_youtube'])) { echo '<li><a href="'.$smof_data['pxs_social_youtube'].'"><i class="fa fa-youtube"></i></a></li>';}
							if(!empty($smof_data['pxs_social_vimeo'])) { echo '<li><a href="'.$smof_data['pxs_social_vimeo'].'"><i class="fa fa-vimeo-square"></i></a></li>';}
							if(!empty($smof_data['pxs_social_apple'])) { echo '<li><a href="'.$smof_data['pxs_social_apple'].'"><i class="fa fa-apple"></i></a></li>';}
							if(!empty($smof_data['pxs_social_android'])) { echo '<li><a href="'.$smof_data['pxs_social_android'].'"><i class="fa fa-android"></i></a></li>';}
							if(!empty($smof_data['pxs_social_windows'])) { echo '<li><a href="'.$smof_data['pxs_social_windows'].'"><i class="fa fa-windows"></i></a></li>';}
						?>
					</ul>

				</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="dl-menu" class="dl-menuwrapper">
		<div class="menu-logo">
			<?php  if (isset($smof_data['pxs_logo_text'])) { ?> 
				<?php  if ($smof_data['pxs_logo_text'] != 1) { ?> 
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
				<?php } else { ?>
					<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } ?>
			<?php } ?>
		</div>
		<?php
			if ( has_nav_menu( 'default' ) ) {
				wp_nav_menu( array( 'theme_location' => 'default', 'menu_class' => 'dl-menu', 'walker' => new Push_Menu()) );
			} else {
				echo '<p class="info">'.__('You have not setup your menu yet. Go to <strong>Appearance</strong> -> <strong>Menus</strong> -> <strong>Manage Locations</strong> and assign a menu to theme location: <strong>Default Menu</strong>', 'pxs').'</p>';
			} 
		?>
	</div>
	
	<?php
		if(is_home() || is_single() || is_archive() || is_search() || is_page_template('index.php')) {
			echo '<div id="content" class="site-content blog">';	
		} else if (is_404()) {
			echo '<div id="content" class="site-content error">';
		} else if (is_page() && !is_page_template('template/landing.php')) {
			echo '<div id="content" class="site-content pages">';
		} else {
			echo '<div id="content" class="site-content">';
		}
	?>
