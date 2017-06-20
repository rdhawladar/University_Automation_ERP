<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('applications_program');?>
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
                            <th><div><?php echo get_phrase('current_program');?></div></th>
                            <th><div><?php echo get_phrase('interested_program');?></div></th>
                            <th><div><?php echo get_phrase('note');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo "1"?></td>
                            <td><?php echo "0407001";?></td>
                            <td><?php echo "CSE";?></td>
                            <td><?php echo "EEE";?></td>
                            <td><?php echo "Note Details-1";?></td>
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
                            <td><?php echo "0407003";?></td>
                            <td><?php echo "EEE";?></td>
                            <td><?php echo "ETC";?></td>
                            <td><?php echo "Note Details-2";?></td>
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
                            <label class="col-sm-3 control-label"><?php echo get_phrase('student_ID');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="notice_title"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('current_program');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="notice_title"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('interested_program');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="notice_title"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
                            </div>
                        </div>
                    </form>                
                </div>                
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>