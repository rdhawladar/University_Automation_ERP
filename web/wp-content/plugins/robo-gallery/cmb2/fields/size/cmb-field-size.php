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


function rbs_size_get_source_row( $value,  $text, $name, $curent = '', $icon = '' ) {
	$html = '';
	$html .= '<label class="btn '.($value==$curent? 'btn-info active' : 'btn-default').'">';
	 	$html .= '<input type="radio" name="'.$name.'" '.($value==$curent?'checked':'').' value="'.$value.'"> ';
	 	$html .= $text ;
	 	if($icon) $html .= ' <i class="'.$icon.'"></i>';
	 	
	$html .= '</label>';
	return $html;
}


function jt_cmb2_render_size_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {

	$value = wp_parse_args( $value, array(
		'height'	=> 140,
		'width' 	=> 240,
		'source' 	=> 'medium',
		'orderby'	=> 'categoryD'
	) );

	$level = $field->args('level')?1:0;
?>
<div class="form-horizontal">
	<div class="form-group">
    	<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_orderby' ); ?>'">
    		<?php echo esc_html( $field_type_object->_text( 'size_orderby_text', 'Order By' ) ); ?>
    	</label>

	    <div class="col-sm-<?php echo $level?'9':'10'; ?>">
			<div class="btn-group rbs_checkbox <?php echo $level?' rbs_disabled':''; ?>" data-toggle="buttons">
			<?php
				echo rbs_size_get_source_row( 'categoryD',  'Category',$field_type_object->_name('[orderby]'), $value['orderby'], 'glyphicon glyphicon-menu-down' );
				echo rbs_size_get_source_row( 'categoryU',  'Category',$field_type_object->_name('[orderby]'), $value['orderby'], 'glyphicon glyphicon-menu-up' );

				echo rbs_size_get_source_row( 'titleD',  	'Title', 	$field_type_object->_name('[orderby]'), $value['orderby'], 'glyphicon glyphicon-menu-down' );
				echo rbs_size_get_source_row( 'titleU',  	'Title', 	$field_type_object->_name('[orderby]'), $value['orderby'], 'glyphicon glyphicon-menu-up' );
				
				echo rbs_size_get_source_row( 'dateD',  	'Date', 	$field_type_object->_name('[orderby]'), $value['orderby'], 'glyphicon glyphicon-menu-down' );
				echo rbs_size_get_source_row( 'dateU',  	'Date', 	$field_type_object->_name('[orderby]'), $value['orderby'], 'glyphicon glyphicon-menu-up' );
				
				echo rbs_size_get_source_row( 'random',  	'Random',	$field_type_object->_name('[orderby]'), $value['orderby'] );
				//echo rbs_size_get_source_row( 'full',  		'Full', 	$field_type_object->_name('[orderby]'), $value['orderby'] );
			 ?>
			</div>
	    </div>
	    <?php if($level){ ?>
		   	<div class="col-sm-1 rbs-block-pro"><?php echo ROBO_GALLERY_ICON_PRO; ?></div>
		<?php } ?>
  	</div>

	

  	<div class="form-group">
    	<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_source' ); ?>'">
    		<?php echo esc_html( $field_type_object->_text( 'size_source_text', 'Source' ) ); ?>
    	</label>
	    <div class="col-sm-<?php echo $level?'8':'10'; ?>">
			<div class="btn-group rbs_checkbox<?php echo $level?' rbs_disabled rbs-block-pro':''; ?>" data-toggle="buttons">
			<?php
				echo rbs_size_get_source_row( 'thumbnail',  'Thumbnail',$field_type_object->_name('[source]'), $value['source'] );
				echo rbs_size_get_source_row( 'medium',  	'Medium', 	$field_type_object->_name('[source]'), $value['source'] );
				echo rbs_size_get_source_row( 'large',  	'Large',	$field_type_object->_name('[source]'), $value['source'] );
				echo rbs_size_get_source_row( 'full',  		'Full', 	$field_type_object->_name('[source]'), $value['source'] );
			 ?>
			</div>
	    </div>
	    <?php if($level){ ?>
		   	<div class="col-sm-2 rbs-block-pro"><?php echo ROBO_GALLERY_LABEL_PRO; ?></div>
		<?php } ?>
  	</div>
	
	<div class="form-group rbs_size_width"  style="display: none;"> 
	    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_width' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'size_width_text', 'Res. Width' ) ); ?></label>
	    <div class="col-sm-10">
			<?php echo $field_type_object->input( array(
				'name'  => $field_type_object->_name( '[width]' ),
				'id'    => $field_type_object->_id( '_width' ),
				'value' => (int) $value['width'],
				'data-slider-value' => (int) $value['width'],
				'type'  => 'text',
				'class' => 'small-text rbs_slider',
				'data-slider-min'=>20,
				'data-slider-max'=>500,
				'data-slider-step'=>1
			) ); ?> px
		</div>
	</div>

	<div class="form-group rbs_size_height" style="display: none;">
    	<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_height' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'size_height_text', 'Res. Height' ) ); ?></label>
	    <div class="col-sm-10">
			<?php echo $field_type_object->input( array(
				'name'  => $field_type_object->_name( '[height]' ),
				'id'    => $field_type_object->_id( '_height' ),
				'value' => (int) $value['height'],
				'data-slider-value' => (int) $value['height'],
				'type'  => 'text',
				'class' => 'small-text rbs_slider',
				'data-slider-min'=>20,
				'data-slider-max'=>500,
				'data-slider-step'=>1
			) ); ?> px
 		</div>
  	</div>
</div>
<?php echo $field_type_object->_desc( true );
}
add_filter( 'cmb2_render_size', 'jt_cmb2_render_size_field_callback', 10, 5 );
