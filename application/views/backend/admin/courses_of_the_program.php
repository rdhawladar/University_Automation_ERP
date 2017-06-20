<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('courses_of_the_program');?>
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
                        <th><div><?php echo get_phrase('course_areas');?></div></th>
                        <th><div><?php echo get_phrase('no_of_courses');?></div></th>
                        <th><div><?php echo get_phrase('credit_hours');?></div></th>
                        <th><div><?php echo get_phrase('program');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['CourseAreas'];?></td>
                            <td><?php echo $row['NoOfCourses'];?></td>
                            <td><?php echo $row['CreditHours'];?></td>
                            <td>
                                <?php
                                //echo $row['alias'];
                                /*$this->db->where('id', $row['Program']);
                                $course_name =  $this->db->select('course_program')->result_array();
                                foreach($course_name as $rrr):
                                    echo $rrr['course_name'];
                                    endforeach;*/
                                $this->db->where('id', $row['Program']);
                                $course_name = $this->db->get('course_program')->result_array();
                                foreach($course_name as $row33):
                                    echo $row33['course_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_courses_of_the_program/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/courses_of_the_program/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/courses_of_the_program/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_areas');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="CourseAreas" placeholder="Language" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('no_of_courses');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="NoOfCourses" placeholder="01" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('credit_hours');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="CreditHours" placeholder="03.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program');?></label>
                            <div class="col-sm-5">
                                <select name="Program" class="form-control">
                                    <option value="#"><?php echo get_phrase('select_program') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row11):
                                        ?>
                                        <option value="<?php echo $row11['id'];?>">
                                            <?php echo $row11['course_name'];?>
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
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_courses_of_the_program');?></button>
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