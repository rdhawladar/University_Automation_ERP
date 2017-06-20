<?php
$edit_data		=	$this->db->get_where('osad_student_12' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
    ?>
    <div class="row idcard">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading" style="background: transparent;
    margin: 0;border: 0;">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php //echo get_phrase('applicants_profile');?>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo form_open(base_url() . 'index.php?admin/student_id_card/do_update/'.$row['student_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                        <div class="col-sm-5" style="margin: -1.4% 84%;
    position: relative;">
                            <img style="    width: 85px;" src="<?php echo base_url()."assets/images/applicants/".$row['photo'];?>" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('faculty');?></label>
                        <div class="col-sm-5" style="    margin: -3% 36%;
    position:">
                            <?php echo $row['faculty_name'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: 0.5% 17%;">
                            <?php echo $row['name_en'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('mothers_name');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: -3.6% 17%;">
                            <?php echo $row['mother_name'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('father_name');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: -4.6% 17%;">
                            <?php echo $row['father_name'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('admission_roll_no');?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: -2.6% 18%;">
                            <?php echo $row['id'];?>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-sm-3 control-label"><?php /*echo get_phrase('personal_joining_date');*/?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: -9% 80%;">
                            <?php /*echo $row['personal_joining_date'];*/?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php /*echo get_phrase('session');*/?></label>
                        <div class="col-sm-5" style="    position: relative;
    margin: -12% 35%;">
                            <?php /*echo $row['contact_country'];*/?>
                        </div>
                    </div>-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
endforeach;
?>


