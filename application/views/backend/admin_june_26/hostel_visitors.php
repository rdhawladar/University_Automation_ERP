<div class="row">
    <div class="col-md-12">
        <div class="content">
            <div class="col-sm-12">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#tbb_a" data-toggle="tab">Hostel Visitors</a></li>
                    <li class=""><a href="#tbb_b" data-toggle="tab">List</a></li>
                </ul>
                <h6 class="content-group text-semibold"></h6>
                <div class="tab-content">
                    <div class="tab-pane active" id="tbb_a">
                        <form id="hostelvisitors-form" action="/index.php/hostel/hostelvisitors/create" method="post">                <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Hostel Visitors</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-sm-12">
                                                <div class="panel-body">
                                                    <div class="form-group col-sm-4">
                                                        <label>User Type</label>
                                                        <select class="form-control" name="Hostelvisitors[usertypeid]" id="Hostelvisitors_usertypeid">
                                                            <option value="">Select Type</option>
                                                            <option value="1">Student</option>
                                                            <option value="2">Employee</option>
                                                        </select>                                            <div class="school_val_error" id="Hostelvisitors_usertypeid_em_" style="display:none"></div>                                        </div>
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
                                                    <div class="form-group col-sm-6">
                                                        <label for="reg_input_name" class="req">Visitor Name</label>
                                                        <input class="form-control" name="Hostelvisitors[hostelvisitors_name]" id="Hostelvisitors_hostelvisitors_name" type="text" maxlength="60">                                            <div class="school_val_error" id="Hostelvisitors_hostelvisitors_name_em_" style="display:none"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="reg_input_name" class="req">Relation</label>
                                                        <input class="form-control" name="Hostelvisitors[hostelvisitors_relation]" id="Hostelvisitors_hostelvisitors_relation" type="text" maxlength="60">                                            <div class="school_val_error" id="Hostelvisitors_hostelvisitors_relation_em_" style="display:none"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Date</label>
                                                        <input class="form-control hasDatepicker" placeholder="Date" id="Hostelvisitors_date" name="Hostelvisitors[date]" type="text"><div class="school_val_error" id="Hostelvisitors_date_em_" style="display:none"></div>                                        </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Time</label>
                                                        <input class="form-control hasDatepicker" placeholder="Time" id="Hostelvisitors_time" name="Hostelvisitors[time]" type="text"><div class="school_val_error" id="Hostelvisitors_time_em_" style="display:none"></div>                                        </div>
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
                                            <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">User Type</th><th id="item-grid_c2">User</th><th id="item-grid_c3">Hostel Room</th><th id="item-grid_c4">Visitor Name</th><th id="item-grid_c5">Relation</th><th id="item-grid_c6">Time</th><th id="item-grid_c7">Date</th><th class="button-column" id="item-grid_c8">Manage</th></tr>
                                        </thead>
                                        <tbody>
                                        <tr class="odd">
                                            <td width="5.11%">1</td><td width="11.11%">Student</td><td width="11.11%">108180134 - fgdh grfg rger</td><td width="17.11%">just - 143</td><td width="17.11%">hghhj</td><td width="11.11%">jhj</td><td width="11.11%">07:00:00</td><td width="11.11%">2016-Apr-26</td><td width="5.11%"><a class="glyphicon glyphicon-remove" title="" href="/index.php/hostel/hostelvisitors/delete/id/2"><img src="" alt=""></a></td></tr>
                                        <tr class="even">
                                            <td width="5.11%">2</td><td width="11.11%">Student</td><td width="11.11%">111 - arun a a</td><td width="17.11%">just - 143</td><td width="17.11%">abc</td><td width="11.11%">abc</td><td width="11.11%">06:26:00</td><td width="11.11%">2016-Apr-23</td><td width="5.11%"><a class="glyphicon glyphicon-remove" title="" href="/index.php/hostel/hostelvisitors/delete/id/1"><img src="" alt=""></a></td></tr>
                                        </tbody>
                                    </table>
                                    <div class="keys" style="display:none" title="/index.php/hostel/hostelvisitors/create"><span>2</span><span>1</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>