<div class="row">
	<div class="col-md-12">
     	<ul class="nav nav-tabs bordered">
      <li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('view_banks_list');?>
                    	</a></li>
        	<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('create_bank_details');?>
                    	</a></li>
		</ul>
		<div class="tab-content">
            <div class="tab-pane box active" id="list">

                <table class="table table-bordered datatable" id="table_export">
					<thead>
					<tr><th>#</th><th><a href="/fees/bank-master/index?fees%2Fbank-master%2Findex=&amp;sort=bank_master_name" data-sort="bank_master_name">Bank Name</a></th><th><a href="/fees/bank-master/index?fees%2Fbank-master%2Findex=&amp;sort=bank_alias" data-sort="bank_alias">Bank Alias</a></th><th>&nbsp;</th></tr><tr id="w1-filters" class="filters"><td>&nbsp;</td><td><input type="text" class="form-control" name="BankMasterSearch[bank_master_name]"></td><td><input type="text" class="form-control" name="BankMasterSearch[bank_alias]"></td><td>&nbsp;</td></tr>
					</thead>
					<tbody>
					<tr data-key="6"><td>1</td><td>State Bank of India</td><td>SBI</td><td><a href="/fees/bank-master/view?id=6" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/fees/bank-master/update?id=6" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/fees/bank-master/delete?id=6" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					<tr data-key="5"><td>2</td><td>Bank of America</td><td>BOA</td><td><a href="/fees/bank-master/view?id=5" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/fees/bank-master/update?id=5" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/fees/bank-master/delete?id=5" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					<tr data-key="4"><td>3</td><td>Bank of India</td><td>BOI</td><td><a href="/fees/bank-master/view?id=4" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/fees/bank-master/update?id=4" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/fees/bank-master/delete?id=4" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					<tr data-key="3"><td>4</td><td>Bank of Chicago</td><td>BOC</td><td><a href="/fees/bank-master/view?id=3" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/fees/bank-master/update?id=3" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/fees/bank-master/delete?id=3" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					<tr data-key="2"><td>5</td><td>Bank of Baroda</td><td>BOB</td><td><a href="/fees/bank-master/view?id=2" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/fees/bank-master/update?id=2" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/fees/bank-master/delete?id=2" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					<tr data-key="1"><td>6</td><td>Vellay Bank	</td><td>VB</td><td><a href="/fees/bank-master/view?id=1" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/fees/bank-master/update?id=1" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/fees/bank-master/delete?id=1" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
					</tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
          
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add">


             <br />
				<div class="box-content">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-plus-square"></i> Create Bank Details</h3>
						</div>


						<form id="bank-master-form" action="/fees/bank-master/create" method="post">
							<input type="hidden" name="_csrf" value="LkJrWkxOR01pCV41PSQJDEIzHjsfDyMhbzUuaQ8mLCF5MV0MHAUANQ==">
							<div class="box-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group field-bankmaster-bank_master_name required">
											<label class="control-label" for="bankmaster-bank_master_name">Bank Name</label>
											<input type="text" id="bankmaster-bank_master_name" class="form-control" name="BankMaster[bank_master_name]" maxlength="50" placeholder="Enter Bank Name">

											<div class="help-block"></div>
										</div>		</div>
									<div class="col-sm-6">
										<div class="form-group field-bankmaster-bank_alias required">
											<label class="control-label" for="bankmaster-bank_alias">Bank Alias</label>
											<input type="text" id="bankmaster-bank_alias" class="form-control" name="BankMaster[bank_alias]" maxlength="10" placeholder="Enter Bank Alias">

											<div class="help-block"></div>
										</div>    	</div>
								</div>
							</div><!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" class="btn btn-primary btn-create">Create</button>        	<button type="reset" class="btn btn-default btn-create">Reset</button>    </div><!-- /.box-footer-->

						</form>
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
