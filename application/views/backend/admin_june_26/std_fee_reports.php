<div class="row">
    <div class="col-md-12">
        <div class="content">
            <form id="reports-form" action="/index.php/core/feesallocation/schoolwisefeereports" method="post">    <div class="col-sm-12">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="active"><a href="#tbb_a" data-toggle="tab">Individual Student</a></li>
                        <li class=""><a href="#tbb_b" data-toggle="tab">Batch</a></li>
                        <li class=""><a href="#tbb_c" data-toggle="tab">School</a></li>

                    </ul><br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tbb_a">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Individual Student Wise</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <label>Search</label>
                                                    <input placeholder="Student" class="form-control ui-autocomplete-input" id="student" type="text" value="" name="student" autocomplete="off"><input id="hidden-field" name="output" type="hidden" value="">                                        </div>
                                                <div class="form-group col-sm-3">
                                                    <label>&nbsp;</label>
                                                    <select class="form-control" name="reportof" id="reportof">
                                                        <option value="">Please Select</option>
                                                        <option value="1">Paid Report</option>
                                                        <option value="2">Due Report</option>
                                                    </select>                                        </div>
                                                <div class="form-group col-sm-3">
                                                    <label>&nbsp;</label><br>
                                                    <a href="javascript:individualreports()" class="btn btn-info">Go</a>
                                                </div>
                                                <div id="overlaygif1" style="display:none;"></div>
                                                <div class="col-sm-3">
                                                    <div class="form-group" align="right">
                                                        <input type="button" onclick="printDiv('print')" value="Print Report" class="btn btn-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="studentdetail" style="display:none">
                                                <div class="col-sm-12" id="print">
                                                    <div class="panel panel-body">
                                                        <table align="center">
                                                            <tbody id="studentdetails" style="font-size: 14px">

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
                        <div class="tab-pane " id="tbb_b">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Batch Wise</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <label for="reg_input">Course</label>
                                                    <select class="form-control" name="Feesallocation[courseid]" id="Feesallocation_courseid">
                                                        <option value="">Select Course</option>
                                                        <option value="1">rfgtf</option>
                                                        <option value="2">KG IId</option>
                                                        <option value="3">Pre School 1</option>
                                                        <option value="4">Pre School 2</option>
                                                        <option value="5">Year 1</option>
                                                        <option value="6">Year 2</option>
                                                        <option value="7">Year 3</option>
                                                        <option value="8">Year 4</option>
                                                        <option value="9">Year 5</option>
                                                        <option value="10">Computer COuerse</option>
                                                        <option value="11">network security</option>
                                                        <option value="12">asp.net</option>
                                                        <option value="13">eeeeee</option>
                                                        <option value="14">TOC</option>
                                                        <option value="15">php course</option>
                                                        <option value="16">Jesus</option>
                                                        <option value="17">vba</option>
                                                        <option value="18">Engg</option>
                                                        <option value="19">NewCourse</option>
                                                        <option value="22">zzz</option>
                                                        <option value="23">A1</option>
                                                        <option value="24">A1A</option>
                                                        <option value="25">dld</option>
                                                        <option value="26">Nursery</option>
                                                        <option value="27">cs</option>
                                                        <option value="29">test1</option>
                                                        <option value="30">PGDEMS</option>
                                                        <option value="31">md-1</option>
                                                        <option value="32">Maths Biology</option>
                                                        <option value="33">Kindergarten </option>
                                                        <option value="34">math</option>
                                                        <option value="35">asada</option>
                                                        <option value="36">asdsa</option>
                                                        <option value="37">asdasd</option>
                                                        <option value="38">ab</option>
                                                        <option value="39">DCA</option>
                                                        <option value="40">MPCEMJ1</option>
                                                        <option value="41">MPCEMJ2</option>
                                                        <option value="42">12 sdf</option>
                                                        <option value="43">GEN</option>
                                                        <option value="44">Math1</option>
                                                        <option value="45">enc 1101</option>
                                                        <option value="46">Computer Science </option>
                                                        <option value="47">Class II</option>
                                                        <option value="48">ece</option>
                                                        <option value="49">SSLC</option>
                                                        <option value="50">Plus 2</option>
                                                        <option value="51">civils</option>
                                                        <option value="52">civ</option>
                                                        <option value="53">dhdf</option>
                                                        <option value="54">ba</option>
                                                        <option value="55">BBM</option>
                                                        <option value="56">HappyMan</option>
                                                        <option value="57">se</option>
                                                        <option value="58">fgd</option>
                                                        <option value="59">sia</option>
                                                        <option value="60">Pre School 11</option>
                                                        <option value="61">bbc india</option>
                                                        <option value="62">English</option>
                                                        <option value="63">abc</option>
                                                        <option value="64">dddddddddd</option>
                                                        <option value="65">dddnk</option>
                                                        <option value="66">Standard 1st</option>
                                                        <option value="67">1st class</option>
                                                        <option value="68">inter</option>
                                                        <option value="69">dfsafd</option>
                                                        <option value="70">robotics</option>
                                                        <option value="71">Lehrgang</option>
                                                        <option value="72">Kurs</option>
                                                        <option value="73">fyjc</option>
                                                        <option value="74">asd</option>
                                                        <option value="75">fffff</option>
                                                        <option value="76">physcis</option>
                                                        <option value="77">kljdfs</option>
                                                        <option value="78">Master of Computer Application</option>
                                                        <option value="79">dfgfdg</option>
                                                        <option value="80">X-A</option>
                                                        <option value="81">Science</option>
                                                        <option value="82">IIT</option>
                                                    </select>                                        </div>

                                                <div class="form-group col-sm-3">
                                                    <label for="reg_input">Batch</label>
                                                    <select class="form-control" name="Feesallocation[batchid]" id="Feesallocation_batchid">
                                                        <option value="">Select Batch</option>
                                                    </select>                                        </div>
                                                <div class="form-group col-sm-3">
                                                    <label>&nbsp;</label>
                                                    <select class="form-control" name="reportof1" id="reportof1">
                                                        <option value="">Please Select</option>
                                                        <option value="1">Paid Report</option>
                                                        <option value="2">Due Report</option>
                                                    </select>                                        </div>
                                                <div class="form-group col-sm-3">
                                                    <label>&nbsp;</label><br>
                                                    <a href="javascript:batchwisereports()" class="btn btn-info" id="batchwisebutton">Go</a>
                                                </div><div id="overlaygif2" style="display:none;"></div>
                                                <div class="col-sm-12">
                                                    <div class="form-group" align="right">
                                                        <input type="button" onclick="printDiv('print1')" value="Print Report" class="btn btn-danger">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="batchwise" style="display:none">
                                    <div class="col-sm-12" id="print1">
                                        <div class="panel panel-body">
                                            <div class="table-responsive">
                                                <table class="table responsive table-bordered table-striped footable" id="reportforunpaidlist">
                                                    <thead>
                                                    <tr>
                                                        <th width="5">Sl No.</th>
                                                        <th width="14.28">Student Admission.No</th>
                                                        <th data-hide="phone,tablet" width="14.28">Student Name</th>
                                                        <th data-hide="phone,tablet" width="14.28">Course</th>
                                                        <th data-hide="phone,tablet" width="14.28">Batch</th>
                                                        <th data-hide="phone,tablet" width="14.28">Guardian Name</th>
                                                        <th data-hide="phone,tablet" width="14.28">Guardian Contact No.</th>
                                                        <th data-hide="phone,tablet" width="14.28">Total Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="batchwisedetails">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="tbb_c">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">School Wise</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <label for="reg_input">Course</label>
                                                    <select class="form-control" name="Feesallocation[courseid1]" id="Feesallocation_courseid1">
                                                        <option value="">Select Course</option>
                                                        <option value="1">rfgtf</option>
                                                        <option value="2">KG IId</option>
                                                        <option value="3">Pre School 1</option>
                                                        <option value="4">Pre School 2</option>
                                                        <option value="5">Year 1</option>
                                                        <option value="6">Year 2</option>
                                                        <option value="7">Year 3</option>
                                                        <option value="8">Year 4</option>
                                                        <option value="9">Year 5</option>
                                                        <option value="10">Computer COuerse</option>
                                                        <option value="11">network security</option>
                                                        <option value="12">asp.net</option>
                                                        <option value="13">eeeeee</option>
                                                        <option value="14">TOC</option>
                                                        <option value="15">php course</option>
                                                        <option value="16">Jesus</option>
                                                        <option value="17">vba</option>
                                                        <option value="18">Engg</option>
                                                        <option value="19">NewCourse</option>
                                                        <option value="22">zzz</option>
                                                        <option value="23">A1</option>
                                                        <option value="24">A1A</option>
                                                        <option value="25">dld</option>
                                                        <option value="26">Nursery</option>
                                                        <option value="27">cs</option>
                                                        <option value="29">test1</option>
                                                        <option value="30">PGDEMS</option>
                                                        <option value="31">md-1</option>
                                                        <option value="32">Maths Biology</option>
                                                        <option value="33">Kindergarten </option>
                                                        <option value="34">math</option>
                                                        <option value="35">asada</option>
                                                        <option value="36">asdsa</option>
                                                        <option value="37">asdasd</option>
                                                        <option value="38">ab</option>
                                                        <option value="39">DCA</option>
                                                        <option value="40">MPCEMJ1</option>
                                                        <option value="41">MPCEMJ2</option>
                                                        <option value="42">12 sdf</option>
                                                        <option value="43">GEN</option>
                                                        <option value="44">Math1</option>
                                                        <option value="45">enc 1101</option>
                                                        <option value="46">Computer Science </option>
                                                        <option value="47">Class II</option>
                                                        <option value="48">ece</option>
                                                        <option value="49">SSLC</option>
                                                        <option value="50">Plus 2</option>
                                                        <option value="51">civils</option>
                                                        <option value="52">civ</option>
                                                        <option value="53">dhdf</option>
                                                        <option value="54">ba</option>
                                                        <option value="55">BBM</option>
                                                        <option value="56">HappyMan</option>
                                                        <option value="57">se</option>
                                                        <option value="58">fgd</option>
                                                        <option value="59">sia</option>
                                                        <option value="60">Pre School 11</option>
                                                        <option value="61">bbc india</option>
                                                        <option value="62">English</option>
                                                        <option value="63">abc</option>
                                                        <option value="64">dddddddddd</option>
                                                        <option value="65">dddnk</option>
                                                        <option value="66">Standard 1st</option>
                                                        <option value="67">1st class</option>
                                                        <option value="68">inter</option>
                                                        <option value="69">dfsafd</option>
                                                        <option value="70">robotics</option>
                                                        <option value="71">Lehrgang</option>
                                                        <option value="72">Kurs</option>
                                                        <option value="73">fyjc</option>
                                                        <option value="74">asd</option>
                                                        <option value="75">fffff</option>
                                                        <option value="76">physcis</option>
                                                        <option value="77">kljdfs</option>
                                                        <option value="78">Master of Computer Application</option>
                                                        <option value="79">dfgfdg</option>
                                                        <option value="80">X-A</option>
                                                        <option value="81">Science</option>
                                                        <option value="82">IIT</option>
                                                    </select>                                        </div>
                                                <div class="form-group col-sm-3">
                                                    <label>&nbsp;</label>
                                                    <select class="form-control" name="reportof2" id="reportof2">
                                                        <option value="">Please Select</option>
                                                        <option value="1">Paid Report</option>
                                                        <option value="2">Due Report</option>
                                                    </select>                                        </div>
                                                <div class="form-group col-sm-3">
                                                    <label>&nbsp;</label><br>
                                                    <!--<a href="javascript:schoolwisereports()" class="btn btn-info">Go</a>-->
                                                    <p>&nbsp;&nbsp;<button class="btn btn-info" align="right">Excel</button></p>
                                                </div><div id="overlaygif3" style="display:none;"></div>
                                                <!--                                        <div class="col-sm-3">
                                                                                            <div class="form-group" align="right">
                                                                                                <input type="button" onclick="printDiv('print2')" value="Print Report" class="btn btn-danger"/>
                                                                                            </div>
                                                                                        </div>-->
                                            </div>
                                            <div class="row" id="schoolwise" style="display:none">
                                                <div class="col-sm-12" id="print2">
                                                    <div class="panel panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table responsive table-bordered table-striped footable" id="reportforunpaidlist">
                                                                <thead>
                                                                <tr>
                                                                    <th width="14.28">Student Admission.No</th>
                                                                    <th data-hide="phone,tablet" width="14.28">Student Name</th>
                                                                    <th data-hide="phone,tablet" width="14.28">Course</th>
                                                                    <th data-hide="phone,tablet" width="14.28">Batch</th>
                                                                    <th data-hide="phone,tablet" width="14.28">Guardian Name</th>
                                                                    <th data-hide="phone,tablet" width="14.28">Guardian Contact No.</th>
                                                                    <th data-hide="phone,tablet" width="14.28">Total Amount</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="schoolwisedetails">

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
                    </div>
                </div>
            </form></div>
    </div>
</div>