<div class="row">
    <div class="col-md-12">
        <div id="content">


            <style type="text/css">
                form ol li.checkbox label {
                    width:35%
                }
            </style>


            <div class="box">

                <div class="head">
                    <h1>Attendance Configuration</h1>
                </div>

                <div class="inner">





                    <form id="configureForm" action="" method="post">
                        <input type="hidden" name="attendance[_csrf_token]" value="580f81163267f59c860ada173e220916" id="attendance__csrf_token">            <fieldset>
                            <ol>
                                <li class="checkbox">
                                    <label for="attendance_configuration1">Employee can change current time when punching in/out</label>                        <input class="configuration" type="checkbox" name="attendance[configuration1]" id="attendance_configuration1">                        </li>


                                <li class="checkbox">
                                    <label for="attendance_configuration2">Employee can edit/delete own attendance records</label>                        <input class="configuration" type="checkbox" name="attendance[configuration2]" id="attendance_configuration2">                        </li>

                                <li class="checkbox">
                                    <label for="attendance_configuration3">Supervisor can add/edit/delete attendance records of subordinates</label>                         <input class="configuration" type="checkbox" name="attendance[configuration3]" id="attendance_configuration3">                         </li>

                            </ol>
                            <p>
                                <input type="submit" class="" id="btnSave" value="Save">
                            </p>

                        </fieldset>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>