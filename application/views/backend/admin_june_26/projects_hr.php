<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('projects_hr');?>
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


                    <div id="searchProject" class="box searchForm toggableForm">
                        <div class="head">
                            <h1 id="searchProjectHeading">Projects</h1>
                        </div>
                        <div class="inner">
                            <form name="frmSearchProject" id="frmSearchProject" method="post" action="/hrm/symfony/web/index.php/admin/viewProjects">

                                <fieldset>

                                    <ol>
                                        <li><label for="searchProject_customer">Customer Name</label>
                                            <input type="text" name="searchProject[customer]" id="searchProject_customer" autocomplete="off" class="ac_input inputFormatHint">
                                        </li>
                                        <li><label for="searchProject_project">Project</label>
                                            <input type="text" name="searchProject[project]" id="searchProject_project" autocomplete="off" class="ac_input inputFormatHint">
                                        </li>
                                        <li><label for="searchProject_projectAdmin">Project Admin</label>
                                            <input type="text" name="searchProject[projectAdmin]" id="searchProject_projectAdmin" autocomplete="off" class="ac_input inputFormatHint">
                                            <input type="hidden" name="searchProject[_csrf_token]" value="6f2ce7484736dada50e226efb4ff61a2" id="searchProject__csrf_token"></li>
                                    </ol>

                                    <p>
                                        <input type="button" class="" name="btnSave" id="btnSearch" value="Search">
                                        <input type="button" class="reset" name="btnReset" id="btnReset" value="Reset">
                                    </p>

                                </fieldset>
                            </form>
                        </div>
                        <a href="#" class="toggle tiptip">&gt;</a>
                    </div>
                    <div id="customerList">
                        <div class="box noHeader" id="search-results">


                            <div class="inner">




                                <form method="post" action="/hrm/symfony/web/index.php/admin/deleteProject" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                                <th rowspan="1" style="width:33%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/admin/viewProjects?sortField=customerName&amp;sortOrder=ASC" class="null">Customer Name</a></th>
                                                <th rowspan="1" style="width:33%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/admin/viewProjects?sortField=projectName&amp;sortOrder=ASC" class="null">Project</a></th>
                                                <th rowspan="1" style="width:33%"><span class="headerCell">Project Admins</span></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td colspan="4">No Records Found</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- tableWrapper -->
                                </form> <!-- frmList_ohrmListComponent -->


                            </div> <!-- inner -->

                        </div> <!-- search-results -->
                    </div>

                    <form name="frmHiddenParam" id="frmHiddenParam" method="post" action="/hrm/symfony/web/index.php/admin/viewProjects">
                        <input type="hidden" name="pageNo" id="pageNo">
                        <input type="hidden" name="hdnAction" id="hdnAction" value="search">
                    </form>
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
                <div id="addProject" class="box">

                    <div class="head">
                        <h1 id="addProjectHeading">Add Project</h1>
                    </div>

                    <div class="inner">





                        <form name="frmAddProject" id="frmAddProject" method="post" action="/hrm/symfony/web/index.php/admin/saveProject">

                            <input type="hidden" name="addProject[_csrf_token]" value="a47a3c323dfbdf58ea7ed7897c9b1df7" id="addProject__csrf_token">            <input type="hidden" name="addProject[projectId]" id="addProject_projectId"><input type="hidden" name="addProject[customerId]" id="addProject_customerId"><input type="hidden" name="addProject[projectAdminList]" id="addProject_projectAdminList"><input type="hidden" name="addProject[_csrf_token]" value="a47a3c323dfbdf58ea7ed7897c9b1df7" id="addProject__csrf_token">
                            <fieldset>

                                <ol>

                                    <li>
                                        <label for="addProject_customerName">Customer Name <em>*</em></label>                        <input type="text" name="addProject[customerName]" class="formInputCustomer ac_input inputFormatHint" maxlength="52" id="addProject_customerName" autocomplete="off">                                                <a id="addCustomerLink" class="btn2 fieldHelpRight" data-toggle="modal" href="#customerDialog">Add Customer</a>
                                    </li>

                                    <li>
                                        <label for="addProject_projectName">Name <em>*</em></label>                        <input type="text" name="addProject[projectName]" maxlength="52" id="addProject_projectName">                    </li>

                                    <li id="projectAdmin_1" class="">
                                        <label>Project Admin</label>
                                        <input type="text" name="addProject[projectAdmin_1]" class="formInputProjectAdmin ac_input inputFormatHint" maxlength="100" id="addProject_projectAdmin_1" autocomplete="off">                                                    <a class="addText fieldHelpRight" id="addButton">Add Another</a>
                                    </li>
                                    <li id="projectAdmin_2" class="noLabel" style="display: none;">
                                        <input type="text" name="addProject[projectAdmin_2]" class="formInputProjectAdmin ac_input inputFormatHint" maxlength="100" id="addProject_projectAdmin_2" autocomplete="off">                                                    <a class="removeText fieldHelpRight" id="removeButton2">Remove</a>
                                    </li>
                                    <li id="projectAdmin_3" class="noLabel" style="display: none;">
                                        <input type="text" name="addProject[projectAdmin_3]" class="formInputProjectAdmin ac_input inputFormatHint" maxlength="100" id="addProject_projectAdmin_3" autocomplete="off">                                                    <a class="removeText fieldHelpRight" id="removeButton3">Remove</a>
                                    </li>
                                    <li id="projectAdmin_4" class="noLabel" style="display: none;">
                                        <input type="text" name="addProject[projectAdmin_4]" class="formInputProjectAdmin ac_input inputFormatHint" maxlength="100" id="addProject_projectAdmin_4" autocomplete="off">                                                    <a class="removeText fieldHelpRight" id="removeButton4">Remove</a>
                                    </li>
                                    <li id="projectAdmin_5" class="noLabel" style="display: none;">
                                        <input type="text" name="addProject[projectAdmin_5]" class="formInputProjectAdmin ac_input inputFormatHint" maxlength="100" id="addProject_projectAdmin_5" autocomplete="off">                                                    <a class="removeText fieldHelpRight" id="removeButton5">Remove</a>
                                    </li>

                                    <li class="largeTextBox">
                                        <label for="addProject_description">Description</label>                        <textarea rows="4" cols="30" name="addProject[description]" maxlength="256" id="addProject_description"></textarea>                    </li>

                                    <li class="required">
                                        <em>*</em> Required field                    </li>

                                </ol>

                                <p>
                                    <input type="button" class="" name="btnSave" id="btnSave" value="Save">
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