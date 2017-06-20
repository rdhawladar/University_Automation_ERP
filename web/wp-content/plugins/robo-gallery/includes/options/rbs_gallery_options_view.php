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


$view_group = new_cmb2_box( array(
    'id' 			=> ROBO_GALLERY_PREFIX . 'view_metabox',
    'title' 		=> '<span class="dashicons dashicons-welcome-add-page"></span>'.__('Thumbs View Options', 'rbs_gallery' ),
    'object_types' 	=> array( ROBO_GALLERY_TYPE_POST ),
    'cmb_styles' 	=> false,
    'show_names'	=> false,
    'context'		=> 'normal',
    'priority' 		=> 'high',
 //   'closed'        => rbs_gallery_set_checkbox_default_for_new_post(0),
));

$view_group->add_field( array(
	'name' 			=> __('Radius', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'radius',
	'type' 			=> 'slider',
	'bootstrap_style'=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(5),
	'min'			=> 0,
	'max'			=> 50,
	'addons'		=> 'px',
    'before_row' 	=> ' <br />
<div class="rbs_block">',
));

$view_group->add_field( array(
    'name'    		=> __('Hor. Space', 'rbs_gallery' ),
    'default' 		=> rbs_gallery_set_checkbox_default_for_new_post(15),
    'min'			=> 0,
    'max'			=> 100,
    'id'	  		=> ROBO_GALLERY_PREFIX .'horizontalSpaceBetweenBoxes',
    'type'    		=> 'slider',
    'addons'		=> 'px',
));

$view_group->add_field( array(
    'name'    		=> __('Ver. Space', 'rbs_gallery' ),
    'default' 		=> rbs_gallery_set_checkbox_default_for_new_post(15),
    'min'			=> 0,
    'max'			=> 100,
    'id'	  		=> ROBO_GALLERY_PREFIX .'verticalSpaceBetweenBoxes',
    'type'    		=> 'slider',
    'addons'		=> 'px',
    'after_row' 	=> '
    <div class="rbs_border"></div> ',
));

/* ======================= Shadow Start ================================= */   
$view_group->add_field( array(
	'name' 			=> __('Shadow', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'shadow',
	'type' 			=> 'switch',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'depends' 		=> '.rbs_shadows_tabs',
    'bootstrap_style'=> 1,
    'before_row' 	=> '<br />',
));

$view_group->add_field( array(
	'name' 			=> __('Shadow Options', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'shadow-options',
	'type' 			=> 'shadow',
	'before_row' 	=> '
	<div class=" rbs_shadows_tabs">
		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#tab_shadow_options" aria-controls="tab_shadow_options" role="tab" data-toggle="tab">'.__('Shadow Options', 'rbs_gallery' ).'</a></li>
				<li role="presentation"><a href="#tab_hover_shadow_options" aria-controls="tab_hover_shadow_options" role="tab" data-toggle="tab">'.__('Hover Shadow Options', 'rbs_gallery' ).'</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="tab_shadow_options"><br/>
				',
	'after_row' 	=> '
				</div>',
));

$view_group->add_field( array(
	'name' 			=> __('Hover Shadow', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'hover-shadow',
	'type' 			=> 'switch',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(0),
	'depends' 		=> '.rbs_hover_shadows_tabs',
	'bootstrap_style'=> 1,
	'level'			=> !ROBO_GALLERY_PRO,
    'before_row' 	=> '
				<div role="tabpanel" class="tab-pane " id="tab_hover_shadow_options"><br/>',
	'after_row' 	=> '
					<div class="rbs_hover_shadows_tabs">',   
));

$view_group->add_field( array(
	'name' 			=> __('Shadow Options', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'hover-shadow-options',
	'type' 			=> 'shadow',
	'default'		=> array(
			'color' => 'rgba(34, 25, 25, 0.4)', 
			'hshadow' 	=> '1',
			'vshadow' 	=> '3',
			'bshadow'	=> '3',
		),
	'after_row'		=>'
        			</div>
				</div>
			</div>
		</div>
	</div>
	<div class="rbs_border"></div>'
));

/* ======================= Border Start ================================= */

$view_group->add_field( array(
	'name' 			=> __('Border', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'border',
	'type' 			=> 'switch',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(0),
	'depends' 		=> '.rbs_border_tabs',
    'bootstrap_style'=> 1,
    'before_row' 	=> '<br/>',
));
     
$view_group->add_field( array(
	'name' 			=> __('Border Options', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'border-options',
	'type' 			=> 'border',
	'before_row' 	=> '
	<div class="rbs_border_tabs">
		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#border_options" aria-controls="border_options" role="tab" data-toggle="tab">'.__('Border Options', 'rbs_gallery' ).'</a></li>
				<li role="presentation"><a href="#hover-border_options" aria-controls="hover-border_options" role="tab" data-toggle="tab">'.__('Hover Border Options', 'rbs_gallery' ).'</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="border_options"><br/>
				',
	'after_row' 	=> '
				</div>'
));


$view_group->add_field( array(
	'name' 			=> __('Hover Border', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'hover-border',
	'type' 			=> 'switch',
	'depends' 		=> '.rbs_hover_border_tabs',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(0),
	'bootstrap_style'=> 1,
	'level'			=> !ROBO_GALLERY_PRO,
    'hide_border' 	=> true,
    'before_row' 	=> '
				<div role="tabpanel" class="tab-pane " id="hover-border_options"><br/>',
	'after_row' => '
					<div class="rbs_hover_border_tabs">',
));

$view_group->add_field( array(
	'name' 			=> __('Border Options', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'hover-border-options',
	'type' 			=> 'border',
	'after_row'		=>'
        			</div>
				</div>
			</div>
		</div>
	</div>
</div>'
));