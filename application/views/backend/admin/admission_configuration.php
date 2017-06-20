<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('admission_configuration');?>
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
                        <th><div><?php echo get_phrase('admission_type');?></div></th>
                        <th><div><?php echo get_phrase('admission_date');?></div></th>
                        <th><div><?php echo get_phrase('admission_time');?></div></th>
                        <th><div><?php echo get_phrase('admission_start_date');?></div></th>
                        <th><div><?php echo get_phrase('admission_end_date');?></div></th>
                        <th><div><?php echo get_phrase('is_active');?></div></th>
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
                                $aq = $this->db->get('course_program')->result_array();
                                foreach($aq as $rq334):
                                endforeach;
                                echo $rq334['course_name'];
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['SemesterName']);
                                $a1as = $this->db->get('session_pundro')->result_array();
                                foreach($a1as as $r34):
                                endforeach;
                                $this->db->where('id', $row['Year']);
                                $a2a = $this->db->get('year_calendar')->result_array();
                                foreach($a2a as $r234):
                                endforeach;
                                echo $r34['SessionName']."&nbsp;".$r234['Name'];
                                ?>
                            </td>
                            <td><?php echo $row['AdmissionType'];?></td>
                            <td><?php echo $row['AdmissionDate'];?></td>
                            <td><?php echo $row['AdmissionTime'];?></td>
                            <td><?php echo $row['AdmissionStartDate'];?></td>
                            <td><?php echo $row['AdmissionEndDate'];?></td>
                            <td><?php echo $row['IsActive'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_admission_configuration/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/admission_configuration/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/admission_configuration/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select name="ProgramName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <option value="All"><?php echo get_phrase('all');?></option>
                                    <?php
                                    $faculty_setup = $this->db->get('course_program')->result_array();
                                    foreach($faculty_setup as $row):
                                        ?>
                                        <option value="<?php echo $row['id'];?>">
                                            <?php echo $row['course_name'];?>
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
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $ww = $this->db->get('session_pundro')->result_array();
                                    foreach($ww as $ow):
                                        ?>
                                        <option value="<?php echo $ow['id'];?>">
                                            <?php echo $ow['SessionName'];?>
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
                                    <option value=""><?php echo get_phrase('select_year');?></option>
                                    <?php
                                    $wqw = $this->db->get('year_calendar')->result_array();
                                    foreach($wqw as $oqw):
                                        ?>
                                        <option value="<?php echo $oqw['id'];?>">
                                            <?php echo $oqw['Name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('admission_type');?></label>
                            <div class="col-sm-5">
                                <select name="AdmissionType" id="" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <option value="Written"><?php echo get_phrase('written');?></option>
                                    <option value="Viba"><?php echo get_phrase('viba');?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('admission_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="AdmissionDate"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('admission_time');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="AdmissionTime"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('admission_start_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="AdmissionStartDate"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('admission_end_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="AdmissionEndDate"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('is_active');?></label>
                            <div class="col-sm-5">
                                <select name="IsActive" id="">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <option value="1"><?php echo get_phrase('yes');?></option>
                                    <option value="0"><?php echo get_phrase('no');?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_admission_configuration');?></button>
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