<div class="row onadf">
	<div class="col-md-12">
		<ul class="nav nav-tabs bordered">
        	<li class="active">
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_applicant');?>
                </a>
            </li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active box onad" id="add">
             <br />
                <div class="box-content" id="printarea">
                	<?php echo form_open(base_url() . 'index.php?admin/questions_paper_setup/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'onsubmit'=>'return validateForm()', 'target'=>'_top','enctype'=>'multipart/form-data', 'name' => 'myForm'));?>
					<div class="form-style-10 form-style-preview">
						<div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                    <div class="col-sm-5">
                        <select name="ProgramName" class="form-control">
                            <?php
                            $this->db->where('id', $this->input->post('ProgramName'));
                            $course_name = $this->db->get('course_program')->result_array();
                            foreach($course_name as $row33):
                            endforeach;
                            ?>
                            <option value="<?php echo $row33['id']; ?>"><?php echo $row33['course_name']; ?></option>
                            <!-- <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $rowz2):
                                ?>
                                <option value="<?php echo $rowz2['id'];?>">
                                    <?php echo $rowz2['course_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?> -->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                    <div class="col-sm-5">
                        <select name="Batch" class="form-control">
                            <?php
                            $this->db->where('id', $this->input->post('Batch'));
                            $course_name = $this->db->get('batch')->result_array();
                            foreach($course_name as $rsowx3):
                            endforeach;
                            ?>
                            <option value="<?php echo $rsowx3['id']; ?>"><?php echo $rsowx3['batch_name']; ?></option>
                            <!-- <?php
                            $course_program = $this->db->get('batch')->result_array();
                            foreach($course_program as $rowza2):
                                ?>
                                <option value="<?php echo $rowza2['id'];?>">
                                    <?php echo $rowza2['batch_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?> -->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester');?></label>
                    <div class="col-sm-5">
                        <select name="Semester" class="form-control">
                            <?php
                            $this->db->where('id', $this->input->post('Semester'));
                            $course_name = $this->db->get('semester')->result_array();
                            foreach($course_name as $qrow3):
                                echo $qrow3['name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $qrow3['id']; ?>"><?php echo $qrow3['name']; ?></option>
                            <!-- <?php
                            $semester = $this->db->get('semester')->result_array();
                            foreach($semester as $roa2):
                                ?>
                                <option value="<?php echo $roa2['id'];?>">
                                    <?php echo $roa2['name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?> -->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('exam_name');?></label>
                    <div class="col-sm-5">
            			<select name="ExamName" class="form-control">
                            <option value="#"><?php echo get_phrase('select'); ?></option>
                            <?php
                            $this->db->where('id', $this->input->post('ExamName'));
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
                        <!-- <select name="ExamName" class="form-control">
                            <option value="<?php echo $this->input->post('ExamName'); ?>"><?php echo $this->input->post('ExamName'); ?></option>
                        </select> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                    <div class="col-sm-5">
                        <select name="CourseName" class="form-control">
                            <?php
                            $this->db->where('id', $this->input->post('CourseName'));
                            $course_name = $this->db->get('subjects')->result_array();
                            foreach($course_name as $roo3):
                            endforeach;
                            ?>
                            <option value="<?php echo $roo3['id']; ?>"><?php echo $roo3['CourseName']; ?></option>
                            <!-- <?php
                            $course_name = $this->db->get('subjects')->result_array();
                            foreach($course_name as $rqoa2):
                                ?>
                                <option value="<?php echo $rqoa2['id'];?>">
                                    <?php echo $rqoa2['CourseName'];?>
                                </option>
                                <?php
                            endforeach;
                            ?> -->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('time');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Time" value="<?php echo $this->input->post('Time');?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('full_marks');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="FullMarks" value="<?php echo $this->input->post('FullMarks');?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('notification');?></label>
                    <div class="col-sm-9 quesedit">
                        <?php echo stripslashes($this->input->post('Notification'));?>
                        <textarea name="Notification" style="width: 700px; height: 1px; visibility: hidden;">
                               <?php echo stripslashes($this->input->post('Notification'));?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('Questions');?></label>
                    <div class="col-sm-9 quesedit">
                        <!-- <textarea name="Contents" id="mytextarea"></textarea> -->
                        <?php echo stripslashes($this->input->post('Contents'));?>
                        <textarea name="Contents" style="width: 700px; height: 1px; visibility: hidden;">
                               <?php 
                                echo stripslashes($this->input->post('Contents'));
                                ?>
                        </textarea>
                    </div>
                </div>                        
                <!-- <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('update');?></button>
                    </div>
                </div>	 -->
					</div>
					<div class="form-group test32">
						  <div class="col-sm-offset-3 col-sm-8">
							  <a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;
							  <button type="submit" class="btn btn-success"><?php echo get_phrase('submit');?></button>
							  &nbsp;&nbsp;
							  <input type="button" value="Print" class="btn" onclick="window.print();"/>
						  </div>
					</div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>