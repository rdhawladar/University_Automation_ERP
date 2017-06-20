<?php 
$edit_data		=	$this->db->get_where('courses_of_the_program' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_courses_of_the_program');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/courses_of_the_program/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('course_areas');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="CourseAreas" value="<?php echo $row['CourseAreas'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('no_of_courses');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="NoOfCourses" value="<?php echo $row['NoOfCourses'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('credit_hours');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="CreditHours" value="<?php echo $row['CreditHours'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program');?></label>
                    <div class="col-sm-5">
                        <select name="Program" class="form-control">
                            <?php
                            $this->db->where('id', $row['Program']);
                            $course_name = $this->db->get('course_program')->result_array();
                            foreach($course_name as $row313):
                                //echo $row313['course_name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $row['Program'];?>"><?php echo $row313['course_name']; ;?></option>
                            <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row11):
                                ?>
                                <option value="<?php echo $row11['id'];?>">
                                    <?php echo $row11['course_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_courses_of_the_program');?></button>
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


