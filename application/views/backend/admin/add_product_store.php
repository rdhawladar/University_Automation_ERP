<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('product_lists');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_product');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
	
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('name');?></div></th>
                    		<th><div><?php echo get_phrase('type');?></div></th>
                    		<th><div><?php echo get_phrase('category');?></div></th>
                    		<th><div><?php echo get_phrase('model');?></div></th>
                    		<th><div><?php echo get_phrase('quantity');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
                    		<th><div><?php echo get_phrase('serial_number');?></div></th>
                    		<th><div><?php echo get_phrase('asset_state');?></div></th>
                    		<th><div><?php echo get_phrase('purchase_cost');?></div></th>
                    		<th><div><?php echo get_phrase('device_serial_number');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    <tr>
                        <td><?php echo "1"?></td>
                        <td><?php echo "Printer Machine";?></td>
                        <td><?php echo "IT Assets";?></td>
                        <td><?php echo "Printer";?></td>
                        <td><?php echo "Model-3923wd";?></td>
                        <td><?php echo "100";?></td>
                        <td><?php echo "01-03-2016";?></td>
                        <td><?php echo "printer-2424";?></td>
                        <td><?php echo "In Store";?></td>
                        <td><?php echo "3200";?></td>
                        <td><?php echo "HP-2842y348";?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_notice/<?php echo $row['notice_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                            <?php echo get_phrase('edit');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/noticeboard/delete/<?php echo $row['notice_id'];?>');">
                                            <i class="entypo-trash"></i>
                                            <?php echo get_phrase('delete');?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/noticeboard/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('type');?></label>
                        <div class="col-sm-5">
                            <select name="" id="">
                                <option value="">IT Assets</option>
                                <option value="">Virtual Host and VMs</option>
                                <option value="">Non IT Assets</option>
                                <option value="">Asset Components</option>
                                <option value="">Software</option>
                                <option value="">Barcode</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('category');?></label>
                        <div class="col-sm-5">
                            <select name="" id="">
                                <option value="">Access Point</option>
                                <option value="">Virtual Host</option>
                                <option value="">Projectors</option>
                                <option value="">Chairs</option>
                                <option value="">Scanned Software</option>
                                <option value="">Barcode Generation</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('model');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('quantity');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('serial_number');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('asset_state');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('purchase_cost');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('device_serial_number');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add');?></button>
                        </div>
                    </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS-->
            
		</div>
	</div>
</div>