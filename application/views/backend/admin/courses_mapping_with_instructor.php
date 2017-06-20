<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('course_instructors');?>
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
                        <th><div><?php echo get_phrase('course_name');?></div></th>
                        <th><div><?php echo get_phrase('course_instructors');?></div></th>
                        <th><div><?php echo get_phrase('Actions');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    ?>
                    <?php $count = 1;foreach($acdSession as $row):?>

                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php
                                //echo $row['CourseName'];
                                $this->db->where('id', $row['CourseName']);
                                $course_program = $this->db->get('subjects')->result_array();
                                foreach($course_program as $ee):
                                    echo $ee['CourseName'];
                                endforeach;
                                ?></td>
                            <td class="coursss tt">
                                <div class="first">
                                    <br>
                                    <?php
                                    $test = explode(", ", $row['CourseInstructors']);
                                    foreach ($test as $key => $value) {
                                        $this->db->where('id', $value);
                                        $cca12 = $this->db->get('course_instructor')->result_array();
                                        foreach($cca12 as $ez12):
                                            echo $ez12['InstructorName'];
                                            ?>
                                            <?php
                                            echo "<br/>";
                                        endforeach;
                                    }
                                    ?>
                                </div>
                            </td>

                            <td class="tblactions"><div>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_online_adm/<?php echo $row['id'];?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo get_phrase('edit');?>
                                    </a>
                                    <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/online_admission/delete/<?php echo $row['id'];?>');">
                                        <i class="entypo-trash"></i>
                                        <?php echo get_phrase('delete');?>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
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