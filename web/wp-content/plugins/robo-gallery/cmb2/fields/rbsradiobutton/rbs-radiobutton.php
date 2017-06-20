<?php

/*
*      Robo Gallery     
*      Version: 2.0
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

function rbsradiobutton_getOptions( $options, $name, $value = false ) {
	if( !isset($options) || !count($options) )  return '';
    $state_options = '';
    foreach ( $options as $abrev => $state ) {
        $state_options .= 
        '<label class="btn btn-info '.($value==$abrev?'active':'').'">'
	 		.'<input type="radio" autocomplete="off" name="'.$name.'" '
		 			.($abrev==$value?' checked ':'').' '
		 			.' value="'.$abrev.'"'
	 			.'> '.$state
		.'</label>';
    }
    return $state_options;
}

function rbsradiobutton_field( $metakey, $post_id = 0 ) {
	echo get_rbsradiobutton_field( $metakey, $post_id );
}

function rbsradiobutton_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {

	$level = $field->args('level')?1:0;

	$value =  $value?$value:$field->args('default');
	
?>
<div class="form-horizontal">

	<div class="<?php echo $field_type_object->_id( 'optionsBlok' );?>">
		<div class="form-group">
		    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id( ); ?>'"><?php echo esc_html($field->args('name') ); ?></label>
		    <div class="col-sm-<?php echo $level?'8 twoj_disabled':'10'; ?>">

		    	<div class="btn-group " data-toggle="buttons">
				<?php
					echo rbsradiobutton_getOptions( $field->args('options'),  $field_type_object->_name(),  $value );
				 ?>
				</div>
		    </div>

			 <?php if($level){ ?>
			    <div class="col-sm-<?php echo $field->args('small')?'6':'2'; ?> rbs-block-pro">
			    	<?php echo ROBO_GALLERY_LABEL_PRO; ?>
			    </div>
			<?php } ?>

		</div>
		

	 </div>
</div>
<?php
}
add_filter( 'cmb2_render_rbsradiobutton', 'rbsradiobutton_field_callback', 10, 5 );