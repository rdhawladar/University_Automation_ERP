<?php
$edit_data		=	$this->db->get_where('applicants_details' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('student_profile');?>
            	</div>
            </div>
			<div class="panel-body">
                <div class="form-style-10">
                    <div class="inner-wrap">
                        <table>
                            <tr>
                                <td>&nbsp;<label>
                                        Admission Form Serial No:
                                        <?php echo $row['AdmFormSerialNo']?>
                                    </label></td>
                                <td>&nbsp;<label>Admission Roll No: <?php echo $row['AdmissionRollNo']?></label></td>
                                <td>&nbsp;<label>Year: <?php echo $row['AdmissionYear']?>
                                    </label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="section"><span>1</span>Section 1 Program Details(For Office Use Only):</div>
                    <div class="inner-wrap">
                        <table>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <label>
                                                    Name of Program:
                                                        <?php
                                                        $this->db->where('id', $row['NameofProgram']);
                                                        $course_program = $this->db->get('course_program')->result_array();
                                                        foreach($course_program as $e1e):
                                                            echo $e1e['course_name'];
                                                        endforeach;
                                                        ?>
                                                </label>
                                            </td>
                                            <td>
                                                <label>Class Roll No: <?php echo $row['ClassRollNo']?></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Registration/ID No: <?php echo $row['RegistratioNo'];?></label>
                                            </td>
                                            <td>
                                                <label>Session: <?php echo $row['Session']?>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <div class="inner-wrap">
                                        <label>
                                            <a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="150" height="150" /></a>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="inner-wrap" style="display: none;">
                        <table class="tabl"><tr><td><label>
                                        Name of Program:
                                            <?php
                                            $this->db->where('id', $row['NameofProgram']);
                                            $course_program = $this->db->get('course_program')->result_array();
                                            foreach($course_program as $e1e):
                                                echo $e1e['course_name'];
                                            endforeach;
                                            ?>
                                    </label></td>
                                <td><label>Class Roll No: <?php echo $row['ClassRollNo'];?></td>
                                <td rowspan="3">
                                    <div class="inner-wrap">
                                        <label>
                                            <a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="150" height="150" /></a>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr><td><label>Registration/ID No: <?php echo $row['RegistratioNo'];?></label></td>
                                <td><label>Session: <?php echo $row['Session']?>
                                    </label></td></tr>
                    </div>

                    <div class="section"><span>2</span>Section 2 Program Details: </div>
                    <div class="inner-wrap"><table>
                            <tr>
                                <td><label>Name of the Applicant: <?php echo $row['NameofApplicant']?></label></td>
                                <td><label>Date of Birth(mm-dd-yy): <?php echo $row['ApplicantBirthDate']?></label></td></tr>
                            <tr><td><label>Father's Name: <?php echo $row['ApplicantFatherName']?></label></td>
                                <td><label>Mother's Name: <?php echo $row['ApplicantMotherName']?></label></td>
                            </tr>
                            <tr>
                                <td><label>Nationality: <?php echo $row['ApplicantNationality']?>
                                    </label></td>
                                <td><label>Gender: <?php echo $row['ApplicantGender']?>
                                    </label></td>
                            </tr>
                        </table></div>
                    <div class="inner-wrap"><h3>Present Address</h3><table>
                            <tr><td><label>House No: <?php echo $row['PresentHouse']?></label></td>
                                <td><label>Phone No: <?php echo $row['PresentPhone']?></label></td></tr>
                            <tr><td><label>Village: <?php echo $row['PresentVillage']?></label></td>
                                <td><label>Mobile No: <?php echo $row['PresentMobile']?></label></td></tr>
                            <tr><td><label>Post Office: <?php echo $row['PresentPostOffice']?></label></td>
                                <td><label>Fax No: <?php echo $row['PresentFaxNo']?></label></td></tr>
                            <tr><td><label>Pollice Station: <?php echo $row['PresentPoliceStation']?></label></td>
                                <td><label>E-mail: <?php echo $row['PresentEmail']?></label></td></tr>
                            <tr><td><label>District: <?php echo $row['PresentDistrict']?></label></td>
                        </table></div>

                    <div class="inner-wrap"><h3>Permanent Address (it differ from above)</h3>
                        <table><tr><td><label>House No: <?php echo $row['PermanentHouse']?></label></td>
                                <td><label>Phone No: <?php echo $row['PermanentPhone']?></label></td></tr>
                            <tr><td><label>Village: <?php echo $row['PermanentVillage']?></label></td>
                                <td><label>Mobile No: <?php echo $row['PermanentMobile']?></label></td></tr>
                            <tr><td><label>Post Office: <?php echo $row['PermanentPostOffice']?></label></td>
                                <td><label>Fax No: <?php echo $row['PermanentFaxNo']?></label></td></tr>
                            <tr><td><label>Pollice Station: <?php echo $row['PermanentPoliceStation']?></label></td>
                                <td><label>E-mail: <?php echo $row['PermanentEmail']?></label></td></tr>
                            <tr><td><label>District: <?php echo $row['PermanentDistrict']?></label></td>
                        </table></div>

                    <div class="section"><span>3</span>Academic Qualifications:(From upper to lower Degree):</div>
                    <div class="inner-wrap acdqual">
                        <table>
                            <tr><td><label>Certificate/Degree: <?php echo $row['CertificateName1']?>
                                    </label></td>
                                <td><label>Group/Discipline: <?php echo $row['CertificateGroup1']?>
                                    </label></td>
                                <td><label>Year of Passing: <?php echo $row['CertificateYear1']?>
                                    </label></td>
                                <td><label>Name of Institute/Board: <?php echo $row['CertificateNameofInstitute1']?></label></td>
                                <td><label>Division/CGPA: <?php echo $row['CertificateCGPA1']?></label></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <label>
                                        Certificate:
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentscert1]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentscert1]; ?>" width="50" height="50" /></a>
                                    </label>
                                </td>
                                <td colspan="3"><label>
                                        Marksheet:
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark1]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark1]; ?>" width="50" height="50" /></a>
                                    </label></td>
                            </tr>
                        </table>
                    </div>

                    <div class="inner-wrap">
                        <table>
                            <tr><td><label>Certificate/Degree: <?php echo $row['CertificateName2']?>
                                    </label></td>
                                <td><label>Group/Discipline: <?php echo $row['CertificateGroup2']?>
                                    </label></td>
                                <td><label>Year of Passing: <?php echo $row['CertificateYear2']?>
                                    </label></td>
                                <td><label>Name of Institute/Board: <?php echo $row['CertificateNameofInstitute2']?></label></td>
                                <td><label>Division/CGPA: <?php echo $row['CertificateCGPA2']?></label></td>
                            </tr>
                            <tr>
                                <td colspan="3"><label>Certificate:
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentscert2]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentscert2]; ?>" width="50" height="50" /></a>
                                    </label></td>
                                <td colspan="3"><label>Marksheet:
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark2]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark2]; ?>" width="50" height="50" /></a>
                                    </label></td>
                            </tr>
                        </table>
                    </div>

                    <div class="section"><span>4</span>Employment or Profession Records:(Only for service holder):</div>
                    <div class="inner-wrap">
                        <table>
                            <tr><td><label>Name of Organization(s): <?php echo $row['EmploymentNameofOrganizations1']?></label></td>
                                <td><label>From(mm-dd-yy): <?php echo $row['EmploymentFromDate1']?></label></td>
                                <td><label>To(mm-dd-yy): <?php echo $row['EmploymentToDate1']?></label></td>
                                <td><label>Position held: <?php echo $row['EmploymentPositionHeld1']?></label></td>
                                <td><label>
                                        Documents:
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[EmploymentDocuments1]; ?>"><img src="<?php echo "uploads/student_image/".$row[EmploymentDocuments1]; ?>" width="50" height="50" /></a>
                                    </label></td>
                            </tr>
                            <tr><td><label>Name of Organization(s): <?php echo $row['EmploymentNameofOrganizations2']?></label></td>
                                <td><label>From(mm-dd-yy): <?php echo $row['EmploymentFromDate2']?></label></td>
                                <td><label>To(mm-dd-yy): <?php echo $row['EmploymentToDate2']?></label></td>
                                <td><label>Position held: <?php echo $row['EmploymentPositionHeld2']?></label></td>
                                <td><label>Documents:
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[EmploymentDocuments2]; ?>"><img src="<?php echo "uploads/student_image/".$row[EmploymentDocuments2]; ?>" width="50" height="50" /></a>
                                    </label></td>
                            </tr>
                        </table>
                    </div>

                    <div class="section"><span>5</span>Names and address of two references:</div>
                    <div class="inner-wrap">
                        <table>
                            <tr>
                                <td>
                                    <table>
                                        <tr><td ><label>Name of reference 1: <?php echo $row['ReferenceName1']?></label></td>
                                        </tr>
                                        <tr>
                                            <td ><label>Address: <?php echo $row['ReferenceAddress1']?></label></td>
                                        </tr>
                                        <tr><td><label>Phone No: <?php echo $row['ReferencePhone1']?></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Mobile No: <?php echo $row['ReferenceMobile1']?></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>E-mail: <?php echo $row['ReferenceEmail1']?></label></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td ><label>Name of reference 2: <?php echo $row['ReferenceName2']?></label></td>
                                        </tr>
                                        <tr>
                                            <td ><label>Address: <?php echo $row['ReferenceAddress2']?></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Phone No: <?php echo $row['ReferencePhone2']?></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Mobile No: <?php echo $row['ReferenceMobile2']?></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>E-mail: <?php echo $row['ReferenceEmail2']?></label></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="section"><span>6</span>Declaration:</div>
                    <div class="inner-wrap">
                        <div class="declaration">
                            <span>I hereby accept that, I will be bound by the rules, regulations and student code of conduct of Pundro University of Science & Technology.</br>I hereby certify that the above statements are correct and complete to the best of my knowledge. I am aware that withholding requested in this application or giving false information will me ineligible for admission into PUST and will render me liable for dismissal, if admitted.</span>
                        </div>
                        </br></br>
                        <table>
                            <tr>
                                <td ><label>
                                        Signature of Applicant:
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[SignatureApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[SignatureApplicant]; ?>" width="50" height="50" /></a>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>


