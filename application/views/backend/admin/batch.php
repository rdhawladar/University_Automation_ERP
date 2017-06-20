<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('batch');?>
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
                        <!--<th><div><?php /*echo get_phrase('academic_year');*/?></div></th>-->
                        <th><div><?php echo get_phrase('course');?></div></th>
                        <th><div><?php echo get_phrase('batch_name');?></div></th>
                        <th><div><?php echo get_phrase('batch_alias');?></div></th>
                        <th><div><?php echo get_phrase('start_date');?></div></th>
                        <th><div><?php echo get_phrase('end_date');?></div></th>
                        <th><div><?php echo get_phrase('maxstudents');?></div></th>
                        <th><div><?php echo get_phrase('status');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <!--<td><?php /*echo $row['academic_year'];*/?></td>-->
                            <td style="width: 250px;"><?php
                                //echo $row['course'];
                                $this->db->where('id', $row['course']);
                                $a1s = $this->db->get('course_program')->result_array();
                                foreach($a1s as $ro34):
                                    echo $ro34['course_name'];
                                endforeach;
                                ?></td>
                            <td><?php echo $row['batch_name'];?></td>
                            <td><?php echo $row['batch_alias'];?></td>
                            <td><?php echo $row['strt_dt'];?></td>
                            <td><?php echo $row['end_dt'];?></td>
                            <td><?php echo $row['maxstudents'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_batch/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/batch/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/batch/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">

                        <!--<div class="form-group">
                            <label class="col-sm-3 control-label"><?php /*echo get_phrase('academic_year');*/?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="academic_year"/>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="course"/>-->
                                <select name="course" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row):
                                        ?>
                                        <option value="<?php echo $row['id'];?>">
                                            <?php echo $row['course_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('batch_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="batch_name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('batch_alias');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="batch_alias"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('start_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="strt_dt"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('end_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="end_dt"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('maximum_number_of_students');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="maxstudents"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                            <div class="col-sm-5">
                                <select name="status" id="">
                                    <option value="#">Please Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_batch');?></button>
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