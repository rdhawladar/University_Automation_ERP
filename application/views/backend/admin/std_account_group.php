<div class="row">
    <div class="col-md-12">
        <div class="content">
            <form class="form-vertical" id="verticalForm" action="/index.php/accounting/accountgroup/create" method="post">            <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Account Group</h4>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-12">

                                    <div class="panel-body">

                                        <div class="form-group">
                                            <!-- Account Name is used to define the name of account!-->
                                            <label class="req">Account Name</label>
                                            <input class="form-control" maxlength="45" label="" placeholder=" Ledger Account" name="Accountgroup[accountname]" id="Accountgroup_accountname" type="text">
                                            <span class="school_val_error" id="Accountgroup_accountname_em_" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <!-- Group Under is used to define the group which the Account name belongs to.!-->
                                            <label class="req">Group Under</label>
                                            <select class="form-control" label="" name="Accountgroup[groupunder]" id="Accountgroup_groupunder">
                                                <option value="">Ledger Sub</option>
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
                                            </select>                                        <span class="school_val_error" id="Accountgroup_groupunder_em_" style="display: none"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form_sep">
                                            <input class="btn btn-info" type="submit" name="yt0" value="Create">                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Lists all created accounts!-->
                    <div class="col-sm-6">
                        <div class="grid-view" id="item-grid">
                            <table class="items">
                                <thead>
                                <tr>
                                    <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">Ledger Account</th><th class="button-column" id="item-grid_c2">Manage</th></tr>
                                </thead>
                                <tbody>
                                <tr class="odd">
                                    <td width="20%">1</td><td width="30%">Primary Account</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/accountgroup/update/id/1"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="20%">2</td><td width="30%">fff</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/accountgroup/update/id/2"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="20%">3</td><td width="30%">Course Fee</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/accountgroup/update/id/3"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="20%">4</td><td width="30%">Cash Account</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/accountgroup/update/id/4"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="20%">5</td><td width="30%">TDS</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/accountgroup/update/id/5"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="20%">6</td><td width="30%">Gross Salary</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/accountgroup/update/id/6"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="20%">7</td><td width="30%">PF</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/accountgroup/update/id/7"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="20%">8</td><td width="30%">Net Payable</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/accountgroup/update/id/8"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="20%">9</td><td width="30%">salary</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/accountgroup/update/id/9"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="20%">10</td><td width="30%">abhi</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/accounting/accountgroup/update/id/10"><img src="" alt=""></a></td></tr>
                                </tbody>
                            </table>
                            <div class="pager"><ul id="yw0" class="yiiPager"><li class="first hidden"><a href="/index.php/accounting/accountgroup/create">&lt;&lt;</a></li>
                                    <li class="previous hidden"><a href="/index.php/accounting/accountgroup/create">&lt;</a></li>
                                    <li class="page selected"><a href="/index.php/accounting/accountgroup/create">1</a></li>
                                    <li class="page"><a href="/index.php/accounting/accountgroup/create/Accountgroup_page/2">2</a></li>
                                    <li class="page"><a href="/index.php/accounting/accountgroup/create/Accountgroup_page/3">3</a></li>
                                    <li class="page"><a href="/index.php/accounting/accountgroup/create/Accountgroup_page/4">4</a></li>
                                    <li class="next"><a href="/index.php/accounting/accountgroup/create/Accountgroup_page/2">&gt;</a></li>
                                    <li class="last"><a href="/index.php/accounting/accountgroup/create/Accountgroup_page/5">&gt;&gt;</a></li></ul></div><div class="keys" style="display:none" title="/index.php/accounting/accountgroup/create"><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span></div>
                        </div>
                    </div>
                </div>
            </form>        </div>
    </div>
</div>