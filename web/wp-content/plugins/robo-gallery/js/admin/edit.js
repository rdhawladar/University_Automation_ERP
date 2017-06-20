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

	var rbs_init = 1;

	jQuery(".rbs_slider").bootstrapSlider({ });


	jQuery(document).on('change', '.rbs_action_element',  function(){
		var el = jQuery(this);
		var depends = el.data('depends');
		if(depends){
			//alert(depends);
			if(el.is(':checked')){
				jQuery(depends).show(rbs_init?0:'fast');
			} else {
				jQuery(depends).hide(rbs_init?0:'fast');	
			} 
		}
	});

	jQuery(document).on('change', '.rbs_action_element_select',  function(){
		var el = jQuery(this);
		if(el.data('depends')){
			var param 	= window[el.attr('id')+"_depends"];
			if(param!=false){
				jQuery.each(param, function(index, valItem) {
					jQuery(valItem).hide(rbs_init?0:'fast');
				});
				jQuery(param[el.val()]).show(rbs_init?0:'fast');
			}
		}
	});

	jQuery(document).on('change', '.rbs_checkbox label.btn', function(){
		var el = jQuery(this);
		el.parent().find('label.btn').removeClass('btn-info').addClass('btn-default');
		el.removeClass('btn-default').addClass('btn-info');
	});

	jQuery('.rbs_colums_auto').on('change', function(){
		var el = jQuery(this);
		if(el.is(':checked')){
			jQuery('#'+el.data('width-id')).attr('disabled', 'disabled');
			jQuery('#'+el.data('colums-id')).removeAttr('disabled');
		} else {
			jQuery('#'+el.data('colums-id')).attr('disabled', 'disabled');
			jQuery('#'+el.data('width-id')).removeAttr('disabled');
		}
	}).change();

	jQuery('.rbs_action_element').change();
	jQuery('.rbs_action_element_select').change();


	if(!ROBO_GALLERY_PRO){
		jQuery("#rsg_hover").change( function () {
			var el = jQuery(this);
			if(el.val()==2){
				window['roboGalleryDialog'].dialog("open");
				el.selectpicker('val', 1);
			} 
		});
	}
	
	rbs_init= 0;

	jQuery(document).on("slide slideStop", ".rbs_font_slider.rbs_font_size", function(slideEvt) {
		var divObj = jQuery(this).data('font-demoid');
		jQuery('#'+divObj).css('font-size', slideEvt.value+'px');
	});

	jQuery(document).on("slide slideStop", ".rbs_font_slider.rbs_font_line", function(slideEvt) {
		var divObj = jQuery(this).data('font-demoid');
		jQuery('#'+divObj).css('line-height', slideEvt.value+'%');
	});

	jQuery('body').on("change", ".rbs_fontParams", function() {
		var divObj 		= jQuery(this).data('font-demoid'),
			fontOptions = jQuery(this).data('font-option'),
			check 		= jQuery(this).is(':checked');

		switch(fontOptions){
			case 'bold':
				jQuery('#'+divObj).css('font-weight', check?'bold':'normal');
				break;
			case 'italic': 
				jQuery('#'+divObj).css('font-style', check?'italic':'normal');
				break;
			case 'underline':
				jQuery('#'+divObj).css('text-decoration', check?'underline':'none');
				break;
		}
	});

	var rbsBlockId = { 
		"block1":jQuery('#rsg_lightbox_metabox'), 
		"block2":jQuery('#rsg_size_metabox'), 
		"block3":jQuery('#rsg_view_metabox'), 
		"block4":jQuery('#rsg_hover_metabox'), 
		"block5":jQuery('#rsg_button_metabox'),
		"block6":jQuery('#rsg_loading_metabox'),
		"block7":jQuery('#rsg_polaroid_metabox'),
	},
	rbsAllBlockClass = function (type){
		jQuery.each( rbsBlockId, function(index, el) {
			if(type!=0){
				el.find('.inside').addClass('rbs_disabled_block');
				if( el.find('.hndle > .rbs_info_clone_text').length==0  ){
					el.find('.hndle > span').after('<span class="rbs_info_clone_text"> <span class="dashicons dashicons-info"></span> ['+rbs_toolbox_translation.rbs_info_clone_text+']</span>');
				}
			} else {
				el.find('.inside').removeClass('rbs_disabled_block');	
				el.find('.hndle > .rbs_info_clone_text').remove();
			} 
		});
	};

	jQuery('#rsg_options').on("change", function(){
		rbsAllBlockClass( jQuery(this).val() );
	}).change();

})(jQuery);