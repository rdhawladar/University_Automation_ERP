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
if(!function_exists('rbs_gallery_topblock')){
	function rbs_gallery_topblock(){
		wp_enqueue_script( 	'gallery-gallery-topblock', ROBO_GALLERY_URL.'js/admin/topblock.js', array( 'jquery' ), ROBO_GALLERY_VERSION, true );
		wp_enqueue_style ( 	'toolbox-gallery-topblock', ROBO_GALLERY_URL.'css/admin/topblock.css', array( ), ROBO_GALLERY_VERSION );
		$editNew = rbs_gallery_is_edit_page('new') || rbs_gallery_is_edit_page('edit');
		echo '<div class="rbsTopBlock rbs_getproversion_blank">
			<div class="rbsTopBig"><span class="dashicons dashicons-cart"></span>'.	__( 'Get Pro version' , 'rbs_gallery' ).'</div>
			<div class="rbsTopSmall">'.__( 'with PRO version you get more advanced functionality and even more flexibility in settings' , 'rbs_gallery' ).' </div>
		</div>';
		if( defined('ROBO_GALLERY_SPECIAL') && ROBO_GALLERY_SPECIAL ){
			if( ROBO_GALLERY_SPECIAL==1 ){
				echo '<div class="rbsTopBlockFree rbs_getproversionfree_blank">
					<div class="rbsTopSmall"><span class="dashicons dashicons-carrot"></span> '.__( 'Do You wish to get PRO version for FREE ?' , 'rbs_gallery' ).' </div>
				</div>';	
			}
			if(ROBO_GALLERY_SPECIAL==2){
				echo '<div class="rbsTopBlockFree rbs_getproversiontrans_blank">
					<div class="rbsTopSmall"><span class="dashicons dashicons-carrot"></span> '.__( 'Do You wish to get PRO version for translate?' , 'rbs_gallery' ).' </div>
				</div>';
			}
		}
		/*  */
	}
	if(!ROBO_GALLERY_PRO) add_action( 'in_admin_header', 'rbs_gallery_topblock' );
}
