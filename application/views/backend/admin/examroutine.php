<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('exam_routine');?>
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
                        <th><div><?php echo get_phrase('exam_year');?></div></th>
                        <th><div><?php echo get_phrase('exam_name');?></div></th>
                        <th><div><?php echo get_phrase('session');?></div></th>
                        <th><div><?php echo get_phrase('course1');?></div></th>
                        <th><div><?php echo get_phrase('course2');?></div></th>
                        <th><div><?php echo get_phrase('course3');?></div></th>
                        <th><div><?php echo get_phrase('course4');?></div></th>
                        <th><div><?php echo get_phrase('course5');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody class="examroutine">
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php
                                //echo $row['ProgramName'];
                                $this->db->where('id', $row['ProgramName']);
                                //echo $row['NameofProgram'];
                                $sa = $this->db->get('course_program')->result_array();
                                foreach($sa as $se):
                                    echo $se['course_name'];
                                endforeach;
                                ?></td>
                            <td>
                                <?php
                                //echo $row['SemesterName'];
                                $this->db->where('id', $row['SemesterName']);
                                //echo $row['NameofProgram'];
                                $sa1 = $this->db->get('semester')->result_array();
                                foreach($sa1 as $se1):
                                    echo $se1['name'];
                                endforeach;
                                ?></td>
                            <td><?php
                                //echo $row['ExamYear'];
                                $this->db->where('id', $row['ExamYear']);
                                //echo $row['NameofProgram'];
                                $sa2 = $this->db->get('year_calendar')->result_array();
                                foreach($sa2 as $se2):
                                    echo $se2['Name'];
                                endforeach;
                                ?></td>
                            <td><?php //echo $row['ExamName'];
                                $this->db->where('id', $row['ExamName']);
                                //echo $row['NameofProgram'];
                                $sa3 = $this->db->get('exam_pundro')->result_array();
                                foreach($sa3 as $se3):
                                    echo $se3['ExamName'];
                                endforeach;
                                ?></td>
                            <td><?php //echo $row['Session'];
                                $this->db->where('id', $row['Session']);
                                //echo $row['NameofProgram'];
                                $sa4 = $this->db->get('session_pundro')->result_array();
                                foreach($sa4 as $se4):
                                    echo $se4['SessionName'];
                                endforeach;
                                ?></td>
                            <td><div>
                                <?php
                                echo "Course Name-1: ";
                                //echo $row['CourseName1'];
                                $this->db->where('id', $row['CourseName1']);
                                //echo $row['NameofProgram'];
                                $sa5 = $this->db->get('subjects')->result_array();
                                foreach($sa5 as $se5):
                                    echo $se5['CourseName'];
                                endforeach;
                                echo "<br/>Date: ";
                                echo $row['ExamDate1'];
                                echo "<br/>Day: ";
                                echo $row['ExamDay1'];
                                echo "<br/>Time: ";
                                echo $row['ExamTime1'];
                                ?>
                                </div></td>
                            <td><div>
                                <?php
                                echo "Course Name-2: ";
                                //echo $row['CourseName2'];
                                $this->db->where('id', $row['CourseName2']);
                                //echo $row['NameofProgram'];
                                $sa5 = $this->db->get('subjects')->result_array();
                                foreach($sa5 as $se5):
                                    echo $se5['CourseName'];
                                endforeach;
                                echo "<br/>Date: ";
                                echo $row['ExamDate2'];
                                echo "<br/>Day: ";
                                echo $row['ExamDay2'];
                                echo "<br/>Time: ";
                                echo $row['ExamTime2'];
                                ?>
                            </div></td>
                            <td><div>
                                <?php
                                echo "Course Name-3: ";
                                //echo $row['CourseName3'];
                                $this->db->where('id', $row['CourseName3']);
                                //echo $row['NameofProgram'];
                                $sa5 = $this->db->get('subjects')->result_array();
                                foreach($sa5 as $se5):
                                    echo $se5['CourseName'];
                                endforeach;
                                echo "<br/>Date: ";
                                echo $row['ExamDate3'];
                                echo "<br/>Day: ";
                                echo $row['ExamDay3'];
                                echo "<br/>Time: ";
                                echo $row['ExamTime3'];
                                ?>
                            </div></td>
                            <td><div>
                                <?php
                                echo "Course Name-4: ";
                                //echo $row['CourseName4'];
                                $this->db->where('id', $row['CourseName4']);
                                //echo $row['NameofProgram'];
                                $sa5 = $this->db->get('subjects')->result_array();
                                foreach($sa5 as $se5):
                                    echo $se5['CourseName'];
                                endforeach;
                                echo "<br/>Date: ";
                                echo $row['ExamDate4'];
                                echo "<br/>Day: ";
                                echo $row['ExamDay4'];
                                echo "<br/>Time: ";
                                echo $row['ExamTime4'];
                                ?>
                            </div></td>
                            <td><div>
                                <?php
                                echo "Course Name-5: ";
                                //echo $row['CourseName5'];
                                $this->db->where('id', $row['CourseName5']);
                                //echo $row['NameofProgram'];
                                $sa5 = $this->db->get('subjects')->result_array();
                                foreach($sa5 as $se5):
                                    echo $se5['CourseName'];
                                endforeach;
                                echo "<br/>Date: ";
                                echo $row['ExamDate5'];
                                echo "<br/>Day: ";
                                echo $row['ExamDay5'];
                                echo "<br/>Time: ";
                                echo $row['ExamTime5'];
                                ?>
                            </div></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_examroutine/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/examroutine/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/examroutine/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select name="ProgramName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $we = $this->db->get('course_program')->result_array();
                                    foreach($we as $ow12):
                                        ?>
                                        <option value="<?php echo $ow12['id'];?>">
                                            <?php echo $ow12['course_name'];?>
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
                                    $we1 = $this->db->get('semester')->result_array();
                                    foreach($we1 as $s12):
                                        ?>
                                        <option value="<?php echo $s12['id'];?>">
                                            <?php echo $s12['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('exam_year');?></label>
                            <div class="col-sm-5">
                                <select name="ExamYear" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $wez1 = $this->db->get('year_calendar')->result_array();
                                    foreach($wez1 as $sz12):
                                        ?>
                                        <option value="<?php echo $sz12['id'];?>">
                                            <?php echo $sz12['Name'];?>
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
                                <select name="ExamName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $wez1z = $this->db->get('exam_pundro')->result_array();
                                    foreach($wez1z as $sz12z):
                                        ?>
                                        <option value="<?php echo $sz12z['id'];?>">
                                            <?php echo $sz12z['ExamName'];?>
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
                                <select name="Session" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $xz = $this->db->get('session_pundro')->result_array();
                                    foreach($xz as $sz):
                                        ?>
                                        <option value="<?php echo $sz['id'];?>">
                                            <?php echo $sz['SessionName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('course_name1');?></label>
                                <select name="CourseName1" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $wzz = $this->db->get('subjects')->result_array();
                                    foreach($wzz as $xs):
                                        ?>
                                        <option value="<?php echo $xs['id'];?>">
                                            <?php echo $xs['CourseName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('date');?></label>
                                <input type="text" class="datepicker form-control" name="ExamDate1"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('day');?></label>
                                <input type="text" class="form-control" name="ExamDay1"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('time');?></label>
                                <input type="text" class="form-control" name="ExamTime1"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('course_name2');?></label>
                                <select name="CourseName2" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $wzz = $this->db->get('subjects')->result_array();
                                    foreach($wzz as $xs):
                                        ?>
                                        <option value="<?php echo $xs['id'];?>">
                                            <?php echo $xs['CourseName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('date');?></label>
                                <input type="text" class="datepicker form-control" name="ExamDate2"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('day');?></label>
                                <input type="text" class="form-control" name="ExamDay2"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('time');?></label>
                                <input type="text" class="form-control" name="ExamTime2"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('course_name3');?></label>
                                <select name="CourseName3" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $wzz = $this->db->get('subjects')->result_array();
                                    foreach($wzz as $xs):
                                        ?>
                                        <option value="<?php echo $xs['id'];?>">
                                            <?php echo $xs['CourseName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('date');?></label>
                                <input type="text" class="datepicker form-control" name="ExamDate3"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('day');?></label>
                                <input type="text" class="form-control" name="ExamDay3"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('time');?></label>
                                <input type="text" class="form-control" name="ExamTime3"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('course_name4');?></label>
                                <select name="CourseName4" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $wzz = $this->db->get('subjects')->result_array();
                                    foreach($wzz as $xs):
                                        ?>
                                        <option value="<?php echo $xs['id'];?>">
                                            <?php echo $xs['CourseName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('date');?></label>
                                <input type="text" class="datepicker form-control" name="ExamDate4"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('day');?></label>
                                <input type="text" class="form-control" name="ExamDay4"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('time');?></label>
                                <input type="text" class="form-control" name="ExamTime4"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('course_name5');?></label>
                                <select name="CourseName5" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $wzz = $this->db->get('subjects')->result_array();
                                    foreach($wzz as $xs):
                                        ?>
                                        <option value="<?php echo $xs['id'];?>">
                                            <?php echo $xs['CourseName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('date');?></label>
                                <input type="text" class="datepicker form-control" name="ExamDate5"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('day');?></label>
                                <input type="text" class="form-control" name="ExamDay5"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo get_phrase('time');?></label>
                                <input type="text" class="form-control" name="ExamTime5"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_exam_routine');?></button>
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