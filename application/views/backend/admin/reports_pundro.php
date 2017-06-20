<?php
$temp = '1';
$this->db->where('IsActive',$temp);
$semester = $this->db->get('admission_configuration')->result_array();
foreach($semester as $wee):
endforeach;
$this->db->where('id',$wee['SemesterName']);
$semester12 = $this->db->get('session_pundro')->result_array();
foreach($semester12 as $wee12):
endforeach;
$this->db->where('id',$wee['Year']);
$semester13 = $this->db->get('year_calendar')->result_array();
foreach($semester13 as $wee13):
endforeach;
?>
<h3 class="adm_form_head_setting">
	<?php
	echo "&nbsp;for ".$wee12['SessionName']."&nbsp;".$wee13['Name']." for ".$wee['ProgramName']." Program(s)";
	?>
</h3>
<p class="clearboth">&nbsp;</p>
<div class="row onadf">
	<div class="col-md-12">
		<ul class="nav nav-tabs bordered">

            <li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('reports');?>
                </a>
            </li>
		</ul>
		<div class="tab-content">
            <div class="tab-pane box active onad" id="list">
				<div class="row">
					<div class="col-md-12 shortlist">
						<div class="form-group">
							<div class="col-md-4 tt">
							<?php echo form_open(base_url() . 'index.php?admin/reports_pundro_details' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
								<h4>Admitted Students Status</h4>
								<select name="ProgramName" class="form-control" style="height:30px;">
									<option value=""><?php echo get_phrase('program_name_select');?></option>
									<?php
									$xc = $this->db->get('course_program')->result_array();
									foreach($xc as $rowxc):
										?>
										<option value="<?php echo $rowxc['id'];?>">
											<?php echo $rowxc['course_name'];?>
										</option>
										<?php
									endforeach;
									?>
								</select>
								<input type="hidden" name="SessionName" value="<?php echo $wee['SemesterName']?>"/>
								<input type="hidden" name="Year" value="<?php echo $wee['Year']?>"/>
								<button type="submit" class="btn btn-success"><?php echo get_phrase('filter');?></button>
								</form>
							</div>
							<div class="col-md-4 tt">
							<?php echo form_open(base_url() . 'index.php?admin/reports_pundro_details' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
								<h4>Gender</h4>
								<select name="ProgramName" class="form-control" style="height:30px;">
									<option value="*"><?php echo get_phrase('program_name_select');?></option>
									<?php
									$xc = $this->db->get('course_program')->result_array();
									foreach($xc as $rowxc):
										?>
										<option value="<?php echo $rowxc['id'];?>">
											<?php echo $rowxc['course_name'];?>
										</option>
										<?php
									endforeach;
									?>
								</select>
								<input type="hidden" name="SessionName" value="<?php echo $wee['SemesterName']?>"/>
								<input type="hidden" name="Year" value="<?php echo $wee['Year']?>"/>
								<select name="Gender" class="form-control" style="height:30px;">
									<option value="*"><?php echo get_phrase('select');?></option>
									<?php
									$xc = $this->db->get('gender')->result_array();
									foreach($xc as $rowxc):
										?>
										<option value="<?php echo $rowxc['id'];?>">
											<?php echo $rowxc['Name'];?>
										</option>
										<?php
									endforeach;
									?>
								</select>
								<input type="hidden" name="SessionName" value="<?php echo $wee['SemesterName']?>"/>
								<input type="hidden" name="Year" value="<?php echo $wee['Year']?>"/>
								<button type="submit" class="btn btn-success"><?php echo get_phrase('filter');?></button>
								</form>
							</div>
							<div class="col-md-4 tt">
							<?php echo form_open(base_url() . 'index.php?admin/reports_pundro_details' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
								<h4>District</h4>
								<select name="ProgramName" class="form-control" style="height:30px;">
									<option value="*"><?php echo get_phrase('program_name_select');?></option>
									<?php
									$xc = $this->db->get('course_program')->result_array();
									foreach($xc as $rowxc):
										?>
										<option value="<?php echo $rowxc['id'];?>">
											<?php echo $rowxc['course_name'];?>
										</option>
										<?php
									endforeach;
									?>
								</select>
								<input type="hidden" name="SessionName" value="<?php echo $wee['SemesterName']?>"/>
								<input type="hidden" name="Year" value="<?php echo $wee['Year']?>"/>
								<select name="District" class="form-control" style="height:30px;">
									<option value=""><?php echo get_phrase('select');?></option>
									<?php
									$xc1 = $this->db->get('districts')->result_array();
									foreach($xc1 as $rowxc1):
										?>
										<option value="<?php echo $rowxc1['id'];?>">
											<?php echo $rowxc1['Name'];?>
										</option>
										<?php
									endforeach;
									?>
								</select>
								<input type="hidden" name="SessionName" value="<?php echo $wee['SemesterName']?>"/>
								<input type="hidden" name="Year" value="<?php echo $wee['Year']?>"/>
								<button type="submit" class="btn btn-success"><?php echo get_phrase('filter');?></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-12 shortlist">
						<div class="col-md-7 tt">
							<h4>GPA Selection</h4>
							<div class="box-content">
								<?php echo form_open(base_url() . 'index.php?admin/reports_pundro_details' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
								<div class="padded">
									<input type="hidden" name="SemesterName" value="<?php echo $wee['SemesterName'];?>">
									<input type="hidden" name="Year" value="<?php echo $wee['Year'];?>">
									<div class="form-group">
										<div class="col-md-4">
											<label for="">Program Name</label>
											<select name="ProgramName" class="form-control" style="height:30px;">
												<option value=""><?php echo get_phrase('select');?></option>
												<?php
												$xc = $this->db->get('course_program')->result_array();
												foreach($xc as $rowxc):
													?>
													<option value="<?php echo $rowxc['id'];?>">
														<?php echo $rowxc['course_name'];?>
													</option>
													<?php
												endforeach;
												?>
											</select>
										</div>
										<div class="col-md-4">
											<label for="">From GPA</label>
											<input type="text" name="FromGPA" placeholder="7"/>
										</div>
										<div class="col-md-4">
											<label for="">To GPA</label>
											<input type="text" name="ToGPA" disabled="disabled" placeholder="10"/>
										</div>
										<div class="col-md-4">
											<label for="">No. of Candidates</label>
											<input type="text" name="SeatCount" placeholder="40"/>
										</div>
										<div class="col-md-4">
											<label for="">Admission Mark</label>
											<input type="text" readonly name="AdmMarksObtained" placeholder="40"/>
										</div>
										<div class="col-md-4">
											<button type="submit" class="btn btn-success"><?php echo get_phrase('filter');?></button>
										</div>
									</div>
								</div>
								</form>
							</div>
						</div>
						<div class="col-md-3 tt">
							<h4>Individual Selection</h4>
							<div class="box-content">
								<?php echo form_open(base_url() . 'index.php?admin/filter_selection' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
								<div class="padded">
									<input type="hidden" name="SemesterName" value="<?php echo $wee['SemesterName'];?>">
									<input type="hidden" name="Year" value="<?php echo $wee['Year'];?>">
									<div class="form-group">
										<div class="col-md-12" class="floatright">
											<input type="text" name="AdmissionRollNo" placeholder="Reference No (Mobile No)"/>
										</div>
										<div class="col-md-12" class="floatright">
											<button type="submit" class="btn btn-success"><?php echo get_phrase('filter');?></button>
										</div>
									</div>
								</div>
								</form>
							</div>
						</div>
						<div class="col-md-2 tt">
							<h4>Reports</h4>
							<a class="link btn btn-success" href="<?php echo base_url() . 'index.php?admin/pundro_candidates/listed_candidates/3';?>">
								<?php echo get_phrase('short_list');?>
							</a>
							<a class="link btn btn-success" href="<?php echo base_url() . 'index.php?admin/pundro_candidates/rejected_canddates/4';?>">
								<?php echo get_phrase('reject_list');?>
							</a>
						</div>
					</div>
					</div>
				</div>
		</div>
	</div>
</div>