<div class="row">
    <div class="col-md-12">
        <div id="content">



            <div class="box searchForm" id="leave-balance-report">
                <div class="head">
                    <h1>Leave Entitlements and Usage Report</h1>
                </div>
                <div class="inner">



                    <form id="frmLeaveBalanceReport" name="frmLeaveBalanceReport" method="post" action="" novalidate="novalidate">

                        <fieldset>
                            <ol>
                                <li><label for="leave_balance_report_type">Generate For<em> *</em></label>
                                    <select name="leave_balance[report_type]" id="leave_balance_report_type">
                                        <option value="0">-- Select --</option>
                                        <option value="1">Leave Type</option>
                                        <option value="2">Employee</option>
                                    </select>
                                </li>
                                <li style="display: none;"><label for="leave_balance_employee">Employee<em> *</em></label>


                                    <input type="text" name="leave_balance[employee][empName]" value="" id="leave_balance_employee_empName" class="ac_input inputFormatHint" autocomplete="off" style="width: 184px;">

                                    <input type="hidden" name="leave_balance[employee][empId]" id="leave_balance_employee_empId" value="">
                                </li>
                                <li style="display: none;"><label for="leave_balance_leave_type">Leave Type</label>
                                    <select name="leave_balance[leave_type]" id="leave_balance_leave_type">
                                        <option value="" selected="selected">No leave types defined</option>
                                    </select>
                                </li>
                                <li style="display: none;"><label for="leave_balance_date">From</label>
                                    <select id="period">
                                        <option value="2016-01-01$$2016-12-31">2016-01-01 - 2016-12-31</option>
                                        <option value="2017-01-01$$2017-12-31">2017-01-01 - 2017-12-31</option>
                                    </select> <input id="date_from" type="hidden" name="leave_balance[date][from]" value="2016-01-01">  <input id="date_to" type="hidden" name="leave_balance[date][to]" value="2016-12-31">
                                </li>
                                <li style="display: none;"><label for="leave_balance_job_title">Job Title</label>
                                    <select name="leave_balance[job_title]" id="leave_balance_job_title">
                                        <option value="0">All</option>
                                    </select>
                                </li>
                                <li style="display: none;"><label for="leave_balance_location">Location</label>
                                    <select class="selectableGroupWidget" name="leave_balance[location]" id="leave_balance_location">
                                        <option value="-1">All</option>
                                    </select>
                                </li>
                                <li style="display: none;"><label for="leave_balance_sub_unit">Sub Unit</label>
                                    <select name="leave_balance[sub_unit]" value="0" selected="selected" id="leave_balance_sub_unit">
                                        <option value="0" selected="selected">All</option>
                                    </select>
                                </li>
                                <li style="display: none;"><label for="leave_balance_include_terminated">Include Past Employees</label>
                                    <input type="checkbox" name="leave_balance[include_terminated]" value="on" id="leave_balance_include_terminated">
                                    <input type="hidden" name="leave_balance[_csrf_token]" value="061d53510a9fffcfe70b6ff0f8cdec41" id="leave_balance__csrf_token"></li>
                                <li class="required">
                                    <em>*</em> Required field                    </li>
                            </ol>
                            <p>
                                <input type="button" name="view" id="viewBtn" value="View" style="display: none;">
                            </p>
                        </fieldset>
                    </form>
                </div> <!-- inner -->
            </div>
        </div>
    </div>
</div>