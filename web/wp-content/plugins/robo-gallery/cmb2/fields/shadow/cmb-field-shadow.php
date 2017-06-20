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


function jt_cmb2_shadow_field( $metakey, $post_id = 0 ) {
	echo jt_cmb2_get_shadow_field( $metakey, $post_id );
}

function jt_cmb2_render_shadow_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {

	$value = wp_parse_args( $value, array(
		'color' 	=> 'rgba(34, 25, 25, 0.4)',
		'hshadow' 	=> '0',
		'vshadow' 	=> '5',
		'bshadow'	=> '7',
	) );
?>
<div class="form-horizontal">
	
	<div class="form-group">
	    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_hshadow' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'shadow_hshadow_text', 'H-shadow' ) ); ?></label>
	    <div class="col-sm-10">
		    <?php echo $field_type_object->input( array(
						'name'  => $field_type_object->_name( '[hshadow]' ),
						'id'    => $field_type_object->_id( '_hshadow' ),
						'value' => (int) $value['hshadow'],
						'data-slider-value' => (int) $value['hshadow'],
						'type'  => 'text',
						'class' => 'small-text rbs_slider',
						'data-slider-min'=>-50,
						'data-slider-max'=>50,
						'data-slider-step'=>1
					) ); 
			?>   px
	    </div>
	</div>

	

  	<div class="form-group">
    	<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_vshadow' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'shadow_vshadow_text', 'V-shadow' ) ); ?></label>
	    <div class="col-sm-10">
	      <?php echo $field_type_object->input( array(
						'name'  => $field_type_object->_name( '[vshadow]' ),
						'id'    => $field_type_object->_id( '_vshadow' ),
						'value' => (int) $value['vshadow'],
						'data-slider-value' => (int) $value['vshadow'],
						'type'  => 'text',
						'class' => 'small-text  rbs_slider',
						'data-slider-min'=>-50,
						'data-slider-max'=>50,
						'data-slider-step'=>1
				) ); 
			?> px
	    </div>
  	</div>

  	<div class="form-group">
	    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_bshadow' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'shadow_bshadow_text', 'Blur' ) ); ?></label>
	    <div class="col-sm-10">
		    <?php echo $field_type_object->input( array(
						'name'  => $field_type_object->_name( '[bshadow]' ),
						'id'    => $field_type_object->_id( '_bshadow' ),
						'value' => (int) $value['bshadow'],
						'data-slider-value' => (int) $value['bshadow'],
						'type'  => 'text',
						'class' => 'small-text rbs_slider',
						'data-slider-min'=>0,
						'data-slider-max'=>50,
						'data-slider-step'=>1
					) ); 
			?>   px
	    </div>
	</div>

  	<div class="form-group">
  		<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_color' ); ?>'"><?php echo esc_html( $field_type_object->_text( 'shadow_color_text', 'Color' ) ); ?></label>
	    <div class="col-sm-4">
	      <?php 
			echo  $field_type_object->input( array(
				'name'  		=> $field_type_object->_name( '[color]' ),
				'id'    		=> $field_type_object->_id( '_color' ),
				'class'         => 'form-control rbs_color',
				'data-default' 	=>  $value['color'] ,
				'data-alpha'    => 'true',
				'value' 		=>  $value['color'], 
			)); 
		?> 
	    </div>
  	</div>

</div>
<?php
}
add_filter( 'cmb2_render_shadow', 'jt_cmb2_render_shadow_field_callback', 10, 5 );