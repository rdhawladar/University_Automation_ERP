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


function jt_cmb2_switch_field( $metakey, $post_id = 0 ) {
	echo jt_cmb2_get_switch_field( $metakey, $post_id );
}

function jt_cmb2_render_switch_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {

	if( empty($value) ) $value = $field->args('default');
	
	$bs = $field->args('bootstrap_style');

	$level = $field->args('level') ? 1 : 0 ;
	
	$onText = $field->args('onText');
	$offText = $field->args('offText');

	if($field->args('showhide')){
		$onText='Show';
		$offText='Hide';
	}

if($bs){
	?>
<div class="form-horizontal">
	<div class="form-group">
	    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id(); ?>'"><?php echo $field->args('name'); ?></label>
	    <div class="col-sm-<?php echo $level?'8 rbs_disabled':'10'; ?>">
	<?php 
} else { 
	?>
	<div>
		<div class="alignleft">
	<?php 
}
			 echo
				'<input type="checkbox" data-toggle="toggle" data-onstyle="info" '
				.($onText?' data-on="'.__($onText, 'rbs_gallery').'" ':'')
				.($offText?' data-off="'.__($offText, 'rbs_gallery').'" ':'')
				.($field->args('depends')?'class="rbs_action_element" ':'')
				.'name="'.$field_type_object->_name(  ).'" '
				.'id="'. $field_type_object->_id( ).'" '
				.($field->args('depends')?'data-depends="'.$field->args('depends').'" ':'')
				.( $value==1 ?'checked="checked" ':'')
				.'value="1"> <span class="rbs_desc">'.$field->args('desc').'</span>';
			?> 
 		</div>
 		<?php if($level){ ?>
			<div class="col-sm-2 rbs-block-pro"><?php echo ROBO_GALLERY_LABEL_PRO; ?></div>
		<?php } ?>
	</div>
<?php
if($bs) echo "</div>";
}
add_filter( 'cmb2_render_switch', 'jt_cmb2_render_switch_field_callback', 10, 5 );