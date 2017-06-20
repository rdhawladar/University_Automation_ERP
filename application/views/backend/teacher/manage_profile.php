<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">

			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-user"></i> 
					<?php echo get_phrase('manage_profile');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
	
		<div class="tab-content manage_profile">
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content teachertable">
					<?php 
                    foreach($edit_data as $row):
                        ?>
                        <?php echo form_open(base_url() . 'index.php?teacher/manage_profile/update_profile_info' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
                             <ul class="nav nav-tabs bordered">

                                <li class="active">
                                    <a href="#a" data-toggle="tab"><i class="entypo-user"></i> 
                                        <?php echo get_phrase('profile');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#b" data-toggle="tab"><i class="entypo-user"></i> 
                                        <?php echo get_phrase('present_address');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#c" data-toggle="tab"><i class="entypo-user"></i> 
                                        <?php echo get_phrase('permanent_address');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#d" data-toggle="tab"><i class="entypo-user"></i>
                                        <?php echo get_phrase('academic_qualifications');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#e" data-toggle="tab"><i class="entypo-user"></i> 
                                        <?php echo get_phrase('employment_or_professional_records');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#f" data-toggle="tab"><i class="entypo-user"></i> 
                                        <?php echo get_phrase('references');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#g" data-toggle="tab"><i class="entypo-user"></i> 
                                        <?php echo get_phrase('other_documents');?>
                                    </a>
                                </li>
                            </ul>           
                            <div class="tab-content">
                                <div class="tab-pane box active" id="a" style="padding: 5px">
                                    <div class="box-content">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('name_of_program');?></label>
                                            <div class="col-sm-5">
                                                <select name="NameofProgram" id="NameofProgram" class="form-control">
                                                    <?php
                                                    $this->db->where('id', $row['NameofProgram']);
                                                    $course_program = $this->db->get('course_program')->result_array();
                                                    foreach($course_program as $e1e):
                                                    endforeach;
                                                    ?>
                                                    <option value="<?php echo $e1e['id'];?>"><?php echo $e1e['course_name'];?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                                            
                                            <div class="col-sm-5">
                                            <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[InstructorPhoto]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[InstructorPhoto]; ?>" width="200" height="150" /></a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('instructor_name');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" disabled="disabled" class="form-control" name="InstructorName" value="<?php echo $row['InstructorName'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('Designation');?></label>
                                            <div class="col-sm-5">
                                                <select name="NameofProgram" id="NameofProgram" class="form-control">
                                                    <?php
                                                    $this->db->where('id', $row['Designation']);
                                                    $aas = $this->db->get('designations')->result_array();
                                                    foreach($aas as $e1e):
                                                    endforeach;
                                                    ?>
                                                    <option value="<?php echo $e1e['id'];?>"><?php echo $e1e['value'];?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('instructor_birthdate');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="InstructorBirthDate" value="<?php echo $row['InstructorBirthDate'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('father_name');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="InstructorFatherName" value="<?php echo $row['InstructorFatherName'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('mother_name');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="InstructorMotherName" value="<?php echo $row['InstructorMotherName'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('nationality');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="InstructorNationality" value="<?php echo $row['InstructorNationality'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
                                            <div class="col-sm-5">
                                                <select name="InstructorGender" id="InstructorGender" class="form-control">
                                                    <?php
                                                    $this->db->where('id', $row['InstructorGender']);
                                                    $aas = $this->db->get('gender')->result_array();
                                                    foreach($aas as $e1e):
                                                    endforeach;
                                                    ?>
                                                    <option value="<?php echo $e1e['id'];?>"><?php echo $e1e['Name'];?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane box" id="b" style="padding: 5px">
                                    <div class="box-content">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('present_phone');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PresentPhone" value="<?php echo $row['PresentPhone'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('present_village');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PresentVillage" value="<?php echo $row['PresentVillage'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('present_mobile');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PresentMobile" value="<?php echo $row['PresentMobile'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('present_post_office');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PresentPostOffice" value="<?php echo $row['PresentPostOffice'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('present_fax_no');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PresentFaxNo" value="<?php echo $row['PresentFaxNo'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('present_police_station');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PresentPoliceStation" value="<?php echo $row['PresentPoliceStation'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('present_email');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PresentEmail" value="<?php echo $row['PresentEmail'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('present_district');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PresentDistrict" value="<?php echo $row['PresentDistrict'];?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane box" id="c" style="padding: 5px">
                                    <div class="box-content">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('permanent_house');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PermanentHouse" value="<?php echo $row['PermanentHouse'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('permanent_phone');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PermanentPhone" value="<?php echo $row['PermanentPhone'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('permanent_village');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PermanentVillage" value="<?php echo $row['PermanentVillage'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('permanent_mobile');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PermanentMobile" value="<?php echo $row['PermanentMobile'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('permanent_post_office');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PermanentPostOffice" value="<?php echo $row['PermanentPostOffice'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('permanent_fax_no');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PermanentFaxNo" value="<?php echo $row['PermanentFaxNo'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('permanent_police_station');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PermanentPoliceStation" value="<?php echo $row['PermanentPoliceStation'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('permanent_email');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PermanentEmail" value="<?php echo $row['PermanentEmail'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo get_phrase('permanent_district');?></label>
                                            <div class="col-sm-5">
                                                <input type="text" disabled="disabled" class="form-control" name="PermanentDistrict" value="<?php echo $row['PermanentDistrict'];?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane box" id="d" style="padding: 5px">
                                    <div class="box-content">
                                        <div class="inner-wrap acdqual">
                                            <table>
                                                <tr><td><label>Certificate/Degree
                                                            <select name="CertificateName1" id="CertificateName1" class="form-control">
                                                                <?php
                                                                $this->db->where('id', $row['CertificateName1']);
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
                                                        <td><label>Department
                                                            <input type="text" disabled="disabled" name="CertificateGroup1" id="CertificateGroup1" value="<?php echo $row['CertificateGroup1'];?>" />
                                                        </label></td>
                                                    <td><label>Year of Passing
                                                            <select name="CertificateYear1" id="CertificateYear1" class="form-control">
                                                                <?php
                                                                //$this->db->order_by('id', DESC);
                                                                $this->db->where('id', $row['CertificateYear1']);
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
                                                    <td><label>University <input type="text" disabled="disabled" name="CertificateNameofInstitute1" id="CertificateNameofInstitute1" value="<?php echo $row['CertificateNameofInstitute1'];?>"/></label></td>
                                                    <td><label>Division/CGPA <input type="text" disabled="disabled" name="CertificateCGPA1" id="CertificateCGPA1" value="<?php echo $row['CertificateCGPA1'];?>"/></label></td>
                                                    <td colspan="3"><label>Certificate<br/> 
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[CertificateDocumentscert1]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[CertificateDocumentscert1]; ?>" width="50" height="50" /></a></label></td>
                                                    <td colspan="3"><label>Marksheet 
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[CertificateDocumentsmark1]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[CertificateDocumentsmark1]; ?>" width="50" height="50" /></a></label></td>
                                                </tr>
                                            </table>
                                        </div> 
                                        <div class="inner-wrap acdqual">
                                            <table>
                                                <tr><td><label>Certificate/Degree
                                                            <select name="CertificateName2" id="CertificateName2" class="form-control">
                                                                <?php
                                                                $this->db->where('id', $row['CertificateName2']);
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
                                                        <td><label>Department
                                                            <input type="text" disabled="disabled" name="CertificateGroup2" id="CertificateGroup2" value="<?php echo $row['CertificateGroup2'];?>" />
                                                        </label></td>
                                                    <td><label>Year of Passing
                                                            <select name="CertificateYear2" id="CertificateYear2" class="form-control">
                                                                <?php
                                                                //$this->db->order_by('id', DESC);
                                                                $this->db->where('id', $row['CertificateYear2']);
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
                                                    <td><label>University <input type="text" disabled="disabled" name="CertificateNameofInstitute2" id="CertificateNameofInstitute2" value="<?php echo $row['CertificateNameofInstitute2'];?>"/></label></td>
                                                    <td><label>Division/CGPA <input type="text" disabled="disabled" name="CertificateCGPA2" id="CertificateCGPA2" value="<?php echo $row['CertificateCGPA2'];?>"/></label></td>
                                                    <td colspan="3"><label>Certificate<br/> 
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[CertificateDocumentscert2]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[CertificateDocumentscert2]; ?>" width="50" height="50" /></a></label></td>
                                                    <td colspan="3"><label>Marksheet 
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[CertificateDocumentsmark2]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[CertificateDocumentsmark2]; ?>" width="50" height="50" /></a></label></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="inner-wrap acdqual">
                                            <table>
                                                <tr><td><label>Certificate/Degree
                                                            <select name="CertificateName3" id="CertificateName3" class="form-control">
                                                                <?php
                                                                $this->db->where('id', $row['CertificateName3']);
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
                                                        <td><label>Department
                                                            <input type="text" disabled="disabled" name="CertificateGroup3" id="CertificateGroup3" value="<?php echo $row['CertificateGroup3'];?>" />
                                                        </label></td>
                                                    <td><label>Year of Passing
                                                            <select name="CertificateYear3" id="CertificateYear3" class="form-control">
                                                                <?php
                                                                //$this->db->order_by('id', DESC);
                                                                $this->db->where('id', $row['CertificateYear3']);
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
                                                    <td><label>University <input type="text" disabled="disabled" name="CertificateNameofInstitute3" id="CertificateNameofInstitute3" value="<?php echo $row['CertificateNameofInstitute3'];?>"/></label></td>
                                                    <td><label>Division/CGPA <input type="text" disabled="disabled" name="CertificateCGPA3" id="CertificateCGPA3" value="<?php echo $row['CertificateCGPA3'];?>"/></label></td>
                                                    <td colspan="3"><label>Certificate<br/> 
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[CertificateDocumentscert3]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[CertificateDocumentscert3]; ?>" width="50" height="50" /></a></label></td>
                                                    <td colspan="3"><label>Marksheet 
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[CertificateDocumentsmark3]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[CertificateDocumentsmark3]; ?>" width="50" height="50" /></a></label></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="inner-wrap acdqual">
                                            <table>
                                                <tr><td><label>Certificate/Degree
                                                            <select name="CertificateName4" id="CertificateName4" class="form-control">
                                                                <?php
                                                                $this->db->where('id', $row['CertificateName4']);
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
                                                        <td><label>Department
                                                            <input type="text" disabled="disabled" name="CertificateGroup4" id="CertificateGroup4" value="<?php echo $row['CertificateGroup4'];?>" />
                                                        </label></td>
                                                    <td><label>Year of Passing
                                                            <select name="CertificateYear4" id="CertificateYear4" class="form-control">
                                                                <?php
                                                                //$this->db->order_by('id', DESC);
                                                                $this->db->where('id', $row['CertificateYear4']);
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
                                                    <td><label>University <input type="text" disabled="disabled" name="CertificateNameofInstitute4" id="CertificateNameofInstitute4" value="<?php echo $row['CertificateNameofInstitute4'];?>"/></label></td>
                                                    <td><label>Division/CGPA <input type="text" disabled="disabled" name="CertificateCGPA4" id="CertificateCGPA4" value="<?php echo $row['CertificateCGPA4'];?>"/></label></td>
                                                    <td colspan="3"><label>Certificate<br/> 
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[CertificateDocumentscert4]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[CertificateDocumentscert4]; ?>" width="50" height="50" /></a></label></td>
                                                    <td colspan="3"><label>Marksheet 
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[CertificateDocumentsmark4]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[CertificateDocumentsmark4]; ?>" width="50" height="50" /></a></label></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="inner-wrap acdqual">
                                            <table>
                                                <tr><td><label>Certificate/Degree
                                                            <select name="CertificateName5" id="CertificateName5" class="form-control">
                                                                <?php
                                                                $this->db->where('id', $row['CertificateName5']);
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
                                                        <td><label>Department
                                                            <input type="text" disabled="disabled" name="CertificateGroup5" id="CertificateGroup5" value="<?php echo $row['CertificateGroup5'];?>" />
                                                        </label></td>
                                                    <td><label>Year of Passing
                                                            <select name="CertificateYear5" id="CertificateYear5" class="form-control">
                                                                <?php
                                                                //$this->db->order_by('id', DESC);
                                                                $this->db->where('id', $row['CertificateYear5']);
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
                                                    <td><label>University <input type="text" disabled="disabled" name="CertificateNameofInstitute5" id="CertificateNameofInstitute5" value="<?php echo $row['CertificateNameofInstitute5'];?>"/></label></td>
                                                    <td><label>Division/CGPA <input type="text" disabled="disabled" name="CertificateCGPA5" id="CertificateCGPA5" value="<?php echo $row['CertificateCGPA5'];?>"/></label></td>
                                                    <td colspan="3"><label>Certificate<br/> 
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[CertificateDocumentscert5]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[CertificateDocumentscert5]; ?>" width="50" height="50" /></a></label></td>
                                                    <td colspan="3"><label>Marksheet 
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[CertificateDocumentsmark5]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[CertificateDocumentsmark5]; ?>" width="50" height="50" /></a></label></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane box" id="e" style="padding: 5px">
                                    <div class="box-content">
                                        <div class="inner-wrap">
                                            <table>
                                                <tr><td><label>Name of Organization(s) <input type="text" disabled="disabled" name="EmploymentNameofOrganizations1" value="<?php echo $row['EmploymentNameofOrganizations1'];?>"/></label></td>
                                                    <td><label>From(mm-dd-yy) <input type="text" disabled="disabled" class="datepicker" name="EmploymentFromDate1" value="<?php echo $row['EmploymentFromDate1'];?>"/></label></td>
                                                    <td><label>To(mm-dd-yy) <input type="text" disabled="disabled" class="datepicker" name="EmploymentToDate1" value="<?php echo $row['EmploymentToDate1'];?>"/></label></td>
                                                    <td><label>Position held <input type="text" disabled="disabled" name="EmploymentPositionHeld1" value="<?php echo $row['EmploymentPositionHeld1'];?>"/></label></td>
                                                    <td colspan="2"><label>Documents 
                                                    <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[EmploymentDocuments1]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[EmploymentDocuments1]; ?>" width="50" height="50" /></a></label></td>
                                                </tr>
                                                <tr><td><label>Name of Organization(s) <input type="text" disabled="disabled" name="EmploymentNameofOrganizations2" value="<?php echo $row['EmploymentNameofOrganizations2'];?>"/></label></td>
                                                    <td><label>From(mm-dd-yy) <input type="text" disabled="disabled" class="datepicker" name="EmploymentFromDate2" value="<?php echo $row['EmploymentFromDate2'];?>"/></label></td>
                                                    <td><label>To(mm-dd-yy) <input type="text" disabled="disabled" class="datepicker" name="EmploymentToDate2" value="<?php echo $row['EmploymentToDate2'];?>"/></label></td>
                                                    <td><label>Position held <input type="text" disabled="disabled" name="EmploymentPositionHeld2" value="<?php echo $row['EmploymentPositionHeld2'];?>"/></label></td>
                                                    <td colspan="2"><label>Documents 
                                                    <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[EmploymentDocuments2]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[EmploymentDocuments2]; ?>" width="50" height="50" /></a>
                                                    </label></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane box" id="f" style="padding: 5px">
                                    <div class="box-content form-style-10">
                                        <div class="inner-wrap">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <table>
                                                            <tr><td><label>Name<input type="text" disabled="disabled" name="ReferenceName1" id="ReferenceName1" value="<?php echo $row['ReferenceName1'];?>"/></label></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Address <textarea type="text" disabled="disabled" name="ReferenceAddress1" id="ReferenceAddress1"><?php echo $row['ReferenceAddress1'];?></textarea></label></td>
                                                            </tr>
                                                            <tr><td><label>Phone No<input type="text" disabled="disabled" name="ReferencePhone1" value="<?php echo $row['ReferenceName1'];?>"/></label></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Mobile No<input type="text" disabled="disabled" name="ReferenceMobile1" id="ReferenceMobile1" value="<?php echo $row['ReferenceName1'];?>"/></label></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>E-mail<input type="text" disabled="disabled" name="ReferenceEmail1" id="ReferenceEmail1" value="<?php echo $row['ReferenceName1'];?>"/></label></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table>
                                                            <tr>
                                                                <td ><label>Name<input type="text" disabled="disabled" name="ReferenceName2" value="<?php echo $row['ReferenceName2'];?>"/></label></td>
                                                            </tr>
                                                            <tr><td ><label>Address <textarea type="text" disabled="disabled" name="ReferenceAddress2"><?php echo $row['ReferenceAddress2'];?></textarea></label></td>
                                                            </tr>
                                                            <tr><td><label>Phone No<input type="text" disabled="disabled" name="ReferencePhone2" value="<?php echo $row['ReferencePhone2'];?>"/></label></td></tr>
                                                            <tr><td><label>Mobile No<input type="text" disabled="disabled" name="ReferenceMobile2" value="<?php echo $row['ReferenceMobile2'];?>"/></label></td></tr>
                                                            <tr><td><label>E-mail<input type="text" disabled="disabled" name="ReferenceEmail2" value="<?php echo $row['ReferenceEmail2'];?>"/></label></td></tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>    
                                    </div>
                                </div>
                                <div class="tab-pane box" id="g" style="padding: 5px">
                                    <div class="box-content form-style-10">
                                        <div class="inner-wrap">
                                            <table>
                                                <tr>
                                                    <td colspan="2" class="otherdocs">
                                                        <span><label for="">Other Documents</label></span>
                                                        <div><label>National ID Card</label> 
                                                            <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[InstructorNationalID]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[InstructorNationalID]; ?>" width="50" height="50" /></a>
                                                        </div>
                                                        <div><label>Passport </label>
<a target="_blank" href="<?php echo "uploads/instructor_image/".$row[InstructorPassport]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[InstructorPassport]; ?>" width="50" height="50" /></a>
                                                        </div>
                                                        <div><label>Driving Licence </label> 
<a target="_blank" href="<?php echo "uploads/instructor_image/".$row[InstructorDrivingLicence]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[InstructorDrivingLicence]; ?>" width="50" height="50" /></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('update_profile');?></button>
                              </div>
                                                        </div> -->
                        </form>
						<?php
                    endforeach;
                    ?>
                </div>
			</div>
            <!----EDITING FORM ENDS-->
            
		</div>
	</div>
</div>


<!--password-->
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs bordered">

			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-lock"></i> 
					<?php echo get_phrase('change_password');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content padded">
					<?php 
                    foreach($edit_data as $row):
                        ?>
                        <?php echo form_open('teacher/manage_profile/change_password' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('current_password');?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('new_password');?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="new_password" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('confirm_new_password');?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="confirm_new_password" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('update_profile');?></button>
                              </div>
								</div>
                        </form>
						<?php
                    endforeach;
                    ?>
                </div>
			</div>
            <!----EDITING FORM ENDS--->
            
		</div>
	</div>
</div>