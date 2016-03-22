(function ($) {
	"use strict";
	
	var $goTop = $('.go-top');
	
	// Scroll to next block
	$.each($('.tinynav'), function() {

		var $nav_id = $('#' + this.id),
			$block = $nav_id.closest('.aq-block'),
			$wrapper = $('.aq_row');
			
			console.log($block);
		
		$nav_id.click(function() {
			
			var block_id = $block.attr('id'),
				$scrollto = $('#'+$wrapper.find($("#"+block_id)).next().attr('id'));
				
			
			$('html, body').animate({
		        scrollTop: $scrollto.offset().top - 57
		    }, 2000);
			
	    });
		
	});
	
	// Scroll to top
	$goTop.click(function () {
	   $("html, body").animate({scrollTop: 0}, 2000);
	});

})(jQuery);