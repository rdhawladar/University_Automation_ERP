<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('view_employee_section_allotment_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('employee_section_allotment');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr><th>#</th><th><a href="/course/emp-section-allot/index?course%2Femp-section-allot%2Findex=&amp;sort=academic_year" data-sort="academic_year">Academic Year</a></th><th><a href="/course/emp-section-allot/index?course%2Femp-section-allot%2Findex=&amp;sort=section_id" data-sort="section_id">Section</a></th><th><a href="/course/emp-section-allot/index?course%2Femp-section-allot%2Findex=&amp;sort=emp_full_name" data-sort="emp_full_name">Employee Name</a></th><th><a href="/course/emp-section-allot/index?course%2Femp-section-allot%2Findex=&amp;sort=is_class_teacher" data-sort="is_class_teacher">Is Class Teacher</a></th><th>&nbsp;</th></tr><tr id="w1-filters" class="filters"><td>&nbsp;</td><td><select class="form-control" name="EmpSectionAllotSearch[academic_year]">
                                <option value=""></option>
                                <option value="4">2016 Summer Intake</option>
                                <option value="3">2017-18</option>
                                <option value="2">2016-17</option>
                                <option value="1">2015-16</option>
                            </select></td><td><select class="form-control" name="EmpSectionAllotSearch[section_id]">
                                <option value=""></option>
                                <optgroup label="MBA Summer">
                                    <option value="6">MBA Summer Sec1</option>
                                </optgroup>
                            </select></td><td><input type="text" class="form-control" name="EmpSectionAllotSearch[emp_full_name]"></td><td><select class="form-control" name="EmpSectionAllotSearch[is_class_teacher]">
                                <option value=""></option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select></td><td>&nbsp;</td></tr>
                    </thead>
                    <tbody>
                    <tr data-key="12"><td>1</td><td>2015-16</td><td>B.Sc(IT)-Section-01</td><td>Julian Carranza</td><td>No</td><td><a href="/course/emp-section-allot/view?id=12" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=12" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=12" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="11"><td>2</td><td>2015-16</td><td>B.Sc(IT)-Section-01</td><td>Paul Diesel</td><td>Yes</td><td><a href="/course/emp-section-allot/view?id=11" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=11" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=11" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="10"><td>3</td><td>2015-16</td><td>B.Sc(IT)-Section-01</td><td>Mansukh Mistri</td><td>No</td><td><a href="/course/emp-section-allot/view?id=10" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=10" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=10" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="9"><td>4</td><td>2015-16</td><td>MCA-Section-01</td><td>Howard Yoder</td><td>No</td><td><a href="/course/emp-section-allot/view?id=9" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=9" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=9" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="8"><td>5</td><td>2015-16</td><td>MCA-Section-01</td><td>Julian Carranza</td><td>Yes</td><td><a href="/course/emp-section-allot/view?id=8" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=8" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=8" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="7"><td>6</td><td>2015-16</td><td>MCA-Section-01</td><td>Vaishali  Chaudhary</td><td>No</td><td><a href="/course/emp-section-allot/view?id=7" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=7" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=7" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="6"><td>7</td><td>2015-16</td><td>MCA-Section-02</td><td>Paul Klimesh</td><td>No</td><td><a href="/course/emp-section-allot/view?id=6" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=6" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=6" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="5"><td>8</td><td>2015-16</td><td>MCA-Section-02</td><td>Radhika Korat</td><td>Yes</td><td><a href="/course/emp-section-allot/view?id=5" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=5" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=5" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="4"><td>9</td><td>2015-16</td><td>MCA-Section-02</td><td>Jay Ranoliya</td><td>No</td><td><a href="/course/emp-section-allot/view?id=4" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=4" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=4" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="3"><td>10</td><td>2015-16</td><td>MCA-Section-01</td><td>Paul Diesel</td><td>No</td><td><a href="/course/emp-section-allot/view?id=3" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=3" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=3" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="2"><td>11</td><td>2015-16</td><td>MCA-Section-01</td><td>Radhika Korat</td><td>No</td><td><a href="/course/emp-section-allot/view?id=2" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=2" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=2" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    <tr data-key="1"><td>12</td><td>2015-16</td><td>MCA-Section-01</td><td>Jay Ranoliya</td><td>Yes</td><td><a href="/course/emp-section-allot/view?id=1" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=1" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=1" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <form id="emp-section-allot-form" action="/course/emp-section-allot/create" method="GET">
                    <div class="box-body">


                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group field-empsectionallot-academic_year required">
                                    <label class="control-label" for="empsectionallot-academic_year">Academic Year</label>
                                    <select id="empsectionallot-academic_year" class="form-control" name="EmpSectionAllot[academic_year]" onchange="$.get( &quot;/dependent/get-academic-batches&quot;, { yid : $(this).val() })
					.done(function(data) {
						$( &quot;#empsectionallot-batch_id&quot;).html(data);
				});">
                                        <option value="">---Select Academic Year---</option>
                                        <option value="4" selected="">2016 Summer Intake</option>
                                        <option value="3">2017-18</option>
                                        <option value="2">2016-17</option>
                                        <option value="1">2015-16</option>
                                    </select>

                                    <div class="help-block"></div>
                                </div>		</div>
                            <div class="col-sm-4">
                                <div class="form-group field-empsectionallot-batch_id required">
                                    <label class="control-label" for="empsectionallot-batch_id">Batch</label>
                                    <select id="empsectionallot-batch_id" class="form-control" name="EmpSectionAllot[batch_id]" onchange="
					$.get( &quot;/course/dependent/studsection&quot;, { id: $(this).val() } )
						.done(function( data ) {
							$( &quot;#empsectionallot-section_id&quot; ).html( data );
						}
					);">
                                        <option value="">---Select Batch---</option>
                                        <optgroup label="Master of Business Application">
                                            <option value="12" selected="">MBA Summer</option>
                                        </optgroup>
                                    </select>

                                    <div class="help-block"></div>
                                </div>		</div>
                            <div class="col-sm-4">
                                <div class="form-group field-empsectionallot-section_id required">
                                    <label class="control-label" for="empsectionallot-section_id">Section</label>
                                    <select id="empsectionallot-section_id" class="form-control" name="EmpSectionAllot[section_id]" onchange="this.form.submit()">
                                        <option value="">---- Select Section ----</option>
                                        <optgroup label="MBA Summer">
                                            <option value="6" selected="">MBA Summer Sec1</option>
                                        </optgroup>
                                    </select>

                                    <div class="help-block"></div>
                                </div>		</div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12" id="disp-allot-name">

                                <div class="box box-solid box-info">
                                    <div class="box-header">
                                        <h3 class="box-title">Assigned Employee Name</h3>
                                    </div>
                                    <div class="box-body table-responsive no-padding">
                                        <div id="section-allot-empName-id">
                                            <div id="w0" class="grid-view"><table class="table table-striped table-bordered"><thead>
                                                    <tr><th>#</th><th>Section Name</th><th><a href="/course/emp-section-allot/create?course%2Femp-section-allot%2Fcreate=&amp;EmpSectionAllot%5Bacademic_year%5D=4&amp;EmpSectionAllot%5Bbatch_id%5D=12&amp;EmpSectionAllot%5Bsection_id%5D=6&amp;EmpSectionAllot%5Bemp_id%5D=1&amp;EmpSectionAllot%5Bis_class_teacher%5D=1&amp;sort=emp_id" data-sort="emp_id">Employee</a></th><th><a href="/course/emp-section-allot/create?course%2Femp-section-allot%2Fcreate=&amp;EmpSectionAllot%5Bacademic_year%5D=4&amp;EmpSectionAllot%5Bbatch_id%5D=12&amp;EmpSectionAllot%5Bsection_id%5D=6&amp;EmpSectionAllot%5Bemp_id%5D=1&amp;EmpSectionAllot%5Bis_class_teacher%5D=1&amp;sort=is_class_teacher" data-sort="is_class_teacher">Is Class Teacher</a></th></tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr><td colspan="4"><div class="empty">No results found.</div></td></tr>
                                                    </tbody></table></div>
                                        </div>	</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group field-empsectionallot-emp_id required has-error">
                                    <label class="control-label" for="empsectionallot-emp_id">Employee</label>
                                    <select id="empsectionallot-emp_id" class="form-control" name="EmpSectionAllot[emp_id]" style="display: none;">
                                        <option value="">---- Select Employee ----</option>
                                        <option value="1" selected="">Jay Ranoliya</option>
                                        <option value="2">Radhika Korat</option>
                                        <option value="3">ماريا كروز</option>
                                        <option value="4">Paul Diesel</option>
                                        <option value="5">William  Smith</option>
                                        <option value="6">Vaishali  Chaudhary</option>
                                        <option value="7">Paul Klimesh</option>
                                        <option value="8">Julian Carranza</option>
                                        <option value="9">Howard Yoder</option>
                                        <option value="10">Gabe Beliz</option>
                                        <option value="11">Dave Whipple</option>
                                        <option value="12">Mansukh Mistri</option>
                                        <option value="13">Paresh Patel</option>
                                        <option value="14">Prakash Chavda</option>
                                        <option value="15">Hiral Mehta</option>
                                        <option value="16">પ્રરાજ મહેતા</option>
                                        <option value="17">عنكيط ميهتا</option>
                                        <option value="18">fgfg fgfgf</option>
                                        <option value="19">Ayudh Bhattachrya</option>
                                        <option value="20">Shyam Mehta</option>
                                    </select><div class=""><button type="button" class="multiselect dropdown-toggle form-control" data-toggle="dropdown" title="---- Select Employee ----" aria-expanded="false"><span class="multiselect-selected-text">---- Select Employee ----</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu pull-right" style="max-height: 400px; overflow-y: auto; overflow-x: hidden;"><li class="multiselect-item filter" value="0"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text" placeholder="Search"><span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="glyphicon glyphicon-remove-circle"></i></button></span></div></li><li class="active"><a tabindex="0"><label class="radio"><input type="radio" value=""> ---- Select Employee ----</label></a></li><li class=""><a tabindex="0"><label class="radio"><input type="radio" value="1"> Jay Ranoliya</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="2"> Radhika Korat</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="3"> ماريا كروز</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="4"> Paul Diesel</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="5"> William  Smith</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="6"> Vaishali  Chaudhary</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="7"> Paul Klimesh</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="8"> Julian Carranza</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="9"> Howard Yoder</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="10"> Gabe Beliz</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="11"> Dave Whipple</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="12"> Mansukh Mistri</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="13"> Paresh Patel</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="14"> Prakash Chavda</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="15"> Hiral Mehta</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="16"> પ્રરાજ મહેતા</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="17"> عنكيط ميهتا</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="18"> fgfg fgfgf</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="19"> Ayudh Bhattachrya</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="20"> Shyam Mehta</label></a></li></ul></div>

                                    <div class="help-block"></div>
                                </div>    	</div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group field-empsectionallot-is_class_teacher">

                                    <input type="hidden" name="EmpSectionAllot[is_class_teacher]" value="0"><label><input type="checkbox" id="empsectionallot-is_class_teacher" class="is_class_teach" name="EmpSectionAllot[is_class_teacher]" value="1" checked=""> Is Class Teacher</label>

                                    <div class="help-block"></div>
                                </div>    	</div>
                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-create">Assigned</button>	<a class="btn btn-default btn-create" href="/course/emp-section-allot/index">Cancel</a></div><!-- /.box-footer-->


                </form>
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