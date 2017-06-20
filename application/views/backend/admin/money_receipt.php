<?php
$temp = '1';
$this->db->where('IsActive',$temp);
$semester = $this->db->get('admission_configuration')->result_array();
foreach($semester as $wee):
endforeach;
$this->db->where('id',$wee['SemesterName']);
$semester12 = $this->db->get('session_pundro')->result_array();
foreach($semester12 as $wee12):
endforeach;
$this->db->where('id',$wee['Year']);
$semester13 = $this->db->get('year_calendar')->result_array();
foreach($semester13 as $wee13):
endforeach;
?>
<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('money_receipt');?>
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
                <div class="row">
                    <div class="col-md-12 shortlist">
                        <div class="col-md-12 tt">
                            <div class="box-content">
                                <?php echo form_open(base_url() . 'index.php?admin/money_receipt_bank' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                                <div class="padded">
                                    <input type="hidden" name="SemesterName" value="<?php echo $wee['SemesterName'];?>">
                                    <input type="hidden" name="Year" value="<?php echo $wee['Year'];?>">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label for="">Program Name</label>
                                            <select name="ProgramName" class="form-control" style="height:30px;">
                                                <option value="*"><?php echo get_phrase('All');?></option>
                                                <?php
                                                $xc = $this->db->get('course_program')->result_array();
                                                foreach($xc as $rowxc):
                                                    ?>
                                                    <option value="<?php echo $rowxc['id'];?>">
                                                        <?php echo $rowxc['course_name'];?>
                                                    </option>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Session Name</label>
                                            <select required name="SessionName" class="form-control" style="height:30px;">
                                                <option value="*"><?php echo get_phrase('all');?></option>
                                                <?php
                                                $xc12 = $this->db->get('session_pundro')->result_array();
                                                foreach($xc12 as $rowxc12):
                                                    ?>
                                                    <option value="<?php echo $rowxc12['id'];?>">
                                                        <?php echo $rowxc12['SessionName'];?>
                                                    </option>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Year</label>
                                            <select required name="Year" class="form-control" style="height:30px;">
                                                <option value="*"><?php echo get_phrase('all');?></option>
                                                <?php
                                                $this->db->order_by('Name', ASC);
                                                $xc121 = $this->db->get('year_calendar')->result_array();
                                                foreach($xc121 as $rowxc121):
                                                    ?>
                                                    <option value="<?php echo $rowxc121['id'];?>">
                                                        <?php echo $rowxc121['Name'];?>
                                                    </option>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <p style="height: 14px;">&nbsp;</p>
                                            <button type="submit" class="btn btn-success"><?php echo get_phrase('search');?></button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-bordered datatable" id="table_export">
                        <thead>
                        <tr>
                            <th><div>#</div></th>
                            <th><div><?php echo get_phrase('program_name');?></div></th>
                            <th><div><?php echo get_phrase('semester_name');?></div></th>
                            <th><div><?php echo get_phrase('year');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th><div><?php echo get_phrase('reference_number');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                            <th><div><?php echo get_phrase('amount');?></div></th>
                            <th><div><?php echo get_phrase('particulars');?></div></th>
                            <th><div><?php echo get_phrase('date');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;foreach($acdSession as $row):?>
                            <tr>
                                <td><?php echo $count++;?></td>
                                <td><div class="proger"><?php
                                        $this->db->where('id', $row['ProgramName']);
                                        $as1 = $this->db->get('course_program')->result_array();
                                        foreach($as1 as $row3341):
                                            echo $row3341['course_name'];
                                        endforeach;
                                        ?></div></td>
                                <td><?php
                                    $this->db->where('id', $row['SemesterName']);
                                    $as2 = $this->db->get('session_pundro')->result_array();
                                    foreach($as2 as $row3342):
                                        echo $row3342['SessionName'];
                                    endforeach;
                                    ?></td>
                                <td><?php
                                    $this->db->where('id', $row['Year']);
                                    $as3 = $this->db->get('year_calendar')->result_array();
                                    foreach($as3 as $row3343):
                                        echo $row3343['Name'];
                                    endforeach;
                                    ?></td>
                                <td><?php echo $row['CandidateName'];?></td>
                                <td><?php echo $row['MobileNumber'];?></td>
                                <td><?php echo $row['Email'];?></td>
                                <td><?php echo $row['Amount'];?></td>
                                <td><?php echo $row['Particulars'];?></td>
                                <td><?php echo $row['DateSale'];?></td>
                                <td>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_money_receipt/<?php echo $row['id'];?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo get_phrase('edit');?>
                                    </a>
                                    &nbsp;  &nbsp;  &nbsp;
                                    <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/money_receipt/delete/<?php echo $row['id'];?>');">
                                        <i class="entypo-trash"></i>
                                        <?php echo get_phrase('delete');?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/money_receipt/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('particulars');?></label>
                            <div class="col-sm-5">
                                <input type="text" required class="form-control" name="Particulars" placeholder="Admission Form"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select required name="ProgramName" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
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
                            <!-- <div class="col-sm-3">
                                <input type="hidden" readonly class="form-control" name="SemesterName" value="<?php echo $wee12['id']?>"/>
                            </div> -->
                            <!-- <div class="col-sm-2">
                                <input type="hidden" readonly class="form-control" name="Year" value="<?php echo $wee13['id'];?>"/>
                            </div> -->
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('session_Name');?></label>
                            <div class="col-sm-5">
                                <select required name="SemesterName" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $faculty_setupq = $this->db->get('session_pundro')->result_array();
                                    foreach($faculty_setupq as $rowq):
                                        ?>
                                        <option value="<?php echo $rowq['id'];?>">
                                            <?php echo $rowq['SessionName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('Year');?></label>
                            <div class="col-sm-5">
                                <select required name="Year" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $this->db->order_by('Name', ASC);
                                    $faculty_setupqz = $this->db->get('year_calendar')->result_array();
                                    foreach($faculty_setupqz as $rowqz):
                                        ?>
                                        <option value="<?php echo $rowqz['id'];?>">
                                            <?php echo $rowqz['Name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('candidate_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" required class="form-control" name="CandidateName" placeholder="Md.Noor-e Alam Khan"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('reference_number');?></label>
                            <div class="col-sm-5">
                                <!-- <input type="number" required class="form-control" name="MobileNumber" minlength="11" placeholder="01914191945"/> -->
                                <input type="number" class="form-control" name="MobileNumber" placeholder="01914191945"/>
                            </div>
                            <!-- <div class="col-sm-3">(At Least 11 Characters)</div> -->
                            <div class="col-sm-3">(Only Numbers allow)</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                            <div class="col-sm-5">
                                <!-- <input type="email" required class="form-control" name="Email" placeholder="webmaster.noor@gmail.com"/> -->
                                <input type="text" class="form-control" name="Email" placeholder="webmaster.noor@gmail.com"/>
                            </div>
                            <!-- <div class="col-sm-3">(Valid Email format)</div> -->
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('amount');?></label>
                            <div class="col-sm-5">
                                <input type="number" required class="form-control" name="Amount" placeholder="500"/>
                            </div>
                            <div class="col-sm-3">(Only Numbers allow)</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('Date');?></label>
                            <div class="col-sm-5">
                                <input type="Date" class="form-control" name="DateSale" placeholder="500"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_money_receipt');?></button>
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