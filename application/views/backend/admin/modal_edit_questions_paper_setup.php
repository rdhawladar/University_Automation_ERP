<?php 
$edit_data		=	$this->db->get_where('questions_paper_setup' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_questions_paper_setup');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/questions_paper_setup/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                    <div class="col-sm-5">
                        <select name="ProgramName" class="form-control">
                            <?php
                            $this->db->where('id', $row['ProgramName']);
                            $course_name = $this->db->get('course_program')->result_array();
                            foreach($course_name as $row33):
                            endforeach;
                            ?>
                            <option value="<?php echo $row33['id']; ?>"><?php echo $row33['course_name']; ?></option>
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
                            foreach($course_name as $rsowx3):
                            endforeach;
                            ?>
                            <option value="<?php echo $rsowx3['id']; ?>"><?php echo $rsowx3['batch_name']; ?></option>
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
                            <?php
                            $this->db->where('id', $row['Semester']);
                            $course_name = $this->db->get('semester')->result_array();
                            foreach($course_name as $qrow3):
                                echo $qrow3['name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $qrow3['id']; ?>"><?php echo $qrow3['name']; ?></option>
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
                            <option value="<?php $row['ExamName'];?>"><?php echo $row['ExamName']; ?></option>
                            <option value="First Phase">First Phase</option>
                            <option value="Final Phase">Final Phase</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                    <div class="col-sm-5">
                        <select name="CourseName" class="form-control">
                            <?php
                            $this->db->where('id', $row['CourseName']);
                            $course_name = $this->db->get('subjects')->result_array();
                            foreach($course_name as $roo3):
                            endforeach;
                            ?>
                            <option value="<?php echo $roo3['id']; ?>"><?php echo $roo3['CourseName']; ?></option>
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
                        <input type="text" class="form-control" name="Time" value="<?php echo $row['Time'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('full_marks');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="FullMarks" value="<?php echo $row['FullMarks'];?>"/>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('notification');?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Notification" value="<?php /*echo $row['Notification'];*/?>"/>
                        <textarea class="notification form-control" name="Notification" id="" cols="30" rows="3"><?php echo $row['Notification'];?></textarea>
                    </div>
                </div> -->
                <!-- <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('Questions');?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Contents" id="mytextarea" value="<?php /*echo $row['Contents'];*/?>"/>
                        <textarea name="Contents" class="form-control" id="mytextarea"><?php echo $row['Contents'];?></textarea>
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('notification');?></label>
                    <div class="col-sm-9 quesedit">
                        <!-- <textarea class="notification form-control" name="Notification" id="" cols="" rows=""></textarea> -->
                        <?php echo stripslashes($row['Notification']);?>
                        <textarea name="Notification" style="width: 700px; height: 100px;">
                               <?php echo stripslashes($row['Notification']);?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('Questions');?></label>
                    <div class="col-sm-9 quesedit">
                        <!-- <textarea name="Contents" id="mytextarea"></textarea> -->
                        <?php echo stripslashes($row['Contents']);?>
                        <textarea name="Contents" style="width: 700px; height: 100px;">
                               <?php 
                                //echo stripslashes($row['Contents']);
                                //echo(stripslashes($row['Contents']));
                                //echo htmlspecialchars_decode(stripslashes($row['Contents']));
                                //echo htmlspecialchars_decode($row['Contents'], ENT_NOQUOTES);
                                echo stripslashes($row['Contents']);
                                ?>
                        </textarea>
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
<!-- <script type="text/javascript" src="<?php echo base_url();?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector : "#mytextarea"
    });
</script> -->
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>