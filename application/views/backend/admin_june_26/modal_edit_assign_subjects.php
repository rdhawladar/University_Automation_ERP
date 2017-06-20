<?php 
$edit_data		=	$this->db->get_where('assign_subjects' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_assign_subjects');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/assign_subjects/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                        <div class="col-sm-5">
                            <!--<input type="text" class="form-control" name="course" value="<?php /*echo $row['course'];*/?>"/>-->
                            <select name="course" class="form-control">
                                <option value=""><?php echo $row['course'] ;?></option>
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
                    <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="batch" value="<?php /*echo $row['batch'];*/?>"/>-->
                        <select name="batch" class="form-control">
                            <option value=""><?php echo $row['batch'] ;?></option>
                            <?php
                            $faculty_setup = $this->db->get('year')->result_array();
                            foreach($faculty_setup as $row):
                                ?>
                                <option value="<?php echo $row['year'];?>">
                                    <?php echo $row['year'];?>
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
                        <!--<input type="text" class="form-control" name="semester" value="<?php /*echo $row['semester'];*/?>"/>-->
                        <select name="semester" class="form-control">
                            <option value=""><?php echo $row['semester'] ;?></option>
                            <?php
                            $faculty_setup = $this->db->get('semester')->result_array();
                            foreach($faculty_setup as $row):
                                ?>
                                <option value="<?php echo $row['name'];?>">
                                    <?php echo $row['name'];?>
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
                        <input type="text" class="form-control" name="subject" value="<?php echo $row['subject'];?>"/>
                        <?php
                        $faculty_setup = $this->db->get('subjects')->result_array();
                        foreach($faculty_setup as $row):
                            ?>
                            <input type="checkbox" name="subject[]" value="<?php echo $row['name'];?>">
                            &nbsp;&nbsp;
                            <?php echo $row['name'];?>
                            <br/>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_assign_subject');?></button>
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


