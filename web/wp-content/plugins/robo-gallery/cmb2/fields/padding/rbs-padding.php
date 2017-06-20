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

function rbs_padding_field( $metakey, $post_id = 0 ) {
	echo get_rbs_padding_field( $metakey, $post_id );
}

function rbs_padding_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {
	
	$level = $field->args('level')?1:0;
	$default = $field->args('default');
	if(!is_array($default))  $default = array();

	if(!isset($default['left'])) 		$default['left'] 	= 0;
	if(!isset($default['top'])) 		$default['top']		= 0;
	if(!isset($default['right'])) 		$default['right']	= 0;
	if(!isset($default['bottom'])) 		$default['bottom']	= 0;
	//if(!isset($default['enable'])) 		$default['enable']	= 0;
	
	
	$value = wp_parse_args( $value, array( 
		 'left' 	=> $default['left'], 
		 'top' 		=> $default['top'],
		 'right' 	=> $default['right'],
		 'bottom' 	=> $default['bottom'],
		 //'enable' 	=> $default['enable'],
	));

?>
<div class="form-horizontal">
	<div class="form-group">
	    <label class="col-xs-2 col-sm-2 control-label" for="<?php echo $field_type_object->_id(); ?>"><?php echo esc_html(  $field->args('name') ); ?></label>

	    <div class="col-xs-5 col-sm-3<?php echo ($level?' rbs_disabled':'') ?>"> 
	    	<div class="input-group">
      			<div class="input-group-addon"><?php _e('Left', 'rbs_gallery'); ?></div>
			    <?php 
			    echo $field_type_object->input( array(
					'name'  		=> $field_type_object->_name('[left]' ),
					'id'    		=> $field_type_object->_id('[left]' ),
					'value' 		=> $value['left'],
					'class' 		=> 'form-control '.$field->args('class') ,
				)); 
			   ?>
			</div>
		</div>

		<div class="col-xs-5 col-sm-3<?php echo ($level?' rbs_disabled':'') ?>"> 
	    	<div class="input-group">
      			<div class="input-group-addon"><?php _e('Top', 'rbs_gallery'); ?></div>
			    <?php 
			    echo $field_type_object->input( array(
					'name'  		=> $field_type_object->_name('[top]' ),
					'id'    		=> $field_type_object->_id('[top]' ),
					'value' 		=> $value['top'],
					'class' 		=> 'form-control '.$field->args('class') ,
				)); 
			   ?>
			</div>
		</div>

	</div>
	<div class="form-group">
		<div class="col-xs-2 col-sm-2 "></div>

		<div class="col-xs-5 col-sm-3<?php echo ($level?' rbs_disabled':'') ?>"> 
	    	<div class="input-group">
      			<div class="input-group-addon"><?php _e('Right', 'rbs_gallery'); ?></div>
			    <?php 
			    echo $field_type_object->input( array(
					'name'  		=> $field_type_object->_name('[right]' ),
					'id'    		=> $field_type_object->_id('[right]' ),
					'value' 		=> $value['right'],
					'class' 		=> 'form-control '.$field->args('class') ,
				)); 
			   ?>
			</div>
		</div>

		<div class="col-xs-5 col-sm-3<?php echo ($level?' rbs_disabled':'') ?>"> 
	    	<div class="input-group">
      			<div class="input-group-addon"><?php _e('Bottom', 'rbs_gallery'); ?></div>
			    <?php 
			    echo $field_type_object->input( array(
					'name'  		=> $field_type_object->_name('[bottom]' ),
					'id'    		=> $field_type_object->_id('[bottom]' ),
					'value' 		=> $value['bottom'],
					'class' 		=> 'form-control '.$field->args('class') ,
				)); 
			   ?>
			</div>
		</div>


	    <?php if($level){ ?>
		    <div class="col-sm-2 rbs-block-pro">
		    	<?php echo ROBO_GALLERY_LABEL_PRO; ?>
		    </div>
		<?php } ?>
	</div>
</div>
	<?php
	echo $field_type_object->_desc( true );

}
add_filter( 'cmb2_render_padding', 'rbs_padding_field_callback', 10, 5 );
