<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('candidates');?>
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


                    <div class="box searchForm toggableForm" id="srchCandidates">
                        <div class="head">
                            <h1>Candidates</h1>
                        </div>

                        <div class="inner">

                            <form name="frmSrchCandidates" id="frmSrchCandidates" method="post" action="/hrm/symfony/web/index.php/recruitment/viewCandidates" novalidate="novalidate">

                                <fieldset>

                                    <ol>
                                        <li><label for="candidateSearch_jobTitle">Job Title</label>
                                            <select name="candidateSearch[jobTitle]" id="candidateSearch_jobTitle">
                                                <option value="" selected="selected">All</option>
                                            </select>
                                        </li>
                                        <li><label for="candidateSearch_jobVacancy">Vacancy</label>
                                            <select name="candidateSearch[jobVacancy]" id="candidateSearch_jobVacancy"><option value="">All</option></select>
                                        </li>
                                        <li><label for="candidateSearch_hiringManager">Hiring Manager</label>
                                            <select name="candidateSearch[hiringManager]" id="candidateSearch_hiringManager"><option value="">All</option></select>
                                        </li>
                                        <li><label for="candidateSearch_status">Status</label>
                                            <select name="candidateSearch[status]" id="candidateSearch_status">
                                                <option value="" selected="selected">All</option>
                                                <option value="APPLICATION INITIATED">Application Initiated</option>
                                                <option value="SHORTLISTED">Shortlisted</option>
                                                <option value="INTERVIEW SCHEDULED">Interview Scheduled</option>
                                                <option value="INTERVIEW PASSED">Interview Passed</option>
                                                <option value="INTERVIEW FAILED">Interview Failed</option>
                                                <option value="JOB OFFERED">Job Offered</option>
                                                <option value="OFFER DECLINED">Offer Declined</option>
                                                <option value="REJECTED">Rejected</option>
                                                <option value="HIRED">Hired</option>
                                            </select>
                                        </li>
                                        <li><label for="candidateSearch_candidateName">Candidate Name</label>
                                            <input type="text" name="candidateSearch[candidateName]" id="candidateSearch_candidateName" autocomplete="off" class="ac_input inputFormatHint">
                                        </li>
                                        <li><label for="candidateSearch_keywords">Keywords</label>
                                            <input type="text" name="candidateSearch[keywords]" id="candidateSearch_keywords" class="inputFormatHint">
                                        </li>
                                        <li><label for="candidateSearch_dateApplication">Date of Application</label>
                                            <label for="candidateSearch_fromDate" class="date_range_label">From</label> <input id="candidateSearch_fromDate" type="text" name="candidateSearch[dateApplication][from]" value="" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">

                                        </li><li><label>&nbsp;</label><label for="candidateSearch_toDate" class="date_range_label">To</label> <input id="candidateSearch_toDate" type="text" name="candidateSearch[dateApplication][to]" value="" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                        </li>
                                        <li><label for="candidateSearch_modeOfApplication">Method of Application</label>
                                            <select name="candidateSearch[modeOfApplication]" id="candidateSearch_modeOfApplication">
                                                <option value="" selected="selected">All</option>
                                                <option value="1">Manual</option>
                                                <option value="2">Online</option>
                                            </select>
                                            <input type="hidden" name="candidateSearch[selectedCandidate]" id="candidateSearch_selectedCandidate">
                                            <input type="hidden" name="candidateSearch[_csrf_token]" value="1b3808193572f4a491a6b134f995e1c2" id="candidateSearch__csrf_token"></li>
                                    </ol>

                                    <p>
                                        <input type="button" id="btnSrch" value="Search" name="btnSrch">
                                        <input type="button" class="reset" id="btnRst" value="Reset" name="btnSrch">
                                    </p>
                                </fieldset>





                            </form>
                        </div>
                        <a href="#" class="toggle tiptip">&gt;</a>
                    </div>
                    <div class="box noHeader" id="search-results">


                        <div class="inner">




                            <form method="post" action="/hrm/symfony/web/index.php/recruitment/deleteCandidateVacancies" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                                <input type="hidden" name="defaultList[_csrf_token]" value="bc8cffe93b9c2472bd57c7c34888ccd9" id="defaultList__csrf_token">
                                <div class="top">


                                    <input type="button" class="" id="btnAdd" name="btnAdd" value="Add">
                                    <input type="submit" class="delete" id="btnDelete" name="btnDelete" value="Delete" data-toggle="modal" data-target="#deleteConfirmation" disabled="disabled">

                                </div> <!-- top -->







                                <div id="helpText" class="helpText"><span id="helpMessage">Click on a candidate to perform actions</span></div>

                                <div id="scrollWrapper">
                                    <div id="scrollContainer">
                                    </div>
                                </div>
                                <div id="tableWrapper">
                                    <table class="table hover" id="resultTable">

                                        <thead>
                                        <tr><th rowspan="1" class="checkbox-col"><input type="checkbox" id="ohrmList_chkSelectAll" name="chkSelectAll" value=""></th>
                                            <th rowspan="1" style="width:" class="header"><a href="http://localhost/hrm/symfony/web/index.php/recruitment/viewCandidates?sortField=jv.name&amp;sortOrder=ASC" class="null">Vacancy</a></th>
                                            <th rowspan="1" style="width:" class="header"><a href="http://localhost/hrm/symfony/web/index.php/recruitment/viewCandidates?sortField=jc.first_name&amp;sortOrder=ASC" class="null">Candidate</a></th>
                                            <th rowspan="1" style="width:" class="header"><a href="http://localhost/hrm/symfony/web/index.php/recruitment/viewCandidates?sortField=e.emp_firstname&amp;sortOrder=ASC" class="null">Hiring Manager</a></th>
                                            <th rowspan="1" style="width:" class="header"><a href="http://localhost/hrm/symfony/web/index.php/recruitment/viewCandidates?sortField=jc.date_of_application&amp;sortOrder=ASC" class="null">Date of Application</a></th>
                                            <th rowspan="1" style="width:" class="header"><a href="http://localhost/hrm/symfony/web/index.php/recruitment/viewCandidates?sortField=jcv.status&amp;sortOrder=ASC" class="null">Status</a></th>
                                            <th rowspan="1" style="width:"><span class="headerCell">Resume</span></th>
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
                    <div class="modal hide" id="deleteConfirmation">
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

                    <form name="frmHiddenParam" id="frmHiddenParam" method="post" action="/hrm/symfony/web/index.php/recruitment/viewCandidates">
                        <input type="hidden" name="pageNo" id="pageNo" value="">
                        <input type="hidden" name="hdnAction" id="hdnAction" value="search">
                    </form>
                </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box" id="addCandidate">

                    <div class="head"><h1 id="addCandidateHeading">Add Candidate</h1></div>
                    <div class="inner">



                        <form name="frmAddCandidate" id="frmAddCandidate" method="post" action="/hrm/symfony/web/index.php/recruitment/addCandidate/id/" enctype="multipart/form-data">

                            <input type="hidden" name="addCandidate[_csrf_token]" value="f0096c1fcfa49a0fd86c97d40c92a28f" id="addCandidate__csrf_token">            <fieldset>
                                <ol>
                                    <li class="line nameContainer">

                                        <label class="hasTopFieldHelp">Full Name</label>
                                        <ol class="fieldsInLine">
                                            <li>
                                                <div class="fieldDescription"><em>*</em> First Name</div>
                                                <input type="text" name="addCandidate[firstName]" class="formInputText" maxlength="35" id="addCandidate_firstName">                            </li>
                                            <li>
                                                <div class="fieldDescription">Middle Name</div>
                                                <input type="text" name="addCandidate[middleName]" class="formInputText" maxlength="35" id="addCandidate_middleName">                            </li>
                                            <li>
                                                <div class="fieldDescription"><em>*</em> Last Name</div>
                                                <input type="text" name="addCandidate[lastName]" class="formInputText" maxlength="35" id="addCandidate_lastName">                            </li>
                                        </ol>

                                    </li>

                                    <li>

                                        <label for="addCandidate_email">Email <em>*</em></label>                        <input type="text" name="addCandidate[email]" class="formInputText" id="addCandidate_email">                    </li>
                                    <li>
                                        <label class="contactNoLable" for="addCandidate_contactNo">Contact No</label>                        <input type="text" name="addCandidate[contactNo]" class="contactNo" id="addCandidate_contactNo">                    </li>
                                </ol>
                                <ol>
                                    <li class="line">
                                        <label class="vacancyDrpLabel" for="addCandidate_vacancy">Job Vacancy</label>                        <select name="addCandidate[vacancy]" class="vacancyDrp" id="addCandidate_vacancy">
                                            <option value="" selected="selected">-- Select --</option>
                                        </select>

                                    </li>

                                    <!-- Resume block : Begins -->

                                    <li>

                                        <label class="resume" for="addCandidate_resume">Resume</label><input type="file" name="addCandidate[resume]" id="addCandidate_resume"><label class="fieldHelpBottom">Accepts .docx, .doc, .odt, .pdf, .rtf, .txt up to 1MB</label>                    </li>

                                    <!-- Resume block : Ends -->

                                    <li>
                                        <label class="keywrd" for="addCandidate_keyWords">Keywords</label>                        <input type="text" name="addCandidate[keyWords]" class="keyWords inputFormatHint" id="addCandidate_keyWords">                    </li>
                                    <li>
                                        <label class="comment" for="addCandidate_comment">Comment</label>                        <textarea rows="4" cols="35" name="addCandidate[comment]" class="formInputText" id="addCandidate_comment"></textarea>                    </li>
                                    <li>
                                        <label class="appDate" for="addCandidate_appliedDate">Date of Application</label>                        <input id="addCandidate_appliedDate" type="text" name="addCandidate[appliedDate]" value="2016-05-29" class="formDateInput calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                    </li>
                                    <li class="required new">
                                        <em>*</em> Required field                    </li>
                                </ol>
                                <p>

                                    <input type="button" id="btnSave" value="Save">

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