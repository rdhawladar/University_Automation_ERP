<div class="row">
	<div class="col-md-12">
		<?php echo form_open(base_url() . 'index.php?admin/students_list_program_session_year' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
		<div class="padded">
			<input type="hidden" name="SemesterName" value="<?php echo $wee['SemesterName'];?>">
			<input type="hidden" name="Year" value="<?php echo $wee['Year'];?>">
			<div class="form-group">
				<div class="col-md-4">
					<label for="">Program Name</label>
					<select name="ProgramName" class="form-control" style="height:30px;">
						<option value="*"><?php echo get_phrase('select');?></option>
						<?php
						$xc = $this->db->get('course_program')->result_array();
						foreach($xc as $rowxc):
							?>
							<option value="<?php echo $rowxc['id'];?>">
								<?php echo $rowxc['course_name'];?>
							</option>
							<?php
						endforeach;
						?>
					</select>
				</div>
				<div class="col-md-4">
					<label for="">Session Name</label>
					<select name="SessionName" class="form-control" style="height:30px;">
						<option value="*"><?php echo get_phrase('select');?></option>
						<?php
						$xc12 = $this->db->get('session_pundro')->result_array();
						foreach($xc12 as $rowxc12):
							?>
							<option value="<?php echo $rowxc12['id'];?>">
								<?php echo $rowxc12['SessionName'];?>
							</option>
							<?php
						endforeach;
						?>
					</select>
				</div>
				<div class="col-md-2">
					<label for="">Year</label>
					<select name="Year" class="form-control" style="height:30px;">
						<option value="*"><?php echo get_phrase('select');?></option>
						<?php
						$this->db->order_by('id', DESC);
						$xc121 = $this->db->get('year_calendar')->result_array();
						foreach($xc121 as $rowxc121):
							?>
							<option value="<?php echo $rowxc121['id'];?>">
								<?php echo $rowxc121['Name'];?>
							</option>
							<?php
						endforeach;
						?>
					</select>
				</div>

				<div class="col-md-2">
					<p style="height: 14px;">&nbsp;</p>
					<button type="submit" class="btn btn-success"><?php echo get_phrase('filter');?></button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
	<!----CREATION FORM ENDS-->
<div class="row">
	<div class="col-md-12">
    <p>&nbsp;</p>
		<ul class="nav nav-tabs bordered">
            <li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('students_list');?>
                </a>
            </li>
            <li>
            	<a href="#trash" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('trash');?>
                </a>
            </li>
		</ul>
		<div class="tab-content">
            <div class="tab-pane box active onad" id="list">
				<table class="table table-bordered datatable" id="table_export">
					<thead>
					<tr>
						<th><div>#</div></th>
						<th><div><?php echo get_phrase('program');?></div></th>
						<th><div><?php echo get_phrase('session');?></div></th>
						<th><div><?php echo get_phrase('year');?></div></th>
						<th><div><?php echo get_phrase('ad._roll');?></div></th>
						<th><div><?php echo get_phrase('name');?></div></th>
						<th><div><?php echo get_phrase('Photo');?></div></th>
						<th><div><?php echo get_phrase('gender');?></div></th>
						<th>
							<table class="ttres table table-bordered datatable">
								<tr>
									<td colspan="5">
										<div><?php echo get_phrase('result');?></div>
									</td>
								</tr>
								<tr>
									<td><div><?php echo get_phrase('SSC/Equivalent');?></div></td>
									<td><div><?php echo get_phrase('HSC/Equivalent');?></div></td>
									<td><div><?php echo get_phrase('Honours/Equivalent');?></div></td>
									<td><div><?php echo get_phrase('MS/Equivalent');?></div></td>
									<td><div><?php echo get_phrase('total_GPA');?></div></td>
								</tr>
							</table>
						</th>
						<th><div><?php echo get_phrase('References');?></div></th>
						<th><div><?php echo get_phrase('application_date');?></div></th>
						<th><div><?php echo get_phrase('decision');?></div></th>
						<th><div><?php echo get_phrase('Actions');?></div></th>
					</tr>
					</thead>
					<tbody>
					<?php

					?>
					<?php $count = 1;foreach($osadStudent as $row):?>
						<tr>
							<td><?php echo $count++;?></td>
							<td class="program_name12">
								<div>
									<?php
									$this->db->where('id', $row['NameofProgram']);
									$course_program = $this->db->get('course_program')->result_array();
									foreach($course_program as $ee):
										echo $ee['course_name'];
									endforeach;
									?>
								</div>
							</td>
							<td><?php 
								//echo $row['Session'];
								$this->db->where('id', $row['Session']);
								$assd = $this->db->get('session_pundro')->result_array();
								foreach($assd as $ee):
									echo $ee['SessionName'];
								endforeach;
							?></td>
							<td><?php 
								//echo $row['AdmissionYear'];
								$this->db->where('id', $row['AdmissionYear']);
								$assd1 = $this->db->get('year_calendar')->result_array();
								foreach($assd1 as $ee):
									echo $ee['Name'];
								endforeach;
							?></td>
							<td><?php echo $row['AdmissionRollNo'];?></td>
							<td class="program_name13"><div><?php echo $row['NameofApplicant'];?></div></td>
							<td class="modlapopup">
								<a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="73" height="73" /></a>
							</td>
							<td>
								<?php
								$this->db->where('id', $row['ApplicantGender']);
								$gen = $this->db->get('gender')->result_array();
								foreach($gen as $ge):
									echo $ge['Name'];
								endforeach;
								?>
							</td>
							<td>
								<table class="ttres">
									<tr>
										<td><div><?php echo $row['CertificateCGPA1'];?></div></td>
										<td><div><?php echo $row['CertificateCGPA2'];?></div></td>
										<td><div><?php echo $row['CertificateCGPA3'];?></div></td>
										<td><div><?php echo $row['CertificateCGPA4'];?></div></td>
										<td><div><?php echo $row['CertificateCGPA1'] + $row['CertificateCGPA2'] + $row['CertificateCGPA3'] + $row['CertificateCGPA4'];?></div></td>
									</tr>
								</table>
							</td>
							<td class="program_name14">
								<div>
									<table>
										<tr>
											<td>
												<?php echo "Name: ".$row['ReferenceName1'];?>
												<?php echo "<br/>";?>
												<?php echo "Phone: ".$row['ReferencePhone1'];?>
											</td>
											<td>
												<?php echo "Name: ".$row['ReferenceName2'];?>
												<?php echo "<br/>";?>
												<?php echo "Phone: ".$row['ReferencePhone2'];?>
											</td>
										</tr>
									</table>
								</div>
							</td>
							<td><?php echo $row['ApplicationDate'];?></td>
							<td></td>
							<td class="tblactions"><div>
									<a class="btn btn-success" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_online_adm/<?php echo $row['id'];?>');">
										<i class="entypo-pencil"></i>
										<?php echo get_phrase('edit');?>
									</a>
									<a class="btn btn-success" href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/admitted_student/delete/<?php echo $row['id'];?>');">
										<i class="entypo-trash"></i>
										<?php echo get_phrase('delete');?>
									</a>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
			<div class="tab-pane box onad" id="trash">
				<table class="table table-bordered datatable" id="table_export1">
					<thead>
					<tr>
						<th><div>#</div></th>
						<th><div><?php echo get_phrase('program');?></div></th>
						<th><div><?php echo get_phrase('session');?></div></th>
						<th><div><?php echo get_phrase('year');?></div></th>
						<th><div><?php echo get_phrase('ad._roll');?></div></th>
						<th><div><?php echo get_phrase('name');?></div></th>
						<th><div><?php echo get_phrase('Photo');?></div></th>
						<th><div><?php echo get_phrase('gender');?></div></th>
						<th>
							<table class="ttres table table-bordered datatable">
								<tr>
									<td colspan="5">
										<div><?php echo get_phrase('result');?></div>
									</td>
								</tr>
								<tr>
									<td><div><?php echo get_phrase('SSC/Equivalent');?></div></td>
									<td><div><?php echo get_phrase('HSC/Equivalent');?></div></td>
									<td><div><?php echo get_phrase('Honours/Equivalent');?></div></td>
									<td><div><?php echo get_phrase('MS/Equivalent');?></div></td>
									<td><div><?php echo get_phrase('total_GPA');?></div></td>
								</tr>
							</table>
						</th>
						<th><div><?php echo get_phrase('References');?></div></th>
						<th><div><?php echo get_phrase('application_date');?></div></th>
						<th><div><?php echo get_phrase('decision');?></div></th>
						<th><div><?php echo get_phrase('Actions');?></div></th>
					</tr>
					</thead>
					<tbody>
					<?php

					?>
					<?php $count = 1;foreach($trash as $row):?>
						<tr>
							<td><?php echo $count++;?></td>
							<td class="program_name12">
								<div>
									<?php
									$this->db->where('id', $row['NameofProgram']);
									$course_program = $this->db->get('course_program')->result_array();
									foreach($course_program as $ee):
										echo $ee['course_name'];
									endforeach;
									?>
								</div>
							</td>
							<td><?php 
									//echo $row['Session'];
									$this->db->where('id', $row['Session']);
									$assd = $this->db->get('session_pundro')->result_array();
									foreach($assd as $ee):
										echo $ee['SessionName'];
									endforeach;
								?></td>
								<td><?php 
									//echo $row['AdmissionYear'];
									$this->db->where('id', $row['AdmissionYear']);
									$assd1 = $this->db->get('year_calendar')->result_array();
									foreach($assd1 as $ee):
										echo $ee['Name'];
									endforeach;
								?></td>
							<td><?php echo $row['AdmissionRollNo'];?></td>
							<td class="program_name13"><div><?php echo $row['NameofApplicant'];?></div></td>
							<td class="modlapopup">
								<a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="73" height="73" /></a>
							</td>
							<td>
								<?php
								$this->db->where('id', $row['ApplicantGender']);
								$gen = $this->db->get('gender')->result_array();
								foreach($gen as $ge):
									echo $ge['Name'];
								endforeach;
								?>
							</td>
							<td>
								<table class="ttres">
									<tr>
										<td><div><?php echo $row['CertificateCGPA1'];?></div></td>
										<td><div><?php echo $row['CertificateCGPA2'];?></div></td>
										<td><div><?php echo $row['CertificateCGPA3'];?></div></td>
										<td><div><?php echo $row['CertificateCGPA4'];?></div></td>
										<td><div><?php echo $row['CertificateCGPA1'] + $row['CertificateCGPA2'] + $row['CertificateCGPA3'] + $row['CertificateCGPA4'];?></div></td>
									</tr>
								</table>
							</td>
							<td class="program_name14">
								<div>
									<table>
										<tr>
											<td>
												<?php echo "Name: ".$row['ReferenceName1'];?>
												<?php echo "<br/>";?>
												<?php echo "Phone: ".$row['ReferencePhone1'];?>
											</td>
											<td>
												<?php echo "Name: ".$row['ReferenceName2'];?>
												<?php echo "<br/>";?>
												<?php echo "Phone: ".$row['ReferencePhone2'];?>
											</td>
										</tr>
									</table>
								</div>
							</td>
							<td><?php echo $row['ApplicationDate'];?></td>
							<td></td>
							<td class="tblactions"><div>
									<a class="btn btn-success" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_online_adm/<?php echo $row['id'];?>');">
										<i class="entypo-pencil"></i>
										<?php echo get_phrase('edit');?>
									</a>
									<a class="btn btn-success" href="<?php echo base_url();?>index.php?admin/admitted_student/restore/<?php echo $row['id'];?>">
										<?php echo get_phrase('restore');?>
									</a>
									<a class="btn btn-success" href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/admitted_student/permanent_delete/<?php echo $row['id'];?>');">
										<i class="entypo-trash"></i>
										<?php echo get_phrase('permanent_delete');?>
									</a>									
								</div>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{


		var datatable = $("#table_export").dataTable({

            //"sPaginationType": "full_numbers",
            //"lengthMenu": [ 10, 25, 50, 75, 100 ],
            /*"lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
            "pageLength" : 25,*/
            /*"aLengthMenu": [ [2, 4, 8, -1], [2, 4, 8, "All"] ],*/
            "aLengthMenu": [ [30, 50, 100, 200, 500, 1000, 2000, 3000,  -1], [30, 50, 100, 200, 500, 1000, 2000, 3000, "All"] ],
            "iDisplayLength" : 30,
            /*"aLengthMenu": "bootstrap",*/
			//"iDisplayLength": "500",
            "paging": "false",
            //"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
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
<script type="text/javascript">

	function checkForm(form)
	{
		if(!form.terms12.checked) {
			alert("Please indicate that you accept the Terms and Conditions");
			form.terms12.focus();
			return false;
		}

		return true;
	}

</script>
<script type="text/javascript">

	function validateForm() {
		var AdmissionRollNo = document.getElementById('AdmissionRollNo').value;
		if(AdmissionRollNo == ""){
			alert('Please Enter Admission Roll No');
			document.getElementById('AdmissionRollNo').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('AdmissionRollNo').style.borderColor = "green";
		}
		var AdmissionYear = document.getElementById('AdmissionYear').value;
		if(AdmissionYear == ""){
			alert('Please Enter Admission Year');
			document.getElementById('AdmissionYear').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('AdmissionYear').style.borderColor = "green";
		}
		var NameofProgram = document.getElementById('NameofProgram').value;
		if(NameofProgram == ""){
			alert('Please Enter Name of Program');
			document.getElementById('NameofProgram').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('NameofProgram').style.borderColor = "green";
		}
		var Session = document.getElementById('Session').value;
		if(Session == ""){
			alert('Please Enter Session');
			document.getElementById('Session').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('Session').style.borderColor = "green";
		}
		var photoApplicant = document.getElementById('photoApplicant').value;
		if(photoApplicant == ""){
			alert('Please Upload photo');
			document.getElementById('photoApplicant').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('photoApplicant').style.borderColor = "green";
		}
		var NameofApplicant = document.getElementById('NameofApplicant').value;
		if(NameofApplicant == ""){
			alert('Please Enter Name of Applicant');
			document.getElementById('NameofApplicant').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('NameofApplicant').style.borderColor = "green";
		}
		var ApplicantBirthDate = document.getElementById('ApplicantBirthDate').value;
		if(ApplicantBirthDate == ""){
			alert('Please Enter Birth Date');
			document.getElementById('ApplicantBirthDate').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicantBirthDate').style.borderColor = "green";
		}
		var ApplicantFatherName = document.getElementById('ApplicantFatherName').value;
		if(ApplicantFatherName == ""){
			alert('Please Enter Applicant Father Name');
			document.getElementById('ApplicantFatherName').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicantFatherName').style.borderColor = "green";
		}
		var ApplicantMotherName = document.getElementById('ApplicantMotherName').value;
		if(ApplicantMotherName == ""){
			alert('Please Enter Applicant Mother Name');
			document.getElementById('ApplicantMotherName').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicantMotherName').style.borderColor = "green";
		}
		var ApplicantNationality = document.getElementById('ApplicantNationality').value;
		if(ApplicantNationality == ""){
			alert('Please Enter Nationality');
			document.getElementById('ApplicantNationality').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicantNationality').style.borderColor = "green";
		}
		var ApplicantGender = document.getElementById('ApplicantGender').value;
		if(ApplicantGender == ""){
			alert('Please Enter Gender');
			document.getElementById('ApplicantGender').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicantGender').style.borderColor = "green";
		}
		var PresentMobile = document.getElementById('PresentMobile').value;
		if(PresentMobile == ""){
			alert('Please Enter Mobile No.');
			document.getElementById('PresentMobile').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentMobile').style.borderColor = "green";
		}
		var PresentHouse = document.getElementById('PresentHouse').value;
		if(PresentHouse == ""){
			alert('Please Enter House No.');
			document.getElementById('PresentHouse').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentHouse').style.borderColor = "green";
		}
		var PresentVillage = document.getElementById('PresentVillage').value;
		if(PresentVillage == ""){
			alert('Please Enter Village');
			document.getElementById('PresentVillage').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentVillage').style.borderColor = "green";
		}
		var PresentPostOffice = document.getElementById('PresentPostOffice').value;
		if(PresentPostOffice == ""){
			alert('Please Enter Post Office');
			document.getElementById('PresentPostOffice').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentPostOffice').style.borderColor = "green";
		}
		var PresentPoliceStation = document.getElementById('PresentPoliceStation').value;
		if(PresentPoliceStation == ""){
			alert('Please Enter Police Station');
			document.getElementById('PresentPoliceStation').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentPoliceStation').style.borderColor = "green";
		}
		var PresentDistrict = document.getElementById('PresentDistrict').value;
		if(PresentDistrict == ""){
			alert('Please Enter District');
			document.getElementById('PresentDistrict').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('PresentDistrict').style.borderColor = "green";
		}
		var CertificateName1 = document.getElementById('CertificateName1').value;
		if(CertificateName1 == ""){
			alert('Please Enter Certificate/Degree Name');
			document.getElementById('CertificateName1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateName1').style.borderColor = "green";
		}
		var CertificateGroup1 = document.getElementById('CertificateGroup1').value;
		if(CertificateGroup1 == ""){
			alert('Please Enter Group Name');
			document.getElementById('CertificateGroup1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateGroup1').style.borderColor = "green";
		}
		var CertificateYear1 = document.getElementById('CertificateYear1').value;
		if(CertificateYear1 == ""){
			alert('Please Enter Passing Year');
			document.getElementById('CertificateYear1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateYear1').style.borderColor = "green";
		}
		var CertificateNameofInstitute1 = document.getElementById('CertificateNameofInstitute1').value;
		if(CertificateNameofInstitute1 == ""){
			alert('Please Enter Name of Institute');
			document.getElementById('CertificateNameofInstitute1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateNameofInstitute1').style.borderColor = "green";
		}
		var CertificateCGPA1 = document.getElementById('CertificateCGPA1').value;
		if(CertificateCGPA1 == ""){
			alert('Please Enter CGPA');
			document.getElementById('CertificateCGPA1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateCGPA1').style.borderColor = "green";
		}
		var CertificateDocumentscert1 = document.getElementById('CertificateDocumentscert1').value;
		if(CertificateDocumentscert1 == ""){
			alert('Please Enter Certificate');
			document.getElementById('CertificateDocumentscert1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateDocumentscert1').style.borderColor = "green";
		}
		var CertificateDocumentsmark1 = document.getElementById('CertificateDocumentsmark1').value;
		if(CertificateDocumentsmark1 == ""){
			alert('Please Enter Mark Sheet');
			document.getElementById('CertificateDocumentsmark1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateDocumentsmark1').style.borderColor = "green";
		}
		var CertificateName2 = document.getElementById('CertificateName2').value;
		if(CertificateName2 == ""){
			alert('Please Enter Certificate/Degree Name');
			document.getElementById('CertificateName2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateName2').style.borderColor = "green";
		}
		var CertificateGroup2 = document.getElementById('CertificateGroup2').value;
		if(CertificateGroup2 == ""){
			alert('Please Enter Group Name');
			document.getElementById('CertificateGroup2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateGroup2').style.borderColor = "green";
		}
		var CertificateYear2 = document.getElementById('CertificateYear2').value;
		if(CertificateYear2 == ""){
			alert('Please Enter Passing Year');
			document.getElementById('CertificateYear2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateYear2').style.borderColor = "green";
		}
		var CertificateNameofInstitute2 = document.getElementById('CertificateNameofInstitute2').value;
		if(CertificateNameofInstitute2 == ""){
			alert('Please Enter Name of Institute');
			document.getElementById('CertificateNameofInstitute2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateNameofInstitute2').style.borderColor = "green";
		}
		var CertificateCGPA2 = document.getElementById('CertificateCGPA2').value;
		if(CertificateCGPA2 == ""){
			alert('Please Enter CGPA');
			document.getElementById('CertificateCGPA2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateCGPA2').style.borderColor = "green";
		}
		var CertificateDocumentscert2 = document.getElementById('CertificateDocumentscert2').value;
		if(CertificateDocumentscert2 == ""){
			alert('Please Enter Certificate');
			document.getElementById('CertificateDocumentscert2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateDocumentscert2').style.borderColor = "green";
		}
		var CertificateDocumentsmark2 = document.getElementById('CertificateDocumentsmark2').value;
		if(CertificateDocumentsmark2 == ""){
			alert('Please Enter Mark Sheet');
			document.getElementById('CertificateDocumentsmark2').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('CertificateDocumentsmark2').style.borderColor = "green";
		}
		var ReferenceName1 = document.getElementById('ReferenceName1').value;
		if(ReferenceName1 == ""){
			alert('Please Enter Reference Name');
			document.getElementById('ReferenceName1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ReferenceName1').style.borderColor = "green";
		}
		var ReferenceAddress1 = document.getElementById('ReferenceAddress1').value;
		if(ReferenceAddress1 == ""){
			alert('Please Enter Address');
			document.getElementById('ReferenceAddress1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ReferenceAddress1').style.borderColor = "green";
		}
		var ReferenceMobile1 = document.getElementById('ReferenceMobile1').value;
		if(ReferenceMobile1 == ""){
			alert('Please Enter References Mobile');
			document.getElementById('ReferenceMobile1').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ReferenceMobile1').style.borderColor = "green";
		}
		var ApplicationDate = document.getElementById('ApplicationDate').value;
		if(ApplicationDate == ""){
			alert('Please Enter Application Date');
			document.getElementById('ApplicationDate').style.borderColor = "red";
			return false;
		}else{
			document.getElementById('ApplicationDate').style.borderColor = "green";
		}
	}
</script>