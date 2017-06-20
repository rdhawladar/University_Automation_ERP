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

function rbs_border_get_state_options( $value = false ) {
    $state_list = array( 
    	'none'=>'none',
    	'dotted'=>'dotted',
    	'dashed'=>'dashed',
    	'solid'=>'solid',
    	'double'=>'double',
    	'groove'=>'groove',
    	'ridge'=>'ridge',
    	'inset'=>'inset',
    	'outset'=>'outset',
    	'hidden'=>'hidden'
    );

    $state_options = '';
    foreach ( $state_list as $abrev => $state ) {
        $state_options .= '<option value="'. $abrev .'" '. selected( $value, $abrev, false ) .'>'. $state .'</option>';
    }

    return $state_options;
}

function jt_cmb2_border_field( $metakey, $post_id = 0 ) {
	echo jt_cmb2_get_border_field( $metakey, $post_id );
}

function rbs_border_render_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {

	$value = wp_parse_args( $value, array(
		'color' => 'rgb(229, 64, 40)',
		'style' => 'solid',
		'width' => '5'
	) );

	?>
<div class="form-horizontal">

	<div class="form-group">
	    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_width' ); ?>'"><?php _e( 'Width', 'rbs_gallery' ); ?></label>
	    <div class="col-sm-10">
	    <?php echo $field_type_object->input( array(
						'name'  => $field_type_object->_name( '[width]' ),
						'id'    => $field_type_object->_id( '_width' ),
						'value' => (int) $value['width'],
						'data-slider-value' => (int) $value['width'],
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
    	<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_style' ); ?>'"><?php _e( 'Style', 'rbs_gallery' ); ?></label>
	    <div class="col-sm-10">
	      <?php echo $field_type_object->select( array(
					'name'  => $field_type_object->_name( '[style]' ),
					'id'    => $field_type_object->_id( '_style' ),
					'class'   => 'cmb2_select',
					'options' => rbs_border_get_state_options( $value['style'] ),
					'desc'    => $field_type_object->_desc( true )
				) );
			?> 
	    </div>
  	</div>

  	<div class="form-group">
  		<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( '_color' ); ?>'"><?php _e( 'Color', 'rbs_gallery' ); ?></label>
	    <div class="col-sm-4">
	      <?php 
			echo  $field_type_object->input( array(
				'name'  			=> $field_type_object->_name( '[color]' ),
				'id'    			=> $field_type_object->_id( '_color' ),
				'class'             => 'form-control rbs_color',
				'data-default' 		=>  $value['color']  ,
				'data-alpha'        => 'true',
				'value' 			=> $value['color'] 
			)); 
		?> 
	    </div>
  	</div>

</div>
<?php
}
add_filter( 'cmb2_render_border', 'rbs_border_render_field_callback', 10, 5 );