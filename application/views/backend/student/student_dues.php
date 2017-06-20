<!--password-->
<div class="printback">
<a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button class="btn btn-success" onclick="myFunction()">Print</button>
</div>
<div class="row">
	<div class="col-md-12">

    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">

			<!--<li class="">
            	<a href="#list" data-toggle="tab"><i class="entypo-lock"></i>
					<?php /*echo get_phrase('semester_particulars');*/?>
                    	</a></li>-->
			<li class="active">
				<a href="#paid" data-toggle="tab"><i class="entypo-lock"></i>
					<?php echo get_phrase('running_semester_payment');?>
				</a></li>
		</ul>
    	<!------CONTROL TABS END------>


		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
			<!--<div class="tab-pane box" id="list" style="padding: 5px;float: left;">
                <div class="box-content padded">
					<?php
/*                    foreach($edit_data as $row):
                        */?>
						<div class="col-md-12 partss">
							<div class="col-md-3">
								<h2><u>Semester: <i>1st</i></u></h2>
								<?php
/*								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','1');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','1');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
							<div class="col-md-3">
								<h2><u>Semester: <i>2nd</i></u></h2>
								<?php
/*								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','2');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','2');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
							<div class="col-md-3">
								<h2><u>Semester: <i>3rd</i></u></h2>
								<?php
/*								//echo $row['AdmissionYear'];
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','3');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									//echo $ss['id'];
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','3');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
							<div class="col-md-3">
								<h2><u>Semester: <i>4th</i></u></h2>
								<?php
/*								//echo $row['AdmissionYear'];
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','4');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									//echo $ss['id'];
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','4');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
						</div>
						<div class="col-md-12 partss">
							<div class="col-md-3">
								<h2><u>Semester: <i>5th</i></u></h2>
								<?php
/*								//echo $row['AdmissionYear'];
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','5');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									//echo $ss['id'];
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','5');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
							<div class="col-md-3">
								<h2><u>Semester: <i>6th</i></u></h2>
								<?php
/*								//echo $row['AdmissionYear'];
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','6');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									//echo $ss['id'];
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','6');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
							<div class="col-md-3">
								<h2><u>Semester: <i>7th</i></u></h2>
								<?php
/*								//echo $row['AdmissionYear'];
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','7');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									//echo $ss['id'];
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','7');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
							<div class="col-md-3">
								<h2><u>Semester: <i>8th</i></u></h2>
								<?php
/*								//echo $row['AdmissionYear'];
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','8');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									//echo $ss['id'];
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','8');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
						</div>
						<div class="col-md-12 partss">
							<div class="col-md-3">
								<h2><u>Semester: <i>9th</i></u></h2>
								<?php
/*								//echo $row['AdmissionYear'];
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','9');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									//echo $ss['id'];
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','9');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
							<div class="col-md-3">
								<h2><u>Semester: <i>10th</i></u></h2>
								<?php
/*								//echo $row['AdmissionYear'];
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','10');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									//echo $ss['id'];
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','10');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
							<div class="col-md-3">
								<h2><u>Semester: <i>11th</i></u></h2>
								<?php
/*								//echo $row['AdmissionYear'];
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','11');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									//echo $ss['id'];
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','11');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
							<div class="col-md-3">
								<h2><u>Semester: <i>12th</i></u></h2>
								<?php
/*								//echo $row['AdmissionYear'];
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								//$this->db->where('SessionName',$row['Session']);
								$this->db->where('SemesterName','12');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par as $ss):
									//echo $ss['id'];
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<?php /*echo $ss['Particulars'];*/?>
										</div>
										<div class="col-md-4">
											<?php /*echo $ss['Amount'];*/?>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
								<?php
/*								$this->db->select_sum('Amount');
								$this->db->where('ProgramName',$row['NameofProgram']);
								$this->db->where('BatchName',$row['NameofBatch']);
								$this->db->where('SemesterName','12');
								//$this->db->where('Year',$row['AdmissionYear']);
								$sem_par12 = $this->db->get('semester_particulars')->result_array();
								foreach($sem_par12 as $ss12):
									*/?>
									<div class="form-group">
										<div class="col-md-8">
											<h2>
												<?php /*echo "Total Amount: ";*/?>
											</h2>
										</div>
										<div class="col-md-4">
											<h2>
												<?php /*echo $ss12['Amount'];*/?>
											</h2>
										</div>
									</div>
									<?php
/*								endforeach;
								*/?>
							</div>
						</div>
						<?php
/*                    endforeach;
                    */?>
                </div>
			</div>-->
			<div class="tab-pane box active" id="paid">
				<div class="col-md-12 partss">
					<div class="col-md-3">
						<?php
						$this->db->where('register_number',$this->session->userdata('id'));
						$sem_parz = $this->db->get('std_fee_collection')->result_array();
						foreach($sem_parz as $ssz):
							//echo $ss['id'];
							?>
							<h2><u>Semester: <i><?php echo $ssz['semester_name'];?>st</i></u></h2>
							<div class="form-group">
								<div class="col-md-8">
									<?php
									//$str1 = ltrim($row['particulars1'], ' " ');
									//$str2 = rtrim($row['particulars1'], ' " ');
									//$str3 = $str1.$str2;
									$str = substr($ssz['particulars1'],1,-1);
									$val = explode(',', $str);
									foreach($val as $out) {
										?>
										<?php
										echo $out."<br/>";
									}
									?>
								</div>
								<div class="col-md-4">
									<?php
									$str = substr($ssz['particulars2'],1,-1);
									$val1 = explode(',', $str);
									foreach($val1 as $out1) {
										?>
										<?php
										echo $out1."<br/>";
									}
									?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8">
									<h2>Total Payment</h2>
									<h2>Paid Amount</h2>
									<h2>Remaining Amount</h2>
								</div>
								<div class="col-md-4">
									<h2><?php echo $ssz['actual_amount'];?></h2>
									<h2><?php echo $ssz['paid_amount'];?></h2>
									<h2><?php echo $ssz['remaining_amount'];?></h2>
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