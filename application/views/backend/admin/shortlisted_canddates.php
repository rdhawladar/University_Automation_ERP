<?php
$temp = '1';
$this->db->where('IsActive',$temp);
$semester = $this->db->get('admission_configuration')->result_array();
foreach($semester as $wee):
endforeach;
$this->db->where('id',$wee['SemesterName']);
$semester12 = $this->db->get('session_pundro')->result_array();
foreach($semester12 as $wee12):
endforeach;
$this->db->where('id',$wee['Year']);
$semester13 = $this->db->get('year_calendar')->result_array();
foreach($semester13 as $wee13):
endforeach;
?>
<h3 class="adm_form_head_setting">
	<?php
	echo "&nbsp;for ".$wee12['SessionName']."&nbsp;".$wee13['Name']." for ".$wee['ProgramName']." Program(s)";
	?>
</h3>
<div class="floatright">
	<a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button class="btn btn-success" onclick="myFunction()">Print</button>
</div>
<p class="clearboth">&nbsp;</p>
<div class="row onadf">
	<div class="col-md-12">
         <?php
/*
		$today = date('Y-m-d');
		$data = $this->db->get_where('acd_session' , array('is_open' => 1, 'strt_dt <= ' => $today,'end_dt >= ' => $today))->result_array();
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic Session - ".$data[0]['name'];
		   */?><!--
    <p>&nbsp;</p>-->
		<ul class="nav nav-tabs bordered">

            <li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('student_application_list');?>
                </a>
            </li>
		</ul>
		<div class="tab-content">
            <div class="tab-pane box active onad" id="list">
				<div class="row">
					<table class="table table-bordered datatable" id="table_export">
						<thead>
						<tr>
							<th><div>#</div></th>
							<th><div><?php echo get_phrase('program');?></div></th>
							<th><div><?php echo get_phrase('reference_no');?></div></th>
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
										<td><div><?php echo get_phrase('total_GPA');?></div></td>
									</tr>
								</table>
							</th>
							<th><div><?php echo get_phrase('admission_mark');?></div></th>
							<th><div><?php echo get_phrase('References');?></div></th>
							<th><div><?php echo get_phrase('application_date');?></div></th>
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
								<td><?php echo $row['PresentMobile'];?></td>
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
											<td><div><?php echo $row['CertificateCGPA1'] + $row['CertificateCGPA2'];?></div></td>
										</tr>
									</table>
								</td>
								<td><?php echo $row['AdmMarksObtained']." (".$row['TotalMarkAdm'].")";?></td>
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
								<td class="tblactions"><div>
										<a class="btn btn-success" href="<?php echo base_url() . 'index.php?admin/online_admission/singlerejected/' .$row['id'].'/4';?>">
											<?php echo get_phrase('reject');?>
										</a>
										<!--<a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_edit_shortlisted/<?php /*echo $row['id'];*/?>');">
											<i class="entypo-pencil"></i>
											<?php /*echo get_phrase('select');*/?>
										</a>-->
										<!--&nbsp;  &nbsp;  &nbsp;
										<a href="#" onclick="showAjaxModal('<?php /*echo base_url();*/?>index.php?modal/popup/modal_edit_online_adm/<?php /*echo $row['id'];*/?>');">
											<i class="entypo-pencil"></i>
											<?php /*echo get_phrase('edit');*/?>
										</a>-->
										<!--<a href="#" onclick="confirm_modal('<?php /*echo base_url();*/?>index.php?admin/online_admission/delete/<?php /*echo $row['id'];*/?>');">
											<i class="entypo-trash"></i>
											<?php /*echo get_phrase('delete');*/?>
										</a>-->
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
</script>