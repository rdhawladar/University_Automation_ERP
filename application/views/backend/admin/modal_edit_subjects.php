<?php 
$edit_data		=	$this->db->get_where('subjects' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_subjects');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/subjects/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('course_code');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="CourseCode" value="<?php echo $row['CourseCode'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="CourseName" value="<?php echo $row['CourseName'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('credits');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Credits" value="<?php echo $row['Credits'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('prerequisite(s)');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Prerequisites" value="<?php echo $row['Prerequisites'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('course_areas');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="CourseAreas" value="<?php echo $row['CourseAreas'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('Program');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="Program" value="<?php /*echo $row['Program'];*/?>"/>-->
                        <?php
                        $this->db->where('id', $row['Program']);
                        $course_name = $this->db->get('course_program')->result_array();
                        foreach($course_name as $row3x3):
                            /*echo $row3x3['course_name'];*/
                        endforeach;
                        ?>
                        <select name="Program" class="form-control">
                            <option value="<?php echo $row3x3['id']; ?>"><?php echo $row3x3['course_name']; ?></option>
                            <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row1z2):
                                ?>
                                <option value="<?php echo $row1z2['id'];?>">
                                    <?php echo $row1z2['course_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_course');?></button>
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


