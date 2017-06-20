<div class="row">
    <div class="col-md-12">
        <div class="content">
            <form id="bookissue-form" action="/index.php/library/bookissue/create" method="post">    <div class="col-sm-12">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="active"><a href="#tbb_a" data-toggle="tab">Issue Book</a></li>
                        <li class=""><a href="#tbb_b" data-toggle="tab">Issued List</a></li>
                    </ul>
                    <h6 class="content-group text-semibold"></h6>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tbb_a">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Book Issue </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-sm-12">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="form-group col-sm-8">
                                                            <input class="form-control ui-autocomplete-input" placeholder="Search by Book No/ ISBN No/ Book Title/ Author" id="librarybook" type="text" value="" name="librarybook" autocomplete="off"><input id="hidden-field" name="output" type="hidden" value="">                                            </div>
                                                        <div class="col-sm-4">
                                                            <label>&nbsp;</label>
                                                            <a href="javascript:getbookdetails()" class="btn btn-info">Search</a>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="bookdetail" style="display:none">
                                                        <div class="col-sm-12">
                                                            <div class="panel panel-body">
                                                                <table align="center">
                                                                    <tbody id="bookdetails" style="font-size: 14px">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group success">
                                                        <label class="req" for="Bookissue_usertypeid">User Type</label>                                            <select class="form-control" name="Bookissue[usertypeid]" id="Bookissue_usertypeid">
                                                            <option value="">Select Type</option>
                                                            <option value="1">Student</option>
                                                            <option value="2">Faculty</option>
                                                        </select>                                            <div class="school_val_error" id="Bookissue_usertypeid_em_" style="display:none"></div>                                        </div>

                                                    <div class="form-group" id="studentautocomplete">
                                                        <input class="form-control ui-autocomplete-input" placeholder="Search Student" id="student" type="text" value="" name="student" autocomplete="off">
                                                    </div>
                                                    <div class="form-group" id="employeeautocomplete">
                                                        <input class="form-control ui-autocomplete-input" placeholder="Search Faculty" id="employee" type="text" value="" name="employee" autocomplete="off">                                        </div>
                                                    <div class="form-group">
                                                        <label class="req" for="Bookissue_bookissue_issuedate">Book Issue Date</label>                                            <input class="form-control hasDatepicker" placeholder="start date" id="Bookissue_bookissue_issuedate" name="Bookissue[bookissue_issuedate]" type="text">                                            <div class="school_val_error" id="Bookissue_bookissue_issuedate_em_" style="display:none"></div>                                            <!--<span class="help-block">dd-mm-yyyy</span>-->

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="reg_input_name" class="req">Due Date</label>
                                                        <input class="form-control hasDatepicker" placeholder="start date" id="Bookissue_bookissue_duedate" name="Bookissue[bookissue_duedate]" type="text">                                            <div class="school_val_error" id="Bookissue_bookissue_duedate_em_" style="display:none"></div>                                                <!--<span class="help-block">dd-mm-yyyy</span>-->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="form_sep">
                                                        <input class="btn btn-info" name="std_reg_submit" id="std_reg_submit" type="submit" value="Create">                                        </div>
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
                                            <h4 class="panel-title">Issued List</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="search" class="form-control" placeholder="Search by book number">
                                                </div>
                                            </div><br>
                                            <div class="col-sm-12">
                                                <div class="grid-view table-responsive" id="item-grid">
                                                    <table class="items">
                                                        <thead>
                                                        <tr>
                                                            <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">User Type</th><th id="item-grid_c2">User</th><th id="item-grid_c3">Book No</th><th id="item-grid_c4">Title</th><th id="item-grid_c5">Book Issue Date</th><th id="item-grid_c6">Book Due Date</th></tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr class="odd">
                                                            <td width="10%">1</td><td width="10%">Faculty</td><td width="20%">CSE003</td><td width="20%">13</td><td width="20%">abc</td><td width="20%">2016-Jun-09</td><td width="20%">2016-Jun-16</td></tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="keys" style="display:none" title="/index.php/library/bookissue/create"><span>21</span></div>
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