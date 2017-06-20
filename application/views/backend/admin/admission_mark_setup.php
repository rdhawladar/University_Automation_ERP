<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('admission_mark_setup');?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_record');?>
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
                        <th><div><?php echo get_phrase('ID');?></div></th>
                        <th><div><?php echo get_phrase('name');?></div></th>
                        <th><div><?php echo get_phrase('obtained_mark');?></div></th>
                        <th><div><?php echo get_phrase('total_mark');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php
                                echo $row['RegisterNumber'];
                                ?></td>
                            <td>
                                <?php
                                $this->db->where('id', $row['RegisterNumber']);
                                $asxz = $this->db->get('applicants_details')->result_array();
                                foreach($asxz as $row334xz):
                                    echo $row334xz['NameofApplicant'];
                                endforeach;
                                ?>
                            </td>
                            <td><?php
                                echo $row['AdmMarksObtained'];
                                //echo $row['RegisterNumber'];
                                /*$str212 = substr($row['AdmMarksObtained'],1,-1);
                                $val212 = explode(',', $str212);
                                foreach($val212 as $out212) {
                                    */?><!--
                                    --><?php
/*                                    echo $out212 . "<br/>";
                                }*/
                                ?></td>
                            <td><?php echo $row['TotalMark'];?></td>
                            <td>
                                <a class="btn btn-success" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_admission_mark_setup/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a class="btn btn-success" href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/admission_mark_setup/delete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete');?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/admission_mark_setup/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <table class="border_new test test12">
                                <thead>
                                <th><?php echo get_phrase('ID');?></th>
                                <th><?php echo get_phrase('program_name');?></th>
                                <th><?php echo get_phrase('mobile_number');?></th>
                                <th><?php echo get_phrase('candidate_name');?></th>
                                <th><?php echo get_phrase('mark_obtained');?></th>
                                </thead>
                                <tbody>
                                <?php
                                $temp = '1';
                                $this->db->where('IsActive',$temp);
                                $semester = $this->db->get('admission_configuration')->result_array();
                                foreach($semester as $wee):
                                endforeach;
                                $this->db->where('id',$wee['SemesterName']);
                                $semester12 = $this->db->get('session_pundro')->result_array();
                                foreach($semester12 as $wee12):
                                endforeach;
                                $this->db->where('id',$wee['Year']);
                                $semester13 = $this->db->get('year_calendar')->result_array();
                                foreach($semester13 as $wee13):
                                endforeach;
                                ?>
                                <?php
                                //echo $wee['SemesterName'];
                                //echo $wee['Year'];
                                //echo $wee['ProgramName'];
                                ?>
                                <?php
                                //$wee['ProgramName'] = 1;
                                $this->db->where('Session',$wee['SemesterName']);
                                //$this->db->where('NameofProgram',$wee['ProgramName']);
                                $this->db->where('AdmissionYear',$wee['Year']);
                                $allstds12 = $this->db->get('applicants_details')->result_array();
                                ?>
                                <div class="row">
                                    <div class="col-md-4">Total Mark</div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="TotalMark"/>
                                    </div>
                                </div>
                                <?php
                                foreach($allstds12 as $row14):
                                    $this->db->where('id', $row14['NameofProgram']);
                                    $asas = $this->db->get('course_program')->result_array();
                                    foreach($asas as $row334as):
                                        //echo $row334as['course_name'];
                                    endforeach;
                                    ?>
                                    <tr>
                                        <td><input type="text" readonly class="form-control" name="id[]" value="<?php echo $row14['id'];?>"/></td>
                                        <td><div style="width: 280px;"><input readonly style="width:280px;position:relative;" type="text" class="form-control" name="ProgramName[]" value="<?php echo $row334as['course_name'];?>"/></div></td>
                                        <td><input type="text" class="form-control" readonly name="MobileNumber[]" value="<?php echo $row14['PresentMobile'];?>"/></td>
                                        <td><input type="text" class="form-control" readonly name="CandidateName[]" value="<?php echo $row14['NameofApplicant'];?>"/></td>
                                        <td><input type="text" class="form-control" name="AdmMarksObtained[]"/></td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <p>&nbsp;</p>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_admission_mark_setup');?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
        </div>
    </div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $("#table_export").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>