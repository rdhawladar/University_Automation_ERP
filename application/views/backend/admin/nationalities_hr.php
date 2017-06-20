<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('nationalities_hr');?>
                        </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_new_record');?>
                        </a></li>
        </ul>
        <!------CONTROL TABS END------>
        
    
        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <div id="content">



                    <div id="nationality" class="box" style="display: none;">

                        <div class="head"><h1 id="nationalityHeading">Add Nationality</h1></div>

                        <div class="inner">

                            <form name="frmNationality" id="frmNationality" method="post" action="/hrm/symfony/web/index.php/admin/nationality" novalidate="novalidate">

                                <input type="hidden" name="nationality[_csrf_token]" value="cc0eb44b95bfa086d79c08e5eb25e249" id="nationality__csrf_token">            <input type="hidden" name="nationality[nationalityId]" id="nationality_nationalityId"><input type="hidden" name="nationality[_csrf_token]" value="cc0eb44b95bfa086d79c08e5eb25e249" id="nationality__csrf_token">
                                <fieldset>
                                    <ol>
                                        <li>
                                            <label for="nationality_name">Name <em>*</em></label>                        <input type="text" name="nationality[name]" class="formInput" maxlength="100" id="nationality_name">                    </li>
                                        <li class="required">
                                            <em>*</em> Required field                    </li>
                                    </ol>

                                    <p>
                                        <input type="button" class="savebutton" name="btnSave" id="btnSave" value="Save">
                                        <input type="button" class="reset" name="btnCancel" id="btnCancel" value="Cancel">
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>

                    <div id="nationalityList">
                        <!-- List component  -->
                        <div class="box" id="search-results">

                            <div class="head"><h1>Nationalities</h1></div>

                            <div class="inner">







                                <form method="post" action="/hrm/symfony/web/index.php/admin/deleteNationalities" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                                    <input type="hidden" name="defaultList[_csrf_token]" value="43cebe94d6e39e72c1b16a82ff436a09" id="defaultList__csrf_token">
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
                                            <tr><th rowspan="1" class="checkbox-col"><input type="checkbox" id="ohrmList_chkSelectAll" name="chkSelectAll" value=""></th>
                                                <th rowspan="1" style="width:"><span class="headerCell">Nationality</span></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_1" name="chkSelectRow[]" value="1"></td>                                <td class="left"><a href="javascript:">Afghan</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_2" name="chkSelectRow[]" value="2"></td>                                <td class="left"><a href="javascript:">Albanian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_3" name="chkSelectRow[]" value="3"></td>                                <td class="left"><a href="javascript:">Algerian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_4" name="chkSelectRow[]" value="4"></td>                                <td class="left"><a href="javascript:">American</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_5" name="chkSelectRow[]" value="5"></td>                                <td class="left"><a href="javascript:">Andorran</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_6" name="chkSelectRow[]" value="6"></td>                                <td class="left"><a href="javascript:">Angolan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_7" name="chkSelectRow[]" value="7"></td>                                <td class="left"><a href="javascript:">Antiguans</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_8" name="chkSelectRow[]" value="8"></td>                                <td class="left"><a href="javascript:">Argentinean</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_9" name="chkSelectRow[]" value="9"></td>                                <td class="left"><a href="javascript:">Armenian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_10" name="chkSelectRow[]" value="10"></td>                                <td class="left"><a href="javascript:">Australian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_11" name="chkSelectRow[]" value="11"></td>                                <td class="left"><a href="javascript:">Austrian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_12" name="chkSelectRow[]" value="12"></td>                                <td class="left"><a href="javascript:">Azerbaijani</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_13" name="chkSelectRow[]" value="13"></td>                                <td class="left"><a href="javascript:">Bahamian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_14" name="chkSelectRow[]" value="14"></td>                                <td class="left"><a href="javascript:">Bahraini</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_15" name="chkSelectRow[]" value="15"></td>                                <td class="left"><a href="javascript:">Bangladeshi</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_16" name="chkSelectRow[]" value="16"></td>                                <td class="left"><a href="javascript:">Barbadian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_17" name="chkSelectRow[]" value="17"></td>                                <td class="left"><a href="javascript:">Barbudans</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_18" name="chkSelectRow[]" value="18"></td>                                <td class="left"><a href="javascript:">Batswana</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_19" name="chkSelectRow[]" value="19"></td>                                <td class="left"><a href="javascript:">Belarusian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_20" name="chkSelectRow[]" value="20"></td>                                <td class="left"><a href="javascript:">Belgian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_21" name="chkSelectRow[]" value="21"></td>                                <td class="left"><a href="javascript:">Belizean</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_22" name="chkSelectRow[]" value="22"></td>                                <td class="left"><a href="javascript:">Beninese</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_23" name="chkSelectRow[]" value="23"></td>                                <td class="left"><a href="javascript:">Bhutanese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_24" name="chkSelectRow[]" value="24"></td>                                <td class="left"><a href="javascript:">Bolivian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_25" name="chkSelectRow[]" value="25"></td>                                <td class="left"><a href="javascript:">Bosnian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_26" name="chkSelectRow[]" value="26"></td>                                <td class="left"><a href="javascript:">Brazilian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_27" name="chkSelectRow[]" value="27"></td>                                <td class="left"><a href="javascript:">British</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_28" name="chkSelectRow[]" value="28"></td>                                <td class="left"><a href="javascript:">Bruneian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_29" name="chkSelectRow[]" value="29"></td>                                <td class="left"><a href="javascript:">Bulgarian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_30" name="chkSelectRow[]" value="30"></td>                                <td class="left"><a href="javascript:">Burkinabe</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_31" name="chkSelectRow[]" value="31"></td>                                <td class="left"><a href="javascript:">Burmese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_32" name="chkSelectRow[]" value="32"></td>                                <td class="left"><a href="javascript:">Burundian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_33" name="chkSelectRow[]" value="33"></td>                                <td class="left"><a href="javascript:">Cambodian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_34" name="chkSelectRow[]" value="34"></td>                                <td class="left"><a href="javascript:">Cameroonian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_35" name="chkSelectRow[]" value="35"></td>                                <td class="left"><a href="javascript:">Canadian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_36" name="chkSelectRow[]" value="36"></td>                                <td class="left"><a href="javascript:">Cape Verdean</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_37" name="chkSelectRow[]" value="37"></td>                                <td class="left"><a href="javascript:">Central African</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_38" name="chkSelectRow[]" value="38"></td>                                <td class="left"><a href="javascript:">Chadian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_39" name="chkSelectRow[]" value="39"></td>                                <td class="left"><a href="javascript:">Chilean</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_40" name="chkSelectRow[]" value="40"></td>                                <td class="left"><a href="javascript:">Chinese</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_41" name="chkSelectRow[]" value="41"></td>                                <td class="left"><a href="javascript:">Colombian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_42" name="chkSelectRow[]" value="42"></td>                                <td class="left"><a href="javascript:">Comoran</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_43" name="chkSelectRow[]" value="43"></td>                                <td class="left"><a href="javascript:">Congolese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_44" name="chkSelectRow[]" value="44"></td>                                <td class="left"><a href="javascript:">Costa Rican</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_45" name="chkSelectRow[]" value="45"></td>                                <td class="left"><a href="javascript:">Croatian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_46" name="chkSelectRow[]" value="46"></td>                                <td class="left"><a href="javascript:">Cuban</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_47" name="chkSelectRow[]" value="47"></td>                                <td class="left"><a href="javascript:">Cypriot</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_48" name="chkSelectRow[]" value="48"></td>                                <td class="left"><a href="javascript:">Czech</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_49" name="chkSelectRow[]" value="49"></td>                                <td class="left"><a href="javascript:">Danish</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_50" name="chkSelectRow[]" value="50"></td>                                <td class="left"><a href="javascript:">Djibouti</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_51" name="chkSelectRow[]" value="51"></td>                                <td class="left"><a href="javascript:">Dominican</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_52" name="chkSelectRow[]" value="52"></td>                                <td class="left"><a href="javascript:">Dutch</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_53" name="chkSelectRow[]" value="53"></td>                                <td class="left"><a href="javascript:">East Timorese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_54" name="chkSelectRow[]" value="54"></td>                                <td class="left"><a href="javascript:">Ecuadorean</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_55" name="chkSelectRow[]" value="55"></td>                                <td class="left"><a href="javascript:">Egyptian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_56" name="chkSelectRow[]" value="56"></td>                                <td class="left"><a href="javascript:">Emirian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_57" name="chkSelectRow[]" value="57"></td>                                <td class="left"><a href="javascript:">Equatorial Guinean</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_58" name="chkSelectRow[]" value="58"></td>                                <td class="left"><a href="javascript:">Eritrean</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_59" name="chkSelectRow[]" value="59"></td>                                <td class="left"><a href="javascript:">Estonian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_60" name="chkSelectRow[]" value="60"></td>                                <td class="left"><a href="javascript:">Ethiopian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_61" name="chkSelectRow[]" value="61"></td>                                <td class="left"><a href="javascript:">Fijian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_62" name="chkSelectRow[]" value="62"></td>                                <td class="left"><a href="javascript:">Filipino</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_63" name="chkSelectRow[]" value="63"></td>                                <td class="left"><a href="javascript:">Finnish</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_64" name="chkSelectRow[]" value="64"></td>                                <td class="left"><a href="javascript:">French</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_65" name="chkSelectRow[]" value="65"></td>                                <td class="left"><a href="javascript:">Gabonese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_66" name="chkSelectRow[]" value="66"></td>                                <td class="left"><a href="javascript:">Gambian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_67" name="chkSelectRow[]" value="67"></td>                                <td class="left"><a href="javascript:">Georgian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_68" name="chkSelectRow[]" value="68"></td>                                <td class="left"><a href="javascript:">German</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_69" name="chkSelectRow[]" value="69"></td>                                <td class="left"><a href="javascript:">Ghanaian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_70" name="chkSelectRow[]" value="70"></td>                                <td class="left"><a href="javascript:">Greek</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_71" name="chkSelectRow[]" value="71"></td>                                <td class="left"><a href="javascript:">Grenadian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_72" name="chkSelectRow[]" value="72"></td>                                <td class="left"><a href="javascript:">Guatemalan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_73" name="chkSelectRow[]" value="73"></td>                                <td class="left"><a href="javascript:">Guinea-Bissauan</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_74" name="chkSelectRow[]" value="74"></td>                                <td class="left"><a href="javascript:">Guinean</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_75" name="chkSelectRow[]" value="75"></td>                                <td class="left"><a href="javascript:">Guyanese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_76" name="chkSelectRow[]" value="76"></td>                                <td class="left"><a href="javascript:">Haitian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_77" name="chkSelectRow[]" value="77"></td>                                <td class="left"><a href="javascript:">Herzegovinian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_78" name="chkSelectRow[]" value="78"></td>                                <td class="left"><a href="javascript:">Honduran</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_79" name="chkSelectRow[]" value="79"></td>                                <td class="left"><a href="javascript:">Hungarian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_80" name="chkSelectRow[]" value="80"></td>                                <td class="left"><a href="javascript:">I-Kiribati</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_81" name="chkSelectRow[]" value="81"></td>                                <td class="left"><a href="javascript:">Icelander</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_82" name="chkSelectRow[]" value="82"></td>                                <td class="left"><a href="javascript:">Indian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_83" name="chkSelectRow[]" value="83"></td>                                <td class="left"><a href="javascript:">Indonesian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_84" name="chkSelectRow[]" value="84"></td>                                <td class="left"><a href="javascript:">Iranian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_85" name="chkSelectRow[]" value="85"></td>                                <td class="left"><a href="javascript:">Iraqi</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_86" name="chkSelectRow[]" value="86"></td>                                <td class="left"><a href="javascript:">Irish</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_87" name="chkSelectRow[]" value="87"></td>                                <td class="left"><a href="javascript:">Israeli</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_88" name="chkSelectRow[]" value="88"></td>                                <td class="left"><a href="javascript:">Italian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_89" name="chkSelectRow[]" value="89"></td>                                <td class="left"><a href="javascript:">Ivorian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_90" name="chkSelectRow[]" value="90"></td>                                <td class="left"><a href="javascript:">Jamaican</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_91" name="chkSelectRow[]" value="91"></td>                                <td class="left"><a href="javascript:">Japanese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_92" name="chkSelectRow[]" value="92"></td>                                <td class="left"><a href="javascript:">Jordanian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_93" name="chkSelectRow[]" value="93"></td>                                <td class="left"><a href="javascript:">Kazakhstani</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_94" name="chkSelectRow[]" value="94"></td>                                <td class="left"><a href="javascript:">Kenyan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_95" name="chkSelectRow[]" value="95"></td>                                <td class="left"><a href="javascript:">Kittian and Nevisian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_96" name="chkSelectRow[]" value="96"></td>                                <td class="left"><a href="javascript:">Kuwaiti</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_97" name="chkSelectRow[]" value="97"></td>                                <td class="left"><a href="javascript:">Kyrgyz</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_98" name="chkSelectRow[]" value="98"></td>                                <td class="left"><a href="javascript:">Laotian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_99" name="chkSelectRow[]" value="99"></td>                                <td class="left"><a href="javascript:">Latvian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_100" name="chkSelectRow[]" value="100"></td>                                <td class="left"><a href="javascript:">Lebanese</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_101" name="chkSelectRow[]" value="101"></td>                                <td class="left"><a href="javascript:">Liberian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_102" name="chkSelectRow[]" value="102"></td>                                <td class="left"><a href="javascript:">Libyan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_103" name="chkSelectRow[]" value="103"></td>                                <td class="left"><a href="javascript:">Liechtensteiner</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_104" name="chkSelectRow[]" value="104"></td>                                <td class="left"><a href="javascript:">Lithuanian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_105" name="chkSelectRow[]" value="105"></td>                                <td class="left"><a href="javascript:">Luxembourger</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_106" name="chkSelectRow[]" value="106"></td>                                <td class="left"><a href="javascript:">Macedonian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_107" name="chkSelectRow[]" value="107"></td>                                <td class="left"><a href="javascript:">Malagasy</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_108" name="chkSelectRow[]" value="108"></td>                                <td class="left"><a href="javascript:">Malawian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_109" name="chkSelectRow[]" value="109"></td>                                <td class="left"><a href="javascript:">Malaysian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_110" name="chkSelectRow[]" value="110"></td>                                <td class="left"><a href="javascript:">Maldivan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_111" name="chkSelectRow[]" value="111"></td>                                <td class="left"><a href="javascript:">Malian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_112" name="chkSelectRow[]" value="112"></td>                                <td class="left"><a href="javascript:">Maltese</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_113" name="chkSelectRow[]" value="113"></td>                                <td class="left"><a href="javascript:">Marshallese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_114" name="chkSelectRow[]" value="114"></td>                                <td class="left"><a href="javascript:">Mauritanian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_115" name="chkSelectRow[]" value="115"></td>                                <td class="left"><a href="javascript:">Mauritian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_116" name="chkSelectRow[]" value="116"></td>                                <td class="left"><a href="javascript:">Mexican</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_117" name="chkSelectRow[]" value="117"></td>                                <td class="left"><a href="javascript:">Micronesian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_118" name="chkSelectRow[]" value="118"></td>                                <td class="left"><a href="javascript:">Moldovan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_119" name="chkSelectRow[]" value="119"></td>                                <td class="left"><a href="javascript:">Monacan</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_120" name="chkSelectRow[]" value="120"></td>                                <td class="left"><a href="javascript:">Mongolian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_121" name="chkSelectRow[]" value="121"></td>                                <td class="left"><a href="javascript:">Moroccan</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_122" name="chkSelectRow[]" value="122"></td>                                <td class="left"><a href="javascript:">Mosotho</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_123" name="chkSelectRow[]" value="123"></td>                                <td class="left"><a href="javascript:">Motswana</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_124" name="chkSelectRow[]" value="124"></td>                                <td class="left"><a href="javascript:">Mozambican</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_125" name="chkSelectRow[]" value="125"></td>                                <td class="left"><a href="javascript:">Namibian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_126" name="chkSelectRow[]" value="126"></td>                                <td class="left"><a href="javascript:">Nauruan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_127" name="chkSelectRow[]" value="127"></td>                                <td class="left"><a href="javascript:">Nepalese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_128" name="chkSelectRow[]" value="128"></td>                                <td class="left"><a href="javascript:">New Zealander</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_129" name="chkSelectRow[]" value="129"></td>                                <td class="left"><a href="javascript:">Nicaraguan</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_130" name="chkSelectRow[]" value="130"></td>                                <td class="left"><a href="javascript:">Nigerian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_131" name="chkSelectRow[]" value="131"></td>                                <td class="left"><a href="javascript:">Nigerien</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_132" name="chkSelectRow[]" value="132"></td>                                <td class="left"><a href="javascript:">North Korean</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_133" name="chkSelectRow[]" value="133"></td>                                <td class="left"><a href="javascript:">Northern Irish</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_134" name="chkSelectRow[]" value="134"></td>                                <td class="left"><a href="javascript:">Norwegian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_135" name="chkSelectRow[]" value="135"></td>                                <td class="left"><a href="javascript:">Omani</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_136" name="chkSelectRow[]" value="136"></td>                                <td class="left"><a href="javascript:">Pakistani</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_137" name="chkSelectRow[]" value="137"></td>                                <td class="left"><a href="javascript:">Palauan</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_138" name="chkSelectRow[]" value="138"></td>                                <td class="left"><a href="javascript:">Panamanian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_139" name="chkSelectRow[]" value="139"></td>                                <td class="left"><a href="javascript:">Papua New Guinean</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_140" name="chkSelectRow[]" value="140"></td>                                <td class="left"><a href="javascript:">Paraguayan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_141" name="chkSelectRow[]" value="141"></td>                                <td class="left"><a href="javascript:">Peruvian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_142" name="chkSelectRow[]" value="142"></td>                                <td class="left"><a href="javascript:">Polish</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_143" name="chkSelectRow[]" value="143"></td>                                <td class="left"><a href="javascript:">Portuguese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_144" name="chkSelectRow[]" value="144"></td>                                <td class="left"><a href="javascript:">Qatari</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_145" name="chkSelectRow[]" value="145"></td>                                <td class="left"><a href="javascript:">Romanian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_146" name="chkSelectRow[]" value="146"></td>                                <td class="left"><a href="javascript:">Russian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_147" name="chkSelectRow[]" value="147"></td>                                <td class="left"><a href="javascript:">Rwandan</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_148" name="chkSelectRow[]" value="148"></td>                                <td class="left"><a href="javascript:">Saint Lucian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_149" name="chkSelectRow[]" value="149"></td>                                <td class="left"><a href="javascript:">Salvadoran</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_150" name="chkSelectRow[]" value="150"></td>                                <td class="left"><a href="javascript:">Samoan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_151" name="chkSelectRow[]" value="151"></td>                                <td class="left"><a href="javascript:">San Marinese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_152" name="chkSelectRow[]" value="152"></td>                                <td class="left"><a href="javascript:">Sao Tomean</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_153" name="chkSelectRow[]" value="153"></td>                                <td class="left"><a href="javascript:">Saudi</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_154" name="chkSelectRow[]" value="154"></td>                                <td class="left"><a href="javascript:">Scottish</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_155" name="chkSelectRow[]" value="155"></td>                                <td class="left"><a href="javascript:">Senegalese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_156" name="chkSelectRow[]" value="156"></td>                                <td class="left"><a href="javascript:">Serbian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_157" name="chkSelectRow[]" value="157"></td>                                <td class="left"><a href="javascript:">Seychellois</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_158" name="chkSelectRow[]" value="158"></td>                                <td class="left"><a href="javascript:">Sierra Leonean</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_159" name="chkSelectRow[]" value="159"></td>                                <td class="left"><a href="javascript:">Singaporean</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_160" name="chkSelectRow[]" value="160"></td>                                <td class="left"><a href="javascript:">Slovakian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_161" name="chkSelectRow[]" value="161"></td>                                <td class="left"><a href="javascript:">Slovenian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_162" name="chkSelectRow[]" value="162"></td>                                <td class="left"><a href="javascript:">Solomon Islander</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_163" name="chkSelectRow[]" value="163"></td>                                <td class="left"><a href="javascript:">Somali</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_164" name="chkSelectRow[]" value="164"></td>                                <td class="left"><a href="javascript:">South African</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_165" name="chkSelectRow[]" value="165"></td>                                <td class="left"><a href="javascript:">South Korean</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_166" name="chkSelectRow[]" value="166"></td>                                <td class="left"><a href="javascript:">Spanish</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_167" name="chkSelectRow[]" value="167"></td>                                <td class="left"><a href="javascript:">Sri Lankan</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_168" name="chkSelectRow[]" value="168"></td>                                <td class="left"><a href="javascript:">Sudanese</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_169" name="chkSelectRow[]" value="169"></td>                                <td class="left"><a href="javascript:">Surinamer</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_170" name="chkSelectRow[]" value="170"></td>                                <td class="left"><a href="javascript:">Swazi</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_171" name="chkSelectRow[]" value="171"></td>                                <td class="left"><a href="javascript:">Swedish</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_172" name="chkSelectRow[]" value="172"></td>                                <td class="left"><a href="javascript:">Swiss</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_173" name="chkSelectRow[]" value="173"></td>                                <td class="left"><a href="javascript:">Syrian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_174" name="chkSelectRow[]" value="174"></td>                                <td class="left"><a href="javascript:">Taiwanese</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_175" name="chkSelectRow[]" value="175"></td>                                <td class="left"><a href="javascript:">Tajik</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_176" name="chkSelectRow[]" value="176"></td>                                <td class="left"><a href="javascript:">Tanzanian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_177" name="chkSelectRow[]" value="177"></td>                                <td class="left"><a href="javascript:">Thai</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_178" name="chkSelectRow[]" value="178"></td>                                <td class="left"><a href="javascript:">Togolese</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_179" name="chkSelectRow[]" value="179"></td>                                <td class="left"><a href="javascript:">Tongan</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_180" name="chkSelectRow[]" value="180"></td>                                <td class="left"><a href="javascript:">Trinidadian or Tobagonian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_181" name="chkSelectRow[]" value="181"></td>                                <td class="left"><a href="javascript:">Tunisian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_182" name="chkSelectRow[]" value="182"></td>                                <td class="left"><a href="javascript:">Turkish</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_183" name="chkSelectRow[]" value="183"></td>                                <td class="left"><a href="javascript:">Tuvaluan</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_184" name="chkSelectRow[]" value="184"></td>                                <td class="left"><a href="javascript:">Ugandan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_185" name="chkSelectRow[]" value="185"></td>                                <td class="left"><a href="javascript:">Ukrainian</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_186" name="chkSelectRow[]" value="186"></td>                                <td class="left"><a href="javascript:">Uruguayan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_187" name="chkSelectRow[]" value="187"></td>                                <td class="left"><a href="javascript:">Uzbekistani</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_188" name="chkSelectRow[]" value="188"></td>                                <td class="left"><a href="javascript:">Venezuelan</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_189" name="chkSelectRow[]" value="189"></td>                                <td class="left"><a href="javascript:">Vietnamese</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_190" name="chkSelectRow[]" value="190"></td>                                <td class="left"><a href="javascript:">Welsh</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_191" name="chkSelectRow[]" value="191"></td>                                <td class="left"><a href="javascript:">Yemenite</a></td>
                                            </tr>
                                            <tr class="even">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_192" name="chkSelectRow[]" value="192"></td>                                <td class="left"><a href="javascript:">Zambian</a></td>
                                            </tr>
                                            <tr class="odd">
                                                <td><input type="checkbox" id="ohrmList_chkSelectRecord_193" name="chkSelectRow[]" value="193"></td>                                <td class="left"><a href="javascript:">Zimbabwean</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- tableWrapper -->
                                </form> <!-- frmList_ohrmListComponent -->


                            </div> <!-- inner -->

                        </div> <!-- search-results -->
                    </div>

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
                            <input type="button" class="btn reset" data-dismiss="modal" value="Cancel">
                        </div>
                    </div>
                    <!-- Confirmation box HTML: Ends -->
                </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div id="nationality" class="box" style="display: block;">

                    <div class="head"><h1 id="nationalityHeading">Add Nationality</h1></div>

                    <div class="inner">

                        <form name="frmNationality" id="frmNationality" method="post" action="/hrm/symfony/web/index.php/admin/nationality" novalidate="novalidate">

                            <input type="hidden" name="nationality[_csrf_token]" value="cc0eb44b95bfa086d79c08e5eb25e249" id="nationality__csrf_token">            <input type="hidden" name="nationality[nationalityId]" id="nationality_nationalityId" value=""><input type="hidden" name="nationality[_csrf_token]" value="cc0eb44b95bfa086d79c08e5eb25e249" id="nationality__csrf_token">
                            <fieldset>
                                <ol>
                                    <li>
                                        <label for="nationality_name">Name <em>*</em></label>                        <input type="text" name="nationality[name]" class="formInput" maxlength="100" id="nationality_name">                    </li>
                                    <li class="required">
                                        <em>*</em> Required field                    </li>
                                </ol>

                                <p>
                                    <input type="button" class="savebutton" name="btnSave" id="btnSave" value="Save">
                                    <input type="button" class="reset" name="btnCancel" id="btnCancel" value="Cancel">
                                </p>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>