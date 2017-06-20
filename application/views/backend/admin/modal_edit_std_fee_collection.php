<?php
$edit_data		=	$this->db->get_where('std_fee_collection' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_std_fee_collection');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/std_fee_collection/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('student_id');?></label>
                    <div class="col-sm-5">
                        <?php echo $row['register_number'];?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('semester_name');?></label>
                    <div class="col-sm-5">
                        <?php
                        $this->db->where('id', $row['semester_name']);
                        $course_program = $this->db->get('semester')->result_array();
                        foreach($course_program as $row41):
                            echo $row41['name'];
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('actual_amount');?></label>
                    <div class="col-sm-5">
                        <input type="hidden" class="form-control" name="actual_amount" value="<?php echo $row['actual_amount']; ?>">
                        <?php echo $row['actual_amount']." BDT"; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('paid_amount');?></label>
                    <div class="col-sm-5">
                        <input type="hidden" class="form-control" name="paid_amount" value="<?php echo $row['paid_amount']; ?>">
                        <?php echo $row['paid_amount']." BDT"; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('arrear');?></label>
                    <div class="col-sm-5">
                        <input type="hidden" class="form-control" name="remaining_amount" value="<?php echo $row['remaining_amount']; ?>">
                        <?php echo $row['remaining_amount']." BDT"; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('particulars_for');?><?php echo "&nbsp;(".$row41['name'].")";?></label>
                    <div class="col-sm-8">
                        <?php
                        //echo $row['semester_name'];
                        //echo $row['register_number'];
                        //$this->db->where('ProgramName',$row['id']);

                        //$data['NameofProgram']         = $this->input->post('Session');
                        $this->db->where('id', $row['register_number']);
                        $as23 = $this->db->get('applicants_details')->result_array();
                        foreach($as23 as $row33423):
                            //echo $row33423['NameofProgram']."t1";
                        endforeach;

                        $this->db->where('ProgramName',$row33423['NameofProgram']);
                        $this->db->where('SemesterName',$row['semester_name']);
                        $fee_structure = $this->db->get('semester_particulars')->result_array();
                        foreach($fee_structure as $row242):
                            ?>
                            <div class="col-md-12 part">
                                <div class="col-md-8 ttt">
                                    <?php echo $row242['Particulars'];?>
                                </div>
                                <div class="col-md-4 ttt">
                                    <?php echo $row242['Amount'];?>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('particulars');?></label>
                    <div class="col-sm-8">
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <?php
                                //echo $row['particulars1'];
                                $str1 = substr($row['particulars1'],1,-1);
                                $val1 = explode(',', $str1);
                                foreach($val1 as $out1) {
                                    ?>
                                    <input type="text" class="form-control" name="particulars1[]" id="particulars1[]" value="<?php echo $out1;?>">
                                    <?php
                                    echo "<br/>";
                                }
                                ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                //echo $row['particulars2'];
                                $str2 = substr($row['particulars2'],1,-1);
                                $val12 = explode(',', $str2);
                                foreach($val12 as $out12) {
                                    ?>
                                    <input type="text" class="form-control" name="particulars2[]" id="particulars2[]" value="<?php echo $out12;?>">
                                    <?php
                                    echo "<br/>";
                                }
                                ?>
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


