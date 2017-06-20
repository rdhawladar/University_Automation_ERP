<div class="row">
    <div class="col-md-12">
        <div id="content">
            <div class="inner">
                <form id="search_form" name="frmEmployeeSearch" method="post" action="/hrm/symfony/web/index.php/pim/viewEmployeeList">
                    <fieldset>
                        <ol>
                            <li>
                                <label for="empsearch_employee_name" style="width: auto; margin-right: 10px; margin-top: 3px;
    font-size: 16px;font-weight: bold;">Student ID: </label>
                                <input type="text" />
                                <input type="button" id="searchBtn" value="Search" name="_search" class="" style="margin-left: 10px;
    margin-top: -3px;">
                            </li>
                        </ol>
                    </fieldset>
                </form>

            </div>
            <div class="box noHeader" id="search-results">
                <div class="inner">




                    <form method="post" action="/hrm/symfony/web/index.php/pim/deleteEmployees" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                        <input type="hidden" name="defaultList[_csrf_token]" value="8c7cc68d5da2a88eec9d5d5cc9c9fb46" id="defaultList__csrf_token">
                        <div id="helpText" class="helpText"></div>

                        <div id="scrollWrapper">
                            <div id="scrollContainer">
                            </div>
                        </div>
                        <div id="tableWrapper">
                            <table class="table hover" id="resultTable">
                                <thead>
                                <tr>
                                    <th rowspan="1" class="checkbox-col">SL.</th>
                                    <th rowspan="1" style="width:5%" class="header"><a href="#employeeId&amp;sortOrder=ASC" class="null">Std. Id</a></th>
                                    <th rowspan="1" style="width:10%" class="header"><a href="#lastName&amp;sortOrder=ASC" class="null">Std. Name</a></th>
                                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Semester</a></th>
                                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Department</a></th>
                                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">CGPA</a></th>
                                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Waiver</a></th>
                                    <th rowspan="1" style="width:20%" class="header"><a href="#jobTitle&amp;sortOrder=ASC" class="null">Manage</a></th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr class="odd">
                                    <td>1</td>
                                    <td class="left">0001</td>
                                    <td class="left">Noor Alam Khan</td>
                                    <td class="left">Ist Semester</td>
                                    <td class="left">Science & Engineering</td>
                                    <td class="left">3.95</td>
                                    <td class="left">20%</td>
                                    <td class="viewpopup">
                                        <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">View</a> |<a
                                                href="">Edit</a>| <a href="">Delete</a></p>
                                        <div id="light" class="white_content std_manage">
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
                                    <td>2</td>
                                    <td class="left">0005</td>
                                    <td class="left">Joyon Sarkar</td>
                                    <td class="left">Ist Semester</td>
                                    <td class="left">BBA</td>
                                    <td class="left">3.45</td>
                                    <td class="left">30%</td>
                                    <td class="viewpopup">
                                        <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">View</a> |<a
                                                href="">Edit</a>| <a href="">Delete</a></p>
                                        <div id="light" class="white_content std_manage">
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
                                    <td>3</td>
                                    <td class="left">0007</td>
                                    <td class="left">Khadiza-tul-kobda</td>
                                    <td class="left">Ist Semester</td>
                                    <td class="left">Electrical & Electronics Engineering (EEE)</td>
                                    <td class="left">3.55</td>
                                    <td class="left">50%</td>
                                    <td class="viewpopup">
                                        <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">View</a> |<a
                                                href="">Edit</a>| <a href="">Delete</a></p>
                                        <div id="light" class="white_content std_manage">
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