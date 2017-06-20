<?php
$temp = '1';
$this->db->where('IsActive',$temp);
$semester = $this->db->get('admission_configuration')->result_array();
foreach($semester as $wee):
endforeach;
$this->db->where('id',$wee['SemesterName']);
$semester12 = $this->db->get('session_pundro')->result_array();
foreach($semester12 as $wee12):
endforeach;
$this->db->where('id',$wee['Year']);
$semester13 = $this->db->get('year_calendar')->result_array();
foreach($semester13 as $wee13):
endforeach;
?>
<h3 class="adm_form_head_setting">
    <?php
    echo "&nbsp;for ".$wee12['SessionName']."&nbsp;".$wee13['Name']." for ".$wee['ProgramName']." Program(s)";
    ?>
</h3>
<div class="row">
    <div class="col-md-8">
        <h4>
            <?php
            echo "Program Name: ";
            $data['ProgramName']         = $this->input->post('ProgramName');
            $this->db->where('id', $data['ProgramName']);
            $course_name = $this->db->get('course_program')->result_array();
            foreach($course_name as $row33):
                echo $row33['course_name'];
            endforeach;
            echo "<br/>";
            ?>
        </h4>
        <h5>
            <?php
            echo "Semester Name: ";
            $data['SemesterName']         = $this->input->post('SemesterName');
            $this->db->where('id', $data['SemesterName']);
            $semester_name = $this->db->get('semester')->result_array();
            foreach($semester_name as $row34):
                echo $row34['name'];
            endforeach;
            echo "<br/>";
            ?>
        </h5>
    </div>
    <div class="col-md-4">
        <a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button class="btn btn-success" onclick="myFunction()">Print</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('semester_particulars');?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">

            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">

                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/std_fee_collection/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <input type="hidden" class="form-control" name="receipt_no" value="<?php echo $data['SemesterName']; ?>">
                    <input type="hidden" class="form-control" name="SessionName" value="<?php echo $wee['SemesterName']; ?>">
                    <input type="hidden" class="form-control" name="Year" value="<?php echo $wee['Year']; ?>">
                    <input type="hidden" class="form-control" name="ProgramName" value="<?php echo $data['ProgramName']; ?>">
                    <div class="padded">
                        <br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('student_details');?></label>
                            <div class="col-sm-5">
                                <input id="tag1212" style="width: 300px;" name="MoneyReceipt" placeholder="01679624759">
                                <!--<select name="register_number" class="form-control">
                                    <option value="#"><?php /*echo get_phrase('select') ;*/?></option>
                                    <?php
                                /*                                    $course_program = $this->db->get('applicants_details')->result_array();
                                                                    foreach($course_program as $row4):
                                                                        */?>
                                        <option value="<?php /*echo $row4['id'];*/?>">
                                            <?php /*echo $row4['id']." | ".$row4['NameofApplicant']." - ".$row4['PresentMobile'];*/?>
                                        </option>
                                        <?php
                                /*                                    endforeach;
                                                                    */?>
                                </select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('batch');?></label>
                            <div class="col-sm-5">
                                <select name="BatchName" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $qwbatch = $this->db->get('batch')->result_array();
                                    foreach($qwbatch as $qwbatchrow4):
                                        ?>
                                        <option value="<?php echo $qwbatchrow4['id'];?>">
                                            <?php echo $qwbatchrow4['batch_alias'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('particulars');?></label>
                            <div class="col-sm-8">
                                <?php
                                $this->db->where('ProgramName',$data['ProgramName']);
                                $this->db->where('SemesterName',$data['SemesterName']);
                                $fee_structure = $this->db->get('semester_particulars')->result_array();
                                foreach($fee_structure as $row22):
                                    ?>
                                    <div class="col-md-12 part">
                                        <div class="col-md-6"><input type="text" class="part1 form-control" name="particulars1[]" value="<?php echo $row22['Particulars'];?>"><?php echo $row22['Particulars'];?></div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="particulars2[]" id="particulars2[]" placeholder="<?php echo $row22['Amount'];?>">
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">&nbsp;</label>
                            <div class="col-sm-8">
                                <div class="col-md-12 part">
                                    <div class="col-md-6"><h5>Total Amount</h5></div>
                                    <?php
                                    $this->db->select_sum('Amount');
                                    $this->db->from('semester_particulars');
                                    $this->db->where('ProgramName',$data['ProgramName']);
                                    $this->db->where('SemesterName',$data['SemesterName']);
                                    $query = $this->db->get()->result_array();
                                    foreach($query as $row24):
                                        ?>
                                        <div class="col-md-6">
                                            <input type="hidden" class="form-control" name="actual_amount" value="<?php echo $row24['Amount'];?>">
                                            <?php
                                            echo "<h5>".$row24['Amount']."</h5>";
                                            ?>
                                        </div>
                                        <?php
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('fee_collection');?></button>
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
        <script type="text/javascript">
            function myFunction() {
                window.print();
            }
        </script>
        <script>
            $(document).ready(function(){
                $("#tag1212").autocomplete("http://localhost/pundro_demo/web/autocomplete/autocomplete1.php", {
                    selectFirst: true
                });
            });
        </script>

        <link rel="stylesheet" type="text/css" href="http://localhost/pundro_demo/web/autocomplete/jquery.autocomplete.css" />
        <script type="text/javascript" src="http://localhost/pundro_demo/web/autocomplete/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/pundro_demo/web/autocomplete/jquery.autocomplete.js"></script>