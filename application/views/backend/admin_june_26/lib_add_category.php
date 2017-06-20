<div class="row">
    <div class="col-md-12">
        <div class="content">
            <form id="bookcategory-form" action="/index.php/library/bookcategory/create" method="post">    <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Add Book Category</h4>
                            </div>
                            <div class="panel-body">
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label for="reg_input_name" class="req">Category Name</label>
                                        <input size="84" maxlength="45" class="form-control" name="Bookcategory[bookcategory_name]" id="Bookcategory_bookcategory_name" type="text">                            <div class="school_val_error" id="Bookcategory_bookcategory_name_em_" style="display:none"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="reg_input_name">Section Code</label>
                                        <input class="form-control" name="Bookcategory[bookcategory_sectioncode]" id="Bookcategory_bookcategory_sectioncode" type="text">                            <div class="school_val_error" id="Bookcategory_bookcategory_sectioncode_em_" style="display:none"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form_sep">
                                            <input class="btn btn-info" type="submit" name="yt0" value="Save">                            </div>
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
                                    <th id="item-grid_c0">Sl.No.</th><th id="item-grid_c1">Book Category</th><th id="item-grid_c2">Section Code</th><th class="button-column" id="item-grid_c3">Manage</th></tr>
                                </thead>
                                <tbody>
                                <tr class="even">
                                    <td width="20%">2</td><td width="30%">computer lab book</td><td width="30%">210</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/library/bookcategory/update/id/3"><img src="" alt=""></a>   <a class="glyphicon glyphicon-remove" title="" href="/index.php/library/bookcategory/delete/id/3"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="20%">3</td><td width="30%">computer sciences</td><td width="30%">01</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/library/bookcategory/update/id/4"><img src="" alt=""></a>   <a class="glyphicon glyphicon-remove" title="" href="/index.php/library/bookcategory/delete/id/4"><img src="" alt=""></a></td></tr>
                                <tr class="even">
                                    <td width="20%">4</td><td width="30%">c programming</td><td width="30%">0001</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/library/bookcategory/update/id/5"><img src="" alt=""></a>   <a class="glyphicon glyphicon-remove" title="" href="/index.php/library/bookcategory/delete/id/5"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="20%">5</td><td width="30%">computer sciences</td><td width="30%">01</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/library/bookcategory/update/id/7"><img src="" alt=""></a>   <a class="glyphicon glyphicon-remove" title="" href="/index.php/library/bookcategory/delete/id/7"><img src="" alt=""></a></td></tr>
                                <tr class="odd">
                                    <td width="20%">7</td><td width="30%">operating system</td><td width="30%">311</td><td width="20%"><a class="glyphicon glyphicon-pencil" title="" href="/index.php/library/bookcategory/update/id/9"><img src="" alt=""></a>   <a class="glyphicon glyphicon-remove" title="" href="/index.php/library/bookcategory/delete/id/9"><img src="" alt=""></a></td></tr>
                                </tbody>
                            </table>
                            <div class="pager"><ul id="yw0" class="yiiPager"><li class="first hidden"><a href="/index.php/library/bookcategory/create">&lt;&lt;</a></li>
                                    <li class="previous hidden"><a href="/index.php/library/bookcategory/create">&lt;</a></li>
                                    <li class="page selected"><a href="/index.php/library/bookcategory/create">1</a></li>
                                    <li class="page"><a href="/index.php/library/bookcategory/create/Bookcategory_page/2">2</a></li>
                                    <li class="page"><a href="/index.php/library/bookcategory/create/Bookcategory_page/3">3</a></li>
                                    <li class="next"><a href="/index.php/library/bookcategory/create/Bookcategory_page/2">&gt;</a></li>
                                    <li class="last"><a href="/index.php/library/bookcategory/create/Bookcategory_page/3">&gt;&gt;</a></li></ul></div><div class="keys" style="display:none" title="/index.php/library/bookcategory/create"><span>1</span><span>3</span><span>4</span><span>5</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>14</span></div>
                        </div>
                    </div>
                </div>
            </form></div>
    </div>
</div>