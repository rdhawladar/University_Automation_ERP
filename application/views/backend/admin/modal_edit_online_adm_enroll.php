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
					<?php echo get_phrase('edit_applicantion');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/online_admission/enroll/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-style-10">
                    <h1>Admission Form</h1>

                    <div class="inner-wrap">
                        <table>
                            <tr>
                                <td>&nbsp;<label>
                                        Admission Form Serial No
                                            <input type="text" readonly name="AdmFormSerialNo" readonly value="<?php echo $row['AdmFormSerialNo']?>"/>
                                    </label></td>
                                <td>&nbsp;<label>Admission Roll No<input type="text" readonly name="AdmissionRollNo" value="<?php echo $row['AdmissionRollNo']?>" id="AdmissionRollNo" /></label></td>
                                <td>&nbsp;<label>Year
                                        <input type="text" readonly name="AdmissionYear" value="<?php echo $row['AdmissionYear']?>" id="AdmissionRollNo" />
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
                                                    Name of Program
                                                    <input type="text" readonly name="NameofProgram" value="<?php echo $row['NameofProgram']?>" id="AdmissionRollNo" />
                                                </label>
                                            </td>
                                            <td>
                                                <label>Class Roll No <input type="text" name="ClassRollNo" value="<?php echo $row['ClassRollNo']?>"/></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Registration/ID No <input type="text" name="RegistratioNo" value="<?php echo $row['RegistratioNo'];?>"/></label>
                                            </td>
                                            <td>
                                                <label>Session:
                                                    <input type="text" readonly name="Session" value="<?php echo $row['Session']?>" id="AdmissionRollNo" />
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <label for=""><?php get_phrase('batch_name');?></label>
                                                <select name="NameofBatch" class="form-control">
                                                    <option value=""><?php echo get_phrase('select_batch');?></option>
                                                    <?php
                                                    $batc = $this->db->get('batch')->result_array();
                                                    foreach($batc as $row21):
                                                        ?>
                                                        <option value="<?php echo $row21['id'];?>">
                                                            <?php echo $row21['batch_name']." (".$row21['batch_alias'].")";?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </select>
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
                    <div class="section"><span>2</span>Section 2 Program Details: </div>
                    <div class="inner-wrap"><table>
                            <tr>
                                <td><label>Name of the Applicant <input type="text" readonly name="NameofApplicant" id="NameofApplicant" value="<?php echo $row['NameofApplicant']?>"/></label></td>
                                <td><label>Date of Birth(mm-dd-yy): <input type="text" readonly class="datepicker" readonly name="ApplicantBirthDate" value="<?php echo $row['ApplicantBirthDate']?>" id="ApplicantBirthDate"/></label></td></tr>
                            <tr><td><label>Father's Name <input type="text" readonly name="ApplicantFatherName" id="ApplicantFatherName" value="<?php echo $row['ApplicantFatherName']?>"/></label></td>
                                <td><label>Mother's Name <input type="text" readonly name="ApplicantMotherName" id="ApplicantMotherName" value="<?php echo $row['ApplicantMotherName']?>"/></label></td>
                            </tr>
                            <tr>
                                <td><label>Nationality
                                        <input type="text" readonly name="ApplicantNationality" value="<?php echo $row['ApplicantNationality'];?>"/>
                                    </label></td>
                                <td><label>Gender &nbsp;&nbsp;
                                        <input type="text" readonly name="ApplicantGender" value="<?php echo $row['ApplicantGender'];?>"/>
                                    </label></td>
                            </tr>
                        </table></div>
                    <div class="inner-wrap"><h3>Present Address</h3><table>
                            <tr><td><label>House No <input type="text" readonly name="PresentHouse" id = "PresentHouse" value="<?php echo $row['PresentHouse']?>" /></label></td>
                                <td><label>Phone No <input type="text" readonly name="PresentPhone" id = "PresentPhone" value="<?php echo $row['PresentPhone']?>"/></label></td></tr>
                            <tr><td><label>Village <input type="text" readonly name="PresentVillage" id = "PresentVillage" value="<?php echo $row['PresentVillage']?>"/></label></td>
                                <td><label>Mobile No <input type="text" readonly name="PresentMobile" id = "PresentMobile" value="<?php echo $row['PresentMobile']?>"/></label></td></tr>
                            <tr><td><label>Post Office <input type="text" readonly name="PresentPostOffice" id="PresentPostOffice" value="<?php echo $row['PresentPostOffice']?>"/></label></td>
                                <td><label>Fax No <input type="text" readonly name="PresentFaxNo" value="<?php echo $row['PresentFaxNo']?>"/></label></td></tr>
                            <tr><td><label>Pollice Station <input type="text" readonly name="PresentPoliceStation" id="PresentPoliceStation" value="<?php echo $row['PresentPoliceStation']?>"/></label></td>
                                <td><label>E-mail <input type="text" readonly name="PresentEmail" value="<?php echo $row['PresentEmail']?>" /></label></td></tr>
                            <tr><td><label>District <input type="text" readonly name="PresentDistrict" id = "PresentDistrict" value="<?php echo $row['PresentDistrict']?>"/></label></td>
                        </table></div>

                    <div class="inner-wrap"><h3>Permanent Address (it differ from above)</h3>
                        <table><tr><td><label>House No <input type="text" readonly name="PermanentHouse" value="<?php echo $row['PermanentHouse']?>"/></label></td>
                                <td><label>Phone No <input type="text" readonly name="PermanentPhone" value="<?php echo $row['PermanentPhone']?>"/></label></td></tr>
                            <tr><td><label>Village <input type="text" readonly name="PermanentVillage" value="<?php echo $row['PermanentVillage']?>"/></label></td>
                                <td><label>Mobile No <input type="text" readonly name="PermanentMobile" value="<?php echo $row['PermanentMobile']?>"/></label></td></tr>
                            <tr><td><label>Post Office <input type="text" readonly name="PermanentPostOffice" value="<?php echo $row['PermanentPostOffice']?>"/></label></td>
                                <td><label>Fax No <input type="text" readonly name="PermanentFaxNo" value="<?php echo $row['PermanentFaxNo']?>"/></label></td></tr>
                            <tr><td><label>Pollice Station <input type="text" readonly name="PermanentPoliceStation" value="<?php echo $row['PermanentPoliceStation']?>"/></label></td>
                                <td><label>E-mail <input type="text" readonly name="PermanentEmail" value="<?php echo $row['PermanentEmail']?>"/></label></td></tr>
                            <tr><td><label>District <input type="text" readonly name="PermanentDistrict" value="<?php echo $row['PermanentDistrict']?>"/></label></td>
                        </table></div>

                    <div class="section"><span>3</span>Academic Qualifications:(From upper to lower Degree):</div>
                    <div class="inner-wrap acdqual">
                        <table>
                            <tr><td><label>Certificate/Degree
                                        <input type="text" readonly name="CertificateName1" value="<?php echo $row['CertificateName1']?>"/>
                                    </label></td>
                                <td><label>Group/Discipline
                                        <input type="text" readonly name="CertificateGroup1" value="<?php echo $row['CertificateGroup1']?>"/>
                                    </label></td>
                                <td><label>Year of Passing
                                        <input type="text" readonly name="CertificateYear1" value="<?php echo $row['CertificateYear1']?>"/>
                                    </label></td>
                                <td><label>Name of Institute/Board <input type="text" readonly name="CertificateNameofInstitute1" id="CertificateNameofInstitute1" value="<?php echo $row['CertificateNameofInstitute1']?>"/></label></td>
                                <td><label>Division/CGPA <input type="text" readonly name="CertificateCGPA1" id="CertificateCGPA1" value="<?php echo $row['CertificateCGPA1']?>"/></label></td>
                                <td><label>Points obtained <input type="text" readonly name="CertificatePointsObtained1" placeholder="(filled by office)"</label></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <label>
                                        Certificate
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentscert1]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentscert1]; ?>" width="50" height="50" /></a>
                                    </label>
                                </td>
                                <td colspan="3"><label>
                                        Marksheet
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark1]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark1]; ?>" width="50" height="50" /></a>
                                    </label></td>
                            </tr>
                        </table>
                    </div>

                    <div class="inner-wrap">
                        <table>
                            <tr><td><label>Certificate/Degree
                                        <input type="text" readonly name="CertificateName2" value="<?php echo $row['CertificateName2']?>"/>
                                    </label></td>
                                <td><label>Group/Discipline
                                        <input type="text" readonly name="CertificateGroup2" value="<?php echo $row['CertificateGroup2']?>"/>
                                    </label></td>
                                <td><label>Year of Passing
                                        <input type="text" readonly name="CertificateYear2" value="<?php echo $row['CertificateYear2']?>"/>
                                    </label></td>
                                <td><label>Name of Institute/Board <input type="text" readonly value="<?php echo $row['CertificateNameofInstitute2']?>" name="CertificateNameofInstitute2" id="CertificateNameofInstitute2"/></label></td>
                                <td><label>Division/CGPA <input type="text" readonly value="<?php echo $row['CertificateCGPA2']?>" name="CertificateCGPA2" id="CertificateCGPA2"/></label></td>
                                <td><label>Points obtained <input type="text" readonly name="CertificatePointsObtained2" placeholder="(filled by office)"</label></td>
                            </tr>
                            <tr>
                                <td colspan="3"><label>Certificate
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentscert2]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentscert2]; ?>" width="50" height="50" /></a>
                                    </label></td>
                                <td colspan="3"><label>Marksheet
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark2]; ?>"><img src="<?php echo "uploads/student_image/".$row[CertificateDocumentsmark2]; ?>" width="50" height="50" /></a>
                                    </label></td>
                            </tr>
                        </table>
                    </div>

                    <div class="section"><span>4</span>Employment or Profession Records:(Only for service holder):</div>
                    <div class="inner-wrap">
                        <table>
                            <tr><td><label>Name of Organization(s) <input type="text" readonly value="<?php echo $row['EmploymentNameofOrganizations1']?>" name="EmploymentNameofOrganizations1" /></label></td>
                                <td><label>From(mm-dd-yy) <input type="text" class="datepicker" readonly value="<?php echo $row['EmploymentFromDate1']?>" name="EmploymentFromDate1"/></label></td>
                                <td><label>To(mm-dd-yy) <input type="text" class="datepicker" readonly value="<?php echo $row['EmploymentToDate1']?>" name="EmploymentToDate1" /></label></td>
                                <td><label>Position held <input type="text" readonly value="<?php echo $row['EmploymentPositionHeld1']?>" name="EmploymentPositionHeld1" /></label></td>
                                <td><label>
                                        Documents
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[EmploymentDocuments1]; ?>"><img src="<?php echo "uploads/student_image/".$row[EmploymentDocuments1]; ?>" width="50" height="50" /></a>
                                    </label></td>
                            </tr>
                            <tr><td><label>Name of Organization(s) <input type="text" readonly value="<?php echo $row['EmploymentNameofOrganizations2']?>" name="EmploymentNameofOrganizations2" /></label></td>
                                <td><label>From(mm-dd-yy) <input type="text" class="datepicker" readonly value="<?php echo $row['EmploymentFromDate2']?>" name="EmploymentFromDate2" /></label></td>
                                <td><label>To(mm-dd-yy) <input type="text" class="datepicker" readonly value="<?php echo $row['EmploymentToDate2']?>" name="EmploymentToDate2" /></label></td>
                                <td><label>Position held <input type="text" readonly value="<?php echo $row['EmploymentPositionHeld2']?>" name="EmploymentPositionHeld2" /></label></td>
                                <td><label>Documents
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
                                        <tr><td ><label>Name of reference 1 <input type="text" readonly value="<?php echo $row['ReferenceName1']?>" name="ReferenceName1" id="ReferenceName1"/></label></td>
                                        </tr>
                                        <tr>
                                            <td ><label>Address <textarea type="text" readonly value="<?php echo $row['ReferenceAddress1']?>" name="ReferenceAddress1" id="ReferenceAddress1"></textarea></label></td>
                                        </tr>
                                        <tr><td><label>Phone No<input type="text" readonly value="<?php echo $row['ReferencePhone1']?>" name="ReferencePhone1"/></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Mobile No<input type="text" readonly value="<?php echo $row['ReferenceMobile1']?>" name="ReferenceMobile1" id="ReferenceMobile1"/></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>E-mail<input type="text" readonly value="<?php echo $row['ReferenceEmail1']?>" name="ReferenceEmail1" id="ReferenceEmail1"/></label></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td ><label>Name of reference 2 <input type="text" readonly value="<?php echo $row['ReferenceName2']?>" name="ReferenceName2" /></label></td>
                                        </tr>
                                        <tr>
                                            <td ><label>Address <textarea type="text" readonly value="<?php echo $row['ReferenceAddress2']?>" name="ReferenceAddress2"></textarea></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Phone No<input type="text" readonly value="<?php echo $row['ReferencePhone2']?>" name="ReferencePhone2" /></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Mobile No<input type="text" readonly value="<?php echo $row['ReferenceMobile2']?>" name="ReferenceMobile2" /></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>E-mail<input type="text" readonly value="<?php echo $row['ReferenceEmail2']?>" name="ReferenceEmail2"/></label></td>
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
                            <br/><br/><span class="privacy-policy">
				   <input type="checkbox" readonly name="terms12" value="check" id="terms12">You agree to our Terms and Policy.
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
                                <td colspan="2"><label>Date<input type="text" class="datepicker" readonly value="<?php echo $row['ApplicationDate']?>" name="ApplicationDate" id="ApplicationDate"/></label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('enroll');?></button>
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


