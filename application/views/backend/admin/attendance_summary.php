<div class="row">
    <div class="col-md-12">
        <div id="content">

            <div class="box" id="attendance-summary">
                <div class="head"><h1>Attendance Total Summary Report</h1></div>
                <div class="inner">




                    <form action="/hrm/symfony/web/index.php/time/displayAttendanceSummaryReport/reportId/4" id="attendanceTotalSummaryReportForm" method="post">

                        <fieldset>
                            <ol>

                                <li>
                                    <label>Employee Name <em>*</em></label>
                                    <input id="employee_name" type="text" name="attendanceTotalSummary[empName]">
                                </li>

                                <li>
                                    <label>Job Title</label>
                                    <select name="attendanceTotalSummary[jobTitle]" id="attendanceTotalSummary_jobTitle">
                                        <option value="0">All</option>
                                    </select>                    </li>

                                <li>
                                    <label>Sub Unit</label>
                                    <select name="attendanceTotalSummary[subUnit]" id="attendanceTotalSummary_subUnit">
                                        <option value="0">All</option>
                                    </select>                    </li>

                                <li>
                                    <label>Employment Status</label>
                                    <select name="attendanceTotalSummary[employeeStatus]" id="attendanceTotalSummary_employeeStatus">
                                        <option value="0">All</option>
                                    </select>                    </li>
                                <li>
                                    <label>From</label>
                                    <input id="from_date" type="text" name="attendanceTotalSummary[fromDate]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                </li>
                                <li>
                                    <label>To</label>
                                    <input id="to_date" type="text" name="attendanceTotalSummary[toDate]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                </li>

                                <li class="required">
                                    <em>*</em> Required field                    </li>

                            </ol>

                            <p>
                                <input type="submit" id="viewbutton" value="View">

                            </p>



                            <input type="hidden" name="attendanceTotalSummary[employeeId]" id="attendanceTotalSummary_employeeId"><input type="hidden" name="attendanceTotalSummary[_csrf_token]" value="1088ce5bf1d841bd8c2fd5ae52b86c5b" id="attendanceTotalSummary__csrf_token">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>