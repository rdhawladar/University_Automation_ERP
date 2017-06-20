<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('pay_grades');?>
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

                            <div class="head"><h1>Pay Grades</h1></div>

                            <div class="inner">







                                <form method="post" action="/hrm/symfony/web/index.php/admin/deletePayGrades" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                                <th rowspan="1" style="width:49%" class="header"><a href="http://localhost/hrm/symfony/web/index.php/admin/viewPayGrades?sortField=name&amp;sortOrder=ASC" class="null">Pay Grade</a></th>
                                                <th rowspan="1" style="width:49%"><span class="headerCell">Currency</span></th>
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

                </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div id="content">




                    <div id="payGrade" class="box">

                        <div class="head">
                            <h1 id="payGradeHeading">Add Pay Grade</h1>
                        </div>

                        <div class="inner">





                            <form name="frmPayGrade" id="frmPayGrade" method="post" action="/hrm/symfony/web/index.php/admin/payGrade" novalidate="novalidate">

                                <fieldset>

                                    <ol>

                                        <li><label for="payGrade_name">Name <em>*</em></label>
                                            <input type="text" name="payGrade[name]" id="payGrade_name">
                                            <input type="hidden" name="payGrade[payGradeId]" id="payGrade_payGradeId">
                                            <input type="hidden" name="payGrade[_csrf_token]" value="96b8352a373757dcdd7b76d54398a677" id="payGrade__csrf_token"></li>

                                        <li class="required">
                                            <em>*</em> Required field                    </li>

                                    </ol>

                                    <p>
                                        <input type="button" class="addbutton" name="btnSave" id="btnSave" value="Save">
                                        <input type="button" class="reset" name="btnCancel" id="btnCancel" value="Cancel">
                                    </p>

                                </fieldset>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>