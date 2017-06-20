<div class="row">
    <div class="col-md-12">
        <div class="box-content">
            <?php echo form_open(base_url() . 'index.php?admin/sparticulars' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
            <div class="padded">
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                    <div class="col-sm-5">
                        <select name="ProgramName" class="form-control">
                            <option value="#"><?php echo get_phrase('select') ;?></option>
                            <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row212):
                                ?>
                                <option value="<?php echo $row212['id'];?>">
                                    <?php echo $row212['course_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_name');?></label>
                    <div class="col-sm-5">
                        <select name="SemesterName" class="form-control">
                            <option value="#"><?php echo get_phrase('select');?></option>
                            <?php
                            $semester = $this->db->get('semester')->result_array();
                            foreach($semester as $row213):
                                ?>
                                <option value="<?php echo $row213['id'];?>">
                                    <?php echo $row213['name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('semester_particulars');?>
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
                        <th><div><?php echo get_phrase('semester_name');?></div></th>
                        <th><div><?php echo get_phrase('batch_name');?></div></th>
                        <th><div><?php echo get_phrase('session_name');?></div></th>
                        <th><div><?php echo get_phrase('particulars');?></div></th>
                        <th><div><?php echo get_phrase('amount');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td>
                                <?php
                                $this->db->where('id', $row['ProgramName']);
                                $course_program = $this->db->get('course_program')->result_array();
                                foreach($course_program as $row222):
                                    echo $row222['course_name'];
                                    endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['SemesterName']);
                                $semester = $this->db->get('semester')->result_array();
                                foreach($semester as $row223):
                                    echo $row223['name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['BatchName']);
                                $semester2 = $this->db->get('batch')->result_array();
                                foreach($semester2 as $row2232):
                                    echo $row2232['batch_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['SessionName']);
                                $semester2a = $this->db->get('session_pundro')->result_array();
                                foreach($semester2a as $row2232a):
                                    //echo $row2232a['SessionName'];
                                endforeach;
                                ?>
                                <?php
                                $this->db->where('id', $row['Year']);
                                $semester2az = $this->db->get('year_calendar')->result_array();
                                foreach($semester2az as $row2232az):
                                    //echo $row2232az['Name'];
                                endforeach;
                                ?>
                                <?php echo $row2232a['SessionName']."-".$row2232az['Name'];;?>
                            </td>
                            <td><?php echo $row['Particulars'];?></td>
                            <td><?php echo $row['Amount'];?></td>
                            <td>
                                <!--<a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_edit_semester_particulars/<?php /*echo $row['id'];*/?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php /*echo get_phrase('edit');*/?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php /*echo base_url();*/?>index.php?admin/semester_particulars/delete/<?php /*echo $row['id'];*/?>');">
                                    <i class="entypo-trash"></i>
                                    <?php /*echo get_phrase('delete');*/?>
                                </a>-->
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
                    <?php echo form_open(base_url() . 'index.php?admin/semester_particulars/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select name="ProgramName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row12):
                                        ?>
                                        <option value="<?php echo $row12['id'];?>">
                                            <?php echo $row12['course_name'];?>
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
                                <select name="BatchName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program1 = $this->db->get('batch')->result_array();
                                    foreach($course_program1 as $row121):
                                        ?>
                                        <option value="<?php echo $row121['id'];?>">
                                            <?php echo $row121['batch_name']." (".$row121['batch_alias'].")";?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('session');?></label>
                            <div class="col-sm-5">
                                <select name="SessionName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program2 = $this->db->get('session_pundro')->result_array();
                                    foreach($course_program2 as $row122):
                                        ?>
                                        <option value="<?php echo $row122['id'];?>">
                                            <?php echo $row122['SessionName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                            <div class="col-sm-5">
                                <select name="Year" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program3 = $this->db->get('year_calendar')->result_array();
                                    foreach($course_program3 as $row123):
                                        ?>
                                        <option value="<?php echo $row123['id'];?>">
                                            <?php echo $row123['Name'];?>
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
                                <!--<input type="text" class="form-control" name="receipt_no"/>-->
                                <select name="SemesterName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $semester = $this->db->get('semester')->result_array();
                                    foreach($semester as $row13):
                                        ?>
                                        <option value="<?php echo $row13['id'];?>">
                                            <?php echo $row13['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('particulars');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="description"/>-->
                                <select name="Particulars" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $particulars = $this->db->get('std_fee_sub_category')->result_array();
                                    foreach($particulars as $row14):
                                        ?>
                                        <option value="<?php echo $row14['receipt_no'];?>">
                                            <?php echo $row14['receipt_no'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('amount');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Amount"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('semester_particulars');?></button>
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