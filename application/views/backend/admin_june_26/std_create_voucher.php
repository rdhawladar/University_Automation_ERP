<div class="row">
    <div class="col-md-12">
        <div class="content">
            <form class="form-vertical" id="verticalForm" action="/index.php/accounting/voucher/create" method="post">    <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Create Voucher</h4>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-12">

                                    <div class="panel-body">

                                        <div class="form-group">
                                            Voucher No : 54                              </div>
                                        <div class="form-group">
                                            <label for="reg_input_name">Transaction Date</label>
                                            <input class="form-control hasDatepicker" placeholder="Date" value="2016-05-30" autocomplete="" label="" id="date" name="Datemaster[transactiondate]" type="text" size="10">                                <span class="school_val_error" id="Voucher_transactiondate_em_" style="display: none"></span>

                                        </div>
                                        <div class="form-group">
                                            <label for="reg_input_name" class="req">Voucher Master</label>

                                            <select class="form-control" label="" name="Voucher[vouchermasterid]" id="Voucher_vouchermasterid">
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
                                            </select>                                <span class="school_val_error" id="Voucher_vouchermasterid_em_" style="display: none"></span>

                                        </div>
                                        <div class="form-group">
                                            <label for="reg_input_name">Voucher Head</label>
                                            <select class="form-control" label="" name="Voucher[voucherheadid]" id="Voucher_voucherheadid">
                                                <option value="">Select Voucher Head</option>
                                                <option value="1">Course Fee</option>
                                                <option value="2">Gross Salary</option>
                                                <option value="3">Purchase Order</option>
                                                <option value="4">Library Fee</option>
                                                <option value="5">haeder</option>
                                                <option value="6">Voucher Head</option>
                                                <option value="7">Transport Fee</option>
                                                <option value="8">Amusement Fee</option>
                                                <option value="9">demo voucher</option>
                                                <option value="10">admin</option>
                                                <option value="11">sam</option>
                                                <option value="12">FEES RECEIVED IN CASH</option>
                                                <option value="13">FEES RECEIVED BY CHEQUE</option>
                                                <option value="14">FURNI PURCAHSED BY CASH</option>
                                                <option value="15">FURNI PURCAHSED BY CHQ</option>
                                                <option value="16">ELECTERCITY BILL CASH</option>
                                                <option value="17">ELECTERCITY BILL CHEQUE</option>
                                                <option value="18">,,m,m.</option>
                                                <option value="19">Subject Fee</option>
                                            </select>                                <span class="school_val_error" id="Voucher_voucherheadid_em_" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" value="54" name="Voucher[vouchernumber]" id="Voucher_vouchernumber" type="hidden">                                <span class="school_val_error" id="Voucher_vouchernumber_em_" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_input_name" class="req">From Ledger Account</label>

                                            <select class="form-control" label="" name="Voucher[accountgroupid]" id="Voucher_accountgroupid">
                                                <option value="">From Ledger Account</option>
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
                                            </select><span class="school_val_error" id="Voucher_accountgroupid_em_" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_input_name">To Ledger Account</label>
                                            <select class="form-control" label="" name="toaccount" id="toaccount">
                                                <option value="">To Ledger Account</option>
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
                                            </select><span class="school_val_error" id="Voucher_toaccount_em_" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_input_name" class="req">Amount</label>
                                            <input class="form-control" maxlength="45" label="" placeholder="Amount" name="Voucher[credit]" id="Voucher_credit" type="text">
                                            <span class="school_val_error" id="Voucher_credit_em_" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_input_name">Narration</label>
                                            <textarea class="form-control" maxlength="45" label="" placeholder="Narration" name="Voucher[description]" id="Voucher_description"></textarea>
                                            <span class="school_val_error" id="Voucher_description_em_" style="display: none"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form_sep">
                                            <input class="btn btn-info" type="submit" name="yt0" value="Create">                            </div>
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
                                    <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">Employee</th><th id="item-grid_c2">Voucher No</th><th id="item-grid_c3">Transaction Date</th><th id="item-grid_c4">Voucher Head</th><th class="button-column" id="item-grid_c5">Manage</th></tr>
                                </thead>
                                <tbody>
                                <tr class="odd">
                                    <td width="10%">1</td><td width="20%">surya a raju</td><td width="20%">23</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/2"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/2"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/2"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">2</td><td width="20%">surya a raju</td><td width="20%">59</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/3"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/3"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/3"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">3</td><td width="20%">surya a raju</td><td width="20%">59</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/4"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/4"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/4"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">4</td><td width="20%">surya a raju</td><td width="20%">54</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/5"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/5"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/5"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">5</td><td width="20%">surya a raju</td><td width="20%">54</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/6"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/6"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/6"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">6</td><td width="20%">surya a raju</td><td width="20%">98</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/7"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/7"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/7"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">7</td><td width="20%">surya a raju</td><td width="20%">98</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/8"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/8"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/8"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">8</td><td width="20%">surya a raju</td><td width="20%">47</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/9"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/9"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/9"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">9</td><td width="20%">surya a raju</td><td width="20%">47</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/10"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/10"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/10"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">10</td><td width="20%">surya a raju</td><td width="20%">73</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/11"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/11"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/11"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">11</td><td width="20%">surya a raju</td><td width="20%">73</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/12"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/12"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/12"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">12</td><td width="20%">surya a raju</td><td width="20%">48</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/13"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/13"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/13"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">13</td><td width="20%">surya a raju</td><td width="20%">48</td><td width="20%">2016-02-16</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/14"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/14"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/14"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="10%">14</td><td width="20%">surya a raju</td><td width="20%">23</td><td width="20%">2016-02-17</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/15"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/15"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/15"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="10%">15</td><td width="20%">surya a raju</td><td width="20%">23</td><td width="20%">2016-02-17</td><td width="10%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/voucher/update/id/16"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/accounting/voucher/view/id/16"><img src="" alt=""></a> <a class="glyphicon glyphicon-remove" title="" href="/index.php/accounting/voucher/delete/id/16"><img src="" alt=""></a></td></tr>
                                </tbody>
                            </table>
                            <div class="pager"><ul id="yw0" class="yiiPager"><li class="first hidden"><a href="/index.php/accounting/voucher/create">&lt;&lt;</a></li>
                                    <li class="previous hidden"><a href="/index.php/accounting/voucher/create">&lt;</a></li>
                                    <li class="page selected"><a href="/index.php/accounting/voucher/create">1</a></li>
                                    <li class="page"><a href="/index.php/accounting/voucher/create/Voucher_page/2">2</a></li>
                                    <li class="page"><a href="/index.php/accounting/voucher/create/Voucher_page/3">3</a></li>
                                    <li class="page"><a href="/index.php/accounting/voucher/create/Voucher_page/4">4</a></li>
                                    <li class="next"><a href="/index.php/accounting/voucher/create/Voucher_page/2">&gt;</a></li>
                                    <li class="last"><a href="/index.php/accounting/voucher/create/Voucher_page/127">&gt;&gt;</a></li></ul></div><div class="keys" style="display:none" title="/index.php/accounting/voucher/create"><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span><span>14</span><span>15</span><span>16</span></div>
                        </div>
                    </div>
                </div>
            </form></div>
    </div>
</div>