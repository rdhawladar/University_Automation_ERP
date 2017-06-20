<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('application_research');?>
                        </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_new_record');?>
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
                            <th><div><?php echo get_phrase('student_id');?></div></th>
                            <th><div><?php echo get_phrase('research_grants_topic');?></div></th>
                            <th><div><?php echo get_phrase('research_grants_description');?></div></th>
                            <th><div><?php echo get_phrase('supervisor');?></div></th>
                            <th><div><?php echo get_phrase('start_date');?></div></th>
                            <th><div><?php echo get_phrase('end_date');?></div></th>
                            <th><div><?php echo get_phrase('status');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo "1"?></td>
                            <td><?php echo "CSE002, CSE003,CSE004";?></td>
                            <td><?php echo "Robotic Research";?></td>
                            <td><?php echo "Robotic Research, LLC is a small engineering firm committed to finding innovative, cost-effective solutions in the areas of robotics, intelligent control, sensor processing and specialized computer programming. Robotic Research engineers design, develop, and test state-of-the-art autonomous mobility software.";?></td>
                            <td><?php echo "Md. Fazlur Rahman";?></td>
                            <td><?php echo "01-03-2016";?></td>
                            <td><?php echo "01-03-2017";?></td>
                            <td><?php echo "yes";?></td>
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
                        <tr>
                            <td><?php echo "2"?></td>
                            <td><?php echo "CSE212, CSE233,CSE504";?></td>
                            <td><?php echo "Research on Robotic";?></td>
                            <td><?php echo "Research on Robotic, LLC is a small engineering firm committed to finding innovative, cost-effective solutions in the areas of robotics, intelligent control, sensor processing and specialized computer programming. Robotic Research engineers design, develop, and test state-of-the-art autonomous mobility software.";?></td>
                            <td><?php echo "Prof Ar. M.H.M. Shahjahan ";?></td>
                            <td><?php echo "01-03-2016";?></td>
                            <td><?php echo "01-03-2017";?></td>
                            <td><?php echo "yes";?></td>
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
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/noticeboard/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('student_id');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title" style="margin-bottom: 5px;"/>
                            <input type="text" class="form-control" name="notice_title" style="margin-bottom: 5px;"/>
                            <input type="text" class="form-control" name="notice_title" style="margin-bottom: 5px;"/>
                            <input type="text" class="form-control" name="notice_title" style="margin-bottom: 5px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('research_grants_topic');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('research_grants_description');?></label>
                        <div class="col-sm-5">
                            <textarea class="form-control" name="notice_title"/> </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('research_grants_reference');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title"/>
                            <input type="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('supervisor');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('start_date');?></label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('end_date');?></label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                        <div class="col-sm-5">
                            <select name="" id="">
                                <option value="">Yes</option>
                                <option value="">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('research_grants_request');?></button>
                        </div>
                    </div>
                    </form>                
                </div>                
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>