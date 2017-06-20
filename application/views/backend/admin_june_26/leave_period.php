<div class="row">
    <div class="col-md-12">
        <div id="content">



            <div id="location" class="box">

                <div class="head">
                    <h1 id="locationHeading">Leave Period</h1>
                </div>

                <div class="inner">





                    <form id="frmLeavePeriod" name="frmLeavePeriod" action="" method="post">

                        <fieldset>

                            <ol>
                                <li><label for="leaveperiod_cmbStartMonth">Start Month <em>*</em></label>
                                    <select name="leaveperiod[cmbStartMonth]" id="leaveperiod_cmbStartMonth" disabled="disabled">
                                        <option value="0">-- Month --</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </li>
                                <li><label for="leaveperiod_cmbStartDate">Start Date <em>*</em></label>
                                    <select name="leaveperiod[cmbStartDate]" id="leaveperiod_cmbStartDate" disabled="disabled">
                                        <option value="0">-- Date --</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                    <input type="hidden" name="leaveperiod[_csrf_token]" value="74532885c8ffdb215af0d2bdc3b42420" id="leaveperiod__csrf_token"></li>
                                <li>
                                    <label>
                                        End Date
                                    </label>
                                    <label id="labelEndDate">
                                        <span id="lblEndDate" class="valueLabel">December 31</span>&nbsp;<span id="lblEndDateFollowingYear" class="valueLabel"></span>

                                    </label>
                                </li>
                                <li>
                                    <label>
                                        Current Leave Period                        </label>
                        <span>
                            2016-01-01 to 2016-12-31                        </span>
                                </li>
                                <li class="required">
                                    <em>*</em> Required field                    </li>
                            </ol>

                            <p>
                                <input type="button" class="addbutton" name="btnEdit" id="btnEdit" value="Edit">
                                <input type="button" class="reset hide" name="btnReset" id="btnReset" value="Reset">
                            </p>

                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>