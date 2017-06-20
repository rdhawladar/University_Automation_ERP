<div class="row">
    <div class="col-md-12">
        <div id="content">

                  
<div class="box searchForm toggableForm" id="employee-information">
    <div class="head">
        <h1>Examination Information System</h1>
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
                    <li><label for="empsearch_employee_name">Department/Program Name</label>
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
                    <li><label for="empsearch_employee_name">Semester Name</label>
                        <select name="" id="" class="form-control">
                            <option value="">Please Select</option>
                            <option value="">Ist Semester</option>
                            <option value="">second Semester</option>
                            <option value="">Third Semester</option>
                            <option value="">Fourth Semester</option>
                            <option value="">Fifth Semester</option>
                            <option value="">Sixth Semester</option>
                            <option value="">Seventh Semester</option>
                            <option value="">Eightth Semester</option>
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
                    <th rowspan="1" style="width:10%" class="header"><a href="#lastName&amp;sortOrder=ASC" class="null">Semester</a></th>
                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Year</a></th>
                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Faculty</a></th>
                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Department/Program</a></th>
                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">View</a></th>
                </tr>
            </thead>

            <tbody>
                                    <tr class="odd">
                                            <td class="left"><a href="#">Ist Semester</a></td>
                                            <td class="left">2005</td>
                                            <td class="left">Science & Engineering</td>
                                            <td class="left">CSE</td>
                                            <td class="viewpopup">
                                            <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">View</a></p>
                                            <div id="light" class="white_content" style="top: -175%;left: -10%;width: 100%;height: 300%;">
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
                                                                        <h1 style="font-size: 25px;">Pundro University of Science & Technology (PUST)</h1>
                                                                        <h5>Depart of Computer Science & Engineering (CSE)</h5>
                                                                        <h5>Master of CSE (Regular), Fall 2016</h5>
                                                                        <h2>Tabulation Sheet</h2>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                        </div>


                                                    </header>

                                                    <section class="" style=" margin: 0 10px;">

                                                        <div class="row">

                                                            <div class="">
                                                                <br>
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <td>SL.</td>
                                                                        <td>Registration</td>
                                                                        <td>
                                                                            Name of Students
                                                                            <div style="border-top:1px solid #000000;">Courses<br/>Credits</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE100<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE101<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE102<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE103<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE104<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE105<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE106<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE107<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE108<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE109<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE110<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE111<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE112<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE113<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE114<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE115<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE116<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE117<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE118<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE119<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE2002<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE2032<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE2202<br/>3.0</div>
                                                                        </td>
                                                                        <td>
                                                                            <div>CSE2000<br/>3.0</div>
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            <div>Credits<br/>Attempted</div>
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            <div>Credits<br/>Earned</div>
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            <div>Grade<br/>Point Average</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>9802345</td>
                                                                        <td>
                                                                            Md.Noor-e Alam Khan
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            12.00
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            12.00
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            3.88
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>9802346</td>
                                                                        <td>
                                                                            Md.Shakil Ahmed
                                                                        </td>
                                                                        <td>
                                                                            B
                                                                        </td>
                                                                        <td>
                                                                            B
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            12.00
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            12.00
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            3.66
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>9802348</td>
                                                                        <td>
                                                                            Md.Sazzad Rayhan
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            C
                                                                        </td>
                                                                        <td>
                                                                            C+
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            12.00
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            12.00
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            3.50
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>9802365</td>
                                                                        <td>
                                                                            Sonia Binte Haque
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            A-
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A
                                                                        </td>
                                                                        <td>
                                                                            A+
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            6.00
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            6.00
                                                                        </td>
                                                                        <td style="font-weight:bold;">
                                                                            3.28
                                                                        </td>
                                                                    </tr>
                                                                </table>
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