<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('attendance_records');?>
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
                        <!--<th><div><?php /*echo get_phrase('date');*/?></div></th>
                        <th><div><?php /*echo get_phrase('note');*/?></div></th>-->
                        <th><div><?php echo get_phrase('program_name');?></div></th>
                        <th><div><?php echo get_phrase('semester_name');?></div></th>
                        <th><div><?php echo get_phrase('date');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td>
                                <?php
                                echo $row['ProgramName'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['SemesterName'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['AttendanceDate'];
                                ?>
                            </td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_attendance_pundro/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/attendance_pundro/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/attendance_sheet/' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('program_name');?></label>
                                    <select name="ProgramName" class="form-control">
                                        <option value="#"><?php echo get_phrase('select');?></option>
                                        <?php
                                        $course_program = $this->db->get('course_program')->result_array();
                                        foreach($course_program as $row2):
                                            ?>
                                            <option value="<?php echo $row2['id'];?>">
                                                <?php echo $row2['course_name'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('course_instructor');?></label>
                                    <select name="CourseInstructor" class="form-control">
                                        <option value="#"><?php echo get_phrase('select');?></option>
                                        <?php
                                        $cq_pr = $this->db->get('course_instructor')->result_array();
                                        foreach($cq_pr as $row2v):
                                            ?>
                                            <option value="<?php echo $row2v['id'];?>">
                                                <?php echo $row2v['InstructorFirstName']. " - " .$row2v['InstructorLastName'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('batch_name');?></label>
                                    <select name="BatchName" class="form-control">
                                        <option value="#"><?php echo get_phrase('select');?></option>
                                        <?php
                                        $course_program12 = $this->db->get('batch')->result_array();
                                        foreach($course_program12 as $row1):
                                            ?>
                                            <option value="<?php echo $row1['id'];?>">
                                                <?php echo $row1['batch_name'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('course_code');?></label>
                                    <select name="CourseCode" class="form-control">
                                        <option value="#"><?php echo get_phrase('select');?></option>
                                        <?php
                                        $course_programq = $this->db->get('subjects')->result_array();
                                        foreach($course_programq as $row1a2):
                                            ?>
                                            <option value="<?php echo $row1a2['id'];?>">
                                                <?php echo $row1a2['CourseCode']." - ".$row1a2['CourseName'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('semester_name');?></label>
                                    <select name="SemesterName" class="form-control">
                                        <option value="#"><?php echo get_phrase('select');?></option>
                                        <?php
                                        $course_proramq = $this->db->get('semester')->result_array();
                                        foreach($course_proramq as $rowa2):
                                            ?>
                                            <option value="<?php echo $rowa2['id'];?>">
                                                <?php echo $rowa2['name'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('session');?></label>
                                    <select name="Session" class="form-control">
                                        <option value="#"><?php echo get_phrase('select');?></option>
                                        <?php
                                        $course_pr = $this->db->get('session_pundro')->result_array();
                                        foreach($course_pr as $row42):
                                            ?>
                                            <option value="<?php echo $row42['id'];?>">
                                                <?php echo $row42['SessionName'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('year');?></label>
                                    <select name="Year" class="form-control">
                                        <option value="#"><?php echo get_phrase('select');?></option>
                                        <?php
                                        $course_pr = $this->db->get('year')->result_array();
                                        foreach($course_pr as $row42c):
                                            ?>
                                            <option value="<?php echo $row42c['id'];?>">
                                                <?php echo $row42c['year'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('exam_name');?></label>
                                    <select name="ExamName" class="form-control">
                                        <option value="#"><?php echo get_phrase('select');?></option>
                                        <?php
                                        $co_pr = $this->db->get('exam_pundro')->result_array();
                                        foreach($co_pr as $row42x):
                                            ?>
                                            <option value="<?php echo $row42x['id'];?>">
                                                <?php echo $row42x['ExamName'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('attendance_date');?></label>
                                    <input type="text" class="datepicker form-control" name="AttendanceDate"/>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('class_start_time');?></label>
                                    <input type="text" class="form-control" name="ClassStrt"/>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo get_phrase('class_end_time');?></label>
                                    <input type="text" class="form-control" name="ClassEnd"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_attendance');?></button>
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