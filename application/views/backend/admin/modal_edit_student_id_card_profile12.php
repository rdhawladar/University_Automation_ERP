<?php
$edit_data		=	$this->db->get_where('applicants_details' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
    ?>
    <div class="row idcard">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                        <div class="col-sm-5" style="margin: 2% 0 0 85%;
    position: relative;">
                            <img style="width:89px; height:104px;" src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                        <div class="col-sm-5" style="margin: 2% 36%;position:relative;">
                            <?php
                            $this->db->where('id', $row['NameofProgram']);
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $ee):
                                echo $ee['course_name'];
                            endforeach;
                            ?>
                            <?php //echo $row['NameofProgram'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: -0.5% 17%;">
                            <?php echo $row['NameofApplicant'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('mothers_name');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: 1.3% 17%;">
                            <?php echo $row['ApplicantMotherName'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('father_name');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: -1.1% 17%;">
                            <?php echo $row['ApplicantFatherName'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('session');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: 2.6% 34%;">
                            <?php echo $row['Session'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('admission_roll_no');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: -2.8% 18%;">
                            <?php echo $row['AdmissionRollNo'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('signature');?></label>
                        <div class="col-sm-5" style="margin: 1% 5%;
    position: relative;">
                            <img style="width:89px; height:45px;" src="<?php echo "uploads/student_image/".$row[SignatureApplicant]; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
endforeach;
?>


