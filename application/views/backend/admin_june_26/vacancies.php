<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('vacancies');?>
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

                    <div class="box searchForm toggableForm" id="srchVacancy">

                        <div class="head">
                            <h1>Vacancies</h1>
                        </div>

                        <div class="inner">

                            <form name="frmSrchJobVacancy" id="frmSrchJobVacancy" method="post" action="/hrm/symfony/web/index.php/recruitment/viewJobVacancy">
                                <fieldset>
                                    <input type="hidden" name="vacancySearch[_csrf_token]" value="041a0ea877b0238e499e5232ee7d0d2c" id="vacancySearch__csrf_token">                <ol>
                                        <li>
                                            <label class="jobTitleLabel" for="vacancySearch_jobTitle">Job Title</label>                        <select name="vacancySearch[jobTitle]" class="drpDown" maxlength="50" id="vacancySearch_jobTitle">
                                                <option value="" selected="selected">All</option>
                                            </select>                    </li>
                                        <li>
                                            <label class="vacancyLabel" for="vacancySearch_jobVacancy">Vacancy</label>                        <select name="vacancySearch[jobVacancy]" class="drpDown" maxlength="50" id="vacancySearch_jobVacancy"><option value="">All</option></select>                    </li>
                                        <li>
                                            <label class="hiringManagerLabel" for="vacancySearch_hiringManager">Hiring Manager</label>                        <select name="vacancySearch[hiringManager]" class="drpDown" maxlength="50" id="vacancySearch_hiringManager"><option value="">All</option></select>                    </li>
                                        <li>
                                            <label class="statusLabel" for="vacancySearch_status">Status</label>                        <select name="vacancySearch[status]" class="drpDown" maxlength="50" id="vacancySearch_status">
                                                <option value="" selected="selected">All</option>
                                                <option value="1">Active</option>
                                                <option value="2">Closed</option>
                                            </select>                    </li>
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




                            <form method="post" action="/hrm/symfony/web/index.php/recruitment/deleteJobVacancy" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                                <input type="hidden" name="defaultList[_csrf_token]" value="bc8cffe93b9c2472bd57c7c34888ccd9" id="defaultList__csrf_token">
                                <div class="top">


                                    <input type="button" class="" id="btnAdd" name="btnAdd" value="Add">
                                    <input type="submit" class="delete" id="btnDelete" name="btnDelete" value="Delete" data-toggle="modal" data-target="#deleteConfirmation" disabled="disabled">

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
                                            <th rowspan="1" style="width:32%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/recruitment/viewJobVacancy?sortField=v.name&amp;sortOrder=ASC" class="null">Vacancy</a></th>
                                            <th rowspan="1" style="width:30%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/recruitment/viewJobVacancy?sortField=jt.job_title&amp;sortOrder=ASC" class="null">Job Title</a></th>
                                            <th rowspan="1" style="width:24%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/recruitment/viewJobVacancy?sortField=e.emp_firstname&amp;sortOrder=ASC" class="null">Hiring Manager</a></th>
                                            <th rowspan="1" style="width:15%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/recruitment/viewJobVacancy?sortField=v.status&amp;sortOrder=ASC" class="null">Status</a></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td colspan="5">No Records Found</td>
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

                    <form name="frmHiddenParam" id="frmHiddenParam" method="post" action="/hrm/symfony/web/index.php/recruitment/viewJobVacancy">
                        <input type="hidden" name="pageNo" id="pageNo" value="">
                        <input type="hidden" name="hdnAction" id="hdnAction" value="search">
                    </form>
                </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box" id="addJobVacancy">

                    <div class="head">
                        <h1>Add Job Vacancy</h1>
                    </div>

                    <div class="inner">



                        <form name="frmAddJobVacancy" id="frmAddJobVacancy" method="post">

                            <input type="hidden" name="addJobVacancy[_csrf_token]" value="96bacd240a77d3b734343ac73b679f19" id="addJobVacancy__csrf_token">            <input type="hidden" name="addJobVacancy[hiringManagerId]" id="addJobVacancy_hiringManagerId">            <fieldset>
                                <ol>
                                    <li>
                                        <label for="addJobVacancy_jobTitle">Job Title <em>*</em></label>                        <select name="addJobVacancy[jobTitle]" maxlength="50" id="addJobVacancy_jobTitle">
                                            <option value="" selected="selected">-- Select --</option>
                                        </select>                    </li>
                                    <li>
                                        <label for="addJobVacancy_name">Vacancy Name <em>*</em></label>                        <input type="text" name="addJobVacancy[name]" maxlength="50" id="addJobVacancy_name">                    </li>
                                    <li>
                                        <label for="addJobVacancy_hiringManager">Hiring Manager <em>*</em></label>                        <input type="text" name="addJobVacancy[hiringManager]" maxlength="100" id="addJobVacancy_hiringManager" autocomplete="off" class="ac_input inputFormatHint">                    </li>
                                    <li>
                                        <label for="addJobVacancy_noOfPositions">Number of Positions</label>                        <input type="text" name="addJobVacancy[noOfPositions]" maxlength="2" id="addJobVacancy_noOfPositions">                    </li>
                                    <li class="largeTextBox">
                                        <label for="addJobVacancy_description">Description</label>                        <textarea rows="9" cols="30" name="addJobVacancy[description]" id="addJobVacancy_description"></textarea>                    </li>
                                    <li>
                                        <label for="addJobVacancy_status">Active</label>                        <input value="on" type="checkbox" name="addJobVacancy[status]" checked="checked" id="addJobVacancy_status">                    </li>
                                    <!-- TODO: See whether this div is used in any addon
                                    <li><div class="publishJobVacancySeparator">&nbsp;</div></li>
                                    -->
                                    <li class="labelRight">
                                        <input value="on" type="checkbox" name="addJobVacancy[publishedInFeed]" checked="checked" id="addJobVacancy_publishedInFeed">                        <label for="addJobVacancy_publishedInFeed">Publish in RSS feed(1) and web page(2)</label>                    </li>


                                    <li class="required">
                                        <em>*</em> Required field                    </li>
                                    <li class="helpText">
                                        1 : RSS Feed URL : <a target="_new" href="http://localhost/hrm/symfony/web/index.php/recruitmentApply/jobs.rss">http://localhost/hrm/symfony/web/index.php/recruitmentApply/jobs.rss</a>                    </li>
                                    <li class="helpText">
                                        2 : Web Page URL : <a target="_new" href="http://localhost/hrm/symfony/web/index.php/recruitmentApply/jobs.html">http://localhost/hrm/symfony/web/index.php/recruitmentApply/jobs.html</a>                    </li>
                                </ol>
                                <p>
                                    <input type="button" class="savebutton" name="btnSave" id="btnSave" value="Save">
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