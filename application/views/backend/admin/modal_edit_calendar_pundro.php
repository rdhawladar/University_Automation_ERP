<?php 
$edit_data		=	$this->db->get_where('calendar_pundro' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_calendar');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/calendar_pundro/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('particluars');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="receipt_no" value="<?php echo $row['receipt_no'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('amount');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <!--<div class="form-group">
                    <label class="col-sm-3 control-label"><?php /*echo get_phrase('fee_category');*/?></label>
                    <div class="col-sm-5">
                        <select name="fee_category" class="form-control">
                            <option value="<?php /*echo $row['fee_category'];*/?>"><?php /*echo $row['fee_category'];*/?></option>
                            <?php
/*                            $course_program = $this->db->get('std_fee_category')->result_array();
                            foreach($course_program as $row1):
                                */?>
                                <option value="<?php /*echo $row1['fee_category'];*/?>">
                                    <?php /*echo $row1['fee_category'];*/?>
                                </option>
                                <?php
/*                            endforeach;
                            */?>
                        </select>
                    </div>
                </div>-->
                <!--<div class="form-group">
                    <label class="col-sm-3 control-label"><?php /*echo get_phrase('note');*/?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="receipt_no" value="<?php /*echo $row['receipt_no'];*/?>"/>
                    </div>
                </div>-->
                <!--<div class="form-group">
                    <label class="col-sm-3 control-label"><?php /*echo get_phrase('amount');*/?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="description" value="<?php /*echo $row['description'];*/?>"/>
                    </div>
                </div>-->
                <!--<div class="form-group">
                    <label class="col-sm-3 control-label"><?php /*echo get_phrase('fee_type');*/?></label>
                    <div class="col-sm-5">
                        <select name="fee_type" id="">
                            <option value="<?php /*echo $row['fee_type'];*/?>"><?php /*echo $row['fee_type'];*/?></option>
                            <option value="annual"><?php /*echo get_phrase('Annual');*/?></option>
                            <option value="bi-annual"><?php /*echo get_phrase('Bi-Annual');*/?></option>
                            <option value="triannual"><?php /*echo get_phrase('tri-Annual');*/?></option>
                            <option value="quarterly"><?php /*echo get_phrase('quarterly');*/?></option>
                            <option value="monthly"><?php /*echo get_phrase('monthly');*/?></option>
                            <option value="once"><?php /*echo get_phrase('once');*/?></option>
                        </select>
                    </div>
                </div>-->
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_calendar');?></button>
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


