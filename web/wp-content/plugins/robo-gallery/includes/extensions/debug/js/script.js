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
console.log('=========== Robo Gallery =============');
var jQueryStatus = 0;

if( typeof('jQuery')!='undefined' ){
	console.log('jQuery normal load;');
	jQueryStatus = 1;
	jQueryObj = jQuery.noConflict();
} 

if( typeof('rbjQuer')!='undefined' ) {
	console.log('jQuery alt load;');
	jQueryStatus = 2;
	if(typeof('jQueryObj')=='undefined') jQueryObj = rbjQuer.noConflict();
}

if(jQueryStatus == 0) {
	console.log('jQuery undefined');
} else {
	(function($) {
		jQueryObj('.robo_gallery').each( function(){
			var objectOptions = window[ jQueryObj(this).data('options') ];
			console.log('=========== Start ====================');
			console.log(objectOptions);
			//var realOptions = jQueryObj.extend({},objectOptions);
			console.log('============== End ===================');
		});
	})(jQueryObj);
}

