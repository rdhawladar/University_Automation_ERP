<!--password-->
<div class="row">
	<div class="col-md-12">

    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">

			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-lock"></i>
					<?php echo get_phrase('semester_details');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>


		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active semduration" id="list" style="padding: 5px">
                <div class="box-content padded">
						<?php
						//echo $this->session->userdata('id');
						foreach($sd as $ss112):
						?>
							<div class="form-group">
								<div class="col-sm-4">
									<span><h3>Session Name:</h3> <?php echo $ss112['SessionName'];?></span>
									<span><h3>Admission Duration:</h3> <?php echo $ss112['AdmissionDuration'];?></span>
									<span><h3>Class Commencement:</h3> <?php echo $ss112['ClassCommencement'];?></span>
									<span><h3>Semester Duration:</h3> <?php echo $ss112['SemesterDuration'];?></span>
								</div>
							</div>
							<?php
						endforeach;
						?>
                </div>
			</div>
		</div>
	</div>
</div>