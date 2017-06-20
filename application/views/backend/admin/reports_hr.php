<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('reports_hr');?>
                        </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_new_record');?>
                        </a></li>
        </ul>
        <!------CONTROL TABS END------>
        
    
        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <div id="content">


                    <div class="box toggableForm">

                        <div class="head">
                            <h1>Employee Reports</h1>
                        </div>
                        <div class="inner">
                            <form action="/hrm/symfony/web/index.php/core/viewDefinedPredefinedReports" id="searchForm" method="post">
                                <input type="hidden" name="search[_csrf_token]" value="0a78a09200515fff7d163b9de2fbc392" id="search__csrf_token">            <fieldset>

                                    <ol>
                                        <li>
                                        </li><li><label for="search_search">Report Name</label>
                                            <input type="text" name="search[search]" id="search_search" autocomplete="off" class="ac_input">
                                            <input type="hidden" name="search[_csrf_token]" value="0a78a09200515fff7d163b9de2fbc392" id="search__csrf_token"></li>

                                    </ol>

                                    <p>
                                        <input type="submit" class="searchBtn" value="Search" name="_search">
                                        <input type="button" class="reset" value="Reset" name="_reset">
                                        <input type="hidden" name="search[_csrf_token]" value="0a78a09200515fff7d163b9de2fbc392" id="search__csrf_token">                </p>

                                </fieldset>
                            </form>
                        </div>
                        <a href="#" class="toggle tiptip">&gt;</a>
                    </div>

                    <div class="box noHeader" id="search-results">


                        <div class="inner">




                            <form method="post" action="/hrm/symfony/web/index.php/core/viewDefinedPredefinedReports" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                                <input type="hidden" name="defaultList[_csrf_token]" value="43cebe94d6e39e72c1b16a82ff436a09" id="defaultList__csrf_token">
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
                                        <tr><th rowspan="1" class="checkbox-col"><input type="checkbox" id="ohrmList_chkSelectAll" name="chkSelectAll" value=""></th>
                                            <th rowspan="1" style="width:400" class="header"><a href="http://localhost/hrm/symfony/web/index.php/core/viewDefinedPredefinedReports?sortField=name&amp;sortOrder=ASC" class="null">Report Name</a></th>
                                            <th rowspan="1" style="width:95"><span class="headerCell"></span></th>
                                            <th rowspan="1" style="width:95"><span class="headerCell"></span></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr class="odd">
                                            <td><input type="checkbox" id="ohrmList_chkSelectRecord_5" name="chkSelectRow[]" value="5"></td>                                <td class="left">PIM Sample Report</td>
                                            <td class="left"><a href="/hrm/symfony/web/index.php/core/displayPredefinedReport?reportId=5">Run</a></td>
                                            <td class="left"><a href="/hrm/symfony/web/index.php/core/definePredefinedReport?reportId=5">Edit</a></td>
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
                            <input type="button" class="btn reset" data-dismiss="modal" value="Cancel">
                        </div>
                    </div>
                    <!-- Confirmation box HTML: Ends -->
                </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box single">

                    <div class="head">
                        <h1>Define Report</h1>
                    </div>
                    <div class="inner">




                        <form id="defineReportForm" action="/hrm/symfony/web/index.php/core/definePredefinedReport" method="post" novalidate="novalidate">        <fieldset id="name_fieldset">
                                <input type="hidden" name="report[_csrf_token]" value="d42c7534f4a9685d5769f974d69fa65b" id="report__csrf_token"><input type="hidden" name="report[report_id]" id="report_report_id">            <ol>
                                    <li>
                                        <label for="report_report_name">Report Name<span class="required"> * </span></label><input type="text" name="report[report_name]" id="report_report_name">                </li>
                                </ol>
                            </fieldset>
                            <fieldset id="criteria_selection">
                                <ol>
                                    <li>
                                        <label for="report_criteria_list">Selection Criteria</label><select name="report[criteria_list]" class="drpDown" maxlength="30" id="report_criteria_list">
                                            <option value="employee_name">Employee Name</option>
                                            <option value="pay_grade">Pay Grade</option>
                                            <option value="education">Education</option>
                                            <option value="employment_status">Employment Status</option>
                                            <option value="service_period">Service Period</option>
                                            <option value="joined_date">Joined Date</option>
                                            <option value="job_title">Job Title</option>
                                            <option value="language">Language</option>
                                            <option value="skill">Skill</option>
                                            <option value="age_group">Age Group</option>
                                            <option value="sub_unit">Sub Unit</option>
                                            <option value="gender">Gender</option>
                                            <option value="location">Location</option>
                                        </select>                   <a class="fieldHelpRight" id="btnAddConstraint">Add</a>
                                    </li>
                                </ol>
                            </fieldset>
                            <fieldset id="criteria_fieldset_inactive">

                                <ul id="filter_fields_inactive" style="display:none;">
                                    <li id="li_employee_name"><label for="report_employee_name">Employee Name</label><input id="employee_name_empId" type="hidden" name="report[employee_name][empId]" value="" disabled="disabled"><input id="employee_name_empName" type="text" name="report[employee_name][empName]" value="" class="inputFormatHint ac_input" autocomplete="off" disabled="disabled">

                                    </li><li id="li_pay_grade"><label for="report_pay_grade">Pay Grade</label><select id="report_pay_grade" name="report[pay_grade]" value="" disabled="disabled">
                                            <option id="pay_grade" value="">-- Select --</option>
                                        </select></li><li id="li_education"><label for="report_education">Education</label><select id="report_education" name="report[education]" value="" disabled="disabled">
                                            <option id="education" value="">-- Select --</option>
                                        </select></li><li id="li_employment_status"><label for="report_employment_status">Employment Status</label><select id="report_employment_status" name="report[employment_status]" value="0" selected="selected" disabled="disabled">
                                            <option id="employment_status" value="0" selected="selected">All</option>
                                        </select></li><li id="li_service_period"><label for="report_service_period">Service Period</label><select name="report[service_period][comparision]" id="service_period_comparision" disabled="disabled">
                                            <option value="" selected="selected">-- Select --</option>
                                            <option value="1">Less Than</option>
                                            <option value="2">Greater Than</option>
                                            <option value="3">Range</option>
                                        </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input size="10" type="text" name="report[service_period][value1]" value="" id="service_period_value1" disabled="disabled" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input size="10" type="text" name="report[service_period][value2]" value="" id="service_period_value2" disabled="disabled" style="display: none;">

                                    </li><li id="li_joined_date"><label for="report_joined_date">Joined Date</label><select name="report[joined_date][comparision]" id="joined_date_comparision" disabled="disabled">
                                            <option value="" selected="selected">-- Select --</option>
                                            <option value="1">Joined After</option>
                                            <option value="2">Joined Before</option>
                                            <option value="3">Joined in Between</option>
                                        </select> <input id="joined_date_from" type="text" name="report[joined_date][from]" value="" class="calendar hasDatepicker" disabled="disabled" style="display: none;"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="" style="display: none;">
                                        <input id="joined_date_to" type="text" name="report[joined_date][to]" value="" class="calendar hasDatepicker" disabled="disabled" style="display: none;"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="" style="display: none;">
                                        </li><li id="li_job_title"><label for="report_job_title">Job Title</label><select id="report_job_title" name="report[job_title]" value="0" selected="selected" disabled="disabled">
                                            <option id="job_title" value="0" selected="selected">All</option>
                                        </select></li><li id="li_language"><label for="report_language">Language</label><select id="report_language" name="report[language]" value="" disabled="disabled">
                                            <option id="language" value="">-- Select --</option>
                                        </select></li><li id="li_skill"><label for="report_skill">Skill</label><select id="report_skill" name="report[skill]" value="" disabled="disabled">
                                            <option id="skill" value="">-- Select --</option>
                                        </select></li><li id="li_age_group"><label for="report_age_group">Age Group</label><select name="report[age_group][comparision]" id="age_group_comparision" disabled="disabled">
                                            <option value="" selected="selected">-- Select --</option>
                                            <option value="1">Less Than</option>
                                            <option value="2">Greater Than</option>
                                            <option value="3">Range</option>
                                        </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input size="5" type="text" name="report[age_group][value1]" value="" id="age_group_value1" disabled="disabled" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input size="5" type="text" name="report[age_group][value2]" value="" id="age_group_value2" disabled="disabled" style="display: none;">
                                    </li><li id="li_sub_unit"><label for="report_sub_unit">Sub Unit</label><select id="report_sub_unit" name="report[sub_unit]" value="0" selected="selected" disabled="disabled">
                                            <option id="sub_unit" value="0" selected="selected">All</option>
                                        </select></li><li id="li_gender"><label for="report_gender">Gender</label><select id="report_gender" name="report[gender]" value="2" disabled="disabled">
                                            <option id="gender" value="-1">All</option>
                                            <option id="gender" value="1">Male</option>
                                            <option id="gender" value="2">Female</option>
                                        </select></li><li id="li_location"><label for="report_location">Location</label><select id="location" class="selectableGroupWidget" name="report[location]" disabled="disabled">
                                            <option value="" selected="selected">All</option>
                                        </select></li><li id="li_include"><label for="report_include">Include<span class="required"> * </span></label><select id="report_include_comparision" required="true" name="report[include][comparision]" value="3" disabled="disabled">
                                            <option id="include" required="true" value="1">Current Employees Only</option>
                                            <option id="include" required="true" value="2">Current and Past Employees</option>
                                            <option id="include" required="true" value="3">Past Employees Only</option>
                                        </select></li>            </ul>
                            </fieldset>
                            <fieldset id="criteria_fieldset">
                                <ol id="filter_fields">
                                    <li>
                                        Selected Criteria                </li>

                                    <li id="li_include" class="requiredFilter"><label for="report_include">Include<span class="required"> * </span></label><select id="report_include_comparision" required="true" name="report[include][comparision]" value="3">
                                            <option id="include" required="true" value="1">Current Employees Only</option>
                                            <option id="include" required="true" value="2">Current and Past Employees</option>
                                            <option id="include" required="true" value="3">Past Employees Only</option>
                                        </select></li>        </ol>
                            </fieldset>
                            <fieldset id="display_field_selection">
                                <ol>
                                    <li>
                                        <label for="report_display_groups">Display Field Groups</label><select name="report[display_groups]" id="report_display_groups">















                                            <option value="display_group_1">Personal </option><option value="display_group_2">Contact Details </option><option value="display_group_3">Emergency Contacts </option><option value="display_group_4">Dependents </option><option value="display_group_15">Memberships </option><option value="display_group_10">Work Experience </option><option value="display_group_11">Education </option><option value="display_group_12">Skills </option><option value="display_group_13">Languages </option><option value="display_group_14">License </option><option value="display_group_9">Supervisors </option><option value="display_group_8">Subordinates </option><option value="display_group_7">Salary </option><option value="display_group_6">Job </option><option value="display_group_5">Immigration </option></select>                <a class="fieldHelpRight" id="btnAddDisplayGroup">Add</a>
                                        <br>
                                    </li>
                                    <li>
                                        <label for="report_display_field_list">Display Fields</label><select name="report[display_field_list]" id="report_display_field_list">

                                            <option value="display_field_9">Employee Id</option><option value="display_field_10">Employee Last Name</option><option value="display_field_11">Employee First Name</option><option value="display_field_12">Employee Middle Name</option><option value="display_field_13">Date of Birth</option><option value="display_field_14">Nationality</option><option value="display_field_15">Gender</option><option value="display_field_17">Marital Status</option><option value="display_field_18">Driver License Number</option><option value="display_field_19">License Expiry Date</option><option value="display_field_97">Other Id</option></select>                <a class="fieldHelpRight" id="btnAddDisplayField">Add</a>
                                    </li>
                                </ol>
                            </fieldset>
                            <fieldset id="display_fieldset">
                                <ol id="display_groups">
                                    <li>
                                        Display Fields                </li>


                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_1">Personal (Include Header) </label><input id="display_group_1" name="display_groups[]" type="checkbox" value="1">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_9">Employee Id</label><input id="display_field_9" name="display_fields[]" type="checkbox" value="9" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_10">Employee Last Name</label><input id="display_field_10" name="display_fields[]" type="checkbox" value="10" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_11">Employee First Name</label><input id="display_field_11" name="display_fields[]" type="checkbox" value="11" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_12">Employee Middle Name</label><input id="display_field_12" name="display_fields[]" type="checkbox" value="12" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_13">Date of Birth</label><input id="display_field_13" name="display_fields[]" type="checkbox" value="13" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_14">Nationality</label><input id="display_field_14" name="display_fields[]" type="checkbox" value="14" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_15">Gender</label><input id="display_field_15" name="display_fields[]" type="checkbox" value="15" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_17">Marital Status</label><input id="display_field_17" name="display_fields[]" type="checkbox" value="17" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_18">Driver License Number</label><input id="display_field_18" name="display_fields[]" type="checkbox" value="18" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_19">License Expiry Date</label><input id="display_field_19" name="display_fields[]" type="checkbox" value="19" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_97">Other Id</label><input id="display_field_97" name="display_fields[]" type="checkbox" value="97" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_2">Contact Details (Include Header) </label><input id="display_group_2" name="display_groups[]" type="checkbox" value="2">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_20">Address</label><input id="display_field_20" name="display_fields[]" type="checkbox" value="20" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_21">Home Telephone</label><input id="display_field_21" name="display_fields[]" type="checkbox" value="21" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_22">Mobile</label><input id="display_field_22" name="display_fields[]" type="checkbox" value="22" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_23">Work Telephone</label><input id="display_field_23" name="display_fields[]" type="checkbox" value="23" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_24">Work Email</label><input id="display_field_24" name="display_fields[]" type="checkbox" value="24" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_25">Other Email</label><input id="display_field_25" name="display_fields[]" type="checkbox" value="25" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_3">Emergency Contacts (Include Header) </label><input id="display_group_3" name="display_groups[]" type="checkbox" value="3">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_26">Name</label><input id="display_field_26" name="display_fields[]" type="checkbox" value="26" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_27">Home Telephone</label><input id="display_field_27" name="display_fields[]" type="checkbox" value="27" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_28">Work Telephone</label><input id="display_field_28" name="display_fields[]" type="checkbox" value="28" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_29">Relationship</label><input id="display_field_29" name="display_fields[]" type="checkbox" value="29" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_30">Mobile</label><input id="display_field_30" name="display_fields[]" type="checkbox" value="30" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_4">Dependents (Include Header) </label><input id="display_group_4" name="display_groups[]" type="checkbox" value="4">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_31">Name</label><input id="display_field_31" name="display_fields[]" type="checkbox" value="31" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_32">Relationship</label><input id="display_field_32" name="display_fields[]" type="checkbox" value="32" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_33">Date of Birth</label><input id="display_field_33" name="display_fields[]" type="checkbox" value="33" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_15">Memberships (Include Header) </label><input id="display_group_15" name="display_groups[]" type="checkbox" value="15">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_35">Membership</label><input id="display_field_35" name="display_fields[]" type="checkbox" value="35" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_36">Subscription Paid By</label><input id="display_field_36" name="display_fields[]" type="checkbox" value="36" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_37">Subscription Amount</label><input id="display_field_37" name="display_fields[]" type="checkbox" value="37" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_38">Currency</label><input id="display_field_38" name="display_fields[]" type="checkbox" value="38" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_39">Subscription Commence Date</label><input id="display_field_39" name="display_fields[]" type="checkbox" value="39" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_40">Subscription Renewal Date</label><input id="display_field_40" name="display_fields[]" type="checkbox" value="40" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_10">Work Experience (Include Header) </label><input id="display_group_10" name="display_groups[]" type="checkbox" value="10">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_41">Company</label><input id="display_field_41" name="display_fields[]" type="checkbox" value="41" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_42">Job Title</label><input id="display_field_42" name="display_fields[]" type="checkbox" value="42" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_43">From</label><input id="display_field_43" name="display_fields[]" type="checkbox" value="43" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_44">To</label><input id="display_field_44" name="display_fields[]" type="checkbox" value="44" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_45">Comment</label><input id="display_field_45" name="display_fields[]" type="checkbox" value="45" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_112">Duration</label><input id="display_field_112" name="display_fields[]" type="checkbox" value="112" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_11">Education (Include Header) </label><input id="display_group_11" name="display_groups[]" type="checkbox" value="11">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_47">Level</label><input id="display_field_47" name="display_fields[]" type="checkbox" value="47" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_48">Year</label><input id="display_field_48" name="display_fields[]" type="checkbox" value="48" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_49">Score</label><input id="display_field_49" name="display_fields[]" type="checkbox" value="49" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_115">Institute</label><input id="display_field_115" name="display_fields[]" type="checkbox" value="115" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_116">Major/Specialization</label><input id="display_field_116" name="display_fields[]" type="checkbox" value="116" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_117">Start Date</label><input id="display_field_117" name="display_fields[]" type="checkbox" value="117" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_118">End Date</label><input id="display_field_118" name="display_fields[]" type="checkbox" value="118" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_12">Skills (Include Header) </label><input id="display_group_12" name="display_groups[]" type="checkbox" value="12">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_52">Skill</label><input id="display_field_52" name="display_fields[]" type="checkbox" value="52" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_53">Years of Experience</label><input id="display_field_53" name="display_fields[]" type="checkbox" value="53" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_54">Comments</label><input id="display_field_54" name="display_fields[]" type="checkbox" value="54" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_13">Languages (Include Header) </label><input id="display_group_13" name="display_groups[]" type="checkbox" value="13">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_55">Language</label><input id="display_field_55" name="display_fields[]" type="checkbox" value="55" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_57">Competency</label><input id="display_field_57" name="display_fields[]" type="checkbox" value="57" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_58">Comments</label><input id="display_field_58" name="display_fields[]" type="checkbox" value="58" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_92">Fluency</label><input id="display_field_92" name="display_fields[]" type="checkbox" value="92" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_14">License (Include Header) </label><input id="display_group_14" name="display_groups[]" type="checkbox" value="14">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_59">License Type</label><input id="display_field_59" name="display_fields[]" type="checkbox" value="59" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_60">Issued Date</label><input id="display_field_60" name="display_fields[]" type="checkbox" value="60" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_61">Expiry Date</label><input id="display_field_61" name="display_fields[]" type="checkbox" value="61" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_119">License Number</label><input id="display_field_119" name="display_fields[]" type="checkbox" value="119" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_9">Supervisors (Include Header) </label><input id="display_group_9" name="display_groups[]" type="checkbox" value="9">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_62">First Name</label><input id="display_field_62" name="display_fields[]" type="checkbox" value="62" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_64">Last Name</label><input id="display_field_64" name="display_fields[]" type="checkbox" value="64" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_93">Reporting Method</label><input id="display_field_93" name="display_fields[]" type="checkbox" value="93" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_8">Subordinates (Include Header) </label><input id="display_group_8" name="display_groups[]" type="checkbox" value="8">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_63">First Name</label><input id="display_field_63" name="display_fields[]" type="checkbox" value="63" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_91">Last Name</label><input id="display_field_91" name="display_fields[]" type="checkbox" value="91" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_94">Reporting Method</label><input id="display_field_94" name="display_fields[]" type="checkbox" value="94" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_7">Salary (Include Header) </label><input id="display_group_7" name="display_groups[]" type="checkbox" value="7">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_65">Pay Grade</label><input id="display_field_65" name="display_fields[]" type="checkbox" value="65" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_66">Salary Component</label><input id="display_field_66" name="display_fields[]" type="checkbox" value="66" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_67">Amount</label><input id="display_field_67" name="display_fields[]" type="checkbox" value="67" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_68">Comments</label><input id="display_field_68" name="display_fields[]" type="checkbox" value="68" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_69">Pay Frequency</label><input id="display_field_69" name="display_fields[]" type="checkbox" value="69" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_70">Currency</label><input id="display_field_70" name="display_fields[]" type="checkbox" value="70" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_71">Direct Deposit Account Number</label><input id="display_field_71" name="display_fields[]" type="checkbox" value="71" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_72">Direct Deposit Account Type</label><input id="display_field_72" name="display_fields[]" type="checkbox" value="72" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_73">Direct Deposit Routing Number</label><input id="display_field_73" name="display_fields[]" type="checkbox" value="73" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_74">Direct Deposit Amount</label><input id="display_field_74" name="display_fields[]" type="checkbox" value="74" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_6">Job (Include Header) </label><input id="display_group_6" name="display_groups[]" type="checkbox" value="6">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_75">Contract Start Date</label><input id="display_field_75" name="display_fields[]" type="checkbox" value="75" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_76">Contract End Date</label><input id="display_field_76" name="display_fields[]" type="checkbox" value="76" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_77">Job Title</label><input id="display_field_77" name="display_fields[]" type="checkbox" value="77" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_78">Employment Status</label><input id="display_field_78" name="display_fields[]" type="checkbox" value="78" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_80">Job Category</label><input id="display_field_80" name="display_fields[]" type="checkbox" value="80" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_81">Joined Date</label><input id="display_field_81" name="display_fields[]" type="checkbox" value="81" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_82">Sub Unit</label><input id="display_field_82" name="display_fields[]" type="checkbox" value="82" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_83">Location</label><input id="display_field_83" name="display_fields[]" type="checkbox" value="83" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_113">Termination Date</label><input id="display_field_113" name="display_fields[]" type="checkbox" value="113" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_114">Termination Reason</label><input id="display_field_114" name="display_fields[]" type="checkbox" value="114" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_120">Termination Note</label><input id="display_field_120" name="display_fields[]" type="checkbox" value="120" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;"><a href="#" class="closeText">X</a>
                                        <label for="report_display_group_5">Immigration (Include Header) </label><input id="display_group_5" name="display_groups[]" type="checkbox" value="5">                    <ul class="display_field_ul">
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_84">Number</label><input id="display_field_84" name="display_fields[]" type="checkbox" value="84" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_85">Issued Date</label><input id="display_field_85" name="display_fields[]" type="checkbox" value="85" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_86">Expiry Date</label><input id="display_field_86" name="display_fields[]" type="checkbox" value="86" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_87">Eligibility Status</label><input id="display_field_87" name="display_fields[]" type="checkbox" value="87" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_88">Issued By</label><input id="display_field_88" name="display_fields[]" type="checkbox" value="88" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_89">Eligibility Review Date</label><input id="display_field_89" name="display_fields[]" type="checkbox" value="89" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_90">Comments</label><input id="display_field_90" name="display_fields[]" type="checkbox" value="90" style="display:none;">                        </li>
                                            <li style="display:none"><a href="#" class="closeText">X</a>
                                                <label for="report_display_field_95">Document Type</label><input id="display_field_95" name="display_fields[]" type="checkbox" value="95" style="display:none;">                        </li>
                                        </ul>
                                    </li>
                                    <li class="required line">
                                        <em>*</em> Required field                </li>
                                </ol>
                            </fieldset>


                            <div class="formbuttons">
                                <input type="button" id="btnSave" value="Save">
                                <input type="button" class="cancel" id="btnCancel" value="Cancel">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>