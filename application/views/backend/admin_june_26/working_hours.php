<div class="row">
    <div class="col-md-12">
        <div class="content">
            <form id="Timetable-form" action="/index.php/core/timetable/workinghours" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Select Department</h4>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-12">

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="reg_input" class="req">Department</label>

                                                <select class="form-control" name="departmentid" id="departmentid">
                                                    <option value="">Select Department</option>
                                                    <option value="1">IT department</option>
                                                    <option value="2">MATHEMATICS</option>
                                                    <option value="3">BIOLOGY asas</option>
                                                    <option value="4">SCIENCE JUNIOR</option>
                                                    <option value="5">SST JUNIOR</option>
                                                    <option value="6">PHYSICS</option>
                                                    <option value="7">CHEMISTRY</option>
                                                    <option value="8">HISTORY</option>
                                                    <option value="9">ENGLISH</option>
                                                    <option value="10">CIVICS</option>
                                                    <option value="11">BUS</option>
                                                    <option value="12">LIBRARY</option>
                                                    <option value="13">OTHERS</option>
                                                    <option value="14">ACCOUNT</option>
                                                    <option value="15">NON TEACHING</option>
                                                    <option value="16">dfdffd</option>
                                                    <option value="17">mmn</option>
                                                    <option value="18">aaaaa1</option>
                                                    <option value="19">Faculty</option>
                                                    <option value="20">Administration</option>
                                                    <option value="21">rte</option>
                                                    <option value="22">xzxxas</option>
                                                    <option value="23">hostel</option>
                                                    <option value="24">Computer Science</option>
                                                    <option value="25">CSE</option>
                                                    <option value="26">Civil </option>
                                                </select>                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                    </div>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div></form>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Teachers Working Hour Calculation</h4>
                        </div>
                        <table data-page-size="40" data-filter="#table_search" class="table responsive table table-bordered table table-striped" id="resp_table">
                            <thead>
                            <tr>
                                <th data-toggle="true" class="footable-first-column footable-sortable">SlNo<span class="footable-sort-indicator"></span></th>
                                <th data-hide="phone,tablet" class="footable-sortable">Teacher Name<span class="footable-sort-indicator"></span></th>
                                <th data-hide="phone,tablet" class="footable-sortable">Hours<span class="footable-sort-indicator"></span></th>
                            </tr>
                            </thead>
                            <tbody id="show">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>