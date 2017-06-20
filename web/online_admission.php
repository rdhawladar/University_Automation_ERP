<?php
// Only process the form if $_POST isn't empty
if ( ! empty( $_POST ) ) {
  
  // Connect to MySQL
  $mysqli = new mysqli( 'localhost', 'root', '', 'pundro' );
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
  
    $t1    = $_POST['technology1'];
	$t2    = $_POST['technology2'];
	$_POST['technology'] = $t1.", ".$t2;

  // Insert our data
  $sql = "INSERT INTO osad_student ( name_bn, name_en, father_name, mother_name, ff_son, upjati, gardian_name, nationality, birthday, religion, sex, phone, email, pr_address, cur_address, technology, acd_session_id ) VALUES ( '{$mysqli->real_escape_string($_POST['name_bn'])}', '{$mysqli->real_escape_string($_POST['name_en'])}', '{$mysqli->real_escape_string($_POST['father_name'])}', '{$mysqli->real_escape_string($_POST['mother_name'])}', '{$mysqli->real_escape_string($_POST['ff_son'])}', '{$mysqli->real_escape_string($_POST['upjati'])}', '{$mysqli->real_escape_string($_POST['gardian_name'])}', '{$mysqli->real_escape_string($_POST['nationality'])}', '{$mysqli->real_escape_string($_POST['birthday'])}', '{$mysqli->real_escape_string($_POST['religion'])}', '{$mysqli->real_escape_string($_POST['sex'])}', '{$mysqli->real_escape_string($_POST['phone'])}', '{$mysqli->real_escape_string($_POST['email'])}', '{$mysqli->real_escape_string($_POST['pr_address'])}', '{$mysqli->real_escape_string($_POST['cur_address'])}', '{$mysqli->real_escape_string($_POST['technology'])}', '{$mysqli->real_escape_string($_POST['acd_session_id'])}' )";
  $insert = $mysqli->query($sql);
  
  // Print response from MySQL
  if ( $insert ) {
    echo "<div style='color: mediumseagreen;    font-size: 22px;    text-align: center;    margin: 4%;'>Your Application has been Accepted Successfully. Your ID: {$mysqli->insert_id}</div>";
  } else {
    die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
  
  // Close our connection
  $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/pundro/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/pundro/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/pundro/assets/css/neon-forms.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/pundro/assets/css/AdminLTE.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/pundro/assets/css/core.min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/pundro/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/pundro/assets/css/custom.css">
	<script type="text/javascript" src="http://localhost/pundro/assets/js/jquery-1.11.0.min.js"></script>
	<style type="text/css">
		div.tab-pane.box.onad label{
			text-transform: capitalize;
		}
	</style>
</head>
<body>
<form method="post" action="">
	<div class="tab-pane box onad" id="add" style="width: 900px !important;margin: 0 auto;float: none !important;">
             <br />
                <div class="box-content">
                    	<input type="text" style="display:none" class="form-control" name="acd_session_id" value="8">
                        
                        <div class="padded">
      
	                       <div class="col-md-4">   
                           <div class="form-group">
						    <label for="field-1" class="col-sm-12">name bangla</label>
                             <div class="col-sm-12">
							<input type="text" class="form-control" name="name_bn" data-validate="required" data-message-required="value_required" value="" autofocus>
						    </div>
					       </div>
                          </div>
                          
						   <div class="col-md-4">
							<div class="form-group">
							<label for="field-1" class="col-sm-12">name english</label>
							 <div class="col-sm-12">
								<input type="text" class="form-control" name="name_en" data-validate="required" data-message-required="value_required" value="">
							</div>
						   </div>
						  </div>

							<div class="col-md-4">
							<div class="form-group">
							<label for="field-1" class="col-sm-12">father name</label>
							 <div class="col-sm-12">
								<input type="text" class="form-control" name="father_name" data-validate="required" data-message-required="value_required" value="">
							</div>
						   </div>
						  </div>

							  <div class="col-md-4">
							<div class="form-group">
							<label for="field-1" class="col-sm-12">mother name</label>
							 <div class="col-sm-12">
								<input type="text" class="form-control" name="mother_name" data-validate="required" data-message-required="value_required" value="">
							</div>
						   </div>
						  </div>
							<div class="col-md-2">
                        <div class="form-group">
						<label for="field-1" class="col-sm-12"></label>
                         <div class="col-sm-12">
                         FFS
                             <select name="ff_son" class="form-control">
                                 <option value="">select</option>
                                 <option value="yes">yes</option>
                                 <option value="no">no</option>
                             </select>
						</div>
					   </div>
				      </div>
                      
                           <div class="col-md-2">  
                        <div class="form-group">
						<label for="field-1" class="col-sm-12"></label>
                         <div class="col-sm-12">
                         upjati
                             <select name="upjati" class="form-control">
                                 <option value="">select</option>
                                 <option value="yes">yes</option>
                                 <option value="no">no</option>
                             </select>
						</div>
					   </div>
				      </div>
                      
                                <div class="col-md-4">  
                        <div class="form-group">
						<label for="field-1" class="col-sm-12">guardian name</label>
                         <div class="col-sm-12">
							<input type="text" class="form-control" name="gardian_name" data-validate="required" data-message-required="value_required" value="">
						</div>
					   </div>
				      </div>
                      
              
                      <div class="col-md-4">  
                        <div class="form-group">
						<label for="field-1" class="col-sm-12">Nationality</label>
                        
						<div class="col-sm-12">
                            <select name="nationality">
                                <option value="">-- select one --</option>
                                <option value="afghan">Afghan</option>
                                <option value="bangladeshi">bangladeshi</option>
                            </select>
					</div>
					   </div>
				      </div>
                      
 
                      <div class="col-md-4">  
                        <div class="form-group">
						<label for="field-1" class="col-sm-12">birthday</label>
                        
						<div class="col-sm-12">
							<input type="date" class="form-control" name="birthday" value="" data-start-view="2">
					</div>
					   </div>
				      </div>
                      
					   <div class="col-md-4">  
                        <div class="form-group">
						<label for="field-1" class="col-sm-12">religion</label>
                         <div class="col-sm-12">
							<select name="religion" class="form-control">
                              <option value="">select</option>
                              <option value="Islam">islam</option>
                          </select>
						</div>
					   </div>
				      </div>
       
				
					   <div class="col-md-4">  
                        <div class="form-group">
						<label for="field-1" class="col-sm-12">gender</label>
                        
						 <div class="col-sm-12">
							<select name="sex" class="form-control">
                              <option value="">select</option>
                              <option value="male">male</option>
                              <option value="female">female</option>
                          </select>
					</div>
					   </div>
				      </div>
                      
                      
                      	<div class="col-md-4">  
                        <div class="form-group">
						<label for="field-1" class="col-sm-12">phone</label>
                        
						 <div class="col-sm-12">
							<input type="text" class="form-control" name="phone" value="" >
						</div>
					   </div>
				      </div>
                    
					  	<div class="col-md-4">  
                        <div class="form-group">
						<label for="field-1" class="col-sm-12">email</label>
						 <div class="col-sm-12">
							<input type="text" class="form-control" name="email" value="">
						</div>
					   </div>
				      </div>
                    
					
					  <div class="col-md-4">  
                        <div class="form-group">
						<label for="field-1" class="col-sm-12">Permanent address</label>
                        
						 <div class="col-sm-12">
							
                            <textarea type="text" class="form-control" name="pr_address" value="" ></textarea>
						</div>
					   </div>
				      </div>
                      
                      	  <div class="col-md-4">  
                        <div class="form-group">
						<label for="field-1" class="col-sm-12">Current address</label>
                        
						 <div class="col-sm-12">
							
                            <textarea type="text" class="form-control" name="cur_address" value="" ></textarea>
						</div>
					   </div>
				      </div>
<p style="clear:both;">&nbsp;</p>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select id="type">
                                        <option value="#">Please Select</option>
                                        <option value="item1">Ist Choose</option>
                                        <option value="item2">2nd Choose</option>
                                    </select>

                                    <select id="size">
                                        <option value="">-- select one -- </option>
                                    </select>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#type").change(function () {
                                                var val = $(this).val();
                                                if (val == "item1") {
                                                    $("#size").html("<option value='test'>B.sc</option><option value='test2'>Honors</option><option value='test2'>Masters</option>");
                                                } else if (val == "item2") {
                                                    $("#size").html("<option value='test'>B.sc</option><option value='test2'>Honors</option><option value='test2'>Masters</option>");
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select id="type1">
                                        <option value="#">Please Select Faculty</option>
                                        <option value="item5">Science & Engineering</option>
                                        <option value="item6">Business Studies</option>
                                        <option value="item7">Arts & Humanities</option>
                                        <option value="item8">Social Science</option>
                                        <option value="item9">Islamic Studies</option>
                                        <option value="item10">Law</option>
                                    </select>

                                    <select id="size1" name="technology1">
                                        <option value="">-- select one -- </option>
                                    </select>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#type1").change(function () {
                                                var val = $(this).val();
                                                if (val == "item5") {
                                                    $("#size1").html("<option value='Computer Science & Engineering (CSE)'>Computer Science & Engineering (CSE)</option><option value='Electrical & electronics Engineering (EEE)'>Electrical & electronics Engineering (EEE)</option>");
                                                } else if (val == "item6") {
                                                    $("#size1").html("<option value='BBA'>BBA</option><option value='MBA'>MBA</option><option value='EMBA'>EMBA</option>");
                                                } else if (val == "item7") {
                                                    $("#size1").html("<option value='English'>English</option>");
                                                } else if (val == "item8") {
                                                    $("#size1").html("<option value='Economics'>Economics</option><option value='Sociology'>Sociology</option>");
                                                } else if (val == "item9") {
                                                    $("#size1").html("<option value='Islamic Studies'>Islamic Studies</option>");
                                                } else if (val == "item10") {
                                                    $("#size1").html("<option value='LAW'>LAW</option>");
                                                }

                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div style="clear:both;width:100%;">&nbsp;</div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select id="typea">
                                        <option value="#">Please Select</option>
                                        <option value="item1a">Ist Choose</option>
                                        <option value="item2a">2nd Choose</option>
                                    </select>

                                    <select id="sizea">
                                        <option value="">-- select one -- </option>
                                    </select>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#typea").change(function () {
                                                var val = $(this).val();
                                                if (val == "item1a") {
                                                    $("#sizea").html("<option value='test'>B.sc</option><option value='test2'>Honors</option><option value='test2'>Masters</option>");
                                                } else if (val == "item2a") {
                                                    $("#sizea").html("<option value='test'>B.sc</option><option value='test2'>Honors</option><option value='test2'>Masters</option>");
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select id="type1a">
                                        <option value="#">Please Select Faculty</option>
                                        <option value="item5a">Science & Engineering</option>
                                        <option value="item6a">Business Studies</option>
                                        <option value="item7a">Arts & Humanities</option>
                                        <option value="item8a">Social Science</option>
                                        <option value="item9a">Islamic Studies</option>
                                        <option value="item10a">Law</option>
                                    </select>

                                    <select id="size1a" name="technology2">
                                        <option value="">-- select one -- </option>
                                    </select>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#type1a").change(function () {
                                                var val = $(this).val();
                                                if (val == "item5a") {
                                                    $("#size1a").html("<option value='Computer Science & Engineering (CSE)'>Computer Science & Engineering (CSE)</option><option value='Electrical & electronics Engineering (EEE)'>Electrical & electronics Engineering (EEE)</option>");
                                                } else if (val == "item6a") {
                                                    $("#size1a").html("<option value='BBA'>BBA</option><option value='MBA'>MBA</option><option value='EMBA'>EMBA</option>");
                                                } else if (val == "item7a") {
                                                    $("#size1a").html("<option value='English'>English</option>");
                                                } else if (val == "item8a") {
                                                    $("#size1a").html("<option value='Economics'>Economics</option><option value='Sociology'>Sociology</option>");
                                                } else if (val == "item9a") {
                                                    $("#size1a").html("<option value='Islamic Studies'>Islamic Studies</option>");
                                                } else if (val == "item10a") {
                                                    $("#size1a").html("<option value='LAW'>LAW</option>");
                                                }

                                            });
                                        });
                                    </script>
                                </div>
                            </div>
				      </div>
                      <br />

                        <div class="form-group test32">

<div class="table-responsive test32">
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
                              <option value="">select</option>
                              <option value="SSC-GENERAL">SSC(General)</option>
                              <option value="SSC-VOCATIONAL">SSC(Vocational)</option>
                               <option value="TRADE">Trade(Two-Years)</option>
                               <option value="DAKHIL">Dakhil(Vocational)</option>
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
		   </div>
                </div>                
			</div>
			<div style="float: left;width: 100%;text-align: center;margin: 1%;"><input type="submit" value="Submit Form"></div> 
</form>
</body>
</html>
