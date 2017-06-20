<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('termination_reasons');?>
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
                            <h1 id="saveFormHeading">Add Termination Reason</h1>
                        </div>

                        <div class="inner">

                            <form name="frmSave" id="frmSave" method="post" action="/hrm/symfony/web/index.php/pim/viewTerminationReasons">

                                <input type="hidden" name="terminationReason[_csrf_token]" value="2898f877d1ddb84498db09030c5b86c1" id="terminationReason__csrf_token">            <input type="hidden" name="terminationReason[id]" value="" id="terminationReason_id">
                                <fieldset>

                                    <ol>

                                        <li>
                                            <label for="terminationReason_name">Name <em>*</em></label>                        <input type="text" name="terminationReason[name]" maxlength="100" id="terminationReason_name">                    </li>

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
                            <h1>Termination Reasons</h1>
                        </div>

                        <div class="inner">





                            <form name="frmList" id="frmList" method="post" action="/hrm/symfony/web/index.php/pim/deleteTerminationReasons">
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
                                        <td class="check"><input type="checkbox" class="checkbox" name="chkListRecord[]" value="3"></td>
                                        <td class="tdName tdValue"><a href="#">Contract Not Renewed</a></td>
                                    </tr>


                                    <tr class="even">
                                        <td class="check"><input type="checkbox" class="checkbox" name="chkListRecord[]" value="7"></td>
                                        <td class="tdName tdValue"><a href="#">Deceased</a></td>
                                    </tr>


                                    <tr class="odd">
                                        <td class="check"><input type="checkbox" class="checkbox" name="chkListRecord[]" value="10"></td>
                                        <td class="tdName tdValue"><a href="#">Dismissed</a></td>
                                    </tr>


                                    <tr class="even">
                                        <td class="check"><input type="checkbox" class="checkbox" name="chkListRecord[]" value="9"></td>
                                        <td class="tdName tdValue"><a href="#">Laid-off</a></td>
                                    </tr>


                                    <tr class="odd">
                                        <td class="check"><input type="checkbox" class="checkbox" name="chkListRecord[]" value="1"></td>
                                        <td class="tdName tdValue"><a href="#">Other</a></td>
                                    </tr>


                                    <tr class="even">
                                        <td class="check"><input type="checkbox" class="checkbox" name="chkListRecord[]" value="8"></td>
                                        <td class="tdName tdValue"><a href="#">Physically Disabled/Compensated</a></td>
                                    </tr>


                                    <tr class="odd">
                                        <td class="check"><input type="checkbox" class="checkbox" name="chkListRecord[]" value="6"></td>
                                        <td class="tdName tdValue"><a href="#">Resigned</a></td>
                                    </tr>


                                    <tr class="even">
                                        <td class="check"><input type="checkbox" class="checkbox" name="chkListRecord[]" value="4"></td>
                                        <td class="tdName tdValue"><a href="#">Resigned - Company Requested</a></td>
                                    </tr>


                                    <tr class="odd">
                                        <td class="check"><input type="checkbox" class="checkbox" name="chkListRecord[]" value="5"></td>
                                        <td class="tdName tdValue"><a href="#">Resigned - Self Proposed</a></td>
                                    </tr>


                                    <tr class="even">
                                        <td class="check"><input type="checkbox" class="checkbox" name="chkListRecord[]" value="2"></td>
                                        <td class="tdName tdValue"><a href="#">Retired</a></td>
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
                        <h1 id="saveFormHeading">Add Termination Reason</h1>
                    </div>

                    <div class="inner">

                        <form name="frmSave" id="frmSave" method="post" action="/hrm/symfony/web/index.php/pim/viewTerminationReasons">

                            <input type="hidden" name="terminationReason[_csrf_token]" value="2898f877d1ddb84498db09030c5b86c1" id="terminationReason__csrf_token">            <input type="hidden" name="terminationReason[id]" value="" id="terminationReason_id">
                            <fieldset>

                                <ol>

                                    <li>
                                        <label for="terminationReason_name">Name <em>*</em></label>                        <input type="text" name="terminationReason[name]" maxlength="100" id="terminationReason_name">                    </li>

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