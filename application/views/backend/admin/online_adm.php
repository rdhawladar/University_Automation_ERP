

<div class="row">
	<div class="col-md-12">
		<div class="box-content">
				<?php echo form_open(base_url() . 'index.php?admin/online_admission/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

				<input type="text" style="display:none" class="form-control" name="acd_session_id" value="<?php echo $data[0]['id'];?>" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">

				<div class="padded">

					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('name_bangla');?></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="name_bn" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('name_english');?></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="name_en" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('father_name');?></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="father_name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('mother_name');?></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="mother_name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
							</div>
						</div>
					</div>


					<div class="col-md-2">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"></label>
							<div class="col-sm-5">
								<?php echo get_phrase('FFS');?>
								<input type="checkbox" class="form-control" name="ff_son" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
							</div>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"></label>
							<div class="col-sm-6">
								<?php echo get_phrase('upojati');?>
								<input type="checkbox" class="form-control" name="upojati" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('gardian_name');?></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="gardian_name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
							</div>
						</div>
					</div>


					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('Nationality');?></label>

							<div class="col-sm-12">
								<input type="text" class="form-control" name="nationality" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
							</div>
						</div>
					</div>


					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('birthday');?></label>

							<div class="col-sm-12">
								<input type="text" class="form-control datepicker" name="birthday" value="" data-start-view="2">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('religion');?></label>
							<div class="col-sm-12">
								<select name="religion" class="form-control">
									<option value=""><?php echo get_phrase('select');?></option>
									<option value="Islam"><?php echo get_phrase('islam');?></option>
									<option value="Hindu"><?php echo get_phrase('hindu');?></option>
								</select>
							</div>
						</div>
					</div>


					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('gender');?></label>

							<div class="col-sm-12">
								<select name="sex" class="form-control">
									<option value=""><?php echo get_phrase('select');?></option>
									<option value="male"><?php echo get_phrase('male');?></option>
									<option value="female"><?php echo get_phrase('female');?></option>
								</select>
							</div>
						</div>
					</div>


					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('phone');?></label>

							<div class="col-sm-12">
								<input type="text" class="form-control" name="phone" value="" >
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('email');?></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="email" value="">
							</div>
						</div>
					</div>


					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('Parmanent_address');?></label>

							<div class="col-sm-12">

								<textarea type="text" class="form-control" name="pr_address" value="" ></textarea>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('Current_address');?></label>

							<div class="col-sm-12">

								<textarea type="text" class="form-control" name="cur_address" value="" ></textarea>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('technology');?></label>


							<select name="technology" class="form-control">
								<option value=""><?php echo get_phrase('select');?></option>
								<option value="textile"><?php echo get_phrase('textile');?></option>
								<option value="electrical"><?php echo get_phrase('electrical');?></option>
							</select>
						</div>
					</div>
				</div>
				<br />

				<div class="form-group">
					<label for="field-1" class="col-sm-5"><?php echo get_phrase('Academic_details');?></label>
					<div class="table-responsive">
						<input type="text" style="display:none" class="form-control" name="ttldtl" id="ttldtl">
						<table class="table table-bordered table-hover" id="tab_logic">
							<thead>
							<tr >
								<th class="text-center">
									#
								</th>
								<th class="text-center">
									Exam
								</th>
								<th class="text-center">
									Group/Trade
								</th>
								<th class="text-center">
									Board
								</th>
								<th class="text-center">
									Passing Year
								</th>
								</th>
								<th class="text-center">
									GM Marks
								</th>
								</th>
								<th class="text-center">
									Total Marks
								</th>
							</tr>
							</thead>
							<tbody>
							<tr id='addr0'>
								<td>
									1
								</td>
								<td>

									<select name="examtype0" class="form-control">
										<option value=""><?php echo get_phrase('select');?></option>
										<option value="SSC-GENERAL"><?php echo get_phrase('SSC(General)');?></option>
										<option value="SSC-VOCATIONAL"><?php echo get_phrase('SSC(Vocational)');?></option>
										<option value="TRADE"><?php echo get_phrase('Trade(Two-Years)');?></option>
										<option value="DAKHIL"><?php echo get_phrase('Dakhil(Vocational)');?></option>
									</select>

								</td>
								<td>
									<input type="text" name='group0' placeholder='Group/Trade' class="form-control"/>
								</td>
								<td>
									<input type="text" name='board0' placeholder='Board' class="form-control"/>
								</td>
								<td>
									<input type="text" name='passing_yr0' placeholder='Passing Year' class="form-control"/>
								</td>

								<td>
									<input type="text" name='special_mark0' placeholder='special mark' class="form-control"/>
								</td>
								<td>
									<input type="text" name='ttl_mark0' placeholder='Total Marks' class="form-control"/>
								</td>
							</tr>
							<tr id='addr1'></tr>
							</tbody>
						</table>

					</div>
					<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>

				</div>


				<!--			<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>

						<div class="col-sm-5">
							<input type="password" class="form-control" name="password" value="" >
						</div>
					</div>-->

				<div class="col-md-4">
					<div class="form-group">
						<!--<label for="field-1" class="col-sm-5"><?php echo get_phrase('photo');?></label>-->

						<div class="col-sm-12">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x200" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="userfile" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-5">
						<button type="submit" class="btn btn-info"><?php echo get_phrase('online_admission');?></button>
					</div>
				</div>
				</form>
		</div>
    	<!------CONTROL TABS END------>
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
