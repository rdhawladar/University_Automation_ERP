<div class="row">
	<div class="col-md-12">
        <section class="content">




            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-search"></i> Select Batch</h3>
                </div>
                <div class="box-body">
                    <form action="/course/batch-subject-allot/index" method="GET">			<div class="row">
                            <div class="col-sm-6">
                                <select class="form-control" name="aid" onchange="$.get( &quot;/dependent/get-academic-batches&quot;, { yid : $(this).val() })
							.done(function(data) {
								$( &quot;#branch-id&quot;).html(data);
						});">
                                    <option value="">---Select Academic Year---</option>
                                    <option value="4" selected="">2016 Summer Intake</option>
                                    <option value="3">2017-18</option>
                                    <option value="2">2016-17</option>
                                    <option value="1">2015-16</option>
                                </select>				</div>
                            <div class="col-sm-6">
                                <select id="branch-id" class="form-control" name="bid" onchange="this.form.submit()">
                                    <option value="">---Select Batch---</option>
                                    <optgroup label="Master of Business Application">
                                        <option value="12" selected="">MBA Summer</option>
                                    </optgroup>
                                </select>				</div>
                        </div>
                    </form>    </div><!-- /.box-body -->
            </div><!-- /.box-->



            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-th-list"></i> Current Subject List of MBA Summer </h3>
                </div>
                <div class="box-body table-responsive">

                    <div id="batch-subject-view-id"><div id="w0" class="grid-view"><div class="summary">Showing <b>1-3</b> of <b>3</b> items.</div>
                            <table class="table table-striped table-bordered"><thead>
                                <tr><th>#</th><th>Academic Name</th><th>Batch Name</th><th>Subject Name</th><th>&nbsp;</th></tr>
                                </thead>
                                <tbody>
                                <tr data-key="55"><td>1</td><td>2016 Summer Intake</td><td>MBA Summer</td><td>Marketing Management</td><td><a class="view-batch-sub" href="#" data-value="/course/batch-subject-allot/view?id=55"><span class="glyphicon glyphicon-eye-open"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/batch-subject-allot/delete?id=55" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                                <tr data-key="56"><td>2</td><td>2016 Summer Intake</td><td>MBA Summer</td><td>Organisational Behaviour</td><td><a class="view-batch-sub" href="#" data-value="/course/batch-subject-allot/view?id=56"><span class="glyphicon glyphicon-eye-open"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/batch-subject-allot/delete?id=56" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                                <tr data-key="57"><td>3</td><td>2016 Summer Intake</td><td>MBA Summer</td><td>Human Resource MAnagement</td><td><a class="view-batch-sub" href="#" data-value="/course/batch-subject-allot/view?id=57"><span class="glyphicon glyphicon-eye-open"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/batch-subject-allot/delete?id=57" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                                </tbody></table>
                        </div>
                    </div>    </div><!-- /.box-body -->
            </div><!-- /.box-->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-upload"></i> Import New Subject in MBA Summer		</h3>
                </div>
                <div class="box-body table-responsive">
                    <form id="form" name="form_name" action="/course/batch-subject-allot/create?bid=12" method="post">
                        <input type="hidden" name="_method" value="">
                        <input type="hidden" name="_csrf" value="UU54RERMUjcWBU0rNSYcdj0/DSUXDTZbEDk9dwckOVsGPU4SFAcVTw==">
                        <script>
                            $(function () {
                                $('#checkall').click(function () {
                                    $(this).parents('table:eq(0)').find(':checkbox').attr('checked', this.checked);
                                });
                            });

                            $(document).ready(function() {
                                $('.dataTable tr').click(function(event) {
                                    if (event.target.type !== 'checkbox') {
                                        $(':checkbox', this).trigger('click');
                                    }
                                });
                                $("input[type='checkbox']").change(function (e) {
                                    if ($(this).is(":checked")) { //If the checkbox is checked
                                        $(this).closest('tr').addClass("select-tr");
                                        //Add class on checkbox checked
                                    } else {
                                        $(this).closest('tr').removeClass("select-tr");
                                        //Remove class on checkbox uncheck
                                    }
                                });

                            });
                        </script>




                        <div id="subject-master-id">
                            <div id="w1" class="grid-view"><div id="dataTable_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="top"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 23 entries</div><div id="dataTable_filter" class="dataTables_filter"><label>Search:<div class="form-group has-feedback"><input type="search" class="form-control" placeholder="" aria-controls="dataTable"><span class="glyphicon glyphicon-search form-control-feedback"></span></div></label></div></div><table id="dataTable" class="table table-striped table-bordered dataTable no-footer" aria-describedby="dataTable_info" role="grid"><thead>
                                        <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 40px;">&nbsp;</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 42px;">#</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 475px;">Subject Name</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 168px;">Subject Code</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 168px;">Subject Alias</th></tr>
                                        </thead>
                                        <tbody>























                                        <tr data-key="1" role="row" class="odd"><td><input type="checkbox" id="selectTmp" name="selection[]" value="1"></td><td>1</td><td>Computer Fundamentals</td><td>CF112</td><td>CF</td></tr><tr data-key="2" role="row" class="even"><td><input type="checkbox" id="selectTmp" name="selection[]" value="2"></td><td>2</td><td>Discrete Mathematics</td><td>DM110</td><td>DM</td></tr><tr data-key="3" role="row" class="odd"><td><input type="checkbox" id="selectTmp" name="selection[]" value="3"></td><td>3</td><td>DBMS I</td><td>DBMS102</td><td>DBMS</td></tr><tr data-key="4" role="row" class="even"><td><input type="checkbox" id="selectTmp" name="selection[]" value="4"></td><td>4</td><td>Computer Networks - II</td><td>CN102</td><td>CN-II</td></tr><tr data-key="5" role="row" class="odd"><td><input type="checkbox" id="selectTmp" name="selection[]" value="5"></td><td>5</td><td>Web Technologies</td><td>WT234</td><td>WT</td></tr><tr data-key="6" role="row" class="even"><td><input type="checkbox" id="selectTmp" name="selection[]" value="6"></td><td>6</td><td>Numerical and Statistical Computing</td><td>NSC001</td><td>NSC</td></tr><tr data-key="7" role="row" class="odd"><td><input type="checkbox" id="selectTmp" name="selection[]" value="7"></td><td>7</td><td>Computer Graphics and Image Processing</td><td>CGIP12</td><td>CGIP</td></tr><tr data-key="8" role="row" class="even"><td><input type="checkbox" id="selectTmp" name="selection[]" value="8"></td><td>8</td><td>Human Machine Interface</td><td>HMI043</td><td>HMI</td></tr><tr data-key="9" role="row" class="odd"><td><input type="checkbox" id="selectTmp" name="selection[]" value="9"></td><td>9</td><td>Optimization Techniques</td><td>OT45</td><td>OT</td></tr><tr data-key="10" role="row" class="even"><td><input type="checkbox" id="selectTmp" name="selection[]" value="10"></td><td>10</td><td>Artificial Intelligent System</td><td>AIS003</td><td>AIS</td></tr></tbody></table><div class="bottom"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="dataTables_paginate paging_bs_normal" id="dataTable_paginate"><ul class="pagination"><li class="prev disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li class="next"><a href="#">Next&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li></ul></div></div><div class="clear"></div></div></div>
                        </div>


                    </form></div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Import</button>	</div><!-- /.box-footer-->

            </div><!-- /.box-->



            <div id="batchSubModal" class="fade modal" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4><i class="fa fa-eye"></i> View Batch Subject Details</h4>
                        </div>
                        <div class="modal-body">
                            <div id="batchSubModalContent"></div>
                        </div>

                    </div>
                </div>
            </div>


        </section>
	</div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>