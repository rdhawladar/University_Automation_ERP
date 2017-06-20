<div class="row">
    <div class="col-md-12">
    <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('duty_roster');?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_record');?>
                </a></li>
        </ul>
<div class="tab-content">

            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('program_name');?></div></th>
                        <th><div><?php echo get_phrase('batch_name');?></div></th>
                        <th><div><?php echo get_phrase('session');?></div></th>
                        <th><div><?php echo get_phrase('year'); ?></div></th>
                        <th><div><?php echo get_phrase('semester'); ?></div></th>
                        <th><div><?php echo get_phrase('course_name'); ?></div></th>
                        <th><div><?php echo get_phrase('exam_type'); ?></div></th>
                        <th><div><?php echo get_phrase('date'); ?></div></th>
                        <th><div><?php echo get_phrase('start_time'); ?></div></th>
			<th><div><?php echo get_phrase('end_time'); ?></div></th>
                        <th><div><?php echo get_phrase('room_no'); ?></div></th>
                        <th><div><?php echo get_phrase('instructor_id'); ?></div></th>
                        <th><div><?php echo get_phrase('inustructor_name'); ?></div></th>
                        <th><div><?php echo get_phrase('signature'); ?></div></th>
                        <th><div><?php echo get_phrase('remarks'); ?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td>
                                <?php
                                $this->db->where('id', $row['ProgramName']);
                                $course_program = $this->db->get('course_program')->result_array();
                                foreach($course_program as $row222):
                                    echo $row222['course_name'];
                                    endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['BatchName']);
                                $semester2 = $this->db->get('batch')->result_array();
                                foreach($semester2 as $row2232):
                                    echo $row2232['batch_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['SessionName']);
                                $semester2a = $this->db->get('session_pundro')->result_array();
                                foreach($semester2a as $row2232a):
                                    echo $row2232a['SessionName'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['Year']);
                                $semester2az = $this->db->get('year_calendar')->result_array();
                                foreach($semester2az as $row2232az):
                                    echo $row2232az['Name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['SemesterName']);
                                $semester = $this->db->get('semester')->result_array();
                                foreach($semester as $row223):
                                    echo $row223['name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['CourseName']);
                                $semester2az = $this->db->get('courses_of_the_program')->result_array();
                                foreach($semester2az as $row2232az):
                                    echo $row2232az['CourseAreas'];
                                endforeach;
                                ?>
                            </td>
                            <td><?php echo $row['ExamType'];?></td>
                            <td><?php echo $row['DateDutyRoster'];?></td>
                            <td><?php echo $row['StartTime'];?></td>
                            <td><?php echo $row['EndTime'];?></td>
                            <td><?php echo $row['RoomNo'];?></td>
                            <td><?php echo $row['InstructorId'];?></td>
                            <td><?php echo $row['InstructorName'];?></td>
                            <td><?php echo $row['Signature'];?></td>
                            <td><?php echo $row['Remarks'];?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url(). 'index.php?admin/duty_roster/create', array('class' => 'form-horizontal form-groups-border validate', 'target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select name="ProgramName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row12):
                                        ?>
                                        <option value="<?php echo $row12['id'];?>">
                                            <?php echo $row12['course_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('Batch_name');?></label>
                            <div class="col-sm-5">
                                <select name="BatchName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                        $batch_name = $this->db->get('batch')->result_array();
                                        foreach ($batch_name as $row121):
                                    ?>
                                    <option value="<?php echo $row121['id'];?>">
                                        <?php echo $row121['batch_name']." (".$row121['batch_alias'].")";?>
                                    </option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('session');?></label>
                            <div class="col-sm-5">
                                <select name="SessionName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program2 = $this->db->get('session_pundro')->result_array();
                                    foreach($course_program2 as $row122):
                                        ?>
                                        <option value="<?php echo $row122['id'];?>">
                                            <?php echo $row122['SessionName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                            <div class="col-sm-5">
                                <select name="Year" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program3 = $this->db->get('year_calendar')->result_array();
                                    foreach($course_program3 as $row123):
                                        ?>
                                        <option value="<?php echo $row123['id'];?>">
                                            <?php echo $row123['Name'];?>
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
                                <!--<input type="text" class="form-control" name="receipt_no"/>-->
                                <select name="SemesterName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $semester = $this->db->get('semester')->result_array();
                                    foreach($semester as $row13):
                                        ?>
                                        <option value="<?php echo $row13['id'];?>">
                                            <?php echo $row13['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                            <div class="col-sm-5">
                                <select name="CourseName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_name = $this->db->get('courses_of_the_program')->result_array();
                                    foreach($course_name as $row14):
                                        ?>
                                        <option value="<?php echo $row14['id'];?>">
                                            <?php echo $row14['CourseAreas'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('exam_type');?></label>
                            <div class="col-sm-5">
                                <select name="ExamType" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>                                    
                                    <?php 
                                        $exam_type = $this->db->get('exam_phase')->result_array();
                                        foreach ($exam_type as $row15):
                                    ?>
                                    <option valu="<?php echo $row15['id'];?>">
                                        <?php echo $row15['name']?>
                                    </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                            <div class="col-sm-5">
                                <input type="datetime" class="datepicker form-control" name="DateDutyRoster"/>
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('starting_time');?></label>
                                <div class="col-sm-5">
                                    <select name="StartTime" class="form-control" style="width:100%;">
					<?php for($i = 0; $i <= 12 ; $i++):?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php endfor;?>
                                    </select>
                                    <select name="starting_ampm" class="form-control" style="width:100%">
                                    	<option value="1">am</option>
                                    	<option value="2">pm</option>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('ending_time');?></label>
                                <div class="col-sm-5">
                                    <select name="EndTime" class="form-control" style="width:100%;">
										<?php for($i = 0; $i <= 12 ; $i++):?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php endfor;?>
                                    </select>
                                    <select name="ending_ampm" class="form-control" style="width:100%">
                                    	<option value="1">am</option>
                                    	<option value="2">pm</option>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('room_no');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="RoomNo"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('instructor_id');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="InstructorId"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('instructor_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="InstructorName"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('signature');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Signature"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('remarks');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Remarks"/>
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
</div>