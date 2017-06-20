<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('revenue_setup');?>
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
                        <th><div><?php echo get_phrase('from_date');?></div></th>
                        <th><div><?php echo get_phrase('to_date');?></div></th>
                        <th><div><?php echo get_phrase('faculty');?></div></th>
                        <th><div><?php echo get_phrase('department');?></div></th>
                        <th><div><?php echo get_phrase('batch');?></div></th>
                        <th><div><?php echo get_phrase('income');?></div></th>
                        <th><div><?php echo get_phrase('netincome');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['fee_category'];?></td>
                            <td><?php echo $row['receipt_no'];?></td>
                            <td><?php echo $row['description'];?></td>
                            <td><?php echo $row['department'];?></td>
                            <td><?php echo $row['batch'];?></td>
                            <td><?php echo $row['income'];?></td>
                            <td><?php echo $row['netincome'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_revenue_setup/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/revenue_setup/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/revenue_setup/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('from_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="fee_category"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('to_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="receipt_no"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('faculty');?></label>
                            <div class="col-sm-5">
                                <select name="description" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $faculty = $this->db->get('faculty_setup')->result_array();
                                    foreach($faculty as $row21):
                                        ?>
                                        <option value="<?php echo $row21['name'];?>">
                                            <?php echo $row21['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                            <div class="col-sm-5">
                                <select name="department" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row22):
                                        ?>
                                        <option value="<?php echo $row22['course_name'];?>">
                                            <?php echo $row22['course_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                            <div class="col-sm-5">
                                <select name="batch" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $batch = $this->db->get('batch')->result_array();
                                    foreach($batch as $row23):
                                        ?>
                                        <option value="<?php echo $row23['batch_name'];?>">
                                            <?php echo $row23['batch_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('income');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="income"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('net_income');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="netincome"/>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_revenue_setup');?></button>
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