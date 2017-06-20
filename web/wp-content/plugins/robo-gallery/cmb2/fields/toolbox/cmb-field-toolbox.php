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


class RBS_TOOLBOX {

	public function hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'rbs_setup_admin_scripts' ) );
		if(!ROBO_GALLERY_PRO) add_action( 'in_admin_header', array( $this, 'rbs_setup_admin_header' ) );
		add_action( 'in_admin_header', array( $this, 'rbs_setup_admin_script' ) );
	}
	
	public function rbs_setup_admin_script(){
		echo '<script>'
			.'var ROBO_GALLERY_PRO = '.ROBO_GALLERY_PRO.';'
		.'</script>';
	}

	public function rbs_setup_admin_header(){
		echo '<div id="rbs_showInformation" '
						.'style="display: none;" '
						.'data-body="rbs_edit" '
						.'data-open="0" '
						.'data-title="'.__('Get Robo Gallery Pro version', 'rbs_gallery').'" '
						.'data-close="'.__('Close', 'rbs_gallery').'" '
						.'data-info="'.__('Get Pro version', 'rbs_gallery').'"'
					.'>'
					.__('This function available in PRO version', 'rbs_gallery')
				.'</div>';
	}

	public function rbs_setup_admin_scripts() {

		wp_enqueue_media();
		wp_enqueue_style("wp-jquery-ui-dialog");
		wp_enqueue_script('jquery-ui-dialog');

		if(!ROBO_GALLERY_PRO){
			wp_enqueue_script('robo-gallery-info', ROBO_GALLERY_URL.'js/admin/info.js', array( 'jquery' ), ROBO_GALLERY_VERSION, false ); 
			wp_enqueue_style ('robo-gallery-info', ROBO_GALLERY_URL.'css/admin/info.css', array( ), ROBO_GALLERY_VERSION );
		}

		//bootstrap
		wp_enqueue_script( 	'rbs_bootstrap', 			ROBO_GALLERY_URL.'addons/bootstrap/js/bootstrap.min.js', 		array('jquery'), ROBO_GALLERY_VERSION, false);
		wp_enqueue_style ( 	'rbs_bootstrap', 			ROBO_GALLERY_URL.'addons/bootstrap/css/bootstrap.css',			array(), ROBO_GALLERY_VERSION, 'all');
		//wp_enqueue_style ( 'rbs_bootstrap_theme', 	ROBO_GALLERY_URL.'addons/bootstrap/bootstrap-theme.css' );

		//checkbox
		wp_enqueue_script( 'rbs-toolbox-toggles-js', 	ROBO_GALLERY_URL.'addons/toggles/js/bootstrap-toggle.js', 	array( 'jquery', 'rbs_bootstrap' ), ROBO_GALLERY_VERSION, false );
		wp_enqueue_style(  'rbs-toolbox-toggles-css',	ROBO_GALLERY_URL.'addons/toggles/css/bootstrap-toggle.css', 	array(), ROBO_GALLERY_VERSION, 'all' );

		//iconPicker
		wp_enqueue_script( 	'rbs-toolbox-iconset', 		ROBO_GALLERY_URL.'addons/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.1.0.min.js', 		array( 'jquery', 'rbs_bootstrap' ), ROBO_GALLERY_VERSION, true );
		wp_enqueue_script( 	'rbs-toolbox-icon', 		ROBO_GALLERY_URL.'addons/bootstrap-iconpicker/js/bootstrap-iconpicker.js', 							array( 'jquery', 'rbs_bootstrap', 'rbs-toolbox-iconset' ), ROBO_GALLERY_VERSION, true );		
		wp_enqueue_style( 	'rbs-toolbox-icon-css', 	ROBO_GALLERY_URL.'addons/bootstrap-iconpicker/css/bootstrap-iconpicker.css', 						array(), ROBO_GALLERY_VERSION, 'all' );
		wp_enqueue_style( 	'rbs-toolbox-icon-fonts', 	ROBO_GALLERY_URL.'addons/bootstrap-iconpicker/icon-fonts/font-awesome-4.1.0/css/font-awesome.css', 	array(), ROBO_GALLERY_VERSION, 'all' );
			
		//color
		wp_enqueue_script( 'rbs-toolbox-color-tinycolor', ROBO_GALLERY_URL.'addons/color/bootstrap.colorpickersliders.tinycolor.js', 	array( 'jquery', 'rbs_bootstrap' ), ROBO_GALLERY_VERSION, false );
		wp_enqueue_script( 'rbs-toolbox-color', ROBO_GALLERY_URL.'addons/color/bootstrap.colorpickersliders.js', 						array( 'jquery', 'rbs_bootstrap' ), ROBO_GALLERY_VERSION, false );
		wp_enqueue_style( 'rbs-toolbox-color', ROBO_GALLERY_URL.'addons/color/bootstrap.colorpickersliders.css', 						array(), ROBO_GALLERY_VERSION, 'all' );

		//slider
		wp_enqueue_script( 'rbs-toolbox-bootstrap-slider', ROBO_GALLERY_URL.'addons/bootstrap-slider/js/bootstrap-slider.js', 	array( 'jquery', 'rbs_bootstrap' ), ROBO_GALLERY_VERSION, false );
		wp_enqueue_style( 'rbs-toolbox-bootstrap-slider', ROBO_GALLERY_URL.'addons/bootstrap-slider/css/bootstrap-slider.css', 	array(), ROBO_GALLERY_VERSION, 'all' );
	
		if(!get_option(ROBO_GALLERY_PREFIX.'switchStyle', 0)){
			//select
			wp_enqueue_script('rbs-toolbox-bootstrap-select', ROBO_GALLERY_URL.'addons/bootstrap-select/js/bootstrap-select.min.js', 	array( 'jquery', 'rbs_bootstrap' ), ROBO_GALLERY_VERSION, true );
			wp_enqueue_style( 'rbs-toolbox-bootstrap-select', ROBO_GALLERY_URL.'addons/bootstrap-select/css/bootstrap-select.css', 	array(), ROBO_GALLERY_VERSION, 'all' );
		}

		//admin.base
		wp_register_script( 'rbs-toolbox-admin-edit', ROBO_GALLERY_URL.'js/admin/edit.js', 	array( 'jquery' ), ROBO_GALLERY_VERSION, true );
		
		$translation_array = array(
			'rbs_info_clone_text' => __( 'disabled because you select gallery clone option', 'rbs_robo_gallery' ),
		);
		wp_localize_script( 'rbs-toolbox-admin-edit', 'rbs_toolbox_translation', $translation_array );
		wp_enqueue_script(  'rbs-toolbox-admin-edit' );

		wp_enqueue_style ( 	'rbs-toolbox-admin-edit',  ROBO_GALLERY_URL.'css/admin/edit.css' );
	}
}
$rbs_tololbox = new RBS_TOOLBOX();
$rbs_tololbox->hooks();