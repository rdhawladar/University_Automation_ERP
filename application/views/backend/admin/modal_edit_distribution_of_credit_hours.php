<?php 
$edit_data		=	$this->db->get_where('distribution_of_credit_hours' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_distribution_of_credit_hours');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/distribution_of_credit_hours/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_name');?></label>
                    <div class="col-sm-5">
                        <select name="SemesterName" class="form-control">
                            <?php
                            $this->db->where('id', $row['SemesterName']);
                            $course_name = $this->db->get('semester')->result_array();
                            foreach($course_name as $row313):
                                //echo $row313['name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $row313['id'];?>"><?php echo $row313['name'] ;?></option>
                            <?php
                            $semester = $this->db->get('semester')->result_array();
                            foreach($semester as $row11):
                                ?>
                                <option value="<?php echo $row11['id'];?>">
                                    <?php echo $row11['name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('theory_credit_hours');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="TheoryCreditHours" value="<?php echo $row['TheoryCreditHours'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('laboratory_credit_hours');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="LaboratoryCreditHours" value="<?php echo $row['LaboratoryCreditHours'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('thesis_or_project_work_credit_hours');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ThesisOrProjectWorkCreditHours" value="<?php echo $row['ThesisOrProjectWorkCreditHours'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_credit_hours');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="SemesterCreditHours" value="<?php echo $row['SemesterCreditHours'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program');?></label>
                    <div class="col-sm-5">
                        <select name="Program" class="form-control">
                            <?php
                            $this->db->where('id', $row['Program']);
                            $course_name = $this->db->get('course_program')->result_array();
                            foreach($course_name as $row3132):
                                //echo $row3132['name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $row3132['id']; ?>"><?php echo $row3132['course_name'] ;?></option>
                            <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row112):
                                ?>
                                <option value="<?php echo $row112['id'];?>">
                                    <?php echo $row112['course_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_distribution_of_credit_hours');?></button>
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


