<div class="row">
    <div class="col-md-12">
        <div class="box-content">
            <?php echo form_open(base_url() . 'index.php?admin/mark_details' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
            <div class="padded">
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                    <div class="col-sm-5">
                        <select name="ProgramName" class="form-control">
                            <option value="#"><?php echo get_phrase('select') ;?></option>
                            <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row22):
                                ?>
                                <option value="<?php echo $row22['id'];?>">
                                    <?php echo $row22['course_name'];?>
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
                            <option value="#"><?php echo get_phrase('select');?></option>
                            <?php
                            $semester = $this->db->get('batch')->result_array();
                            foreach($semester as $row213):
                                ?>
                                <option value="<?php echo $row213['id'];?>">
                                    <?php echo $row213['name'];?>
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
                            <option value="First Phase">First Phase</option>
                            <option value="Final Phase">Final Phase</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('marks_setup');?>
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
                        <th><div><?php echo get_phrase('batch');?></div></th>
                        <th><div><?php echo get_phrase('exam_name');?></div></th>
                        <th><div><?php echo get_phrase('particulars');?></div></th>
                        <th><div><?php echo get_phrase('marks');?></div></th>
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
                            <td><?php echo $row['ExamName'];?></td>
                            <td><?php echo $row['Particulars'];?></td>
                            <td><?php echo $row['Marks'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_marks_setup/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/marks_setup/delete/<?php echo $row['id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/marks_setup/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
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
                                            <?php echo $rowza2['batch_alias'];?>
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
                                    <option value="First Phase">First Phase</option>
                                    <option value="Final Phase">Final Phase</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('particulars');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Particulars" placeholder="Home Assignment"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('marks');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Marks" placeholder="3"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('marks_setup');?></button>
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