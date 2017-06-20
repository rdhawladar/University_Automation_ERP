<div class="row">
    <div class="col-md-12">
        <div id="content">


            <style type="text/css">
                form#search_form li:nth-child(3) {
                    width: auto;
                    margin-right: 10px;
                }


            </style>



            <div class="box searchForm toggableForm" id="leave-entitlementsSearch">
                <div class="head">
                    <h1>Leave Entitlements</h1>
                </div>
                <div class="inner">



                    <form id="search_form" name="frmLeaveEntitlementSearch" method="post" action="" novalidate="novalidate">

                        <fieldset>
                            <ol>
                                <li><label for="entitlements_employee">Employee</label>


                                    <input type="text" name="entitlements[employee][empName]" value="" id="entitlements_employee_empName" class="ac_input inputFormatHint" autocomplete="off">

                                    <input type="hidden" name="entitlements[employee][empId]" id="entitlements_employee_empId" value="">
                                </li>
                                <li><label for="entitlements_leave_type">Leave Type</label>
                                    <select name="entitlements[leave_type]" id="entitlements_leave_type">
                                        <option value="" selected="selected">No leave types defined</option>
                                    </select>
                                </li>
                                <li><label for="entitlements_date">Leave Period</label>
                                    <select id="period">
                                        <option value="2016-01-01$$2016-12-31">2016-01-01 - 2016-12-31</option>
                                        <option value="2017-01-01$$2017-12-31">2017-01-01 - 2017-12-31</option>
                                    </select> <input id="date_from" type="hidden" name="entitlements[date][from]" value="2016-01-01">  <input id="date_to" type="hidden" name="entitlements[date][to]" value="2016-12-31">
                                    <input type="hidden" name="entitlements[_csrf_token]" value="eb1d0d0fa2493f0674d2f9651422feac" id="entitlements__csrf_token"></li>
                            </ol>

                            <p>
                                <input type="button" id="searchBtn" value="Search" name="_search">
                            </p>
                        </fieldset>
                    </form>
                </div> <!-- inner -->
                <a href="#" class="toggle tiptip">&gt;</a>
            </div> <!-- employee-information -->

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
</div>