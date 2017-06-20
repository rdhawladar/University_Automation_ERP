<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://localhost/pundro_demo/assets/css/custom.css">
	<link rel="stylesheet" href="http://localhost/pundro_demo/assets/css/bootstrap.min.css">
</head>
<body>
<?php ini_set('display_errors', 0);?>
<?php
$ttt =  date("d-m-Y|");
$d=strtotime("+11 hours");
$ttt1 = date("h:i:sa", $d);
$datetime = $ttt.$ttt1;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pundro_demo1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>
<?php
if(isset($_POST['btn-upload11']))
{
	//echo "inside";
	//exit();
	$temp = $_POST[PresentMobile];
	$sql34 = "SELECT * FROM applicants_details WHERE PresentMobile = $temp ";
	
	$result34 = $conn->query($sql34);
	if ($result34->num_rows > 0) {
		while($row34 = $result34->fetch_assoc()) {
			?>
			<?php 
			echo "<div class='moneydi'>";
			echo "<h3>You have already submitted the application</h3>";
			//echo '<script type="text/javascript"> window.location = "http://localhost/pundro_demo/web/" </script>';
			echo "<a class='moneydibutton btn btn-success' href='#' onclick='history.go(-1)'>Go Back</a>";
			echo "</div>";
			?>
			<?php
		}
	} else {
		$MR = $_POST["MoneyReceiptSearch"];
		$ClassRollNo = $RegistratioNo = $temp = 0;
		$CandidateStudent = 0;
		$file1 = rand(1000, 100000) . "-" . $_FILES['photoApplicant']['name'];
		$file_loc1 = $_FILES['photoApplicant']['tmp_name'];
		$file2 = rand(1000, 100000) . "-" . $_FILES['CertificateDocumentscert1']['name'];
		$file_loc2 = $_FILES['CertificateDocumentscert1']['tmp_name'];
		$file3 = rand(1000, 100000) . "-" . $_FILES['CertificateDocumentsmark1']['name'];
		$file_loc3 = $_FILES['CertificateDocumentsmark1']['tmp_name'];
		$file4 = rand(1000, 100000) . "-" . $_FILES['CertificateDocumentscert2']['name'];
		$file_loc4 = $_FILES['CertificateDocumentscert2']['tmp_name'];
		$file5 = rand(1000, 100000) . "-" . $_FILES['CertificateDocumentsmark2']['name'];
		$file_loc5 = $_FILES['CertificateDocumentsmark2']['tmp_name'];
		/*$file6 = rand(1000, 100000) . "-" . $_FILES['CertificateDocumentscert3']['name'];
		$file_loc6 = $_FILES['CertificateDocumentscert3']['tmp_name'];
		$file7 = rand(1000, 100000) . "-" . $_FILES['CertificateDocumentsmark3']['name'];
		$file_loc7 = $_FILES['CertificateDocumentsmark3']['tmp_name'];
		$file8 = rand(1000, 100000) . "-" . $_FILES['CertificateDocumentscert4']['name'];
		$file_loc8 = $_FILES['CertificateDocumentscert4']['tmp_name'];
		$file9 = rand(1000, 100000) . "-" . $_FILES['CertificateDocumentsmark4']['name'];
		$file_loc9 = $_FILES['CertificateDocumentsmark4']['tmp_name'];
		$file10 = rand(1000, 100000) . "-" . $_FILES['EmploymentDocuments1']['name'];
		$file_loc10 = $_FILES['EmploymentDocuments1']['tmp_name'];
		$file11 = rand(1000, 100000) . "-" . $_FILES['EmploymentDocuments2']['name'];
		$file_loc11 = $_FILES['EmploymentDocuments2']['tmp_name'];*/
		$file12 = rand(1000, 100000) . "-" . $_FILES['NationalIDApplicant']['name'];
		$file_loc12 = $_FILES['NationalIDApplicant']['tmp_name'];
		$file13 = rand(1000, 100000) . "-" . $_FILES['PassportApplicant']['name'];
		$file_loc13 = $_FILES['PassportApplicant']['tmp_name'];
		$file14 = rand(1000, 100000) . "-" . $_FILES['DrivingLicenceApplicant']['name'];
		$file_loc14 = $_FILES['DrivingLicenceApplicant']['tmp_name'];
		$file15 = rand(1000, 100000) . "-" . $_FILES['SignatureApplicant']['name'];
		$file_loc15 = $_FILES['SignatureApplicant']['tmp_name'];

		$folder = "../uploads/student_image/";

		$new_file_name1 = strtolower($file1);
		$final_file1 = str_replace(' ', '-', $new_file_name1);
		$new_file_name2 = strtolower($file2);
		$final_file2 = str_replace(' ', '-', $new_file_name2);
		$new_file_name3 = strtolower($file3);
		$final_file3 = str_replace(' ', '-', $new_file_name3);
		$new_file_name4 = strtolower($file4);
		$final_file4 = str_replace(' ', '-', $new_file_name4);
		$new_file_name5 = strtolower($file5);
		$final_file5 = str_replace(' ', '-', $new_file_name5);
		/*$new_file_name6 = strtolower($file6);
		$final_file6 = str_replace(' ', '-', $new_file_name6);
		$new_file_name7 = strtolower($file7);
		$final_file7 = str_replace(' ', '-', $new_file_name7);
		$new_file_name8 = strtolower($file8);
		$final_file8 = str_replace(' ', '-', $new_file_name8);
		$new_file_name9 = strtolower($file9);
		$final_file9 = str_replace(' ', '-', $new_file_name9);
		$new_file_name10 = strtolower($file10);
		$final_file10 = str_replace(' ', '-', $new_file_name10);
		$new_file_name11 = strtolower($file11);
		$final_file11 = str_replace(' ', '-', $new_file_name11);*/
		$new_file_name12 = strtolower($file12);
		$final_file12 = str_replace(' ', '-', $new_file_name12);
		$new_file_name13 = strtolower($file13);
		$final_file13 = str_replace(' ', '-', $new_file_name13);
		$new_file_name14 = strtolower($file14);
		$final_file14 = str_replace(' ', '-', $new_file_name14);
		$new_file_name15 = strtolower($file15);
		$final_file15 = str_replace(' ', '-', $new_file_name15);

		if (move_uploaded_file($file_loc1, $folder . $final_file1)) {
		} else {
		}
		if (move_uploaded_file($file_loc2, $folder . $final_file2)) {
		} else {
		}
		if (move_uploaded_file($file_loc3, $folder . $final_file3)) {
		} else {
		}
		if (move_uploaded_file($file_loc4, $folder . $final_file4)) {
		} else {
		}
		if (move_uploaded_file($file_loc5, $folder . $final_file5)) {
		} else {
		}
		/*if (move_uploaded_file($file_loc6, $folder . $final_file6)) {
		} else {
		}
		if (move_uploaded_file($file_loc7, $folder . $final_file7)) {
		} else {
		}
		if (move_uploaded_file($file_loc8, $folder . $final_file8)) {
		} else {
		}
		if (move_uploaded_file($file_loc9, $folder . $final_file9)) {
		} else {
		}
		if (move_uploaded_file($file_loc10, $folder . $final_file10)) {
		} else {
		}
		if (move_uploaded_file($file_loc11, $folder . $final_file11)) {
		} else {
		}*/
		if (move_uploaded_file($file_loc12, $folder . $final_file12)) {
		} else {
		}
		if (move_uploaded_file($file_loc13, $folder . $final_file13)) {
		} else {
		}
		if (move_uploaded_file($file_loc14, $folder . $final_file14)) {
		} else {
		}
		if (move_uploaded_file($file_loc15, $folder . $final_file15)) {
		} else {
		}
		$_POST[TotalGPA] = $_POST[CertificateCGPA1] + $_POST[CertificateCGPA2];
		$RegistratioNo = 0;
		$sql = "INSERT INTO applicants_details ( RegistratioNo, NameofProgram, Session,   AdmissionYear,  
		NameofApplicant, ApplicantBirthDate, ApplicantFatherName, 
		ApplicantMotherName, ApplicantNationality, ApplicantGender, PresentHouse, PresentPhone, PresentVillage, 
		PresentMobile, PresentPostOffice, PresentFaxNo, PresentPoliceStation, PresentEmail, PresentDistrict, 
		PermanentHouse, PermanentPhone, PermanentVillage, PermanentMobile, PermanentPostOffice, PermanentFaxNo,
		PermanentPoliceStation, PermanentEmail, PermanentDistrict, CertificateName1, CertificateGroup1,
		CertificateYear1, CertificateNameofInstitute1, CertificateCGPA1, CertificatePointsObtained1, CertificateName2, 
		CertificateGroup2, CertificateYear2, CertificateNameofInstitute2, CertificateCGPA2, CertificatePointsObtained2,
		TotalGPA, ReferenceName1, ReferenceAddress1, ReferencePhone1, ReferenceMobile1, ReferenceEmail1, 
		 ReferenceName2, ReferenceAddress2, ReferencePhone2, ReferenceMobile2, ReferenceEmail2, ApplicationDate, PhotoApplicant, 
		 CertificateDocumentscert1, CertificateDocumentsmark1, CertificateDocumentscert2, CertificateDocumentsmark2,  
		 NationalIDApplicant, PassportApplicant, DrivingLicenceApplicant, SignatureApplicant)
			VALUES( '$RegistratioNo','$_POST[NameofProgram]', '$_POST[Session]', '$_POST[AdmissionYear]', '$_POST[NameofApplicant]',
			'$_POST[ApplicantBirthDate]', '$_POST[ApplicantFatherName]', '$_POST[ApplicantMotherName]', '$_POST[ApplicantNationality]',
			'$_POST[ApplicantGender]', '$_POST[PresentHouse]', '$_POST[PresentPhone]', '$_POST[PresentVillage]', '$_POST[PresentMobile]',
			'$_POST[PresentPostOffice]', '$_POST[PresentFaxNo]', '$_POST[PresentPoliceStation]', '$_POST[PresentEmail]',
			'$_POST[PresentDistrict]', '$_POST[PermanentHouse]', '$_POST[PermanentPhone]', '$_POST[PermanentVillage]',
			'$_POST[PermanentMobile]', '$_POST[PermanentPostOffice]', '$_POST[PermanentFaxNo]', '$_POST[PermanentPoliceStation]', 
			'$_POST[PermanentEmail]', '$_POST[PermanentDistrict]', '$_POST[CertificateName1]', '$_POST[CertificateGroup1]',
			'$_POST[CertificateYear1]', '$_POST[CertificateNameofInstitute1]', '$_POST[CertificateCGPA1]', 
			'$_POST[CertificatePointsObtained1]', '$_POST[CertificateName2]', '$_POST[CertificateGroup2]', 
			'$_POST[CertificateYear2]', '$_POST[CertificateNameofInstitute2]', '$_POST[CertificateCGPA2]', 
			'$_POST[CertificatePointsObtained2]', '$_POST[TotalGPA]', '$_POST[ReferenceName1]', '$_POST[ReferenceAddress1]', 
			'$_POST[ReferencePhone1]', '$_POST[ReferenceMobile1]', '$_POST[ReferenceEmail1]',
			'$_POST[ReferenceName2]', '$_POST[ReferenceAddress2]', '$_POST[ReferencePhone2]', 
			'$_POST[ReferenceMobile2]', '$_POST[ReferenceEmail2]', '$datetime', 
			'$final_file1', '$final_file2', '$final_file3', '$final_file4', 
			'$final_file5', '$final_file12', '$final_file13', '$final_file14', '$final_file15')";

		if ($conn->query($sql) === TRUE) {
			echo "<div class='moneydi'>";
			echo "<h4>Thank you very much. Your record has been saved successfully</h4>";
			echo "<a class='moneydibutton btn btn-success' href='http://localhost/pundro_demo/web/'>Go Back</a>";
			?>
			<script type="text/javascript">
			window.setTimeout(function() {
			    window.location.href = 'http://www.google.com';
			}, 50000);
			</script>
			<h5>You will be redirected after 50 seconds</h5>
			<?php 
			echo "</div>";
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

}
?>
<?php
$MR1 = $_POST["MoneyReceiptSearch"];
$MR = substr($MR1, 0, 11);
if(isset($MR)) {
	$MR = substr($MR1, 0, 11);
	$sql34 = "SELECT * FROM applicants_details WHERE PresentMobile = $MR ";
	
	$result34 = $conn->query($sql34);
	if ($result34->num_rows > 0) {
		while($row34 = $result34->fetch_assoc()) {
			?>
			<?php 
			echo "<div class='moneydi'>";
			echo "<h3>You have already submitted the application</h3>";
			echo "<a class='moneydibutton btn btn-success' href='#' onclick='history.go(-1)'>Go Back</a>";
			echo "</div>";
			exit();
		}
	}

	$ClassRollNo = $RegistratioNo = $temp = 0;
	$CandidateStudent  = 0;
	$sql12 = "SELECT * FROM money_receipt where MobileNumber = '$MR'";
	$result12 = $conn->query($sql12);
	if ($result12->num_rows == 0) {
		echo "<div class='moneydi'>";
		echo "<h3>First Pay the Form Fillup Bill (500 BDT)</h3>";
		//echo '<script type="text/javascript"> window.location = "http://localhost/pundro_demo/web/" </script>';
		echo "<a class='moneydibutton btn btn-success' href='#' onclick='history.go(-1)'>Go Back</a>";
		echo "</div>";
	}
	if ($result12->num_rows > 0) {
		while ($row12 = $result12->fetch_assoc()) {
			?>
			<!--<table class="table table-bordered datatable">
				<tr>
					<td><?php /*echo $row12["ProgramName"]; */?></td>
					<td><?php /*echo $row12["SemesterName"]; */?></td>
					<td><?php /*echo $row12["Year"]; */?></td>
					<td><?php /*echo $row12["CandidateName"]; */?></td>
					<td><?php /*echo $row12["MobileNumber"]; */?></td>
					<td><?php /*echo $row12["Email"]; */?></td>
					<td><?php /*echo $row12["Amount"]; */?></td>
					<td><?php /*echo $row12["Particulars"]; */?></td>
				</tr>
			</table>-->
			<div class="box-content">
				<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form-style-10">
						<h1>Admission Form</h1>
						<input type="hidden" name="PresentMobile" value="<?php echo $MR;?>">
						<div class="section"><span>1</span>Section 1 Program Details :</div>
						<div class="inner-wrap">
							<table class="tabl"><tr>
							<td><label>
											Name of Program
											<select readonly name="NameofProgram" id="NameofProgram" class="form-control">
												<?php
												$sql = "SELECT * FROM course_program where id='$row12[ProgramName]'";
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
										<td><label>Session
											<select readonly name="Session" id="Session" class="form-control">
												<?php
												$sql = "SELECT * FROM session_pundro where id='$row12[SemesterName]'";
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
										</label></td>
									<!--<td><label>Class Roll No <input type="text" readonly name="ClassRollNo" /></label></td>-->
									<td><label>Year
											<select readonly name="AdmissionYear" id="AdmissionYear" class="form-control">
												<?php
												$sql = "SELECT * FROM year_calendar where id='$row12[Year]'";
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
								<tr>
									<td><label>Mobile No <input readonly type="text" id = "PresentMobile" value="<?php echo $row12["MobileNumber"];?>" /></label></td>
									<td><label>E-mail <input type="text" readonly name="PresentEmail" value="<?php echo $row12["Email"]; ?>" /></label></td>
									<td ><div class="inner-wrap"><label>Add Photo<input type="file" name="photoApplicant" id="photoApplicant"/></label></div></td>
								</tr>
							</table></td></tr>
						</div>

						<div class="section"><span>2</span>Section 2 Personal Details </div>
						<div class="inner-wrap"><table>
								<tr>
									<td><label>Name of the Applicant <input type="text" name="NameofApplicant" id="NameofApplicant" readonly value="<?php echo $row12["CandidateName"]; ?>"/></label></td>
									<td><label>Date of Birth(mm-dd-yy): <input required type="date" class="datepicker" name="ApplicantBirthDate" id="ApplicantBirthDate"/></label></td></tr>
								<tr><td><label>Father's Name <input type="text" name="ApplicantFatherName" id="ApplicantFatherName"/></label></td>
									<td><label>Mother's Name <input type="text" name="ApplicantMotherName" id="ApplicantMotherName"/></label></td>
								</tr>
								<tr>
									<td><label>Nationality
											<select name="ApplicantNationality" id="ApplicantNationality" class="form-control">
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
									<td><label>Gender 
											<select name="ApplicantGender" id="ApplicantGender" class="form-control">
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
									<td><label>Phone No <input type="number" name="PresentPhone" id = "PresentPhone"/></label></td></tr>
								<tr><td><label>Village <input type="text" name="PresentVillage" id = "PresentVillage" /></label></td>
									<td><label>Mobile No <input readonly type="number" name="PresentMobile" id = "PresentMobile" value="<?php echo $row12["MobileNumber"];?>" /></label></td></tr>
								<tr><td><label>Post Office <input type="text" name="PresentPostOffice" id="PresentPostOffice"/></label></td>
									<td><label>Fax No <input type="text" name="PresentFaxNo" /></label></td></tr>
								<tr><td><label>Pollice Station <input type="text" name="PresentPoliceStation" id="PresentPoliceStation"/></label></td>
									<td><label>E-mail <input type="email" readonly name="PresentEmail" value="<?php echo $row12["Email"]; ?>" /></label></td></tr>
								<tr><td><label>District <input type="text" name="PresentDistrict" id = "PresentDistrict"/></label></td>
							</table></div>

						<div class="inner-wrap"><h3>Permanent Address </h3>
							<table><tr><td><label>House No <input type="text" name="PermanentHouse" /></label></td>
									<td><label>Phone No <input type="number" name="PermanentPhone" /></label></td></tr>
								<tr><td><label>Village <input type="text" name="PermanentVillage" /></label></td>
									<td><label>Mobile No <input type="number" name="PermanentMobile" /></label></td></tr>
								<tr><td><label>Post Office <input type="text" name="PermanentPostOffice" /></label></td>
									<td><label>Fax No <input type="text" name="PermanentFaxNo" /></label></td></tr>
								<tr><td><label>Pollice Station <input type="text" name="PermanentPoliceStation" /></label></td>
									<td><label>E-mail <input type="email" name="PermanentEmail" /></label></td></tr>
								<tr><td><label>District <input type="text" name="PermanentDistrict" /></label></td>
							</table></div>

						<div class="section"><span>3</span>Academic Qualifications: </div>
						<div class="inner-wrap acdqual">
							<table>
								<tr><td><label>Certificate/Degree
											<select name="CertificateName1" required id="CertificateName1" class="form-control">
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
											<select name="CertificateGroup1" required id="CertificateGroup1" class="form-control">
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
											<select name="CertificateYear1" required id="CertificateYear1" class="form-control">
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
									<td><label>Board 
											<select name="CertificateNameofInstitute1" required id="CertificateNameofInstitute1" class="form-control">
												<option value=""><?php echo "select board";?></option>
												<?php
												$sql = "SELECT * FROM education_board";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														?>
														<option value="<?php echo $row["id"];?>"><?php echo $row["board_name"];?></option>
														<?php
													}
												}
												?>
											</select></td>
									<!--<input type="text" name="CertificateNameofInstitute1" id="CertificateNameofInstitute1"/></label>-->
									<td><label>Institute <input type="text" required name="CertificatePointsObtained1" </label></td>
									<td><label>GPA <input type="text" required name="CertificateCGPA1" id="CertificateCGPA1" placeholder="5.00"/></label></td>									
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
									<td><label>Board 
											<select name="CertificateNameofInstitute2" id="CertificateNameofInstitute2" class="form-control">
												<option value=""><?php echo "select board";?></option>
												<?php
												$sql = "SELECT * FROM education_board";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														?>
														<option value="<?php echo $row["id"];?>"><?php echo $row["board_name"];?></option>
														<?php
													}
												}
												?>
											</select></td>
									<!--<td><label>Institute/Board <input type="text" name="CertificateNameofInstitute2" id="CertificateNameofInstitute2"/></label></td>-->
									<td><label>Institute <input type="text" name="CertificatePointsObtained2" </label></td>
									<td><label>GPA <input type="text" name="CertificateCGPA2" id="CertificateCGPA2" placeholder="5.00" /></label></td>
									<td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert2" id="CertificateDocumentscert2"/></label></td>
									<td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark2" id="CertificateDocumentsmark2"/></label></td>
								</tr>
							</table>
						</div>
						<!--<div class="section"><span>4</span>Employment or Profession Records:(Only for service holder):</div>
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
						</div>-->

						<div class="section"><span>4</span>Names and address of two references:</div>
						<div class="inner-wrap">
							<table>
								<tr>
									<td>
										<table>
											<tr><td><label>Name<input required type="text" name="ReferenceName1" id="ReferenceName1"/></label></td>
											</tr>
											<tr>
												<td><label>Address <textarea required type="text" name="ReferenceAddress1" id="ReferenceAddress1"></textarea></label></td>
											</tr>
											<tr><td><label>Phone No<input required type="number" name="ReferencePhone1"/></label></td>
											</tr>
											<tr>
												<td><label>Mobile No<input required type="number" name="ReferenceMobile1" id="ReferenceMobile1"/></label></td>
											</tr>
											<tr>
												<td><label>E-mail<input required type="email" name="ReferenceEmail1" id="ReferenceEmail1"/></label></td>
											</tr>
										</table>
									</td>
									<td>
										<table>
											<tr>
												<td ><label>Name<input type="text" name="ReferenceName2" /></label></td>
											</tr>
											<tr><td ><label>Address <textarea type="text" name="ReferenceAddress2"></textarea></label></td>
											</tr>
											<tr><td><label>Phone No<input type="number" name="ReferencePhone2" /></label></td></tr>
											<tr><td><label>Mobile No<input type="number" name="ReferenceMobile2" /></label></td></tr>
											<tr><td><label>E-mail<input type="email" name="ReferenceEmail2"/></label></td></tr>
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
								</tr>
							</table>
							<div class="form-group test32">
								<div class="col-sm-offset-3 col-sm-5">
								<!--<button type="submit" class="btn btn-info"><?php /*echo "admission";*/?></button>-->
								<button type="submit" name="btn-upload11" class="aplbutton btn btn-info"><?php echo "submit"; ?></button>
								</div>
							</div>
						</div>
					</div>
					
				</form>
			</div>
			<?php
		}
	}
}else {
	?>

	<div class="tab-pane box onad">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<div class="form-group test32">
				<div class="col-sm-offset-3 col-sm-5">
					<input type="text" name="MoneyReceiptSearch" placeholder="01679624759">
				</div>
			</div>
			<div class="form-group test32">
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" name="btn-upload13" class="btn btn-info"><?php echo "Search"; ?></button>
				</div>
			</div>
		</form>
	</div>
	<?php
}
$conn->close();
?>
	</body>
	</html>