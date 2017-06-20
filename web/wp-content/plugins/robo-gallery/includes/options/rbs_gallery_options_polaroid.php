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


$polaroid_group = new_cmb2_box( array(
    'id' 			=> ROBO_GALLERY_PREFIX . 'polaroid_metabox',
    'title' 		=> '<span class="dashicons  dashicons-money"></span> '.__( 'Polaroid Style Options', 'rbs_gallery' ),
    'object_types' 	=> array( ROBO_GALLERY_TYPE_POST ),
    'show_names' 	=> false,
    'context' 		=> 'normal',
//    'closed'        => rbs_gallery_set_checkbox_default_for_new_post(1),
));

$polaroid_group->add_field( array(
	'name' 			=> __('Polaroid Style', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'polaroidOn',
	'type' 			=> 'switch',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(0),
	'depends' 		=> '.rbs_polaroid_block',
	'bootstrap_style'=> 1,
/*	'level'			=> !ROBO_GALLERY_PRO,*/
    'before_row' 	=> '
<div class="rbs_block"><br/>',
	'after_row'		=> '
	<div class="rbs_polaroid_block">',
));
    
$polaroid_group->add_field(array(
	'name'             => __('Source', 'rbs_gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'polaroidSource',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => 'desc',
	'options'          => array(
		'title'		=> __( 'Title' , 'rbs_gallery' ),
		'desc'		=> __( 'Desc' , 'rbs_gallery' ),
		'caption'	=> __( 'Caption' , 'rbs_gallery' )
	),
));

$polaroid_group->add_field( array(
    'name'    		=> __( 'Bg Color', 'rbs_gallery' ),
    'id'   			=> ROBO_GALLERY_PREFIX.'polaroidBackground',
    'type' 			=> 'rbstext',
    'class'			=> 'form-control rbs_color',
    'data-default' 	=>  '#ffffff',
	'data-alpha'    => 'true',
    'small'			=> 1,
    'default'  		=> '#ffffff',
));

$polaroid_group->add_field( array(
	'name'             => __('Align', 'rbs_gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'polaroidAlign',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => 'center',
	'options'          => array(
		'left' 		=> __( 'left' , 	'rbs_gallery' ),
		'right' 	=> __( 'right' , 	'rbs_gallery' ),
		'center' 	=> __( 'center' , 	'rbs_gallery' ),
	),
    'after_row'		=> '
    </div>
</div>'
));


	