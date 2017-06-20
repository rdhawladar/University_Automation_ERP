<div class="row">
    <div class="col-md-12">
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
</div>