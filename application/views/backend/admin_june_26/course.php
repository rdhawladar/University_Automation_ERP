<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('view_courses_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('manage_course_list');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr><th>#</th><th><a href="/course/courses/index?course%2Fcourses%2Findex=&amp;sort=course_name" data-sort="course_name">Course Name</a></th><th><a href="/course/courses/index?course%2Fcourses%2Findex=&amp;sort=course_code" data-sort="course_code">Course Code</a></th><th><a href="/course/courses/index?course%2Fcourses%2Findex=&amp;sort=course_alias" data-sort="course_alias">Course Alias</a></th><th><a href="/course/courses/index?course%2Fcourses%2Findex=&amp;sort=is_status" data-sort="is_status">Active Status</a></th><th>&nbsp;</th></tr><tr id="course-index-filters" class="filters"><td>&nbsp;</td><td><input type="text" class="form-control" name="CoursesSearch[course_name]"></td><td><input type="text" class="form-control" name="CoursesSearch[course_code]"></td><td><input type="text" class="form-control" name="CoursesSearch[course_alias]"></td><td><select class="form-control" name="CoursesSearch[is_status]">
                                <option value=""></option>
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select></td><td>&nbsp;</td></tr>
                    </thead>
                    <tbody>
                    <tr data-key="6"><td>1</td><td>Master of Business Application</td><td>MBA001</td><td>MBA</td><td class="text-center"><a class="toggle-column" href="/course/courses/toggle?id=6" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td><a href="/course/courses/view?id=6" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/courses/update?id=6" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/courses/delete?id=6" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="5"><td>2</td><td>Master of Computer Application</td><td>MCA151</td><td>MCA</td><td class="text-center"><a class="toggle-column" href="/course/courses/toggle?id=5" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td><a href="/course/courses/view?id=5" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/courses/update?id=5" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/courses/delete?id=5" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="3"><td>3</td><td>Bachelor of Science(Information Technology)</td><td>BSC001</td><td>B.Sc(IT)</td><td class="text-center"><a class="toggle-column" href="/course/courses/toggle?id=3" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td><a href="/course/courses/view?id=3" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/courses/update?id=3" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/courses/delete?id=3" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus-square"></i> Manage Courses List</h3>
                    </div>

                    <form id="course-form" action="/course/courses/create" method="post">
                        <input type="hidden" name="_csrf" value="MndxQlBOc0V1PEQtISQ9BF4GBCMDDxcpcwA0cRMmGCllBEcUAAU0PQ==">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group field-courses-course_name required">
                                        <label class="control-label" for="courses-course_name">Course Name</label>
                                        <input type="text" id="courses-course_name" class="form-control" name="Courses[course_name]" maxlength="100" placeholder="Enter Course Name">

                                        <div class="help-block"></div>
                                    </div>		</div>
                                <div class="col-sm-4">
                                    <div class="form-group field-courses-course_code required">
                                        <label class="control-label" for="courses-course_code">Course Code</label>
                                        <input type="text" id="courses-course_code" class="form-control" name="Courses[course_code]" maxlength="50" placeholder="Enter Course Code">

                                        <div class="help-block"></div>
                                    </div>		</div>
                                <div class="col-sm-4">
                                    <div class="form-group field-courses-course_alias required">
                                        <label class="control-label" for="courses-course_alias">Course Alias</label>
                                        <input type="text" id="courses-course_alias" class="form-control" name="Courses[course_alias]" maxlength="35" placeholder="Enter Course Alias">

                                        <div class="help-block"></div>
                                    </div>		</div>
                            </div>



                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-create">Create</button>        	<button type="reset" class="btn btn-default btn-create">Reset</button>    </div><!-- /.box-footer-->

                    </form></div>
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