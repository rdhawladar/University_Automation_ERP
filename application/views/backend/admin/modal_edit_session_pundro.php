<?php 
$edit_data		=	$this->db->get_where('session_pundro' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_session');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/session_pundro/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('session_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="SessionName" value="<?php echo $row['SessionName'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('admission_duration');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="AdmissionDuration" value="<?php echo $row['AdmissionDuration'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('class_commencement');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ClassCommencement" value="<?php echo $row['ClassCommencement'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_duration');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="SemesterDuration" value="<?php echo $row['SemesterDuration'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                    <div class="col-sm-5">
                        <select name="Year" class="form-control">
                            <?php
                            $this->db->where('id', $row['Year']);
                            $aas = $this->db->get('year_calendar')->result_array();
                            foreach($aas as $r334):
                            endforeach;
                            ?>
                            <option value="<?php echo $r334['id'];?>"><?php echo $r334['Name'];?></option>
                            ?>
                            <?php
                            $yy = $this->db->get('year_calendar')->result_array();
                            foreach($yy as $rowyy):
                                ?>
                                <option value="<?php echo $rowyy['id'];?>">
                                    <?php echo $rowyy['Name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_session');?></button>
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


