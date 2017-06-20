<?php 
$edit_data		=	$this->db->get_where('programs_fees' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_programs_fees');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/programs_fees/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="program_name" value="<?php /*echo $row['program_name'];*/?>"/>-->
                        <select name="program_name" class="form-control">
                            <option value="<?php echo $row['program_name'];?>"><?php echo $row['program_name'];?></option>
                            <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row1):
                                ?>
                                <option value="<?php echo $row1['course_name'];?>">
                                    <?php echo $row1['course_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_total');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="semester_total" id="semester_total" value="<?php echo $row['semester_total'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('credit_total');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="credit_total" id="credit_total" value="<?php echo $row['credit_total'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('admission_&_registration_fee');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="adm_regist_fee" id="adm_regist_fee" value="<?php echo $row['adm_regist_fee'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('tuition_fee');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="tuition_fee" id="tuition_fee" value="<?php echo $row['tuition_fee'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('per_semester_tuition_fee');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="per_semester_tuition_fee" id="per_semester_tuition_fee" value="<?php echo $row['per_semester_tuition_fee'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('other_fee');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="other_fee" id="other_fee" value="<?php echo $row['other_fee'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('per_semester_other_fees');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="per_semester_other_fees" id="per_semester_other_fees" value="<?php echo $row['per_semester_other_fees'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('fee_total');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="fee_total" id="fee_total" value="<?php echo $row['fee_total'];?>"/>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_programs_fees');?></button>
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