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

function jt_cmb2_colums_field( $metakey, $post_id = 0 ) {
	echo jt_cmb2_get_colums_field( $metakey, $post_id );
}

function jt_cmb2_render_colums_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {
	//print_r($value);
	// make sure we specify each part of the value we need.
	$level = $field->args('level')?1:0;

	$value = wp_parse_args( $value, array(
		 'width' =>  '300', 'colums' => 3,
		 'width1' => '300', 'colums1' => 3,
		 'width2' => '300', 'colums2' => 2,
		 'width3' => '300', 'colums3' => 1,

	) );

	if( $field->args('default') ){
		$value['autowidth1'] = 1;
		$value['autowidth2'] = 1;
		$value['autowidth3'] = 1;
		$value['autowidth'] = 1;		
	}
	
	?>
<div class="form-horizontal">

	<div class="form-group">
		 <div class="col-sm-10 col-sm-offset-1">
			<table class="table">
				<thead>
					<tr>
						<th>Screen Resolution</th>
						<th>Auto Size</th>
						<th>Custom Size</th>
						<th>Columns Count</th>
						<?php if($level){ ?>
							<th style="width: 55px;"> </th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="vert-align"><strong>Default</strong></td>
						<td class="<?php echo $level?' rbs_disabled':''; ?>"><?php
						echo 
							'<input type="checkbox" data-toggle="toggle" data-onstyle="info" class="rbs_colums_auto" ' 
							.'name="'.$field_type_object->_name( '[autowidth]' ).'" '
							.'id="'. $field_type_object->_id( '_autowidth' ).'" '
							.( isset($value['autowidth']) ?' checked ':'')
							.'value="auto" '
							.'data-width-id="'.$field_type_object->_id( '_width' ).'" '
							.'data-colums-id="'.$field_type_object->_id( '_colums' ).'" '
							.'>';
						 ?></td>
						 <td  class="<?php echo $level?' rbs_disabled':''; ?>">
						 	<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[width]' ),
								'id'    => $field_type_object->_id( '_width' ),
								'value' => (int) $value['width'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?> px
						</td>
						<td class="<?php echo $level?' rbs_disabled':''; ?>">
							<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[colums]' ),
								'id'    => $field_type_object->_id( '_colums' ),
								'value' => (int) $value['colums'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?>
						</td>
						<?php if($level){ ?>
							<td  class="vert-align rbs-block-pro" ><?php echo ROBO_GALLERY_ICON_PRO; ?></td>
						<?php } ?>
					</tr>
					<tr>
						<td class="vert-align">960</td>
						<td  class="<?php echo $level?' rbs_disabled':''; ?>"><?php
						echo 
							'<input type="checkbox" data-toggle="toggle" data-onstyle="info" class="rbs_colums_auto" ' 
							.'name="'.$field_type_object->_name( '[autowidth1]' ).'" '
							.'id="'. $field_type_object->_id( '_autowidth1' ).'" '
							.( isset($value['autowidth1']) ?' checked ':'')
							.'value="auto" '
							.'data-width-id="'.$field_type_object->_id( '_width1' ).'" '
							.'data-colums-id="'.$field_type_object->_id( '_colums1' ).'" '
							.'>';
						 ?></td>
						 <td  class="<?php echo $level?' rbs_disabled':''; ?>">
						 	<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[width1]' ),
								'id'    => $field_type_object->_id( '_width1' ),
								'value' => (int) $value['width1'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?> px
						</td>
						<td class="<?php echo $level?' rbs_disabled':''; ?>">
							<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[colums1]' ),
								'id'    => $field_type_object->_id( '_colums1' ),
								'value' => (int) $value['colums1'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?>
						</td>
						<?php if($level){ ?>
							<td  class="vert-align rbs-block-pro" ><?php echo ROBO_GALLERY_ICON_PRO; ?></td>
						<?php } ?>
					</tr>
					<tr>
						<td class="vert-align">650</td>
						<td class="<?php echo $level?' rbs_disabled':''; ?>"><?php
						echo 
							'<input type="checkbox" data-toggle="toggle" data-onstyle="info" class="rbs_colums_auto" ' 
							.'name="'.$field_type_object->_name( '[autowidth2]' ).'" '
							.'id="'. $field_type_object->_id( '_autowidth2' ).'" '
							.(  isset($value['autowidth2']) ?' checked ':'')
							.'value="auto" '
							.'data-width-id="'.$field_type_object->_id( '_width2' ).'" '
							.'data-colums-id="'.$field_type_object->_id( '_colums2' ).'" '
							.'>';
						 ?></td>
						 <td class="<?php echo $level?' rbs_disabled':''; ?>">
						 	<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[width2]' ),
								'id'    => $field_type_object->_id( '_width2' ),
								'value' => (int) $value['width2'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?> px
						</td>
						<td class="<?php echo $level?' rbs_disabled':''; ?>">
							<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[colums2]' ),
								'id'    => $field_type_object->_id( '_colums2' ),
								'value' => (int) $value['colums2'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?>
						</td>
						<?php if($level){ ?>
							<td  class="vert-align rbs-block-pro" ><?php echo ROBO_GALLERY_ICON_PRO; ?></td>
						<?php } ?>
					</tr>
					<tr>
						<td class="vert-align">450</td>
						<td><?php
						echo 
							'<input type="checkbox" data-toggle="toggle" data-onstyle="info" class="rbs_colums_auto" ' 
							.'name="'.$field_type_object->_name( '[autowidth3]' ).'" '
							.'id="'. $field_type_object->_id( '_autowidth3' ).'" '
							.(  isset($value['autowidth3']) ?' checked ':'')
							.'value="auto" '
							.'data-width-id="'.$field_type_object->_id( '_width3' ).'" '
							.'data-colums-id="'.$field_type_object->_id( '_colums3' ).'" '
							.'>';
						 ?></td>
						 <td>
						 	<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[width3]' ),
								'id'    => $field_type_object->_id( '_width3' ),
								'value' => (int) $value['width3'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?> px
						</td>
						<td>
							<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[colums3]' ),
								'id'    => $field_type_object->_id( '_colums3' ),
								'value' => (int) $value['colums3'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?>
						</td>
						<?php if($level){ ?>
							<td> </td>
						<?php } ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
	<?php
	echo $field_type_object->_desc( true );

}
add_filter( 'cmb2_render_colums', 'jt_cmb2_render_colums_field_callback', 10, 5 );
