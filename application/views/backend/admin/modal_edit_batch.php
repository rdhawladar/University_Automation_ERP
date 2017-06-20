<?php 
$edit_data		=	$this->db->get_where('batch' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_batch');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/batch/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <!--<div class="form-group">
                        <label class="col-sm-3 control-label"><?php /*echo get_phrase('academic_year');*/?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="academic_year" value="<?php /*echo $row['academic_year'];*/?>"/>
                        </div>
                    </div>-->
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('batch_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="batch_name" value="<?php echo $row['batch_name'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('batch_alias');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="batch_alias" value="<?php echo $row['batch_alias'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('start_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="strt_dt" value="<?php echo $row['strt_dt'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('end_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="end_dt" value="<?php echo $row['end_dt'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('maxstudents');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="maxstudents" value="<?php echo $row['maxstudents'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                    <div class="col-sm-5">
                        <select name="status" id="">
                            <option value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="course" value="<?php /*echo $row['course'];*/?>"/>-->
                        <select name="course" class="form-control">
                            <option value="<?php echo $row['course'];?>"><?php echo $row['course'];?></option>
                            <?php
                            $faculty_setup = $this->db->get('course_program')->result_array();
                            foreach($faculty_setup as $row):
                                ?>
                                <option value="<?php echo $row['course_name'];?>">
                                    <?php echo $row['course_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>

            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_batch');?></button>
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


