<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('reporting_methods');?>
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




                    <div id="saveFormDiv" class="box" style="display: none;">

                        <div class="head">
                            <h1 id="saveFormHeading">Add Reporting Method</h1>
                        </div>

                        <div class="inner">

                            <form name="frmSave" id="frmSave" method="post" action="/hrm/symfony/web/index.php/pim/viewReportingMethods">

                                <input type="hidden" name="reportingMethod[_csrf_token]" value="47c8fbeb2f4a9e29ba0bd19a36eedfa6" id="reportingMethod__csrf_token">            <input type="hidden" name="reportingMethod[id]" value="" id="reportingMethod_id">
                                <fieldset>

                                    <ol>

                                        <li>
                                            <label for="reportingMethod_name">Name <em>*</em></label>                        <input type="text" name="reportingMethod[name]" maxlength="100" id="reportingMethod_name">                    </li>

                                        <li class="required">
                                            <em>*</em> Required field                    </li>

                                    </ol>

                                    <p>
                                        <input type="button" class="" name="btnSave" id="btnSave" value="Save">
                                        <input type="button" id="btnCancel" class="reset" value="Cancel">
                                    </p>

                                </fieldset>

                            </form>

                        </div>

                    </div> <!-- saveFormDiv -->

                    <!-- Listi view -->

                    <div id="recordsListDiv" class="box miniList">

                        <div class="head">
                            <h1>Reporting Methods</h1>
                        </div>

                        <div class="inner">





                            <form name="frmList" id="frmList" method="post" action="/hrm/symfony/web/index.php/pim/deleteReportingMethods">
                                <input type="hidden" name="defaultList[_csrf_token]" value="43cebe94d6e39e72c1b16a82ff436a09" id="defaultList__csrf_token">            <fieldset>

                                    <p id="listActions">
                                        <input type="button" class="addbutton" id="btnAdd" value="Add">
                                        <input type="button" class="delete" id="btnDel" value="Delete" disabled="disabled">
                                    </p>

                                </fieldset>

                                <table class="table hover" id="recordsListTable">
                                    <thead>
                                    <tr>
                                        <th class="check" style="width:2%"><input type="checkbox" id="checkAll" class="checkbox"></th>
                                        <th style="width:98%">Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr class="odd">
                                        <td class="check">
                                            <input type="checkbox" class="checkbox" name="chkListRecord[]" value="1">
                                        </td>
                                        <td class="tdName tdValue">
                                            <a href="#">Direct</a>
                                        </td>
                                    </tr>

                                    <tr class="even">
                                        <td class="check">
                                            <input type="checkbox" class="checkbox" name="chkListRecord[]" value="2">
                                        </td>
                                        <td class="tdName tdValue">
                                            <a href="#">Indirect</a>
                                        </td>
                                    </tr>



                                    </tbody>
                                </table>

                            </form>

                        </div>

                    </div> <!-- recordsListDiv -->
                </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div id="saveFormDiv" class="box" style="display: block;">

                    <div class="head">
                        <h1 id="saveFormHeading">Add Reporting Method</h1>
                    </div>

                    <div class="inner">

                        <form name="frmSave" id="frmSave" method="post" action="/hrm/symfony/web/index.php/pim/viewReportingMethods">

                            <input type="hidden" name="reportingMethod[_csrf_token]" value="47c8fbeb2f4a9e29ba0bd19a36eedfa6" id="reportingMethod__csrf_token">            <input type="hidden" name="reportingMethod[id]" value="" id="reportingMethod_id">
                            <fieldset>

                                <ol>

                                    <li>
                                        <label for="reportingMethod_name">Name <em>*</em></label>                        <input type="text" name="reportingMethod[name]" maxlength="100" id="reportingMethod_name">                    </li>

                                    <li class="required">
                                        <em>*</em> Required field                    </li>

                                </ol>

                                <p>
                                    <input type="button" class="" name="btnSave" id="btnSave" value="Save">
                                    <input type="button" id="btnCancel" class="reset" value="Cancel">
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