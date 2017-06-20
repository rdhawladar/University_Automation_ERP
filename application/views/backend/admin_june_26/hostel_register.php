<div class="row">
    <div class="col-md-12">
        <div class="content">
            <div class="col-sm-12">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#tbb_a" data-toggle="tab">Hostel Register</a></li>
                    <li class=""><a href="#tbb_b" data-toggle="tab">List</a></li>
                </ul>
                <h6 class="content-group text-semibold"></h6>
                <div class="tab-content">
                    <div class="tab-pane active" id="tbb_a">
                        <form id="hostelregister-form" action="/index.php/hostel/hostelregister/create" method="post">                <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Hostel Register</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-sm-12">
                                                <div class="panel-body">
                                                    <div class="form-group col-sm-4">
                                                        <label>User Type</label>
                                                        <select class="form-control" name="Hostelregister[usertypeid]" id="Hostelregister_usertypeid">
                                                            <option value="">Select Type</option>
                                                            <option value="1">Student</option>
                                                            <option value="2">Employee</option>
                                                        </select>                                            <div class="school_val_error" id="Hostelregister_usertypeid_em_" style="display:none"></div>                                        </div>
                                                    <div class="form-group col-sm-4" id="studentautocomplete" style="display:none">
                                                        <label>Student Name</label>
                                                        <input class="form-control ui-autocomplete-input" id="student" type="text" value="" name="student" autocomplete="off"><input id="hidden-fieldstudent" name="output" type="hidden" value="">                                        </div>
                                                    <div class="form-group col-sm-4" id="employeeautocomplete" style="display:none">
                                                        <label>Employee Name</label>
                                                        <input class="form-control ui-autocomplete-input" id="employee" type="text" value="" name="employee" autocomplete="off"><input id="hidden-fieldemployee" name="output" type="hidden" value="">                                        </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>&nbsp;</label>
                                                        <p> &nbsp;&nbsp;<a href="javascript:userroomdetails()" class="btn btn-info">GO</a></p>
                                                    </div>
                                                    <div class="form-group col-sm-12" id="roomdetails">

                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>In/Out</label>
                                                        <select class="form-control" name="Hostelregister[in_out]" id="Hostelregister_in_out">
                                                            <option value="">Please Select</option>
                                                            <option value="1">In</option>
                                                            <option value="2">Out</option>
                                                        </select>                                            <div class="school_val_error" id="Hostelregister_in_out_em_" style="display:none"></div>                                        </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>Date</label>
                                                        <input class="form-control hasDatepicker" placeholder="Date" id="Hostelregister_date" name="Hostelregister[date]" type="text"><div class="school_val_error" id="Hostelregister_setexam_date_em_" style="display:none"></div>                                        </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>Time</label>
                                                        <input class="form-control hasDatepicker" placeholder="Time" id="Hostelregister_time" name="Hostelregister[time]" type="text"><div class="school_val_error" id="Hostelregister_time_em_" style="display:none"></div>                                        </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <div class="form_sep">
                                                                <input class="btn btn-info" name="std_reg_submit" id="std_reg_submit" type="submit" value="Create">                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>            </div>
                    <div class="tab-pane" id="tbb_b">
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="search" class="form-control" placeholder="Search....">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="grid-view table-responsive" id="item-grid">
                                    <table class="items">
                                        <thead>
                                        <tr>
                                            <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">User Type</th><th id="item-grid_c2">User</th><th id="item-grid_c3">Hostel Room</th><th id="item-grid_c4">IN/OUT</th><th id="item-grid_c5">Time</th><th id="item-grid_c6">Date</th><th class="button-column" id="item-grid_c7">Manage</th></tr>
                                        </thead>
                                        <tbody>
                                        <tr class="odd">
                                            <td width="5%">1</td><td width="10%">Student</td><td width="20%">11103020012 - partha  S  Roy</td><td width="30%">just - 143</td><td width="10%">IN</td><td width="10%">06:00:00</td><td width="10%">2016-Apr-26</td><td width="10%"><a class="glyphicon glyphicon-remove" title="" href="/index.php/hostel/hostelregister/delete/id/1"><img src="" alt=""></a></td></tr>
                                        </tbody>
                                    </table>
                                    <div class="keys" style="display:none" title="/index.php/hostel/hostelregister/create"><span>1</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>