<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('skills_hr');?>
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
                            <h1 id="saveFormHeading">Add Skill</h1>
                        </div>

                        <div class="inner">

                            <form name="frmSave" id="frmSave" method="post" action="/hrm/symfony/web/index.php/admin/viewSkills">

                                <input type="hidden" name="skill[_csrf_token]" value="090f522ca34f8b17ea7f2abc9b378b42" id="skill__csrf_token">            <input type="hidden" name="skill[id]" value="" id="skill_id">
                                <fieldset>

                                    <ol>

                                        <li>
                                            <label for="skill_name">Name <em>*</em></label>                        <input type="text" name="skill[name]" class="block default editable valid" maxlength="120" id="skill_name">                    </li>

                                        <li class="largeTextBox">
                                            <label for="skill_description">Description</label>                        <textarea rows="5" cols="10" name="skill[description]" class="editable" id="skill_description"></textarea>                    </li>

                                        <li class="required">
                                            <em>*</em> Required field                    </li>

                                    </ol>

                                    <p>
                                        <input type="button" id="btnSave" class="addbutton" name="btnSave" value="Save">
                                        <input type="button" id="btnCancel" class="btn reset" value="Cancel">
                                    </p>

                                </fieldset>

                            </form>

                        </div>

                    </div> <!-- saveFormDiv -->

                    <!-- Listi view -->

                    <div id="recordsListDiv" class="box miniList">
                        <div class="head">
                            <h1>Skills</h1>
                        </div>

                        <div class="inner">





                            <form name="frmList" id="frmList" method="post" action="/hrm/symfony/web/index.php/admin/deleteSkills">
                                <input type="hidden" name="defaultList[_csrf_token]" value="43cebe94d6e39e72c1b16a82ff436a09" id="defaultList__csrf_token">            <p id="listActions">
                                    <input type="button" class="addbutton" id="btnAdd" value="Add">
                                    <input type="button" class="delete" id="btnDel" value="Delete" disabled="disabled">
                                </p>

                                <table class="table hover" id="recordsListTable">
                                    <thead>
                                    <tr>
                                        <th class="check" style="width: 2%; display: none;"><input type="checkbox" id="checkAll" class="checkboxAtch">
                                        </th><th style="width:40%">Name
                                        </th><th style="width:58%">Description
                                        </th></tr>
                                    </thead>
                                    <tbody>


                                    <tr class="even">
                                        <td>
                                            No Records Found                        </td>
                                        <td>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div> <!-- recordsListDiv -->

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
                <div class="box" id="saveFormDiv" style="display: block;">

                    <div class="head">
                        <h1 id="saveFormHeading">Add Skill</h1>
                    </div>

                    <div class="inner">

                        <form name="frmSave" id="frmSave" method="post" action="/hrm/symfony/web/index.php/admin/viewSkills">

                            <input type="hidden" name="skill[_csrf_token]" value="090f522ca34f8b17ea7f2abc9b378b42" id="skill__csrf_token">            <input type="hidden" name="skill[id]" value="" id="skill_id">
                            <fieldset>

                                <ol>

                                    <li>
                                        <label for="skill_name">Name <em>*</em></label>                        <input type="text" name="skill[name]" class="block default editable valid" maxlength="120" id="skill_name">                    </li>

                                    <li class="largeTextBox">
                                        <label for="skill_description">Description</label>                        <textarea rows="5" cols="10" name="skill[description]" class="editable" id="skill_description"></textarea>                    </li>

                                    <li class="required">
                                        <em>*</em> Required field                    </li>

                                </ol>

                                <p>
                                    <input type="button" id="btnSave" class="addbutton" name="btnSave" value="Save">
                                    <input type="button" id="btnCancel" class="btn reset" value="Cancel">
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