<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('employee_list');?>
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


                    <div class="box searchForm toggableForm" id="employee-information">
                        <div class="head">
                            <h1>Employee Information</h1>
                        </div>
                        <div class="inner">
                            <form id="search_form" name="frmEmployeeSearch" method="post" action="/hrm/symfony/web/index.php/pim/viewEmployeeList">

                                <fieldset>

                                    <ol>
                                        <li><label for="empsearch_employee_name">Employee Name</label>


                                            <input type="text" name="empsearch[employee_name][empName]" value="" id="empsearch_employee_name_empName" class="ac_input inputFormatHint" autocomplete="off">

                                            <input type="hidden" name="empsearch[employee_name][empId]" id="empsearch_employee_name_empId" value="">
                                        </li>
                                        <li><label for="empsearch_id">Id</label>
                                            <input type="text" name="empsearch[id]" id="empsearch_id" class="inputFormatHint">
                                        </li>
                                        <li><label for="empsearch_employee_status">Employment Status</label>
                                            <select name="empsearch[employee_status]" id="empsearch_employee_status">
                                                <option value="0">All</option>
                                            </select>
                                        </li>
                                        <li><label for="empsearch_termination">Include</label>
                                            <select name="empsearch[termination]" id="empsearch_termination">
                                                <option value="1">Current Employees Only</option>
                                                <option value="2">Current and Past Employees</option>
                                                <option value="3">Past Employees Only</option>
                                            </select>
                                        </li>
                                        <li><label for="empsearch_supervisor_name">Supervisor Name</label>
                                            <input type="text" name="empsearch[supervisor_name]" id="empsearch_supervisor_name" class="inputFormatHint ac_input" autocomplete="off">
                                        </li>
                                        <li><label for="empsearch_job_title">Job Title</label>
                                            <select name="empsearch[job_title]" id="empsearch_job_title">
                                                <option value="0">All</option>
                                            </select>
                                        </li>
                                        <li><label for="empsearch_sub_unit">Sub Unit</label>
                                            <select name="empsearch[sub_unit]" id="empsearch_sub_unit">
                                                <option value="0">All</option>
                                            </select>
                                            <input type="hidden" name="empsearch[isSubmitted]" id="empsearch_isSubmitted">
                                            <input type="hidden" name="empsearch[_csrf_token]" value="ef5ce379e0ce0bd421a24e99ea3b80de" id="empsearch__csrf_token"></li>
                                    </ol>

                                    <input type="hidden" name="pageNo" id="pageNo" value="">
                                    <input type="hidden" name="hdnAction" id="hdnAction" value="search">

                                    <p>
                                        <input type="button" id="searchBtn" value="Search" name="_search">
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
                                            <th rowspan="1" style="width:5%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/pim/viewEmployeeList?sortField=employeeId&amp;sortOrder=ASC" class="null">Id</a></th>
                                            <th rowspan="1" style="width:13%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/pim/viewEmployeeList?sortField=firstMiddleName&amp;sortOrder=ASC" class="null">First (&amp; Middle) Name</a></th>
                                            <th rowspan="1" style="width:10%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/pim/viewEmployeeList?sortField=lastName&amp;sortOrder=ASC" class="null">Last Name</a></th>
                                            <th rowspan="1" style="width:20%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/pim/viewEmployeeList?sortField=jobTitle&amp;sortOrder=ASC" class="null">Job Title</a></th>
                                            <th rowspan="1" style="width:15%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/pim/viewEmployeeList?sortField=employeeStatus&amp;sortOrder=ASC" class="null">Employment Status</a></th>
                                            <th rowspan="1" style="width:15%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/pim/viewEmployeeList?sortField=subDivision&amp;sortOrder=ASC" class="null">Sub Unit</a></th>
                                            <th rowspan="1" style="width:25%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/pim/viewEmployeeList?sortField=supervisor&amp;sortOrder=ASC" class="null">Supervisor</a></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td colspan="8">No Records Found</td>
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
                    <!-- Confirmation box HTML: Ends -->
          </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box">


                    <div class="head">
                        <h1>Add Employee</h1>
                    </div>

                    <div class="inner" id="addEmployeeTbl">




                        <form id="frmAddEmp" method="post" action="/hrm/symfony/web/index.php/pim/addEmployee" enctype="multipart/form-data" novalidate="novalidate">
                            <fieldset>
                                <ol>
                                    <li class="line nameContainer"><label class="hasTopFieldHelp">Full Name</label><ol class="fieldsInLine"><li><div class="fieldDescription"><em>*</em> First Name</div>
                                                <input class="formInputText" maxlength="30" type="text" name="firstName" id="firstName">
                                            </li>
                                            <li><div class="fieldDescription">Middle Name</div>
                                                <input class="formInputText" maxlength="30" type="text" name="middleName" id="middleName">
                                            </li>
                                            <li><div class="fieldDescription"><em>*</em> Last Name</div>
                                                <input class="formInputText" maxlength="30" type="text" name="lastName" id="lastName">
                                            </li>
                                        </ol>
                                    </li><li><label for="employeeId">Employee Id</label>
                                        <input class="formInputText" maxlength="10" type="text" name="employeeId" value="0001" id="employeeId">
                                    </li>
                                    <li><label for="photofile">Photograph</label>
                                        <input class="duplexBox" type="file" name="photofile" id="photofile"><label class="fieldHelpBottom">Accepts jpg, .png, .gif up to 1MB. Recommended dimensions: 200px X 200px</label>
                                    </li>
                                    <li><label for="chkLogin">Create Login Details</label>
                                        <input type="checkbox" name="chkLogin" value="1" id="chkLogin">
                                    </li>
                                    <li class="loginSection" style="display: none;"><label for="user_name">User Name<em> *</em></label>
                                        <input class="formInputText" maxlength="40" type="text" name="user_name" id="user_name">
                                    </li>
                                    <li class="loginSection" style="display: none;"><label for="user_password">Password<em id="password_required" style="display: none;"> *</em></label>
                                        <input class="formInputText passwordRequired" maxlength="20" type="password" name="user_password" id="user_password">
                                    </li>
                                    <li class="loginSection" style="display: none;"><label for="re_password">Confirm Password<em id="rePassword_required" style="display: none;"> *</em></label>
                                        <input class="formInputText passwordRequired" maxlength="20" type="password" name="re_password" id="re_password">
                                    </li>
                                    <li class="loginSection" style="display: none;"><label for="status">Status<em> *</em></label>
                                        <select class="formInputText" name="status" id="status">
                                            <option value="Enabled" selected="selected">Enabled</option>
                                            <option value="Disabled">Disabled</option>
                                        </select>
                                        <input type="hidden" name="empNumber" value="0001" id="empNumber">
                                        <input type="hidden" name="_csrf_token" value="8a6d52e5f2d29ae61ef2402352bb785e" id="csrf_token"></li>
                                    <li class="required">
                                        <em>*</em> Required field                    </li>
                                </ol>
                                <p>
                                    <input type="button" class="" id="btnSave" value="Save">
                                </p>
                            </fieldset>
                        </form>
                    </div>


                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>