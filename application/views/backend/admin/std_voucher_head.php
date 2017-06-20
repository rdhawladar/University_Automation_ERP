<div class="row">
    <div class="col-md-12">
        <div class="content">
            <form class="form-vertical" id="verticalForm" action="/index.php/accounting/voucherhead/create" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Voucher Head</h4>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-12">

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="req">Voucher Head</label>
                                            <input class="form-control" maxlength="45" label="" placeholder="Voucher Head" name="Voucherhead[voucherhead]" id="Voucherhead_voucherhead" type="text">
                                            <span class="school_val_error" id="Voucherhead_voucherhead_em_" style="display: none"></span>                                    </div>
                                        <div class="form-group">
                                            <label class="req">Voucher Master</label>
                                            <select class="form-control" label="" name="Voucherhead[vouchermasterid]" id="Voucherhead_vouchermasterid">
                                                <option value="">Select Voucher Master</option>
                                                <option value="1">Cash Payment</option>
                                                <option value="2">Cash Receipt</option>
                                                <option value="3">Bank Payment</option>
                                                <option value="8">344</option>
                                                <option value="11">Voucher Master</option>
                                                <option value="12">dasd</option>
                                                <option value="13">655</option>
                                                <option value="14">sam</option>
                                                <option value="15">Yoga</option>
                                                <option value="16">STOCK PAYMENT</option>
                                                <option value="17">FURNITURE PURCHASED</option>
                                                <option value="18">FEES RECEIVED</option>
                                                <option value="19">FEES REFUND</option>
                                                <option value="20">BILL PAYMENT</option>
                                                <option value="21">knkn</option>
                                                <option value="22">Hello</option>
                                                <option value="23">cash Payment</option>
                                            </select>                                        <span class="school_val_error" id="Voucherhead_vouchermasterid_em_" style="display: none"></span>

                                        </div>
                                        <div class="form-group">
                                            <label class="req">Account Group</label>
                                            <select class="form-control" label="" name="Voucherhead[accountgroupid]" id="Voucherhead_accountgroupid">
                                                <option value="">Select Ledger Account</option>
                                                <option value="1">Primary Account</option>
                                                <option value="2">fff</option>
                                                <option value="3">Course Fee</option>
                                                <option value="4">Cash Account</option>
                                                <option value="5">TDS</option>
                                                <option value="6">Gross Salary</option>
                                                <option value="7">PF</option>
                                                <option value="8">Net Payable</option>
                                                <option value="9">salary</option>
                                                <option value="10">abhi</option>
                                                <option value="11">abhi</option>
                                                <option value="12">Purchase Order</option>
                                                <option value="13">Library Fee</option>
                                                <option value="14">kkk</option>
                                                <option value="15">abab</option>
                                                <option value="16">sushma</option>
                                                <option value="17">GFD</option>
                                                <option value="18">Transport Fee</option>
                                                <option value="19"></option>
                                                <option value="20">hra</option>
                                                <option value="21">sdsd</option>
                                                <option value="22">bbb</option>
                                                <option value="23">rtffd</option>
                                                <option value="24">Cash on Hand</option>
                                                <option value="25">2</option>
                                                <option value="26">34</option>
                                                <option value="27">fid</option>
                                                <option value="28">bas</option>
                                                <option value="29">trdyd8</option>
                                                <option value="30">pappu</option>
                                                <option value="31">pappu</option>
                                                <option value="32">pappu</option>
                                                <option value="33">sam</option>
                                                <option value="34">State Tax</option>
                                                <option value="35">Master</option>
                                                <option value="36">kkk</option>
                                                <option value="37">pt</option>
                                                <option value="38">Test</option>
                                                <option value="39">ESI</option>
                                                <option value="40">PF-Employer</option>
                                                <option value="41">1000</option>
                                                <option value="42">CASH ACCOUNT 1</option>
                                                <option value="43">BANK ACCOUNT 1</option>
                                                <option value="44">FURNITURE ACCOUNT</option>
                                                <option value="45">STOCK ACCOUNT</option>
                                                <option value="46">FEES ACCOUNT</option>
                                                <option value="47">.,;,</option>
                                                <option value="48">jhgj</option>
                                                <option value="49">fssf</option>
                                                <option value="50">fssf</option>
                                            </select>                                        <span class="school_val_error" id="Voucherhead_accountgroupid_em_" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="req">Number</label>
                                            <input class="form-control" maxlength="45" label="" placeholder="number" name="Voucherhead[number]" id="Voucherhead_number" type="text">
                                            <span class="school_val_error" id="Voucherhead_number_em_" style="display: none"></span>                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form_sep">
                                            <input class="btn btn-info" type="submit" name="yt0" value="Create">                                </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="grid-view table-responsive" id="item-grid">
                            <table class="items">
                                <thead>
                                <tr>
                                    <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">Voucher Head</th><th id="item-grid_c2">Voucher Master</th><th id="item-grid_c3">Ledger Account</th><th id="item-grid_c4">Number</th><th class="button-column" id="item-grid_c5">Manage</th></tr>
                                </thead>
                                <tbody>
                                <tr class="odd">
                                    <td width="10%">1</td><td width="20%">Course Fee</td><td width="20%">Cash Receipt</td><td width="20%">Course Fee</td><td width="10%">653</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucherhead/update/id/1"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucherhead/delete/id/1"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">2</td><td width="20%">Gross Salary</td><td width="20%">Bank Payment</td><td width="20%">Gross Salary</td><td width="10%">431</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucherhead/update/id/2"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucherhead/delete/id/2"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">3</td><td width="20%">Purchase Order</td><td width="20%">Bank Payment</td><td width="20%">Purchase Order</td><td width="10%">243</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucherhead/update/id/3"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucherhead/delete/id/3"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">4</td><td width="20%">Library Fee</td><td width="20%">Cash Receipt</td><td width="20%">Library Fee</td><td width="10%">660</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucherhead/update/id/4"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucherhead/delete/id/4"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">5</td><td width="20%">haeder</td><td width="20%">Cash Payment</td><td width="20%">Primary Account</td><td width="10%">125251</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucherhead/update/id/5"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucherhead/delete/id/5"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">6</td><td width="20%">Voucher Head</td><td width="20%">Cash Payment</td><td width="20%">sushma</td><td width="10%">1000</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucherhead/update/id/6"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucherhead/delete/id/6"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">7</td><td width="20%">Transport Fee</td><td width="20%">Cash Receipt</td><td width="20%">Transport Fee</td><td width="10%">968</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucherhead/update/id/7"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucherhead/delete/id/7"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">8</td><td width="20%">Amusement Fee</td><td width="20%">Cash Payment</td><td width="20%">Primary Account</td><td width="10%">10</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucherhead/update/id/8"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucherhead/delete/id/8"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">9</td><td width="20%">demo voucher</td><td width="20%">Cash Payment</td><td width="20%">Primary Account</td><td width="10%">123456</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucherhead/update/id/9"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucherhead/delete/id/9"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">10</td><td width="20%">admin</td><td width="20%">sam</td><td width="20%">Transport Fee</td><td width="10%">111</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucherhead/update/id/10"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucherhead/delete/id/10"><img src="" alt=""></a></td></tr>
                                </tbody>
                            </table>
                            <div class="pager"><ul id="yw0" class="yiiPager"><li class="first hidden"><a href="/index.php/accounting/voucherhead/create">&lt;&lt;</a></li>
                                    <li class="previous hidden"><a href="/index.php/accounting/voucherhead/create">&lt;</a></li>
                                    <li class="page selected"><a href="/index.php/accounting/voucherhead/create">1</a></li>
                                    <li class="page"><a href="/index.php/accounting/voucherhead/create/Voucherhead_page/2">2</a></li>
                                    <li class="next"><a href="/index.php/accounting/voucherhead/create/Voucherhead_page/2">&gt;</a></li>
                                    <li class="last"><a href="/index.php/accounting/voucherhead/create/Voucherhead_page/2">&gt;&gt;</a></li></ul></div><div class="keys" style="display:none" title="/index.php/accounting/voucherhead/create"><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span></div>
                        </div>
                    </div>
                </div>
            </form>        </div>
    </div>
</div>