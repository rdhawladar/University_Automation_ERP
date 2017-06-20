<div class="row">
    <div class="col-md-4">
        <?php foreach($short as $row13):?>
        <h4>
            <?php
            $this->db->where('id', $row13['NameofProgram']);
            $as1 = $this->db->get('course_program')->result_array();
            foreach($as1 as $a1s1):
                echo "Program Name: " .$a1s1['course_name'];
            endforeach;
            ?>
            <?php echo "<br/>";?>
        </h4>
        <h5>
            <?php
            $this->db->where('id', $row13['Session']);
            $as2 = $this->db->get('session_pundro')->result_array();
            foreach($as2 as $as22):
            endforeach;
            ?>
            <?php
            $this->db->where('id', $row13['AdmissionYear']);
            $as3 = $this->db->get('year_calendar')->result_array();
            foreach($as3 as $as33):
            endforeach;
            ?>
            <?php echo "Semester Name: " . $as22['SessionName']." ".$as33['Name'];?>
        </h5>
        <?php endforeach;?>
    </div>
    <div class="col-md-4">
        <?php echo form_open(base_url() . 'index.php?admin/online_admission/autoselection' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
        <?php foreach($short as $row123):?>
            <?php
            //echo $row123['id'];
            ?>
            <input type="hidden" name="ProgramName[]" value="<?php echo $row123['NameofProgram'];?>">
            <input type="hidden" name="Session[]" value="<?php echo $row123['Session'];?>">
            <input type="hidden" name="AdmissionYear[]" value="<?php echo $row123['AdmissionYear'];?>">
            <input type="hidden" name="SelectedEmail[]" value="<?php echo $row123['PresentEmail'];?>">
        <?php endforeach;?>
        <!--<button type="submit" class="btn btn-info"><?php /*echo get_phrase('email_notify');*/?></button>-->
        </form>
    </div>
    <div class="col-md-4">
        <a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button onclick="myFunction()">Print</button>
    </div>
</div>
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
                        <th><div><?php echo get_phrase('program');?></div></th>
                        <th><div><?php echo get_phrase('ad._roll');?></div></th>
                        <th><div><?php echo get_phrase('name');?></div></th>
                        <th><div><?php echo get_phrase('Photo');?></div></th>
                        <th><div><?php echo get_phrase('gender');?></div></th>
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
                        <th><div><?php echo get_phrase('decision');?></div></th>
                        <th><div><?php echo get_phrase('Actions');?></div></th>
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
                                    $this->db->where('id', $row12['NameofProgram']);
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $ee):
                                        echo $ee['course_name'];
                                    endforeach;
                                    ?>
                                </div>
                            </td>
                            <td><?php echo $row12['AdmissionRollNo'];?></td>
                            <td class="program_name13"><div><?php echo $row12['NameofApplicant'];?></div></td>
                            <td class="modlapopup">
                                <a target="_blank" href="<?php echo "uploads/student_image/".$row12[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row12[PhotoApplicant]; ?>" width="73" height="73" /></a>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row12['ApplicantGender']);
                                $gen = $this->db->get('gender')->result_array();
                                foreach($gen as $ge):
                                    echo $ge['Name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <table class="ttres">
                                    <tr>
                                        <td><div><?php echo $row12['CertificateCGPA1'];?></div></td>
                                        <td><div><?php echo $row12['CertificateCGPA2'];?></div></td>
                                        <td><div><?php echo $row12['CertificateCGPA1'] + $row12['CertificateCGPA2'];?></div></td>
                                    </tr>
                                </table>
                            </td>
                            <td><?php echo $row12['AdmMarksObtained']." (".$row12['TotalMarkAdm'].")";?></td>
                            <td class="program_name14">
                                <div>
                                    <table>
                                        <tr>
                                            <td>
                                                <?php echo "Name: ".$row12['ReferenceName1'];?>
                                                <?php echo "<br/>";?>
                                                <?php echo "Phone: ".$row12['ReferencePhone1'];?>
                                            </td>
                                            <td>
                                                <?php echo "Name: ".$row12['ReferenceName2'];?>
                                                <?php echo "<br/>";?>
                                                <?php echo "Phone: ".$row12['ReferencePhone2'];?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td><?php echo $row12['ApplicationDate'];?></td>
                            <td></td>
                            <td class="tblactions"><div>
                                    <a class="btn btn-success" href="<?php echo base_url() . 'index.php?admin/online_admission/singleautoselection/' .$row12['id'].'/3';?>">
                                        <?php echo get_phrase('select');?>
                                    </a> &nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-success" href="<?php echo base_url() . 'index.php?admin/online_admission/singlerejected/' .$row12['id'].'/4';?>">
                                        <?php echo get_phrase('reject');?>
                                    </a> &nbsp;&nbsp;&nbsp;
                                    <!--<a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_edit_online_adm_enroll/<?php /*echo $row12['id'];*/?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php /*echo get_phrase('enroll');*/?>
                                    </a>
                                    <a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_edit_online_adm/<?php /*echo $row12['id'];*/?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php /*echo get_phrase('edit');*/?>
                                    </a>
                                    <a href="#" onclick="confirm_modal('<?php /*echo base_url();*/?>index.php?admin/online_admission/delete/<?php /*echo $row12['id'];*/?>');">
                                        <i class="entypo-trash"></i>
                                        <?php /*echo get_phrase('delete');*/?>
                                    </a>-->
                                </div>
                            </td>
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