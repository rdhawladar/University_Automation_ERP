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


function rbs_rbsselect_get_options( $options, $value = false, $content=array() ) {
    $state_options = '';
    foreach ( $options as $abrev => $state ) {
        $state_options .= 
       	'<option '
        	.'value="'. $abrev .'" '
        	.(isset($content[$abrev])?' data-content="'.$state.' '.str_replace('"', "'", $content[$abrev]).'"':'')
        	.($value==$abrev?' selected="selected"':'') 
        .'>'. $state .'</option>';
    }
    return $state_options;
}

function jt_cmb2_render_rbsselect_field_callback( $field, $value, $object_id, $object_type, $field_type_object ){
	$value =  $value?$value:$field->args('default');
	$level = $field->args('level')?1:0;
	?>
	<div class="form-horizontal">
		<div class="form-group">
	    	<label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id(); ?>"><?php echo esc_html( $field->args( 'name' ) ); ?></label>
		    <div class="col-sm-<?php echo $level?'8 rbs_disabled':'10'; ?>">
		      <?php
		      	echo $field_type_object->select(array(
					'name'  		=> $field_type_object->_name(),
					'id'    		=> $field_type_object->_id(),
					'class'   		=> 'rbs_select selectpicker'.($field->args('depends') && count($field->args('depends'))?' rbs_action_element_select':''),
					'options' 		=> rbs_rbsselect_get_options( $field->args('options'),  $value, $field->args('content') ),
					'data-depends'	=> $field->args('depends') && count($field->args('depends')) ? 1 : 0 ,
					'desc'    		=> $field_type_object->_desc( true ),
				));

				if( $field->args('depends') && count($field->args('depends')) ){
				?>
				<script type="text/javascript">
					var  <?php echo $field_type_object->_id(); ?>_depends = <?php echo json_encode($field->args('depends')); ?>;
				</script>
				<?php } ?>
		    </div>
		    <?php if($level){ ?>
		    	<div class="col-sm-2 rbs-block-pro"><?php echo ROBO_GALLERY_LABEL_PRO; ?></div>
		    <?php } ?>
	  	</div>
	</div>
<?php
}
add_filter( 'cmb2_render_rbsselect', 'jt_cmb2_render_rbsselect_field_callback', 10, 5 );