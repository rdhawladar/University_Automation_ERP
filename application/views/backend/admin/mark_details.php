<div class="row">
    <div class="col-md-8">
        <h4>
        <?php
        echo "Department Name: ";
        $data['fee_category']         = $this->input->post('fee_category');
        $this->db->where('id', $data['fee_category']);
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
        $data['receipt_no']         = $this->input->post('receipt_no');
        $this->db->where('id', $data['receipt_no']);
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
                        <th><div><?php echo get_phrase('departments');?></div></th>
                        <th><div><?php echo get_phrase('semesters');?></div></th>
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
                                $this->db->where('id', $row['fee_category']);
                                $course_program = $this->db->get('course_program')->result_array();
                                foreach($course_program as $row222):
                                    echo $row222['course_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['receipt_no']);
                                $semester = $this->db->get('semester')->result_array();
                                foreach($semester as $row223):
                                    echo $row223['name'];
                                endforeach;
                                ?>
                            </td>
                            <td><?php echo $row['description'];?></td>
                            <td><?php echo $row['fee_type'];?></td>
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