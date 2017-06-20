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
                <!--<table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php /*echo get_phrase('day');*/?></div></th>
                        <th><div><?php /*echo get_phrase('course');*/?></div></th>
                        <th><div><?php /*echo get_phrase('instructor');*/?></div></th>
                        <th><div><?php /*echo get_phrase('building_name');*/?></div></th>
                        <th><div><?php /*echo get_phrase('room_no');*/?></div></th>
                        <th><div><?php /*echo get_phrase('period');*/?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php /*$count = 1;foreach($acdSession as $row):*/?>
                        <tr>
                            <td><?php /*echo $count++;*/?></td>
                            <td><?php
/*                                $this->db->where('id',$row['Day']);
                                $ah = $this->db->get('weekdays')->result_array();
                                foreach($ah as $aa8):
                                    echo $aa8['value'];
                                endforeach;
                                */?></td>
                            <td><?php
/*                                $this->db->where('id',$row['CourseName']);
                                $af = $this->db->get('subjects')->result_array();
                                foreach($af as $aa6):
                                    echo $aa6['CourseCode']."<br/>";
                                    echo $aa6['CourseName'];
                                endforeach;
                                */?></td>
                            <td><?php
/*                                $this->db->where('id',$row['InstructorName']);
                                $ag = $this->db->get('course_instructor')->result_array();
                                foreach($ag as $aa7):
                                    */?>
                                    <a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_edit_course_instructor/<?php /*echo $aa7['id'];*/?>');">
                                        <?php
/*                                        echo $aa7['InstructorName']." (";
                                        echo $aa7['id'].")";
                                        */?>
                                    </a>
                                <?php
/*                                endforeach;
                                */?></td>
                            <td><?php /*echo $row['BuildingName'];*/?></td>
                            <td><?php /*echo $row['RoomNo'];*/?></td>
                            <td><?php
/*                                $this->db->where('id',$row['StrtTime']);
                                $ai = $this->db->get('timeformat')->result_array();
                                foreach($ai as $aa9):
                                    echo $aa9['value']." ";
                                endforeach;
                                $this->db->where('id',$row['StrtFormat']);
                                $aj = $this->db->get('timeformat1')->result_array();
                                foreach($aj as $aa10):
                                    echo $aa10['value']." - ";
                                endforeach;
                                $this->db->where('id',$row['EndTime']);
                                $ak = $this->db->get('timeformat')->result_array();
                                foreach($ak as $aa11):
                                    echo $aa11['value']." ";
                                endforeach;
                                $this->db->where('id',$row['EndFormat']);
                                $al = $this->db->get('timeformat1')->result_array();
                                foreach($al as $aa12):
                                    echo $aa12['value'];
                                endforeach;
                                */?>
                            </td>
                        </tr>
                    <?php /*endforeach;*/?>
                    </tbody>
                </table>-->
                <div class="">
                    <table class="table table-bordered datatable table321">
                        <?php
                        $al = $this->db->get('weekdays')->result_array();
                        foreach($al as $aa11):
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    /***************************************************************/
                                    $this->db->where('id', $this->session->userdata('id'));
                                    $tz = $this->db->get('student_pundro')->result_array();
                                    foreach($tz as $rz):
                                        //echo $rz['NameofBatch'];
                                    endforeach;
                                    /***************************************************************/
                                    echo "<div style='float: left;width: 100px;height: 130px;border:1px solid #cccccc; background: ;'>";
                                    echo $aa11['value'];
                                    echo "</div>";
                                    echo "<div style='float: left;width: 80%;height: 130px;border:0px solid #cccccc;background: ;'>";
                                    /***************************************************************/
                                    $this->db->where('Day', $aa11['id']);
                                    $this->db->where('BatchName', $rz['NameofBatch']);
                                    $am = $this->db->get('class_routine_pundro')->result_array();
                                    foreach($am as $aa13):
                                        echo "<div style='width: 250px;height:130px;    float: left;    border: 1px solid #cccccc;text-align:center;padding: 2% 0;'>";
                                        /***************************************************************/
                                        //echo $aa13['CourseName'];
                                        $this->db->where('id',$aa13['CourseName']);
                                        $azf = $this->db->get('subjects')->result_array();
                                        foreach($azf as $aza6):
                                            //echo $aza6['CourseCode']."<br>";
                                            //echo $aza6['CourseName'];
                                        endforeach;
                                        //echo "<br>";
                                        /***************************************************************/
                                        $this->db->where('CourseName', $aa13['CourseName']);
                                        $this->db->where('BatchName', $rz['NameofBatch']);
                                        $this->db->where('ProgramName', $rz['NameofProgram']);
                                        $this->db->where('Day', $aa13['Day']);
                                        $this->db->where('SessionName', $rz['Session']);
                                        //$this->db->where('Year', $rz['Admissionyear']);
                                        $this->db->where('Semester', '1');
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
                                        /***************************************************************/
                                        /*$this->db->where('CourseName', $aa13['CourseName']);
                                        $this->db->where('BatchName', $rz['NameofBatch']);
                                        $this->db->where('ProgramName', $rz['NameofProgram']);
                                        $this->db->where('Day', $aa13['Day']);
                                        $this->db->where('SessionName', $rz['Session']);
                                        //$this->db->where('Year', $rz['Admissionyear']);
                                        $this->db->where('Semester', '1');
                                        $azxc = $this->db->get('class_routine_pundro')->result_array();
                                        foreach($azxc as $aza6):
                                            $this->db->where('id',$aza6['StrtTime']);
                                            $ai = $this->db->get('timeformat')->result_array();
                                            foreach($ai as $aa9):
                                                echo $aa9['value']." ";
                                            endforeach;
                                            $this->db->where('id',$aza6['StrtFormat']);
                                            $aj = $this->db->get('timeformat1')->result_array();
                                            foreach($aj as $aa10):
                                                echo $aa10['value']." - ";
                                            endforeach;
                                            $this->db->where('id',$aza6['EndTime']);
                                            $ak = $this->db->get('timeformat')->result_array();
                                            foreach($ak as $aa11):
                                                echo $aa11['value']." ";
                                            endforeach;
                                            $this->db->where('id',$aza6['EndFormat']);
                                            $al = $this->db->get('timeformat1')->result_array();
                                            foreach($al as $aa12):
                                                echo $aa12['value'];
                                            endforeach;

                                        endforeach;*/
                                        //echo "<br>";
                                        /***************************************************************/
                                        //echo $aa13['InstructorName'];
                                        $this->db->where('id',$aa13['InstructorName']);
                                        $ags = $this->db->get('course_instructor')->result_array();
                                        foreach($ags as $aa7s):
                                            ?>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_course_instructor/<?php echo $aa7['id'];?>');">
                                                <?php
                                                echo $aa7s['InstructorName']." (";
                                                echo $aa7s['id'].")";
                                                echo "<br>";
                                                ?>
                                            </a>
                                            <?php
                                        endforeach;
                                        echo "</div>";
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
