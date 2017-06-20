<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('distribution_of_credit_hours');?>
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
                        <th><div><?php echo get_phrase('semester_name');?></div></th>
                        <th><div><?php echo get_phrase('theory_credit_hours');?></div></th>
                        <th><div><?php echo get_phrase('laboratory_credit_hours');?></div></th>
                        <th><div><?php echo get_phrase('thesis_or_project_work_credit_hours');?></div></th>
                        <th><div><?php echo get_phrase('semester_credit_hours');?></div></th>
                        <th><div><?php echo get_phrase('program');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td>
                                <?php
                                //echo $row['SemesterName'];
                                $this->db->where('id', $row['SemesterName']);
                                $course_name = $this->db->get('semester')->result_array();
                                foreach($course_name as $row313):
                                    echo $row313['name'];
                                endforeach;
                                ?>
                            </td>
                            <td><?php echo $row['TheoryCreditHours'];?></td>
                            <td><?php echo $row['LaboratoryCreditHours'];?></td>
                            <td><?php echo $row['ThesisOrProjectWorkCreditHours'];?></td>
                            <td><?php echo $row['SemesterCreditHours'];?></td>
                            <td>
                                <?php
                                /*echo $row['Program'];
                                $this->db->where('id', $row['alias']);
                                $course_name =  $this->db->select('course_program')->result_array();
                                foreach($course_name as $rrr):
                                    echo $rrr['course_name'];
                                    endforeach;*/
                                $this->db->where('id', $row['Program']);
                                $course_name = $this->db->get('course_program')->result_array();
                                foreach($course_name as $row33):
                                    echo $row33['course_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_distribution_of_credit_hours/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/distribution_of_credit_hours/delete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
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
                    <?php echo form_open(base_url() . 'index.php?admin/distribution_of_credit_hours/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('semester_name');?></label>
                            <div class="col-sm-5">
                                <select name="SemesterName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $semester = $this->db->get('semester')->result_array();
                                    foreach($semester as $row11):
                                        ?>
                                        <option value="<?php echo $row11['id'];?>">
                                            <?php echo $row11['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('theory_credit_hours');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="TheoryCreditHours" id="TheoryCreditHours" placeholder="12.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('laboratory_credit_hours');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="LaboratoryCreditHours" id="LaboratoryCreditHours" placeholder="03.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('thesis_or_project_work_credit_hours');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="ThesisOrProjectWorkCreditHours" id="ThesisOrProjectWorkCreditHours" placeholder="02.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('semester_credit_hours');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="SemesterCreditHours" id="SemesterCreditHours" placeholder="15.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program');?></label>
                            <div class="col-sm-5">
                                <select name="Program" class="form-control">
                                    <option value="#"><?php echo get_phrase('select_program') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row112):
                                        ?>
                                        <option value="<?php echo $row112['id'];?>">
                                            <?php echo $row112['course_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_distribution_of_credit_hours');?></button>
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
<script type="text/javascript">
    $(document).ready(function() {
        sum12();
        $("#TheoryCreditHours, #LaboratoryCreditHours, #ThesisOrProjectWorkCreditHours").on("keydown keyup", function() {
            sum12();
        });
    });

    function sum12() {
        var num1 = document.getElementById('TheoryCreditHours').value;
        var num2 = document.getElementById('LaboratoryCreditHours').value;
        var num3 = document.getElementById('ThesisOrProjectWorkCreditHours').value;
        var result = parseFloat(num1) + parseFloat(num2) + parseFloat(num3);
        if (!isNaN(result)) {
            document.getElementById('SemesterCreditHours').value = result;
        }
    }
</script>