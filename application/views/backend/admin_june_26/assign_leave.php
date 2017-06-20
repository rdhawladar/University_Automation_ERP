<div class="row">
    <div class="col-md-12">
        <div id="content">



            <div class="box" id="assign-leave">
                <div class="head">
                    <h1>Assign Leave</h1>
                </div>
                <div class="inner">

                    <div class="message warning">
                        No Leave Types with Leave Balance
                        <a href="#" class="messageCloseButton">Close</a>
                    </div>




                </div> <!-- inner -->

            </div> <!-- assign leave -->

            <!-- leave balance details HTML: Begins -->
            <div class="modal hide" id="balance_details">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>OrangeHRM - Leave Balance Details</h3>
                </div>
                <div class="modal-body">
                    <dl class="search-params">
                        <dt>Employee Name</dt>
                        <dd id="popup_emp_name"></dd>
                        <dt>Leave Type</dt>
                        <dd id="popup_leave_type"></dd>
                        <dt>As of Date</dt>
                        <dd id="balance_as_of"></dd>
                    </dl>
                    <table border="0" cellspacing="0" cellpadding="0" class="table">
                        <tbody>
                        <tr class="odd">
                            <td>Entitled</td>
                            <td id="balance_entitled">0.00</td>
                        </tr>
                        <tr class="odd" id="container-adjustment">
                            <td>Adjustment</td>
                            <td id="balance_adjustment">0.00</td>
                        </tr>
                        <tr class="even">
                            <td>Taken</td>
                            <td id="balance_taken">0.00</td>
                        </tr>
                        <tr class="odd">
                            <td>Scheduled</td>
                            <td id="balance_scheduled">0.00</td>
                        </tr>
                        <tr class="even">
                            <td>Pending Approval</td>
                            <td id="balance_pending">0.00</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr class="total">
                            <td>Balance</td>
                            <td id="balance_total">0.00</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" data-dismiss="modal" id="closeButton" value="Ok">
                </div>
            </div>

            <!-- leave balance details HTML: Begins -->
            <div class="modal hide" id="multiperiod_balance">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>OrangeHRM - Leave Balance Details</h3>
                </div>
                <div class="modal-body">
                    <dl class="search-params">
                        <dt>Employee Name</dt>
                        <dd id="multiperiod_emp_name"></dd>
                        <dt>Leave Type</dt>
                        <dd id="multiperiod_leave_type"></dd>
                    </dl>
                    <table border="0" cellspacing="0" cellpadding="0" class="table">
                        <thead>
                        <tr>
                            <th>Leave Period</th>
                            <th>Initial Balance</th>
                            <th>Leave Date</th>
                            <th>Available Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd">
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" data-dismiss="modal" id="closeButton" value="Ok">
                </div>
            </div>

            <!-- Confirmation box for leave balance update -->
            <div class="modal hide" id="leaveBalanceConfirm" style="width:500px">
                <div class="modal-header">
                    <h3>OrangeHRM - Confirm Leave Assignment</h3>
                </div>
                <div class="modal-body">
                    <p>Employee does not have sufficient leave balance for leave request.</p>
                    <p>Click OK to confirm leave assignment.</p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" data-dismiss="modal" id="confirmOkButton" value="Ok">
                    <input type="button" class="reset" data-dismiss="modal" id="confirmCancelButton" value="Cancel">
                </div>
            </div>
        </div>
    </div>
</div>