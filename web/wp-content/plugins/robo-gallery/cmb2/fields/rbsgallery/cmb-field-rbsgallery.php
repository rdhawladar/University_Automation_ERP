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


function rbs_rbsgallery_get_options( $options, $value = false, $content=array() ) {
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

function jt_cmb2_render_rbsgallery_field_callback( $field, $value, $object_id, $object_type, $field_type_object ){
	$value =  $value?$value:$field->args('default');
	?>
	<div class="form-horizontal">
		
		<div class="form-group">
		    <div class="col-sm-12">
		    	<?php echo $field->args('desc'); ?>
		    </div>
	  	</div>

		<div class="form-group">
	    	<label class="col-sm-2  control-label" for="<?php echo $field_type_object->_id(); ?>"><?php echo esc_html( $field->args( 'name' ) ); ?></label>
		    <div class="col-sm-10">
		      <?php
		      	 $args = array(
				      'child_of'     => 0,
				      'sort_order'   => 'ASC',
				      'sort_column'  => 'post_title',
				      'hierarchical' => 1,
				      'selected'     => $value,
				      'name'         => $field_type_object->_name(),
				      'id'           =>$field_type_object->_id(),
				      'class'		=> 'rbs_select selectpicker',
				      'echo'    => 1,
				      'show_option_none' => 'none',
				      'option_none_value' => '0',
				      'post_type' => 'robo_gallery_table'
				);
		      	 wp_dropdown_pages( $args ); 
				if( count($field->args('depends')) ){
				?>
				<script type="text/javascript">
					var  <?php echo $field_type_object->_id(); ?>_depends = <?php echo json_encode($field->args('depends')); ?>;
				</script>
				<?php } ?>
		    </div>
		</div>
		
		<div class="form-group">
		    <div class="col-sm-12  ">
		    	
		    	<?php echo $field->args('desc2'); ?>
		    </div>
	  	</div>

	</div>
<?php
}
add_filter( 'cmb2_render_rbsgallery', 'jt_cmb2_render_rbsgallery_field_callback', 10, 5 );