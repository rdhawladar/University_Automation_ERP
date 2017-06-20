<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('fee_collection');?>
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
                        <th><div><?php echo get_phrase('receipt_no');?></div></th>
                        <th><div><?php echo get_phrase('fees_note');?></div></th>
                        <th><div><?php echo get_phrase('amount');?></div></th>
                        <th><div><?php echo get_phrase('paid_date');?></div></th>
                        <th><div><?php echo get_phrase('fine');?></div></th>
                        <th><div><?php echo get_phrase('discount');?></div></th>
                        <th><div><?php echo get_phrase('remarks');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['receipt_voucher_no'];?></td>
                            <td><?php echo $row['receipt_no'];?></td>
                            <td><?php echo $row['amount_to_be_paid'];?></td>
                            <td><?php echo $row['receipt_date'];?></td>
                            <td><?php echo $row['fine'];?></td>
                            <td><?php echo $row['discount'];?></td>
                            <td><?php echo $row['remarks'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_std_fee_collection/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/std_fee_collection/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/std_fee_collection/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="fee_category"/>-->
                                <select name="fee_category" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
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
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
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
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('register_number');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="register_number"/>-->
                                <select name="register_number" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('osad_student')->result_array();
                                    foreach($course_program as $row4):
                                        ?>
                                        <option value="<?php echo $row4['register_number'];?>">
                                            <?php echo $row4['register_number'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('admission_form');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="admission_form"/>-->
                                <select name="admission_form" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('std_fee_sub_category')->result_array();
                                    foreach($course_program as $row5):
                                        ?>
                                        <option value="<?php echo $row5['description'];?>">
                                            <?php echo $row5['receipt_no']." :: ".$row5['description'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('admission_id_card');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="admission_id_card"/>-->
                                <select name="admission_id_card" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('std_fee_sub_category')->result_array();
                                    foreach($course_program as $row6):
                                        ?>
                                        <option value="<?php echo $row6['description'];?>">
                                            <?php echo $row6['receipt_no']." :: ".$row6['description'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('tution_fee');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="tution_fee"/>-->
                                <select name="tution_fee" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('std_fee_sub_category')->result_array();
                                    foreach($course_program as $row7):
                                        ?>
                                        <option value="<?php echo $row7['description'];?>">
                                            <?php echo $row7['receipt_no']." :: ".$row7['description'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('actual_amount');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="actual_amount" value="3000000"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('amount_to_be_paid');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="amount_to_be_paid" value="3000000"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('fine');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="fine"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('discount');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="discount"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('receipt_voucher_no');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="receipt_voucher_no"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('receipt_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="receipt_date"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('remarks');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="remarks"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_fee_collection');?></button>
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