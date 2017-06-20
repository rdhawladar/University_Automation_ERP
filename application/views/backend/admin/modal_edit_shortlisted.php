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

                <?php echo form_open(base_url() . 'index.php?admin/online_admission/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-style-10">
                    <h1>Admission Form</h1>

                    <div class="inner-wrap">
                        <!--<table>
                            <tr>
                                <td>Session: &nbsp;&nbsp;&nbsp;
                                    <span>
                                        <input type="radio" name="Session[]" value="Spring (Jan-Apr)" />&nbsp;&nbsp;Spring (Jan-Apr)&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <input type="radio" name="Session[]" value="Summer (May-Aug)" />&nbsp;&nbsp;Summer (May-Aug)&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <input type="radio" name="Session[]" value="Fall (Sep-Dec)" />&nbsp;&nbsp;Fall (Sep-Dec)&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                </td>
                            </tr>
                        </table>-->
                        <table>
                            <tr>
                                <td>&nbsp;<label>
                                        Admission Form Serial No
                                            <input type="text" name="AdmFormSerialNo" disabled value="<?php echo $row['AdmFormSerialNo']?>"/>
                                    </label></td>
                                <td>&nbsp;<label>Admission Roll No<input type="text" name="AdmissionRollNo" value="<?php echo $row['AdmissionRollNo']?>" id="AdmissionRollNo" /></label></td>
                                <td>&nbsp;<label>Year
                                        <select class="form-control" name="AdmissionYear" id="AdmissionYear">
                                            <option value="<?php echo $row['AdmissionYear']?>"><?php echo $row['AdmissionYear']?></option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>
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
                                                    <select name="NameofProgram" id="NameofProgram" class="form-control">
                                                        <?php
                                                        $this->db->where('id', $row['NameofProgram']);
                                                        $course_program = $this->db->get('course_program')->result_array();
                                                        foreach($course_program as $e1e):
                                                            echo $e1e['course_name'];
                                                        endforeach;
                                                        ?>
                                                        <option value="<?php echo $e1e['id'];?>"><?php echo $e1e['course_name'];?></option>
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
                                                    <!--<input type="text" name="field10" />-->
                                                    <select class="form-control" name="Session" id="Session">
                                                        <option value="<?php echo $row['Session']?>"><?php echo $row['Session']?></option>
                                                        <option value="Spring (Jan-Apr)">Spring (Jan-Apr)</option>
                                                        <option value="Summer (May-Aug)">Summer (May-Aug)</option>
                                                        <option value="Fall (Sep-Dec)">Fall (Sep-Dec)</option>
                                                    </select>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <div class="inner-wrap">
                                        <label>
                                            <a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="150" height="150" /></a>
                                            <br/>
                                            <label>Upload Aplicant Photo<input type="file" name="PhotoApplicant" id="photoApplicant"/></label>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="inner-wrap" style="display: none;">
                        <table class="tabl"><tr><td><label>
                                        Name of Program
                                        <select name="NameofProgram" id="NameofProgram" class="form-control">
                                            <?php
                                            $this->db->where('id', $row['NameofProgram']);
                                            $course_program = $this->db->get('course_program')->result_array();
                                            foreach($course_program as $e1e):
                                                echo $e1e['course_name'];
                                            endforeach;
                                            ?>
                                            <option value="<?php echo $e1e['id'];?>"><?php echo $e1e['course_name'];?></option>
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
                                <td><label>Class Roll No <input type="text" name="ClassRollNo" value="<?php echo $row['ClassRollNo']?>"/></label></td>
                                <td rowspan="3">
                                    <div class="inner-wrap">
                                        <label>
                                            <a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="150" height="150" /></a>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr><td><label>Registration/ID No <input type="text" name="RegistratioNo" value="<?php echo $row['RegistratioNo'];?>"/></label></td>
                                <td><label>Session:
                                        <!--<input type="text" name="field10" />-->
                                        <select class="form-control" name="Session" id="Session">
                                            <option value="<?php echo $row['Session']?>"><?php echo $row['Session']?></option>
                                            <option value="Spring (Jan-Apr)">Spring (Jan-Apr)</option>
                                            <option value="Summer (May-Aug)">Summer (May-Aug)</option>
                                            <option value="Fall (Sep-Dec)">Fall (Sep-Dec)</option>
                                        </select>
                                    </label></td></tr>
                            <!--<tr><td colspan="2"><label>Year <input type="text" name="field11" /></label>--></table></td></tr>
                    </div>

                    <div class="section"><span>2</span>Section 2 Program Details: </div>
                    <div class="inner-wrap"><table>
                            <tr>
                                <td><label>Name of the Applicant <input type="text" name="NameofApplicant" id="NameofApplicant" value="<?php echo $row['NameofApplicant']?>"/></label></td>
                                <td><label>Date of Birth(mm-dd-yy): <input type="text" class="datepicker" name="ApplicantBirthDate" value="<?php echo $row['ApplicantBirthDate']?>" id="ApplicantBirthDate"/></label></td></tr>
                            <tr><td><label>Father's Name <input type="text" name="ApplicantFatherName" id="ApplicantFatherName" value="<?php echo $row['ApplicantFatherName']?>"/></label></td>
                                <td><label>Mother's Name <input type="text" name="ApplicantMotherName" id="ApplicantMotherName" value="<?php echo $row['ApplicantMotherName']?>"/></label></td>
                            </tr>
                            <tr>
                                <td><label>Nationality
                                        <!--<input type="text" name="ApplicantNationality" />-->
                                        <select name="ApplicantNationality" id="ApplicantNationality">
                                            <option value="<?php echo $row['ApplicantNationality']?>"><?php echo $row['ApplicantNationality']?></option>
                                            <option value="afghan">Afghan</option>
                                            <option value="albanian">Albanian</option>
                                            <option value="algerian">Algerian</option>
                                            <option value="american">American</option>
                                            <option value="andorran">Andorran</option>
                                            <option value="angolan">Angolan</option>
                                            <option value="antiguans">Antiguans</option>
                                            <option value="argentinean">Argentinean</option>
                                            <option value="armenian">Armenian</option>
                                            <option value="australian">Australian</option>
                                            <option value="austrian">Austrian</option>
                                            <option value="azerbaijani">Azerbaijani</option>
                                            <option value="bahamian">Bahamian</option>
                                            <option value="bahraini">Bahraini</option>
                                            <option value="bangladeshi">Bangladeshi</option>
                                            <option value="barbadian">Barbadian</option>
                                            <option value="barbudans">Barbudans</option>
                                            <option value="batswana">Batswana</option>
                                            <option value="belarusian">Belarusian</option>
                                            <option value="belgian">Belgian</option>
                                            <option value="belizean">Belizean</option>
                                            <option value="beninese">Beninese</option>
                                            <option value="bhutanese">Bhutanese</option>
                                            <option value="bolivian">Bolivian</option>
                                            <option value="bosnian">Bosnian</option>
                                            <option value="brazilian">Brazilian</option>
                                            <option value="british">British</option>
                                            <option value="bruneian">Bruneian</option>
                                            <option value="bulgarian">Bulgarian</option>
                                            <option value="burkinabe">Burkinabe</option>
                                            <option value="burmese">Burmese</option>
                                            <option value="burundian">Burundian</option>
                                            <option value="cambodian">Cambodian</option>
                                            <option value="cameroonian">Cameroonian</option>
                                            <option value="canadian">Canadian</option>
                                            <option value="cape verdean">Cape Verdean</option>
                                            <option value="central african">Central African</option>
                                            <option value="chadian">Chadian</option>
                                            <option value="chilean">Chilean</option>
                                            <option value="chinese">Chinese</option>
                                            <option value="colombian">Colombian</option>
                                            <option value="comoran">Comoran</option>
                                            <option value="congolese">Congolese</option>
                                            <option value="costa rican">Costa Rican</option>
                                            <option value="croatian">Croatian</option>
                                            <option value="cuban">Cuban</option>
                                            <option value="cypriot">Cypriot</option>
                                            <option value="czech">Czech</option>
                                            <option value="danish">Danish</option>
                                            <option value="djibouti">Djibouti</option>
                                            <option value="dominican">Dominican</option>
                                            <option value="dutch">Dutch</option>
                                            <option value="east timorese">East Timorese</option>
                                            <option value="ecuadorean">Ecuadorean</option>
                                            <option value="egyptian">Egyptian</option>
                                            <option value="emirian">Emirian</option>
                                            <option value="equatorial guinean">Equatorial Guinean</option>
                                            <option value="eritrean">Eritrean</option>
                                            <option value="estonian">Estonian</option>
                                            <option value="ethiopian">Ethiopian</option>
                                            <option value="fijian">Fijian</option>
                                            <option value="filipino">Filipino</option>
                                            <option value="finnish">Finnish</option>
                                            <option value="french">French</option>
                                            <option value="gabonese">Gabonese</option>
                                            <option value="gambian">Gambian</option>
                                            <option value="georgian">Georgian</option>
                                            <option value="german">German</option>
                                            <option value="ghanaian">Ghanaian</option>
                                            <option value="greek">Greek</option>
                                            <option value="grenadian">Grenadian</option>
                                            <option value="guatemalan">Guatemalan</option>
                                            <option value="guinea-bissauan">Guinea-Bissauan</option>
                                            <option value="guinean">Guinean</option>
                                            <option value="guyanese">Guyanese</option>
                                            <option value="haitian">Haitian</option>
                                            <option value="herzegovinian">Herzegovinian</option>
                                            <option value="honduran">Honduran</option>
                                            <option value="hungarian">Hungarian</option>
                                            <option value="icelander">Icelander</option>
                                            <option value="indian">Indian</option>
                                            <option value="indonesian">Indonesian</option>
                                            <option value="iranian">Iranian</option>
                                            <option value="iraqi">Iraqi</option>
                                            <option value="irish">Irish</option>
                                            <option value="israeli">Israeli</option>
                                            <option value="italian">Italian</option>
                                            <option value="ivorian">Ivorian</option>
                                            <option value="jamaican">Jamaican</option>
                                            <option value="japanese">Japanese</option>
                                            <option value="jordanian">Jordanian</option>
                                            <option value="kazakhstani">Kazakhstani</option>
                                            <option value="kenyan">Kenyan</option>
                                            <option value="kittian and nevisian">Kittian and Nevisian</option>
                                            <option value="kuwaiti">Kuwaiti</option>
                                            <option value="kyrgyz">Kyrgyz</option>
                                            <option value="laotian">Laotian</option>
                                            <option value="latvian">Latvian</option>
                                            <option value="lebanese">Lebanese</option>
                                            <option value="liberian">Liberian</option>
                                            <option value="libyan">Libyan</option>
                                            <option value="liechtensteiner">Liechtensteiner</option>
                                            <option value="lithuanian">Lithuanian</option>
                                            <option value="luxembourger">Luxembourger</option>
                                            <option value="macedonian">Macedonian</option>
                                            <option value="malagasy">Malagasy</option>
                                            <option value="malawian">Malawian</option>
                                            <option value="malaysian">Malaysian</option>
                                            <option value="maldivan">Maldivan</option>
                                            <option value="malian">Malian</option>
                                            <option value="maltese">Maltese</option>
                                            <option value="marshallese">Marshallese</option>
                                            <option value="mauritanian">Mauritanian</option>
                                            <option value="mauritian">Mauritian</option>
                                            <option value="mexican">Mexican</option>
                                            <option value="micronesian">Micronesian</option>
                                            <option value="moldovan">Moldovan</option>
                                            <option value="monacan">Monacan</option>
                                            <option value="mongolian">Mongolian</option>
                                            <option value="moroccan">Moroccan</option>
                                            <option value="mosotho">Mosotho</option>
                                            <option value="motswana">Motswana</option>
                                            <option value="mozambican">Mozambican</option>
                                            <option value="namibian">Namibian</option>
                                            <option value="nauruan">Nauruan</option>
                                            <option value="nepalese">Nepalese</option>
                                            <option value="new zealander">New Zealander</option>
                                            <option value="ni-vanuatu">Ni-Vanuatu</option>
                                            <option value="nicaraguan">Nicaraguan</option>
                                            <option value="nigerien">Nigerien</option>
                                            <option value="north korean">North Korean</option>
                                            <option value="northern irish">Northern Irish</option>
                                            <option value="norwegian">Norwegian</option>
                                            <option value="omani">Omani</option>
                                            <option value="pakistani">Pakistani</option>
                                            <option value="palauan">Palauan</option>
                                            <option value="panamanian">Panamanian</option>
                                            <option value="papua new guinean">Papua New Guinean</option>
                                            <option value="paraguayan">Paraguayan</option>
                                            <option value="peruvian">Peruvian</option>
                                            <option value="polish">Polish</option>
                                            <option value="portuguese">Portuguese</option>
                                            <option value="qatari">Qatari</option>
                                            <option value="romanian">Romanian</option>
                                            <option value="russian">Russian</option>
                                            <option value="rwandan">Rwandan</option>
                                            <option value="saint lucian">Saint Lucian</option>
                                            <option value="salvadoran">Salvadoran</option>
                                            <option value="samoan">Samoan</option>
                                            <option value="san marinese">San Marinese</option>
                                            <option value="sao tomean">Sao Tomean</option>
                                            <option value="saudi">Saudi</option>
                                            <option value="scottish">Scottish</option>
                                            <option value="senegalese">Senegalese</option>
                                            <option value="serbian">Serbian</option>
                                            <option value="seychellois">Seychellois</option>
                                            <option value="sierra leonean">Sierra Leonean</option>
                                            <option value="singaporean">Singaporean</option>
                                            <option value="slovakian">Slovakian</option>
                                            <option value="slovenian">Slovenian</option>
                                            <option value="solomon islander">Solomon Islander</option>
                                            <option value="somali">Somali</option>
                                            <option value="south african">South African</option>
                                            <option value="south korean">South Korean</option>
                                            <option value="spanish">Spanish</option>
                                            <option value="sri lankan">Sri Lankan</option>
                                            <option value="sudanese">Sudanese</option>
                                            <option value="surinamer">Surinamer</option>
                                            <option value="swazi">Swazi</option>
                                            <option value="swedish">Swedish</option>
                                            <option value="swiss">Swiss</option>
                                            <option value="syrian">Syrian</option>
                                            <option value="taiwanese">Taiwanese</option>
                                            <option value="tajik">Tajik</option>
                                            <option value="tanzanian">Tanzanian</option>
                                            <option value="thai">Thai</option>
                                            <option value="togolese">Togolese</option>
                                            <option value="tongan">Tongan</option>
                                            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                            <option value="tunisian">Tunisian</option>
                                            <option value="turkish">Turkish</option>
                                            <option value="tuvaluan">Tuvaluan</option>
                                            <option value="ugandan">Ugandan</option>
                                            <option value="ukrainian">Ukrainian</option>
                                            <option value="uruguayan">Uruguayan</option>
                                            <option value="uzbekistani">Uzbekistani</option>
                                            <option value="venezuelan">Venezuelan</option>
                                            <option value="vietnamese">Vietnamese</option>
                                            <option value="welsh">Welsh</option>
                                            <option value="yemenite">Yemenite</option>
                                            <option value="zambian">Zambian</option>
                                            <option value="zimbabwean">Zimbabwean</option>
                                        </select>
                                    </label></td>
                                <td><label>Gender &nbsp;&nbsp;
                                        <select class="form-control" name="ApplicantGender" id="ApplicantGender">
                                            <option value="<?php echo $row['ApplicantGender']?>"><?php echo $row['ApplicantGender']?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <!--<input type="radio" name="ApplicantGender[]" value="Male"><span>Male</span>
                                        <input type="radio" name="ApplicantGender[]" value="Female"><span >Female </span>
                                        <input type="radio" name="ApplicantGender[]" value="Others"><span >Others </span>-->
                                    </label></td>
                            </tr>
                        </table></div>
                    <div class="inner-wrap"><h3>Present Address</h3><table>
                            <tr><td><label>House No <input type="text" name="PresentHouse" id = "PresentHouse" value="<?php echo $row['PresentHouse']?>" /></label></td>
                                <td><label>Phone No <input type="text" name="PresentPhone" id = "PresentPhone" value="<?php echo $row['PresentPhone']?>"/></label></td></tr>
                            <tr><td><label>Village <input type="text" name="PresentVillage" id = "PresentVillage" value="<?php echo $row['PresentVillage']?>"/></label></td>
                                <td><label>Mobile No <input type="text" name="PresentMobile" id = "PresentMobile" value="<?php echo $row['PresentMobile']?>"/></label></td></tr>
                            <tr><td><label>Post Office <input type="text" name="PresentPostOffice" id="PresentPostOffice" value="<?php echo $row['PresentPostOffice']?>"/></label></td>
                                <td><label>Fax No <input type="text" name="PresentFaxNo" value="<?php echo $row['PresentFaxNo']?>"/></label></td></tr>
                            <tr><td><label>Pollice Station <input type="text" name="PresentPoliceStation" id="PresentPoliceStation" value="<?php echo $row['PresentPoliceStation']?>"/></label></td>
                                <td><label>E-mail <input type="text" name="PresentEmail" value="<?php echo $row['PresentEmail']?>" /></label></td></tr>
                            <tr><td><label>District <input type="text" name="PresentDistrict" id = "PresentDistrict" value="<?php echo $row['PresentDistrict']?>"/></label></td>
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
                            <tr><td><label>District <input type="text" name="PermanentDistrict" value="<?php echo $row['PermanentDistrict']?>"/></label></td>
                        </table></div>

                    <div class="section"><span>3</span>Academic Qualifications:(From upper to lower Degree):</div>
                    <div class="inner-wrap acdqual">
                        <table>
                            <tr><td><label>Certificate/Degree
                                        <select class="form-control" name="CertificateName1" id="CertificateName1">
                                            <option value="<?php echo $row['CertificateName1']?>"><?php echo $row['CertificateName1']?></option>
                                            <option value="ssc">SSC</option>
                                            <option value="hsc">HSC</option>
                                            <option value="A Level">A Level</option>
                                            <option value="O Level">O Level</option>
                                            <option value="Alim">Alim</option>
                                            <option value="Dakhil">Dakhil</option>
                                            <option value="Vocational">Vocational</option>
                                        </select>
                                    </label></td>
                                <td><label>Group/Discipline
                                        <select class="form-control" name="CertificateGroup1" id="CertificateGroup1">
                                            <option value="<?php echo $row['CertificateGroup1']?>"><?php echo $row['CertificateGroup1']?></option>
                                            <option value="science">Science</option>
                                            <option value="commerce">Commerce</option>
                                            <option value="arts">Arts</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </label></td>
                                <td><label>Year of Passing
                                        <!--<input type="text" name="CertificateYear1" />-->
                                        <select class="form-control" name="CertificateYear1" id="CertificateYear1">
                                            <option value="<?php echo $row['CertificateYear1']?>"><?php echo $row['CertificateYear1']?></option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                        </select>
                                    </label></td>
                                <td><label>Name of Institute/Board <input type="text" name="CertificateNameofInstitute1" id="CertificateNameofInstitute1" value="<?php echo $row['CertificateNameofInstitute1']?>"/></label></td>
                                <td><label>Division/CGPA <input type="text" name="CertificateCGPA1" id="CertificateCGPA1" value="<?php echo $row['CertificateCGPA1']?>"/></label></td>
                                <td><label>Points obtained <input type="text" name="CertificatePointsObtained1" placeholder="(filled by office)"</label></td>
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
                                        <select class="form-control" name="CertificateName2" id="CertificateName2">
                                            <option value="<?php echo $row['CertificateName2']?>"><?php echo $row['CertificateName2']?></option>
                                            <option value="ssc">SSC</option>
                                            <option value="hsc">HSC</option>
                                            <option value="A Level">A Level</option>
                                            <option value="O Level">O Level</option>
                                            <option value="Alim">Alim</option>
                                            <option value="Dakhil">Dakhil</option>
                                            <option value="Vocational">Vocational</option>
                                        </select>
                                    </label></td>
                                <td><label>Group/Discipline
                                        <select class="form-control" name="CertificateGroup2" id="CertificateGroup2">
                                            <option value="<?php echo $row['CertificateGroup2']?>"><?php echo $row['CertificateGroup2']?></option>
                                            <option value="science">Science</option>
                                            <option value="commerce">Commerce</option>
                                            <option value="arts">Arts</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </label></td>
                                <td><label>Year of Passing
                                        <select class="form-control" name="CertificateYear2" id="CertificateYear2">
                                            <option value="<?php echo $row['CertificateYear2']?>"><?php echo $row['CertificateYear2']?></option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                        </select>
                                    </label></td>
                                <td><label>Name of Institute/Board <input type="text" value="<?php echo $row['CertificateNameofInstitute2']?>" name="CertificateNameofInstitute2" id="CertificateNameofInstitute2"/></label></td>
                                <td><label>Division/CGPA <input type="text" value="<?php echo $row['CertificateCGPA2']?>" name="CertificateCGPA2" id="CertificateCGPA2"/></label></td>
                                <td><label>Points obtained <input type="text" name="CertificatePointsObtained2" placeholder="(filled by office)"</label></td>
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
                            <tr><td><label>Name of Organization(s) <input type="text" value="<?php echo $row['EmploymentNameofOrganizations1']?>" name="EmploymentNameofOrganizations1" /></label></td>
                                <td><label>From(mm-dd-yy) <input type="text" class="datepicker" value="<?php echo $row['EmploymentFromDate1']?>" name="EmploymentFromDate1"/></label></td>
                                <td><label>To(mm-dd-yy) <input type="text" class="datepicker" value="<?php echo $row['EmploymentToDate1']?>" name="EmploymentToDate1" /></label></td>
                                <td><label>Position held <input type="text" value="<?php echo $row['EmploymentPositionHeld1']?>" name="EmploymentPositionHeld1" /></label></td>
                                <td><label>
                                        Documents
                                        <a target="_blank" href="<?php echo "uploads/student_image/".$row[EmploymentDocuments1]; ?>"><img src="<?php echo "uploads/student_image/".$row[EmploymentDocuments1]; ?>" width="50" height="50" /></a>
                                    </label></td>
                            </tr>
                            <tr><td><label>Name of Organization(s) <input type="text" value="<?php echo $row['EmploymentNameofOrganizations2']?>" name="EmploymentNameofOrganizations2" /></label></td>
                                <td><label>From(mm-dd-yy) <input type="text" class="datepicker" value="<?php echo $row['EmploymentFromDate2']?>" name="EmploymentFromDate2" /></label></td>
                                <td><label>To(mm-dd-yy) <input type="text" class="datepicker" value="<?php echo $row['EmploymentToDate2']?>" name="EmploymentToDate2" /></label></td>
                                <td><label>Position held <input type="text" value="<?php echo $row['EmploymentPositionHeld2']?>" name="EmploymentPositionHeld2" /></label></td>
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
                                        <tr><td ><label>Name of reference 1 <input type="text" value="<?php echo $row['ReferenceName1']?>" name="ReferenceName1" id="ReferenceName1"/></label></td>
                                        </tr>
                                        <tr>
                                            <td ><label>Address <textarea type="text" value="<?php echo $row['ReferenceAddress1']?>" name="ReferenceAddress1" id="ReferenceAddress1"></textarea></label></td>
                                        </tr>
                                        <tr><td><label>Phone No<input type="text" value="<?php echo $row['ReferencePhone1']?>" name="ReferencePhone1"/></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Mobile No<input type="text" value="<?php echo $row['ReferenceMobile1']?>" name="ReferenceMobile1" id="ReferenceMobile1"/></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>E-mail<input type="text" value="<?php echo $row['ReferenceEmail1']?>" name="ReferenceEmail1" id="ReferenceEmail1"/></label></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td ><label>Name of reference 2 <input type="text" value="<?php echo $row['ReferenceName2']?>" name="ReferenceName2" /></label></td>
                                        </tr>
                                        <tr>
                                            <td ><label>Address <textarea type="text" value="<?php echo $row['ReferenceAddress2']?>" name="ReferenceAddress2"></textarea></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Phone No<input type="text" value="<?php echo $row['ReferencePhone2']?>" name="ReferencePhone2" /></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Mobile No<input type="text" value="<?php echo $row['ReferenceMobile2']?>" name="ReferenceMobile2" /></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>E-mail<input type="text" value="<?php echo $row['ReferenceEmail2']?>" name="ReferenceEmail2"/></label></td>
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
                                <td colspan="2"><label>Date<input type="text" class="datepicker" value="<?php echo $row['ApplicationDate']?>" name="ApplicationDate" id="ApplicationDate"/></label></td>
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


