<div class="row">
	<div class="col-md-12">
        <div class="tab-pane box" id="" style="padding: 5px">
            <form class="form-vertical" id="teacher_form">
                <div class="row-fluid" id="second_part">
                    <input type="hidden" name="section_idd" id="section_idd" value="">
                    <input type="hidden" name="session_value" id="session_value" value="">
                    <!--PAGE CONTENT BEGINS-->

                    <div class="row-fluid" style="height:200px;">
                        <div class="span2">
                            <!--		<img src="asset/custom/upload_photo.jpg"  onclick="performClick('upload');" id="image" style="height:100px" >
                                    <input type="text" id="file_id" style="display:none" />
                                -->
                            <img src="./__ SCHOOL MANAGEMENT SYSTEM __2 HR &amp; Admin_files/upload_photo.jpg" id="image" style="height:120px;top:20px;">
                            <input type="file" id="upload" style="display:none">
                            <p onclick="performClick('upload');" class="photo-button"> Upload Photo</p>
                            <p>

                            </p></div>
                        <div class="span8">
                            &nbsp;
                        </div>
                        <div class="span2">
                            &nbsp;
                        </div>

                    </div>
                    <legend style="font-size:18px">Personal Information</legend>
                    <div class="row-fluid">
                        <div class="span3">


                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Full Name<font color="#FF0000">*</font></label>

                                <div class="controls">
                                    <input type="text" class="small" id="_full_name" name="_full_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Gender <font color="#FF0000">*</font></label>

                                <div class="controls">
                                    <select id="_gender" name="_gender">
                                        <option value="">---SELECT---</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Transgender">Transgender</option>

                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Date of Birth <font color="#FF0000">*</font></label>

                                <div class="controls">
                                    <input id="st_date_b" name="st_date_b" class="date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Profession<font color="#FF0000"></font></label>

                                <div class="controls">

                                    <select id="emp_occupation" name="emp_occupation">
                                        <option value="T">Teaching</option>
                                        <option value="O">Others</option>
                                    </select>

                                </div>
                            </div>




                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Home Phone <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small" id="emp_home_phone" name="emp_home_phone">



                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Quota <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <select id="quota" name="quota">
                                        <option value="">---SELECT---</option>
                                        <option value="1">Freedom Fighter</option><option value="39">Tribal</option><option value="40">Disable</option>
                                    </select>
                                </div>
                            </div>










                        </div>
                        <div class="span3">

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Nick Name <font color="#FF0000"></font></label>

                                <div class="controls">


                                    <input type="text" class="small" name="nick_name" id="nick_name">


                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Nationality <font color="#FF0000">*</font></label>

                                <div class="controls">


                                    <select name="emp_nationality" id="emp_nationality">
                                        <option value="">---SELECT---</option>
                                        <option value="Bangladeshi">Bangladeshi</option>
                                        <option value="other">other</option>
                                    </select>


                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Blood Group <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <select id="_blood_group_id" name="_blood_group_id">
                                        <option value="">---SELECT---</option>
                                        <option value="25">A+</option><option value="26">A-</option><option value="27">B+</option><option value="28">B-</option><option value="29">O+</option><option value="30">O-</option><option value="41">AB-</option><option value="42">AB+</option>
                                    </select>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Depertment <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <select id="dept" name="dept">
                                        <option value="">---SELECT---</option>
                                        <option value="6">Science</option><option value="7">Business Study</option><option value="53">Humanities</option>
                                    </select>


                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Office Phone <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small" id="emp_office_phone" name="emp_office_phone">



                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">last promotion date</label>

                                <div class="controls">
                                    <input id="emp_prom_date" name="emp_prom_date" class="date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">

                                </div>
                            </div>


                        </div>
                        <div class="span3">

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Code Name<font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small " id="code_name" name="code_name">



                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label" for="form-field-1">National ID No<font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small " id="national_id" name="national_id">



                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Marital Status<font color="#FF0000">*</font></label>

                                <div class="controls">
                                    <select id="_marry" name="_marry">
                                        <option value="">---SELECT---</option>
                                        <option value="Married">Married</option>
                                        <option value="unmarried">Unmarried</option>


                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Designation<font color="#FF0000"></font></label>

                                <div class="controls">



                                    <select id="designation" name="designation">
                                        <option value="">---SELECT---</option>
                                        <option value="8">Sr. Teacher</option><option value="9">Principal</option><option value="54">Teacher</option><option value="55">Clark</option><option value="56">Head Teacher</option><option value="57">Department Head</option><option value="58">Personal Secretery</option><option value="59">Nanny</option><option value="155">Cleaner</option><option value="156">Peon</option>

                                    </select>

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Contact Email <font color="#FF0000"></font></label>

                                <div class="controls">
                                    <input type="email" class="small" id="contact_email" name="contact_email">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Hobby<font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small " id="hobby" name="hobby">



                                </div>
                            </div>






                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">EMP Code </label>

                                <div class="controls">

                                    <input type="text" class="small" id="emp_code" name="emp_code">



                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Relegion <font color="#FF0000">*</font></label>

                                <div class="controls">

                                    <select id="relegion" name="relegion">
                                        <option value="">---SELECT---</option>
                                        <option value="2">Islam</option><option value="3">Hindu</option><option value="43">christan</option><option value="44">Buddist</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Joining Date <font color="#FF0000"></font></label>

                                <div class="controls ">


                                    <input id="joining_date" name="joining_date" class="date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">




                                </div>



                            </div>









                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Section<font color="#FF0000"></font></label>

                                <div class="controls">



                                    <select id="section" name="section">
                                        <option value="">---SELECT---</option>
                                        <option value="13">College</option><option value="14">Secondary</option><option value="15">Higher</option><option value="16">Primary</option>

                                    </select>


                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Contact Mobile No <font color="#FF0000">*</font></label>

                                <div class="controls">
                                    <input type="text" class="small" id="contact_mobile" name="contact_mobile">
                                </div>
                            </div>

                        </div>
                    </div>
                    <legend style="font-size:18px">Address</legend>
                    <div class="row-fluid">
                        <div class="span6">
                            <legend style="font-size:14px">Present</legend>
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1"> District <font color="#FF0000"></font></label>

                                        <div class="controls">

                                            <select name="district_id_present" id="district_id_present" onchange="call_country(this.value,'thana_id_present')">
                                                <option value="">---SELECT---</option>
                                                <option value="2">Barisal</option><option value="47">Bhola</option><option value="75">Jhalakathi</option><option value="111">Patuakhali</option><option value="173">Pirojpur</option><option value="213">Bandarban</option><option value="250">Brahmanbaria</option><option value="281">Chandpur</option><option value="368">Chittagong</option><option value="502">Comilla</option><option value="612">Fe n i</option><option value="649">Khagrachari</option><option value="685">Lakshmipur</option><option value="738">Noakhali</option><option value="804">Rangamati</option><option value="841">Dhaka</option><option value="882">Faridpur</option><option value="972">Gazipur</option><option value="994">Gopalganj</option><option value="1046">Gopalgonj</option><option value="1067">Jamalpur</option><option value="1146">Kishoregonj</option><option value="1258">Madaripur</option><option value="1319">Manikganj</option><option value="1390">Munshiganj</option><option value="1405">Munshigonj</option><option value="1440">Mymensingh</option><option value="1546">Narayanganj</option><option value="1557">Narayangonj</option><option value="1595">Narsingdi</option><option value="1645">Netrakona</option><option value="1710">Netrokon</option><option value="1718">Netrokona</option><option value="1740">Noakhali</option><option value="1806">Rajbari</option><option value="1849">Sariatpur</option><option value="1864">Shariatpur</option><option value="1918">Sherpur</option><option value="1974">Tangail</option><option value="2073">Bagerhat</option><option value="2168">Chuadanga</option><option value="2183">Jessore</option><option value="2245">Jhenaidah</option><option value="2321">Jhenidah</option><option value="2346">Khulna</option><option value="2423">Kushtia</option><option value="2491">Magura</option><option value="2531">Meherpur</option><option value="2552">Narail</option><option value="2593">Satkhira</option><option value="2664">Bogra</option><option value="2742">Dinajpur</option><option value="2843">Gaibandha</option><option value="2931">Joypurhat</option><option value="2967">Kurigram</option><option value="3047">Lalmonirhat</option><option value="3102">Naogan</option><option value="3135">Naogaon</option><option value="3211">Natore</option><option value="3268">Nawabgonj</option><option value="3318">Nilphamari</option><option value="3382">Pabna</option><option value="3474">Panchagar</option><option value="3504">Chapainawabganj</option><option value="3520">Rajshahi</option><option value="3577">Rangpur</option><option value="3664">Sirajganj</option><option value="3713">Sirajgonj</option><option value="3754">Thakurgaon</option><option value="3816">Sunamganj</option><option value="3851">Habiganj</option><option value="3877">Habigonj</option><option value="3928">Hobigonj</option><option value="3960">Moulvibazar</option><option value="4002">Sumanganj</option><option value="4013">Sunamgonj</option><option value="4059">Sylhet</option><option value="4162">Thakurgaon</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1"> Thana <font color="#FF0000"></font></label>

                                        <div class="controls">
                                            <select id="thana_id_present" name="thana_id_present">

                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1"> Address <font color="#FF0000"></font></label>

                                        <div class="controls">
                                            <textarea rows="1" id="pr_address" name="pr_address" style="width:525px;height:75px;"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <legend style="font-size:14px">Permanent</legend>
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1"> District <font color="#FF0000">*</font></label>

                                        <div class="controls">
                                            <select name="district_id_permanent" id="district_id_permanent" onchange="call_country(this.value,'thana_id_permanent')">
                                                <option value="">---SELECT---</option>
                                                <option value="2">Barisal</option><option value="47">Bhola</option><option value="75">Jhalakathi</option><option value="111">Patuakhali</option><option value="173">Pirojpur</option><option value="213">Bandarban</option><option value="250">Brahmanbaria</option><option value="281">Chandpur</option><option value="368">Chittagong</option><option value="502">Comilla</option><option value="612">Fe n i</option><option value="649">Khagrachari</option><option value="685">Lakshmipur</option><option value="738">Noakhali</option><option value="804">Rangamati</option><option value="841">Dhaka</option><option value="882">Faridpur</option><option value="972">Gazipur</option><option value="994">Gopalganj</option><option value="1046">Gopalgonj</option><option value="1067">Jamalpur</option><option value="1146">Kishoregonj</option><option value="1258">Madaripur</option><option value="1319">Manikganj</option><option value="1390">Munshiganj</option><option value="1405">Munshigonj</option><option value="1440">Mymensingh</option><option value="1546">Narayanganj</option><option value="1557">Narayangonj</option><option value="1595">Narsingdi</option><option value="1645">Netrakona</option><option value="1710">Netrokon</option><option value="1718">Netrokona</option><option value="1740">Noakhali</option><option value="1806">Rajbari</option><option value="1849">Sariatpur</option><option value="1864">Shariatpur</option><option value="1918">Sherpur</option><option value="1974">Tangail</option><option value="2073">Bagerhat</option><option value="2168">Chuadanga</option><option value="2183">Jessore</option><option value="2245">Jhenaidah</option><option value="2321">Jhenidah</option><option value="2346">Khulna</option><option value="2423">Kushtia</option><option value="2491">Magura</option><option value="2531">Meherpur</option><option value="2552">Narail</option><option value="2593">Satkhira</option><option value="2664">Bogra</option><option value="2742">Dinajpur</option><option value="2843">Gaibandha</option><option value="2931">Joypurhat</option><option value="2967">Kurigram</option><option value="3047">Lalmonirhat</option><option value="3102">Naogan</option><option value="3135">Naogaon</option><option value="3211">Natore</option><option value="3268">Nawabgonj</option><option value="3318">Nilphamari</option><option value="3382">Pabna</option><option value="3474">Panchagar</option><option value="3504">Chapainawabganj</option><option value="3520">Rajshahi</option><option value="3577">Rangpur</option><option value="3664">Sirajganj</option><option value="3713">Sirajgonj</option><option value="3754">Thakurgaon</option><option value="3816">Sunamganj</option><option value="3851">Habiganj</option><option value="3877">Habigonj</option><option value="3928">Hobigonj</option><option value="3960">Moulvibazar</option><option value="4002">Sumanganj</option><option value="4013">Sunamgonj</option><option value="4059">Sylhet</option><option value="4162">Thakurgaon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1"> Thana <font color="#FF0000">*</font></label>

                                        <div class="controls">
                                            <select id="thana_id_permanent" name="thana_id_permanent">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1"> Address <font color="#FF0000">*</font></label>

                                        <div class="controls">

                                            <textarea rows="1" id="pm_address" name="pm_address" style="width:525px;height:75px;"></textarea>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <legend style="font-size:18px">Spous Information</legend>
                    <div class="row-fluid">
                        <div class="span3">


                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Full Name</label>

                                <div class="controls">
                                    <input type="text" class="small" id="spous_full_name" name="spous_full_name">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Email <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="email" class="small" id="spous_email" name="spous_email">



                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Office Address <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small" id="spous_office_address" name="spous_office_address">



                                </div>
                            </div>
                        </div>
                        <div class="span3">


                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Mobile No</label>

                                <div class="controls">
                                    <input type="text" class="small" id="sppous_mobile" name="sppous_mobile">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Home Phone <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small" id="sppous_home_phone" name="sppous_home_phone">



                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Yearly Income <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small" id="sppous_yearly_income" name="sppous_yearly_income">



                                </div>
                            </div>

                        </div>
                        <div class="span3">


                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Occupation<font color="#FF0000"></font></label>

                                <div class="controls">

                                    <select id="sppous_occupation" name="sppous_occupation">
                                        <option value="">---SELECT---</option>
                                        <option value="10">Teacher</option><option value="11">Farmer</option><option value="12">House wife</option><option value="60">Sellsman</option><option value="61">Doctor</option><option value="62">Writer</option><option value="63">Lawyer</option><option value="64">Engineer</option><option value="65">Shopkeeper</option><option value="66">Businessman</option><option value="67">Labour</option><option value="68">Army</option><option value="69">administration</option><option value="70">Journalist</option>
                                    </select>

                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Nationality <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <select name="sppous_nationality" id="sppous_nationality">
                                        <option value="">---SELECT---</option>
                                        <option value="Bangladeshi">Bangladeshi</option>
                                        <option value="other">other</option>
                                    </select>




                                </div>
                            </div>



                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Office Phone <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small" id="sppous_office_phone" name="sppous_office_phone">



                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Blood Group <font color="#FF0000"></font></label>

                                <div class="controls">


                                    <select id="sppous_blood_group" name="sppous_blood_group">
                                        <option value="">---SELECT---</option>
                                        <option value="25">A+</option><option value="26">A-</option><option value="27">B+</option><option value="28">B-</option><option value="29">O+</option><option value="30">O-</option><option value="41">AB-</option><option value="42">AB+</option>
                                    </select>



                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">National ID <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small" id="sppous_national_id" name="sppous_national_id">



                                </div>
                            </div>

                        </div>
                    </div>

                    <p style="font-size:18px">Child Information</p>

                    <div class="row-fluid">
                        <div class="row" style="padding:0;margin:0;">

                            <table class="table" id="sites1">
                                <tbody><tr>
                                    <td>Full Name</td>

                                    <td>Date of Birth</td>

                                    <td>Gender</td>
                                    <td>Class</td>
                                    <td>Institute</td>
                                    <td><a class="btn btn-minier btn-yellow" style="float:right;width:60px;" id="add1">

                                            Add More
                                        </a>
                                    </td>


                                </tr>
                                <tr>
                                    <td><input type="text" class="small" id="child_full_name" name="ch[0][child_full_name]">	</td>

                                    <td><input type="text" class="date-picker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" id="ch_dob" name="ch[0][ch_dob]"></td>
                                    <td><select style="width:100px" id="child_gender" name="ch[0][child_gender]">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Transgender">Transgender</option>
                                        </select></td>
                                    <td><input type="text" style="width:100px" class="input" id="child_class" name="ch[0][child_class]"></td>
                                    <td>	<input type="text" class="input" id="child_institute" name="ch[0][child_institute]">	</td>
                                    <td>		</td>

                                </tr>
                                </tbody></table>
                        </div>

                    </div>
                    <p style="font-size:18px">Academic Information</p>
                    <div class="row-fluid">
                        <div class="row" style="padding:0;margin:0;">

                            <table class="table" id="sites">
                                <tbody><tr>
                                    <td>Exam Name</td>
                                    <td>Passing Year</td>
                                    <td>Institution</td>
                                    <td>GPA/Marks</td>
                                    <td>Board</td>
                                    <td>Grade</td>
                                    <td><a class="btn btn-minier btn-yellow" style="float:right;width:60px;" id="add">

                                            Add More
                                        </a></td>

                                </tr>
                                </tbody><tbody>
                                <tr>
                                    <td>

                                        <select id="exam" style="width: 90px" name="ac[0][ac_exame_name]">
                                            <option value="">SELECT</option>
                                            <option value="19">PSC</option><option value="20">JSC</option><option value="21">SSC</option><option value="22">HSC</option><option value="23">BSC</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="input" style="width: 70px" id="ac_passing_year" name="ac[0][ac_passing_year]"></td>
                                    <td><input type="text" class="small" id="ac_institute" name="ac[0][ac_institute]"></td>
                                    <td><input type="text" class="small" style="width: 70px" id="ac_gpa" name="ac[0][ac_gpa]"></td>
                                    <td>
                                        <select id="ac_board" name="ac[0][ac_board]" style="width: 90px">
                                            <option value="">SELECT</option>
                                            <option value="17">Dhaka</option><option value="18">Jessore</option><option value="71">Rajshahi</option><option value="72">Khulna</option><option value="73">Barisal</option><option value="74">Chittagong</option><option value="75">Sylet</option><option value="76">Dinajpur</option><option value="77">Kumillah</option><option value="78">Madrasha</option>
                                        </select>	</td>
                                    <td>
                                        <select id="ac_grade" style="width: 110px" name="ac[0][ac_grade]">
                                            <option value="">SELECT</option>
                                            <option value="24">A+</option><option value="31">A</option><option value="32">A-</option><option value="33">B+</option><option value="34">B</option><option value="35">B-</option><option value="36">C+</option><option value="37">C</option><option value="38">D</option>
                                        </select>	</td>
                                    <td>		</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="padding:0;margin:0;">

                        </div>
                    </div>




                    <p style="font-size:18px">Training Information</p>
                    <div class="row-fluid">
                        <div class="row" style="padding:0;margin:0;">

                            <table class="table" id="tsites">
                                <tbody><tr>
                                    <td>Course Name</td>
                                    <td>Start Date</td>
                                    <td>End Date</td>

                                    <td>Result</td>
                                    <td>Institution Address</td>
                                    <td><a class="btn btn-minier btn-yellow" style="float:right;width:60px;" id="addt">

                                            Add More
                                        </a></td>

                                </tr>
                                <tr>

                                    <td><input type="text" style="width: 140px" class="small" id="tr_course_name" name="tra[0][tr_course_name]">	</td>

                                    <td><input class="date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" style="width: 140px" id="tr_start_year" name="tra[0][tr_start_year]"></td>
                                    <td><input class="date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" style="width: 140px" id="tr_last_year" name="tra[0][tr_last_year]"></td>

                                    <td><input type="text" style="width:100px" class="input" id="tr_gpa" name="tra[0][tr_gpa]"></td>
                                    <td>	<input type="text" style="width: 100px" class="input" id="tr_address" name="tra[0][tr_address]">	</td>
                                    <td>		</td>



                                </tr>
                                </tbody></table>
                        </div>
                        <div class="row" style="padding:0;margin:0;">

                        </div>
                    </div>


                    <p style="font-size:18px">Experience Information</p>
                    <div class="row-fluid">
                        <div class="row" style="padding:0;margin:0;">

                            <table class="table" id="exp">
                                <tbody><tr>
                                    <td>Designation</td>
                                    <td>Start Date</td>
                                    <td>End Date</td>
                                    <td>Result</td>
                                    <td>Institution Address</td>
                                    <td>
                                        <a class="btn btn-minier btn-yellow" style="float:right;width:60px;" id="addtab">
                                            Add More
                                        </a></td>

                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="small" style="width: 140px" id="exp_designation" name="ei[0][exp_designation]">
                                    </td>
                                    <td><input class="date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" style="width: 140px" id="exp_start_year" name="ei[0][exp_start_year]"></td>
                                    <td><input class="date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" style="width: 140px" id="exp_end_year" name="ei[0][exp_end_year]"></td>
                                    <td><input type="text" class="small" style="width: 100px" id="exp_result" name="ei[0][exp_result]"></td>
                                    <td>
                                        <input type="text" class="small" style="width: 150px" id="exp_address" name="ei[0][exp_address]">
                                    </td>

                                    <td>		</td>

                                </tr>
                                </tbody></table>
                        </div>
                        <div class="row" style="padding:0;margin:0;">

                        </div>
                    </div>








                    <legend style="font-size:18px">Form Identity Information</legend>
                    <div class="row-fluid">
                        <div class="span3">


                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Received By<font color="#FF0000"></font></label>

                                <div class="controls">
                                    <input type="text" class="small" id="fii_receiver" name="fii_receiver">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Comment <font color="#FF0000"></font></label>

                                <div class="controls">

                                    <input type="text" class="small" id="fii_comment" name="fii_comment">



                                </div>
                            </div>

                        </div>
                        <div class="span3">

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Designation <font color="#FF0000"></font></label>

                                <div class="controls">


                                    <select id="fii_designation" name="fii_designation">
                                        <option value="">---SELECT---</option>
                                        <option value="8">Sr. Teacher</option><option value="9">Principal</option><option value="54">Teacher</option><option value="55">Clark</option><option value="56">Head Teacher</option><option value="57">Department Head</option><option value="58">Personal Secretery</option><option value="59">Nanny</option><option value="155">Cleaner</option><option value="156">Peon</option>
                                    </select>



                                </div>
                            </div>





                        </div>


                        <div class="span3">
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Approved By<font color="#FF0000"></font></label>

                                <div class="controls">
                                    <input type="text" class="small" id="fii_approved" name="fii_approved">
                                </div>
                            </div>

                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Designation <font color="#FF0000"></font></label>

                                <div class="controls">


                                    <select id="fii_ap_designation" name="fii_ap_designation">
                                        <option value="">---SELECT---</option>
                                        <option value="8">Sr. Teacher</option><option value="9">Principal</option><option value="54">Teacher</option><option value="55">Clark</option><option value="56">Head Teacher</option><option value="57">Department Head</option><option value="58">Personal Secretery</option><option value="59">Nanny</option><option value="155">Cleaner</option><option value="156">Peon</option>
                                    </select>



                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row-fluid">

                        <div class="span4">

                            <div class="control-group">
                                <label class="control-label" for="form-field-1">&nbsp;</label>

                                <div class="controls">
                                    <button class="btn btn-small btn-success" type="button" id="btn_save">
                                        <i class="icon-ok bigger-100"></i>
                                        Save
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn btn-small btn-danger" type="reset" id="btn_reset">
                                        <i class="icon-undo bigger-100"></i>
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <input type="hidden" name="image_name" id="image_name" value="">

            </form>
        </div>
	</div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>