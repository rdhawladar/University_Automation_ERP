/*
*      Robo Gallery     
*      Version: 1.0
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

(function($) {
	jQuery('.robo_gallery').each( function(){
		var objectOptions = window[ jQuery(this).data('options') ];
		var realOptions = jQuery.extend({},objectOptions);
		var gallery = jQuery(this).collagePlus( realOptions ); 
		//console.log(realOptions);   
		if(realOptions.touch==1){ 
			jQuery("body").swipe({
		        swipeLeft: function(event, direction, distance, duration, fingerCount){ jQuery(".mfp-arrow-left").magnificPopup("prev"); },
		        swipeRight: function() { jQuery(".mfp-arrow-right").magnificPopup("next"); },
		        threshold: 50
		    });
		    jQuery("body").swipe("disable");
		}
		if( roboGalleryDelay != undefined && roboGalleryDelay > 0 ){
			setTimeout(function () {
				gallery.eveMB('resize');
				//console.log("roboGallery - resize"); 
			}, roboGalleryDelay);
		}
	});
})(jQuery);