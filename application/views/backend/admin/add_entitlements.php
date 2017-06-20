<div class="row">
    <div class="col-md-12">
        <div id="content">




            <div class="box" id="add-leave-entitlement">
                <div class="head">
                    <h1>Add Leave Entitlement</h1>
                </div>
                <div class="inner">



                    <form id="frmLeaveEntitlementAdd" name="frmLeaveEntitlementAdd" method="post" action="" novalidate="novalidate">

                        <fieldset>
                            <ol>
                                <li>&nbsp;
                                    <ol id="filter"><li><label for="entitlements_filters_bulk_assign">Add to Multiple Employees</label>
                                            <input type="checkbox" name="entitlements[filters][bulk_assign]" id="entitlements_filters_bulk_assign">
                                        </li>
                                        <li style="display: none;"><label for="entitlements_filters_location">Location</label>
                                            <select class="selectableGroupWidget" name="entitlements[filters][location]" id="entitlements_filters_location">
                                                <option value="-1">All</option>
                                            </select>
                                        </li>
                                        <li style="display: none;"><label for="entitlements_filters_subunit">Sub Unit</label>
                                            <select name="entitlements[filters][subunit]" id="entitlements_filters_subunit">
                                                <option value="0">All</option>
                                            </select>
                                        </li>
                                    </ol>
                                </li>
                                <li><label for="entitlements_employee">Employee <em>*</em></label>


                                    <input type="text" name="entitlements[employee][empName]" value="" id="entitlements_employee_empName" class="ac_input inputFormatHint" autocomplete="off">

                                    <input type="hidden" name="entitlements[employee][empId]" id="entitlements_employee_empId" value="">
                                </li>
                                <li><label for="entitlements_leave_type">Leave Type <em>*</em></label>
                                    <select name="entitlements[leave_type]" id="entitlements_leave_type">
                                        <option value="" selected="selected">No leave types defined</option>
                                    </select>
                                </li>
                                <li><label for="entitlements_date">Leave Period <em>*</em></label>
                                    <select id="period">
                                        <option value="2016-01-01$$2016-12-31">2016-01-01 - 2016-12-31</option>
                                        <option value="2017-01-01$$2017-12-31">2017-01-01 - 2017-12-31</option>
                                    </select> <input id="date_from" type="hidden" name="entitlements[date][from]" value="2016-01-01">  <input id="date_to" type="hidden" name="entitlements[date][to]" value="2016-12-31">
                                </li>
                                <li><label for="entitlements_entitlement">Entitlement <em>*</em></label>
                                    <input type="text" name="entitlements[entitlement]" id="entitlements_entitlement">
                                    <input type="hidden" name="entitlements[id]" id="entitlements_id">
                                    <input type="hidden" name="entitlements[_csrf_token]" value="77ff17fdfde4ceeaa06edc6977b618a2" id="entitlements__csrf_token"></li>

                                <li class="required">
                                    <em>*</em> Required field                    </li>
                            </ol>

                            <p>
                                <input type="button" id="btnSave" value="Save">
                                <input type="button" id="btnCancel" class="cancel" value="Cancel">
                            </p>
                        </fieldset>

                    </form>

                </div> <!-- inner -->

            </div> <!-- employee-information -->

            <!-- Confirmation box HTML: Begins -->
            <div class="modal hide" id="noselection">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>OrangeHRM - No matching employees</h3>
                </div>
                <div class="modal-body">
                    <p>No employees match the selected filters</p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" data-dismiss="modal" id="dialogDeleteBtn" value="Ok">
                </div>
            </div>
            <!-- Confirmation box HTML: Ends -->
            <div class="modal hide" id="preview" style="width:500px">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>OrangeHRM - Matching Employees</h3>
                </div>
                <div class="modal-body">
                    <span>The selected leave entitlement will be applied to the following employees.</span>

                    <div id="employee_list">

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" data-dismiss="modal" id="dialogConfirmBtn" value="Confirm">
                    <input type="button" class="cancel" data-dismiss="modal" id="bulkAssignCancelBtn" value="Cancel">
                    <div id="employee_loading" class="loading_message">Loading...</div>
                </div>
            </div>

            <!-- Confirmation box for employee entitlement-->
            <div class="modal hide" id="employeeEntitlement" style="width:500px">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>OrangeHRM - Updating Entitlement</h3>
                </div>
                <div class="modal-body">

                    <ol id="employee_entitlement_update">
                        <li>Loading...</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" data-dismiss="modal" id="dialogUpdateEntitlementConfirmBtn" value="Confirm">
                    <input type="button" class="cancel" data-dismiss="modal" id="dialogUpdateEntitlementCancelBtn" value="Cancel">
                </div>
            </div>

            <!-- Confirmation box for employee entitlement-->
            <div class="modal hide" id="bulkAssignWaitDlg" style="width:500px">
                <div class="modal-header">
                    <h3>OrangeHRM - Updating Entitlement</h3>
                </div>
                <div class="modal-body">
                    <p id="buildAssignWait" class="loading_message"></p>
                </div>
            </div>
        </div>
    </div>
</div>