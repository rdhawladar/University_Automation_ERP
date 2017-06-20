<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('add_product_type_store');?>
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
                            <th><div><?php echo get_phrase('type_name');?></div></th>
                            <th><div><?php echo get_phrase('description');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo "1"?></td>
                            <td><?php echo "IT Assets";?></td>
                            <td><?php echo "IT Stock & Storage";?></td>
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
                            <td><?php echo "Virtual Host and VMs";?></td>
                            <td><?php echo "Virtual Host and VMs Stock & Storage";?></td>
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
                            <td><?php echo "3"?></td>
                            <td><?php echo "Non IT Assets";?></td>
                            <td><?php echo "Non IT Assets Stock & Storage";?></td>
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
                            <td><?php echo "4"?></td>
                            <td><?php echo "Asset Components";?></td>
                            <td><?php echo "Asset Components Stock & Storage";?></td>
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
                            <td><?php echo "5"?></td>
                            <td><?php echo "Software";?></td>
                            <td><?php echo "Software Stock & Storage";?></td>
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
                            <td><?php echo "6"?></td>
                            <td><?php echo "Barcode";?></td>
                            <td><?php echo "Barcode Stock & Storage";?></td>
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
                    <form class="form-vertical">
                        <legend>Add Product Type</legend>
                        <div class="row-fluid">
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1">Type Name<font color="#FF0000">*</font></label>

                                        <div class="controls">
                                            <input type="text" class="small" id="type_name">
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="control-group">
                                                <label class="control-label" for="form-field-1">Description<font color="#FF0000">*</font></label>

                                                <div class="controls">

                                                    <textarea class="small" rows="5" id="desc"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">


                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1">&nbsp;</label>

                                        <div class="controls">
                                            <button class="btn btn-small btn-success" type="button" id="btn_save">
                                                <i class="icon-ok bigger-100"></i>
                                                Save
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-small btn-danger" type="reset" id="btn_reset">
                                                <i class="icon-undo bigger-100"></i>
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>