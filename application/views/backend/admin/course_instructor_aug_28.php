<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('course_instructors');?>
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
                        <th><div><?php echo get_phrase('name');?></div></th>
                        <th><div><?php echo get_phrase('blood_group');?></div></th>
                        <th><div><?php echo get_phrase('course_areas');?></div></th>
                        <th><div><?php echo get_phrase('birthdate');?></div></th>
                        <th><div><?php echo get_phrase('maritial_status');?></div></th>
                        <th><div><?php echo get_phrase('religion');?></div></th>
                        <th><div><?php echo get_phrase('nationality');?></div></th>
                        <th><div><?php echo get_phrase('address');?></div></th>
                        <th><div><?php echo get_phrase('phone');?></div></th>
                        <th><div><?php echo get_phrase('email');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['InstructorFirstName']." ".$row['InstructorLastName'] ;?></td>
                            <td><?php
                                $this->db->where('id', $row['InstructorBloodGroup']);
                                $ss = $this->db->get('blood_group')->result_array();
                                foreach($ss as $r):
                                    echo $r['Note']." (".$r['Name'].")";
                                endforeach;
                                ?></td>
                            <td>
                                <?php
                                $test54 = explode(", ", $row['InstructorCourse']);
                                //echo $string = rtrim(implode(",\n", $test), ',');
                                echo $test34 = implode(",<br/>", $test54);
                                ?>
                            </td>
                            <td><?php echo $row['InstructorBirthdate'];?></td>
                            <td><?php
                                $this->db->where('id', $row['InstructorMaritalStatus']);
                                $s2s = $this->db->get('maritial_status')->result_array();
                                foreach($s2s as $aar):
                                    echo $aar['Status'];
                                endforeach;
                                ?></td>
                            <td><?php
                                $this->db->where('id', $row['InstructorReligion']);
                                $s3s = $this->db->get('religion')->result_array();
                                foreach($s3s as $xar):
                                    echo $xar['Name'];
                                endforeach;
                                ?></td>
                            <td>
                                <?php
                                $this->db->where('id', $row['InstructorNationality']);
                                $szsa = $this->db->get('nationality')->result_array();
                                foreach($szsa as $zara):
                                    echo $zara['Nationality'];
                                endforeach;
                                ?>
                            </td>
                            <td><?php echo $row['InstructorAddress'];?></td>
                            <td><?php echo $row['InstructorPhone'];?></td>
                            <td><?php echo $row['InstructorEmail'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_course_instructor/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/course_instructor/delete/<?php echo $row['id'];?>');">
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
                <?php echo form_open(base_url() . 'index.php?admin/course_instructor/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="box-content">
                            <div class="padded">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('first_name');?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="InstructorFirstName"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('last_name');?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="InstructorLastName"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('blood_group');?></label>
                                    <div class="col-sm-7">
                                        <select name="InstructorBloodGroup" class="form-control">
                                            <option value="#"><?php echo get_phrase('select');?></option>
                                            <?php
                                            $coam = $this->db->get('blood_group')->result_array();
                                            foreach($coam as $r2):
                                                ?>
                                                <option value="<?php echo $r2['id'];?>">
                                                    <?php echo $r2['Note']." (".$r2['Name'].")";?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('birthdate');?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="datepicker form-control" name="InstructorBirthdate"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('marital_status');?></label>
                                    <div class="col-sm-7">
                                        <select name="InstructorMaritalStatus" class="form-control">
                                            <?php
                                            $coaw = $this->db->get('maritial_status')->result_array();
                                            foreach($coaw as $roe2):
                                                ?>
                                                <option value="<?php echo $roe2['id'];?>">
                                                    <?php echo $roe2['Status'];?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('nationality');?></label>
                                    <div class="col-sm-7">
                                        <select name="InstructorNationality" class="form-control">
                                            <?php
                                            $coa = $this->db->get('nationality')->result_array();
                                            foreach($coa as $ro2):
                                                ?>
                                                <option value="<?php echo $ro2['id'];?>">
                                                    <?php echo $ro2['CountryName']." - ".$ro2['Nationality'];?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('religion');?></label>
                                    <div class="col-sm-7">
                                        <select name="InstructorReligion" class="form-control">
                                            <?php
                                            $coursa = $this->db->get('religion')->result_array();
                                            foreach($coursa as $rowq2):
                                                ?>
                                                <option value="<?php echo $rowq2['id'];?>">
                                                    <?php echo $rowq2['Name'];?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" name="InstructorAddress" id="InstructorAddress" cols="20" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="InstructorPhone"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="InstructorEmail"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="InstructorPassword"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="ssad">
                                <?php echo get_phrase('courses');?>
                                </div>
                                <?php
                                $facul = $this->db->get('subjects')->result_array();
                                foreach($facul as $row21):
                                    ?>
                                    <input type="checkbox" name="subject[]" value="<?php echo $row21['CourseName'];?>">
                                    &nbsp;&nbsp;
                                    <?php echo $row21['CourseName'];?>
                                    <br/>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('Save');?></button>
                        </div>
                    </div>
                </div>
                </form>
                <!----CREATION FORM ENDS-->
                <p>&nbsp;</p>
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