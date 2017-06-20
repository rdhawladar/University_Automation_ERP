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


$shortcode_group = new_cmb2_box( array(
    'id'            => ROBO_GALLERY_PREFIX.'shortcode_metabox',
    'title'         => '<span class="dashicons dashicons-visibility"></span> '.__('Gallery Shortcode','rbs_gallery'),
    'object_types'  => array( ROBO_GALLERY_TYPE_POST ),
    'context'       => 'side',
    'priority'      => 'low',
//    'closed'        => rbs_gallery_set_checkbox_default_for_new_post(0),
));

if(isset($_GET['post'])){
	$shortcode_group->add_field( array(
	    'id'            => ROBO_GALLERY_PREFIX.'short_desc',
	    'type'          => 'title',
	    'before_row'    => '<div class="rbs_shortcode">[robo-gallery id="'.$_GET['post'].'"]</div>',
	    'after_row'     => '<div class="desc">'.__('use this shortcode to insert this gallery into page, post or widget','rbs_gallery')."</div>",
	));
}