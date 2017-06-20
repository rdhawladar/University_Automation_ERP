/*
*      Robo Gallery     
*      Version: 1.0.4
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
	var roboGalleryDialog = jQuery("#robo-gallery").appendTo("body");
	roboGalleryDialog.dialog({
		'dialogClass' : 'wp-dialog',
		'title': robo_gallery_trans.roboGalleryTitle,
		'modal' : true,
		'autoOpen' : false,
		'width': 'auto', // overcomes width:'auto' and maxWidth bug
	    'maxWidth': 700,
	    'height': 'auto',
	    'fluid': true, 
	    'resizable': false,
		'responsive': true,
		'draggable': false,
		'closeOnEscape' : true,
		'buttons' : [{
				'text' : robo_gallery_trans.closeButton,
				'class' : 'button-default',
				'click' : function() { jQuery(this).dialog('close'); }
		},{
				'text' : robo_gallery_trans.insertButton,
				'class' : 'button-primary',
				'click' : function() { 
					var galleryId = jQuery('#page_id', roboGalleryDialog).val();
					window.parent.send_to_editor('[robo-gallery id="'+galleryId+'"]');
        			window.parent.tb_remove();
					jQuery(this).dialog('close'); 
				}
		}],
		open: function( event, ui ) {}
	});
	jQuery(document).on( 'click', '#insert-robo-gallery', function(event) { 
		roboGalleryDialog.dialog('open'); 
		return false; 
	});
});