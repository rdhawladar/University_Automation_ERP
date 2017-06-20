<?php 
$edit_data		=	$this->db->get_where('selection_criteria' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_selection_criteria');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/selection_criteria/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('selection_criteria');?></label>
                    <div class="col-sm-5">
                        <select class="form-control" id="SelectionCriteria" name="SelectionCriteria">
                            <option value="<?php echo $row['SelectionCriteria'];?>"><?php echo $row['SelectionCriteria'];?></option>
                            <option value="gpa">GPA</option>
                            <option value="admission_test">Admission Test</option>
                            <option value="gpa_admission_test">Both</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_name');?></label>
                    <div class="col-sm-5">
                        <select name="SemesterName" class="form-control">
                            <?php
                            $this->db->where('id', $row['SemesterName']);
                            $aas = $this->db->get('session_pundro')->result_array();
                            foreach($aas as $r334):
                            endforeach;
                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $r334['SessionName'];?></option>
                            <?php
                            $ww = $this->db->get('session_pundro')->result_array();
                            foreach($ww as $ow):
                                ?>
                                <option value="<?php echo $ow['id'];?>">
                                    <?php echo $ow['SessionName']." - ".$ow['AdmissionDuration']."-".$ow['SemesterDuration']."-".$ow['ClassCommencement'];?>
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
                            $aas = $this->db->get('year_calendar')->result_array();
                            foreach($aas as $r334):
                            endforeach;
                            ?>
                            <option value="<?php echo $r334['id'];?>"><?php echo $r334['Name'];?></option>
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
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_selection_criteria');?></button>
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


