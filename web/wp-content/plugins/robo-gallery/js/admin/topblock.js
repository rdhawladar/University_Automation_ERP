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

jQuery(function(){
	jQuery('.rbs_getproversion_blank').click( function(event ){
		event.preventDefault();
		window.open("http://robosoft.co/go.php?product=gallery&task=gopro",'_blank');
		if( jQuery(this).is(".rbs_close_dialog") ) window['roboGalleryDialog'].dialog("close");
	});
	jQuery('.rbs_getproversionfree_blank').click( function(event ){
		event.preventDefault();
		window.open("http://robosoft.co/go.php?product=gallery&task=goprofree",'_blank');
		if( jQuery(this).is(".rbs_close_dialog") ) window['roboGalleryDialog'].dialog("close");
	});
	jQuery('.rbs_getproversiontrans_blank').click( function(event ){
		event.preventDefault();
		window.open("http://robosoft.co/go.php?product=gallery&task=goprotrans",'_blank');
		if( jQuery(this).is(".rbs_close_dialog") ) window['roboGalleryDialog'].dialog("close");
	});
});