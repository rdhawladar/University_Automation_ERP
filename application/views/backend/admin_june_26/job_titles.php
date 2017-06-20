<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('job_titles');?>
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


                    <div id="jobTitleList">
                        <div class="box" id="search-results">

                            <div class="head"><h1>Job Titles</h1></div>

                            <div class="inner">







                                <form method="post" action="/hrm/symfony/web/index.php/admin/deleteJobTitle" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                                <th rowspan="1" style="width:49%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/admin/viewJobTitleList?sortField=jobTitleName&amp;sortOrder=ASC" class="null">Job Title</a></th>
                                                <th rowspan="1" style="width:49%"><span class="headerCell">Job Description</span></th>
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
                    <!-- comment dialog -->

                    <div id="commentDialog" title="Job Description" style="display: none">
                        <form action="updateComment" method="post" id="frmCommentSave">
                            <input type="hidden" id="leaveId">
                            <input type="hidden" id="leaveOrRequest">
                            <textarea name="leaveComment" id="leaveComment" cols="40" rows="10" class="commentTextArea"></textarea>
                            <br class="clear">
                            <div><input type="button" id="commentCancel" class="plainbtn" value="Cancel"></div>
                        </form>
                    </div>

                    <form name="frmHiddenParam" id="frmHiddenParam" method="post" action="/hrm/symfony/web/index.php/admin/viewJobTitleList">
                        <input type="hidden" name="pageNo" id="pageNo" value="">
                        <input type="hidden" name="hdnAction" id="hdnAction" value="search">
                    </form>

                    <!-- end of comment dialog-->

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
                <div class="box-content">
                    <div id="content">




                        <div id="saveHobTitle" class="box">
                            <div class="head">
                                <h1 id="saveHobTitleHeading">Add Job Title</h1>
                            </div>

                            <div class="inner">





                                <form name="frmSavejobTitle" id="frmSavejobTitle" method="post" action="/hrm/symfony/web/index.php/admin/saveJobTitle/jobTitleId/" enctype="multipart/form-data" class="" novalidate="novalidate">

                                    <input type="hidden" name="jobTitle[_csrf_token]" value="2cb0a5acf7733d16ffc208cfa93636a3" id="jobTitle__csrf_token">
                                    <fieldset>

                                        <ol>

                                            <li>
                                                <label for="jobTitle_jobTitle">Job Title <em>*</em></label>                        <input type="text" name="jobTitle[jobTitle]" maxlength="100" id="jobTitle_jobTitle">                    </li>

                                            <li class="largeTextBox">
                                                <label for="jobTitle_jobDescription">Job Description</label>                        <textarea rows="4" cols="30" name="jobTitle[jobDescription]" maxlength="400" id="jobTitle_jobDescription"></textarea>                    </li>

                                            <li>
                                                <label for="jobTitle_jobSpec">Job Specification</label><input type="file" name="jobTitle[jobSpec]" id="jobTitle_jobSpec"><label class="fieldHelpBottom">Accepts up to 1MB</label>                    </li>


                                            <li class="largeTextBox">
                                                <label for="jobTitle_note">Note</label>                        <textarea rows="4" cols="30" name="jobTitle[note]" id="jobTitle_note"></textarea>                    </li>

                                            <li class="required">
                                                <em>*</em> Required field                    </li>

                                        </ol>

                                        <p>
                                            <input type="button" class="editButton" name="btnSave" id="btnSave" value="Save">

                                            <input type="button" class="reset" name="btnCancel" id="btnCancel" value="Cancel">
                                        </p>

                                    </fieldset>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>