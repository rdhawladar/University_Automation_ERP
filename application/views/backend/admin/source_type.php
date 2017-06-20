<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs bordered">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('view_enquiry_source_types');?>
				</a></li>
			<li>
				<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('create_enquiry_source_type');?>
				</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active" id="list">

				<table class="table table-bordered datatable" id="table_export">
					<thead>
					<tr><th>#</th><th><a href="/admission/leads/enquiry-source-type/index?admission%2Fleads%2Fenquiry-source-type%2Findex=&amp;sort=est_name" data-sort="est_name">Source Name</a></th><th>&nbsp;</th></tr><tr id="w1-filters" class="filters"><td>&nbsp;</td><td><input type="text" class="form-control" name="EnquirySourceTypeSearch[est_name]"></td><td>&nbsp;</td></tr>
					</thead>
					<tbody>
					<tr data-key="3"><td>1</td><td>Online</td><td><a href="/admission/leads/enquiry-source-type/update?id=3" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/admission/leads/enquiry-source-type/delete?id=3" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					<tr data-key="4"><td>2</td><td>Walking</td><td><a href="/admission/leads/enquiry-source-type/update?id=4" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/admission/leads/enquiry-source-type/delete?id=4" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					</tbody>
				</table>
			</div>
			<!----TABLE LISTING ENDS--->


			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add">
				<form id="EnquirySourceType" action="/admission/leads/enquiry-source-type/create" method="post">
					<input type="hidden" name="_csrf" value="MUdqSjZmb2hjEDIrTwopBwciHgRaJwZaZGo1LnIeChJXKDsPWAgEMg=="><div class="box-body">
						<div class="form-group field-enquirysourcetype-est_name required">
							<label class="control-label" for="enquirysourcetype-est_name">Source Name</label>
							<input type="text" id="enquirysourcetype-est_name" class="form-control" name="EnquirySourceType[est_name]" maxlength="50">

							<div class="help-block"></div>
						</div>
					</div> <!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary btn-create">Create</button>        	<button type="reset" class="btn btn-default btn-create">Reset</button>    </div> <!-- /.box-footer -->
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
