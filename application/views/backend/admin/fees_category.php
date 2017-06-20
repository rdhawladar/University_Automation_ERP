<div class="row">
	<div class="col-md-12">
     	<ul class="nav nav-tabs bordered">
      <li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('view_fees_collection_category_list');?>
                    	</a></li>
        	<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('create_fees_category');?>
                    	</a></li>
		</ul>
		<div class="tab-content">
            <div class="tab-pane box active" id="list">

                <table class="table table-bordered datatable" id="table_export">
					<thead>
					<tr><th>#</th><th>Name</th><th>Description</th><th>Batch</th><th>Start Date</th><th>End Date</th><th>Due Date</th><th>Status</th><th>Add Fees Head</th><th>Assign Fees</th><th>&nbsp;</th></tr><tr id="w0-filters" class="filters"><td>&nbsp;</td><td><input type="text" class="form-control" name="FeesCollectCategorySearch[fees_collect_name]"></td><td><input type="text" class="form-control" name="FeesCollectCategorySearch[fees_collect_details]"></td><td><select class="form-control" name="FeesCollectCategorySearch[fees_collect_batch_id]">
								<option value=""></option>
								<optgroup label="Master of Computer Application">
									<option value="5">MCA-Batch-01</option>
									<option value="10">MCA-Batch-02</option>
								</optgroup>
								<optgroup label="Bachelor of Science(Information Technology)">
									<option value="7">B.Sc(IT)-Batch-01</option>
									<option value="11">B.Sc-2016-17</option>
								</optgroup>
								<optgroup label="Master of Business Application">
									<option value="12">MBA Summer</option>
								</optgroup>
							</select></td><td><input type="text" id="feescollectcategorysearch-fees_collect_start_date" class="form-control hasDatepicker" name="FeesCollectCategorySearch[fees_collect_start_date]">
						</td><td><input type="text" id="feescollectcategorysearch-fees_collect_end_date" class="form-control hasDatepicker" name="FeesCollectCategorySearch[fees_collect_end_date]">
						</td><td><input type="text" id="feescollectcategorysearch-fees_collect_due_date" class="form-control hasDatepicker" name="FeesCollectCategorySearch[fees_collect_due_date]">
						</td><td><select class="form-control" name="FeesCollectCategorySearch[is_status]">
								<option value=""></option>
								<option value="0">Active</option>
								<option value="1">Inactive</option>
							</select></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
					</thead>
					<tbody>
					<tr data-key="2"><td>1</td><td>2015-16 MCA Batch 1</td><td></td><td>MCA-Batch-01</td><td>15-03-2016</td><td>19-03-2016</td><td>21-03-2016</td><td class="text-center"><a class="toggle-column" href="/fees/fees-collect-category/toggle?id=2" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td style="text-align:center"><a class="text-center addHeadLink" href="#" title="Create Fees Head" style="font-size:23px" data-link="/fees/fees-category-details/create?fcc_id=2"><i class="fa fa-plus-circle"></i></a></td><td style="text-align:center"><a href="/fees/fees-collect-category/assign-fees?StuMasterSearch%5Bstu_master_batch_id%5D=5&amp;fs=2" title="Assign Fees" target="_blank" style="font-size:23px"><i class="fa fa-exchange"></i></a></td><td><a href="/fees/fees-collect-category/view?id=2" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/fees/fees-collect-category/update?id=2" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/fees/fees-collect-category/delete?id=2" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					<tr data-key="3"><td>2</td><td>2015-16 MCA Batch 1</td><td></td><td>MCA-Batch-02</td><td>16-03-2016</td><td>17-03-2016</td><td>18-03-2016</td><td class="text-center"><a class="toggle-column" href="/fees/fees-collect-category/toggle?id=3" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td style="text-align:center"><a class="text-center addHeadLink" href="#" title="Create Fees Head" style="font-size:23px" data-link="/fees/fees-category-details/create?fcc_id=3"><i class="fa fa-plus-circle"></i></a></td><td style="text-align:center"><a href="/fees/fees-collect-category/assign-fees?StuMasterSearch%5Bstu_master_batch_id%5D=10&amp;fs=3" title="Assign Fees" target="_blank" style="font-size:23px"><i class="fa fa-exchange"></i></a></td><td><a href="/fees/fees-collect-category/view?id=3" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/fees/fees-collect-category/update?id=3" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/fees/fees-collect-category/delete?id=3" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					<tr data-key="4"><td>3</td><td>2015-16 MCA Batch 1</td><td></td><td>B.Sc(IT)-Batch-01</td><td>16-03-2016</td><td>17-03-2016</td><td>18-03-2016</td><td class="text-center"><a class="toggle-column" href="/fees/fees-collect-category/toggle?id=4" title="Inactive" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ok-circle fa-lg"></span></a></td><td style="text-align:center"><a class="text-center addHeadLink" href="#" title="Create Fees Head" style="font-size:23px" data-link="/fees/fees-category-details/create?fcc_id=4"><i class="fa fa-plus-circle"></i></a></td><td style="text-align:center"><a href="/fees/fees-collect-category/assign-fees?StuMasterSearch%5Bstu_master_batch_id%5D=7&amp;fs=4" title="Assign Fees" target="_blank" style="font-size:23px"><i class="fa fa-exchange"></i></a></td><td><a href="/fees/fees-collect-category/view?id=4" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/fees/fees-collect-category/update?id=4" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/fees/fees-collect-category/delete?id=4" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					</tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
          
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add">
				<div class="box-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group field-feescollectcategory-fees_collect_name required">
								<label class="control-label" for="feescollectcategory-fees_collect_name">Name</label>
								<input type="text" id="feescollectcategory-fees_collect_name" class="form-control" name="FeesCollectCategory[fees_collect_name]" maxlength="70" placeholder="Name">

								<div class="help-block"></div>
							</div>		</div>
						<div class="col-sm-6">
							<div class="form-group field-feescollectcategory-fees_collect_details">
								<label class="control-label" for="feescollectcategory-fees_collect_details">Description</label>
								<textarea id="feescollectcategory-fees_collect_details" class="form-control" name="FeesCollectCategory[fees_collect_details]" maxlength="255" placeholder="Description"></textarea>

								<div class="help-block"></div>
							</div>		</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group field-feescollectcategory-fcc_academic_year">
								<label class="control-label" for="feescollectcategory-fcc_academic_year">Academic Year</label>
								<select id="feescollectcategory-fcc_academic_year" class="form-control" name="FeesCollectCategory[fcc_academic_year]" onchange="this.form.submit()">
									<option value="">---Select Academic Year---</option>
									<option value="4">2016 Summer Intake</option>
									<option value="3">2017-18</option>
									<option value="2">2016-17</option>
									<option value="1">2015-16</option>
								</select>

								<div class="help-block"></div>
							</div>		</div>
						<div class="col-sm-6">
							<div class="form-group field-feescollectcategory-fees_collect_start_date required">
								<label class="control-label" for="feescollectcategory-fees_collect_start_date">Start Date</label>
								<input type="text" id="feescollectcategory-fees_collect_start_date" class="form-control hasDatepicker" name="FeesCollectCategory[fees_collect_start_date]" placeholder="Start Date" size="10">


								<div class="help-block"></div>
							</div>		</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group field-feescollectcategory-fees_collect_end_date required">
								<label class="control-label" for="feescollectcategory-fees_collect_end_date">End Date</label>
								<input type="text" id="feescollectcategory-fees_collect_end_date" class="form-control hasDatepicker" name="FeesCollectCategory[fees_collect_end_date]" placeholder="End Date" size="10">


								<div class="help-block"></div>
							</div>		</div>
						<div class="col-sm-6">
							<div class="form-group field-feescollectcategory-fees_collect_due_date required">
								<label class="control-label" for="feescollectcategory-fees_collect_due_date">Due Date</label>
								<input type="text" id="feescollectcategory-fees_collect_due_date" class="form-control hasDatepicker" name="FeesCollectCategory[fees_collect_due_date]" placeholder="Due Date" size="10">


								<div class="help-block"></div>
							</div>		</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group field-feescollectcategory-fees_collect_batch_id required">
								<label class="control-label" for="feescollectcategory-fees_collect_batch_id">Batch</label>
								<input type="hidden" name="FeesCollectCategory[fees_collect_batch_id]" value=""><select id="feescollectcategory-fees_collect_batch_id" class="form-control" name="FeesCollectCategory[fees_collect_batch_id][]" multiple="multiple" size="4" placeholder="Batch" style="display: none;">

								</select><div><button type="button" class="multiselect dropdown-toggle form-control btn btn-default" data-toggle="dropdown" title="None Selected"><span class="multiselect-selected-text">Select Batch(es)</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"></ul></div>

								<div class="help-block"></div>
							</div>		</div>
					</div>
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
		

		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			"oTableTools": {
				"aButtons": [
					
					{
						"sExtends": "xls",
						"mColumns": [1,2]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1,2]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(3, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(0, true);
									  datatable.fnSetColumnVis(3, true);
								  }
							});
						},
						
					},
				]
			},
			
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
	
	
	 $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><select name='examtype"+i+"' class='form-control'><option value=''>select</option><option value='SSC-GENERAL'>SSC(General)</option><option value='SSC-VOCATIONAL'>SSC(Vocational)</option><option value='TRADE'>Trade(Two-Years)</option><option value='DAKHIL'>Dakhil(Vocational)</option></select></td><td><input  name='group"+i+"' type='text' placeholder='Group'  class='form-control input-md'></td><td><input  name='board"+i+"' type='text' placeholder='Board'  class='form-control input-md'></td><td><input  name='passing_yr"+i+"' type='text' placeholder='Passing Year'  class='form-control input-md'></td><td><input  name='special_mark"+i+"' type='text' placeholder='special mark'  class='form-control input-md'></td><td><input  name='ttl_mark"+i+"' type='text' placeholder='Total Marks'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
	  $("#ttldtl").val(i);
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		  $("#ttldtl").val(i);
		 }
	 });
 $("#ttldtl").val(i);
});
		
</script>
