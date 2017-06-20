<?php
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


$text_group = new_cmb2_box( array(
    'id' 			=> ROBO_GALLERY_PREFIX . 'text_metabox',
    'title' 		=> '<span class="dashicons dashicons-media-text"></span> '.__( 'Text Addons', 'rbs_gallery' ),
    'object_types' 	=> array( ROBO_GALLERY_TYPE_POST ),
    'show_names' 	=> false,
    'context'       => 'side',
    'priority'      => 'low',
//    'closed'        => rbs_gallery_set_checkbox_default_for_new_post(1),
));

$text_group->add_field( array(
	'name' 			=> __('Pre Text', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'pretext',
	'type' 			=> 'rbstextarea',
	'default'		=> '',
	'hide_label'		=> 1,
	'bootstrap_style'=> 1,

    'before_row' 	=> '
    <div class="rbs_block"><label>'.__('Pre Text', 'rbs_gallery' ).'</label>',
));

$text_group->add_field( array(
	'name' 			=> __('After Text', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'aftertext',
	'type' 			=> 'rbstextarea',
	'default'		=> '',
	'hide_label'		=> 1,
	'bootstrap_style'=> 1,

    'before_row' 	=> '
    <label>'.__('After Text', 'rbs_gallery' ).'</label>',
	'after_row'		=> '
</div>',
));