<?php 
/*
*      Robo Gallery     
*      Version: 1.2
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/
if ( ! defined( 'WPINC' ) )  die;
if( !is_admin() ) return ;


if(!function_exists('rbs_backup_error_message')){
	function rbs_backup_error_message($message, $type='error'){
		return '<div id="message" class="'.$type.'">'._($message).'</div>';
	}
}

if(!function_exists('rbs_get_file_upload_max_size')){
	function rbs_get_file_upload_max_size( $type = 0  ) {

	   // $max_size = rbs_parse_size(ini_get('post_max_size'));

	    if($type)
	   		$upload_max = rbs_parse_size(ini_get('post_max_size'));
	    else
	    	$upload_max = rbs_parse_size(ini_get('upload_max_filesize'));

	    if( (int) $upload_max ) return ($upload_max / 1024 / 1024).' Mb';
	    return __('Error: Can\'t check Maximum Upload File Size', 'rbs_gallery');
		    

	    if ($upload_max > 0 && $upload_max < $max_size) {
	      $max_size = $upload_max;
	    }

	  return $max_size;
	}

	function rbs_parse_size($size) {
	  $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
	  $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
	  if ($unit) {
	    return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
	  }
	  else {
	    return round($size);
	  }
	}
}
?>
<div class="wrap">
	<h1  class="rbs-nobackup">
		<?php _e('Robo Gallery Backup', 'rbs_gallery'); ?>
	</h1>
<br>

<?php 
	if( isset($_POST['rbsSubmitBackup']) ){
		if( check_admin_referer( 'rbs-gallery-backup-import', 'rbs-gallery-backup'  )  ){
			if (  $_FILES['rbsBackupFile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['rbsBackupFile']['tmp_name'])) {
				$tmp_name = $_FILES['rbsBackupFile']['tmp_name'];
				rbs_gallery_include('backup.class.php', plugin_dir_path( __FILE__ ));
	
				$export = new rbsGalleryExport('robo_gallery_table');
				
				if(isset($_POST['rbsGalleryBackupDuplicate']) && $_POST['rbsGalleryBackupDuplicate'] ){
					$export->duplicate = 1;
				}
				//echo $tmp_name;
				if( isset($_FILES['rbsBackupFile']['name']) && $_FILES['rbsBackupFile']['name']  ){
					$realName = $_FILES['rbsBackupFile']['name'];
					$info = pathinfo( $realName );
					if (isset($info["extension"]) && $info["extension"] ) { 
						//echo $info["extension"];
						switch ( strtolower( $info["extension"] ) ) {
							case 'zip':
								$result = $export->importPostsZip($tmp_name, $realName);
								break;
							
							case 'xml':
								$result = $export->importPostsXml($tmp_name);
								break;
							default:
								$result['errors'] = 'Error: please check backup file';
						}
					} else $result['errors'] = 'Error: please check backup file';
				} else $result['errors'] = 'Error: please check backup file';


				echo '<div class="card">';
					if( isset($result['errors']) && count($result['errors']) ){
						echo rbs_backup_error_message( __('Error Import ', 'rbs_gallery') );
						print_r($result['errors']);
					} else {
				
						echo '<h2>'.__('Success Import ', 'rbs_gallery').'</h2>';
						if( isset($result['import']) && is_array($result['import']) ){
							if( isset($result['import']['post'])  	)	echo '<p>'.__('Import Post', 'rbs_gallery').': '.$result['import']['post'].'</p>';
							if( isset($result['import']['element']) )	echo '<p>'.__('Import Images', 'rbs_gallery').': '.$result['import']['element'].'</p>';
							//if( isset($result['import']['file'])  	)	echo '<p> --- Import Images Files: '.$result['import']['file'].'</p>';
							echo "<hr>";
						}

						if( isset($result['duplicate']) && is_array($result['duplicate']) ){
							if( isset($result['duplicate']['post'])  	)	echo '<p>'.__('Duplicate Post', 'rbs_gallery').': '.$result['duplicate']['post'].'</p>';
							if( isset($result['duplicate']['element']) )	echo '<p>'.__('Duplicate Images', 'rbs_gallery').': '.$result['duplicate']['element'].'</p>';
							//if( isset($result['duplicate']['file'])  	)	echo '<p> --- Duplicate Images Files: '.$result['duplicate']['file'].'</p>';
							echo "<hr>";
						}


						if( isset($result['skipped']) && is_array($result['skipped']) ){
							if( isset($result['skipped']['post'])  	)	echo '<p>'.__('Skipped Post', 'rbs_gallery').': '.	$result['skipped']['post']. '</p>';
							if( isset($result['skipped']['element']) )	echo '<p>'.__('Skipped Images', 'rbs_gallery').': '.$result['skipped']['element'].'</p>';
							//if( isset($result['skipped']['file'])  	)	echo '<p> --- Import Images Files: '.$result['skipped']['file'].'</p>';
						}
					}
				echo '</div>';
				//print_r($result);
			} else {
				echo rbs_backup_error_message( __('Error: please check backup file', 'rbs_gallery') );
			}
		} else {
			echo rbs_backup_error_message( __('Error: check secure', 'rbs_gallery') );
		}
	}
if(!function_exists('rbs_backup_tabs')){
	function rbs_backup_tabs( $current = 'export' ) {
	    $tabs = array( 'exportfull' => 'Full Export Gallery', 'export' => 'Export Gallery', 'import' => 'Import Gallery' );
	    //echo '<div id="icon-themes" class="icon32"><br></div>';
	    echo '<h2 class="nav-tab-wrapper">';
		    foreach( $tabs as $tab => $name ){
		        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
		        echo "<a class='nav-tab$class' href='edit.php?post_type=robo_gallery_table&page=robo-gallery-backup&tab=$tab'>$name</a>";
		    }
	    echo '</h2>';
	}
}

$tab = 'export';
if ( isset( $_GET['tab'] ) )  $tab = preg_replace("/[^a-z]/", '', $_GET['tab']);
if ( isset( $_POST['tab'] ) ) $tab = preg_replace("/[^a-z]/", '', $_POST['tab']);
if( !in_array( $tab, array('import','exportfull','export') ) ) $tab = 'export';

rbs_backup_tabs( $tab);

$today = date("Y_j_n"); 

switch ($tab) {
	case 'exportfull':
	?>
	<br>
	<p class="description" id="rbsFullBackupFile-description"><?php _e('You can use Full Backup options to make backup of configured galleries settings and images. As result you\'ll get archive with XML file of galleries settings and all images of your galleries'); ?></p>
	<table class="form-table">
		<tbody>
			<form method="post" enctype="multipart/form-data" class="rbs_download_full_backup_export" action="<?php echo admin_url().'edit.php?post_type=robo_gallery_table&page=robo-gallery-backup&tab='.$tab; ?>">
			<tr>
				<th scope="row"><label for="rbsGalleryFullBackupFilename"><?php _e('File Name', 'rbs_gallery'); ?></label></th>
				<td>
					<input type="text" class="regular-text" id="rbsGalleryFullBackupFilename" name="rbsGalleryBackupFullFilename" value="<?php echo 'export_'.$today;?>" > 
					
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<input type="submit" class="button button-primary " value="<?php _e('Download Full Backup'); ?>" name="rbsDownloadFullBackup">
					<input type="hidden" name="rbsGalleryFullExport" value="1">
					<?php wp_nonce_field( 'rbs-gallery-backup-export', 'rbs-gallery-full-backup' ); ?>
				</td>
			</tr>
			</form>
		</tbody>
	</table>
	<?php
		break;
	default:
 	case 'export':
?>
	<br />
	<p class="description" id="rbsBackupFile-description"><?php _e('After EXPORT copy images from server folder: {Wordpress folder}/wp-content/uploads  to the new location by FTP'); ?></p>
	<table class="form-table">

		<tbody>
			<form method="post" enctype="multipart/form-data" class="rbs_download_backup_export" action="<?php echo admin_url().'edit.php?post_type=robo_gallery_table&page=robo-gallery-backup&tab='.$tab; ?>">
			<tr>
				<th scope="row"><label for="rbsGalleryBackupFilename"><?php _e('File Name', 'rbs_gallery'); ?></label></th>
				<td>
					<input type="text" class="regular-text" id="rbsGalleryBackupFilename" name="rbsGalleryBackupFilename" value="<?php echo 'export_'.$today;?>" > 
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<input type="submit" class="button button-primary " value="<?php _e('Download Backup'); ?>" name="rbsDownloadBackup">
					<input type="hidden" name="rbsGalleryExport" value="1">
					<?php wp_nonce_field( 'rbs-gallery-backup-export', 'rbs-gallery-backup' ); ?>
				</td>
			</tr>
			</form>
		</tbody>
	</table>
<?php 
	break;
	case 'import':
?>
	<table class="form-table">
		<tbody>
			<form method="post" enctype="multipart/form-data" class="wp-upload-form" action="<?php echo admin_url().'edit.php?post_type=robo_gallery_table&page=robo-gallery-backup&tab='.$tab; ?>">
			<tr>
				<th scope="row"  valign="top"><label><?php _e('Sever Environment', 'rbs_gallery'); ?></label></th>
				<td>
					<fieldset>
						<p><?php echo __('Max upload size', 'rbs_gallery').': <strong>'.rbs_get_file_upload_max_size().'</strong>'; ?></p>
						<p><?php echo __('Max POST size', 'rbs_gallery').': <strong>'.rbs_get_file_upload_max_size(1).'</strong>'; ?></p>
						<p><a target="_blank" href="https://wordpress.org/support/topic/how-to-increase-the-max-upload-size"><?php _e('How to increase the max upload size?', 'rbs_gallery'); ?></a></p>
					</fieldset>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="rbsGalleryBackupDuplicate"><?php _e('Duplicate', 'rbs_gallery'); ?></label></th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span><?php _e('Duplicate', 'rbs_gallery'); ?></span></legend>
						<label for="rbsGalleryBackupDuplicate">
							<input name="rbsGalleryBackupDuplicate" id="rbsGalleryBackupDuplicate" value="1" type="checkbox">
							<?php _e('Make copy if such gallery or image already exist in system', 'rbs_gallery'); ?>
						</label>
					</fieldset>
				</td>
			</tr>



			<tr>
				<th scope="row"><label for="rbsBackupFile"><?php _e('Select backup file', 'rbs_gallery'); ?></label></th>
				<td>	
					<label class="screen-reader-text" for="pluginzip">Import xml file</label>
					<input type="file" name="rbsBackupFile" id="rbsBackupFile">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" class="button button-primary " value="<?php _e('Upload XML'); ?>" name="rbsSubmitBackup">
				</td>
			</tr>
			<?php wp_nonce_field( 'rbs-gallery-backup-import', 'rbs-gallery-backup' ); ?>
			</form>
		</tbody>
	</table>
<?php } ?>
</div>
<?php 