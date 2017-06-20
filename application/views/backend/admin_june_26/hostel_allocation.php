<div class="row">
    <div class="col-md-12">
        <div class="content">
            <div class="col-sm-12">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#tbb_a" data-toggle="tab">Hostel Registration</a></li>
                    <li class=""><a href="#tbb_b" data-toggle="tab">Allocated List</a></li>
                </ul><br>
                <div class="tab-content">
                    <div class="tab-pane active" id="tbb_a">
                        <form id="hostelregistration-form" action="/index.php/hostel/hostelregistration/create" method="post">                <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Hostel Registration</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-sm-12">
                                                <div class="panel-body">
                                                    <div class="form-group col-sm-6">
                                                        <label>User Type</label>
                                                        <select class="form-control" name="Hostelregistration[usertypeid]" id="Hostelregistration_usertypeid">
                                                            <option value="">Select Type</option>
                                                            <option value="1">Student</option>
                                                            <option value="2">Employee</option>
                                                        </select>                                            <div class="school_val_error" id="Hostelregistration_usertypeid_em_" style="display:none"></div>                                        </div>

                                                    <div class="form-group col-sm-6" id="studentautocomplete" style="display:none">
                                                        <label>Student Name</label>
                                                        <input class="form-control ui-autocomplete-input" id="student" type="text" value="" name="student" autocomplete="off">                                        </div>
                                                    <div class="form-group col-sm-6" id="employeeautocomplete" style="display:none">
                                                        <label>Employee Name</label>
                                                        <input class="form-control ui-autocomplete-input" id="employee" type="text" value="" name="employee" autocomplete="off">                                        </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="reg_input" class="req">Hostel Type</label>
                                                        <select class="form-control" name="Hostelregistration[hosteltypeid]" id="Hostelregistration_hosteltypeid">
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
                                                        </select>                                            <div class="school_val_error" id="Hostelregistration_hosteltypeid_em_" style="display:none"></div>                                        </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="reg_input" class="req">Hostel Name</label>
                                                        <select class="form-control" name="Hostelregistration[hosteldetailsid]" id="Hostelregistration_hosteldetailsid">
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
                                                        </select>                                            <div class="school_val_error" id="Hostelregistration_hosteldetailsid_em_" style="display:none"></div>                                        </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="reg_input_name" class="req">Hostel Room</label>
                                                        <select class="form-control" name="Hostelregistration[hostelroomid]" id="Hostelregistration_hostelroomid">
                                                            <option value="">Select Option</option>
                                                            <option value="5">143</option>
                                                            <option value="6">143</option>
                                                            <option value="7">143</option>
                                                            <option value="8">143</option>
                                                            <option value="9">143</option>
                                                            <option value="10">143</option>
                                                            <option value="11">143</option>
                                                            <option value="12">143</option>
                                                            <option value="13">143</option>
                                                            <option value="14">143</option>
                                                            <option value="15">143</option>
                                                            <option value="16">143</option>
                                                            <option value="17">41</option>
                                                            <option value="18">41</option>
                                                            <option value="19">41</option>
                                                            <option value="20">41</option>
                                                            <option value="21">41</option>
                                                            <option value="22">41</option>
                                                            <option value="23">41</option>
                                                            <option value="24">41</option>
                                                            <option value="25">41</option>
                                                            <option value="26">41</option>
                                                            <option value="27">41</option>
                                                            <option value="28">41</option>
                                                            <option value="29">41</option>
                                                            <option value="30">111</option>
                                                            <option value="31">111</option>
                                                            <option value="32">111</option>
                                                            <option value="33">111</option>
                                                            <option value="34">111</option>
                                                            <option value="35">111</option>
                                                            <option value="36">111</option>
                                                            <option value="37">111</option>
                                                            <option value="38">111</option>
                                                            <option value="39">12</option>
                                                            <option value="40">12</option>
                                                            <option value="41"></option>
                                                            <option value="42">2</option>
                                                            <option value="43">2</option>
                                                            <option value="44">2</option>
                                                            <option value="45">2</option>
                                                            <option value="46">2</option>
                                                            <option value="47">2</option>
                                                            <option value="48">2</option>
                                                            <option value="49">2</option>
                                                            <option value="51">1</option>
                                                            <option value="52">1</option>
                                                            <option value="53">20</option>
                                                            <option value="54">20</option>
                                                            <option value="55">20</option>
                                                            <option value="56">20</option>
                                                            <option value="57">20</option>
                                                            <option value="58">20</option>
                                                            <option value="59">20</option>
                                                            <option value="61">125</option>
                                                            <option value="62">125</option>
                                                            <option value="63">125</option>
                                                            <option value="64">125</option>
                                                            <option value="65">125</option>
                                                            <option value="66">125</option>
                                                            <option value="67">125</option>
                                                            <option value="68">125</option>
                                                            <option value="69">125</option>
                                                            <option value="70">125</option>
                                                            <option value="71">125</option>
                                                            <option value="72">125</option>
                                                            <option value="73">125</option>
                                                            <option value="74">1</option>
                                                            <option value="75">1</option>
                                                            <option value="76">1</option>
                                                            <option value="77">1</option>
                                                            <option value="78">1</option>
                                                            <option value="79">1</option>
                                                            <option value="80">1</option>
                                                            <option value="81">1</option>
                                                            <option value="82">1</option>
                                                            <option value="83">1</option>
                                                            <option value="84">1</option>
                                                            <option value="85">1</option>
                                                            <option value="86">1</option>
                                                            <option value="87">1</option>
                                                            <option value="88">1</option>
                                                            <option value="89">1</option>
                                                            <option value="90">1</option>
                                                            <option value="91">1</option>
                                                            <option value="92">1</option>
                                                            <option value="93">1</option>
                                                            <option value="94">1</option>
                                                            <option value="95">1</option>
                                                            <option value="96">1</option>
                                                            <option value="97">1</option>
                                                            <option value="98">1</option>
                                                            <option value="99">1</option>
                                                            <option value="100">1</option>
                                                            <option value="101">1</option>
                                                            <option value="102">1</option>
                                                            <option value="103">1</option>
                                                            <option value="104">1</option>
                                                            <option value="105">1</option>
                                                        </select>                                            <div class="school_val_error" id="Hostelregistration_hostelroomid_em_" style="display:none"></div>
                                                        <!--<span class="help-block">dd-mm-yyyy</span>-->
                                                    </div>
                                                    <div class="form-group col-sm-12" id="availablebeds">

                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="req" for="Hostelregistration_hostelregistration_date">Hostel Registration Date</label>                                            <input class="form-control hasDatepicker" placeholder="start date" id="Hostelregistration_hostelregistration_date" name="Hostelregistration[hostelregistration_date]" type="text">                                            <div class="school_val_error" id="Hostelregistration_hostelregistration_date_em_" style="display:none"></div>                                        </div>

                                                    <div class="form-group col-sm-6">
                                                        <label for="Hostelregistration_vacatingdate">Vacating Date</label>                                            <input class="form-control hasDatepicker" placeholder="start date" id="vacatingdate" name="Hostelregistration[vacatingdate]" type="text">                                            <!--<span class="help-block">dd-mm-yyyy</span>-->

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
                                            <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">User Type</th><th id="item-grid_c2">User</th><th id="item-grid_c3">Hostel</th><th id="item-grid_c4">Floor Name</th><th id="item-grid_c5">Hostel Room</th><th id="item-grid_c6">Hostel Registration Date</th><th id="item-grid_c7">Vacatimg Date</th><th class="button-column" id="item-grid_c8">Manage</th></tr>
                                        </thead>
                                        <tbody>
                                        <tr class="odd">
                                            <td width="10%">1</td><td width="10%">Student</td><td width="20%">std002323</td><td width="20%">&nbsp;</td><td width="20%">&nbsp;</td><td width="20%">&nbsp;</td><td width="20%">2016-May-30</td><td width="8%">2016-May-30</td><td width="10%"><a class="glyphicon glyphicon-remove" title="" href="/index.php/hostel/hostelregistration/delete/id/248"><img src="" alt=""></a></td></tr>
                                        <tr class="even">
                                            <td width="10%">2</td><td width="10%">Student</td><td width="20%"> -   </td><td width="20%">bbb</td><td width="20%">1</td><td width="20%">1</td><td width="20%">2016-May-10</td><td width="8%">2016-May-17</td><td width="10%"><a class="glyphicon glyphicon-remove" title="" href="/index.php/hostel/hostelregistration/delete/id/241"><img src="" alt=""></a></td></tr>
                                        </tbody>
                                    </table>
                                    <div class="pager"><ul id="yw0" class="yiiPager"><li class="first hidden"><a href="/index.php/hostel/hostelregistration/create">&lt;&lt;</a></li>
                                            <li class="previous hidden"><a href="/index.php/hostel/hostelregistration/create">&lt;</a></li>
                                            <li class="page selected"><a href="/index.php/hostel/hostelregistration/create">1</a></li>
                                            <li class="page"><a href="/index.php/hostel/hostelregistration/create/Hostelregistration_page/2">2</a></li>
                                            <li class="page"><a href="/index.php/hostel/hostelregistration/create/Hostelregistration_page/3">3</a></li>
                                            <li class="page"><a href="/index.php/hostel/hostelregistration/create/Hostelregistration_page/4">4</a></li>
                                            <li class="next"><a href="/index.php/hostel/hostelregistration/create/Hostelregistration_page/2">&gt;</a></li>
                                            <li class="last"><a href="/index.php/hostel/hostelregistration/create/Hostelregistration_page/22">&gt;&gt;</a></li></ul></div><div class="keys" style="display:none" title="/index.php/hostel/hostelregistration/create"><span>248</span><span>247</span><span>246</span><span>245</span><span>244</span><span>243</span><span>242</span><span>241</span><span>240</span><span>239</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>