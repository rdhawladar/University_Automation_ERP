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
	var progressHtml = '';
	
	var rbs_insert_post_button = '';
	var rbs_insert_post_close_button = '';

	var rbs_insert_post_content = '';

	var roboGalleryActionDialog = $("#rbs_actionWindow");
	var roboGalleryActionDialogId =$('#rbs_create_article').data('galleryid');

	var bodyClass = roboGalleryActionDialog.data("body");
	if(bodyClass) $("body").addClass(bodyClass);
	roboGalleryActionDialog.dialog({
		'dialogClass' : 'wp-dialog',
		'title': roboGalleryActionDialog.data('title'),
		'modal' : true,
		'autoOpen' : false,
		'width': '550', // overcomes width:'auto' and maxWidth bug
	    'maxWidth': 550,
	    'height': 'auto',
	    'fluid': true, 
	    'resizable': false,
	 	'position': { 
				my: "center top", 
				at: "center top+15" 
			},
		'responsive': true,
		'draggable': false,
		'closeOnEscape' : true,
		'buttons' : [{
				'text' : 	roboGalleryActionDialog.data('button'),
				'class' : 	'button-primary rbs-create-post-button-insert',
				'click' : 	function(){}
			},{
				'text'  : 	roboGalleryActionDialog.data('close'),
				'class' : 	'button button-default rbs_dialog_close',
				'click' : 	function() { $(this).dialog('close'); }
			},
		],
		open: function( event, ui ) {}
	});

	window['roboGalleryActionDialog'] = roboGalleryActionDialog;

	rbs_insert_post_button = $(".rbs-create-post-button-insert");
	
	rbs_insert_post_content = $("#rbs_actionWindowContent");

	var prepareDialog = function(){
		if(progressHtml=='') progressHtml= rbs_insert_post_content.html();
			else rbs_insert_post_content.html(progressHtml);
		
	};

	$('#rbs_posts_list').click(function(evnt){
		evnt.preventDefault();
		prepareDialog();
		var data = {
			'action': 'rbs_gallery',
			'function': 'posts_list',
			'galleryid': roboGalleryActionDialogId, 
		};
		rbs_insert_post_button.hide();
		roboGalleryActionDialog.dialog("open");
		$.post(ajaxurl, data, function(response) {
			rbs_insert_post_content.html(response);
		});
	});	

	$('#rbs_create_article').click(function(evnt){
		evnt.preventDefault();
		prepareDialog();
		var data = {
			'action': 'rbs_gallery',
			'function': 'create_article_form',
			'galleryid': roboGalleryActionDialogId, 
		};
		rbs_insert_post_button.hide();
		roboGalleryActionDialog.dialog("open");
		$.post(ajaxurl, data, function(response) {
			rbs_insert_post_content.html(response);
			rbs_insert_post_button.show();
			//alert('Got this from the server: ' + response);
		});
	});

	rbs_insert_post_button.click(function(evnt){
		evnt.preventDefault();

		var categoryId = $('#rbs_post_create_category').find(":selected").val();
		var title = $('#rbs_post_create_title').val();
		var slug = $('#rbs_post_create_slug').val();
		
		var content_text = '';
		if( $('#rbs_post_create_text').length ) content_text = $('#rbs_post_create_text').val();
		

		rbs_insert_post_content.html(progressHtml);

		var data = {
			'action': 			'rbs_gallery',
			'function': 		'create_article',
			'galleryid': 		roboGalleryActionDialogId, 
			'categoryid': 		categoryId,
			'articletitle':  	title,
			'articleslug':  	slug,
			'articletext':  	content_text,
				
		};

		rbs_insert_post_button.hide();

		roboGalleryActionDialog.dialog("open");

		$.post(ajaxurl, data, function(response) {
			rbs_insert_post_content.html(response);
		});
	});

	$('#rbs_gallery_clear_views').click(function(evnt){
		evnt.preventDefault();
		if( confirm( $('#rbs_gallery_clear_views').data("confirm") ) == true ){
			var data = {
				'action': 'rbs_gallery',
				'function': 'reset_views',
				'galleryid': roboGalleryActionDialogId, 
			};
			jQuery(this).hide();
			$.post(ajaxurl, data, function(response) {
				if(response==1){
					jQuery("#rbs_gallery_views_value").text('0');
					alert( $('#rbs_gallery_clear_views').data("ok") );
				} else {
					alert(response);
				}
			});
		}
	});	
})(jQuery);