<?php
$edit_data		=	$this->db->get_where('std_fee_waiver' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('edit_waiver');?>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo form_open(base_url() . 'index.php?admin/std_fee_waiver/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('fee_category');?></label>
                        <div class="col-sm-5">
                            <!--<input type="text" class="form-control" name="fee_category" value="<?php /*echo $row['fee_category'];*/?>"/>-->
                            <select name="fee_category" class="form-control">
                                <option value="<?php echo $row['fee_category'];?>"><?php echo $row['fee_category'];?></option>
                                <?php
                                $course_program = $this->db->get('std_fee_category')->result_array();
                                foreach($course_program as $row1):
                                    ?>
                                    <option value="<?php echo $row1['fee_category'];?>">
                                        <?php echo $row1['fee_category'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('note');?></label>
                        <div class="col-sm-5">
                            <!--<input type="text" class="form-control" name="receipt_no" value="<?php /*echo $row['receipt_no'];*/?>"/>-->
                            <select name="receipt_no" class="form-control">
                                <option value="<?php echo $row['receipt_no'];?>"><?php echo $row['receipt_no'];?></option>
                                <?php
                                $course_program = $this->db->get('std_fee_sub_category')->result_array();
                                foreach($course_program as $row2):
                                    ?>
                                    <option value="<?php echo $row2['fee_category'];?>">
                                        <?php echo $row2['fee_category'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('criteria');?></label>
                        <div class="col-sm-5">
                            <!--<input type="text" class="form-control" name="description" value="<?php /*echo $row['description'];*/?>"/>-->
                            <select name="description" id="">
                                <option value="<?php echo $row['description'];?>"><?php echo $row['description'];?></option>
                                <option value="<?php echo get_phrase('female');?>"><?php echo get_phrase('Female');?></option>
                                <option value="<?php echo get_phrase('poor');?>"><?php echo get_phrase('Poor');?></option>
                                <option value="<?php echo get_phrase('TMSS_relative');?>"><?php echo get_phrase('TMSS_relative');?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('waiver_percentage');?></label>
                        <div class="col-sm-5">
                            <!--<input type="text" class="form-control" name="fee_type" value="<?php /*echo $row['fee_type'];*/?>"/>-->
                            <select name="fee_type" id="">
                                <option value="<?php echo $row['fee_type'];?>"><?php echo $row['fee_type'];?></option>
                                <option value="0%"><?php echo get_phrase('0%');?></option>
                                <option value="5%"><?php echo get_phrase('5%');?></option>
                                <option value="10%"><?php echo get_phrase('10%');?></option>
                                <option value="15%"><?php echo get_phrase('15%');?></option>
                                <option value="20%"><?php echo get_phrase('20%');?></option>
                                <option value="25%"><?php echo get_phrase('25%');?></option>
                                <option value="30%"><?php echo get_phrase('30%');?></option>
                                <option value="35%"><?php echo get_phrase('35%');?></option>
                                <option value="40%"><?php echo get_phrase('40%');?></option>
                                <option value="45%"><?php echo get_phrase('45%');?></option>
                                <option value="50%"><?php echo get_phrase('50%');?></option>
                                <option value="55%"><?php echo get_phrase('55%');?></option>
                                <option value="60%"><?php echo get_phrase('60%');?></option>
                                <option value="65%"><?php echo get_phrase('65%');?></option>
                                <option value="70%"><?php echo get_phrase('70%');?></option>
                                <option value="75%"><?php echo get_phrase('75%');?></option>
                                <option value="80%"><?php echo get_phrase('80%');?></option>
                                <option value="85%"><?php echo get_phrase('85%');?></option>
                                <option value="90%"><?php echo get_phrase('90%');?></option>
                                <option value="95%"><?php echo get_phrase('95%');?></option>
                                <option value="100%"><?php echo get_phrase('100%');?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_waiver');?></button>
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


