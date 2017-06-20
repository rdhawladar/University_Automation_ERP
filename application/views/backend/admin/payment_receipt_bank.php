<div class="row">
    <div class="col-md-5">
        <?php
        echo $temp;
        echo "<br/><b>Program Name: </b>";
        if($ProgramName != 'All'){
            $this->db->where('id', $ProgramName);
            $asa = $this->db->get('course_program')->result_array();
            foreach($asa as $rowa334):
                echo $rowa334['course_name'];
            endforeach;
        }else{
            echo $ProgramName;
        }
        echo "<br/><b>Session: </b>";
        if($SessionName != 'All'){
            $this->db->where('id',$SessionName);
            $asas = $this->db->get('session_pundro')->result_array();
            foreach($asas as $ee123):
                echo $ee123['SessionName'];
            endforeach;
        }
        else{
            echo $SessionName;
        }
        echo "<br/><b>Year: </b>";
        if($Year != 'All'){
            $this->db->where('id',$Year);
            $sddf = $this->db->get('year_calendar')->result_array();
            foreach($sddf as $ee12h):
                echo $ee12h['Name'];
            endforeach;
        }
        else{
            echo $Year;
        }
        echo "<br/><b>Batch Name: </b>";
        if($BatchName != 'All'){
            $this->db->where('id',$BatchName);
            $sddfz = $this->db->get('batch')->result_array();
            foreach($sddfz as $ee12h):
                echo $ee12h['batch_alias'];
            endforeach;
        }
        else{
            echo $BatchName;
        }
        echo "<br/><b>Amount: </b>";
        echo $Amount;
        echo "<br/><b>Paid Amount: </b>";
        echo $paid_Amount;
        echo "<br/><b>Remaining Amount: </b>";
        echo $remaining_Amount;
        ?>
    </div>
    <div class="col-md-3">
        <a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button class="btn btn-success" onclick="myFunction()">Print</button>
    </div>
</div>
<!--<div class="row">
    <div class="col-md-5">
        <?php /*echo "Program Name: "; */?>
        <?php
/*        $this->input->post('ProgramName');
        $this->db->where('id', $this->input->post('ProgramName'));
        $asa = $this->db->get('course_program')->result_array();
        foreach($asa as $rowa334):
            echo $rowa334['course_name'];
        endforeach;
        */?>
        <?php /*echo "<br/>"; */?>
        <?php /*echo "Session Name: "; */?>
        <?php
/*        $this->db->where('id',$this->input->post('SessionName'));
        $asas = $this->db->get('session_pundro')->result_array();
        foreach($asas as $ee123):
            echo $ee123['SessionName'];
        endforeach;
        */?>
        <?php /*echo "<br/>"; */?>
        <?php /*echo "Year: "; */?>
        <?php
/*        $this->db->where('id',$this->input->post('Year'));
        $sddf = $this->db->get('year_calendar')->result_array();
        foreach($sddf as $ee12h):
            echo $ee12h['Name'];
        endforeach;
        */?>
        <?php /*echo "<br/>"; */?>
        <?php /*echo "Batch Name: "; */?>
        <?php
/*        $this->db->where('id',$this->input->post('BatchName'));
        $sddf3 = $this->db->get('batch')->result_array();
        foreach($sddf3 as $ee12h3):
            echo $ee12h3['batch_alias'];
        endforeach;
        */?>
        <?php /*echo "<br/>"; */?>
        <?php /*echo "Actual Amount: ";
        $this->db->select_sum('actual_amount');
        $this->db->from('std_fee_collection');
        $this->db->where('ProgramName',$this->input->post('ProgramName'));
        $this->db->where('SessionName',$this->input->post('SessionName'));
        $this->db->where('Year',$this->input->post('Year'));
        $this->db->where('BatchName',$this->input->post('BatchName'));
        $query12 = $this->db->get()->result_array();
        foreach($query12 as $row2412):
            echo $row2412['actual_amount'];
        endforeach;
        echo " BDT";
        */?>
        <?php /*echo "<br/>"; */?>
        <?php /*echo "Paid Amount: ";
        $this->db->select_sum('paid_amount');
        $this->db->from('std_fee_collection');
        $this->db->where('ProgramName',$this->input->post('ProgramName'));
        $this->db->where('SessionName',$this->input->post('SessionName'));
        $this->db->where('Year',$this->input->post('Year'));
        $this->db->where('BatchName',$this->input->post('BatchName'));
        $query123 = $this->db->get()->result_array();
        foreach($query123 as $row24123):
            echo $row24123['paid_amount'];
        endforeach;
        echo " BDT";
        */?>
        <?php /*echo "<br/>"; */?>
        <?php /*echo "Remaining Amount: ";
        $this->db->select_sum('remaining_amount');
        $this->db->from('std_fee_collection');
        $this->db->where('ProgramName',$this->input->post('ProgramName'));
        $this->db->where('SessionName',$this->input->post('SessionName'));
        $this->db->where('Year',$this->input->post('Year'));
        $this->db->where('BatchName',$this->input->post('BatchName'));
        $query124 = $this->db->get()->result_array();
        foreach($query124 as $row24124):
            echo $row24124['remaining_amount'];
        endforeach;
        echo " BDT";
        */?>
    </div>
    <div class="col-md-3">
        <a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button class="btn btn-success" onclick="myFunction()">Print</button>
    </div>
</div>-->
<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('Applicant');?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">

            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active onad" id="list">
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('program_name');?></div></th>
                        <th><div><?php echo get_phrase('session');?></div></th>
                        <th><div><?php echo get_phrase('year');?></div></th>
                        <th><div><?php echo get_phrase('batch');?></div></th>
                        <th><div><?php echo get_phrase('candidate_name');?></div></th>
                        <th><div><?php echo get_phrase('mobile_number');?></div></th>
                        <th><div><?php echo get_phrase('actual_amount');?></div></th>
                        <th><div><?php echo get_phrase('paid_amount');?></div></th>
                        <th><div><?php echo get_phrase('remaining_amount');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    ?>
                    <?php $count = 1;foreach($short as $row12):?>
                        <?php
                        if($row12['remaining_amount'] == '0'){
                            echo "<div class='green'>";
                            ?>
                            <tr class="green">
                                <td><?php echo $count++;?></td>
                                <td class="program_name12">
                                    <div>
                                        <?php
                                        $this->db->where('id', $row12['ProgramName']);
                                        $course_program = $this->db->get('course_program')->result_array();
                                        foreach($course_program as $ee):
                                            echo $ee['course_name'];
                                        endforeach;
                                        ?>
                                    </div>
                                </td>
                                <td class="program_name13"><div><?php
                                        $this->db->where('id', $row12['SessionName']);
                                        $course_program12 = $this->db->get('session_pundro')->result_array();
                                        foreach($course_program12 as $ee12):
                                            echo $ee12['SessionName'];
                                        endforeach;
                                        ?></div></td>
                                <td class="program_name13"><div><?php
                                        //echo $row12['Year'];
                                        $this->db->where('id', $row12['Year']);
                                        $course_program121 = $this->db->get('year_calendar')->result_array();
                                        foreach($course_program121 as $ee121):
                                            echo $ee121['Name'];
                                        endforeach;
                                        ?></div></td>
                                <td class="program_name13"><div><?php
                                        $this->db->where('id', $row12['BatchName']);
                                        $course_program1213 = $this->db->get('batch')->result_array();
                                        foreach($course_program1213 as $ee1213):
                                            echo $ee1213['batch_alias'];
                                        endforeach;
                                        ?></div></td>
                                <td class="program_name13"><div><?php
                                        $this->db->where('id', $row12['register_number']);
                                        $course213 = $this->db->get('applicants_details')->result_array();
                                        foreach($course213 as $e1e1213):
                                            echo $e1e1213['NameofApplicant'];
                                        endforeach;
                                        ?></div></td>
                                <td class="program_name13"><div><?php
                                        $this->db->where('id', $row12['register_number']);
                                        $curse213 = $this->db->get('applicants_details')->result_array();
                                        foreach($curse213 as $e11213):
                                            echo $e11213['PresentMobile'];
                                        endforeach;
                                        ?></div></td>
                                <td class="program_name13"><div><?php echo $row12['actual_amount'];?></div></td>
                                <td class="program_name13"><div><?php echo $row12['paid_amount'];?></div></td>
                                <td class="program_name13"><div>
                                        <?php
                                        echo $row12['remaining_amount'];
                                        ?></div></td>
                            </tr>
                    <?php
                            echo "</div>";
                        }
                        else{
                            echo "<div class='red'>";
                            ?>
                            <tr class="red">
                                <td><?php echo $count++;?></td>
                                <td class="program_name12">
                                    <div>
                                        <?php
                                        $this->db->where('id', $row12['ProgramName']);
                                        $course_program = $this->db->get('course_program')->result_array();
                                        foreach($course_program as $ee):
                                            echo $ee['course_name'];
                                        endforeach;
                                        ?>
                                    </div>
                                </td>
                                <td class="program_name13"><div><?php
                                        $this->db->where('id', $row12['SessionName']);
                                        $course_program12 = $this->db->get('session_pundro')->result_array();
                                        foreach($course_program12 as $ee12):
                                            echo $ee12['SessionName'];
                                        endforeach;
                                        ?></div></td>
                                <td class="program_name13"><div><?php
                                        //echo $row12['Year'];
                                        $this->db->where('id', $row12['Year']);
                                        $course_program121 = $this->db->get('year_calendar')->result_array();
                                        foreach($course_program121 as $ee121):
                                            echo $ee121['Name'];
                                        endforeach;
                                        ?></div></td>
                                <td class="program_name13"><div><?php
                                        $this->db->where('id', $row12['BatchName']);
                                        $course_program1213 = $this->db->get('batch')->result_array();
                                        foreach($course_program1213 as $ee1213):
                                            echo $ee1213['batch_alias'];
                                        endforeach;
                                        ?></div></td>
                                <td class="program_name13"><div><?php
                                        $this->db->where('id', $row12['register_number']);
                                        $course213 = $this->db->get('applicants_details')->result_array();
                                        foreach($course213 as $e1e1213):
                                            echo $e1e1213['NameofApplicant'];
                                        endforeach;
                                        ?></div></td>
                                <td class="program_name13"><div><?php
                                        $this->db->where('id', $row12['register_number']);
                                        $curse213 = $this->db->get('applicants_details')->result_array();
                                        foreach($curse213 as $e11213):
                                            echo $e11213['PresentMobile'];
                                        endforeach;
                                        ?></div></td>
                                <td class="program_name13"><div><?php echo $row12['actual_amount'];?></div></td>
                                <td class="program_name13"><div><?php echo $row12['paid_amount'];?></div></td>
                                <td class="program_name13"><div>
                                        <?php
                                        echo $row12['remaining_amount'];
                                        ?></div></td>
                            </tr>
                            <?php
                            echo "</div>";
                        }
                        ?>
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