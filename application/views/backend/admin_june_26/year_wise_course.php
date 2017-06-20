<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('view_year_wise_courses');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('create_year_wise_course');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr><th>#</th><th><a href="/course/courses-year-wise/index?course%2Fcourses-year-wise%2Findex=&amp;sort=cyw_academic_year" data-sort="cyw_academic_year">Academic Year</a></th><th><a href="/course/courses-year-wise/index?course%2Fcourses-year-wise%2Findex=&amp;sort=cyw_course" data-sort="cyw_course">Course</a></th><th><a href="/course/courses-year-wise/index?course%2Fcourses-year-wise%2Findex=&amp;sort=cyw_status" data-sort="cyw_status">Status</a></th><th>&nbsp;</th></tr><tr id="w2-filters" class="filters"><td>&nbsp;</td><td><select class="form-control" name="CoursesYearWiseSearch[cyw_academic_year]">
                                <option value=""></option>
                                <option value="4">2016 Summer Intake</option>
                                <option value="3">2017-18</option>
                                <option value="2">2016-17</option>
                                <option value="1">2015-16</option>
                            </select></td><td><select class="form-control" name="CoursesYearWiseSearch[cyw_course]">
                                <option value=""></option>
                                <option value="3">Bachelor of Science(Information Technology)</option>
                                <option value="5">Master of Computer Application</option>
                                <option value="6">Master of Business Application</option>
                            </select></td><td><select class="form-control" name="CoursesYearWiseSearch[cyw_status]">
                                <option value=""></option>
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select></td><td>&nbsp;</td></tr>
                    </thead>
                    <tbody>
                    <tr data-key="6"><td>1</td><td>2016 Summer Intake</td><td>Master of Business Application</td><td class="text-center"><a class="toggle-column" href="/course/courses-year-wise/toggle?id=6" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td><a href="/course/courses-year-wise/view?id=6" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/courses-year-wise/update?id=6" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/courses-year-wise/delete?id=6" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="5"><td>2</td><td>2016-17</td><td>Master of Business Application</td><td class="text-center"><a class="toggle-column" href="/course/courses-year-wise/toggle?id=5" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td><a href="/course/courses-year-wise/view?id=5" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/courses-year-wise/update?id=5" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/courses-year-wise/delete?id=5" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="4"><td>3</td><td>2016-17</td><td>Bachelor of Science(Information Technology)</td><td class="text-center"><a class="toggle-column" href="/course/courses-year-wise/toggle?id=4" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td><a href="/course/courses-year-wise/view?id=4" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/courses-year-wise/update?id=4" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/courses-year-wise/delete?id=4" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="3"><td>4</td><td>2017-18</td><td>Master of Computer Application</td><td class="text-center"><a class="toggle-column" href="/course/courses-year-wise/toggle?id=3" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td><a href="/course/courses-year-wise/view?id=3" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/courses-year-wise/update?id=3" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/courses-year-wise/delete?id=3" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="2"><td>5</td><td>2015-16</td><td>Master of Computer Application</td><td class="text-center"><a class="toggle-column" href="/course/courses-year-wise/toggle?id=2" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td><a href="/course/courses-year-wise/view?id=2" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/courses-year-wise/update?id=2" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/courses-year-wise/delete?id=2" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="1"><td>6</td><td>2015-16</td><td>Bachelor of Science(Information Technology)</td><td class="text-center"><a class="toggle-column" href="/course/courses-year-wise/toggle?id=1" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td><a href="/course/courses-year-wise/view?id=1" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/courses-year-wise/update?id=1" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/courses-year-wise/delete?id=1" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus-square"></i> Create Year Wise Course</h3>
                    </div>


                    <form id="w0" action="/course/courses-year-wise/create" method="post">
                        <input type="hidden" name="_csrf" value="U2g4dkZNQ3oUIw0ZNycNOz8ZTRcVDCcWEh99RQUlKBYEGw4gFgYEAg==">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group field-coursesyearwise-cyw_academic_year required has-success">
                                        <label class="control-label" for="coursesyearwise-cyw_academic_year">Academic Year</label>
                                        <select id="coursesyearwise-cyw_academic_year" class="form-control" name="CoursesYearWise[cyw_academic_year]">
                                            <option value="">---Select Academic Year---</option>
                                            <option value="4">2016 Summer Intake</option>
                                            <option value="3">2017-18</option>
                                            <option value="2">2016-17</option>
                                            <option value="1">2015-16</option>
                                        </select>

                                        <div class="help-block"></div>
                                    </div>			</div>
                                <div class="col-sm-12" id="disp-course-list">
                                    <div id="tbl-course-list" class="grid-view"><table class="table table-striped table-bordered"><thead>
                                            <tr><th><input type="checkbox" class="select-on-check-all" name="selection_all" value="1"></th><th>Course Name</th><th>Course Code</th><th>Course Alias</th><th>Active Status</th></tr>
                                            </thead>
                                            <tbody>
                                            <tr data-key="3"><td><input type="checkbox" name="selection[]" value="3"></td><td>Bachelor of Science(Information Technology)</td><td>BSC001</td><td>B.Sc(IT)</td><td><span class="label label-success"> Active </span></td></tr>
                                            <tr data-key="5"><td><input type="checkbox" name="selection[]" value="5"></td><td>Master of Computer Application</td><td>MCA151</td><td>MCA</td><td><span class="label label-success"> Active </span></td></tr>
                                            </tbody></table></div><script src="/assets/88e81c72/jquery.min.js"></script>
                                    <script src="/assets/31e127ba/yii.js"></script>
                                    <script src="/assets/31e127ba/yii.gridView.js"></script>
                                    <script type="text/javascript">jQuery('#tbl-course-list').yiiGridView({"filterUrl":"/dependent/get-course-list","filterSelector":"#tbl-course-list-filters input, #tbl-course-list-filters select"});
                                        jQuery('#tbl-course-list').yiiGridView('setSelectionColumn', {"name":"selection[]","multiple":true,"checkAll":"selection_all"});
                                        $("#tbl-course-list tr").click(function(event) {
                                            if (event.target.type !== "checkbox") {
                                                $(":checkbox", this).trigger("click");
                                            }
                                        });</script></div>
                            </div>
                        </div><!--./box-body-->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-create">Create</button>					<button type="reset" class="btn btn-default btn-create">Reset</button>			</div><!--./box-footer-->

                    </form>
                </div>
			</div>
			<!----CREATION FORM ENDS-->
		</div>
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