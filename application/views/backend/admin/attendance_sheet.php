<div class="row">
    <div class="col-md-8">
            <?php

            $data['ProgramName']         = $this->input->post('ProgramName');
            $this->db->where('id', $data['ProgramName']);
            $course_name = $this->db->get('course_program')->result_array();
            foreach($course_name as $row313):
                echo $row313['course_name'];
            endforeach;
            echo "<br/>";

            $data['CourseInstructor']         = $this->input->post('CourseInstructor');
            $this->db->where('id', $data['CourseInstructor']);
            $course_name = $this->db->get('course_instructor')->result_array();
            foreach($course_name as $row323):
                echo $row323['InstructorFirstName']." ".$row323['InstructorLastName'];
            endforeach;
            echo "<br/>";

            $data['BatchName']         = $this->input->post('BatchName');
            $this->db->where('id', $data['BatchName']);
            $course_name = $this->db->get('batch')->result_array();
            foreach($course_name as $row333):
                echo $row333['batch_name'];
            endforeach;
            echo "<br/>";

            $data['CourseCode']         = $this->input->post('CourseCode');
            $this->db->where('id', $data['CourseCode']);
            $course_name = $this->db->get('subjects')->result_array();
            foreach($course_name as $rowa333):
                echo $rowa333['CourseCode'];
                echo "<br/>";
                echo $rowa333['CourseName'];
            endforeach;
            echo "<br/>";

            $data['Year']         = $this->input->post('Year');
            $this->db->where('id', $data['Year']);
            $course_name = $this->db->get('year')->result_array();
            foreach($course_name as $row373):
                echo $row373['year'];
            endforeach;
            echo "<br/>";

            $data['SemesterName']         = $this->input->post('SemesterName');
            $this->db->where('id', $data['SemesterName']);
            $course_name = $this->db->get('semester')->result_array();
            foreach($course_name as $row353):
                echo $row353['name'];
            endforeach;
            echo "<br/>";
            $data['Session']         = $this->input->post('Session');
            $this->db->where('id', $data['Session']);
            $course_name = $this->db->get('session_pundro')->result_array();
            foreach($course_name as $row363):
                echo $row363['SessionName'];
            endforeach;
            echo "<br/>";

            $data['ExamName']         = $this->input->post('ExamName');
            $this->db->where('id', $data['ExamName']);
            $course_name = $this->db->get('exam_pundro')->result_array();
            foreach($course_name as $row383):
                echo $row383['ExamName'];
            endforeach;
            echo "<br/>";
            echo $data['AttendanceDate']         = $this->input->post('AttendanceDate');
            echo "<br/>";
            echo $data['CassStrt']         = $this->input->post('CassStrt');
            echo "<br/>";
            echo $data['CassEnd']         = $this->input->post('CassEnd');
            echo "<br/>";
            ?>
    </div>
    <div class="col-md-4">
        <a href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button onclick="myFunction()">Print</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_record');?>
                </a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/attendance_pundro/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <input type="hidden" name="ProgramName" value="<?php echo $data['ProgramName'];?>">
                    <input type="hidden" name="CourseInstructor" value="<?php echo $data['CourseInstructor'];?>">
                    <input type="hidden" name="BatchName" value="<?php echo $data['BatchName'];?>">
                    <input type="hidden" name="CourseCode" value="<?php echo $data['CourseCode'];?>">
                    <input type="hidden" name="SemesterName" value="<?php echo $data['SemesterName'];?>">
                    <input type="hidden" name="Session" value="<?php echo $data['Session'];?>">
                    <input type="hidden" name="Year" value="<?php echo $data['Year'];?>">
                    <input type="hidden" name="ExamName" value="<?php echo $data['ExamName'];?>">
                    <input type="hidden" name="AttendanceDate" value="<?php echo $data['AttendanceDate'];?>">
                    <input type="hidden" name="ClassStrt" value="<?php echo $data['CassStrt'];?>">
                    <input type="hidden" name="ClassEnd" value="<?php echo $data['CassEnd'];?>">
                    <div class="padded">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <?php
                                    $CandidateStudent = '1';

                                    echo $val = end(explode(',', $data['SemesterName']));
                                    //exit();
                                    /*$this->db->where('id', $val);
                                    $course_progrm = $this->db->get('semester')->result_array();
                                    foreach($course_progrm as $cee):
                                        echo $cee['name'];
                                    endforeach;*/

                                    $this->db->where('CandidateStudent',$CandidateStudent);
                                    $this->db->where('NameofProgram',$data['ProgramName']);
                                    $this->db->where('stdstatus',$data['SemesterName']);
                                    $fee_structure = $this->db->get('applicants_details')->result_array();
                                    foreach($fee_structure as $row22):
                                        ?>
                                        <div class="col-md-12 part">
                                            <table>
                                                <tr>
                                                    <td><input type="text" class="part1 form-control" name="particulars1[]" value="<?php echo $row22['ClassRollNo'];?>"><?php echo $row22['ClassRollNo'];?></td>
                                                    <td><input type="text" class="part1 form-control" name="" value="<?php echo $row22['NameofApplicant'];?>"><?php echo $row22['NameofApplicant'];?></td>
                                                    <td><select name="particulars2[]" id="">
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
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_attendance');?></button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>