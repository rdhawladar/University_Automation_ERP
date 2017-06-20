<div class="row onadf">
	<div class="col-md-12">
		<ul class="nav nav-tabs bordered">
        	<li class="active">
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_applicant');?>
                </a>
            </li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active box onad" id="add">
             <br />
                <div class="box-content" id="printarea">
                	<?php echo form_open(base_url() . 'index.php?admin/online_admission/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'onsubmit'=>'return validateForm()', 'target'=>'_top','enctype'=>'multipart/form-data', 'name' => 'myForm'));?>
					<div class="form-style-10 form-style-preview">
						<h1>Admission Form</h1>
							<div class="section"><span>1</span>Section 1 Applicant details:</div>
							<div class="inner-wrap">
								<table class="tabl"><tr>
										<td rowspan="3"><div class="inner-wrap">
												<?php
												//echo $_FILES['PhotoApplicant']['name'];
												//echo "here";
												//echo $_SESSION['class_id'];
												//echo $_SESSION['photoApplicant'];
												?>
												<img name="" id="" src="<?php echo base_url()?>/uploads/student_image/<?php echo $_FILES['PhotoApplicant']['name'];?>" alt="photoApplicanttemp" width="50" height="50" />
												<label>Photo<input type="text" name="PhotoApplicant" id="photoApplicant" value="<?php echo $_FILES['PhotoApplicant']['name']; ?>"/></label></div></td>
<td>
	<div class="form-group">
											<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('reference_number');?></label><br/>

											<div class="col-sm-12">
												<select name="class_id" class="form-control" data-validate="required" id="class_id"
														data-message-required="<?php echo get_phrase('value_required');?>"
														onchange="return get_class_sectionsa(this.value)">
													<?php
													$this->db->where('id', $this->input->post('class_id'));
													$aaa = $this->db->get('money_receipt')->result_array();
													foreach($aaa as $row):
														?>
														<option value="<?php echo $row['id'];?>">
															<?php echo $row['MobileNumber'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
												<?php
/*												$this->db->where('id', $this->input->post('class_id'));
												$aaa = $this->db->get('money_receipt')->result_array();
												foreach($aaa as $row):
												*/?><!--
													--><?php
/*												endforeach;
												*/?>
												<!--<input name="class_id" class="form-control" type="text" value="<?php /*echo $row['MobileNumber'];*/?>">
-->											</div>
											<div class="col-sm-12">
												<select name="CandidateDetails" class="form-control" id="section_selector_holder">
													<?php
													$this->db->where('id', $this->input->post('CandidateDetails'));
													$aav = $this->db->get('money_receipt')->result_array();
													foreach($aav as $row):
														?>
														<option value="<?php echo $row['id'];?>">
															<?php echo $row['CandidateName']." - ".$row['MobileNumber']." - ".$row['Email'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
												<?php
/*												$this->db->where('id', $this->input->post('CandidateDetails'));
												$aav = $this->db->get('money_receipt')->result_array();
												foreach($aav as $row):
												endforeach;
												*/?>
												<!--<input name="CandidateDetails" class="form-control" type="text" value="<?php /*echo $row['CandidateName']." - ".$row['MobileNumber']." - ".$row['Email'];*/?>">-->
											</div>
										</div>
</td>
										</tr>
									</table></td></tr>
							</div>

							<div class="inner-wrap"><table>
									<tr>
										<td><label>Date of Birth(mm-dd-yy): <input type="text" required class="datepicker" name="ApplicantBirthDate" id="ApplicantBirthDate" value="<?php echo $this->input->post('ApplicantBirthDate'); ?>"/></label></td>
										<td><label>Nationality
												<select name="ApplicantNationality" id="ApplicantNationality" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('ApplicantNationality'));
													$cc = $this->db->get('nationality')->result_array();
													foreach($cc as $ww112):
														?>
														<option value="<?php echo $ww112['id'];?>">
															<?php
															echo $ww112['CountryName']." (".$ww112['Nationality'].")";?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label>
										</td>
										<td><label>Gender &nbsp;&nbsp;
												<select name="ApplicantGender" id="ApplicantGender" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('ApplicantGender'));
													$gen1 = $this->db->get('gender')->result_array();
													foreach($gen1 as $ge):
														?>
														<option value="<?php echo $ge['id'];?>">
															<?php
															echo $ge['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label>
										</td>
									</tr>
									<tr>
										<td><label>Blood Group
												<select name="BloodGroup" id="BloodGroup" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('BloodGroup'));
													$gen1a = $this->db->get('blood_group')->result_array();
													foreach($gen1a as $ge):
														?>
														<option value="<?php echo $ge['id'];?>">
															<?php
															echo $ge['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Father's Name <input required type="text" name="ApplicantFatherName" id="ApplicantFatherName" value="<?php echo $this->input->post('ApplicantFatherName'); ?>"/></label></td>
										<td><label>Mother's Name <input required type="text" name="ApplicantMotherName" id="ApplicantMotherName" value="<?php echo $this->input->post('ApplicantMotherName'); ?>"/></label></td>
									</tr>
								</table></div>
							<div class="inner-wrap"><h3>Present Address</h3><table>
									<tr>
										<td><label>House No <input type="text" name="PresentHouse" id = "PresentHouse" value="<?php echo $this->input->post('PresentHouse'); ?>"/></label></td>
										<td><label>Post Office <input type="text" name="PresentPostOffice" id="PresentPostOffice" value="<?php echo $this->input->post('PresentPostOffice'); ?>"/></label></td>
										<td><label>Village <input type="text" name="PresentVillage" id = "PresentVillage" value="<?php echo $this->input->post('PresentVillage'); ?>"/></label></td>
									</tr>
									<tr>

										<td><label>Fax No <input type="text" name="PresentFaxNo" value="<?php echo $this->input->post('PresentFaxNo'); ?>"/></label></td>
										<td><label>Pollice Station <input type="text" name="PresentPoliceStation" id="PresentPoliceStation" value="<?php echo $this->input->post('PresentPoliceStation'); ?>"/></label></td>
										<td><label>District
										<select name="PresentDistrict" id="PresentDistrict" class="form-control">
											<?php
											$this->db->where('id', $this->input->post('PresentDistrict'));
											$ccaq = $this->db->get('districts')->result_array();
											foreach($ccaq as $wzw112):
												?>
												<option value="<?php echo $wzw112['id'];?>">
													<?php
													echo $wzw112['Name'];?>
												</option>
												<?php
											endforeach;
											?>
										</select>
												<?php
/*												$this->db->where('id', $this->input->post('PresentDistrict'));
												$ccaq = $this->db->get('districts')->result_array();
												foreach($ccaq as $wzw112):
													*/?><!--
													--><?php
/*												endforeach;
												*/?>
												<!--<input type="text" name="PresentDistrict" value="<?php /*echo $wzw112['Name']; */?>"/>-->
										</label></td>
									</tr>
								</table></div>

							<div class="inner-wrap"><h3>Permanent Address (it differ from above)</h3>
								<table>
									<tr>
										<td><label>House No <input type="text" name="PermanentHouse" value="<?php echo $this->input->post('PermanentHouse'); ?>"/></label></td>
										<td><label>Phone No <input type="number" name="PermanentPhone" value="<?php echo $this->input->post('PermanentPhone'); ?>"/></label></td>
										<td><label>District
										<select name="PermanentDistrict" id="PermanentDistrict" class="form-control">
											<?php
											$this->db->where('id', $this->input->post('PermanentDistrict'));
											$ccz = $this->db->get('districts')->result_array();
											foreach($ccz as $wzw112):
												?>
												<option value="<?php echo $wzw112['id'];?>">
													<?php
													echo $wzw112['Name'];?>
												</option>
												<?php
											endforeach;
											?>
										</select>
												<?php
/*												$this->db->where('id', $this->input->post('PermanentDistrict'));
												$ccz = $this->db->get('districts')->result_array();
												foreach($ccz as $wzw112):
													*/?><!--
													<?php
/*												endforeach;
												*/?>
												<input type="text" name="PermanentDistrict" value="<?php /*echo $wzw112['Name']; */?>"/>-->
										</label></td>
									</tr>
									<tr>
										<td><label>Village <input type="text" name="PermanentVillage" value="<?php echo $this->input->post('PermanentVillage'); ?>"/></label></td>
										<td><label>Mobile No <input type="number" name="PermanentMobile" value="<?php echo $this->input->post('PermanentMobile'); ?>"/></label></td>
										<td><label>Pollice Station <input type="text" name="PermanentPoliceStation" value="<?php echo $this->input->post('PermanentPoliceStation'); ?>"/></label></td>
									</tr>
									<tr>
										<td><label>Post Office <input type="text" name="PermanentPostOffice" value="<?php echo $this->input->post('PermanentPostOffice'); ?>"/></label></td>
										<td><label>Fax No <input type="text" name="PermanentFaxNo" value="<?php echo $this->input->post('PermanentFaxNo'); ?>"/></label></td>
										<td><label>E-mail <input type="email" name="PermanentEmail" value="<?php echo $this->input->post('PermanentEmail'); ?>"/></label></td>
									</tr>
								</table>
							</div>

							<div class="section"><span>3</span>Academic Qualifications:(From upper to lower Degree):</div>
							<div class="inner-wrap acdqual">
								<table>
									<tr><td><label>Certificate/Degree
												<select name="CertificateName1" required id="CertificateName1" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('CertificateName1'));
													$dd1 = $this->db->get('certificate_name')->result_array();
													foreach($dd1 as $wr12):
														?>
														<option value="<?php echo $wr12['id'];?>">
															<?php echo $wr12['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Group/Discipline
												<select name="CertificateGroup1" required id="CertificateGroup1" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('CertificateGroup1'));
													$dd1 = $this->db->get('certificate_group')->result_array();
													foreach($dd1 as $wr12):
														?>
														<option value="<?php echo $wr12['id'];?>">
															<?php echo $wr12['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Year of Passing
												<select name="CertificateYear1" required id="CertificateYear1" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('CertificateYear1'));
													$m = $this->db->get('year_calendar')->result_array();
													foreach($m as $rw112):
														?>
														<option value="<?php echo $rw112['id'];?>">
															<?php echo $rw112['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Institute <input type="text" required name="CertificateNameofInstitute1" id="CertificateNameofInstitute1" value="<?php echo $this->input->post('CertificateNameofInstitute1'); ?>"/></label></td>
										<td><label>Board
												<select required name="CertificatePointsObtained1" id="CertificatePointsObtained1" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('CertificatePointsObtained1'));
													$ddas = $this->db->get('education_board')->result_array();
													foreach($ddas as $r12as):
														?>
														<option value="<?php echo $r12as['id'];?>">
															<?php echo $r12as['board_name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>GPA <input type="text" required name="CertificateCGPA1" id="CertificateCGPA1" value="<?php echo $this->input->post('CertificateCGPA1'); ?>"/></label></td>
										<td colspan="3">
											<!--<label>Photo<input type="text" name="PhotoApplicant" id="photoApplicant" value="<?php /*echo $_FILES['PhotoApplicant']['name']; */?>"/></label>-->
											<label>Add Certificate
												<img name="" id="" src="<?php echo base_url()?>/uploads/student_image/<?php echo $_FILES['CertificateDocumentscert1']['name'];?>" alt="CertificateDocumentscert1" width="50" height="50" />
												<input type="text" name="CertificateDocumentscert1" id="CertificateDocumentscert1" value="<?php echo $_FILES['CertificateDocumentscert1']['name']; ?>"/></label></td>
										<td colspan="3">
											<!--<label>Photo<input type="text" name="PhotoApplicant" id="photoApplicant" value="<?php /*echo $_FILES['CertificateDocumentsmark1']['name']; */?>"/></label>-->
											<label>Add Marksheet
												<img name="" id="" src="<?php echo base_url()?>/uploads/student_image/<?php echo $_FILES['CertificateDocumentsmark1']['name'];?>" alt="CertificateDocumentsmark1" width="50" height="50" />
												<input type="text" name="CertificateDocumentsmark1" id="CertificateDocumentsmark1" value="<?php echo $_FILES['CertificateDocumentsmark1']['name']; ?>"/></label></td>
									</tr>
								</table>
							</div>
							<div class="inner-wrap acdqual">
								<table>
									<tr><td><label>Certificate/Degree
												<select name="CertificateName2" required id="CertificateName2" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('CertificateName2'));
													$dd1 = $this->db->get('certificate_name')->result_array();
													foreach($dd1 as $wr12):
														?>
														<option value="<?php echo $wr12['id'];?>">
															<?php echo $wr12['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Group/Discipline
												<select name="CertificateGroup2" required id="CertificateGroup2" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('CertificateGroup2'));
													$dd1 = $this->db->get('certificate_group')->result_array();
													foreach($dd1 as $wr12):
														?>
														<option value="<?php echo $wr12['id'];?>">
															<?php echo $wr12['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Year of Passing
												<select name="CertificateYear2" required id="CertificateYear2" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('CertificateYear2'));
													$m = $this->db->get('year_calendar')->result_array();
													foreach($m as $rw112):
														?>
														<option value="<?php echo $rw112['id'];?>">
															<?php echo $rw112['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Institute <input type="text" required name="CertificateNameofInstitute2" id="CertificateNameofInstitute2" value="<?php echo $this->input->post('CertificateNameofInstitute2')?>"/></label></td>
										<td><label>Board
												<select required name="CertificatePointsObtained2" id="CertificatePointsObtained2" class="form-control">
													<?php
													$this->db->where('id', $this->input->post('CertificatePointsObtained2'));
													$ddas = $this->db->get('education_board')->result_array();
													foreach($ddas as $r12as):
														?>
														<option value="<?php echo $r12as['id'];?>">
															<?php echo $r12as['board_name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>GPA <input type="text" required name="CertificateCGPA2" id="CertificateCGPA2" value="<?php echo $this->input->post('CertificateCGPA2'); ?>"/></label></td>
										<td colspan="3">
											<!--<label>Photo<input type="text" name="PhotoApplicant" id="photoApplicant" value="<?php /*echo $_FILES['PhotoApplicant']['name']; */?>"/></label>-->
											<label>Add Certificate
												<img name="" id="" src="<?php echo base_url()?>/uploads/student_image/<?php echo $_FILES['CertificateDocumentscert2']['name'];?>" alt="CertificateDocumentscert2" width="50" height="50" />
												<input type="text" name="CertificateDocumentscert2" id="CertificateDocumentscert2" value="<?php echo $_FILES['CertificateDocumentscert2']['name']; ?>"/></label></td>
										<td colspan="3">
											<!--<label>Photo<input type="text" name="PhotoApplicant" id="photoApplicant" value="<?php /*echo $_FILES['PhotoApplicant']['name']; */?>"/></label>-->
											<label>Add Marksheet
												<img name="" id="" src="<?php echo base_url()?>/uploads/student_image/<?php echo $_FILES['CertificateDocumentsmark2']['name'];?>" alt="CertificateDocumentsmark2" width="50" height="50" />
												<input type="text" name="CertificateDocumentsmark2" id="CertificateDocumentsmark2" value="<?php echo $_FILES['CertificateDocumentsmark2']['name']; ?>"/></label></td>
										</tr>
								</table>
							</div>
							<div class="section"><span>5</span>Names and address of two references:</div>
							<div class="inner-wrap">
								<table>
									<tr>
										<td>
											<table>
												<tr><td><label>Name<input required type="text" name="ReferenceName1" id="ReferenceName1" value="<?php echo $this->input->post('ReferenceName1'); ?>"/></label></td>
												</tr>
												<tr>
													<td><label>Address <textarea required type="text" name="ReferenceAddress1" id="ReferenceAddress1" value="<?php echo $this->input->post('ReferenceAddress1'); ?>"><?php echo $this->input->post('ReferenceAddress1'); ?></textarea></label></td>
												</tr>
												<tr><td><label>Phone No<input required type="number" name="ReferencePhone1" value="<?php echo $this->input->post('ReferencePhone1'); ?>"/></label></td>
												</tr>
												<tr>
													<td><label>Mobile No<input required type="number" name="ReferenceMobile1" id="ReferenceMobile1" value="<?php echo $this->input->post('ReferenceMobile1'); ?>"/></label></td>
												</tr>
												<tr>
													<td><label>E-mail<input required type="email" name="ReferenceEmail1" id="ReferenceEmail1" value="<?php echo $this->input->post('ReferenceEmail1'); ?>"/></label></td>
												</tr>
											</table>
										</td>
										<td>
											<table>
												<tr>
													<td ><label>Name<input type="text" name="ReferenceName2" value="<?php echo $this->input->post('ReferenceName2'); ?>"/></label></td>
												</tr>
												<tr><td ><label>Address <textarea type="text" name=""><?php echo $this->input->post('ReferenceAddress2'); ?></textarea></label></td>
												</tr>
												<tr><td><label>Phone No<input type="number" name="ReferencePhone2" value="<?php echo $this->input->post('ReferencePhone2'); ?>"/></label></td></tr>
												<tr><td><label>Mobile No<input type="number" name="ReferenceMobile2" value="<?php echo $this->input->post('ReferenceMobile2'); ?>"/></label></td></tr>
												<tr><td><label>E-mail<input type="email" name="ReferenceEmail2" value="<?php echo $this->input->post('ReferenceEmail2'); ?>"/></label></td></tr>
											</table>
										</td>
									</tr>
								</table>
							</div>
						<div class="inner-wrap specialcase"><table>
								<tr>
									<td><label>Son of Martyrs: </label>
											<input required type="text" name="SonofMartyrs" id="SonofMartyrs" value="<?php echo $this->input->post('SonofMartyrs'); ?>"/>
										</td>
									<td><label>
											Upojati: </label>
											<input required type="text" name="Upojati" id="Upojati" value="<?php echo $this->input->post('Upojati'); ?>"/>
										</td>
									<td><label>Extreame Polical Involve: </label>
										<input required type="text" name="PoliticalInvolve" id="PoliticalInvolve" value="<?php echo $this->input->post('PoliticalInvolve'); ?>"/>
									</td>
								</tr>
							</table></div>
						<div class="section"><span>5</span>Other Documents:</div>
						<div class="inner-wrap">
							<table>
								<tr>
									<td colspan="2" class="otherdocs">
										<span><label for="">Other Documents</label></span>
										<div>
											<!--<label>Photo<input type="text" name="PhotoApplicant" id="photoApplicant" value="<?php /*echo $_FILES['PhotoApplicant']['name']; */?>"/></label>-->
											<label>National ID Card
												<img name="" id="" src="<?php echo base_url()?>/uploads/student_image/<?php echo $_FILES['NationalIDApplicant']['name'];?>" alt="NationalIDApplicant" width="50" height="50" />
											<input type="text" name="NationalIDApplicant" value="<?php echo $_FILES['NationalIDApplicant']['name']; ?>"/>
											</label>
										</div>
										<div>
											<!--<label>Photo<input type="text" name="PhotoApplicant" id="photoApplicant" value="<?php /*echo $_FILES['PhotoApplicant']['name']; */?>"/></label>-->
											<label>Passport
												<img name="" id="" src="<?php echo base_url()?>/uploads/student_image/<?php echo $_FILES['PassportApplicant']['name'];?>" alt="PassportApplicant" width="50" height="50" />
											<input type="text" name="PassportApplicant" value="<?php echo $_FILES['PassportApplicant']['name']; ?>"/>
											</label>
										</div>
										<div>
											<!--<label>Photo<input type="text" name="PhotoApplicant" id="photoApplicant" value="<?php /*echo $_FILES['PhotoApplicant']['name']; */?>"/></label>-->
											<label>Driving Licence
												<img name="" id="" src="<?php echo base_url()?>/uploads/student_image/<?php echo $_FILES['DrivingLicenceApplicant']['name'];?>" alt="DrivingLicenceApplicant" width="50" height="50" />
												<input type="text" name="DrivingLicenceApplicant" value="<?php echo $_FILES['DrivingLicenceApplicant']['name']; ?>"/>
											</label>
										</div>
									</td>
								</tr>
							</table>
						</div>
							<div class="section"><span>6</span>Declaration:</div>
							<div class="inner-wrap">
								<div class="declaration">
									<span>I hereby accept that, I will be bound by the rules, regulations and student code of conduct of Pundro University of Science & Technology.</br>I hereby certify that the above statements are correct and complete to the best of my knowledge. I am aware that withholding requested in this application or giving false information will me ineligible for admission into PUST and will render me liable for dismissal, if admitted.</span>
									<br/><br/><span class="privacy-policy">
				   <input type="checkbox" name="terms12" value="check" id="terms12">You agree to our Terms and Policy.
			    </span>
								</div>
								</br></br>
								<table>
									<tr>
										<td >
											<!--<label>Photo<input type="text" name="PhotoApplicant" id="photoApplicant" value="<?php /*echo $_FILES['PhotoApplicant']['name']; */?>"/></label>-->
											<label>Signature of Applicant:
												<img name="" id="" src="<?php echo base_url()?>/uploads/student_image/<?php echo $_FILES['SignatureApplicant']['name'];?>" alt="SignatureApplicant" width="50" height="50" />
												<input type="text" name="SignatureApplicant" value="<?php echo $_FILES['SignatureApplicant']['name']; ?>"/>
											</label></td>
									</tr>
								</table>
							</div>
					</div>
					<div class="form-group test32">
						  <div class="col-sm-offset-3 col-sm-8">
							  <!--<input type="button" value="Print Preview" class="btn" onclick="PrintPreview()"/>
							  &nbsp;&nbsp;
							  <input type="button" value="Print" class="btn" onclick="PrintDoc()"/>
							  &nbsp;&nbsp;-->
							  <a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;
							  <button type="submit" class="btn btn-success"><?php echo get_phrase('submit');?></button>
							  &nbsp;&nbsp;
							  <!--<button id="printbutton" onclick="window.print();">PRINT</button>-->
							  <input type="button" value="Print" class="btn" onclick="window.print();"/>
						  </div>
					</div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>
<script>
	function PrintPreview() {
		var toPrint = document.getElementById('printarea');
		var popupWin = window.open('', '_blank', 'width=1000,height=600,location=no,left=100px');
		popupWin.document.open();
		popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/print/Print21.css" media="screen"/><link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css" media="screen"/></head><body">')
		popupWin.document.write(toPrint.innerHTML);
		popupWin.document.write('</html>');
		popupWin.document.close();
	}
</script>