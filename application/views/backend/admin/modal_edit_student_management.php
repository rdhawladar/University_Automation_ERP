<?php 
$edit_data		=	$this->db->get_where('osad_student_12' , array('id' => $param2) )->result_array();
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
				
                <?php echo form_open(base_url() . 'index.php?admin/student_management/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('academic_session');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="acd_session_id" value="<?php echo $row['acd_session_id'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('application_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="app_sno" value="<?php echo $row['app_sno'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('application_status');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="applicant_status" value="<?php echo $row['applicant_status'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('name_english');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name_en" value="<?php echo $row['name_en'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('name_bangla');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name_bn" value="<?php echo $row['name_bn'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="photo" value="<?php echo $row['photo'];?>">
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
                    <label class="col-sm-3 control-label"><?php echo get_phrase('SSC_result');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ssc_result" value="<?php echo $row['ssc_result'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('HSC_result');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="hsc_result" value="<?php echo $row['hsc_result'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('total_GPA');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="total_gpa" value="<?php echo $row['total_gpa'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('NID');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nid_no" value="<?php echo $row['nid_no'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('birth_certificate_no');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="birth_certificate_no" value="<?php echo $row['birth_certificate_no'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="birthday" value="<?php echo $row['birthday'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="sex" value="<?php echo $row['sex'];?>">
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
                <h3>Present Address</h3>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('village_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="present_village_name" value="<?php echo $row['present_village_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('post_office');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="present_post_office" value="<?php echo $row['present_post_office'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('postal_code');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="present_post_code" value="<?php echo $row['present_post_code'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('police_station');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="present_police_station" value="<?php echo $row['present_police_station'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('district_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="present_district_name" value="<?php echo $row['present_district_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('division_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="present_division_name" value="<?php echo $row['present_division_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('exam_name_1');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="exam_name_1" value="<?php echo $row['exam_name_1'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('institute_name_1');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="institute_name_1" value="<?php echo $row['institute_name_1'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('board');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ssc_board" value="<?php echo $row['ssc_board'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('passing_year');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ssc_pass_year" value="<?php echo $row['ssc_pass_year'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('exam_name_2');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="exam_name_2" value="<?php echo $row['exam_name_2'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('institute_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="institute_name_2" value="<?php echo $row['institute_name_2'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('board');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="hsc_board" value="<?php echo $row['hsc_board'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('passing_year');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="hsc_pass_year" value="<?php echo $row['hsc_pass_year'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('institute_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="institute_name_2" value="<?php echo $row['institute_name_2'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('board');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="hsc_board" value="<?php echo $row['hsc_board'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('passing_year');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="hsc_pass_year" value="<?php echo $row['hsc_pass_year'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('religion');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="religion" value="<?php echo $row['religion'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('nationality');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('country');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="country" value="<?php echo $row['country'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('certificate1');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ssc_certificate" value="<?php echo $row['ssc_certificate'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('certificate2');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="hsc_certificate" value="<?php echo $row['hsc_certificate'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('level_status');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="level_status" value="<?php echo $row['level_status'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('faculty_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="faculty_name" value="<?php echo $row['faculty_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('first_choice');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="first_choice" value="<?php echo $row['first_choice'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('second_choice');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="second_choice" value="<?php echo $row['second_choice'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('roll');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" value="<?php echo $row['roll'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('current_address');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="cur_address" value="<?php echo $row['cur_address'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('register_number');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="register_number" value="<?php echo $row['register_number'];?>">
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


