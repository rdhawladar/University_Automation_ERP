<div id="content" class="contentBox ">

    <div id="pageTitleDiv" class="pageTitle clearfix ">


        <div id="pageTitleBar" class="pageTitleIcon" tabindex="0">
            <img src="tas_files/tasks_on.gif" alt="" id="titleicon"><h1 id="pageTitleHeader" tabindex="-1"><span id="pageTitleText">
  <span style="color:;">Tasks</span>  </span></h1>
            <span id="_titlebarExtraContent" class="titleButtons"></span>
        </div>


    </div>

    <div class="containerOptions">
        <!-- Begin Action Panel List. -->
        <div class="searchbar editmode" id="panelbutton1">
            <form id="searchForm" name="searchForm" action="/webapps/blackboard/execute/taskEditList" method="post">

                <input name="course_id" id="course_id" value="" type="hidden">



                <input name="group_id" id="group_id" value="" type="hidden">



                <input name="method" id="method" value="" type="hidden">



                <input name="status" id="status" value="" type="hidden">



                <input name="mode" id="mode" value="" type="hidden">



                <label for="filter">Display Tasks</label>
                &nbsp;
                <select name="filter">
                    <option value="all" selected="selected">All Tasks</option>
                </select>




                <a href="javascript:$('searchForm').submit();" class="genericButton">
                    Go
                </a>


            </form>


        </div>



        <!-- End Action Panel List. -->
    </div>

    <div class="clearfix" id="containerdiv">
        <h2 id="anonymous_element_3" class="hideoff">Content</h2>

        <!-- START HACK : displayUrl -->
        <!-- current Url of page is: https://nz.myacg.org/webapps/blackboard/execute/taskEditList -->

        <!-- END HACK : displayUrl -->
        <script type="text/javascript">document.taskTypes=new Object();</script> <form name="tasksForm" action="/webapps/blackboard/execute/taskEditList" method="post">
            <input name="blackboard.platform.security.NonceUtil.nonce" value="4030872a-8b2b-47ac-9eb5-59f8a36eeca9" type="hidden">
            <input name="course_id" id="course_id" value="" type="hidden">



            <input name="group_id" id="group_id" value="" type="hidden">



            <input name="method" id="method" value="" type="hidden">



            <input name="status" id="status" value="" type="hidden">



            <input name="mode" id="mode" value="" type="hidden">





            <div style="position:relative;display:none" id="loadListlistContainer">
                <div class="loading-list
                ">
                    <img src="tas_files/progress_learningSystem.gif" alt="load list" height="20" width="32">
                    &nbsp;<span id="loadListMsg">Loading...</span>
                </div>
            </div>

            <div id="listContainer" class="inventoryListContainerDiv" aria-live="polite">
                <!--STARTlistContainerTEXT-->


                <div class="noItems $emptyMsgCustomClass">No items found.</div>
                <!--ENDlistContainerTEXT-->
            </div>

        </form>


    </div>

</div>