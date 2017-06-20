<div class="row">
	<div class="col-md-12">
         <?php

		$today = date('Y-m-d');
		$data = $this->db->get_where('acd_session' , array('is_open' => 1, 'strt_dt <= ' => $today,'end_dt >= ' => $today))->result_array();
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic Session - ".$data[0]['name'];
		   ?>
    <p>&nbsp;</p>
		<ul class="nav nav-tabs bordered">

            <li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('student_application_list');?>
                </a>
            </li>
        	<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_student');?>
                </a>
            </li>
		</ul>
		<div class="tab-content">
            <div class="tab-pane box active onad" id="list">
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                             <!--<th width="80"><div><?php /*echo get_phrase('Photo');*/?></div></th>-->
                    		<th><div><?php echo get_phrase('ID');?></div></th>
                    		<th><div><?php echo get_phrase('photo');?></div></th>
                    		<th><div><?php echo get_phrase('Name');?></div></th>
                    		<th><div><?php echo get_phrase('father_name');?></div></th>
                    		<th><div><?php echo get_phrase('mother_name');?></div></th>
                    		<th><div><?php echo get_phrase('national_id_no');?></div></th>
                    		<th><div><?php echo get_phrase('birth_certificate_no');?></div></th>
                    		<th><div><?php echo get_phrase('birthday');?></div></th>
                    		<th><div><?php echo get_phrase('gender');?></div></th>
                    		<th><div><?php echo get_phrase('phone');?></div></th>
                    		<th><div><?php echo get_phrase('email');?></div></th>
                    		<th><div><?php echo get_phrase('district_name');?></div></th>
                    		<th><div><?php echo get_phrase('division_name');?></div></th>
                    		<th><div><?php echo get_phrase('Applied_for');?></div></th>
                    		<th><div><?php echo get_phrase('SSC');?></div></th>
                    		<th><div><?php echo get_phrase('institute_name');?></div></th>
                    		<th><div><?php echo get_phrase('SSC_marksheet');?></div></th>
                    		<th><div><?php echo get_phrase('SSC_certificate');?></div></th>
                    		<th><div><?php echo get_phrase('HSC');?></div></th>
                    		<th><div><?php echo get_phrase('institute_name');?></div></th>
                    		<th><div><?php echo get_phrase('HSC_marksheet');?></div></th>
                    		<th><div><?php echo get_phrase('HSC_certificate');?></div></th>
                    		<th><div><?php echo get_phrase('total_gpa');?></div></th>
                    		<th style="display:none;"><div><?php echo get_phrase('Actions');?></div></th>
                           
						</tr>
					</thead>
                    <tbody>
                    <?php

                    ?>
                    	<?php $count = 1;foreach($osadStudent as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>

							<td><?php echo $row['id'];?></td>
							<td><a target="_blank" href="<?php echo "uploads/student_image/".$row[photo]; ?>"><img src="<?php echo "uploads/student_image/".$row[photo]; ?>" width="30" height="30" /></a></td>
							<td><?php echo $row['name_en'];?></td>
							<td><?php echo $row['father_name'];?></td>
							<td><?php echo $row['mother_name'];?></td>
							<td><?php echo $row['national_id_no'];?></td>
							<td><?php echo $row['birth_certificate_no'];?></td>
							<td><?php echo $row['birthday'];?></td>
							<td><?php echo $row['sex'];?></td>
							<td><?php echo $row['phone'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['district_name'];?></td>
							<td><?php echo $row['division_name'];?></td>
							<td><?php echo $row['first_choice'].", ".$row['second_choice'];?></td>
							<td><?php echo $row['ssc_result'];?></td>
							<td><?php echo $row['institute_name_1'];?></td>
							<td><a target="_blank" href="<?php echo "uploads/student_image/".$row[marksheet1]; ?>"><img src="<?php echo "uploads/student_image/".$row[marksheet1]; ?>" width="30" height="30" /></a></td>
							<td><a target="_blank" href="<?php echo "uploads/student_image/".$row[certificate1]; ?>"><img src="<?php echo "uploads/student_image/".$row[certificate1]; ?>" width="30" height="30" /></a></td>
							<td><?php echo $row['hsc_result'];?></td>
							<td><?php echo $row['institute_name_2'];?></td>
							<td><a target="_blank" href="<?php echo "uploads/student_image/".$row[marksheet2]; ?>"><img src="<?php echo "uploads/student_image/".$row[marksheet2]; ?>" width="30" height="30" /></a></td>
							<td><a target="_blank" href="<?php echo "uploads/student_image/".$row[certificate2]; ?>"><img src="<?php echo "uploads/student_image/".$row[certificate2]; ?>" width="30" height="30" /></a></td>
                            <td><?php echo $row['total_gpa'];?></td>
                            <!--<td>
                                <?php
/*                                $acd_quali = $this->db->where('osad_student_id',$row['id']);
                                $acd_quali = $this->db->get('osad_acd_history')->result_array();
                                foreach($acd_quali as $row13):
                                    */?>
                                    <div style=" float: left;border: 1px solid #cccccc; padding: 5%;"><?php /*echo $row13['special_mark'];*/?></div>
                                    <?php
/*                                endforeach;
                                */?>
                            </td>-->
                            <!--<td>
                                <?php
/*                                $query = $this->db->select_sum('special_mark');
                                $query = $this->db->from('osad_acd_history');
                                $query = $this->db->where('osad_student_id', $row['id']);
                                $query = $this->db->get()->result_array();
                                foreach($query as $row4):
                                    echo $row4['special_mark'];
                                endforeach;
                                */?>
                            </td>-->
							<!--<td><?php /*echo $row['pay_status'];*/?></td>-->
							<!--<td><?php /*echo date('d/m/Y',strtotime($row['app_date']));//echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);*/?></td>-->
							<td style="display:none;">

                                                          <a href="<?php echo base_url();?>index.php?admin/osadStudRept/<?php echo $row['id'];?>" target="_blank">
                                            <i class="entypo-doc-text-inv"></i>
                                                <?php echo get_phrase('Report');?>
                                            </a>

                              <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_online_adm/<?php echo $row['id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                            &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_online_adm_profile/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('profile');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                              <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/online_admission/delete/<?php echo $row['id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
              <!--              <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- EDITING LINK -->
                         <!--           <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_acd_session/<?php echo $row['id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>-->

                                    <!-- DELETION LINK -->
                                   <!-- <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/acd_session/delete/<?php echo $row['id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>-->
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
			<div class="tab-pane box onad" id="add">
             <br />
                <div class="box-content">
                <?php if(count($data)>0){?>
                	<?php echo form_open(base_url() . 'index.php?admin/online_admission/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top','enctype'=>'multipart/form-data'));?>

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
				      </div>
                      <br />
                        <div class="form-group test32">
	<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
		   </div>
					<div class="col-md-4">
                        <div class="form-group">
						<label for="field-1" class="col-sm-5"><?php echo get_phrase('photo');?></label>
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
					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('cerfificate1');?></label>
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
										<input type="file" name="certificate1" accept="image/*">
									</span>
										<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('certificate2');?></label>
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
										<input type="file" name="certificate2" accept="image/*">
									</span>
										<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('marksheet1');?></label>
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
										<input type="file" name="marksheet1" accept="image/*">
									</span>
										<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="field-1" class="col-sm-5"><?php echo get_phrase('marksheet2');?></label>
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
										<input type="file" name="marksheet2" accept="image/*">
									</span>
										<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
						</div>
					</div>
                        <div class="form-group test32">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('admission');?></button>
                              </div>
							</div>
                    </form> 
                    <?php } else {?>
                    
                           
      
                  <p style="color:#FF0000; font-size:24px">          
	              Admission Closed 
                   </p>
			  
							
                    <?php }?>               
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