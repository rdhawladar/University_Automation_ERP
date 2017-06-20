<?php 
$edit_data		=	$this->db->get_where('marks_setup' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_marks_setup');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/marks_setup/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                    <div class="col-sm-5">
                        <select name="ProgramName" class="form-control">
                            <?php
                            $this->db->where('id', $row['ProgramName']);
                            $course_name = $this->db->get('course_program')->result_array();
                            foreach($course_name as $row3x3):
                                //echo $row3x3['course_name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $row3x3['id'];?>"><?php echo $row3x3['course_name']; ?></option>
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
                            <?php
                            $this->db->where('id', $row['Batch']);
                            $course_name = $this->db->get('batch')->result_array();
                            foreach($course_name as $row1x3):
                                //echo $rowx13['batch_name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $row1x3['id']; ?>"><?php echo $row1x3['batch_name']; ?></option>
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
                    <label class="col-sm-3 control-label"><?php echo get_phrase('exam_name');?></label>
                    <div class="col-sm-5">
                        <select name="ExamName" class="form-control">
                            <option value="<?php echo $row['ExamName'];?>"><?php echo $row['ExamName'];?></option>
                            <option value="First Phase">First Phase</option>
                            <option value="Final Phase">Final Phase</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('particulars');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Particulars" value="<?php echo $row['Particulars'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('marks');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Marks" value="<?php echo $row['Marks'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('update');?></button>
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