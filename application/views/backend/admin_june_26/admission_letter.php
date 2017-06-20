<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs bordered">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('view_admissions_letters_list');?>
				</a></li>
			<li>
				<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('create_admission_letter');?>
				</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active" id="list">

				<table class="table table-bordered datatable" id="table_export">
					<thead>
					<tr><th>#</th><th><a href="/admission/admission-letter/index?admission%2Fadmission-letter%2Findex=&amp;sort=admission_letter_title" data-sort="admission_letter_title">Letter Title</a></th><th>&nbsp;</th></tr><tr id="w1-filters" class="filters"><td>&nbsp;</td><td><input type="text" class="form-control" name="AdmissionLetterSearch[admission_letter_title]"></td><td>&nbsp;</td></tr>
					</thead>
					<tbody>
					<tr data-key="1"><td>1</td><td>Admission Confirmation Letter</td><td><a href="/admission/admission-letter/view?id=1" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/admission/admission-letter/update?id=1" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/admission/admission-letter/delete?id=1" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					</tbody>
				</table>
			</div>
			<!----TABLE LISTING ENDS--->


			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add">
				<div class="col-sm-12">
					<div class="form-group field-admissionletter-admission_letter_title required">
						<label class="control-label" for="admissionletter-admission_letter_title">Letter Title</label>
						<input type="text" id="admissionletter-admission_letter_title" class="form-control" name="AdmissionLetter[admission_letter_title]" maxlength="60">

						<p class="help-block help-block-error"></p>
					</div>		</div>
				<div class="col-sm-12">
					<textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
				</div>
				<div class="col-sm-12">
					<p>&nbsp;</p>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary btn-create">Create</button>	<a class="btn btn-default btn-create" href="/admission/admission-letter/index">Cancel</a></div>
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
