<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('pay_heads');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_new_pay_head');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
	
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <div class="row-fluid data_grade_system" id="second_part">

                    <div class="row-fluid" style="margin-top: 15px;">
                                                    
                                                    
                        <table id="sample-table-121" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr><th>Sl</th>
                                <th>Pay Head</th>           
                                <th>Pay Head Value</th>
                                <th>Pay Calculate Type</th>
                                <th>Pay Type</th>
                                <th>Transaction Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr></thead>
                            <tbody>
                                
                                            
                            </tbody>    

                        </table>
                    </div>
                    <script type="text/javascript"> 
                    // var oTable2 = $('#sample-table-121').dataTable( {
                    // "aoColumns": [
                    //   { "bSortable": true },
                    //   null, null,null, null,null,
                    //   { "bSortable": true }
                    // ] } );
                                    
                    </script></div>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <form class="form-vertical">
     <input type="hidden" id="branchid" name="branchid" value="69">
       
<legend>Pay Head Settings</legend>

    <div class="row-fluid">
        
        <div class="span6">
            <div class="control-group">
                <label class="control-label" for="form-field-1">PayRoll Head Create for:</label>            
            </div>

            <div class="control-group">
                <div class="controls">
                    <label style="float: left; padding-right: 20px;">
                        <input onclick="call_btn_only(this.value)" name="br_type" type="radio" value="only" checked="">
                        <span class="lbl"> Only This Branch</span>
                    </label>

                    <label style="float: left;">
                        <input onclick="call_btn_all(this.value)" name="br_type" type="radio" value="all">
                        <span class="lbl"> All Branch of Institute</span>
                    </label>
                </div>
            </div>
        </div>

    </div>



<div class="row-fluid">
    
    <div class="span3">
        <div class="control-group">
            <label class="control-label" for="form-field-1">Pay Head Name<font color="#FF0000">*</font></label>
            <div class="controls">
                <input name="p_name" id="p_name" type="text">
            </div>
        </div>
    </div>

    <div class="span3">
        <div class="control-group">
            <label class="control-label" for="form-field-1">Pay Head Value <font color="#FF0000">*</font></label>
            <div class="controls">
                <input name="p_value" id="p_value" type="text">
            </div>
        </div>
    </div>

    <div class="span3">
        <div class="control-group">
            <label class="control-label" for="form-field-1">Pay Calculate Type<font color="#FF0000">*</font></label>
            <div class="controls">
             <select name="p_type" id="p_type">
                    <option value="">- - - - -</option>
                    <option value="F">Fixed</option>
                    <option value="P">Percentage</option>
                    
                </select>
            
            
                <!--<input name="p_type" id="p_type" type="text">-->
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="control-group">
            <label class="control-label" for="form-field-1">Pay Type<font color="#FF0000">*</font></label>
            <div class="controls">
             <select id="pay_type">
                    <option value="">- - - - -</option>
                    <option value="G">General</option>
                    <option value="I">Individual</option>
                    <option value="F">Festival</option>
                </select>
            </div>
        </div>
    </div>  

</div>


<!-- =============================== -->

<div class="row-fluid">

    <div class="span3">
        <div class="control-group">
            <label class="control-label" for="form-field-1">Transaction Type<font color="#FF0000">*</font></label>
            <div class="controls">
             <select id="head_type">
                    <option value="">- - - - -</option>
                    <option value="C">Credit(+)</option>
                    <option value="D">Debit(-)</option>
                </select>
            </div>
        </div>
    </div>

</div>



<!-- ========= -->

    <div class="row-fluid">
        
        <div class="span4">             
            <div class="control-group">
                
                <div class="controls">
                    <button onclick="call_save('only')" class="btn btn-small btn-success btn_only" type="button" style=" display: block;">
                        <i class="icon-ok bigger-100"></i>
                        Save
                    </button>

                    <button onclick="call_save('all')" class="btn btn-small btn-success btn_all" type="button" style=" display: none;">
                        <i class="icon-ok bigger-100"></i>
                        Save
                    </button>
                </div>

            </div>
        </div>
        
    </div>  

    </form>
			</div>
			<!----CREATION FORM ENDS-->
            
		</div>
	</div>
</div>