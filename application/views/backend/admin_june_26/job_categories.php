<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('job_categories');?>
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



                    <div class="box" id="jobCategory" style="display: none;">

                        <div class="head">
                            <h1 id="jobCategoryHeading">Job Category</h1>
                        </div>

                        <div class="inner">

                            <form name="frmJobCategory" id="frmJobCategory" method="post" action="/hrm/symfony/web/index.php/admin/jobCategory" novalidate="novalidate">

                                <input type="hidden" name="jobCategory[_csrf_token]" value="e73f8890002193fac04a55de92cadf65" id="jobCategory__csrf_token">            <input type="hidden" name="jobCategory[jobCategoryId]" id="jobCategory_jobCategoryId"><input type="hidden" name="jobCategory[_csrf_token]" value="e73f8890002193fac04a55de92cadf65" id="jobCategory__csrf_token">
                                <fieldset>

                                    <ol>

                                        <li>
                                            <label for="jobCategory_name">Name <em>*</em></label>                        <input type="text" name="jobCategory[name]" class="formInput" maxlength="52" id="jobCategory_name">                    </li>

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

                    </div> <!-- jobCategory end -->

                    <div id="customerList">
                        <div class="box" id="search-results">

                            <div class="head"><h1>Job Categories</h1></div>

                            <div class="inner">







                                <form method="post" action="/hrm/symfony/web/index.php/admin/deleteJobCategory" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                                <th rowspan="1" style="width:"><span class="headerCell">Job Category</span></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_7" name="chkSelectRow[]" value="7"></td>                                <td class="left"><a href="javascript:">Craft Workers</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_9" name="chkSelectRow[]" value="9"></td>                                <td class="left"><a href="javascript:">Laborers and Helpers</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_6" name="chkSelectRow[]" value="6"></td>                                <td class="left"><a href="javascript:">Office and Clerical Workers</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_1" name="chkSelectRow[]" value="1"></td>                                <td class="left"><a href="javascript:">Officials and Managers</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_5" name="chkSelectRow[]" value="5"></td>                                <td class="left"><a href="javascript:">Operatives</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_2" name="chkSelectRow[]" value="2"></td>                                <td class="left"><a href="javascript:">Professionals</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_4" name="chkSelectRow[]" value="4"></td>                                <td class="left"><a href="javascript:">Sales Workers</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_8" name="chkSelectRow[]" value="8"></td>                                <td class="left"><a href="javascript:">Service Workers</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_3" name="chkSelectRow[]" value="3"></td>                                <td class="left"><a href="javascript:">Technicians</a></td>
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
                <div class="box" id="jobCategory" style="display: block;">

                    <div class="head">
                        <h1 id="jobCategoryHeading">Add Job Category</h1>
                    </div>

                    <div class="inner">

                        <form name="frmJobCategory" id="frmJobCategory" method="post" action="/hrm/symfony/web/index.php/admin/jobCategory" novalidate="novalidate">

                            <input type="hidden" name="jobCategory[_csrf_token]" value="e73f8890002193fac04a55de92cadf65" id="jobCategory__csrf_token">            <input type="hidden" name="jobCategory[jobCategoryId]" id="jobCategory_jobCategoryId" value=""><input type="hidden" name="jobCategory[_csrf_token]" value="e73f8890002193fac04a55de92cadf65" id="jobCategory__csrf_token">
                            <fieldset>

                                <ol>

                                    <li>
                                        <label for="jobCategory_name">Name <em>*</em></label>                        <input type="text" name="jobCategory[name]" class="formInput" maxlength="52" id="jobCategory_name">                    </li>

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
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>