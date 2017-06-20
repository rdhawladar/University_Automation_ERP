<?php 
$edit_data		=	$this->db->get_where('exam_enter_marks' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_exam_enter_marks');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/exam_enter_marks/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('term');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="fee_category"/>-->
                        <select name="fee_category" class="form-control">
                            <option value="<?php echo $row['fee_category'];?>"><?php echo $row['fee_category'];?></option>
                            <?php
                            $course_program = $this->db->get('exam_set_term')->result_array();
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
                    <label class="col-sm-3 control-label"><?php echo get_phrase('exam_name');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="receipt_no"/>-->
                        <select name="receipt_no" class="form-control">
                            <option value="<?php echo $row['receipt_no'];?>"><?php echo $row['receipt_no'];?></option>
                            <?php
                            $course_program = $this->db->get('exam_create_exam')->result_array();
                            foreach($course_program as $row2):
                                ?>
                                <option value="<?php echo $row2['receipt_no'];?>">
                                    <?php echo $row2['receipt_no'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="description"/>-->
                        <select name="description" class="form-control">
                            <option value="<?php echo $row['description'];?>"><?php echo $row['description'];?></option>
                            <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row3):
                                ?>
                                <option value="<?php echo $row3['course_name'];?>">
                                    <?php echo $row3['course_name'];?>
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
                        <!--<input type="text" class="form-control" name="batch"/>-->
                        <select name="batch" class="form-control">
                            <option value="<?php echo $row['batch'];?>"><?php echo $row['batch'];?></option>
                            <?php
                            $course_program = $this->db->get('batch')->result_array();
                            foreach($course_program as $row4):
                                ?>
                                <option value="<?php echo $row4['batch_name'];?>">
                                    <?php echo $row4['batch_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="subject"/>-->
                        <select name="subject" class="form-control">
                            <option value="<?php echo $row['subject'];?>"><?php echo $row['subject'];?></option>
                            <?php
                            $course_program = $this->db->get('subjects')->result_array();
                            foreach($course_program as $row5):
                                ?>
                                <option value="<?php echo $row5['name'];?>">
                                    <?php echo $row5['name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('roll_no');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="personal_roll_no"/>-->
                        <select name="personal_roll_no" class="form-control">
                            <option value="<?php echo $row['personal_roll_no'];?>"><?php echo $row['personal_roll_no'];?></option>
                            <?php
                            $course_program = $this->db->get('student')->result_array();
                            foreach($course_program as $row6):
                                ?>
                                <option value="<?php echo $row6['roll'];?>">
                                    <?php echo $row6['roll'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('max_mark');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="max_mark" value="<?php echo $row['max_mark'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('obtained_mark');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="obt_mark" value="<?php echo $row['obt_mark'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('attendance_mark');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="attn_mark" value="<?php echo $row['attn_mark'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('comment');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="comment" value="<?php echo $row['comment'];?>"/>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_marks');?></button>
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


