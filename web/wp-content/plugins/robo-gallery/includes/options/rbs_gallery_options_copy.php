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


$copy_group = new_cmb2_box( array(
    'id' 			=> ROBO_GALLERY_PREFIX . 'copy_metabox',
    'title' 		=> '<span class="dashicons dashicons-admin-settings"></span> '.__( ' Clone Gallery', 'rbs_gallery' ),
    'object_types' 	=> array( ROBO_GALLERY_TYPE_POST ),
    'show_names' 	=> false,
    'context' 		=> 'normal',
    'priority' 		=> 'high',
  //  'closed'        => rbs_gallery_set_checkbox_default_for_new_post(1),
));

$copy_group->add_field(array(
    'name' => __( 'Source Gallery', 'rbs_gallery' ),
    'desc' => __( 'When you select here to inherit settings from another gallery you\'ll not be able to edit some of the options. Gallery will copy all settings from selected source.', 'rbs_gallery' ),
    'desc2' => __( 'Very useful option for the webmasters who planning to create a lot of galleries. You don\'t have to configure it every time. Just setup styles of the gallery in one place and use the same options for another galleries on your website in another galleries.  Very fast, comfortable, advanced tool to speed up your workflow!', 'rbs_gallery' ),
    'id'   => ROBO_GALLERY_PREFIX . 'options', 
    'type' => 'rbsgallery',
	'bootstrap_style'=> 1,
	'default'		=> -1,
    'before_row' 	=> '
<div class="rbs_block"><br/>',
	'after_row'		=> '
</div> ',
));