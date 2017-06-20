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


function rbs_size_get_font_params_row( $value,  $text, $name, $curent = '', $demoId  ) {
	//echo '<br/>'.$name.$value.$curent.'<br/>';
	$html = '';
	$html .= '<label class="btn btn-info '.($value==$curent?'active':'').'">';
	 	$html .= '<input type="checkbox" '
	 		.'class="rbs_fontParams" '
	 		.'autocomplete="off" '
	 		.'name="'.$name.'" '
	 		.'data-font-demoid="'.$demoId.'" '
	 		.'data-font-option="'.$value.'" '
	 		.($value==$curent?' checked ':'').' '
	 		.' value="'.$value.'"> ';
	 	$html .= $text ;
	$html .= '</label>';
	return $html;
}


function jt_cmb2_font_field( $metakey, $post_id = 0 ) {
	echo jt_cmb2_get_font_field( $metakey, $post_id );
}

function jt_cmb2_render_font_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {
	$default = $field->args('default');

	$level = $field->args('level')?1:0;

	$value = wp_parse_args( $value, array(
		'enabled'		=> isset($default['enabled']) 		? $default['enabled'] 				:'0',
		'fontSize' 		=> isset($default['fontSize']) 		? $default['fontSize'] 				:'12',

		'fontLineHeight'=> isset($default['fontLineHeight'])? $default['fontLineHeight'] 		:'100',
		
		'fontBold' 		=> isset($default['fontBold']) 		? $default['fontBold'] 				:'normal',
		'fontItalic' 	=> isset($default['fontItalic']) 	? $default['fontItalic'] 			:'normal',
		'fontUnderline' => isset($default['fontUnderline']) ? $default['fontUnderline'] 		:'none',
		'iconSelect'	=> isset($default['iconSelect']) 	? $default['iconSelect'] 			:'glyphicon-new-window',
		'borderSize'	=> 0,
		
		'color' 		=> isset($default['color']) 		? $default['color'] 				:'#ffffff',
		'colorHover'	=> isset($default['colorHover']) 	? $default['colorHover'] 			:'#ffffff',
		'colorBg'		=> isset($default['colorBg']) 		? $default['colorBg'] 				:'#e54028',
		'colorBgHover'	=> isset($default['colorBgHover']) 	? $default['colorBgHover'] 			:'#b73725',
	) );
	
?>
<div class="form-horizontal">

	<div class="form-group">
	    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( 'enabled' ); ?>'">
	    	<?php echo esc_html( $field_type_object->_text( 'font_hfont_text', 'Show' ) ); ?>
	    </label>
	     <div class="col-sm-<?php echo $level?'8 rbs_disabled':'10'; ?>">
	     	<?php
			echo 
				'<input type="checkbox" data-toggle="toggle" data-onstyle="info" class="rbs_action_element" ' 
				.'name="'.$field_type_object->_name('[enabled]').'" '
				.'id="'. $field_type_object->_id('enabled').'" '
				.( $value['enabled'] ? ' checked ' : '' )
				.'value="1" '
				.'data-font-demoid="'.$field_type_object->_id( 'color' ).'" '
				.'data-depends=".'.$field_type_object->_id( 'optionsBlok' ).'" '
				.'>';
			 ?>
	    </div>
	    <?php if($level){ ?>
		    <div class="col-sm-2 rbs-block-pro"><?php echo ROBO_GALLERY_LABEL_PRO; ?></div>
		<?php } ?>
	</div>

	<div class="<?php echo $field_type_object->_id( 'optionsBlok' );?>">

	<?php if( $field->args('icon') ){ ?>
		<div class="form-group">		
			<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( 'iconSelect' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'font_icon_text', 'Icon' ) ); ?></label>
			<div class="col-sm-1">
				<button class="btn btn-default" role="iconpicker" data-icon="<?php echo $value['iconSelect'];?>" data-inputid="<?php echo $field_type_object->_id('iconSelect');?>" data-search="false"></button>
			</div>
			<div class="col-sm-4">
				 <?php echo $field_type_object->input( array(
							'name'  => $field_type_object->_name('[iconSelect]'),
							'id'    => $field_type_object->_id('iconSelect'),
							'value' => $value['iconSelect'],
							'type'  => 'text',
							'class'	=> 'form-control col-sm-2'
						) ); 
					?>
			</div>
		</div>
	<?php } else {   ?>
		<div class="form-group">
		    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_hfont' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'font_hfont_text', 'Font Style' ) ); ?></label>
		    <div class="col-sm-10">

		    	<div class="btn-group " data-toggle="buttons"> <!-- rbs_checkbox -->
				<?php
					echo rbs_size_get_font_params_row( 'bold',  	'Bold',			$field_type_object->_name('[fontBold]'), 		$value['fontBold'] , 		$field_type_object->_id( 'demo' ));
					echo rbs_size_get_font_params_row( 'italic',  	'Italic', 		$field_type_object->_name('[fontItalic]'), 		$value['fontItalic'], 		$field_type_object->_id( 'demo' ) );
					echo rbs_size_get_font_params_row( 'underline',  'Underline',	$field_type_object->_name('[fontUnderline]'), 	$value['fontUnderline'], 	$field_type_object->_id( 'demo' ) );
				 ?>
				</div>
		    </div>
		</div>
	
	<?php }   ?>

	  	<div class="form-group">
	    	<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( 'fontSize' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'font_vfont_text', 'Font Size' ) ); ?></label>
		    <div class="col-sm-10">
		      <?php echo $field_type_object->input( array(
							'name'  			=> $field_type_object->_name( '[fontSize]' ),
							'id'    			=> $field_type_object->_id( 'fontSize' ),
							'value' 			=> (int) $value['fontSize'],
							'data-slider-value' => (int) $value['fontSize'],
							'type'  			=> 'text',
							'class' 			=> 'small-text rbs_slider rbs_font_slider rbs_font_size',
							'data-slider-min'	=> 5,
							'data-slider-max'	=> 50,
							'data-slider-step'	=> 1,
							'data-font-demoid'	=> !$field->args('icon') ? $field_type_object->_id( 'demo' ):'',
					) ); 
				?> px
		    </div>
	  	</div>

	  	<div class="form-group">
	    	<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( 'fontLineHeight' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'font_vfont_text', 'Line Height' ) ); ?></label>
		    <div class="col-sm-10">
		      <?php echo $field_type_object->input( array(
							'name'  			=> $field_type_object->_name( '[fontLineHeight]' ),
							'id'    			=> $field_type_object->_id( 'fontLineHeight' ),
							'value' 			=> (int) $value['fontLineHeight'],
							'data-slider-value' => (int) $value['fontLineHeight'],
							'type'  			=> 'text',
							'class' 			=> 'small-text rbs_slider rbs_font_slider rbs_font_line ',
							'data-slider-min'	=> 50,
							'data-slider-max'	=> 300,
							'data-slider-step'	=> 1,
							'data-font-demoid'	=> !$field->args('icon') ? $field_type_object->_id( 'demo' ):'',
					) ); 
				?> %
		    </div>
	  	</div>

<?php if( $field->args('icon') ){ ?>
		<div class="form-group">
	    	<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( 'borderSize' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'font_borderSize_text', 'Border Size' ) ); ?></label>
		    <div class="col-sm-10">
		      <?php echo $field_type_object->input( array(
							'name'  			=> $field_type_object->_name( '[borderSize]' ),
							'id'    			=> $field_type_object->_id( 'borderSize' ),
							'value' 			=> (int) $value['borderSize'],
							'data-slider-value' => (int) $value['borderSize'],
							'type'  			=> 'text',
							'class' 			=> 'small-text rbs_slider rbs_font_slider',
							'data-slider-min'	=> 0,
							'data-slider-max'	=> 30,
							'data-slider-step'	=> 1,
					) ); 
				?> px
		    </div>
	  	</div>
<?php }   ?>


	  	<div class="form-group">
	  		<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( 'color' ); ?>'">
	  			<?php echo esc_html( $field_type_object->_text( 'font_color_text', 'Color' ) ); ?>
	  		</label>
		    <div class="col-sm-4">
		      <?php 
				echo  $field_type_object->input( array(
					'name'  		=> $field_type_object->_name( '[color]' ),
					'id'    		=> $field_type_object->_id( 'color' ),
					'class'         => 'form-control rbs_color rbs_font_color',
					'data-default' 	=> $value['color'],
					'data-alpha'    => 'true',
					'value' 		=> $value['color'],
					'data-demo-id'	=> !$field->args('icon') ? $field_type_object->_id( 'demo' ):'',
				)); 
			?> 
		    </div>
	  	</div>

	
	  	<div class="form-group">
	  		<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( 'colorHover' ); ?>'">
	  			<?php echo esc_html( $field_type_object->_text( 'font_color_text', 'Hover Color' ) ); ?>
	  		</label>
		    <div class="col-sm-4">
		      <?php 
				echo  $field_type_object->input( array(
					'name'  		=> $field_type_object->_name( '[colorHover]' ),
					'id'    		=> $field_type_object->_id( 'colorHover' ),
					'class'         => 'form-control rbs_color rbs_font_color',
					'data-default' 	=> $value['colorHover'],
					'data-alpha'    => 'true',
					'value' 		=> $value['colorHover']
				)); 
			?> 
		    </div>
	  	</div>
	<?php if( $field->args('icon') ){ ?>
	  	<div class="form-group">
	  		<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( 'colorBg' ); ?>'">
	  			<?php echo esc_html( $field_type_object->_text( 'font_color_text', 'Bg Color' ) ); ?>
	  		</label>
		    <div class="col-sm-4">
		      <?php 
				echo  $field_type_object->input( array(
					'name'  		=> $field_type_object->_name( '[colorBg]' ),
					'id'    		=> $field_type_object->_id( 'colorBg' ),
					'class'         => 'form-control rbs_color rbs_font_color',
					'data-default' 	=> $value['colorBg'],
					'data-alpha'    => 'true',
					'value' 		=> $value['colorBg']
				)); 
			?> 
		    </div>
	  	</div>

	  	<div class="form-group">
	  		<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( 'colorBgHover' ); ?>'">
	  			<?php echo esc_html( $field_type_object->_text( 'font_color_text', 'Bg Color Hover' ) ); ?>
	  		</label>
		    <div class="col-sm-4">
		      <?php 
				echo  $field_type_object->input( array(
					'name'  		=> $field_type_object->_name( '[colorBgHover]' ),
					'id'    		=> $field_type_object->_id( 'colorBgHover' ),
					'class'         => 'form-control rbs_color rbs_font_color',
					'data-default' 	=> $value['colorBgHover'],
					'data-alpha'    => 'true',
					'value' 		=> $value['colorBgHover'],
				)); 
			?> 
		    </div>
	  	</div>
	<?php } else { ?>
	  	<div class="form-group">
	  	<?php echo '
	  		<div class="col-sm-8 col-sm-offset-2 rbs_hover_demo" '
	  		.'id="'.$field_type_object->_id( 'demo' ).'" '
	  		.'style="'
	  			.'color: '.$value['color'].'; '
	  			.'font-size:'.(int) $value['fontSize'].'px; '
	  			.'line-height:'.(int) $value['fontLineHeight'].'%; '
	  			.'font-weight:'		.($value['fontBold']=='bold'			?'bold'		:'normal')	.'; '
				.'font-style:'		.($value['fontItalic']=='italic'		?'italic'	:'normal')	.'; '
	  			.'text-decoration:'	.($value['fontUnderline']=='underline'	?'underline':'none')	.'; '
	  		.'">'
	  		.'Demo Text'  
			.'</div>';
		?> 
	  	</div>
	<?php } ?>
	 </div>
</div>
<?php
}
add_filter( 'cmb2_render_font', 'jt_cmb2_render_font_field_callback', 10, 5 );