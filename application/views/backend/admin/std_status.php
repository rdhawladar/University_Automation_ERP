<div class="row">
	<div class="col-md-12">
    <p>&nbsp;</p>
		<ul class="nav nav-tabs bordered">

            <li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('Students_list');?>
                </a>
            </li>
		</ul>
		<div class="tab-content">
            <div class="tab-pane box active onad" id="list">
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
							<th><div><?php echo get_phrase('Photo');?></div></th>
                    		<th><div><?php echo get_phrase('name_of_program');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
                    		<th><div><?php echo get_phrase('class_roll_no');?></div></th>
                    		<th><div><?php echo get_phrase('registratio_no');?></div></th>
                    		<th><div><?php echo get_phrase('name_of_applicant');?></div></th>
                    		<th><div><?php echo get_phrase('Actions');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    <?php

                    ?>
                    	<?php $count = 1;foreach($osadStudent as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td class="modlapopup">
								<a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="73" height="73" /></a>
							</td>
							<td>
								<?php
								$this->db->where('id', $row['NameofProgram']);
								$course_program = $this->db->get('course_program')->result_array();
								foreach($course_program as $ee):
									echo $ee['course_name'];
									endforeach;
								?>
							</td>
							<td><?php
								echo $row['StdStatus'];
								$test = explode(", ", $row['StdStatus']);
								//echo $string = rtrim(implode(",\n", $test), ',');
								//echo $test1 = implode(",\n", $test);
								echo $test['3'];


								$this->db->where('id', $row['StdStatus']);
								$status = $this->db->get('semester')->result_array();
								foreach($status as $rrt):
									echo $rrt['name'];
								endforeach;
								?></td>
							<td><?php echo $row['ClassRollNo'];?></td>
							<td><?php echo $row['RegistratioNo'];?></td>
							<td><?php echo $row['NameofApplicant'];?></td>
							<td>
								<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_std_status/<?php echo $row['id'];?>');">
									<i class="entypo-pencil"></i>
									<?php echo get_phrase('edit');?>
								</a>
								&nbsp;  &nbsp;  &nbsp;
								<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/std_status/delete/<?php echo $row['id'];?>');">
									<i class="entypo-trash"></i>
									<?php echo get_phrase('delete');?>
								</a>
							</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
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