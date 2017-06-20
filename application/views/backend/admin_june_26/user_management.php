<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('user_management');?>
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



                    <div id="systemUser-information" class="box searchForm toggableForm">
                        <div class="head">
                            <h1>System Users</h1>
                        </div>



                        <div class="inner">
                            <form id="search_form" name="frmUserSearch" method="post" action="/hrm/symfony/web/index.php/admin/viewSystemUsers">

                                <fieldset>

                                    <ol>
                                        <li><label for="searchSystemUser_userName">Username</label>
                                            <input type="text" name="searchSystemUser[userName]" id="searchSystemUser_userName">
                                        </li>
                                        <li><label for="searchSystemUser_userType">User Role</label>
                                            <select name="searchSystemUser[userType]" id="searchSystemUser_userType">
                                                <option value="0">All</option>
                                                <option value="1">Admin</option>
                                                <option value="2">ESS</option>
                                            </select>
                                        </li>
                                        <li><label for="searchSystemUser_employeeName">Employee Name</label>


                                            <input type="text" name="searchSystemUser[employeeName][empName]" value="" id="searchSystemUser_employeeName_empName" class="inputFormatHint ac_input" autocomplete="off">

                                            <input type="hidden" name="searchSystemUser[employeeName][empId]" id="searchSystemUser_employeeName_empId" value="">




                                        </li>
                                        <li><label for="searchSystemUser_status">Status</label>
                                            <select name="searchSystemUser[status]" id="searchSystemUser_status">
                                                <option value="" selected="selected">All</option>
                                                <option value="1">Enabled</option>
                                                <option value="0">Disabled</option>
                                            </select>
                                            <input type="hidden" name="searchSystemUser[_csrf_token]" value="6415228db229a8d31b7501ee9ccd3888" id="searchSystemUser__csrf_token"></li>
                                    </ol>

                                    <input type="hidden" name="pageNo" id="pageNo" value="">
                                    <input type="hidden" name="hdnAction" id="hdnAction" value="search">

                                    <p>
                                        <input type="button" class="searchbutton" id="searchBtn" value="Search" name="_search">
                                        <input type="button" class="reset" id="resetBtn" value="Reset" name="_reset">
                                    </p>

                                </fieldset>

                            </form>
                        </div> <!-- inner -->

                        <a href="#" class="toggle tiptip">&gt;</a>

                    </div> <!-- end-of-searchProject -->

                    <div id="customerList">
                        <div class="box noHeader" id="search-results">


                            <div class="inner">




                                <form method="post" action="/hrm/symfony/web/index.php/admin/deleteSystemUsers" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                                <th rowspan="1" style="width:33%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/admin/viewSystemUsers?sortField=user_name&amp;sortOrder=ASC" class="null">Username</a></th>
                                                <th rowspan="1" style="width:20%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/admin/viewSystemUsers?sortField=display_name&amp;sortOrder=ASC" class="null">User Role</a></th>
                                                <th rowspan="1" style="width:33%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/admin/viewSystemUsers?sortField=u.Employee.emp_firstname&amp;sortOrder=ASC" class="null">Employee Name</a></th>
                                                <th rowspan="1" style="width:14%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/admin/viewSystemUsers?sortField=status&amp;sortOrder=ASC" class="null">Status</a></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr class="odd">
                                                <td>&nbsp;</td>                                <td class="left"><a href="saveSystemUser?userId=1">admin</a></td>
                                                <td class="left">Admin</td>
                                                <td class="left"></td>
                                                <td class="left">Enabled</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- tableWrapper -->
                                </form> <!-- frmList_ohrmListComponent -->


                            </div> <!-- inner -->

                        </div> <!-- search-results -->


                    </div>

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
                <div class="box-content">
                    <div id="systemUser" class="box">

                        <div class="head">
                            <h1 id="UserHeading">Add User</h1>
                        </div>

                        <div class="inner">





                            <form name="frmSystemUser" id="frmSystemUser" method="post" action="">

                                <fieldset>

                                    <ol>
                                        <li><label for="systemUser_userType">User Role<em> *</em></label>
                                            <select class="formSelect" maxlength="3" name="systemUser[userType]" id="systemUser_userType">
                                                <option value="1">Admin</option>
                                                <option value="2" selected="selected">ESS</option>
                                            </select>
                                        </li>
                                        <li><label for="systemUser_employeeName">Employee Name<em> *</em></label>


                                            <input class="formInputText inputFormatHint ac_input" maxlength="200" value="Type for hints..." type="text" name="systemUser[employeeName][empName]" id="systemUser_employeeName_empName" autocomplete="off">

                                            <input type="hidden" name="systemUser[employeeName][empId]" id="systemUser_employeeName_empId" value="">

                                        </li>
                                        <li><label for="systemUser_userName">Username<em> *</em></label>
                                            <input class="formInputText" maxlength="40" type="text" name="systemUser[userName]" id="systemUser_userName">
                                        </li>
                                        <li><label for="systemUser_status">Status<em> *</em></label>
                                            <select class="formSelect" maxlength="3" name="systemUser[status]" id="systemUser_status">
                                                <option value="1">Enabled</option>
                                                <option value="0">Disabled</option>
                                            </select>
                                        </li>
                                        <li class="checkChangePassword" style="display: none;"><label for="systemUser_chkChangePassword">Change Password</label>
                                            <input class="chkChangePassword" value="on" type="checkbox" name="systemUser[chkChangePassword]" id="systemUser_chkChangePassword">
                                        </li>
                                        <li class="passwordDiv"><label for="systemUser_password">Password<em class="passwordRequired" style="display: none;"> *</em></label>
                                            <input class="formInputText password" maxlength="20" type="password" name="systemUser[password]" id="systemUser_password"><label class="score"></label>
                                        </li>
                                        <li class="passwordDiv"><label for="systemUser_confirmPassword">Confirm Password<em class="passwordRequired" style="display: none;"> *</em></label>
                                            <input class="formInputText password" maxlength="20" type="password" name="systemUser[confirmPassword]" id="systemUser_confirmPassword">
                                            <input type="hidden" name="systemUser[userId]" id="systemUser_userId">
                                            <input type="hidden" name="systemUser[_csrf_token]" value="30cbbfca1d12c7da274c43bfca4de3b1" id="systemUser__csrf_token"></li>

                                        <li class="required">
                                            <em>*</em> Required field                    </li>
                                    </ol>

                                    <p>
                                        <input type="button" class="addbutton" name="btnSave" id="btnSave" value="Save">
                                        <input type="button" class="reset" name="btnCancel" id="btnCancel" value="Cancel">
                                    </p>

                                </fieldset>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>