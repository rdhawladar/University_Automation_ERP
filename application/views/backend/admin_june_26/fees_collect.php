<div class="row">
	<div class="col-md-12">
		<div class="box-body">
			<form id="fees-collect-form" action="/fees/fees-payment-transaction/collect" method="GET">		<div class="row">

					<div class="col-sm-4">
						<div class="form-group field-feespaymenttransaction-acm_year">
							<label class="control-label" for="feespaymenttransaction-acm_year">Academic Year</label>
							<select id="feespaymenttransaction-acm_year" class="form-control" name="FeesPaymentTransaction[acm_year]" onchange="$.get( &quot;/dependent/get-academic-batches&quot;, { yid : $(this).val() })
						.done(function(data) {
							$( &quot;#feescollectcategory-fees_collect_batch_id&quot;).html(data);
					});">
								<option value="">---Select Academic Year---</option>
								<option value="4" selected="">2016 Summer Intake</option>
								<option value="3">2017-18</option>
								<option value="2">2016-17</option>
								<option value="1">2015-16</option>
							</select>

							<div class="help-block"></div>
						</div>			</div>
					<div class="col-md-4">
						<div class="form-group field-feescollectcategory-fees_collect_batch_id required has-success">
							<label class="control-label" for="feescollectcategory-fees_collect_batch_id">Batch</label>
							<select id="feescollectcategory-fees_collect_batch_id" class="form-control" name="FeesCollectCategory[fees_collect_batch_id]" onchange="
					$.get(&quot;/fees/dependent/get-fees-category&quot;, { id: $(this).val() } )
					.done(function( data ) {
							$( &quot;#feescollectcategory-fees_collect_category_id&quot; ).html( data );
					} );"><option value="">---Select Batch---</option><optgroup label="Master of Business Application"><option value="12">MBA Summer</option></optgroup></select>

							<div class="help-block"></div>
						</div>				</div>
					<div class="col-sm-4">
						<div class="form-group field-feescollectcategory-fees_collect_category_id">
							<label class="control-label" for="feescollectcategory-fees_collect_category_id">Fees Collect Category</label>
							<select id="feescollectcategory-fees_collect_category_id" class="form-control" name="FeesCollectCategory[fees_collect_category_id]" onchange="this.form.submit()"><option value="">---Select Fees Collect Category---</option></select>

							<div class="help-block"></div>
						</div>			</div>
				</div><!-- /row-->
			</form>    </div>
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
