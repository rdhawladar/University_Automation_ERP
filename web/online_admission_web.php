<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pundro_demo1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$ClassRollNo = $RegistratioNo = $temp = 0;
$CandidateStudent  = 0;
if(isset($_POST["ApplicationDate"])) {
	$sql = "INSERT INTO applicants_details (Session, AdmFormSerialNo, AdmissionRollNo, AdmissionYear, NameofProgram, ClassRollNo, RegistratioNo, CandidateStudent, NameofApplicant, ApplicantBirthDate, ApplicantFatherName, ApplicantMotherName, ApplicantNationality, ApplicantGender, PresentHouse, PresentPhone, PresentVillage, PresentMobile, PresentPostOffice, PresentFaxNo, PresentPoliceStation, PresentEmail, PresentDistrict, PermanentHouse, PermanentPhone, PermanentVillage, PermanentMobile, PermanentPostOffice, PermanentFaxNo, PermanentPoliceStation, PermanentEmail, PermanentDistrict, CertificateName1, CertificateGroup1,
CertificateYear1, CertificateNameofInstitute1, CertificateCGPA1, CertificatePointsObtained1, CertificateName2, CertificateGroup2, CertificateYear2, CertificateNameofInstitute2, CertificateCGPA2, CertificatePointsObtained2, CertificateName3, CertificateGroup3, CertificateYear3, CertificateNameofInstitute3, CertificateCGPA3, CertificatePointsObtained3, CertificateName4, CertificateGroup4, CertificateYear4, CertificateNameofInstitute4, CertificateCGPA4, CertificatePointsObtained4, TotalGPA, EmploymentNameofOrganizations1, EmploymentFromDate1, EmploymentToDate1, EmploymentPositionHeld1, EmploymentNameofOrganizations2, EmploymentFromDate2, EmploymentToDate2, EmploymentPositionHeld2, ReferenceName1, ReferenceAddress1, ReferencePhone1, ReferenceMobile1, ReferenceEmail1,
ReferenceName2, ReferenceAddress2, ReferencePhone2, ReferenceMobile2, ReferenceEmail2, ApplicationDate)
VALUES('$_POST[Session]', '$_POST[AdmFormSerialNo]', '$_POST[AdmissionRollNo]', '$_POST[AdmissionYear]', '$_POST[NameofProgram]',
'$ClassRollNo', '$RegistratioNo', '$CandidateStudent', '$_POST[NameofApplicant]',
'$_POST[ApplicantBirthDate]', '$_POST[ApplicantFatherName]', '$_POST[ApplicantMotherName]', '$_POST[ApplicantNationality]',
'$_POST[ApplicantGender]', '$_POST[PresentHouse]', '$_POST[PresentPhone]', '$_POST[PresentVillage]', '$_POST[PresentMobile]',
'$_POST[PresentPostOffice]', '$_POST[PresentFaxNo]', '$_POST[PresentPoliceStation]', '$_POST[PresentEmail]',
'$_POST[PresentDistrict]', '$_POST[PermanentHouse]', '$_POST[PermanentPhone]', '$_POST[PermanentVillage]',
'$_POST[PermanentMobile]', '$_POST[PermanentPostOffice]', '$_POST[PermanentFaxNo]', '$_POST[PermanentPoliceStation]', '$_POST[PermanentEmail]', '$_POST[PermanentDistrict]', '$_POST[CertificateName1]', '$_POST[CertificateGroup1]',
'$_POST[CertificateYear1]', '$_POST[CertificateNameofInstitute1]', '$_POST[CertificateCGPA1]', '$_POST[CertificatePointsObtained1]', '$_POST[CertificateName2]', '$_POST[CertificateGroup2]', '$_POST[CertificateYear2]', '$_POST[CertificateNameofInstitute2]', '$_POST[CertificateCGPA2]', '$_POST[CertificatePointsObtained2]', '$_POST[CertificateName3]', '$_POST[CertificateGroup3]', '$_POST[CertificateYear3]', '$_POST[CertificateNameofInstitute3]', '$_POST[CertificateCGPA3]', '$_POST[CertificatePointsObtained3]', '$_POST[CertificateName4]', '$_POST[CertificateGroup4]',
'$_POST[CertificateYear4]', '$_POST[CertificateNameofInstitute4]', '$_POST[CertificateCGPA4]',
'$_POST[CertificatePointsObtained4]', '$_POST[TotalGPA]', '$_POST[EmploymentNameofOrganizations1]', '$_POST[EmploymentFromDate1]',
'$_POST[EmploymentToDate1]', '$_POST[EmploymentPositionHeld1]', '$_POST[EmploymentNameofOrganizations2]',
'$_POST[EmploymentFromDate2]', '$_POST[EmploymentToDate2]', '$_POST[EmploymentPositionHeld2]', '$_POST[ReferenceName1]',
'$_POST[ReferenceAddress1]', '$_POST[ReferencePhone1]', '$_POST[ReferenceMobile1]', '$_POST[ReferenceEmail1]',
'$_POST[ReferenceName2]', '$_POST[ReferenceAddress2]', '$_POST[ReferencePhone2]', '$_POST[ReferenceMobile2]',
'$_POST[ReferenceEmail2]', '$_POST[ApplicationDate]')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://localhost/pundro_demo/assets/css/custom.css">
</head>
<body>
<div class="tab-pane box onad" id="add">
	<br />
	<div class="box-content">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="form-style-10">
			<h1>Admission Form</h1>

			<div class="inner-wrap">
				<table>
					<tr>
						<td>&nbsp;<label>
								Admission Form Serial No
								<?php
								/*$this->db->select_max('AdmFormSerialNo');
								$val = $this->db->get('applicants_details')->result_array();
								$def = '1';
								foreach($val as $rr):
								endforeach;
								$sd = $rr['AdmFormSerialNo'] + $def ;*/
								?>
								<input type="text" name="AdmFormSerialNo" value="<?php //echo $sd ;?>"/>
							</label></td>
						<td>&nbsp;<label>Admission Roll No<input type="text" name="AdmissionRollNo" id="AdmissionRollNo"/></label></td>
						<td>&nbsp;<label>Year
								<select name="AdmissionYear" id="AdmissionYear" class="form-control">
									<option value=""><?php echo "select year";?></option>
									<?php
									$sql = "SELECT * FROM year_calendar";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
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
									<option value=""><?php echo "select program";?></option>
									<?php
									$sql = "SELECT * FROM course_program";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["course_name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Class Roll No <input type="text" name="ClassRollNo" /></label></td>
						<td rowspan="3"><div class="inner-wrap"><label>Add Photo<input type="file" name="PhotoApplicant" id="photoApplicant"/></label></div></td></tr>
					<tr><td><label>Registration/ID No <input type="text" name="RegistratioNo" /></label></td>
						<td><label>Session:
								<select name="Session" id="Session" class="form-control">
									<option value=""><?php echo "select session";?></option>
									<?php
									$sql = "SELECT * FROM session_pundro";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["SessionName"]." (".$row["AdmissionDuration"].")";?></option>
											<?php
										}
									}
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
									<option value=""><?php echo "select nationality";?></option>
									<?php
									$sql = "SELECT * FROM nationality";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php
												echo $row['CountryName']." (".$row['Nationality'].")";?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Gender &nbsp;&nbsp;
								<select name="ApplicantGender" id="ApplicantGender" class="form-control">
									<option value=""><?php echo "select gender";?></option>
									<?php
									$sql = "SELECT * FROM gender";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
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
									<option value=""><?php echo "select";?></option>
									<?php
									$sql = "SELECT * FROM certificate_name";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Group/Discipline
								<select name="CertificateGroup1" id="CertificateGroup1" class="form-control">
									<option value=""><?php echo "select";?></option>
									<?php
									$sql = "SELECT * FROM certificate_group";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Year of Passing
								<select name="CertificateYear1" id="CertificateYear1" class="form-control">
									<option value=""><?php echo "select year";?></option>
									<?php
									$sql = "SELECT * FROM year_calendar";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
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
									<option value=""><?php echo "select";?></option>
									<?php
									$sql = "SELECT * FROM certificate_name";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Group/Discipline
								<select name="CertificateGroup2" id="CertificateGroup2" class="form-control">
									<option value=""><?php echo "select";?></option>
									<?php
									$sql = "SELECT * FROM certificate_group";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Year of Passing
								<select name="CertificateYear2" id="CertificateYear2" class="form-control">
									<option value=""><?php echo "select year";?></option>
									<?php
									$sql = "SELECT * FROM year_calendar";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
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
			<div class="inner-wrap acdqual">
				<table>
					<tr><td><label>Certificate/Degree
								<select name="CertificateName3" id="CertificateName3" class="form-control">
									<option value=""><?php echo "select";?></option>
									<?php
									$sql = "SELECT * FROM certificate_name";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Group/Discipline
								<select name="CertificateGroup3" id="CertificateGroup3" class="form-control">
									<option value=""><?php echo "select";?></option>
									<?php
									$sql = "SELECT * FROM certificate_group";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Year of Passing
								<select name="CertificateYear3" id="CertificateYear3" class="form-control">
									<option value=""><?php echo "select year";?></option>
									<?php
									$sql = "SELECT * FROM year_calendar";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Institute/Board <input type="text" name="CertificateNameofInstitute3" id="CertificateNameofInstitute3"/></label></td>
						<td><label>Division/CGPA <input type="text" name="CertificateCGPA3" id="CertificateCGPA3"/></label></td>
						<td><label>Points obtained <input type="text" name="CertificatePointsObtained3" placeholder="(filled by office)"</label></td>
						<td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert3" id="CertificateDocumentscert3"/></label></td>
						<td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark3" id="CertificateDocumentsmark3"/></label></td>
					</tr>
				</table>
			</div>
			<div class="inner-wrap acdqual">
				<table>
					<tr><td><label>Certificate/Degree
								<select name="CertificateName4" id="CertificateName4" class="form-control">
									<option value=""><?php echo "select";?></option>
									<?php
									$sql = "SELECT * FROM certificate_name";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Group/Discipline
								<select name="CertificateGroup4" id="CertificateGroup4" class="form-control">
									<option value=""><?php echo "select";?></option>
									<?php
									$sql = "SELECT * FROM certificate_group";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Year of Passing
								<select name="CertificateYear4" id="CertificateYear4" class="form-control">
									<option value=""><?php echo "select year";?></option>
									<?php
									$sql = "SELECT * FROM year_calendar";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["Name"];?></option>
											<?php
										}
									}
									?>
								</select>
							</label></td>
						<td><label>Institute/Board <input type="text" name="CertificateNameofInstitute4" id="CertificateNameofInstitute4"/></label></td>
						<td><label>Division/CGPA <input type="text" name="CertificateCGPA4" id="CertificateCGPA4"/></label></td>
						<td><label>Points obtained <input type="text" name="CertificatePointsObtained4" placeholder="(filled by office)"</label></td>
						<td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert4" id="CertificateDocumentscert4"/></label></td>
						<td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark4" id="CertificateDocumentsmark4"/></label></td>
					</tr>
					<input type="hidden" name="TotalGPA" id="TotalGPA">
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
				<button type="submit" class="btn btn-info"><?php echo "admission";?></button>
			</div>
		</div>
		</form>
	</div>
</div>
</body>
</html>
<?php
$conn->close();
?>