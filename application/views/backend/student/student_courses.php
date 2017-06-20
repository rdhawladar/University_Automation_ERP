<!--password-->
<div class="row">
	<div class="col-md-12">

    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">

			<li class="active">
				<a href="#paid" data-toggle="tab"><i class="entypo-lock"></i>
					<?php echo get_phrase('running_semester');?>
				</a></li>
			<li>
            	<a href="#list" data-toggle="tab"><i class="entypo-lock"></i>
					<?php echo get_phrase('courses_per_semester');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>


		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box" id="list" style="padding: 5px">
                <div class="box-content padded">
					<?php
                    //foreach($edit_data as $row):
                        ?>
						<div class="col-md-12 partss">
							<div class="col-md-4">
								<h2><u>Semester: <i>1st</i></u></h2>
								<div class="">
								<table class="stdtable">
									<tr>
										<td>Course Code</td>
										<td>Course Name</td>
										<td>Credits</td>
										<td>Prerequisites</td>
									</tr>
								</table>
									<?php
									$this->db->where('id', $this->session->userdata('id'));
							        $t1tee12 = $this->db->get('student_pundro')->result_array();
							        foreach($t1tee12 as $r1rr12):
							        endforeach;
							        $this->db->where('ProgramName',$r1rr12['NameofProgram']);
							        $this->db->where('SemesterName',$r1rr12['Session']);
							        $this->db->where('Year',$r1rr12['AdmissionYear']);
							        $this->db->where('BatchName',$r1rr12['NameofBatch']);
							        $this->db->where('Semester','1');
									$sem_par121 = $this->db->get('assign_subjects')->result_array();
									foreach($sem_par121 as $ss121):
										?>
										<div class="form-group">
											<div class="">
												<?php 
												//echo $ss12['Courses'];
												$val121 = explode(',', $ss121['Courses']);
												    foreach($val121 as $out121) {
												    ?>
												    <table class="stdtable">
														<tr>
												    <?php
												    //echo $out12."<br/>";
												    $this->db->where('id', $out121);
												    $sem_par131 = $this->db->get('subjects')->result_array();
													foreach($sem_par131 as $ss131):
														?>
															<td><?php echo $ss131['CourseCode'];?></td>
															<td><?php echo $ss131['CourseName'];?></td>
															<td><?php echo $ss131['Credits'];?></td>
															<td><?php echo $ss131['Prerequisites'];?></td>
													<?php
													endforeach;
													?>
														</tr>
													</table>
												    <?php
												    }
												?>
											</div>
										</div>
										<?php
									endforeach;
									?>
								</div>
							</div>
							<div class="col-md-4">
								<h2><u>Semester: <i>2nd</i></u></h2>
								<div class="">
								<table class="stdtable">
									<tr>
										<th>Course Code</th>
										<th>Course Name</th>
										<th>Credits</th>
										<th>Prerequisites</th>
									</tr>
								</table>
									<?php
									$this->db->where('id', $this->session->userdata('id'));
							        $t1tee124 = $this->db->get('student_pundro')->result_array();
							        foreach($t1tee124 as $r1rr124):
							        endforeach;
							        $this->db->where('ProgramName',$r1rr124['NameofProgram']);
							        //$this->db->where('SemesterName',$r1rr124['Session']);
							        //$this->db->where('Year',$r1rr124['AdmissionYear']);
							        $this->db->where('BatchName',$r1rr124['NameofBatch']);
							        $this->db->where('Semester','2');
									$sem_par1214 = $this->db->get('assign_subjects')->result_array();
									foreach($sem_par1214 as $ss1214):
										?>
										<div class="form-group">
											<div class="">
												<?php 
												//echo $ss12['Courses'];
												$val1214 = explode(',', $ss1214['Courses']);
												    foreach($val1214 as $out1214) {
												    ?>
												    <table class="stdtable">
														<tr>
												    <?php
												    //echo $out12."<br/>";
												    $this->db->where('id', $out1214);
												    $sem_par1314 = $this->db->get('subjects')->result_array();
													foreach($sem_par1314 as $ss1314):
														?>
															<td><?php echo $ss1314['CourseCode'];?></td>
															<td><?php echo $ss1314['CourseName'];?></td>
															<td><?php echo $ss1314['Credits'];?></td>
															<td><?php echo $ss1314['Prerequisites'];?></td>
													<?php
													endforeach;
													?>
														</tr>
													</table>
												    <?php
												    }
												?>
											</div>
										</div>
										<?php
									endforeach;
									?>
								</div>
							</div>
							<div class="col-md-4">
								<h2><u>Semester: <i>3rd</i></u></h2>
								<div class="">
								<table class="stdtable">
									<tr>
										<th>Course Code</th>
										<th>Course Name</th>
										<th>Credits</th>
										<th>Prerequisites</th>
									</tr>
								</table>
									<?php
									$this->db->where('id', $this->session->userdata('id'));
							        $t1tee125 = $this->db->get('student_pundro')->result_array();
							        foreach($t1tee125 as $r1rr125):
							        endforeach;
							        $this->db->where('ProgramName',$r1rr125['NameofProgram']);
							        //$this->db->where('SemesterName',$r1rr124['Session']);
							        //$this->db->where('Year',$r1rr124['AdmissionYear']);
							        $this->db->where('BatchName',$r1rr125['NameofBatch']);
							        $this->db->where('Semester','3');
									$sem_par1215 = $this->db->get('assign_subjects')->result_array();
									foreach($sem_par1215 as $ss1215):
										?>
										<div class="form-group">
											<div class="">
												<?php 
												//echo $ss12['Courses'];
												$val1215 = explode(',', $ss1215['Courses']);
												    foreach($val1215 as $out1215) {
												    ?>
												    <table class="stdtable">
														<tr>
												    <?php
												    //echo $out12."<br/>";
												    $this->db->where('id', $out1215);
												    $sem_par1315 = $this->db->get('subjects')->result_array();
													foreach($sem_par1315 as $ss1315):
														?>
															<td><?php echo $ss1315['CourseCode'];?></td>
															<td><?php echo $ss1315['CourseName'];?></td>
															<td><?php echo $ss1315['Credits'];?></td>
															<td><?php echo $ss1315['Prerequisites'];?></td>
													<?php
													endforeach;
													?>
														</tr>
													</table>
												    <?php
												    }
												?>
											</div>
										</div>
										<?php
									endforeach;
									?>
								</div>
							</div>
						</div>						
						<?php
                    //endforeach;
                    ?>
                </div>
			</div>
			<div class="tab-pane box active" id="paid">
				<div class="col-md-12 partss">
					<div class="col-md-6">
					<h2><u>Semester: <i>1st</i></u></h2>
					<table class="stdtable">
						<tr>
							<th>Course Code</th>
							<th>Course Name</th>
							<th>Credits</th>
							<th>Prerequisites</th>
						</tr>
					</table>
						<?php
						$this->db->where('id', $this->session->userdata('id'));
				        $t1tee12 = $this->db->get('student_pundro')->result_array();
				        foreach($t1tee12 as $r1rr12):
				        endforeach;
				        $this->db->where('ProgramName',$r1rr12['NameofProgram']);
				        $this->db->where('SemesterName',$r1rr12['Session']);
				        $this->db->where('Year',$r1rr12['AdmissionYear']);
				        $this->db->where('BatchName',$r1rr12['NameofBatch']);
				        $this->db->where('Semester','1');
						$sem_par12 = $this->db->get('assign_subjects')->result_array();
						foreach($sem_par12 as $ss12):
							?>
							<div class="form-group">
								<div class="">
									<?php 
									//echo $ss12['Courses'];
									$val12 = explode(',', $ss12['Courses']);
									    foreach($val12 as $out12) {
									    ?>
									    <table class="stdtable">
											<tr>
									    <?php
									    //echo $out12."<br/>";
									    $this->db->where('id', $out12);
									    $sem_par13 = $this->db->get('subjects')->result_array();
										foreach($sem_par13 as $ss13):
											?>
												<td><?php echo $ss13['CourseCode'];?></td>
												<td><?php echo $ss13['CourseName'];?></td>
												<td><?php echo $ss13['Credits'];?></td>
												<td><?php echo $ss13['Prerequisites'];?></td>
										<?php
										endforeach;
										?>
											</tr>
										</table>
									    <?php
									    }
									?>
								</div>
							</div>
							<?php
						endforeach;
						?>
					</div>
				</div>
			</div>
            <!----EDITING FORM ENDS-->

		</div>
	</div>
</div>