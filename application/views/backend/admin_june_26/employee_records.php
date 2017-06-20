<div class="row">
    <div class="col-md-12">
        <div id="content">
            <div class="box">

                <div class="head">
                    <h1>View Attendance Record</h1>
                </div>

                <div class="inner">

                    <div id="validationMsg">
                    </div>

                    <form action="/hrm/symfony/web/index.php/attendance/viewAttendanceRecord" id="reportForm" method="post" name="frmAttendanceReport">
                        <fieldset>
                            <ol>
                                <li><label for="attendance_employeeName">Employee Name</label>


                                    <input class="formInputText inputFormatHint ac_input" type="text" name="attendance[employeeName][empName]" value="" id="attendance_employeeName_empName" autocomplete="off">

                                    <input type="hidden" name="attendance[employeeName][empId]" id="attendance_employeeName_empId" value="">
                                </li>
                                <li><label for="attendance_date">Date <em> *</em></label>
                                    <input id="attendance_date" type="text" name="attendance[date]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                    <input type="hidden" name="attendance[_csrf_token]" value="6415fbcd1e2fcd14a2c7436dbcac8810" id="attendance__csrf_token"></li>
                                <input type="hidden" name="attendance[_csrf_token]" value="6415fbcd1e2fcd14a2c7436dbcac8810" id="attendance__csrf_token">

                                <li class="required">
                                    <em>*</em> Required field                    </li>
                            </ol>
                            <p class="formbuttons">
                                <input type="button" class="" id="btView" value="View">
                                <input type="hidden" name="pageNo" id="pageNo" value="">
                                <input type="hidden" name="hdnAction" id="hdnAction" value="search">
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div id="recordsTable">
                <div id="msg"></div>
                <div class="box noHeader" id="search-results">


                    <div class="inner">




                        <form method="post" action="#" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                            <input type="hidden" name="defaultList[_csrf_token]" value="43cebe94d6e39e72c1b16a82ff436a09" id="defaultList__csrf_token">





                            <div id="helpText" class="helpText"></div>

                            <div id="scrollWrapper">
                                <div id="scrollContainer">
                                </div>
                            </div>
                            <div id="tableWrapper">
                                <table class="table hover" id="resultTable">

                                    <thead>
                                    <tr><th rowspan="1" style="width:20%"><span class="headerCell">Employee Name</span></th>
                                        <th rowspan="1" style="width:20%"><span class="headerCell">Punch In</span></th>
                                        <th rowspan="1" style="width:15%"><span class="headerCell">Punch In Note</span></th>
                                        <th rowspan="1" style="width:20%"><span class="headerCell">Punch Out</span></th>
                                        <th rowspan="1" style="width:15%"><span class="headerCell">Punch Out Note</span></th>
                                        <th rowspan="1" style="width:5%"><span class="headerCell">Duration(Hours)</span></th>
                                        <th rowspan="1" style="width:5%"><span class="headerCell">Total</span></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td colspan="7">No Records Found</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div> <!-- tableWrapper -->
                        </form> <!-- frmList_ohrmListComponent -->


                    </div> <!-- inner -->

                </div> <!-- search-results -->
            </div>

            <div id="punchInOut">

            </div>

            <!-- Confirmation box HTML: Begins -->
            <div class="modal hide" id="dialogBox">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>OrangeHRM - Confirmation Required</h3>
                </div>
                <div class="modal-body">
                    <p>Delete records?</p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" data-dismiss="modal" id="okBtn" value="Ok">
                    <input type="button" class="btn reset" data-dismiss="modal" value="Cancel">
                </div>
            </div>
            <!-- Confirmation box HTML: Ends -->
          </div>
    </div>
</div>