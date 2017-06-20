<div class="row">
    <div class="col-md-12">
        <div class="content">

            <form enctype="multipart/form-data" id="feetemplate-form" action="/index.php/core/feetemplate/create" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Fee Template</h4>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-12">
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label for="reg_input" class="req">Fees Category</label>
                                            <select class="form-control" name="Feetemplate[feescategoryid]" id="Feetemplate_feescategoryid">
                                                <option value="">Please Select</option>
                                                <option value="1">first</option>
                                                <option value="2">Trans</option>
                                                <option value="3">FeeCata</option>
                                                <option value="4">Hostel </option>
                                                <option value="5">Pension</option>
                                                <option value="6">school</option>
                                                <option value="7">Trans-07</option>
                                                <option value="8">tuition fee</option>
                                                <option value="9">Admission Fee</option>
                                                <option value="10">Other Fee</option>
                                                <option value="11">Transport</option>
                                                <option value="12">Exam Fees</option>
                                                <option value="13">transport</option>
                                                <option value="14">Testing</option>
                                                <option value="15">school fee</option>
                                                <option value="16">activities</option>
                                                <option value="17">Trans</option>
                                                <option value="18">Trans-01</option>
                                                <option value="19">Trans-2333</option>
                                                <option value="20">Trans-0265</option>
                                                <option value="21">HUM fees</option>
                                                <option value="22">transport </option>
                                                <option value="23">Pramod</option>
                                                <option value="24">Trans-tha1</option>
                                                <option value="25">School Trip/Activity</option>
                                                <option value="26">Trans-321</option>
                                                <option value="27">Tution Fee</option>
                                                <option value="28">fines</option>
                                                <option value="29">Adminssion Fees</option>
                                                <option value="30">sdfsd</option>
                                                <option value="33">Tution Fee</option>
                                                <option value="34">555lk</option>
                                                <option value="35">Trans-111</option>
                                                <option value="36">Testing Fee 2016</option>
                                                <option value="37">Trans-420</option>
                                                <option value="38">Trans-2654532kjim87 7</option>
                                                <option value="39">dshdhdshd</option>
                                                <option value="40">adasdas</option>
                                                <option value="41">Trans-RC123</option>
                                                <option value="42">Fee Category</option>
                                                <option value="43">colleegefees</option>
                                                <option value="44">ATGFee</option>
                                                <option value="45">Trans-101</option>
                                                <option value="46">sports</option>
                                                <option value="47">Junior College</option>
                                                <option value="48">Trans-01</option>
                                                <option value="49">Trans-NH-18</option>
                                                <option value="50">Tuition Fees</option>
                                                <option value="51">Admission Fees</option>
                                                <option value="52">Transport Fees</option>
                                                <option value="53">1 tear</option>
                                                <option value="54">FeeCatgoryType1</option>
                                                <option value="55">Trans-st</option>
                                                <option value="56">term fee </option>
                                                <option value="57">rthgfnj</option>
                                                <option value="58">registration fee</option>
                                                <option value="59">Trans-12333</option>
                                                <option value="60">This is new</option>
                                                <option value="61">Trans-001</option>
                                                <option value="62">transport fees</option>
                                                <option value="63">Trans</option>
                                                <option value="64">BOOK FEE</option>
                                            </select><div class="school_val_error" id="Feetemplate_feescategoryid_em_" style="display:none"></div>                                        </div>
                                        <div class="form-group">
                                            <label class="req">Template Name</label>
                                            <input class="form-control" name="Feetemplate[template_name]" id="Feetemplate_template_name" type="text"><div class="school_val_error" id="Feetemplate_template_name_em_" style="display:none"></div>                                    </div>
                                        <div class="alert alert-info"><strong>Header</strong></div>

                                        <div class="form-group">
                                            <label>If default institution details</label>&nbsp;&nbsp;&nbsp;
                                            <input id="ytFeetemplate_isdefault" type="hidden" value="0" name="Feetemplate[isdefault]"><input name="Feetemplate[isdefault]" id="Feetemplate_isdefault" value="1" type="checkbox"><div class="school_val_error" id="Feetemplate_isdefault_em_" style="display:none"></div>                                    </div>

                                        <div id="default">

                                            <!--                                    <div class="form-group">
                                                                                                                        </div>-->

                                            <div class="form-group" id="institutionname">
                                                <label>Institution Name</label>
                                                <input size="60" maxlength="100" class="form-control" name="Feetemplate[schoolname]" id="Feetemplate_schoolname" type="text"><div class="school_val_error" id="Feetemplate_schoolname_em_" style="display:none"></div>                                    </div>

                                            <div class="form-group" id="institutionaddress">
                                                <label>Institution Address</label>
                                                <textarea size="60" maxlength="100" class="form-control" name="Feetemplate[school_address]" id="Feetemplate_school_address"></textarea><div class="school_val_error" id="Feetemplate_school_address_em_" style="display:none"></div>                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form_sep">
                                            <input class="btn btn-info" name="std_reg_submit" id="std_reg_submit" type="submit" value="Save">                                </div>
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
                                    <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">Fees Category</th><th id="item-grid_c2">Template Nmae</th><th class="button-column" id="item-grid_c3">Manage</th></tr>
                                </thead>
                                <tbody>
                                <tr class="odd">
                                    <td width="5%">1</td><td width="35%">FeeCata</td><td width="35%">Testing</td><td width="25%"><a class="glyphicon glyphicon-eye-open" target="_blank" title="" href="/index.php/core/feetemplate/view/id/2"><img src="" alt=""></a>  <a class="glyphicon glyphicon-pencil" title="" href="/index.php/core/feetemplate/update/id/2"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/core/feetemplate/delete/id/2"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="5%">2</td><td width="35%">Hostel </td><td width="35%">LHS</td><td width="25%"><a class="glyphicon glyphicon-eye-open" target="_blank" title="" href="/index.php/core/feetemplate/view/id/3"><img src="" alt=""></a>  <a class="glyphicon glyphicon-pencil" title="" href="/index.php/core/feetemplate/update/id/3"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/core/feetemplate/delete/id/3"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="5%">3</td><td width="35%">school</td><td width="35%">school2</td><td width="25%"><a class="glyphicon glyphicon-eye-open" target="_blank" title="" href="/index.php/core/feetemplate/view/id/4"><img src="" alt=""></a>  <a class="glyphicon glyphicon-pencil" title="" href="/index.php/core/feetemplate/update/id/4"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/core/feetemplate/delete/id/4"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="5%">4</td><td width="35%">Admission Fee</td><td width="35%">Default Template</td><td width="25%"><a class="glyphicon glyphicon-eye-open" target="_blank" title="" href="/index.php/core/feetemplate/view/id/5"><img src="" alt=""></a>  <a class="glyphicon glyphicon-pencil" title="" href="/index.php/core/feetemplate/update/id/5"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/core/feetemplate/delete/id/5"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="5%">5</td><td width="35%">Trans</td><td width="35%">aa</td><td width="25%"><a class="glyphicon glyphicon-eye-open" target="_blank" title="" href="/index.php/core/feetemplate/view/id/6"><img src="" alt=""></a>  <a class="glyphicon glyphicon-pencil" title="" href="/index.php/core/feetemplate/update/id/6"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/core/feetemplate/delete/id/6"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="5%">6</td><td width="35%">Pramod</td><td width="35%">Pramod Template</td><td width="25%"><a class="glyphicon glyphicon-eye-open" target="_blank" title="" href="/index.php/core/feetemplate/view/id/7"><img src="" alt=""></a>  <a class="glyphicon glyphicon-pencil" title="" href="/index.php/core/feetemplate/update/id/7"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/core/feetemplate/delete/id/7"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="5%">7</td><td width="35%">Exam Fees</td><td width="35%">uhj</td><td width="25%"><a class="glyphicon glyphicon-eye-open" target="_blank" title="" href="/index.php/core/feetemplate/view/id/8"><img src="" alt=""></a>  <a class="glyphicon glyphicon-pencil" title="" href="/index.php/core/feetemplate/update/id/8"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/core/feetemplate/delete/id/8"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="5%">8</td><td width="35%">Testing Fee 2016</td><td width="35%">Test Template 2016</td><td width="25%"><a class="glyphicon glyphicon-eye-open" target="_blank" title="" href="/index.php/core/feetemplate/view/id/9"><img src="" alt=""></a>  <a class="glyphicon glyphicon-pencil" title="" href="/index.php/core/feetemplate/update/id/9"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/core/feetemplate/delete/id/9"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="5%">9</td><td width="35%">school fee</td><td width="35%">School Fee</td><td width="25%"><a class="glyphicon glyphicon-eye-open" target="_blank" title="" href="/index.php/core/feetemplate/view/id/10"><img src="" alt=""></a>  <a class="glyphicon glyphicon-pencil" title="" href="/index.php/core/feetemplate/update/id/10"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/core/feetemplate/delete/id/10"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="5%">10</td><td width="35%">Junior College</td><td width="35%">Greate</td><td width="25%"><a class="glyphicon glyphicon-eye-open" target="_blank" title="" href="/index.php/core/feetemplate/view/id/12"><img src="" alt=""></a>  <a class="glyphicon glyphicon-pencil" title="" href="/index.php/core/feetemplate/update/id/12"><img src="" alt=""></a>  <a class="glyphicon glyphicon-remove" title="" href="/index.php/core/feetemplate/delete/id/12"><img src="" alt=""></a></td></tr>
                                </tbody>
                            </table>
                            <div class="pager"><ul id="yw0" class="yiiPager"><li class="first hidden"><a href="/index.php/core/feetemplate/create">&lt;&lt;</a></li>
                                    <li class="previous hidden"><a href="/index.php/core/feetemplate/create">&lt;</a></li>
                                    <li class="page selected"><a href="/index.php/core/feetemplate/create">1</a></li>
                                    <li class="page"><a href="/index.php/core/feetemplate/create/Feetemplate_page/2">2</a></li>
                                    <li class="next"><a href="/index.php/core/feetemplate/create/Feetemplate_page/2">&gt;</a></li>
                                    <li class="last"><a href="/index.php/core/feetemplate/create/Feetemplate_page/2">&gt;&gt;</a></li></ul></div><div class="keys" style="display:none" title="/index.php/core/feetemplate/create"><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>12</span></div>
                        </div>
                    </div>
                </div>

            </form>    </div>
    </div>
</div>