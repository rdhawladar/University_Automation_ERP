<div class="row">
    <div class="col-md-12">
        <div id="content">


            <div class="box searchForm toggableForm" id="employee-information">
                <div class="head">
                    <h1>Human Resource Information System</h1>
                </div>
                <div class="inner">
                    <form id="search_form" name="frmEmployeeSearch" method="post" action="/hrm/symfony/web/index.php/pim/viewEmployeeList">
                        <fieldset>
                            <ol>
                                <li><label for="empsearch_employee_name">Job Title</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Please Select</option>
                                        <option value="">Vice-Chancellor</option>
                                        <option value="">Pro-Vice-Chancellor</option>
                                        <option value="">Treasurer</option>
                                        <option value="">Controller of Examinations</option>
                                        <option value="">Dean-Dean of Business Administration</option>
                                        <option value="">Dean-Dean of Science & Engineering</option>
                                        <option value="">Registrar</option>
                                        <option value="">Proctor</option>
                                        <option value="">Department Head</option>
                                        <option value="">Advisors</option>
                                        <option value="">Public Relation Officer</option>
                                        <option value="">Librarian</option>
                                    </select>
                                </li>
                                <li><label for="empsearch_employee_name">Faculty Name</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Please Select</option>
                                        <option value="">Science & Engineering</option>
                                        <option value="">Business Studies</option>
                                        <option value="">Arts & Humanities</option>
                                        <option value="">Social Science</option>
                                        <option value="">Islamic Studies</option>
                                        <option value="">Law</option>
                                    </select>
                                </li>
                                <li><label for="empsearch_employee_name">Program Name</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Please Select</option>
                                        <option value="">Computer Science & Engineering</option>
                                        <option value="">Electrical & Electronic Engineering</option>
                                        <option value="">BBA</option>
                                        <option value="">MBA</option>
                                        <option value="">EMBA</option>
                                        <option value="">English</option>
                                        <option value="">Economics</option>
                                        <option value="">Sociology</option>
                                    </select>
                                </li>
                                <li><label for="empsearch_employee_name">Faculty</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Please Select</option>
                                        <option value="">Prof. Dr. Azmot Ali Khan</option>
                                        <option value="">Prof. Dr. Joynal Abedin</option>
                                        <option value="">Prof. Dr. Mithun Chowdhury</option>
                                    </select>
                                </li>
                            </ol>
                            <p>
                                <input type="button" id="searchBtn" value="Search" name="_search" class="">
                                <input type="button" class="reset" id="resetBtn" value="Reset" name="_reset">
                            </p>

                        </fieldset>

                    </form>

                </div> <!-- inner -->

                <a href="#" class="toggle tiptip">&gt;</a>

            </div> <!-- employee-information -->

            <div class="box noHeader" id="search-results">


                <div class="inner">




                    <form method="post" action="/hrm/symfony/web/index.php/pim/deleteEmployees" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                        <input type="hidden" name="defaultList[_csrf_token]" value="8c7cc68d5da2a88eec9d5d5cc9c9fb46" id="defaultList__csrf_token">
                        <div class="top">


                            <input type="button" class="" id="btnAdd" name="btnAdd" value="Add">
                            <input type="submit" class="delete" id="btnDelete" name="btnDelete" value="Delete" data-toggle="modal" data-target="#deleteConfModal" disabled="disabled">

                        </div> <!-- top -->







                        <div id="helpText" class="helpText"></div>

                        <div id="scrollWrapper">
                            <div id="scrollContainer">
                            </div>
                        </div>
                        <div id="tableWrapper">
                            <table class="table hover" id="resultTable">
                                <thead>
                                <tr>
                                    <th rowspan="1" class="checkbox-col"><input type="checkbox" id="ohrmList_chkSelectAll" name="chkSelectAll" value=""></th>
                                    <th rowspan="1" style="width:5%" class="header"><a href="#employeeId&amp;sortOrder=ASC" class="null">Id</a></th>
                                    <th rowspan="1" style="width:13%" class="header"><a href="#firstMiddleName&amp;sortOrder=ASC" class="null">First (&amp; Middle) Name</a></th>
                                    <th rowspan="1" style="width:10%" class="header"><a href="#lastName&amp;sortOrder=ASC" class="null">Last Name</a></th>
                                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Job Title</a></th>
                                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Faculty Name</a></th>
                                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Department Name</a></th>
                                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Faculty/Employee</a></th>
                                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">View</a></th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr class="odd">
                                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_1" name="chkSelectRow[]" value="1"></td>                                <td class="left"><a href="#">0001</a></td>
                                    <td class="left"><a href="#">Noor Alam</a></td>
                                    <td class="left"><a href="#">Khan</a></td>
                                    <td class="left">Vice-Chancellor</td>
                                    <td class="left">Science & Engineering</td>
                                    <td class="left">Computer Science & Engineering (CSE)</td>
                                    <td class="left">Prof. Dr. Azmot Ali Khan</td>
                                    <td class="viewpopup">
                                        <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Bio-data</a></p>
                                        <p><a href = "javascript:void(0)" onclick = "document.getElementById('leave').style.display='block';document.getElementById('fade1').style.display='block'">Leave</a></p>
                                        <p><a href = "javascript:void(0)" onclick = "document.getElementById('project').style.display='block';document.getElementById('fade2').style.display='block'">Project</a></p>
                                        <div id="light" class="white_content">
                                            <a style="    z-index: 999999;float: right; right: 50px; position: relative;" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="tabbable">
                                                        <ul class="nav nav-pills nav-stacked col-md-3">
                                                            <li class="active"><a href="#a" data-toggle="tab">Personal Details</a></li>
                                                            <li><a href="#b" data-toggle="tab">Contact Details</a></li>
                                                            <li><a href="#c" data-toggle="tab">Emergency Contacts</a></li>
                                                            <li><a href="#d" data-toggle="tab">Dependents</a></li>
                                                            <li><a href="#e" data-toggle="tab">Immigration</a></li>
                                                            <li><a href="#f" data-toggle="tab">Job</a></li>
                                                            <li><a href="#g" data-toggle="tab">Salary</a></li>
                                                            <li><a href="#h" data-toggle="tab">Report-to</a></li>
                                                            <li><a href="#i" data-toggle="tab">Qualifications</a></li>
                                                            <li><a href="#j" data-toggle="tab">Memberships</a></li>
                                                        </ul>
                                                        <div class="tab-content col-md-9">
                                                            <div class="tab-pane active" id="a">
                                                                <div id="content">
                                                                    <div class="personalDetails" id="pdMainContainer">

                                                                        <div class="head">
                                                                            <h1>Personal Details</h1>
                                                                        </div> <!-- head -->

                                                                        <div class="inner">






                                                                            <form id="frmEmpPersonalDetails" method="post" action="/hrm/symfony/web/index.php/pim/viewPersonalDetails" novalidate="novalidate">

                                                                                <input type="hidden" name="personal[_csrf_token]" value="026f0e6f369bc517b88758b92d3f0cb7" id="personal__csrf_token">                <input value="1" type="hidden" name="personal[txtEmpID]" id="personal_txtEmpID">
                                                                                <fieldset>
                                                                                    <!--
                                                                                    <div class="helpLabelContainer">
                                                                                        <div><label>First Name</label></div>
                                                                                        <div><label>Middle Name</label></div>
                                                                                        <div><label>Last Name</label></div>
                                                                                    </div>
                                                                                    -->
                                                                                    <ol>
                                                                                        <li class="line nameContainer">
                                                                                            <label for="Full_Name" class="hasTopFieldHelp">Full Name</label>
                                                                                            <ol class="fieldsInLine">
                                                                                                <li>
                                                                                                    <div class="fieldDescription"><em>*</em> First Name</div>
                                                                                                    <input value="Noor" type="text" name="personal[txtEmpFirstName]" class="block default editable" maxlength="30" title="First Name" id="personal_txtEmpFirstName" disabled="disabled">                                </li>
                                                                                                <li>
                                                                                                    <div class="fieldDescription">Middle Name</div>
                                                                                                    <input value="Alam" type="text" name="personal[txtEmpMiddleName]" class="block default editable" maxlength="30" title="Middle Name" id="personal_txtEmpMiddleName" disabled="disabled">                                </li>
                                                                                                <li>
                                                                                                    <div class="fieldDescription"><em>*</em> Last Name</div>
                                                                                                    <input value="Khan" type="text" name="personal[txtEmpLastName]" class="block default editable" maxlength="30" title="Last Name" id="personal_txtEmpLastName" disabled="disabled">                                </li>
                                                                                            </ol>
                                                                                        </li>
                                                                                    </ol>
                                                                                    <ol>
                                                                                        <li>
                                                                                            <label for="personal_txtEmployeeId">Employee Id</label>
                                                                                            <input value="0001" type="text" name="" maxlength="10" class="editable" id="personal_txtEmployeeId" disabled="disabled">                        </li>
                                                                                        <li>
                                                                                            <label for="personal_txtOtherID">Other Id</label>
                                                                                            <input value="" type="text" name="personal[txtOtherID]" maxlength="30" class="editable" id="personal_txtOtherID" disabled="disabled">                        </li>
                                                                                        <li class="long">
                                                                                            <label for="personal_txtLicenNo">Driver's License Number</label>
                                                                                            <input value="" type="text" name="personal[txtLicenNo]" maxlength="30" class="editable" id="personal_txtLicenNo" disabled="disabled">                        </li>
                                                                                        <li>
                                                                                            <label for="personal_txtLicExpDate">License Expiry Date</label>
                                                                                            <input id="personal_txtLicExpDate" type="text" name="personal[txtLicExpDate]" class="calendar editable calendar hasDatepicker" disabled=""><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="" style="opacity: 0.5; cursor: default;">
                                                                                        </li>

                                                                                    </ol>
                                                                                    <ol>
                                                                                        <li class="radio">
                                                                                            <label for="personal_optGender">Gender</label>
                                                                                            <ul class="radio_list"><li><input name="personal[optGender]" type="radio" value="1" id="personal_optGender_1" class="editable" disabled="disabled">&nbsp;<label for="personal_optGender_1">Male</label></li>
                                                                                                <li><input name="personal[optGender]" type="radio" value="2" id="personal_optGender_2" class="editable" disabled="disabled">&nbsp;<label for="personal_optGender_2">Female</label></li></ul>                        </li>
                                                                                        <li>
                                                                                            <label for="personal_cmbMarital">Marital Status</label>
                                                                                            <select name="personal[cmbMarital]" class="editable" id="personal_cmbMarital" disabled="disabled">
                                                                                                <option value="" selected="selected">-- Select --</option>
                                                                                                <option value="Single">Single</option>
                                                                                                <option value="Married">Married</option>
                                                                                                <option value="Other">Other</option>
                                                                                            </select>                        </li>
                                                                                        <li class="new">
                                                                                            <label for="personal_cmbNation">Nationality</label>
                                                                                            <select name="personal[cmbNation]" class="editable" id="personal_cmbNation" disabled="disabled">
                                                                                                <option value="0">-- Select --</option>
                                                                                                <option value="1">Afghan</option>
                                                                                                <option value="2">Albanian</option>
                                                                                                <option value="3">Algerian</option>
                                                                                                <option value="4">American</option>
                                                                                                <option value="5">Andorran</option>
                                                                                                <option value="6">Angolan</option>
                                                                                                <option value="7">Antiguans</option>
                                                                                                <option value="8">Argentinean</option>
                                                                                                <option value="9">Armenian</option>
                                                                                                <option value="10">Australian</option>
                                                                                                <option value="11">Austrian</option>
                                                                                                <option value="12">Azerbaijani</option>
                                                                                                <option value="13">Bahamian</option>
                                                                                                <option value="14">Bahraini</option>
                                                                                                <option value="15">Bangladeshi</option>
                                                                                                <option value="16">Barbadian</option>
                                                                                                <option value="17">Barbudans</option>
                                                                                                <option value="18">Batswana</option>
                                                                                                <option value="19">Belarusian</option>
                                                                                                <option value="20">Belgian</option>
                                                                                                <option value="21">Belizean</option>
                                                                                                <option value="22">Beninese</option>
                                                                                                <option value="23">Bhutanese</option>
                                                                                                <option value="24">Bolivian</option>
                                                                                                <option value="25">Bosnian</option>
                                                                                                <option value="26">Brazilian</option>
                                                                                                <option value="27">British</option>
                                                                                                <option value="28">Bruneian</option>
                                                                                                <option value="29">Bulgarian</option>
                                                                                                <option value="30">Burkinabe</option>
                                                                                                <option value="31">Burmese</option>
                                                                                                <option value="32">Burundian</option>
                                                                                                <option value="33">Cambodian</option>
                                                                                                <option value="34">Cameroonian</option>
                                                                                                <option value="35">Canadian</option>
                                                                                                <option value="36">Cape Verdean</option>
                                                                                                <option value="37">Central African</option>
                                                                                                <option value="38">Chadian</option>
                                                                                                <option value="39">Chilean</option>
                                                                                                <option value="40">Chinese</option>
                                                                                                <option value="41">Colombian</option>
                                                                                                <option value="42">Comoran</option>
                                                                                                <option value="43">Congolese</option>
                                                                                                <option value="44">Costa Rican</option>
                                                                                                <option value="45">Croatian</option>
                                                                                                <option value="46">Cuban</option>
                                                                                                <option value="47">Cypriot</option>
                                                                                                <option value="48">Czech</option>
                                                                                                <option value="49">Danish</option>
                                                                                                <option value="50">Djibouti</option>
                                                                                                <option value="51">Dominican</option>
                                                                                                <option value="52">Dutch</option>
                                                                                                <option value="53">East Timorese</option>
                                                                                                <option value="54">Ecuadorean</option>
                                                                                                <option value="55">Egyptian</option>
                                                                                                <option value="56">Emirian</option>
                                                                                                <option value="57">Equatorial Guinean</option>
                                                                                                <option value="58">Eritrean</option>
                                                                                                <option value="59">Estonian</option>
                                                                                                <option value="60">Ethiopian</option>
                                                                                                <option value="61">Fijian</option>
                                                                                                <option value="62">Filipino</option>
                                                                                                <option value="63">Finnish</option>
                                                                                                <option value="64">French</option>
                                                                                                <option value="65">Gabonese</option>
                                                                                                <option value="66">Gambian</option>
                                                                                                <option value="67">Georgian</option>
                                                                                                <option value="68">German</option>
                                                                                                <option value="69">Ghanaian</option>
                                                                                                <option value="70">Greek</option>
                                                                                                <option value="71">Grenadian</option>
                                                                                                <option value="72">Guatemalan</option>
                                                                                                <option value="73">Guinea-Bissauan</option>
                                                                                                <option value="74">Guinean</option>
                                                                                                <option value="75">Guyanese</option>
                                                                                                <option value="76">Haitian</option>
                                                                                                <option value="77">Herzegovinian</option>
                                                                                                <option value="78">Honduran</option>
                                                                                                <option value="79">Hungarian</option>
                                                                                                <option value="80">I-Kiribati</option>
                                                                                                <option value="81">Icelander</option>
                                                                                                <option value="82">Indian</option>
                                                                                                <option value="83">Indonesian</option>
                                                                                                <option value="84">Iranian</option>
                                                                                                <option value="85">Iraqi</option>
                                                                                                <option value="86">Irish</option>
                                                                                                <option value="87">Israeli</option>
                                                                                                <option value="88">Italian</option>
                                                                                                <option value="89">Ivorian</option>
                                                                                                <option value="90">Jamaican</option>
                                                                                                <option value="91">Japanese</option>
                                                                                                <option value="92">Jordanian</option>
                                                                                                <option value="93">Kazakhstani</option>
                                                                                                <option value="94">Kenyan</option>
                                                                                                <option value="95">Kittian and Nevisian</option>
                                                                                                <option value="96">Kuwaiti</option>
                                                                                                <option value="97">Kyrgyz</option>
                                                                                                <option value="98">Laotian</option>
                                                                                                <option value="99">Latvian</option>
                                                                                                <option value="100">Lebanese</option>
                                                                                                <option value="101">Liberian</option>
                                                                                                <option value="102">Libyan</option>
                                                                                                <option value="103">Liechtensteiner</option>
                                                                                                <option value="104">Lithuanian</option>
                                                                                                <option value="105">Luxembourger</option>
                                                                                                <option value="106">Macedonian</option>
                                                                                                <option value="107">Malagasy</option>
                                                                                                <option value="108">Malawian</option>
                                                                                                <option value="109">Malaysian</option>
                                                                                                <option value="110">Maldivan</option>
                                                                                                <option value="111">Malian</option>
                                                                                                <option value="112">Maltese</option>
                                                                                                <option value="113">Marshallese</option>
                                                                                                <option value="114">Mauritanian</option>
                                                                                                <option value="115">Mauritian</option>
                                                                                                <option value="116">Mexican</option>
                                                                                                <option value="117">Micronesian</option>
                                                                                                <option value="118">Moldovan</option>
                                                                                                <option value="119">Monacan</option>
                                                                                                <option value="120">Mongolian</option>
                                                                                                <option value="121">Moroccan</option>
                                                                                                <option value="122">Mosotho</option>
                                                                                                <option value="123">Motswana</option>
                                                                                                <option value="124">Mozambican</option>
                                                                                                <option value="125">Namibian</option>
                                                                                                <option value="126">Nauruan</option>
                                                                                                <option value="127">Nepalese</option>
                                                                                                <option value="128">New Zealander</option>
                                                                                                <option value="129">Nicaraguan</option>
                                                                                                <option value="130">Nigerian</option>
                                                                                                <option value="131">Nigerien</option>
                                                                                                <option value="132">North Korean</option>
                                                                                                <option value="133">Northern Irish</option>
                                                                                                <option value="134">Norwegian</option>
                                                                                                <option value="135">Omani</option>
                                                                                                <option value="136">Pakistani</option>
                                                                                                <option value="137">Palauan</option>
                                                                                                <option value="138">Panamanian</option>
                                                                                                <option value="139">Papua New Guinean</option>
                                                                                                <option value="140">Paraguayan</option>
                                                                                                <option value="141">Peruvian</option>
                                                                                                <option value="142">Polish</option>
                                                                                                <option value="143">Portuguese</option>
                                                                                                <option value="144">Qatari</option>
                                                                                                <option value="145">Romanian</option>
                                                                                                <option value="146">Russian</option>
                                                                                                <option value="147">Rwandan</option>
                                                                                                <option value="148">Saint Lucian</option>
                                                                                                <option value="149">Salvadoran</option>
                                                                                                <option value="150">Samoan</option>
                                                                                                <option value="151">San Marinese</option>
                                                                                                <option value="152">Sao Tomean</option>
                                                                                                <option value="153">Saudi</option>
                                                                                                <option value="154">Scottish</option>
                                                                                                <option value="155">Senegalese</option>
                                                                                                <option value="156">Serbian</option>
                                                                                                <option value="157">Seychellois</option>
                                                                                                <option value="158">Sierra Leonean</option>
                                                                                                <option value="159">Singaporean</option>
                                                                                                <option value="160">Slovakian</option>
                                                                                                <option value="161">Slovenian</option>
                                                                                                <option value="162">Solomon Islander</option>
                                                                                                <option value="163">Somali</option>
                                                                                                <option value="164">South African</option>
                                                                                                <option value="165">South Korean</option>
                                                                                                <option value="166">Spanish</option>
                                                                                                <option value="167">Sri Lankan</option>
                                                                                                <option value="168">Sudanese</option>
                                                                                                <option value="169">Surinamer</option>
                                                                                                <option value="170">Swazi</option>
                                                                                                <option value="171">Swedish</option>
                                                                                                <option value="172">Swiss</option>
                                                                                                <option value="173">Syrian</option>
                                                                                                <option value="174">Taiwanese</option>
                                                                                                <option value="175">Tajik</option>
                                                                                                <option value="176">Tanzanian</option>
                                                                                                <option value="177">Thai</option>
                                                                                                <option value="178">Togolese</option>
                                                                                                <option value="179">Tongan</option>
                                                                                                <option value="180">Trinidadian or Tobagonian</option>
                                                                                                <option value="181">Tunisian</option>
                                                                                                <option value="182">Turkish</option>
                                                                                                <option value="183">Tuvaluan</option>
                                                                                                <option value="184">Ugandan</option>
                                                                                                <option value="185">Ukrainian</option>
                                                                                                <option value="186">Uruguayan</option>
                                                                                                <option value="187">Uzbekistani</option>
                                                                                                <option value="188">Venezuelan</option>
                                                                                                <option value="189">Vietnamese</option>
                                                                                                <option value="190">Welsh</option>
                                                                                                <option value="191">Yemenite</option>
                                                                                                <option value="192">Zambian</option>
                                                                                                <option value="193">Zimbabwean</option>
                                                                                            </select>                        </li>
                                                                                        <li>
                                                                                            <label for="personal_DOB">Date of Birth</label>
                                                                                            <input id="personal_DOB" type="text" name="personal[DOB]" class="editable calendar hasDatepicker" disabled=""><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="" style="opacity: 0.5; cursor: default;">
                                                                                        </li>
                                                                                        <li class="required new">
                                                                                            <em>*</em> Required field                        </li>
                                                                                    </ol>


                                                                                    <p><input type="button" id="btnSave" value="Edit"></p>

                                                                                </fieldset>
                                                                            </form>


                                                                        </div> <!-- inner -->

                                                                    </div>
                                                                </div>
                                                                <div id="addPaneAttachments" style="/* display: none; */">
                                                                    <div class="head" id="saveHeading">
                                                                        <h1>Add Attachment</h1>
                                                                    </div> <!-- head -->
                                                                    <div class="inner">





                                                                        <form name="frmEmpAttachment" id="frmEmpAttachment" method="post" enctype="multipart/form-data" action="/hrm/symfony/web/index.php/pim/updateAttachment/empNumber/1" novalidate="novalidate">

                                                                            <input type="hidden" name="_csrf_token" value="c508d20b857a628c57084fdac9e60f9e" id="csrf_token">            <input type="hidden" name="EmpID" value="1">
                                                                            <input type="hidden" name="seqNO" id="seqNO" value="">
                                                                            <input type="hidden" name="screen" value="personal">
                                                                            <input type="hidden" name="commentOnly" id="commentOnly" value="0">

                                                                            <fieldset>
                                                                                <ol>
                                                                                    <li id="currentFileLi" style="display: none;">
                                                                                        <label>Current File</label>
                                                                                        <span id="currentFileSpan"></span>
                                                                                    </li>
                                                                                    <li class="fieldHelpContainer">
                                                                                        <label id="selectFileSpan" style="height:100%">Select File <em>*</em></label>
                                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                                                                                        <input type="file" name="ufile" id="ufile">
                                                                                        <label class="fieldHelpBottom">Accepts up to 1MB</label>
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label>Comment</label>
                                                                                        <textarea name="txtAttDesc" id="txtAttDesc" rows="3" cols="35"></textarea>
                                                                                    </li>
                                                                                    <li class="required"><em>*</em> Required field</li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" name="btnSaveAttachment" id="btnSaveAttachment" value="Upload">
                                                                                    <input type="button" id="btnCommentOnly" value="Save Comment Only" style="display: none;">
                                                                                    <input type="button" class="cancel" id="cancelButton" value="Cancel">
                                                                                </p>
                                                                            </fieldset>

                                                                        </form> <!-- frmEmpAttachment -->

                                                                    </div> <!-- inner -->
                                                                </div>
                                                                <div id="attachmentList" class="miniList">
                                                                    <div class="head">
                                                                        <h1>Attachments</h1>
                                                                    </div>
                                                                    <div class="inner">





                                                                        <form name="frmEmpDelAttachments" id="frmEmpDelAttachments" method="post" action="/hrm/symfony/web/index.php/pim/deleteAttachments/empNumber/1">

                                                                            <input type="hidden" name="employeeAttachmentDelete[_csrf_token]" value="5432ec9714750634195fd9a4bde2430b" id="employeeAttachmentDelete__csrf_token">            <input type="hidden" name="EmpID" value="1">

                                                                            <p id="attachmentActions">
                                                                                <input type="button" class="addbutton" id="btnAddAttachment" value="Add">
                                                                            </p>


                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="b">
                                                                <div class="">
                                                                    <div class="head">
                                                                        <h1>Contact Details</h1>
                                                                    </div> <!-- head -->

                                                                    <div class="inner">





                                                                        <form id="frmEmpContactDetails" method="post" action="/hrm/symfony/web/index.php/pim/contactDetails" novalidate="novalidate">
                                                                            <input type="hidden" name="contact[_csrf_token]" value="0574bbb25498bdb976016c2df684b54d" id="contact__csrf_token">                <input value="1" type="hidden" name="contact[empNumber]" id="contact_empNumber">                <fieldset>
                                                                                <ol>
                                                                                    <li>
                                                                                        <label for="contact_street1">Address Street 1</label>                            <input type="text" name="contact[street1]" value="" class="formInputText" maxlength="70" id="contact_street1" disabled="disabled">                        </li>
                                                                                    <li>
                                                                                        <label for="contact_street2">Address Street 2</label>                            <input type="text" name="contact[street2]" value="" class="formInputText" maxlength="70" id="contact_street2" disabled="disabled">                        </li>
                                                                                    <li>
                                                                                        <label for="contact_city">City</label>                            <input type="text" name="contact[city]" value="" class="formInputText" maxlength="70" id="contact_city" disabled="disabled">                        </li>
                                                                                    <li>
                                                                                        <label for="contact_province">State/Province</label>                            <input type="text" name="contact[province]" value="" class="formInputText" maxlength="70" id="contact_province" disabled="disabled">                            <select name="contact[state]" class="formInputText" id="contact_state" disabled="disabled" style="display: none;">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                            <option value="AL">Alabama</option>
                                                                                            <option value="AK">Alaska</option>
                                                                                            <option value="AS">American Samoa</option>
                                                                                            <option value="AZ">Arizona</option>
                                                                                            <option value="AR">Arkansas</option>
                                                                                            <option value="AE">Armed Forces Middle East</option>
                                                                                            <option value="AA">Armed Forces Americas (except Canada)</option>
                                                                                            <option value="AP">Armed Forces Pacific</option>
                                                                                            <option value="CA">California</option>
                                                                                            <option value="CO">Colorado</option>
                                                                                            <option value="CT">Connecticut</option>
                                                                                            <option value="DE">Delaware</option>
                                                                                            <option value="DC">District of Columbia</option>
                                                                                            <option value="FM">Federated States of Micronesia</option>
                                                                                            <option value="FL">Florida</option>
                                                                                            <option value="GA">Georgia</option>
                                                                                            <option value="GU">Guam</option>
                                                                                            <option value="HI">Hawaii</option>
                                                                                            <option value="ID">Idaho</option>
                                                                                            <option value="IL">Illinois</option>
                                                                                            <option value="IN">Indiana</option>
                                                                                            <option value="IA">Iowa</option>
                                                                                            <option value="KS">Kansas</option>
                                                                                            <option value="KY">Kentucky</option>
                                                                                            <option value="LA">Louisiana</option>
                                                                                            <option value="ME">Maine</option>
                                                                                            <option value="MH">Marshall Islands</option>
                                                                                            <option value="MD">Maryland</option>
                                                                                            <option value="MA">Massachusetts</option>
                                                                                            <option value="MI">Michigan</option>
                                                                                            <option value="MN">Minnesota</option>
                                                                                            <option value="MS">Mississippi</option>
                                                                                            <option value="MO">Missouri</option>
                                                                                            <option value="MT">Montana</option>
                                                                                            <option value="NE">Nebraska</option>
                                                                                            <option value="NV">Nevada</option>
                                                                                            <option value="NH">New Hampshire</option>
                                                                                            <option value="NJ">New Jersey</option>
                                                                                            <option value="NM">New Mexico</option>
                                                                                            <option value="NY">New York</option>
                                                                                            <option value="NC">North Carolina</option>
                                                                                            <option value="ND">North Dakota</option>
                                                                                            <option value="MP">Northern Mariana Islands</option>
                                                                                            <option value="OH">Ohio</option>
                                                                                            <option value="OK">Oklahoma</option>
                                                                                            <option value="OR">Oregon</option>
                                                                                            <option value="PW">Palau</option>
                                                                                            <option value="PA">Pennsylvania</option>
                                                                                            <option value="PR">Puerto Rico</option>
                                                                                            <option value="RI">Rhode Island</option>
                                                                                            <option value="SC">South Carolina</option>
                                                                                            <option value="SD">South Dakota</option>
                                                                                            <option value="TN">Tennessee</option>
                                                                                            <option value="TX">Texas</option>
                                                                                            <option value="UT">Utah</option>
                                                                                            <option value="VT">Vermont</option>
                                                                                            <option value="VI">Virgin Islands</option>
                                                                                            <option value="VA">Virginia</option>
                                                                                            <option value="WA">Washington</option>
                                                                                            <option value="WV">West Virginia</option>
                                                                                            <option value="WI">Wisconsin</option>
                                                                                            <option value="WY">Wyoming</option>
                                                                                        </select>                        </li>
                                                                                    <li>
                                                                                        <label for="contact_emp_zipcode">Zip/Postal Code</label>                            <input type="text" name="contact[emp_zipcode]" class="formInputText" maxlength="10" id="contact_emp_zipcode" disabled="disabled">                        </li>
                                                                                    <li>
                                                                                        <label for="contact_country">Country</label>                            <select name="contact[country]" class="formInputText" id="contact_country" disabled="disabled">
                                                                                            <option value="0">-- Select --</option>
                                                                                            <option value="AF">Afghanistan</option>
                                                                                            <option value="AL">Albania</option>
                                                                                            <option value="DZ">Algeria</option>
                                                                                            <option value="AS">American Samoa</option>
                                                                                            <option value="AD">Andorra</option>
                                                                                            <option value="AO">Angola</option>
                                                                                            <option value="AI">Anguilla</option>
                                                                                            <option value="AQ">Antarctica</option>
                                                                                            <option value="AG">Antigua and Barbuda</option>
                                                                                            <option value="AR">Argentina</option>
                                                                                            <option value="AM">Armenia</option>
                                                                                            <option value="AW">Aruba</option>
                                                                                            <option value="AU">Australia</option>
                                                                                            <option value="AT">Austria</option>
                                                                                            <option value="AZ">Azerbaijan</option>
                                                                                            <option value="BS">Bahamas</option>
                                                                                            <option value="BH">Bahrain</option>
                                                                                            <option value="BD">Bangladesh</option>
                                                                                            <option value="BB">Barbados</option>
                                                                                            <option value="BY">Belarus</option>
                                                                                            <option value="BE">Belgium</option>
                                                                                            <option value="BZ">Belize</option>
                                                                                            <option value="BJ">Benin</option>
                                                                                            <option value="BM">Bermuda</option>
                                                                                            <option value="BT">Bhutan</option>
                                                                                            <option value="BO">Bolivia</option>
                                                                                            <option value="BA">Bosnia and Herzegovina</option>
                                                                                            <option value="BW">Botswana</option>
                                                                                            <option value="BV">Bouvet Island</option>
                                                                                            <option value="BR">Brazil</option>
                                                                                            <option value="IO">British Indian Ocean Territory</option>
                                                                                            <option value="BN">Brunei Darussalam</option>
                                                                                            <option value="BG">Bulgaria</option>
                                                                                            <option value="BF">Burkina Faso</option>
                                                                                            <option value="BI">Burundi</option>
                                                                                            <option value="KH">Cambodia</option>
                                                                                            <option value="CM">Cameroon</option>
                                                                                            <option value="CA">Canada</option>
                                                                                            <option value="CV">Cape Verde</option>
                                                                                            <option value="KY">Cayman Islands</option>
                                                                                            <option value="CF">Central African Republic</option>
                                                                                            <option value="TD">Chad</option>
                                                                                            <option value="CL">Chile</option>
                                                                                            <option value="CN">China</option>
                                                                                            <option value="CX">Christmas Island</option>
                                                                                            <option value="CC">Cocos (Keeling) Islands</option>
                                                                                            <option value="CO">Colombia</option>
                                                                                            <option value="KM">Comoros</option>
                                                                                            <option value="CG">Congo</option>
                                                                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                                                                            <option value="CK">Cook Islands</option>
                                                                                            <option value="CR">Costa Rica</option>
                                                                                            <option value="CI">Cote D'Ivoire</option>
                                                                                            <option value="HR">Croatia</option>
                                                                                            <option value="CU">Cuba</option>
                                                                                            <option value="CY">Cyprus</option>
                                                                                            <option value="CZ">Czech Republic</option>
                                                                                            <option value="DK">Denmark</option>
                                                                                            <option value="DJ">Djibouti</option>
                                                                                            <option value="DM">Dominica</option>
                                                                                            <option value="DO">Dominican Republic</option>
                                                                                            <option value="EC">Ecuador</option>
                                                                                            <option value="EG">Egypt</option>
                                                                                            <option value="SV">El Salvador</option>
                                                                                            <option value="GQ">Equatorial Guinea</option>
                                                                                            <option value="ER">Eritrea</option>
                                                                                            <option value="EE">Estonia</option>
                                                                                            <option value="ET">Ethiopia</option>
                                                                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                                                                            <option value="FO">Faroe Islands</option>
                                                                                            <option value="FJ">Fiji</option>
                                                                                            <option value="FI">Finland</option>
                                                                                            <option value="FR">France</option>
                                                                                            <option value="GF">French Guiana</option>
                                                                                            <option value="PF">French Polynesia</option>
                                                                                            <option value="TF">French Southern Territories</option>
                                                                                            <option value="GA">Gabon</option>
                                                                                            <option value="GM">Gambia</option>
                                                                                            <option value="GE">Georgia</option>
                                                                                            <option value="DE">Germany</option>
                                                                                            <option value="GH">Ghana</option>
                                                                                            <option value="GI">Gibraltar</option>
                                                                                            <option value="GR">Greece</option>
                                                                                            <option value="GL">Greenland</option>
                                                                                            <option value="GD">Grenada</option>
                                                                                            <option value="GP">Guadeloupe</option>
                                                                                            <option value="GU">Guam</option>
                                                                                            <option value="GT">Guatemala</option>
                                                                                            <option value="GN">Guinea</option>
                                                                                            <option value="GW">Guinea-Bissau</option>
                                                                                            <option value="GY">Guyana</option>
                                                                                            <option value="HT">Haiti</option>
                                                                                            <option value="HM">Heard Island and Mcdonald Islands</option>
                                                                                            <option value="VA">Holy See (Vatican City State)</option>
                                                                                            <option value="HN">Honduras</option>
                                                                                            <option value="HK">Hong Kong</option>
                                                                                            <option value="HU">Hungary</option>
                                                                                            <option value="IS">Iceland</option>
                                                                                            <option value="IN">India</option>
                                                                                            <option value="ID">Indonesia</option>
                                                                                            <option value="IR">Iran, Islamic Republic of</option>
                                                                                            <option value="IQ">Iraq</option>
                                                                                            <option value="IE">Ireland</option>
                                                                                            <option value="IL">Israel</option>
                                                                                            <option value="IT">Italy</option>
                                                                                            <option value="JM">Jamaica</option>
                                                                                            <option value="JP">Japan</option>
                                                                                            <option value="JO">Jordan</option>
                                                                                            <option value="KZ">Kazakhstan</option>
                                                                                            <option value="KE">Kenya</option>
                                                                                            <option value="KI">Kiribati</option>
                                                                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                                                                            <option value="KR">Korea, Republic of</option>
                                                                                            <option value="KW">Kuwait</option>
                                                                                            <option value="KG">Kyrgyzstan</option>
                                                                                            <option value="LA">Lao People's Democratic Republic</option>
                                                                                            <option value="LV">Latvia</option>
                                                                                            <option value="LB">Lebanon</option>
                                                                                            <option value="LS">Lesotho</option>
                                                                                            <option value="LR">Liberia</option>
                                                                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                                                                            <option value="LI">Liechtenstein</option>
                                                                                            <option value="LT">Lithuania</option>
                                                                                            <option value="LU">Luxembourg</option>
                                                                                            <option value="MO">Macao</option>
                                                                                            <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                                                                            <option value="MG">Madagascar</option>
                                                                                            <option value="MW">Malawi</option>
                                                                                            <option value="MY">Malaysia</option>
                                                                                            <option value="MV">Maldives</option>
                                                                                            <option value="ML">Mali</option>
                                                                                            <option value="MT">Malta</option>
                                                                                            <option value="MH">Marshall Islands</option>
                                                                                            <option value="MQ">Martinique</option>
                                                                                            <option value="MR">Mauritania</option>
                                                                                            <option value="MU">Mauritius</option>
                                                                                            <option value="YT">Mayotte</option>
                                                                                            <option value="MX">Mexico</option>
                                                                                            <option value="FM">Micronesia, Federated States of</option>
                                                                                            <option value="MD">Moldova, Republic of</option>
                                                                                            <option value="MC">Monaco</option>
                                                                                            <option value="MN">Mongolia</option>
                                                                                            <option value="MS">Montserrat</option>
                                                                                            <option value="MA">Morocco</option>
                                                                                            <option value="MZ">Mozambique</option>
                                                                                            <option value="MM">Myanmar</option>
                                                                                            <option value="NA">Namibia</option>
                                                                                            <option value="NR">Nauru</option>
                                                                                            <option value="NP">Nepal</option>
                                                                                            <option value="NL">Netherlands</option>
                                                                                            <option value="AN">Netherlands Antilles</option>
                                                                                            <option value="NC">New Caledonia</option>
                                                                                            <option value="NZ">New Zealand</option>
                                                                                            <option value="NI">Nicaragua</option>
                                                                                            <option value="NE">Niger</option>
                                                                                            <option value="NG">Nigeria</option>
                                                                                            <option value="NU">Niue</option>
                                                                                            <option value="NF">Norfolk Island</option>
                                                                                            <option value="MP">Northern Mariana Islands</option>
                                                                                            <option value="NO">Norway</option>
                                                                                            <option value="OM">Oman</option>
                                                                                            <option value="PK">Pakistan</option>
                                                                                            <option value="PW">Palau</option>
                                                                                            <option value="PS">Palestinian Territory, Occupied</option>
                                                                                            <option value="PA">Panama</option>
                                                                                            <option value="PG">Papua New Guinea</option>
                                                                                            <option value="PY">Paraguay</option>
                                                                                            <option value="PE">Peru</option>
                                                                                            <option value="PH">Philippines</option>
                                                                                            <option value="PN">Pitcairn</option>
                                                                                            <option value="PL">Poland</option>
                                                                                            <option value="PT">Portugal</option>
                                                                                            <option value="PR">Puerto Rico</option>
                                                                                            <option value="QA">Qatar</option>
                                                                                            <option value="RE">Reunion</option>
                                                                                            <option value="RO">Romania</option>
                                                                                            <option value="RU">Russian Federation</option>
                                                                                            <option value="RW">Rwanda</option>
                                                                                            <option value="SH">Saint Helena</option>
                                                                                            <option value="KN">Saint Kitts and Nevis</option>
                                                                                            <option value="LC">Saint Lucia</option>
                                                                                            <option value="PM">Saint Pierre and Miquelon</option>
                                                                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                                                                            <option value="WS">Samoa</option>
                                                                                            <option value="SM">San Marino</option>
                                                                                            <option value="ST">Sao Tome and Principe</option>
                                                                                            <option value="SA">Saudi Arabia</option>
                                                                                            <option value="SN">Senegal</option>
                                                                                            <option value="CS">Serbia and Montenegro</option>
                                                                                            <option value="SC">Seychelles</option>
                                                                                            <option value="SL">Sierra Leone</option>
                                                                                            <option value="SG">Singapore</option>
                                                                                            <option value="SK">Slovakia</option>
                                                                                            <option value="SI">Slovenia</option>
                                                                                            <option value="SB">Solomon Islands</option>
                                                                                            <option value="SO">Somalia</option>
                                                                                            <option value="ZA">South Africa</option>
                                                                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                                                            <option value="ES">Spain</option>
                                                                                            <option value="LK">Sri Lanka</option>
                                                                                            <option value="SD">Sudan</option>
                                                                                            <option value="SR">Suriname</option>
                                                                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                                                                            <option value="SZ">Swaziland</option>
                                                                                            <option value="SE">Sweden</option>
                                                                                            <option value="CH">Switzerland</option>
                                                                                            <option value="SY">Syrian Arab Republic</option>
                                                                                            <option value="TW">Taiwan</option>
                                                                                            <option value="TJ">Tajikistan</option>
                                                                                            <option value="TZ">Tanzania, United Republic of</option>
                                                                                            <option value="TH">Thailand</option>
                                                                                            <option value="TL">Timor-Leste</option>
                                                                                            <option value="TG">Togo</option>
                                                                                            <option value="TK">Tokelau</option>
                                                                                            <option value="TO">Tonga</option>
                                                                                            <option value="TT">Trinidad and Tobago</option>
                                                                                            <option value="TN">Tunisia</option>
                                                                                            <option value="TR">Turkey</option>
                                                                                            <option value="TM">Turkmenistan</option>
                                                                                            <option value="TC">Turks and Caicos Islands</option>
                                                                                            <option value="TV">Tuvalu</option>
                                                                                            <option value="UG">Uganda</option>
                                                                                            <option value="UA">Ukraine</option>
                                                                                            <option value="AE">United Arab Emirates</option>
                                                                                            <option value="GB">United Kingdom</option>
                                                                                            <option value="US">United States</option>
                                                                                            <option value="UM">United States Minor Outlying Islands</option>
                                                                                            <option value="UY">Uruguay</option>
                                                                                            <option value="UZ">Uzbekistan</option>
                                                                                            <option value="VU">Vanuatu</option>
                                                                                            <option value="VE">Venezuela</option>
                                                                                            <option value="VN">Viet Nam</option>
                                                                                            <option value="VG">Virgin Islands, British</option>
                                                                                            <option value="VI">Virgin Islands, U.s.</option>
                                                                                            <option value="WF">Wallis and Futuna</option>
                                                                                            <option value="EH">Western Sahara</option>
                                                                                            <option value="YE">Yemen</option>
                                                                                            <option value="ZM">Zambia</option>
                                                                                            <option value="ZW">Zimbabwe</option>
                                                                                        </select>                        </li>
                                                                                </ol>
                                                                                <ol>
                                                                                    <li>
                                                                                        <label for="contact_emp_hm_telephone">Home Telephone</label>                            <input type="text" name="contact[emp_hm_telephone]" class="formInputText" maxlength="25" id="contact_emp_hm_telephone" disabled="disabled">                        </li>
                                                                                    <li>
                                                                                        <label for="contact_emp_mobile">Mobile</label>                            <input type="text" name="contact[emp_mobile]" class="formInputText" maxlength="25" id="contact_emp_mobile" disabled="disabled">                        </li>
                                                                                    <li>
                                                                                        <label for="contact_emp_work_telephone">Work Telephone</label>                            <input type="text" name="contact[emp_work_telephone]" class="formInputText" maxlength="25" id="contact_emp_work_telephone" disabled="disabled">                        </li>
                                                                                </ol>
                                                                                <ol>
                                                                                    <li>
                                                                                        <label for="contact_emp_work_email">Work Email</label>                            <input type="text" name="contact[emp_work_email]" class="formInputText" maxlength="50" id="contact_emp_work_email" disabled="disabled">                        </li>
                                                                                    <li>
                                                                                        <label for="contact_emp_oth_email">Other Email</label>                            <input type="text" name="contact[emp_oth_email]" class="formInputText" maxlength="50" id="contact_emp_oth_email" disabled="disabled">                        </li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" class="" id="btnSave" value="Edit" tabindex="2">
                                                                                </p>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div> <!-- inner -->

                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="c">
                                                                <div id="addPaneEmgContact" style="display: block;">
                                                                    <div class="head">
                                                                        <h1 id="emergencyContactHeading">Add Emergency Contact</h1>
                                                                    </div>

                                                                    <div class="inner">
                                                                        <form name="frmEmpEmgContact" id="frmEmpEmgContact" method="post" action="/hrm/symfony/web/index.php/pim/updateEmergencyContact/empNumber/1" novalidate="novalidate">
                                                                            <input type="hidden" name="emgcontacts[_csrf_token]" value="b493de0e840f0883001154ade6d97572" id="emgcontacts__csrf_token">                <input value="1" type="hidden" name="emgcontacts[empNumber]" id="emgcontacts_empNumber">                <input type="hidden" name="emgcontacts[seqNo]" id="emgcontacts_seqNo" value="">                <fieldset>
                                                                                <ol>
                                                                                    <li>
                                                                                        <label for="emgcontacts_name">Name <em>*</em></label>                            <input type="text" name="emgcontacts[name]" class="formInputText" maxlength="50" id="emgcontacts_name">                        </li>
                                                                                    <li>
                                                                                        <label for="emgcontacts_relationship">Relationship <em>*</em></label>                            <input type="text" name="emgcontacts[relationship]" class="formInputText" maxlength="30" id="emgcontacts_relationship">                        </li>
                                                                                    <li>
                                                                                        <label for="emgcontacts_homePhone">Home Telephone</label>                            <input type="text" name="emgcontacts[homePhone]" class="formInputText" maxlength="25" id="emgcontacts_homePhone">                        </li>
                                                                                    <li>
                                                                                        <label for="emgcontacts_mobilePhone">Mobile</label>                            <input type="text" name="emgcontacts[mobilePhone]" class="formInputText" maxlength="25" id="emgcontacts_mobilePhone">                        </li>
                                                                                    <li>
                                                                                        <label for="emgcontacts_workPhone">Work Telephone</label>                            <input type="text" name="emgcontacts[workPhone]" class="formInputText" maxlength="25" id="emgcontacts_workPhone">                        </li>
                                                                                    <li class="required">
                                                                                        <em>*</em>Required field                        </li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" class="" name="btnSaveEContact" id="btnSaveEContact" value="Save">
                                                                                    <input type="button" id="btnCancel" class="reset" value="Cancel">
                                                                                </p>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="miniList" id="listEmegrencyContact">
                                                                    <div class="head">
                                                                        <h1>Assigned Emergency Contacts</h1>
                                                                    </div>

                                                                    <div class="inner">





                                                                        <form name="frmEmpDelEmgContacts" id="frmEmpDelEmgContacts" method="post" action="/hrm/symfony/web/index.php/pim/deleteEmergencyContacts/empNumber/1">
                                                                            <input type="hidden" name="emergencyContactsDelete[_csrf_token]" value="e1ed5df228cb507d70ad14e1a8e8b827" id="emergencyContactsDelete__csrf_token">                <input value="1" type="hidden" name="emergencyContactsDelete[empNumber]" id="emergencyContactsDelete_empNumber">
                                                                            <p id="listActions" style="display: none;">
                                                                                <input type="button" class="" id="btnAddContact" value="Add">
                                                                                <input type="button" class="delete" id="delContactsBtn" value="Delete" disabled="disabled">
                                                                            </p>

                                                                            <table id="emgcontact_list" class="table hover">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th class="check" style="width: 2%; display: none;"><input type="checkbox" id="checkAll"></th>
                                                                                    <th class="emgContactName">Name</th>
                                                                                    <th>Relationship</th>
                                                                                    <th>Home Telephone</th>
                                                                                    <th>Mobile</th>
                                                                                    <th>Work Telephone</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td class="check" style="display: none;"></td>
                                                                                    <td>No Records Found</td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                                <a name="attachments"></a>
                                                                <div id="addPaneAttachments" style="display: block;">
                                                                    <div class="head" id="saveHeading">
                                                                        <h1>Add Attachment</h1>
                                                                    </div> <!-- head -->
                                                                    <div class="inner">





                                                                        <form name="frmEmpAttachment" id="frmEmpAttachment" method="post" enctype="multipart/form-data" action="/hrm/symfony/web/index.php/pim/updateAttachment/empNumber/1" novalidate="novalidate">

                                                                            <input type="hidden" name="_csrf_token" value="d7e11321c2e2ba7844d69af70bc571f4" id="csrf_token">            <input type="hidden" name="EmpID" value="1">
                                                                            <input type="hidden" name="seqNO" id="seqNO" value="">
                                                                            <input type="hidden" name="screen" value="emergency">
                                                                            <input type="hidden" name="commentOnly" id="commentOnly" value="0">

                                                                            <fieldset>
                                                                                <ol>
                                                                                    <li id="currentFileLi" style="display: none;">
                                                                                        <label>Current File</label>
                                                                                        <span id="currentFileSpan"></span>
                                                                                    </li>
                                                                                    <li class="fieldHelpContainer">
                                                                                        <label id="selectFileSpan" style="height:100%">Select File</label>
                                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                                                                                        <input type="file" name="ufile" id="ufile">
                                                                                        <label class="fieldHelpBottom">Accepts up to 1MB</label>
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label>Comment</label>
                                                                                        <textarea name="txtAttDesc" id="txtAttDesc" rows="3" cols="35"></textarea>
                                                                                    </li>
                                                                                    <li class="required"><em>*</em> Required field</li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" name="btnSaveAttachment" id="btnSaveAttachment" value="Upload">
                                                                                    <input type="button" id="btnCommentOnly" value="Save Comment Only" style="display: none;">
                                                                                    <input type="button" class="cancel" id="cancelButton" value="Cancel">
                                                                                </p>
                                                                            </fieldset>

                                                                        </form> <!-- frmEmpAttachment -->

                                                                    </div> <!-- inner -->
                                                                </div>
                                                                <div id="attachmentList" class="miniList" style="/* display: none; */">
                                                                    <div class="head">
                                                                        <h1>Attachments</h1>
                                                                    </div>
                                                                    <div class="inner">





                                                                        <form name="frmEmpDelAttachments" id="frmEmpDelAttachments" method="post" action="/hrm/symfony/web/index.php/pim/deleteAttachments/empNumber/1">

                                                                            <input type="hidden" name="employeeAttachmentDelete[_csrf_token]" value="54d02284e80c3f23ead602988bc89baa" id="employeeAttachmentDelete__csrf_token">            <input type="hidden" name="EmpID" value="1">

                                                                            <p id="attachmentActions" style="display: none;">
                                                                                <input type="button" class="addbutton" id="btnAddAttachment" value="Add">
                                                                            </p>


                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="d">
                                                                <div id="addPaneDependent" style="display: block;">
                                                                    <div class="head">
                                                                        <h1 id="heading">Add Dependent</h1>
                                                                    </div>

                                                                    <div class="inner">
                                                                        <form name="frmEmpDependent" id="frmEmpDependent" method="post" action="/hrm/symfony/web/index.php/pim/updateDependent/empNumber/1" novalidate="novalidate">
                                                                            <input type="hidden" name="dependent[_csrf_token]" value="a96963808554b232838444c3664c73fa" id="dependent__csrf_token">                <input value="1" type="hidden" name="dependent[empNumber]" id="dependent_empNumber">                <input type="hidden" name="dependent[seqNo]" id="dependent_seqNo" value="">                <fieldset>
                                                                                <ol>
                                                                                    <li>
                                                                                        <label for="dependent_name">Name <em>*</em></label>                            <input type="text" name="dependent[name]" class="formInputText" maxlength="50" id="dependent_name">                        </li>
                                                                                    <li>
                                                                                        <label for="dependent_relationshipType">Relationship <em>*</em></label>                            <select name="dependent[relationshipType]" class="formSelect" id="dependent_relationshipType">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                            <option value="child">Child</option>
                                                                                            <option value="other">Other</option>
                                                                                        </select>                        </li>
                                                                                    <li id="relationshipDesc" style="display: none;">
                                                                                        <label for="dependent_relationship">Please Specify <em>*</em></label>                            <input type="text" name="dependent[relationship]" class="formInputText" maxlength="50" id="dependent_relationship">                        </li>
                                                                                    <li>
                                                                                        <label for="dependent_dateOfBirth">Date of Birth</label>                            <input id="dependent_dateOfBirth" type="text" name="dependent[dateOfBirth]" class="formDateInput calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                                                                    </li>
                                                                                    <li class="required">
                                                                                        <em>*</em>Required field                        </li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" class="" name="btnSaveDependent" id="btnSaveDependent" value="Save">
                                                                                    <input type="button" id="btnCancel" class="reset" value="Cancel">
                                                                                </p>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="miniList" id="listing">
                                                                    <div class="head">
                                                                        <h1>Assigned Dependents</h1>
                                                                    </div>

                                                                    <div class="inner">





                                                                        <form name="frmEmpDelDependents" id="frmEmpDelDependents" method="post" action="/hrm/symfony/web/index.php/pim/deleteDependents/empNumber/1">
                                                                            <input type="hidden" name="dependentsDelete[_csrf_token]" value="b6e1ec53d65ce7d540fa16258c4b129f" id="dependentsDelete__csrf_token">                <input value="1" type="hidden" name="dependentsDelete[empNumber]" id="dependentsDelete_empNumber">                <p id="listActions" style="display: none;">
                                                                                <input type="button" class="" id="btnAddDependent" value="Add">
                                                                                <input type="button" class="delete" id="delDependentBtn" value="Delete" disabled="disabled">
                                                                            </p>
                                                                            <table id="dependent_list" class="table hover">
                                                                                <thead>
                                                                                <tr>                            <th class="check" style="width: 2%; display: none;"><input type="checkbox" id="checkAll" class="checkbox"></th>
                                                                                    <th class="dependentName">Name</th>
                                                                                    <th>Relationship</th>
                                                                                    <th>Date of Birth</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td class="check" style="display: none;"></td>
                                                                                    <td>No Records Found</td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div id="addPaneAttachments" style="display: block;">
                                                                    <div class="head" id="saveHeading">
                                                                        <h1>Add Attachment</h1>
                                                                    </div> <!-- head -->
                                                                    <div class="inner">





                                                                        <form name="frmEmpAttachment" id="frmEmpAttachment" method="post" enctype="multipart/form-data" action="/hrm/symfony/web/index.php/pim/updateAttachment/empNumber/1" novalidate="novalidate">

                                                                            <input type="hidden" name="_csrf_token" value="d7e11321c2e2ba7844d69af70bc571f4" id="csrf_token">            <input type="hidden" name="EmpID" value="1">
                                                                            <input type="hidden" name="seqNO" id="seqNO" value="">
                                                                            <input type="hidden" name="screen" value="dependents">
                                                                            <input type="hidden" name="commentOnly" id="commentOnly" value="0">

                                                                            <fieldset>
                                                                                <ol>
                                                                                    <li id="currentFileLi" style="display: none;">
                                                                                        <label>Current File</label>
                                                                                        <span id="currentFileSpan"></span>
                                                                                    </li>
                                                                                    <li class="fieldHelpContainer">
                                                                                        <label id="selectFileSpan" style="height:100%">Select File</label>
                                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                                                                                        <input type="file" name="ufile" id="ufile">
                                                                                        <label class="fieldHelpBottom">Accepts up to 1MB</label>
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label>Comment</label>
                                                                                        <textarea name="txtAttDesc" id="txtAttDesc" rows="3" cols="35"></textarea>
                                                                                    </li>
                                                                                    <li class="required"><em>*</em> Required field</li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" name="btnSaveAttachment" id="btnSaveAttachment" value="Upload">
                                                                                    <input type="button" id="btnCommentOnly" value="Save Comment Only" style="display: none;">
                                                                                    <input type="button" class="cancel" id="cancelButton" value="Cancel">
                                                                                </p>
                                                                            </fieldset>

                                                                        </form> <!-- frmEmpAttachment -->

                                                                    </div> <!-- inner -->
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="e">
                                                                <div id="immigrationDataPane" class="" style="display: block;">
                                                                    <div class="head">
                                                                        <h1 id="immigrationHeading">Add Immigration</h1>
                                                                    </div>

                                                                    <div class="inner">
                                                                        <form name="frmEmpImmigration" id="frmEmpImmigration" method="post" action="/hrm/symfony/web/index.php/pim/viewImmigration" novalidate="novalidate">
                                                                            <input type="hidden" name="immigration[_csrf_token]" value="bb004a0031c86b398fe7975fe5fa315d" id="immigration__csrf_token">                <input value="1" type="hidden" name="immigration[emp_number]" id="immigration_emp_number">                <input type="hidden" name="immigration[seqno]" id="immigration_seqno">                <fieldset>
                                                                                <ol>
                                                                                    <li class="radio">
                                                                                        <label for="immigration_type_flag">Document <em>*</em></label>                            <ul class="radio_list"><li><input name="immigration[type_flag]" type="radio" value="1" id="immigration_type_flag_1" checked="checked">&nbsp;<label for="immigration_type_flag_1">Passport</label></li>
                                                                                            <li><input name="immigration[type_flag]" type="radio" value="2" id="immigration_type_flag_2">&nbsp;<label for="immigration_type_flag_2">Visa</label></li></ul>                        </li>
                                                                                    <li>
                                                                                        <label for="immigration_number">Number <em>*</em></label>                            <input type="text" name="immigration[number]" class="formInputText" maxlength="30" id="immigration_number">                        </li>
                                                                                    <li>
                                                                                        <label for="immigration_passport_issue_date">Issued Date</label>                            <input id="immigration_passport_issue_date" type="text" name="immigration[passport_issue_date]" class="formInputText calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="immigration_passport_expire_date">Expiry Date</label>                            <input id="immigration_passport_expire_date" type="text" name="immigration[passport_expire_date]" class="formInputText calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="immigration_i9_status">Eligible Status</label>                            <input type="text" name="immigration[i9_status]" class="formInputText" maxlength="30" id="immigration_i9_status">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="immigration_country">Issued By</label>                            <select name="immigration[country]" class="formSelect" id="immigration_country">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                            <option value="AF">Afghanistan</option>
                                                                                            <option value="AL">Albania</option>
                                                                                            <option value="DZ">Algeria</option>
                                                                                            <option value="AS">American Samoa</option>
                                                                                            <option value="AD">Andorra</option>
                                                                                            <option value="AO">Angola</option>
                                                                                            <option value="AI">Anguilla</option>
                                                                                            <option value="AQ">Antarctica</option>
                                                                                            <option value="AG">Antigua and Barbuda</option>
                                                                                            <option value="AR">Argentina</option>
                                                                                            <option value="AM">Armenia</option>
                                                                                            <option value="AW">Aruba</option>
                                                                                            <option value="AU">Australia</option>
                                                                                            <option value="AT">Austria</option>
                                                                                            <option value="AZ">Azerbaijan</option>
                                                                                            <option value="BS">Bahamas</option>
                                                                                            <option value="BH">Bahrain</option>
                                                                                            <option value="BD">Bangladesh</option>
                                                                                            <option value="BB">Barbados</option>
                                                                                            <option value="BY">Belarus</option>
                                                                                            <option value="BE">Belgium</option>
                                                                                            <option value="BZ">Belize</option>
                                                                                            <option value="BJ">Benin</option>
                                                                                            <option value="BM">Bermuda</option>
                                                                                            <option value="BT">Bhutan</option>
                                                                                            <option value="BO">Bolivia</option>
                                                                                            <option value="BA">Bosnia and Herzegovina</option>
                                                                                            <option value="BW">Botswana</option>
                                                                                            <option value="BV">Bouvet Island</option>
                                                                                            <option value="BR">Brazil</option>
                                                                                            <option value="IO">British Indian Ocean Territory</option>
                                                                                            <option value="BN">Brunei Darussalam</option>
                                                                                            <option value="BG">Bulgaria</option>
                                                                                            <option value="BF">Burkina Faso</option>
                                                                                            <option value="BI">Burundi</option>
                                                                                            <option value="KH">Cambodia</option>
                                                                                            <option value="CM">Cameroon</option>
                                                                                            <option value="CA">Canada</option>
                                                                                            <option value="CV">Cape Verde</option>
                                                                                            <option value="KY">Cayman Islands</option>
                                                                                            <option value="CF">Central African Republic</option>
                                                                                            <option value="TD">Chad</option>
                                                                                            <option value="CL">Chile</option>
                                                                                            <option value="CN">China</option>
                                                                                            <option value="CX">Christmas Island</option>
                                                                                            <option value="CC">Cocos (Keeling) Islands</option>
                                                                                            <option value="CO">Colombia</option>
                                                                                            <option value="KM">Comoros</option>
                                                                                            <option value="CG">Congo</option>
                                                                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                                                                            <option value="CK">Cook Islands</option>
                                                                                            <option value="CR">Costa Rica</option>
                                                                                            <option value="CI">Cote D'Ivoire</option>
                                                                                            <option value="HR">Croatia</option>
                                                                                            <option value="CU">Cuba</option>
                                                                                            <option value="CY">Cyprus</option>
                                                                                            <option value="CZ">Czech Republic</option>
                                                                                            <option value="DK">Denmark</option>
                                                                                            <option value="DJ">Djibouti</option>
                                                                                            <option value="DM">Dominica</option>
                                                                                            <option value="DO">Dominican Republic</option>
                                                                                            <option value="EC">Ecuador</option>
                                                                                            <option value="EG">Egypt</option>
                                                                                            <option value="SV">El Salvador</option>
                                                                                            <option value="GQ">Equatorial Guinea</option>
                                                                                            <option value="ER">Eritrea</option>
                                                                                            <option value="EE">Estonia</option>
                                                                                            <option value="ET">Ethiopia</option>
                                                                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                                                                            <option value="FO">Faroe Islands</option>
                                                                                            <option value="FJ">Fiji</option>
                                                                                            <option value="FI">Finland</option>
                                                                                            <option value="FR">France</option>
                                                                                            <option value="GF">French Guiana</option>
                                                                                            <option value="PF">French Polynesia</option>
                                                                                            <option value="TF">French Southern Territories</option>
                                                                                            <option value="GA">Gabon</option>
                                                                                            <option value="GM">Gambia</option>
                                                                                            <option value="GE">Georgia</option>
                                                                                            <option value="DE">Germany</option>
                                                                                            <option value="GH">Ghana</option>
                                                                                            <option value="GI">Gibraltar</option>
                                                                                            <option value="GR">Greece</option>
                                                                                            <option value="GL">Greenland</option>
                                                                                            <option value="GD">Grenada</option>
                                                                                            <option value="GP">Guadeloupe</option>
                                                                                            <option value="GU">Guam</option>
                                                                                            <option value="GT">Guatemala</option>
                                                                                            <option value="GN">Guinea</option>
                                                                                            <option value="GW">Guinea-Bissau</option>
                                                                                            <option value="GY">Guyana</option>
                                                                                            <option value="HT">Haiti</option>
                                                                                            <option value="HM">Heard Island and Mcdonald Islands</option>
                                                                                            <option value="VA">Holy See (Vatican City State)</option>
                                                                                            <option value="HN">Honduras</option>
                                                                                            <option value="HK">Hong Kong</option>
                                                                                            <option value="HU">Hungary</option>
                                                                                            <option value="IS">Iceland</option>
                                                                                            <option value="IN">India</option>
                                                                                            <option value="ID">Indonesia</option>
                                                                                            <option value="IR">Iran, Islamic Republic of</option>
                                                                                            <option value="IQ">Iraq</option>
                                                                                            <option value="IE">Ireland</option>
                                                                                            <option value="IL">Israel</option>
                                                                                            <option value="IT">Italy</option>
                                                                                            <option value="JM">Jamaica</option>
                                                                                            <option value="JP">Japan</option>
                                                                                            <option value="JO">Jordan</option>
                                                                                            <option value="KZ">Kazakhstan</option>
                                                                                            <option value="KE">Kenya</option>
                                                                                            <option value="KI">Kiribati</option>
                                                                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                                                                            <option value="KR">Korea, Republic of</option>
                                                                                            <option value="KW">Kuwait</option>
                                                                                            <option value="KG">Kyrgyzstan</option>
                                                                                            <option value="LA">Lao People's Democratic Republic</option>
                                                                                            <option value="LV">Latvia</option>
                                                                                            <option value="LB">Lebanon</option>
                                                                                            <option value="LS">Lesotho</option>
                                                                                            <option value="LR">Liberia</option>
                                                                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                                                                            <option value="LI">Liechtenstein</option>
                                                                                            <option value="LT">Lithuania</option>
                                                                                            <option value="LU">Luxembourg</option>
                                                                                            <option value="MO">Macao</option>
                                                                                            <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                                                                            <option value="MG">Madagascar</option>
                                                                                            <option value="MW">Malawi</option>
                                                                                            <option value="MY">Malaysia</option>
                                                                                            <option value="MV">Maldives</option>
                                                                                            <option value="ML">Mali</option>
                                                                                            <option value="MT">Malta</option>
                                                                                            <option value="MH">Marshall Islands</option>
                                                                                            <option value="MQ">Martinique</option>
                                                                                            <option value="MR">Mauritania</option>
                                                                                            <option value="MU">Mauritius</option>
                                                                                            <option value="YT">Mayotte</option>
                                                                                            <option value="MX">Mexico</option>
                                                                                            <option value="FM">Micronesia, Federated States of</option>
                                                                                            <option value="MD">Moldova, Republic of</option>
                                                                                            <option value="MC">Monaco</option>
                                                                                            <option value="MN">Mongolia</option>
                                                                                            <option value="MS">Montserrat</option>
                                                                                            <option value="MA">Morocco</option>
                                                                                            <option value="MZ">Mozambique</option>
                                                                                            <option value="MM">Myanmar</option>
                                                                                            <option value="NA">Namibia</option>
                                                                                            <option value="NR">Nauru</option>
                                                                                            <option value="NP">Nepal</option>
                                                                                            <option value="NL">Netherlands</option>
                                                                                            <option value="AN">Netherlands Antilles</option>
                                                                                            <option value="NC">New Caledonia</option>
                                                                                            <option value="NZ">New Zealand</option>
                                                                                            <option value="NI">Nicaragua</option>
                                                                                            <option value="NE">Niger</option>
                                                                                            <option value="NG">Nigeria</option>
                                                                                            <option value="NU">Niue</option>
                                                                                            <option value="NF">Norfolk Island</option>
                                                                                            <option value="MP">Northern Mariana Islands</option>
                                                                                            <option value="NO">Norway</option>
                                                                                            <option value="OM">Oman</option>
                                                                                            <option value="PK">Pakistan</option>
                                                                                            <option value="PW">Palau</option>
                                                                                            <option value="PS">Palestinian Territory, Occupied</option>
                                                                                            <option value="PA">Panama</option>
                                                                                            <option value="PG">Papua New Guinea</option>
                                                                                            <option value="PY">Paraguay</option>
                                                                                            <option value="PE">Peru</option>
                                                                                            <option value="PH">Philippines</option>
                                                                                            <option value="PN">Pitcairn</option>
                                                                                            <option value="PL">Poland</option>
                                                                                            <option value="PT">Portugal</option>
                                                                                            <option value="PR">Puerto Rico</option>
                                                                                            <option value="QA">Qatar</option>
                                                                                            <option value="RE">Reunion</option>
                                                                                            <option value="RO">Romania</option>
                                                                                            <option value="RU">Russian Federation</option>
                                                                                            <option value="RW">Rwanda</option>
                                                                                            <option value="SH">Saint Helena</option>
                                                                                            <option value="KN">Saint Kitts and Nevis</option>
                                                                                            <option value="LC">Saint Lucia</option>
                                                                                            <option value="PM">Saint Pierre and Miquelon</option>
                                                                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                                                                            <option value="WS">Samoa</option>
                                                                                            <option value="SM">San Marino</option>
                                                                                            <option value="ST">Sao Tome and Principe</option>
                                                                                            <option value="SA">Saudi Arabia</option>
                                                                                            <option value="SN">Senegal</option>
                                                                                            <option value="CS">Serbia and Montenegro</option>
                                                                                            <option value="SC">Seychelles</option>
                                                                                            <option value="SL">Sierra Leone</option>
                                                                                            <option value="SG">Singapore</option>
                                                                                            <option value="SK">Slovakia</option>
                                                                                            <option value="SI">Slovenia</option>
                                                                                            <option value="SB">Solomon Islands</option>
                                                                                            <option value="SO">Somalia</option>
                                                                                            <option value="ZA">South Africa</option>
                                                                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                                                            <option value="ES">Spain</option>
                                                                                            <option value="LK">Sri Lanka</option>
                                                                                            <option value="SD">Sudan</option>
                                                                                            <option value="SR">Suriname</option>
                                                                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                                                                            <option value="SZ">Swaziland</option>
                                                                                            <option value="SE">Sweden</option>
                                                                                            <option value="CH">Switzerland</option>
                                                                                            <option value="SY">Syrian Arab Republic</option>
                                                                                            <option value="TW">Taiwan</option>
                                                                                            <option value="TJ">Tajikistan</option>
                                                                                            <option value="TZ">Tanzania, United Republic of</option>
                                                                                            <option value="TH">Thailand</option>
                                                                                            <option value="TL">Timor-Leste</option>
                                                                                            <option value="TG">Togo</option>
                                                                                            <option value="TK">Tokelau</option>
                                                                                            <option value="TO">Tonga</option>
                                                                                            <option value="TT">Trinidad and Tobago</option>
                                                                                            <option value="TN">Tunisia</option>
                                                                                            <option value="TR">Turkey</option>
                                                                                            <option value="TM">Turkmenistan</option>
                                                                                            <option value="TC">Turks and Caicos Islands</option>
                                                                                            <option value="TV">Tuvalu</option>
                                                                                            <option value="UG">Uganda</option>
                                                                                            <option value="UA">Ukraine</option>
                                                                                            <option value="AE">United Arab Emirates</option>
                                                                                            <option value="GB">United Kingdom</option>
                                                                                            <option value="US">United States</option>
                                                                                            <option value="UM">United States Minor Outlying Islands</option>
                                                                                            <option value="UY">Uruguay</option>
                                                                                            <option value="UZ">Uzbekistan</option>
                                                                                            <option value="VU">Vanuatu</option>
                                                                                            <option value="VE">Venezuela</option>
                                                                                            <option value="VN">Viet Nam</option>
                                                                                            <option value="VG">Virgin Islands, British</option>
                                                                                            <option value="VI">Virgin Islands, U.s.</option>
                                                                                            <option value="WF">Wallis and Futuna</option>
                                                                                            <option value="EH">Western Sahara</option>
                                                                                            <option value="YE">Yemen</option>
                                                                                            <option value="ZM">Zambia</option>
                                                                                            <option value="ZW">Zimbabwe</option>
                                                                                        </select>                        </li>
                                                                                    <li>
                                                                                        <label for="immigration_i9_review_date">Eligible Review Date</label>                            <input id="immigration_i9_review_date" type="text" name="immigration[i9_review_date]" class="formInputText calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label for="immigration_comments">Comments</label>                            <textarea rows="4" cols="30" name="immigration[comments]" class="formInputText" id="immigration_comments"></textarea>                        </li>
                                                                                    <li class="required">
                                                                                        <em>* </em>Required field                        </li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" class="" id="btnSave" value="Save">
                                                                                    <input type="button" class="reset" id="btnCancel" value="Cancel">
                                                                                </p>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="miniList" id="immidrationList">
                                                                    <div class="head">
                                                                        <h1>Assigned Immigration Records</h1>
                                                                    </div>

                                                                    <div class="inner">





                                                                        <form name="frmImmigrationDelete" id="frmImmigrationDelete" method="post" action="/hrm/symfony/web/index.php/pim/deleteImmigration/empNumber/1">
                                                                            <input type="hidden" name="defaultList[_csrf_token]" value="1672a6a5518350293602efafc58b4fea" id="defaultList__csrf_token">                <p id="listActions" style="display: none;">
                                                                                <input type="button" class="" id="btnAdd" value="Add">
                                                                                <input type="button" class="delete" id="btnDelete" value="Delete" disabled="disabled">
                                                                            </p>
                                                                            <table id="" class="table hover">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th class="check" style="width: 2%; display: none;"><input type="checkbox" id="immigrationCheckAll" class="checkbox"></th>
                                                                                    <th>Document</th>
                                                                                    <th>Number</th>
                                                                                    <th>Issued By</th>
                                                                                    <th>Issued Date</th>
                                                                                    <th>Expiry Date</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td class="check" style="display: none;"></td>
                                                                                    <td>No Records Found</td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                                <a name="attachments"></a>
                                                                <div id="addPaneAttachments" style="display: block;">
                                                                    <div class="head" id="saveHeading">
                                                                        <h1>Add Attachment</h1>
                                                                    </div> <!-- head -->
                                                                    <div class="inner">





                                                                        <form name="frmEmpAttachment" id="frmEmpAttachment" method="post" enctype="multipart/form-data" action="/hrm/symfony/web/index.php/pim/updateAttachment/empNumber/1" novalidate="novalidate">

                                                                            <input type="hidden" name="_csrf_token" value="d7e11321c2e2ba7844d69af70bc571f4" id="csrf_token">            <input type="hidden" name="EmpID" value="1">
                                                                            <input type="hidden" name="seqNO" id="seqNO" value="">
                                                                            <input type="hidden" name="screen" value="immigration">
                                                                            <input type="hidden" name="commentOnly" id="commentOnly" value="0">

                                                                            <fieldset>
                                                                                <ol>
                                                                                    <li id="currentFileLi" style="display: none;">
                                                                                        <label>Current File</label>
                                                                                        <span id="currentFileSpan"></span>
                                                                                    </li>
                                                                                    <li class="fieldHelpContainer">
                                                                                        <label id="selectFileSpan" style="height:100%">Select File</label>
                                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                                                                                        <input type="file" name="ufile" id="ufile">
                                                                                        <label class="fieldHelpBottom">Accepts up to 1MB</label>
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label>Comment</label>
                                                                                        <textarea name="txtAttDesc" id="txtAttDesc" rows="3" cols="35"></textarea>
                                                                                    </li>
                                                                                    <li class="required"><em>*</em> Required field</li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" name="btnSaveAttachment" id="btnSaveAttachment" value="Upload">
                                                                                    <input type="button" id="btnCommentOnly" value="Save Comment Only" style="display: none;">
                                                                                    <input type="button" class="cancel" id="cancelButton" value="Cancel">
                                                                                </p>
                                                                            </fieldset>

                                                                        </form> <!-- frmEmpAttachment -->

                                                                    </div> <!-- inner -->
                                                                </div>
                                                                <div id="attachmentList" class="miniList" style="display: none;">
                                                                    <div class="head">
                                                                        <h1>Attachments</h1>
                                                                    </div>
                                                                    <div class="inner">





                                                                        <form name="frmEmpDelAttachments" id="frmEmpDelAttachments" method="post" action="/hrm/symfony/web/index.php/pim/deleteAttachments/empNumber/1">

                                                                            <input type="hidden" name="employeeAttachmentDelete[_csrf_token]" value="54d02284e80c3f23ead602988bc89baa" id="employeeAttachmentDelete__csrf_token">            <input type="hidden" name="EmpID" value="1">

                                                                            <p id="attachmentActions" style="display: none;">
                                                                                <input type="button" class="addbutton" id="btnAddAttachment" value="Add">
                                                                            </p>


                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="f">
                                                                <div class="">
                                                                    <div class="head">
                                                                        <h1>Job</h1>
                                                                    </div> <!-- head -->

                                                                    <div class="inner">





                                                                        <form id="frmEmpJobDetails" method="post" enctype="multipart/form-data" action="/hrm/symfony/web/index.php/pim/viewJobDetails" novalidate="novalidate">
                                                                            <fieldset>
                                                                                <input type="hidden" name="job[_csrf_token]" value="e408f38a3bac8241772a30297f23cadf" id="job__csrf_token">                    <input type="hidden" name="job[emp_number]" value="1" id="job_emp_number">                    <ol>
                                                                                    <li>
                                                                                        <label for="job_job_title">Job Title</label>                            <select name="job[job_title]" class="formSelect" id="job_job_title" disabled="disabled">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                        </select>
                                                                                    </li>
                                                                                    <li>
                                                                                        <label>Job Specification</label>
                                                                                        <span id="fileLink"><label id="notDefinedLabel">Not Defined</label></span>                        </li>
                                                                                    <li>
                                                                                        <label for="job_emp_status">Employment Status</label>                            <select name="job[emp_status]" class="formSelect" id="job_emp_status" disabled="disabled">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                        </select>                        </li>
                                                                                    <li>
                                                                                        <label for="job_eeo_category">Job Category</label>                            <select name="job[eeo_category]" class="formSelect" id="job_eeo_category" disabled="disabled">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                            <option value="7">Craft Workers</option>
                                                                                            <option value="9">Laborers and Helpers</option>
                                                                                            <option value="6">Office and Clerical Workers</option>
                                                                                            <option value="1">Officials and Managers</option>
                                                                                            <option value="5">Operatives</option>
                                                                                            <option value="2">Professionals</option>
                                                                                            <option value="4">Sales Workers</option>
                                                                                            <option value="8">Service Workers</option>
                                                                                            <option value="3">Technicians</option>
                                                                                        </select>                        </li>
                                                                                    <li>
                                                                                        <label for="job_joined_date">Joined Date</label>                            <input id="job_joined_date" type="text" name="job[joined_date]" class="formDateInput calendar hasDatepicker" disabled=""><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="" style="opacity: 0.5; cursor: default;">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="job_sub_unit">Sub Unit</label>                            <select name="job[sub_unit]" class="formSelect" id="job_sub_unit" disabled="disabled">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                        </select>                        </li>
                                                                                    <li>
                                                                                        <label for="job_location">Location</label>                            <select name="job[location]" class="formSelect" id="job_location" disabled="disabled">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                        </select>                        </li>
                                                                                    <li>
                                                                                        <h2>Employment Contract</h2>
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="job_contract_start_date">Start Date</label>                            <input id="job_contract_start_date" type="text" name="job[contract_start_date]" class="formDateInput calendar hasDatepicker" disabled=""><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="" style="opacity: 0.5; cursor: default;">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="job_contract_end_date">End Date</label>                            <input id="job_contract_end_date" type="text" name="job[contract_end_date]" class="formDateInput calendar hasDatepicker" disabled=""><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="" style="opacity: 0.5; cursor: default;">
                                                                                    </li>
                                                                                    <li class="contractEdidMode" style="display: none;"><label for="job_contract_file">Contract Details</label><input type="file" name="job[contract_file]" id="job_contract_file" disabled="disabled"><label class="fieldHelpBottom">Accepts up to 1MB</label></li>                        <li class="contractReadMode">
                                                                                        <label>Contract Details</label><label id="notDefinedLabel">Not Defined</label>                        </li>
                                                                                </ol>

                                                                                <p>
                                                                                    <input type="button" class="" id="btnSave" value="Edit">

                                                                                    <input type="button" class="reset" id="btnTerminateEmployement" value="Terminate Employment">
                                                                                    <a id="terminateModal" class="btn2" data-toggle="modal" href="#terminateEmployement" target="_blank"></a>
                                                                                    <label id="terminatedDate">
                                                                                        <a class="btn2" data-toggle="modal" href="#terminateEmployement"></a>
                                                                                    </label>
                                                                                </p>
                                                                            </fieldset>
                                                                        </form>

                                                                    </div> <!-- inner -->
                                                                </div>
                                                                <a name="attachments"></a>
                                                                <div id="addPaneAttachments" style="display: block;">
                                                                    <div class="head" id="saveHeading">
                                                                        <h1>Add Attachment</h1>
                                                                    </div> <!-- head -->
                                                                    <div class="inner">





                                                                        <form name="frmEmpAttachment" id="frmEmpAttachment" method="post" enctype="multipart/form-data" action="/hrm/symfony/web/index.php/pim/updateAttachment/empNumber/1" novalidate="novalidate">

                                                                            <input type="hidden" name="_csrf_token" value="d7e11321c2e2ba7844d69af70bc571f4" id="csrf_token">            <input type="hidden" name="EmpID" value="1">
                                                                            <input type="hidden" name="seqNO" id="seqNO" value="">
                                                                            <input type="hidden" name="screen" value="job">
                                                                            <input type="hidden" name="commentOnly" id="commentOnly" value="0">

                                                                            <fieldset>
                                                                                <ol>
                                                                                    <li id="currentFileLi" style="display: none;">
                                                                                        <label>Current File</label>
                                                                                        <span id="currentFileSpan"></span>
                                                                                    </li>
                                                                                    <li class="fieldHelpContainer">
                                                                                        <label id="selectFileSpan" style="height:100%">Select File</label>
                                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                                                                                        <input type="file" name="ufile" id="ufile">
                                                                                        <label class="fieldHelpBottom">Accepts up to 1MB</label>
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label>Comment</label>
                                                                                        <textarea name="txtAttDesc" id="txtAttDesc" rows="3" cols="35"></textarea>
                                                                                    </li>
                                                                                    <li class="required"><em>*</em> Required field</li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" name="btnSaveAttachment" id="btnSaveAttachment" value="Upload">
                                                                                    <input type="button" id="btnCommentOnly" value="Save Comment Only" style="display: none;">
                                                                                    <input type="button" class="cancel" id="cancelButton" value="Cancel">
                                                                                </p>
                                                                            </fieldset>

                                                                        </form> <!-- frmEmpAttachment -->

                                                                    </div> <!-- inner -->
                                                                </div>
                                                                <div id="attachmentList" class="miniList" style="/* display: none; */">
                                                                    <div class="head">
                                                                        <h1>Attachments</h1>
                                                                    </div>
                                                                    <div class="inner">





                                                                        <form name="frmEmpDelAttachments" id="frmEmpDelAttachments" method="post" action="/hrm/symfony/web/index.php/pim/deleteAttachments/empNumber/1">

                                                                            <input type="hidden" name="employeeAttachmentDelete[_csrf_token]" value="54d02284e80c3f23ead602988bc89baa" id="employeeAttachmentDelete__csrf_token">            <input type="hidden" name="EmpID" value="1">

                                                                            <p id="attachmentActions" style="display: none;">
                                                                                <input type="button" class="addbutton" id="btnAddAttachment" value="Add">
                                                                            </p>


                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="g">
                                                                <div id="changeSalary" style="display: block;">
                                                                    <div class="head">
                                                                        <h1 id="headchangeSalary">Add Salary Component</h1>
                                                                    </div>

                                                                    <div class="inner">
                                                                        <form id="frmSalary" action="/hrm/symfony/web/index.php/pim/viewSalaryList/empNumber/1" method="post" class="longLabels" novalidate="novalidate">
                                                                            <fieldset>
                                                                                <input type="hidden" name="salary[_csrf_token]" value="3022ede572ae1b0ad8aa203b167cec82" id="salary__csrf_token">                    <input type="hidden" name="salary[id]" id="salary_id" value="">                    <input value="1" type="hidden" name="salary[emp_number]" id="salary_emp_number">                    <ol>
                                                                                    <li>
                                                                                        <label for="salary_sal_grd_code">Pay Grade</label>                            <input type="hidden" name="salary[sal_grd_code]" id="salary_sal_grd_code" value="">                                <label id="noSalaryGrade" for="sal_grd_code">Not Defined</label>
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="salary_salary_component">Salary Component <em>*</em></label>                            <input type="text" name="salary[salary_component]" class="formInputText" maxlength="100" id="salary_salary_component">                        </li>
                                                                                    <li>
                                                                                        <label for="salary_payperiod_code">Pay Frequency</label>                            <select name="salary[payperiod_code]" class="formSelect" id="salary_payperiod_code">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                            <option value="2">Bi Weekly</option>
                                                                                            <option value="6">Hourly</option>
                                                                                            <option value="4">Monthly</option>
                                                                                            <option value="5">Monthly on first pay of month.</option>
                                                                                            <option value="3">Semi Monthly</option>
                                                                                            <option value="1">Weekly</option>
                                                                                        </select>                        </li>
                                                                                    <li>
                                                                                        <label for="salary_currency_id">Currency <em>*</em></label>                            <select name="salary[currency_id]" class="formSelect" id="salary_currency_id"><option value="">-- Select --</option><option value="AFN">Afghanistan Afghani</option><option value="ALL">Albanian Lek</option><option value="DZD">Algerian Dinar</option><option value="AOR">Angolan New Kwanza</option><option value="ARP">Argentina Pesos</option><option value="ARS">Argentine Peso</option><option value="AWG">Aruban Florin</option><option value="AUD">Australian Dollar</option><option value="BSD">Bahamian Dollar</option><option value="BHD">Bahraini Dinar</option><option value="BDT">Bangladeshi Taka</option><option value="BBD">Barbados Dollar</option><option value="BZD">Belize Dollar</option><option value="BMD">Bermudian Dollar</option><option value="BTN">Bhutan Ngultrum</option><option value="BOB">Bolivian Boliviano</option><option value="BWP">Botswana Pula</option><option value="BRL">Brazilian Real</option><option value="BND">Brunei Dollar</option><option value="BGL">Bulgarian Lev</option><option value="BIF">Burundi Franc</option><option value="CAD">Canadian Dollar</option><option value="CVE">Cape Verde Escudo</option><option value="KYD">Cayman Islands Dollar</option><option value="XOF">CFA Franc BCEAO</option><option value="XAF">CFA Franc BEAC</option><option value="XPF">CFP Franc</option><option value="CLP">Chilean Peso</option><option value="CNY">Chinese Yuan Renminbi</option><option value="COP">Colombian Peso</option><option value="KMF">Comoros Franc</option><option value="CRC">Costa Rican Colon</option><option value="HRK">Croatian Kuna</option><option value="CUP">Cuban Peso</option><option value="CYP">Cyprus Pound</option><option value="CZK">Czech Koruna</option><option value="DKK">Danish Krona</option><option value="DJF">Djibouti Franc</option><option value="DOP">Dominican Peso</option><option value="XCD">Eastern Caribbean Dollars</option><option value="ECS">Ecuador Sucre</option><option value="EGP">Egyptian Pound</option><option value="SVC">El Salvador Colon</option><option value="EEK">Estonian Krona</option><option value="ETB">Ethiopian Birr</option><option value="EUR">Euro</option><option value="FKP">Falkland Islands Pound</option><option value="FJD">Fiji Dollar</option><option value="GMD">Gambian Dalasi</option><option value="GHC">Ghanaian Cedi</option><option value="GIP">Gibraltar Pound</option><option value="XAU">Gold (oz.)</option><option value="GTQ">Guatemalan Quetzal</option><option value="GNF">Guinea Franc</option><option value="GYD">Guyanan Dollar</option><option value="HTG">Haitian Gourde</option><option value="HNL">Honduran Lempira</option><option value="HKD">Hong Kong Dollar</option><option value="HUF">Hungarian Forint</option><option value="ISK">Iceland Krona</option><option value="XDR">IMF Special Drawing Right</option><option value="INR">Indian Rupee</option><option value="IDR">Indonesian Rupiah</option><option value="IRR">Iranian Rial</option><option value="IQD">Iraqi Dinar</option><option value="ILS">Israeli New Shekel</option><option value="JMD">Jamaican Dollar</option><option value="JPY">Japanese Yen</option><option value="JOD">Jordanian Dinar</option><option value="KHR">Kampuchean Riel</option><option value="KZT">Kazakhstan Tenge</option><option value="KES">Kenyan Shilling</option><option value="KRW">Korean Won</option><option value="KWD">Kuwaiti Dinar</option><option value="LAK">Lao Kip</option><option value="LVL">Latvian Lats</option><option value="LBP">Lebanese Pound</option><option value="LSL">Lesotho Loti</option><option value="LRD">Liberian Dollar</option><option value="LYD">Libyan Dinar</option><option value="LTL">Lithuanian Litas</option><option value="MOP">Macau Pataca</option><option value="MGF">Malagasy Franc</option><option value="MWK">Malawi Kwacha</option><option value="MYR">Malaysian Ringgit</option><option value="MVR">Maldive Rufiyaa</option><option value="MTL">Maltese Lira</option><option value="MRO">Mauritanian Ouguiya</option><option value="MUR">Mauritius Rupee</option><option value="MXN">Mexican New Peso</option><option value="MXP">Mexican Peso</option><option value="MNT">Mongolian Tugrik</option><option value="MAD">Moroccan Dirham</option><option value="MZM">Mozambique Metical</option><option value="MMK">Myanmar Kyat</option><option value="NAD">Namibia Dollar</option><option value="NPR">Nepalese Rupee</option><option value="ZRN">New Zaire</option><option value="NZD">New Zealand Dollar</option><option value="NIO">Nicaraguan Cordoba Oro</option><option value="NGN">Nigerian Naira</option><option value="ANG">NL Antillian Guilder</option><option value="KPW">North Korean Won</option><option value="NOK">Norwegian Krona</option><option value="OMR">Omani Rial</option><option value="PKR">Pakistan Rupee</option><option value="XPD">Palladium (oz.)</option><option value="PAB">Panamanian Balboa</option><option value="PGK">Papua New Guinea Kina</option><option value="PYG">Paraguay Guarani</option><option value="PEN">Peruvian Nuevo Sol</option><option value="PHP">Philippine Peso</option><option value="XPT">Platinum (oz.)</option><option value="PLN">Polish Zloty</option><option value="GBP">Pound Sterling</option><option value="QAR">Qatari Rial</option><option value="ROL">Romanian Leu</option><option value="RUR">Russia Rubles</option><option value="RUB">Russian Rouble</option><option value="WST">Samoan Tala</option><option value="STD">Sao Tome/Principe Dobra</option><option value="SAR">Saudi Arabia Riyal</option><option value="SCR">Seychelles Rupee</option><option value="SLL">Sierra Leone Leone</option><option value="XAG">Silver (oz.)</option><option value="SGD">Singapore Dollar</option><option value="SKK">Slovak Koruna</option><option value="SBD">Solomon Islands Dollar</option><option value="SOS">Somali Shilling</option><option value="ZAR">South African Rand</option><option value="LKR">Sri Lanka Rupee</option><option value="SHP">St. Helena Pound</option><option value="SDD">Sudanese Dinar</option><option value="SDP">Sudanese Pound</option><option value="SRD">Surinamese Dollar</option><option value="SZL">Swaziland Lilangeni</option><option value="SEK">Swedish Krona</option><option value="CHF">Swiss Franc</option><option value="SYP">Syrian Pound</option><option value="TWD">Taiwan Dollar</option><option value="TZS">Tanzanian Shilling</option><option value="THB">Thai Baht</option><option value="TOP">Tongan Pa'anga</option><option value="TTD">Trinidad/Tobago Dollar</option><option value="TND">Tunisian Dinar</option><option value="TRL">Turkish Lira</option><option value="UGX">Uganda Shilling</option><option value="UAH">Ukraine Hryvnia</option><option value="USD">United States Dollar</option><option value="UYP">Uruguayan Peso</option><option value="AED">Utd. Arab Emir. Dirham</option><option value="VUV">Vanuatu Vatu</option><option value="VEB">Venezuelan Bolivar</option><option value="VND">Vietnamese Dong</option><option value="YER">Yemeni Riyal</option><option value="YUN">Yugoslav Dinar</option><option value="YUM">Yugoslavian Dinar</option><option value="ZMK">Zambian Kwacha</option><option value="ZWD">Zimbabwe Dollar</option></select>                        </li>
                                                                                    <li>
                                                                                        <input name="" disabled="disabled" id="minSalary" type="hidden" value="--">
                                                                                        <input name="" disabled="disabled" id="maxSalary" type="hidden" value="--">
                                                                                        <label for="salary_basic_salary">Amount <em>*</em></label>                            <input type="text" name="salary[basic_salary]" class="formInputText" maxlength="12" id="salary_basic_salary">                            <label for="minSalary" id="minMaxSalaryLbl" class="fieldHelpRight"></label>
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label for="salary_comments">Comments</label>                            <textarea rows="4" cols="30" name="salary[comments]" class="formInputText" id="salary_comments"></textarea>                        </li>
                                                                                    <li>
                                                                                        <label id="set_direct_debit_label" for="salary_set_direct_debit">Add Direct Deposit Details</label>                            <input value="on" type="checkbox" name="salary[set_direct_debit]" id="salary_set_direct_debit">                        </li>
                                                                                    <li class="required" id="notDirectDebitSection">
                                                                                        <em>*</em> Required field                        </li>
                                                                                </ol>
                                                                                <ol id="directDebitSection" style="display: none;">
                                                                                    <input type="hidden" name="directdeposit[_csrf_token]" value="b2e02db4ab70e7911bb4064cce34e0a8" id="directdeposit__csrf_token">                        <input type="hidden" name="directdeposit[id]" id="directdeposit_id" value="">                        <li>
                                                                                        <label for="directdeposit_account">Account Number <em>*</em></label>                            <input type="text" name="directdeposit[account]" class="formInputText" maxlength="100" id="directdeposit_account">                        </li>
                                                                                    <li>
                                                                                        <label for="directdeposit_account_type">Account Type <em>*</em></label>                            <select name="directdeposit[account_type]" class="formSelect" id="directdeposit_account_type">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                            <option value="SAVINGS">Savings</option>
                                                                                            <option value="CHECKING">Checking</option>
                                                                                            <option value="OTHER">Other</option>
                                                                                        </select>                        </li>
                                                                                    <li id="accountTypeOther" style="display: none;">
                                                                                        <label for="directdeposit_account_type_other">Please Specify <em>*</em></label>                            <input type="text" name="directdeposit[account_type_other]" class="formInputText" maxlength="20" id="directdeposit_account_type_other">                        </li>
                                                                                    <li>
                                                                                        <label for="directdeposit_routing_num">Routing Number <em>*</em></label>                            <input type="text" name="directdeposit[routing_num]" class="formInputText" maxlength="9" id="directdeposit_routing_num">                        </li>
                                                                                    <li>
                                                                                        <label for="directdeposit_amount">Amount <em>*</em></label>                            <input type="text" name="directdeposit[amount]" class="formInputText" maxlength="12" id="directdeposit_amount">                        </li>
                                                                                    <li class="required">
                                                                                        <em>*</em> Required field                        </li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" class="" id="btnSalarySave" value="Save">
                                                                                </p>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div> <!-- inner -->
                                                                </div>
                                                                <div class="miniList" id="salaryMiniList">
                                                                    <div class="head">
                                                                        <h1>Assigned Salary Components</h1>
                                                                    </div>

                                                                    <div class="inner">





                                                                        <form id="frmDelSalary" action="/hrm/symfony/web/index.php/pim/deleteSalary/empNumber/1" method="post" class="longLabels">
                                                                            <input type="hidden" name="defaultList[_csrf_token]" value="1672a6a5518350293602efafc58b4fea" id="defaultList__csrf_token">                <p id="actionSalary" style="display: none;">
                                                                                <input type="button" value="Add" class="" id="addSalary">
                                                                            </p>
                                                                            <table id="tblSalary" class="table hover">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th class="component">Salary Component</th>
                                                                                    <th class="payperiod">Pay Frequency</th>
                                                                                    <th class="currency">Currency</th>
                                                                                    <th class="amount">Amount</th>
                                                                                    <th class="comments">Comments</th>
                                                                                    <th class="directDepositCheck">Show Direct Deposit Details</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>No Records Found</td>
                                                                                    <td colspan="5"></td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <a name="attachments"></a>
                                                                <div id="addPaneAttachments" style="display: block;">
                                                                    <div class="head" id="saveHeading">
                                                                        <h1>Add Attachment</h1>
                                                                    </div> <!-- head -->
                                                                    <div class="inner">





                                                                        <form name="frmEmpAttachment" id="frmEmpAttachment" method="post" enctype="multipart/form-data" action="/hrm/symfony/web/index.php/pim/updateAttachment/empNumber/1" novalidate="novalidate">

                                                                            <input type="hidden" name="_csrf_token" value="d7e11321c2e2ba7844d69af70bc571f4" id="csrf_token">            <input type="hidden" name="EmpID" value="1">
                                                                            <input type="hidden" name="seqNO" id="seqNO" value="">
                                                                            <input type="hidden" name="screen" value="salary">
                                                                            <input type="hidden" name="commentOnly" id="commentOnly" value="0">

                                                                            <fieldset>
                                                                                <ol>
                                                                                    <li id="currentFileLi" style="display: none;">
                                                                                        <label>Current File</label>
                                                                                        <span id="currentFileSpan"></span>
                                                                                    </li>
                                                                                    <li class="fieldHelpContainer">
                                                                                        <label id="selectFileSpan" style="height:100%">Select File</label>
                                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                                                                                        <input type="file" name="ufile" id="ufile">
                                                                                        <label class="fieldHelpBottom">Accepts up to 1MB</label>
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label>Comment</label>
                                                                                        <textarea name="txtAttDesc" id="txtAttDesc" rows="3" cols="35"></textarea>
                                                                                    </li>
                                                                                    <li class="required"><em>*</em> Required field</li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" name="btnSaveAttachment" id="btnSaveAttachment" value="Upload">
                                                                                    <input type="button" id="btnCommentOnly" value="Save Comment Only" style="display: none;">
                                                                                    <input type="button" class="cancel" id="cancelButton" value="Cancel">
                                                                                </p>
                                                                            </fieldset>

                                                                        </form> <!-- frmEmpAttachment -->

                                                                    </div> <!-- inner -->
                                                                </div>
                                                                <div id="attachmentList" class="miniList" style="/* display: none; */">
                                                                    <div class="head">
                                                                        <h1>Attachments</h1>
                                                                    </div>
                                                                    <div class="inner">





                                                                        <form name="frmEmpDelAttachments" id="frmEmpDelAttachments" method="post" action="/hrm/symfony/web/index.php/pim/deleteAttachments/empNumber/1">

                                                                            <input type="hidden" name="employeeAttachmentDelete[_csrf_token]" value="54d02284e80c3f23ead602988bc89baa" id="employeeAttachmentDelete__csrf_token">            <input type="hidden" name="EmpID" value="1">

                                                                            <p id="attachmentActions" style="display: none;">
                                                                                <input type="button" class="addbutton" id="btnAddAttachment" value="Add">
                                                                            </p>


                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="h">
                                                                <div id="addPaneReportTo" style="display: block;">
                                                                    <div class="head">
                                                                        <h1 id="reportToHeading">Add Supervisor</h1>
                                                                    </div>

                                                                    <div class="inner">
                                                                        <form name="frmAddReportTo" id="frmAddReportTo" method="post" action="/hrm/symfony/web/index.php/pim/updateReportToDetail/empNumber/1">
                                                                            <input type="hidden" name="reportto[_csrf_token]" value="f9c7dd90ef4b63220a597c4d36294ce4" id="reportto__csrf_token">                    <input value="1" type="hidden" name="reportto[empNumber]" id="reportto_empNumber"><input type="hidden" name="nameType" id="nameType" value="supervisor">                    <input type="hidden" name="reportto[previousRecord]" id="reportto_previousRecord" value="">                    <fieldset>
                                                                                <ol>
                                                                                    <li>
                                                                                        <ul class="radio_list" style="display: none;"><li><input name="reportto[type_flag]" type="radio" value="1" id="reportto_type_flag_1" checked="checked">&nbsp;<label for="reportto_type_flag_1">Supervisor</label></li>
                                                                                            <li><input name="reportto[type_flag]" type="radio" value="2" id="reportto_type_flag_2">&nbsp;<label for="reportto_type_flag_2">Subordinate</label></li></ul>                            </li>
                                                                                    <li>
                                                                                        <label for="reportto_supervisorName">Name <em>*</em></label>

                                                                                        <input type="text" name="reportto[supervisorName][empName]" value="" class="txtBoxR name inputFormatHint ac_input" maxlength="92" id="reportto_supervisorName_empName" autocomplete="off" style="">

                                                                                        <input type="hidden" name="reportto[supervisorName][empId]" id="reportto_supervisorName_empId" value="">
                                                                                        <label for="reportto_subordinateName" style="display: none;">Name <em>*</em></label>
                                                                                        <input type="text" name="reportto[subordinateName][empName]" value="" class="txtBoxR name inputFormatHint ac_input" maxlength="92" id="reportto_subordinateName_empName" autocomplete="off" style="display: none;">
                                                                                        <input type="hidden" name="reportto[subordinateName][empId]" id="reportto_subordinateName_empId" value="">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="reportto_reportingMethodType">Reporting Method <em>*</em></label>                                <select name="reportto[reportingMethodType]" class="drpDownR" maxlength="50" id="reportto_reportingMethodType">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                            <option value="1">Direct</option>
                                                                                            <option value="2">Indirect</option>
                                                                                            <option value="-1">Other</option>
                                                                                        </select>                            </li>
                                                                                    <li id="pleaseSpecify" style="display: none;">
                                                                                        <label for="reportto_reportingMethod">Please Specify <em>*</em></label>                                <input type="text" name="reportto[reportingMethod]" class="txtBoxR" maxlength="50" id="reportto_reportingMethod">                            </li>
                                                                                    <li class="required">
                                                                                        <em>*</em> Required field                            </li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" class="" name="btnSaveReportTo" id="btnSaveReportTo" value="Save">
                                                                                    <input type="button" id="btnCancel" class="reset" value="Cancel">
                                                                                </p>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div id="listReportToDetails">

                                                                    <div class="miniList" id="listReportToSupDetails">
                                                                        <div class="head">
                                                                            <h1>Assigned Supervisors</h1>
                                                                        </div>

                                                                        <div class="inner">

                                                                            <form name="frmEmpDelSupervisors" id="frmEmpDelSupervisors" method="post" action="/hrm/symfony/web/index.php/pim/deleteReportToSupervisor/empNumber/1">
                                                                                <input type="hidden" name="supDelete[_csrf_token]" value="53804df229cc9e1f7b5c786dff4dffcf" id="supDelete__csrf_token">                        <input value="1" type="hidden" name="supDelete[empNumber]" id="supDelete_empNumber">                        <p id="supListActions" style="display: none;">
                                                                                    <input type="button" class="" id="btnAddSupervisorDetail" value="Add">
                                                                                    <input type="button" class="delete" id="delSupBtn" value="Delete">
                                                                                </p>
                                                                                <table id="sup_list" class="table hover">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="check" style="width: 2%; display: none;"><input type="checkbox" id="checkAllSup" class="checkboxSup"></th>
                                                                                        <th class="supName">Name</th>
                                                                                        <th class="supReportMethod">Reporting Method</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td class="check" style="display: none;"></td>
                                                                                        <td>No Records Found</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </form>

                                                                        </div>
                                                                    </div> <!-- miniList-listReportToSupDetails -->

                                                                    <div class="miniList" id="listReportToSubDetails">
                                                                        <div class="head">
                                                                            <h1>Assigned Subordinates</h1>
                                                                        </div>

                                                                        <div class="inner">


                                                                            <form name="frmEmpDelSubordinates" id="frmEmpDelSubordinates" method="post" action="/hrm/symfony/web/index.php/pim/deleteReportToSubordinate/empNumber/1">
                                                                                <input type="hidden" name="subDelete[_csrf_token]" value="e8249a9e01238d56da1c50dc7f55d657" id="subDelete__csrf_token">                        <input value="1" type="hidden" name="subDelete[empNumber]" id="subDelete_empNumber">                        <p id="subListActions" style="display: none;">
                                                                                    <input type="button" class="" id="btnAddSubordinateDetail" value="Add">
                                                                                    <input type="button" class="delete" id="delSubBtn" value="Delete">
                                                                                </p>
                                                                                <table id="sub_list" class="table hover">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="check" style="width: 2%; display: none;"><input type="checkbox" id="checkAllSub" class="checkboxSub"></th>
                                                                                        <th class="subName">Name</th>
                                                                                        <th class="subReportMethod">Reporting Method</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td class="check" style="display: none;"></td>
                                                                                        <td>No Records Found</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </form>

                                                                        </div>
                                                                    </div> <!-- miniList-listReportToSubDetails -->

                                                                </div>
                                                                <a name="attachments"></a>
                                                                <div id="addPaneAttachments" style="display: block;">
                                                                    <div class="head" id="saveHeading">
                                                                        <h1>Add Attachment</h1>
                                                                    </div> <!-- head -->
                                                                    <div class="inner">





                                                                        <form name="frmEmpAttachment" id="frmEmpAttachment" method="post" enctype="multipart/form-data" action="/hrm/symfony/web/index.php/pim/updateAttachment/empNumber/1" novalidate="novalidate">

                                                                            <input type="hidden" name="_csrf_token" value="d7e11321c2e2ba7844d69af70bc571f4" id="csrf_token">            <input type="hidden" name="EmpID" value="1">
                                                                            <input type="hidden" name="seqNO" id="seqNO" value="">
                                                                            <input type="hidden" name="screen" value="report-to">
                                                                            <input type="hidden" name="commentOnly" id="commentOnly" value="0">

                                                                            <fieldset>
                                                                                <ol>
                                                                                    <li id="currentFileLi" style="display: none;">
                                                                                        <label>Current File</label>
                                                                                        <span id="currentFileSpan"></span>
                                                                                    </li>
                                                                                    <li class="fieldHelpContainer">
                                                                                        <label id="selectFileSpan" style="height:100%">Select File</label>
                                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                                                                                        <input type="file" name="ufile" id="ufile">
                                                                                        <label class="fieldHelpBottom">Accepts up to 1MB</label>
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label>Comment</label>
                                                                                        <textarea name="txtAttDesc" id="txtAttDesc" rows="3" cols="35"></textarea>
                                                                                    </li>
                                                                                    <li class="required"><em>*</em> Required field</li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" name="btnSaveAttachment" id="btnSaveAttachment" value="Upload">
                                                                                    <input type="button" id="btnCommentOnly" value="Save Comment Only" style="display: none;">
                                                                                    <input type="button" class="cancel" id="cancelButton" value="Cancel">
                                                                                </p>
                                                                            </fieldset>

                                                                        </form> <!-- frmEmpAttachment -->

                                                                    </div> <!-- inner -->
                                                                </div>
                                                                <div id="attachmentList" class="miniList" style="/* display: none; */">
                                                                    <div class="head">
                                                                        <h1>Attachments</h1>
                                                                    </div>
                                                                    <div class="inner">





                                                                        <form name="frmEmpDelAttachments" id="frmEmpDelAttachments" method="post" action="/hrm/symfony/web/index.php/pim/deleteAttachments/empNumber/1">

                                                                            <input type="hidden" name="employeeAttachmentDelete[_csrf_token]" value="54d02284e80c3f23ead602988bc89baa" id="employeeAttachmentDelete__csrf_token">            <input type="hidden" name="EmpID" value="1">

                                                                            <p id="attachmentActions" style="display: none;">
                                                                                <input type="button" class="addbutton" id="btnAddAttachment" value="Add">
                                                                            </p>


                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="i">
                                                                <div id="changeWorkExperience" style="display: block;">
                                                                    <div class="head">
                                                                        <h1 id="headChangeWorkExperience">Add Work Experience</h1>
                                                                    </div>

                                                                    <div class="inner">
                                                                        <form id="frmWorkExperience" action="/hrm/symfony/web/index.php/pim/saveDeleteWorkExperience/empNumber/1/option/save" method="post" novalidate="novalidate">
                                                                            <input type="hidden" name="experience[_csrf_token]" value="87ee72be09f364d53909916f465d4d83" id="experience__csrf_token">                    <input value="1" type="hidden" name="experience[emp_number]" id="experience_emp_number">                    <input type="hidden" name="experience[seqno]" id="experience_seqno" value="">
                                                                            <fieldset>
                                                                                <ol>
                                                                                    <li>
                                                                                        <label for="experience_employer">Company <em>*</em></label>                                <input type="text" name="experience[employer]" class="formInputText" maxlength="100" id="experience_employer">                            </li>
                                                                                    <li>
                                                                                        <label for="experience_jobtitle">Job Title <em>*</em></label>                                <input type="text" name="experience[jobtitle]" class="formInputText" maxlength="100" id="experience_jobtitle">                            </li>
                                                                                    <li>
                                                                                        <label for="experience_from_date">From</label>                                <input id="experience_from_date" type="text" name="experience[from_date]" class="formInputText calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="experience_to_date">To</label>                                <input id="experience_to_date" type="text" name="experience[to_date]" class="formInputText calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label for="experience_comments">Comment</label>                                <textarea rows="4" cols="30" name="experience[comments]" class="formInputText" id="experience_comments"></textarea>                            </li>
                                                                                    <li class="required">
                                                                                        <em>*</em> Required field                            </li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" class="" id="btnWorkExpSave" value="Save">
                                                                                    <input type="button" class="reset" id="btnWorkExpCancel" value="Cancel">
                                                                                </p>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="miniList" id="sectionWorkExperience">

                                                                    <div class="head">
                                                                        <h1>Work Experience</h1>
                                                                    </div>

                                                                    <div class="inner">






                                                                        <form id="frmDelWorkExperience" action="/hrm/symfony/web/index.php/pim/saveDeleteWorkExperience/empNumber/1/option/delete" method="post">
                                                                            <input type="hidden" name="defaultList[_csrf_token]" value="1672a6a5518350293602efafc58b4fea" id="defaultList__csrf_token">                    <p id="actionWorkExperience" style="display: none;">
                                                                                <input type="button" value="Add" class="" id="addWorkExperience">
                                                                                <input type="button" value="Delete" class="delete" id="delWorkExperience" style="display: none;">
                                                                            </p>
                                                                            <table id="" class="table hover">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th class="check" style="width: 2%; display: none;"><input type="checkbox" id="workCheckAll" style="display: none;"></th>
                                                                                    <th>Company</th>
                                                                                    <th>Job Title</th>
                                                                                    <th>From</th>
                                                                                    <th>To</th>
                                                                                    <th>Comment</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td class="check" style="display: none;"></td>
                                                                                    <td>No Records Found</td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </form>


                                                                    </div>

                                                                </div>
                                                                <a name="education"></a>
                                                                <div id="changeEducation" style="display: block;">
                                                                    <div class="head">
                                                                        <h1 id="headChangeEducation">Add Education</h1>
                                                                    </div>
                                                                    <div class="inner">
                                                                        <form id="frmEducation" action="/hrm/symfony/web/index.php/pim/saveDeleteEducation/empNumber/1/option/save" method="post" novalidate="novalidate">
                                                                            <input type="hidden" name="education[_csrf_token]" value="6c6b2f575c0b4a8774ac1ca765779a19" id="education__csrf_token">            <input type="hidden" name="education[id]" id="education_id" value="">            <input value="1" type="hidden" name="education[emp_number]" id="education_emp_number">            <fieldset>
                                                                                <ol>
                                                                                    <li>
                                                                                        <label for="education_code">Level <em>*</em></label>                        <select name="education[code]" class="formSelect" id="education_code">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                        </select><span id="static_education_code" style="display:none;"></span>                    </li>
                                                                                    <li>
                                                                                        <label for="education_institute">Institute</label>                        <input type="text" name="education[institute]" class="formInputText" maxlength="100" id="education_institute">                    </li>
                                                                                    <li>
                                                                                        <label for="education_major">Major/Specialization</label>                        <input type="text" name="education[major]" class="formInputText" maxlength="100" id="education_major">                    </li>
                                                                                    <li>
                                                                                        <label for="education_year">Year</label>                        <input type="text" name="education[year]" class="formInputText" maxlength="4" id="education_year">                    </li>
                                                                                    <li>
                                                                                        <label for="education_gpa">GPA/Score</label>                        <input type="text" name="education[gpa]" class="formInputText" maxlength="25" id="education_gpa">                    </li>
                                                                                    <li>
                                                                                        <label for="education_start_date">Start Date</label>                        <input id="education_start_date" type="text" name="education[start_date]" class="formInputText calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="education_end_date">End Date</label>                        <input id="education_end_date" type="text" name="education[end_date]" class="formInputText calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                                                                    </li>
                                                                                    <li class="required line">
                                                                                        <em>*</em> Required field                    </li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" class="" id="btnEducationSave" value="Save">
                                                                                    <input type="button" class="reset" id="btnEducationCancel" value="Cancel">
                                                                                </p>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="miniList" id="">

                                                                    <div class="head">
                                                                        <h1>Education</h1>
                                                                    </div>

                                                                    <div class="inner">






                                                                        <form id="frmDelEducation" action="/hrm/symfony/web/index.php/pim/saveDeleteEducation/empNumber/1/option/delete" method="post">
                                                                            <input type="hidden" name="defaultList[_csrf_token]" value="1672a6a5518350293602efafc58b4fea" id="defaultList__csrf_token">            <div id="tblEducation">
                                                                                <p id="actionEducation" style="display: none;">
                                                                                    <input type="button" value="Add" class="" id="addEducation">
                                                                                    <input type="button" value="Delete" class="delete" id="delEducation" style="display: none;">
                                                                                </p>
                                                                                <table width="100%" cellspacing="0" cellpadding="0" class="table tablesorter">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="check" width="2%" style="display: none;"><input type="checkbox" id="educationCheckAll" style="display: none;"></th>
                                                                                        <th>Level</th>
                                                                                        <th>Year</th>
                                                                                        <th>GPA/Score</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td class="check" style="display: none;"></td>
                                                                                        <td>No Records Found</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </form>


                                                                    </div> <!-- inner -->

                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="j">
                                                                <div id="addPaneMembership" style="display: block;">
                                                                    <div class="head">
                                                                        <h1 id="membershipHeading">Add Membership</h1>
                                                                    </div>

                                                                    <div class="inner">
                                                                        <form name="frmEmpMembership" id="frmEmpMembership" method="post" action="/hrm/symfony/web/index.php/pim/updateMembership/empNumber/1" class="longLabels" novalidate="novalidate">

                                                                            <input type="hidden" name="membership[_csrf_token]" value="91025ce2d45c2521a722cb85671cd4ba" id="membership__csrf_token">                    <input value="1" type="hidden" name="membership[empNumber]" id="membership_empNumber">                    <fieldset>
                                                                                <ol>
                                                                                    <li>
                                                                                        <label for="membership_membership">Membership <em>*</em></label>                                <select name="membership[membership]" class="drpDown" maxlength="50" id="membership_membership">
                                                                                            <option value="" selected="selected" style="display: none;">-- Select --</option>
                                                                                        </select>                            </li>
                                                                                    <li>
                                                                                        <label for="membership_subscriptionPaidBy">Subscription Paid By</label>                                <select name="membership[subscriptionPaidBy]" class="drpDown" maxlength="50" id="membership_subscriptionPaidBy">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                            <option value="Company">Company</option>
                                                                                            <option value="Individual">Individual</option>
                                                                                        </select>                            </li>
                                                                                    <li>
                                                                                        <label for="membership_subscriptionAmount">Subscription Amount</label>                                <input type="text" name="membership[subscriptionAmount]" class="formInputM" maxlength="13" id="membership_subscriptionAmount">                            </li>
                                                                                    <li>
                                                                                        <label for="membership_currency">Currency</label>                                <select name="membership[currency]" class="drpDown" maxlength="50" id="membership_currency">
                                                                                            <option value="" selected="selected">-- Select --</option>
                                                                                            <option value="AFN">Afghanistan Afghani</option>
                                                                                            <option value="ALL">Albanian Lek</option>
                                                                                            <option value="DZD">Algerian Dinar</option>
                                                                                            <option value="AOR">Angolan New Kwanza</option>
                                                                                            <option value="ARP">Argentina Pesos</option>
                                                                                            <option value="ARS">Argentine Peso</option>
                                                                                            <option value="AWG">Aruban Florin</option>
                                                                                            <option value="AUD">Australian Dollar</option>
                                                                                            <option value="BSD">Bahamian Dollar</option>
                                                                                            <option value="BHD">Bahraini Dinar</option>
                                                                                            <option value="BDT">Bangladeshi Taka</option>
                                                                                            <option value="BBD">Barbados Dollar</option>
                                                                                            <option value="BZD">Belize Dollar</option>
                                                                                            <option value="BMD">Bermudian Dollar</option>
                                                                                            <option value="BTN">Bhutan Ngultrum</option>
                                                                                            <option value="BOB">Bolivian Boliviano</option>
                                                                                            <option value="BWP">Botswana Pula</option>
                                                                                            <option value="BRL">Brazilian Real</option>
                                                                                            <option value="BND">Brunei Dollar</option>
                                                                                            <option value="BGL">Bulgarian Lev</option>
                                                                                            <option value="BIF">Burundi Franc</option>
                                                                                            <option value="CAD">Canadian Dollar</option>
                                                                                            <option value="CVE">Cape Verde Escudo</option>
                                                                                            <option value="KYD">Cayman Islands Dollar</option>
                                                                                            <option value="XOF">CFA Franc BCEAO</option>
                                                                                            <option value="XAF">CFA Franc BEAC</option>
                                                                                            <option value="XPF">CFP Franc</option>
                                                                                            <option value="CLP">Chilean Peso</option>
                                                                                            <option value="CNY">Chinese Yuan Renminbi</option>
                                                                                            <option value="COP">Colombian Peso</option>
                                                                                            <option value="KMF">Comoros Franc</option>
                                                                                            <option value="CRC">Costa Rican Colon</option>
                                                                                            <option value="HRK">Croatian Kuna</option>
                                                                                            <option value="CUP">Cuban Peso</option>
                                                                                            <option value="CYP">Cyprus Pound</option>
                                                                                            <option value="CZK">Czech Koruna</option>
                                                                                            <option value="DKK">Danish Krona</option>
                                                                                            <option value="DJF">Djibouti Franc</option>
                                                                                            <option value="DOP">Dominican Peso</option>
                                                                                            <option value="XCD">Eastern Caribbean Dollars</option>
                                                                                            <option value="ECS">Ecuador Sucre</option>
                                                                                            <option value="EGP">Egyptian Pound</option>
                                                                                            <option value="SVC">El Salvador Colon</option>
                                                                                            <option value="EEK">Estonian Krona</option>
                                                                                            <option value="ETB">Ethiopian Birr</option>
                                                                                            <option value="EUR">Euro</option>
                                                                                            <option value="FKP">Falkland Islands Pound</option>
                                                                                            <option value="FJD">Fiji Dollar</option>
                                                                                            <option value="GMD">Gambian Dalasi</option>
                                                                                            <option value="GHC">Ghanaian Cedi</option>
                                                                                            <option value="GIP">Gibraltar Pound</option>
                                                                                            <option value="XAU">Gold (oz.)</option>
                                                                                            <option value="GTQ">Guatemalan Quetzal</option>
                                                                                            <option value="GNF">Guinea Franc</option>
                                                                                            <option value="GYD">Guyanan Dollar</option>
                                                                                            <option value="HTG">Haitian Gourde</option>
                                                                                            <option value="HNL">Honduran Lempira</option>
                                                                                            <option value="HKD">Hong Kong Dollar</option>
                                                                                            <option value="HUF">Hungarian Forint</option>
                                                                                            <option value="ISK">Iceland Krona</option>
                                                                                            <option value="XDR">IMF Special Drawing Right</option>
                                                                                            <option value="INR">Indian Rupee</option>
                                                                                            <option value="IDR">Indonesian Rupiah</option>
                                                                                            <option value="IRR">Iranian Rial</option>
                                                                                            <option value="IQD">Iraqi Dinar</option>
                                                                                            <option value="ILS">Israeli New Shekel</option>
                                                                                            <option value="JMD">Jamaican Dollar</option>
                                                                                            <option value="JPY">Japanese Yen</option>
                                                                                            <option value="JOD">Jordanian Dinar</option>
                                                                                            <option value="KHR">Kampuchean Riel</option>
                                                                                            <option value="KZT">Kazakhstan Tenge</option>
                                                                                            <option value="KES">Kenyan Shilling</option>
                                                                                            <option value="KRW">Korean Won</option>
                                                                                            <option value="KWD">Kuwaiti Dinar</option>
                                                                                            <option value="LAK">Lao Kip</option>
                                                                                            <option value="LVL">Latvian Lats</option>
                                                                                            <option value="LBP">Lebanese Pound</option>
                                                                                            <option value="LSL">Lesotho Loti</option>
                                                                                            <option value="LRD">Liberian Dollar</option>
                                                                                            <option value="LYD">Libyan Dinar</option>
                                                                                            <option value="LTL">Lithuanian Litas</option>
                                                                                            <option value="MOP">Macau Pataca</option>
                                                                                            <option value="MGF">Malagasy Franc</option>
                                                                                            <option value="MWK">Malawi Kwacha</option>
                                                                                            <option value="MYR">Malaysian Ringgit</option>
                                                                                            <option value="MVR">Maldive Rufiyaa</option>
                                                                                            <option value="MTL">Maltese Lira</option>
                                                                                            <option value="MRO">Mauritanian Ouguiya</option>
                                                                                            <option value="MUR">Mauritius Rupee</option>
                                                                                            <option value="MXN">Mexican New Peso</option>
                                                                                            <option value="MXP">Mexican Peso</option>
                                                                                            <option value="MNT">Mongolian Tugrik</option>
                                                                                            <option value="MAD">Moroccan Dirham</option>
                                                                                            <option value="MZM">Mozambique Metical</option>
                                                                                            <option value="MMK">Myanmar Kyat</option>
                                                                                            <option value="NAD">Namibia Dollar</option>
                                                                                            <option value="NPR">Nepalese Rupee</option>
                                                                                            <option value="ZRN">New Zaire</option>
                                                                                            <option value="NZD">New Zealand Dollar</option>
                                                                                            <option value="NIO">Nicaraguan Cordoba Oro</option>
                                                                                            <option value="NGN">Nigerian Naira</option>
                                                                                            <option value="ANG">NL Antillian Guilder</option>
                                                                                            <option value="KPW">North Korean Won</option>
                                                                                            <option value="NOK">Norwegian Krona</option>
                                                                                            <option value="OMR">Omani Rial</option>
                                                                                            <option value="PKR">Pakistan Rupee</option>
                                                                                            <option value="XPD">Palladium (oz.)</option>
                                                                                            <option value="PAB">Panamanian Balboa</option>
                                                                                            <option value="PGK">Papua New Guinea Kina</option>
                                                                                            <option value="PYG">Paraguay Guarani</option>
                                                                                            <option value="PEN">Peruvian Nuevo Sol</option>
                                                                                            <option value="PHP">Philippine Peso</option>
                                                                                            <option value="XPT">Platinum (oz.)</option>
                                                                                            <option value="PLN">Polish Zloty</option>
                                                                                            <option value="GBP">Pound Sterling</option>
                                                                                            <option value="QAR">Qatari Rial</option>
                                                                                            <option value="ROL">Romanian Leu</option>
                                                                                            <option value="RUR">Russia Rubles</option>
                                                                                            <option value="RUB">Russian Rouble</option>
                                                                                            <option value="WST">Samoan Tala</option>
                                                                                            <option value="STD">Sao Tome/Principe Dobra</option>
                                                                                            <option value="SAR">Saudi Arabia Riyal</option>
                                                                                            <option value="SCR">Seychelles Rupee</option>
                                                                                            <option value="SLL">Sierra Leone Leone</option>
                                                                                            <option value="XAG">Silver (oz.)</option>
                                                                                            <option value="SGD">Singapore Dollar</option>
                                                                                            <option value="SKK">Slovak Koruna</option>
                                                                                            <option value="SBD">Solomon Islands Dollar</option>
                                                                                            <option value="SOS">Somali Shilling</option>
                                                                                            <option value="ZAR">South African Rand</option>
                                                                                            <option value="LKR">Sri Lanka Rupee</option>
                                                                                            <option value="SHP">St. Helena Pound</option>
                                                                                            <option value="SDD">Sudanese Dinar</option>
                                                                                            <option value="SDP">Sudanese Pound</option>
                                                                                            <option value="SRD">Surinamese Dollar</option>
                                                                                            <option value="SZL">Swaziland Lilangeni</option>
                                                                                            <option value="SEK">Swedish Krona</option>
                                                                                            <option value="CHF">Swiss Franc</option>
                                                                                            <option value="SYP">Syrian Pound</option>
                                                                                            <option value="TWD">Taiwan Dollar</option>
                                                                                            <option value="TZS">Tanzanian Shilling</option>
                                                                                            <option value="THB">Thai Baht</option>
                                                                                            <option value="TOP">Tongan Pa'anga</option>
                                                                                            <option value="TTD">Trinidad/Tobago Dollar</option>
                                                                                            <option value="TND">Tunisian Dinar</option>
                                                                                            <option value="TRL">Turkish Lira</option>
                                                                                            <option value="UGX">Uganda Shilling</option>
                                                                                            <option value="UAH">Ukraine Hryvnia</option>
                                                                                            <option value="USD">United States Dollar</option>
                                                                                            <option value="UYP">Uruguayan Peso</option>
                                                                                            <option value="AED">Utd. Arab Emir. Dirham</option>
                                                                                            <option value="VUV">Vanuatu Vatu</option>
                                                                                            <option value="VEB">Venezuelan Bolivar</option>
                                                                                            <option value="VND">Vietnamese Dong</option>
                                                                                            <option value="YER">Yemeni Riyal</option>
                                                                                            <option value="YUN">Yugoslav Dinar</option>
                                                                                            <option value="YUM">Yugoslavian Dinar</option>
                                                                                            <option value="ZMK">Zambian Kwacha</option>
                                                                                            <option value="ZWD">Zimbabwe Dollar</option>
                                                                                        </select>                            </li>
                                                                                    <li>
                                                                                        <label for="membership_subscriptionCommenceDate">Subscription Commence Date</label>                                <input id="membership_subscriptionCommenceDate" type="text" name="membership[subscriptionCommenceDate]" class="formDateInput calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="membership_subscriptionRenewalDate">Subscription Renewal Date</label>                                <input id="membership_subscriptionRenewalDate" type="text" name="membership[subscriptionRenewalDate]" class="formDateInput calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                                                                    </li>
                                                                                    <li class="required">
                                                                                        <em>*</em> Required field                            </li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" class="" name="btnSaveMembership" id="btnSaveMembership" value="Save">
                                                                                    <input type="button" id="btnCancel" class="reset" value="Cancel">
                                                                                </p>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="miniList" id="listMembershipDetails">
                                                                    <div class="head">
                                                                        <h1>Assigned Memberships</h1>
                                                                    </div>

                                                                    <div class="inner">









                                                                        <form name="frmEmpDelMemberships" id="frmEmpDelMemberships" method="post" action="/hrm/symfony/web/index.php/pim/deleteMemberships/empNumber/1">
                                                                            <input type="hidden" name="membershipsDelete[_csrf_token]" value="0860e4c0001372a5e1d1a362f8d2335c" id="membershipsDelete__csrf_token">                    <input value="1" type="hidden" name="membershipsDelete[empNumber]" id="membershipsDelete_empNumber">                    <p id="listActions" style="display: none;">
                                                                                <input type="button" class="" id="btnAddMembershipDetail" value="Add">
                                                                            </p>
                                                                            <table id="" class="table hover">
                                                                                <thead>
                                                                                <tr>
                                                                                    <input type="hidden" class="checkboxMem" id="checkAllMem">
                                                                                    <th class="memshipCode">Membership</th>
                                                                                    <th>Subscription Paid By</th>
                                                                                    <th class="memshipAmount">Subscription Amount</th>
                                                                                    <th>Currency</th>
                                                                                    <th>Subscription Commence Date</th>
                                                                                    <th>Subscription Renewal Date</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>No Records Found</td>
                                                                                    <td colspan="5"></td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                                <a name="attachments"></a>
                                                                <div id="addPaneAttachments" style="display: block;">
                                                                    <div class="head" id="saveHeading">
                                                                        <h1>Add Attachment</h1>
                                                                    </div> <!-- head -->
                                                                    <div class="inner">





                                                                        <form name="frmEmpAttachment" id="frmEmpAttachment" method="post" enctype="multipart/form-data" action="/hrm/symfony/web/index.php/pim/updateAttachment/empNumber/1" novalidate="novalidate">

                                                                            <input type="hidden" name="_csrf_token" value="d7e11321c2e2ba7844d69af70bc571f4" id="csrf_token">            <input type="hidden" name="EmpID" value="1">
                                                                            <input type="hidden" name="seqNO" id="seqNO" value="">
                                                                            <input type="hidden" name="screen" value="membership">
                                                                            <input type="hidden" name="commentOnly" id="commentOnly" value="0">

                                                                            <fieldset>
                                                                                <ol>
                                                                                    <li id="currentFileLi" style="display: none;">
                                                                                        <label>Current File</label>
                                                                                        <span id="currentFileSpan"></span>
                                                                                    </li>
                                                                                    <li class="fieldHelpContainer">
                                                                                        <label id="selectFileSpan" style="height:100%">Select File</label>
                                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                                                                                        <input type="file" name="ufile" id="ufile">
                                                                                        <label class="fieldHelpBottom">Accepts up to 1MB</label>
                                                                                    </li>
                                                                                    <li class="largeTextBox">
                                                                                        <label>Comment</label>
                                                                                        <textarea name="txtAttDesc" id="txtAttDesc" rows="3" cols="35"></textarea>
                                                                                    </li>
                                                                                    <li class="required"><em>*</em> Required field</li>
                                                                                </ol>
                                                                                <p>
                                                                                    <input type="button" name="btnSaveAttachment" id="btnSaveAttachment" value="Upload">
                                                                                    <input type="button" id="btnCommentOnly" value="Save Comment Only" style="display: none;">
                                                                                    <input type="button" class="cancel" id="cancelButton" value="Cancel">
                                                                                </p>
                                                                            </fieldset>

                                                                        </form> <!-- frmEmpAttachment -->

                                                                    </div> <!-- inner -->
                                                                </div>
                                                                <div id="attachmentList" class="miniList" style="display: none;">
                                                                    <div class="head">
                                                                        <h1>Attachments</h1>
                                                                    </div>
                                                                    <div class="inner">





                                                                        <form name="frmEmpDelAttachments" id="frmEmpDelAttachments" method="post" action="/hrm/symfony/web/index.php/pim/deleteAttachments/empNumber/1">

                                                                            <input type="hidden" name="employeeAttachmentDelete[_csrf_token]" value="54d02284e80c3f23ead602988bc89baa" id="employeeAttachmentDelete__csrf_token">            <input type="hidden" name="EmpID" value="1">

                                                                            <p id="attachmentActions" style="display: none;">
                                                                                <input type="button" class="addbutton" id="btnAddAttachment" value="Add">
                                                                            </p>


                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="leave" class="white_content">
                                            <a style="    z-index: 999999;float: right; right: 50px; position: relative;" href = "javascript:void(0)" onclick = "document.getElementById('leave').style.display='none';document.getElementById('fade1').style.display='none'">Close</a>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="content">
                                                            <div class="personalDetails" id="pdMainContainer">

                                                                <div class="head">
                                                                    <h1>Leave History</h1>
                                                                </div> <!-- head -->

                                                                <div class="inner">






                                                                    <form id="frmEmpPersonalDetails" method="post" action="/hrm/symfony/web/index.php/pim/viewPersonalDetails" novalidate="novalidate">

                                                                        <input type="hidden" name="personal[_csrf_token]" value="026f0e6f369bc517b88758b92d3f0cb7" id="personal__csrf_token">                <input value="1" type="hidden" name="personal[txtEmpID]" id="personal_txtEmpID">
                                                                        <fieldset>
                                                                            <!--
                                                                            <div class="helpLabelContainer">
                                                                                <div><label>First Name</label></div>
                                                                                <div><label>Middle Name</label></div>
                                                                                <div><label>Last Name</label></div>
                                                                            </div>
                                                                            -->
                                                                            <ol>
                                                                                <li class="line nameContainer">
                                                                                    <label for="Full_Name" class="hasTopFieldHelp">Faculty/Employee Name</label>
                                                                                    <ol class="fieldsInLine">
                                                                                        <li>
                                                                                            <input value="Noor" type="text" name="personal[txtEmpFirstName]" class="block default editable" maxlength="30" title="First Name" id="personal_txtEmpFirstName" disabled="disabled">                                </li>
                                                                                        <li>
                                                                                            <input value="Alam" type="text" name="personal[txtEmpMiddleName]" class="block default editable" maxlength="30" title="Middle Name" id="personal_txtEmpMiddleName" disabled="disabled">                                </li>
                                                                                        <li>
                                                                                            <input value="Khan" type="text" name="personal[txtEmpLastName]" class="block default editable" maxlength="30" title="Last Name" id="personal_txtEmpLastName" disabled="disabled">                                </li>
                                                                                    </ol>
                                                                                </li>
                                                                            </ol>
                                                                            <ol>
                                                                                <li>
                                                                                    <label for="personal_txtEmployeeId">Faculty/Employee Id</label>
                                                                                    <input value="001" type="text" name="" maxlength="10" class="editable" id="personal_txtEmployeeId" disabled="disabled">
                                                                                </li>
                                                                            </ol>
                                                                            <ol>
                                                                                <li>
                                                                                    <label for="personal_txtEmployeeId">Start Date</label>
                                                                                    <input value="01-01-2016" type="text" name="" maxlength="10" class="editable" id="personal_txtEmployeeId" disabled="disabled">
                                                                                </li>
                                                                            </ol>
                                                                            <ol>
                                                                                <li>
                                                                                    <label for="personal_txtEmployeeId">End Date</label>
                                                                                    <input value="31-12-2016" type="text" name="" maxlength="10" class="editable" id="personal_txtEmployeeId" disabled="disabled">
                                                                                </li>
                                                                            </ol>
                                                                            <ol>
                                                                                <li>
                                                                                    <label for="personal_txtEmployeeId">Leave Records</label>
                                                                                    <input value="35" type="text" name="" maxlength="10" class="editable" id="personal_txtEmployeeId" disabled="disabled">
                                                                                </li>
                                                                            </ol>
                                                                            <ol>
                                                                                <li>
                                                                                    <label for="personal_txtEmployeeId">Leave Taken</label>
                                                                                    <input value="10" type="text" name="" maxlength="10" class="editable" id="personal_txtEmployeeId" disabled="disabled">
                                                                                </li>
                                                                            </ol>
                                                                            <ol>
                                                                                <li>
                                                                                    <label for="personal_txtEmployeeId">Leave Remaining</label>
                                                                                    <input value="25" type="text" name="" maxlength="10" class="editable" id="personal_txtEmployeeId" disabled="disabled">
                                                                                </li>
                                                                            </ol>
                                                                        </fieldset>
                                                                    </form>


                                                                </div> <!-- inner -->

                                                            </div>
                                                        </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="project" class="white_content">
                                            <a style="    z-index: 999999;float: right; right: 50px; position: relative;" href = "javascript:void(0)" onclick = "document.getElementById('project').style.display='none';document.getElementById('fade2').style.display='none'">Close</a>
                                            <div class="row">
                                                <div id="tableWrapper">
                                                    <table class="table hover" id="resultTable">

                                                        <thead>
                                                        <tr>
                                                            <th rowspan="1" class="checkbox-col">Sl.No</th>
                                                            <th rowspan="1" class="header"><a href="" class="null">Project(s)</a></th>
                                                            <th rowspan="1" class="header"><a href="" class="null">Description(s)</a></th>
                                                            <th rowspan="1" class="header"><a href="" class="null">Team Members</a></th>
                                                            <th rowspan="1" class="header"><span class="headerCell">Start Date</span></th>
                                                            <th rowspan="1" class="header"><span class="headerCell">End Date</span></th>
                                                            <th rowspan="1" class="header"><span class="headerCell">Status</span></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Hypothesis Finding in (Multi-)Agent Systems</td>
                                                            <td>
                                                                <p>Hypothesis Finding in (Multi-)Agent Systems Details. Hypothesis Finding in (Multi-)Agent Systems Details.
                                                                Hypothesis Finding in (Multi-)Agent Systems Details.</p>
                                                                <p>Systems Details Hypothesis Finding in (Multi-)Agent Systems Details. Hypothesis Finding in (Multi-)Agent Systems Details.
                                                                    Hypothesis Finding in (Multi-)Agent .</p>
                                                            </td>
                                                            <td>Md. Noor, Faisal Alam, Topon Das</td>
                                                            <td>01-03-2016</td>
                                                            <td>01-06-2016</td>
                                                            <td>Active</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Logic and Constraint Programming</td>
                                                            <td>
                                                                <p>Logic and Constraint Programming Details informations. Logic and Constraint Programming Details informations.
                                                                Logic and Constraint Programming Details informations.</p>
                                                                <p>Details informationsLogic and Constraint Programming Details informations. Logic and Constraint Programming Details informations.
                                                                    Logic and Constraint Programming.</p>
                                                            </td>
                                                            <td>Topon Das, Md. Noor</td>
                                                            <td>01-03-2016</td>
                                                            <td>01-06-2016</td>
                                                            <td>Active</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Logical Implementation of multi-agent systems</td>
                                                            <td>
                                                            <p>Logical Implementation of multi-agent systems Brief Informations. Logical Implementation of multi-agent systems Brief Informations.
                                                                Logical Implementation of multi-agent systems Brief Informations.</p>
                                                            <p>Brief Informations Logical Implementation of multi-agent systems Brief Informations. Logical Implementation of multi-agent systems Brief Informations.
                                                                Logical Implementation of multi-agent systems Brief Informations.</p>
                                                            </td>
                                                            <td>Md. Noor</td>
                                                            <td>01-03-2016</td>
                                                            <td>01-06-2016</td>
                                                            <td>Active</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="fade" class="black_overlay"></div>
                                        <div id="fade1" class="black_overlay"></div>
                                        <div id="fade2" class="black_overlay"></div>
                                        <div id="fade3" class="black_overlay"></div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div> <!-- tableWrapper -->
                    </form> <!-- frmList_ohrmListComponent -->


                </div> <!-- inner -->

            </div> <!-- search-results -->
            <!-- Confirmation box HTML: Begins -->
            <div class="modal hide" id="deleteConfModal">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>OrangeHRM - Confirmation Required</h3>
                </div>
                <div class="modal-body">
                    <p>Delete records?</p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" data-dismiss="modal" id="dialogDeleteBtn" value="Ok">
                    <input type="button" class="btn cancel" data-dismiss="modal" value="Cancel">
                </div>
            </div>

        </div>
    </div>
</div>