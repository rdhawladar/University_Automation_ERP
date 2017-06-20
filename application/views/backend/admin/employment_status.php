<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('employment_status');?>
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



                    <div class="box" id="empStatus" style="display: none;">

                        <div class="head">
                            <h1 id="empStatusHeading">Add Employment Status</h1>
                        </div>

                        <div class="inner">

                            <form name="frmEmpStatus" id="frmEmpStatus" method="post" action="/hrm/symfony/web/index.php/admin/employmentStatus" novalidate="novalidate">

                                <input type="hidden" name="empStatus[_csrf_token]" value="92406bf2112518dce7696e7cb74892b5" id="empStatus__csrf_token">            <input type="hidden" name="empStatus[empStatusId]" id="empStatus_empStatusId"><input type="hidden" name="empStatus[_csrf_token]" value="92406bf2112518dce7696e7cb74892b5" id="empStatus__csrf_token">
                                <fieldset>

                                    <ol>

                                        <li>
                                            <label for="empStatus_name">Name <em>*</em></label>                        <input type="text" name="empStatus[name]" class="formInput" maxlength="52" id="empStatus_name">                    </li>

                                        <li class="required">
                                            <em>*</em> Required field                    </li>

                                    </ol>

                                    <p>
                                        <input type="button" class="savebutton" name="btnSave" id="btnSave" value="Save">
                                        <input type="button" class="reset" name="btnCancel" id="btnCancel" value="Cancel">
                                    </p>

                                </fieldset>

                            </form>

                        </div>

                    </div>


                    <div id="customerList" class="">

                        <div class="box" id="search-results">

                            <div class="head"><h1>Employment Status</h1></div>

                            <div class="inner">







                                <form method="post" action="/hrm/symfony/web/index.php/admin/deleteEmploymentStatus" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                                <th rowspan="1" style="width:"><span class="headerCell">Employment Status</span></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td colspan="2">No Records Found</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- tableWrapper -->
                                </form> <!-- frmList_ohrmListComponent -->


                            </div> <!-- inner -->

                        </div> <!-- search-results -->
                    </div>

                    <!-- Confirmation box HTML: Begins -->
                    <div class="modal hide" id="deleteConfModal">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">×</a>
                            <h3>OrangeHRM - Confirmation Required</h3>
                        </div>
                        <div class="modal-body">
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
                <div class="box" id="empStatus" style="display: block;">

                    <div class="head">
                        <h1 id="empStatusHeading">Add Employment Status</h1>
                    </div>

                    <div class="inner">

                        <form name="frmEmpStatus" id="frmEmpStatus" method="post" action="/hrm/symfony/web/index.php/admin/employmentStatus" novalidate="novalidate">

                            <input type="hidden" name="empStatus[_csrf_token]" value="92406bf2112518dce7696e7cb74892b5" id="empStatus__csrf_token">            <input type="hidden" name="empStatus[empStatusId]" id="empStatus_empStatusId" value=""><input type="hidden" name="empStatus[_csrf_token]" value="92406bf2112518dce7696e7cb74892b5" id="empStatus__csrf_token">
                            <fieldset>

                                <ol>

                                    <li>
                                        <label for="empStatus_name">Name <em>*</em></label>                        <input type="text" name="empStatus[name]" class="formInput" maxlength="52" id="empStatus_name">                    </li>

                                    <li class="required">
                                        <em>*</em> Required field                    </li>

                                </ol>

                                <p>
                                    <input type="button" class="savebutton" name="btnSave" id="btnSave" value="Save">
                                    <input type="button" class="reset" name="btnCancel" id="btnCancel" value="Cancel">
                                </p>

                            </fieldset>

                        </form>

                    </div>

                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>