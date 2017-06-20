<div class="row">
    <div class="col-md-12">
        <div class="content">
            <form id="hostelroom-form" action="/index.php/hostel/hostelroom/occupiedreport" method="post">    <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Room Wise Occupied Report</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-sm-4">
                                    <label for="reg_input" class="req">Hostel Type</label>
                                    <select class="form-control" name="Hostelroom[hosteltypeid]" id="Hostelroom_hosteltypeid">
                                        <option value="">Select Option</option>
                                        <option value="7">AC conditional</option>
                                        <option value="8">non AC conditional</option>
                                    </select>                        <div class="school_val_error" id="Hostelroom_hosteltypeid_em_" style="display:none"></div>                    </div>
                                <div class="form-group col-sm-4">
                                    <label for="reg_input" class="req">Hostel Name</label>
                                    <select class="form-control" name="Hostelroom[hosteldetailsid]" id="Hostelroom_hosteldetailsid">
                                        <option value="">Select Option</option>
                                        <option value="13">Hostel One</option>
                                        <option value="14">NEw Hostel</option>
                                    </select>                        <div class="school_val_error" id="Hostelroom_hosteldetailsid_em_" style="display:none"></div>                    </div>
                                <!--                    <div class="form-group col-sm-2">
                                                        <label for="reg_input">&nbsp;</label>
                                                        <div class="form_sep">
                                                            <p><a href="javascript:requestreport();" class="btn btn-info" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
                                                        </div>
                                                    </div>-->
                                <div class="form-group col-sm-2" align="right">
                                    <label for="reg_input">&nbsp;</label>
                                    <div class="form_sep">
                                        <input type="button" onclick="printDiv('print')" value="Print Report" class="btn btn-danger">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" id="details" style="display:none">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Occupied List</h4>
                            </div>
                            <div class="panel-body">
                                <div id="print">
                                    <div class="table-responsive">
                                        <table class="table responsive table-bordered table-striped" id="roomdetails">
                                            <thead>
                                            <tr>
                                                <th width="5%">Sl. No</th>
                                                <th width="12.5%">User Type</th>
                                                <th width="18.5%">User</th>
                                                <th width="18.5%">Room No.</th>
                                                <th width="12.5%">Rent</th>
                                                <th width="6.5%">From date</th>
                                                <th width="6.5%">To Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form></div>
    </div>
</div>