<?php 
$edit_data		=	$this->db->get_where('subject_allocation' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_subject_allocation');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/subject_allocation/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="department" value="<?php echo $row['department'];?>"/>
                            <!--<select name="course" class="form-control">
                                <option value=""><?php /*echo $row['course'] ;*/?></option>
                                <?php
/*                                $faculty_setup = $this->db->get('course_program')->result_array();
                                foreach($faculty_setup as $row):
                                    */?>
                                    <option value="<?php /*echo $row['course_name'];*/?>">
                                        <?php /*echo $row['course_name'];*/?>
                                    </option>
                                    <?php
/*                                endforeach;
                                */?>
                            </select>-->
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('faculty');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="faculty" value="<?php echo $row['faculty'];?>"/>
                        <!--<select name="batch" class="form-control">
                            <option value=""><?php /*echo $row['batch'] ;*/?></option>
                            <?php
/*                            $faculty_setup = $this->db->get('year')->result_array();
                            foreach($faculty_setup as $row):
                                */?>
                                <option value="<?php /*echo $row['year'];*/?>">
                                    <?php /*echo $row['year'];*/?>
                                </option>
                                <?php
/*                            endforeach;
                            */?>
                        </select>-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('course');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="course" value="<?php echo $row['course'];?>"/>
                        <!--<select name="semester" class="form-control">
                            <option value=""><?php /*echo $row['semester'] ;*/?></option>
                            <?php
/*                            $faculty_setup = $this->db->get('semester')->result_array();
                            foreach($faculty_setup as $row):
                                */?>
                                <option value="<?php /*echo $row['name'];*/?>">
                                    <?php /*echo $row['name'];*/?>
                                </option>
                                <?php
/*                            endforeach;
                            */?>
                        </select>-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="batch" value="<?php echo $row['batch'];?>"/>
                        <!--<select name="semester" class="form-control">
                            <option value=""><?php /*echo $row['semester'] ;*/?></option>
                            <?php
                        /*                            $faculty_setup = $this->db->get('semester')->result_array();
                                                    foreach($faculty_setup as $row):
                                                        */?>
                                <option value="<?php /*echo $row['name'];*/?>">
                                    <?php /*echo $row['name'];*/?>
                                </option>
                                <?php
                        /*                            endforeach;
                                                    */?>
                        </select>-->
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_subject_allocation');?></button>
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


