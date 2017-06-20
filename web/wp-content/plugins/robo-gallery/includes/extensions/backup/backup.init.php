<?php
/*
*      Robo Gallery     
*      Version: 1.6
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

if(!function_exists('robo_gallery_backup_submenu_page')){
	add_action('admin_menu', 'robo_gallery_backup_submenu_page');
	function robo_gallery_backup_submenu_page() {
		add_submenu_page( 'edit.php?post_type=robo_gallery_table', 'Backup', 'Backup', 'manage_options', 'robo-gallery-backup', 'robo_gallery_backup_submenu_page_render' );
	}
	function robo_gallery_backup_submenu_page_render(){
		rbs_gallery_include('backup.form.php', plugin_dir_path( __FILE__ ));
	}
}

/* backup export + */
if(!function_exists('rbs_gallery_full_export')){
	function rbs_gallery_full_export(){
		if(isset($_POST['rbsGalleryFullExport']) && $_POST['rbsGalleryFullExport']==1 && check_admin_referer('rbs-gallery-backup-export', 'rbs-gallery-full-backup')  ){

			rbs_gallery_include('backup.class.php',  plugin_dir_path( __FILE__ ) );

			$export = new rbsGalleryExport('robo_gallery_table');
			$export->setArchiveDir(ABSPATH . 'tmp');

			$exportFileName = 'export_'.date("Y_j_n");
			if( isset($_POST['rbsGalleryBackupFullFilename']) && $_POST['rbsGalleryBackupFullFilename'] ){
				$exportFileName = sanitize_file_name($_POST['rbsGalleryBackupFullFilename']);
			}

			$info = pathinfo($exportFileName);
			if (!$info["extension"]){ 
				$exportFileName.='.zip'; 
			}
			
			$isExport = $export->exportPostsZip( array('post_type' => ROBO_GALLERY_TYPE_POST), $exportFileName);
			//$isExport = $export->exportPostsXml( array('post_type' => ROBO_GALLERY_TYPE_POST), $exportFileName );
			if(!$isExport) {
    			// show pretty error
    			var_dump($export->getError());
			}  else {

				//echo  $export->archivePath;
				//wp_redirect(get_permalink( 'edit.php?post_type=robo_gallery_table&page=robo-gallery-full-backup' ));
			}
			die();
		}
	}
	add_action( 'init', 'rbs_gallery_full_export' );
}

if(!function_exists('rbs_gallery_export')){
	function rbs_gallery_export(){
		if(isset($_POST['rbsGalleryExport']) && $_POST['rbsGalleryExport']==1 && check_admin_referer('rbs-gallery-backup-export', 'rbs-gallery-backup')  ){

			rbs_gallery_include('backup.class.php',  plugin_dir_path( __FILE__ ) );

			$export = new rbsGalleryExport('robo_gallery_table');
			$export->setArchiveDir(ABSPATH . 'tmp');


			$exportFileName = 'export_'.date("Y_j_n").'.xml';
			if( isset($_POST['rbsGalleryBackupFilename']) && $_POST['rbsGalleryBackupFilename'] ){
				$exportFileName = sanitize_file_name($_POST['rbsGalleryBackupFilename']);
			}

			$info = pathinfo($exportFileName);
			if (!$info["extension"]){ 
				$exportFileName.='.xml'; 
			}


			$isExport = $export->exportPostsXml(array('post_type' => ROBO_GALLERY_TYPE_POST), $exportFileName );
			if(!$isExport) {
    			// show pretty error
    			var_dump($export->getError());
			}  else {
				wp_redirect(get_permalink( 'edit.php?post_type=robo_gallery_table&page=robo-gallery-backup' ));
			}
			
			die();
		}
	}
	add_action( 'init', 'rbs_gallery_export' );
}
if( rbs_gallery_get_current_post_type() == ROBO_GALLERY_TYPE_POST && rbs_gallery_is_edit_page('list') ){
   if(!function_exists('rbs_gallery_robogalleryBackup')){
		function rbs_gallery_robogalleryBackup (){
			wp_enqueue_script('robo-gallery-backup', ROBO_GALLERY_URL.'js/admin/extensions/backup/rbs_backup_button.js', array( 'jquery' ), ROBO_GALLERY_VERSION, true ); 
		}
		add_action( 'in_admin_header', 'rbs_gallery_robogalleryBackup' );
	}
}

	




/* backup export - */