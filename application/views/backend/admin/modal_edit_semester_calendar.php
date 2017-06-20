<?php 
$edit_data		=	$this->db->get_where('semester_calendar' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_semester_calendar');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/semester_calendar/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                    <div class="col-sm-5">
                        <select name="ProgramName" class="form-control">
                            <?php
                            $this->db->where('id', $row['ProgramName']);
                            $as2 = $this->db->get('course_program')->result_array();
                            foreach($as2 as $r2334):
                            endforeach;
                            ?>
                            <option value="<?php echo $r2334['id'];?>"><?php echo $r2334['course_name'];?></option>
                            <?php
                            $faculty_setup = $this->db->get('course_program')->result_array();
                            foreach($faculty_setup as $row12):
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
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_name');?></label>
                    <div class="col-sm-5">
                        <select name="SemesterName" class="form-control">
                            <?php
                            $this->db->where('id', $row['SemesterName']);
                            $as1 = $this->db->get('session_pundro')->result_array();
                            foreach($as1 as $r1334):
                            endforeach;
                            ?>
                            <option value="<?php echo $r1334['id'];?>"><?php echo $r1334['SessionName'];?></option>
                            <?php
                            $ww = $this->db->get('session_pundro')->result_array();
                            foreach($ww as $ow):
                                ?>
                                <option value="<?php echo $ow['id'];?>">
                                    <?php echo $ow['SessionName'];?>
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
                            <?php
                            $this->db->where('id', $row['Year']);
                            $asz = $this->db->get('year_calendar')->result_array();
                            foreach($asz as $rz334):
                            endforeach;
                            ?>
                            <option value="<?php echo $rz334['id'];?>"><?php echo $rz334['Name'];?></option>
                            <?php
                            $wqw = $this->db->get('year_calendar')->result_array();
                            foreach($wqw as $oqw):
                                ?>
                                <option value="<?php echo $oqw['id'];?>">
                                    <?php echo $oqw['Name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_start_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="SemesterStartDate" value="<?php echo $row['SemesterStartDate'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_end_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="SemesterEndDate" value="<?php echo $row['SemesterEndDate'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('seat_count');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="SeatCount" value="<?php echo $row['SeatCount'];?>"/>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_semester_calendar');?></button>
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


