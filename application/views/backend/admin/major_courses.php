<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('major_courses');?>
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
                                //echo $row['course_name'];
                                $this->db->where('id', $row['course_name']);
                                $asz1 = $this->db->get('course_program')->result_array();
                                foreach($asz1 as $row334z1):
                                    echo $row334z1['course_name'];
                                endforeach;
                                ?></td>
                            <td><?php 
                                //echo $row['course_code'];
                                $this->db->where('id', $row['course_code']);
                                $asz2 = $this->db->get('semester')->result_array();
                                foreach($asz2 as $row334z2):
                                    echo $row334z2['name'];
                                endforeach;
                                ?></td>
                            <td><?php 
                                //echo $row['course_alias'];
                                $test = explode(", ", $row['course_alias']);
                                foreach ($test as $key => $value) {
                                    $this->db->where('id', $value);
                                    $cca12 = $this->db->get('subjects')->result_array();
                                    foreach($cca12 as $ez12):
                                        echo $ez12['CourseName']."<br/>";
                                    endforeach;      
                                    }
                                /*$this->db->where('id', $row['course_alias']);
                                $asz = $this->db->get('subjects')->result_array();
                                foreach($asz as $row334z):
                                    echo $row334z['CourseName'];
                                endforeach;    */
                                ?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_major_courses/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/major_courses/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/major_courses/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select name="course_name" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $department_name = $this->db->get('course_program')->result_array();
                                    foreach($department_name as $row1):
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
                            <label class="col-sm-3 control-label"><?php echo get_phrase('semester_name');?></label>
                            <div class="col-sm-5">
                                <select name="course_code" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
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

                        <!-- <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('courses');?></label>
                            <div class="col-sm-5">
                                <select name="course_alias" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $subjects = $this->db->get('subjects')->result_array();
                                    foreach($subjects as $row3):
                                        ?>
                                        <option value="<?php echo $row3['id'];?>">
                                            <?php echo $row3['CourseCode']." (".$row3['CourseName'].")";?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('courses');?></label>
                            <div class="col-sm-8">
                                <?php
                                $facul = $this->db->get('subjects')->result_array();
                                foreach($facul as $row21):
                                    ?>
                                    <input type="checkbox" name="course_alias[]" value="<?php echo $row21['id'];?>">
                                    &nbsp;&nbsp;
                                    <?php echo $row21['CourseName'];?>
                                    <br/>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('major');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="major_subjects" value="yes" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_major_courses');?></button>
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