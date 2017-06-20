<?php
// Only process the form if $_POST isn't empty
if ( ! empty( $_POST ) ) {
  
  // Connect to MySQL
  $mysqli = new mysqli( 'localhost', 'root', '', 'pundro' );
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_error . ': ' . $mysqli->connect_error );
  }
  
    //$t1    = $_POST['technology1'];
	//$t2    = $_POST['technology2'];
	//$_POST['technology'] = $t1.", ".$t2;
	
	
  // Insert our data
$sql = "INSERT INTO osad_student_12 ( name_en, name_bn, photo, father_name, mother_name, ssc_result, hsc_result, total_gpa, nid_no, birth_certificate_no, birthday, sex, phone, email, present_village_name, present_post_office, present_post_code, present_police_station, present_district_name, present_division_name,exam_name_1, institute_name_1, ssc_board, ssc_pass_year, exam_name_2, institute_name_2, hsc_board, hsc_pass_year, religion, nationality, country, ssc_certificate, hsc_certificate, level_status, faculty_name, first_choice, second_choice) VALUES ( '{$mysqli->real_escape_string($_POST['name_en'])}','{$mysqli->real_escape_string($_POST['name_bn'])}','{$mysqli->real_escape_string($_POST['photo'])}','{$mysqli->real_escape_string($_POST['father_name'])}','{$mysqli->real_escape_string($_POST['mother_name'])}','{$mysqli->real_escape_string($_POST['ssc_result'])}','{$mysqli->real_escape_string($_POST['hsc_result'])}','{$mysqli->real_escape_string($_POST['total_gpa'])}','{$mysqli->real_escape_string($_POST['nid_no'])}','{$mysqli->real_escape_string($_POST['birth_certificate_no'])}','{$mysqli->real_escape_string($_POST['birthday'])}','{$mysqli->real_escape_string($_POST['sex'])}','{$mysqli->real_escape_string($_POST['phone'])}','{$mysqli->real_escape_string($_POST['email'])}','{$mysqli->real_escape_string($_POST['present_village_name'])}','{$mysqli->real_escape_string($_POST['present_post_office'])}','{$mysqli->real_escape_string($_POST['present_post_code'])}','{$mysqli->real_escape_string($_POST['present_police_station'])}','{$mysqli->real_escape_string($_POST['present_district_name'])}','{$mysqli->real_escape_string($_POST['present_division_name'])}','{$mysqli->real_escape_string($_POST['exam_name_1'])}','{$mysqli->real_escape_string($_POST['institute_name_1'])}','{$mysqli->real_escape_string($_POST['ssc_board'])}','{$mysqli->real_escape_string($_POST['ssc_pass_year'])}','{$mysqli->real_escape_string($_POST['exam_name_2'])}','{$mysqli->real_escape_string($_POST['institute_name_2'])}','{$mysqli->real_escape_string($_POST['hsc_board'])}','{$mysqli->real_escape_string($_POST['hsc_pass_year'])}','{$mysqli->real_escape_string($_POST['religion'])}','{$mysqli->real_escape_string($_POST['nationality'])}','{$mysqli->real_escape_string($_POST['country'])}','{$mysqli->real_escape_string($_POST['ssc_certificate'])}','{$mysqli->real_escape_string($_POST['hsc_certificate'])}','{$mysqli->real_escape_string($_POST['level_status'])}','{$mysqli->real_escape_string($_POST['faculty_name'])}','{$mysqli->real_escape_string($_POST['first_choice'])}','{$mysqli->real_escape_string($_POST['second_choice'])}')";
 
 
  $insert = $mysqli->query($sql);
  //test


 //
  
  // Print response from MySQL
  if ( $insert ) {
    echo "<div style='color: mediumseagreen;    font-size: 22px;    text-align: center;    margin: 4%;'>Your Application has been Received Successfully. Your ID: {$mysqli->insert_id}</div>";
  } else {
    die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
  
  
  // Close our connection
  $mysqli->close();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pundro University of Science & Techonology</title>
     <meta name="viewport" content="width=device-width, initial-state=1">
    <link rel="icon" type="image/x-icon" href="images/" />
    <link rel="stylesheet" href="css\bootstrap.css" />
     <link rel="stylesheet" href="css/datepicker.css" />
    <link rel="stylesheet" href="css\font-awesome.css" />
    <link rel="stylesheet" href="css/registration.css" />
    <script src="js\jquery.js">  </script>
    <script src="js\bootstrap-datepicker.js">  </script>
    <script src="js\bootstrap.js">  </script>
    <script src="js\registration.js">  </script>
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<script type="text/javascript"> 
	$(document).ready(function() {
		//this calculates values automatically 
		sum();
		$("#num1, #num2").on("keydown keyup", function() {
			sum();
		});
	});

	function sum() {
				var num1 = document.getElementById('num1').value;
				var num2 = document.getElementById('num2').value;
				var result = parseFloat(num1) + parseFloat(num2);
				if (!isNaN(result)) {
					document.getElementById('sum').value = result;
				}
			}
	 function printDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }
		
		 function printpr() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=700,height=600,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="Print.css" media="screen"/></head><body">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }
	
	function condition(){
		var x;
		x = Number(document.getElementById("#ssc_result")).value;
		if(x<4.5)
		{
			alert("you are not eligible.");
		}
		else if( x > 5){
			alert("Sorry this is not SSC result.");
		}
	}
	</script>
</head>
<body id="printarea">

    <div class="container">
       <div class="row row5" id="form_chart">
            <div class="col-md-12">
            <img src="images/pundro_logo.png" id="tmss_logo1" alt="" style=";" class="img-responsive"/>

            <div id="head_text_area" style="">
                <h2 style="text-align:center;">PUNDRO UNIVERSITY OF SCIENCE & TECHNOLOGY</h2>
                <h3 style="text-align:center;">BOGRA, BOGRA</h3>
                <h4 style="text-align:center;">Admission Form</h4>
            </div>
                <h3>Course Information</h3>
                <hr>

                <form action="online_admission.php" method="POST" onsubmit="javascript:return regform()">
                        <div class="form-inline">
                        <div class="form-group">
                        <label for="" style="margin-right:45px;">Applied for:</label>
                        <select name="level_status" id="level_status" class="form-control" onclick="erase_org_name()">
                            <option value="">Select One</option>
							<option value="Graduation">Graduation</option>
							<option value="Post Graduation">Post Graduation</option>
							
                        </select>
                        <p style="margin-left:158px;" id="org_name_error"></p>
                        </div>

                        <div class="form-group" id="course_name_group" style="">
                        <label for="" style="" id="course_name_label">Faculty Name:</label>
                        <select name="faculty_name" id="faculty_name" class="form-control" onclick="erase_course_name()">
                                     <option value="" >Select Faculty </option>
									<option value="Science & Engineering">Science & Engineering</option>
									<option value="Graphics Design">Business Studies</option>
									<option value="Graphics Design">Arts & Humanities</option>
									<option value="Graphics Design">Social Science</option>
									<option value="Graphics Design">Islamic Studies</option>
									<option value="Graphics Design">Law</option>
                        </select>
                                    <p style="margin-left:158px;" id="course_name_error"></p>
                        </div>
                        </div>
                         <br>
                        <div class="form-inline" >
                              <div class="form-group">
                              <label for="" style="margin-right:20px;">Subject choice 1st:</label>
                            <select name="first_choice" id="first_choice" class="form-control" onclick="erase_training_venue_error()">
                                    <option value="">Select Your first Subject</option>
									<option value="cse">Computer Science & Engineering</option>
									<option value="eee">Electrical & Electronic Engineering</option>
							</select>
							<label for="" style="margin-right:48px;">Subject choice 2nd:</label>
                            <select name="second_choice" id="second_choice" class="form-control" onclick="erase_training_venue_error()">
                                    <option value="">Select your 2nd subject</option>
									<option value="cse">Computer Science & Engineering</option>
									<option value="eee">Electrical & Electronic Engineering</option>
							</select>
                                    <p style="margin-left:158px;" id="training_venue_error"></p>

                             </div>

                             

                        </div>
                        <h3>Applicant's Information</h3>
                         <hr>
                         <div class="form-inline">
                         <div class="form-group">
                            <label for="" style="margin-right:52px;">Applicant name:</label>
                            <input type="text" name="name_bn" id="name_bn" placeholder="in bangla" class="form-control" onclick="erase_fathers_name_error()"/>
                             <p style="margin-left:156px;" id="fathers_name_error"></p>
                         </div>

                         <div class="form-group" id="fathers_occupation_group" style="">
                            <label for="" id="fathers_occupation_label" style="">Applicant name:</label>
                            <input type="text" name="name_en" id="name_en" placeholder="in English" class="form-control" onclick="erase_fathers_occupation_error()"/>
                            <p style="margin-left:156px;" id="fathers_occupation_error"></p>
                         </div>
                         </div>
                          <br>
                         <div class="form-inline">
                         <div class="form-group">
                            <label for="" style="margin-right:52px;">Father's Name</label>
                            <input type="text" name="father_name" id="father_name" class="form-control" onclick="erase_fathers_name_error()"/>
                             <p style="margin-left:156px;" id="fathers_name_error"></p>
                         </div>

                         <div class="form-group" id="fathers_occupation_group" style="">
                            <label for="" id="fathers_occupation_label" style="">Father's Occupation</label>
                            <input type="text" name="father_occupation" id="father_occupation" class="form-control" onclick="erase_fathers_occupation_error()"/>
                            <p style="margin-left:156px;" id="fathers_occupation_error"></p>
                         </div>
                         </div>
                          <br>
                         <div class="form-inline">
                         <div class="form-group">
                            <label for="" style="margin-right:46px;">Mother's Name</label>
                            <input type="text" name="mother_name" id="mother_name" class="form-control" onclick="erase_mothers_name_error()"/>
                             <p style="margin-left:156px;" id="mothers_name_error"></p>
                         </div>

                         <div class="form-group" id="mothers_occupation_group" style="">
                            <label for="" id="mothers_occupation_label" style="">Mother's Occupation</label>
                            <input type="text" name="mother_occupation" id="mother_occupation" class="form-control" onclick="erase_mothers_occupation_error()"/>
                            <p style="margin-left:156px;" id="mothers_occupation_error"></p>
                         </div>
                         </div>
                          <br>
                         <div class="form-inline">
                         <div class="form-group">
                            <label for="" style="margin-right:49px;">National ID No.<br>(optional)</label>
					        <input type="text" name="nid_no" id="nid_no" class="form-control" onclick="erase_nid_error()"/>
                            <p style="margin-left:156px;" id="nid_error"></p>
                         </div>

                         <div class="form-group" id="birth_cirtificate_group" style="">
                            <label for="" id="birth_cirtificate_label" style="">Birth Certificate No.<br>(optional)</label>
                            <input type="text" name="birth_certificate_no" id="birth_certificate_no" class="form-control" onclick=""/>
                            <p style="margin-left:156px;" id="birth_cirtificate_error"></p>
                         </div>
                         </div>
                         <br>

                          <div class="form-inline">
                         <div class="form-group">
                            <label for="" style="margin-right:60px;">Date Of Birth</label>
                            <input type="date" name="birthday" id="birthday"  class="form-control b_date" onclick="erase_birth_date_error()"/>
                            <p style="margin-left:156px;" id="birth_date_error"></p>
                         </div>

                         <div class="form-group" id="gender_group" style="">
                            <label for="" id="gender_group_label" style="">Gender</label>
                            <input type="radio" name="sex" id="male"  onclick="erase_gender_error()"/> Male
                            <input type="radio" name="sex" id="female"  onclick="erase_gender_error()"/> Female
							<input type="radio" name="sex" id="female"  onclick="erase_gender_error()"/> Others
                            <p style="margin-left:156px;" id="gender_error"></p>
                         </div>
                         </div>
                         <br>

                          <div class="form-inline">
                         <div class="form-group">
                            <label for="" style="margin-right:42px;">Mobile Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" onclick="erase_mobile_no_error()"/>
                            <p style="margin-left:156px;" id="mobile_no_error"></p>
                         </div>

                         <div class="form-group" id="email_group" style="">
                            <label for="" id="email_group_label" style="">Email</label>
                            <input type="email" name="email" id="email" class="form-control" onclick="erase_email_error()"/>
                            <p style="margin-left:156px;" id="email_error"></p>

                         </div>
                         </div>
                           <br>
                           <h4>Present Address:</h4>
                           <hr>
                         <div class="form-inline">
                         <div class="form-group">
                           <label for="">Village/State</label><br>
                            <input type="text" id="present_village_name" name="present_village_name" class="form-control" onclick="erase_present_village_name_error()"/>
                            <p style="" id="present_village_name_error"></p>
                         </div>

                         <div class="form-group">
                           <label for="">Post Office</label><br>
                            <input type="text" id="present_post_office" name="present_post_office" class="form-control" onclick="erase_present_post_office_error()"/>
                            <p style="" id="present_post_office_error"></p>
                         </div>

                         <div class="form-group">
                           <label for="">Post Code</label><br>
                            <input type="text" id="present_post_code" name="present_post_code" class="form-control" onclick="erase_present_post_code_error()"/>
                            <p style="" id="present_post_code_error"></p>
                         </div>

                         <div class="form-group">
                           <label for="">Police Station</label><br>
                            <input type="text" id="present_police_station" name="present_police_station" class="form-control" onclick="erase_present_police_station_error()"/>
                            <p style="" id="present_police_station_error"></p>
                         </div>

                         <div class="form-group">
                           <label for="">District</label><br>
                            <input type="text" id="present_district_name" name="present_district_name" class="form-control" onclick="erase_present_district_error()"/>
                             <p style="" id="present_district_error"></p>
                         </div>

                         <div class="form-group">
                           <label for="">Division</label><br>
                            <select name="present_division_name" id="present_division_name" class="form-control" onclick="erase_present_address_division_error()">
                                                <option value="" >Select Division</option>
												<option value="Dhaka">Dhaka</option>
												<option value="Chittagong">Chittagong</option>
												<option value="Rajshahi">Rajshahi</option>
												<option value="Khulna">Khulna</option>
												<option value="Barishal">Barishal</option>
												<option value="Sylhet">Sylhet</option>
												<option value="Rangpur">Rangpur</option>
												<option value="Mymenshing">Mymenshing</option>
                            </select>
                            <p style="" id="present_address_division_error"></p>
                         </div>
                         </div>


                          <br>
                           <h4>Parmanent Address:</h4>
                           <hr>
                         <div class="form-inline">
                         <div class="form-group">
                           <label for="">Village/State</label><br>
                            <input type="text" id="parmanent_village_name" name="present_village_name" class="form-control" onclick="erase_parmanent_village_name_error()"/>
                            <p style="" id="parmanent_village_name_error"></p>
                         </div>

                         <div class="form-group">
                           <label for="">Post Office</label><br>
                            <input type="text" id="parmanent_post_office" name="parmanent_post_office" class="form-control" onclick="erase_parmanent_post_office_error()"/>
                            <p style="" id="parmanent_post_office_error"></p>
                         </div>

                         <div class="form-group">
                           <label for="">Post Code</label><br>
                            <input type="text" id="parmanent_post_code" name="parmanent_post_code" class="form-control" onclick="erase_parmanent_post_code_error()"/>
                            <p style="" id="parmanent_post_code_error"></p>
                         </div>

                         <div class="form-group">
                           <label for="">Police Station</label><br>
                            <input type="text" id="parmanent_police_station" name="parmanent_police_station" class="form-control" onclick="erase_parmanent_police_station_error()"/>
                            <p style="" id="parmanent_police_station_error"></p>
                         </div>

                         <div class="form-group">
                           <label for="">District</label><br>
                            <input type="text" id="parmanent_district" name="parmanent_district" class="form-control" onclick="erase_parmanent_district_error()"/>
                            <p style="" id="parmanent_district_error"></p>
                         </div>

                         <div class="form-group">
                           <label for="">Division</label><br>
                            <select name="parmanent_address_division" id="parmanent_address_division" class="form-control" onclick="erase_parmanent_address_division_error()">
                                                <option value="" >Select Division</option>
												<option value="Dhaka">Dhaka</option>
												<option value="Chittagong">Chittagong</option>
												<option value="Rajshahi">Rajshahi</option>
												<option value="Khulna">Khulna</option>
												<option value="Barishal">Barishal</option>
												<option value="Sylhet">Sylhet</option>
												<option value="Rangpur">Rangpur</option>
												<option value="Mymenshing">Mymenshing</option>
                            </select>
                             <p style="" id="parmanent_address_division_error"></p>
                         </div>
                         </div>


                         <br>
                           <h3>Educational Qualification</h3>
                           <hr>
                            <table class="table-responsive" style="width:100%;">
                                  <tr>
                                    <th>SL</th>
                                    <th>Exam Name</th>
                                    <th>Institute Name</th>
                                    <th>Result</th>
                                    <th>Board/University</th>
                                    <th>Passing Year</th>
									
                                  </tr>

                                  <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>
                                        <select name="exam_name_1" id="exam_name_1" class="form-control" onclick="erase_exam_name_1()">
												<option value="" >Select</option>
												<option value="SSC">SSC</option>
												<option value="SSC(voc)">SSC (Vocational)</option>
												<option value="Dakhil">Dakhil</option>
												<option value="O Level">O Level</option>
												<option value="Equivalent">Equivalent</option>
												<option value="Others">Others</option>
											</select>
                                            <p style="" id="exam_name_1_error"></p>
                                    </td>
                                    <td>
                                        <input type="text" name="institute_name_1" id="institute_name_1" class="form-control" onclick="erase_institute_name_1_error()">
                                        <p style="" id="institute_name_1_error"></p>
                                    </td>
                                    <td>
                                        
												<input type="text" name="ssc_result" id="num1" placeholder="above 4.5" class="form-control" />
											
                                            <p style="" id="result_exam_1_error"></p>
                                    </td>
                                    <td>
                                            <select name="ssc_board" id="board_exam_1" class="form-control" onclick="condition()"/>
												<option value="">Select</option>
												<option value="Dhaka">Dhaka</option>
												<option value="Chittagong">Chittagong</option>
												<option value="Comilla">Comilla</option>
												<option value="Rajshahi">Rajshahi</option>
												<option value="Jashore">Jessore</option>
												<option value="Dinajpur">Dinajpur</option>
												<option value="Khulna">Khulna</option>
												<option value="Sylhet">Sylhet</option>
												<option value="Technical">Technical</option>
												<option value="Madrasha">Madrasha</option>
											</select>
                                            <p style="" id="board_exam_1_error"></p>
                                    </td>
                                    <td>
                                            <input type="text" name="ssc_pass_year" id="ssc_pass_year" class="form-control" placeholder="" onclick="erase_pass_year_exam_1_error()">
                                            <p style="" id="pass_year_exam_1_error"></p>
									</td>

							</tr>

                                  <tr>
                                    <td style="text-align:center;">2</td>
                                    <td>
                                        <select name="exam_name_2" id="exam_name_2" class="form-control" onclick="erase_result_exam_2_error()">
												<option value="">Select</option>
												<option value="HSC">HSC</option>
												<option value="HSC(voc)">HSC (Voc)</option>
												<option value="Alim">Alim</option>
												<option value="A Level">A Level</option>
												<option value="HSC_(BM)">HSC (BM)</option>
												<option value="Diploma_engineering">Diploma Engineering</option>
												<option value="Equivalent">Equivalent</option>
												<option value="Others">Others</option>
											</select>
                                            <p style="" id="exam_name_2_error"></p>
                                    </td>
                                    <td>
                                        <input type="text" name="institute_name_2" id="institute_name_2" class="form-control" onclick="erase_institute_name_exam_2_error()">
                                        <p style="" id="institute_name_exam_2_error"></p>
                                    </td>
                                    <td>
                                        
												<input type="text" name="hsc_result" id="num2" placeholder="above 4.00" class="form-control" onclick="erase_result_exam_2_error()"/>
											
                                            <p style="" id="result_exam_2_error"></p>
                                    </td>
                                    <td>
                                        <select name="hsc_board" id="hsc_board" class="form-control" onclick="erase_board_exam_2_error()">
												<option value="">Select</option>
												<option value="Dhaka">Dhaka</option>
												<option value="Chittagong">Chittagong</option>
												<option value="Comilla">Comilla</option>
												<option value="Rajshahi">Rajshahi</option>
												<option value="Jashore">Jessore</option>
												<option value="Dinajpur">Dinajpur</option>
												<option value="Khulna">Khulna</option>
												<option value="Sylhet">Sylhet</option>
												<option value="Technical">Technical</option>
												<option value="Madrasha">Madrasha</option>
											</select>
                                            <p style="" id="board_exam_2_error"></p>
                                    </td>
                                    <td>
                                         <input type="text" name="hsc_pass_year" id="hsc_pass_year" class="form-control" placeholder="" onclick="erase_pass_year_exam_2_error()">
                                         <p style="" id="pass_year_exam_2_error"></p>
                                    </td>
                                  </tr>
								</table>
                           
							<div class="form-inline">
                                <div class="form-group">
                                    <label style="margin-right:50px;">Total GPA</label>
                                    <input type="text" id="sum" name="total_gpa" class="form-control" />
									 </div>
									 
							<div class="form-group" id="religion_group" style="">
                                    <label id="religion_label" style="">Religion</label>
                                    <select id="religion" name="religion" class="form-control" onclick="erase_religion_error()">
                                            <option value="">Select</option>
        									<option value="Buddhist">Buddhist</option>
        									<option value="Sonaton">Sonatan</option>
        									<option value="Islam">Islam</option>
        									<option value="Christian">Christian</option>
        									<option value="Others">Others</option>
                                    </select>
                                    <p style="margin-left:119px;" id="religion_error"></p>
                                </div>
                              </div>
                               <br>
                              <div class="form-inline">
                                <div class="form-group">
                                    <label style="margin-right:50px;">Nationality</label>
                                    <input type="text" id="nationality" name="nationality" class="form-control" onclick="erase_nationality_error()"/>
                                    <p style="margin-left:140px;" id="nationality_error"></p>
                                </div>

                                <div class="form-group" id="country_group" style="">
                                    <label>Name of Country</label>
                                    <select name="country" id="country" class="form-control" onclick="erase_country_error()">
                                         <option value="">Select Country</option>
										<option  value='AFG'> AFGHANISTAN</option><option  value='ALA'> ALAND ISLANDS</option><option  value='ALB'> ALBANIA</option><option  value='DZA'> ALGERIA</option><option  value='ASM'> AMERICAN SAMOA</option><option  value='AND'> ANDORRA</option><option  value='AGO'> ANGOLA</option><option  value='AIA'> ANGUILLA</option><option  value='ATA'> ANTARCTICA</option><option  value='ATG'> ANTIGUA AND BARBUDA</option><option  value='ARG'> ARGENTINA</option><option  value='ARM'> ARMENIA</option><option  value='ABW'> ARUBA</option><option  value='AUS'> AUSTRALIA</option><option  value='AUT'> AUSTRIA</option><option  value='AZE'> AZERBAIJAN</option><option  value='BHS'> BAHAMAS</option><option  value='BHR'> BAHRAIN</option><option  value='BGD'> BANGLADESH</option><option  value='BRB'> BARBADOS</option><option  value='BLR'> BELARUS</option><option  value='BEL'> BELGIUM</option><option  value='BLZ'> BELIZE</option><option  value='BEN'> BENIN (DAHOMEY)</option><option  value='BMU'> BERMUDA</option><option  value='BTN'> BHUTAN</option><option  value='BOL'> BOLIVIA</option><option  value='BIH'> BOSNIA AND HERZEGOVINA</option><option  value='BWA'> BOTSWANA</option><option  value='BVT'> BOUVET ISLAND</option><option  value='BRA'> BRAZIL</option><option  value='IOT'> BRITISH INDIAN OCEAN TERRITORY</option><option  value='BRN'> BRUNEI DARUSSALAM</option><option  value='BGR'> BULGARIA</option><option  value='BFA'> BURKINA FASO ( UPPER VOLTA)</option><option  value='BDI'> BURUNDI</option><option  value='KHM'> CAMBODIA (KAMPUCHEA)</option><option  value='CMR'> CAMEROON</option><option  value='CAN'> CANADA</option><option  value='CPV'> CAPE VERDE ISLANDS</option><option  value='XCC'> CARRIBEAN COMMUNITY</option><option  value='CYM'> CAYMAN ISLANDS</option><option  value='CAF'> CENTRAL AFRICAN REPUBLIC</option><option  value='TCD'> CHAD</option><option  value='CHL'> CHILE</option><option  value='CHN'> CHINA</option><option  value='CXR'> CHRISTMAS ISLANDS</option><option  value='CCK'> COCOS (KEELING) ISLANDS</option><option  value='COL'> COLOMBIA</option><option  value='COM'> COMOROS</option><option  value='COG'> CONGO</option><option  value='COD'> CONGO, DEMOCRATIC REPUBLIC OF THE (ZAIRE)</option><option  value='COK'> COOK ISLANDS</option><option  value='CRI'> COSTA RICA</option><option  value='CIV'> COTE D'IVOIRE</option><option  value='HRV'> CROATIA -REPUBLIC OF CROATIA</option><option  value='CUB'> CUBA</option><option  value='CYP'> CYPRUS</option><option  value='CZE'> CZECH REPUBLIC</option><option  value='DNK'> DENMARK</option><option  value='DJI'> DJIBOUTI</option><option  value='DMA'> DOMINICA</option><option  value='DOM'> DOMINICAN REPUBLIC</option><option  value='TLS'> EAST TIMOR, DEMOCRATIC REPUBLIC OF</option><option  value='ECU'> ECUADOR</option><option  value='EGY'> EGYPT</option><option  value='SLV'> EL SALVADOR</option><option  value='GNQ'> EQUITORIAL GUINEA</option><option  value='ERI'> ERITREA</option><option  value='EST'> ESTONIA</option><option  value='ETH'> ETHIOPIA</option><option  value='FLK'> FALKLAND ISLANDS (MALVINAS)</option><option  value='FRO'> FAROE ISLANDS</option><option  value='FJI'> FIJI</option><option  value='FIN'> FINLAND</option><option  value='FRA'> FRANCE</option><option  value='FXX'> FRANCE METROPOLITAN</option><option  value='GUF'> FRENCH GUIANA</option><option  value='ATF'> FRENCH SOUTHERN TERRITORIES</option><option  value='GAB'> GABON</option><option  value='GMB'> GAMBIA</option><option  value='GEO'> GEORGIA</option><option  value='DEU'> GERMANY</option><option  value='GHA'> GHANA</option><option  value='GIB'> GIBRALTAR</option><option  value='GRC'> GREECE</option><option  value='GRL'> GREENLAND</option><option  value='GRD'> GRENADA</option><option  value='GLP'> GUADELOUPE</option><option  value='GUM'> GUAM</option><option  value='GTM'> GUATEMALA</option><option  value='GGY'> GUERNSEY</option><option  value='GIN'> GUINEA</option><option  value='GNB'> GUINEA BISSAU</option><option  value='GUY'> GUYANA</option><option  value='HTI'> HAITI</option><option  value='HMD'> HEARD AND MCDONALD ISLANDS</option><option  value='VAT'> HOLY SEE (VATICAN CITY STATE)</option><option  value='HND'> HONDURAS</option><option  value='HKG'> HONG KONG</option><option  value='HUN'> HUNGARY</option><option  value='ISL'> ICELAND</option><option  value='IND'> INDIA</option><option  value='IDN'> INDONESIA</option><option  value='IRN'> IRAN</option><option  value='IRQ'> IRAQ</option><option  value='IRL'> IRELAND</option><option  value='IMN'> ISLE OF MAN</option><option  value='ISR'> ISRAEL</option><option  value='ITA'> ITALY</option><option value="IND">INDIA</option>  <option  value='JAM'> JAMAICA</option><option  value='JPN'> JAPAN</option><option  value='JEY'> JERSEY</option><option  value='JOR'> JORDAN</option><option  value='KAZ'> KAZAKHSTAN</option><option  value='KEN'> KENYA</option><option  value='KIR'> KIRIBATI</option><option  value='PRK'> KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF</option><option  value='KOR'> KOREA, REPUBLIC OF</option><option  value='KWT'> KUWAIT</option><option  value='KGZ'> KYRGYZSTAN</option><option  value='LAO'> LAOS</option><option  value='LVA'> LATVIA</option><option  value='LBN'> LEBANON</option><option  value='LSO'> LESOTHO</option><option  value='LBR'> LIBERIA</option><option  value='LBY'> LIBYA</option><option  value='LIE'> LIECHTENSTEIN</option><option  value='LTU'> LITHUANIA</option><option  value='LUX'> LUXEMBOURG</option><option  value='MAC'> MACAU</option><option  value='MKD'> MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF</option><option  value='MDG'> MADAGASCAR</option><option  value='MWI'> MALAWI</option><option  value='MYS'> MALAYSIA</option><option  value='MDV'> MALDIVES</option><option  value='MLI'> MALI</option><option  value='MLT'> MALTA</option><option  value='MHL'> MARSHALL ISLANDS</option><option  value='MTQ'> MARTINIQUE</option><option  value='MRT'> MAURITANIA</option><option  value='MUS'> MAURITIUS</option><option  value='MYT'> MAYOTTE</option><option  value='MEX'> MEXICO</option><option  value='FSM'> MICRONESIA, FEDERATED STATES OF</option><option  value='MDA'> MOLDOVA, REPUBLIC OF</option><option  value='MCO'> MONACO</option><option  value='MNG'> MONGOLIA</option><option  value='MNE'> MONTENEGRO</option><option  value='MSR'> MONTSERRAT</option><option  value='MAR'> MOROCCO</option><option  value='MOZ'> MOZAMBIQUE</option><option  value='MMR'> MYANMAR (BURMA)</option><option  value='NAM'> NAMIBIA</option><option  value='NRU'> NAURU</option><option  value='NPL'> NEPAL</option><option  value='NLD'> NETHERLANDS</option><option  value='ANT'> NETHERLANDS ANTILLES</option><option  value='NTZ'> NEUTRAL ZONE</option><option  value='NCL'> NEW CALEDONIA</option><option  value='NZL'> NEW ZEALAND</option><option  value='NIC'> NICARAGUA</option><option  value='NER'> NIGER</option><option  value='NGA'> NIGERIA</option><option  value='NIU'> NIUE</option><option  value='NFK'> NORFOLK ISLAND</option><option  value='MNP'> NORTHERN MARIANA ISLANDS</option><option  value='NOR'> NORWAY</option><option  value='OMN'> OMAN</option><option  value='PAK'> PAKISTAN</option><option  value='PLW'> PALAU</option><option  value='PSE'> PALESTINE</option><option  value='PAN'> PANAMA</option><option  value='PNG'> PAPUA NEW GUINEA</option><option  value='PRY'> PARAGUAY</option><option  value='XXX'> PERSON OF UNSPECIFIED NATIONALITY</option><option  value='PER'> PERU</option><option  value='PHL'> PHILIPPINES</option><option  value='PCN'> PITCAIRN</option><option  value='POL'> POLAND</option><option  value='PRT'> PORTUGAL</option><option  value='PRI'> PUERTO RICO</option><option  value='QAT'> QATAR</option><option  value='XXB'> REFUGEE</option><option  value='XXC'> REFUGEE (NON-CONVENTIONAL) OTHER THAN XXB</option><option  value='UNK'> RESIDENT OF KOSOVO (UNMIK)</option><option  value='REU'> REUNION ISLANDS</option><option  value='ROU'> ROMANIA</option><option  value='RUS'> RUSSIAN FEDERATION</option><option  value='RWA'> RWANDA</option><option  value='BLM'> SAINT BARTHELEMY</option><option  value='SHN'> SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA</option><option  value='KNA'> SAINT KITTS AND NEVIS</option><option  value='LCA'> SAINT LUCIA</option><option  value='SPM'> SAINT PIERRE AND MIQUELON</option><option  value='VCT'> SAINT VINCENT AND THE GRENADINES</option><option  value='WSM'> SAMOA</option><option  value='SMR'> SAN MARINO</option><option  value='STP'> SAO TOME AND PRINCIPE</option><option  value='SAU'> SAUDI ARABIA</option><option  value='SEN'> SENEGAL</option><option  value='SRB'> SERBIA</option><option  value='SYC'> SEYCHELLES</option><option  value='SLE'> SIERRA LEONE</option><option  value='SGP'> SINGAPORE</option><option  value='SVK'> SLOVAK REPUBLIC</option><option  value='SVN'> SLOVENIA</option><option  value='SLB'> SOLOMON ISLANDS</option><option  value='SOM'> SOMALIA</option><option  value='ZAF'> SOUTH AFRICA</option><option  value='SGS'> SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option><option  value='SSD'> SOUTH SUDAN</option><option  value='XOM'> SOVEREIGN MILITARY ORDER OF MALTA</option><option  value='ESP'> SPAIN</option><option  value='LKA'> SRI LANKA</option><option  value='XXA'> STATELESS PERSON</option><option  value='SDN'> SUDAN</option><option  value='SUR'> SURINAME</option><option  value='SJM'> SVALBARD AND JAN MAYEN ISLANDS</option><option  value='SWZ'> SWAZILAND</option><option  value='SWE'> SWEDEN</option><option  value='CHE'> SWITZERLAND</option><option  value='SYR'> SYRIA</option><option  value='TWN'> TAIWAN</option><option  value='TZA'> TANZANIA</option><option  value='TJK'> TAZIKISTAN</option><option  value='THA'> THAILAND</option><option  value='TBT'> TIBETAN ORIGIN</option><option  value='TGO'> TOGO</option><option  value='TKL'> TOKELAU</option><option  value='TON'> TONGA</option><option  value='TTO'> TRINIDAD AND TOBAGO </option><option  value='TUN'> TUNISIA</option><option  value='TUR'> TURKEY</option><option  value='TKM'> TURKMENISTAN</option><option  value='TCA'> TURKS AND CAICOS ISLANDS</option><option  value='TUV'> TUVALU</option><option  value='UGA'> UGANDA</option><option  value='GBD'> UK BRITISH DEPENDENT TERRITORIES CITIZEN</option><option  value='GBO'> UK BRITISH OVERSEAS CITIZEN</option><option  value='GBN'> UK BRITISH OVERSEAS NATIONAL </option><option  value='GBP'> UK BRITISH PROTECTED PERSON</option><option  value='GBS'> UK BRITISH SUBJECT</option><option  value='UKR'> UKRAINE</option><option  value='ARE'> UNITED ARAB EMIRATES</option><option  value='GBR'> UNITED KINGDOM</option><option  value='UNO'> UNITED NATIONS ORGANIZATION</option><option  value='UNA'> UNITED NATIONS SPECIALIZED AGENCY</option><option  value='UMI'> UNITED STATES MINOR OUTLYING ISLANDS</option><option  value='USA'> UNITED STATES OF AMERICA</option><option  value='URY'> URAGUAY</option><option  value='UZB'> UZBEKISTAN</option><option  value='VUT'> VANUATU (NEW HEBRIDES)</option><option  value='VEN'> VENEZUELA</option><option  value='VNM'> VIETNAM</option><option  value='VGB'> VIRGIN ISLANDS (BRITISH)</option><option  value='VIR'> VIRGIN ISLANDS (US)</option><option  value='WLF'> WALLIS AND FUTUNA ISLANDS</option><option  value='ESH'> WESTERN SAHARA</option><option  value='YEM'> YEMEN</option><option  value='YUG'> YUGOSLAVIA</option><option  value='ZMB'> ZAMBIA</option><option  value='ZWE'> ZIMBABWE</option>
                            </select>
                            <p style="margin-left:124px;" id="country_error"></p>
                                </div>
                              </div>
                               
                              <br><br>
							  <div>
								<table class="responsive" width="100%">
								<tr>
								<th>your image</th>
								<th>SSC certifiacte</th>
								<th>HSC certificate</th>
					
								</tr>
								<tr>
										<td><input type="file" value="image" name="photo" class="btn btn-primary"/></td>
										<td><input type="file" value="image" name="ssc_certificate" class="btn btn-primary"/></td>
										<td><input type="file" value="image" name="hsc_certificate" class="btn btn-primary"/></td>
								</tr>
								</table>
							  </div>
							  <div style="float: left; width: 100%; text-align: center;margin: 1%;">
									<input type="button" value="Print preview" class="btn btn-primary" onclick="printpr();"/>
									<input type="button" value="print" class="btn btn-primary" onclick="printDoc();"/>
									<input type="submit" value="Submit Form" class="btn btn-primary"/>
									<br>
									<br>
							</div>
					</form>
                
				</div>

			</div>

    </div>
</body>
</html>