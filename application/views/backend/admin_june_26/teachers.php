<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('teachers');?>
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
                    <tr role="row"><th width="80" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="photo: activate to sort column descending" style="width: 40px;"><div>photo</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="name: activate to sort column ascending" style="width: 296px;"><div>name</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="email: activate to sort column ascending" style="width: 314px;"><div>email</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="options: activate to sort column ascending" style="width: 178px;"><div>options</div></th></tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                        <td class=" sorting_1"><img src="http://localhost/pundro/uploads/user.jpg" class="img-circle" width="30"></td>
                        <td class=" ">Teacher</td>
                        <td class=" ">teacher@example.com</td>
                        <td class=" ">

                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- teacher EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('http://localhost/pundro/index.php?modal/popup/modal_teacher_edit/2');">
                                            <i class="entypo-pencil"></i>
                                            edit                                               	</a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- teacher DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('http://localhost/pundro/index.php?admin/teacher/delete/2');">
                                            <i class="entypo-trash"></i>
                                            delete                                               	</a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr><tr class="even">
                        <td class=" sorting_1"><img src="http://localhost/pundro/uploads/user.jpg" class="img-circle" width="30"></td>
                        <td class=" ">Rakib Ahmed</td>
                        <td class=" ">rakib@gmail.com</td>
                        <td class=" ">

                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- teacher EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('http://localhost/pundro/index.php?modal/popup/modal_teacher_edit/3');">
                                            <i class="entypo-pencil"></i>
                                            edit                                               	</a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- teacher DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('http://localhost/pundro/index.php?admin/teacher/delete/3');">
                                            <i class="entypo-trash"></i>
                                            delete                                               	</a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr><tr class="odd">
                        <td class=" sorting_1"><img src="http://localhost/pundro/uploads/user.jpg" class="img-circle" width="30"></td>
                        <td class=" ">Fahima Akhter</td>
                        <td class=" ">fahima@gmail.com</td>
                        <td class=" ">

                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- teacher EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('http://localhost/pundro/index.php?modal/popup/modal_teacher_edit/4');">
                                            <i class="entypo-pencil"></i>
                                            edit                                               	</a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- teacher DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('http://localhost/pundro/index.php?admin/teacher/delete/4');">
                                            <i class="entypo-trash"></i>
                                            delete                                               	</a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr><tr class="even">
                        <td class=" sorting_1"><img src="http://localhost/pundro/uploads/user.jpg" class="img-circle" width="30"></td>
                        <td class=" ">Tahmida Akhter daijy</td>
                        <td class=" ">tahmida@gmail.com</td>
                        <td class=" ">

                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- teacher EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('http://localhost/pundro/index.php?modal/popup/modal_teacher_edit/5');">
                                            <i class="entypo-pencil"></i>
                                            edit                                               	</a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- teacher DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('http://localhost/pundro/index.php?admin/teacher/delete/5');">
                                            <i class="entypo-trash"></i>
                                            delete                                               	</a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr><tr class="odd">
                        <td class=" sorting_1"><img src="http://localhost/pundro/uploads/user.jpg" class="img-circle" width="30"></td>
                        <td class=" ">Rasel Ahmed</td>
                        <td class=" ">rasel@gmail.com</td>
                        <td class=" ">

                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- teacher EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('http://localhost/pundro/index.php?modal/popup/modal_teacher_edit/6');">
                                            <i class="entypo-pencil"></i>
                                            edit                                               	</a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- teacher DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('http://localhost/pundro/index.php?admin/teacher/delete/6');">
                                            <i class="entypo-trash"></i>
                                            delete                                               	</a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr><tr class="even">
                        <td class=" sorting_1"><img src="http://localhost/pundro/uploads/user.jpg" class="img-circle" width="30"></td>
                        <td class=" ">Afroja Begum Ranima</td>
                        <td class=" ">afroja@gmail.com</td>
                        <td class=" ">

                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- teacher EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('http://localhost/pundro/index.php?modal/popup/modal_teacher_edit/7');">
                                            <i class="entypo-pencil"></i>
                                            edit                                               	</a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- teacher DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('http://localhost/pundro/index.php?admin/teacher/delete/7');">
                                            <i class="entypo-trash"></i>
                                            delete                                               	</a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr></tbody>
                </table>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <form action="http://localhost/pundro/index.php?admin/teacher/create/" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">name</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required" value="" autofocus="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label">birthday</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control datepicker" name="birthday" value="" data-start-view="2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label">Gender</label>

                            <div class="col-sm-5">
                                <select name="sex" class="form-control">
                                    <option value="">Select</option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label">address</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="address" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label">phone</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="phone" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">email</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label">password</label>

                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">photo</label>

                            <div class="col-sm-5">
                                <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                        <img src="http://placehold.it/200x200" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 8px;"></div>
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

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">add teacher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>