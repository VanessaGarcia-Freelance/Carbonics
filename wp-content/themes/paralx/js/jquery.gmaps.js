(function (e) {
    "use strict";
    var t = php_data.lat;
    var n = php_data.lng;
    var r = php_data.zoom;
    var i = php_data.info;
    var s = php_data.mapid;
    var c = php_data.color;
    var MY_MAPTYPE_ID = 'custom_style';
    
    e(function () {
    
    	var featureOpts = [
	    {
	      stylers: [
	        { hue: c },
	        { visibility: 'simplified' },
	        { gamma: 0.5 },
	        { weight: 0.5 }
	      ]
	    },
	    {
	      elementType: 'labels',
	      stylers: [
	        { visibility: 'on' }
	      ]
	    },
	    {
	      featureType: 'water',
	      stylers: [
	        { color: c }
	      ]
	    }
	  ];
        var i = new google.maps.LatLng(parseFloat(t), parseFloat(n));
        var o = {
            zoom: parseInt(r),
            center: i,
            mapTypeControlOptions: {
		      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		    },
		    mapTypeId: MY_MAPTYPE_ID
        };
        var u = new google.maps.Map(document.getElementById("map-canvas-" + s), o);
        var a = php_data.info;
        var f = new google.maps.InfoWindow({
            content: a
        });
        var l = new google.maps.Marker({
            position: i,
            map: u
        });
        
        var styledMapOptions = {
		    name: 'Custom Style'
		  };
		
		var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
		
		u.mapTypes.set(MY_MAPTYPE_ID, customMapType);
        
        google.maps.event.addListener(l, "click", function () {
            f.open(u, l)
        })
    })
})(jQuery)