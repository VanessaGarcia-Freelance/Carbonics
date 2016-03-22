jQuery(document).ready(function($){
	$( '.accordion' ).accordion({
		collapsible: true,
		active: false // We added this 
	});
	 //$( ".pbtabs" ).tabs();
	 $(function() {
	    //$( "#page-builder-archive" ).draggable();
	  });
	var $block = $(".postbox .inside"),
		$minimize = $(".min"),
		$maximize = $(".max"),
		$handle = $(".hndle");
		
	$maximize.css('display','none');
	  
	$minimize.on("click", function() {
		$block.css('display','none');
		$minimize.css('display','none');
		$maximize.css('display','block');
		$handle.css('background','#f45303');
		$("#page-builder-archive .max").css('border-left','1px solid rgba(255,255,255,.4)');
	});
	
	$maximize.on("click", function() {
		$block.css('display','block');
		$minimize.css('display','block');
		$maximize.css('display','none');
		$handle.css('background','#7f8c8d');
		$("#page-builder-archive .max").css('border-left','1px solid #95a5a6');
	});
});