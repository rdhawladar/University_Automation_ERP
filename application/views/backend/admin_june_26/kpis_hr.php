<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('kpis_hr');?>
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


                    <div class="box searchForm toggableForm" id="divFormContainer">
                        <div class="head">
                            <h1>Search Key Performance Indicators</h1>
                        </div>

                        <div class="inner">

                            <form id="searchKpi" name="searchKpi" method="post" action="">
                                <fieldset>
                                    <ol>
                                        <li><label for="kpi360SearchForm_jobTitleCode">Job Title</label>
                                            <select class="formSelect" name="kpi360SearchForm[jobTitleCode]" id="kpi360SearchForm_jobTitleCode">
                                                <option value="" selected="selected">All</option>
                                            </select>
                                            <input type="hidden" name="kpi360SearchForm[_csrf_token]" value="2f7be9b3c8ee38426e18c58f497a81a2" id="kpi360SearchForm__csrf_token"></li>
                                    </ol>

                                    <p>
                                        <input type="button" class="addbutton" name="searchBtn" id="searchBtn" value="Search">
                                    </p>
                                </fieldset>
                            </form>
                        </div>

                        <a href="#" class="toggle tiptip">&gt;</a>
                    </div>

                    <div class="box" id="search-results">

                        <div class="head"><h1>Key Performance Indicators for Job Title</h1></div>

                        <div class="inner">







                            <form method="post" action="/hrm/symfony/web/index.php/performance/deleteKpi" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                            <th rowspan="1" style="width:"><span class="headerCell">Key Performance Indicator</span></th>
                                            <th rowspan="1" style="width:"><span class="headerCell">Job Title</span></th>
                                            <th rowspan="1" style="width:5%"><span class="headerCell">Min Rate</span></th>
                                            <th rowspan="1" style="width:5%"><span class="headerCell">Max Rate</span></th>
                                            <th rowspan="1" style="width:"><span class="headerCell">Is Default</span></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td colspan="6">No Records Found</td>
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
                <div id="location" class="box">
                    <div class="head">
                        <h1 id="PerformanceHeading">Key Performance Indicator</h1>
                    </div>

                    <div class="inner">




                        <form name="searchKpi" id="searchKpi" method="post" action="" novalidate="novalidate">

                            <fieldset>

                                <ol>
                                    <li><label for="defineKpi360_jobTitleCode">Job Title&nbsp;<span class="required">*</span></label>
                                        <select class="formSelect" name="defineKpi360[jobTitleCode]" id="defineKpi360_jobTitleCode">
                                            <option value="" selected="selected">--Select--</option>
                                        </select>
                                    </li>
                                    <li><label for="defineKpi360_keyPerformanceIndicators">Key Performance Indicator&nbsp;<span class="required">*</span></label>
                                        <input class="formInputText" type="text" name="defineKpi360[keyPerformanceIndicators]" id="defineKpi360_keyPerformanceIndicators">
                                    </li>
                                    <li><label for="defineKpi360_minRating">Minimum Rating&nbsp;<span class="required">*</span></label>
                                        <input class="formInputText" type="text" name="defineKpi360[minRating]" id="defineKpi360_minRating">
                                    </li>
                                    <li><label for="defineKpi360_maxRating">Maximum Rating&nbsp;<span class="required">*</span></label>
                                        <input class="formInputText" type="text" name="defineKpi360[maxRating]" id="defineKpi360_maxRating">
                                    </li>
                                    <li><label for="defineKpi360_makeDefault">Make Default Scale</label>
                                        <input class="formCheckbox" type="checkbox" name="defineKpi360[makeDefault]" id="defineKpi360_makeDefault">
                                        <input type="hidden" name="defineKpi360[id]" id="defineKpi360_id">
                                        <input type="hidden" name="defineKpi360[_csrf_token]" value="1e917a764fd15f3b2c74c721c209405d" id="defineKpi360__csrf_token"></li>

                                    <li class="required">
                                        <em>*</em> Required field                    </li>
                                </ol>

                                <p>
                                    <input type="button" class="addbutton" name="saveBtn" id="saveBtn" value="Save">
                                    <input id="btnCancel" class="reset" type="button" value="Cancel" name="btnCancel">
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