<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('event_name');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_record');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('event_name');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
                            <th><div><?php echo get_phrase('day');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo date('d/m/Y',strtotime($row['strt_dt']));//echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);?></td>
                            <td><?php echo $row['end_dt'];?></td>
                            <td>
                              <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_academic_calendar/<?php echo $row['id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                            &nbsp;  &nbsp;  &nbsp;
                                              <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/academic_calendar/delete/<?php echo $row['id'];?>');">
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
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_academic_calendar/<?php echo $row['id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>-->
                                    
                                    <!-- DELETION LINK -->
                                   <!-- <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/academic_calendar/delete/<?php echo $row['id'];?>');">
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
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/academic_calendar/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('department_name');?></label>
                                <div class="col-sm-5">
                                    <select name="course_program" class="form-control">
                                        <option value="#"><?php echo get_phrase('select');?></option>
                                        <?php
                                        $course_program = $this->db->get('course_program')->result_array();
                                        foreach($course_program as $row12):
                                            ?>
                                            <option value="<?php echo $row12['id'];?>">
                                                <?php echo $row12['course_name'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('course/class/exam_name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" placeholder="Ist Year BBA - Ist Semester" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('session');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" placeholder="2015-2016" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('academic_year');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" placeholder="Jan 2016 - Dec 2016" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('class_start_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="name" placeholder="10-01-2016" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('class_end_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="name" placeholder="20-04-2016" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('in-course/mid-term_exam_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="name" placeholder="06-03-2016" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('field_work');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" placeholder=" - "/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('exam_start_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="name" placeholder="22-05-2016" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('exam_end_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="name" placeholder="31-05-2016" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_academic_calendar');?></button>
                              </div>
							</div>
                    </form>                
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
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>