<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('holidays');?>
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


                    <div id="holiday-information" class="box toggableForm">

                        <div class="head">
                            <h1 id="searchHolidayHeading">Holidays</h1>
                        </div>

                        <div class="inner">

                            <form id="frmHolidaySearch" name="frmHolidaySearch" method="post" action="/hrm/symfony/web/index.php/leave/viewHolidayList">


                                <fieldset>

                                    <ol>
                                        <li><label for="holidayList_calFromDate">From</label>
                                            <input id="calFromDate" type="text" name="holidayList[calFromDate]" value="2016-01-01" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                        </li>
                                        <li><label for="holidayList_calToDate">To</label>
                                            <input id="calToDate" type="text" name="holidayList[calToDate]" value="2016-12-31" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                            <input type="hidden" name="holidayList[_csrf_token]" value="2a73e492962d85fb4b96a360e48393e2" id="holidayList__csrf_token"></li>
                                    </ol>

                                    <p>
                                        <input type="button" name="btnSearch" id="btnSearch" value="Search" class="savebutton">
                                    </p>

                                </fieldset>

                            </form>


                        </div>

                        <a href="#" class="toggle tiptip">&gt;</a>

                    </div>

                    <div id="holidayList">
                        <div class="box noHeader" id="search-results">


                            <div class="inner">




                                <form method="post" action="/hrm/symfony/web/index.php/leave/deleteHoliday" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                                <th rowspan="1" style="width:40%"><span class="headerCell">Name</span></th>
                                                <th rowspan="1" style="width:25%"><span class="headerCell">Date</span></th>
                                                <th rowspan="1" style="width:20%"><span class="headerCell">Full Day/Half Day</span></th>
                                                <th rowspan="1" style="width:15%"><span class="headerCell">Repeats Annually</span></th>
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
                <div id="location" class="box single">

                    <div class="head">
                        <h1 id="locationHeading">Add Holiday</h1>
                    </div>

                    <div class="inner">




                        <form id="frmHoliday" name="frmHoliday" method="post" action="/hrm/symfony/web/index.php/leave/defineHoliday" novalidate="novalidate">

                            <fieldset>

                                <ol>
                                    <li><label for="holiday_description">Name <em>*</em></label>
                                        <input type="text" name="holiday[description]" id="holiday_description">
                                    </li>
                                    <li><label for="holiday_date">Date <em>*</em></label>
                                        <input id="holiday_date" type="text" name="holiday[date]" class="calendar hasDatepicker"><img class="ui-datepicker-trigger" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/themes/default/images/calendar.png" alt="" title="">
                                    </li>
                                    <li><label for="holiday_recurring">Repeats Annually</label>
                                        <input type="checkbox" name="holiday[recurring]" id="holiday_recurring">
                                    </li>
                                    <li><label for="holiday_length">Full Day/Half Day</label>
                                        <select name="holiday[length]" id="holiday_length">
                                            <option value="0">Full Day</option>
                                            <option value="4">Half Day</option>
                                        </select>
                                        <input type="hidden" name="holiday[id]" id="holiday_id">
                                        <input type="hidden" name="holiday[_csrf_token]" value="b07b1b5548eec0ad7a8c65b96027bd3f" id="holiday__csrf_token"></li>
                                    <input type="hidden" name="hdnEditMode" id="hdnEditMode" value="no">
                                    <li class="required">
                                        <em>*</em> Required field                    </li>
                                </ol>

                                <p>

                                </p><div class="formbuttons">
                                    <input type="button" class="savebutton" id="saveBtn" value="Save">
                                    <input type="button" class="reset" name="btnCancel" id="btnCancel" value="Cancel">
                                </div>

                                <p></p>

                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>