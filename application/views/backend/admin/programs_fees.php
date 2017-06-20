<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('programs_fees');?>
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
                        <th><div><?php echo get_phrase('program_name');?></div></th>
                        <th><div><?php echo get_phrase('semester_total');?></div></th>
                        <th><div><?php echo get_phrase('credit_total');?></div></th>
                        <th><div><?php echo get_phrase('admission_&_registration_fee');?></div></th>
                        <th><div><?php echo get_phrase('tuition_fee');?></div></th>
                        <th><div><?php echo get_phrase('per_semester_tuition_fee');?></div></th>
                        <th><div><?php echo get_phrase('other_fee');?></div></th>
                        <th><div><?php echo get_phrase('per_semester_other_fees');?></div></th>
                        <th><div><?php echo get_phrase('total_fees');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['program_name'];?></td>
                            <td><?php echo $row['semester_total'];?></td>
                            <td><?php echo $row['credit_total'];?></td>
                            <td><?php echo $row['adm_regist_fee'];?></td>
                            <td><?php echo $row['tuition_fee'];?></td>
                            <td><?php echo $row['per_semester_tuition_fee'];?></td>
                            <td><?php echo $row['other_fee'];?></td>
                            <td><?php echo $row['per_semester_other_fees'];?></td>
                            <td><?php echo $row['fee_total'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_programs_fees/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/programs_fees/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/programs_fees/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select name="program_name" class="form-control">
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
                            <label class="col-sm-3 control-label"><?php echo get_phrase('semester_total');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="semester_total" id="semester_total"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('credit_total');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="credit_total" id="credit_total"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('admission_&_registration_fee');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="adm_regist_fee" id="adm_regist_fee"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('tuition_fee');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="tuition_fee" id="tuition_fee"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('per_semester_tuition_fee');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="per_semester_tuition_fee" id="per_semester_tuition_fee"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('other_fee');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="other_fee" id="other_fee"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('per_semester_other_fees');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="per_semester_other_fees" id="per_semester_other_fees"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('fee_total');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="fee_total" id="fee_total"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_programs_fees');?></button>
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


            var datatable = $("#table_export").dataTable({

                //"sPaginationType": "full_numbers",
                //"lengthMenu": [ 10, 25, 50, 75, 100 ],
                /*"lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
                 "pageLength" : 25,*/
                /*"aLengthMenu": [ [2, 4, 8, -1], [2, 4, 8, "All"] ],*/
                "aLengthMenu": [ [30, 50, 100, 200, 500, 1000, 2000, 3000,  -1], [30, 50, 100, 200, 500, 1000, 2000, 3000, "All"] ],
                "iDisplayLength" : 30,
                /*"aLengthMenu": "bootstrap",*/
                //"iDisplayLength": "500",
                "paging": "false",
                //"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
                "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
                "oTableTools": {
                    "aButtons": [

                        {
                            "sExtends": "xls",
                            "mColumns": [1,2]
                        },
                        {
                            "sExtends": "pdf",
                            "mColumns": [1,2]
                        },
                        {
                            "sExtends": "print",
                            "fnSetText"	   : "Press 'esc' to return",
                            "fnClick": function (nButton, oConfig) {
                                datatable.fnSetColumnVis(0, false);
                                datatable.fnSetColumnVis(3, false);

                                this.fnPrint( true, oConfig );

                                window.print();

                                $(window).keyup(function(e) {
                                    if (e.which == 27) {
                                        datatable.fnSetColumnVis(0, true);
                                        datatable.fnSetColumnVis(3, true);
                                    }
                                });
                            },

                        },
                    ]
                },

            });

            $(".dataTables_wrapper select").select2({
                minimumResultsForSearch: -1
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            sum();
            $("#adm_regist_fee, #tuition_fee, #other_fee").on("keydown keyup", function() {
                sum();
            });
        });

        function sum() {
            var num3 = document.getElementById('adm_regist_fee').value;
            var num1 = document.getElementById('tuition_fee').value;
            var num2 = document.getElementById('other_fee').value;
            var result = parseFloat(num1) + parseFloat(num2) + parseFloat(num3);
            if (!isNaN(result)) {
                document.getElementById('fee_total').value = result;
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            division();
            $("#semester_total, #tuition_fee").on("keydown keyup", function() {
                division();
            });
        });

        function division() {
            var num1 = document.getElementById('semester_total').value;
            var num2 = document.getElementById('tuition_fee').value;
            var result = parseFloat(num2) / parseFloat(num1);
            if (!isNaN(result)) {
                document.getElementById('per_semester_tuition_fee').value = result;
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            division1();
            $("#semester_total, #other_fee").on("keydown keyup", function() {
                division1();
            });
        });

        function division1() {
            var num1 = document.getElementById('semester_total').value;
            var num2 = document.getElementById('other_fee').value;
            var result = parseFloat(num2) / parseFloat(num1);
            if (!isNaN(result)) {
                document.getElementById('per_semester_other_fees').value = result;
            }
        }
    </script>