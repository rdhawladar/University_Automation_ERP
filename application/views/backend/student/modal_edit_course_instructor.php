<?php
//echo "here";
$edit_data		=	$this->db->get_where('course_instructor' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0" style="float: left;">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('instructor_details');?>
            	</div>
            </div>
            <div class="col-md-12 instra">
                    <span><h3>Photo</h3><input type="file" name="InstructorPhoto" id="InstructorPhoto"/></span>
                    <span>
                        <h3>Program Name: </h3>
                        <?php
                            $this->db->where('id',$row['NameofProgram']);
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row112):
                                ?>
                                <?php echo $row112['course_name'];?>
                                <?php
                            endforeach;
                            ?>
                        
                    </span>
                    <span>
                        <h3>Designation</h3>
                            <?php
                            $this->db->where('id',$row['Designation']);
                            $asd = $this->db->get('designations')->result_array();
                            foreach($asd as $row112d):
                                ?>
                                    <?php echo $row112d['value'];?>
                                <?php
                            endforeach;
                            ?>
                    </span>
                    <span><h3>Email</h3> <?php echo $row['InstructorEmail'];?></span>
                    <span><h3>Name</h3><?php echo $row['InstructorName'];?></span>
                    <span><h3>Date of Birth(mm-dd-yy):</h3> <?php echo $row['InstructorBirthDate'];?></span>
                    <span><h3>Nationality</h3>
                        <?php
                        //echo $row['InstructorNationality'];
                        $this->db->where('id',$row['InstructorNationality']);
                        $cc = $this->db->get('nationality')->result_array();
                        foreach($cc as $ww112):
                            ?>
                                <?php echo $ww112['Nationality'];?>                                    
                            <?php
                        endforeach;
                        ?>
                    </span>
                    <span><h3>Gender</h3>
                            <?php
                            $this->db->where('id',$row['InstructorGender']);
                            $ccz = $this->db->get('gender')->result_array();
                            foreach($ccz as $wzw112):
                                ?>
                                    <?php echo $wzw112['Name'];?>
                                <?php
                            endforeach;
                            ?>
                    </span>
            </div>                
        </div>
    </div>
</div>

<?php
endforeach;
?>


