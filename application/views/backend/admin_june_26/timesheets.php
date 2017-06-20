<div class="row">
    <div class="col-md-12">
        <div id="content">


            <div class="box">
                <div class="head">
                    <h1>Select Employee</h1>
                </div>
                <div class="inner">
                    <form action="/hrm/symfony/web/index.php/time/viewEmployeeTimesheet" id="employeeSelectForm" name="employeeSelectForm" method="post" novalidate="novalidate">
                        <input type="hidden" name="time[employeeId]" value="23" id="time_employeeId"><input type="hidden" name="time[_csrf_token]" value="2675e0b6f5134e058a1263bbc1ebd074" id="time__csrf_token">            <fieldset>
                            <ol>
                                <li>
                                    <label for="time_employeeName">Employee Name <em>*</em></label>                        <input class="inputFormatHint ac_input" id="employee" type="text" name="time[employeeName]" value="Type for hints..." autocomplete="off">                                            </li>
                                <li class="required">
                                    <em>*</em> Required field                    </li>
                            </ol>
                            <p>
                                <input type="button" class="" id="btnView" value="View">
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>