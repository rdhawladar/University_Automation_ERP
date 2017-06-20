<div class="row">
    <div class="col-md-5">
        <?php
        //echo $temp;
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
        if($Session != 'All'){
            $this->db->where('id',$Session);
            $asas = $this->db->get('session_pundro')->result_array();
            foreach($asas as $ee123):
                echo $ee123['SessionName'];
            endforeach;
        }
        else{
            echo $Session;
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
        echo "<br/><b>Amount: </b>";
        echo $Amount;
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
        <?php
/*        if($this->input->post('ProgramName') == '*'){
            echo "All";
        }
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
        <?php /*echo "Amount: ";
        if($this->input->post('ProgramName') == '*'){
            $this->db->select_sum('Amount');
            $this->db->from('money_receipt');
            $this->db->where('SemesterName',$this->input->post('SessionName'));
            $this->db->where('Year',$this->input->post('Year'));
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                echo $row2412['Amount'];
            endforeach;
        }else{
            $this->db->select_sum('Amount');
            $this->db->from('money_receipt');
            $this->db->where('ProgramName',$this->input->post('ProgramName'));
            $this->db->where('SemesterName',$this->input->post('SessionName'));
            $this->db->where('Year',$this->input->post('Year'));
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                echo $row2412['Amount'];
            endforeach;
        }
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
                        <th><div><?php echo get_phrase('candidate_name');?></div></th>
                        <th><div><?php echo get_phrase('mobile_number');?></div></th>
                        <th><div><?php echo get_phrase('email');?></div></th>
                        <th><div><?php echo get_phrase('amount');?></div></th>
                        <th><div><?php echo get_phrase('particulars');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    ?>
                    <?php $count = 1;foreach($short as $row12):?>
                        <tr>
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
                                    //echo $row12['SemesterName'];
                                    $this->db->where('id', $row12['SemesterName']);
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
                            <td class="program_name13"><div><?php echo $row12['CandidateName'];?></div></td>
                            <td class="program_name13"><div><?php echo $row12['MobileNumber'];?></div></td>
                            <td class="program_name13"><div><?php echo $row12['Email'];?></div></td>
                            <td class="program_name13"><div><?php echo $row12['Amount'];?></div></td>
                            <td class="program_name13"><div><?php echo $row12['Particulars'];?></div></td>
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