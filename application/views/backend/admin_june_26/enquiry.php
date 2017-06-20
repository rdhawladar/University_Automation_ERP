<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs bordered">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('view_enquiry');?>
				</a></li>
			<li>
				<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('create_enquiry');?>
				</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active" id="list">

				<table class="table table-bordered datatable" id="table_export">
					<thead>
					<tr><th>#</th><th><a href="/admission/leads/enquiry/index?admission%2Fleads%2Fenquiry%2Findex=&amp;sort=created_at" data-sort="created_at">Enquiry Date</a></th><th><a href="/admission/leads/enquiry/index?admission%2Fleads%2Fenquiry%2Findex=&amp;sort=enq_academic_year" data-sort="enq_academic_year">Academic Year</a></th><th><a href="/admission/leads/enquiry/index?admission%2Fleads%2Fenquiry%2Findex=&amp;sort=enq_course" data-sort="enq_course">Course</a></th><th><a href="/admission/leads/enquiry/index?admission%2Fleads%2Fenquiry%2Findex=&amp;sort=enq_batch" data-sort="enq_batch">Batch</a></th><th><a href="/admission/leads/enquiry/index?admission%2Fleads%2Fenquiry%2Findex=&amp;sort=stuName" data-sort="stuName">Student Name</a></th><th><a href="/admission/leads/enquiry/index?admission%2Fleads%2Fenquiry%2Findex=&amp;sort=enq_approve_status" data-sort="enq_approve_status">Status</a></th><th>&nbsp;</th></tr><tr id="w1-filters" class="filters"><td>&nbsp;</td><td><input type="text" id="created-date" class="form-control hasDatepicker" name="EnquirySearch[created_at]">
						</td><td><select class="form-control" name="EnquirySearch[enq_academic_year]">
								<option value=""></option>
								<option value="4">2016 Summer Intake</option>
								<option value="3">2017-18</option>
								<option value="2">2016-17</option>
								<option value="1">2015-16</option>
							</select></td><td><select class="form-control" name="EnquirySearch[enq_course]">
								<option value=""></option>
								<option value="3">Bachelor of Science(Information Technology)</option>
								<option value="5">Master of Computer Application</option>
								<option value="6">Master of Business Application</option>
							</select></td><td><select class="form-control" name="EnquirySearch[enq_batch]">
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
							</select></td><td><input type="text" class="form-control" name="EnquirySearch[stuName]"></td><td>&nbsp;</td><td>&nbsp;</td></tr>
					</thead>
					<tbody>
					<tr data-key="2"><td>1</td><td>14-03-2016</td><td>2015-16</td><td>Bachelor of Science(Information Technology)</td><td>B.Sc(IT)-Batch-01</td><td>Arin Scotch</td><td><span class="label label-success">REGISTER</span></td><td><a href="/admission/leads/enquiry/view?id=2" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a></td></tr>
					<tr data-key="1"><td>2</td><td>14-03-2016</td><td>2016-17</td><td>Bachelor of Science(Information Technology)</td><td>B.Sc-2016-17</td><td>Anmol Sharma</td><td><span class="label label-warning">PRECONFIRM</span></td><td><a href="/admission/leads/enquiry/view?id=1" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a></td></tr>
					</tbody>
				</table>
			</div>
			<!----TABLE LISTING ENDS--->


			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add">
				<form id="w0" action="/admission/leads/enquiry/create" method="post">
					<input type="hidden" name="_csrf" value="QXluOUpvZ1ETLjZYMwMhPnccGncmLg5jFFQxXQ4XAisnFj98JAEMCw==">
					<div class="box-body">
						<!-- Personal Information -->
						<h2 class="page-header edusec-page-header-2 text-green edusec-border-bottom-warning">
							<i class="fa fa-user"></i><i class="fa fa-info"></i> Personal Information    </h2>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_unique_id required">
									<label class="control-label" for="enquiry-enq_unique_id">Unique ID</label>
									<input type="text" id="enquiry-enq_unique_id" class="form-control" name="Enquiry[enq_unique_id]" value="3" readonly="">

									<div class="help-block"></div>
								</div>		</div>
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_fname required">
									<label class="control-label" for="enquiry-enq_stu_fname">First Name</label>
									<input type="text" id="enquiry-enq_stu_fname" class="form-control" name="Enquiry[enq_stu_fname]" maxlength="255">

									<div class="help-block"></div>
								</div>		</div>
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_mname">
									<label class="control-label" for="enquiry-enq_stu_mname">Middle Name</label>
									<input type="text" id="enquiry-enq_stu_mname" class="form-control" name="Enquiry[enq_stu_mname]" maxlength="255">

									<div class="help-block"></div>
								</div>		</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_lname required">
									<label class="control-label" for="enquiry-enq_stu_lname">Last Name</label>
									<input type="text" id="enquiry-enq_stu_lname" class="form-control" name="Enquiry[enq_stu_lname]" maxlength="255">

									<div class="help-block"></div>
								</div>		</div>
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_dob required">
									<label class="control-label" for="enquiry-enq_stu_dob">Date of Birth</label>
									<input type="text" id="enquiry-enq_stu_dob" class="form-control hasDatepicker" name="Enquiry[enq_stu_dob]" placeholder="Select Date of Birth" size="10">


									<div class="help-block"></div>
								</div>		</div>
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_nationality">
									<label class="control-label" for="enquiry-enq_stu_nationality">Nationality</label>
									<select id="enquiry-enq_stu_nationality" class="form-control" name="Enquiry[enq_stu_nationality]">
										<option value="">---- Select Nationality ----</option>
										<option value="2">American</option>
										<option value="3">Australian</option>
										<option value="1">Indian</option>
										<option value="4">Other</option>
									</select>

									<div class="help-block"></div>
								</div>		</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_gender required">
									<label class="control-label" for="enquiry-enq_stu_gender">Gender</label>
									<select id="enquiry-enq_stu_gender" class="form-control" name="Enquiry[enq_stu_gender]">
										<option value="">---Select Gender---</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>

									<div class="help-block"></div>
								</div>		</div>
						</div>

						<!-- Enquiry Information -->
						<h2 class="page-header edusec-page-header-2 text-green edusec-border-bottom-warning">
							<i class="fa fa-info-circle"></i><i class="fa fa-info"></i> Enquiry Information    </h2>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_academic_year required">
									<label class="control-label" for="enquiry-enq_academic_year">Academic Year</label>
									<select id="enquiry-enq_academic_year" class="form-control" name="Enquiry[enq_academic_year]" onchange="$.get( &quot;/admission/dependent/get-academic-courses&quot;, { yid : $(this).val() })
					.done(function(data) {
						$( &quot;#enquiry-enq_course&quot;).html(data);
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
								<div class="form-group field-enquiry-enq_course required">
									<label class="control-label" for="enquiry-enq_course">Course</label>
									<select id="enquiry-enq_course" class="form-control" name="Enquiry[enq_course]" onchange="$.get( &quot;/admission/dependent/get-academic-course-batches&quot;, { cid : $(this).val(), yid : $( &quot;#enquiry-enq_academic_year&quot;).val() })
					.done(function(data) {
						$( &quot;#enquiry-enq_batch&quot;).html(data);
				});">
										<option value="">--Select Course--</option>
										<option value="6">Master of Business Application</option>
									</select>

									<div class="help-block"></div>
								</div>		</div>
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_batch required">
									<label class="control-label" for="enquiry-enq_batch">Batch</label>
									<select id="enquiry-enq_batch" class="form-control" name="Enquiry[enq_batch]">
										<option value="">---Select Batch---</option>
									</select>

									<div class="help-block"></div>
								</div>		</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_source_type required">
									<label class="control-label" for="enquiry-enq_source_type">Source Type</label>
									<select id="enquiry-enq_source_type" class="form-control" name="Enquiry[enq_source_type]">
										<option value="">--- Select Source Type ---</option>
										<option value="3">Online</option>
										<option value="4">Walking</option>
									</select>

									<div class="help-block"></div>
								</div>		</div>
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_pref_date">
									<label class="control-label" for="enquiry-enq_stu_pref_date">Preferred Start Date</label>
									<input type="text" id="enquiry-enq_stu_pref_date" class="form-control hasDatepicker" name="Enquiry[enq_stu_pref_date]" placeholder="Prefer Date" readonly="">


									<div class="help-block"></div>
								</div>		</div>

							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_pref_time">
									<label class="control-label" for="enquiry-enq_stu_pref_time">Preferred Start Time</label>
									<input type="text" id="enquiry-enq_stu_pref_time" class="form-control hasTimepicker" name="Enquiry[enq_stu_pref_time]" placeholder="Prefer Start Time" readonly="">

									<div class="help-block"></div>
								</div>		</div>
						</div>

						<!-- Contact Information -->
						<h2 class="page-header edusec-page-header-2 text-green edusec-border-bottom-warning">
							<i class="fa fa-home"></i><i class="fa fa-info"></i> Contact Information    </h2>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_email required">
									<label class="control-label" for="enquiry-enq_stu_email">Email</label>
									<input type="text" id="enquiry-enq_stu_email" class="form-control" name="Enquiry[enq_stu_email]" maxlength="70">

									<div class="help-block"></div>
								</div>		</div>
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_mob_no required">
									<label class="control-label" for="enquiry-enq_stu_mob_no">Mobile No.</label>
									<input type="text" id="enquiry-enq_stu_mob_no" class="form-control" name="Enquiry[enq_stu_mob_no]" maxlength="15">

									<div class="help-block"></div>
								</div>		</div>
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_house_no">
									<label class="control-label" for="enquiry-enq_stu_house_no">House No</label>
									<input type="text" id="enquiry-enq_stu_house_no" class="form-control" name="Enquiry[enq_stu_house_no]" maxlength="10">

									<div class="help-block"></div>
								</div>		</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group field-enquiry-enq_stu_address">
									<label class="control-label" for="enquiry-enq_stu_address">Address</label>
									<textarea id="enquiry-enq_stu_address" class="form-control" name="Enquiry[enq_stu_address]" maxlength="255"></textarea>

									<div class="help-block"></div>
								</div>		</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_country">
									<label class="control-label" for="enquiry-enq_country">Country</label>
									<select id="enquiry-enq_country" class="form-control" name="Enquiry[enq_country]" onchange="
                        $.get( &quot;/admission/dependent/astud_p_state&quot;, { id: $(this).val() } )
                            .done(function( data ) {
                                $( &quot;#enquiry-enq_state&quot; ).html( data );
                            }
                        );">
										<option value="">---Select Country---</option>
										<option value="2">England</option>
										<option value="8">France</option>
										<option value="1">India</option>
										<option value="5">Malasiya Malasiya Malasiya Malasiya</option>
										<option value="3">South Africa</option>
										<option value="6">test</option>
										<option value="7">test2</option>
										<option value="4">United States</option>
									</select>

									<div class="help-block"></div>
								</div>		</div>
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_state">
									<label class="control-label" for="enquiry-enq_state">State</label>
									<select id="enquiry-enq_state" class="form-control" name="Enquiry[enq_state]" onchange="
						$.get( &quot;/admission/dependent/astud_p_city&quot;, { id: $(this).val() } )
						    .done(function( data ) {
						        $( &quot;#enquiry-enq_city&quot; ).html( data );
						    }
						);">
										<option value="">---Select State---</option>
									</select>

									<div class="help-block"></div>
								</div>		</div>
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_city">
									<label class="control-label" for="enquiry-enq_city">City/Town</label>
									<select id="enquiry-enq_city" class="form-control" name="Enquiry[enq_city]">
										<option value="">---Select City---</option>
									</select>

									<div class="help-block"></div>
								</div>		</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group field-enquiry-enq_stu_postcode">
									<label class="control-label" for="enquiry-enq_stu_postcode">Postcode</label>
									<input type="text" id="enquiry-enq_stu_postcode" class="form-control" name="Enquiry[enq_stu_postcode]">

									<div class="help-block"></div>
								</div>		</div>
						</div>
					</div><!-- /.box-body-->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary btn-create">Create</button>	<a class="btn btn-default btn-create" href="/admission/leads/enquiry/index">Cancel</a></div><!-- /.box-footer-->
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
