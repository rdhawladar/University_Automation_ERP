<?php 
$edit_data		=	$this->db->get_where('semester_wise_distribution_of_courses' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_semester_wise_distribution_of_courses');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/semester_wise_distribution_of_courses/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('year_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="YearName" placeholder="" value="<?php echo $row['YearName'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="SemesterName" placeholder="" value="<?php echo $row['SemesterName'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="CourseName" placeholder="CSE" value="<?php echo $row['CourseName'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ProgramName" placeholder="" value="<?php echo $row['ProgramName'];?>"/>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_semester_wise_distribution_of_courses');?></button>
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


