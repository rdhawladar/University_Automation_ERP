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
					<?php echo get_phrase('edit_applicants');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/online_admission/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-style-10">
                    <h1>Admission Form</h1>

                    <div class="inner-wrap">
                        <table>
                            <tr>
                                <td>Session: &nbsp;&nbsp;&nbsp;
										<span>
											<input type="checkbox" name="Session[]" value="<?php echo $row['Session']?>" /><?php echo $row['Session']?>
										</span>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><label>Admission Form Serial No<input type="text" name="AdmFormSerialNo" value="<?php echo $row['AdmFormSerialNo']?>"/></label></td>
                                <td><label>Admission Roll No<input type="text" name="AdmissionRollNo" value="<?php echo $row['AdmissionRollNo']?>"/></label></td>
                                <td><label>Year<input type="text" name="AdmissionYear" value="<?php echo $row['AdmissionYear']?>"/></label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="section"><span>1</span>Section 1 Program Details(For Office Use Only):</div>
                    <div class="inner-wrap">
                        <table class="tabl"><tr><td><label>Name of Program <input type="text" name="NameofProgram" value="<?php echo $row['NameofProgram']?>"/></label></td>
                                <td><label>Class Roll No <input type="text" name="ClassRollNo" value="<?php echo $row['ClassRollNo']?>"/></label></td>
                                <td rowspan="3">
                                    <div class="inner-wrap">
                                        <label>
                                            <a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="50" height="50" /></a>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr><td><label>Registration/ID No <input type="text" name="RegistratioNo" value="<?php echo $row['RegistratioNo']?>"/></label></td>
                                <td><label>Session: <input type="text" name="field10" value="<?php echo $row['Session']?>"/></label></td></tr>
                            <tr><td colspan="2"><label>Year <input type="text" name="AdmissionYear" value="<?php echo $row['AdmissionYear']?>"/></label></table></td></tr>
                    </div>

                    <div class="section"><span>2</span>Section 2 Program Details: </div>
                    <div class="inner-wrap"><table>
                            <tr>
                                <td><label>Name of the Applicant <input type="text" name="NameofApplicant" value="<?php echo $row['NameofApplicant']?>"/></label></td>
                                <td><label>Date of Birth(dd-mm-yy): <input type="text" name="ApplicantBirthDate" value="<?php echo $row['ApplicantBirthDate']?>"/></label></td></tr>
                            <tr><td><label>Father's Name <input type="text" name="ApplicantFatherName" value="<?php echo $row['ApplicantFatherName']?>"/></label></td>
                                <td><label>Mother's Name <input type="text" name="ApplicantMotherName" value="<?php echo $row['ApplicantMotherName']?>"/></label></td>
                            </tr>
                            <tr>
                                <td><label>Nationality <input type="text" name="ApplicantNationality" value="<?php echo $row['ApplicantNationality']?>"/></label></td>
                                <td>
                                    <input type="checkbox" name="ApplicantGender[]" value="<?php echo $row['ApplicantGender']?>"><span><?php echo $row['ApplicantGender']?></span>
                                </td>
                            </tr>
                        </table></div>

                    <div class="inner-wrap"><h3>Present Address</h3><table>
                            <tr><td><label>House No <input type="text" name="PresentHouse" value="<?php echo $row['PresentHouse']?>"/></label></td>
                                <td><label>Phone No <input type="text" name="PresentPhone" value="<?php echo $row['PresentPhone']?>"/></label></td></tr>
                            <tr><td><label>Village <input type="text" name="PresentVillage" value="<?php echo $row['PresentVillage']?>"/></label></td>
                                <td><label>Mobile No <input type="text" name="PresentMobile" value="<?php echo $row['PresentMobile']?>"/></label></td></tr>
                            <tr><td><label>Post Office <input type="text" name="PresentPostOffice" value="<?php echo $row['PresentPostOffice']?>"/></label></td>
                                <td><label>Fax No <input type="text" name="PresentFaxNo" value="<?php echo $row['PresentFaxNo']?>"/></label></td></tr>
                            <tr><td><label>Pollice Station <input type="text" name="PresentPoliceStation" value="<?php echo $row['PresentPoliceStation']?>"/></label></td>
                                <td><label>E-mail <input type="text" name="PresentEmail" value="<?php echo $row['PresentEmail']?>"/></label></td></tr>
                            <tr><td colspan="2"><label>District <input type="text" name="PresentDistrict" value="<?php echo $row['PresentDistrict']?>"/></label></td>
                        </table></div>

                    <div class="inner-wrap"><h3>Permanent Address (it differ from above)</h3>
                        <table><tr><td><label>House No <input type="text" name="PermanentHouse" value="<?php echo $row['PermanentHouse']?>"/></label></td>
                                <td><label>Phone No <input type="text" name="PermanentPhone" value="<?php echo $row['PermanentPhone']?>"/></label></td></tr>
                            <tr><td><label>Village <input type="text" name="PermanentVillage" value="<?php echo $row['PermanentVillage']?>"/></label></td>
                                <td><label>Mobile No <input type="text" name="PermanentMobile" value="<?php echo $row['PermanentMobile']?>"/></label></td></tr>
                            <tr><td><label>Post Office <input type="text" name="PermanentPostOffice" value="<?php echo $row['PermanentPostOffice']?>"/></label></td>
                                <td><label>Fax No <input type="text" name="PermanentFaxNo" value="<?php echo $row['PermanentFaxNo']?>"/></label></td></tr>
                            <tr><td><label>Pollice Station <input type="text" name="PermanentPoliceStation" value="<?php echo $row['PermanentPoliceStation']?>"/></label></td>
                                <td><label>E-mail <input type="text" name="PermanentEmail" value="<?php echo $row['PermanentEmail']?>"/></label></td></tr>
                            <tr><td colspan="2"><label>District <input type="text" name="PermanentDistrict" value="<?php echo $row['PermanentDistrict']?>"/></label></td>
                        </table></div>

                    <div class="section"><span>3</span>Academic Qualifications:(From upper to lower Degree):</div>
                    <div class="inner-wrap">
                        <table>
                            <tr><td><label>Certificate/Degree <input type="text" name="CertificateName1" value="<?php echo $row['CertificateName1']?>"/></label></td>
                                <td><label>Group/Discipline <input type="text" name="CertificateGroup1" value="<?php echo $row['CertificateGroup1']?>"/></label></td>
                                <td><label>Year of Passing <input type="text" name="CertificateYear1" value="<?php echo $row['CertificateYear1']?>"/></label></td>
                            </tr>
                            <tr>
                                <td><label>Name of Institute/Board <input type="text" name="CertificateNameofInstitute1" value="<?php echo $row['CertificateNameofInstitute1']?>"/></label></td>
                                <td><label>Division/CGPA <input type="text" name="CertificateCGPA1" value="<?php echo $row['CertificateCGPA1']?>"/></label></td>
                                <td><label>Points obtained <input type="text" name="CertificatePointsObtained1" value="<?php echo $row['CertificatePointsObtained1']?>"/> </label></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        Certificate
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentscert1]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentscert1]; ?>" width="50" height="50" /></a>
                                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td><label>
                                        Marksheet
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark1]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark1]; ?>" width="50" height="50" /></a>
                                        </label></td>
                            </tr>
                        </table>
                    </div>

                    <div class="inner-wrap">
                        <table>
                            <tr><td><label>Certificate/Degree <input type="text" name="CertificateName2" value="<?php echo $row['CertificateName2']?>"/></label></td>
                                <td><label>Group/Discipline <input type="text" name="CertificateGroup2" value="<?php echo $row['CertificateGroup2']?>"/></label></td>
                                <td><label>Year of Passing <input type="text" name="CertificateYear2" value="<?php echo $row['CertificateYear2']?>"/></label></td>
                            </tr>
                            <tr>
                                <td><label>Name of Institute/Board <input type="text" name="CertificateNameofInstitute2" value="<?php echo $row['CertificateNameofInstitute2']?>"/></label></td>
                                <td><label>Division/CGPA <input type="text" name="CertificateCGPA2" value="<?php echo $row['CertificateCGPA2']?>"/></label></td>
                                <td><label>Points obtained <input type="text" name="CertificatePointsObtained2" value="<?php echo $row['CertificatePointsObtained2']?>"/></label></td>
                            </tr>
                            <tr>
                                <td><label>Certificate
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentscert2]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentscert2]; ?>" width="50" height="50" /></a>
                                        </label></td>
                            </tr>
                            <tr>
                                <td><label>Marksheet
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark2]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark2]; ?>" width="50" height="50" /></a>
                                        </label></td>
                            </tr>
                        </table>
                    </div>

                    <div class="section"><span>4</span>Employment or Profession Records:(Only for service holder):</div>
                    <div class="inner-wrap">
                        <table>
                            <tr><td><label>Name of Organization(s) <input type="text" name="EmploymentNameofOrganizations1" value="<?php echo $row['EmploymentNameofOrganizations1']?>"/></label></td>
                                <td><label>From(dd-mm-yy) <input type="text" name="EmploymentFromDate1" value="<?php echo $row['EmploymentFromDate1']?>"/></label></td>
                                <td><label>To(dd-mm-yy) <input type="text" name="EmploymentToDate1" value="<?php echo $row['EmploymentToDate1']?>"/></label></td>
                                <td><label>Position held <input type="text" name="EmploymentPositionHeld1" value="<?php echo $row['EmploymentPositionHeld1']?>"/></label></td>
                            </tr>
                            <tr><td><label>Name of Organization(s) <input type="text" name="EmploymentNameofOrganizations2" value="<?php echo $row['EmploymentNameofOrganizations2']?>"/></label></td>
                                <td><label>From(dd-mm-yy) <input type="text" name="EmploymentFromDate2" value="<?php echo $row['EmploymentFromDate2']?>"/></label></td>
                                <td><label>To(dd-mm-yy) <input type="text" name="EmploymentToDate2" value="<?php echo $row['EmploymentToDate2']?>"/></label></td>
                                <td><label>Position held <input type="text" name="EmploymentPositionHeld2" value="<?php echo $row['EmploymentPositionHeld2']?>"/></label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><label>
                                        Documents
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[EmploymentDocuments1]; ?>"><img src="<?php echo "uploads/student_image/".$row[EmploymentDocuments1]; ?>" width="50" height="50" /></a>
                                        </label></td>
                                <td colspan="2"><label>Documents
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[EmploymentDocuments2]; ?>"><img src="<?php echo "uploads/student_image/".$row[EmploymentDocuments2]; ?>" width="50" height="50" /></a>
                                        </label></td>
                            </tr>
                        </table>
                    </div>

                    <div class="section"><span>5</span>Names and address of two references:</div>
                    <div class="inner-wrap">
                        <table>
                            <tr><td ><label>Name of reference 1 <input type="text" name="ReferenceName1" value="<?php echo $row['ReferenceName1']?>"/></label></td>
                                <td ><label>Name of reference 2 <input type="text" name="ReferenceName2" value="<?php echo $row['ReferenceName2']?>"/></label></td>
                            </tr>
                            <tr>
                                <td ><label>Address <textarea type="text" name="ReferenceAddress1"><?php echo $row['ReferenceAddress1']; ?></textarea></label></td>
                                <td ><label>Address <textarea type="text" name="ReferenceAddress2"><?php echo $row['ReferenceAddress2']; ?></textarea></label></td>
                            </tr>
                            <tr><td><label>Phone No<input type="text" name="ReferencePhone1" value="<?php echo $row['ReferencePhone1']?>"/></label></td>
                                <td><label>Phone No<input type="text" name="ReferencePhone2" value="<?php echo $row['ReferencePhone2']?>"/></label></td>
                            </tr>
                            <tr>
                                <td><label>Mobile No<input type="text" name="ReferenceMobile1" value="<?php echo $row['ReferenceMobile1']?>"/></label></td>
                                <td><label>Mobile No<input type="text" name="ReferenceMobile2" value="<?php echo $row['ReferenceMobile2']?>"/></label></td>
                            </tr>
                            <tr>
                                <td><label>E-mail<input type="text" name="ReferenceEmail1" value="<?php echo $row['ReferenceEmail1']?>"/></label></td>
                                <td><label>E-mail<input type="text" name="ReferenceEmail2" value="<?php echo $row['ReferenceEmail2']?>"/></label></td>
                            </tr>
                        </table>
                    </div>

                    <div class="section"><span>6</span>Declaration:</div>
                    <div class="inner-wrap">
                        <div class="declaration">
                            <span>I hereby accept that, I will be bound by the rules, regulations and student code of conduct of Pundro University of Science & Technology.</br>I hereby certify that the above statements are correct and complete to the best of my knowledge. I am aware that withholding requested in this application or giving false information will me ineligible for admission into PUST and will render me liable for dismissal, if admitted.</span>
                            </br><span class="privacy-policy">
				   <input type="checkbox" name="terms12" value="check" id="terms12">You agree to our Terms and Policy.
			    </span>
                        </div>
                        </br></br>
                        <table>
                            <tr>
                                <td ><label>
                                        Signature of Applicant:
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[SignatureApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[SignatureApplicant]; ?>" width="50" height="50" /></a>
                                    </label>
                                </td>
                                <td colspan="2"><label>Date<input type="text" name="ApplicationDate" value="<?php echo $row['ApplicationDate']; ?>"/></label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('update_application');?></button>
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


