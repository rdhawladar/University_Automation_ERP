<?php
/*$edit_data		=	$this->db->get_where('attendance_pundro' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
    */?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('attendance_report');?>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="tab-pane box" id="faculty_list">

                            <table class="table table-bordered datatable" id="table_export">
                                <thead>
                                <tr>
                                    <th><div>#</div></th>
                                    <th><div><?php echo get_phrase('program_name');?></div></th>
                                    <th><div><?php echo get_phrase('class_year');?></div></th>
                                    <th><div><?php echo get_phrase('semester_name');?></div></th>
                                    <th><div><?php echo get_phrase('course_instructor');?></div></th>
                                    <th><div><?php echo get_phrase('batch_name');?></div></th>
                                    <th><div><?php echo get_phrase('session');?></div></th>
                                    <th><div><?php echo get_phrase('year_calendar');?></div></th>
                                    <th><div><?php echo get_phrase('exam_name');?></div></th>
                                    <th><div><?php echo get_phrase('attendance_date');?></div></th>
                                    <th><div><?php echo get_phrase('class_start');?></div></th>
                                    <th><div><?php echo get_phrase('class_end');?></div></th>
                                    <th><div><?php echo get_phrase('courses');?></div></th>
                                    <th><div><?php echo get_phrase('status');?></div></th>
                                    <th><div><?php echo get_phrase('options');?></div></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $attnreport    = $this->db->get('attendance_pundro')->result_array();
                                $count = 1;
                                foreach($attnreport as $row):
                                    ?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        <td><?php
                                            //echo $row['ProgramName'];
                                            $this->db->where('id', $row['ProgramName']);
                                            $as = $this->db->get('course_program')->result_array();
                                            foreach($as as $ee):
                                                echo $ee['course_name'];
                                            endforeach;
                                            ?></td>
                                        <td><?php
                                            //echo $row['ClassYear'];
                                            $this->db->where('id', $row['ClassYear']);
                                            $ad = $this->db->get('year')->result_array();
                                            foreach($ad as $eqe):
                                                echo $eqe['year'];
                                            endforeach;
                                            ?></td>
                                        <td><?php
                                            //echo $row['SemesterName'];
                                            //echo $row['ClassYear'];
                                            $this->db->where('id', $row['SemesterName']);
                                            $sw = $this->db->get('semester')->result_array();
                                            foreach($sw as $se):
                                                echo $se['name'];
                                            endforeach;
                                            ?></td>
                                        <td><?php
                                            $this->db->where('id', $row['CourseInstructor']);
                                            $sww = $this->db->get('course_instructor')->result_array();
                                            foreach($sww as $sew):
                                                echo $sew['InstructorFirstName']."&nbsp;".$sew['InstructorFirstName'];
                                            endforeach;
                                            ?></td>
                                        <td><?php
                                            $this->db->where('id', $row['BatchName']);
                                            $sqw = $this->db->get('batch')->result_array();
                                            foreach($sqw as $sqe):
                                                echo $sqe['batch_name'];
                                            endforeach;
                                            ?></td>
                                        <td><?php
                                            $this->db->where('id', $row['Session']);
                                            $sq = $this->db->get('session_pundro')->result_array();
                                            foreach($sq as $qe):
                                                echo $qe['SessionName']." (".$qe['SemesterDuration'].")";
                                            endforeach;
                                            ?></td>
                                        <td><?php
                                            $this->db->where('id', $row['YearCalendar']);
                                            $sqz = $this->db->get('year_calendar')->result_array();
                                            foreach($sqz as $zqe):
                                                echo $zqe['Name'];
                                            endforeach;
                                            ?></td>
                                        <td><?php
                                            $this->db->where('id', $row['ExamName']);
                                            $sz = $this->db->get('exam_pundro')->result_array();
                                            foreach($sz as $ze):
                                                echo $ze['ExamName'];
                                            endforeach;
                                            ?></td>
                                        <td><?php echo $row['AttendanceDate'];?></td>
                                        <td><?php echo $row['ClassStrt'];?></td>
                                        <td><?php echo $row['ClassEnd'];?></td>
                                        <td><?php
                                            $this->db->where('id', $row['CourseCode']);
                                            $sq = $this->db->get('subjects')->result_array();
                                            foreach($sq as $zqe):
                                                echo $zqe['CourseCode']." (".$zqe['CourseName'].")";
                                            endforeach;
                                            ?></td>
                                        <td>
                                            <table class="attn_report">
                                                <tr>
                                                    <td>
                                                        <?php
                                                        $str21 = substr($row['StdRoll'],1,-1);
                                                        $val21 = explode(',', $str21);
                                                        foreach($val21 as $out) {
                                                            ?>
                                                            <div><?php echo $out."<br/>";?></div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $str21 = substr($row['NameStudent'],1,-1);
                                                        $val21 = explode(',', $str21);
                                                        foreach($val21 as $out1) {
                                                            ?>
                                                            <div><?php echo $out1."<br/>";?></div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $str2 = substr($row['AttendanceStatus'],1,-1);
                                                        $val2 = explode(',', $str2);
                                                        foreach($val2 as $out2) {
                                                            ?>
                                                            <div><?php
                                                                $temp = '1';
                                                                if($out2 == $temp){
                                                                    echo "Present";
                                                                }
                                                                else{
                                                                    echo "Absent";
                                                                }
                                                                ?></div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_faculty_setup/<?php echo $row['id'];?>');">
                                                <i class="entypo-pencil"></i>
                                            </a>
                                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subjects/facdelete/<?php echo $row['id'];?>');">
                                                <i class="entypo-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--
    --><?php
/*endforeach;
*/?>


<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        var datatable = $("#table_export").dataTable();
        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>