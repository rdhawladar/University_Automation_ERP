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
                    <table class="table table-bordered datatable">
                        <thead>
                        <tr>
                            <th><div><?php echo get_phrase('CourseCode');?></div></th>
                            <th><div><?php echo get_phrase('CourseName');?></div></th>
                            <th><div><?php echo get_phrase('Credits');?></div></th>
                            <th><div><?php echo get_phrase('Prerequisite(s)');?></div></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            $CourseCode = $this->uri->segment(4);
                            $this->db->where('id', $CourseCode);
                            $as = $this->db->get('subjects')->result_array();
                            foreach($as as $row334):
                            //echo $row334['CourseCode'];
                            //endforeach;
                            //$edit_data		=	$this->db->get_where('subjects' , $CourseCode )->result_array();
                            //foreach ( $edit_data as $row):
                            ?>
                                <input type="hidden" name="CourseID" value="<?php echo $row334['id'];?>">
                            <td><?php echo $row334['CourseCode'];?></td>
                            <td><?php echo $row334['CourseName'];?></td>
                            <td><?php echo $row334['Credits'];?></td>
                            <td><?php echo $row334['Prerequisites'];?></td>
                            <?php
                            endforeach;
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <?php $BatchName = $this->uri->segment(5);?>
                    <?php $Year = $this->uri->segment(6);?>
                    <?php $SemesterName = $this->uri->segment(7);?>
                    <?php $ProgramName = $this->uri->segment(8);?>
                    <input type="hidden" name="BatchName" value="<?php echo $BatchName;?>">
                    <input type="hidden" name="Year" value="<?php echo $Year;?>">
                    <input type="hidden" name="SemesterName" value="<?php echo $SemesterName;?>">
                    <input type="hidden" name="ProgramName" value="<?php echo $ProgramName;?>">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-2">
                                Exam Name:
                            </div>
                            <div class="col-md-4">
                                <select name="ExamName" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $exname = $this->db->get('exam_pundro')->result_array();
                                    foreach($exname as $rowe):
                                        ?>
                                        <option value="<?php echo $rowe['id'];?>">
                                            <?php echo $rowe['ExamName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <table class="table table-bordered datatable">
                                <th><div class="rolldiv">Roll</div></th>
                                <th><div class="namediv">Name</div></th>
                                    <?php
                                    $this->db->where('ProgramName', $ProgramName);
                                    $this->db->where('SemesterName', $SemesterName);
                                    $this->db->where('Year', $Year);
                                    $this->db->where('BatchName', $BatchName);
                                    $this->db->where('CourseCode', $row334['id']);
                                    $facul3 = $this->db->get('attendance_pundro')->result_array();
                                    foreach($facul3 as $row231):
                                        echo "<th><div class='datediv'>".$row231['AttendanceDate']."</th></div>";
                                    endforeach;
                                    ?>
                                <th>Total Classes</th>
                                <th>No. of Class Attendance(s)</th>
                                <th>Marks obtained in class attendance(s)</th>
                            </table>
                                <table class="table table-bordered datatable">
                                    <tr>
                                        <?php
                                        $this->db->where('ProgramName', $ProgramName);
                                        $this->db->where('SemesterName', $SemesterName);
                                        $this->db->where('Year', $Year);
                                        $this->db->where('BatchName', $BatchName);
                                        $this->db->where('CourseCode', $row334['id']);
                                        $this->db->limit(1);
                                        $faculs = $this->db->get('attendance_pundro')->result_array();
                                        foreach($faculs as $row21s):
                                        ?>
                                        <td>
                                            <?php
                                            //echo $row21['StudentID'];
                                            $str3 = substr($row21s['StudentID'],1,-1);
                                            $val3 = explode(',', $str3);
                                            foreach($val3 as $out3) {
                                                ?>
                                                <?php
                                                echo "<div class='rolldiv'>".$out3."</div>";
                                                $this->db->where('id', $out3);
                                                $StdName = $this->db->get('student_pundro')->result_array();
                                                foreach($StdName as $r334):
                                                    echo "<div class='namediv'>".$r334['NameofApplicant']."</div>";
                                                endforeach;
                                                echo "<br/>";
                                            }
                                            ?>
                                        </td>
                                            <?php
                                        endforeach;
                                        ?>
                                        <?php
                                        $this->db->where('ProgramName', $ProgramName);
                                        $this->db->where('SemesterName', $SemesterName);
                                        $this->db->where('Year', $Year);
                                        $this->db->where('BatchName', $BatchName);
                                        $this->db->where('CourseCode', $row334['id']);
                                        $faculsa = $this->db->get('attendance_pundro')->result_array();
                                        foreach($faculsa as $row21sa):
                                        ?>
                                        <td>
                                            <?php
                                            //echo $row21['STDAtten'];
                                            $str4a = substr($row21sa['STDAtten'],1,-1);
                                            $val4a = explode(',', $str4a);
                                            foreach($val4a as $out4a) {
                                                ?>
                                                <div class="datediv">
                                                <?php
                                                if($out4a == 1){echo "P";}
                                                else if($out4a == 2 ){echo "A";}
                                                else{
                                                    echo "L";
                                                }
                                                //echo $out4."<br/>";
                                                echo "<br/>";
                                                }
                                                ?>
                                                </div>
                                        </td>
                                            <?php
                                        endforeach;
                                        ?>
                                        <?php
                                        $this->db->where('ProgramName', $ProgramName);
                                        $this->db->where('SemesterName', $SemesterName);
                                        $this->db->where('Year', $Year);
                                        $this->db->where('BatchName', $BatchName);
                                        $this->db->where('CourseCode', $row334['id']);
                                        $faculs2a = $this->db->get('attendance_pundro');
                                        ?>
                                        <td><?php echo $total_classes = $faculs2a->num_rows();?></td>
                                        <?php
                                        $this->db->where('ProgramName', $ProgramName);
                                        $this->db->where('SemesterName', $SemesterName);
                                        $this->db->where('Year', $Year);
                                        $this->db->where('BatchName', $BatchName);
                                        $this->db->where('CourseCode', $row334['id']);
                                        $this->db->limit(1);
                                        $faculs3 = $this->db->get('attendance_pundro')->result_array();
                                        foreach($faculs3 as $row21s3):
                                            ?>
                                            <td>
                                                <?php
                                                //echo $row21['StudentID'];
                                                $str31 = substr($row21s3['StudentID'],1,-1);
                                                $val31 = explode(',', $str31);
                                                foreach($val31 as $out31) {
                                                    ?>
                                                    <?php
                                                    echo "<div class='rolldiv'><input type=\"text\" name=\"ObtClass\" value=\"\"></div>";
                                                    echo "<br/>";
                                                }
                                                ?>
                                            </td>
                                            <?php
                                        endforeach;
                                        ?>
                                        <td><?php echo "Marks";?></td>
                                    </tr>
                                </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>