<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('customers_hr');?>
                        </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_new_record');?>
                        </a></li>
        </ul>
        <!------CONTROL TABS END------>
        
    
        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <div id="content">


                    <div id="customerList">
                        <div class="box" id="search-results">

                            <div class="head"><h1>Customers</h1></div>

                            <div class="inner">







                                <form method="post" action="/hrm/symfony/web/index.php/admin/deleteCustomer" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                                    <input type="hidden" name="defaultList[_csrf_token]" value="43cebe94d6e39e72c1b16a82ff436a09" id="defaultList__csrf_token">
                                    <div class="top">


                                        <input type="button" class="" id="btnAdd" name="btnAdd" value="Add">
                                        <input type="submit" class="delete" id="btnDelete" name="btnDelete" value="Delete" data-toggle="modal" data-target="#deleteConfModal" disabled="disabled">

                                    </div> <!-- top -->







                                    <div id="helpText" class="helpText"></div>

                                    <div id="scrollWrapper">
                                        <div id="scrollContainer">
                                        </div>
                                    </div>
                                    <div id="tableWrapper">
                                        <table class="table hover" id="resultTable">

                                            <thead>
                                            <tr><th rowspan="1" class="checkbox-col"><input type="checkbox" id="ohrmList_chkSelectAll" name="chkSelectAll" value=""></th>
                                                <th rowspan="1" style="width:49%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/admin/viewCustomers?sortField=name&amp;sortOrder=ASC" class="null">Customer</a></th>
                                                <th rowspan="1" style="width:49%"><span class="headerCell">Description</span></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td colspan="3">No Records Found</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- tableWrapper -->
                                </form> <!-- frmList_ohrmListComponent -->


                            </div> <!-- inner -->

                        </div> <!-- search-results -->

                    </div>
                    <form name="frmHiddenParam" id="frmHiddenParam" method="post" action="/hrm/symfony/web/index.php/admin/viewCustomers">
                        <input type="hidden" name="pageNo" id="pageNo" value="">
                        <input type="hidden" name="hdnAction" id="hdnAction" value="search">
                    </form>

                    <!-- Confirmation box HTML: Begins -->
                    <div class="modal hide" id="deleteConfModal">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">×</a>
                            <h3>OrangeHRM - Confirmation Required</h3>
                        </div>
                        <div class="modal-body">
                            <p>Projects under selected customer will also be deleted</p>
                            <br>
                            <p>Delete records?</p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn" data-dismiss="modal" id="dialogDeleteBtn" value="Ok">
                            <input type="button" class="btn reset" data-dismiss="modal" value="Cancel">
                        </div>
                    </div>
                    <!-- Confirmation box HTML: Ends -->
                </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box" id="addCustomer">
                    <div class="head">
                        <h1 id="addCustomerHeading">Add Customer</h1>
                    </div>

                    <div class="inner">




                        <form name="frmAddCustomer" id="frmAddCustomer" method="post" action="/hrm/symfony/web/index.php/admin/addCustomer" novalidate="novalidate">

                            <input type="hidden" name="addCustomer[_csrf_token]" value="f37a525b6782023a8e5047df74b615d6" id="addCustomer__csrf_token">            <input type="hidden" name="addCustomer[customerId]" id="addCustomer_customerId" value=""><input type="hidden" name="addCustomer[hdnOriginalCustomerName]" id="addCustomer_hdnOriginalCustomerName"><input type="hidden" name="addCustomer[_csrf_token]" value="f37a525b6782023a8e5047df74b615d6" id="addCustomer__csrf_token">
                            <fieldset>

                                <ol>
                                    <li>
                                        <label for="addCustomer_customerName">Name <em>*</em></label>                        <input type="text" name="addCustomer[customerName]" class="block default editable valid" maxlength="52" id="addCustomer_customerName">                    </li>

                                    <li class="largeTextBox">
                                        <label for="addCustomer_description">Description</label>                        <textarea rows="4" cols="30" name="addCustomer[description]" class="editable" maxlength="255" id="addCustomer_description"></textarea>                    </li>

                                    <li class="required">
                                        <em>*</em> Required field                    </li>
                                </ol>

                                <p>
                                    <input type="button" class="" name="btnSave" data-toggle="modal" id="btnSave" value="Save">
                                    <input type="button" class="btn reset" name="btnCancel" id="btnCancel" value="Cancel">
                                </p>

                            </fieldset>

                        </form>

                    </div> <!-- End-inner -->

                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>