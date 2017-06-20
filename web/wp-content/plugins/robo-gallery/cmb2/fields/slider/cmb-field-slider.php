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


function jt_cmb2_slider_field( $metakey, $post_id = 0 ) {
	echo jt_cmb2_get_slider_field( $metakey, $post_id );
}

function jt_cmb2_render_slider_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {
	$value =  $value ? $value : $field->args('default') ;

	$level = $field->args('level') ? 1 : 0 ;

?>
<div class="form-horizontal">
	<div class="form-group">
	    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id(); ?>'"><?php echo esc_html(  $field->args('name') ); ?></label>
	    <div class="col-sm-<?php echo $level?'8':'10'; ?>">
		    <?php 
		    echo $field_type_object->input( array(
						'name'  => $field_type_object->_name( ),
						'id'    => $field_type_object->_id( ),
						'value' => (int) $value,
						'data-slider-value' => (int) $value,
						'type'  => 'text',
						'class' => 'small-text rbs_slider',
						'data-slider-min'=> $field->args('min'),
						'data-slider-max'=> $field->args('max'),
						'data-slider-step'=> $field->args('step')
					) ); 
			echo $field->args('addons')?' '.$field->args('addons'):''; ?>
	    </div>
	    <?php if($level){ ?>
			<div class="col-sm-2 rbs-block-pro"><?php echo ROBO_GALLERY_LABEL_PRO; ?></div>
		<?php } ?>
	</div>
</div>
<?php
}
add_filter( 'cmb2_render_slider', 'jt_cmb2_render_slider_field_callback', 10, 5 );