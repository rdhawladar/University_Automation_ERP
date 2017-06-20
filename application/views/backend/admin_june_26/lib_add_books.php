<div class="row">
    <div class="col-md-12">
        <div class="content">
            <div class="content">
                <form id="librarybooks-form" action="/index.php/library/librarybooks/create" method="post">    <div class="col-sm-12">
                        <ul class="nav nav-tabs nav-tabs-highlight">
                            <li class="active"><a href="#tbb_a" data-toggle="tab">Add Books</a></li>
                            <li class=""><a href="#tbb_b" data-toggle="tab">Book List</a></li>
                        </ul>
                        <h6 class="content-group text-semibold"></h6>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tbb_a">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Add Books</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">Book ISBN No.</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_isbn]" id="Librarybooks_librarybooks_isbn" type="text" maxlength="256">                                        <div class="school_val_error" id="Librarybooks_librarybooks_isbn_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">Book No.</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_lbookno]" id="Librarybooks_librarybooks_lbookno" type="text" maxlength="45">                                        <div class="school_val_error" id="Librarybooks_librarybooks_lbookno_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">Title</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_title]" id="Librarybooks_librarybooks_title" type="text" maxlength="256">                                        <div class="school_val_error" id="Librarybooks_librarybooks_title_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">Author</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_author]" id="Librarybooks_librarybooks_author" type="text" maxlength="256">                                        <div class="school_val_error" id="Librarybooks_librarybooks_author_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">Edition</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_edition]" id="Librarybooks_librarybooks_edition" type="text" maxlength="256">                                        <div class="school_val_error" id="Librarybooks_librarybooks_edition_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input" class="req">Book Category</label>
                                                    <select class="form-control" name="Librarybooks[bookcategoryid]" id="Librarybooks_bookcategoryid">
                                                        <option value="">Select Option</option>
                                                        <option value="1">test2</option>
                                                        <option value="3">computer lab book</option>
                                                        <option value="4">computer sciences</option>
                                                        <option value="5">c programming</option>
                                                        <option value="7">computer sciences</option>
                                                        <option value="8">retest</option>
                                                        <option value="9">operating system</option>
                                                        <option value="10">question paper</option>
                                                        <option value="11">six class</option>
                                                        <option value="14">book1</option>
                                                        <option value="15">Tamil</option>
                                                        <option value="16">newcat</option>
                                                        <option value="17">JungleBook</option>
                                                        <option value="18">TEST</option>
                                                        <option value="19">Histroy Books</option>
                                                        <option value="20">Asp. net</option>
                                                        <option value="21">adad</option>
                                                        <option value="22">Maths</option>
                                                        <option value="23">asdd</option>
                                                        <option value="24">IITLib</option>
                                                        <option value="25">cbcb </option>
                                                        <option value="26">asdasd</option>
                                                    </select>                                        <div class="school_val_error" id="Librarybooks_bookcategoryid_em_" style="display:none"></div>                                    </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">Publisher</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_publisher]" id="Librarybooks_librarybooks_publisher" type="text" maxlength="256">                                        <div class="school_val_error" id="Librarybooks_librarybooks_publisher_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">No.of Copies</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_noofcopies]" id="Librarybooks_librarybooks_noofcopies" type="text" maxlength="45">                                        <div class="school_val_error" id="Librarybooks_librarybooks_noofcopies_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">Shelf No.</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_shelfno]" id="Librarybooks_librarybooks_shelfno" type="text" maxlength="45">                                        <div class="school_val_error" id="Librarybooks_librarybooks_shelfno_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">Book Position</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_bookposition]" id="Librarybooks_librarybooks_bookposition" type="text" maxlength="45">                                        <div class="school_val_error" id="Librarybooks_librarybooks_bookposition_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">Book Cost</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_cost]" id="Librarybooks_librarybooks_cost" type="text">                                        <div class="school_val_error" id="Librarybooks_librarybooks_cost_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input_name" class="req">Language</label>
                                                    <input class="form-control" name="Librarybooks[librarybooks_language]" id="Librarybooks_librarybooks_language" type="text">                                        <div class="school_val_error" id="Librarybooks_librarybooks_language_em_" style="display:none"></div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="reg_input" class="req">Book Condition</label>
                                                    <select class="form-control" name="Librarybooks[condition]" id="Librarybooks_condition">
                                                        <option value="">Select Option</option>
                                                        <option value="1">As New</option>
                                                        <option value="2">Fine</option>
                                                        <option value="3">Very Good</option>
                                                        <option value="4">Good</option>
                                                        <option value="5">Fair</option>
                                                        <option value="6">Poor</option>
                                                        <option value="7">Missing</option>
                                                        <option value="8">Lost</option>
                                                    </select>                                        <div class="school_val_error" id="Librarybooks_condition_em_" style="display:none"></div>                                    </div>
                                                <div class="row">
                                                    <div class="col-sm-5"><br>
                                                        <div class="form_sep">
                                                            <input class="btn btn-info" type="submit" name="yt0" value="Save">                                        </div>
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
                                                <h4 class="panel-title">Book List</h4>
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
                                                        <input type="text" id="search" class="form-control" placeholder="Search...">
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="grid-view table-responsive" id="item-grid">
                                                            <table class="items">
                                                                <thead>
                                                                <tr>
                                                                    <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">Book ISBN No.</th><th id="item-grid_c2">Book No.</th><th id="item-grid_c3">Title</th><th id="item-grid_c4">Status</th><th class="button-column" id="item-grid_c5">Manage</th></tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr class="odd">
                                                                    <td width="5%">1</td><td width="22.5%">3545</td><td width="22.5%">2511</td><td width="22.5%">C Programming</td><td width="22.5%">Available</td><td width="5%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/library/librarybooks/update/id/282"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/library/librarybooks/view/id/282"><img src="" alt=""></a></td></tr>
                                                                <tr class="even">
                                                                    <td width="5%">2</td><td width="22.5%">125-2528-5155-51</td><td width="22.5%">2568140</td><td width="22.5%">The Event Of the Day </td><td width="22.5%">Available</td><td width="5%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/library/librarybooks/update/id/281"><img src="" alt=""></a> <a class="glyphicon glyphicon-eye-open" title="" href="/index.php/library/librarybooks/view/id/281"><img src="" alt=""></a></td></tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="pager"><ul id="yw0" class="yiiPager"><li class="first hidden"><a href="/index.php/library/librarybooks/create">&lt;&lt;</a></li>
                                                                    <li class="previous hidden"><a href="/index.php/library/librarybooks/create">&lt;</a></li>
                                                                    <li class="page selected"><a href="/index.php/library/librarybooks/create">1</a></li>
                                                                    <li class="page"><a href="/index.php/library/librarybooks/create/Librarybooks_page/2">2</a></li>
                                                                    <li class="page"><a href="/index.php/library/librarybooks/create/Librarybooks_page/3">3</a></li>
                                                                    <li class="page"><a href="/index.php/library/librarybooks/create/Librarybooks_page/4">4</a></li>
                                                                    <li class="next"><a href="/index.php/library/librarybooks/create/Librarybooks_page/2">&gt;</a></li>
                                                                    <li class="last"><a href="/index.php/library/librarybooks/create/Librarybooks_page/29">&gt;&gt;</a></li></ul></div><div class="keys" style="display:none" title="/index.php/library/librarybooks/create"><span>290</span><span>289</span><span>288</span><span>287</span><span>286</span><span>285</span><span>284</span><span>283</span><span>282</span><span>281</span></div>
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
</div>