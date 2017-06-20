<?php 
$edit_data		=	$this->db->get_where('exam_create_exam' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_exam_create_exam');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/exam_create_exam/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('term');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="fee_category" value="<?php /*echo $row['fee_category'];*/?>"/>-->
                        <select name="fee_category" class="form-control">
                            <option value="<?php echo $row['fee_category'];?>"><?php echo $row['fee_category'];?></option>
                            <?php
                            $course_program = $this->db->get('exam_set_term')->result_array();
                            foreach($course_program as $row1):
                                ?>
                                <option value="<?php echo $row1['fee_category'];?>">
                                    <?php echo $row1['fee_category'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('exam_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="receipt_no" value="<?php echo $row['receipt_no'];?>"/>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_exam_create_exam');?></button>
						</div>
					</div>
        		</form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>


