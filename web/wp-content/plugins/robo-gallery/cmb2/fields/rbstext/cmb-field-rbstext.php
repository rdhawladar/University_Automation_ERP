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


function jt_cmb2_rbstext_field( $metakey, $post_id = 0 ) {
	echo jt_cmb2_get_rbstext_field( $metakey, $post_id );
}

function jt_cmb2_render_rbstext_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {
	
//$value =  $value ? $value : $field->args('default') ;
$level = $field->args('level')?1:0;
?>
<div class="form-horizontal">
	<div class="form-group">
	    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id(); ?>"><?php echo esc_html(  $field->args('name') ); ?></label>
	    <div class="<?php echo $field->args('small')?'col-sm-4':'col-sm-8'; echo ($level?' rbs_disabled':'') ?>">
		    <?php echo $field_type_object->input( array(
				'name'  		=> $field_type_object->_name( ),
				'id'    		=> $field_type_object->_id( ),
				'value' 		=> $value,
				'data-default' 	=> $field->args('data-default'),
				'data-alpha' 	=> $field->args('data-alpha'),
				'data-css-style'=> $field->args('data-css-style'),
				'data-demo-class'=> $field->args('data-demo-class'),
				'data-demo-id'	=> $field->args('data-demo-id'),
				
				/*'type'  		=> 'text',*/
				'class' 		=> 'form-control '.$field->args('class') ,
			)); 
			?> 
	    </div>
	    <?php if($level){ ?>
		    <div class="col-sm-<?php echo $field->args('small')?'6':'2'; ?> rbs-block-pro"><?php echo ROBO_GALLERY_LABEL_PRO; ?></div>
		<?php } ?>
	</div>
</div>
<?php
}
add_filter( 'cmb2_render_rbstext', 'jt_cmb2_render_rbstext_field_callback', 10, 5 );