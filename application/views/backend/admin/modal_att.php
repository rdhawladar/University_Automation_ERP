<?php
echo $param2 = '18';
$edit_data		=	$this->db->get_where('assign_subjects' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_courses_assigned');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/subjects/semester_wise_coursesdo_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                        <div class="col-sm-5">
                            <select name="course" class="form-control">
                                <?php
                                $this->db->where('id', $row['course']);
                                $course_name = $this->db->get('course_program')->result_array();
                                foreach($course_name as $row3x3):
                                    //echo $row3x3['course_name'];
                                endforeach;
                                ?>
                                <option value="<?php echo $row3x3['id'];?>"><?php echo $row3x3['course_name'] ;?></option>
                                <?php
                                $faculty_setup = $this->db->get('course_program')->result_array();
                                foreach($faculty_setup as $rowp):
                                    ?>
                                    <option value="<?php echo $rowp['id'];?>">
                                        <?php echo $rowp['course_name'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>

                    <div class="col-sm-5">
                        <select name="class_id" class="form-control" data-validate="required" id="class_id"
                                data-message-required="<?php echo get_phrase('value_required');?>"
                                onchange="return get_class_sections(this.value)">
                            <option value=""><?php echo get_phrase('select');?></option>
                            <?php
                            $classes = $this->db->get('batch')->result_array();
                            foreach($classes as $row):
                                ?>
                                <option value="<?php echo $row['id'];?>">
                                    <?php echo $row['batch_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('student');?></label>
                    <div class="col-sm-5">
                        <?php echo $row23['ClassRollNo']; ?>
                        <input type="text" name="section_id[]" class="form-control" id="section_selector_holder">
                        <!--<select name="section_id" class="form-control" id="section_selector_holder">
                            <option value=""><?php /*echo get_phrase('select_class_first');*/?></option>

                        </select>-->
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_assign_courses');?></button>
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


<script type="text/javascript">

    function get_class_sections(class_id) {

        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_section12/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }

</script>