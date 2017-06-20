<?php 
/*
*      Robo Gallery     
*      Version: 1.5
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

$tools_group = new_cmb2_box( array(
    'id'            => ROBO_GALLERY_PREFIX.'tools_metabox',
    'title'         => '<span class="dashicons dashicons-admin-tools"></span> '.__('Gallery Tools','rbs_gallery'),
    'object_types'  => array( ROBO_GALLERY_TYPE_POST ),
    'context'       => 'side',
    'priority'      => 'low',
  //  'closed'        => rbs_gallery_set_checkbox_default_for_new_post(0),
));

if(isset($_GET['post'])){
	$tools_group->add_field( array(
	    'id'            => ROBO_GALLERY_PREFIX.'create_acticle',
	    'type'          => 'title',
	    'before_row'    => '<div class="rbs_block">'
	    	.'<div class="rbs-center-block rbs-margin-block rbs-post-tools">'
		    	.'<button id="rbs_create_article" data-galleryid="'.(int)$_GET['post'].'" class="btn btn-info btn-lg ">'
		    		.'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> '
		    		.__('Create post','rbs_gallery')
		    	.'</button>'
		    	.'<p></p>'
		    	.'<button id="rbs_posts_list" data-galleryid="'.(int)$_GET['post'].'" class="btn btn-info btn-lg ">'
		    		.'<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> '
		    		.__('Posts List','rbs_gallery')
		    	.'</button>'
		    	.'<p class="rbs_desc">'.__('Here you can create and customize new post with gallery inside it','rbs_gallery').'</p> '
		    	.'<p>'
		    		.'<span class="glyphicon glyphicon-eye-open"></span> '
		    		.__('Gallery Views','rbs_gallery').': '
		    		.'<strong id="rbs_gallery_views_value">'.(int) get_post_meta( (int)$_GET['post'], 'gallery_views_count', true).'</strong> '
		    		.'<a href="#" id="rbs_gallery_clear_views" data-confirm="'.__('Are you sure that you wish to reset statistics?', 'rbs_gallery').'" data-ok="'.__('Success: Statistic successfully reset!', 'rbs_gallery').'" class="hide-if-no-js">'.__('Reset').'</a>'
		    	.'</p>'
		    .'</div> '
		    ,
	    'after_row'    	=> '</div>',
	));
}