(function ($) {
	"use strict";
	
	// Variables
	var $wrapper = $('.dl-menuwrapper'), 
		$pushmenu = $('.dl-menu'), 
		$submenu = $('ul.dl-submenu'), 
		$menuitems = $pushmenu.find('li:not(dl-back)'), 
		$trigger = $('div.dl-trigger'),
		$body = $('.site-content'),
		$header = $('.header'),
		$html = $('html'),
		$mobile_menu = $('.main-drop');
	
	// Prepend subview back links
	$menuitems.find($submenu).prepend( '<li class="dl-back"><a><i class="fa fa-angle-double-left"></i></a></li>' );
	var $back = $submenu.find( 'li.dl-back' );
	
	function init() {
		
		// Open/Close menu
		trigger();
		
		// Onhover menu items
		$menuitems.on('hover.dlmenu', function( event ) {
			event.stopPropagation();

			var $item = $(this),
				$submenuview = $item.children($submenu);
				
			if( $submenuview.length > 1 ) {
			
				$pushmenu.bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
				     $(this).removeClass("dl-animate-in-2");
				}).addClass("dl-animate-in-2");
				
				$pushmenu.addClass( 'dl-subview' );
				$item.addClass( 'dl-subviewopen' ).parents( '.dl-subviewopen:first' ).removeClass( 'dl-subviewopen' ).addClass( 'dl-subview' );
				return false;
			} 

		});
		
		// Onhover subview back link
		$back.on( 'hover.dlmenu', function( event ) {
			
			event.stopPropagation();
			
			//setTimeout(function () { $pushmenu.removeClass( 'dl-animate-out-1' ); });
			var $submenuview = $(this).parents( 'ul.dl-submenu:first' ),
			$i = $submenuview.parent();
			
			$pushmenu.bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
				     $(this).removeClass("dl-animate-in-2");
				}).addClass("dl-animate-in-2");
			
			$i.removeClass( 'dl-subviewopen' );
			
			var $subview = $(this).parents( '.dl-subview:first' );
			
			if( $subview.is( 'li' ) ) {
				
				$subview.addClass( 'dl-subviewopen' );
			}
			
			$subview.removeClass( 'dl-subview' );
			
		});
		
	}
	
	// Function: Trigger menu to open/close
	function trigger() {
		
		$trigger.on( 'hover.dl-menu', function() {
			openMenu();
			//$('.hfeed.site').addClass('push');
			$wrapper.css('right','0');

		});
		
		$body.on( "hover", function() {
			closeMenu();
			$('.hfeed.site').removeClass('push');
			$wrapper.css('right','-320px');
		});
	}
	
	function openMenu() {
		$pushmenu.addClass( 'dl-menuopen' );
		$trigger.addClass( 'dl-active' );
	}

	function closeMenu() {
		$pushmenu.removeClass( 'dl-menuopen' );
		$trigger.removeClass( 'dl-active' );
	}
	
	init();

})(jQuery);