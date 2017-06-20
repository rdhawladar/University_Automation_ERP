<?php 
$edit_data		=	$this->db->get_where('assign_subjects' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_courses_assigned');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/subjects/semester_wise_coursesdo_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                        <div class="col-sm-5">
                            <select name="course" class="form-control">
                                <?php
                                $this->db->where('id', $row['course']);
                                $course_name = $this->db->get('course_program')->result_array();
                                foreach($course_name as $row3x3):
                                    //echo $row3x3['course_name'];
                                endforeach;
                                ?>
                                <option value="<?php echo $row3x3['id'];?>"><?php echo $row3x3['course_name'] ;?></option>
                                <?php
                                $faculty_setup = $this->db->get('course_program')->result_array();
                                foreach($faculty_setup as $rowp):
                                    ?>
                                    <option value="<?php echo $rowp['id'];?>">
                                        <?php echo $rowp['course_name'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                    <div class="col-sm-5">
                        <select name="batch" class="form-control">
                            <?php
                            $this->db->where('id', $row['batch']);
                            $cname = $this->db->get('year')->result_array();
                            foreach($cname as $x3):
                                echo $x3['year'];
                            endforeach;
                            ?>
                            <option value="<?php echo $x3['id'];?>"><?php echo $x3['year'] ;?></option>
                            <?php
                            $faculty_setup = $this->db->get('year')->result_array();
                            foreach($faculty_setup as $rowe):
                                ?>
                                <option value="<?php echo $rowe['id'];?>">
                                    <?php echo $rowe['year'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester');?></label>
                    <div class="col-sm-5">
                        <select name="semester" class="form-control">
                            <?php
                            $this->db->where('id', $row['semester']);
                            $c_name = $this->db->get('semester')->result_array();
                            foreach($c_name as $rdx3):
                                //echo $rdx3['name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $rdx3['id']?>"><?php echo $rdx3['name'] ;?></option>
                            <?php
                            $faculty_setup = $this->db->get('semester')->result_array();
                            foreach($faculty_setup as $rowq):
                                ?>
                                <option value="<?php echo $rowq['id'];?>">
                                    <?php echo $rowq['name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
                    <div class="col-sm-8">
                        <?php
                        echo "<div class='ssd'>";
                        $tst = explode(", ", $row['subject']);
                        echo $test1 = implode(",<br/>", $tst);
                        echo "</div>";
                        $facul = $this->db->get('subjects')->result_array();
                        foreach($facul as $row21):
                            ?>
                            <input type="checkbox" name="subject[]" value="<?php echo $row21['CourseCode']." (".$row21['CourseName'].")";?>">
                            &nbsp;&nbsp;
                            <?php echo $row21['CourseName'];?>
                            <br/>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_assign_courses');?></button>
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


