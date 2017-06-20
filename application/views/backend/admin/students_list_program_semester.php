<div class="row">
    <div class="col-md-8">
        <h4>
        <?php
        echo "Program Name: ";
        $data['NameofProgram']         = $this->input->post('NameofProgram');
        $this->db->where('id', $data['NameofProgram']);
        $course_name = $this->db->get('course_program')->result_array();
        foreach($course_name as $row33):
            echo $row33['course_name'];
        endforeach;
        echo "<br/>";
        ?>
        </h4>
        <h5>
        <?php
        echo "Semester Name: ";
        $data['StdStatus']         = $this->input->post('StdStatus');
        $this->db->where('id', $data['StdStatus']);
        $semester_name = $this->db->get('semester')->result_array();
        foreach($semester_name as $row34):
            echo $row34['name'];
        endforeach;
        echo "<br/>";
        ?>
        </h5>
        <h5>
            <?php
            echo "Session Name: ";
            $data['Session']         = $this->input->post('Session');
            $this->db->where('id', $data['Session']);
            $as = $this->db->get('session_pundro')->result_array();
            foreach($as as $row334):
                echo $row334['SessionName']." (".$row334['SemesterDuration'].")";
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
        <div class="" id="">
            <table class="table table-bordered datatable" id="table_export">
                <thead>
                <tr>
                    <th><div>#</div></th>
                    <th><div><?php echo get_phrase('Photo');?></div></th>
                    <th><div><?php echo get_phrase('session');?></div></th>
                    <th><div><?php echo get_phrase('program');?></div></th>
                    <th><div><?php echo get_phrase('semester');?></div></th>
                    <th><div><?php echo get_phrase('roll_no');?></div></th>
                    <th><div><?php echo get_phrase('registratio_no');?></div></th>
                    <th><div><?php echo get_phrase('student_name');?></div></th>
                    <th><div><?php echo get_phrase('Actions');?></div></th>
                </tr>
                </thead>
                <tbody>
                <?php

                ?>
                <?php $count = 1;foreach($as as $row):?>
                    <tr>
                        <td><?php echo $count++;?></td>
                        <td class="modlapopup">
                            <a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="73" height="73" /></a>
                        </td>
                        <td><?php echo $row['Session'];?></td>
                        <td>
                            <?php
                            $this->db->where('id', $row['NameofProgram']);
                            //echo $row['NameofProgram'];
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $ee):
                                echo $ee['course_name'];
                            endforeach;
                            ?>
                        </td>
                        <td>
                            <?php
                            $val = end(explode(',', $row['StdStatus']));
                            ?>
                            <?php
                            $this->db->where('id', $val);
                            $course_progrm = $this->db->get('semester')->result_array();
                            foreach($course_progrm as $cee):
                                echo $cee['name'];
                            endforeach;
                            ?>
                        </td>
                        <td><?php echo $row['ClassRollNo'];?></td>
                        <td><?php echo $row['RegistratioNo'];?></td>
                        <td><?php echo $row['NameofApplicant'];?></td>
                        <td style="width: 420px;">
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_student_id_card_profile12/<?php echo $row['id'];?>');"><?php echo get_phrase('admission_admit_card');?></a><br/>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_midtermadmitcard/<?php echo $row['id'];?>');"><?php echo get_phrase('mid_term_admit_card');?></a><br/>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_student_id_card_profile12/<?php echo $row['id'];?>');"><?php echo get_phrase('final_term_admit_card');?></a><br/>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_profile_pundro/<?php echo $row['id'];?>');"><?php echo get_phrase('profile');?>
                            </a><br/>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_online_adm/<?php echo $row['id'];?>');"><i class="entypo-pencil"></i><?php echo get_phrase('edit');?></a><br/>
                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/online_admission/delete/<?php echo $row['id'];?>');"><i class="entypo-trash"></i><?php echo get_phrase('delete');?></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>