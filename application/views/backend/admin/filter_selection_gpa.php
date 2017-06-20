<div class="row">
    <div class="col-md-5">
        <?php echo "Program Name: "; ?>
        <?php
        $this->input->post('ProgramName');
        $this->db->where('id', $this->input->post('ProgramName'));
        $asa = $this->db->get('course_program')->result_array();
        foreach($asa as $rowa334):
            echo $rowa334['course_name'];
        endforeach;
        ?>
        <?php echo "<br/>"; ?>
        <?php echo "GPA To: "; ?>
        <?php echo "10"; ?>
        <?php echo "<br/>GPA From"; ?>
        <?php echo $this->input->post('FromGPA'); ?>
        <?php echo "<br/>"; ?>
        <?php echo "No. of Candidates: "; ?>
        <?php echo $this->input->post('SeatCount'); ?>
    </div>
    <div class="col-md-4">
        <?php echo form_open(base_url() . 'index.php?admin/online_admission/autoselection/3' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
        <?php foreach($short as $row123):?>
            <?php
            //echo $row123['id'];
            ?>
            <input type="hidden" name="id[]" value="<?php echo $row123['id'];?>">
            <input type="hidden" name="ProgramName[]" value="<?php echo $row123['NameofProgram'];?>">
            <input type="hidden" name="Session[]" value="<?php echo $row123['Session'];?>">
            <input type="hidden" name="AdmissionYear[]" value="<?php echo $row123['AdmissionYear'];?>">
            <input type="hidden" name="SelectedEmail[]" value="<?php echo $row123['PresentEmail'];?>">
        <?php endforeach;?>
        <button type="submit" class="btn btn-success"><?php echo get_phrase('select_all');?></button>
        </form>
    </div>
    <div class="col-md-3">
        <a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button class="btn btn-success" onclick="myFunction()">Print</button>
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
                        <!--<th><div><?php /*echo get_phrase('decision');*/?></div></th>-->
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
                            <td class="program_name13"><div><?php echo $row12['NameofApplicant'];?></div></td>
                            <td class="modlapopup">
                                <a target="_blank" href="<?php echo "uploads/student_image/".$row12[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row12[PhotoApplicant]; ?>" width="73" height="73" /></a>
                            </td>
                            <td>
                                <table class="ttres">
                                    <tr>
                                        <td><div><?php echo $row12['CertificateCGPA1'];?></div></td>
                                        <td><div><?php echo $row12['CertificateCGPA2'];?></div></td>
                                        <td><div><?php echo $row12['TotalGPA'];?></div></td>
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
                            <!--<td></td>-->
                            <td class="tblactions"><div>
                                    <a class="btn btn-success" href="<?php echo base_url() . 'index.php?admin/online_admission/singleautoselection/' .$row12['id'].'/3';?>">
                                        <?php echo get_phrase('select');?>
                                    </a> &nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-success" href="<?php echo base_url() . 'index.php?admin/online_admission/singlerejected/' .$row12['id'].'/4';?>">
                                        <?php echo get_phrase('reject');?>
                                    </a> &nbsp;&nbsp;&nbsp;
                                    <!--<a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_edit_online_adm_enroll/<?php /*echo $row12['id'];*/?>');">
                                        <?php /*echo get_phrase('reject');*/?>
                                    </a>&nbsp;&nbsp;&nbsp;
                                    <a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_edit_online_adm_enroll/<?php /*echo $row12['id'];*/?>');">
                                        <?php /*echo get_phrase('enroll');*/?>
                                    </a>&nbsp;&nbsp;&nbsp;-->
                                    <!--<a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_edit_online_adm/<?php /*echo $row12['id'];*/?>');">
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