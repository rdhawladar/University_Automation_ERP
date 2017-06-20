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
	var roboBackupGalleryDialog = jQuery("#rbsBackUpBlock")/*.appendTo("body")*/;
	
	var bodyClass = roboBackupGalleryDialog.data("body");
	if(bodyClass) jQuery("body").addClass(bodyClass);
	roboBackupGalleryDialog.dialog({
		'dialogClass' : 'wp-dialog',
		'title': roboBackupGalleryDialog.data('title'),
		'modal' : true,
		'autoOpen' : roboBackupGalleryDialog.data('open'),
		'width': '450', // overcomes width:'auto' and maxWidth bug
	    'maxWidth': 450,
	    'height': 'auto',
	    'fluid': true, 
	    'resizable': false,
		'responsive': true,
		'draggable': false,
		'closeOnEscape' : true,
		'buttons' : [{
				'text'  : 	roboBackupGalleryDialog.data('close'),
				'class' : 	'button button-default rbs_dialog_close',
				'click' : 	function() { jQuery(this).dialog('close'); }
		},
		{
				'text' : 	roboBackupGalleryDialog.data('info'),
				'class' : 	'button-primary rbs_getproversion_blank rbs_close_dialog',
				'click' : 	function(){}
		}
		],
		open: function( event, ui ) {}
	});
	window['roboBackupGalleryDialog'] = roboBackupGalleryDialog;
});