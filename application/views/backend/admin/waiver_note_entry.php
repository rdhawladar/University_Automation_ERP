<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('waiver_note_entry');?>
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
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_waiver_note_entry/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/waiver_note_entry/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/waiver_note_entry/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('fee_structure');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="datepicker form-control" name="fee_category"/>-->
                                <select name="fee_category" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $std_fee_category = $this->db->get('std_fee_category')->result_array();
                                    foreach($std_fee_category as $row32):
                                        ?>
                                        <option value="<?php echo $row32['fee_category'];?>">
                                            <?php echo $row32['fee_category'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('fee_note');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="datepicker form-control" name="receipt_no"/>-->
                                <select name="receipt_no" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $std_fee_sub_category = $this->db->get('std_fee_sub_category')->result_array();
                                    foreach($std_fee_sub_category as $row33):
                                        ?>
                                        <option value="<?php echo $row33['receipt_no'];?>">
                                            <?php echo $row33['receipt_no'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('excemption_or_deduction');?></label>
                            <div class="col-sm-5">
                                <select name="description" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <option value="none"><?php echo get_phrase('none');?></option>
                                    <option value="exemption"><?php echo get_phrase('exemption');?></option>
                                    <option value="deduction"><?php echo get_phrase('deduction');?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('category_or_gender');?></label>
                            <div class="col-sm-5">
                                <select name="department" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <option value="category"><?php echo get_phrase('category');?></option>
                                    <option value="gender"><?php echo get_phrase('gender');?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('category_name');?></label>
                            <div class="col-sm-5">
                                <select name="batch" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <option value="cat1"><?php echo get_phrase('cat1');?></option>
                                    <option value="cat2"><?php echo get_phrase('cat2');?></option>
                                </select>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="col-sm-3 control-label"><?php /*echo get_phrase('gender');*/?></label>
                            <div class="col-sm-5">
                                <select name="income" class="form-control">
                                    <option value="#"><?php /*echo get_phrase('select');*/?></option>
                                    <option value="male"><?php /*echo get_phrase('male');*/?></option>
                                    <option value="female"><?php /*echo get_phrase('female');*/?></option>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('category_or_gender');?></label>
                            <div class="col-sm-5">
                                <input type="radio" name="age1" value="No" class="aboveage1" /> Category <br>
                                <input type="radio" name="age1" value="No1" class="aboveage1" /> Gender
                            </div>
                        </div>
                        <div class="form-group">
                            <!--<ol class="formset">
                                <li>
                                    <input type="radio" name="age1" value="Yes" class="aboveage1" />
                                    <input type="radio" name="age1" value="No" class="aboveage1" /> Category <br>
                                    <input type="radio" name="age1" value="No1" class="aboveage1" /> Gender
                                </li>
                            </ol>-->
                            <label class="col-sm-3 control-label">&nbsp;</label>
                            <div class="col-sm-5">
                                <ol id="parent1" class="formset">
                                    <li><label for="contact1">Category: </label>
                                        <input type="text" id="contact1" value="" name="income"/></li>
                                </ol>
                                <ol id="parent11" class="formset">
                                    <li><label for="contact1">Gender</label>
                                        <input type="text" id="contact11" value="" name="netincome"/></li>
                                </ol>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('deduction_amount_percentage');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="deduct"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_waiver_note_entry');?></button>
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
        $(document).ready(function(){
            $("#parent1").css("display","none");
            $("#parent11").css("display","none");

            $(".aboveage1").click(function(){
                if ($('input[name=age1]:checked').val() == "No" ) {
                    $("#parent1").slideDown("fast");
                } else {
                    $("#parent1").slideUp("fast");
                }
            });
            $(".aboveage1").click(function(){
                if ($('input[name=age1]:checked').val() == "No1" ) {
                    $("#parent11").slideDown("fast");
                } else {
                    $("#parent11").slideUp("fast");
                }
            });
        });
    </script>