(function ($) {
	"use strict";
	
	//var date_data = new Array(2,5,2014);
	var clock;
	var day = date_data.day;
    var month = date_data.month - 1;
    var year = date_data.year;
	
	// Grab the current date
	var currentDate = new Date();
	
	// Set some date in the future. In this case, it's always Jan 1
	var futureDate  = new Date(year, month, day);
	
	// Calculate the difference in seconds between the future and current date
	var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
	
	// Instantiate a coutdown FlipClock
	clock = $('.clock').FlipClock(diff, {
		clockFace: 'DailyCounter',
		countdown: true,
		showSeconds: true
	});

})(jQuery);