<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('languages_hr');?>
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



                    <div class="box" id="saveFormDiv" style="display: none;">
                        <div class="head">
                            <h1 id="saveFormHeading">Add Language</h1>
                        </div>

                        <div class="inner">

                            <form name="frmSave" id="frmSave" method="post" action="/hrm/symfony/web/index.php/admin/viewLanguages">

                                <input type="hidden" name="language[_csrf_token]" value="abf074440a8d3385c90d87ab241049e0" id="language__csrf_token">
                                <input type="hidden" name="language[id]" value="" id="language_id">
                                <fieldset>

                                    <ol>

                                        <li>
                                            <label for="language_name">Name <em>*</em></label>                        <input type="text" name="language[name]" class="block default editable valid" maxlength="120" id="language_name">                    </li>

                                        <li class="required">
                                            <em>*</em> Required field                    </li>

                                    </ol>

                                    <p>
                                        <input type="button" class="addbutton" name="btnSave" id="btnSave" value="Save">
                                        <input type="button" id="btnCancel" class="reset" value="Cancel">
                                    </p>

                                </fieldset>

                            </form>

                        </div>

                    </div> <!-- saveFormDiv -->

                    <!-- Listi view -->

                    <div id="recordsListDiv" class="box miniList">
                        <div class="head">
                            <h1>Languages</h1>
                        </div>

                        <div class="inner">





                            <form name="frmList" id="frmList" method="post" action="/hrm/symfony/web/index.php/admin/deleteLanguages">
                                <input type="hidden" name="defaultList[_csrf_token]" value="43cebe94d6e39e72c1b16a82ff436a09" id="defaultList__csrf_token">            <p id="listActions">
                                    <input type="button" class="addbutton" id="btnAdd" value="Add">
                                    <input type="button" class="delete" id="btnDel" value="Delete" disabled="disabled">
                                </p>

                                <table class="table hover" id="recordsListTable">
                                    <thead>
                                    <tr>
                                        <th class="check" style="width: 2%; display: none;"><input type="checkbox" id="checkAll" class="checkboxAtch"></th>
                                        <th style="width:98%">Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr class="even">
                                        <td>
                                            No Records Found                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div> <!-- recordsListDiv -->
                </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box" id="saveFormDiv" style="display: block;">
                    <div class="head">
                        <h1 id="saveFormHeading">Add Language</h1>
                    </div>

                    <div class="inner">

                        <form name="frmSave" id="frmSave" method="post" action="/hrm/symfony/web/index.php/admin/viewLanguages">

                            <input type="hidden" name="language[_csrf_token]" value="abf074440a8d3385c90d87ab241049e0" id="language__csrf_token">
                            <input type="hidden" name="language[id]" value="" id="language_id">
                            <fieldset>

                                <ol>

                                    <li>
                                        <label for="language_name">Name <em>*</em></label>                        <input type="text" name="language[name]" class="block default editable valid" maxlength="120" id="language_name">                    </li>

                                    <li class="required">
                                        <em>*</em> Required field                    </li>

                                </ol>

                                <p>
                                    <input type="button" class="addbutton" name="btnSave" id="btnSave" value="Save">
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