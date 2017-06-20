<?php
//echo "here";
$edit_data		=	$this->db->get_where('course_instructor' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_course_instructor');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/course_instructor/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-style-10">
                    <div class="inner-wrap">
                        <table class="tabl tabltest">
                            <tr>
                                <td colspan="5"><div class="inner-wrap"><label>Photo<input type="file" name="InstructorPhoto" id="InstructorPhoto"/></label></div></td>
                            </tr>
                            <tr>
                                <td><label>
                                        Program<br/>
                                        <select name="NameofProgram" id="NameofProgram" class="form-control">
                                            <option value="<?php echo $row['NameofProgram'];?>"><?php echo $row['NameofProgram'];?></option>
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
                                    </label>
                                </td>
                                <td><label>
                                        Designation<br/>
                                        <select name="Designation" id="Designation" class="form-control">
                                            <option value="<?php echo $row['Designation'];?>"><?php echo $row['Designation'];?></option>
                                            <?php
                                            $asd = $this->db->get('designations')->result_array();
                                            foreach($asd as $row112d):
                                                ?>
                                                <option value="<?php echo $row112d['id'];?>">
                                                    <?php echo $row112d['value'];?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </label>
                                </td>
                                <td><label>Email <input type="text" name="InstructorEmail" value="<?php echo $row['InstructorEmail'];?>"/></label></td>
                                <td><label>Password <input type="text" name="InstructorPassword" value="<?php echo $row['InstructorPassword'];?>"/></label></td>
                                <td><label>Name<input type="text" name="InstructorName" id="InstructorName" value="<?php echo $row['InstructorName'];?>"/></label></td>
                            </tr>
                            <tr>
                                <td><label>Date of Birth(mm-dd-yy): <input type="text" class="datepicker" name="InstructorBirthDate" id="InstructorBirthDate" value="<?php echo $row['InstructorBirthDate'];?>"/></label></td>
                                <td><label>Father's Name <input type="text" name="InstructorFatherName" id="InstructorFatherName" value="<?php echo $row['InstructorFatherName'];?>"/></label></td>
                                <td><label>Mother's Name <input type="text" name="InstructorMotherName" id="InstructorMotherName" value="<?php echo $row['InstructorMotherName'];?>"/></label></td>
                                <td><label>Nationality
                                        <select name="InstructorNationality" id="InstructorNationality" class="form-control">
                                            <option value="<?php echo $row['InstructorNationality'];?>"><?php echo $row['InstructorNationality'];?></option>
                                            <?php
                                            $cc = $this->db->get('nationality')->result_array();
                                            foreach($cc as $ww112):
                                                ?>
                                                <option value="<?php echo $row['id'];?>">
                                                    <?php echo $row['Nationality'];?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </label>
                                </td>
                                <td><label>Gender<br/>
                                        <select name="InstructorGender" id="InstructorGender" class="form-control">
                                            <option value="<?php echo $row['InstructorGender'];?>"><?php echo $row['InstructorGender'];?></option>
                                            <?php
                                            $ccz = $this->db->get('gender')->result_array();
                                            foreach($ccz as $wzw112):
                                                ?>
                                                <option value="<?php echo $wzw112['id'];?>">
                                                    <?php echo $wzw112['Name'];?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="inner-wrap"><h3>Present Address</h3><table>
                            <tr><td><label>House No <input type="text" name="PresentHouse" id = "PresentHouse" value="<?php echo $row['PresentHouse'];?>"/></label></td>
                                <td><label>Phone No <input type="text" name="PresentPhone" id = "PresentPhone" value="<?php echo $row['PresentPhone'];?>"/></label></td></tr>
                            <tr><td><label>Village <input type="text" name="PresentVillage" id = "PresentVillage" value="<?php echo $row['PresentVillage'];?>"/></label></td>
                                <td><label>Mobile No <input type="text" name="PresentMobile" id = "PresentMobile" value="<?php echo $row['PresentMobile'];?>"/></label></td></tr>
                            <tr><td><label>Post Office <input type="text" name="PresentPostOffice" id="PresentPostOffice" value="<?php echo $row['PresentPostOffice'];?>"/></label></td>
                                <td><label>Fax No <input type="text" name="PresentFaxNo" value="<?php echo $row['PresentFaxNo'];?>"/></label></td></tr>
                            <tr><td><label>Pollice Station <input type="text" name="PresentPoliceStation" id="PresentPoliceStation" value="<?php echo $row['PresentPoliceStation'];?>"/></label></td>
                                <td><label>E-mail <input type="text" name="PresentEmail" value="<?php echo $row['PresentEmail'];?>"/></label></td></tr>
                            <tr><td><label>District <input type="text" name="PresentDistrict" id = "PresentDistrict" value="<?php echo $row['PresentDistrict'];?>"/></label></td>
                        </table></div>

                    <div class="inner-wrap"><h3>Permanent Address (it differ from above)</h3>
                        <table><tr><td><label>House No <input type="text" name="PermanentHouse" value="<?php echo $row['PermanentHouse'];?>"/></label></td>
                                <td><label>Phone No <input type="text" name="PermanentPhone" value="<?php echo $row['PermanentPhone'];?>"/></label></td></tr>
                            <tr><td><label>Village <input type="text" name="PermanentVillage" value="<?php echo $row['PermanentVillage'];?>"/></label></td>
                                <td><label>Mobile No <input type="text" name="PermanentMobile" value="<?php echo $row['PermanentMobile'];?>"/></label></td></tr>
                            <tr><td><label>Post Office <input type="text" name="PermanentPostOffice" value="<?php echo $row['PermanentPostOffice'];?>"/></label></td>
                                <td><label>Fax No <input type="text" name="PermanentFaxNo" value="<?php echo $row['PermanentFaxNo'];?>"/></label></td></tr>
                            <tr><td><label>Pollice Station <input type="text" name="PermanentPoliceStation" value="<?php echo $row['PermanentPoliceStation'];?>"/></label></td>
                                <td><label>E-mail <input type="text" name="PermanentEmail" value="<?php echo $row['PermanentEmail'];?>"/></label></td></tr>
                            <tr><td><label>District <input type="text" name="PermanentDistrict" value="<?php echo $row['PermanentDistrict'];?>"/></label></td>
                        </table></div>

                    <div class="section">Academic Qualifications:(From upper to lower Degree):</div>
                    <div class="inner-wrap acdqual">
                        <table>
                            <tr><td><label>Certificate/Degree
                                        <select name="CertificateName5" id="CertificateName5" class="form-control">
                                            <option value="<?php echo $row['CertificateName5'];?>"><?php echo $row['CertificateName5'];?></option>
                                            <?php
                                            $dd5 = $this->db->get('certificate_name')->result_array();
                                            foreach($dd5 as $r125):
                                                ?>
                                                <option value="<?php echo $r125['id'];?>">
                                                    <?php echo $r125['Name'];?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </label></td>
                                <td><label>Topics
                                        <input type="text" name="CertificateGroup5" id="CertificateGroup5" value="<?php echo $row['CertificateGroup5'];?>" />
                                    </label></td>
                                <td><label>Year of Passing
                                        <select name="CertificateYear5" id="CertificateYear5" class="form-control">
                                            <option value="<?php echo $row['CertificateYear5'];?>"><?php echo $row['CertificateYear5'];?></option>
                                            <?php
                                            $this->db->order_by('id', DESC);
                                            $m55 = $this->db->get('year_calendar')->result_array();
                                            foreach($m55 as $rw11255):
                                                ?>
                                                <option value="<?php echo $rw11255['id'];?>">
                                                    <?php echo $rw11255['Name'];?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </label></td>
                                <td><label>University <input type="text" name="CertificateNameofInstitute5" id="CertificateNameofInstitute5" value="<?php echo $row['CertificateNameofInstitute5'];?>"/></label></td>
                                <td><label>Division/CGPA <input type="text" name="CertificateCGPA5" id="CertificateCGPA5" value="<?php echo $row['CertificateCGPA5'];?>"/></label></td>
                                <td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert5" id="CertificateDocumentscert5" value="<?php echo $row['CertificateDocumentscert5'];?>"/></label></td>
                                <td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark5" id="CertificateDocumentsmark5" value="<?php echo $row['CertificateDocumentsmark5'];?>"/></label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="inner-wrap acdqual">
                        <table>
                            <tr><td><label>Certificate/Degree
                                        <select name="CertificateName1" id="CertificateName1" class="form-control">
                                            <option value="<?php echo $row['CertificateName1'];?>"><?php echo $row['CertificateName1'];?></option>
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
                                            <option value="<?php echo $row['CertificateGroup1'];?>"><?php echo $row['CertificateGroup1'];?></option>
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
                                            <option value="<?php echo $row['CertificateYear1'];?>"><?php echo $row['CertificateYear1'];?></option>
                                            <?php
                                            $this->db->order_by('id', DESC);
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
                                <td><label>Institute/Board <input type="text" name="CertificateNameofInstitute1" id="CertificateNameofInstitute1" value="<?php echo $row['CertificateNameofInstitute1'];?>"/></label></td>
                                <td><label>Division/CGPA <input type="text" name="CertificateCGPA1" id="CertificateCGPA1" value="<?php echo $row['CertificateCGPA1'];?>"/></label></td>
                                <td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert1" id="CertificateDocumentscert1" value="<?php echo $row['CertificateDocumentscert1'];?>"/></label></td>
                                <td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark1" id="CertificateDocumentsmark1" value="<?php echo $row['CertificateDocumentsmark1'];?>"/></label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="inner-wrap acdqual">
                        <table>
                            <tr><td><label>Certificate/Degree
                                        <select name="CertificateName2" id="CertificateName2" class="form-control">
                                            <option value="<?php echo $row['CertificateName2'];?>"><?php echo $row['CertificateName2'];?></option>
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
                                            <option value="<?php echo $row['CertificateGroup2'];?>"><?php echo $row['CertificateGroup2'];?></option>
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
                                            <option value="<?php echo $row['CertificateYear2'];?>"><?php echo $row['CertificateYear2'];?></option>
                                            <?php
                                            $this->db->order_by('id', DESC);
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
                                <td><label>Institute/Board <input type="text" name="CertificateNameofInstitute2" id="CertificateNameofInstitute2" value="<?php echo $row['CertificateNameofInstitute2'];?>"/></label></td>
                                <td><label>Division/CGPA <input type="text" name="CertificateCGPA2" id="CertificateCGPA2" value="<?php echo $row['CertificateCGPA2'];?>"/></label></td>
                                <td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert2" id="CertificateDocumentscert2" value="<?php echo $row['CertificateDocumentscert2'];?>"/></label></td>
                                <td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark2" id="CertificateDocumentsmark2" value="<?php echo $row['CertificateDocumentsmark2'];?>"/></label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="inner-wrap acdqual">
                        <table>
                            <tr><td><label>Certificate/Degree
                                        <select name="CertificateName3" id="CertificateName3" class="form-control">
                                            <option value="<?php echo $row['CertificateName3'];?>"><?php echo $row['CertificateName3'];?></option>
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
                                        <select name="CertificateGroup3" id="CertificateGroup3" class="form-control">
                                            <option value="<?php echo $row['CertificateGroup3'];?>"><?php echo $row['CertificateGroup3'];?></option>
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
                                        <select name="CertificateYear3" id="CertificateYear3" class="form-control">
                                            <option value="<?php echo $row['CertificateYear3'];?>"><?php echo $row['CertificateYear3'];?></option>
                                            <?php
                                            $this->db->order_by('id', DESC);
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
                                <td><label>Institute/Board <input type="text" name="CertificateNameofInstitute3" id="CertificateNameofInstitute3" value="<?php echo $row['CertificateNameofInstitute3'];?>"/></label></td>
                                <td><label>Division/CGPA <input type="text" name="CertificateCGPA3" id="CertificateCGPA3" value="<?php echo $row['CertificateCGPA3'];?>"/></label></td>
                                <td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert3" id="CertificateDocumentscert3" value="<?php echo $row['CertificateDocumentscert3'];?>"/></label></td>
                                <td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark3" id="CertificateDocumentsmark3" value="<?php echo $row['CertificateDocumentsmark3'];?>"/></label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="inner-wrap acdqual">
                        <table>
                            <tr><td><label>Certificate/Degree
                                        <select name="CertificateName4" id="CertificateName4" class="form-control">
                                            <option value="value="<?php echo $row['CertificateName4'];?>""><?php echo $row['CertificateName4'];?></option>
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
                                        <select name="CertificateGroup4" id="CertificateGroup4" class="form-control">
                                            <option value="<?php echo $row['CertificateGroup4'];?>"><?php echo $row['CertificateGroup4'];?></option>
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
                                        <select name="CertificateYear4" id="CertificateYear4" class="form-control">
                                            <option value="<?php echo $row['CertificateYear4'];?>"><?php echo $row['CertificateYear4'];?></option>
                                            <?php
                                            $this->db->order_by('id', DESC);
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
                                <td><label>Institute/Board <input type="text" name="CertificateNameofInstitute4" id="CertificateNameofInstitute4" value="<?php echo $row['CertificateNameofInstitute4'];?>"/></label></td>
                                <td><label>Division/CGPA <input type="text" name="CertificateCGPA4" id="CertificateCGPA4" value="<?php echo $row['CertificateCGPA4'];?>"/></label></td>
                                <td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert4" id="CertificateDocumentscert4" value="<?php echo $row['CertificateDocumentscert4'];?>"/></label></td>
                                <td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark4" id="CertificateDocumentsmark4" value="<?php echo $row['CertificateDocumentsmark4'];?>"/></label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="section">Employment or Profession Records:(Only for service holder):</div>
                    <div class="inner-wrap">
                        <table>
                            <tr><td><label>Name of Organization(s) <input type="text" name="EmploymentNameofOrganizations1" value="<?php echo $row['EmploymentNameofOrganizations1'];?>" /></label></td>
                                <td><label>From(mm-dd-yy) <input type="text" class="datepicker" name="EmploymentFromDate1" value="<?php echo $row['EmploymentFromDate1'];?>"/></label></td>
                                <td><label>To(mm-dd-yy) <input type="text" class="datepicker" name="EmploymentToDate1" value="<?php echo $row['EmploymentToDate1'];?>"/></label></td>
                                <td><label>Position held <input type="text" name="EmploymentPositionHeld1" value="<?php echo $row['EmploymentPositionHeld1'];?>"/></label></td>
                                <td colspan="2"><label>Add Documents <input type="file" name="EmploymentDocuments1" value="<?php echo $row['EmploymentDocuments1'];?>"/></label></td>
                            </tr>
                            <tr><td><label>Name of Organization(s) <input type="text" name="EmploymentNameofOrganizations2" value="<?php echo $row['EmploymentNameofOrganizations2'];?>"/></label></td>
                                <td><label>From(mm-dd-yy) <input type="text" class="datepicker" name="EmploymentFromDate2" value="<?php echo $row['EmploymentFromDate2'];?>"/></label></td>
                                <td><label>To(mm-dd-yy) <input type="text" class="datepicker" name="EmploymentToDate2" value="<?php echo $row['EmploymentToDate2'];?>"/></label></td>
                                <td><label>Position held <input type="text" name="EmploymentPositionHeld2" value="<?php echo $row['EmploymentPositionHeld2'];?>"/></label></td>
                                <td colspan="2"><label>Add Documents <input type="file" name="EmploymentDocuments2" value="<?php echo $row['EmploymentDocuments2'];?>"/></label></td>
                            </tr>
                        </table>
                    </div>

                    <div class="section">Names and address of two references:</div>
                    <div class="inner-wrap">
                        <table>
                            <tr>
                                <td>
                                    <table>
                                        <tr><td><label>Name<input type="text" name="ReferenceName1" id="ReferenceName1" value="<?php echo $row['ReferenceName1'];?>"/></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Address <textarea type="text" name="ReferenceAddress1" id="ReferenceAddress1" value="<?php echo $row['ReferenceAddress1'];?>"><?php echo $row['ReferenceAddress1'];?></textarea></label></td>
                                        </tr>
                                        <tr><td><label>Phone No<input type="text" name="ReferencePhone1" value="<?php echo $row['ReferencePhone1'];?>"/></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Mobile No<input type="text" name="ReferenceMobile1" id="ReferenceMobile1" value="<?php echo $row['ReferenceMobile1'];?>"/></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>E-mail<input type="text" name="ReferenceEmail1" id="ReferenceEmail1" value="<?php echo $row['ReferenceEmail1'];?>"/></label></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td ><label>Name<input type="text" name="ReferenceName2" value="<?php echo $row['ReferenceName2'];?>"/></label></td>
                                        </tr>
                                        <tr><td ><label>Address <textarea type="text" name="ReferenceAddress2" value="<?php echo $row['ReferenceAddress2'];?>"><?php echo $row['ReferenceAddress2'];?></textarea></label></td>
                                        </tr>
                                        <tr><td><label>Phone No<input type="text" name="ReferencePhone2" value="<?php echo $row['ReferencePhone2'];?>"/></label></td></tr>
                                        <tr><td><label>Mobile No<input type="text" name="ReferenceMobile2" value="<?php echo $row['ReferenceMobile2'];?>"/></label></td></tr>
                                        <tr><td><label>E-mail<input type="text" name="ReferenceEmail2" value="<?php echo $row['ReferenceEmail2'];?>"/></label></td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="section">Other Documents:</div>
                    <div class="inner-wrap">
                        <table>
                            <tr>
                                <td colspan="2" class="otherdocs">
                                    <span><label for="">Other Documents</label></span>
                                    <div><label>National ID Card</label> <input type="file" name="InstructorNationalID" value="<?php echo $row['InstructorNationalID'];?>"/></div>
                                    <div><label>Passport </label><input type="file" name="InstructorPassport" value="<?php echo $row['InstructorPassport'];?>"/></div>
                                    <div><label>Driving Licence </label> <input type="file" name="" value="<?php echo $row['InstructorDrivingLicence'];?>"/></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="section">Declaration:</div>
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
                                <td ><label>Signature of Instructor: <input type="file" name="InstructorSignature" /></label></td>
                                <td colspan="2"><label>Date<input type="text" class="datepicker" name="InstructorJoiningDate" id="" value="<?php echo $row['InstructorJoiningDate'];?>"/></label></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('update');?></button>
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


