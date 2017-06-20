<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('course_instructors');?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_record');?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">

                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('program');?></div></th>
                        <th><div><?php echo get_phrase('name');?></div></th>
                        <th><div><?php echo get_phrase('Photo');?></div></th>
                        <th><div><?php echo get_phrase('gender');?></div></th>
                        <th>
                            <table class="ttres table table-bordered datatable">
                                <tr>
                                    <td colspan="5">
                                        <div><?php echo get_phrase('result');?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><div><?php echo get_phrase('SSC/Equivalent');?></div></td>
                                    <td><div><?php echo get_phrase('HSC/Equivalent');?></div></td>
                                    <td><div><?php echo get_phrase('Honours/Equivalent');?></div></td>
                                    <td><div><?php echo get_phrase('MS/Equivalent');?></div></td>
                                    <td><div><?php echo get_phrase('total_GPA');?></div></td>
                                </tr>
                            </table>
                        </th>
                        <th><div><?php echo get_phrase('References');?></div></th>
                        <th><div><?php echo get_phrase('joining_date');?></div></th>
                        <th><div><?php echo get_phrase('Actions');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    ?>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td class="program_name12">
                                <div>
                                    <?php
                                    $this->db->where('id', $row['NameofProgram']);
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $ee):
                                        echo $ee['course_name'];
                                    endforeach;
                                    ?>
                                </div>
                            </td>
                            <td class="program_name13"><div><?php echo $row['InstructorName'];?></div></td>
                            <td class="modlapopup">
                                <a target="_blank" href="<?php echo "uploads/instructor_image/".$row[InstructorPhoto]; ?>"><img src="<?php echo "uploads/instructor_image/".$row[InstructorPhoto]; ?>" width="73" height="73" /></a>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $row['InstructorGender']);
                                $gen = $this->db->get('gender')->result_array();
                                foreach($gen as $ge):
                                    echo $ge['Name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <table class="ttres">
                                    <tr>
                                        <td><div><?php echo $row['CertificateCGPA1'];?></div></td>
                                        <td><div><?php echo $row['CertificateCGPA2'];?></div></td>
                                        <td><div><?php echo $row['CertificateCGPA3'];?></div></td>
                                        <td><div><?php echo $row['CertificateCGPA4'];?></div></td>
                                        <td><div><?php echo $row['CertificateCGPA1'] + $row['CertificateCGPA2'] + $row['CertificateCGPA3'] + $row['CertificateCGPA4'];?></div></td>
                                    </tr>
                                </table>
                            </td>
                            <td class="program_name14">
                                <div>
                                    <table>
                                        <tr>
                                            <td>
                                                <?php echo "Name: ".$row['ReferenceName1'];?>
                                                <?php echo "<br/>";?>
                                                <?php echo "Phone: ".$row['ReferencePhone1'];?>
                                            </td>
                                            <td>
                                                <?php echo "Name: ".$row['ReferenceName2'];?>
                                                <?php echo "<br/>";?>
                                                <?php echo "Phone: ".$row['ReferencePhone2'];?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td><?php echo $row['InstructorJoiningDate'];?></td>
                            <td class="tblactions"><div>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_course_instructor/<?php echo $row['id'];?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo get_phrase('edit');?>
                                    </a>
                                    <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/online_admission/delete/<?php echo $row['id'];?>');">
                                        <i class="entypo-trash"></i>
                                        <?php echo get_phrase('delete');?>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">

                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/course_instructor/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'onsubmit'=>'return validateForm()', 'target'=>'_top','enctype'=>'multipart/form-data', 'name' => 'myForm'));?>
                    <div class="form-style-10">
                        <div class="inner-wrap">
                            <table class="tabl tabltest">
                                <tr>
                                <td>
                                    Photo
                                </td>
                                    <td colspan="4"><div class="inner-wrap"><label><input type="file" name="InstructorPhoto" id="InstructorPhoto"/></label></div></td>
                                </tr>
                                <tr>
                                    <td><label>
                                            Program<br/>
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
                                        </label>
                                    </td>
                                    <td><label>
                                            Designation<br/>
                                            <select name="Designation" id="Designation" class="form-control">
                                                <option value=""><?php echo get_phrase('select');?></option>
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
                                    <td><label>Email <input type="text" name="InstructorEmail" /></label></td>
                                    <td><label>Password <input type="text" name="InstructorPassword" /></label></td>
                                    <td><label>Name<input type="text" name="InstructorName" id="InstructorName"/></label></td>
                                </tr>
                                <tr>
                                    <td><label>Date of Birth(mm-dd-yy): <input type="text" class="datepicker" name="InstructorBirthDate" id="InstructorBirthDate"/></label></td>
                                    <td><label>Father's Name <input type="text" name="InstructorFatherName" id="InstructorFatherName"/></label></td>
                                    <td><label>Mother's Name <input type="text" name="InstructorMotherName" id="InstructorMotherName"/></label></td>
                                    <td><label>Nationality
                                            <select name="InstructorNationality" id="InstructorNationality" class="form-control">
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
                                        </label>
                                    </td>
                                    <td><label>Gender<br/>
                                            <select name="InstructorGender" id="InstructorGender" class="form-control">
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
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>
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

                        <div class="section">Academic Qualifications:(From upper to lower Degree):</div>
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
                                    <!-- <td><label>Group/Discipline
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
                                        </label></td> -->
                                        <td><label>Department
                                            <input type="text" name="CertificateGroup1" id="CertificateGroup1" placeholder="Physics" />
                                        </label></td>
                                    <td><label>Year of Passing
                                            <select name="CertificateYear1" id="CertificateYear1" class="form-control">
                                                <option value=""><?php echo get_phrase('select_year');?></option>
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
                                    <td><label>University <input type="text" name="CertificateNameofInstitute1" id="CertificateNameofInstitute1"/></label></td>
                                    <td><label>Division/CGPA <input type="text" name="CertificateCGPA1" id="CertificateCGPA1"/></label></td>
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
                                    <!-- <td><label>Group/Discipline
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
                                        </label></td> -->
                                        <td><label>Department
                                            <input type="text" name="CertificateGroup2" id="CertificateGroup2" placeholder="Physics" />
                                        </label></td>
                                    <td><label>Year of Passing
                                            <select name="CertificateYear2" id="CertificateYear2" class="form-control">
                                                <option value=""><?php echo get_phrase('select_year');?></option>
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
                                    <td><label>University <input type="text" name="CertificateNameofInstitute2" id="CertificateNameofInstitute2"/></label></td>
                                    <td><label>Division/CGPA <input type="text" name="CertificateCGPA2" id="CertificateCGPA2"/></label></td>
                                    <td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert2" id="CertificateDocumentscert2"/></label></td>
                                    <td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark2" id="CertificateDocumentsmark2"/></label></td>
                                </tr>
                            </table>
                        </div>
                        <div class="inner-wrap acdqual">
                            <table>
                                <tr><td><label>Certificate/Degree
                                            <select name="CertificateName3" id="CertificateName3" class="form-control">
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
                                    <!-- <td><label>Group/Discipline
                                            <select name="CertificateGroup3" id="CertificateGroup3" class="form-control">
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
                                        </label></td> -->
                                        <td><label>Department
                                            <input type="text" name="CertificateGroup3" id="CertificateGroup3" placeholder="Physics" />
                                        </label></td>
                                    <td><label>Year of Passing
                                            <select name="CertificateYear3" id="CertificateYear3" class="form-control">
                                                <option value=""><?php echo get_phrase('select_year');?></option>
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
                                    <td><label>University <input type="text" name="CertificateNameofInstitute3" id="CertificateNameofInstitute3"/></label></td>
                                    <td><label>Division/CGPA <input type="text" name="CertificateCGPA3" id="CertificateCGPA3"/></label></td>
                                    <td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert3" id="CertificateDocumentscert3"/></label></td>
                                    <td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark3" id="CertificateDocumentsmark3"/></label></td>
                                </tr>
                            </table>
                        </div>
                        <div class="inner-wrap acdqual">
                            <table>
                                <tr><td><label>Certificate/Degree
                                            <select name="CertificateName4" id="CertificateName4" class="form-control">
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
                                            <select name="CertificateGroup4" id="CertificateGroup4" class="form-control">
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
                                            <select name="CertificateYear4" id="CertificateYear4" class="form-control">
                                                <option value=""><?php echo get_phrase('select_year');?></option>
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
                                    <td><label>Institute/Board <input type="text" name="CertificateNameofInstitute4" id="CertificateNameofInstitute4"/></label></td>
                                    <td><label>Division/CGPA <input type="text" name="CertificateCGPA4" id="CertificateCGPA4"/></label></td>
                                    <td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert4" id="CertificateDocumentscert4"/></label></td>
                                    <td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark4" id="CertificateDocumentsmark4"/></label></td>
                                </tr>
                                <input type="hidden" name="TotalGPA" id="TotalGPA">
                            </table>
                        </div>
                        <div class="inner-wrap acdqual">
                            <table>
                                <tr><td><label>Certificate/Degree
                                            <select name="CertificateName5" id="CertificateName5" class="form-control">
                                                <option value=""><?php echo get_phrase('select');?></option>
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
                                    <td><label>Group/Discipline
                                            <select name="CertificateGroup5" id="CertificateGroup5" class="form-control">
                                                <option value=""><?php echo get_phrase('select');?></option>
                                                <?php
                                                $dd18 = $this->db->get('certificate_group')->result_array();
                                                foreach($dd18 as $wr128):
                                                    ?>
                                                    <option value="<?php echo $wr128['id'];?>">
                                                        <?php echo $wr128['Name'];?>
                                                    </option>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </label></td>    
                                    <td><label>Year of Passing
                                            <select name="CertificateYear5" id="CertificateYear5" class="form-control">
                                                <option value=""><?php echo get_phrase('select_year');?></option>
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
                                    <td><label>Institute/Board <input type="text" name="CertificateNameofInstitute5" id="CertificateNameofInstitute5"/></label></td>
                                    <td><label>Division/CGPA <input type="text" name="CertificateCGPA5" id="CertificateCGPA5"/></label></td>
                                    <td colspan="3"><label>Add Certificate <input type="file" name="CertificateDocumentscert5" id="CertificateDocumentscert5"/></label></td>
                                    <td colspan="3"><label>Add Marksheet <input type="file" name="CertificateDocumentsmark5" id="CertificateDocumentsmark5"/></label></td>
                                </tr>
                            </table>
                        </div>
                        <div class="section">Employment or Profession Records:(Only for service holder):</div>
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

                        <div class="section">Names and address of two references:</div>
                        <div class="inner-wrap">
                            <table>
                                <tr>
                                    <td>
                                        <table>
                                            <tr><td><label>Name<input type="text" name="ReferenceName1" id="ReferenceName1"/></label></td>
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
                                                <td ><label>Name<input type="text" name="ReferenceName2" /></label></td>
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
                        <div class="section">Other Documents:</div>
                        <div class="inner-wrap">
                            <table>
                                <tr>
                                    <td colspan="2" class="otherdocs">
                                        <span><label for="">Other Documents</label></span>
                                        <div><label>National ID Card</label> <input type="file" name="InstructorNationalID" /></div>
                                        <div><label>Passport </label><input type="file" name="InstructorPassport" /></div>
                                        <div><label>Driving Licence </label> <input type="file" name="InstructorDrivingLicence" /></div>
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
                                    <td colspan="2"><label>Date<input type="text" class="datepicker" name="InstructorJoiningDate" id="InstructorJoiningDate"/></label></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="form-group test32">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_faculty_teacher');?></button>
                        </div>
                    </div>
                    </form>
                </div>
                <!----CREATION FORM ENDS-->
                <p>&nbsp;</p>
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

    </script>