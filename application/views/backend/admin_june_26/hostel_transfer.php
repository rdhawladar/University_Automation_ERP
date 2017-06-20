<div class="row">
    <div class="col-md-12">
        <div class="content">
            <div class="col-sm-12">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#tbb_a" data-toggle="tab">Room Transfer/Vacate</a></li>
                    <li class=""><a href="#tbb_b" data-toggle="tab">List</a></li>
                </ul><br>
                <div class="tab-content">
                    <div class="tab-pane active" id="tbb_a">
                        <form id="hosteltransfer-form" action="/index.php/hostel/hosteltransfer/create" method="post">                <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Room Transfer/Vacate</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-sm-12">
                                                <div class="panel-body">
                                                    <div class="form-group col-sm-4">
                                                        <label>User Type</label>
                                                        <select class="form-control" name="Hosteltransfer[usertypeid]" id="Hosteltransfer_usertypeid">
                                                            <option value="">Select Type</option>
                                                            <option value="1">Student</option>
                                                            <option value="2">Employee</option>
                                                        </select>                                            <div class="school_val_error" id="Hosteltransfer_usertypeid_em_" style="display:none"></div>                                        </div>

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
                                                        <label>Select</label>
                                                        <select class="form-control" name="Hosteltransfer[vacateortransfer]" id="Hosteltransfer_vacateortransfer">
                                                            <option value="">Please Select</option>
                                                            <option value="1">Transfer</option>
                                                            <option value="2">Vacate</option>
                                                        </select>                                            <div class="school_val_error" id="Hosteltransfer_vacateortransfer_em_" style="display:none"></div>                                        </div>
                                                    <div class="form-group col-sm-6" id="hosteltype" style="display:none">
                                                        <label for="reg_input" class="req">Hostel Type</label>
                                                        <select class="form-control" name="Hosteltransfer[hosteltypeid]" id="Hosteltransfer_hosteltypeid">
                                                            <option value="">Select Option</option>
                                                            <option value="7">AC conditional</option>
                                                            <option value="8">non AC conditional</option>
                                                            <option value="11">ktier public hostel</option>
                                                            <option value="12">AC</option>
                                                            <option value="13">Boys</option>
                                                            <option value="16">Girls</option>
                                                            <option value="17">sfsdfds</option>
                                                            <option value="18">stertbwtb</option>
                                                            <option value="19">General</option>
                                                            <option value="20">Imperial Hostel</option>
                                                            <option value="21">workinig</option>
                                                            <option value="22">Chittagong University FR Hall</option>
                                                            <option value="23">dinu ac</option>
                                                            <option value="24">ccccc</option>
                                                            <option value="25">ackk</option>
                                                            <option value="26">mens hostel</option>
                                                            <option value="27">aaaa</option>
                                                            <option value="29">WARD</option>
                                                            <option value="30">Without AC</option>
                                                        </select>                                            <div class="school_val_error" id="Hosteltransfer_hosteltypeid_em_" style="display:none"></div>                                        </div>
                                                    <div class="form-group col-sm-6" id="hostelname" style="display:none">
                                                        <label for="reg_input" class="req">Hostel Name</label>
                                                        <select class="form-control" name="Hosteltransfer[hosteldetailsid]" id="Hosteltransfer_hosteldetailsid">
                                                            <option value="">Select Option</option>
                                                            <option value="9">just</option>
                                                            <option value="10">santa</option>
                                                            <option value="11">kiter public boys hostel</option>
                                                            <option value="12">TEST</option>
                                                            <option value="13">Hostel One</option>
                                                            <option value="14">NEw Hostel</option>
                                                            <option value="15">GENTELMAN</option>
                                                            <option value="16">bbb</option>
                                                            <option value="17">dfgdfg</option>
                                                            <option value="18">just</option>
                                                            <option value="19">Virshaywa </option>
                                                            <option value="20">Virshaywa </option>
                                                        </select>                                            <div class="school_val_error" id="Hosteltransfer_hosteldetailsid_em_" style="display:none"></div>                                        </div>
                                                    <div class="form-group col-sm-6" id="hostelroom" style="display:none">
                                                        <label for="reg_input_name" class="req">Hostel Room</label>
                                                        <select class="form-control" name="Hosteltransfer[to_hostelroomid]" id="Hosteltransfer_to_hostelroomid">
                                                            <option value="">Select Option</option>
                                                            <option value="9">just</option>
                                                            <option value="10">santa</option>
                                                            <option value="11">kiter public boys hostel</option>
                                                            <option value="12">TEST</option>
                                                            <option value="13">Hostel One</option>
                                                            <option value="14">NEw Hostel</option>
                                                            <option value="15">GENTELMAN</option>
                                                            <option value="16">bbb</option>
                                                            <option value="17">dfgdfg</option>
                                                            <option value="18">just</option>
                                                            <option value="19">Virshaywa </option>
                                                            <option value="20">Virshaywa </option>
                                                        </select>                                            <div class="school_val_error" id="Hosteltransfer_to_hostelroomid_em_" style="display:none"></div>
                                                    </div>
                                                    <div class="form-group col-sm-12" id="availablebeds">

                                                    </div>
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
                                            <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">User Type</th><th id="item-grid_c2">User</th><th id="item-grid_c3">From Hostel</th><th id="item-grid_c4">To Hostel</th><th id="item-grid_c5">Date</th></tr>
                                        </thead>
                                        <tbody>
                                        <tr class="odd">
                                            <td width="5%">1</td><td width="10%">Student</td><td width="20%">111 - arun a a</td><td width="30%">Hostel-1</td><td width="30%">Hostel-2</td><td width="10%">2016-Feb-20</td></tr>
                                        <tr class="even">
                                            <td width="5%">2</td><td width="10%">Student</td><td width="20%"> -   </td><td width="30%">Hostel-3</td><td width="30%">Hostel-4</td><td width="10%">2016-Mar-01</td></tr>
                                        </tbody>
                                    </table>
                                    <div class="keys" style="display:none" title="/index.php/hostel/hosteltransfer/create"><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>