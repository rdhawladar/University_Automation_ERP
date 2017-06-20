<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('class_routine');?>
                </a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane box active" id="list">
                <div class="">
                    <table class="table table-bordered datatable table321">
                        <?php
                        //echo "t".$asas;
                        $al = $this->db->get('weekdays')->result_array();
                        foreach($al as $aa11):
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    /***************************************************************/
                                    $this->db->where('id', $this->session->userdata('id'));
                                    $tz = $this->db->get('course_instructor')->result_array();
                                    foreach($tz as $rz):
                                        //echo $rz['InstructorName'];
                                    endforeach;
                                    /***************************************************************/
                                    echo "<div style='float: left;width: 100px;height: 130px;border:1px solid #cccccc; background: ;'>";
                                    echo $aa11['value'];
                                    echo "</div>";
                                    echo "<div style='float: left;width: 80%;height: 130px;border:0px solid #cccccc;background: ;'>";
                                    /***************************************************************/
                                    $this->db->where('Day', $aa11['id']);
                                    $this->db->where('InstructorName', $rz['id']);
                                    $am = $this->db->get('class_routine_pundro')->result_array();
                                    foreach($am as $aa13):
                                        echo "<div style='width: 250px;height:130px;    float: left;    border: 1px solid #cccccc;text-align:center;padding: 2% 0;'>";
                                        /***************************************************************/
                                        //echo $aa13['CourseName'];
                                        //echo $aa13['BatchName'];
                                        $this->db->where('id',$aa13['CourseName']);
                                        $azf = $this->db->get('subjects')->result_array();
                                        foreach($azf as $aza6):
                                            //echo $aza6['CourseCode']."<br>";
                                            //echo $aza6['CourseName'];
                                        endforeach;
                                        //echo "<br>";
                                        /***************************************************************/
                                        $this->db->where('CourseName', $aa13['CourseName']);
                                        $this->db->where('InstructorName', $rz['id']);
                                        $this->db->where('ProgramName', $rz['NameofProgram']);
                                        $this->db->where('Day', $aa13['Day']);
                                        //$this->db->where('SessionName', $rz['Session']);
                                        //$this->db->where('Year', $rz['Admissionyear']);
                                        //$this->db->where('Semester', '1');
                                        $azxc = $this->db->get('class_routine_pundro')->result_array();
                                        foreach($azxc as $aza6):
                                            $this->db->where('id',$aza6['StrtTime']);
                                            $ai = $this->db->get('timeformat')->result_array();
                                            foreach($ai as $aa9):
                                                //echo $aa9['value']." ";
                                            endforeach;
                                            $this->db->where('id',$aza6['StrtFormat']);
                                            $aj = $this->db->get('timeformat1')->result_array();
                                            foreach($aj as $aa10):
                                                //echo $aa10['value']." - ";
                                            endforeach;
                                            $this->db->where('id',$aza6['EndTime']);
                                            $ak = $this->db->get('timeformat')->result_array();
                                            foreach($ak as $aa11):
                                                //echo $aa11['value']." ";
                                            endforeach;
                                            $this->db->where('id',$aza6['EndFormat']);
                                            $al = $this->db->get('timeformat1')->result_array();
                                            foreach($al as $aa12):
                                                //echo $aa12['value'];
                                            endforeach;
                                            echo "<h2>";
                                            echo $aa9['value']." ";
                                            echo $aa10['value']." - ";
                                            echo $aa11['value']." ";
                                            echo $aa12['value'];
                                            echo "</h2>";
                                            /***************************************************************/
                                        endforeach;
                                        echo "<br>";
                                        /***************************************************************/
                                        //echo $aa13['CourseName'];
                                        $this->db->where('id',$aa13['CourseName']);
                                        $azf = $this->db->get('subjects')->result_array();
                                        foreach($azf as $aza6):
                                            echo $aza6['CourseCode']."<br>";
                                            echo $aza6['CourseName'];
                                        endforeach;
                                        echo "<br>";
                                        $this->db->where('id',$aa13['InstructorName']);
                                        $ags = $this->db->get('course_instructor')->result_array();
                                        foreach($ags as $aa7s):
                                            
                                            /*echo $aa13['ProgramName']."-";
                                            echo $aa13['Semester']."-";
                                            echo $aa13['Year']."-";
                                            echo $aa13['BatchName']."-";
                                            echo $aa13['InstructorName']."-";
                                            echo $aa13['CourseName'];*/
                                            //echo $aa13['ProgramName']."-";
                                            ?>
                                            <a class="temp btn btn-success" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_batch/<?php echo $aa13['ProgramName'];?>/<?php echo $aa13['Semester'];?>/<?php echo $aa13['Year'];?>/<?php echo $aa13['BatchName'];?>/<?php echo $aa13['InstructorName'];?>/<?php echo $aa13['CourseName'];?>/<?php echo $aa13['StrtTime']."-".$aa13['StrtFormat'];?>/<?php echo $aa13['EndTime']."-".$aa13['EndFormat'];?>');">
                                                <?php
                                                echo "Attend.";
                                                ?>
                                            </a>
                                            <a class="temp btn btn-success" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_batch_report/<?php echo $aa13['ProgramName'];?>/<?php echo $aa13['Semester'];?>/<?php echo $aa13['Year'];?>/<?php echo $aa13['BatchName'];?>/<?php echo $aa13['InstructorName'];?>/<?php echo $aa13['CourseName'];?>/<?php echo $aa13['StrtTime']."-".$aa13['StrtFormat'];?>/<?php echo $aa13['EndTime']."-".$aa13['EndFormat'];?>/<?php echo '1';?>');">
                                                <?php
                                                echo "MidAttenRprt";
                                                ?>
                                            </a>
                                            <a class="temp btn btn-success" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_batch_report/<?php echo $aa13['ProgramName'];?>/<?php echo $aa13['Semester'];?>/<?php echo $aa13['Year'];?>/<?php echo $aa13['BatchName'];?>/<?php echo $aa13['InstructorName'];?>/<?php echo $aa13['CourseName'];?>/<?php echo $aa13['StrtTime']."-".$aa13['StrtFormat'];?>/<?php echo $aa13['EndTime']."-".$aa13['EndFormat'];?>/<?php echo '2';?>');">
                                                <?php
                                                echo "FinalAttenRprt";
                                                ?>
                                            </a>
                                            <a class="temp btn btn-success" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_batch_report/<?php echo $aa13['ProgramName'];?>/<?php echo $aa13['Semester'];?>/<?php echo $aa13['Year'];?>/<?php echo $aa13['BatchName'];?>/<?php echo $aa13['InstructorName'];?>/<?php echo $aa13['CourseName'];?>/<?php echo $aa13['StrtTime']."-".$aa13['StrtFormat'];?>/<?php echo $aa13['EndTime']."-".$aa13['EndFormat'];?>/<?php echo '2';?>');">
                                                <?php
                                                echo "FinalAttenRprt";
                                                ?>
                                            </a>
                                            <?php
                                        endforeach;
                                        echo "</div>";
                                        /*echo "<div>";
                                        echo $aa13['BatchName'];
                                        echo "</div>";*/
                                        /***************************************************************/
                                    endforeach;
                                    echo "</div>";
                                    /***************************************************************/
                                    ?>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
