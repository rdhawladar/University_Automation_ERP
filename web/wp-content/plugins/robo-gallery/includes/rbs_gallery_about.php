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
wp_enqueue_style ( 	'toolbox-gallery-about', ROBO_GALLERY_URL.'css/admin/about.css', array( ), ROBO_GALLERY_VERSION );

echo '
	<div class="rbs_about_header">
		<img class="rbs_robogallery_logo" src="'.ROBO_GALLERY_URL.'about/robo-gallery.png" alt="Robo Gallery" />
		<img class="rbs_robosoft_logo" src="'.ROBO_GALLERY_URL.'about/robosoft.png" alt="RoboSoft" />
	</div>
	<div class="rbs_about_string1">
		'.__( 'Robo Gallery implemented by RoboSoft Team', 	'rbs_gallery' ).'
	</div>
	<div class="rbs_about_string2">
		'.__( 'More details about Robo Gallery you can see on our website', 	'rbs_gallery' ).':  
		<a href="http://www.robosoft.co/robogallery/" alt="robosoft.co">robosoft.co</a>
	</div>
	';
if(!ROBO_GALLERY_PRO){
	echo '
	<div class="rbs_about_string3">'.__( 'Robo Gallery Pro Features', 	'rbs_gallery' ).':</div>

	<div class="rbs_about_flex">
		<div class="rbs_about_listing col1">- '.__('Unlimited amount of the galleries', 'rbs_gallery').'</div>
		<div class="rbs_about_listing col2">- '.__('Unlimited amount of images in galleries', 'rbs_gallery').'</div>
	</div>
	<div class="rbs_about_flex">
		<div class="rbs_about_listing col1">- '.__('Custom hover style for border', 'rbs_gallery').'</div>
		<div class="rbs_about_listing col2">- '.__('Custom hover style for shadow', 'rbs_gallery').'</div>
	</div>
	<div class="rbs_about_flex">
		<div class="rbs_about_listing col1">- '.__('Unlimited multi-categories', 'rbs_gallery').'</div>
		<div class="rbs_about_listing col2">- '.__('High quality thumbnails', 'rbs_gallery').'</div>
	</div>
	<div class="rbs_about_flex">
		<div class="rbs_about_listing col1">- '.__('Gallery widget', 'rbs_gallery').'</div>
		<div class="rbs_about_listing col2">- '.__('Random ordering', 'rbs_gallery').'</div>
	</div>
	<div class="rbs_about_flex">
		<div class="rbs_about_listing col1">- '.__('Gallery menu colors', 'rbs_gallery').'</div>
		<div class="rbs_about_listing col2">- '.__('Gallery menu styles', 'rbs_gallery').'</div>
	</div>
	<div class="rbs_about_flex">
		<div class="rbs_about_listing col1">- '.__('Custom images ordering', 'rbs_gallery').'</div>
		<div class="rbs_about_listing col2">- '.__('Customizable hover style', 'rbs_gallery').'</div>
	</div>
	<div class="rbs_about_flex">
		<div class="rbs_about_listing col1">- '.__('Custom hover background color', 'rbs_gallery').'</div>
		<div class="rbs_about_listing col2">- '.__('Advanced images description settings', 'rbs_gallery').'</div>
	</div>
	
	<div class="rbs_about_button">
		<a href="http://robosoft.co/go.php?product=gallery&task=gopro" alt="'.__('Get Pro version', 'rbs_gallery').'">
			'.__('Get Pro version', 'rbs_gallery').'
		</a>
	</div>
	';
}
echo '<div class="rbs_about_string2">Copyright &copy; 2014 - 2016 RoboSoft '.__('All Rights Reserved', 'rbs_gallery').'.</div>
';