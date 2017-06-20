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
                        <th><div><?php echo get_phrase('register_number');?></div></th>
                        <th><div><?php echo get_phrase('name');?></div></th>
                        <th><div><?php echo get_phrase('physics');?></div></th>
                        <th><div><?php echo get_phrase('chemistry');?></div></th>
                        <th><div><?php echo get_phrase('mathmatics');?></div></th>
                        <th><div><?php echo get_phrase('english');?></div></th>
                        <th><div><?php echo get_phrase('previous_exam');?></div></th>
                        <th><div><?php echo get_phrase('obtained_mark');?></div></th>
                        <th><div><?php echo get_phrase('total_mark');?></div></th>
                        <th><div><?php echo get_phrase('merit_list');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['register_number'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['physics'];?></td>
                            <td><?php echo $row['chemistry'];?></td>
                            <td><?php echo $row['mathmatics'];?></td>
                            <td><?php echo $row['english'];?></td>
                            <td><?php echo $row['previous_exam'];?></td>
                            <td><?php echo $row['obtained_mark'];?></td>
                            <td><?php echo $row['total_mark'];?></td>
                            <td><?php echo $row['position'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_admission_mark_setup/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/admission_mark_setup/delete/<?php echo $row['id'];?>');">
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
                            <table class="border_new test">
                                <thead>
                                    <th><?php echo get_phrase('register_number');?></th>
                                    <th><?php echo get_phrase('name');?></th>
                                    <th><?php echo get_phrase('physics');?></th>
                                    <th><?php echo get_phrase('chemistry');?></th>
                                    <th><?php echo get_phrase('mathmatics');?></th>
                                    <th><?php echo get_phrase('english');?></th>
                                    <th><?php echo get_phrase('previous_exam');?></th>
                                    <th><?php echo get_phrase('obtained_mark');?></th>
                                    <th><?php echo get_phrase('total_mark');?></th>
                                    <th><?php echo get_phrase('merit_list');?></th>
                                </thead>
                                <tbody>
                                    <?php
                                    $allstds = $this->db->get('osad_student')->result_array();
                                    foreach($allstds as $row12):
                                    ?>
                                    <tr>
                                        <td><input type="text" class="form-control" name="register_number" value="<?php echo $row12['register_number'];?>"/></td>
                                        <td><input type="text" class="form-control" name="name" value="<?php echo $row12['name_en'];?>"/></td>
                                        <td><input type="text" class="form-control" name="physics"/></td>
                                        <td><input type="text" class="form-control" name="chemistry"/></td>
                                        <td><input type="text" class="form-control" name="mathmatics"/></td>
                                        <td><input type="text" class="form-control" name="english"/></td>
                                        <td><input type="text" class="form-control" name="previous_exam"/></td>
                                        <td><input type="text" class="form-control" name="obtained_mark"/></td>
                                        <td><input type="text" class="form-control" name="total_mark"/></td>
                                        <td><input type="text" class="form-control" name="position"/></td>
                                    </tr>
                                        <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!--<div class="form-group">
                            <label class="col-sm-3 control-label"><?php /*echo get_phrase('attendance_from');*/?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="fee_category"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php /*echo get_phrase('attendance_to');*/?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="receipt_no"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php /*echo get_phrase('marks');*/?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="description"/>
                            </div>
                        </div>-->
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