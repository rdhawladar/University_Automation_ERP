<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('vehicles_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_vehicle');?>
                    	</a></li>

            <li>
                <a href="#fuel" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_fuel');?>
                </a></li>
            <li>
                <a href="#reading" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_reading');?>
                </a></li>
            <li>
                <a href="#driverslist" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('drivers_list');?>
                </a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
	
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box" id="driverslist">
                <table class="table table-bordered datatable dataTable" id="table_export" aria-describedby="table_export_info">
                    <thead>
                    <tr role="row">
                        <th style="width: 162px;"><div>Driver ID</div></th>
                        <th style="width: 127px;"><div>Driver Name</div></th>
                        <th style="width: 77px;"><div>options</div></th></tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                        <td class=" sorting_1">PUST003</td>
                        <td class=" ">Mr. Fazle Kabir</td>
                        <td class=" ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="entypo-pencil"></i>
                                            edit                                            </a>
                                    </li>
                                    <li class="divider"></li>
                                    <a href="#">
                                        <i class="entypo-trash"></i>
                                        delete                                            </a>

                                </ul>
                            </div>
                        </td>
                    </tr><tr class="even">
                        <td class=" sorting_1">PUST005</td>
                        <td class=" ">Mr.Roton Kumar</td>
                        <td class=" ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <a href="#">
                                        <i class="entypo-pencil"></i>
                                        edit                                            </a>

                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="entypo-trash"></i>
                                            delete                                            </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr></tbody></table>
            </div>
            <div class="tab-pane box <?php if(!isset($edit_data))echo 'active';?>" id="list">
                <table class="table table-bordered datatable dataTable" id="table_export" aria-describedby="table_export_info">
                    <thead>
                    <tr role="row">
                        <th style="width: 162px;"><div>Vehicle name</div></th>
                        <th style="width: 127px;"><div>Vehicle Number</div></th>
                        <th style="width: 77px;"><div>options</div></th></tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                        <td class=" sorting_1">PUST87624</td>
                        <td class=" ">87624</td>
                        <td class=" ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="entypo-pencil"></i>
                                            edit                                            </a>
                                    </li>
                                    <li class="divider"></li>
                                    <a href="#">
                                        <i class="entypo-trash"></i>
                                        delete                                            </a>

                                </ul>
                            </div>
                        </td>
                    </tr><tr class="even">
                        <td class=" sorting_1">PUST2424352</td>
                        <td class=" ">2424352</td>
                        <td class=" ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <a href="#">
                                        <i class="entypo-pencil"></i>
                                        edit                                            </a>

                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="entypo-trash"></i>
                                            delete                                            </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr></tbody></table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <form action="#" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Vehicle Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Vehicle Number</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="strt_dt">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
			<!----CREATION FORM ENDS-->

            <div class="tab-pane box" id="fuel" style="padding: 5px">
                <form action="#" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Vehicle</label>
                            <div class="col-sm-5">
                                <select name="" id="" class="form-control">
                                    <option value="Vehicle1">Vehicle1</option>
                                    <option value="Vehicle2">Vehicle2</option>
                                    <option value="Vehicle3">Vehicle3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Quantity</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Rate Per Liter</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Date</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Receipt No.</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Remarks</label>
                            <div class="col-sm-5">
                                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p>&nbsp;</p>
                <table class="table table-bordered datatable dataTable" id="table_export" aria-describedby="table_export_info">
                    <thead>
                    <tr role="row">
                        <th style="width: 162px;"><div>Vehicle</div></th>
                        <th style="width: 127px;"><div>Quantity</div></th>
                        <th style="width: 127px;"><div>Rate Per Litre</div></th>
                        <th style="width: 127px;"><div>Date</div></th>
                        <th style="width: 127px;"><div>Receipt No.</div></th>
                        <th style="width: 127px;"><div>Remarks</div></th>
                        <th style="width: 77px;"><div>options</div></th></tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <tr class="odd">
                        <td class=" sorting_1">Pust398271</td>
                        <td class=" ">10 Litres</td>
                        <td class=" ">68</td>
                        <td class=" ">01-04-2016</td>
                        <td class=" ">Megna-2342</td>
                        <td class=" ">OK</td>
                        <td class=" ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="entypo-pencil"></i>
                                            edit                                            </a>
                                    </li>
                                    <li class="divider"></li>
                                    <a href="#">
                                        <i class="entypo-trash"></i>
                                        delete                                            </a>

                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class=" sorting_1">Pust178271</td>
                        <td class=" ">50 Litres</td>
                        <td class=" ">68</td>
                        <td class=" ">01-05-2016</td>
                        <td class=" ">Megna-2342</td>
                        <td class=" ">OK</td>
                        <td class=" ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="entypo-pencil"></i>
                                            edit                                            </a>
                                    </li>
                                    <li class="divider"></li>
                                    <a href="#">
                                        <i class="entypo-trash"></i>
                                        delete                                            </a>

                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>
            </div>

            <div class="tab-pane box" id="reading" style="padding: 5px">
                <form action="#" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Vehicle</label>
                            <div class="col-sm-5">
                                <select name="" id="" class="form-control">
                                    <option value="Vehicle1">Vehicle1</option>
                                    <option value="Vehicle2">Vehicle2</option>
                                    <option value="Vehicle3">Vehicle3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Reading</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Date</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Remarks</label>
                            <div class="col-sm-5">
                                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p>&nbsp;</p>
                <table class="table table-bordered datatable dataTable" id="table_export" aria-describedby="table_export_info">
                    <thead>
                    <tr role="row">
                        <th style="width: 162px;"><div>Vehicle</div></th>
                        <th style="width: 127px;"><div>Reading</div></th>
                        <th style="width: 127px;"><div>Date</div></th>
                        <th style="width: 127px;"><div>Remarks</div></th>
                        <th style="width: 77px;"><div>options</div></th></tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <tr class="odd">
                        <td class=" sorting_1">Pust398271</td>
                        <td class=" ">34244</td>
                        <td class=" ">01-04-2016</td>
                        <td class=" ">OK</td>
                        <td class=" ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="entypo-pencil"></i>
                                            edit                                            </a>
                                    </li>
                                    <li class="divider"></li>
                                    <a href="#">
                                        <i class="entypo-trash"></i>
                                        delete                                            </a>

                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class=" sorting_1">Pust178271</td>
                        <td class=" ">2335342</td>
                        <td class=" ">01-05-2016</td>
                        <td class=" ">OK</td>
                        <td class=" ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="entypo-pencil"></i>
                                            edit                                            </a>
                                    </li>
                                    <li class="divider"></li>
                                    <a href="#">
                                        <i class="entypo-trash"></i>
                                        delete                                            </a>

                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>
            </div>
		</div>
	</div>
</div>