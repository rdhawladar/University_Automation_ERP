<div id="content" class="contentBox ">

    <div id="pageTitleDiv" class="pageTitle clearfix ">


        <div id="pageTitleBar" class="pageTitleIcon" tabindex="0">
            <img src="obs_files/editpage_on.gif" alt="" id="titleicon"><h1 id="pageTitleHeader" tabindex="-1"><span id="pageTitleText">
  Observer Dashboard  </span></h1>
            <span id="_titlebarExtraContent" class="titleButtons"></span>
        </div>


        <div id="helpPageTitle" tabindex="0" class="helphelp">
            <p class="helphelp">
                <strong>Currently Observing:</strong> Jasmine, Akhter </p><p> The following is a list of all users who can be observed. Click <b>Observe</b>
                to begin observing a new user in the list. Click the Username to view
                details for a user without changing the user currently being observed.
            </p>
        </div>

    </div>

    <div class="clearfix" id="containerdiv">
        <h2 id="anonymous_element_3" class="hideoff">Content</h2>
        <!-- viewObserveeForm.navItem? -->
        <form name="viewObserveeForm" method="post" action="/webapps/blackboard/execute/viewObservees">  <input name="nav_item" id="nav_item" value="" type="hidden">



            <input name="actionString" id="actionString" value="list" type="hidden">





            <div style="position:relative;display:none" id="loadListlistContainer">
                <div class="loading-list
                ">
                    <img src="obs_files/progress_learningSystem.gif" alt="load list" height="20" width="32">
                    &nbsp;<span id="loadListMsg">Loading...</span>
                </div>
            </div>

            <div id="listContainer" class="inventoryListContainerDiv" aria-live="polite">
                <!--STARTlistContainerTEXT-->


                <!-- begin top control bar -->

                <div class="hideoff">
                    <a href="#pagingcontrols">
                        <img src="obs_files/spacer.gif" alt="Displaying 1 to 1 of 1 items Skip to paging controls" border="0" height="1" width="1">
                    </a>
                </div>


                <!-- end top control bar -->

                <!-- Begin Accessible Drag and Drop Control -->
                <!-- End Accessible Drag and Drop Control -->

                <!-- Begin Item Listing -->
                <div>
                    <table class="inventory sortable $wrappingTableClass" id="listContainer_datatable" summary="This is a table showing the attributes of a collection of items." title="This is a table showing the attributes of a collection of items.">
                        <thead class="inventoryListHead">
                        <tr>
                            <th scope="col" class="">
                                <a class="sortheader" href="#/webapps/blackboard/execute/viewObservees?sortCol=avail&amp;tabId=_11_1&amp;numResults=25&amp;forwardUrl=index.jsp&amp;returnUrl=%2Fwebapps%2Fportal%2Fexecute%2Ftabs%2FtabAction%3Ftab_tab_group_id%3D_13_1&amp;sortDir=ASCENDING">Status<span class="sortarrow"></span></a>
                            </th>
                            <th class="sorted" scope="col">
                                <a class="sortheader" href="#/webapps/blackboard/execute/viewObservees?sortCol=lastName&amp;tabId=_11_1&amp;numResults=25&amp;forwardUrl=index.jsp&amp;returnUrl=%2Fwebapps%2Fportal%2Fexecute%2Ftabs%2FtabAction%3Ftab_tab_group_id%3D_13_1&amp;sortDir=DESCENDING">Last Name
                  <span class="sortarrow" sortdir="up">
                    <img alt="Sorted Ascending Order" title="Sorted Ascending Order" src="obs_files/sort_on_up2.gif" border="0">
                  </span>
                                </a>
                            </th>
                            <th scope="col" class="">
                                <a class="sortheader" href="#/webapps/blackboard/execute/viewObservees?sortCol=firstName&amp;tabId=_11_1&amp;numResults=25&amp;forwardUrl=index.jsp&amp;returnUrl=%2Fwebapps%2Fportal%2Fexecute%2Ftabs%2FtabAction%3Ftab_tab_group_id%3D_13_1&amp;sortDir=ASCENDING">First Name<span class="sortarrow"></span></a>
                            </th>
                            <th scope="col" class="">
                                <a class="sortheader" href="#/webapps/blackboard/execute/viewObservees?sortCol=username&amp;tabId=_11_1&amp;numResults=25&amp;forwardUrl=index.jsp&amp;returnUrl=%2Fwebapps%2Fportal%2Fexecute%2Ftabs%2FtabAction%3Ftab_tab_group_id%3D_13_1&amp;sortDir=ASCENDING">Username<span class="sortarrow"></span></a>
                            </th>
                            <th scope="col" class="">
                                <a class="sortheader" href="#/webapps/blackboard/execute/viewObservees?sortCol=numberCourses&amp;tabId=_11_1&amp;numResults=25&amp;forwardUrl=index.jsp&amp;returnUrl=%2Fwebapps%2Fportal%2Fexecute%2Ftabs%2FtabAction%3Ftab_tab_group_id%3D_13_1&amp;sortDir=ASCENDING">Number of Courses<span class="sortarrow"></span></a>
                            </th>
                            <th scope="col" class="">
                                <a class="sortheader" href="#/webapps/blackboard/execute/viewObservees?sortCol=lastLoginDate&amp;tabId=_11_1&amp;numResults=25&amp;forwardUrl=index.jsp&amp;returnUrl=%2Fwebapps%2Fportal%2Fexecute%2Ftabs%2FtabAction%3Ftab_tab_group_id%3D_13_1&amp;sortDir=ASCENDING">Last System Access<span class="sortarrow"></span></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="listContainer_databody">
                        <tr id="listContainer_row:0" class="">
                            <td class="" valign="top">

                                &nbsp;
                                Observing</td>
                            <th scope="row" class="" valign="top">Jasmine</th>
                            <td class="" valign="top">
                                Akhter</td>
                            <td class="" valign="top">
                                <a href="#/webapps/blackboard/execute/viewObserveeDetail?user_id=_584905_1&amp;returnUrl=/webapps/portal/execute/tabs/tabAction?tab_tab_group_id=_13_1">
                                    200837757</a>
                            </td>
                            <td class="" valign="top">
                                11</td>
                            <td class="" valign="top">
                                05-May-2016 20:21</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Item Listing -->


                <!-- Begin bottom control bar. -->
                <!-- End bottom control bar. -->

                <!-- begin edit paging -->

                <div class="paging clearfix" id="listContainer_pagingcontrols">
                    <h3 id="anonymous_element_4" class="hideoff"><a name="pagingcontrols">Paging Options</a></h3>
                    <div class="pagingprefs" id="listContainer_itemcount">
                        <span>Displaying <strong>1</strong> to <strong>1</strong> of <strong>1</strong> items</span>
                        <a class="pagelink" href="#/webapps/blackboard/execute/viewObservees?editPaging=false&amp;tabId=_11_1&amp;showAll=true&amp;returnUrl=%2Fwebapps%2Fportal%2Fexecute%2Ftabs%2FtabAction%3Ftab_tab_group_id%3D_13_1&amp;sortCol=lastName&amp;sortDir=ASCENDING&amp;startIndex=0&amp;forwardUrl=index.jsp" id="listContainer_showAllButton">Show All</a>
                        <a href="#" name="openpaging" id="listContainer_openpaging">Edit Paging…</a>
                    </div>
                    <div class="jumptopage" style="display:none;" id="listContainer_editpaging">
                        <label for="listContainer_numResults">Items per page:</label>
                        <input kl_virtual_keyboard_secure_input="on" value="25" id="listContainer_numResults" name="numResults" onclick="focus()" style="font-weight:normal;" type="text">
                        <a class="gotolink" href="#/webapps/blackboard/execute/viewObservees?sortDir=ASCENDING&amp;sortCol=lastName&amp;tabId=_11_1&amp;forwardUrl=index.jsp&amp;returnUrl=%2Fwebapps%2Fportal%2Fexecute%2Ftabs%2FtabAction%3Ftab_tab_group_id%3D_13_1&amp;editPaging=true" id="listContainer_gopaging">Go</a>
                        <button title="Close" name="closepaging" id="listContainer_closepaging" type="button"><img alt="Close" src="obs_files/close_mini.gif"></button>
                        <br>Total number of items: 1
                    </div>
                </div><div class="clearfloats"></div>
                <!-- end edit paging -->
                <!--ENDlistContainerTEXT-->
            </div>
        </form>


        <p class="backLink">

            <a href="#/webapps/portal/execute/tabs/tabAction?tab_tab_group_id=_13_1">
                OK
            </a>

        </p>

    </div>

</div>