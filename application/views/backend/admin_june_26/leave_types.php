<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('leave_types');?>
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




                    <div id="mainDiv">
                        <div class="box" id="search-results">

                            <div class="head"><h1>Leave Types</h1></div>

                            <div class="inner">







                                <form method="post" action="/hrm/symfony/web/index.php/leave/deleteLeaveType" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                                    <input type="hidden" name="defaultList[_csrf_token]" value="bc8cffe93b9c2472bd57c7c34888ccd9" id="defaultList__csrf_token">
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
                                                <th rowspan="1" style="width:99%"><span class="headerCell">Leave Type</span></th>
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
                <div class="box" id="add-leave-type">
                    <div class="head">
                        <h1>Add Leave Type</h1>
                    </div>
                    <div class="inner">



                        <form id="frmLeaveType" name="frmLeaveType" method="post" action="/hrm/symfony/web/index.php/leave/defineLeaveType" novalidate="novalidate">

                            <fieldset>
                                <ol>
                                    <li><label for="leaveType_txtLeaveTypeName">Name <em>*</em></label>
                                        <input size="30" type="text" name="leaveType[txtLeaveTypeName]" id="leaveType_txtLeaveTypeName">
                                    </li>
                                    <li><label for="leaveType_excludeIfNoEntitlement"><a id="exclude_link" href="#">Is entitlement situational</a></label>
                                        <input type="checkbox" name="leaveType[excludeIfNoEntitlement]" value="1" id="leaveType_excludeIfNoEntitlement">
                                        <input type="hidden" name="leaveType[hdnOriginalLeaveTypeName]" id="leaveType_hdnOriginalLeaveTypeName">
                                        <input type="hidden" name="leaveType[hdnLeaveTypeId]" id="leaveType_hdnLeaveTypeId">
                                        <input type="hidden" name="leaveType[_csrf_token]" value="e2509640383a7b8f2ef97de43b2c5f46" id="leaveType__csrf_token"></li>

                                    <li class="required">
                                        <em>*</em> Required field                        </li>
                                </ol>
                            </fieldset>




                            <p>
                                <input type="button" name="saveButton" value="Save" id="saveButton" class="plainbtn">
                                <input class="cancel" type="button" name="backButton" value="Cancel" id="backButton">

                            </p>

                        </form>

                    </div> <!-- inner -->

                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>