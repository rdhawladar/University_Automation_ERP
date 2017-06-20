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
				
                <?php echo form_open(base_url() . 'index.php?admin/profile_updates/do_update/'.$row['student_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#personal"><?php echo get_phrase('personal');?></a></li>
                    <li><a data-toggle="tab" href="#contacts"><?php echo get_phrase('contacts');?></a></li>
                    <li><a data-toggle="tab" href="#guardian"><?php echo get_phrase('guardian');?></a></li>
                    <li><a data-toggle="tab" href="#parents"><?php echo get_phrase('parents');?></a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="personal" class="tab-pane active">
                      <p>&nbsp;</p>
                      <h3><?php echo get_phrase('personal_informtion');?></h3>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('register_number');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="register_number" value="<?php echo $row['register_number'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('admission_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="personal_joining_date" value="<?php echo $row['personal_joining_date'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_department" value="<?php echo $row['personal_department'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_batch" value="<?php echo $row['personal_batch'];?>">
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_photo" value="<?php echo $row['personal_photo'];?>">
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
                            <label class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="birthday" value="<?php echo $row['birthday'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="sex" value="<?php echo $row['sex'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('religion');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="religion" value="<?php echo $row['religion'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('blood_group');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="blood_group" value="<?php echo $row['blood_group'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('birth_place');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_birth_place" value="<?php echo $row['personal_birth_place'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('nationality');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_nationality" value="<?php echo $row['personal_nationality'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('roll_no');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_roll_no" value="<?php echo $row['personal_roll_no'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mother_tongue');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_mother_tongue" value="<?php echo $row['personal_mother_tongue'];?>">
                            </div>
                        </div>
                    </div>
                    <div id="contacts" class="tab-pane">
                      <p>&nbsp;</p>
                      <h3><?php echo get_phrase('contact_details');?></h3>
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
                                <input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('present_address');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_pre_address" value="<?php echo $row['contact_pre_address'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('city');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_city" value="<?php echo $row['contact_city'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('pin');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_pin" value="<?php echo $row['contact_pin'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('country');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_country" value="<?php echo $row['contact_country'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('state');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_state" value="<?php echo $row['contact_state'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mobile');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_mobile" value="<?php echo $row['contact_mobile'];?>">
                            </div>
                        </div>
                    </div>
                    <div id="guardian" class="tab-pane">
                      <p>&nbsp;</p>
                      <h3><?php echo get_phrase('guardian_informtion');?></h3>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_name" value="<?php echo $row['guardian_name'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('relation');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_relation" value="<?php echo $row['guardian_relation'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('education');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_education" value="<?php echo $row['guardian_education'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_occupation" value="<?php echo $row['guardian_occupation'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('income');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_income" value="<?php echo $row['guardian_income'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_address" value="<?php echo $row['guardian_address'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('city');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_city" value="<?php echo $row['guardian_city'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('country');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_country" value="<?php echo $row['guardian_country'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('state');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_state" value="<?php echo $row['guardian_state'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_phone" value="<?php echo $row['guardian_phone'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mobile');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_mobile" value="<?php echo $row['guardian_mobile'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_email" value="<?php echo $row['guardian_email'];?>">
                            </div>
                        </div>
                    </div>
                    <div id="parents" class="tab-pane">
                      <p>&nbsp;</p>
                      <h3><?php echo get_phrase('parents_informtion');?></h3>
                      <br>
                      <h4><?php echo get_phrase('father_details');?></h4>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('father_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="father_name" value="<?php echo $row['father_name'];?>">
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mobile');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parents_father_mobile" value="<?php echo $row['parents_father_mobile'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('job');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parents_father_job" value="<?php echo $row['parents_father_job'];?>">
                            </div>
                        </div>
                        <h4><?php echo get_phrase('mother_details');?></h4>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mother_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="mother_name" value="<?php echo $row['mother_name'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mobile');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parents_mother_mobile" value="<?php echo $row['parents_mother_mobile'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('job');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parents_mother_job" value="<?php echo $row['parents_mother_job'];?>">
                            </div>
                        </div>
                    </div>
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


