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
                            <th><div><?php echo get_phrase('course_name');?></div></th>
                            <th><div><?php echo get_phrase('course_code');?></div></th>
                            <th><div><?php echo get_phrase('credit_hours');?></div></th>
                            <th><div><?php echo get_phrase('semester');?></div></th>
                            <th><div><?php echo get_phrase('year');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo "1"?></td>
                            <td><?php echo "Technology in Business Systems";?></td>
                            <td><?php echo "SYS115";?></td>
                            <td><?php echo "3";?></td>
                            <td><?php echo "Fall Semester";?></td>
                            <td><?php echo "2016";?></td>
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
                            <td><?php echo "Programming Logic and Design";?></td>
                            <td><?php echo "PRGM111";?></td>
                            <td><?php echo "4";?></td>
                            <td><?php echo "Fall Semester";?></td>
                            <td><?php echo "2016";?></td>
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
                        <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                        <div class="col-sm-5">
                            <select name="" id="" class="form-control">
                                <option value="">Technology in Business Systems</option>
                                <option value="">Programming Logic and Design</option>
                                <option value="">Computer Algorithm</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('course_code');?></label>
                        <div class="col-sm-5">
                            <select name="" id="" class="form-control">
                                <option value="">SYS115</option>
                                <option value="">PRGM111</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('credit_hours');?></label>
                        <div class="col-sm-5">
                            <select name="" id="" class="form-control">
                                <option value="">3</option>
                                <option value="">3.5</option>
                                <option value="">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('semester');?></label>
                        <div class="col-sm-5">
                            <select name="" id="" class="form-control">
                                <option value="">Summer</option>
                                <option value="">Winter</option>
                                <option value="">Autumn</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                        <div class="col-sm-5">
                            <select name="" id="" class="form-control">
                                <option value="">2012</option>
                                <option value="">2013</option>
                                <option value="">2014</option>
                                <option value="">2015</option>
                                <option value="">2016</option>
                                <option value="">2017</option>
                                <option value="">2018</option>
                                <option value="">2019</option>
                                <option value="">2020</option>
                            </select>
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