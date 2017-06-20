<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('trackers');?>
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

                    <div id="performanceTracker" class="box" style="display: none;">

                        <div class="head">
                            <h1 id="performanceTrackerHeading">Add Performance Tracker</h1>
                        </div>

                        <div class="inner">
                            <form name="frmaddPerformanceTracker" id="frmaddPerformanceTracker" method="post" action="/hrm/symfony/web/index.php/performance/addPerformanceTracker" novalidate="novalidate">

                                <input type="hidden" name="addPerformanceTracker[_csrf_token]" value="abe9909ddb1216ca2ce82e00cd82254a" id="addPerformanceTracker__csrf_token">            <input type="hidden" name="addPerformanceTracker[hdnTrckId]" id="addPerformanceTracker_hdnTrckId"><input type="hidden" name="addPerformanceTracker[hdnMode]" id="addPerformanceTracker_hdnMode"><input type="hidden" name="addPerformanceTracker[_csrf_token]" value="abe9909ddb1216ca2ce82e00cd82254a" id="addPerformanceTracker__csrf_token">
                                <fieldset>

                                    <ol>
                                        <li>
                                            <label for="addPerformanceTracker_tracker_name">Tracker Name <em>*</em></label>                        <input type="text" name="addPerformanceTracker[tracker_name]" class="formInput" maxlength="200" id="addPerformanceTracker_tracker_name">                    </li>
                                        <li>
                                            <label for="addPerformanceTracker_employeeName">Employee Name <em>*</em></label>

                                            <input type="text" name="addPerformanceTracker[employeeName][empName]" value="" class="formInput ac_input inputFormatHint" maxlength="52" id="addPerformanceTracker_employeeName_empName" autocomplete="off">

                                            <input type="hidden" name="addPerformanceTracker[employeeName][empId]" id="addPerformanceTracker_employeeName_empId" value="">
                                        </li>
                                        <p id="selectManyTable">
                                        </p><table border="0" width="45%" class="">
                                            <tbody>
                                            <tr>
                                                <td width="35%" style="font-weight:bold; height: 20px">
                                                    Available Reviewers                                    </td>
                                                <td width="30%"></td>
                                                <td width="35%"><span style="font-weight: bold">Assigned Reviewers</span><em style="color: #AA4935"> *</em></td>
                                            </tr>
                                            <tr><td>
                                                    <select name="addPerformanceTracker[availableEmp][]" class="selectMany" size="10" style="width: 100%" multiple="multiple" id="addPerformanceTracker_availableEmp">

                                                    </select>
                                                </td>
                                                <td align="center" style="vertical-align: middle">

                                                    <input type="button" style="width: 70%;" value="Add >" class="" id="btnAssignEmployee" name="btnAssignEmployee">
                                                    <br><br>
                                                    <input type="button" style="width: 70%;" value="< Remove" class="delete" id="btnRemoveEmployee" name="btnRemoveEmployee">

                                                </td>
                                                <td>
                                                    <select name="addPerformanceTracker[assignedEmp][]" class="selectMany" size="10" style="width: 100%" multiple="multiple" id="addPerformanceTracker_assignedEmp">

                                                    </select>                                    </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p></p>
                                        <li class="required">
                                            <em>*</em> Required field                    </li>
                                    </ol>

                                    <p>
                                        <input type="button" class="" name="btnSave" id="btnSave" value="Save">
                                        <input type="button" class="reset" name="btnCancel" id="btnCancel" value="Cancel">
                                    </p>

                                </fieldset>

                            </form>


                        </div>

                    </div>



                    <div class="box" id="search-results">

                        <div class="head"><h1>Performance Trackers</h1></div>

                        <div class="inner">







                            <form method="post" action="/hrm/symfony/web/index.php/performance/deletePerformanceTracker" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                                <input type="hidden" name="defaultList[_csrf_token]" value="bc8cffe93b9c2472bd57c7c34888ccd9" id="defaultList__csrf_token">
                                <div class="top">


                                    <input type="button" class="" id="btnAdd" name="btnAdd" value="Add">
                                    <input type="button" class="delete" id="btnDelete" name="btnDelete" value="Delete" data-toggle="modal" data-target="#deleteConfModal" disabled="disabled">

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
                                            <th rowspan="1" style="width:"><span class="headerCell">Employee</span></th>
                                            <th rowspan="1" style="width:"><span class="headerCell">Tracker</span></th>
                                            <th rowspan="1" style="width:15%"><span class="headerCell">Added Date</span></th>
                                            <th rowspan="1" style="width:15%"><span class="headerCell">Modified Date</span></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td colspan="5">No Records Found</td>
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
                <div id="performanceTracker" class="box" style="display: block;">

                    <div class="head">
                        <h1 id="performanceTrackerHeading">Add Performance Tracker</h1>
                    </div>

                    <div class="inner">
                        <form name="frmaddPerformanceTracker" id="frmaddPerformanceTracker" method="post" action="/hrm/symfony/web/index.php/performance/addPerformanceTracker" novalidate="novalidate">

                            <input type="hidden" name="addPerformanceTracker[_csrf_token]" value="abe9909ddb1216ca2ce82e00cd82254a" id="addPerformanceTracker__csrf_token">            <input type="hidden" name="addPerformanceTracker[hdnTrckId]" id="addPerformanceTracker_hdnTrckId"><input type="hidden" name="addPerformanceTracker[hdnMode]" id="addPerformanceTracker_hdnMode"><input type="hidden" name="addPerformanceTracker[_csrf_token]" value="abe9909ddb1216ca2ce82e00cd82254a" id="addPerformanceTracker__csrf_token">
                            <fieldset>

                                <ol>
                                    <li>
                                        <label for="addPerformanceTracker_tracker_name">Tracker Name <em>*</em></label>                        <input type="text" name="addPerformanceTracker[tracker_name]" class="formInput" maxlength="200" id="addPerformanceTracker_tracker_name">                    </li>
                                    <li>
                                        <label for="addPerformanceTracker_employeeName">Employee Name <em>*</em></label>

                                        <input type="text" name="addPerformanceTracker[employeeName][empName]" value="" class="formInput ac_input inputFormatHint" maxlength="52" id="addPerformanceTracker_employeeName_empName" autocomplete="off">

                                        <input type="hidden" name="addPerformanceTracker[employeeName][empId]" id="addPerformanceTracker_employeeName_empId" value="">
                                    </li>
                                    <p id="selectManyTable">
                                    </p><table border="0" width="45%" class="">
                                        <tbody>
                                        <tr>
                                            <td width="35%" style="font-weight:bold; height: 20px">
                                                Available Reviewers                                    </td>
                                            <td width="30%"></td>
                                            <td width="35%"><span style="font-weight: bold">Assigned Reviewers</span><em style="color: #AA4935"> *</em></td>
                                        </tr>
                                        <tr><td>
                                                <select name="addPerformanceTracker[availableEmp][]" class="selectMany" size="10" style="width: 100%" multiple="multiple" id="addPerformanceTracker_availableEmp">

                                                </select>
                                            </td>
                                            <td align="center" style="vertical-align: middle">

                                                <input type="button" style="width: 70%;" value="Add >" class="" id="btnAssignEmployee" name="btnAssignEmployee">
                                                <br><br>
                                                <input type="button" style="width: 70%;" value="< Remove" class="delete" id="btnRemoveEmployee" name="btnRemoveEmployee">

                                            </td>
                                            <td>
                                                <select name="addPerformanceTracker[assignedEmp][]" class="selectMany" size="10" style="width: 100%" multiple="multiple" id="addPerformanceTracker_assignedEmp">

                                                </select>                                    </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p></p>
                                    <li class="required">
                                        <em>*</em> Required field                    </li>
                                </ol>

                                <p>
                                    <input type="button" class="" name="btnSave" id="btnSave" value="Save">
                                    <input type="button" class="reset" name="btnCancel" id="btnCancel" value="Cancel">
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