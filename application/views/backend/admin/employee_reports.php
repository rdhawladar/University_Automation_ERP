<div class="row">
    <div class="col-md-12">
        <div id="content">

            <div class="box">
                <div class="head"><h1 id="reportToHeading">Employee Report</h1></div>
                <div class="inner">



                    <form action="/hrm/symfony/web/index.php/time/displayEmployeeReportCriteria/reportId/2" id="reportForm" method="post" novalidate="novalidate">
                        <fieldset>
                            <ol>
                                <input type="hidden" name="time[_csrf_token]" value="51ccf175131af72b4d624102160ac0b4" id="time__csrf_token">                <li>
                                    <label for="time_employee">Employee<span class="required"> * </span></label>                    <input id="employee_empId" required="true" type="hidden" name="time[employee][empId]" value=""><input id="employee_empName" required="true" type="text" name="time[employee][empName]" value="" class="inputFormatHint ac_input" autocomplete="off">
                                </li>
                                <input type="hidden" name="time[_csrf_token]" value="51ccf175131af72b4d624102160ac0b4" id="time__csrf_token">                <li>
                                    <label for="time_project_name">Project Name<span class="required"> * </span></label>                    <select id="project_name" required="true" name="time[project_name]">

                                    </select>                </li>
                                <input type="hidden" name="time[_csrf_token]" value="51ccf175131af72b4d624102160ac0b4" id="time__csrf_token">                <li>
                                    <label for="time_activity_name">Activity Name<span class="required"> * </span></label>                    <select id="time_activity_name" required="true" name="time[activity_name]" value="">
                                        <option id="activity_name" required="true" value="">--No Project Activities--</option>
                                    </select>                </li>
                                <input type="hidden" name="time[_csrf_token]" value="51ccf175131af72b4d624102160ac0b4" id="time__csrf_token">                <li>
                                    <label for="time_project_date_range">Project Date Range</label>                    <label class="sublabel1">From</label><input id="project_date_range_from_date" type="text" name="time[project_date_range][from]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title=""><label class="sublabel2">To</label><input id="project_date_range_to_date" type="text" name="time[project_date_range][to]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                    </li>
                                <input type="hidden" name="time[_csrf_token]" value="51ccf175131af72b4d624102160ac0b4" id="time__csrf_token">                <li>
                                    <label for="time_only_include_approved_timesheets">Only Include Approved Timesheets</label>                    <input id="only_include_approved_timesheets" type="checkbox" name="time[only_include_approved_timesheets]">                </li>
                                <li class="required">
                                    <em>*</em> Required field                </li>

                            </ol>
                            <p>
                                <input type="button" id="viewbutton" value="View">
                            </p>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>