<?php
/*echo "ProgramName: ".$this->uri->segment(4);
echo "SemesterName: ".$this->uri->segment(5);
echo "Year: ".$this->uri->segment(6);
echo "BatchName: ".$this->uri->segment(7);
echo "CourseInstructor: ".$this->uri->segment(8);
echo "CourseCode: ".$this->uri->segment(9);
echo "ExamName: ".$this->uri->segment(12);*/
//echo "ClassStrt: ".$this->uri->segment(10);
//echo "ClassEnd: ".$this->uri->segment(11);
?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group attendancerecords">
            <table>
                    <!-- <?php 
                        $this->db->distinct();
                        $this->db->select('AttendanceDate');
                        $this->db->where('ProgramName', $this->uri->segment(4));
                        $this->db->where('BatchName', $this->uri->segment(7));
                        $this->db->where('CourseCode', $this->uri->segment(9));
                        $this->db->where('SemesterName', $this->uri->segment(5));
                        $this->db->where('ExamName', $this->uri->segment(12));
                        $temp    = $this->db->get('attendance_pundro')->result_array();
                    ?>
                    <tr>
                    <td>Date</td>
                        <?php
                            foreach ($temp as $row12) {
                        ?>
                        <td>
                            <?php
                                echo $row12['AttendanceDate'];
                            ?>
                        </td>
                        <?php } ?>
                    </tr> -->
                    <?php 
                        $this->db->distinct();
                        $this->db->select('StudentID');
                        $this->db->where('ProgramName', $this->uri->segment(4));
                        $this->db->where('BatchName', $this->uri->segment(7));
                        $this->db->where('CourseCode', $this->uri->segment(9));
                        $this->db->where('SemesterName', $this->uri->segment(5));
                        $this->db->where('ExamName', $this->uri->segment(12));
                        $temp    = $this->db->get('attendance_pundro')->result_array();
                    ?>
                    <?php
                            foreach ($temp as $row12) {
                        ?>
                    <tr>
                        <!-- <td>
                            <?php
                                echo $row12['StudentID'];
                            ?>
                        </td> -->
                        <td>
                        <table>
                        <tr>
                            <td>Sl.No.</td>
                            <td>Class Roll</td>
                            <td>Name</td>
                            <?php 
                                $this->db->distinct();
                                $this->db->select('AttendanceDate');
                                $this->db->where('ProgramName', $this->uri->segment(4));
                                $this->db->where('BatchName', $this->uri->segment(7));
                                $this->db->where('CourseCode', $this->uri->segment(9));
                                $this->db->where('SemesterName', $this->uri->segment(5));
                                $this->db->where('ExamName', $this->uri->segment(12));
                                //$this->db->limit(1);
                                $tempz    = $this->db->get('attendance_pundro')->result_array();
                            ?>
                            <?php
                            foreach ($tempz as $row12z) {
                            ?>
                            <td>
                                <?php
                                    echo $row12z['AttendanceDate'];
                                ?>
                            </td>
                            <?php } ?>
                            <td>Total Present</td>
                            <td>Total Class</td>
                            <td>Total Absent</td>
                            <td>Present Ratio</td>
                            <td>Absent Ratio</td>
                        </tr>
                        <?php
                            //echo $row12['StudentID'];
                            $this->db->where('id', $row12['StudentID']);
                            $as = $this->db->get('student_pundro')->result_array();
                            foreach($as as $row334):
                        ?>
                            <tr>
                                <td>Sl.No.</td>
                                <td>
                                    <?php echo $row12['StudentID'];?>
                                </td>
                                <td><?php echo $row334['NameofApplicant'];?></td>
                                <?php
                                    $this->db->where('StudentID', $row12['StudentID']);
                                    $temp1    = $this->db->get('attendance_pundro')->result_array();
                                    foreach ($temp1 as $row121) {
                                ?>
                                <td><?php 
                                    //echo $row121['STDAtten'];
                                    if ($row121['STDAtten'] == '1'){
                                                echo "P";
                                            }
                                            else{
                                                echo "A";
                                            }
                                    ?></td>
                                <?php
                                    }
                                ?>
                                <td>
                                    <?php
                                        $this->db->select_sum('STDAtten');
                                        //$this->db->select('STDAtten');
                                        $this->db->where('StudentID', $row12['StudentID']);
                                        $temp2    = $this->db->get('attendance_pundro')->result_array();
                                        foreach ($temp2 as $row122) {
                                            echo $total_attend = $row122['STDAtten'];
                                        }
                                    ?>
                                </td>
                                <?php $this->db->where('StudentID', $row12['StudentID']);?>
                                <td>
                                    <?php echo $total_class = $this->db->get('attendance_pundro')->num_rows();?>
                                </td>
                                <td>
                                    <?php echo $absent_status = $total_class - $total_attend;?>
                                </td>
                                <td>
                                    <?php echo $ratio_present = (($total_attend/$total_class)*100); echo "%";?>
                                </td>
                                <td>
                                    <?php
                                        echo $ratio_absent = (100 - $ratio_present);
                                        echo "%";
                                    ?>
                                </td>
                            </tr>
                            <?php
                                endforeach;
                            ?>
                        </table>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
            <table>
                    <!-- <?php 
                        $this->db->distinct();
                        $this->db->select('AttendanceDate');
                        $this->db->where('ProgramName', $this->uri->segment(4));
                        $this->db->where('BatchName', $this->uri->segment(7));
                        $this->db->where('CourseCode', $this->uri->segment(9));
                        $this->db->where('SemesterName', $this->uri->segment(5));
                        $this->db->where('ExamName', $this->uri->segment(12));
                        $temp    = $this->db->get('attendance_pundro')->result_array();
                    ?>
                    <tr>
                    <td>Date</td>
                        <?php
                            foreach ($temp as $row12) {
                        ?>
                        <td>
                            <?php
                                echo $row12['AttendanceDate'];
                            ?>
                        </td>
                        <?php } ?>
                    </tr> -->
                    <?php 
                        $this->db->distinct();
                        $this->db->select('StudentID');
                        $this->db->where('ProgramName', $this->uri->segment(4));
                        $this->db->where('BatchName', $this->uri->segment(7));
                        $this->db->where('CourseCode', $this->uri->segment(9));
                        $this->db->where('SemesterName', $this->uri->segment(5));
                        $this->db->where('ExamName', $this->uri->segment(12));
                        $temp    = $this->db->get('attendance_pundro')->result_array();
                    ?>
                    <?php
                            foreach ($temp as $row12) {
                        ?>
                    <tr>
                        <!-- <td>
                            <?php
                                echo $row12['StudentID'];
                            ?>
                        </td> -->
                        <td>
                        <table>
                        <tr>
                            <td>Sl.No.</td>
                            <td>Class Roll</td>
                            <td>Name</td>
                            <?php 
                                $this->db->distinct();
                                $this->db->select('AttendanceDate');
                                $this->db->where('ProgramName', $this->uri->segment(4));
                                $this->db->where('BatchName', $this->uri->segment(7));
                                $this->db->where('CourseCode', $this->uri->segment(9));
                                $this->db->where('SemesterName', $this->uri->segment(5));
                                $this->db->where('ExamName', $this->uri->segment(12));
                                //$this->db->limit(1);
                                $tempz    = $this->db->get('attendance_pundro')->result_array();
                            ?>
                            <?php
                            foreach ($tempz as $row12z) {
                            ?>
                            <td>
                                <?php
                                    echo $row12z['AttendanceDate'];
                                ?>
                            </td>
                            <?php } ?>
                            <td>Total Present</td>
                            <td>Total Class</td>
                            <td>Total Absent</td>
                            <td>Present Ratio</td>
                            <td>Absent Ratio</td>
                        </tr>
                        <?php
                            //echo $row12['StudentID'];
                            $this->db->where('id', $row12['StudentID']);
                            $as = $this->db->get('student_pundro')->result_array();
                            foreach($as as $row334):
                        ?>
                            <tr>
                                <td>Sl.No.</td>
                                <td>
                                    <?php echo $row12['StudentID'];?>
                                </td>
                                <td><?php echo $row334['NameofApplicant'];?></td>
                                <?php
                                    $this->db->where('StudentID', $row12['StudentID']);
                                    $temp1    = $this->db->get('attendance_pundro')->result_array();
                                    foreach ($temp1 as $row121) {
                                ?>
                                <td><?php 
                                    //echo $row121['STDAtten'];
                                    if ($row121['STDAtten'] == '1'){
                                                echo "P";
                                            }
                                            else{
                                                echo "A";
                                            }
                                    ?></td>
                                <?php
                                    }
                                ?>
                                <td>
                                    <?php
                                        $this->db->select_sum('STDAtten');
                                        //$this->db->select('STDAtten');
                                        $this->db->where('StudentID', $row12['StudentID']);
                                        $temp2    = $this->db->get('attendance_pundro')->result_array();
                                        foreach ($temp2 as $row122) {
                                            echo $total_attend = $row122['STDAtten'];
                                        }
                                    ?>
                                </td>
                                <?php $this->db->where('StudentID', $row12['StudentID']);?>
                                <td>
                                    <?php echo $total_class = $this->db->get('attendance_pundro')->num_rows();?>
                                </td>
                                <td>
                                    <?php echo $absent_status = $total_class - $total_attend;?>
                                </td>
                                <td>
                                    <?php echo $ratio_present = (($total_attend/$total_class)*100); echo "%";?>
                                </td>
                                <td>
                                    <?php
                                        echo $ratio_absent = (100 - $ratio_present);
                                        echo "%";
                                    ?>
                                </td>
                            </tr>
                            <?php
                                endforeach;
                            ?>
                        </table>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
            <!-- <table>
                <tr>
                    <td><h4>Sl. No.</h4></td>
                    <td><h4>Roll</h4></td>
                    <td><h4>Name</h4></td>
                    <td><h4>Status</h4></td>
                    <td><h4>Date</h4></td>
                </tr>
                    <?php 
                        $this->db->where('ProgramName', $this->uri->segment(4));
                        $this->db->where('BatchName', $this->uri->segment(7));
                        $this->db->where('CourseCode', $this->uri->segment(9));
                        $this->db->where('SemesterName', $this->uri->segment(5));
                        $this->db->where('ExamName', $this->uri->segment(12));
                        $temp    = $this->db->get('attendance_pundro')->result_array();
                        /*$batch = $this->db->get_where('attendance_pundro' , array(
                        'NameofBatch' => $this->uri->segment(7)
                        ))->result_array();*/
                        $count = 1;foreach ($temp as $row12) {
                    ?>
                    <tr>
                        <td><?php echo $count++;?></td>
                        <td>
                            <?php 
                            $this->db->where('id', $this->uri->segment(4));
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
                        </td>
                        <td>
                            <?php 
                                //echo $this->uri->segment(4);
                                //echo $this->uri->segment(4);
                                $this->db->where('id', $this->uri->segment(4));
                                $prog = $this->db->get('course_program')->result_array();
                                foreach($prog as $rowp):
                                    ?>
                                        <?php
                                        //echo $rowp['course_name'];
                                        $tt = substr($rowp['course_name'],0,1)."-";?>
                                    <?php
                                endforeach;
            
                                echo $row12['StudentID'];
                                /*$str = substr($row12['StudentID'],1,-1);
                                $val = explode(',', $str);
                                foreach($val as $out) {
                                ?>
                                <?php
                                    //echo $out."<br/>";
                                    $this->db->where('id', $out);
                                    $as = $this->db->get('student_pundro')->result_array();
                                    foreach($as as $row334):
                                        //echo $row334['ClassRollNo']."<br/>";
                                        $NewClassRoll = $row334['ClassRollNo'];
                                        if(strlen($NewClassRoll) == 1){
                                            $f = "00";
                                            echo $NewClassRoll = $tt.$f.$NewClassRoll."<br/>";
                                        }
                                        if(strlen($NewClassRoll) == 2){
                                            $f = "0";
                                            echo $NewClassRoll = $tt.$f.$NewClassRoll."<br/>";
                                        } 
                                    endforeach;
                                }*/
                            ?>
                        </td>
                        <td>
                            <?php 
                                //echo $row12['StudentID'];
                                $this->db->where('id', $row12['StudentID']);
                                $as = $this->db->get('student_pundro')->result_array();
                                foreach($as as $row334):
                                    echo $row334['NameofApplicant']."<br/>";
                                endforeach;
                                /*$str1 = substr($row12['StudentID'],1,-1);
                                $val1 = explode(',', $str1);
                                foreach($val1 as $out1) {
                                ?>
                                <?php
                                    //echo $out."<br/>";
                                    $this->db->where('id', $out1);
                                    $as = $this->db->get('student_pundro')->result_array();
                                    foreach($as as $row334):
                                        echo $row334['NameofApplicant']."<br/>";
                                    endforeach;
                                }*/
                            ?>
                        </td>
                        <td>
                            <?php //echo $row12['STDAtten'];?>
                            <?php 
                                //echo $row12['StudentID'];
                                //echo $row12['STDAtten'];
                                if ($row12['STDAtten'] == '1'){
                                        echo "Present<br/>";
                                    }
                                    else{
                                        echo "Absent<br/>";
                                    }
                                /*$str2 = substr($row12['STDAtten'],1,-1);
                                $val2 = explode(',', $str2);
                                foreach($val2 as $out2) {
                                ?>
                                <?php
                                    //echo $out2."<br/>";
                                    if ($out2 == '1'){
                                        echo "Present<br/>";
                                    }
                                    else{
                                        echo "Absent<br/>";
                                    }
                                }*/
                            ?>
                        </td>
                        <td><?php echo $row12['AttendanceDate'];?></td>
                    </tr>
                    <?php } ?>
            </table> -->
        </div>
    </div>
</div>