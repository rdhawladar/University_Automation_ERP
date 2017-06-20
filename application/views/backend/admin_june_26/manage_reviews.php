<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('manage_reviews');?>
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

                    <div class="box searchForm toggableForm" id="leave-list-search">
                        <div class="head">
                            <h1>Search Performance Reviews</h1>
                        </div>
                        <div class="inner">
                            <form id="performanceReview360SearchForm" name="performanceReview360SearchForm" method="post" action="">
                                <fieldset>
                                    <ol>
                                        <li><label for="performanceReview360SearchForm_employeeName">Employee Name</label>
                                            <input type="text" name="performanceReview360SearchForm[employeeName]" id="performanceReview360SearchForm_employeeName" autocomplete="off" class="ac_input inputFormatHint">
                                        </li>
                                        <li><label for="performanceReview360SearchForm_jobTitleCode">Job Title</label>
                                            <select class="formSelect" name="performanceReview360SearchForm[jobTitleCode]" id="performanceReview360SearchForm_jobTitleCode">
                                                <option value="" selected="selected">All</option>
                                            </select>
                                        </li>
                                        <li><label for="performanceReview360SearchForm_status">Status</label>
                                            <select class="formSelect" name="performanceReview360SearchForm[status]" id="performanceReview360SearchForm_status">
                                                <option value="0">All</option>
                                                <option value="1">Inactive</option>
                                                <option value="2">Activated</option>
                                                <option value="4">Approved</option>
                                                <option value="3">In Progress</option>
                                            </select>
                                        </li>
                                        <li><label for="performanceReview360SearchForm_fromDate">From Date</label>
                                            <input id="fromDate" type="text" name="performanceReview360SearchForm[fromDate]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                        </li>
                                        <li><label for="performanceReview360SearchForm_toDate">To Date</label>
                                            <input id="toDate" type="text" name="performanceReview360SearchForm[toDate]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                        </li>
                                        <li><label for="performanceReview360SearchForm_reviwerName">Reviewer</label>
                                            <input type="text" name="performanceReview360SearchForm[reviwerName]" id="performanceReview360SearchForm_reviwerName" autocomplete="off" class="ac_input inputFormatHint">
                                            <input type="hidden" name="performanceReview360SearchForm[employeeNumber]" id="performanceReview360SearchForm_employeeNumber">
                                            <input type="hidden" name="performanceReview360SearchForm[reviwerNumber]" id="performanceReview360SearchForm_reviwerNumber">
                                            <input type="hidden" name="performanceReview360SearchForm[_csrf_token]" value="cb2b2cb85bd9fb692975ac431587c109" id="performanceReview360SearchForm__csrf_token"></li>
                                    </ol>
                                    <p>
                                        <input type="button" name="btnSearch" value="Search" id="btnSearch" class="plainbtn">
                                        <input class="reset" type="button" name="btnReset" value="Reset" id="btnReset">

                                        <input type="hidden" name="pageNo" id="pageNo" value="">
                                        <input type="hidden" name="hdnAction" id="hdnAction" value="search">
                                    </p>
                                </fieldset>

                            </form>

                        </div>
                        <a href="#" class="toggle tiptip">&gt;</a>
                    </div>

                    <!--new end-->

                    <div class="box" id="search-results">

                        <div class="head"><h1>Review List</h1></div>

                        <div class="inner">







                            <form method="post" action="/hrm/symfony/web/index.php/performance/deleteReview" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                            <th rowspan="1" style="width:" class="header"><a href="http://localhost/hrm/symfony/web/index.php/performance/searchPerformancReview?sortField=employeeId&amp;sortOrder=ASC" class="null">Employee</a></th>
                                            <th rowspan="1" style="width:" class="header"><a href="http://localhost/hrm/symfony/web/index.php/performance/searchPerformancReview?sortField=due_date&amp;sortOrder=ASC" class="null">Due Date</a></th>
                                            <th rowspan="1" style="width:"><span class="headerCell">Review Period</span></th>
                                            <th rowspan="1" style="width:"><span class="headerCell">Job Title</span></th>
                                            <th rowspan="1" style="width:10%"><span class="headerCell">Status</span></th>
                                            <th rowspan="1" style="width:"><span class="headerCell">Action</span></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td colspan="7">No Records Found</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- tableWrapper -->
                            </form> <!-- frmList_ohrmListComponent -->


                        </div> <!-- inner -->

                    </div> <!-- search-results -->
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
                            <input type="button" class="btn cancel" data-dismiss="modal" value="Cancel">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div id="performance" class="box single">
                    <div class="head">
                        <h1 id="addPerformanceHeading">Performance Review</h1>
                    </div>

                    <div class="inner">




                        <!-- Custom modal-->
                        <div id="alertModal" class="modal hide" style="display: none;">
                            <div class="modal-header">
                                <a class="close" data-dismiss="modal">×</a>
                                <h3> OrangeHRM - Information</h3>
                            </div>
                            <div class="modal-body">
                                <p id="messageNorecord"></p>
                            </div>
                            <div class="modal-footer">
                                <input id="dialogDeleteBtn" class="btn" type="button" value="Ok" data-dismiss="modal">
                            </div>
                        </div>
                        <form id="saveReview" name="saveReview" method="post" action="" novalidate="novalidate">
                            <fieldset>

                                <ol>
                                    <input type="hidden" name="saveReview360Form[_csrf_token]" value="063450b5107b3a8089e5427556d2ddf8" id="saveReview360Form__csrf_token">                    <input type="hidden" name="saveReview360Form[reviewId]" id="saveReview360Form_reviewId">                    <input type="hidden" name="saveReview360Form[formAction]" id="saveReview360Form_formAction">                    <input type="hidden" name="saveReview360Form[employeeId]" id="saveReview360Form_employeeId">                    <input type="hidden" name="saveReview360Form[supervisorReviewerId]" id="saveReview360Form_supervisorReviewerId">                                            <li>
                                        <label for="saveReview360Form_employee">Employee <span class="required">*</span></label>                            <input class="longTextBoxAutoComplete ac_input" type="text" name="saveReview360Form[employee]" id="saveReview360Form_employee" autocomplete="off">                        </li>
                                </ol>

                                <div id="reviewCreationBody" style="display: none;">
                                    <h4>Supervisor Reviewers</h4>
                                    <ol>
                                        <li>
                                            <label for="saveReview360Form_supervisorReviewer">Supervisor Reviewer <span class="required">*</span></label>
                                            <input class="longTextBoxAutoComplete" type="text" name="saveReview360Form[supervisorReviewer]" id="saveReview360Form_supervisorReviewer">                            </li>
                                    </ol>

                                    <ol>
                                        <li>
                                            <label class="lableValue" for="saveReview360Form_workPeriodStartDate">Work Period Start Date <span class="required">*</span></label><input id="saveReview360Form_workPeriodStartDate" type="text" name="saveReview360Form[workPeriodStartDate]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                        </li>
                                        <li>
                                            <label class="lableValue" for="saveReview360Form_workPeriodEndDate">Work Period End Date <span class="required">*</span></label><input id="saveReview360Form_workPeriodEndDate" type="text" name="saveReview360Form[workPeriodEndDate]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                        </li>
                                        <li>
                                            <label class="lableValue" for="saveReview360Form_dueDate">Due Date <span class="required">*</span></label><input id="saveReview360Form_dueDate" type="text" name="saveReview360Form[dueDate]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                        </li>
                                    </ol>

                                    <ol id="withoutBorder">
                                        <li class="required">
                                            <em>*</em> Required field                        </li>
                                    </ol>

                                    <p>
                                        <input type="button" class="applybutton" id="saveBtn" value="Save" title="Add">

                                        <input type="button" class="applybutton" id="activateBtn" value="Activate" title="Activate">
                                        <input type="button" class="reset" id="backBtn" value="Back" title="Back">
                                    </p>

                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>