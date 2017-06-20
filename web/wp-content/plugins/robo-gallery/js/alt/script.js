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
	rbjQuer('.robo_gallery').each( function(){
		var objectOptions = window[ rbjQuer(this).data('options') ];
		//console.log(objectOptions);
		var realOptions = rbjQuer.extend({},objectOptions);
		var gallery = rbjQuer(this).collagePlus( realOptions );
		if(realOptions.touch==1){
			rbjQuer("body").swipe({
		        swipeLeft: function(event, direction, distance, duration, fingerCount){ rbjQuer(".mfp-arrow-left").magnificPopup("prev"); },
		        swipeRight: function() { rbjQuer(".mfp-arrow-right").magnificPopup("next"); },
		        threshold: 50
		    });
		    rbjQuer("body").swipe("disable");
		}
		if( roboGalleryDelay != undefined && roboGalleryDelay > 0 ){
			setTimeout(function () {
				gallery.eveMB('resize');
				console.log("roboGallery - resize"); 
			}, roboGalleryDelay);
		}
	});
})(rbjQuer);