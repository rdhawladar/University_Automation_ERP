<div class="row">
	<div class="col-md-12">
        <div id="content">




            <div id="mainDiv">
                <div class="box" id="search-results">

                    <div class="head"><h1>Leave Types</h1></div>

                    <div class="inner">







                        <form method="post" action="/hrm/symfony/web/index.php/leave/deleteLeaveType" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
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
                                        <th rowspan="1" style="width:99%"><span class="headerCell">Leave Type</span></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td colspan="2">No Records Found</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div> <!-- tableWrapper -->
                        </form> <!-- frmList_ohrmListComponent -->


                    </div> <!-- inner -->

                </div> <!-- search-results -->

                <script type="text/javascript" src="/hrm/symfony/web/webres_55a775cf9fcff8.50052456/orangehrmCorePlugin/js/_ohrmList.js"></script>


                <script type="text/javascript">

                    var rootPath = '/hrm/symfony/web/';

                    $(document).ready(function() {
                        ohrmList_init();

                    });


                </script>

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
            <!-- Confirmation box HTML: Ends -->

            <script type="text/javascript">
                //<![CDATA[
                var defineLeaveTypeUrl = '/hrm/symfony/web/index.php/leave/defineLeaveType';
                var lang_SelectLeaveTypeToDelete = 'Select Records to Delete';
                //]]>
            </script>

        </div>
    </div>
</div>