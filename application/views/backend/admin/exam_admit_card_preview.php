
<?php
 $studentId = $this->uri->segment(4);
?>

<div class="container midterm_admit"> 
			<div class="row"> 
				<div class="photo col-md-2"> 
					<img src="<?php echo base_url();?>/uploads/logo.png" alt="" />
				</div>
				<div class="heading col-md-8 text-center"> 
					<strong class="title">Pundra University of Sicence & Technology</strong><br>
					<span class="title_address">Rangpur Road, Gokul, Bogra.</span><br>
					<strong class="head_title_admit">Admit Card</strong>
				</div>
				<div class="photo col-md-2">
                                    <?php 
                                        $this->db->where('id', $studentId);
                                        $information = $this->db->get('student_pundro')->result_array();
                                        foreach($information as $row):
                                            
                                        
                                    ?>
					<img src="<?php echo base_url();?>/uploads/logo.png" alt="" />
				</div>
			</div>
			<div class="row"  id="fontSize"> 
				<div class="col-md-5" > 
					<label for="name">Name:</label><strong><?php echo $row['NameofApplicant'];?></strong>                 
				</div>
				<div class="col-md-7"> 
                                    <div><label for="program">Program:</label></div>
					<div><strong><?php 
                                        $this->db->where('RegistratioNo', $studentId);
                                        $courseCode = $this->db->get('student_pundro')->result_array();
                                        foreach ($courseCode as $courseCodeEx):
                                            $courseCodeNe = $courseCodeEx['NameofProgram'];
                                        endforeach;
                                        $this->db->where('id', $courseCodeNe);
                                        $courseName = $this->db->get('course_program')->result_array();
                                        foreach ($courseName as $courseNameEx):
                                            echo $courseNameEx['course_name'];
                                        endforeach;
                                        ?></strong></div>
				</div>
                        </div>
    <div class="row">
				<div class="col-md-3"> 
					<label for="reg">ID/Regi. No:</label>
					<strong><?php echo $row['RegistratioNo'];?></strong>
				</div>
				<div class="col-md-3"> 
					<label for="session">Session:</label>
					<strong><?php 
                                        $sessionCode = $row['Session'];
                                        $this->db->where('id', $sessionCode);
                                        $sessionName = $this->db->get('session_pundro')->result_array();
                                        foreach($sessionName as $sessionNameEx):
                                            echo $sessionNameEx['SessionName'];
                                        endforeach;
                                        ?></strong>
				</div>
				<div class="col-md-3"> 
					<label for="semester">Semester:</label>
					<strong><?php 
                                        echo $row[''];
                                        ?></strong>
				</div>
				<div class="col-md-3"> 
					<label for="batch">Batch No:</label>
					<strong><?php 
                                        echo $row['BatchName'];
                                        ?></strong>
				</div>
				<?php endforeach;?>
			</div>
			<div class="row"> 
				<div class="col-md-12 " > 
					<table border="1" >
						<thead>
							<tr> 
								<th>Course Code</th>
								<th>Course Title</th>
								<th>Date </th>
								<th>Day</th>
								<th>Time</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>2</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>3</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>4</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
                        
		</div>