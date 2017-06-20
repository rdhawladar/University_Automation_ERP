<?php 
$edit_data		=	$this->db->get_where('revenue_setup' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_revenue_setup');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/revenue_setup/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('from_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="fee_category" value="<?php echo $row['fee_category'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('to_date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="receipt_no" value="<?php echo $row['receipt_no'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('faculty');?></label>
                    <div class="col-sm-5">
                        <select name="description" class="form-control">
                            <option value="<?php echo $row['description'] ;?>"><?php echo $row['description'] ;?></option>
                            <?php
                            $faculty = $this->db->get('faculty_setup')->result_array();
                            foreach($faculty as $row21):
                                ?>
                                <option value="<?php echo $row21['name'];?>">
                                    <?php echo $row21['name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                    <div class="col-sm-5">
                        <select name="department" class="form-control">
                            <option value="<?php echo $row['department'] ;?>"><?php echo $row['department'] ;?></option>
                            <?php
                            $course_program = $this->db->get('course_program')->result_array();
                            foreach($course_program as $row22):
                                ?>
                                <option value="<?php echo $row22['course_name'];?>">
                                    <?php echo $row22['course_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                    <div class="col-sm-5">
                        <select name="batch" class="form-control">
                            <option value="<?php echo $row['batch'] ;?>"><?php echo $row['batch'] ;?></option>
                            <?php
                            $batch = $this->db->get('batch')->result_array();
                            foreach($batch as $row23):
                                ?>
                                <option value="<?php echo $row23['batch_name'];?>">
                                    <?php echo $row23['batch_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('income');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="income" value="<?php echo $row['income'] ;?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('net_income');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="netincome" value="<?php echo $row['netincome'] ;?>"/>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_revenue_setup');?></button>
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


