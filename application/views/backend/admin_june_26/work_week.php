<div class="row">
    <div class="col-md-12">
        <div id="content">

            <div id="location" class="box single">

                <div class="head">
                    <h1 id="locationHeading">Work Week</h1>
                </div>

                <div class="inner">




                    <form id="frmWorkWeek" name="frmWorkWeek" method="post" action="/hrm/symfony/web/index.php/leave/defineWorkWeek" novalidate="novalidate">

                        <fieldset>

                            <ol>
                                <li><label for="WorkWeek_day_length_Monday">Monday</label>
                                    <select disabled="disabled" name="WorkWeek[day_length_Monday]" id="WorkWeek_day_length_Monday">
                                        <option value="0" selected="selected">Full Day</option>
                                        <option value="4">Half Day</option>
                                        <option value="8">Non-working Day</option>
                                    </select>
                                </li>
                                <li><label for="WorkWeek_day_length_Tuesday">Tuesday</label>
                                    <select disabled="disabled" name="WorkWeek[day_length_Tuesday]" id="WorkWeek_day_length_Tuesday">
                                        <option value="0" selected="selected">Full Day</option>
                                        <option value="4">Half Day</option>
                                        <option value="8">Non-working Day</option>
                                    </select>
                                </li>
                                <li><label for="WorkWeek_day_length_Wednesday">Wednesday</label>
                                    <select disabled="disabled" name="WorkWeek[day_length_Wednesday]" id="WorkWeek_day_length_Wednesday">
                                        <option value="0" selected="selected">Full Day</option>
                                        <option value="4">Half Day</option>
                                        <option value="8">Non-working Day</option>
                                    </select>
                                </li>
                                <li><label for="WorkWeek_day_length_Thursday">Thursday</label>
                                    <select disabled="disabled" name="WorkWeek[day_length_Thursday]" id="WorkWeek_day_length_Thursday">
                                        <option value="0" selected="selected">Full Day</option>
                                        <option value="4">Half Day</option>
                                        <option value="8">Non-working Day</option>
                                    </select>
                                </li>
                                <li><label for="WorkWeek_day_length_Friday">Friday</label>
                                    <select disabled="disabled" name="WorkWeek[day_length_Friday]" id="WorkWeek_day_length_Friday">
                                        <option value="0" selected="selected">Full Day</option>
                                        <option value="4">Half Day</option>
                                        <option value="8">Non-working Day</option>
                                    </select>
                                </li>
                                <li><label for="WorkWeek_day_length_Saturday">Saturday</label>
                                    <select disabled="disabled" name="WorkWeek[day_length_Saturday]" id="WorkWeek_day_length_Saturday">
                                        <option value="0">Full Day</option>
                                        <option value="4">Half Day</option>
                                        <option value="8" selected="selected">Non-working Day</option>
                                    </select>
                                </li>
                                <li><label for="WorkWeek_day_length_Sunday">Sunday</label>
                                    <select disabled="disabled" name="WorkWeek[day_length_Sunday]" id="WorkWeek_day_length_Sunday">
                                        <option value="0">Full Day</option>
                                        <option value="4">Half Day</option>
                                        <option value="8" selected="selected">Non-working Day</option>
                                    </select>
                                    <input type="hidden" name="WorkWeek[_csrf_token]" value="c1b229b124017badd7c6656ba295eb91" id="WorkWeek__csrf_token"></li>
                            </ol>

                            <p>
                            </p><div class="formbuttons">
                                <input type="button" class="savebutton" id="saveBtn" value="Edit">
                                <input type="button" class="reset hide" name="btnReset" id="btnReset" onclick="reset();" value="Reset">
                            </div>

                            <p></p>

                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>