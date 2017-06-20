<?php 
$edit_data		=	$this->db->get_where('class_routine_pundro' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_class_routine_pundro');?>
            	</div>
            </div>
			<div class="panel-body">
                <?php echo form_open(base_url() . 'index.php?admin/class_routine_pundro/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="padded">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                        <div class="col-sm-5">
                            <select name="ProgramName" class="form-control">
                                <?php
                                $this->db->where('id', $row['ProgramName']);
                                $as = $this->db->get('course_program')->result_array();
                                foreach($as as $row334):
                                endforeach;
                                ?>
                                <option value="<?php echo $row334['id'];?>"><?php echo $row334['course_name'];?></option>
                                <?php
                                $aa = $this->db->get('course_program')->result_array();
                                foreach($aa as $a):
                                    ?>
                                    <option value="<?php echo $a['id'];?>">
                                        <?php echo $a['course_name'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('batch_name');?></label>
                        <div class="col-sm-5">
                            <select name="BatchName" class="form-control">
                                <?php
                                $this->db->where('id', $row['BatchName']);
                                $as = $this->db->get('batch')->result_array();
                                foreach($as as $row334):
                                endforeach;
                                ?>
                                <option value="<?php echo $row334['id'];?>"><?php echo $row334['batch_alias'];?></option>
                                <?php
                                $ad = $this->db->get('batch')->result_array();
                                foreach($ad as $aad):
                                    ?>
                                    <option value="<?php echo $aad['id'];?>">
                                        <?php echo $aad['batch_alias'];?>
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
                                $as = $this->db->get('semester')->result_array();
                                foreach($as as $row334):
                                endforeach;
                                ?>
                                <option value="<?php echo $row334['id'];?>"><?php echo $row334['name'];?></option>
                                <?php
                                $ae = $this->db->get('semester')->result_array();
                                foreach($ae as $aae):
                                    ?>
                                    <option value="<?php echo $aae['id'];?>">
                                        <?php echo $aae['name'];?>
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
                                <?php
                                $this->db->where('id', $row['CourseName']);
                                $as = $this->db->get('subjects')->result_array();
                                foreach($as as $row334):
                                endforeach;
                                ?>
                                <option value="<?php echo $row334['id'];?>"><?php echo $row334['CourseName']." | ".$row334['CourseCode'];?></option>
                                <?php
                                $af = $this->db->get('subjects')->result_array();
                                foreach($af as $aac):
                                    ?>
                                    <option value="<?php echo $aac['id'];?>">
                                        <?php echo $aac['CourseName']." | ".$aac['CourseCode'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('instructor_name');?></label>
                        <div class="col-sm-5">
                            <select name="InstructorName" class="form-control">
                                <?php
                                $this->db->where('id', $row['InstructorName']);
                                $as = $this->db->get('course_instructor')->result_array();
                                foreach($as as $row334):
                                endforeach;
                                ?>
                                <option value="<?php echo $row334['id'];?>"><?php echo $row334['InstructorName']." | ".$row334['id'];?></option>
                                <?php
                                $ag = $this->db->get('course_instructor')->result_array();
                                foreach($ag as $aad):
                                    ?>
                                    <option value="<?php echo $aad['id'];?>">
                                        <?php echo $aad['InstructorName']." | ".$aac['id'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('building_name');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="BuildingName" value="<?php echo $row['BuildingName'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('room_no');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="RoomNo" value="<?php echo $row['RoomNo'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('day');?></label>
                        <div class="col-sm-5">
                            <select name="Day" class="form-control">
                                <option value=""><?php echo get_phrase('select');?></option>
                                <?php
                                $al = $this->db->get('weekdays')->result_array();
                                foreach($al as $aaff):
                                    ?>
                                    <option value="<?php echo $aaff['id'];?>">
                                        <?php echo $aaff['value'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('starting_time');?></label>
                        <div class="col-sm-5">
                            <select name="StrtTime" class="form-control">
                                <option value=""><?php echo get_phrase('select');?></option>
                                <?php
                                $ah = $this->db->get('timeformat')->result_array();
                                foreach($ah as $aae):
                                    ?>
                                    <option value="<?php echo $aae['id'];?>">
                                        <?php echo $aae['value'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                            <select name="StrtFormat" class="form-control">
                                <option value=""><?php echo get_phrase('select');?></option>
                                <?php
                                $ai = $this->db->get('timeformat1')->result_array();
                                foreach($ai as $aaf):
                                    ?>
                                    <option value="<?php echo $aaf['id'];?>">
                                        <?php echo $aaf['value'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('ending_time');?></label>
                        <div class="col-sm-5">
                            <select name="EndTime" class="form-control">
                                <option value=""><?php echo get_phrase('select');?></option>
                                <?php
                                $aj = $this->db->get('timeformat')->result_array();
                                foreach($aj as $aag):
                                    ?>
                                    <option value="<?php echo $aag['id'];?>">
                                        <?php echo $aag['value'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                            <select name="EndFormat" class="form-control">
                                <option value=""><?php echo get_phrase('select');?></option>
                                <?php
                                $ak = $this->db->get('timeformat1')->result_array();
                                foreach($ak as $aah):
                                    ?>
                                    <option value="<?php echo $aah['id'];?>">
                                        <?php echo $aah['value'];?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_fee_structure');?></button>
                        </div>
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


