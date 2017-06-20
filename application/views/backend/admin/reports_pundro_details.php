<?php
$District         = $this->input->post('District');
$ProgramName         = $this->input->post('ProgramName');
$dataFromGPA         = $this->input->post('FromGPA');
$SeatCount         = $this->input->post('SeatCount');
$Gender         = $this->input->post('Gender');

if($District){
    //echo "district";
    $ProgramName         = $this->input->post('ProgramName');
    $District         = $this->input->post('District');
    $this->db->where('NameofProgram', $ProgramName);
    $this->db->where('PresentDistrict', $District);
    $qq = $this->db->get('applicants_details')->result_array();
    //foreach($qq as $rowa334):
        //echo $rowa334['id'];
    ?>
    <div class="col-md-12">
        <a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button class="btn btn-success" onclick="myFunction()">Print</button>
    </div>
    <table class="table table-bordered datatable" id="table_export1">
        <thead>
            <tr>
                <th><div>#</div></th>
                <th><div><?php echo get_phrase('program');?></div></th>
                <th><div><?php echo get_phrase('name');?></div></th>
                <th><div><?php echo get_phrase('Photo');?></div></th>
                <th>
                    <table class="ttres table table-bordered datatable">
                        <tr>
                            <td colspan="5">
                                <div><?php echo get_phrase('result');?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><div><?php echo get_phrase('SSC/Equivalent');?></div></td>
                            <td><div><?php echo get_phrase('HSC/Equivalent');?></div></td>
                            <td><div><?php echo get_phrase('total_GPA');?></div></td>
                        </tr>
                    </table>
                </th>
                <th><div><?php echo get_phrase('admission_mark');?></div></th>
                <th><div><?php echo get_phrase('References');?></div></th>
                <th><div><?php echo get_phrase('application_date');?></div></th>
            </tr>
            </thead>
        <?php
        foreach($qq as $rowa334):
        ?>
        <tr>
            <td><?php echo $count++;?></td>
            <td class="program_name12">
                <div>
                    <?php
                    $this->db->where('id', $rowa334['NameofProgram']);
                    $course_program = $this->db->get('course_program')->result_array();
                    foreach($course_program as $ee):
                        echo $ee['course_name'];
                    endforeach;
                    ?>
                </div>
            </td>
            <td class="program_name13"><div><?php echo $rowa334['NameofApplicant'];?></div></td>
            <td class="modlapopup">
                <a target="_blank" href="<?php echo "uploads/student_image/".$rowa334[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$rowa334[PhotoApplicant]; ?>" width="73" height="73" /></a>
            </td>
            <td>
                <table class="ttres">
                    <tr>
                        <td><div><?php echo $rowa334['CertificateCGPA1'];?></div></td>
                        <td><div><?php echo $rowa334['CertificateCGPA2'];?></div></td>
                        <td><div><?php echo $rowa334['TotalGPA'];?></div></td>
                    </tr>
                </table>
            </td>
            <td><?php echo $rowa334['AdmMarksObtained']." (".$rowa334['TotalMarkAdm'].")";?></td>
            <td class="program_name14">
                <div>
                    <table>
                        <tr>
                            <td>
                                <?php echo "Name: ".$rowa334['ReferenceName1'];?>
                                <?php echo "<br/>";?>
                                <?php echo "Phone: ".$rowa334['ReferencePhone1'];?>
                            </td>
                            <td>
                                <?php echo "Name: ".$rowa334['ReferenceName2'];?>
                                <?php echo "<br/>";?>
                                <?php echo "Phone: ".$rowa334['ReferencePhone2'];?>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td><?php echo $rowa334['ApplicationDate'];?></td>
        </tr>
        <?php
    endforeach;
    ?>
    </table>
    <?php
}
elseif($Gender){
    //echo "Gender";
    $ProgramName         = $this->input->post('ProgramName');
    $Gender         = $this->input->post('Gender');
    $this->db->where('NameofProgram', $ProgramName);
    $this->db->where('ApplicantGender', $Gender);
    $qq = $this->db->get('applicants_details')->result_array();
    //foreach($qq as $rowa334):
        //echo $rowa334['id'];
    ?>
    <div class="col-md-12">
        <a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button class="btn btn-success" onclick="myFunction()">Print</button>
    </div>
    <table class="table table-bordered datatable" id="table_export1">
        <thead>
            <tr>
                <th><div>#</div></th>
                <th><div><?php echo get_phrase('program');?></div></th>
                <th><div><?php echo get_phrase('name');?></div></th>
                <th><div><?php echo get_phrase('Photo');?></div></th>
                <th>
                    <table class="ttres table table-bordered datatable">
                        <tr>
                            <td colspan="5">
                                <div><?php echo get_phrase('result');?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><div><?php echo get_phrase('SSC/Equivalent');?></div></td>
                            <td><div><?php echo get_phrase('HSC/Equivalent');?></div></td>
                            <td><div><?php echo get_phrase('total_GPA');?></div></td>
                        </tr>
                    </table>
                </th>
                <th><div><?php echo get_phrase('admission_mark');?></div></th>
                <th><div><?php echo get_phrase('References');?></div></th>
                <th><div><?php echo get_phrase('application_date');?></div></th>
            </tr>
            </thead>
        <?php
        foreach($qq as $rowa334):
        ?>
        <tr>
            <td><?php echo $count++;?></td>
            <td class="program_name12">
                <div>
                    <?php
                    $this->db->where('id', $rowa334['NameofProgram']);
                    $course_program = $this->db->get('course_program')->result_array();
                    foreach($course_program as $ee):
                        echo $ee['course_name'];
                    endforeach;
                    ?>
                </div>
            </td>
            <td class="program_name13"><div><?php echo $rowa334['NameofApplicant'];?></div></td>
            <td class="modlapopup">
                <a target="_blank" href="<?php echo "uploads/student_image/".$rowa334[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$rowa334[PhotoApplicant]; ?>" width="73" height="73" /></a>
            </td>
            <td>
                <table class="ttres">
                    <tr>
                        <td><div><?php echo $rowa334['CertificateCGPA1'];?></div></td>
                        <td><div><?php echo $rowa334['CertificateCGPA2'];?></div></td>
                        <td><div><?php echo $rowa334['TotalGPA'];?></div></td>
                    </tr>
                </table>
            </td>
            <td><?php echo $rowa334['AdmMarksObtained']." (".$rowa334['TotalMarkAdm'].")";?></td>
            <td class="program_name14">
                <div>
                    <table>
                        <tr>
                            <td>
                                <?php echo "Name: ".$rowa334['ReferenceName1'];?>
                                <?php echo "<br/>";?>
                                <?php echo "Phone: ".$rowa334['ReferencePhone1'];?>
                            </td>
                            <td>
                                <?php echo "Name: ".$rowa334['ReferenceName2'];?>
                                <?php echo "<br/>";?>
                                <?php echo "Phone: ".$rowa334['ReferencePhone2'];?>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td><?php echo $rowa334['ApplicationDate'];?></td>
        </tr>
        <?php
    endforeach;
    ?>
    </table>
    <?php
}
else{
    $ProgramName         = $this->input->post('ProgramName');
    $this->db->where('NameofProgram', $ProgramName);
    $qq = $this->db->get('applicants_details')->result_array();
    ?>
    <div class="col-md-12">
        <a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button class="btn btn-success" onclick="myFunction()">Print</button>
    </div>
    <table class="table table-bordered datatable" id="table_export1">
        <thead>
            <tr>
                <th><div>#</div></th>
                <th><div><?php echo get_phrase('program');?></div></th>
                <th><div><?php echo get_phrase('name');?></div></th>
                <th><div><?php echo get_phrase('Photo');?></div></th>
                <th>
                    <table class="ttres table table-bordered datatable">
                        <tr>
                            <td colspan="5">
                                <div><?php echo get_phrase('result');?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><div><?php echo get_phrase('SSC/Equivalent');?></div></td>
                            <td><div><?php echo get_phrase('HSC/Equivalent');?></div></td>
                            <td><div><?php echo get_phrase('total_GPA');?></div></td>
                        </tr>
                    </table>
                </th>
                <th><div><?php echo get_phrase('admission_mark');?></div></th>
                <th><div><?php echo get_phrase('References');?></div></th>
                <th><div><?php echo get_phrase('application_date');?></div></th>
            </tr>
            </thead>
        <?php
        foreach($qq as $rowa334):
        ?>
        <tr>
            <td><?php echo $count++;?></td>
            <td class="program_name12">
                <div>
                    <?php
                    $this->db->where('id', $rowa334['NameofProgram']);
                    $course_program = $this->db->get('course_program')->result_array();
                    foreach($course_program as $ee):
                        echo $ee['course_name'];
                    endforeach;
                    ?>
                </div>
            </td>
            <td class="program_name13"><div><?php echo $rowa334['NameofApplicant'];?></div></td>
            <td class="modlapopup">
                <a target="_blank" href="<?php echo "uploads/student_image/".$rowa334[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$rowa334[PhotoApplicant]; ?>" width="73" height="73" /></a>
            </td>
            <td>
                <table class="ttres">
                    <tr>
                        <td><div><?php echo $rowa334['CertificateCGPA1'];?></div></td>
                        <td><div><?php echo $rowa334['CertificateCGPA2'];?></div></td>
                        <td><div><?php echo $rowa334['TotalGPA'];?></div></td>
                    </tr>
                </table>
            </td>
            <td><?php echo $rowa334['AdmMarksObtained']." (".$rowa334['TotalMarkAdm'].")";?></td>
            <td class="program_name14">
                <div>
                    <table>
                        <tr>
                            <td>
                                <?php echo "Name: ".$rowa334['ReferenceName1'];?>
                                <?php echo "<br/>";?>
                                <?php echo "Phone: ".$rowa334['ReferencePhone1'];?>
                            </td>
                            <td>
                                <?php echo "Name: ".$rowa334['ReferenceName2'];?>
                                <?php echo "<br/>";?>
                                <?php echo "Phone: ".$rowa334['ReferencePhone2'];?>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td><?php echo $rowa334['ApplicationDate'];?></td>
        </tr>
        <?php
    endforeach;
    ?>
    </table>
    <?php
}
?>


    <script type="text/javascript">
        function myFunction() {
            window.print();
        }
    </script>