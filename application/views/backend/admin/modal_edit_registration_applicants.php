<?php 
$edit_data		=	$this->db->get_where('osad_student_12' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('registration_applicants');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/registration_applicants/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name_en" value="<?php echo $row['name_en'];?>"/>
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('applicant_status');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="applicant_status" value="<?php /*echo $row['applicant_status'];*/?>"/>-->
                        <select class="form-control" name="applicant_status" id="">
                            <option value="<?php echo $row['applicant_status'];?>"><?php echo $row['applicant_status'];?></option>
                            <option value="<?php echo get_phrase('short_listed');?>"><?php echo get_phrase('short_listed');?></option>
                            <option value="<?php echo get_phrase('interview');?>"><?php echo get_phrase('interview');?></option>
                            <option value="<?php echo get_phrase('offer_letter');?>"><?php echo get_phrase('offer_letter');?></option>
                            <option value="<?php echo get_phrase('registration');?>"><?php echo get_phrase('registration');?></option>
                        </select>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('update_applicant');?></button>
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


