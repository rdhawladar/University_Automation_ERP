<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('semester_wise_distribution_of_courses');?>
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
                        <th><div><?php echo get_phrase('year_name');?></div></th>
                        <th><div><?php echo get_phrase('semester_name');?></div></th>
                        <th><div><?php echo get_phrase('course_name');?></div></th>
                        <th><div><?php echo get_phrase('program_name');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td>
                                <?php
                                $this->db->where('id', $row['YearName']);
                                $course_name = $this->db->get('year')->result_array();
                                foreach($course_name as $row3n3):
                                    echo $row3n3['year'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['SemesterName']);
                                $course_name = $this->db->get('semester')->result_array();
                                foreach($course_name as $row3e3):
                                    echo $row3e3['name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['CourseName']);
                                $course_name = $this->db->get('subjects')->result_array();
                                foreach($course_name as $row3x3):
                                    echo $row3x3['CourseName'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['ProgramName']);
                                $course_name = $this->db->get('course_program')->result_array();
                                foreach($course_name as $row3x3):
                                    echo $row3x3['course_name'];
                                endforeach;
                                ?>
                            </td>

                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_semester_wise_distribution_of_courses/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/semester_wise_distribution_of_courses/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/semester_wise_distribution_of_courses/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('year_name');?></label>
                            <div class="col-sm-5">
                                <select name="YearName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('year')->result_array();
                                    foreach($course_program as $row112):
                                        ?>
                                        <option value="<?php echo $row112['id'];?>">
                                            <?php echo $row112['year'];?>
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
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('semester')->result_array();
                                    foreach($course_program as $row112a):
                                        ?>
                                        <option value="<?php echo $row112a['id'];?>">
                                            <?php echo $row112a['name'];?>
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
                                <!--<input type="text" class="form-control" name="CourseName" placeholder="CSE" />-->
                                <select name="CourseName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select_program') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('subjects')->result_array();
                                    foreach($course_program as $row112c):
                                        ?>
                                        <option value="<?php echo $row112c['id'];?>">
                                            <?php echo $row112c['CourseName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select name="ProgramName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select_program') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row112x):
                                        ?>
                                        <option value="<?php echo $row112x['id'];?>">
                                            <?php echo $row112x['course_name'];?>
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
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_semester_wise_distribution_of_courses');?></button>
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