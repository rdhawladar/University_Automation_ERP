<?php 
$edit_data		=	$this->db->get_where('student' , array('student_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_applicants');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/student_management/do_update/'.$row['student_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="birthday" value="<?php echo $row['birthday'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('sex');?></label>
                    <div class="col-sm-5">
                        <select name="sex" class="form-control" style="margin: 10px 0;">
                            <option value="<?php echo $row['sex'];?>"><?php echo $row['sex'];?></option>
                            <option value="Male"><?php echo get_phrase('male');?></option>
                            <option value="Female"><?php echo get_phrase('female');?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('religion');?></label>
                    <div class="col-sm-5">
                        <select name="religion" class="form-control" style="margin: 10px 0;">
                            <option value="<?php echo $row['religion'];?>"><?php echo $row['religion'];?></option>
                            <option value="Islam"><?php echo get_phrase('islam');?></option>
                            <option value="Hindu"><?php echo get_phrase('hindu');?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('blood_group');?></label>
                    <div class="col-sm-5">
                        <select name="blood_group" class="form-control" style="margin: 10px 0;">
                            <option value="<?php echo $row['blood_group'];?>"><?php echo $row['blood_group'];?></option>
                            <option value="O+"><?php echo get_phrase('o+');?></option>
                            <option value="O-"><?php echo get_phrase('o-');?></option>
                            <option value="A+"><?php echo get_phrase('a+');?></option>
                            <option value="A-"><?php echo get_phrase('a-');?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" value="<?php echo $row['password'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('father_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="father_name" value="<?php echo $row['father_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('mother_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="mother_name" value="<?php echo $row['mother_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('roll');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="roll" value="<?php echo $row['roll'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('register_number');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="register_number" value="<?php echo $row['personal_register_number'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('joining_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="joining_date" value="<?php echo $row['personal_joining_date'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                    <div class="col-sm-8">
                        <select name="personal_department" class="form-control">
                            <option value="<?php echo $row['personal_department'];?>"><?php echo $row['personal_department'];?></option>
                            <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row3):
                                ?>
                                <option value="<?php echo $row3['course_name'];?>">
                                    <?php echo $row3['course_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                    <div class="col-sm-5">
                        <select name="personal_batch" class="form-control">
                            <option value="<?php echo $row['personal_batch'];?>"><?php echo $row['personal_batch'];?></option>
                            <?php
                            $course_program = $this->db->get('batch')->result_array();
                            foreach($course_program as $row4):
                                ?>
                                <option value="<?php echo $row4['batch_name'];?>">
                                    <?php echo $row4['batch_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('update');?></button>
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


