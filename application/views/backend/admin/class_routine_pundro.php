<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('class_routine');?>
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
                        <th><div><?php echo get_phrase('program');?></div></th>
                        <th><div><?php echo get_phrase('session');?></div></th>
                        <th><div><?php echo get_phrase('batch');?></div></th>
                        <th><div><?php echo get_phrase('semester');?></div></th>
                        <th><div><?php echo get_phrase('course');?></div></th>
                        <th><div><?php echo get_phrase('instructor');?></div></th>
                        <th><div><?php echo get_phrase('building_name');?></div></th>
                        <th><div><?php echo get_phrase('room_no');?></div></th>
                        <th><div><?php echo get_phrase('day');?></div></th>
                        <th><div><?php echo get_phrase('period');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php
                                $this->db->where('id',$row['ProgramName']);
                                $aa = $this->db->get('course_program')->result_array();
                                foreach($aa as $aa1):
                                    echo $aa1['course_name'];
                                endforeach;
                                ?></td>
                            <td><?php //echo $row['SessionName']." ".$row['Year'];
                                $this->db->where('id',$row['SessionName']);
                                $ab = $this->db->get('session_pundro')->result_array();
                                foreach($ab as $aa2):
                                    echo $aa2['SessionName']." ";
                                endforeach;
                                $this->db->where('id',$row['Year']);
                                $ac = $this->db->get('year_calendar')->result_array();
                                foreach($ac as $aa3):
                                    echo $aa3['Name'];
                                endforeach;
                                ?></td>
                            <td><?php //echo $row['BatchName'];
                                $this->db->where('id',$row['BatchName']);
                                $ad = $this->db->get('batch')->result_array();
                                foreach($ad as $aa4):
                                    echo $aa4['batch_alias']." ";
                                endforeach;
                                ?></td>
                            <td><?php
                                //echo $row['Semester'];
                                $this->db->where('id',$row['Semester']);
                                $ae = $this->db->get('semester')->result_array();
                                foreach($ae as $aa5):
                                    echo $aa5['name'];
                                endforeach;
                                ?></td>
                            <td><?php
                                //echo $row['CourseName'];
                                $this->db->where('id',$row['CourseName']);
                                $af = $this->db->get('subjects')->result_array();
                                foreach($af as $aa6):
                                    echo $aa6['CourseCode']."<br/>";
                                    echo $aa6['CourseName'];
                                endforeach;
                                ?></td>
                            <td><?php
                                //echo $row['InstructorName'];
                                $this->db->where('id',$row['InstructorName']);
                                $ag = $this->db->get('course_instructor')->result_array();
                                foreach($ag as $aa7):
                                    echo $aa7['InstructorName']." (";
                                    echo $aa7['id'].")";
                                endforeach;
                                ?></td>
                            <td><?php echo $row['BuildingName'];?></td>
                            <td><?php echo $row['RoomNo'];?></td>
                            <td><?php
                                $this->db->where('id',$row['Day']);
                                $ah = $this->db->get('weekdays')->result_array();
                                foreach($ah as $aa8):
                                    echo $aa8['value'];
                                endforeach;
                                ?></td>
                            <td><?php //echo $row['StrtTime']." ".$row['StrtFormat']." - ".$row['EndTime']." ".$row['EndFormat'];
                                $this->db->where('id',$row['StrtTime']);
                                $ai = $this->db->get('timeformat')->result_array();
                                foreach($ai as $aa9):
                                    echo $aa9['value']." ";
                                endforeach;
                                $this->db->where('id',$row['StrtFormat']);
                                $aj = $this->db->get('timeformat1')->result_array();
                                foreach($aj as $aa10):
                                    echo $aa10['value']." - ";
                                endforeach;
                                $this->db->where('id',$row['EndTime']);
                                $ak = $this->db->get('timeformat')->result_array();
                                foreach($ak as $aa11):
                                    echo $aa11['value']." ";
                                endforeach;
                                $this->db->where('id',$row['EndFormat']);
                                $al = $this->db->get('timeformat1')->result_array();
                                foreach($al as $aa12):
                                    echo $aa12['value'];
                                endforeach;
                                ?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class_routine_pundro/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/class_routine_pundro/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/class_routine_pundro/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <?php
                    $temp = '1';
                    $this->db->where('IsActive',$temp);
                    $sess = $this->db->get('admission_configuration')->result_array();
                    foreach($sess as $wees):
                    endforeach;
                    ?>
                    <input type="hidden" class="form-control" name="SessionName" value="<?php echo $wees['SemesterName'];?>"/>
                    <input type="hidden" class="form-control" name="Year" value="<?php echo $wees['Year'];?>"/>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="ProgramName"/>-->
                                <select name="ProgramName" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $aa = $this->db->get('course_program')->result_array();
                                    foreach($aa as $a):
                                        ?>
                                        <option value="<?php echo $a['id'];?>">
                                            <?php echo $a['course_name'];?>
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
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $ad = $this->db->get('batch')->result_array();
                                    foreach($ad as $aad):
                                        ?>
                                        <option value="<?php echo $aad['id'];?>">
                                            <?php echo $aad['batch_alias'];?>
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
                                <select name="Semester" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $ae = $this->db->get('semester')->result_array();
                                    foreach($ae as $aae):
                                        ?>
                                        <option value="<?php echo $aae['id'];?>">
                                            <?php echo $aae['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                            <div class="col-sm-5">
                                <select name="CourseName" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $af = $this->db->get('subjects')->result_array();
                                    foreach($af as $aac):
                                        ?>
                                        <option value="<?php echo $aac['id'];?>">
                                            <?php echo $aac['CourseName']." | ".$aac['CourseCode'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('instructor_name');?></label>
                            <div class="col-sm-5">
                                <select name="InstructorName" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $ag = $this->db->get('course_instructor')->result_array();
                                    foreach($ag as $aad):
                                        ?>
                                        <option value="<?php echo $aad['id'];?>">
                                            <?php echo $aad['InstructorName']." | ".$aac['id'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('building_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="BuildingName"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('room_no');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="RoomNo"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('day');?></label>
                            <div class="col-sm-5">
                                <select name="Day" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $al = $this->db->get('weekdays')->result_array();
                                    foreach($al as $aaff):
                                        ?>
                                        <option value="<?php echo $aaff['id'];?>">
                                            <?php echo $aaff['value'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('starting_time');?></label>
                            <div class="col-sm-5">
                                <select name="StrtTime" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $ah = $this->db->get('timeformat')->result_array();
                                    foreach($ah as $aae):
                                        ?>
                                        <option value="<?php echo $aae['id'];?>">
                                            <?php echo $aae['value'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                                <select name="StrtFormat" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $ai = $this->db->get('timeformat1')->result_array();
                                    foreach($ai as $aaf):
                                        ?>
                                        <option value="<?php echo $aaf['id'];?>">
                                            <?php echo $aaf['value'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('ending_time');?></label>
                            <div class="col-sm-5">
                                <select name="EndTime" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $aj = $this->db->get('timeformat')->result_array();
                                    foreach($aj as $aag):
                                        ?>
                                        <option value="<?php echo $aag['id'];?>">
                                            <?php echo $aag['value'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                                <select name="EndFormat" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $ak = $this->db->get('timeformat1')->result_array();
                                    foreach($ak as $aah):
                                        ?>
                                        <option value="<?php echo $aah['id'];?>">
                                            <?php echo $aah['value'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_class_routine');?></button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!----CREATION FORM ENDS-->
            </div>
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