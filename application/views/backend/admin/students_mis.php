<div class="row">
    <div class="col-md-12">
        <div id="content">

                  
<div class="box searchForm toggableForm" id="employee-information">
    <div class="head">
        <h1>Student Information</h1>
    </div>
    <div class="inner">
        <form id="search_form" name="frmEmployeeSearch" method="post" action="/hrm/symfony/web/index.php/pim/viewEmployeeList">
            <fieldset>
                <ol>
                    <li><label for="empsearch_employee_name">Year</label>
                        <select name="" id="" class="form-control">
                            <option value="">Please Select</option>
                            <option value="">2011</option>
                            <option value="">2012</option>
                            <option value="">2013</option>
                            <option value="">2014</option>
                            <option value="">2015</option>
                            <option value="">2016</option>
                        </select>
                    </li>
                    <li><label for="empsearch_employee_name">Faculty Name</label>
                        <select name="" id="" class="form-control">
                            <option value="">Please Select</option>
                            <option value="">Science & Engineering</option>
                            <option value="">Business Studies</option>
                            <option value="">Arts & Humanities</option>
                            <option value="">Social Science</option>
                            <option value="">Islamic Studies</option>
                            <option value="">Law</option>
                        </select>
                    </li>
                    <li><label for="empsearch_employee_name">Program Name</label>
                        <select name="" id="" class="form-control">
                            <option value="">Please Select</option>
                            <option value="">Computer Science & Engineering</option>
                            <option value="">Electrical & Electronic Engineering</option>
                            <option value="">BBA</option>
                            <option value="">MBA</option>
                            <option value="">EMBA</option>
                            <option value="">English</option>
                            <option value="">Economics</option>
                            <option value="">Sociology</option>
                        </select>
                    </li>
                    <li><label for="empsearch_termination">Batch</label>
                      <select name="empsearch[termination]" id="empsearch_termination">
                          <option value="">Please Select</option>
                          <option value="1">Batch-001</option>
                            <option value="2">Batch-002</option>
                            <option value="3">Batch-003</option>
                            <option value="3">Batch-004</option>
                            <option value="3">Batch-005</option>
                            <option value="3">Batch-006</option>
                            <option value="3">Batch-007</option>
                            <option value="3">Batch-008</option>
                            <option value="3">Batch-009</option>
                            <option value="3">Batch-010</option>
                      </select>
                    </li>
                                        <li><label for="empsearch_employee_name">Student Name</label>
                                            <select name="empsearch[termination]" id="empsearch_termination">
                                                <option value="">Please Select</option>
                                                <option value="1">Riadul Islam</option>
                                                <option value="2">Shishir Chowdhury</option>
                                                <option value="3">Sujon Ahmed</option>
                                                <option value="3">Sajedul Pavel</option>
                                                <option value="3">Nayon Sarkar</option>
                                                <option value="3">Prodip Das</option>
                                                <option value="3">Shah Alam</option>
                                                <option value="3">Sajeda Akhtar</option>
                                            </select>

                    </li>
                    <li><label for="empsearch_id">Student Roll</label>
                        <select name="empsearch[termination]" id="empsearch_termination">
                            <option value="">Please Select</option>
                            <option value="1">0107001</option>
                            <option value="2">0107002</option>
                            <option value="2">0107003</option>
                            <option value="2">0107004</option>
                            <option value="2">0107005</option>
                            <option value="2">0107006</option>
                            <option value="2">0107007</option>
                            <option value="2">0107008</option>
                            <option value="2">0107009</option>
                            <option value="2">0107010</option>
                        </select>
                    </li>
                    <li><label for="empsearch_employee_status">Student Status</label>
                      <select name="empsearch[employee_status]" id="empsearch_employee_status">
                          <option value="">Please Select</option>
                          <option value="0">All</option>
                        <option>Regular</option>
                        <option>Irregular</option>
                    </select>
                    </li>
                </ol>
                <p>
                    <input type="button" id="searchBtn" value="Search" name="_search" class="">
                    <input type="button" class="reset" id="resetBtn" value="Reset" name="_reset">                    
                </p>

            </fieldset>

        </form>

    </div> <!-- inner -->

    <a href="#" class="toggle tiptip">&gt;</a>

</div> <!-- employee-information -->

<div class="box noHeader" id="search-results">
    
        
    <div class="inner">
    

                
            
    <form method="post" action="/hrm/symfony/web/index.php/pim/deleteEmployees" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
        <input type="hidden" name="defaultList[_csrf_token]" value="8c7cc68d5da2a88eec9d5d5cc9c9fb46" id="defaultList__csrf_token">        
 <div class="top">          
        

        <input type="button" class="" id="btnAdd" name="btnAdd" value="Add">
<input type="submit" class="delete" id="btnDelete" name="btnDelete" value="Delete" data-toggle="modal" data-target="#deleteConfModal" disabled="disabled">

 </div> <!-- top --> 

         

        


         
        <div id="helpText" class="helpText"></div>

        <div id="scrollWrapper">
            <div id="scrollContainer">
            </div>
        </div>        
        <div id="tableWrapper">
        <table class="table hover" id="resultTable">
            <thead>
                <tr>
                    <th rowspan="1" class="checkbox-col"><input type="checkbox" id="ohrmList_chkSelectAll" name="chkSelectAll" value=""></th>
                    <th rowspan="1" style="width:5%" class="header"><a href="#employeeId&amp;sortOrder=ASC" class="null">Id</a></th>
                    <th rowspan="1" style="width:13%" class="header"><a href="#firstMiddleName&amp;sortOrder=ASC" class="null">First (&amp; Middle) Name</a></th>
                    <th rowspan="1" style="width:10%" class="header"><a href="#lastName&amp;sortOrder=ASC" class="null">Last Name</a></th>
                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Year</a></th>
                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Faculty</a></th>
                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Department/Program</a></th>
                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Mobile</a></th>
                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">View</a></th>
                </tr>
            </thead>

            <tbody>
                                    <tr class="odd">
            <td><input type="checkbox" id="ohrmList_chkSelectRecord_1" name="chkSelectRow[]" value="1"></td>                                <td class="left"><a href="#">0001</a></td>
                                            <td class="left"><a href="#">Noor Alam</a></td>
                                            <td class="left"><a href="#">Khan</a></td>
                                            <td class="left">2005</td>
                                            <td class="left">Science & Engineering</td>
                                            <td class="left">CSE</td>
                                            <td class="left">8801679624759</td>
                                            <td class="viewpopup">
                                            <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">View</a></p>
                                            <div id="light" class="white_content">
                                                <div class="profile-env">

                                                    <header class="row">
                                                        <a style="float: right; right: 50px; position: relative;" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>

                                                        <div class="col-sm-3">

                                                            <a href="#" class="profile-picture">
                                                                <img src="http://localhost/tmss/uploads/user.jpg" class="img-responsive img-circle">
                                                            </a>

                                                        </div>

                                                        <div class="col-sm-9">

                                                            <ul class="profile-info-sections">
                                                                <li style="padding:0px; margin:0px;">
                                                                    <div class="profile-name">
                                                                        <h3>Noor Alam</h3>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                        </div>


                                                    </header>

                                                    <section class="profile-info-tabs">

                                                        <div class="row">

                                                            <div class="">
                                                                <br>
                                                                <table class="table table-bordered">

                                                                    <tbody>
                                                                    <tr>
                                                                        <td>Year</td>
                                                                        <td><b>2015</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Faculty</td>
                                                                        <td><b>Science & Engineering</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Program</td>
                                                                        <td><b>Computer Science & Engineering (CSE)</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Roll</td>
                                                                        <td><b>034010</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Birthday</td>
                                                                        <td><b>02/06/2007</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Gender</td>
                                                                        <td><b>male</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Phone</td>
                                                                        <td><b>452525252</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td><b>selim@gmail.com</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Address</td>
                                                                        <td><b>Dhaka</b>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Parent</td>
                                                                        <td><b>Parent Name</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Parent Phone</td>
                                                                        <td><b>8887766666</b></td>
                                                                    </tr>

                                                                    </tbody></table>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                                </div>
                                            <div id="fade" class="black_overlay"></div>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td><input type="checkbox" id="ohrmList_chkSelectRecord_1" name="chkSelectRow[]" value="1"></td>                                <td class="left"><a href="#">0001</a></td>
                                        <td class="left"><a href="#">Sujon Ahmed</a></td>
                                        <td class="left"><a href="#">Khan</a></td>
                                        <td class="left">2005</td>
                                        <td class="left">Science & Engineering</td>
                                        <td class="left">CSE</td>
                                        <td class="left">8801679624722</td>
                                        <td class="viewpopup">
                                            <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">View</a></p>
                                            <div id="light" class="white_content">
                                                <div class="profile-env">

                                                    <header class="row">
                                                        <a style="float: right; right: 50px; position: relative;" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>

                                                        <div class="col-sm-3">

                                                            <a href="#" class="profile-picture">
                                                                <img src="http://localhost/tmss/uploads/user.jpg" class="img-responsive img-circle">
                                                            </a>

                                                        </div>

                                                        <div class="col-sm-9">

                                                            <ul class="profile-info-sections">
                                                                <li style="padding:0px; margin:0px;">
                                                                    <div class="profile-name">
                                                                        <h3>Noor Alam</h3>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                        </div>


                                                    </header>

                                                    <section class="profile-info-tabs">

                                                        <div class="row">

                                                            <div class="">
                                                                <br>
                                                                <table class="table table-bordered">

                                                                    <tbody>
                                                                    <tr>
                                                                        <td>Year</td>
                                                                        <td><b>2015</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Faculty</td>
                                                                        <td><b>Science & Engineering</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Program</td>
                                                                        <td><b>Computer Science & Engineering (CSE)</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Roll</td>
                                                                        <td><b>034010</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Birthday</td>
                                                                        <td><b>02/06/2007</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Gender</td>
                                                                        <td><b>male</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Phone</td>
                                                                        <td><b>452525252</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td><b>selim@gmail.com</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Address</td>
                                                                        <td><b>Dhaka</b>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Parent</td>
                                                                        <td><b>Parent Name</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Parent Phone</td>
                                                                        <td><b>8887766666</b></td>
                                                                    </tr>

                                                                    </tbody></table>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <div id="fade" class="black_overlay"></div>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td><input type="checkbox" id="ohrmList_chkSelectRecord_1" name="chkSelectRow[]" value="1"></td>                                <td class="left"><a href="#">0001</a></td>
                                        <td class="left"><a href="#">Nayon Sarker</a></td>
                                        <td class="left"><a href="#">Khan</a></td>
                                        <td class="left">2005</td>
                                        <td class="left">Science & Engineering</td>
                                        <td class="left">CSE</td>
                                        <td class="left">8801679624721</td>
                                        <td class="viewpopup">
                                            <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">View</a></p>
                                            <div id="light" class="white_content">
                                                <div class="profile-env">

                                                    <header class="row">
                                                        <a style="float: right; right: 50px; position: relative;" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>

                                                        <div class="col-sm-3">

                                                            <a href="#" class="profile-picture">
                                                                <img src="http://localhost/tmss/uploads/user.jpg" class="img-responsive img-circle">
                                                            </a>

                                                        </div>

                                                        <div class="col-sm-9">

                                                            <ul class="profile-info-sections">
                                                                <li style="padding:0px; margin:0px;">
                                                                    <div class="profile-name">
                                                                        <h3>Noor Alam</h3>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                        </div>


                                                    </header>

                                                    <section class="profile-info-tabs">

                                                        <div class="row">

                                                            <div class="">
                                                                <br>
                                                                <table class="table table-bordered">

                                                                    <tbody>
                                                                    <tr>
                                                                        <td>Year</td>
                                                                        <td><b>2015</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Faculty</td>
                                                                        <td><b>Science & Engineering</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Program</td>
                                                                        <td><b>Computer Science & Engineering (CSE)</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Roll</td>
                                                                        <td><b>034010</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Birthday</td>
                                                                        <td><b>02/06/2007</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Gender</td>
                                                                        <td><b>male</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Phone</td>
                                                                        <td><b>452525252</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td><b>selim@gmail.com</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Address</td>
                                                                        <td><b>Dhaka</b>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Parent</td>
                                                                        <td><b>Parent Name</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Parent Phone</td>
                                                                        <td><b>8887766666</b></td>
                                                                    </tr>

                                                                    </tbody></table>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <div id="fade" class="black_overlay"></div>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td><input type="checkbox" id="ohrmList_chkSelectRecord_1" name="chkSelectRow[]" value="1"></td>                                <td class="left"><a href="#">0001</a></td>
                                        <td class="left"><a href="#">Faisal Chowdhury</a></td>
                                        <td class="left"><a href="#">Khan</a></td>
                                        <td class="left">2005</td>
                                        <td class="left">Science & Engineering</td>
                                        <td class="left">CSE</td>
                                        <td class="left">8801679624722</td>
                                        <td class="viewpopup">
                                            <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">View</a></p>
                                            <div id="light" class="white_content">
                                                <div class="profile-env">

                                                    <header class="row">
                                                        <a style="float: right; right: 50px; position: relative;" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>

                                                        <div class="col-sm-3">

                                                            <a href="#" class="profile-picture">
                                                                <img src="http://localhost/tmss/uploads/user.jpg" class="img-responsive img-circle">
                                                            </a>

                                                        </div>

                                                        <div class="col-sm-9">

                                                            <ul class="profile-info-sections">
                                                                <li style="padding:0px; margin:0px;">
                                                                    <div class="profile-name">
                                                                        <h3>Noor Alam</h3>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                        </div>


                                                    </header>

                                                    <section class="profile-info-tabs">

                                                        <div class="row">

                                                            <div class="">
                                                                <br>
                                                                <table class="table table-bordered">

                                                                    <tbody>
                                                                    <tr>
                                                                        <td>Year</td>
                                                                        <td><b>2015</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Faculty</td>
                                                                        <td><b>Science & Engineering</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Program</td>
                                                                        <td><b>Computer Science & Engineering (CSE)</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Roll</td>
                                                                        <td><b>034010</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Birthday</td>
                                                                        <td><b>02/06/2007</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Gender</td>
                                                                        <td><b>male</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Phone</td>
                                                                        <td><b>452525252</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td><b>selim@gmail.com</b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Address</td>
                                                                        <td><b>Dhaka</b>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Parent</td>
                                                                        <td><b>Parent Name</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Parent Phone</td>
                                                                        <td><b>8887766666</b></td>
                                                                    </tr>

                                                                    </tbody></table>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <div id="fade" class="black_overlay"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
        </div> <!-- tableWrapper -->
                </form> <!-- frmList_ohrmListComponent --> 
                
        
    </div> <!-- inner -->
        
</div> <!-- search-results -->
<!-- Confirmation box HTML: Begins -->
<div class="modal hide" id="deleteConfModal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>OrangeHRM - Confirmation Required</h3>
  </div>
  <div class="modal-body">
    <p>Delete records?</p>
  </div>
  <div class="modal-footer">
    <input type="button" class="btn" data-dismiss="modal" id="dialogDeleteBtn" value="Ok">
    <input type="button" class="btn cancel" data-dismiss="modal" value="Cancel">
  </div>
</div>

            </div>
    </div>
</div>