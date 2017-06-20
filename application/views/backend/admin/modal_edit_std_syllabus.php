<?php 
$edit_data		=	$this->db->get_where('std_syllabus' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_student_syllabus');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/std_syllabus/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top','enctype'=>'multipart/form-data', 'name' => 'myForm'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                    <div class="col-sm-5">
                        <select name="BatchName" class="form-control">
                            <?php
                            $this->db->where('id', $row['BatchName']);
                            $aas = $this->db->get('batch')->result_array();
                            foreach($aas as $r334):
                                //echo $r334['batch_alias'];
                            endforeach;
                            ?>
                            <option value="<?php echo $r334['id'];?>"><?php echo $r334['batch_alias'];?></option>
                            <?php
                            $bb = $this->db->get('batch')->result_array();
                            foreach($bb as $rowa):
                                ?>
                                <option value="<?php echo $rowa['id'];?>">
                                    <?php echo $rowa['batch_alias'];?>
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
                            $aasz = $this->db->get('semester')->result_array();
                            foreach($aasz as $r334z):
                                //echo $r334z['name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $r334z['id'];?>"><?php echo $r334z['name'];?></option>
                            <?php
                            $bc = $this->db->get('semester')->result_array();
                            foreach($bc as $rowc):
                                ?>
                                <option value="<?php echo $rowc['id'];?>">
                                    <?php echo $rowc['name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('syllabus');?></label>
                    <div class="col-sm-5">
                        <a target="_blank" href="<?php echo "uploads/syllabus/".$row[Content]; ?>"><?php echo $row[Content]; ?></a>
                        <br>
                        <input required type="file" name="Content" id="Content"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_student_syllabus');?></button>
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


