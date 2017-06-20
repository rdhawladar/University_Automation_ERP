<div class="row">
    <div class="col-md-8">
        <h4>
        <?php
        echo "Program Name: ";
        $data['ProgramName']         = $this->input->post('ProgramName');
        $this->db->where('id', $data['ProgramName']);
        $course_program = $this->db->get('course_program')->result_array();
        foreach($course_program as $row212):
            echo $row212['course_name'];
        endforeach;
        echo "<br/>";
        ?>
        </h4>
        <h5>
        <?php
        echo "Semester Name: ";
        $data['SemesterName']         = $this->input->post('SemesterName');
        $this->db->where('id', $data['SemesterName']);
        $semester = $this->db->get('semester')->result_array();
        foreach($semester as $row123):
            echo $row123['name'];
        endforeach;
        echo "<br/>";
        ?>
        </h5>
    </div>
    <div class="col-md-4">
        <a href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button onclick="myFunction()">Print</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('semester_particulars');?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">

            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">

                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('program');?></div></th>
                        <th><div><?php echo get_phrase('batch');?></div></th>
                        <th><div><?php echo get_phrase('session');?></div></th>
                        <th><div><?php echo get_phrase('year');?></div></th>
                        <th><div><?php echo get_phrase('semester');?></div></th>
                        <th><div><?php echo get_phrase('particulars');?></div></th>
                        <th><div><?php echo get_phrase('amount');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td>
                                <?php
                                $this->db->where('id', $row['ProgramName']);
                                $course_program = $this->db->get('course_program')->result_array();
                                foreach($course_program as $row222):
                                    echo $row222['course_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['BatchName']);
                                $we = $this->db->get('batch')->result_array();
                                foreach($we as $robb):
                                    echo $robb['batch_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['SessionName']);
                                $xc = $this->db->get('session_pundro')->result_array();
                                foreach($xc as $xcv):
                                    echo $xcv['SessionName'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['Year']);
                                $xcz = $this->db->get('year_calendar')->result_array();
                                foreach($xcz as $xcvz):
                                    echo $xcvz['Name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['SemesterName']);
                                $semester = $this->db->get('semester')->result_array();
                                foreach($semester as $row223):
                                    echo $row223['name'];
                                endforeach;
                                ?>
                            </td>
                            <td><?php echo $row['Particulars'];?></td>
                            <td><?php echo $row['Amount'];?></td>
                        </tr>
                    <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function myFunction() {
            window.print();
        }
    </script>