<?php
/*echo "ProgramName: ".$this->uri->segment(4);
echo "SemesterName: ".$this->uri->segment(5);
echo "Year: ".$this->uri->segment(6);
echo "BatchName: ".$this->uri->segment(7);
echo "CourseInstructor: ".$this->uri->segment(8);
echo "CourseCode: ".$this->uri->segment(9);*/

//echo "ExamName: "."Need to add";
//echo "StudentID: ".$this->uri->segment(4);
//echo "STDAtten: ".$this->uri->segment(4);
//echo "AttendanceDate: ".$this->uri->segment(4);

//echo "ClassStrt: ".$this->uri->segment(10);
//echo "ClassEnd: ".$this->uri->segment(11);

?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group attendancerecords">
        <?php echo form_open(base_url() . 'index.php?teacher/attendance_pundro/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

            <input type="hidden" name="ProgramName" value="<?php echo $this->uri->segment(4);?>">
            <input type="hidden" name="CourseInstructor" value="<?php echo $this->uri->segment(8);?>">
            <input type="hidden" name="BatchName" value="<?php echo $this->uri->segment(7);?>">
            <input type="hidden" name="CourseCode" value="<?php echo $this->uri->segment(9);?>">
            <input type="hidden" name="SemesterName" value="<?php echo $this->uri->segment(4);?>">
            <input type="hidden" name="Year" value="<?php echo $this->uri->segment(6);?>">
            <input type="hidden" name="ClassStrt" value="<?php echo $this->uri->segment(10);?>">
            <input type="hidden" name="ClassEnd" value="<?php echo $this->uri->segment(11);?>">
            <table>
                <tr>
                    <td>
                        <label for="">Date</label>
                        <input type="text" class="datepicker" placeholder="Attendance Date" name="AttendanceDate" />
                    </td>
                    <td>
                        <label for="">Exam Name</label>
                        <select name="ExamName" id="ExamName">
                            <?php
                                $wa = $this->db->get('exam_phase')->result_array();
                                foreach($wa as $oqw):
                                    ?>
                                    <option value="<?php echo $oqw['id'];?>">
                                        <?php echo $oqw['name'];?>
                                    </option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <table>
            <tr>
                <td><h4>Sl. No.</h4></td>
                <td><h4>Roll</h4></td>
                <td><h4>Name</h4></td>
                <td><h4>Status</h4></td>
            </tr>
                <?php 
                    $batch = $this->db->get_where('student_pundro' , array(
                    'NameofBatch' => $this->uri->segment(7)
                    ))->result_array();
                    $count = 1;foreach ($batch as $row) {
                ?>
                <tr>
                    <td><?php echo $count++;?></td>
                    <td>
                        <input type="hidden" class="part1 form-control" name="particulars1[]" value="<?php echo $row['id'];?>">
                        <?php 
                            $this->db->where('id', $row['NameofProgram']);
                            $prog = $this->db->get('course_program')->result_array();
                            foreach($prog as $rowp):
                                ?>
                                    <?php
                                    $tt = substr($rowp['course_name'],0,1)."-";?>
                                <?php
                            endforeach;

                            $NewClassRoll = $row['ClassRollNo'];
                            if(strlen($NewClassRoll) == 1){
                                $f = "00";
                                echo $NewClassRoll = $tt.$f.$NewClassRoll;
                            }
                            if(strlen($NewClassRoll) == 2){
                                $f = "0";
                                echo $NewClassRoll = $tt.$f.$NewClassRoll;
                            }    
                            ?>
                        </td>
                    <td><?php echo $row['NameofApplicant']; ?></td>
                    <td>
                        <select name="particulars2[]" id="">
                            <option value="1"><?php echo get_phrase('present');?></option>
                            <option value="0"><?php echo get_phrase('absent');?></option>
                        </select>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-5">
                  <button type="submit" class="btn btn-info"><?php echo get_phrase('update');?></button>
              </div>
            </div>
            </form>
        </div>
    </div>
</div>