<?php 
$edit_data		=	$this->db->get_where('std_fee_collection' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_std_fee_collection');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/std_fee_collection/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="fee_category"/>-->
                        <select name="fee_category" class="form-control">
                            <option value="<?php echo $row['fee_category'];?>"><?php echo $row['fee_category'];?></option>
                            <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row1):
                                ?>
                                <option value="<?php echo $row1['course_name'];?>">
                                    <?php echo $row1['course_name'];?>
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
                        <!--<input type="text" class="form-control" name="receipt_no"/>-->
                        <select name="receipt_no" class="form-control">
                            <option value="<?php echo $row['receipt_no'];?>"><?php echo $row['receipt_no'];?></option>
                            <?php
                            $course_program = $this->db->get('batch')->result_array();
                            foreach($course_program as $row2):
                                ?>
                                <option value="<?php echo $row2['batch_name'];?>">
                                    <?php echo $row2['batch_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('register_number');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="register_number"/>-->
                        <select name="register_number" class="form-control">
                            <option value="<?php echo $row['register_number'];?>"><?php echo $row['register_number'];?></option>
                            <?php
                            $course_program = $this->db->get('osad_student')->result_array();
                            foreach($course_program as $row4):
                                ?>
                                <option value="<?php echo $row4['register_number'];?>">
                                    <?php echo $row4['register_number'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('admission_form');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="admission_form"/>-->
                        <select name="admission_form" class="form-control">
                            <option value="<?php echo $row['admission_form'];?>"><?php echo $row['admission_form'];?></option>
                            <?php
                            $course_program = $this->db->get('std_fee_sub_category')->result_array();
                            foreach($course_program as $row5):
                                ?>
                                <option value="<?php echo $row5['description'];?>">
                                    <?php echo $row5['receipt_no']." :: ".$row5['description'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('admission_id_card');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="admission_id_card"/>-->
                        <select name="admission_id_card" class="form-control">
                            <option value="<?php echo $row['admission_id_card'];?>"><?php echo $row['admission_id_card'];?></option>
                            <?php
                            $course_program = $this->db->get('std_fee_sub_category')->result_array();
                            foreach($course_program as $row6):
                                ?>
                                <option value="<?php echo $row6['description'];?>">
                                    <?php echo $row6['receipt_no']." :: ".$row6['description'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('tution_fee');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="tution_fee"/>-->
                        <select name="tution_fee" class="form-control">
                            <option value="<?php echo $row['tution_fee'];?>"><?php echo $row['tution_fee'];?></option>
                            <?php
                            $course_program = $this->db->get('std_fee_sub_category')->result_array();
                            foreach($course_program as $row7):
                                ?>
                                <option value="<?php echo $row7['description'];?>">
                                    <?php echo $row7['receipt_no']." :: ".$row7['description'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('actual_amount');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="actual_amount" value="3000000"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('amount_to_be_paid');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="amount_to_be_paid" value="3000000"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('fine');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="fine" value="<?php echo $row['fine'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('discount');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="discount" value="<?php echo $row['discount'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('receipt_voucher_no');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="receipt_voucher_no" value="<?php echo $row['receipt_voucher_no'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('receipt_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="receipt_date" value="<?php echo $row['receipt_date'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('remarks');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="remarks" value="<?php echo $row['remarks'];?>"/>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_fee_collection');?></button>
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


