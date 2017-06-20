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


$hover_group = new_cmb2_box( array(
    'id' 			=> ROBO_GALLERY_PREFIX . 'hover_metabox',
    'title' 		=> '<span class="dashicons dashicons-format-gallery"></span> '.__( 'Hover Options', 'rbs_gallery' ), 
    'object_types' 	=> array( ROBO_GALLERY_TYPE_POST ),
    'show_names'	=> false,
    'context' 		=> 'normal',
   // 'closed'        => rbs_gallery_set_checkbox_default_for_new_post(0),
));

$hover_group->add_field( array(
	'name'             => __('Click Thumbnail', 'rbs_gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'thumbClick',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => rbs_gallery_set_checkbox_default_for_new_post(0),
	'options'          => array(
		'0' 	=> __( 'On' , 	'rbs_gallery' ),
		'1' 	=> __( 'Off' , 	'rbs_gallery' ),
	),
	'before_row'	=> '
<div class="rbs_block"> <br />',
));

$hover_group->add_field( array(
	'name'             	=> __('Hover Mode', 'rbs_gallery' ),
	'id'               	=> ROBO_GALLERY_PREFIX . 'hover',
	'type'             	=> 'rbsselect',
	'show_option_none' 	=> false,
	'default'          	=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'level'			   => !ROBO_GALLERY_PRO,
	'options'          	=> array(
		 '0' => __( 'Off' , 		'cmb' ),
		 '1' => __( 'Options' , 	'cmb' ),
		 '2' => __( 'Template' , 	'cmb' )
	),
	'depends' => array(
		'1' => '.rbs_gallery_hover_blok, .rbs_gallery_hover_options_blok',
		'2' => '.rbs_gallery_hover_blok, .rbs_gallery_hover_template_blok',
	),

	'after_row'		=> '
	<div class="rbs_gallery_hover_blok">'
    	)
    );

$hover_group->add_field( array(
    'name'    		=> __( 'Bg Color', 'rbs_gallery' ),
    'id'   			=> ROBO_GALLERY_PREFIX.'background',
    'type' 			=> 'rbstext',
    'class'			=> 'form-control rbs_color rbs_hover_bg_color',
    'data-default' 	=>  'rgba(7, 7, 7, 0.5)',
    'default'  		=> 'rgba(7, 7, 7, 0.5)',
	'data-alpha'    => 'true',
	'data-css-style'=> 'backgroundColor',
	'data-demo-class'=> '.rbs_hover_demo',
    'small'			=> 1,
    'level'			   => !ROBO_GALLERY_PRO,
));

$hover_group->add_field( array(
	'name'             => __('Effect', 'rbs_gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'overlayEffect',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => 'direction-aware-fade',
	'options'          => array(
		 'push-up' 				=> __( 'push-up' , 'cmb' ),
		 'push-down'	 		=> __( 'push-down' , 'cmb' ),
		 'push-up-100%' 		=> __( 'push-up-100%' , 'cmb' ),
		 'push-down-100%' 		=> __( 'push-down-100%' , 'cmb' ),
		 'reveal-top'			=> __( 'reveal-top' , 'cmb' ),
		 'reveal-bottom' 		=> __( 'reveal-bottom' , 'cmb' ),
		 'reveal-top-100%' 		=> __( 'reveal-top-100%' , 'cmb' ),
		 'reveal-bottom-100%' 	=> __( 'reveal-bottom-100%' , 'cmb' ),
		 'direction-aware' 		=> __( 'direction-aware' , 'cmb' ),
		 'direction-aware-fade' => __( 'direction-aware-fade' , 'cmb' ),
		 'direction-right' 		=> __( 'direction-right' , 'cmb' ),
		 'direction-left' 		=> __( 'direction-left' , 'cmb' ),
		 'direction-top' 		=> __( 'direction-top' , 'cmb' ),
		 'direction-bottom' 	=> __( 'direction-bottom' , 'cmb' ),
		 'fade' 				=> __( 'fade', 'cmb' )
	),
	'after_row'		=> '
		<div class="rbs_gallery_hover_options_blok">'
));
   
$hover_group->add_field( array(
	'name' 			=> __('Show Title', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'showTitle',
	'type' 			=> 'font',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'bootstrap_style'=> 1,
    'default'		=> array(
    	'enabled'	=> rbs_gallery_set_checkbox_default_for_new_post(1),
    	'color'		=> 'rgb(255, 255, 255)',
    	'colorHover'=> 'rgb(255, 255, 255)',
    	'fontBold'  => 'bold',
    	'fontSize'  => '12',
    ),
    'before_row'=> 	'
		    <div role="tabpanel">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#hover_text" aria-controls="hover_text" role="tab" data-toggle="tab">'.__('Title', 'rbs_gallery' ).'</a></li>
					<li role="presentation"><a href="#hover_linkicon" aria-controls="hover_linkicon" role="tab" data-toggle="tab">'.__('Link Button', 'rbs_gallery' ).'</a></li>
					<li role="presentation"><a href="#hover_zoomicon" aria-controls="hover_zoomicon" role="tab" data-toggle="tab">'.__('Zoom Button', 'rbs_gallery' ).'</a></li>
					<li role="presentation"><a href="#hover_desc" aria-controls="hover_desc" role="tab" data-toggle="tab">'.__('Description', 'rbs_gallery' ).'</a></li>
				</ul>
				<div class="tab-content">
		        	<div role="tabpanel" class="tab-pane active" id="hover_text"><br/>',
	'after_row'		=> '
					</div>'
));

$hover_group->add_field( array(
	'name' 			=> __('Link Icon', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'linkIcon',
	'type' 			=> 'font',
	'bootstrap_style'=> 1,
    'default'		=> array(
    	'enabled'	=> rbs_gallery_set_checkbox_default_for_new_post(0),
    	'iconSelect'=> 'fa-link',

    	'color'		=> '#ffffff',
    	'colorHover'=> '#ffffff',
    	'fontSize'  => '20',
    ),
    'icon'			=> 1,
    'before_row'	=> '
	        		<div role="tabpanel" class="tab-pane" id="hover_linkicon"><br/>', 
	'after_row'		=> '
					</div>'
));

$hover_group->add_field( array(
	'name' 			=> __('Zoom Icon', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'zoomIcon',
	'type' 			=> 'font',
	'bootstrap_style'=> 1,
    'default'		=> array(
    	'enabled'	=> rbs_gallery_set_checkbox_default_for_new_post(1),
    	'iconSelect'=> 'fa-search-plus',

    	'color'		=> '#ffffff',
    	'colorHover'=> '#ffffff',
    	'colorBg'	=> 'rgb(13, 130, 241)',
    	'colorBgHover'	=> 'rgb(6, 70, 130)',
    	'borderSize'	=> '2',
    	'fontSize'  => '16',
    ),
    'icon'			=> 1,
    'before_row'	=> '
	        		<div role="tabpanel" class="tab-pane" id="hover_zoomicon"><br/>',
	'after_row'		=> '
					</div>'
));

$hover_group->add_field( array(
	'name' 			=> __('Show Description', 'rbs_gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'showDesc',
	'type' 			=> 'font',
	'bootstrap_style'=> 1,
	'level'			   => !ROBO_GALLERY_PRO,
    'default'		=> array(
    	'enabled'	=> rbs_gallery_set_checkbox_default_for_new_post(0),
    	'color'		=> '#000000',
    	'colorHover'=> '#000000',
    	'fontSize'  => '24',
    ),
    'before_row'=> 	'
		        	<div role="tabpanel" class="tab-pane" id="hover_desc"><br/>',
	'after_row'		=> '
					</div>
				</div>
			</div>
		</div>'
));

$hover_group->add_field( array(
	'name'    => __('Description Template', 'rbs_gallery' ),
	'desc'    => '@TITLE@ <br/> @CAPTION@ <br/> @DESC@ <br/> @LINK@ ',
	'default' => 
		'<div class="rbs-hover-title">@TITLE@</div>'."\n".
		'<div class="rbs-hover-caption">@CAPTION@</div>'."\n".
		'<div class="rbs-hover-text">@DESC@</div>'."\n".
		'<div class="rbs-hover-more"><a href="@LINK@">Read more</a></div>'."\n",
	'id'      => ROBO_GALLERY_PREFIX . 'desc_template',
	'type'    => 'rbstextarea',
	'before_row'	=>'
		<div class="rbs_gallery_hover_template_blok"> ',
	'after_row'		=>'
		</div>
	</div>
</div>'
));