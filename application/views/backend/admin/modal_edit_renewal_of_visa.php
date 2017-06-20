<?php 
$edit_data		=	$this->db->get_where('student' , array('student_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_applicants');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/renewal_of_visa/do_update/'.$row['student_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                  <div class="tab-content">
                    <div id="personal" class="tab-pane active">
                      <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('register_number');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="register_number" value="<?php echo $row['register_number'];?>">
                            </div>
                      </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('visa_period');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="visaperiod" value="<?php echo $row['visaperiod'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('visa_expired_date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="visaexpireddate" value="<?php echo $row['visaexpireddate'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('visa_renew');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="visarenew" value="<?php echo $row['visarenew'];?>">
                            </div>
                        </div>
                    </div>
                  </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('update');?></button>
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


