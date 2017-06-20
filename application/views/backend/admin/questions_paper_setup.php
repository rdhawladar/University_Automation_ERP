<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li>
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('questions_paper_setup');?>
                </a></li>
            <li class="active">
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_record');?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box" id="list">

                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('program_name');?></div></th>
                        <th><div><?php echo get_phrase('batch');?></div></th>
                        <th><div><?php echo get_phrase('semester');?></div></th>
                        <th><div><?php echo get_phrase('exam_name');?></div></th>
                        <th><div><?php echo get_phrase('course_name');?></div></th>
                        <th><div><?php echo get_phrase('time');?></div></th>
                        <th><div><?php echo get_phrase('notification');?></div></th>
                        <th><div><?php echo get_phrase('contents');?></div></th>
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
                                $course_name = $this->db->get('course_program')->result_array();
                                foreach($course_name as $row3x3):
                                    echo $row3x3['course_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['Batch']);
                                $course_name = $this->db->get('batch')->result_array();
                                foreach($course_name as $rowx3):
                                    echo $rowx3['batch_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['Semester']);
                                $course_name = $this->db->get('semester')->result_array();
                                foreach($course_name as $row3):
                                    echo $row3['name'];
                                endforeach;
                                ?>
                            </td>
                            <td><?php echo $row['ExamName'];?></td>
                            <td>
                                <?php
                                $this->db->where('id', $row['CourseName']);
                                $course_name = $this->db->get('subjects')->result_array();
                                foreach($course_name as $ro3):
                                    echo $ro3['CourseName'];
                                endforeach;
                                ?>
                            </td>
                            <td><?php echo $row['Time'];?></td>
                            <td><?php echo $row['Notification'];?></td>
                            <td><?php echo stripslashes($row['Contents']);?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_questions_paper_setup/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/questions_paper_setup/delete/<?php echo $row['id'];?>');">
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
            <div class="tab-pane box active" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/questions_paper_preview/preview' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select name="ProgramName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $rowz2):
                                        ?>
                                        <option value="<?php echo $rowz2['id'];?>">
                                            <?php echo $rowz2['course_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                            <div class="col-sm-5">
                                <select name="Batch" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $course_program = $this->db->get('batch')->result_array();
                                    foreach($course_program as $rowza2):
                                        ?>
                                        <option value="<?php echo $rowza2['id'];?>">
                                            <?php echo $rowza2['batch_name'];?>
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
                                <select name="Semester" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $semester = $this->db->get('semester')->result_array();
                                    foreach($semester as $roa2):
                                        ?>
                                        <option value="<?php echo $roa2['id'];?>">
                                            <?php echo $roa2['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('exam_name');?></label>
                            <div class="col-sm-5">
                                <select name="ExamName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $ase = $this->db->get('exam_phase')->result_array();
                                    foreach($ase as $rqoa2):
                                        ?>
                                        <option value="<?php echo $rqoa2['id'];?>">
                                            <?php echo $rqoa2['name'];?>
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
                                <select name="CourseName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $course_name = $this->db->get('subjects')->result_array();
                                    foreach($course_name as $rqoa2):
                                        ?>
                                        <option value="<?php echo $rqoa2['id'];?>">
                                            <?php echo $rqoa2['CourseName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('time');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Time" placeholder="1.30"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('full_marks');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="FullMarks" placeholder="25"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('notification');?></label>
                            <div class="col-sm-9">
                                <!-- <textarea class="notification form-control" name="Notification" id="" cols="" rows=""></textarea> -->
                                <textarea name="Notification" style="width: 700px; height: 100px;">
                                       
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('Questions');?></label>
                            <div class="col-sm-9">
                                <!-- <textarea name="Contents" id="mytextarea"></textarea> -->
                                <textarea name="Contents" style="width: 700px; height: 300px;">
                                       
                                </textarea>
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('print_preview');?></button>
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
<!--<script type="text/javascript" src="<?php /*echo base_url();*/?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector : "#mytextarea"
    });
</script>-->
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>