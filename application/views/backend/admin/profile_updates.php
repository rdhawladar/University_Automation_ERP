<div class="row">
    <div class="col-md-12">
        <!--<p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"><span class="subhead">Status</span></a></p>-->
        <!--<div id="light" class="white_content">
    <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
    <p>&nbsp;</p><p>&nbsp;</p>
    <h2>Applicants</h2>
    <p>&nbsp;</p>
    <p>Lorem..</p>
        </div>
        <div id="fade" class="black_overlay"></div>-->
        <?php

        $today = date('Y-m-d');

        // $data = $this->db->query("select from acd_session where is_open = 1 AND strt_dt <= '{$today}'
        //AND end_dt >= '{$today}'");
        $data = $this->db->get_where('acd_session' , array('is_open' => 1, 'strt_dt <= ' => $today,'end_dt >= ' => $today))->result_array();
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic Session - ".$data[0]['name'];
        ?>
        <p>&nbsp;</p>
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">

            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('student_application_list');?>
                </a>
            </li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('add_record');?>
                </a>
            </li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active onad" id="list">

                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th width="80"><div><?php echo get_phrase('Photo');?></div></th>
                        <th><div><?php echo get_phrase('Name');?></div></th>
                        <th><div><?php echo get_phrase('birthday');?></div></th>
                        <th><div><?php echo get_phrase('father_name');?></div></th>
                        <th><div><?php echo get_phrase('mother_name');?></div></th>
                        <th><div><?php echo get_phrase('Actions');?></div></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($osadStudent as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><img src="<?php echo $this->crud_model->get_image_url('osad_student',$row['id']);?>" class="img-circle" width="30" /></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['birthday'];?></td>
                            <td><?php echo $row['father_name'];?></td>
                            <td><?php echo $row['mother_name'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_student_management1/<?php echo $row['student_id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_student_management_profile1/<?php echo $row['student_id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('profile');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/profile_updates/delete/<?php echo $row['student_id'];?>');">
                                    <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete');?>
                                </a>
                                <!--              <div class="btn-group">
                                                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                      Action <span class="caret"></span>
                                                  </button>
                                                  <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                                      <!-- EDITING LINK -->
                                <!--           <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_acd_session/<?php echo $row['student_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>-->

                                <!-- DELETION LINK -->
                                <!-- <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/acd_session/delete/<?php echo $row['student_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>-->
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane box onad" id="add">
            <br />
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/profile_updates/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#personal12"><?php echo get_phrase('personal');?></a></li>
                    <li><a data-toggle="tab" href="#contacts12"><?php echo get_phrase('contacts');?></a></li>
                    <li><a data-toggle="tab" href="#guardian12"><?php echo get_phrase('guardian');?></a></li>
                    <li><a data-toggle="tab" href="#parents12"><?php echo get_phrase('parents');?></a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="personal12" class="tab-pane fade in active">
                      <p>&nbsp;</p>
                      <h3><?php echo get_phrase('personal_informtion');?></h3>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('register_number');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="register_number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('admission_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="personal_joining_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_department">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_batch">
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_photo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('name_english');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name_en">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('name_bangla');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name_bn">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="birthday">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="sex">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('religion');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="religion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('blood_group');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="blood_group">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('birth_place');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_birth_place">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('nationality');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_nationality">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('roll_no');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_roll_no">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mother_tongue');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="personal_mother_tongue">
                            </div>
                        </div>
                    </div>
                    <div id="contacts12" class="tab-pane fade">
                      <p>&nbsp;</p>
                      <h3><?php echo get_phrase('contact_details');?></h3>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('present_address');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_pre_address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('city');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_city">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('pin');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_pin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('country');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_country">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('state');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_state">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mobile');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contact_mobile">
                            </div>
                        </div>
                    </div>
                    <div id="guardian12" class="tab-pane fade">
                      <p>&nbsp;</p>
                      <h3><?php echo get_phrase('guardian_informtion');?></h3>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('relation');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_relation">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('education');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_education">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_occupation">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('income');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_income">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('city');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_city">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('country');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_country">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('state');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_state">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mobile');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_mobile">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="guardian_email">
                            </div>
                        </div>
                    </div>
                    <div id="parents12" class="tab-pane fade">
                      <p>&nbsp;</p>
                      <h3><?php echo get_phrase('parents_informtion');?></h3>
                      <br>
                      <h4><?php echo get_phrase('father_details');?></h4>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('father_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="father_name">
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mobile');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parents_father_mobile">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('job');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parents_father_job">
                            </div>
                        </div>
                        <h4><?php echo get_phrase('mother_details');?></h4>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mother_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="mother_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('mobile');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parents_mother_mobile">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('job');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parents_mother_job">
                            </div>
                        </div>
                    </div>
                  </div>
                </div>                
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('add_record');?></button>
                    </div>
                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
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


    $(document).ready(function(){
        var i=1;
        $("#add_row").click(function(){
            $('#addr'+i).html("<td>"+ (i+1) +"</td><td><select name='examtype"+i+"' class='form-control'><option value=''>select</option><option value='SSC-GENERAL'>SSC(General)</option><option value='SSC-VOCATIONAL'>SSC(Vocational)</option><option value='TRADE'>Trade(Two-Years)</option><option value='DAKHIL'>Dakhil(Vocational)</option></select></td><td><input  name='group"+i+"' type='text' placeholder='Group'  class='form-control input-md'></td><td><input  name='board"+i+"' type='text' placeholder='Board'  class='form-control input-md'></td><td><input  name='passing_yr"+i+"' type='text' placeholder='Passing Year'  class='form-control input-md'></td><td><input  name='special_mark"+i+"' type='text' placeholder='special mark'  class='form-control input-md'></td><td><input  name='ttl_mark"+i+"' type='text' placeholder='Total Marks'  class='form-control input-md'></td>");

            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
            i++;
            $("#ttldtl").val(i);
        });
        $("#delete_row").click(function(){
            if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
                $("#ttldtl").val(i);
            }
        });
        $("#ttldtl").val(i);
    });

</script>
