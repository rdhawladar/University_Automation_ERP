<div class="row">
	<div class="col-md-12">
         <?php

		$today = date('Y-m-d');
		$data = $this->db->get_where('acd_session' , array('is_open' => 1, 'strt_dt <= ' => $today,'end_dt >= ' => $today))->result_array();
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic Session - ".$data[0]['name'];
		   ?>
    <p>&nbsp;</p>
		<ul class="nav nav-tabs bordered">

            <li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('student_application_list');?>
                </a>
            </li>
        	<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_student');?>
                </a>
            </li>
		</ul>
		<div class="tab-content">
            <div class="tab-pane box active onad" id="list">
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
							<th><div><?php echo get_phrase('Photo');?></div></th>
                    		<th><div><?php echo get_phrase('session');?></div></th>
                    		<th><div><?php echo get_phrase('admission_form_serial_number');?></div></th>
                    		<th><div><?php echo get_phrase('admission_roll_no');?></div></th>
                    		<th><div><?php echo get_phrase('admission_year');?></div></th>
                    		<th><div><?php echo get_phrase('name_of_program');?></div></th>
                    		<th><div><?php echo get_phrase('class_roll_no');?></div></th>
                    		<th><div><?php echo get_phrase('registratio_no');?></div></th>
                    		<th><div><?php echo get_phrase('name_of_applicant');?></div></th>
                    		<th><div><?php echo get_phrase('birth_date');?></div></th>
                    		<th><div><?php echo get_phrase('father_name');?></div></th>
                    		<th><div><?php echo get_phrase('mother_name');?></div></th>
                    		<th><div><?php echo get_phrase('nationality');?></div></th>
                    		<th><div><?php echo get_phrase('gender');?></div></th>
                    		<th><div><?php echo get_phrase('present_address');?></div></th>
                    		<th><div><?php echo get_phrase('permanent_address');?></div></th>
                    		<th><div><?php echo get_phrase('certificate/degree_1');?></div></th>
                    		<th><div><?php echo get_phrase('certificate/degree_2');?></div></th>
                    		<th><div><?php echo get_phrase('total_CGPA');?></div></th>
                    		<th><div><?php echo get_phrase('employment_history1');?></div></th>
                    		<th><div><?php echo get_phrase('employment_history2');?></div></th>
                    		<th><div><?php echo get_phrase('Reference1');?></div></th>
                    		<th><div><?php echo get_phrase('Reference2');?></div></th>
                    		<th><div><?php echo get_phrase('other_documents');?></div></th>
                    		<th><div><?php echo get_phrase('ApplicationDate');?></div></th>
                    		<th><div><?php echo get_phrase('Actions');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    <?php

                    ?>
                    	<?php $count = 1;foreach($osadStudent as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td class="modlapopup">
								<a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="73" height="73" /></a>
							</td>
							<td>
								<?php //echo $row['Session'];?>
								<?php
								$this->db->where('id', $row['Session']);
								$ds = $this->db->get('session_pundro')->result_array();
								foreach($ds as $ede):
									echo $ede['SessionName']." (".$ede['SemesterDuration'].")";
								endforeach;
								?>
							</td>
							<td><?php echo $row['AdmFormSerialNo'];?></td>
							<td><?php echo $row['AdmissionRollNo'];?></td>
							<td>
								<?php
								$this->db->where('id', $row['AdmissionYear']);
								$dzs = $this->db->get('year_calendar')->result_array();
								foreach($dzs as $eze):
									echo $eze['Name'];
								endforeach;
								?>
							</td>
							<td>
								<?php
								$this->db->where('id', $row['NameofProgram']);
								//echo $row['NameofProgram'];
								$course_program = $this->db->get('course_program')->result_array();
								foreach($course_program as $ee):
									echo $ee['course_name'];
									endforeach;
								?>
							</td>
							<td><?php echo $row['ClassRollNo'];?></td>
							<td><?php echo $row['RegistratioNo'];?></td>
							<td><?php echo $row['NameofApplicant'];?></td>
							<td><?php echo $row['ApplicantBirthDate'];?></td>
							<td><?php echo $row['ApplicantFatherName'];?></td>
							<td><?php echo $row['ApplicantMotherName'];?></td>
							<td>
								<?php
								$this->db->where('id', $row['ApplicantNationality']);
								$qw = $this->db->get('nationality')->result_array();
								foreach($qw as $qe):
									echo $qe['CountryName']." (".$qe['Nationality'].")";
								endforeach;
								?>
							</td>
							<td>
								<?php
								$this->db->where('id', $row['ApplicantGender']);
								$gen = $this->db->get('gender')->result_array();
								foreach($gen as $ge):
									echo $ge['Name'];
								endforeach;
								?>
							</td>
							<td>
								<?php echo "House: ".$row['PresentHouse'];?>
								<?php echo "<br/>";?>
								<?php echo "Phone: ".$row['PresentPhone'];?>
								<?php echo "<br/>";?>
								<?php echo "Village: ".$row['PresentVillage'];?>
								<?php echo "<br/>";?>
								<?php echo "Mobile: ".$row['PresentMobile'];?>
								<?php echo "<br/>";?>
								<?php echo "Post Office: ".$row['PresentPostOffice'];?>
								<?php echo "<br/>";?>
								<?php echo "Fax No.: ".$row['PresentFaxNo'];?>
								<?php echo "<br/>";?>
								<?php echo "Police Station: ".$row['PresentPoliceStation'];?>
								<?php echo "<br/>";?>
								<?php echo "Email: ".$row['PresentEmail'];?>
								<?php echo "<br/>";?>
								<?php echo "District: ".$row['PresentDistrict'];?>
							</td>
							<td>
								<?php echo "House: ".$row['PermanentHouse'];?>
								<?php echo "<br/>";?>
								<?php echo "Phone: ".$row['PermanentPhone'];?>
								<?php echo "<br/>";?>
								<?php echo "Village: ".$row['PermanentVillage'];?>
								<?php echo "<br/>";?>
								<?php echo "Mobile: ".$row['PermanentMobile'];?>
								<?php echo "<br/>";?>
								<?php echo "Post Office: ".$row['PermanentPostOffice'];?>
								<?php echo "<br/>";?>
								<?php echo "Fax No.: ".$row['PermanentFaxNo'];?>
								<?php echo "<br/>";?>
								<?php echo "Police Station: ".$row['PermanentPoliceStation'];?>
								<?php echo "<br/>";?>
								<?php echo "Email: ".$row['PermanentEmail'];?>
								<?php echo "<br/>";?>
								<?php echo "District: ".$row['PermanentDistrict'];?>
							</td>
							<td>
								<h4><u>Certificate1:</u></h4>
								<?php echo "Certificate/Degree: ";?>
								<?php
								$this->db->where('id', $row['CertificateName1']);
								$ds1 = $this->db->get('certificate_name')->result_array();
								foreach($ds1 as $ede1):
									echo $ede1['Name'];
								endforeach;
								?>
								<?php echo "<br/>";?>
								<?php echo "Group/Discipline: ";?>
								<?php
								$this->db->where('id', $row['CertificateGroup1']);
								$ds2 = $this->db->get('certificate_group')->result_array();
								foreach($ds2 as $ede2):
									echo $ede2['Name'];
								endforeach;
								?>
								<?php echo "<br/>";?>
								<?php echo "Passing Year: ";?>
								<?php
								$this->db->where('id', $row['CertificateYear1']);
								$ds2 = $this->db->get('year_calendar')->result_array();
								foreach($ds2 as $ede2):
									echo $ede2['Name'];
								endforeach;
								?>
								<?php echo "<br/>";?>
								<?php echo "Name of Institute: ".$row['CertificateNameofInstitute1'];?>
								<?php echo "<br/>";?>
								<?php echo "CGPA: ".$row['CertificateCGPA1'];?>
								<?php echo "<br/>";?>
								<?php echo "Points Obtained: ".$row['CertificatePointsObtained1'];?>
								<?php echo "<br/>";?>
								<?php echo "Certificate";?>
								<a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentscert1]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentscert1]; ?>" width="30" height="30" /></a>
								<?php echo "<br/>";?>
								<?php echo "Mark Sheet";?>
								<a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark1]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark1]; ?>" width="30" height="30" /></a>
							</td>
							<td>
								<h4><u>Certificate1:</u></h4>
								<?php echo "Certificate/Degree: ";?>
								<?php
								$this->db->where('id', $row['CertificateName2']);
								$ds1 = $this->db->get('certificate_name')->result_array();
								foreach($ds1 as $ede1):
									echo $ede1['Name'];
								endforeach;
								?>
								<?php echo "<br/>";?>
								<?php echo "Group/Discipline: ";?>
								<?php
								$this->db->where('id', $row['CertificateGroup2']);
								$ds2 = $this->db->get('certificate_group')->result_array();
								foreach($ds2 as $ede2):
									echo $ede2['Name'];
								endforeach;
								?>
								<?php echo "<br/>";?>
								<?php echo "Passing Year: ";?>
								<?php
								$this->db->where('id', $row['CertificateYear2']);
								$ds2 = $this->db->get('year_calendar')->result_array();
								foreach($ds2 as $ede2):
									echo $ede2['Name'];
								endforeach;
								?>
								<?php echo "<br/>";?>
								<?php echo "Name of Institute: ".$row['CertificateNameofInstitute2'];?>
								<?php echo "<br/>";?>
								<?php echo "CGPA: ".$row['CertificateCGPA2'];?>
								<?php echo "<br/>";?>
								<?php echo "Points Obtained: ".$row['CertificatePointsObtained2'];?>
								<?php echo "<br/>";?>
								<?php echo "Certificate";?>
								<a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentscert2]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentscert2]; ?>" width="30" height="30" /></a>
								<?php echo "<br/>";?>
								<?php echo "Mark Sheet";?>
								<a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark2]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark2]; ?>" width="30" height="30" /></a>
							</td>
							<td>
								<h4><u>Total CGPA:</u></h4>
								<?php echo $row['CertificateCGPA1'] + $row['CertificateCGPA2'];?>
							</td>
                            <td>
								<?php echo "Organization: ".$row['EmploymentNameofOrganizations1'];?>
								<?php echo "<br/>";?>
								<?php echo "From Date: ".$row['EmploymentFromDate1'];?>
								<?php echo "<br/>";?>
								<?php echo "To Date: ".$row['EmploymentToDate1'];?>
								<?php echo "<br/>";?>
								<?php echo "Position: ".$row['EmploymentPositionHeld1'];?>
								<?php echo "<br/>";?>
								Documents: <a target="_blank" href="<?php echo "uploads/student_image/".$row[EmploymentDocuments1]; ?>"><img src="<?php echo "uploads/student_image/".$row[EmploymentDocuments1]; ?>" width="30" height="30" /></a>
							</td>
							<td>
								<?php echo "Organization: ".$row['EmploymentNameofOrganizations2'];?>
								<?php echo "<br/>";?>
								<?php echo "From Date: ".$row['EmploymentFromDate2'];?>
								<?php echo "<br/>";?>
								<?php echo "To Date: ".$row['EmploymentToDate2'];?>
								<?php echo "<br/>";?>
								<?php echo "Position: ".$row['EmploymentPositionHeld2'];?>
								<?php echo "<br/>";?>
								Documents: <a target="_blank" href="<?php echo "uploads/student_image/".$row[EmploymentDocuments2]; ?>"><img src="<?php echo "uploads/student_image/".$row[EmploymentDocuments2]; ?>" width="30" height="30" /></a>
							</td>
                            <td>
								<?php echo "Name: ".$row['ReferenceName1'];?>
								<?php echo "<br/>";?>
								<?php echo "Address: ".$row['ReferenceAddress1'];?>
								<?php echo "<br/>";?>
								<?php echo "Phone: ".$row['ReferencePhone1'];?>
								<?php echo "<br/>";?>
								<?php echo "Mobile: ".$row['ReferenceMobile1'];?>
								<?php echo "<br/>";?>
								<?php echo "Email: ".$row['ReferenceEmail1'];?>
							</td>
                            <td>
								<?php echo "Name: ".$row['ReferenceName2'];?>
								<?php echo "<br/>";?>
								<?php echo "Address: ".$row['ReferenceAddress2'];?>
								<?php echo "<br/>";?>
								<?php echo "Phone: ".$row['ReferencePhone2'];?>
								<?php echo "<br/>";?>
								<?php echo "Mobile: ".$row['ReferenceMobile2'];?>
								<?php echo "<br/>";?>
								<?php echo "Email: ".$row['ReferenceEmail2'];?>
							</td>
							<td>
								Signature: <a target="_blank" href="<?php echo "uploads/student_image/".$row[SignatureApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[SignatureApplicant]; ?>" width="30" height="30" /></a>
								NID: <a target="_blank" href="<?php echo "uploads/student_image/".$row[NationalIDApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[NationalIDApplicant]; ?>" width="30" height="30" /></a>
								Passport: <a target="_blank" href="<?php echo "uploads/student_image/".$row[PassportApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PassportApplicant]; ?>" width="30" height="30" /></a>
								Driving Li.: <a target="_blank" href="<?php echo "uploads/student_image/".$row[DrivingLicenceApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[DrivingLicenceApplicant]; ?>" width="30" height="30" /></a>
							</td>
                            <td><?php echo $row['ApplicationDate'];?></td>
							<td>
								<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_online_adm_enroll/<?php echo $row['id'];?>');">
									<i class="entypo-pencil"></i>
									<?php echo get_phrase('enroll');?>
								</a>
								&nbsp;  &nbsp;  &nbsp;
								<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_online_adm/<?php echo $row['id'];?>');">
									<i class="entypo-pencil"></i>
									<?php echo get_phrase('edit');?>
								</a>
								&nbsp;  &nbsp;  &nbsp;
								<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/online_admission/delete/<?php echo $row['id'];?>');">
									<i class="entypo-trash"></i>
									<?php echo get_phrase('delete');?>
								</a>
							</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>

			<div class="tab-pane box onad" id="add">
             <br />
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/online_admission/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'onsubmit'=>'return validateForm()', 'target'=>'_top','enctype'=>'multipart/form-data', 'name' => 'myForm'));?>
					<div class="form-style-10">
						<h1>Admission Form</h1>

						<div class="inner-wrap">
							<table>
								<tr>
									<td>&nbsp;<label>
											Admission Form Serial No
											<?php
											$this->db->select_max('AdmFormSerialNo');
											$val = $this->db->get('applicants_details')->result_array();
											$def = '1';
											foreach($val as $rr):
											endforeach;
											$sd = $rr['AdmFormSerialNo'] + $def ;
											?>
												<input type="text" name="AdmFormSerialNo" value="<?php echo $sd ;?>"/>
										</label></td>
									<td>&nbsp;<label>Admission Roll No<input type="text" name="AdmissionRollNo" id="AdmissionRollNo"/></label></td>
									<td>&nbsp;<label>Year
											<select name="AdmissionYear" id="AdmissionYear" class="form-control">
												<option value=""><?php echo get_phrase('select_year');?></option>
												<?php
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
								</tr>
							</table>
						</div>
							<div class="section"><span>1</span>Section 1 Program Details(For Office Use Only):</div>
							<div class="inner-wrap">
								<table class="tabl"><tr><td><label>
												Name of Program
												<select name="NameofProgram" id="NameofProgram" class="form-control">
													<option value=""><?php echo get_phrase('select_program');?></option>
													<?php
													$course_program = $this->db->get('course_program')->result_array();
													foreach($course_program as $row112):
														?>
														<option value="<?php echo $row112['id'];?>">
															<?php echo $row112['course_name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Class Roll No <input type="text" name="ClassRollNo" /></label></td>
										<td rowspan="3"><div class="inner-wrap"><label>Add Photo<input type="file" name="PhotoApplicant" id="photoApplicant"/></label></div></td></tr>
									<tr><td><label>Registration/ID No <input type="text" name="RegistratioNo" /></label></td>
										<td><label>Session:
												<select name="Session" id="Session" class="form-control">
													<option value=""><?php echo get_phrase('select_session');?></option>
													<?php
													$ss = $this->db->get('session_pundro')->result_array();
													foreach($ss as $ow112):
														?>
														<option value="<?php echo $ow112['id'];?>">
															<?php echo $ow112['SessionName']." (".$ow112['SemesterDuration'].")";?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td></tr>
									</table></td></tr>
							</div>

							<div class="section"><span>2</span>Section 2 Program Details: </div>
							<div class="inner-wrap"><table>
									<tr>
										<td><label>Name of the Applicant <input type="text" name="NameofApplicant" id="NameofApplicant"/></label></td>
										<td><label>Date of Birth(mm-dd-yy): <input type="text" class="datepicker" name="ApplicantBirthDate" id="ApplicantBirthDate"/></label></td></tr>
									<tr><td><label>Father's Name <input type="text" name="ApplicantFatherName" id="ApplicantFatherName"/></label></td>
										<td><label>Mother's Name <input type="text" name="ApplicantMotherName" id="ApplicantMotherName"/></label></td>
									</tr>
									<tr>
										<td><label>Nationality
												<select name="ApplicantNationality" id="ApplicantNationality" class="form-control">
													<option value=""><?php echo get_phrase('select_nationality');?></option>
													<?php
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
											</label></td>
										<td><label>Gender &nbsp;&nbsp;
												<select name="ApplicantGender" id="ApplicantGender" class="form-control">
													<option value=""><?php echo get_phrase('select_gender');?></option>
													<?php
													$ccz = $this->db->get('gender')->result_array();
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
											</label></td>
									</tr>
								</table></div>
							<div class="inner-wrap"><h3>Present Address</h3><table>
									<tr><td><label>House No <input type="text" name="PresentHouse" id = "PresentHouse" /></label></td>
										<td><label>Phone No <input type="text" name="PresentPhone" id = "PresentPhone"/></label></td></tr>
									<tr><td><label>Village <input type="text" name="PresentVillage" id = "PresentVillage" /></label></td>
										<td><label>Mobile No <input type="text" name="PresentMobile" id = "PresentMobile" /></label></td></tr>
									<tr><td><label>Post Office <input type="text" name="PresentPostOffice" id="PresentPostOffice"/></label></td>
										<td><label>Fax No <input type="text" name="PresentFaxNo" /></label></td></tr>
									<tr><td><label>Pollice Station <input type="text" name="PresentPoliceStation" id="PresentPoliceStation"/></label></td>
										<td><label>E-mail <input type="text" name="PresentEmail" /></label></td></tr>
									<tr><td><label>District <input type="text" name="PresentDistrict" id = "PresentDistrict"/></label></td>
								</table></div>

							<div class="inner-wrap"><h3>Permanent Address (it differ from above)</h3>
								<table><tr><td><label>House No <input type="text" name="PermanentHouse" /></label></td>
										<td><label>Phone No <input type="text" name="PermanentPhone" /></label></td></tr>
									<tr><td><label>Village <input type="text" name="PermanentVillage" /></label></td>
										<td><label>Mobile No <input type="text" name="PermanentMobile" /></label></td></tr>
									<tr><td><label>Post Office <input type="text" name="PermanentPostOffice" /></label></td>
										<td><label>Fax No <input type="text" name="PermanentFaxNo" /></label></td></tr>
									<tr><td><label>Pollice Station <input type="text" name="PermanentPoliceStation" /></label></td>
										<td><label>E-mail <input type="text" name="PermanentEmail" /></label></td></tr>
									<tr><td><label>District <input type="text" name="PermanentDistrict" /></label></td>
								</table></div>

							<div class="section"><span>3</span>Academic Qualifications:(From upper to lower Degree):</div>
							<div class="inner-wrap acdqual">
								<table>
									<tr><td><label>Certificate/Degree
												<select name="CertificateName1" id="CertificateName1" class="form-control">
													<option value=""><?php echo get_phrase('select');?></option>
													<?php
													$dd = $this->db->get('certificate_name')->result_array();
													foreach($dd as $r12):
														?>
														<option value="<?php echo $r12['id'];?>">
															<?php echo $r12['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Group/Discipline
												<select name="CertificateGroup1" id="CertificateGroup1" class="form-control">
													<option value=""><?php echo get_phrase('select');?></option>
													<?php
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
												<select name="CertificateYear1" id="CertificateYear1" class="form-control">
													<option value=""><?php echo get_phrase('select_year');?></option>
													<?php
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
										<td><label>Institute/Board <input type="text" name="CertificateNameofInstitute1" id="CertificateNameofInstitute1"/></label></td>
										<td><label>Division/CGPA <input type="text" name="CertificateCGPA1" id="CertificateCGPA1"/></label></td>
										<td><label>Points obtained <input type="text" name="CertificatePointsObtained1" placeholder="(filled by office)"</label></td>
										<td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert1" id="CertificateDocumentscert1"/></label></td>
										<td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark1" id="CertificateDocumentsmark1"/></label></td>
									</tr>
								</table>
							</div>

							<div class="inner-wrap acdqual">
								<table>
									<tr><td><label>Certificate/Degree
												<select name="CertificateName2" id="CertificateName2" class="form-control">
													<option value=""><?php echo get_phrase('select');?></option>
													<?php
													$dd = $this->db->get('certificate_name')->result_array();
													foreach($dd as $r12):
														?>
														<option value="<?php echo $r12['id'];?>">
															<?php echo $r12['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Group/Discipline
												<select name="CertificateGroup2" id="CertificateGroup2" class="form-control">
													<option value=""><?php echo get_phrase('select');?></option>
													<?php
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
												<select name="CertificateYear2" id="CertificateYear2" class="form-control">
													<option value=""><?php echo get_phrase('select_year');?></option>
													<?php
													$mz = $this->db->get('year_calendar')->result_array();
													foreach($mz as $zz112):
														?>
														<option value="<?php echo $zz112['id'];?>">
															<?php echo $zz112['Name'];?>
														</option>
														<?php
													endforeach;
													?>
												</select>
											</label></td>
										<td><label>Institute/Board <input type="text" name="CertificateNameofInstitute2" id="CertificateNameofInstitute2"/></label></td>
										<td><label>Division/CGPA <input type="text" name="CertificateCGPA2" id="CertificateCGPA2"/></label></td>
										<td><label>Points obtained <input type="text" name="CertificatePointsObtained2" placeholder="(filled by office)"</label></td>
										<td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert2" id="CertificateDocumentscert2"/></label></td>
										<td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark2" id="CertificateDocumentsmark2"/></label></td>
										</tr>
								</table>
							</div>

							<div class="section"><span>4</span>Employment or Profession Records:(Only for service holder):</div>
							<div class="inner-wrap">
								<table>
									<tr><td><label>Name of Organization(s) <input type="text" name="EmploymentNameofOrganizations1" /></label></td>
										<td><label>From(mm-dd-yy) <input type="text" class="datepicker" name="EmploymentFromDate1"/></label></td>
										<td><label>To(mm-dd-yy) <input type="text" class="datepicker" name="EmploymentToDate1" /></label></td>
										<td><label>Position held <input type="text" name="EmploymentPositionHeld1" /></label></td>
										<td colspan="2"><label>Add Documents <input type="file" name="EmploymentDocuments1" /></label></td>
									</tr>
									<tr><td><label>Name of Organization(s) <input type="text" name="EmploymentNameofOrganizations2" /></label></td>
										<td><label>From(mm-dd-yy) <input type="text" class="datepicker" name="EmploymentFromDate2" /></label></td>
										<td><label>To(mm-dd-yy) <input type="text" class="datepicker" name="EmploymentToDate2" /></label></td>
										<td><label>Position held <input type="text" name="EmploymentPositionHeld2" /></label></td>
										<td colspan="2"><label>Add Documents <input type="file" name="EmploymentDocuments2" /></label></td>
									</tr>
								</table>
							</div>

							<div class="section"><span>5</span>Names and address of two references:</div>
							<div class="inner-wrap">
								<table>
									<tr>
										<td>
											<table>
												<tr><td><label>Name of reference 1 <input type="text" name="ReferenceName1" id="ReferenceName1"/></label></td>
												</tr>
												<tr>
													<td><label>Address <textarea type="text" name="ReferenceAddress1" id="ReferenceAddress1"></textarea></label></td>
												</tr>
												<tr><td><label>Phone No<input type="text" name="ReferencePhone1"/></label></td>
												</tr>
												<tr>
													<td><label>Mobile No<input type="text" name="ReferenceMobile1" id="ReferenceMobile1"/></label></td>
												</tr>
												<tr>
													<td><label>E-mail<input type="text" name="ReferenceEmail1" id="ReferenceEmail1"/></label></td>
												</tr>
											</table>
										</td>
										<td>
											<table>
												<tr>
													<td ><label>Name of reference 2 <input type="text" name="ReferenceName2" /></label></td>
												</tr>
												<tr><td ><label>Address <textarea type="text" name="ReferenceAddress2"></textarea></label></td>
												</tr>
												<tr><td><label>Phone No<input type="text" name="ReferencePhone2" /></label></td></tr>
												<tr><td><label>Mobile No<input type="text" name="ReferenceMobile2" /></label></td></tr>
												<tr><td><label>E-mail<input type="text" name="ReferenceEmail2"/></label></td></tr>
											</table>
										</td>
									</tr>
								</table>
							</div>
						<div class="section"><span>5</span>Other Documents:</div>
						<div class="inner-wrap">
							<table>
								<tr>
									<td colspan="2" class="otherdocs">
										<span><label for="">Other Documents</label></span>
										<div><label>National ID Card</label> <input type="file" name="NationalIDApplicant" /></div>
										<div><label>Passport </label><input type="file" name="PassportApplicant" /></div>
										<div><label>Driving Licence </label> <input type="file" name="DrivingLicenceApplicant" /></div>
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
										<td ><label>Signature of Applicant: <input type="file" name="SignatureApplicant" /></label></td>
										<td colspan="2"><label>Date<input type="text" class="datepicker" name="ApplicationDate" id="ApplicationDate"/></label></td>
									</tr>
								</table>
							</div>
					</div>
					<div class="form-group test32">
						  <div class="col-sm-offset-3 col-sm-5">
							  <button type="submit" class="btn btn-info"><?php echo get_phrase('admission');?></button>
						  </div>
					</div>
                    </form>
                </div>                
			</div>
			<!----CREATION FORM ENDS-->
		</div>
	</div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{


		var datatable = $("#table_export").dataTable({

            //"sPaginationType": "full_numbers",
            //"lengthMenu": [ 10, 25, 50, 75, 100 ],
            /*"lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
            "pageLength" : 25,*/
            /*"aLengthMenu": [ [2, 4, 8, -1], [2, 4, 8, "All"] ],*/
            "aLengthMenu": [ [30, 50, 100, 200, 500, 1000, 2000, 3000,  -1], [30, 50, 100, 200, 500, 1000, 2000, 3000, "All"] ],
            "iDisplayLength" : 30,
            /*"aLengthMenu": "bootstrap",*/
			//"iDisplayLength": "500",
            "paging": "false",
            //"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			"oTableTools": {
				"aButtons": [
					
					{
						"sExtends": "xls",
						"mColumns": [1,2]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1,2]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(3, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(0, true);
									  datatable.fnSetColumnVis(3, true);
								  }
							});
						},
						
					},
				]
			},
			
		});

		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
	 $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><select name='examtype"+i+"' class='form-control'><option value=''>select</option><option value='SSC-GENERAL'>SSC(General)</option><option value='SSC-VOCATIONAL'>SSC(Vocational)</option><option value='TRADE'>Trade(Two-Years)</option><option value='DAKHIL'>Dakhil(Vocational)</option></select></td><td><input  name='group"+i+"' type='text' placeholder='Group'  class='form-control input-md'></td><td><input  name='board"+i+"' type='text' placeholder='Board'  class='form-control input-md'></td><td><input  name='passing_yr"+i+"' type='text' placeholder='Passing Year'  class='form-control input-md'></td><td><input  name='special_mark"+i+"' type='text' placeholder='special mark'  class='form-control input-md'></td><td><input  name='ttl_mark"+i+"' type='text' placeholder='Total Marks'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
	  $("#ttldtl").val(i);
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		  $("#ttldtl").val(i);
		 }
	 });
 $("#ttldtl").val(i);
});
		
</script>
<script type="text/javascript">

	function checkForm(form)
	{
		if(!form.terms12.checked) {
			alert("Please indicate that you accept the Terms and Conditions");
			form.terms12.focus();
			return false;
		}

		return true;
	}

</script>
<script type="text/javascript">

	function validateForm() {
		var AdmissionRollNo = document.getElementById('AdmissionRollNo').value;
		if(AdmissionRollNo == ""){
			alert('Please Enter Admission Roll No');
			document.getElementById('AdmissionRollNo').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('AdmissionRollNo').style.borderColor = "green";
		}
		var AdmissionYear = document.getElementById('AdmissionYear').value;
		if(AdmissionYear == ""){
			alert('Please Enter Admission Year');
			document.getElementById('AdmissionYear').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('AdmissionYear').style.borderColor = "green";
		}
		var NameofProgram = document.getElementById('NameofProgram').value;
		if(NameofProgram == ""){
			alert('Please Enter Name of Program');
			document.getElementById('NameofProgram').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('NameofProgram').style.borderColor = "green";
		}
		var Session = document.getElementById('Session').value;
		if(Session == ""){
			alert('Please Enter Session');
			document.getElementById('Session').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('Session').style.borderColor = "green";
		}
		var photoApplicant = document.getElementById('photoApplicant').value;
		if(photoApplicant == ""){
			alert('Please Upload photo');
			document.getElementById('photoApplicant').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('photoApplicant').style.borderColor = "green";
		}
		var NameofApplicant = document.getElementById('NameofApplicant').value;
		if(NameofApplicant == ""){
			alert('Please Enter Name of Applicant');
			document.getElementById('NameofApplicant').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('NameofApplicant').style.borderColor = "green";
		}
		var ApplicantBirthDate = document.getElementById('ApplicantBirthDate').value;
		if(ApplicantBirthDate == ""){
			alert('Please Enter Birth Date');
			document.getElementById('ApplicantBirthDate').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicantBirthDate').style.borderColor = "green";
		}
		var ApplicantFatherName = document.getElementById('ApplicantFatherName').value;
		if(ApplicantFatherName == ""){
			alert('Please Enter Applicant Father Name');
			document.getElementById('ApplicantFatherName').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicantFatherName').style.borderColor = "green";
		}
		var ApplicantMotherName = document.getElementById('ApplicantMotherName').value;
		if(ApplicantMotherName == ""){
			alert('Please Enter Applicant Mother Name');
			document.getElementById('ApplicantMotherName').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicantMotherName').style.borderColor = "green";
		}
		var ApplicantNationality = document.getElementById('ApplicantNationality').value;
		if(ApplicantNationality == ""){
			alert('Please Enter Nationality');
			document.getElementById('ApplicantNationality').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicantNationality').style.borderColor = "green";
		}
		var ApplicantGender = document.getElementById('ApplicantGender').value;
		if(ApplicantGender == ""){
			alert('Please Enter Gender');
			document.getElementById('ApplicantGender').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicantGender').style.borderColor = "green";
		}
		var PresentMobile = document.getElementById('PresentMobile').value;
		if(PresentMobile == ""){
			alert('Please Enter Mobile No.');
			document.getElementById('PresentMobile').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentMobile').style.borderColor = "green";
		}
		var PresentHouse = document.getElementById('PresentHouse').value;
		if(PresentHouse == ""){
			alert('Please Enter House No.');
			document.getElementById('PresentHouse').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentHouse').style.borderColor = "green";
		}
		var PresentVillage = document.getElementById('PresentVillage').value;
		if(PresentVillage == ""){
			alert('Please Enter Village');
			document.getElementById('PresentVillage').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentVillage').style.borderColor = "green";
		}
		var PresentPostOffice = document.getElementById('PresentPostOffice').value;
		if(PresentPostOffice == ""){
			alert('Please Enter Post Office');
			document.getElementById('PresentPostOffice').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentPostOffice').style.borderColor = "green";
		}
		var PresentPoliceStation = document.getElementById('PresentPoliceStation').value;
		if(PresentPoliceStation == ""){
			alert('Please Enter Police Station');
			document.getElementById('PresentPoliceStation').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentPoliceStation').style.borderColor = "green";
		}
		var PresentDistrict = document.getElementById('PresentDistrict').value;
		if(PresentDistrict == ""){
			alert('Please Enter District');
			document.getElementById('PresentDistrict').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentDistrict').style.borderColor = "green";
		}
		var CertificateName1 = document.getElementById('CertificateName1').value;
		if(CertificateName1 == ""){
			alert('Please Enter Certificate/Degree Name');
			document.getElementById('CertificateName1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateName1').style.borderColor = "green";
		}
		var CertificateGroup1 = document.getElementById('CertificateGroup1').value;
		if(CertificateGroup1 == ""){
			alert('Please Enter Group Name');
			document.getElementById('CertificateGroup1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateGroup1').style.borderColor = "green";
		}
		var CertificateYear1 = document.getElementById('CertificateYear1').value;
		if(CertificateYear1 == ""){
			alert('Please Enter Passing Year');
			document.getElementById('CertificateYear1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateYear1').style.borderColor = "green";
		}
		var CertificateNameofInstitute1 = document.getElementById('CertificateNameofInstitute1').value;
		if(CertificateNameofInstitute1 == ""){
			alert('Please Enter Name of Institute');
			document.getElementById('CertificateNameofInstitute1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateNameofInstitute1').style.borderColor = "green";
		}
		var CertificateCGPA1 = document.getElementById('CertificateCGPA1').value;
		if(CertificateCGPA1 == ""){
			alert('Please Enter CGPA');
			document.getElementById('CertificateCGPA1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateCGPA1').style.borderColor = "green";
		}
		var CertificateDocumentscert1 = document.getElementById('CertificateDocumentscert1').value;
		if(CertificateDocumentscert1 == ""){
			alert('Please Enter Certificate');
			document.getElementById('CertificateDocumentscert1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateDocumentscert1').style.borderColor = "green";
		}
		var CertificateDocumentsmark1 = document.getElementById('CertificateDocumentsmark1').value;
		if(CertificateDocumentsmark1 == ""){
			alert('Please Enter Mark Sheet');
			document.getElementById('CertificateDocumentsmark1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateDocumentsmark1').style.borderColor = "green";
		}
		var CertificateName2 = document.getElementById('CertificateName2').value;
		if(CertificateName2 == ""){
			alert('Please Enter Certificate/Degree Name');
			document.getElementById('CertificateName2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateName2').style.borderColor = "green";
		}
		var CertificateGroup2 = document.getElementById('CertificateGroup2').value;
		if(CertificateGroup2 == ""){
			alert('Please Enter Group Name');
			document.getElementById('CertificateGroup2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateGroup2').style.borderColor = "green";
		}
		var CertificateYear2 = document.getElementById('CertificateYear2').value;
		if(CertificateYear2 == ""){
			alert('Please Enter Passing Year');
			document.getElementById('CertificateYear2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateYear2').style.borderColor = "green";
		}
		var CertificateNameofInstitute2 = document.getElementById('CertificateNameofInstitute2').value;
		if(CertificateNameofInstitute2 == ""){
			alert('Please Enter Name of Institute');
			document.getElementById('CertificateNameofInstitute2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateNameofInstitute2').style.borderColor = "green";
		}
		var CertificateCGPA2 = document.getElementById('CertificateCGPA2').value;
		if(CertificateCGPA2 == ""){
			alert('Please Enter CGPA');
			document.getElementById('CertificateCGPA2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateCGPA2').style.borderColor = "green";
		}
		var CertificateDocumentscert2 = document.getElementById('CertificateDocumentscert2').value;
		if(CertificateDocumentscert2 == ""){
			alert('Please Enter Certificate');
			document.getElementById('CertificateDocumentscert2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateDocumentscert2').style.borderColor = "green";
		}
		var CertificateDocumentsmark2 = document.getElementById('CertificateDocumentsmark2').value;
		if(CertificateDocumentsmark2 == ""){
			alert('Please Enter Mark Sheet');
			document.getElementById('CertificateDocumentsmark2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateDocumentsmark2').style.borderColor = "green";
		}
		var ReferenceName1 = document.getElementById('ReferenceName1').value;
		if(ReferenceName1 == ""){
			alert('Please Enter Reference Name');
			document.getElementById('ReferenceName1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ReferenceName1').style.borderColor = "green";
		}
		var ReferenceAddress1 = document.getElementById('ReferenceAddress1').value;
		if(ReferenceAddress1 == ""){
			alert('Please Enter Address');
			document.getElementById('ReferenceAddress1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ReferenceAddress1').style.borderColor = "green";
		}
		var ReferenceMobile1 = document.getElementById('ReferenceMobile1').value;
		if(ReferenceMobile1 == ""){
			alert('Please Enter References Mobile');
			document.getElementById('ReferenceMobile1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ReferenceMobile1').style.borderColor = "green";
		}
		var ApplicationDate = document.getElementById('ApplicationDate').value;
		if(ApplicationDate == ""){
			alert('Please Enter Application Date');
			document.getElementById('ApplicationDate').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicationDate').style.borderColor = "green";
		}
	}
</script>