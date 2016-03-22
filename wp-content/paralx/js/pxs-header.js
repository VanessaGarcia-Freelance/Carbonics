(function ($) {
	"use strict";
	
	// Variables
	var $header = $('.header'),
		$page_header = $('.page-header'),
		el_pos;
		
	el_pos = $page_header.height();
	
	$(window).scroll(function() {
		
		var pos = $(document).scrollTop();
		
	    if (pos > el_pos) {
		    $header.addClass('active');
	    } else {
		   $header.removeClass('active'); 
	    }
	    
	});
	
	

})(jQuery);