<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('exam_set_exam');?>
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
                        <th><div><?php echo get_phrase('department');?></div></th>
                        <th><div><?php echo get_phrase('batch');?></div></th>
                        <th><div><?php echo get_phrase('term');?></div></th>
                        <th><div><?php echo get_phrase('exam_name');?></div></th>
                        <th><div><?php echo get_phrase('course');?></div></th>
                        <th><div><?php echo get_phrase('max_mark');?></div></th>
                        <th><div><?php echo get_phrase('pass_mark');?></div></th>
                        <th><div><?php echo get_phrase('exam_date');?></div></th>
                        <th><div><?php echo get_phrase('start_time');?></div></th>
                        <th><div><?php echo get_phrase('end_time');?></div></th>
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
                            <td><?php echo $row['exam_name'];?></td>
                            <td><?php echo $row['subject'];?></td>
                            <td><?php echo $row['max_mark'];?></td>
                            <td><?php echo $row['pass_mark'];?></td>
                            <td><?php echo $row['exam_date'];?></td>
                            <td><?php echo $row['start_time'];?></td>
                            <td><?php echo $row['end_time'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_exam_set_exam/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/exam_set_exam/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/exam_set_exam/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="fee_category"/>-->
                                <select name="fee_category" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row1):
                                        ?>
                                        <option value="<?php echo $row1['course_name'];?>">
                                            <?php echo $row1['course_name'];?>
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
                                <!--<input type="text" class="form-control" name="receipt_no"/>-->
                                <select name="receipt_no" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $course_program = $this->db->get('batch')->result_array();
                                    foreach($course_program as $row2):
                                        ?>
                                        <option value="<?php echo $row2['batch_name'];?>">
                                            <?php echo $row2['batch_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('term');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="description"/>-->
                                <select name="description" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $course_program = $this->db->get('exam_set_term')->result_array();
                                    foreach($course_program as $row3):
                                        ?>
                                        <option value="<?php echo $row3['fee_category'];?>">
                                            <?php echo $row3['fee_category'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('exam_name');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="exam_name"/>-->
                                <select name="exam_name" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $course_program = $this->db->get('exam_create_exam')->result_array();
                                    foreach($course_program as $row4):
                                        ?>
                                        <option value="<?php echo $row4['receipt_no'];?>">
                                            <?php echo $row4['receipt_no'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="subject"/>-->
                                <select name="subject" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $course_program = $this->db->get('subjects')->result_array();
                                    foreach($course_program as $row5):
                                        ?>
                                        <option value="<?php echo $row5['name'];?>">
                                            <?php echo $row5['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('max_mark');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="max_mark"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('pass_mark');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="pass_mark"/>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('exam_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="exam_date"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('start_time');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="start_time" placeholder="10:00 am"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('end_time');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="end_time" placeholder="01.00 pm"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_exam_set_exam');?></button>
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