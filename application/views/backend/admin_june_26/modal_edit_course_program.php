<?php 
$edit_data		=	$this->db->get_where('course_program' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_course_program');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/course_program/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="course_name" value="<?php echo $row['course_name'];?>"/>
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('course_code');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="course_code" value="<?php echo $row['course_code'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('faculty');?></label>
                    <div class="col-sm-5">
                        <!--<input type="text" class="form-control" name="course_alias" value="<?php /*echo $row['course_alias'];*/?>"/>-->
                        <select name="course_alias" class="form-control">
                            <option value="<?php echo $row['course_alias'];?>"><?php echo $row['course_alias'];?></option>
                            <?php
                            $faculty_setup = $this->db->get('faculty_setup')->result_array();
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
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_course_program');?></button>
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


