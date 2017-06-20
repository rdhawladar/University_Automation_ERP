
<?php
$studentId = $this->uri->segment(4);
?>

<input type="button" value="print"  onclick="PrintDiv('whole_page')">
    <INPUT TYPE="button" VALUE="Back" onClick="history.go(0);">
    <div id="whole_page">
    <div class="col-sm-3 col-sm-offset-4 bg"> 
			<div class="row"> 
				<div class="col-sm-offset-5 pundra_id_logo"> 
					<img src="<?php echo base_url();?>assets/pundra_id/images/index.png" width="60" height="60" alt="" />
				</div>
			</div>
			<div class="row"> 
				<div class="text-center"> 
					<h4 class="header_content">Pundra University of Science & Technology</h4>
					<h5>Rangpur Road, Gokul, Bogra.</h4>
				</div>
			</div>
			<div class="row pundra_id_info"> 
				<div class="text-center"> 
					<h4>Student's ID Card</h4>
                                        
				</div>
			</div>
			
			<div class="row">
                                                                    <?php                                                  
                                                                        $this->db->where('RegistratioNo =', $studentId);
                                                                        $x = $this->db->get('student_pundro')->result_array();
                                                                        foreach ($x as $row):
                                                                            
                                                                        endforeach;
                                                                    ?> 
				<img class="col-sm-offset-4 col-sm-4 student_image" src="<?php echo base_url();?>uploads/student_image/<?php echo $row['PhotoApplicant']; ?>" alt="" />
			</div>
			<div class="row"> 
				<div class="student_info"> 
					<table > 
						<tbody> 
							<tr style="font-size:20px"> 
								<th>Name</th>
								<td>:                                                                                                                                       
                                                                     <?php 
                                                                        
                                                                        echo $row['NameofApplicant'];
                                                                        
                                                                     ?>      
                                                                </td>
							</tr>
							<tr>
								<th>Program</th>
								<td>: 
                                                                    <?php 
                                                                    $programId = $row['NameofProgram'];
                                                                    $this->db->where('id', $programId);                                                     
                                                                    $temp = $this->db->get('course_program')->result_array();
                                                                    foreach($temp as $ytr):
                                                                        echo $ytr['course_name'];
                                                                    endforeach;
                                                                    ?>
                                                                </td>
							</tr>
							<tr>
								<th>Student ID No.</th>
								<td>: 
                                                                    <?php 
                                                                    
                                                                        echo $row['RegistratioNo'];
                                                                    
                                                                    ?>
                                                                </td>
							</tr>
                                                        <tr>
                                                            <th>Batch No.</th>
                                                            <td>: 
                                                                <?php 
                                                                        $this->db->where('id', $row['NameofBatch']);
                                                                        $batch = $this->db->get('batch')->result_array();
                                                                        foreach ($batch as $batch_alias):
                                                                            echo $batch_alias['batch_alias'];
                                                                        endforeach;
                                                                    
                                                                    ?>
                                                            </td>
                                                        </tr>														
						</tbody>
					</table>
                                    
				</div>
				
			</div>
        <div class="row">
            <div class="col-md-8 student_info">
                <table><tbody>
                        
                        <tr>
                            <th>Session</th>
                            <td>:
                                <?php 
                                $this->db->where('id', $row['Session']);
                                $session = $this->db->get('session_pundro')->result_array();
                                foreach ($session as $session_name):
                                echo $session_name['SessionName'];
                                endforeach;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td>: 
                                <?php                                
                                echo $row['BloodGroup'];                                
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 ">
                <div class="register_signature">
                        <table><tbody>
                                <tr style="height: 25px; ">							
                                    <td class="text-center"><img src="<?php echo base_url(); ?>assets/pundra_id/images/img003.jpg" alt="" width="50px" height="400px"/></td>
                                </tr>
                                <tr>
                                   <td class="text-center">Register</td>
                                </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
</div>
                
		<br><br><br>
		
		<div class="col-sm-3 col-sm-offset-4 bg"> 
			<div class="row"> 
				<div class="student_info"> 
					<table class="info_margin"> 
						<tbody> 
							<tr> 
								<th>Father's Name</th>
								<td>: 
                                                                <?php                                                                
                                                                echo $row['ApplicantFatherName'];                                                                
                                                                ?>
                                                                </td>
							</tr>
							<tr>
								<th>Mother's Name</th>
								<td>: 
                                                                <?php                                                                
                                                                echo $row['ApplicantMotherName'];                                                                
                                                                ?>
                                                                </td>
							</tr>
							<tr>
								<th colspan="2">Present Address :</th>
								
							</tr>
							<tr>
								<th>Village</th>
								<td>: 
                                                                <?php                                                                
                                                                echo $row['PresentVillage'];                                                                
                                                                ?>
                                                                </td>
							</tr>
							<tr>
								<th>Post</th>
								<td>: 
                                                                <?php                                                                
                                                                echo $row['PresentPost'];                                                                
                                                                ?>
                                                                </td>
							</tr>
							<tr>
								<th>Upazila</th>
								<td>: 
                                                                <?php
                                                                
                                                                echo $row['PresentUpazilla'];
                                                                
                                                                ?>
                                                                </td>
							</tr> 
							<tr>
								<th>District</th>
								<td>: 
                                                                <?php
                                                                
                                                                echo $row['PresentDistrict'];
                                                                
                                                                ?>
                                                                </td>
							</tr> 
							<tr>
								<th colspan="2">Permanent Address :</th>
								
							</tr>
							<tr>
								<th>Village</th>
								<td>: 
                                                                <?php
                                                                
                                                                echo $row['PermanentVillage'];
                                                                
                                                                ?>
                                                                </td>
							</tr>
							<tr>
								<th>Post</th>
								<td>: 
                                                                <?php
                                                                
                                                                echo $row['PermanentPost'];
                                                                
                                                                ?>
                                                                </td>
							</tr>
							<tr>
								<th>Upazila</th>
								<td>: 
                                                                <?php
                                                                
                                                                echo $row['PermanentUpazilla'];
                                                                
                                                                ?>
                                                                </td>
							</tr> 
							<tr>
								<th>District</th>
								<td>:                                                                
                                                                <?php
                                                                
                                                                echo $row['PermanentDistrict'];
                                                                
                                                                ?>
                                                                </td>
							</tr> 
							<tr>
								<th>Mobile No.</th>
								<td>: 
                                                                <?php
                                                                
                                                                echo $row['PresentMobileNo'];
                                                                
                                                                ?>
                                                                </td>
							</tr> 
							<tr>
								<th>Date of Birth</th>
								<td>: 
                                                                <?php
                                                                
                                                                echo $row['ApplicantBirthDate'];
                                                                
                                                                ?>
                                                                </td>
							</tr> 
							<tr>
								<th>Issue Date</th>
								<td>: January, 2016</td>
							</tr> 
							<tr>
								<th>Valid Until</th>
								<td>: Completion of the Course</td>
							</tr> 
						</tbody>
					</table>
				</div>
			</div>
				
			<div class="row pundra_id_info"> 
				<h4 class="text-center">If found please return to</h4>
			</div>
			<div class="row "> 
				<div class="text-center">
					<div class="info_margin"> 
						<strong>Pundra University of Science & Technology</strong><br>
						<span>Rangpur Road, Gokul, Bogra.</span><br>
						<span>Contact No.: 01713-377037</span><br>
						<span>Fax:+88-051-78563</span><br>
						<span>E-mail:info@pundrouniversity.edu.bd</span><br>
						<span>Web:www.pundrouniversity.edu.bd</span>
					</div>
				</div>
			</div>
		</div>
</div>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnPrint").click(function () {
                var contents = $("#whole_page").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>DIV Contents</title>');
                frameDoc.document.write('</head><body>');
                //Append the external CSS file.
                frameDoc.document.write('<link href="<?//php echo base_url();?>assets/pundra_id/css/student_id_card_preview.css" rel="stylesheet" type="text/css" />');
                //Append the DIV contents.
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });
        });
    </script>-->
<script>
      function PrintDiv(id) {
            var data = document.getElementById(id).innerHTML;
            var myWindow = window.open('', 'Student Id Card', 'height = 900, width = 1100');
            myWindow.document.write('<html><head><title>Student Id Card</title>');
            myWindow.document.write('<link href="<?php echo base_url();?>assets/pundra_id/css/bootstrap.min.css" rel="stylesheet" type="text/css" />');
            myWindow.document.write('<link href="<?php echo base_url();?>assets/pundra_id/css/student_id_card_preview.css" rel="stylesheet" type="text/css" />');
            myWindow.document.write('</head><body >');
            myWindow.document.write(data);
            myWindow.document.write('</body></html>');
            myWindow.document.close(); // necessary for IE >= 10

            myWindow.onload=function(){ // necessary if the div contain images

                myWindow.focus(); // necessary for IE >= 10
                myWindow.print();
                myWindow.close();
            };
        }
//function printContent(el){
//	var restorepage = document.body.innerHTML;
//	var printcontent = document.getElementById(el).innerHTML;
//	document.body.innerHTML = printcontent;
//         debug: false;            
//      importCSS: true;           
//      printContainer: true;      
//      loadCSS: "<?//php echo base_url();?>assets/pundra_id/css/pundra_id_card_preview.css";
//      pageTitle: "" ;            
//      removeInline: false;
//	window.print();
//	document.body.innerHTML = restorepage;
//$("#whole_page").printThis({
//      debug: false,             
//      importCSS: true,           
//      printContainer: true,      
//      loadCSS: "<?//php echo base_url();?>assets/pundra_id/css/pundra_id_card_preview.css",
//      pageTitle: "",             
//      removeInline: false   
//  });
//}
//function printContent(){
//    w = window.open(null, 'Print_Page', 'scrollbars=yes'); 
//    var myStyle = '<link rel="stylesheet" href="<?//php echo base_url();?>assets/pundra_id/css/student_id_card_preview.css">';
//    w.document.write( myStyle + jQuery('.whole_page').html());
//    w.print();
//    w.document.close();
//}
</script>