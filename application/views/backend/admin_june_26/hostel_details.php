<div class="row">
    <div class="col-md-12">
        <div class="content">
            <div class="col-sm-12">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class=""><a href="#tbb_a" data-toggle="tab" aria-expanded="false">Hostel Type</a></li>
                    <li class="active"><a href="#tbb_b" data-toggle="tab" aria-expanded="true">Hostel Details</a></li>
                </ul>
                <h6 class="content-group text-semibold"></h6>
                <div class="tab-content">
                    <div class="tab-pane" id="tbb_a">

                        <form id="hosteltype-form" action="/index.php/hostel/hosteltype/create" method="post">                <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Add Hostel Type</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="reg_input_name" class="req">Hostel Type</label>
                                                    <input size="84" maxlength="45" class="form-control" name="Hosteltype[hosteltype_name]" id="Hosteltype_hosteltype_name" type="text">                                        <div class="school_val_error" id="Hosteltype_hosteltype_name_em_" style="display:none"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="form_sep">
                                                            <input class="btn btn-info" name="std_reg_submit" id="std_reg_submit" type="submit" value="Save">                                            </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="grid-view" id="item-grid">
                                        <table class="items">
                                            <thead>
                                            <tr>
                                                <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">Hostel Type</th><th class="button-column" id="item-grid_c2">Manage</th></tr>
                                            </thead>
                                            <tbody>
                                            <tr class="odd">
                                                <td width="10%">1</td><td width="45%">AC conditional</td><td width="45%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/hostel/hosteltype/update/id/7"><img src="" alt=""></a>   <a class="glyphicon glyphicon-remove" title="" href="/index.php/hostel/hosteltype/delete/id/7"><img src="" alt=""></a></td></tr>
                                            <tr class="even">
                                                <td width="10%">2</td><td width="45%">non AC conditional</td><td width="45%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/hostel/hosteltype/update/id/8"><img src="" alt=""></a>   <a class="glyphicon glyphicon-remove" title="" href="/index.php/hostel/hosteltype/delete/id/8"><img src="" alt=""></a></td></tr>
                                            </tbody>
                                        </table>
                                        <div class="pager"><ul id="yw0" class="yiiPager"><li class="first hidden"><a href="/index.php/hostel/hosteltype/create">&lt;&lt;</a></li>
                                                <li class="previous hidden"><a href="/index.php/hostel/hosteltype/create">&lt;</a></li>
                                                <li class="page selected"><a href="/index.php/hostel/hosteltype/create">1</a></li>
                                                <li class="page"><a href="/index.php/hostel/hosteltype/create/Hosteltype_page/2">2</a></li>
                                                <li class="next"><a href="/index.php/hostel/hosteltype/create/Hosteltype_page/2">&gt;</a></li>
                                                <li class="last"><a href="/index.php/hostel/hosteltype/create/Hosteltype_page/2">&gt;&gt;</a></li></ul></div><div class="keys" style="display:none" title="/index.php/hostel/hosteltype/create"><span>7</span><span>8</span><span>11</span><span>12</span><span>13</span><span>16</span><span>17</span><span>18</span><span>19</span><span>20</span></div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane active" id="tbb_b">
                        <form id="hosteldetails-form" action="/index.php/hostel/hosteldetails/create" method="post">                <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Add Hostel</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="reg_input" class="req">Hostel Type</label>
                                                    <select class="form-control" name="Hosteldetails[hosteltypeid]" id="Hosteldetails_hosteltypeid">
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
                                                    </select>                                        <div class="school_val_error" id="Hosteldetails_hosteltypeid_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="reg_input_name" class="req">Hostel Name</label>
                                                    <input class="form-control" name="Hosteldetails[hostel_name]" id="Hosteldetails_hostel_name" type="text" maxlength="256">                                        <div class="school_val_error" id="Hosteldetails_hostel_name_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="reg_input_name" class="req">Hostel Address</label>
                                                    <textarea class="form-control" name="Hosteldetails[hostel_address]" id="Hosteldetails_hostel_address"></textarea>                                        <div class="school_val_error" id="Hosteldetails_hostel_address_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="reg_input_name" class="req">Hostel Phone Number</label>
                                                    <input class="form-control" name="Hosteldetails[hostel_phone]" id="Hosteldetails_hostel_phone" type="text" maxlength="20">                                        <div class="school_val_error" id="Hosteldetails_hostel_phone_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="reg_input_name" class="req">Warden Name</label>
                                                    <input class="form-control" name="Hosteldetails[hostel_wardenname]" id="Hosteldetails_hostel_wardenname" type="text" maxlength="256">                                        <div class="school_val_error" id="Hosteldetails_hostel_wardenname_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="reg_input_name" class="req">Warden Address</label>
                                                    <textarea class="form-control" name="Hosteldetails[warden_address]" id="Hosteldetails_warden_address"></textarea>                                        <div class="school_val_error" id="Hosteldetails_warden_address_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="reg_input_name" class="req">Warden Phone Number</label>
                                                    <input class="form-control" name="Hosteldetails[warden_phone]" id="Hosteldetails_warden_phone" type="text">                                        <div class="school_val_error" id="Hosteldetails_warden_phone_em_" style="display:none"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="form_sep">
                                                        <button class="btn btn-info">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="grid-view" id="item-grid">
                                        <table class="items">
                                            <thead>
                                            <tr>
                                                <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">Hostel Name</th><th id="item-grid_c2">Hostel Type</th><th class="button-column" id="item-grid_c3">Manage</th></tr>
                                            </thead>
                                            <tbody>
                                            <tr class="even">
                                                <td width="10%">6</td><td width="10%">NEw Hostel</td><td width="10%">General</td><td width="5%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/hostel/hosteldetails/update/id/14"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/hostel/hosteldetails/view/id/14"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/hostel/hosteltype/deletehostel/id/14"><img src="" alt=""></a></td></tr>
                                            </tbody>
                                        </table>
                                        <div class="keys" style="display:none" title="/index.php/hostel/hosteltype/create"><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span><span>14</span><span>15</span><span>16</span><span>17</span><span>18</span></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>