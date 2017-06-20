<div class="row">
    <div class="col-md-12 coursereg">
        <?php echo form_open(base_url() . 'index.php?admin/semester_wise_distri_of_courses' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
        <div class="">
            <div class="sss"><?php echo get_phrase('semester_wise_courses');?></div>
            <div class="form-group">
                <div class="col-md-12">
                    <select name="ProgramName" class="form-control">
                        <option value="#"><?php echo get_phrase('select_program');?></option>
                        <?php
                        $course_program = $this->db->get('course_program')->result_array();
                        foreach($course_program as $row1):
                            ?>
                            <option value="<?php echo $row1['id'];?>">
                                <?php echo $row1['course_name'];?>
                            </option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <!--<select name="year" class="form-control">
                        <option value="#"><?php /*echo get_phrase('session') ;*/?></option>
                        <?php
/*                        $se = $this->db->get('session_pundro')->result_array();
                        foreach($se as $r2):
                            */?>
                            <option value="<?php /*echo $r2['id'];*/?>">
                                <?php /*echo $r2['SessionName'];*/?>
                            </option>
                            <?php
/*                        endforeach;
                        */?>
                    </select>
                    <select name="year" class="form-control">
                        <option value="#"><?php /*echo get_phrase('year') ;*/?></option>
                        <?php
/*                        $se = $this->db->get('year_calendar')->result_array();
                        foreach($se as $r2):
                            */?>
                            <option value="<?php /*echo $r2['id'];*/?>">
                                <?php /*echo $r2['Name'];*/?>
                            </option>
                            <?php
/*                        endforeach;
                        */?>
                    </select>-->
                    <select name="Batch" class="form-control">
                        <option value="#"><?php echo get_phrase('batch') ;?></option>
                        <?php
                        $se = $this->db->get('batch')->result_array();
                        foreach($se as $r2):
                            ?>
                            <option value="<?php echo $r2['id'];?>">
                                <?php echo $r2['batch_alias'];?>
                            </option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                    <!--<select name="year" class="form-control">
                        <option value="#"><?php /*echo get_phrase('select_year') ;*/?></option>
                        <?php
/*                        $se = $this->db->get('year')->result_array();
                        foreach($se as $r2):
                            */?>
                            <option value="<?php /*echo $r2['id'];*/?>">
                                <?php /*echo $r2['year'];*/?>
                            </option>
                            <?php
/*                        endforeach;
                        */?>
                    </select>-->
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <select name="Semester" class="form-control">
                        <option value="#"><?php echo get_phrase('select_semester') ;?></option>
                        <?php
                        $semester = $this->db->get('semester')->result_array();
                        foreach($semester as $row2):
                            ?>
                            <option value="<?php echo $row2['id'];?>">
                                <?php echo $row2['name'];?>
                            </option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered courses">
            <li class="active">
                <a href="#semester_wise_courses" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('semester_wise_courses');?>
                </a></li>
            <li>
                <a href="#add_semester_wise_courses" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_semester_wise_courses');?>
                </a></li>
            <li class="">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('courses');?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_course');?>
                </a></li>
            <li>
                <a href="#program_list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('program_list');?>
                </a></li>
            <li>
                <a href="#add_program" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_program');?>
                </a></li>
            <li>
                <a href="#faculty_list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('faculty_list');?>
                </a></li>
            <li>
                <a href="#add_faculty" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_faculty');?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box" id="faculty_list">

                <table class="table table-bordered datatable" id="table_export3">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('faculty_name');?></div></th>
                        <th><div><?php echo get_phrase('faculty_code');?></div></th>
                        <th><div><?php echo get_phrase('description');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($faculty_setup as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['code'];?></td>
                            <td><?php echo $row['description'];?></td>

                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_faculty_setup/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subjects/facdelete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane box" id="add_faculty" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/subjects/faculty_setup' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('faculty_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" placeholder="Science and Engineering" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('faculty_code');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="code" placeholder="001" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="description" placeholder="EEE Short Description" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_faculty_setup');?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane box" id="program_list">

                <table class="table table-bordered datatable" id="table_export2">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('program_name');?></div></th>
                        <th><div><?php echo get_phrase('program_code');?></div></th>
                        <th><div><?php echo get_phrase('faculty');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($course_program as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['course_name'];?></td>
                            <td><?php echo $row['course_code'];?></td>
                            <td><?php echo $row['course_alias'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_course_program/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subjects/programdelete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane box" id="add_program" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/subjects/course_program' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="course_name" placeholder="Computer Science and Engineering (CSE)" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_code');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="course_code" placeholder="001" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('faculty_name');?></label>
                            <div class="col-sm-5">
                                <select name="course_alias" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $faculty_setup = $this->db->get('faculty_setup')->result_array();
                                    foreach($faculty_setup as $row):
                                        ?>
                                        <option value="<?php echo $row['name'];?>">
                                            <?php echo $row['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_course_program');?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane box active" id="semester_wise_courses">

                <table class="table table-bordered datatable" id="table_export1">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('program_name');?></div></th>
                        <th><div><?php echo get_phrase('session_name');?></div></th>
                        <th><div><?php echo get_phrase('semester');?></div></th>
                        <th><div><?php echo get_phrase('batch_name');?></div></th>
                        <th><div><?php echo get_phrase('courses-instructors-view-attendance-print');?></div></th>
                        <!--<th><div><?php /*echo get_phrase('options');*/?></div></th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($assign_subjects as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td>
                                <div style="width: 220px;">
                                <?php
                                $this->db->where('id', $row['ProgramName']);
                                $course_program = $this->db->get('course_program')->result_array();
                                foreach($course_program as $ee):
                                    echo $ee['course_name'];
                                endforeach;
                                ?>
                                </div>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['SemesterName']);
                                $as2 = $this->db->get('session_pundro')->result_array();
                                foreach($as2 as $as22):
                                endforeach;
                                ?>
                                <?php
                                $this->db->where('id', $row['Year']);
                                $as3 = $this->db->get('year_calendar')->result_array();
                                foreach($as3 as $as33):
                                endforeach;
                                ?>
                                <?php echo $as22['SessionName']." ".$as33['Name'];?>
                            </td>
                            <td><?php
                                $this->db->where('id', $row['Semester']);
                                $ccas = $this->db->get('semester')->result_array();
                                foreach($ccas as $esz):
                                    echo $esz['name'];
                                endforeach;
                                ?></td>
                            <td><?php
                                $this->db->where('id', $row['BatchName']);
                                $cca = $this->db->get('batch')->result_array();
                                foreach($cca as $ez):
                                    echo $ez['batch_name'];
                                endforeach;
                                ?></td>
                            <td class="coursss">
                                <div class="first">
                                    <br>
                                    <div class="col-md-12">
                                        <div class="col-md-6"><h3>Courses</h3></div>
                                        <div class="col-md-6">
                                            <div class="col-md-6"><h3>Add Instructors</h3></div>
                                            <div class="col-md-6"><h3>View Instructors</h3></div>
                                        </div>
                                    </div>
                                <?php
                                $test = explode(", ", $row['Courses']);
                                foreach ($test as $key => $value) {
                                    $this->db->where('id', $value);
                                    $cca12 = $this->db->get('subjects')->result_array();
                                    foreach($cca12 as $ez12):
                                        //echo $ez12['CourseName'];
                                        ?>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="cccs">
                                                <?php echo $ez12['CourseName'];?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <?php echo form_open(base_url() . 'index.php?admin/subjects/add_course_wise_instructors' , array('class' => 'form-horizontal form-groups-bordered validate coursett','target'=>'_top'));?>
                                                    <input type="hidden" name="ProgramName" value="<?php echo $row['ProgramName'];?>">
                                                    <input type="hidden" name="SemesterName" value="<?php echo $row['SemesterName'];?>">
                                                    <input type="hidden" name="Year" value="<?php echo $row['Year'];?>">
                                                    <input type="hidden" name="BatchName" value="<?php echo $row['BatchName'];?>">
                                                    <input type="hidden" name="CourseName" value="<?php echo $value;?>">
                                                    <?php
                                                    echo "<div class='second12'>";
                                                    ?>
                                                    <a class ="btn btn-info" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_courses_instructors/<?php echo $value;?>');">
                                                        <i class="entypo-user-add"></i><?php //echo get_phrase('inst');?>
                                                    </a>
                                                    <?php
                                                    echo "</div>";
                                                    ?>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php echo form_open(base_url() . 'index.php?admin/subjects/add_course_wise_instructors' , array('class' => 'form-horizontal form-groups-bordered validate coursett','target'=>'_top'));?>
                                                    <input type="hidden" name="ProgramName" value="<?php echo $row['ProgramName'];?>">
                                                    <input type="hidden" name="SemesterName" value="<?php echo $row['SemesterName'];?>">
                                                    <input type="hidden" name="Year" value="<?php echo $row['Year'];?>">
                                                    <input type="hidden" name="BatchName" value="<?php echo $row['BatchName'];?>">
                                                    <input type="hidden" name="CourseName" value="<?php echo $value;?>">
                                                    <?php
                                                    echo "<div class='second1'>";
                                                    ?>
                                                    <a class ="btn btn-info" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_courses_instructors_view/<?php echo $value;?>');">
                                                        <i class="entypo-users"></i><?php //echo get_phrase('inst');?>
                                                    </a>
                                                    <?php
                                                    echo "</div>";
                                                    ?>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-3">
                                                <div class="col-md-6">
                                                    <?php /*echo form_open(base_url() . 'index.php?admin/subjects/add_course_wise_instructors' , array('class' => 'form-horizontal form-groups-bordered validate coursett','target'=>'_top'));*/?>
                                                    <input type="hidden" name="ProgramName" value="<?php /*echo $row['ProgramName'];*/?>">
                                                    <input type="hidden" name="SemesterName" value="<?php /*echo $row['SemesterName'];*/?>">
                                                    <input type="hidden" name="Year" value="<?php /*echo $row['Year'];*/?>">
                                                    <input type="hidden" name="BatchName" value="<?php /*echo $row['BatchName'];*/?>">
                                                    <input type="hidden" name="CourseName" value="<?php /*echo $value;*/?>">
                                                    <?php
/*                                                    echo "<div class='second12'>";
                                                    */?>
                                                    <a class ="btn btn-info" href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_courses_attendance/<?php /*echo $value;*/?>/<?php /*echo $row['BatchName'];*/?>/<?php /*echo $row['Year'];*/?>/<?php /*echo $row['SemesterName'];*/?>/<?php /*echo $row['ProgramName'];*/?>');">
                                                        <i class="entypo-check"></i><?php /*//echo get_phrase('inst');*/?>
                                                    </a>
                                                    <?php
/*                                                    echo "</div>";
                                                    */?>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php /*echo form_open(base_url() . 'index.php?admin/subjects/add_course_wise_instructors' , array('class' => 'form-horizontal form-groups-bordered validate coursett','target'=>'_top'));*/?>
                                                    <input type="hidden" name="ProgramName" value="<?php /*echo $row['ProgramName'];*/?>">
                                                    <input type="hidden" name="SemesterName" value="<?php /*echo $row['SemesterName'];*/?>">
                                                    <input type="hidden" name="Year" value="<?php /*echo $row['Year'];*/?>">
                                                    <input type="hidden" name="BatchName" value="<?php /*echo $row['BatchName'];*/?>">
                                                    <input type="hidden" name="CourseName" value="<?php /*echo $value;*/?>">
                                                    <?php
/*                                                    echo "<div class='second1'>";
                                                    */?>
                                                    <a class ="btn btn-info" href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_courses_attendance_view/<?php /*echo $value;*/?>/<?php /*echo $row['BatchName'];*/?>/<?php /*echo $row['Year'];*/?>/<?php /*echo $row['SemesterName'];*/?>/<?php /*echo $row['ProgramName'];*/?>');">
                                                        <i class="entypo-eye"></i><?php /*//echo get_phrase('inst');*/?>
                                                    </a>
                                                    <?php
/*                                                    echo "</div>";
                                                    */?>
                                                    </form>
                                                </div>
                                            </div>-->
                                        </div>
                                    <?php
                                    echo "<br/>";
                                    endforeach;
                                }
                                ?>
                                </div>
                            </td>
                            <!--<td>
                                <a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_attn/<?php /*echo $row['id'];*/?>');">
                                    <i class="entypo-pencil"></i><?php /*echo get_phrase('take_attend');*/?>
                                </a>
                                <a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_attn_report/<?php /*echo $row['id'];*/?>');">
                                    <i class="entypo-pencil"></i><?php /*echo get_phrase('attend_report');*/?>
                                </a>
                                <a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_edit_assign_subjects/<?php /*echo $row['id'];*/?>');">
                                    <i class="entypo-pencil"></i><?php /*echo get_phrase('edit');*/?>
                                </a>
                                <a href="#" onclick="confirm_modal('<?php /*echo base_url();*/?>index.php?admin/subjects/semester_wise_coursesdelete/<?php /*echo $row['id'];*/?>');">
                                    <i class="entypo-trash"></i><?php /*echo get_phrase('delete');*/?>
                                </a>
                            </td>-->
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane box" id="add_semester_wise_courses" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/subjects/add_semester_wise_courses' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <!--<div class="form-group">
                            <label class="col-sm-3 control-label"><?php /*echo get_phrase('program_name');*/?></label>
                            <div class="col-sm-5">
                                <select name="ProgramName" class="form-control">
                                    <option value=""><?php /*echo get_phrase('select');*/?></option>
                                    <?php
/*                                    $vb = $this->db->get('course_program')->result_array();
                                    foreach($vb as $rowv):
                                        */?>
                                        <option value="<?php /*echo $rowv['id'];*/?>">
                                            <?php /*echo $rowv['course_name'];*/?>
                                        </option>
                                        <?php
/*                                    endforeach;
                                    */?>
                                </select>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('session_name');?></label>
                            <div class="col-sm-5 fiftyfifty">
                                <select name="SemesterName" id="Session" class="form-control">
                                    <option value=""><?php echo get_phrase('select_semester');?></option>
                                    <?php
                                    $ss = $this->db->get('session_pundro')->result_array();
                                    foreach($ss as $ow112):
                                        ?>
                                        <option value="<?php echo $ow112['id'];?>">
                                            <?php echo $ow112['SessionName']." (".$ow112['SemesterDuration'].")";?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                                <select name="Year" id="Year" class="form-control">
                                    <option value="#"><?php echo get_phrase('select_year');?></option>
                                    <?php
                                    $this->db->order_by('id', DESC);
                                    $m = $this->db->get('year_calendar')->result_array();
                                    foreach($m as $rw112):
                                        ?>
                                        <option value="<?php echo $rw112['id'];?>">
                                            <?php echo $rw112['Name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="col-sm-3 control-label"><?php /*echo get_phrase('batch');*/?></label>
                            <div class="col-sm-5">
                                <select name="BatchName" class="form-control">
                                    <option value=""><?php /*echo get_phrase('select');*/?></option>
                                    <?php
/*                                    $qq = $this->db->get('batch')->result_array();
                                    foreach($qq as $rowq):
                                        */?>
                                        <option value="<?php /*echo $rowq['id'];*/?>">
                                            <?php /*echo $rowq['batch_name']." (".$rowq['batch_alias'].")";*/?>
                                        </option>
                                        <?php
/*                                    endforeach;
                                    */?>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>

                            <div class="col-sm-5">
                                <select name="program_id" class="form-control" data-validate="required" id="program_id"
                                        data-message-required="<?php echo get_phrase('value_required');?>"
                                        onchange="return get_batch(this.value)">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $classes = $this->db->get('course_program')->result_array();
                                    foreach($classes as $ro2):
                                        ?>
                                        <option value="<?php echo $ro2['id'];?>">
                                            <?php echo $ro2['course_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                            <div class="col-sm-5">
                                <select name="section_id" class="form-control" id="batch_selector_holder">
                                    <option value=""><?php echo get_phrase('select_program_first');?></option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('semester');?></label>
                            <div class="col-sm-5 fiftyfifty">
                                <select name="SemesterName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select_semester');?></option>
                                    <?php
                                    $mc = $this->db->get('semester')->result_array();
                                    foreach($mc as $rw112c):
                                        ?>
                                        <option value="<?php echo $rw112c['id'];?>">
                                            <?php echo $rw112c['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('courses');?></label>
                            <div class="col-sm-8">
                                <?php
                                $facul = $this->db->get('subjects')->result_array();
                                foreach($facul as $row21):
                                    ?>
                                    <input type="checkbox" name="Courses[]" value="<?php echo $row21['id'];?>">
                                    &nbsp;&nbsp;
                                    <?php echo $row21['CourseName'];?>
                                    <br/>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_courses');?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane box" id="list">

                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('CourseCode');?></div></th>
                        <th><div><?php echo get_phrase('CourseName');?></div></th>
                        <th><div><?php echo get_phrase('Credits');?></div></th>
                        <th><div><?php echo get_phrase('Prerequisite(s)');?></div></th>
                        <th><div><?php echo get_phrase('CourseAreas');?></div></th>
                        <th><div><?php echo get_phrase('Program');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['CourseCode'];?></td>
                            <td><?php echo $row['CourseName'];?></td>
                            <td><?php echo $row['Credits'];?></td>
                            <td><?php echo $row['Prerequisites'];?></td>
                            <td><?php echo $row['CourseAreas'];?></td>
                            <td>
                                <?php
                                $this->db->where('id', $row['Program']);
                                $course_name = $this->db->get('course_program')->result_array();
                                foreach($course_name as $row3x3):
                                    echo $row3x3['course_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_subjects/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subjects/delete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
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
                    <?php echo form_open(base_url() . 'index.php?admin/subjects/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_code');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="CourseCode" placeholder="CSE1101" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="CourseName" placeholder="C Programming" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('credits');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Credits" placeholder="3" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('prerequisite(s)');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Prerequisites" placeholder="prerequisite(s)" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_areas');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="CourseAreas" placeholder="Computer Science & Engineering Core Course(s)" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('Program');?></label>
                            <div class="col-sm-5">
                                <select name="Program" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row1z2):
                                        ?>
                                        <option value="<?php echo $row1z2['id'];?>">
                                            <?php echo $row1z2['course_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_course');?></button>
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


        var datatable = $("#table_export").dataTable();
        var datatable = $("#table_export1").dataTable();
        var datatable = $("#table_export2").dataTable();
        var datatable = $("#table_export3").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>
<script type="text/javascript">

    function get_batch($program_id) {

        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_batch/' + $program_id ,
            success: function(response)
            {
                jQuery('#batch_selector_holder').html(response);
            }
        });

    }

</script>