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


$button_group = new_cmb2_box( array(
    'id' 			=> ROBO_GALLERY_PREFIX . 'button_metabox',
    'title' 		=> '<span class="dashicons dashicons-format-gallery"></span> '.__( 'Menu Options', 'rbs_gallery' ),
    'object_types' 	=> array( ROBO_GALLERY_TYPE_POST ),
    'show_names' 	=> false,
    'context' 		=> 'normal',
  // 	'closed'        => rbs_gallery_set_checkbox_default_for_new_post(0),
));

$button_group->add_field( array(
	'name' 			=> __('Menu', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'menu',
	'type' 			=> 'switch',
	'level'			   => !ROBO_GALLERY_PRO,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'bootstrap_style'=> 1,
	'showhide'		=> 1,
	'depends' 		=> 	'.rbs_menu_options',
	'before_row'	=> '
<div class="rbs_block"><br/>',
	'after_row'		=> '
	<div class="rbs_menu_options">',
));

$button_group->add_field( array(
	'name' 			=> __('Root Label', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'menuRoot',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'type' 			=> 'switch',
	'bootstrap_style'=> 1,
	'depends' 		=> 	'.rbs_menu_root_text',
	'showhide'		=> 1,
	'after_row'		=> '
		<div class="rbs_menu_root_text">',
));

$button_group->add_field( array(
    'name'    => __('Root Label Text','rbs_gallery'),
    'default' => 'All',
    'id'	  => ROBO_GALLERY_PREFIX .'menuRootLabel',
    'type'    => 'rbstext',
    'after_row'		=> '
		</div>',
));

$button_group->add_field( array(
	'name' 			=> __('Self Label', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'menuSelf',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'type' 			=> 'switch',
	'showhide'		=> 1,
	'bootstrap_style'=> 1,
));

$button_group->add_field( array(
	'name' 			=> __('Self Images', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'menuSelfImages',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'type' 			=> 'switch',
	'showhide'		=> 1,
	'bootstrap_style'=> 1,
));

$button_group->add_field( array(
	'name'             => __( 'Style', 'rbs_gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'buttonFill',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'level'			   => !ROBO_GALLERY_PRO,
	'default'          => 'border',
	'options'          => array(
		 'normal' 	=> __( 'Normal' , 	'cmb' ),
		 'flat' 	=> __( 'flat' , 	'cmb' ),
		 '3d'		=> __( '3d' , 		'cmb' ),
		 'border' 	=> __( 'Border' , 	'cmb' ),
	),
	
));

$button_group->add_field( array(
	'name'             => __( 'Color', 'rbs_gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'buttonColor',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'level'			   => !ROBO_GALLERY_PRO,
	'default'          => 'red',
	'options'          => array(
		'gray' 		=> __( 'gray' , 'cmb' ),
		'blue' 		=> __( 'blue' , 'cmb' ),
		'green' 	=> __( 'green' , 'cmb' ),
		'orange' 	=> __( 'orange' , 'cmb' ),
		'red' 		=> __( 'red' , 'cmb' ),
		'purple' 	=> __( 'purple' , 'cmb' ),
	),
));

$button_group->add_field( array(
	'name'             => __( 'Rounds', 'rbs_gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'buttonType',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => 'normal',
	'options'          => array(
		'normal' 	=> __( 'Normal' , 	'cmb' ),
		'rounded' 	=> __( 'Rounded' , 	'cmb' ),
		'pill' 		=> __( 'Pill' , 	'cmb' ),
		'circle' 	=> __( 'Circle ' , 	'cmb' ),
	),
));

$button_group->add_field( array(
	'name'             => __( 'Size', 'rbs_gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'buttonSize',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => 'normal',
	'options'          => array(
		'jumbo' 	=> __( 'Jumbo' , 	'cmb' ),
		'large' 	=> __( 'Large' , 	'cmb' ),
		'normal' 	=> __( 'Normal' , 	'cmb' ),
		'small' 	=> __( 'Small' , 	'cmb' ),
		'tiny' 		=> __( 'Tiny ' , 	'cmb' ),
	),
));

$button_group->add_field( array(
	'name'             => __( 'Align', 'rbs_gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'buttonAlign',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => 'left',
	'options'          => array(
		'left' 	=> __( 'Left' , 	'cmb' ),
		'center'=> __( 'Center' , 	'cmb' ),
		'right' => __( 'Right' , 	'cmb' ),
	),
));

$button_group->add_field( array(
	'name' 			=> __( 'Left Padding', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'paddingLeft',
	'type' 			=> 'slider',
	'bootstrap_style'=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(5),
	'min'			=> 0,
	'addons'		=> 'px',
	'max'			=> 100,
));

$button_group->add_field( array(
	'name' 			=> __( 'Bottom Padding', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'paddingBottom',
	'type' 			=> 'slider',
	'bootstrap_style'=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(10),
	'min'			=> 0,
	'max'			=> 100,
	'addons'		=> 'px',
    'after_row'		=> '
    </div>
</div>'
));	