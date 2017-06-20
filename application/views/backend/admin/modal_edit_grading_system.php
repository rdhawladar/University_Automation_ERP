<?php 
$edit_data		=	$this->db->get_where('grading_system' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_grading_system');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/grading_system/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('range');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Range" value="<?php echo $row['Range'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('letter_grade');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="LetterGrade" value="<?php echo $row['LetterGrade'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('grade_point');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="GradePoint" value="<?php echo $row['GradePoint'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('comment');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Comment" value="<?php echo $row['Comment'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_grading_system');?></button>
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