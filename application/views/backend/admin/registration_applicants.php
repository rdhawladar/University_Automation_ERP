<div class="row">
    <div class="col-md-12">
        <!--<p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"><span class="subhead">Status</span></a></p>-->
        <!--<div id="light" class="white_content">
    <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
    <p>&nbsp;</p><p>&nbsp;</p>
    <h2>Applicants</h2>
    <p>&nbsp;</p>
    <p>Lorem..</p>
        </div>
        <div id="fade" class="black_overlay"></div>-->
        <?php

        $today = date('Y-m-d');

        // $data = $this->db->query("select from acd_session where is_open = 1 AND strt_dt <= '{$today}'
        //AND end_dt >= '{$today}'");
        $data = $this->db->get_where('acd_session' , array('is_open' => 1, 'strt_dt <= ' => $today,'end_dt >= ' => $today))->result_array();
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic Session - ".$data[0]['name'];
        ?>
        <p>&nbsp;</p>
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">

            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('student_application_list');?>
                </a></li>

            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_student_application');?>
                </a></li>


        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active onad" id="list">
                <div class="col-md-12">
                    <?php echo form_open(base_url() . 'index.php?admin/online_admission_details/details' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'method'=>'POST'));?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-5"><?php echo get_phrase('GPA_from');?></label>
                            <div class="col-sm-12">
                                <select name="first" id=""><?php echo get_phrase('select')?>
                                    <option value="10">10</option>
                                    <option value="9">9</option>
                                    <option value="8">8</option>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-5"><?php echo get_phrase('GPA_to');?></label>
                            <div class="col-sm-12">
                                <select name="second" id=""><?php echo get_phrase('select')?>
                                    <option value="10">10</option>
                                    <option value="9">9</option>
                                    <option value="8">8</option>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group test32">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
                        </div>
                    </div>
                    </form>

                </div>
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <!--<th width="80"><div><?php /*echo get_phrase('Photo');*/?></div></th>-->
                        <th><div><?php echo get_phrase('ID');?></div></th>
                        <th><div><?php echo get_phrase('Name');?></div></th>
                        <th><div><?php echo get_phrase('father_name');?></div></th>
                        <th><div><?php echo get_phrase('mother_name');?></div></th>
                        <th><div><?php echo get_phrase('Applied_for');?></div></th>
                        <th><div><?php echo get_phrase('SSC');?></div></th>
                        <th><div><?php echo get_phrase('HSC');?></div></th>
                        <th><div><?php echo get_phrase('total_gpa');?></div></th>
                        <th><div><?php echo get_phrase('status');?></div></th>
                        <th><div><?php echo get_phrase('Actions');?></div></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    ?>
                    <?php $count = 1;foreach($osadStudent as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <!--<td><img src="<?php /*echo $this->crud_model->get_image_url('osad_student',$row['id']);*/?>" class="img-circle" width="30" /></td>-->
                            <!--<td><img src="<?php /*echo "assets/images/applicants/".$row[photo]; */?>" width="30" height="30" /></td>-->
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name_en'];?></td>
                            <td><?php echo $row['father_name'];?></td>
                            <td><?php echo $row['mother_name'];?></td>
                            <td><?php echo $row['first_choice'].", ".$row['second_choice'];?></td>
                            <td><?php echo $row['ssc_result'];?></td>

                            <td><?php echo $row['hsc_result'];?></td>
                            <td><?php echo $row['total_gpa'];?></td>
                            <td><?php
                                if($row['applicant_status']){
                                    echo $row['applicant_status'];
                                }
                                else{
                                    echo "Not Listed";
                                }
                                ?>
                            </td>
                            <!--<td>
                                <?php
                            /*                                $acd_quali = $this->db->where('osad_student_id',$row['id']);
                                                            $acd_quali = $this->db->get('osad_acd_history')->result_array();
                                                            foreach($acd_quali as $row13):
                                                                */?>
                                    <div style=" float: left;border: 1px solid #cccccc; padding: 5%;"><?php /*echo $row13['special_mark'];*/?></div>
                                    <?php
                            /*                                endforeach;
                                                            */?>
                            </td>-->
                            <!--<td>
                                <?php
                            /*                                $query = $this->db->select_sum('special_mark');
                                                            $query = $this->db->from('osad_acd_history');
                                                            $query = $this->db->where('osad_student_id', $row['id']);
                                                            $query = $this->db->get()->result_array();
                                                            foreach($query as $row4):
                                                                echo $row4['special_mark'];
                                                            endforeach;
                                                            */?>
                            </td>-->
                            <!--<td><?php /*echo $row['pay_status'];*/?></td>-->
                            <!--<td><?php /*echo date('d/m/Y',strtotime($row['app_date']));//echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);*/?></td>-->
                            <td>

                                <a href="<?php echo base_url();?>index.php?admin/osadStudRept/<?php echo $row['id'];?>" target="_blank">
                                    <i class="entypo-doc-text-inv"></i>
                                    <?php echo get_phrase('Report');?>
                                </a>

                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_registration_applicants/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_online_adm_profile/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('profile');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/online_admission/delete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete');?>
                                </a>
                                <!--              <div class="btn-group">
                                                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                      Action <span class="caret"></span>
                                                  </button>
                                                  <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                                      <!-- EDITING LINK -->
                                <!--           <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_acd_session/<?php echo $row['id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>-->

                                <!-- DELETION LINK -->
                                <!-- <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/acd_session/delete/<?php echo $row['id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>-->
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box onad" id="add">
                <br />
                <div class="box-content">
                    <?php if(count($data)>0){?>
                        <?php echo form_open(base_url() . 'index.php?admin/online_admission/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

                        <input type="text" style="display:none" class="form-control" name="acd_session_id" value="<?php echo $data[0]['id'];?>" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">

                        <div class="padded">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('name_bangla');?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="name_bn" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('name_english');?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="name_en" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('father_name');?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="father_name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('mother_name');?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="mother_name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"></label>
                                    <div class="col-sm-12">
                                        <?php echo get_phrase('FFS');?>
                                        <!--							<input type="checkbox" class="form-control" name="ff_son" data-validate="required" data-message-required="--><?php //echo get_phrase('value_required');?><!--" value="">-->
                                        <!--							<input type="checkbox" class="form-control" name="ff_son" value="">-->
                                        <select name="ff_son" class="form-control">
                                            <option value=""><?php echo get_phrase('select');?></option>
                                            <option value="yes"><?php echo get_phrase('yes');?></option>
                                            <option value="no"><?php echo get_phrase('no');?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"></label>
                                    <div class="col-sm-12">
                                        <?php echo get_phrase('upjati');?>
                                        <!--							<input type="checkbox" class="form-control" name="upojati" data-validate="required" data-message-required="--><?php //echo get_phrase('value_required');?><!--" value="">-->
                                        <!--							<input type="checkbox" class="form-control" name="upojati" value="">-->
                                        <select name="upjati" class="form-control">
                                            <option value=""><?php echo get_phrase('select');?></option>
                                            <option value="yes"><?php echo get_phrase('yes');?></option>
                                            <option value="no"><?php echo get_phrase('no');?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('guardian_name');?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="gardian_name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('Nationality');?></label>

                                    <div class="col-sm-12">
                                        <!--							<input type="text" class="form-control" name="nationality" data-validate="required" data-message-required="--><?php //echo get_phrase('value_required');?><!--" value="">-->
                                        <select name="nationality">
                                            <option value="">-- select one --</option>
                                            <option value="afghan">Afghan</option>
                                            <option value="albanian">Albanian</option>
                                            <option value="algerian">Algerian</option>
                                            <option value="american">American</option>
                                            <option value="andorran">Andorran</option>
                                            <option value="angolan">Angolan</option>
                                            <option value="antiguans">Antiguans</option>
                                            <option value="argentinean">Argentinean</option>
                                            <option value="armenian">Armenian</option>
                                            <option value="australian">Australian</option>
                                            <option value="austrian">Austrian</option>
                                            <option value="azerbaijani">Azerbaijani</option>
                                            <option value="bahamian">Bahamian</option>
                                            <option value="bahraini">Bahraini</option>
                                            <option value="bangladeshi">Bangladeshi</option>
                                            <option value="barbadian">Barbadian</option>
                                            <option value="barbudans">Barbudans</option>
                                            <option value="batswana">Batswana</option>
                                            <option value="belarusian">Belarusian</option>
                                            <option value="belgian">Belgian</option>
                                            <option value="belizean">Belizean</option>
                                            <option value="beninese">Beninese</option>
                                            <option value="bhutanese">Bhutanese</option>
                                            <option value="bolivian">Bolivian</option>
                                            <option value="bosnian">Bosnian</option>
                                            <option value="brazilian">Brazilian</option>
                                            <option value="british">British</option>
                                            <option value="bruneian">Bruneian</option>
                                            <option value="bulgarian">Bulgarian</option>
                                            <option value="burkinabe">Burkinabe</option>
                                            <option value="burmese">Burmese</option>
                                            <option value="burundian">Burundian</option>
                                            <option value="cambodian">Cambodian</option>
                                            <option value="cameroonian">Cameroonian</option>
                                            <option value="canadian">Canadian</option>
                                            <option value="cape verdean">Cape Verdean</option>
                                            <option value="central african">Central African</option>
                                            <option value="chadian">Chadian</option>
                                            <option value="chilean">Chilean</option>
                                            <option value="chinese">Chinese</option>
                                            <option value="colombian">Colombian</option>
                                            <option value="comoran">Comoran</option>
                                            <option value="congolese">Congolese</option>
                                            <option value="costa rican">Costa Rican</option>
                                            <option value="croatian">Croatian</option>
                                            <option value="cuban">Cuban</option>
                                            <option value="cypriot">Cypriot</option>
                                            <option value="czech">Czech</option>
                                            <option value="danish">Danish</option>
                                            <option value="djibouti">Djibouti</option>
                                            <option value="dominican">Dominican</option>
                                            <option value="dutch">Dutch</option>
                                            <option value="east timorese">East Timorese</option>
                                            <option value="ecuadorean">Ecuadorean</option>
                                            <option value="egyptian">Egyptian</option>
                                            <option value="emirian">Emirian</option>
                                            <option value="equatorial guinean">Equatorial Guinean</option>
                                            <option value="eritrean">Eritrean</option>
                                            <option value="estonian">Estonian</option>
                                            <option value="ethiopian">Ethiopian</option>
                                            <option value="fijian">Fijian</option>
                                            <option value="filipino">Filipino</option>
                                            <option value="finnish">Finnish</option>
                                            <option value="french">French</option>
                                            <option value="gabonese">Gabonese</option>
                                            <option value="gambian">Gambian</option>
                                            <option value="georgian">Georgian</option>
                                            <option value="german">German</option>
                                            <option value="ghanaian">Ghanaian</option>
                                            <option value="greek">Greek</option>
                                            <option value="grenadian">Grenadian</option>
                                            <option value="guatemalan">Guatemalan</option>
                                            <option value="guinea-bissauan">Guinea-Bissauan</option>
                                            <option value="guinean">Guinean</option>
                                            <option value="guyanese">Guyanese</option>
                                            <option value="haitian">Haitian</option>
                                            <option value="herzegovinian">Herzegovinian</option>
                                            <option value="honduran">Honduran</option>
                                            <option value="hungarian">Hungarian</option>
                                            <option value="icelander">Icelander</option>
                                            <option value="indian">Indian</option>
                                            <option value="indonesian">Indonesian</option>
                                            <option value="iranian">Iranian</option>
                                            <option value="iraqi">Iraqi</option>
                                            <option value="irish">Irish</option>
                                            <option value="israeli">Israeli</option>
                                            <option value="italian">Italian</option>
                                            <option value="ivorian">Ivorian</option>
                                            <option value="jamaican">Jamaican</option>
                                            <option value="japanese">Japanese</option>
                                            <option value="jordanian">Jordanian</option>
                                            <option value="kazakhstani">Kazakhstani</option>
                                            <option value="kenyan">Kenyan</option>
                                            <option value="kittian and nevisian">Kittian and Nevisian</option>
                                            <option value="kuwaiti">Kuwaiti</option>
                                            <option value="kyrgyz">Kyrgyz</option>
                                            <option value="laotian">Laotian</option>
                                            <option value="latvian">Latvian</option>
                                            <option value="lebanese">Lebanese</option>
                                            <option value="liberian">Liberian</option>
                                            <option value="libyan">Libyan</option>
                                            <option value="liechtensteiner">Liechtensteiner</option>
                                            <option value="lithuanian">Lithuanian</option>
                                            <option value="luxembourger">Luxembourger</option>
                                            <option value="macedonian">Macedonian</option>
                                            <option value="malagasy">Malagasy</option>
                                            <option value="malawian">Malawian</option>
                                            <option value="malaysian">Malaysian</option>
                                            <option value="maldivan">Maldivan</option>
                                            <option value="malian">Malian</option>
                                            <option value="maltese">Maltese</option>
                                            <option value="marshallese">Marshallese</option>
                                            <option value="mauritanian">Mauritanian</option>
                                            <option value="mauritian">Mauritian</option>
                                            <option value="mexican">Mexican</option>
                                            <option value="micronesian">Micronesian</option>
                                            <option value="moldovan">Moldovan</option>
                                            <option value="monacan">Monacan</option>
                                            <option value="mongolian">Mongolian</option>
                                            <option value="moroccan">Moroccan</option>
                                            <option value="mosotho">Mosotho</option>
                                            <option value="motswana">Motswana</option>
                                            <option value="mozambican">Mozambican</option>
                                            <option value="namibian">Namibian</option>
                                            <option value="nauruan">Nauruan</option>
                                            <option value="nepalese">Nepalese</option>
                                            <option value="new zealander">New Zealander</option>
                                            <option value="ni-vanuatu">Ni-Vanuatu</option>
                                            <option value="nicaraguan">Nicaraguan</option>
                                            <option value="nigerien">Nigerien</option>
                                            <option value="north korean">North Korean</option>
                                            <option value="northern irish">Northern Irish</option>
                                            <option value="norwegian">Norwegian</option>
                                            <option value="omani">Omani</option>
                                            <option value="pakistani">Pakistani</option>
                                            <option value="palauan">Palauan</option>
                                            <option value="panamanian">Panamanian</option>
                                            <option value="papua new guinean">Papua New Guinean</option>
                                            <option value="paraguayan">Paraguayan</option>
                                            <option value="peruvian">Peruvian</option>
                                            <option value="polish">Polish</option>
                                            <option value="portuguese">Portuguese</option>
                                            <option value="qatari">Qatari</option>
                                            <option value="romanian">Romanian</option>
                                            <option value="russian">Russian</option>
                                            <option value="rwandan">Rwandan</option>
                                            <option value="saint lucian">Saint Lucian</option>
                                            <option value="salvadoran">Salvadoran</option>
                                            <option value="samoan">Samoan</option>
                                            <option value="san marinese">San Marinese</option>
                                            <option value="sao tomean">Sao Tomean</option>
                                            <option value="saudi">Saudi</option>
                                            <option value="scottish">Scottish</option>
                                            <option value="senegalese">Senegalese</option>
                                            <option value="serbian">Serbian</option>
                                            <option value="seychellois">Seychellois</option>
                                            <option value="sierra leonean">Sierra Leonean</option>
                                            <option value="singaporean">Singaporean</option>
                                            <option value="slovakian">Slovakian</option>
                                            <option value="slovenian">Slovenian</option>
                                            <option value="solomon islander">Solomon Islander</option>
                                            <option value="somali">Somali</option>
                                            <option value="south african">South African</option>
                                            <option value="south korean">South Korean</option>
                                            <option value="spanish">Spanish</option>
                                            <option value="sri lankan">Sri Lankan</option>
                                            <option value="sudanese">Sudanese</option>
                                            <option value="surinamer">Surinamer</option>
                                            <option value="swazi">Swazi</option>
                                            <option value="swedish">Swedish</option>
                                            <option value="swiss">Swiss</option>
                                            <option value="syrian">Syrian</option>
                                            <option value="taiwanese">Taiwanese</option>
                                            <option value="tajik">Tajik</option>
                                            <option value="tanzanian">Tanzanian</option>
                                            <option value="thai">Thai</option>
                                            <option value="togolese">Togolese</option>
                                            <option value="tongan">Tongan</option>
                                            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                            <option value="tunisian">Tunisian</option>
                                            <option value="turkish">Turkish</option>
                                            <option value="tuvaluan">Tuvaluan</option>
                                            <option value="ugandan">Ugandan</option>
                                            <option value="ukrainian">Ukrainian</option>
                                            <option value="uruguayan">Uruguayan</option>
                                            <option value="uzbekistani">Uzbekistani</option>
                                            <option value="venezuelan">Venezuelan</option>
                                            <option value="vietnamese">Vietnamese</option>
                                            <option value="welsh">Welsh</option>
                                            <option value="yemenite">Yemenite</option>
                                            <option value="zambian">Zambian</option>
                                            <option value="zimbabwean">Zimbabwean</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('birthday');?></label>

                                    <div class="col-sm-12">
                                        <input type="text" class="form-control datepicker" name="birthday" value="" data-start-view="2">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('religion');?></label>
                                    <div class="col-sm-12">
                                        <select name="religion" class="form-control">
                                            <option value=""><?php echo get_phrase('select');?></option>
                                            <option value="Islam"><?php echo get_phrase('islam');?></option>
                                            <option value="Hinduism"><?php echo get_phrase('hinduism');?></option>
                                            <option value="Christianity"><?php echo get_phrase('christianity');?></option>
                                            <option value="Buddhism"><?php echo get_phrase('buddhism');?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('gender');?></label>

                                    <div class="col-sm-12">
                                        <select name="sex" class="form-control">
                                            <option value=""><?php echo get_phrase('select');?></option>
                                            <option value="male"><?php echo get_phrase('male');?></option>
                                            <option value="female"><?php echo get_phrase('female');?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('phone');?></label>

                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="phone" value="" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('email');?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="email" value="">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('Permanent_address');?></label>

                                    <div class="col-sm-12">

                                        <textarea type="text" class="form-control" name="pr_address" value="" ></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5"><?php echo get_phrase('Current_address');?></label>

                                    <div class="col-sm-12">

                                        <textarea type="text" class="form-control" name="cur_address" value="" ></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <select id="type">
                                        <option value="#">Please Select</option>
                                        <option value="item1">Ist Choose</option>
                                        <option value="item2">2nd Choose</option>
                                    </select>

                                    <select id="size">
                                        <option value="">-- select one -- </option>
                                    </select>
                                    <script>
                                        $(document).ready(function () {
                                            $("#type").change(function () {
                                                var val = $(this).val();
                                                if (val == "item1") {
                                                    $("#size").html("<option value='test'>B.sc</option><option value='test2'>Honors</option><option value='test2'>Masters</option>");
                                                } else if (val == "item2") {
                                                    $("#size").html("<option value='test'>B.sc</option><option value='test2'>Honors</option><option value='test2'>Masters</option>");
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select id="type1">
                                        <option value="#">Please Select Faculty</option>
                                        <option value="item5">Science & Engineering</option>
                                        <option value="item6">Business Studies</option>
                                        <option value="item7">Arts & Humanities</option>
                                        <option value="item8">Social Science</option>
                                        <option value="item9">Islamic Studies</option>
                                        <option value="item10">Law</option>
                                    </select>

                                    <select id="size1" name="technology1">
                                        <option value="">-- select one -- </option>
                                    </select>
                                    <script>
                                        $(document).ready(function () {
                                            $("#type1").change(function () {
                                                var val = $(this).val();
                                                if (val == "item5") {
                                                    $("#size1").html("<option value='Computer Science & Engineering (CSE)'>Computer Science & Engineering (CSE)</option><option value='Electrical & electronics Engineering (EEE)'>Electrical & electronics Engineering (EEE)</option>");
                                                } else if (val == "item6") {
                                                    $("#size1").html("<option value='BBA'>BBA</option><option value='MBA'>MBA</option><option value='EMBA'>EMBA</option>");
                                                } else if (val == "item7") {
                                                    $("#size1").html("<option value='English'>English</option>");
                                                } else if (val == "item8") {
                                                    $("#size1").html("<option value='Economics'>Economics</option><option value='Sociology'>Sociology</option>");
                                                } else if (val == "item9") {
                                                    $("#size1").html("<option value='Islamic Studies'>Islamic Studies</option>");
                                                } else if (val == "item10") {
                                                    $("#size1").html("<option value='LAW'>LAW</option>");
                                                }

                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div style="clear:both;width:100%;">&nbsp;</div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select id="typea">
                                        <option value="#">Please Select</option>
                                        <option value="item1a">Ist Choose</option>
                                        <option value="item2a">2nd Choose</option>
                                    </select>

                                    <select id="sizea">
                                        <option value="">-- select one -- </option>
                                    </select>
                                    <script>
                                        $(document).ready(function () {
                                            $("#typea").change(function () {
                                                var val = $(this).val();
                                                if (val == "item1a") {
                                                    $("#sizea").html("<option value='test'>B.sc</option><option value='test2'>Honors</option><option value='test2'>Masters</option>");
                                                } else if (val == "item2a") {
                                                    $("#sizea").html("<option value='test'>B.sc</option><option value='test2'>Honors</option><option value='test2'>Masters</option>");
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select id="type1a">
                                        <option value="#">Please Select Faculty</option>
                                        <option value="item5a">Science & Engineering</option>
                                        <option value="item6a">Business Studies</option>
                                        <option value="item7a">Arts & Humanities</option>
                                        <option value="item8a">Social Science</option>
                                        <option value="item9a">Islamic Studies</option>
                                        <option value="item10a">Law</option>
                                    </select>

                                    <select id="size1a" name="technology2">
                                        <option value="">-- select one -- </option>
                                    </select>
                                    <script>
                                        $(document).ready(function () {
                                            $("#type1a").change(function () {
                                                var val = $(this).val();
                                                if (val == "item5a") {
                                                    $("#size1a").html("<option value='Computer Science & Engineering (CSE)'>Computer Science & Engineering (CSE)</option><option value='Electrical & electronics Engineering (EEE)'>Electrical & electronics Engineering (EEE)</option>");
                                                } else if (val == "item6a") {
                                                    $("#size1a").html("<option value='BBA'>BBA</option><option value='MBA'>MBA</option><option value='EMBA'>EMBA</option>");
                                                } else if (val == "item7a") {
                                                    $("#size1a").html("<option value='English'>English</option>");
                                                } else if (val == "item8a") {
                                                    $("#size1a").html("<option value='Economics'>Economics</option><option value='Sociology'>Sociology</option>");
                                                } else if (val == "item9a") {
                                                    $("#size1a").html("<option value='Islamic Studies'>Islamic Studies</option>");
                                                } else if (val == "item10a") {
                                                    $("#size1a").html("<option value='LAW'>LAW</option>");
                                                }

                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <!--<div class="col-md-4">
                        <div class="form-group">
						<label for="field-1" class="col-sm-5"><?php /*echo get_phrase('department');*/?></label>
							<select name="technology1" class="form-control" style="margin: 10px 0;">
                              <option value=""><?php /*echo get_phrase('select_as_first_choose');*/?></option>
                              <option value="computer Science & Engineering"><?php /*echo get_phrase('computer_science_&_engineering');*/?></option>
                              <option value="electrical & electronic engineering"><?php /*echo get_phrase('electrical_&_electronic_engineering');*/?></option>
                              <option value="bba"><?php /*echo get_phrase('BBA');*/?></option>
                              <option value="mba"><?php /*echo get_phrase('MBA');*/?></option>
                              <option value="emba"><?php /*echo get_phrase('EMBA');*/?></option>
                              <option value="english"><?php /*echo get_phrase('english');*/?></option>
                              <option value="economics"><?php /*echo get_phrase('economics');*/?></option>
                              <option value="sociology"><?php /*echo get_phrase('sociology');*/?></option>
                              <option value="islamic studies"><?php /*echo get_phrase('islamic_studies');*/?></option>
                              <option value="law"><?php /*echo get_phrase('law');*/?></option>
                          </select>
                            <select name="technology2" class="form-control" style="margin: 10px 0;">
                                <option value=""><?php /*echo get_phrase('select_as_second_choose');*/?></option>
                                <option value="computer Science & Engineering"><?php /*echo get_phrase('computer_science_&_engineering');*/?></option>
                                <option value="electrical & electronic engineering"><?php /*echo get_phrase('electrical_&_electronic_engineering');*/?></option>
                                <option value="bba"><?php /*echo get_phrase('BBA');*/?></option>
                                <option value="mba"><?php /*echo get_phrase('MBA');*/?></option>
                                <option value="emba"><?php /*echo get_phrase('EMBA');*/?></option>
                                <option value="english"><?php /*echo get_phrase('english');*/?></option>
                                <option value="economics"><?php /*echo get_phrase('economics');*/?></option>
                                <option value="sociology"><?php /*echo get_phrase('sociology');*/?></option>
                                <option value="islamic studies"><?php /*echo get_phrase('islamic_studies');*/?></option>
                                <option value="law"><?php /*echo get_phrase('law');*/?></option>
                            </select>
                            <select name="technology3" class="form-control" style="margin: 10px 0;">
                                <option value=""><?php /*echo get_phrase('select_as_third_choose');*/?></option>
                                <option value="computer Science & Engineering"><?php /*echo get_phrase('computer_science_&_engineering');*/?></option>
                                <option value="electrical & electronic engineering"><?php /*echo get_phrase('electrical_&_electronic_engineering');*/?></option>
                                <option value="bba"><?php /*echo get_phrase('BBA');*/?></option>
                                <option value="mba"><?php /*echo get_phrase('MBA');*/?></option>
                                <option value="emba"><?php /*echo get_phrase('EMBA');*/?></option>
                                <option value="english"><?php /*echo get_phrase('english');*/?></option>
                                <option value="economics"><?php /*echo get_phrase('economics');*/?></option>
                                <option value="sociology"><?php /*echo get_phrase('sociology');*/?></option>
                                <option value="islamic studies"><?php /*echo get_phrase('islamic_studies');*/?></option>
                                <option value="law"><?php /*echo get_phrase('law');*/?></option>
                            </select>

					</div>
					   </div>-->
                        </div>
                        <br />

                        <div class="form-group test32">

                            <div class="table-responsive test32">
                                <input type="text" style="display:none" class="form-control" name="ttldtl" id="ttldtl">
                                <table class="table table-bordered table-hover" id="tab_logic">
                                    <thead>
                                    <tr >
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Exam
                                        </th>
                                        <th class="text-center">
                                            Group/Trade
                                        </th>
                                        <th class="text-center">
                                            Board
                                        </th>
                                        <th class="text-center">
                                            Passing Year
                                        </th>
                                        </th>
                                        <th class="text-center">
                                            GM Marks
                                        </th>
                                        </th>
                                        <th class="text-center">
                                            Total Marks
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id='addr0'>
                                        <td>
                                            1
                                        </td>
                                        <td>

                                            <select name="examtype0" class="form-control">
                                                <option value=""><?php echo get_phrase('select');?></option>
                                                <option value="SSC-GENERAL"><?php echo get_phrase('SSC(General)');?></option>
                                                <option value="SSC-VOCATIONAL"><?php echo get_phrase('SSC(Vocational)');?></option>
                                                <option value="TRADE"><?php echo get_phrase('Trade(Two-Years)');?></option>
                                                <option value="DAKHIL"><?php echo get_phrase('Dakhil(Vocational)');?></option>
                                            </select>

                                        </td>
                                        <td>
                                            <input type="text" name='group0' placeholder='Group/Trade' class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name='board0' placeholder='Board' class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name='passing_yr0' placeholder='Passing Year' class="form-control"/>
                                        </td>

                                        <td>
                                            <input type="text" name='special_mark0' placeholder='special mark' class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name='ttl_mark0' placeholder='Total Marks' class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr id='addr1'></tr>
                                    </tbody>
                                </table>

                            </div>
                            <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>

                        </div>


                        <!--			<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>

						<div class="col-sm-5">
							<input type="password" class="form-control" name="password" value="" >
						</div>
					</div>-->

                        <div class="col-md-4">
                            <div class="form-group">
                                <!--<label for="field-1" class="col-sm-5"><?php echo get_phrase('photo');?></label>-->

                                <div class="col-sm-12">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                            <img src="http://placehold.it/200x200" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                        <div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="userfile" accept="image/*">
									</span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group test32">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('admission');?></button>
                            </div>
                        </div>
                        </form>
                    <?php } else {?>



                        <p style="color:#FF0000; font-size:24px">
                            Admission Closed
                        </p>


                    <?php }?>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
        </div>
    </div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $("#table_export").dataTable({

            //"sPaginationType": "full_numbers",
            //"lengthMenu": [ 10, 25, 50, 75, 100 ],
            /*"lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
             "pageLength" : 25,*/
            /*"aLengthMenu": [ [2, 4, 8, -1], [2, 4, 8, "All"] ],*/
            "aLengthMenu": [ [30, 50, 100, 200, 500, 1000, 2000, 3000,  -1], [30, 50, 100, 200, 500, 1000, 2000, 3000, "All"] ],
            "iDisplayLength" : 30,
            /*"aLengthMenu": "bootstrap",*/
            //"iDisplayLength": "500",
            "paging": "false",
            //"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [

                    {
                        "sExtends": "xls",
                        "mColumns": [1,2]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1,2]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText"	   : "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(0, false);
                            datatable.fnSetColumnVis(3, false);

                            this.fnPrint( true, oConfig );

                            window.print();

                            $(window).keyup(function(e) {
                                if (e.which == 27) {
                                    datatable.fnSetColumnVis(0, true);
                                    datatable.fnSetColumnVis(3, true);
                                }
                            });
                        },

                    },
                ]
            },

        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
    $(document).ready(function(){
        var i=1;
        $("#add_row").click(function(){
            $('#addr'+i).html("<td>"+ (i+1) +"</td><td><select name='examtype"+i+"' class='form-control'><option value=''>select</option><option value='SSC-GENERAL'>SSC(General)</option><option value='SSC-VOCATIONAL'>SSC(Vocational)</option><option value='TRADE'>Trade(Two-Years)</option><option value='DAKHIL'>Dakhil(Vocational)</option></select></td><td><input  name='group"+i+"' type='text' placeholder='Group'  class='form-control input-md'></td><td><input  name='board"+i+"' type='text' placeholder='Board'  class='form-control input-md'></td><td><input  name='passing_yr"+i+"' type='text' placeholder='Passing Year'  class='form-control input-md'></td><td><input  name='special_mark"+i+"' type='text' placeholder='special mark'  class='form-control input-md'></td><td><input  name='ttl_mark"+i+"' type='text' placeholder='Total Marks'  class='form-control input-md'></td>");

            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
            i++;
            $("#ttldtl").val(i);
        });
        $("#delete_row").click(function(){
            if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
                $("#ttldtl").val(i);
            }
        });
        $("#ttldtl").val(i);
    });

</script>