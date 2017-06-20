<?php 
$edit_data		=	$this->db->get_where('money_receipt' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_std_fee_category_note');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/money_receipt/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                    <div class="col-sm-4">
                        <!--<input type="text" class="form-control" name="ProgramName" value="<?php /*echo 
                        $row['ProgramName'];*/?>"/>-->
                        <select name="ProgramName" class="form-control">
                            <?php
                            $this->db->where('id', $row['ProgramName']);
                            $as13 = $this->db->get('course_program')->result_array();
                            foreach($as13 as $row33413):
                                //echo $row3341['course_name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $row33413['id'];?>"><?php echo $row33413['course_name'];?></option>
                            <?php
                            $faculty_setup = $this->db->get('course_program')->result_array();
                            foreach($faculty_setup as $roww):
                                ?>
                                <option value="<?php echo $roww['id'];?>">
                                    <?php echo $roww['course_name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <!--<input type="text" class="form-control" name="ProgramName" value="<?php /*echo $row['ProgramName'];*/?>"/>-->
                        <select name="SemesterName" class="form-control">
                            <?php
                            echo $row['SemesterName'];
                            $this->db->where('id', $row['SemesterName']);
                            $as13a = $this->db->get('session_pundro')->result_array();
                            foreach($as13a as $row3341a3):
                                //echo $row3341['course_name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $row3341a3['id'];?>"><?php echo $row3341a3['SessionName'];?></option>
                            <?php
                            $faculty_setupz = $this->db->get('session_pundro')->result_array();
                            foreach($faculty_setupz as $rowz):
                                ?>
                                <option value="<?php echo $rowz['id'];?>">
                                    <?php echo $rowz['SessionName'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <!--<input type="text" class="form-control" name="Year" value="<?php /*echo $row['Year'];*/?>"/>-->
                        <select name="Year" class="form-control">
                            <?php
                            $this->db->where('id', $row['Year']);
                            $as35 = $this->db->get('year_calendar')->result_array();
                            foreach($as35 as $row33435):
                                echo $row33435['Name'];
                            endforeach;
                            ?>
                            <option value="<?php echo $row33435['id'];?>"><?php echo $row33435['Name'];?></option>
                            <?php
                            $as211 = $this->db->get('year_calendar')->result_array();
                            foreach($as211 as $row121):
                                ?>
                                <option value="<?php echo $row121['id'];?>">
                                    <?php echo $row121['Name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>                
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('candidate_name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="CandidateName" value="<?php echo $row['CandidateName'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('mobile_number');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="MobileNumber" value="<?php echo $row['MobileNumber'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Email" value="<?php echo $row['Email'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('amount');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Amount" value="<?php echo $row['Amount'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('particulars');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Particulars" value="<?php echo $row['Particulars'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('Date');?></label>
                    <div class="col-sm-5">
                        <input type="Date" class="form-control" name="DateSale" value="<?php echo $row['DateSale'];?>"/>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_money_receipt');?></button>
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


