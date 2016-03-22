(function ($) {
    "use strict";
    
    var total_items = slider_data.length - 1,
        sid = slider_data[0].sid;
        
    var $pslider = $("#p"+sid),
    	$item = $pslider.find(".item");
    	
    var title, caption, image;
	
	$('#' + sid).slider({
        range: "max",
        min: 0,
        max: total_items,
        value: 0,
        slide: function (event, ui) {
            var id = ui.value;
            
            $.each( slider_data, function( key, value ) {
            	
            	if (key == id) {
	            	$.each(value, function( key, value ) {
		            	if (key == "title") {title = value;}
		            	if (key == "caption") {caption = value;}
		            	if (key == "image") {image = value;}
		            	
					});
					
					$item.bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
					     $(this).removeClass("dl-animate-in-2");
					}).addClass("dl-animate-in-2");
					
					$item.find("h2").html(title);
					$item.find("p").html(caption);
					$item.find("img").attr("src", image);
					
            	}
            	
			});
        }
    });
    
    $('#' + sid).slider({ 
    		change: function (event, ui) {
            var id = ui.value;
            
            console.log(id);
            
            $.each( slider_data, function( key, value ) {
            	
            	if (key == id) {
	            	$.each(value, function( key, value ) {
		            	if (key == "title") {title = value;}
		            	if (key == "caption") {caption = value;}
		            	if (key == "image") {image = value;}
		            	
					});
					
					$item.bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
					     $(this).removeClass("dl-animate-in-2");
					}).addClass("dl-animate-in-2");
					
					$item.find("h2").html(title);
					$item.find("p").html(caption);
					$item.find("img").attr("src", image);
					
            	}
            	
			});
        }
       });
    
    $("#down").click(function() {
      var s = $('#' + sid), val = s.slider("value"), step = s.slider("option", "step");
      s.slider("value", val - step);
    });
    
    $("#up").click(function() {
      var s = $('#' + sid), val = s.slider("value"), step = s.slider("option", "step");
      s.slider("value", val + step);
    });
    
    function stepVal() {
    	$('#' + sid).slider("value") - 1;
    }
   
})(jQuery);