<div class="row">
    <div class="col-md-12">
        <div id="content">

            <div class="box toggableForm" id="leave-list-search">
                <div class="head">
                    <h1>Leave List</h1>
                </div>
                <div class="inner">
                    <form id="frmFilterLeave" name="frmFilterLeave" method="post" action="/hrm/symfony/web/index.php/leave/viewLeaveList" novalidate="novalidate">

                        <fieldset>
                            <ol>
                                <li><label for="leaveList_calFromDate">From</label>
                                    <input id="calFromDate" type="text" name="leaveList[calFromDate]" value="2016-01-01" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                </li>
                                <li><label for="leaveList_calToDate">To</label>
                                    <input id="calToDate" type="text" name="leaveList[calToDate]" value="2017-12-31" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                </li>
                                <li><label for="leaveList_chkSearchFilter">Show Leave with Status</label>
                                    <div class="checkbox_group label_first" id="leaveList_chkSearchFilter_checkboxgroup"><label for="leaveList_chkSearchFilter_checkboxgroup_allcheck">All</label>&nbsp;<input id="leaveList_chkSearchFilter_checkboxgroup_allcheck" type="checkbox">
                                        <label for="leaveList_chkSearchFilter_-1">Rejected</label>&nbsp;<input name="leaveList[chkSearchFilter][]" type="checkbox" value="-1" id="leaveList_chkSearchFilter_-1">
                                        <label for="leaveList_chkSearchFilter_0">Cancelled</label>&nbsp;<input name="leaveList[chkSearchFilter][]" type="checkbox" value="0" id="leaveList_chkSearchFilter_0">
                                        <label for="leaveList_chkSearchFilter_1">Pending Approval</label>&nbsp;<input name="leaveList[chkSearchFilter][]" type="checkbox" value="1" id="leaveList_chkSearchFilter_1" checked="checked">
                                        <label for="leaveList_chkSearchFilter_2">Scheduled</label>&nbsp;<input name="leaveList[chkSearchFilter][]" type="checkbox" value="2" id="leaveList_chkSearchFilter_2">
                                        <label for="leaveList_chkSearchFilter_3">Taken</label>&nbsp;<input name="leaveList[chkSearchFilter][]" type="checkbox" value="3" id="leaveList_chkSearchFilter_3"></div>
                                </li>
                                <li><label for="leaveList_txtEmployee">Employee</label>


                                    <input type="text" name="leaveList[txtEmployee][empName]" value="" id="leaveList_txtEmployee_empName" class="ac_input inputFormatHint" autocomplete="off">

                                    <input type="hidden" name="leaveList[txtEmployee][empId]" id="leaveList_txtEmployee_empId" value="">
                                </li>
                                <li><label for="leaveList_cmbSubunit">Sub Unit</label>
                                    <select name="leaveList[cmbSubunit]" id="leaveList_cmbSubunit">
                                        <option value="0">All</option>
                                    </select>
                                </li>
                                <li><label for="leaveList_cmbWithTerminated">Include Past Employees</label>
                                    <input type="checkbox" name="leaveList[cmbWithTerminated]" value="on" id="leaveList_cmbWithTerminated">
                                    <input type="hidden" name="leaveList[_csrf_token]" value="682dba12b7f2f452f0203e463af83b3e" id="leaveList__csrf_token"></li>
                            </ol>

                            <p>
                                <input type="button" name="btnSearch" value="Search" id="btnSearch" class="plainbtn">
                                <input class="reset" type="button" name="btnReset" value="Reset" id="btnReset">

                                <input type="hidden" name="pageNo" id="pageNo" value="">
                                <input type="hidden" name="hdnAction" id="hdnAction" value="search">

                            </p>
                        </fieldset>

                    </form>

                </div> <!-- inner -->
                <a href="#" class="toggle tiptip">&gt;</a>
            </div> <!-- leave-list-search -->

            <div class="box noHeader" id="search-results">


                <div class="inner">




                    <form method="post" action="/hrm/symfony/web/index.php/leave/changeLeaveStatus" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                        <input type="hidden" name="defaultList[_csrf_token]" value="43cebe94d6e39e72c1b16a82ff436a09" id="defaultList__csrf_token">





                        <div id="helpText" class="helpText"></div>

                        <div id="scrollWrapper">
                            <div id="scrollContainer">
                            </div>
                        </div>
                        <div id="tableWrapper">
                            <table class="table hover" id="resultTable">

                                <thead>
                                <tr><th rowspan="1" style="width:24%"><span class="headerCell">Date</span></th>
                                    <th rowspan="1" style="width:18%"><span class="headerCell">Employee Name</span></th>
                                    <th rowspan="1" style="width:10%"><span class="headerCell">Leave Type</span></th>
                                    <th rowspan="1" style="width:12%"><span class="headerCell">Leave Balance (Days)</span></th>
                                    <th rowspan="1" style="width:9%"><span class="headerCell">Number of Days</span></th>
                                    <th rowspan="1" style="width:12%"><span class="headerCell">Status</span></th>
                                    <th rowspan="1" style="width:17%"><span class="headerCell">Comments</span></th>
                                    <th rowspan="1" style="width:10%"><span class="headerCell">Actions</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td colspan="8">No Records Found</td>
                                </tr>
                                </tbody>
                            </table>
                        </div> <!-- tableWrapper -->
                        <div class="bottom">

                            <input type="button" class="" id="btnSave" name="btnSave" value="Save">


                        </div>
                    </form> <!-- frmList_ohrmListComponent -->


                </div> <!-- inner -->

            </div> <!-- search-results -->
            <!-- comment dialog -->
            <div class="modal hide midsize" id="commentDialog">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>Leave Request Comments</h3>
                </div>
                <div class="modal-body">
                    <p>
                    </p><form action="updateComment" method="post" id="frmCommentSave">
                        <input type="hidden" id="leaveId">
                        <input type="hidden" id="leaveOrRequest">
                        <input type="hidden" name="leaveComment[_csrf_token]" value="1c5ddb3c95dfa30d4e3d0e12494cfe5f" id="leaveComment__csrf_token">        <div id="existingComments">
                            <span>Loading...</span>
                        </div>
                        <br class="clear">
                        <br class="clear">
                        <textarea name="leaveComment" id="leaveComment" cols="40" rows="4" class="commentTextArea"></textarea>
                        <br class="clear">
                        <span id="commentError" style="padding-left: 2px;" class="validation-error"></span>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" id="commentSave" value="Save">
                    <input type="button" class="btn reset" data-dismiss="modal" id="commentCancel" value="Cancel">
                </div>
            </div>
            <!-- end of comment dialog-->

            <!-- Leave Balance Popup -->
            <div class="modal hide" id="leaveBalanceDialog">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>Leave Balance Details</h3>
                </div>
                <div class="modal-body">
                    <p>
                    </p><table id="leaveBalanceTable" class="table"><tbody><tr><th>Period</th><th>Leave Balance</th></tr>
                        </tbody></table>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" data-dismiss="modal" value="Ok">
                </div>
            </div>
            <!-- Leave Balance Popup end -->
        </div>
    </div>
</div>