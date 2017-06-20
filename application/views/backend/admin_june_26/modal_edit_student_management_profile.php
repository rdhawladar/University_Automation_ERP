<?php
$edit_data		=	$this->db->get_where('student' , array('student_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('applicants_profile');?>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo form_open(base_url() . 'index.php?admin/student_management/do_update/'.$row['student_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['name'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['birthday'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('sex');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['sex'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('religion');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['religion'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('blood_group');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['blood_group'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['address'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['phone'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['email'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('father_name');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['father_name'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('mother_name');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['mother_name'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('roll');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['roll'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('register_number');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['personal_register_number'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('joining_date');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['personal_joining_date'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                        <div class="col-sm-8">
                            <?php echo $row['personal_department'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                        <div class="col-sm-5">
                            <?php echo $row['personal_batch'];?>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
endforeach;
?>


