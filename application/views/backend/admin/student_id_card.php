<div class="row">
    <div class="col-md-12">
        <?php echo form_open(base_url() . 'index.php?admin/student_id_card', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
        <div class="padded">
<!--            <form method="POST" action="<?//php echo $this->base_url();?>/Admin/student_id_card">-->
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Batch Name</label>
                    <select name="BatchName" class="form-control" style="height:30px;">
                        <option value="*"><?php echo get_phrase('select batch'); ?></option>
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
                 <div class="col-md-2">
                    <p style="height: 14px;">&nbsp;</p>
                    <button type="submit" class="btn btn-success"><?php echo get_phrase('show'); ?></button>
                </div>
               
            </div>
<!--            </form>-->
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
                    <?php echo get_phrase('students_id_card_generation'); ?>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane box active onad" id="list">
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th><div>#</div></th>
                            <th><div><?php echo get_phrase('student_id'); ?></div></th>
                            <th><div><?php echo get_phrase('name'); ?></div></th>
                            <th><div><?php echo get_phrase('father_name'); ?></div></th>
                            <th><div><?php echo get_phrase('mother_name'); ?></div></th>
                            <th><div><?php echo get_phrase('blood_group'); ?></div></th>

                            <th><div><?php echo get_phrase('gender'); ?></div></th>


                            <th><div ><?php echo get_phrase('Actions'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php $count = 1;
                        foreach ($q as $row): ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td >
                                    <div>
                                        <?php
//                                        if($rowxc['id'] == $row['NameofBatch'])
                                        echo $row['RegistratioNo'];                                            
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    
                                        <?php
                                        echo $row['NameofApplicant'];
                                       ?>
                                    
                                </td>
                                <td>
                                    <div>
                                        <?php
                                        echo $row['ApplicantFatherName'];
                                        ?>
                                    </div>
                                    </td>
                                <td>
                                    <div>
                                        <?php 
                                        echo $row['ApplicantMotherName']; 
                                        ?>
                                    </div>
                                </td>
                                

                                <td>
                                    <div>
                                        <?php 
                                        echo $row['BloodGroup']; 
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <?php
                                        if( $row['ApplicantGender'] == 1)
                                        echo 'Male';
                                        else echo'Female';
                                        ?>
                                    </div>
                                </td>                         
                                <td class="tblactions">
                                    <div>
                                        <?php echo form_open(base_url() . 'index.php?admin/student_id_card_preview', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                                        <button type="submit" value="<?php echo $row['RegistraioNo'];?>" name="RegistrationNo"> <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/student_id_card_preview/<?php echo $row['RegistratioNo'];?>');">
                                         <i class="entypo-pencil"></i>
                                            <?php echo get_phrase('preview'); ?>
                                            </a> </button>
                                        
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>