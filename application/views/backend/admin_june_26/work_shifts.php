<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('work_shifts');?>
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


                    <div id="workShift" class="box" style="display:none">

                        <div class="head">
                            <h1 id="workShiftHeading">Work Shift</h1>
                        </div>

                        <div class="inner">



                            <form name="frmWorkShift" id="frmWorkShift" method="post" action="/hrm/symfony/web/index.php/admin/workShift" novalidate="novalidate">

                                <input type="hidden" name="workShift[_csrf_token]" value="e631e8c85d3034a180bc03be28ee1225" id="workShift__csrf_token">            <input type="hidden" name="workShift[workShiftId]" id="workShift_workShiftId"><input type="hidden" name="workShift[_csrf_token]" value="e631e8c85d3034a180bc03be28ee1225" id="workShift__csrf_token">
                                <fieldset>

                                    <ol>
                                        <li>
                                            <label for="workShift_name">Shift Name&nbsp;<em>*</em></label>                        <input maxlength="52" type="text" name="workShift[name]" id="workShift_name">                    </li>
                                        <li>
                                            <label for="workShift_workHours">Work Hours&nbsp;<em>*</em></label>                        <label for="workShift_workHours_from" class="time_range_label">From</label> <select id="workShift_workHours_from" class="timepicker" name="workShift[workHours][from]">
                                                <option value="" selected="selected"></option>
                                                <option value="00:00">00:00</option>
                                                <option value="00:15">00:15</option>
                                                <option value="00:30">00:30</option>
                                                <option value="00:45">00:45</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:15">01:15</option>
                                                <option value="01:30">01:30</option>
                                                <option value="01:45">01:45</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:15">02:15</option>
                                                <option value="02:30">02:30</option>
                                                <option value="02:45">02:45</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:15">03:15</option>
                                                <option value="03:30">03:30</option>
                                                <option value="03:45">03:45</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:15">04:15</option>
                                                <option value="04:30">04:30</option>
                                                <option value="04:45">04:45</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:15">05:15</option>
                                                <option value="05:30">05:30</option>
                                                <option value="05:45">05:45</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:15">06:15</option>
                                                <option value="06:30">06:30</option>
                                                <option value="06:45">06:45</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:15">07:15</option>
                                                <option value="07:30">07:30</option>
                                                <option value="07:45">07:45</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:15">08:15</option>
                                                <option value="08:30">08:30</option>
                                                <option value="08:45">08:45</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:15">09:15</option>
                                                <option value="09:30">09:30</option>
                                                <option value="09:45">09:45</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:15">10:15</option>
                                                <option value="10:30">10:30</option>
                                                <option value="10:45">10:45</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:15">11:15</option>
                                                <option value="11:30">11:30</option>
                                                <option value="11:45">11:45</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:15">12:15</option>
                                                <option value="12:30">12:30</option>
                                                <option value="12:45">12:45</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:15">13:15</option>
                                                <option value="13:30">13:30</option>
                                                <option value="13:45">13:45</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:15">14:15</option>
                                                <option value="14:30">14:30</option>
                                                <option value="14:45">14:45</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:15">15:15</option>
                                                <option value="15:30">15:30</option>
                                                <option value="15:45">15:45</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:15">16:15</option>
                                                <option value="16:30">16:30</option>
                                                <option value="16:45">16:45</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:15">17:15</option>
                                                <option value="17:30">17:30</option>
                                                <option value="17:45">17:45</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:15">18:15</option>
                                                <option value="18:30">18:30</option>
                                                <option value="18:45">18:45</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:15">19:15</option>
                                                <option value="19:30">19:30</option>
                                                <option value="19:45">19:45</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:15">20:15</option>
                                                <option value="20:30">20:30</option>
                                                <option value="20:45">20:45</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:15">21:15</option>
                                                <option value="21:30">21:30</option>
                                                <option value="21:45">21:45</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:15">22:15</option>
                                                <option value="22:30">22:30</option>
                                                <option value="22:45">22:45</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:15">23:15</option>
                                                <option value="23:30">23:30</option>
                                                <option value="23:45">23:45</option>
                                            </select> <label for="workShift_workHours_to" class="time_range_label">To</label> <select id="workShift_workHours_to" class="timepicker" name="workShift[workHours][to]">
                                                <option value="" selected="selected"></option>
                                                <option value="00:00">00:00</option>
                                                <option value="00:15">00:15</option>
                                                <option value="00:30">00:30</option>
                                                <option value="00:45">00:45</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:15">01:15</option>
                                                <option value="01:30">01:30</option>
                                                <option value="01:45">01:45</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:15">02:15</option>
                                                <option value="02:30">02:30</option>
                                                <option value="02:45">02:45</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:15">03:15</option>
                                                <option value="03:30">03:30</option>
                                                <option value="03:45">03:45</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:15">04:15</option>
                                                <option value="04:30">04:30</option>
                                                <option value="04:45">04:45</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:15">05:15</option>
                                                <option value="05:30">05:30</option>
                                                <option value="05:45">05:45</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:15">06:15</option>
                                                <option value="06:30">06:30</option>
                                                <option value="06:45">06:45</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:15">07:15</option>
                                                <option value="07:30">07:30</option>
                                                <option value="07:45">07:45</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:15">08:15</option>
                                                <option value="08:30">08:30</option>
                                                <option value="08:45">08:45</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:15">09:15</option>
                                                <option value="09:30">09:30</option>
                                                <option value="09:45">09:45</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:15">10:15</option>
                                                <option value="10:30">10:30</option>
                                                <option value="10:45">10:45</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:15">11:15</option>
                                                <option value="11:30">11:30</option>
                                                <option value="11:45">11:45</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:15">12:15</option>
                                                <option value="12:30">12:30</option>
                                                <option value="12:45">12:45</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:15">13:15</option>
                                                <option value="13:30">13:30</option>
                                                <option value="13:45">13:45</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:15">14:15</option>
                                                <option value="14:30">14:30</option>
                                                <option value="14:45">14:45</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:15">15:15</option>
                                                <option value="15:30">15:30</option>
                                                <option value="15:45">15:45</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:15">16:15</option>
                                                <option value="16:30">16:30</option>
                                                <option value="16:45">16:45</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:15">17:15</option>
                                                <option value="17:30">17:30</option>
                                                <option value="17:45">17:45</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:15">18:15</option>
                                                <option value="18:30">18:30</option>
                                                <option value="18:45">18:45</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:15">19:15</option>
                                                <option value="19:30">19:30</option>
                                                <option value="19:45">19:45</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:15">20:15</option>
                                                <option value="20:30">20:30</option>
                                                <option value="20:45">20:45</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:15">21:15</option>
                                                <option value="21:30">21:30</option>
                                                <option value="21:45">21:45</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:15">22:15</option>
                                                <option value="22:30">22:30</option>
                                                <option value="22:45">22:45</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:15">23:15</option>
                                                <option value="23:30">23:30</option>
                                                <option value="23:45">23:45</option>
                                            </select> <label class="time_range_label">Duration</label> <input disabled="disabled" type="text" class="time_range_duration" value="">                    </li>
                                        <p id="selectManyTable">
                                        </p><table border="0" width="45%" class="">
                                            <tbody>
                                            <tr>
                                                <td width="35%" style="font-weight:bold; height: 20px">
                                                    Available Employees                                    </td>
                                                <td width="30%"></td>
                                                <td width="35%" style="font-weight:bold;">Assigned Employees</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="workShift[availableEmp][]" class="selectMany" size="10" style="width: 100%" multiple="multiple" id="workShift_availableEmp">

                                                    </select>
                                                </td>
                                                <td align="center" style="vertical-align: middle">
                                                    <a href="#" class="" id="btnAssignEmployee">Add &gt;&gt;</a><br><br>
                                                    <a href="#" class="delete" id="btnRemoveEmployee">Remove &lt;&lt;</a>
                                                </td>
                                                <td>
                                                    <select name="workShift[assignedEmp][]" class="selectMany" size="10" style="width: 100%" multiple="multiple" id="workShift_assignedEmp">

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

                    <div id="customerList">
                        <div class="box" id="search-results">

                            <div class="head"><h1>Work Shifts</h1></div>

                            <div class="inner">







                                <form method="post" action="/hrm/symfony/web/index.php/admin/deleteWorkShifts" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                                <th rowspan="1" style="width:"><span class="headerCell">Shift Name</span></th>
                                                <th rowspan="1" style="width:"><span class="headerCell">From</span></th>
                                                <th rowspan="1" style="width:"><span class="headerCell">To</span></th>
                                                <th rowspan="1" style="width:"><span class="headerCell">Hours Per Day</span></th>
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
                <div id="workShift" class="box" style="">

                    <div class="head">
                        <h1 id="workShiftHeading">Add Work Shift</h1>
                    </div>

                    <div class="inner">



                        <form name="frmWorkShift" id="frmWorkShift" method="post" action="/hrm/symfony/web/index.php/admin/workShift" novalidate="novalidate">

                            <input type="hidden" name="workShift[_csrf_token]" value="e631e8c85d3034a180bc03be28ee1225" id="workShift__csrf_token">            <input type="hidden" name="workShift[workShiftId]" id="workShift_workShiftId" value=""><input type="hidden" name="workShift[_csrf_token]" value="e631e8c85d3034a180bc03be28ee1225" id="workShift__csrf_token">
                            <fieldset>

                                <ol>
                                    <li>
                                        <label for="workShift_name">Shift Name&nbsp;<em>*</em></label>                        <input maxlength="52" type="text" name="workShift[name]" id="workShift_name">                    </li>
                                    <li>
                                        <label for="workShift_workHours">Work Hours&nbsp;<em>*</em></label>                        <label for="workShift_workHours_from" class="time_range_label">From</label> <select id="workShift_workHours_from" class="timepicker valid" name="workShift[workHours][from]">
                                            <option value="" selected="selected"></option>
                                            <option value="00:00">00:00</option>
                                            <option value="00:15">00:15</option>
                                            <option value="00:30">00:30</option>
                                            <option value="00:45">00:45</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:15">01:15</option>
                                            <option value="01:30">01:30</option>
                                            <option value="01:45">01:45</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:15">02:15</option>
                                            <option value="02:30">02:30</option>
                                            <option value="02:45">02:45</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:15">03:15</option>
                                            <option value="03:30">03:30</option>
                                            <option value="03:45">03:45</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:15">04:15</option>
                                            <option value="04:30">04:30</option>
                                            <option value="04:45">04:45</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:15">05:15</option>
                                            <option value="05:30">05:30</option>
                                            <option value="05:45">05:45</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:15">06:15</option>
                                            <option value="06:30">06:30</option>
                                            <option value="06:45">06:45</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:15">07:15</option>
                                            <option value="07:30">07:30</option>
                                            <option value="07:45">07:45</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:15">08:15</option>
                                            <option value="08:30">08:30</option>
                                            <option value="08:45">08:45</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:15">09:15</option>
                                            <option value="09:30">09:30</option>
                                            <option value="09:45">09:45</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:15">10:15</option>
                                            <option value="10:30">10:30</option>
                                            <option value="10:45">10:45</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:15">11:15</option>
                                            <option value="11:30">11:30</option>
                                            <option value="11:45">11:45</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:15">12:15</option>
                                            <option value="12:30">12:30</option>
                                            <option value="12:45">12:45</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:15">13:15</option>
                                            <option value="13:30">13:30</option>
                                            <option value="13:45">13:45</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:15">14:15</option>
                                            <option value="14:30">14:30</option>
                                            <option value="14:45">14:45</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:15">15:15</option>
                                            <option value="15:30">15:30</option>
                                            <option value="15:45">15:45</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:15">16:15</option>
                                            <option value="16:30">16:30</option>
                                            <option value="16:45">16:45</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:15">17:15</option>
                                            <option value="17:30">17:30</option>
                                            <option value="17:45">17:45</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:15">18:15</option>
                                            <option value="18:30">18:30</option>
                                            <option value="18:45">18:45</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:15">19:15</option>
                                            <option value="19:30">19:30</option>
                                            <option value="19:45">19:45</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:15">20:15</option>
                                            <option value="20:30">20:30</option>
                                            <option value="20:45">20:45</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:15">21:15</option>
                                            <option value="21:30">21:30</option>
                                            <option value="21:45">21:45</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:15">22:15</option>
                                            <option value="22:30">22:30</option>
                                            <option value="22:45">22:45</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:15">23:15</option>
                                            <option value="23:30">23:30</option>
                                            <option value="23:45">23:45</option>
                                        </select> <label for="workShift_workHours_to" class="time_range_label">To</label> <select id="workShift_workHours_to" class="timepicker valid" name="workShift[workHours][to]">
                                            <option value="" selected="selected"></option>
                                            <option value="00:00">00:00</option>
                                            <option value="00:15">00:15</option>
                                            <option value="00:30">00:30</option>
                                            <option value="00:45">00:45</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:15">01:15</option>
                                            <option value="01:30">01:30</option>
                                            <option value="01:45">01:45</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:15">02:15</option>
                                            <option value="02:30">02:30</option>
                                            <option value="02:45">02:45</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:15">03:15</option>
                                            <option value="03:30">03:30</option>
                                            <option value="03:45">03:45</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:15">04:15</option>
                                            <option value="04:30">04:30</option>
                                            <option value="04:45">04:45</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:15">05:15</option>
                                            <option value="05:30">05:30</option>
                                            <option value="05:45">05:45</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:15">06:15</option>
                                            <option value="06:30">06:30</option>
                                            <option value="06:45">06:45</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:15">07:15</option>
                                            <option value="07:30">07:30</option>
                                            <option value="07:45">07:45</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:15">08:15</option>
                                            <option value="08:30">08:30</option>
                                            <option value="08:45">08:45</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:15">09:15</option>
                                            <option value="09:30">09:30</option>
                                            <option value="09:45">09:45</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:15">10:15</option>
                                            <option value="10:30">10:30</option>
                                            <option value="10:45">10:45</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:15">11:15</option>
                                            <option value="11:30">11:30</option>
                                            <option value="11:45">11:45</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:15">12:15</option>
                                            <option value="12:30">12:30</option>
                                            <option value="12:45">12:45</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:15">13:15</option>
                                            <option value="13:30">13:30</option>
                                            <option value="13:45">13:45</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:15">14:15</option>
                                            <option value="14:30">14:30</option>
                                            <option value="14:45">14:45</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:15">15:15</option>
                                            <option value="15:30">15:30</option>
                                            <option value="15:45">15:45</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:15">16:15</option>
                                            <option value="16:30">16:30</option>
                                            <option value="16:45">16:45</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:15">17:15</option>
                                            <option value="17:30">17:30</option>
                                            <option value="17:45">17:45</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:15">18:15</option>
                                            <option value="18:30">18:30</option>
                                            <option value="18:45">18:45</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:15">19:15</option>
                                            <option value="19:30">19:30</option>
                                            <option value="19:45">19:45</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:15">20:15</option>
                                            <option value="20:30">20:30</option>
                                            <option value="20:45">20:45</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:15">21:15</option>
                                            <option value="21:30">21:30</option>
                                            <option value="21:45">21:45</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:15">22:15</option>
                                            <option value="22:30">22:30</option>
                                            <option value="22:45">22:45</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:15">23:15</option>
                                            <option value="23:30">23:30</option>
                                            <option value="23:45">23:45</option>
                                        </select> <label class="time_range_label">Duration</label> <input disabled="disabled" type="text" class="time_range_duration" value="">                    </li>
                                    <p id="selectManyTable">
                                    </p><table border="0" width="45%" class="">
                                        <tbody>
                                        <tr>
                                            <td width="35%" style="font-weight:bold; height: 20px">
                                                Available Employees                                    </td>
                                            <td width="30%"></td>
                                            <td width="35%" style="font-weight:bold;">Assigned Employees</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="workShift[availableEmp][]" class="selectMany" size="10" style="width: 100%" multiple="multiple" id="workShift_availableEmp">

                                                </select>
                                            </td>
                                            <td align="center" style="vertical-align: middle">
                                                <a href="#" class="" id="btnAssignEmployee">Add &gt;&gt;</a><br><br>
                                                <a href="#" class="delete" id="btnRemoveEmployee">Remove &lt;&lt;</a>
                                            </td>
                                            <td>
                                                <select name="workShift[assignedEmp][]" class="selectMany" size="10" style="width: 100%" multiple="multiple" id="workShift_assignedEmp">

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