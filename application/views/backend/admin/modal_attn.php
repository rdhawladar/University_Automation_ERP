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
                        <?php echo get_phrase('attendance');?>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo form_open(base_url() . 'index.php?admin/subjects/attendance/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('program_name');?></label>
                                <select name="ProgramName" class="form-control">
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
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('class_year');?></label>
                                <select name="ClassYear" class="form-control">
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
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('semester');?></label>
                                <select name="SemesterName" class="form-control">
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
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('course_instructor');?></label>
                                <select name="CourseInstructor" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $cq_pr = $this->db->get('course_instructor')->result_array();
                                    foreach($cq_pr as $row2v):
                                        ?>
                                        <option value="<?php echo $row2v['id'];?>">
                                            <?php echo $row2v['InstructorFirstName']. " - " .$row2v['InstructorLastName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('batch_name');?></label>
                                <select name="BatchName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_program12 = $this->db->get('batch')->result_array();
                                    foreach($course_program12 as $row1):
                                        ?>
                                        <option value="<?php echo $row1['id'];?>">
                                            <?php echo $row1['batch_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('session');?></label>
                                <select name="Session" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_pr = $this->db->get('session_pundro')->result_array();
                                    foreach($course_pr as $row42):
                                        ?>
                                        <option value="<?php echo $row42['id'];?>">
                                            <?php echo $row42['SessionName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('year_calendar');?></label>
                                <select name="YearCalendar" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $coe = $this->db->get('year_calendar')->result_array();
                                    foreach($coe as $ra2):
                                        ?>
                                        <option value="<?php echo $ra2['id'];?>">
                                            <?php echo $ra2['Name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('exam_name');?></label>
                                <select name="ExamName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $co_pr = $this->db->get('exam_pundro')->result_array();
                                    foreach($co_pr as $row42x):
                                        ?>
                                        <option value="<?php echo $row42x['id'];?>">
                                            <?php echo $row42x['ExamName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('attendance_date');?></label>
                                <input type="text" class="datepicker form-control" name="AttendanceDate"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('class_start_time');?></label>
                                <input type="text" class="form-control" name="ClassStrt"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('class_end_time');?></label>
                                <input type="text" class="form-control" name="ClassEnd"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-6">
                                <h4><?php echo get_phrase('courses_of_this_semester');?></h4>
                                <br/>
                                <?php
                                echo "<div class='ssd'>";
                                $tst = explode(", ", $row['subject']);
                                echo $test1 = implode(",<br/>", $tst);
                                echo "</div>";
                                ?>
                            </div>
                            <div class="col-md-6">
                                <h4><?php echo get_phrase('select_course_name');?></h4>
                                <select name="CourseCode" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_programq = $this->db->get('subjects')->result_array();
                                    foreach($course_programq as $row1a2):
                                        ?>
                                        <option value="<?php echo $row1a2['id'];?>">
                                            <?php echo $row1a2['CourseCode']." - ".$row1a2['CourseName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-8">
                                <?php
                                $CandidateStudent = '1';
                                //echo $val = end(explode(',', $data['SemesterName']));
                                $this->db->where('CandidateStudent',$CandidateStudent);
                                $this->db->where('NameofProgram',$row['course']);
                                $this->db->where('StdStatus',$row['semester']);
                                $fee_structure = $this->db->get('applicants_details')->result_array();
                                foreach($fee_structure as $row22):
                                    ?>
                                    <div class="col-md-12 part">
                                        <table>
                                            <tr>
                                                <td><input type="text" class="part1 form-control" name="StdRoll[]" value="<?php echo $row22['ClassRollNo'];?>"><?php echo $row22['ClassRollNo'];?></td>
                                                <td><input type="text" class="part1 form-control" name="NameStudent[]" value="<?php echo $row22['NameofApplicant'];?>"><?php echo $row22['NameofApplicant'];?></td>
                                                <td><select name="AttendanceStatus[]" id="">
                                                        <option value="1"><?php echo get_phrase('present');?></option>
                                                        <option value="0"><?php echo get_phrase('absent');?></option>
                                                    </select></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_attendance');?></button>
                            </div>
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


