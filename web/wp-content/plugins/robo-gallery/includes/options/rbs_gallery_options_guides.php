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
if( class_exists('RoboGalleryConfig')  ){
	$guide = RoboGalleryConfig::guides();
	if( isset($guide) && count($guide) ){ 

		$guides_group = new_cmb2_box( array(
		    'id'            => ROBO_GALLERY_PREFIX . 'guides_metabox',
		    'title'         => '<span class="dashicons dashicons-video-alt3 rbs-icon-red"></span> '.__( 'Video Guides', 'rbs_gallery' ),
		    'object_types'  => array( ROBO_GALLERY_TYPE_POST ),
		    'context'       => 'side',
		    'priority'      => 'high',
		    'show_names'	=> false,
		));

		$guides_group->add_field( array(
		    'id'            => ROBO_GALLERY_PREFIX.'guide_desc',
		    'type'          => 'title',
		    'before_row'    => '<a href="'.$guide['link'].'" target="_blank" class="rbs_guide rbs_guide_'.$guide['class'].'">'.$guide['text'].'</a>',
		    'after_row'     => '',
		));
	}
}