<div class="row">
    <div class="col-md-8">
        <h4>
        <?php
        echo "Program Name: ";
        $data['ProgramName']         = $this->input->post('ProgramName');
        $this->db->where('id', $data['ProgramName']);
        $course_name = $this->db->get('course_program')->result_array();
        foreach($course_name as $row33):
            echo $row33['course_name'];
        endforeach;
        echo "<br/>";
        ?>
        </h4>
        <h5>
            <?php
            echo "Batch: ";
            $data['BatchName']         = $this->input->post('Batch');
            $this->db->where('id', $data['BatchName']);
            $ame = $this->db->get('batch')->result_array();
            foreach($ame as $row35):
                echo $row35['batch_alias'];
            endforeach;
            //echo "<br/>";
            ?>
        </h5>
        <h5>
            <?php
            echo "Semester: ";
            $data['Semester']         = $this->input->post('Semester');
            $this->db->where('id', $data['Semester']);
            $semester_name = $this->db->get('semester')->result_array();
            foreach($semester_name as $row34):
                echo $row34['name'];
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
        <div>
            <div>
                <table>
                    <thead>
                    <tr>
                        <th><div><?php echo get_phrase('course_lists');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($assign_subjects12 as $row):?>
                        <tr>
                            <td>
                                <?php
                                //$test = explode(", ", $row['Courses']);
                                //echo $test1 = implode(",<br/>", $test);

                                $test = explode(", ", $row['Courses']);
                                foreach ($test as $key => $value) {
                                    $this->db->where('id', $value);
                                    $cca12 = $this->db->get('subjects')->result_array();
                                    foreach ($cca12 as $ez12):
                                        echo $ez12['CourseName']."<br>";
                                    endforeach;
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div>
            <div>
                <table class="table table-bordered datatable dataTable">
                    <thead>
                    <tr>
                        <th><div><?php echo get_phrase('theory_credit_hours');?></div></th>
                        <th><div><?php echo get_phrase('laboratory_credit_hours');?></div></th>
                        <th><div><?php echo get_phrase('thesis_or_project_work_credit_hours');?></div></th>
                        <th><div><?php echo get_phrase('semester_credit_hours');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $this->db->where('Program', $data['ProgramName']);
                    $this->db->where('SemesterName', $data['Semester']);
                    $saa = $this->db->get('distribution_of_credit_hours')->result_array();
                    foreach($saa as $r4):
                        ?>
                        <td><?php echo $r4['TheoryCreditHours'];?></td>
                        <td><?php echo $r4['LaboratoryCreditHours'];?></td>
                        <td><?php if($r4['ThesisOrProjectWorkCreditHours']){ echo $r4['ThesisOrProjectWorkCreditHours'];}else{echo "0";}?></td>
                        <td><?php echo $r4['SemesterCreditHours'];?></td>
                    <?php
                    endforeach;
                    echo "<br/>";
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        function myFunction() {
            window.print();
        }
    </script>
    <script type="text/javascript">

        jQuery(document).ready(function($)
        {
            var datatable = $("#table_export").dataTable();

            $(".dataTables_wrapper select").select2({
                minimumResultsForSearch: -1
            });
        });

    </script>