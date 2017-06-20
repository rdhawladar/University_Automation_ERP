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
                        <th><div><?php echo get_phrase('particulars');?></div></th>
                        <th><div><?php echo get_phrase('amount');?></div></th>
                        <th><div><?php echo get_phrase('total_amount');?></div></th>
                        <th><div><?php echo get_phrase('paid');?></div></th>
                        <th><div><?php echo get_phrase('remaining');?></div></th>
                        <th><div><?php echo get_phrase('discount');?></div></th>
                        <th><div><?php echo get_phrase('remarks');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <!--<td><?php
/*                                string $str = $row['particulars1'];
                                echo unserialize (string $str);
                                */?>
                            </td>-->
                            <td>
                                <?php
                                //$str1 = ltrim($row['particulars1'], ' " ');
                                //$str2 = rtrim($row['particulars1'], ' " ');
                                //$str3 = $str1.$str2;
                                $str = substr($row['particulars1'],1,-1);
                                $val = explode(',', $str);
                                foreach($val as $out) {
                                ?>
                                <?php
                                echo $out."<br/>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $str = substr($row['particulars2'],1,-1);
                                $val1 = explode(',', $str);
                                foreach($val1 as $out1) {
                                    ?>
                                    <?php
                                    echo $out1."<br/>";
                                }
                                ?>
                            </td>
                            <!--<td><?php /*echo $row['amount_to_be_paid'];*/?></td>-->
                            <td>
                                <?php
                                $str = substr($row['particulars2'],1,-1);
                                $myArray = explode(",",$str);
                                echo array_sum($myArray);
                                /*$sum = 0;
                                foreach ($myArray as $value) {
                                    echo $sum += $value;
                                }*/
                                ?>
                            </td>
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
                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('semester');?></label>

                            <div class="col-sm-5">
                                <select name="class_id" class="form-control" data-validate="required" id="class_id"
                                        data-message-required="<?php echo get_phrase('value_required');?>"
                                        onchange="return get_class_sections(this.value)">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $classes = $this->db->get('semester')->result_array();
                                    foreach($classes as $row):
                                        ?>
                                        <option value="<?php echo $row['id'];?>">
                                            <?php echo $row['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('roll');?></label>
                            <div class="col-sm-5">
                                <select name="register_number" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('osad_student_12')->result_array();
                                    foreach($course_program as $row4):
                                        ?>
                                        <option value="<?php echo $row4['id'];?>">
                                            <?php echo $row4['id'];?>
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
                            <label class="col-sm-3 control-label"><?php echo get_phrase('semester');?></label>
                            <div class="col-sm-5">
                                <select name="receipt_no" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $semester = $this->db->get('semester')->result_array();
                                    foreach($semester as $row2):
                                        ?>
                                        <option value="<?php echo $row2['name'];?>">
                                            <?php echo $row2['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('particulars');?></label>
                            <div class="col-sm-8">
                                <select name="section_id" class="form-control" id="section_selector_holder">
                                    <option value=""><?php echo get_phrase('select_semester_first');?></option>
                                </select>
                                <?php
                                $department = '1';
                                $semester = '2';
                                //$condition = $department AND $semester;
                                //$array = array('fee_category' => $department, 'receipt_no' => $semster);
                                //$this->db->where($array);
                                $this->db->where('fee_category',$department);
                                $this->db->where('receipt_no',$semester);
                                $fee_structure = $this->db->get('semester_particulars')->result_array();
                                foreach($fee_structure as $row22):
                                ?>
                                    <div class="col-md-12 part">
                                        <div class="col-md-6"><input type="text" class="part1 form-control" name="particulars1[]" value="<?php echo $row22['description'];?>"><?php echo $row22['description'];?></div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="particulars2[]" placeholder="<?php echo $row22['fee_type'];?>">
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('fee_collection');?></button>
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

        function get_class_sections(class_id) {

            $.ajax({
                url: '<?php echo base_url();?>index.php?admin/get_class_section12/' + class_id ,
                success: function(response)
                {
                    jQuery('#section_selector_holder').html(response);
                }
            });

        }

    </script>