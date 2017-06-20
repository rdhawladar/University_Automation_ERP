<?php
$edit_data		=	$this->db->get_where('class_teacher_allocation' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_class_teacher_allocation');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/class_teacher_allocation/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('department_name');?></label>
                    <div class="col-sm-5">
                        <select name="department" class="form-control">
                            <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>
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
                    <label class="col-sm-3 control-label"><?php echo get_phrase('batch_name');?></label>
                    <div class="col-sm-5">
                        <select name="batch_name" class="form-control">
                            <option value="<?php echo $row['batch_name']; ?>"><?php echo $row['batch_name']; ?></option>
                            <?php
                            $course_program = $this->db->get('batch')->result_array();
                            foreach($course_program as $row1):
                                ?>
                                <option value="<?php echo $row1['batch_name'];?>">
                                    <?php echo $row1['batch_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('class_teacher');?></label>
                    <div class="col-sm-5">
                        <select name="class_teacher" class="form-control">
                            <option value="#"><?php echo $row['class_teacher'];?></option>
                            <?php
                            $course_program = $this->db->get('teacher')->result_array();
                            foreach($course_program as $row1):
                                ?>
                                <option value="<?php echo $row1['name'];?>">
                                    <?php echo $row1['name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_class_teacher_allocation');?></button>
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


