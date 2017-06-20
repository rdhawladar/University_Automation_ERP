<?php 
$edit_data		=	$this->db->get_where('exam_set_exam' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_exam_set_exam');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/exam_set_exam/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="fee_category"/>-->
                        <select name="fee_category" class="form-control">
                            <option value="<?php echo $row['fee_category']; ?>"><?php echo $row['fee_category']; ?></option>
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
                            <option value="<?php echo $row['receipt_no']; ?>"><?php echo $row['receipt_no']; ?></option>
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
                <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('term');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="description"/>-->
                        <select name="description" class="form-control">
                            <option value="<?php echo $row['description']; ?>"><?php echo $row['description']; ?></option>
                            <?php
                            $course_program = $this->db->get('exam_set_term')->result_array();
                            foreach($course_program as $row3):
                                ?>
                                <option value="<?php echo $row3['fee_category'];?>">
                                    <?php echo $row3['fee_category'];?>
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
                        <!--<input type="text" class="form-control" name="exam_name"/>-->
                        <select name="exam_name" class="form-control">
                            <option value="<?php echo $row['exam_name']; ?>"><?php echo $row['exam_name']; ?></option>
                            <?php
                            $course_program = $this->db->get('exam_create_exam')->result_array();
                            foreach($course_program as $row4):
                                ?>
                                <option value="<?php echo $row4['receipt_no'];?>">
                                    <?php echo $row4['receipt_no'];?>
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
                            <option value="<?php echo $row['subject']; ?>"><?php echo $row['subject']; ?></option>
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
                    <label class="col-sm-3 control-label"><?php echo get_phrase('max_mark');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="max_mark" value="<?php echo $row['max_mark']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('pass_mark');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pass_mark" value="<?php echo $row['pass_mark']; ?>"/>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('exam_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="exam_date" value="<?php echo $row['exam_date']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('start_time');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="start_time" placeholder="10:00 am" value="<?php echo $row['start_time']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('end_time');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="end_time" placeholder="01.00 pm" value="<?php echo $row['end_time']; ?>"/>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_exam_set_exam');?></button>
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


