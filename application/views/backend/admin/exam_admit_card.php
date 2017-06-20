<div class="row">
    <div class="col-md-12">
        <?php echo form_open(base_url() . 'index.php?admin/exam_admit_card', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
        <div class="padded">
            <div class="form-group">
                <div class="col-md-3">
                    <label for="">Batch Name</label>
                     <select name="BatchName" class="form-control" style="height:30px;">
                        <option value="*"><?php echo get_phrase('select'); ?></option>
                        <?php
                        $xc = $this->db->get('batch')->result_array();
                        foreach ($xc as $rowxc):
                            ?>
                            <option value="<?php echo $rowxc['id']; ?>">
                                <?php echo $rowxc['batch_alias']; ?>
                            </option>
                            <?php   
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Semester Name</label>
                     <select name="SemesterName" class="form-control" style="height:30px;">
                        <option value="*"><?php echo get_phrase('select semester'); ?></option>
                        <?php
                        $xc = $this->db->get('semester')->result_array();
                        foreach ($xc as $rowxc):
                            ?>
                            <option value="<?php echo $rowxc['id']; ?>">
                                <?php echo $rowxc['name']; ?>
                            </option>
                            <?php   
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="">Exam Type</label>
                     <select name="TermName" class="form-control" style="height:30px;">
                        <option value="*"><?php echo get_phrase('select term'); ?></option>
                        <?php
                        $xc = $this->db->get('exam_phase')->result_array();
                        foreach ($xc as $rowxc):
                            ?>
                            <option value="<?php echo $rowxc['id']; ?>">
                                <?php echo $rowxc['name']; ?>
                            </option>
                            <?php   
                        endforeach;
                        ?>
                    </select>
                </div>
                 <div class="col-md-2">
                    <p style="height: 14px;">&nbsp;</p>
                    <button type="submit" class="btn btn-success"><?php echo get_phrase('show'); ?></button>
                </div>
               
            </div>
        </div>
        </form>
    </div>
</div>
<!----CREATION FORM ENDS-->
<div class="row">
    <div class="col-md-12">
        <p>&nbsp;</p>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('students_exam_admit_card'); ?>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <?php echo $semester_fee[1];?>
            <div class="tab-pane box active onad" id="list">
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th><div><?php echo get_phrase('serial_no'); ?></div></th>
                            <th><div><?php echo get_phrase('student_id'); ?></div></th>
                            <th><div><?php echo get_phrase('name'); ?></div></th>
                            <th><div><?php echo get_phrase('father_name'); ?></div></th>
                            <th><div><?php echo get_phrase('mother_name'); ?></div></th>
                            <th><div><?php echo get_phrase('blood_group'); ?></div></th>
                            <th><div><?php echo get_phrase('gender'); ?></div></th>
                            <th><div><?php echo get_phrase('actual_semester_fee'); ?></div></th>
                            <th><div><?php echo get_phrase('paid_semester_fee'); ?></div></th>
                            <th><div><?php echo get_phrase('payment_status'); ?></div></th>
                            <th><div ><?php echo get_phrase('Actions'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php $count = 1;
                        foreach ($std_fee_collectionDB as $row1):
                            $studentId = $row1['register_number'];
                        $this->db->where('id', $studentId);
                        $temp12 = $this->db->get(student_pundro)->result_array();
                        foreach($temp12 as $row):
                        ?>
                            <tr>
                                <td><?php 
                                    echo $count++; 
                                    //echo $row['NameofApplicant'];
                                    ?></td>
                                <td >
                                    <div>
                                        <?php
                                        if($row['id'] == $studentId){
                                        echo $row['RegistratioNo'];}
                                        ?>
                                    </div>
                                </td>
                                <td>                                    
                                        <?php
                                        if($row['id'] == $studentId){
                                        echo $row['NameofApplicant'];}
                                        ?>                                    
                                </td>
                                <td>
                                    <div>
                                        <?php
                                        if($row['id'] == $studentId){
                                        echo $row['ApplicantFatherName'];}
                                        ?>
                                    </div>
                                    </td>
                                <td>
                                    <div>
                                        <?php 
                                        if($row['id'] == $studentId){
                                        echo $row['ApplicantMotherName']; }
                                        ?>
                                    </div>
                                </td>
                                

                                <td>
                                    <div>
                                        <?php 
                                        if($row['id'] == $studentId){
                                        echo $row['BloodGroup']; }
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <?php
                                        if($row['id'] == $studentId){
                                        if( $row['ApplicantGender'] == 1)
                                        {echo 'Male';}
                                        else {echo'Female';}
                                        }?>
                                    </div>
                                </td>
                                 <td>
                                    <div>
                                        <?php 
                                            $semesterFee = 'Semester Fee';
                                            $this->db->where('Particulars', $semesterFee);
                                            $givenSemesterFee = $this->db->get('semester_particulars')->result_array();
                                            foreach ($givenSemesterFee as $amount): {
                                                $actualSemesterFee = $amount['Amount'];
                                                break;
                                                }
                                            endforeach;
                                            echo $actualSemesterFee;
                                        ?>
                                    </div>
                                </td>
                                 <td>
                                    <div>
                                        <?php
                                        $this->db->where('register_number', $studentId );
                                        $particulars = $this->db->get('std_fee_collection')->result_array();
                                                    foreach($particulars as $particulars3){
                                                        $str = substr($particulars3['particulars2'], 1, -1);
                                                        $val = explode(',', $str);                                                        
                                                        $i = 1;
                                                        foreach ($val as $out) {
                                                            if ($i == 2) {
                                                                echo $paidFee = $out;
                                                            }
                                                            $i++;
                                                        }
                                                    
                                                    }
                                                    ?>
                                    </div>
                                </td>
                                 <td>
                                    <div>
                                        <?php 
                                         echo $resultFee = ($paidFee/$actualSemesterFee) * 100 . '%';
                                        ?>
                                    </div>
                                </td>
                                <td class="tblactions">
                                    <div>
                                        <?php
                                        if($resultFee>= 50 && $resultFee <=100){
                                        echo form_open(base_url() . 'index.php?admin/exam_admit_card_preview', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                                        <button type="submit" name="RegistrationNo"><a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/exam_admit_card_preview/<?php echo $row['RegistratioNo'];?>');">
                                        <?php }?> 
                                            <i class="entypo-pencil"></i>
                                        <?php echo get_phrase('preview'); ?>
                                            </a></button>                                        
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>