<?php
$edit_data		=	$this->db->get_where('applicants_details' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
    ?>
    <div class="row idcard midterm">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                        <div class="col-sm-5" style="margin: 0% 0 0 83%;
    position: relative;">
                            <img style="width:100px; height:89px;" src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        <div class="col-sm-5" style=" position: relative;
    margin: 0.5% 12%;">
                            <?php echo $row['NameofApplicant'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                        <div class="col-sm-5" style="margin: -2.5% 70%;position:relative;">
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
                        <label class="col-sm-3 control-label"><?php echo get_phrase('ID/Regi.No.');?></label>
                        <div class="col-sm-5" style="position: relative; margin: 0.2% 15%;">
                            <?php echo $row['AdmissionRollNo'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('session');?></label>
                        <div class="col-sm-5" style="position: relative; margin: -2.4% 71%;">
                            <?php echo $row['Session'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('semester');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: 2.6% 34%;">
                            <?php echo $row['StdStatus'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: 2.6% 34%;">
                            <?php echo $row['NameofBatch'];?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
endforeach;
?>


