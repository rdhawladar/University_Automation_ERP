<div class="row">
    <div class="col-md-12">
        <div class="content">
            <form id="hostelfeecollection-form" action="/index.php/hostel/hostelfeecollection/create" method="post">    <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Fee Collection</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-sm-4">
                                    <label>User Type</label>
                                    <select class="form-control" name="Hostelfeecollection[usertypeid]" id="Hostelfeecollection_usertypeid">
                                        <option value="">Select Type</option>
                                        <option value="1">Student</option>
                                        <option value="2">Employee</option>
                                    </select>                        <div class="school_val_error" id="Hostelfeecollection_usertypeid_em_" style="display:none"></div>                    </div>
                                <div class="form-group col-sm-4" id="studentautocomplete" style="display:none">
                                    <label>Student Name</label>
                                    <input class="form-control ui-autocomplete-input" id="student" type="text" value="" name="student" autocomplete="off"><input id="hidden-fieldstudent" name="output" type="hidden" value="">                    </div>
                                <div class="form-group col-sm-4" id="employeeautocomplete" style="display:none">
                                    <label>Employee Name</label>
                                    <input class="form-control ui-autocomplete-input" id="employee" type="text" value="" name="employee" autocomplete="off"><input id="hidden-fieldemployee" name="output" type="hidden" value="">                    </div>
                                <div class="form-group col-sm-4">
                                    <label>&nbsp;</label>
                                    <p> &nbsp;&nbsp;<a href="javascript:userroomdetails()" class="btn btn-info">GO</a></p>
                                </div>
                                <div class="form-group col-sm-12" id="roomdetails">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs nav-tabs-highlight">
                            <li class="active"><a href="#tbb_a" data-toggle="tab">Fee Payment</a></li>
                            <li class=""><a href="#tbb_b" data-toggle="tab">Paid List</a></li>
                        </ul>
                        <h6 class="content-group text-semibold"></h6>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tbb_a">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Fee Payment</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Fee Type</label>
                                                        <select class="form-control" multiple="multiple" name="Hostelfeecollection[hostelfeedatesid][]" id="Hostelfeecollection_hostelfeedatesid">
                                                            <option value="">Please Select</option>
                                                        </select>                                            <div class="school_val_error" id="Hostelfeecollection_hostelfeedatesid_em_" style="display:none"></div>                                        </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="reg_input_name">Amount</label>
                                                        <input class="form-control" name="Hostelfeecollection[amount]" id="Hostelfeecollection_amount" type="text" maxlength="45">                                            <div class="school_val_error" id="Hostelfeecollection_amount_em_" style="display:none"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="reg_input_name">Fine</label>
                                                    <input class="form-control" name="Hostelfeecollection[fine]" id="Hostelfeecollection_fine" type="text" maxlength="45">                                        <div class="school_val_error" id="Hostelfeecollection_fine_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="reg_input_name">Discount</label>
                                                    <input class="form-control" name="Hostelfeecollection[discount]" id="Hostelfeecollection_discount" type="text" maxlength="45">                                        <div class="school_val_error" id="Hostelfeecollection_discount_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="reg_input_name">Remarks</label>
                                                    <textarea class="form-control" name="Hostelfeecollection[remarks]" id="Hostelfeecollection_remarks"></textarea>                                        <div class="school_val_error" id="Hostelfeecollection_remarks_em_" style="display:none"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-2">
                                                        <label for="reg_input">Mode of Pay</label>
                                                        <select class="form-control" id="modeofpay">
                                                            <option value="">-Select-</option>
                                                            <option value="0">Cash</option>
                                                            <option value="1">Cheque</option>
                                                            <option value="2">Online Payment</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-2" style="display:none" id="bankname">
                                                        <label for="reg_input">Bank Name</label>
                                                        <select class="form-control" data-required="true" id="bank_name" name="bank_name">
                                                            <optgroup label="Indian Public Sector Banks">
                                                                <option value="Allahabad Bank">Allahabad Bank</option>
                                                                <option value="Andhra Bank">Andhra Bank</option>
                                                                <option value="Bank of Baroda">Bank of Baroda</option>
                                                                <option value="Bank of India">Bank of India</option>
                                                                <option value="Bank of Maharashtra">Bank of Maharashtra</option>
                                                                <option value="Canara Bank">Canara Bank</option>
                                                                <option value="Central Bank of India">Central Bank of India</option>
                                                                <option value="Corporation Bank">Corporation Bank</option>
                                                                <option value="Dena Bank">Dena Bank</option>
                                                                <option value="IDBI Bank Limited">IDBI Bank Limited</option>
                                                                <option value="Indian Bank">Indian Bank</option>
                                                                <option value="Indian Overseas Bank">Indian Overseas Bank</option>
                                                                <option value="IDBI Bank   Industrial Development Bank of India">IDBI Bank   Industrial Development Bank of India</option>
                                                                <option value="Oriental Bank of Commerce">Oriental Bank of Commerce</option>
                                                                <option value="Punjab &amp; Sind Bank">Punjab &amp; Sind Bank</option>
                                                                <option value="Punjab National Bank">Punjab National Bank</option>
                                                                <option value="State Bank of Bikaner and Jaipur">State Bank of Bikaner and Jaipur</option>
                                                                <option value="State Bank of Hyderabad">State Bank of Hyderabad</option>
                                                                <option value="State Bank of India">State Bank of India</option>
                                                                <option value="State Bank of Mysore">State Bank of Mysore</option>
                                                                <option value="State Bank of Patiala">State Bank of Patiala</option>
                                                                <option value="State Bank of Travancore">State Bank of Travancore</option>
                                                                <option value="Syndicate Bank">Syndicate Bank</option>
                                                                <option value="UCO Bank">UCO Bank</option>
                                                                <option value="Union Bank of India">Union Bank of India</option>
                                                                <option value="United Bank Of India">United Bank Of India</option>
                                                                <option value="Vijaya Bank">Vijaya Bank</option>
                                                            </optgroup>
                                                            <optgroup label="Indian Private Sector Banks">
                                                                <option value="Axis Bank">Axis Bank</option>
                                                                <option value="Catholic Syrian Bank Ltd.">Catholic Syrian Bank Ltd.</option>
                                                                <option value="IndusInd Bank Limited">IndusInd Bank Limited</option>
                                                                <option value="ICICI Bank">ICICI Bank</option>
                                                                <option value="ING Vysya Bank">ING Vysya Bank</option>
                                                                <option value="Kotak Mahindra Bank Limited">Kotak Mahindra Bank Limited</option>
                                                                <option value="Karnataka Bank">Karnataka Bank</option>
                                                                <option value="Karur Vysya Bank Limited">Karur Vysya Bank Limited.</option>
                                                                <option value="Tamilnad Mercantile Bank Ltd">Tamilnad Mercantile Bank Ltd.</option>
                                                                <option value="The Dhanalakshmi Bank Limited">The Dhanalakshmi Bank Limited.</option>
                                                                <option value="The Federal Bank Ltd">The Federal Bank Ltd.</option>
                                                                <option value="The HDFC Bank Ltd">The HDFC Bank Ltd.</option>
                                                                <option value="The Jammu &amp; Kashmir Bank Ltd">The Jammu &amp; Kashmir Bank Ltd.</option>
                                                                <option value="The Nainital Bank Ltd">The Nainital Bank Ltd.</option>
                                                                <option value="The Lakshmi Vilas Bank Ltd">The Lakshmi Vilas Bank Ltd</option>
                                                                <option value="Yes Bank">Yes Bank</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-2" style="display:none" id="cheque_no">
                                                        <label for="reg_input">Cheque No.</label>
                                                        <input type="text" class="form-control" id="chequeno" name="chequeno">
                                                    </div>
                                                    <div class="form-group col-sm-3" style="display:none" id="cheque_date">
                                                        <label for="reg_input">Cheque Date</label>
                                                        <input type="text" class="form-control pickadate picker__input" id="chequedate" name="chequedate" readonly="" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="chequedate_root"><div class="picker" id="chequedate_root" aria-hidden="true"><div class="picker__holder"><div class="picker__frame"><div class="picker__wrap"><div class="picker__box"><div class="picker__header"><select class="picker__select--year" disabled="" aria-controls="chequedate_table" title="Pick a year from the dropdown"><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016" selected="">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option></select><select class="picker__select--month" disabled="" aria-controls="chequedate_table" title="Pick a month from the dropdown"><option value="0">January</option><option value="1">February</option><option value="2">March</option><option value="3">April</option><option value="4" selected="">May</option><option value="5">June</option><option value="6">July</option><option value="7">August</option><option value="8">September</option><option value="9">October</option><option value="10">November</option><option value="11">December</option></select><div class="picker__nav--prev" data-nav="-1" role="button" aria-controls="chequedate_table" title="Go to the previous month"> </div><div class="picker__nav--next" data-nav="1" role="button" aria-controls="chequedate_table" title="Go to the next month"> </div></div><table class="picker__table" id="chequedate_table" role="grid" aria-controls="chequedate" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="Sunday">Sun</th><th class="picker__weekday" scope="col" title="Monday">Mon</th><th class="picker__weekday" scope="col" title="Tuesday">Tue</th><th class="picker__weekday" scope="col" title="Wednesday">Wed</th><th class="picker__weekday" scope="col" title="Thursday">Thu</th><th class="picker__weekday" scope="col" title="Friday">Fri</th><th class="picker__weekday" scope="col" title="Saturday">Sat</th></tr></thead><tbody><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462039200000" role="gridcell">1</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462125600000" role="gridcell">2</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462212000000" role="gridcell">3</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462298400000" role="gridcell">4</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462384800000" role="gridcell">5</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462471200000" role="gridcell">6</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462557600000" role="gridcell">7</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462644000000" role="gridcell">8</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462730400000" role="gridcell">9</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462816800000" role="gridcell">10</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462903200000" role="gridcell">11</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1462989600000" role="gridcell">12</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463076000000" role="gridcell">13</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463162400000" role="gridcell">14</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463248800000" role="gridcell">15</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463335200000" role="gridcell">16</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463421600000" role="gridcell">17</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463508000000" role="gridcell">18</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463594400000" role="gridcell">19</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463680800000" role="gridcell">20</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463767200000" role="gridcell">21</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463853600000" role="gridcell">22</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1463940000000" role="gridcell">23</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1464026400000" role="gridcell">24</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1464112800000" role="gridcell">25</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1464199200000" role="gridcell">26</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1464285600000" role="gridcell">27</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1464372000000" role="gridcell">28</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1464458400000" role="gridcell">29</div></td><td role="presentation"><div class="picker__day picker__day--infocus picker__day--today picker__day--highlighted" data-pick="1464544800000" role="gridcell" aria-activedescendant="true">30</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1464631200000" role="gridcell">31</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1464717600000" role="gridcell">1</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1464804000000" role="gridcell">2</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1464890400000" role="gridcell">3</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1464976800000" role="gridcell">4</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1465063200000" role="gridcell">5</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1465149600000" role="gridcell">6</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1465236000000" role="gridcell">7</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1465322400000" role="gridcell">8</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1465408800000" role="gridcell">9</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1465495200000" role="gridcell">10</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1465581600000" role="gridcell">11</div></td></tr></tbody></table><div class="picker__footer"><button class="picker__button--today" type="button" data-pick="1464544800000" disabled="" aria-controls="chequedate">Today</button><button class="picker__button--clear" type="button" data-clear="1" disabled="" aria-controls="chequedate">Clear</button><button class="picker__button--close" type="button" data-close="true" disabled="" aria-controls="chequedate">Close</button></div></div></div></div></div></div>
                                                    </div>
                                                    <div class="form-group col-sm-2"><br>
                                                        <label for="reg_input"><b>Total Amount: <p id="totalamount" style="font-size: 16px"></p></b></label>
                                                    </div>
                                                    <div class="form-group col-sm-3"><br>
                                                        <label for="reg_input"><span>Do you want receipt? &nbsp;&nbsp;&nbsp;<input type="checkbox" id="checkbox1" checked="checked"></span></label>
                                                    </div>
                                                    <div class="form-group col-sm-2">
                                                        <label for="reg_input">Receipt No.</label>
                                                        <input type="text" class="form-control" id="receiptno" value="1">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="form_sep">
                                                            <p> &nbsp;&nbsp;<a href="javascript:savepayment()" class="btn btn-info">Make Payment</a> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tbb_b">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Fee Paid List</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table responsive table-bordered table-striped" id="paid">
                                                        <thead>
                                                        <tr>
                                                            <th data-hide="phone,tablet" width="6.5%">Receipt No.</th>
                                                            <th data-hide="phone,tablet" width="18.5%">Hostel-Room</th>
                                                            <th data-hide="phone,tablet" width="12.5%">Amount</th>
                                                            <th width="12.5%">Paid Date</th>
                                                            <th width="12.5%">Fine</th>
                                                            <th width="12.5%">Discount</th>
                                                            <th width="12.5%">Remarks</th>
                                                            <!--<th width="12.5%"><a href="javascript:generatereceipt()" class="btn btn-danger">Generate Receipt</a></th>-->
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
                        </div>
                    </div>
                </div>
            </form></div>
    </div>
</div>