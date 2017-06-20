<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('exam_enter_marks');?>
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
                        <th><div><?php echo get_phrase('term');?></div></th>
                        <th><div><?php echo get_phrase('exam_name');?></div></th>
                        <th><div><?php echo get_phrase('department');?></div></th>
                        <th><div><?php echo get_phrase('batch');?></div></th>
                        <th><div><?php echo get_phrase('subject');?></div></th>
                        <th><div><?php echo get_phrase('roll_no');?></div></th>
                        <th><div><?php echo get_phrase('max_mark');?></div></th>
                        <th><div><?php echo get_phrase('obt_mark');?></div></th>
                        <th><div><?php echo get_phrase('comment');?></div></th>
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
                            <td><?php echo $row['batch'];?></td>
                            <td><?php echo $row['subject'];?></td>
                            <td><?php echo $row['personal_roll_no'];?></td>
                            <td><?php echo $row['max_mark'];?></td>
                            <td><?php echo $row['obt_mark'];?></td>
                            <td><?php echo $row['comment'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_exam_enter_marks/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/exam_enter_marks/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/exam_enter_marks/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('term');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="fee_category"/>-->
                                <select name="fee_category" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_program = $this->db->get('exam_set_term')->result_array();
                                    foreach($course_program as $row1):
                                        ?>
                                        <option value="<?php echo $row1['fee_category'];?>">
                                            <?php echo $row1['fee_category'];?>
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
                                <!--<input type="text" class="form-control" name="receipt_no"/>-->
                                <select name="receipt_no" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_program = $this->db->get('exam_create_exam')->result_array();
                                    foreach($course_program as $row2):
                                        ?>
                                        <option value="<?php echo $row2['receipt_no'];?>">
                                            <?php echo $row2['receipt_no'];?>
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
                                <!--<input type="text" class="form-control" name="description"/>-->
                                <select name="description" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row3):
                                        ?>
                                        <option value="<?php echo $row3['course_name'];?>">
                                            <?php echo $row3['course_name'];?>
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
                                <!--<input type="text" class="form-control" name="batch"/>-->
                                <select name="batch" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_program = $this->db->get('batch')->result_array();
                                    foreach($course_program as $row4):
                                        ?>
                                        <option value="<?php echo $row4['batch_name'];?>">
                                            <?php echo $row4['batch_name'];?>
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
                                    <option value="#"><?php echo get_phrase('select');?></option>
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
                            <label class="col-sm-3 control-label"><?php echo get_phrase('roll_no');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="personal_roll_no"/>-->
                                <select name="personal_roll_no" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_program = $this->db->get('student')->result_array();
                                    foreach($course_program as $row6):
                                        ?>
                                        <option value="<?php echo $row6['roll'];?>">
                                            <?php echo $row6['roll'];?>
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
                                <input type="text" class="form-control" name="max_mark" placeholder="100"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('obtained_mark');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="obt_mark"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('attendance_mark');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="attn_mark"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('comment');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="comment"/>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_exam_enter_marks');?></button>
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