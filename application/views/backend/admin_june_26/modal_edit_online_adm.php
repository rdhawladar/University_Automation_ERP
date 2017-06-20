<?php 
$edit_data		=	$this->db->get_where('osad_student' , array('id' => $param2) )->result_array();
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
				
                <?php echo form_open(base_url() . 'index.php?admin/online_admission/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('applicant_status');?></label>
                    <div class="col-sm-5">
                        <select name="pay_status" class="form-control">
                            <option value="<?php echo $row['pay_status'];?>"><?php echo $row['pay_status'];?></option>
                            <option value="<?php echo get_phrase('application_accepted');?>"><?php echo get_phrase('application_accepted');?></option>
                            <option value="<?php echo get_phrase('application_rejected');?>"><?php echo get_phrase('application_rejected');?></option>
                            <option value="<?php echo get_phrase('id_card_payment_paid');?>"><?php echo get_phrase('id_card_payment_paid');?></option>
                            <option value="<?php echo get_phrase('id_card_payment_not_paid');?>"><?php echo get_phrase('id_card_payment_not_paid');?></option>
                            <option value="<?php echo get_phrase('selected_for_exam');?>"><?php echo get_phrase('selected_for_exam');?></option>
                            <option value="<?php echo get_phrase('rejected_for_exam');?>"><?php echo get_phrase('rejected_for_exam');?></option>
                            <option value="<?php echo get_phrase('passed_in_exam');?>"><?php echo get_phrase('passed_in_exam');?></option>
                            <option value="<?php echo get_phrase('failed_in_exam');?>"><?php echo get_phrase('failed_in_exam');?></option>
                            <option value="<?php echo get_phrase('enrolled_as_student');?>"><?php echo get_phrase('enrolled_as_student');?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('register_number');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="register_number" value="<?php echo $row['register_number'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('name_bangla');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name_bn" value="<?php echo $row['name_bn'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('name_english');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name_en" value="<?php echo $row['name_en'];?>">
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
                    <label class="col-sm-3 control-label"><?php echo get_phrase('son_of_FF');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ff_son" value="<?php echo $row['ff_son'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('upjati');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="upjati" value="<?php echo $row['upjati'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('guardian_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="gardian_name" value="<?php echo $row['gardian_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('nationality');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="birthday" value="<?php echo $row['birthday'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('religion');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="religion" value="<?php echo $row['religion'];?>">
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
                    <label class="col-sm-3 control-label"><?php echo get_phrase('email_address');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('permanent_address');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pr_address" value="<?php echo $row['pr_address'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('current_address');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="cur_address" value="<?php echo $row['cur_address'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('department_priority');?></label>
                    <div class="col-sm-8">
                        <?php
                        $technology = $row['technology'];
                        $row12 = explode(", ", $technology);
                        echo $row12['0'];
                        echo "<br>";
                        echo $row12['1'];
                        echo "<br>";
                        echo $row12['2'];
                        ?>
                        <select name="technology" class="form-control" style="margin: 10px 0;">
                            <option value=""><?php echo get_phrase('final_choose');?></option>
                            <option value="computer Science & Engineering"><?php echo get_phrase('computer_science_&_engineering');?></option>
                            <option value="electrical & electronic engineering"><?php echo get_phrase('electrical_&_electronic_engineering');?></option>
                            <option value="bba"><?php echo get_phrase('BBA');?></option>
                            <option value="mba"><?php echo get_phrase('MBA');?></option>
                            <option value="emba"><?php echo get_phrase('EMBA');?></option>
                            <option value="english"><?php echo get_phrase('english');?></option>
                            <option value="economics"><?php echo get_phrase('economics');?></option>
                            <option value="sociology"><?php echo get_phrase('sociology');?></option>
                            <option value="islamic studies"><?php echo get_phrase('islamic_studies');?></option>
                            <option value="law"><?php echo get_phrase('law');?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('application_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="app_date" value="<?php echo $row['app_date'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 control-label"><?php echo get_phrase('academic_qualifications');?></label>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <?php
                        $acd_quali = $this->db->where('osad_student_id',$row['id']);
                        $acd_quali = $this->db->get('osad_acd_history')->result_array();
                        foreach($acd_quali as $row13):
                            ?>
                            <table class="border_new">
                                <tr>
                                    <th>Student ID</th><th>Exam Type</th><th>Group</th><th>Board</th><th>Passing Year</th>
                                    <th>Obtained Mark</th><th>Full Mark</th>
                                </tr>
                                <tr>
                                    <td><?php echo $row13['osad_student_id'];?></td>
                                    <td><?php echo $row13['examtype'];?></td>
                                    <td><?php echo $row13['group'];?></td>
                                    <td><?php echo $row13['board'];?></td>
                                    <td><?php echo $row13['passing_yr'];?></td>
                                    <td><?php echo $row13['special_mark'];?></td>
                                    <td><?php echo $row13['ttl_mark'];?></td>
                                </tr>
                            </table>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('update_admission');?></button>
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


