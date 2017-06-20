<?php
/*
*      Robo Gallery     
*      Version: 1.3.5
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

class RoboGalleryActivator {
	public static function activate() {
		add_option( 'RoboGalleryInstall', 'now' );
	}

	public static function deactivate() {

	}
}
