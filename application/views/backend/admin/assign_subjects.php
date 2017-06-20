<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('semester_wise_courses');?>
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
                        <th><div><?php echo get_phrase('year');?></div></th>
                        <th><div><?php echo get_phrase('semester');?></div></th>
                        <th><div><?php echo get_phrase('courses');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php
								$this->db->where('id', $row['course']);
								$course_program = $this->db->get('course_program')->result_array();
								foreach($course_program as $ee):
                                    echo $ee['course_name'];
                                endforeach;
                                ?></td>
                            <td><?php
                                $this->db->where('id', $row['batch']);
                                $cc = $this->db->get('year')->result_array();
                                foreach($cc as $ewe):
                                    echo $ewe['year'];
                                endforeach;
                                ?></td>
                            <td><?php
                                $this->db->where('id', $row['semester']);
                                $cca = $this->db->get('semester')->result_array();
                                foreach($cca as $ez):
                                    echo $ez['name'];
                                endforeach;
                                ?></td>
                            <td>
                                <?php
                                    $test = explode(", ", $row['subject']);
                                    //echo $string = rtrim(implode(",\n", $test), ',');
                                    echo $test1 = implode(",<br/>", $test);
                                ?>
                            </td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_assign_subjects/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/assign_subjects/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/assign_subjects/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select name="course" class="form-control">
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
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="batch"/>-->
                                <select name="batch" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $faculty_setup = $this->db->get('year')->result_array();
                                    foreach($faculty_setup as $row):
                                        ?>
                                        <option value="<?php echo $row['id'];?>">
                                            <?php echo $row['year'];?>
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
                                <select name="semester" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $faculty_setup = $this->db->get('semester')->result_array();
                                    foreach($faculty_setup as $row):
                                        ?>
                                        <option value="<?php echo $row['id'];?>">
                                            <?php echo $row['name'];?>
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
                                        <input type="checkbox" name="subject[]" value="<?php echo $row21['CourseCode']." (".$row21['CourseName'].")";?>">
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
            <!----CREATION FORM ENDS-->
        </div>
    </div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $("#table_export").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>