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

function rbs_multisize_field( $metakey, $post_id = 0 ) {
	echo rbs_get_multisize_field( $metakey, $post_id );
}

function rbs_multisize_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {
	// make sure we specify each part of the value we need.
	$level = $field->args('level')?1:0;

	$default = $field->args('default');
	if(!is_array($default))  $default = array();

	if(!isset($default['width'])) 		$default['width'] 		= '100';
	if(!isset($default['widthType']))	$default['widthType'] 	= '';
	
	$value = wp_parse_args( $value, array( 
		 'width' 		=> $default['width'], 
		 'widthType' 	=> $default['widthType'],
	));

?>

<div class="form-horizontal">
	<div class="form-group">
	    <label class="col-xs-4 col-sm-2 control-label" for="<?php echo $field_type_object->_id(); ?>"><?php echo esc_html(  $field->args('name') ); ?></label>

	    <div class="col-xs-3 col-sm-2<?php echo ($level?' rbs_disabled':'') ?>"> 
		    <?php 
		    echo $field_type_object->input( array(
				'name'  		=> $field_type_object->_name('[width]' ),
				'id'    		=> $field_type_object->_id('[width]' ),
				'value' 		=> $value['width'],
				'class' 		=> 'form-control '.$field->args('class') ,
			)); 
		   ?>
		</div>
		<div class="col-xs-3 col-sm-2<?php echo ($level?' rbs_disabled':'') ?>"> 
		<?php
				echo 
					'<input type="checkbox" data-toggle="toggle"  data-on="px" data-off="%" data-onstyle="primary" data-offstyle="info" ' 
					.'name="'.$field_type_object->_name( '[widthType]' ).'" '
					.'id="'. $field_type_object->_id( 'widthType' ).'" '
					.( $value['widthType']==1 ?' checked ':'')
					.'value="1" '
					.'>';
			?> 
		</div>

	    <?php if($level){ ?>
		    <div class="col-xs-2 col-sm-6 rbs-block-pro">
		    	<?php echo ROBO_GALLERY_LABEL_PRO; ?>
		    </div>
		<?php } ?>
	</div>
</div>
	<?php
	echo $field_type_object->_desc( true );

}
add_filter( 'cmb2_render_multisize', 'rbs_multisize_field_callback', 10, 5 );
