<div class="row">
    <div class="col-md-12">
        <div class="content">
            <div class="col-sm-12">
                <form id="bookreturn-form" action="/index.php/library/bookreturn/create" method="post">        <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Book Return</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-12">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="form-group col-sm-8">
                                                    <input class="form-control ui-autocomplete-input" placeholder="Search by Book No/ ISBN No/ Book Title/ Author" id="librarybook" type="text" value="" name="librarybook" autocomplete="off"><input id="hidden-field" name="output" type="hidden" value="">                                    </div>
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
                                            <div class="form-group">
                                                <label for="reg_input_name">Return / Renewal</label>
                                                <select class="form-control" name="Bookreturn[returnorrenewal]" id="Bookreturn_returnorrenewal">
                                                    <option value="">Select Option</option>
                                                    <option value="1">Return</option>
                                                    <option value="2">Renewal</option>
                                                </select>                                </div>
                                            <div class="form-group" id="datedifference" style="display: none;">
                                                <div class="alert alert-success">
                                                    <b>  <label id="tick"></label></b>
                                                </div>
                                            </div>
                                            <div class="form-group" id="duedate" style="display: none;">
                                                <label for="reg_input_name">Due Date</label>
                                                <input class="form-control hasDatepicker" placeholder="due date" id="Bookreturn_due_date" name="Bookreturn[due_date]" type="text">                                    <div class="school_val_error" id="Bookreturn_bookreturn_date_em_" style="display:none"></div>                                </div>

                                            <div class="form-group" id="returndate" style="display: block;">
                                                <label for="reg_input_name" class="req">Return Date</label>
                                                <input class="form-control hasDatepicker" placeholder="return date" id="Bookreturn_bookreturn_date" name="Bookreturn[bookreturn_date]" type="text">                                    <div class="school_val_error" id="Bookreturn_bookreturn_date_em_" style="display:none"></div>                                </div>
                                            <div class="form-group" id="fine" style="display: block;">
                                                <label for="Bookreturn_bookreturn_fineamount"> Fine Amount</label>                                    <input class="form-control" name="Bookreturn[bookreturn_fineamount]" id="Bookreturn_bookreturn_fineamount" type="text" maxlength="6">                                    <div class="school_val_error" id="Bookreturn_bookreturn_fineamount_em_" style="display:none"></div>                                </div>
                                            <div class="form-group" id="remarks" style="display: block;">
                                                <label>Remarks</label>
                                                <textarea class="form-control" name="Bookreturn[bookreturn_remarks]" id="Bookreturn_bookreturn_remarks"></textarea>                                    <div class="school_val_error" id="Bookreturn_bookreturn_remarks_em_" style="display:none"></div>                                </div>
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
                            <div class="grid-view" id="item-grid">
                                <table class="items">
                                    <thead>
                                    <tr>
                                        <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">Book No</th><th id="item-grid_c2">Book Return Date</th><th id="item-grid_c3">Fine Amount</th><th id="item-grid_c4">Remarks</th><th class="button-column" id="item-grid_c5">Manage</th></tr>
                                    </thead>
                                    <tbody>
                                    <tr class="odd">
                                        <td width="10%">1</td><td width="20%">1234</td><td width="20%">2016-05-12 00:00:00</td><td width="10%"></td><td width="10%">OK</td><td width="10%"> <a class="glyphicon glyphicon-remove" title="" href="/index.php/library/bookreturn/delete/id/27"><img src="" alt=""></a></td></tr>
                                    <tr class="even">
                                        <td width="10%">2</td><td width="20%">4561</td><td width="20%">2016-05-20 00:00:00</td><td width="10%">324</td><td width="10%">OK</td><td width="10%"> <a class="glyphicon glyphicon-remove" title="" href="/index.php/library/bookreturn/delete/id/28"><img src="" alt=""></a></td></tr>
                                    </tbody>
                                </table>
                                <div class="keys" style="display:none" title="/index.php/library/bookreturn/create"><span>27</span><span>28</span><span>31</span><span>32</span><span>33</span><span>35</span></div>
                            </div>
                        </div>
                    </div>
                </form>    </div>
        </div>
    </div>
</div>